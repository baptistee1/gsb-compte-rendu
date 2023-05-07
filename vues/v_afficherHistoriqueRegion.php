<table class="table">
    <tr>
        <th>Numéro de rapport</th>
        <th>Nom du visiteur</th>
        <th>Numéro praticien</th>
        <th>Nom praticien</th>
        <th>Motif de la visite</th>
        <th>Date de la visite</th>
        <th>Medicament 1</th>
        <th>Libelle 1</th>
        <th>Medicament 2</th>
        <th>Libelle 2</th>
    </tr>

    <?php
    foreach ($historiques as $uneLigne) {
    ?>
        <tr>
            <td><?php echo $uneLigne['RAP_NUM'] ?></td>
            <td><?php echo $uneLigne['COL_NOM'] ?></td>
            <td><?php echo $uneLigne['PRA_NUM'] ?></td>
            <td><a href="index.php?uc=praticiens&action=afficherpratic&praticien=<?= $uneLigne['PRA_NOM'] ?>"><?php echo $uneLigne['PRA_NOM'] ?></a></td>
            <td><?php echo $uneLigne['RAP_DATEVISITE'] ?></td>
            <td><?php echo $uneLigne['MOT_LIBELLE'] ?></td>
            <td><a href="index.php?uc=medicaments&action=affichermedoc&medicament=<?= $uneLigne['MED_DEPOTLEGAL_1'] ?>"><?php echo $uneLigne['MED_DEPOTLEGAL_1'] ?></a></td>
            <td><?php echo $uneLigne['nomMed1'] ?></td>
            <td><a href="index.php?uc=medicaments&action=affichermedoc&medicament=<?= $uneLigne['MED_DEPOTLEGAL_2'] ?>"><?php echo $uneLigne['MED_DEPOTLEGAL_2'] ?></a></td>
            <td><?php echo $uneLigne['nomMed2'] ?></td>
            <td><a href="">détail</a></td>
        </tr>

    <?php
    }
    ?>
</table>