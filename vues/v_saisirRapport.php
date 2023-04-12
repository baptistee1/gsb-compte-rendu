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
                            <label for="matricule" class="col-sm-4 col-form-label">Matricule* :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control-plaintext" name="matricule" id="matricule" list="matriculeList" value="<?= $matricule ?>" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row mt-3">
                            <label for="motif1" class="col-sm-4 col-form-label">Motif* :</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="motif1" onchange="testMotifAutre(this.value)" required>
                                    <option hidden></option>
                                    <?php
                                    foreach ($motifs as $motif) {
                                    ?>
                                        <option value="<?= $motif['MOT_ID'] ?>"><?= $motif['MOT_LIBELLE'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row mt-3" id="divMotif2" hidden>
                            <label for="motif2" class="col-sm-4 col-form-label">Motif autre :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="motif2" id="motif2" required>
                            </div>
                        </div>
                        <div class="mb-3 row mt-3">
                            <label for="dateVisite" class="col-sm-4 col-form-label">Date de la visite :</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" name="dateVisite" id="dateVisite">
                            </div>
                        </div>
                        <div class="mb-3 row mt-3">
                            <label for="dateSaisie" class="col-sm-4 col-form-label">Date de la saisie* :</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" name="dateSaisie" id="dateSaisie" required>
                            </div>
                        </div>
                        <div class="mb-3 row mt-3">
                            <label for="praticien" class="col-sm-4 col-form-label">Numéro du praticien* :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="praticien" name="praticien" list="praticiensList" required>
                                <datalist id="praticiensList">
                                    <?php
                                    foreach ($praticiens as $praticien) {
                                    ?>
                                        <option value="<?= $praticien['PRA_NUM'] ?>"><?= $praticien['PRA_NOM'] . " - " . $praticien['PRA_PRENOM'] ?></option>
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
                                <input type="text" class="form-control" id="praticienRemp" name="praticienRemp" list="praticiensList">
                                <datalist id="praticiensList">
                                    <?php
                                    foreach ($praticiens as $praticien) {
                                    ?>
                                        <option value="<?= $praticien['PRA_NUM'] ?>"><?= $praticien['PRA_NOM'] . " - " . $praticien['PRA_PRENOM'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </datalist>
                            </div>
                        </div>
                        <div class="mb-3 row mt-3">
                            <label for="bilan" class="form-label">Bilan :</label>
                            <div class="col-sm-12">
                                <textarea class="form-control" id="bilan" name="bilan" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="mb-3 row mt-3">
                            <label for="med11" class="col-sm-4 col-form-label">Premier médicament présenté :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="med1" name="med1" list="medicamentsList">
                                <datalist id="medicamentsList">
                                    <?php
                                    foreach ($medicaments as $medicament) {
                                    ?>
                                        <option value="<?= $medicament['MED_DEPOTLEGAL'] ?>"><?= $medicament['MED_NOMCOMMERCIAL'] ?> </option>
                                    <?php
                                    }
                                    ?>
                                </datalist>
                            </div>
                        </div>
                        <div class="mb-3 row mt-3">
                            <label for="med2" class="col-sm-4 col-form-label">Deuxième médicament présenté :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="med2" name="med2" list="medicamentsList">
                                <datalist id="medicamentsList">
                                    <?php
                                    foreach ($medicaments as $medicament) {
                                    ?>
                                        <option value="<?= $medicament['MED_DEPOTLEGAL'] ?>"><?= $medicament['MED_NOMCOMMERCIAL'] ?> </option>
                                    <?php
                                    }
                                    ?>
                                </datalist>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="mb-3 row mt-3">
                            <label for="echantillons" class=" col-sm-4 form-label">Nombre d'échantillons offert :</label>
                            <div class="col-sm-8">
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control" id="echantillons" name="echantillons" aria-describedby="buttonAdd" min="0" max="10">
                                    <button class="btn btn-outline-secondary" type="button" id="buttonAdd" onclick="discoverEchs(echantillons.value)">Ajouter</button>
                                </div>
                            </div>
                        </div>
                        <?php
                        for ($i = 1; $i <= 10; $i++) {
                        ?>
                            <div class="mb-3 row mt-3" id="divEchs<?= $i ?>" hidden>
                                <label for="echantillons" class=" col-sm-4 form-label">Échantillon <?= $i ?> :</label>
                                <div class="col-sm-8">
                                    <div class="input-group mb-3">
                                        <input type="text" placeholder="Nom du médicament" list="medicamentsList" class="form-control" id="echs<?= $i ?>" name="echantillon<?= $i ?>Name">
                                        <datalist id="medicamentsList">
                                            <?php
                                            foreach ($medicaments as $medicament) {
                                            ?>
                                                <option value="<?= $medicament['MED_DEPOTLEGAL'] ?>"><?= $medicament['MED_NOMCOMMERCIAL'] ?> </option>
                                            <?php
                                            }
                                            ?>
                                        </datalist>
                                        <input type="text" placeholder="Quantité" pattern="[0-9]" class="form-control" id="echs<?= $i ?>Qte" name="echantillon<?= $i ?>Qte">
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" name="checkSaisie" type="checkbox" role="switch" id="switchSaisie">
                    <label class="form-check-label" id="switchSaisie" for="switchSaisie">Saisie définitive</label>
                </div>
                <div class="row justify-content-start">
                    <div class="col-2">
                        <button type="submit" class="btn btn-primary">Valider le rapport</button>
                    </div>
                    <div class="col-2">
                        <button type="reset" class="btn btn-secondary">Réinitialiser le rapport</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="assets/js/js_rap.js"></script>