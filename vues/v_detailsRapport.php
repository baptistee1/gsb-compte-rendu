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
                                <input type="text" class="form-control-plaintext" name="matricule" id="matricule" value="<?= $rapport['COL_MATRICULE'] ?>" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row mt-3">
                            <label for="motif1" class="col-sm-4 col-form-label">Motif* :</label>
                            <div class="col-sm-8">
                                <div>
                                    <input type="text" class="form-control-plaintext" name="motLib" id="motLib" value="<?= $rapport['MOT_LIBELLE'] ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <?php if ($rapport['MOT_LIBELLE'] == "Autre") {?>
                        <div class="mb-3 row mt-3" id="divMotif2" >
                            <label for="motif2" class="col-sm-4 col-form-label">Motif autre :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="motif2" value="<?= $rapport['RAP_MOTIFAUTRE'] ?>" id="motif2" required readonly>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="mb-3 row mt-3">
                            <label for="dateVisite" class="col-sm-4 col-form-label">Date de la visite :</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" name="dateVisite" value="<?= $rapport['RAP_DATEVISITE'] ?>" id="dateVisite" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row mt-3">
                            <label for="dateSaisie" class="col-sm-4 col-form-label">Date de la saisie* :</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" name="dateSaisie" value="<?= $rapport['RAP_DATESAISIE'] ?>" id="dateSaisie" required readonly>
                            </div>
                        </div>
                        <div class="mb-3 row mt-3">
                            <label for="praticien" class="col-sm-4 col-form-label">Nom du praticien* :</label>
                            <div class="col-sm-8">
                                <div>
                                    <a href='index.php?uc=praticiens&action=afficherpratic&praticien=<?= $rapport['PRA_NOM'] ?>'>
                                        <input type="text" class="form-control-plaintext" name="praNom" id="praNom" value="<?= $rapport['PRA_NOM'] ?>" readonly>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card col">
                        <div class="mb-3 row mt-3">
                            <label for="praticienRemp" class="col-sm-4 col-form-label">Nom du praticien remplaçant :</label>
                            <div class="col-sm-8">
                                <div>
                                    <a href='index.php?uc=praticiens&action=afficherpratic&praticien=<?= $rapport['PRA_NOM'] ?>'>
                                        <input type="text" class="form-control-plaintext" name="praNom" id="praNom" value="<?= $rapport['PRA_NOM'] ?>" readonly>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row mt-3">
                            <label for="bilan" class="col-sm-4 col-form-label">Bilan :</label>
                            <div class="col-sm-8">
                                <div>
                                    <?php if (!empty($rapport['RAP_BILAN'])) {?>
                                        <input type="text" class="form-control-plaintext" name="bilan" id="bilan" value="<?= $rapport['RAP_BILAN'] ?>" readonly>
                                    <?php } else {?>
                                        <input type="text" class="form-control-plaintext" name="bilan" id="bilan" value="<?= 'Pas de bilan !' ?>" readonly>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row mt-3">
                            <label for="med11" class="col-sm-4 col-form-label">Premier médicament présenté :</label>
                            <div class="col-sm-8">
                                <div>
                                    <a href='index.php?uc=medicaments&action=affichermedoc&medicament=<?= $med1['MED_DEPOTLEGAL'] ?>'>
                                        <input type="text" class="form-control-plaintext" name="medicament1" id="medicament1" value="<?= $rapport['medicament1'] ?>" readonly>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row mt-3">
                            <label for="med2" class="col-sm-4 col-form-label">Deuxième médicament présenté :</label>
                            <div class="col-sm-8">
                                <div>
                                    <a href='index.php?uc=medicaments&action=affichermedoc&medicament=<?= $med2['MED_DEPOTLEGAL'] ?>'>
                                        <input type="text" class="form-control-plaintext" name="medicament2" id="medicament2" value="<?= $rapport['medicament2'] ?>" readonly>
                                    </a>
                                </div>
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
                                        <input type="text" placeholder="Nom du médicament" list="medicamentsList" class="form-control" id="echs<?= $i ?>" name="echantillon<?= $i ?>Name" readonly>
                                        <datalist id="medicamentsList">
                                            <?php
                                            foreach ($medicaments as $medicament) {
                                            ?>
                                                <option value="<?= $medicament['MED_DEPOTLEGAL'] ?>"><?= $medicament['MED_NOMCOMMERCIAL'] ?> </option>
                                            <?php
                                            }
                                            ?>
                                        </datalist>
                                        <input type="text" placeholder="Quantité" pattern="[0-9]{3}" class="form-control" id="echs<?= $i ?>Qte" name="echantillon<?= $i ?>Qte" readonly>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="assets/js/js_rap.js"></script>