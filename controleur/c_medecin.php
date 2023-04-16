<?php
if (!isset($_REQUEST['action']) || empty($_REQUEST['action'])) {
    $action = "formulairemedoc";
} else {
    $action = $_REQUEST['action'];
}
switch ($action) {

    case 'formulaireMedecin': {
            $result = getAllNomMedecinByREG($_SESSION['region']);
            include("vues/v_formMedecin.php");
            break;
        }

    case 'gererMedecin': {
            $info = getMedByPranum($_POST['medecin']);
            include("vues/v_formulaireMedecin.php");
            break;
        }

    case 'modifierMedecin': {
            UpdateMedecin(
                $_POST['numeroPra'],
                $_POST['nomPra'],
                $_POST['prenomPra'],
                $_POST['adressePra'],
                $_POST['CPPra'],
                $_POST['villePra'],
                $_POST['coefNotorietePra'],
                $_POST['typePra'],
                $_POST['coefConfPra'],
                $_POST['coefPrescPra'],
                $_POST['RegPra']
            );


            break;
        }


    default: {
            header('Location: index.php?uc=rapports&action=choixRapp');
            break;
        }
}
