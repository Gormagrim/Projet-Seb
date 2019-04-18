<?php
include_once 'navbarSecondary.php';
$page = $_SERVER['PHP_SELF'];
?>
<form>
    <div class="row form-row connection">
        <div class="form-group offset-1 col-10 offset-sm-4 col-sm-4 offset-md-4 col-md-4 offset-lg-4 col-lg-4">
            <div class="formConnection">
                <h2>Connexion</h2>
                <label for="mail">Adresse mail :</label>
                <input type="email" class="form-control" id="mail" placeholder="exemple@mail.com">
                <label for="password">Mot de passe :</label>
                <input type="password" class="form-control" id="password" placeholder="Mot de passe">
                <p><a class="lostPassword" href="#">mot de passe oublié ?</a></p>
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-outline-warning registrationBtn connectionBtn" onclick="javascript:location.href = 'particularUser.php'">Se Connecter</button>
</form>


<?php include_once 'footerSecondary.php'; ?>