<section class="bg-light">
    <div class="container">
        <div class="structure-hero pt-lg-5 pt-4">
            <h1 class="titre text-center">Gérer ses medecins</h1>
        </div>
        <div class="row align-items-center justify-content-center">
            <div class="test col-12 col-sm-8 col-lg-6 col-xl-5 col-xxl-4 py-lg-5">
                <img class="img-fluid size-img-page" src="assets/img/praticien.jpg">
            </div>
            <div class="test col-12 col-sm-8 col-lg-6 col-xl-5 col-xxl-4 py-lg-5 py-3">




                <form action="index.php?uc=m%C3%A9decins&action=GererMedecin" method="post" class="formulaire-recherche col-12 m-0">
                    <label class="titre-formulaire" for="listepratic">Vos medecins:</label>

                    <select name="matricule" class="form-select mt-3">
                        <option hidden class="text-center">- Choisissez un medecin -</option>
                        <?php
                        foreach ($result as $key) {
                            echo '<option value="' . $key['PRA_NUM'] . '" class="form-control">' . $key['PRA_NOM'] . ' - ' . $key['PRA_PRENOM'] . '</option>';
                        }
                        ?>
                    </select>
                    <input class="btn btn-info text-light valider" type="submit" value="Gérer">
                </form>
            </div>
</section>