<?php
include_once 'navbarAdmin.php';
require_once '../regex.php';
include_once '../models/database.php';
include_once '../models/particularUsers.php';
include_once '../controllers/adminPartUserListCtrl.php';
?>
<div class="row">
    <div class="bigCompanyCard col-12col-sm-12 col-md-12 col-lg-12 userCards">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 topSite welcomePro">
                <h2>Liste des utilisateurs particuliers</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <h3>Actuellement <?= $countParticularUser->user ?> utilisateurs particuliers.</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 topSite welcomePro">
                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Numéro de tel</th>
                            <th>Mail</th>
                            <th>Adresse</th>
                            <th>Code Postal</th>
                            <th>Ville</th>
                            <th>Compte actif</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($particularUsersList as $user) { ?>
                            <tr>
                                <td><?= $user->id ?></td>
                                <td><?= $user->lastname ?></td>
                                <td><?= $user->firstname ?></td>
                                <td><?= $user->phoneNumber ?></td>
                                <td><?= $user->mail ?></td>
                                <td><?= $user->address ?></td>
                                <td><?= $user->zipcode ?></td>
                                <td><?= $user->city ?></td>
                                <td><?= $user->active ?></td>
                                <?php if($user->active == 1) { ?>
                                <td><a href="adminPartUserList.php?idDesactive=<?= $user->id ?>">Desactiver le compte</a></td>
                                <?php } else { ?>
                                <td><a href="adminPartUserList.php?id=<?= $user->id ?>">Activer le compte</a></td>
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