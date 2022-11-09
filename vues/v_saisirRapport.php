<div class="container-fluid">
    <div class="card">
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
                        <label for="date" class="col-sm-4 col-form-label">Date de la visite :</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" id="date">
                        </div>
                    </div>
                    <div class="mb-3 row mt-3">
                        <label for="bilan" class="form-label">Bilan :</label>
                        <div class="col-sm-12">
                            <textarea class="form-control" id="bilan" rows="5"></textarea>
                        </div>
                    </div>
                </div>
                <div class="card col">
                    <div class="mb-3 row mt-3">
                        <label for="date" class="col-sm-4 col-form-label">Motif</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" id="date">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>