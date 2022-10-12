<?php
include_once 'bd.inc.php';

    function getAllnomPraticien(){

        try{
            $monPdo=connexionPDO();
            $req='SELECT PRA_NOM, PRA_PRENOM FROM praticien';
            $res =$monPdo->query($req);
            $result=$res->fetchAll();
            return $result;
        }
        catch (PDOException $e){
            print "Erreur !: " . $e->getMessage();
            die();
        }

    }
?>