<?php

include_once 'bd.inc.php';
    /**
     * Fonction récupérant la liste du depot-legal et du nom commercial des medicaments de la base de données
     *
     * @return $results la liste des depot-legal et des nom commercial des medicaments
     */
    function getAllNomMedicament(){

        try{
            $monPdo = connexionPDO();
            $req = 'SELECT MED_DEPOTLEGAL, MED_NOMCOMMERCIAL FROM medicament ORDER BY MED_NOMCOMMERCIAL';
            $res = $monPdo->query($req);
            $result = $res->fetchAll();
            return $result;
        } 

        catch (PDOException $e){
            print "Erreur !: " . $e->getMessage();
            die();
        }

    }

    function getAllInformationMedicamentDepot($depot){

        try{
            $monPdo = connexionPDO();
            $req = 'SELECT m.MED_DEPOTLEGAL as \'depotlegal\', m.MED_NOMCOMMERCIAL as \'nomcom\', m.MED_COMPOSITION as \'compo\', m.MED_EFFETS as \'effet\', m.MED_CONTREINDIC as \'contreindic\', m.MED_PRIXECHANTILLON as \'prixechan\', f.FAM_LIBELLE as \'famille\' FROM medicament m INNER JOIN famille f ON f.FAM_CODE = m.FAM_CODE WHERE MED_DEPOTLEGAL = "'.$depot.'"';
            $res = $monPdo->query($req);
            $result = $res->fetch();    
            return $result;
        } 
    
        catch (PDOException $e){
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

    function getAllInformationMedicamentNom($nom){

        try{
            $monPdo = connexionPDO();
            $req = 'SELECT m.MED_DEPOTLEGAL as \'depotlegal\', m.MED_NOMCOMMERCIAL as \'nomcom\', m.MED_COMPOSITION as \'compo\', m.MED_EFFETS as \'effet\', m.MED_CONTREINDIC as \'contreindic\', m.MED_PRIXECHANTILLON as \'prixechan\', f.FAM_LIBELLE as \'famille\' FROM medicament m INNER JOIN famille f ON f.FAM_CODE = m.FAM_CODE WHERE MED_NOMCOMMERCIAL = "'.$nom.'"';
            $res = $monPdo->query($req);
            $result = $res->fetch();    
            return $result;
        } 
    
        catch (PDOException $e){
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

    function getDepotMedoc($nom){

        try{
            $monPdo = connexionPDO();
            $req = 'SELECT MED_DEPOTLEGAL, MED_NOMCOMMERCIAL FROM medicament WHERE MED_DEPOTLEGAL = "'.$nom.'"';
            $res = $monPdo->query($req);
            $result = $res->fetch();    
            return $result;
        } 
    
        catch (PDOException $e){
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }
    
    function getNbMedicament(){

        try{
            $monPdo = connexionPDO();
            $req = 'SELECT COUNT(MED_DEPOTLEGAL) as \'nb\' FROM medicament';
            $res = $monPdo->query($req);
            $result = $res->fetch();    
            return $result;
        } 
    
        catch (PDOException $e){
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

    function getMedDepotLegalByNomCommercial($nomCommercial)
    {
        try{
            $monPdo = connexionPDO();
            $ch = 'SELECT MED_DEPOTLEGAL FROM medicament WHERE MED_NOMCOMMERCIAL = :nom';
            $req = $monPdo->prepare($ch);
            $req->bindValue(':nom', $nomCommercial, PDO::PARAM_STR);
            $req->execute();
            $res = $req->fetch();    
            return $res;
        } 
    
        catch (PDOException $e){
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

?>