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
function getRapportVisite($date1, $date2, $matricule, $pranum, $char)
{

    try {
        $monPdo = connexionPDO();
        $ch = 'SELECT RAP_NUM, r.PRA_NUM,p.PRA_NOM, MOT_libelle, RAP_DATESAISIE,MED_DEPOTLEGAL_1, med1.MED_NOMCOMMERCIAL as nomMed1, MED_DEPOTLEGAL_2, med2.MED_NOMCOMMERCIAL as nomMed2 FROM rapport_visite r
        INNER JOIN praticien p
        ON r.PRA_NUM=p.PRA_NUM
        INNER JOIN motifs mo
        ON r.MOT_ID=mo.MOT_ID
        LEFT JOIN medicament med1
        ON r.MED_DEPOTLEGAL_1=med1.MED_DEPOTLEGAL
        LEFT JOIN medicament med2
        ON r.MED_DEPOTLEGAL_2=med2.MED_DEPOTLEGAL
        WHERE COL_MATRICULE= :matricule AND STATUS= :carac ';
        if (!empty($pranum)) {
            $ch = $ch . 'AND r.PRA_NUM=:pranum ';
        }
        if (!empty($date1) && !empty($date2)) {
            $ch = $ch . 'AND RAP_DATESAISIE BETWEEN :date1 AND :date2 ';
        }

        $req = $monPdo->prepare($ch);
        $req->bindValue(':matricule', $matricule, PDO::PARAM_STR);
        $req->bindValue(':carac', $char, PDO::PARAM_STR_CHAR);
        if (!empty($pranum)) {
            $req->bindValue(':pranum', $pranum, PDO::PARAM_INT);
        }
        if (!empty($date1) && !empty($date2)) {
            $req->bindValue(':date1', $date1, PDO::PARAM_STR);
            $req->bindValue(':date2', $date2, PDO::PARAM_STR);
        }



        $req->execute();
        $res = $req->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}


function getHistoriqueRegion($date1, $date2, $matricule, $region)
{
    try {
        $monPdo = connexionPDO();
        $ch = 'SELECT RAP_DATEVISITE, RAP_NUM, r.PRA_NUM, PRA_NOM, COL_NOM, MOT_LIBELLE, MED_DEPOTLEGAL_1, med1.MED_NOMCOMMERCIAL as nomMed1, MED_DEPOTLEGAL_2, med2.MED_NOMCOMMERCIAL as nomMed2 FROM rapport_visite r
        INNER JOIN praticien p
        ON r.PRA_NUM=p.PRA_NUM
        INNER JOIN collaborateur c 
        ON r.COL_MATRICULE=c.COL_MATRICULE
        INNER JOIN motifs m 
        ON r.MOT_ID=m.MOT_ID
        LEFT JOIN medicament med1
                ON r.MED_DEPOTLEGAL_1=med1.MED_DEPOTLEGAL
                LEFT JOIN medicament med2
                ON r.MED_DEPOTLEGAL_2=med2.MED_DEPOTLEGAL
        WHERE c.REG_CODE=:region ';
        if (!empty($matricule)) {
            $ch = $ch . 'AND  r.COL_MATRICULE=:matricule';
        }
        if (!empty($date1) && !empty($date2)) {
            $ch = $ch . 'AND RAP_DATESAISIE BETWEEN :date1 AND :date2 ';
        }

        $req = $monPdo->prepare($ch);
        $req->bindValue(':region', $region, PDO::PARAM_STR);
        if (!empty($matricule)) {
            $req->bindValue(':matricule', $matricule, PDO::PARAM_STR);
        }
        if (!empty($date1) && !empty($date2)) {
            $req->bindValue(':date1', $date1, PDO::PARAM_STR);
            $req->bindValue(':date2', $date2, PDO::PARAM_STR);
        }

        $req->execute();
        $res = $req->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    } catch (PDOException $e) {
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
        $monPdo = connexionPDO();

        $req = 'SELECT MOT_ID, MOT_LIBELLE FROM motifs';
        $res = $monPdo->query($req);
        $motifs = $res->fetchAll(PDO::FETCH_ASSOC);
        return $motifs;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

/**
 * Permet de mettre une variable à null si elle n'est pas remplie
 *
 * @param string $key clé du post
 * @return ?string la variable
 */
function testValeurNulle(string $key)
{
    if (empty($_POST[$key])) {
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
        $monPdo = connexionPDO();
        $req = $monPdo->prepare('SELECT MAX(RAP_NUM) FROM rapport_visite WHERE COL_MATRICULE = :idCol');
        $req->bindValue(':idCol', $idCol, PDO::PARAM_STR);
        $req->execute();
        $matricule = $req->fetch(PDO::FETCH_ASSOC);
        return $matricule;
    } catch (PDOException $e) {
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
 * @return int l'id du rapport venant d'être inséré
 */
function insertRapport($matricule, $motif, $motifAutre, $dateVisite, $dateSaisie, $praticien, $praticienRemp, $bilan, $medicament1, $medicament2, $def)
{
    try {
        $monPdo = connexionPDO();

        $numRap = getNbRapByIdCol($matricule);  //numéro du dernier rapport de visite
        $numRap['MAX(RAP_NUM)'] += 1;

        //insertion dans la table rapport_visite
        $req = $monPdo->prepare('INSERT INTO rapport_visite (COL_MATRICULE, RAP_NUM, PRA_NUM, RAP_DATEVISITE, RAP_BILAN, RAP_MOTIFAUTRE, RAP_DATESAISIE, MOT_ID, PRA_NUM_REMP, MED_DEPOTLEGAL_1, MED_DEPOTLEGAL_2, STATUS)
        VALUES (:matricule, :numRapport, :praticien, :dateVisite, :bilan, :motifAutre, :dateSaisie, :motif, :praticienRemp, :med1, :med2, :status)');
        $req->bindValue(':matricule', $matricule, PDO::PARAM_STR);
        $req->bindValue(':numRapport', $numRap['MAX(RAP_NUM)'], PDO::PARAM_INT);
        $req->bindValue(':praticien', $praticien, PDO::PARAM_INT);
        if (empty($dateVisite)) {
            $req->bindValue(':dateVisite', null, PDO::PARAM_NULL);
        } else {
            $req->bindValue(':dateVisite', $dateVisite, PDO::PARAM_STR);
        }
        if (empty($bilan)) {
            $req->bindValue(':bilan', null, PDO::PARAM_NULL);
        } else {
            $req->bindValue(':bilan', $bilan, PDO::PARAM_STR);
        }
        if (empty($motifAutre)) {
            $req->bindValue(':motifAutre', null, PDO::PARAM_NULL);
        } else {
            $req->bindValue(':motifAutre', $motifAutre, PDO::PARAM_STR);
        }
        $req->bindValue(':dateSaisie', $dateSaisie, PDO::PARAM_STR);
        $req->bindValue(':motif', $motif, PDO::PARAM_INT);
        if (empty($praticienRemp)) {
            $req->bindValue(':praticienRemp', null, PDO::PARAM_NULL);
        } else {
            $req->bindValue(':praticienRemp', $praticienRemp, PDO::PARAM_INT);
        }
        if (empty($medicament1)) {
            $req->bindValue(':med1', null, PDO::PARAM_NULL);
        } else {
            $req->bindValue(':med1', $medicament1, PDO::PARAM_STR);
        }
        if (empty($medicament2)) {
            $req->bindValue(':med2', null, PDO::PARAM_NULL);
        } else {
            $req->bindValue(':med2', $medicament2, PDO::PARAM_STR);
        }
        $req->bindValue(':status', $def, PDO::PARAM_STR_CHAR);
        $req->execute();
        $reussite = $req->fetch(PDO::FETCH_ASSOC);

        return $numRap['MAX(RAP_NUM)'];
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function updRapp($matricule, $rappNum, $motif, $motifAutre, $dateVisite, $dateSaisie, $praticien, $praticienRemp, $bilan, $medicament1, $medicament2, $def)
{
    try {
        $monPdo = connexionPDO();

        //modification dans la table rapport_visite
        $req = $monPdo->prepare('UPDATE rapport_visite 
            SET PRA_NUM = :praticien,
            RAP_DATEVISITE = :dateVisite,
            RAP_BILAN = :bilan,
            RAP_MOTIFAUTRE =  :motifAutre,
            RAP_DATESAISIE = :dateSaisie,
            MOT_ID = :motif,
            PRA_NUM_REMP = :praticienRemp,
            MED_DEPOTLEGAL_1 = :med1,
            MED_DEPOTLEGAL_2 = :med2,
            STATUS = :status
            WHERE COL_MATRICULE = :matricule
            AND RAP_NUM = :numRapport');
        $req->bindValue(':matricule', $matricule, PDO::PARAM_STR);
        $req->bindValue(':numRapport', $rappNum, PDO::PARAM_INT);
        $req->bindValue(':praticien', $praticien, PDO::PARAM_INT);
        if (empty($dateVisite)) {
            $req->bindValue(':dateVisite', null, PDO::PARAM_NULL);
        } else {
            $req->bindValue(':dateVisite', $dateVisite, PDO::PARAM_STR);
        }
        if (empty($bilan)) {
            $req->bindValue(':bilan', null, PDO::PARAM_NULL);
        } else {
            $req->bindValue(':bilan', $bilan, PDO::PARAM_STR);
        }
        if (empty($motifAutre)) {
            $req->bindValue(':motifAutre', null, PDO::PARAM_NULL);
        } else {
            $req->bindValue(':motifAutre', $motifAutre, PDO::PARAM_STR);
        }
        $req->bindValue(':dateSaisie', $dateSaisie, PDO::PARAM_STR);
        $req->bindValue(':motif', $motif, PDO::PARAM_INT);
        if (empty($praticienRemp)) {
            $req->bindValue(':praticienRemp', null, PDO::PARAM_NULL);
        } else {
            $req->bindValue(':praticienRemp', $praticienRemp, PDO::PARAM_INT);
        }
        if (empty($medicament1)) {
            $req->bindValue(':med1', null, PDO::PARAM_NULL);
        } else {
            $req->bindValue(':med1', $medicament1, PDO::PARAM_STR);
        }
        if (empty($medicament2)) {
            $req->bindValue(':med2', null, PDO::PARAM_NULL);
        } else {
            $req->bindValue(':med2', $medicament2, PDO::PARAM_STR);
        }
        $req->bindValue(':status', $def, PDO::PARAM_STR_CHAR);
        $req->execute();

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function insertEchs($matricule, $idR, $medDepolegal, $qte)
{
    try {
        $monPdo = connexionPDO();
        //insertion dans la table offrir
        $req = $monPdo->prepare('INSERT INTO offrir (COL_MATRICULE, RAP_NUM, MED_DEPOTLEGAL, OFF_QTE)
        VALUES (:matricule, :numRapp, :depolegal, :quantite)');

        $req->bindValue(':matricule', $matricule, PDO::PARAM_STR);
        $req->bindValue(':numRapp', $idR, PDO::PARAM_INT);
        $req->bindValue(':depolegal', $medDepolegal, PDO::PARAM_STR);
        $req->bindValue(':quantite', $qte, PDO::PARAM_INT);

        $req->execute();
        $reussite = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

/**
 * Permet de savoir si un rapport de visite non définitif existe dans la base de données
 *
 * @return boolean
 */
function existeRapNonDef(): bool
{
    try {
        $requete = 'SELECT COUNT(COL_MATRICULE) FROM rapport_visite WHERE STATUS = "A" GROUP BY COL_MATRICULE;';
        $monPdo = connexionPDO();
        $req = $monPdo->prepare($requete);
        $res = $req->execute();

        $reussite = $req->fetch(PDO::FETCH_ASSOC);
        if ($reussite > 0) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

/**
 * Fonction permettant de récupérer tous les rapports de visite en fonction d'un matricule
 *
 * @param string $matricule le matricule
 * @return array le tableau contenant la liste des rapports de visite trouvés
 */
function getRapportsVisitesNDF(string $matricule)
{

    try {
        $monPdo = connexionPDO();
        $ch = 'SELECT COL_MATRICULE, RAP_NUM, p.PRA_NOM, RAP_DATEVISITE, RAP_BILAN, RAP_MOTIFAUTRE, RAP_DATESAISIE, RAP_ETAT, m.MOT_LIBELLE, med1.MED_NOMCOMMERCIAL as medicament1, med2.MED_NOMCOMMERCIAL as medicament2 FROM rapport_visite r
        INNER JOIN praticien p
        ON r.PRA_NUM=p.PRA_NUM
        INNER JOIN motifs m
        ON r.MOT_ID = m.MOT_ID
        LEFT JOIN medicament med1
        ON r.MED_DEPOTLEGAL_1 = med1.MED_DEPOTLEGAL
        LEFT JOIN medicament med2
        ON r.MED_DEPOTLEGAL_2 = med2.MED_DEPOTLEGAL
        WHERE COL_MATRICULE = :matricule AND STATUS = :carac';

        $req = $monPdo->prepare($ch);
        $req->bindValue(':matricule', $matricule, PDO::PARAM_STR);
        $req->bindValue(':carac', "A", PDO::PARAM_STR_CHAR);
        $req->execute();

        $res = $req->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

/**
 * Fonction qui récupère les données d'un rapport de visite
 *
 * @param integer $idR l'id du rapport
 * @return array un rapport de visite
 */
function getRapportVisiteByIdAndMat(int $idR, string $mat)
{
    try {
        $monPdo = connexionPDO();
        $ch = 'SELECT COL_MATRICULE, RAP_NUM, p.PRA_NOM, RAP_DATEVISITE, RAP_BILAN, RAP_MOTIFAUTRE, RAP_DATESAISIE, m.MOT_LIBELLE, med1.MED_NOMCOMMERCIAL as medicament1, med2.MED_NOMCOMMERCIAL as medicament2 FROM rapport_visite r
        INNER JOIN praticien p
        ON r.PRA_NUM=p.PRA_NUM
        INNER JOIN motifs m
        ON r.MOT_ID = m.MOT_ID
        LEFT JOIN medicament med1
        ON r.MED_DEPOTLEGAL_1 = med1.MED_DEPOTLEGAL
        LEFT JOIN medicament med2
        ON r.MED_DEPOTLEGAL_2 = med2.MED_DEPOTLEGAL
        WHERE RAP_NUM = :id
        AND COL_MATRICULE = :mat';

        $req = $monPdo->prepare($ch);
        $req->bindValue(':id', $idR, PDO::PARAM_INT);
        $req->bindValue(':mat', $mat, PDO::PARAM_STR);
        $req->execute();

        $res = $req->fetch(PDO::FETCH_ASSOC);
        return $res;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

/**
 * Récupère le code la region d'un délégué
 *
 * @param int $login l'id du login du délégué
 * @return array le code de la region du délégué
 */
function getRegByLogId($login)
{
    try {
        $monPdo = connexionPDO();
        $ch = 'SELECT REG_CODE FROM collaborateur c
            INNER JOIN login l
            ON c.LOG_ID = l.LOG_ID
            WHERE l.LOG_ID = :login';

        $req = $monPdo->prepare($ch);
        $req->bindValue(':login', $login, PDO::PARAM_STR);
        $req->execute();

        $res = $req->fetch(PDO::FETCH_ASSOC);
        return $res;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

/**
 * Permet de récupérer les rapports de visite d'un collaborateur sur une région ayant l'état "non consulté"
 *
 * @param string $region la region recherchée
 * @return array tous les rapports de visite de la région
 */
function getRapportVisiteByReg($region)
{
    try {
        $monPdo = connexionPDO();
        $ch = 'SELECT r.COL_MATRICULE, RAP_NUM, p.PRA_NOM, RAP_DATEVISITE, RAP_BILAN, RAP_MOTIFAUTRE, RAP_DATESAISIE, m.MOT_LIBELLE, RAP_ETAT, med1.MED_NOMCOMMERCIAL as medicament1, med2.MED_NOMCOMMERCIAL as medicament2 FROM rapport_visite r
        INNER JOIN praticien p
        ON r.PRA_NUM=p.PRA_NUM
        INNER JOIN motifs m
        ON r.MOT_ID = m.MOT_ID
        LEFT JOIN medicament med1
        ON r.MED_DEPOTLEGAL_1 = med1.MED_DEPOTLEGAL
        LEFT JOIN medicament med2
        ON r.MED_DEPOTLEGAL_2 = med2.MED_DEPOTLEGAL
        INNER JOIN collaborateur c
        ON r.COL_MATRICULE = c.COL_MATRICULE
        WHERE c.REG_CODE = :region
        ORDER BY r.RAP_DATEVISITE';

        $req = $monPdo->prepare($ch);
        $req->bindValue(':region', $region, PDO::PARAM_STR);
        $req->execute();

        $res = $req->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}


function getVisiteurReg($region)
{
    try {
        $monPdo = connexionPDO();
        $ch = 'SELECT r.COL_MATRICULE,COL_NOM,COL_PRENOM FROM collaborateur c 
        INNER JOIN rapport_visite r ON c.COL_MATRICULE=r.COL_MATRICULE WHERE HAB_ID=1 AND REG_CODE=:region';

        $req = $monPdo->prepare($ch);
        $req->bindValue(':region', $region, PDO::PARAM_STR);
        $req->execute();

        $res = $req->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function changeRapToRead($idRap)
{
    try {
        $monPdo = connexionPDO();
        $ch = "UPDATE rapport_visite SET RAP_ETAT = 'C' WHERE RAP_NUM = :id";

        $req = $monPdo->prepare($ch);
        $req->bindValue(':id', $idRap, PDO::PARAM_INT);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}
