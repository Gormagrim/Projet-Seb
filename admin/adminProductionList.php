<?php
include_once 'navbarAdmin.php';
require_once '../regex.php';
include_once '../models/database.php';
include_once '../models/particularUsers.php';
include_once '../models/production.php';
include_once '../controllers/adminProductionListCtrl.php';
?>
<div class="row">
    <div class="bigCompanyCard col-12col-sm-12 col-md-12 col-lg-12 userCards">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 topSite welcomePro">
                <h2>Liste des Entreprises</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <h3>Actuellement <?= $getNumberOfProduction->number ?> chantiers.</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 welcomePro">
                <table>
                    <thead>
                        <tr>
                            <th>Id Prod</th>
                            <th>Titre</th>
                            <th>Entreprise</th>
                            <th>Descriptions</th>
                            <th>Category</th>
                            <th>Photo</th>
                            <th>Description photo</th>
                            <th>Code Postal</th>
                            <th>Ville</th>
                            <th>Chantier actif</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($getProductionList as $prod) { ?>
                            <tr>
                                <td><?= $prod->id ?></td>
                                <td><?= $prod->title ?></td>
                                <td><?= $prod->name ?></td>
                                <td><?= isset($prod->descriptionText) ? 'Oui' : 'Non' ?></td>
                                <td><?= $prod->category ?> / <?= $prod->type ?></td>
                                <td><?= isset($prod->photo) ? 'Oui' : 'Non' ?></td>
                                <td><?= $prod->description ?></td>
                                <td><?= $prod->zipcode ?></td>
                                <td><?= $prod->city ?></td>
                                <td><?= $prod->active ?></td>
                                <?php if($prod->active == 1) { ?>
                                <td><a href="adminProductionList.php?idDesactive=<?= $prod->id ?>">Desactiver le chantier</a></td>
                                <?php } else { ?>
                                <td><a href="adminProductionList.php?id=<?= $prod->id ?>">Activer le chantier</a></td>
                                <?php } ?>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include_once 'footerAdmin.php'; ?>