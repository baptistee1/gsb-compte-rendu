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
            $allSpe = getAllSpePra();
            $info = getMedByPranum($_REQUEST['medecin']);
            $spe = getSpePra($_REQUEST['medecin']);
            $allType = getAllType();
            $allReg = getAllReg();
            include("vues/v_formulaireMedecin.php");
            break;
        }

    case 'modifierMedecin': {

            $spe = getSpePra($_POST['numeroPra']);
            //var_dump($spe);
            $spe1 = $_POST['spe1'];
            $spe2 = $_POST['spe2'];

            //si $spe1 n'est pas vide
            if (!empty($spe1)) {
                //si il y a une variable dans $spe[0]['SPE_CODE']
                if (isset($spe[0]['SPE_CODE'])) {
                    //si $spe1 n'est pas égale à la spe en base
                    if ($spe1 !== $spe[0]['SPE_CODE']) {
                        //si $spe1 existe dans la base
                        if (!existeSpe($spe1, $_POST['numeroPra'])) {
                            updateSpe($spe1, $spe[0]['SPE_CODE'], $_POST['numeroPra']);
                        }
                    }
                } else {
                    if (!existeSpe($spe2, $_POST['numeroPra'])) {
                    }
                    addSpePra($_POST['numeroPra'], $spe1);
                }
            }

            if (!empty($spe2)) {
                if (isset($spe[1]['SPE_CODE'])) {
                    if ($spe2 !== $spe[1]['SPE_CODE']) {
                        if (!existeSpe($spe2, $_POST['numeroPra'])) {
                            updateSpe($spe2, $spe[1]['SPE_CODE'], $_POST['numeroPra']);
                        }
                    }
                } else {
                    if (!existeSpe($spe2, $_POST['numeroPra'])) {
                        addSpePra($_POST['numeroPra'], $spe2);
                    }
                }
            }


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

            header('Location: index.php?uc=médecins&action=formulaireMedecin');
            break;
        }

    case 'creerMedecin': {

            $allSpe = getAllSpePra();
            $allType = getAllType();
            $allReg = getAllReg();

            include("vues/v_creerMedecin.php");
            break;
        }

    case 'confirmerMedecin': {

            creerMedecin(
                $_POST['nomPra'],
                $_POST['prenomPra'],
                $_POST['adressePra'],
                $_POST['CPPra'],
                $_POST['villePra'],
                $_POST['coefNotorietePra'],
                $_POST['typePra'],
                $_POST['coefConfPra'],
                $_POST['coefPrescPra'],
                $_POST['RegPra'],
                $_POST['spe1'],
                $_POST['spe2']
            );

            header('Location: index.php?uc=médecins&action=formulaireMedecin');
            break;
        }


    default: {
            header('Location: index.php?uc=médecins&action=choixRapp');
            break;
        }
}
