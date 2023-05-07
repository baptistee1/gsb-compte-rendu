<div class="container-fluid">

    <form action="index.php?uc=médecins&action=confirmerMedecin" method="post">

        <div>
            <label for="nomPra">Nom :</label>
            <input type="text" name="nomPra" id="nomPra" value="">
        </div>

        <div>
            <label for="prenomPra">Prenom :</label>
            <input type="text" name="prenomPra" id="prenomPra" value="">
        </div>

        <div>
            <label for="adressePra">Adresse :</label>
            <input type="text" name="adressePra" id="adressePra" value="">
        </div>

        <div>
            <label for="CPPra">CP :</label>
            <input type="text" name="CPPra" id="CPPra" value="">
        </div>

        <div>
            <label for="villePra">Ville :</label>
            <input type="text" name="villePra" id="villePra" value="">
        </div>

        <div>
            <label for="coefNotorietePra">COEF Notoriete :</label>
            <input type="text" name="coefNotorietePra" id="coefNotorietePra" value="0">
        </div>

        <div>
            <label for="typePra">Type :</label>
            <select name="typePra" id="typePra">
                <option hidden value="">Choisir un type</option>
                <?php

                foreach ($allType as $unType) {

                ?>
                    <option value="<?php echo $unType['TYP_CODE'] ?>"><?php echo $unType['TYP_LIBELLE'] ?></option>
                <?php
                }
                ?>
            </select>
        </div>

        <div>
            <label for="coefConfPra">COEF Confiance :</label>
            <input type="text" name="coefConfPra" id="coefConfPra" value="0">
        </div>

        <div>
            <label for="coefPrescPra">COEF Prescription :</label>
            <input type="text" name="coefPrescPra" id="coefPrescPra" value="0">
        </div>

        <div>
            <label for="RegPra">Region :</label>
            <select name="RegPra" id="RegPra" required>
                <option hidden value="">Choisir une region</option>
                <?php

                foreach ($allReg as $uneReg) {
                ?>
                    <option value="<?php echo $uneReg['REG_CODE'] ?>"><?php echo $uneReg['REG_NOM'] ?></option>
                <?php
                }
                ?>
            </select>
        </div>

        <div>
            <label for="specialitee">Specialitée :</label>
            <select name="specialitee">
                <option value="">Choisir une spécialitée :</option>
                <?php
                foreach ($allSpe as $uneSpe) {
                ?>
                    <option value="<?php echo $uneSpe['SPE_CODE'] ?>"><?php echo $uneSpe['SPE_LIBELLE'] ?></option>
                <?php
                }
                ?>
            </select>
        </div>

        <input type="submit" value="Valider">

    </form>

</div>