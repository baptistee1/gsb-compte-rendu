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

    case 'consulterRapp' :
    {

        break;
    }

    default:
    {
        header('Location: index.php?uc=rapports&action=choixRapp');
		break;
	}
}