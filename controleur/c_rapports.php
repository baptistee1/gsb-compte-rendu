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
	case 'choixRapp' :
    {
        if (isset($_POST['matricule'])){
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
            if(isset($_POST['checkSaisie'])){
                $def = "D";
            } else {
                $def = "A";
            }
            $echs1 = testValeurNulle('echs1');
            $qteEchs1 = testValeurNulle('echs1Qte');
            $echs2 = testValeurNulle('echs2');
            $qteEchs2 = testValeurNulle('echs2Qte');
            $echs3 = testValeurNulle('echs3');
            $qteEchs3 = testValeurNulle('echs3Qte');
            $echs4 = testValeurNulle('echs4');
            $qteEchs4 = testValeurNulle('echs4Qte');
            $echs5 = testValeurNulle('echs5');
            $qteEchs5 = testValeurNulle('echs5Qte');
            $echs6 = testValeurNulle('echs6');
            $qteEchs6 = testValeurNulle('echs6Qte');
            $echs7 = testValeurNulle('echs7');
            $qteEchs7 = testValeurNulle('echs7Qte');
            $echs8 = testValeurNulle('echs8');
            $qteEchs8 = testValeurNulle('echs8Qte');
            $echs9 = testValeurNulle('echs9');
            $qteEchs9 = testValeurNulle('echs9Qte');
            $echs10 = testValeurNulle('echs10');
            $qteEchs10 = testValeurNulle('echs10Qte');


            var_dump($matricule, $motif, $motifAutre, $dateVisite, $dateSaisie, $praticien, $praticienRemp, $bilan, $medicament1, $medicament2, $def);
        }
        include("vues/v_choixRapport.php");
        break;
    }
    
    case 'saisirRapp' :
    {
        $matricule = $_SESSION['matricule'];
        $motifs = getMotifs();
        $praticiens = getAllNomPraticien();
        $medicaments = getAllNomMedicament();
        var_dump(existeRapNonDef());
        include("vues/v_saisirRapport.php");
        break;
    }


    case 'formulaireRapport' :
    {
        $matricule=$_SESSION['matricule'];
        $result = getAllInformationMesPraticiens($matricule);
        include("vues/v_formulaireRapport.php");
        break;
    }

    case 'formulaireRapportNonDefinitif':
        {
            $matricule=$_SESSION['matricule'];
        $result = getAllInformationMesPraticiens($matricule);
        include("vues/v_formulaireRapportNDF.php");
        break;

        }



    case 'afficherRapport' :
    {

        $date1=$_REQUEST['date1'];
        $date2=$_REQUEST['date2'];
        $matricule=$_SESSION['matricule'];
        $pranum=$_REQUEST['matricule'];
        $rapports=getRapportVisite($date1,$date2,$matricule,$pranum,'D');
        if(!empty($rapports)){
        include("vues/v_afficherRapport.php");
        }else{
        include("vues/v_formulaireRapport.php");
        $message="Vous n'avez aucun rapports de visite";
        include("vues/v_message.php");
        }
        break;
    }

    case 'afficherRapportNonDefinitif' :
        {
    
            $date1=$_REQUEST['date1'];
            $date2=$_REQUEST['date2'];
            $matricule=$_SESSION['matricule'];
            $pranum=$_REQUEST['matricule'];
            $rapports=getRapportVisite($date1,$date2,$matricule,$pranum,'A');
            if(!empty($rapports)){
            include("vues/v_afficherRapport.php");
            }else{
            include("vues/v_formulaireRapportNDF.php");
            $message="Vous n'avez aucun rapports de visite non définitif";
            include("vues/v_message.php");
            }
            break;
        }
    

        

    default:
    {
        header('Location: index.php?uc=rapports&action=choixRapp');
		break;
	}
}