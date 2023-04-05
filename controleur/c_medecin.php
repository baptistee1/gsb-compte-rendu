<?php
if (!isset($_REQUEST['action']) || empty($_REQUEST['action'])) {
    $action = "formulairemedoc";
}
else {
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
            var_dump($_POST['numeroPra']);
            var_dump($_POST['nomPra']);
            var_dump($_POST['prenomPra']);
            var_dump($_POST['adressePra']);
            var_dump($_POST['CPPra']);
            var_dump($_POST['villePra']);
            var_dump($_POST['coefNotorietePra']);
            var_dump($_POST['typePra']);
            var_dump($_POST['coefConfPra']);
            var_dump($_POST['coefPrescPra']);
            var_dump($_POST['RegPra']);


            break;
        }


    default: {
            header('Location: index.php?uc=rapports&action=choixRapp');
            break;
        }
}
