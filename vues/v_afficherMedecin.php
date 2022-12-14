<div class="container-fluid">
    <div class="card mb-1">
        <div class="card-header text-center fw-bold">
            Formulaire de medecin
        </div>
        <form action="index.php?uc=rapports&action=choixRapp" method="POST">
        <div class="card-body">
                <div class="row justify-content-center gap-2 m-1">
                    <div class="card col">
                    <label for="matricule" class="col-sm-4 col-form-label">Numéro praticien :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control-plaintext" name="pranum" id="matricule" list="matriculeList" value="<?= $numpra ?>" readonly>
                            </div>
                    </div>
                </div>
        </div>
        </form>