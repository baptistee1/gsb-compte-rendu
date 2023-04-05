<?php
include_once 'bd.inc.php';

function getAllNomMedecinByREG($REG)
{
    try {
        $monPdo = connexionPDO();
        $req = 'SELECT PRA_NUM,PRA_NOM,PRA_PRENOM FROM praticien p inner join type_praticien t on p.TYP_CODE=t.TYP_CODE inner join region r on p.REG_CODE=r.REG_CODE where p.TYP_CODE IN("MH","MV") AND r.REG_NOM="' . $REG . '"';
        $res = $monPdo->query($req);
        $result = $res->fetchAll();
        return $result;
    }
    catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function getAllType()
{
    try {
        $monPdo = connexionPDO();
        $req = 'SELECT TYP_CODE,TYP_LIBELLE FROM type_praticien';
        $res = $monPdo->query($req);
        $result = $res->fetchAll();
        return $result;
    }
    catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function getAllReg()
{
    try {
        $monPdo = connexionPDO();
        $req = 'SELECT REG_CODE, REG_NOM FROM region';
        $res = $monPdo->query($req);
        $result = $res->fetchAll();
        return $result;
    }
    catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function getMedByPranum($pranum)
{
    try {
        $monPdo = connexionPDO();
        $req = $monPdo->prepare('SELECT PRA_NUM, PRA_NOM, PRA_PRENOM, PRA_ADRESSE, PRA_CP, PRA_VILLE, PRA_COEFNOTORIETE, p.TYP_CODE, PRA_COEFFCONFIANCE, PRA_COEFPRESCRIPTION, p.REG_CODE,TYP_LIBELLE,REG_NOM FROM praticien p
        INNER JOIN type_praticien tp
        ON p.TYP_CODE=tp.TYP_CODE
        INNER JOIN region r
        ON p.REG_CODE=r.REG_CODE
        WHERE PRA_NUM = :PRANUM;');
        $req->bindParam(':PRANUM', $pranum, PDO::PARAM_INT);
        $req->execute();
        $res = $req->fetch();
        return $res;
    }
    catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }

}
