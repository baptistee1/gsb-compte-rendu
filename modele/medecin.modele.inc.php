<?php
include_once 'bd.inc.php';

function getAllNomMedecin(){
    try{
        $monPdo = connexionPDO();
        $req = 'SELECT PRA_NUM,PRA_NOM,PRA_PRENOM FROM praticien p inner join type_praticien t on p.TYP_CODE=t.TYP_CODE where p.TYP_CODE IN("MH","MV");';
        $res = $monPdo->query($req);
        $result = $res->fetchAll();
        return $result;
    } 

    catch (PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
}