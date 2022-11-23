<?php
include_once 'bd.inc.php';

function getRapportVisite($date1,$date2,$matricule){

    try{
        $monPdo=connexionPDO();
        $req='SELECT RAP_NUM, praticien.PRA_NUM, PRA_NOM, MOT_LIBELLE, RAP_DATEVISITE, MED_NOMCOMMERCIAL
        FROM rapport_visite
        INNER JOIN praticien
        ON rapport_visite.PRA_NUM=praticien.PRA_NUM
        INNER JOIN motifs
        ON rapport_visite.MOT_ID=motifs.MOT_ID
        INNER JOIN medicament
        ON rapport_visite.MED_DEPOTLEGAL_1=medicament.MED_DEPOTLEGAL
        INNER JOIN medicament
        ON rapport_visite.MED_DEPOTLEGAL_2=medicament.MED_DEPOTLEGAL';

    }
    catch (PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }

}

?>