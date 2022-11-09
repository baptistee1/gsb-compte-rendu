<div class="container-fluid">
    <div class="card mb-1">
        <div class="card-header text-center fw-bold">
            Formulaire de saisie d'un rapport de visite
        </div>
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
                                <option value=""> //ajouter les motifs via la base de données
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
                            <input type="text" class="form-control" id="praticien">
                        </div>
                    </div>
                </div>
                <div class="card col">
                    <div class="mb-3 row mt-3">
                        <label for="praticienRemp" class="col-sm-4 col-form-label">Numéro du praticien remplaçant :</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="praticienRemp">
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
        </div>
    </div>
</div>