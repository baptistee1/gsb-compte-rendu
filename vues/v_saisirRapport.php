<div class="container-fluid">
    <div class="card mb-1">
        <div class="card-header text-center fw-bold">
            Formulaire de saisie d'un rapport de visite
        </div>
        <form action="index.php?uc=rapports&action=choixRapp" method="POST">
            <div class="card-body">
                <div class="row justify-content-center gap-2 m-1">
                    <div class="card col">
                        <div class="mb-3 row mt-3">
                            <label for="matricule" class="col-sm-4 col-form-label">Matricule :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control-plaintext" id="matricule" list="matriculeList" value="<?= $matricule ?>" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row mt-3">
                            <label for="motif1" class="col-sm-4 col-form-label">Motif :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="motif1" list="motifsList">
                                <datalist id="motifsList">
                                    <?php
                                    foreach ($motifs as $motif) {
                                    ?>
                                        <option value="<?= $motif['MOT_ID'] . " - " . $motif['MOT_LIBELLE'] ?>"></option>
                                    <?php
                                    }
                                    ?>
                                </datalist>
                            </div>
                        </div>
                        <div class="mb-3 row mt-3">
                            <label for="motif2" class="col-sm-4 col-form-label">Motif autre :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="motif2">
                            </div>
                        </div>
                        <div class="mb-3 row mt-3">
                            <label for="dateVisite" class="col-sm-4 col-form-label">Date de la visite :</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" id="dateVisite">
                            </div>
                        </div>
                        <div class="mb-3 row mt-3">
                            <label for="dateSaisie" class="col-sm-4 col-form-label">Date de la saisie :</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" id="dateSaisie">
                            </div>
                        </div>
                        <div class="mb-3 row mt-3">
                            <label for="praticien" class="col-sm-4 col-form-label">Numéro du praticien :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="praticien" list="praticiensList">
                                <datalist id="praticiensList">
                                    <?php
                                    foreach ($praticiens as $praticien) 
                                    {
                                        ?>
                                        <option value="<?= $praticien['PRA_NUM'] . " - " . $praticien['PRA_NOM'] . " - " . $praticien['PRA_PRENOM'] ?>"></option>
                                        <?php
                                    }
                                    ?>
                                </datalist>
                             </div>
                        </div>
                    </div>
                    <div class="card col">
                        <div class="mb-3 row mt-3">
                            <label for="praticienRemp" class="col-sm-4 col-form-label">Numéro du praticien remplaçant :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="praticienRemp" list="praticiensList">
                                <datalist id="praticiensList">
                                    <?php
                                    foreach ($praticiens as $praticien) 
                                    {
                                        ?>
                                        <option value="<?= $praticien['PRA_NUM'] . " - " . $praticien['PRA_NOM'] . " - " . $praticien['PRA_PRENOM'] ?>"></option>
                                        <?php
                                    }
                                    ?>
                                </datalist>
                            </div>
                        </div>
                        <div class="mb-3 row mt-3">
                            <label for="bilan" class="form-label">Bilan :</label>
                            <div class="col-sm-12">
                                <textarea class="form-control" id="bilan" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="mb-3 row mt-3">
                            <label for="med11" class="col-sm-4 col-form-label">Premier médicament présenté :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="med1">
                            </div>
                        </div>
                        <div class="mb-3 row mt-3">
                            <label for="med2" class="col-sm-4 col-form-label">Deuxième médicament présenté :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="med2">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary">Valider le rapport</button>
                    </div>
                    <div class="col-4">
                    <button type="reset" class="btn btn-secondary">Réinitialiser le rapport</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>