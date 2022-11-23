<?php
include_once 'bd.inc.php';

/**
 * Fonction qui renvoie la liste des rapports de visite 
 *
 * @param String $date1
 * @param String $date2
 * @param String $matricule
 * @return $res la liste des rapports de visite
 */

function getRapportVisite($date1,$date2,$matricule){

    try{
        $monPdo=connexionPDO();
        $req=$monPdo->prepare('SELECT RAP_NUM, r.PRA_NUM,p.PRA_NOM, MOT_libelle, RAP_DATESAISIE,MED_DEPOTLEGAL_1, med1.MED_NOMCOMMERCIAL, MED_DEPOTLEGAL_2, med2.MED_NOMCOMMERCIAL FROM rapport_visite r
        INNER JOIN praticien p
        ON r.PRA_NUM=p.PRA_NUM
        INNER JOIN motifs mo
        ON r.MOT_ID=mo.MOT_ID
        INNER JOIN medicament med1
        ON r.MED_DEPOTLEGAL_1=med1.MED_DEPOTLEGAL
        INNER JOIN medicament med2
        ON r.MED_DEPOTLEGAL_2=med2.MED_DEPOTLEGAL;
        WHERE COL_MATRICULE=:matricule AND RAP_DATEVISITE BETWEEN :date1 AND :date2');
        $req->bindValue(':matricule',$matricule,PDO::PARAM_STR);
        $req->bindValue(':date1',$date1,PDO::PARAM_STR);
        $req->bindValue(':date2',$date2,PDO::PARAM_STR);
        $res=$req->fetchAll(PDO::FETCH_ASSOC);
    }
    catch (PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }

}


/**
 * Fonction récupérant la liste des motifs dans la base de données
 *
 * @return $motifs  la liste des motifs
 */
function getMotifs()
{
    try {
        $monPdo=connexionPDO();

        $req = 'SELECT MOT_ID, MOT_LIBELLE FROM motifs';
        $res = $monPdo->query($req);
        $motifs = $res->fetchAll(PDO::FETCH_ASSOC);
        return $motifs;

    }
    catch(PDOException $e)
    {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}


?>