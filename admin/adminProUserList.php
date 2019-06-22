<?php
include_once 'navbarAdmin.php';
require_once '../regex.php';
include_once '../models/database.php';
include_once '../models/particularUsers.php';
include_once '../models/production.php';
include_once '../controllers/adminProUserListCtrl.php';
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
                <h3>Actuellement <?= $countProfessionnalUser->user ?> entreprises et <?= $getNumberOfProduction->number ?> chantiers.</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 welcomePro">
                <table>
                    <thead>
                        <tr>
                            <th>Id User</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Entreprise</th>
                            <th>Leader</th>
                            <th>Siret</th>
                            <th>Employés</th>
                            <th>Photo Entreprise</th>
                            <th>Numéro de tel</th>
                            <th>Mail</th>
                            <th>Adresse</th>
                            <th>Code Postal</th>
                            <th>Ville</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($getProUserList as $user) { ?>
                            <tr>
                                <td><?= $user->id ?></td>
                                <td><?= $user->lastname ?></td>
                                <td><?= $user->firstname ?></td>
                                <td><?= $user->name ?></td>
                                <td><?= $user->leader ?></td>
                                <td><?= $user->siret ?></td>
                                <td><?= $user->numberOfEmploy ?></td>
                                <td><?= isset($user->presentationPhoto) ? 'Oui' : 'Non' ?></td>
                                <td><?= $user->phoneNumber ?></td>
                                <td><?= $user->mail ?></td>
                                <td><?= $user->address ?></td>
                                <td><?= $user->zipcode ?></td>
                                <td><?= $user->city ?></td>
                                <td><a href="adminProUserList.php?id=<?= $user->id ?>">Supprimer le compte</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include_once 'footerAdmin.php'; ?>