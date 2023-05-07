<div class="container-fluid">
    <div>
        <table border="1">
            <tr>
                <th>Liste des spécialitées :</th>
            </tr>

            <?php
            foreach ($spe as $maSpe) {
            ?>
                <tr>
                    <td><?php echo $maSpe['SPE_LIBELLE'] ?></td>
                    <td><a href="index.php?uc=médecins&action=supprimerSpe&pranum=<?php echo $info['PRA_NUM'] ?>&spe=<?php echo $maSpe['SPE_CODE'] ?>">Supprimer</a></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</div>