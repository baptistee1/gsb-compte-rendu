<?php
if (!isset($_REQUEST['action']) || empty($_REQUEST['action'])) {
	$action = "formulairemedoc";
} else {
	$action = $_REQUEST['action'];
}
switch ($action) {

    case 'formulaireMedecin':
        {
        $result=getAllNomMedecin();
        include("vues/v_formMedecin.php");
        break;
        }

        case 'affichageMedecin':
            {
            
            include("vues/v_afficherMedecin.php");
            break;
            }


    default:
    {
        header('Location: index.php?uc=rapports&action=choixRapp');
		break;
	}
}