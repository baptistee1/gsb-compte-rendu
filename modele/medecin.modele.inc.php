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
    } catch (PDOException $e) {
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
    } catch (PDOException $e) {
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
    } catch (PDOException $e) {
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
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}


function UpdateMedecin(
    $pra_num,
    $pra_nom,
    $pra_prenom,
    $pra_adresse,
    $pra_cp,
    $pra_ville,
    $pra_coefnotor,
    $typ_code,
    $pra_coefconf,
    $pra_coefpresc,
    $reg_code
) {
    try {
        $monPdo = connexionPDO();
        $req = $monPdo->prepare('UPDATE praticien SET
        PRA_NOM = :pra_nom, PRA_PRENOM = :pra_prenom, PRA_ADRESSE = :pra_adresse, PRA_CP =  :pra_cp, PRA_VILLE = :pra_ville, 
        PRA_COEFNOTORIETE = :pra_coefnotoriete, praticien.TYP_CODE = :typ_code, PRA_COEFFCONFIANCE = :pra_coeffconf, 
        PRA_COEFPRESCRIPTION = :pra_coefprescription, praticien.REG_CODE = :reg_code WHERE PRA_NUM=:pranum');
        $req->bindParam(':pranum', $pra_num, PDO::PARAM_INT);
        $req->bindParam(':pra_nom', $pra_nom, PDO::PARAM_STR);
        $req->bindParam(':pra_prenom', $pra_prenom, PDO::PARAM_STR);
        $req->bindParam(':pra_adresse', $pra_adresse, PDO::PARAM_STR);
        $req->bindParam(':pra_cp', $pra_cp, PDO::PARAM_STR);
        $req->bindParam(':pra_ville', $pra_ville, PDO::PARAM_STR);
        $req->bindParam(':pra_coefnotoriete', $pra_coefnotor, PDO::PARAM_STR);
        $req->bindParam(':typ_code', $typ_code, PDO::PARAM_STR);
        $req->bindParam(':pra_coeffconf', $pra_coefconf, PDO::PARAM_STR);
        $req->bindParam(':pra_coefprescription', $pra_coefpresc, PDO::PARAM_STR);
        $req->bindParam(':reg_code', $reg_code, PDO::PARAM_STR);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}
