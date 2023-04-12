<div class="d-grid gap-2 col-6 mx-auto">
    <a href="index.php?uc=rapports&action=<?= $redirection ?>" type="button" class="btn btn-primary btn-lg">
        Saisir un rapport de visite
    </a>
    <a href="index.php?uc=rapports&action=formulaireRapport" type="button" class="btn btn-primary btn-lg">
        Consulter les rapports de visite
    </a>
    <?php 
    $lib=getHabilitation($_SESSION['habilitation']);
        if(isset($_SESSION['login'])){
            $delegue = "Délégué Régional";
            if($delegue == $lib['lib']){
            ?>
                <a href="index.php?uc=rapports&action=newRappReg" type="button" class="btn btn-primary btn-lg">
                    Consulter les rapports de visite de la région
                </a>
            <?php
        }
    }
    ?>
</div>