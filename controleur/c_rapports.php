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
        include("vues/v_saisirRapport.php");
        break;
    }


    case 'formulaireRapport' :
        {
            //$result = getAllRapport();
            include("vues/v_formulaireRapport.php");
            break;
        }



    case 'afficherRapport' :
    {
        if(isset($_REQUEST['praticien']) && getAllRapport($_REQUEST['praticien'])){
            include("vues/v_afficherRapport.php");
        }else{
            $_SESSION['erreur'] = true;
            header("Location: index.php?uc=praticiens&action=formulairepratic");
        }
        

        break;
    }

    default:
    {
        header('Location: index.php?uc=rapports&action=choixRapp');
		break;
	}
}