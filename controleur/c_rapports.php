<?php
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
        include("vues/v_afficherRapport");
        break;
    }

    default:
    {
        header('Location: index.php?uc=rapports&action=choixRapp');
		break;
	}
}