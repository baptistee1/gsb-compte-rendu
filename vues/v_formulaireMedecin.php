<div class="container-fluid">

    <form action="" method="post">
        <div>
            <label for="numeroPra">Numéro :</label>
            <input type="text" name="numeroPra" id="numeroPra">
        </div>

        <div>
            <label for="nomPra">Nom :</label>
            <input type="text" name="nomPra" id="nomPra">
        </div>

        <div>
            <label for="prenomPra">Prenom :</label>
            <input type="text" name="prenomPra" id="prenomPra">
        </div>

        <div>
            <label for="adressePra">Adresse :</label>
            <input type="text" name="adressePra" id="adressePra">
        </div>

        <div>
            <label for="CPPra">CP :</label>
            <input type="text" name="CPPra" id="CPPra">
        </div>

        <div>
            <label for="villePra">Ville :</label>
            <input type="text" name="villePra" id="villePra">
        </div>

        <div>
            <label for="coefNotorietePra">COEF Notoriete :</label>
            <input type="number" name="coefNotorietePra" id="coefNotorietePra">
        </div>

        <div>
            <label for="typePra">Type :</label>
            <select name="typePra" id="typePra">
                <?php
                $allType = getAllType();
                var_dump($allType);
                foreach ($allType as $unType) {
                ?>
                    <option value="<?php $unType['TYP_CODE'] ?>"><?php echo $unType['TYP_LIBELLE'] ?></option>
                <?php
                }
                ?>
            </select>
        </div>

        <div>
            <label for="coefConfPra">COEF Confiance :</label>
            <input type="number" name="coefConfPra" id="coefConfPra">
        </div>

        <div>
            <label for="coefPrescPra">COEF Prescription :</label>
            <input type="number" name="coefPrescPra" id="coefPrescPra">
        </div>

        <div>
            <label for="RegPra">Region :</label>
            <select name="RegPra" id="RegPra">
                <?php
                $allReg = getAllReg();
                var_dump($allReg);
                foreach ($allReg as $uneReg) {
                ?>
                    <option value="<?php $uneReg['REG_CODE'] ?>"><?php echo $uneReg['REG_NOM'] ?></option>
                <?php
                }
                ?>

                <input type="submit" value="modifier">
            </select>
        </div>


    </form>

</div>