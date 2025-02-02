<?php 
session_start();
include_once 'navbar.php';
require_once 'models/database.php';
require_once 'models/particularUsers.php';
require_once 'models/production.php';
require_once 'controllers/indexCtrl.php';
?>
<div class="row">                
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 mainTitle separation"> 
       <h2 style="text-shadow:1px 1px 0 #ffa40d"><span class="orange">.</span>QUE PROPOSONS NOUS ?</h2>
    </div>
</div> <!-- Fin de div row -->
<div class="row">
    <div class="offset-1 col-10 offset-sm-2 col-sm-8 offset-md-3 col-md-6 offset-lg-3 col-lg-6 principalText"> 
        <p>La création de cet espace d'échange est parti d'un simple constat : <br />Comment trouver un professionnel du bâtiment fiable pour la réalisation de mes travaux?</p>
        <p>Comment être certain que la rénovation de ma salle de bain que je viens de confier à un chef d'entreprise que je n'ai vu que quelques heures va être conforme à mes attentes?</p>
        <p>Ce que nous vous proposons, c'est une plateforme de libre-échange entre particuliers et professionnels du bâtiment.</p>
        <p>Particuliers, vous trouverez de nombreux exemples de réalisations diverses et variées de professionnels proche de chez vous.</p>
        <p>Professionnels, augmentez votre visibilité en proposant vos plus belles réalisations et en les partageant avec vos futurs clients.</p>
        <h2 class="welcomeWord">Bienvenue chez izi<span class="orange">.</span>travaux<span class="orange">.</span>com !</h2>

    </div>
</div> <!-- fin de row principalText -->
<div class="row">
    <div class="col-12 col-sm-12 col-md-12 offset-lg-2 col-lg-3 nonProfessionnal">
        <h2><span class="orange">.</span>PARTICULIERS :</h2>
        <p>Vous souhaitez réaliser prochainement des travaux chez vous?</p>
        <p>Ou vous souhaitez simplement regarder ce que font les professionnels pour vous en inspirer ?</p>
        <p>Vous voulez comparer les réalisations et trouver le pro que vous cherchez ?</p>
        <p>Besoin d'un devis?</p>
        <p><span class="orangeText"><?= $countParticularUsers->user ?></span> particuliers sont inscris, rejoignez les !</p>
        <button type="button" class="btn registrationBtn" name="particular" onclick="javascript:location.href = 'inscription-particulier.html'">S'inscrire</button>
    </div>
    <div class="col-12 col-sm-12 col-md-12 offset-lg-2 col-lg-3 Professionnal">
        <h2><span class="orange">.</span>PROFESSIONNELS :</h2>
        <p>Vous êtes particulièrement fière de vos réalisations et souhaitez les partager?</p>
        <p>Augmentez votre visibilité et proposez vos services à de nouveaux clients?</p>
        <p>Venez exposer votre savoir-faire et gagner en renommée.</p>
        <p>Rejoignez l'une des plus grande communauté de votre région.</p>
        <p><span class="orangeText"><?= $countProfessionnalUser->user ?></span> entreprises sont déjà en ligne et <span class="orangeText"><?= $getNumberOfProduction->number ?></span> chantiers, n'attendez plus !</p>
        <button type="button" class="btn registrationBtn" name="professionnal" onclick="javascript:location.href = 'inscription-professionnel.html'">S'inscrire</button>
    </div>
</div>
<?php include_once 'footer.php'; ?>
