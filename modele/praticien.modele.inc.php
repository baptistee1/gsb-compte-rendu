<?php
include_once 'bd.inc.php';
    /**
     * Fonction récupérant la liste des praticiens de la base de données
     *
     * @return $results la liste des praticiens
     */
    function getAllNomPraticien(){

        try{
            $monPdo=connexionPDO();
            $req='SELECT PRA_NUM, PRA_NOM, PRA_PRENOM FROM praticien';
            $res =$monPdo->query($req);
            $result=$res->fetchAll();
            return $result;
        }
        catch (PDOException $e)
        {
            print "Erreur !: " . $e->getMessage();
            die();
        }

    }
    /**
     * Undocumented function
     *
     * @param [type] $nom
     * @return void
     */
    function getAllInformationPraticien($nom){

        try{
            $monPdo=connexionPDO();
            $req='SELECT PRA_NOM as \'nom\', PRA_PRENOM as \'prenom\', PRA_ADRESSE as \'adresse\', PRA_CP as \'cp\', PRA_VILLE as \'ville\', PRA_COEFNOTORIETE as \'coefnotoriete\', PRA_COEFFCONFIANCE as \'coefconfiance\', PRA_COEFPRESCRIPTION as \'coefprescription\' FROM praticien WHERE PRA_NOM="'.$nom.'"';
            $res = $monPdo->query($req);
            $resultat=$res->fetch();
            return $resultat;
        }

        catch (PDOException $e){
            print "Erreur !: " . $e->getMessage();
            die();
        }

    }
?>