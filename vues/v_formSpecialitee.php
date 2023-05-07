<div class="container-fluid">

    <form action="index.php?uc=médecins&action=ajouterSpe&pranum=<?php echo $info['PRA_NUM'] ?>" method="post">
        <div>
            <label for="spe">Spécialitée :</label>
            <select name="spe" id="spe" required>

                <option value="" hidden>Choisir une spécialitée</option>
                <?php
                foreach ($allSpe as $uneSpe) {
                ?>
                    <option value="<?php echo $uneSpe['SPE_CODE'] ?>"><?php echo $uneSpe['SPE_LIBELLE'] ?></option>
                <?php
                }
                ?>
            </select>
        </div>

        <div>
            <label for="diplome">Diplome :</label>
            <input type="text" name="diplome" id="diplome" value="">
        </div>

        <input type="submit" value="Ajouter">
    </form>

</div>