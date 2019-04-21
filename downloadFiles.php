<?php
include_once 'navbarSecondary.php';
$formErrors = array();
if (count($_POST) > 0) {
    if (!empty($_POST['photoName'])) {
        // Je vérifie bien que ma variable $_POST['lastName'] correspond à ma patternName.
            // On stocke dans la variable lastName la variable $_POST['lastName'] dont on a désactivé les balises HTML.
            $photoName = htmlspecialchars($_POST['photoName']);
    } else {
        // On va réutiliser notre erreur lastName parce que les deux ne peuvent pas exister en même temps.
        $formErrors['photoName'] = 'Veuillez renseigner votre nom de photo';
    }
    if (!empty($_FILES['file']) && $_FILES['file']['error'] == 0) {
        // On stock dans $fileInfos les informations concernant le chemin du fichier.
        $fileInfos = pathinfo($_FILES['file']['name']);
        // On crée un tableau contenant les extensions autorisées.
        $fileExtension = ['jpeg', 'jpg', 'JPG'];
        // On verifie si l'extension de notre fichier est dans le tableau des extension autorisées.
        if (in_array($fileInfos['extension'], $fileExtension)) {
            //On définit le chemin vers lequel uploader le fichier
            $path = 'uploads/';
            //On crée une date pour différencier les fichiers
            $date = date('Y-m-d_H-i-s');
            //On crée le nouveau nom du fichier (celui qu'il aura une fois uploadé)
            $fileNewName = $photoName . '_' . $date;
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
}
?>

<?php if (count($_POST) == 0 || count($formErrors) > 0) {
    ?>
    <form method="POST" action="downloadFiles.php" enctype="multipart/form-data">
        <div class="form-group testo">
            <label for="photoName">Nom de la photo</label>
            <?php
            /* On donne en valeur à notre input ce qui a été saisi par notre utilisateur . ça permet à l'utilisateur de ne pas ressaisir ses données en cas d'erreur
             * isset($_POST['lastName']) ? $_POST['lastName'] : ''
             * Si $_POST['lastName'] existe (?) alors on affiche $_POST['lastName'] (:) Sinon on affiche rien.
             */
            ?>
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
        <div class="form-group">
            <div class="form-group">
                <label for="file">Fichier (.jpg ou .jpeg)</label>
                <input class="form-control" type="file" name="file" id="file" />
            </div>
            <?php if (isset($formErrors['file'])) { ?>
                <div class="alert-danger">
                    <p><?= $formErrors['file'] ?></p>
                </div>
            <?php } ?>
        </div>
        <input type="submit" name="submit" value="Envoyer" class="btn btn-primary" />
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
    <div class="alert-success">
        <p>Vos données ont bien été envoyées et votre fichier a bien été transmis.</p>
    </div>
    <div class="well jumbotron">
        <p>
            Fichier : <?= $fileInfos['filename'] ?><br />
            Extension : <?= $fileInfos['extension'] ?> <br />
            Votre fichier : <a href="<?= $fileFullPath ?>" title="Lien vers le fichier" target="_blank"><?= $fileNewName ?></a>
        </p>
        <a href="downloadFiles.php" title="Retour vers le formulaire" class="btn btn-info">Ajouter un nouvel utilisateur</a>
    </div>

<?php } ?>
<?php include_once 'footerSecondary.php'; ?>
