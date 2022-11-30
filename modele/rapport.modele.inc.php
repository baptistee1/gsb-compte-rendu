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
        $req=$monPdo->prepare('SELECT RAP_NUM, r.PRA_NUM,p.PRA_NOM, MOT_libelle, RAP_DATESAISIE,MED_DEPOTLEGAL_1, med1.MED_NOMCOMMERCIAL as nomMed1, MED_DEPOTLEGAL_2, med2.MED_NOMCOMMERCIAL as nomMed2 FROM rapport_visite r
        INNER JOIN praticien p
        ON r.PRA_NUM=p.PRA_NUM
        INNER JOIN motifs mo
        ON r.MOT_ID=mo.MOT_ID
        LEFT JOIN medicament med1
        ON r.MED_DEPOTLEGAL_1=med1.MED_DEPOTLEGAL
        LEFT JOIN medicament med2
        ON r.MED_DEPOTLEGAL_2=med2.MED_DEPOTLEGAL
        WHERE COL_MATRICULE= ":matricule" AND RAP_DATESAISIE BETWEEN :date1 AND :date2');
        $req->bindValue(':matricule',$matricule,PDO::PARAM_INT);
        $req->bindValue(':date1',$date1,PDO::PARAM_STR);
        $req->bindValue(':date2',$date2,PDO::PARAM_STR);
        $req->execute();
        $res=$req->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }
    catch (PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }

}

/**
 * Fonction récupérant la liste des motifs dans la base de données
 *
 * @return $motifs la liste des motifs
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

function testValeurNulle(string $key)
{
    if(empty($_POST[$key])) {
        $result = NULL;
    } else {
        $result = $_POST[$key];
    }
    return $result;
}
/**
 * fonction retournant le numéro du dernier rapport écrit par un collaborateur
 *
 * @param string $idCol l'id du collaborateur en question
 * @return int le numéro du dernier rapport écrit
 */
function getNbRapByIdCol($idCol)
{
    try {
        $monPdo=connexionPDO();
        $req = $monPdo->prepare('SELECT MAX(RAP_NUM) FROM rapport_visite WHERE COL_MATRICULE = :idCol');
        $req->bindValue(':idCol', $idCol, PDO::PARAM_STR);
        $req->execute();
        $matricule = $req->fetch(PDO::FETCH_ASSOC);
        return $matricule;
    }
    catch(PDOException $e)
    {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}
/**
 * fonction insérant dans la base de données les données d'une saisie d'un rapport et retournant vrai si la requête à été correctement exécutée
 *
 * @param String $matricule le matricule du collaborateur
 * @param int $motif le motif de la visite
 * @param String $motifAutre un deuxième motif (facultatif)
 * @param date $dateVisite la date de la visite
 * @param date $dateSaisie la date de la saisie
 * @param int $praticien le numéro du praticien qui à eu une visite
 * @param int $praticienRemp le numéro du praticien remplaçant ayant eu une visite (facultatif)
 * @param String $bilan le bilan de la visite
 * @param String $medicament1 le premier médicament proposé
 * @param String $medicament2 le deuxième médicament proposé 
 * @return return boolean si la requête à bien été exécutée
 */
function insertRapport($matricule, $motif, $motifAutre, $dateVisite, $dateSaisie, $praticien, $praticienRemp, $bilan, $medicament1, $medicament2)
{
    try {
        $monPdo=connexionPDO();

        $numRap = getNbRapByIdCol($matricule);  //numéro du dernier rapport de visite
        $numRap['MAX(RAP_NUM)'] += 1;

        $req = $monPdo->prepare('INSERT INTO rapport_visite (COL_MATRICULE, RAP_NUM, PRA_NUM, RAP_DATEVISITE, RAP_BILAN, RAP_MOTIFAUTRE, RAP_DATESAISIE, MOT_ID, PRA_NUM_REMP, MED_DEPOTLEGAL_1, MED_DEPOTLEGAL_2)
        VALUES (:matricule, :numRapport, :praticien, :dateVisite, :bilan, :motifAutre, :dateSaisie, :motif, :praticienRemp, :med1, :med2)');
        $req->bindValue(':matricule', $matricule, PDO::PARAM_STR);
        $req->bindValue(':numRapport', $numRap['MAX(RAP_NUM)'], PDO::PARAM_INT);
        $req->bindValue(':praticien', $praticien, PDO::PARAM_INT);
        if(empty($dateVisite))
        {
            $req->bindValue(':dateVisite', null, PDO::PARAM_NULL);
        } else {
            $req->bindValue(':dateVisite', $dateVisite, PDO::PARAM_STR);
        }
        if(empty($bilan))
        {
            $req->bindValue(':bilan', null, PDO::PARAM_NULL);
        } else {
            $req->bindValue(':bilan', $bilan, PDO::PARAM_STR);
        }
        if(empty($motifAutre))
        {
            $req->bindValue(':motifAutre', null, PDO::PARAM_NULL);
        } else {
            $req->bindValue(':motifAutre', $motifAutre, PDO::PARAM_STR);
        }
        $req->bindValue(':dateSaisie', $dateSaisie, PDO::PARAM_STR);
        $req->bindValue(':motif', $motif, PDO::PARAM_INT);
        if(empty($praticienRemp))
        {
            $req->bindValue(':praticienRemp', null, PDO::PARAM_NULL);
        } else {
            $req->bindValue(':praticienRemp', $praticienRemp, PDO::PARAM_INT);
        }
        if(empty($medicament1))
        {
            $req->bindValue(':med1', null, PDO::PARAM_NULL);
        } else {
            $req->bindValue(':med1', $medicament1, PDO::PARAM_STR);
        }
        if(empty($medicament2))
        {
            $req->bindValue(':med2', null, PDO::PARAM_NULL);
        } else {
            $req->bindValue(':med2', $medicament2, PDO::PARAM_STR);
        }
        $req->execute();
        $reussite = $req->fetch(PDO::FETCH_ASSOC);
        return $reussite;
    }
    //changer les datalists pour que value soit uniquement le numéro du praticien
    catch(PDOException $e)
    {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}
?>