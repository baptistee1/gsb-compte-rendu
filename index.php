<?php
    session_start();
    require_once ('modele/medicament.modele.inc.php');
    require_once ('modele/praticien.modele.inc.php');
    require_once ('modele/connexion.modele.inc.php');
    require_once('modele/medecin.modele.inc.php');

    if(!isset($_REQUEST['uc']) || empty($_REQUEST['uc']))
        $uc = 'accueil';
    else{
        $uc = $_REQUEST['uc'];
    }
?>    
<?php
    if(empty($_SESSION['login'])){
        include("vues/v_headerDeconnexion.php");
    }else{

        include("vues/v_header.php");
    }    
    switch($uc)
    {
        case 'accueil':
        {   
            include("vues/v_accueil.php");
            break;
        }

        case 'medicaments' :
        {   
            if(!empty($_SESSION['login'])){
                include("controleur/c_medicaments.php");
            }else{
                include("vues/v_accesInterdit.php");
            }
            break;
        }

        case 'praticiens' :
        {   
            if(!empty($_SESSION['login'])){
                include("controleur/c_praticiens.php");
            }else{
                include("vues/v_accesInterdit.php");
            }
            break;
        }

        case 'connexion' :
        {   
            include("controleur/c_connexion.php");
            break; 
        }

        case 'rapports' :
        {
            include("controleur/c_rapports.php");
            break;
        }

        case 'médecins' :
            {
                include("controleur/c_medecin.php");
                break;
            }
        
        default :
        {   
            include("vues/v_accueil.php");
            break;
        }
    }
?>
<?php include("vues/v_footer.php") ;?>
</body>
</html>