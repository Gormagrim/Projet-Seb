<?php
session_start();
include_once 'navbarProfessionnal.php';
require_once '../regex.php';
include_once '../models/database.php';
include_once '../models/particularUsers.php';
include_once '../models/city.php';
include_once '../models/company.php';
include_once '../models/photo.php';
include_once '../models/production.php';
include_once '../models/type.php';
include_once '../models/category.php';
include_once '../models/typeOfProduction.php';
include_once '../controllers/downloadFilesCtrl.php';


if (count($_POST) == 0 || count($formErrors) > 0) {
    ?>
    <div class="row">
        <div class="bigCompanyCard col-12 offset-sm-2 col-sm-8 offset-md-2 col-md-8 offset-lg-2 col-lg-8 photoUpload">
            <h2><span class="orange">.</span>Ajouter une réalisation</h2>
            <form method="POST" action="downloadFiles.php" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group col-12 col-sm-12 col-md-12 col-lg-12">
                        <label for="produtionName"><span class="orange">.</span>Nom du chantier</label>
                        <input type="text" value="<?= isset($_POST['produtionName']) ? $_POST['produtionName'] : '' ?>" name="produtionName" class="form-control" id="produtionName" placeholder="Nom du chantier" required />
                        <?php
                        // On affiche un alerte rouge qui contient le texte de l'erreur s'il y en à une.
                        if (isset($formErrors['produtionName'])) {
                            ?>
                            <div class="alert-danger">
                                <p><?= $formErrors['produtionName'] ?></p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12 col-sm-12 col-md-12 col-lg-12">
                        <label for="explanatoryText"><span class="orange">.</span>Descriptif du chantier</label>
                        <textarea class="form-control" name="explanatoryText" id="explanatoryText" required><?= isset($_POST['explanatoryText']) ? $_POST['explanatoryText'] : '' ?></textarea>
                        <?php if (isset($formErrors['explanatoryText'])) {
                            ?>
                            <div class="alert-danger">
                                <p><?= $formErrors['explanatoryText'] ?></p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12 col-sm-6 col-md-6 col-lg-6">
                        <label for="photoName"><span class="orange">.</span>Nom de la photo</label>
                        <input type="text" value="<?= isset($_POST['photoName']) ? $_POST['photoName'] : '' ?>" name="photoName" class="form-control" id="photoName" placeholder="Exemple" required />
                        <?php
                        // On affiche un alerte rouge qui contient le texte de l'erreur s'il y en à une.
                        if (isset($formErrors['photoName'])) {
                            ?>
                            <div class="alert-danger">
                                <p><?= $formErrors['photoName'] ?></p>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="form-group col-12 col-sm-6 col-md-6 col-lg-6">
                        <label for="file"><span class="orange">.</span>Fichier (.jpg ou .jpeg)</label>
                        <input class="form-control" type="file" name="file" id="file" />
                        <?php if (isset($formErrors['file'])) { ?>
                            <div class="alert-danger">
                                <p><?= $formErrors['file'] ?></p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12 col-sm-6 col-md-6 col-lg-6">
                        <label for="photoDescription"><span class="orange">.</span>Description de la photo</label>
                        <input type="text" value="<?= isset($_POST['photoDescription']) ? $_POST['photoDescription'] : '' ?>" name="photoDescription" class="form-control" id="photoDescription" placeholder="Description de la photo" required />
                        <?php
                        // On affiche un alerte rouge qui contient le texte de l'erreur s'il y en à une.
                        if (isset($formErrors['photoDescription'])) {
                            ?>
                            <div class="alert-danger">
                                <p><?= $formErrors['photoDescription'] ?></p>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="form-group col-12 col-sm-6 col-md-6 col-lg-6">
                        <label for="category"><span class="orange">.</span>Type de chantier</label>
                        <select class="form-control" name="category" id="category" required>
                            <?php foreach ($getCategory as $category) { ?>
                            <option value="<?= $category->id ?>"><?= $category->category ?></option>
                            <?php } ?>
                        </select>
                        
                        <select class="form-control" name="productionType" id="productionType" required>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12 col-sm-6 col-md-6 col-lg-6">
                        <label for="search">Ville</label>
                        <input list="navigateurs" class="form-control search <?= isset($formErrors['search']) ? 'is-invalid' : (isset($search) ? 'is-valid' : '') ?>" type="text" name="search" id="search" placeholder="Beauvais" value="<?= isset($_POST['search']) ? $_POST['search'] : '' ?>" required />
                        <datalist id="navigateurs" class="search"></datalist>
                        <?php if (isset($formErrors['search'])) {
                            ?>
                            <div class="invalid-feedback">
                                <p><?= $formErrors['search'] ?></p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <input class="form-control cityId" type="hidden" name="cityId" id="cityId" placeholder="" value=""  />  
                <input type="submit" name="submit" value="Ajouter un chantier" class="btn btn-outline-warning registrationBtn" />
            </form>
            <?php
            /* Pour l'affichage des données si tout a été validé
             * On affiche une alerte verte pour prévenir que l'utilisateur que tout s'est bien passé:
             * On affiche les variables lastname , firstname et title car elle contiennent la saisie de l'utilisateur si tout s'est bien passée
             * On utilise la balises br uniquement dans un p
             * On a ajouté un bouton de retour au formulaire pour simplifier la navigation.
             */
        } else {
            ?>
            <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10 firstCard">
                <div class="alert-success realisationTop">
                    <p>Vos données ont bien été envoyées et votre fichier a bien été transmis.</p>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 firstCard">
                    <div class="card mb-3">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="<?= $photo->photo ?>" class="card-img firstImg" title="Travaux de l'entreprise <?= $company->name ?>" alt="Exemple de travaux">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h4 class="card-title"><?= $company->name ?></h4>
                                    <h5 class="card-title"><?= $production->title ?></h5>
                                    <p class="card-text"><?= $production->descriptionText ?></p>
                                    <button type="button" class="btn btn-outline-warning registrationBtn cardBtn" onclick="javascript:location.href = '/entrepriseTest.php'">Voir plus</button>
                                    <div class="socialMedia">
                                        <a href="#"><i class="fas fa-sun fa-2x" title="J'aime"></i></a>
                                        <a href="#"><i class="fas fa-snowflake fa-2x" title="J'aime moins"></i></a>
                                        <a href="#"><i class="far fa-plus-square fa-2x" title="Ajouter aux favoris"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="downloadFiles.php" title="Retour vers le formulaire" class="btn btn-info realisationBtn">Ajouter une nouvelle réalisation</a>
                </div>
            </div>
        <?php } ?>
    </div>


    <?php include_once '../footerSecondary.php'; ?>
