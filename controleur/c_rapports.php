<?php
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
        var_dump($matricule);
        var_dump($_SESSION['matricule']);
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
        var_dump($_REQUEST['date1']);
        var_dump($_REQUEST['date2']);
        var_dump($_SESSION['matricule']);
        $date1=$_REQUEST['date1'];
        $date2=$_REQUEST['date2'];
        $matricule=$_REQUEST['matricule'];
        $carac=getRapportVisite($date1,$date2,$matricule);
        
        include("vues/v_afficherRapport.php");
        break;
        

    }
        

        
    

    default:
    {
        header('Location: index.php?uc=rapports&action=choixRapp');
		break;
	}
}