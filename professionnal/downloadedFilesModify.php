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
include_once '../controllers/downloadedFilesModifyCtrl.php';
include_once '../regex.php';


if (count($_POST) == 0 || count($formErrors) > 0) {
    ?>
    <div class="row">
        <div class="bigCompanyCard col-12 offset-sm-2 col-sm-8 offset-md-2 col-md-8 offset-lg-2 col-lg-8 photoUpload">
            <h2><span class="orange">.</span>Modifier une réalisation</h2>
            <form method="POST" action="downloadedFilesModify.php?id=<?= $production->id ?>" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group col-12 col-sm-12 col-md-12 col-lg-12">
                        <label for="produtionName"><span class="orange">.</span>Nom du chantier</label>
                        <input type="text" value="<?= count($formErrors) > 0 ? htmlspecialchars($_POST['produtionName']) : $getProductionInfo->title ?>" name="produtionName" class="form-control" id="produtionName" placeholder="Nom du chantier" required />
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
                        <textarea class="form-control" name="explanatoryText" id="explanatoryText" required><?= count($formErrors) > 0 ? htmlspecialchars($_POST['explanatoryText']) : $getProductionInfo->descriptionText ?></textarea>
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
                        <label for="file"><span class="orange">.</span>Fichier (.png, .jpg ou .jpeg)</label>
                        <input class="form-control" type="file" name="file" id="file" value=""/>
                        <?php if (isset($formErrors['file'])) { ?>
                            <div class="alert-danger">
                                <p><?= $formErrors['file'] ?></p>
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
                        <label for="photoDescription"><span class="orange">.</span>Description de la photo</label>
                        <input type="text" value="<?= count($formErrors) > 0 ? htmlspecialchars($_POST['photoDescription']) : $getProductionInfo->description ?>" name="photoDescription" class="form-control" id="photoDescription" placeholder="Description de la photo" required />
                        <?php
                        // On affiche un alerte rouge qui contient le texte de l'erreur s'il y en à une.
                        if (isset($formErrors['photoDescription'])) {
                            ?>
                            <div class="alert-danger">
                                <p><?= $formErrors['photoDescription'] ?></p>
                            </div>
                        <?php } ?>
                    </div>

                </div>
                <input type="submit" name="submit" value="Envoyer" class="btn btn-outline-warning registrationBtn" />
            </form>
        </div>
    </div>
    <button type="button" class="btn registrationBtn useraccountModify" onclick="history.go(-1)">Retour</button>
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
            <p>Votre chantier a bien été modifié.</p>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 firstCard">
            <a href="downloadFiles.php" title="Retour vers le formulaire" class="btn btn-info realisationBtn">Ajouter une nouvelle réalisation</a>
        </div>
    </div>
<?php } ?>



<?php include_once '../footerSecondary.php'; ?>
/

