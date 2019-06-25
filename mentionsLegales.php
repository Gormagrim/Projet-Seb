<?php
session_start();
include_once 'models/database.php';
include_once 'models/particularUsers.php';
include_once 'controllers/cguCtrl.php';
include_once 'navbarSecondary.php';
$page = $_SERVER['PHP_SELF'];
?>

<div class="row">
    <div class="bigCompanyCard col-12 offset-sm-2 col-sm-8 offset-md-2 col-md-8 offset-lg-2 col-lg-8 userCards">
        <div class="row">
            <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10 userIdentity">
                <h2><span class="orange">.</span>Mentions légales</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10 userIdentity">
                <h3><span class="orange">.</span>EDITEUR</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10 userIdentity">
                <h4><span class="orange">.</span>an izi Company</h4>
                <p>26 rue Georges Brassens</p>
                <p>60170 PIMPREZ</p>
                <p>Tél: 06 21 25 47 18</p>
                <p>Mail: s.larrivee27@gmail.com</p>
                <p>Gérant: Sébastien LARRIVÉE</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10 userIdentity">
                <h3><span class="orange">.</span>HÉBERGEMENT</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10 userIdentity">
                <h4><span class="orange">.</span>OVH</h4>
                <p>2 rue Kellermann</p>
                <p>59100 ROUBAIX</p>
                <p>France</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10 userIdentity">
                <h3><span class="orange">.</span>GESTION DES COOKIES</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10 userIdentity">
                <p><span class="orange">.</span>izi.travaux.com n'utilise pas de cookie</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10 userIdentity">
                <h3><span class="orange">.</span>PROTECTION DES DONNÉES PERSONNELLES</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10 userIdentity">
                <p>La société an izi Company s’engage à respecter la règlementation générale sur la protection des données personnelles, article 2016/679 (UE) du 27 Avril 2016.</p>
                <p>Toutes les informations relatives au traitement des données personnelles collectées sont décrites sur la politique de confidentialité.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10 userIdentity">
                <h3><span class="orange">.</span>PROPRIÉTÉ INTELLECTUELLE ET INDISTRIELLE</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10 userIdentity">
                <p>Ce site internet est la propriété de an izi Company et de monsieur Sébastien LARRIVÉE.</p>
                <p>Les marques an izi Company et izi.travaux.com sont des enseignes déposées et protégées. Elles sont la propriété exclusive de leurs titulaires respectifs.</p>
                <p>Toute extraction, par transfert permanent ou temporaire, de la totalité ou d’une partie du contenu du présent site internet sur un autre support, par tout moyen ou sous toute forme que ce soit, ainsi que la réutilisation, par la mise à disposition du public de la totalité ou d’une partie du contenu du présent site internet, quelle qu’en soit la forme, est illicite. Tous les éléments (textes, commentaires, ouvrages, illustrations, logos, marques, vidéos et images, sans que cette liste soit limitative) affichés ou citées sur le présent site internet sont la propriété exclusive de leurs titulaires respectifs. Conformément au Code de la Propriété Intellectuelle, toute utilisation ou reproduction totale ou partielle desdits éléments effectuée à partir du présent site internet sans l’autorisation expresse et écrite de an izi Company est interdite.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10 userIdentity">
                <h3><span class="orange">.</span>DÉCHARGE DE RESPONSABILITÉ</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10 userIdentity">
                <p>an izi Company, et toutes les parties prenantes impliqués dans la création de ce site, n’assument aucune responsabilité relative à l’utilisation de la présente publication en ligne. A ce titre, ils ne peuvent être redevables à un utilisateur ou une autre partie, des dommages directs ou indirects, spéciaux, particuliers ou accessoires découlant de l’utilisation de ce site ou d’un autre site relié par un hyperlien.</p>
                <p>an izi Company s’engage à faire ses meilleurs efforts pour garantir un caractère fiable, pertinent, exact et exhaustif, mais ne saurait être tenue pour responsable des erreurs, d’une absence de disponibilité des informations et/ou de la présence de virus sur son site.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10 userIdentity">
                <h3><span class="orange">.</span>OBJECTIF ET QUALITÉ DES CONTENUS</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10 userIdentity">
                <p>Ce site a pour objectif la mise en relation des particuliers qui le souhaitent avec les professionnel du bâtiment et des travaux publics.</p>
                <p>La qualité des contenus mis en ligne est la responsabilité du professionnel, an izi Company et izi.travaux.com se réservent le droit de modifier ou de supprimer ce contenu s'il va à l'encontre des conditions générales d'utilisation du présent site.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10 userIdentity">
                <h3><span class="orange">.</span>RÉUTILISATION DES CONTENUS</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10 userIdentity">
                <p>Sauf mention contraire, la réutilisation de contenus de lamanu.fr est strictement interdite.</p>
            </div>
        </div>
    </div>
</div>
<button type="button" class="btn registrationBtn" onclick="history.go(-1)">Retour</button>

<?php include_once 'footerSecondary.php'; ?>
