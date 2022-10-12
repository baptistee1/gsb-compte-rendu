<?php
if (!isset($_REQUEST['action']) || empty($_REQUEST['action'])) {
	$action = "formulairemedoc";
} else {
	$action = $_REQUEST['action'];
}
switch ($action) {
	case 'formulairepratic': {

			$result = getAllNomPraticien();
			include("vues/v_formulairePraticien.php");
			break;
		}

	case 'afficherpratic':{

		if (isset($_REQUEST['praticien']) && getAllInformationPraticien($_REQUEST['praticien'])) {
			$pratic = $_REQUEST['praticien'];
			$carac = getAllInformationPraticien($pratic);
			include("vues/v_afficherPraticien.php");
		} else {
			$_SESSION['erreur'] = true;
			header("Location: index.php?uc=praticiens&action=formulairepratic");
		}
		break;

	}

	default: {

			header('Location: index.php?uc=praticiens&action=formulairepratic');
			break;
		}
}
?>