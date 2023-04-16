<div class="container-fluid">

    <form action="index.php?uc=médecins&action=modifierMedecin" method="post">
        <div>
            <label for="numeroPra">Numéro :</label>
            <input type="text" name="numeroPra" id="numeroPra" value="<?php echo $info['PRA_NUM'] ?>">
        </div>

        <div>
            <label for="nomPra">Nom :</label>
            <input type="text" name="nomPra" id="nomPra" value="<?php echo $info['PRA_NOM'] ?>">
        </div>

        <div>
            <label for="prenomPra">Prenom :</label>
            <input type="text" name="prenomPra" id="prenomPra" value="<?php echo $info['PRA_PRENOM'] ?>">
        </div>

        <div>
            <label for="adressePra">Adresse :</label>
            <input type="text" name="adressePra" id="adressePra" value="<?php echo $info['PRA_ADRESSE'] ?>">
        </div>

        <div>
            <label for="CPPra">CP :</label>
            <input type="text" name="CPPra" id="CPPra" value="<?php echo $info['PRA_CP'] ?>">
        </div>

        <div>
            <label for="villePra">Ville :</label>
            <input type="text" name="villePra" id="villePra" value="<?php echo $info['PRA_VILLE'] ?>">
        </div>

        <div>
            <label for="coefNotorietePra">COEF Notoriete :</label>
            <input type="number" name="coefNotorietePra" id="coefNotorietePra" value="<?php echo $info['PRA_COEFNOTORIETE'] ?>">
        </div>

        <div>
            <label for="typePra">Type :</label>
            <select name="typePra" id="typePra">
                <?php
                $allType = getAllType();

                if (!empty($info['TYP_CODE'])) {
                ?>
                    <option selected hidden value="<?php echo $info['TYP_CODE'] ?>"><?php echo $info['TYP_LIBELLE'] ?></option>
                <?php
                }
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
            <input type="number" name="coefConfPra" id="coefConfPra" value="<?php echo $info['PRA_COEFFCONFIANCE'] ?>">
        </div>

        <div>
            <label for="coefPrescPra">COEF Prescription :</label>
            <input type="number" name="coefPrescPra" id="coefPrescPra" value="<?php echo $info['PRA_COEFPRESCRIPTION'] ?>">
        </div>

        <div>
            <label for="RegPra">Region :</label>
            <select name="RegPra" id="RegPra">
                <?php
                $allReg = getAllReg();

                if (!empty($info['REG_CODE'])) {
                ?>
                    <option selected hidden value="<?php echo $info['REG_CODE'] ?>"><?php echo $info['REG_NOM'] ?></option>
                <?php
                }

                foreach ($allReg as $uneReg) {
                ?>
                    <option value="<?php echo $uneReg['REG_CODE'] ?>"><?php echo $uneReg['REG_NOM'] ?></option>
                <?php
                }
                ?>

                <input type="submit" value="valider">
            </select>

        </div>


    </form>

</div>