<?php
include_once 'bd.inc.php';
    /**
     * Fonction récupérant la liste des ids, noms, et prenoms des praticiens de la base de données
     *
     * @return $results la liste des ids, noms, et prenoms des praticiens
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
    /**
     * Fonction qui renvoie la liste des praticiens lié au matricule du collaborateur
     *
     * @param String $matricule
     * @return $res la liste de tous les praticiens par rapport au matricule du collaborateur
     */
    function getAllInformationMesPraticiens($matricule)
    {
        try{
            $monPdo=connexionPDO();
            $req=$monPdo->prepare('SELECT DISTINCT praticien.PRA_NUM,PRA_NOM,PRA_PRENOM FROM praticien 
            INNER JOIN rapport_visite
            ON praticien.PRA_NUM=rapport_visite.PRA_NUM
            WHERE COL_MATRICULE=:matricule');
            $req->bindValue(':matricule',$matricule,PDO::PARAM_STR);
            $req->execute();
            $result=$req->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        catch (PDOException $e){
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }
?>