<div class="container-fluid">
    <div class="d-flex flex-row flex-wrap gap-3">
        <?php 
        foreach ($rapports as $rapport) {
        ?>
        <div class="card mb-1">
            <div class="card-header text-center fw-bold">
                Rapport non définitif inséré le <?= $rapport['RAP_DATESAISIE'] ?>
            </div>
            <div class="card-body">
                <div class="mb-2 row">
                    <label for="dateVisite" class="col-sm-5 col-form-label">Date de visite</label>
                    <div class="col-sm-7">
                        <?php 
                        if (is_null($rapport['RAP_DATEVISITE'])) {
                        ?>
                            <input type="text" class="form-control" id="dateVisite" value="Date inconnue" readonly>
                            <?php 
                        } else { 
                        ?>
                            <input type="date" class="form-control" id="dateVisite" value="<?= $rapport['RAP_DATEVISITE'] ?>" readonly>
                        <?php } ?>
                    </div>
                </div>
                <div class="mb-1 row">
                    <label for="motif" class="col-sm-5 col-form-label">Motif du rapport</label>
                    <div class="col-sm-7">
                        <?php 
                        if ($rapport['MOT_LIBELLE'] == "Autre") {
                        ?>
                            <input type="text"class="form-control" id="motif" value="<?= $rapport['RAP_MOTIFAUTRE'] ?>" readonly>
                        <?php 
                        } else { 
                        ?>
                            <input type="text"class="form-control" id="motif" value="<?= $rapport['MOT_LIBELLE'] ?>" readonly>
                        <?php } ?>
                    </div>
                </div>
                <div class="row">
                    <label for="praticien" class="col-sm-5 col-form-label">Praticien</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="praticien" value="<?= $rapport['PRA_NOM'] ?>" readonly>
                    </div>
                </div>
                <?php if ($rapport['RAP_ETAT'] == "C" && $delegue) { ?>
                <div class="row">
                    <label for="consulte" class="col-sm-12 col-form-label">Le rapport à été consulté par un délégué.</label>
                </div>
                <?php } ?>
            </div>
            <div class="mx-2 mb-2 align-items-center">
                <?php
                if ($delegue) 
                {
                    ?>
                    <a href="index.php?uc=rapports&action=consulterRapport&idR=<?= $rapport['RAP_NUM'] ?>&mat=<?= $rapport['COL_MATRICULE'] ?>" type="button" class="btn btn-primary btn-lg">
                        Détails du rapport
                    </a>
                    <?php
                } else {
                ?>
                <a href="index.php?uc=rapports&action=terminerRapport&idR=<?= $rapport['RAP_NUM'] ?>&mat=<?= $rapport['COL_MATRICULE'] ?>" type="button" class="btn btn-primary btn-lg">
                    Terminer le rapport
                </a>
                <?php } ?>
            </div>
        </div>
        <?php 
        }
        ?>
    </div>
    <div>
        <div class="d-grid my-3 col-6 mx-auto">
            <?php 
            if (!$delegue) 
            {
            ?>
                <a href="index.php?uc=rapports&action=saisirRapp" type="button" class="btn btn-primary btn-lg">
                    Saisir un nouveau rapport de visite
                </a>
            <?php } ?>
        </div>
    </div>
</div>