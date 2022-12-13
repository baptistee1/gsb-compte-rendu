<section class="bg-light">
    <div class="container">
        <div class="structure-hero pt-lg-5 pt-4">
            <h1 class="titre text-center">Consulter ses medecins</h1>
            <p class="text text-center">
                Formulaire permettant d'afficher les medecins.
            </p>
        </div>
        <div class="row align-items-center justify-content-center">
            <div class="test col-12 col-sm-8 col-lg-6 col-xl-5 col-xxl-4 py-lg-5">
                <img class="img-fluid size-img-page" src="assets/img/rapport.jpg">
            </div>
            <div class="test col-12 col-sm-8 col-lg-6 col-xl-5 col-xxl-4 py-lg-5 py-3">




            <form action="index.php?uc=médecins&action=afficherMedecin" method="post" class="formulaire-recherche col-12 m-0">
                    <label class="titre-formulaire" for="listepratic">Vos medecins:</label>

                        <select name="matricule" class="form-select mt-3">
                        <option value class="text-center">- Choisissez un medecin -</option>
                        <?php
                        foreach ($result as $key) {
                            echo '<option value="' . $key['PRA_NUM'] . '" class="form-control">' . $key['PRA_NOM'] . ' - ' . $key['PRA_PRENOM'] . '</option>';
                        }
                        ?>
                        </select>
                    <input class="btn btn-info text-light valider" type="submit" value="Afficher les informations">
                </form>
    </div>
</section>