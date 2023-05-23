<?php
include_once('modele/rapport.modele.inc.php');
include_once('modele/praticien.modele.inc.php');
include_once('modele/medicament.modele.inc.php');

if (!isset($_REQUEST['action']) || empty($_REQUEST['action'])) {
    $action = "formulairemedoc";
} else {
    $action = $_REQUEST['action'];
}
switch ($action) {
    case 'choixRapp': {
            if (isset($_POST['matricule'])) {
                $matricule = $_POST['matricule'];
                $motif = $_POST['motif1'];
                $motifAutre = testValeurNulle('motif2');
                $dateVisite = testValeurNulle('dateVisite');
                $dateSaisie = $_POST['dateSaisie'];
                $praticien = $_POST['praticien'];
                $praticienRemp = testValeurNulle('praticienRemp');
                $bilan = testValeurNulle('bilan');
                $medicament1 = testValeurNulle('med1');
                $medicament2 = testValeurNulle('med2');
                if (isset($_POST['checkSaisie'])) {
                    $def = "D";
                } else {
                    $def = "A";
                }
                $nbEchs = testValeurNulle('echantillons');

                //récupération de l'id venant d'être inséré
                $id = insertRapport($matricule, $motif, $motifAutre, $dateVisite, $dateSaisie, $praticien, $praticienRemp, $bilan, $medicament1, $medicament2, $def);
                if (!is_null($nbEchs)) {
                    for ($i = 1; $i <= $nbEchs; $i++) {
                        $med = $_POST["echantillon" . $i . "Name"];
                        $qte = $_POST["echantillon" . $i . "Qte"];
                        insertEchs($matricule, $id, $med, $qte);
                    }
                }
            }

            // s'il existe des rapports non définitif renvoie vers une page qui les affiche
            if (existeRapNonDef()) {
                $redirection = "choisirRappNDF";
            } else {
                $redirection = "saisirRapp";
            }
            include("vues/v_choixRapport.php");
            break;
        }

    case 'choisirRappNDF': {
            $delegue = false;
            $matricule = $_SESSION['matricule'];
            $rapports = getRapportsVisitesNDF($matricule);
            include("vues/v_choisirRappNDNC.php");
            break;
        }

    case 'saisirRapp': {
            $matricule = $_SESSION['matricule'];
            $motifs = getMotifs();
            $praticiens = getAllNomPraticien();
            $medicaments = getAllNomMedicament();
            include("vues/v_saisirRapport.php");
            break;
        }

    case 'terminerRapport': {
            if (isset($_GET['idR']) && is_numeric($_GET['idR'])) {
                $matricule = $_SESSION['matricule'];
                $motifs = getMotifs();
                $praticiens = getAllNomPraticien();
                $medicaments = getAllNomMedicament();
                $rapport = getRapportVisiteById($_GET['idR']);
            }
            include("vues/v_terminerRapport.php");
            break;
        }

    case 'formulaireRapport': {
            $matricule = $_SESSION['matricule'];
            $result = getAllInformationMesPraticiens($matricule);
            include("vues/v_formulaireRapport.php");
            break;
        }

    case 'formulaireRapportNonDefinitif': {
            $matricule = $_SESSION['matricule'];
            $result = getAllInformationMesPraticiens($matricule);
            include("vues/v_formulaireRapportNDF.php");
            break;
        }

    case 'newRappReg': {
            $delegue = true;
            $region = getRegByLogId($_SESSION["login"]);
            $rapports = getRapportVisiteByReg($region['REG_CODE']);
            include("vues/v_choisirRappNDNC.php");
            break;
        }

    case 'consulterRapport': {
        if (isset($_GET['idR']) && is_numeric($_GET['idR'])) {
            $idRap = $_GET['idR'];
            $rapport = getRapportVisiteById($idRap);
            $med1 = getMedDepotLegalByNomCommercial($rapport['medicament1']);
            $med2 = getMedDepotLegalByNomCommercial($rapport['medicament2']);
            changeRapToRead($idRap);
        }
        include("vues/v_detailsRapport.php");
        break;
    }

    case 'formulaireHistorique': {
            $region = getRegByLogId($_SESSION["login"]);
            $visiteurs = getVisiteurReg($region['REG_CODE']);
            include("vues/v_historiqueRegion.php");
            break;
        }

    case 'afficherHistorique': {
            $region = getRegByLogId($_SESSION["login"]);
            $date1 = $_REQUEST['date1'];
            $date2 = $_REQUEST['date2'];
            //var_dump($date1, $date2);
            //var_dump($region['REG_CODE']);
            $historiques = getHistoriqueRegion($date1, $date2, $_REQUEST['matricule'], $region['REG_CODE']);
            //var_dump($historiques);
            if (!empty($historiques)) {
                include("vues/v_afficherHistoriqueRegion.php");
            } else {
                include("vues/v_historiqueRegion.php");
                $message = "Vous n'avez aucun rapports de visite de la region";
                include("vues/v_message.php");
            }

            break;
        }

    case 'afficherRapport': {
            $date1 = $_REQUEST['date1'];
            $date2 = $_REQUEST['date2'];
            $matricule = $_SESSION['matricule'];
            $pranum = $_REQUEST['matricule'];
            $rapports = getRapportVisite($date1, $date2, $matricule, $pranum, 'D');
            if (!empty($rapports)) {
                include("vues/v_afficherRapport.php");
            } else {
                include("vues/v_formulaireRapport.php");
                $message = "Vous n'avez aucun rapports de visite";
                include("vues/v_message.php");
            }
            break;
        }

    case 'afficherRapportNonDefinitif': {
            $date1 = $_REQUEST['date1'];
            $date2 = $_REQUEST['date2'];
            $matricule = $_SESSION['matricule'];
            $pranum = $_REQUEST['matricule'];
            $rapports = getRapportVisite($date1, $date2, $matricule, $pranum, 'A');
            if (!empty($rapports)) {
                include("vues/v_afficherRapport.php");
            } else {
                include("vues/v_formulaireRapportNDF.php");
                $message = "Vous n'avez aucun rapports de visite non définitif";
                include("vues/v_message.php");
            }
            break;
        }

    default: {
            header('Location: index.php?uc=rapports&action=choixRapp');
            break;
        }
}
