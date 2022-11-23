<?php
include_once 'bd.inc.php';
/**
 * Undocumented function
 *
 * @param [type] $date1
 * @param [type] $date2
 * @param [type] $matricule
 * @return void
 */
function getRapportVisite($date1,$date2,$matricule){

    try{
        $monPdo=connexionPDO();
        $req=$monPdo->prepare('SELECT RAP_NUM, praticien.PRA_NUM, PRA_NOM, MOT_LIBELLE, RAP_DATEVISITE
        FROM rapport_visite
        INNER JOIN praticien
        ON rapport_visite.PRA_NUM=praticien.PRA_NUM
        INNER JOIN motifs
        ON rapport_visite.MOT_ID=motifs.MOT_ID
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

function getMedDepotLegal($date1,$date2,$matricule){

    try {
        $monPdo=connexionPdo();
        $req=$monPdo->prepare('');
    } catch (PDOException $e) {
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