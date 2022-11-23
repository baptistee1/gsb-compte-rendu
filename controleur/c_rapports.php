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
        $result = getAllNomPraticien();
        include("vues/v_formulaireRapport.php");
        break;
    }



    case 'afficherRapport' :
    {
        //var_dump($_REQUEST['date1']);
        //var_dump($_REQUEST['date2']);
        //var_dump($_SESSION['matricule']);

        $date1=$_REQUEST['date1'];
        $date2=$_REQUEST['date2'];
        $matricule=$_REQUEST['matricule'];

        var_dump($date1);
        var_dump($date2);
        var_dump($matricule);

        $rapports=getRapportVisite($date1,$date2,$matricule);
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