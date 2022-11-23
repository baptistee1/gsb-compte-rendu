<section class="bg-light">
    <div class="container">
        <div class="structure-hero pt-lg-5 pt-4">
            <h1 class="titre text-center">Informations rapport <span class="carac"></span></h1>
        </div>
        <div class="row align-items-center justify-content-center">
            <div class="test col-12 col-sm-8 col-lg-6 col-xl-5 col-xxl-4 py-lg-5">
                <img class="img-fluid" src="assets/img/rapport.jpg">
            </div>
            <?php
            foreach($rapports as $rapport){
                ?>
            <div class="test col-12 col-sm-8 col-lg-6 col-xl-5 col-xxl-4 py-lg-5 py-3">
                <div class="formulaire">

                    <p><span class="carac">Numéro de rapport</span> : <?php echo $rapport['RAP_NUM'] ?></p>
                    <p><span class="carac">Numéro du praticien</span> : <?php echo $rapport['PRA_NUM'] ?></p>
                    <p><span class="carac">Nom du praticien</span> : <?php echo $rapport['PRA_NOM'] ?></p>
                    <p><span class="carac">Motif</span> : <?php echo $rapport['MOT_libelle'] ?></p>
                    <p><span class="carac">Date de saisie</span> : <?php echo $rapport['RAP_DATESAISIE'] ?></p>
                    <p><span class="carac">Code medicament 1</span> : <?php echo $rapport['MED_DEPOTLEGAL_1'] ?></p>
                    <p><span class="carac">Nom du medicament 1</span> : <?php echo $rapport['nomMed1'] ?></p>
                    <p><span class="carac">Code medicament 2</span> : <?php echo $rapport['MED_DEPOTLEGAL_2'] ?></p>
                    <p><span class="carac">Nom du medicament 2</span> : <?php echo $rapport['nomMed2'] ?></p>
                    <input class="btn btn-info text-light valider col-6 col-sm-5 col-md-4 col-lg-3" type="button" onclick="history.go(-1)" value="Retour">
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>