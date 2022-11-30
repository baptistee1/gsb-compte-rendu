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

            insertRapport($matricule, $motif, $motifAutre, $dateVisite, $dateSaisie, $praticien, $praticienRemp, $bilan, $medicament1, $medicament2);
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



    case 'afficherRapport' :
    {

        $date1=$_REQUEST['date1'];
        $date2=$_REQUEST['date2'];
        $matricule=$_SESSION['matricule'];
        $pranum=$_REQUEST['matricule'];

        var_dump($date1);
        var_dump($date2);
        var_dump($matricule);
        var_dump($pranum);

        $rapports=getRapportVisite($date1,$date2,$matricule,$pranum);
        var_dump($rapports);
        include("vues/v_afficherRapport.php");
        break;
        

    }
        

        
    

    default:
    {
        header('Location: index.php?uc=rapports&action=choixRapp');
		break;
	}
}