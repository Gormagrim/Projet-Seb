<?php
session_start();
include_once 'navbarProfessionnal.php';
include_once '../TestBaseDeDonnées.php';
$formErrors = array();
if (count($_POST) > 0) {
    if (!empty($_POST['estimateName'])) {
        // Je vérifie bien que ma variable $_POST['lastName'] correspond à ma patternName.
        // On stocke dans la variable lastName la variable $_POST['lastName'] dont on a désactivé les balises HTML.
        $estimateName = htmlspecialchars($_POST['estimateName']);
    } else {
        // On va réutiliser notre erreur lastName parce que les deux ne peuvent pas exister en même temps.
        $formErrors['estimateName'] = 'Veuillez renseigner le nom de votre devis';
    }
    if (!empty($_FILES['file']) && $_FILES['file']['error'] == 0) {
        // On stock dans $fileInfos les informations concernant le chemin du fichier.
        $fileInfos = pathinfo($_FILES['file']['name']);
        // On crée un tableau contenant les extensions autorisées.
        $fileExtension = ['pdf', 'PDF'];
        // On verifie si l'extension de notre fichier est dans le tableau des extension autorisées.
        if (in_array($fileInfos['extension'], $fileExtension)) {
            //On définit le chemin vers lequel uploader le fichier
            $path = 'uploads/';
            //On crée une date pour différencier les fichiers
            $date = date('Y-m-d_H-i-s');
            //On crée le nouveau nom du fichier (celui qu'il aura une fois uploadé)
            $fileNewName = $estimateName . '_' . $date;
            //On stocke dans une variable le chemin complet du fichier (chemin + nouveau nom + extension une fois uploadé) Attention : ne pas oublier le point
            $fileFullPath = $path . $fileNewName . '.' . $fileInfos['extension'];
            //move_uploaded_files : déplace le fichier depuis son emplacement temporaire ($_FILES['file']['tmp_name']) vers son emplacement définitif ($fileFullPath)
            if (move_uploaded_file($_FILES['file']['tmp_name'], $fileFullPath)) {
                //On définit les droits du fichiers uploadé (Ici : écriture et lecture pour l'utilisateur apache, lecture uniquement pour le groupe et tout le monde)
                chmod($fileFullPath, 0744);
            } else {
                $formErrors['file'] = 'Votre fichier ne s\'est pas téléversé correctement';
            }
        } else {
            $formErrors['file'] = 'Votre fichier n\'est pas du format attendu';
        }
    } else {
        $formErrors['file'] = 'Veuillez selectionner un fichier';
    }
    if (!empty($_POST['explanatoryText'])) {
        // Je vérifie bien que ma variable $_POST['lastName'] correspond à ma patternName.
        // On stocke dans la variable lastName la variable $_POST['lastName'] dont on a désactivé les balises HTML.
        $explanatoryText = htmlspecialchars($_POST['explanatoryText']);
    } else {
        // On va réutiliser notre erreur lastName parce que les deux ne peuvent pas exister en même temps.
        $formErrors['explanatoryText'] = 'Veuillez renseigner un descriptif à votre réalisation';
    }
}
?>
    <?php if (count($_POST) == 0 || count($formErrors) > 0) {
        ?>
        <div class="row">
            <div class="bigCompanyCard col-12 offset-sm-2 col-sm-8 offset-md-2 col-md-8 offset-lg-2 col-lg-8 photoUpload">
                <h2><span class="orange">.</span>Envoyer un devis</h2>
                <form method="POST" action="sendEstimate.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="estimateName"><span class="orange">.</span>Nom du devis</label>
                        <?php
                        /* On donne en valeur à notre input ce qui a été saisi par notre utilisateur . ça permet à l'utilisateur de ne pas ressaisir ses données en cas d'erreur
                         * isset($_POST['lastName']) ? $_POST['lastName'] : ''
                         * Si $_POST['lastName'] existe (?) alors on affiche $_POST['lastName'] (:) Sinon on affiche rien.
                         */
                        ?>
                        <input type="text" value="<?= isset($_POST['estimateName']) ? $_POST['estimateName'] : '' ?>" name="estimateName" class="form-control" id="estimateName" placeholder="Exemple" required />
                        <?php
                        // On affiche un alerte rouge qui contient le texte de l'erreur s'il y en à une.
                        if (isset($formErrors['estimateName'])) {
                            ?>
                            <div class="alert-danger">
                                <p><?= $formErrors['estimateName'] ?></p>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="file"><span class="orange">.</span>Fichier (.pdf)</label>
                            <input class="form-control" type="file" name="file" id="file" />
                        </div>
                        <?php if (isset($formErrors['file'])) { ?>
                            <div class="alert-danger">
                                <p><?= $formErrors['file'] ?></p>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label for="explanatoryText"><span class="orange">.</span>Message d'accompagnement</label>
                        <textarea class="form-control" name="explanatoryText" id="explanatoryText" required><?= isset($_POST['explanatoryText']) ? $_POST['explanatoryText'] : '' ?></textarea>
                        <?php if (isset($formErrors['explanatoryText'])) {
                            ?>
                            <div class="alert-danger">
                                <p><?= $formErrors['explanatoryText'] ?></p>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label for="sendToPartUser"><span class="orange">.</span>Envoyer à :</label>
                        <?php
                        ?>
                        <input type="text" value="<?= isset($_POST['sendToPartUser']) ? $_POST['sendToPartUser'] : '' ?>" name="sendToPartUser" class="form-control" id="sendToPartUser" placeholder="Exemple" required />
                        <?php
                        // On affiche un alerte rouge qui contient le texte de l'erreur s'il y en à une.
                        if (isset($formErrors['sendToPartUser'])) {
                            ?>
                            <div class="alert-danger">
                                <p><?= $formErrors['sendToPartUser'] ?></p>
                            </div>
                        <?php } ?>
                    </div>
                    <input type="submit" name="submit" value="Envoyer" class="btn btn-outline-warning registrationBtn" />
                </form>
                <?php
            } else {
                ?>
                <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10 firstCard">
                    <div class="alert-success realisationTop">
                        <p>Vos données ont bien été envoyées et votre fichier a bien été transmis.</p>
                    </div>
                    
                </div>
            <?php } ?>
        </div>
    </div>


<?php include_once '../footerSecondary.php'; ?>

