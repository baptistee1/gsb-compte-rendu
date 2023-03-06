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
