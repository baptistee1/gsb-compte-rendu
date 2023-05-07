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


function updateSpe($spe_code2, $spe_code1, $pra_num)
{
    try {
        $monPdo = connexionPDO();
        $req = $monPdo->prepare('UPDATE posseder SET SPE_CODE=:spe_code2 WHERE PRA_NUM=:pranum AND SPE_CODE=:spe_code1');
        $req->bindParam(':spe_code1', $spe_code1, PDO::PARAM_STR);
        $req->bindParam(':spe_code2', $spe_code2, PDO::PARAM_STR);
        $req->bindParam(':pranum', $pra_num, PDO::PARAM_INT);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}



function getSpePra($pra_num)
{
    try {
        $monPdo = connexionPDO();
        $req = $monPdo->prepare('SELECT p.PRA_NUM, p.SPE_CODE, SPE_LIBELLE FROM specialite s
        INNER JOIN posseder p
        ON s.SPE_CODE=p.SPE_CODE
        WHERE p.PRA_NUM = :pranum');
        $req->bindParam(':pranum', $pra_num, PDO::PARAM_INT);
        $req->execute();
        $res = $req->fetchAll();
        return $res;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function getAllSpePra()
{
    try {
        $monPdo = connexionPDO();
        $req = $monPdo->prepare('SELECT SPE_CODE, SPE_LIBELLE FROM specialite');
        $req->execute();
        $res = $req->fetchAll();
        return $res;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}


function deleteSpePra($pra_num, $spe_code)
{
    try {
        $monPdo = connexionPDO();
        $req = $monPdo->prepare('DELETE FROM posseder WHERE `posseder`.`PRA_NUM` =:pranum AND `posseder`.`SPE_CODE` =:specode');
        $req->bindParam(':pranum', $pra_num, PDO::PARAM_INT);
        $req->bindParam(':specode', $spe_code, PDO::PARAM_STR);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}


function addSpePra($pra_num, $spe_code)
{
    try {
        $monPdo = connexionPDO();
        $req = $monPdo->prepare('INSERT INTO posseder (PRA_NUM, SPE_CODE) VALUES (:pranum, :specode)');
        $req->bindParam(':pranum', $pra_num, PDO::PARAM_INT);
        $req->bindParam(':specode', $spe_code, PDO::PARAM_STR);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}


function existeSpe($specialitee, $pra_num)
{
    try {

        $resultat = false;
        $monPdo = connexionPDO();
        $req = $monPdo->prepare('SELECT SPE_CODE FROM posseder WHERE PRA_NUM=:pranum');
        $req->bindParam(':pranum', $pra_num, PDO::PARAM_STR);
        $req->execute();
        $res = $req->fetchAll();
        foreach ($res as $unRes) {
            if ($unRes['SPE_CODE'] == $specialitee) {
                $resultat = true;
            }
        }

        return $resultat;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}


function creerMedecin(
    $pra_nom,
    $pra_prenom,
    $pra_adresse,
    $pra_cp,
    $pra_ville,
    $pra_coefnotor,
    $typ_code,
    $pra_coefconf,
    $pra_coefpresc,
    $reg_code,
    $spe1,
    $spe2
) {
    try {
        $monPdo = connexionPDO();

        $req = "SELECT MAX(PRA_NUM) AS maxi FROM praticien";
        $res = $monPdo->query($req);
        $laLigne = $res->fetch();
        $maxi = $laLigne['maxi'];
        $pra_num = $maxi + 1;

        $req = $monPdo->prepare('INSERT INTO `praticien` (`PRA_NUM`, `PRA_NOM`, `PRA_PRENOM`, `PRA_ADRESSE`, `PRA_CP`, `PRA_VILLE`, `PRA_COEFNOTORIETE`, `TYP_CODE`, `PRA_COEFFCONFIANCE`, `PRA_COEFPRESCRIPTION`, `REG_CODE`) 
        VALUES (:pranum, :pra_nom, :pra_prenom, :pra_adresse, :pra_cp, :pra_ville, :pra_coefnotoriete, :typ_code, :pra_coeffconf, :pra_coefprescription, :reg_code)');
        $req->bindParam(':pranum', $pra_num, PDO::PARAM_INT);
        $req->bindParam(':pra_nom', $pra_nom, PDO::PARAM_STR);
        $req->bindParam(':pra_prenom', $pra_prenom, PDO::PARAM_STR);
        $req->bindParam(':pra_adresse', $pra_adresse, PDO::PARAM_STR);
        $req->bindParam(':pra_cp', $pra_cp, PDO::PARAM_STR);
        $req->bindParam(':pra_ville', $pra_ville, PDO::PARAM_STR);
        $req->bindParam(':pra_coefnotoriete', $pra_coefnotor, PDO::PARAM_STR);

        if (!empty($typ_code)) {
            $req->bindParam(':typ_code', $typ_code, PDO::PARAM_STR);
        } else {
            $req->bindParam(':typ_code', $typ_code, PDO::PARAM_NULL);
        }

        $req->bindParam(':pra_coeffconf', $pra_coefconf, PDO::PARAM_STR);
        $req->bindParam(':pra_coefprescription', $pra_coefpresc, PDO::PARAM_STR);
        $req->bindParam(':reg_code', $reg_code, PDO::PARAM_STR);
        $req->execute();

        if (!empty($spe1)) {
            $req = $monPdo->prepare('INSERT INTO POSSEDER (PRA_NUM, SPE_CODE) VALUES (:pranum, :spe_code1)');
            $req->bindParam(':pranum', $pra_num, PDO::PARAM_INT);
            $req->bindParam(':spe_code1', $spe1, PDO::PARAM_STR);
            $req->execute();
        }

        if (!empty($spe2)) {
            $req = $monPdo->prepare('INSERT INTO POSSEDER (PRA_NUM, SPE_CODE) VALUES (:pranum, :spe_code2)');
            $req->bindParam(':pranum', $pra_num, PDO::PARAM_INT);
            $req->bindParam(':spe_code2', $spe2, PDO::PARAM_STR);
            $req->execute();
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}
