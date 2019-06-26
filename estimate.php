<?php
session_start();
include_once 'navbarSecondary.php';
include_once 'TestBaseDeDonnées.php';
include_once 'function.php';
?>

<div class="w3-sidebar w3-bar-block w3-card w3-animate-left sideBarMenu" style="display:none" id="mySidebar">
        <button class="w3-bar-item slide-button w3-large slideMenuCloseBtn" onclick="slide_close()">Fermer le Menu &times;</button>
        <p><span class="orange">.</span>Recherches par :</p>
        <a href="/recherche-entreprise.html" class="w3-bar-item slide-button"><span class="orange">.</span>Entreprises</a>
        <a href="/recherche-travaux.html" class="w3-bar-item slide-button"><span class="orange">.</span>Réalisations</a>
        <a href="/recherche-secteur.html" class="w3-bar-item slide-button"><span class="orange">.</span>Secteurs</a>
        <p><span class="orange">.</span>Mon activité :</p>
        <a href="/estimate.php" class="w3-bar-item slide-button"><span class="orange">.</span>Mes devis</a>
        <a href="/userWorks.php" class="w3-bar-item slide-button"><span class="orange">.</span>Mes travaux</a>
        <a href="/userFavorites.php" class="w3-bar-item slide-button"><span class="orange">.</span>Mes favoris</a>
        <a href="/userContact.php" class="w3-bar-item slide-button"><span class="orange">.</span>Mes contacts</a>
        <p><a href="/mon-compte.html"><span class="orange">.</span>Mon compte</a></p>
    </div>
<div id="main">
    <div class="row">
        <div class="bigCompanyCard col-12 offset-sm-2 col-sm-8 offset-md-2 col-md-8 offset-lg-2 col-lg-8">
            <h2 class="estimateTitle"><span class="orange">.</span>Mes devis</h2>
            <div class="row">
                <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10 userEstimate">
                    <center>
                        <table>
                            <thead>
                                <tr>
                                    <th class="mobileHide">Numero de devis</th>
                                    <th>Entreprise</th>
                                    <th class="mobileHide">Type de réalisation</th>
                                    <th class="mobileHide">Date</th>
                                    <th class="mobileHide">Montant</th>
                                    <th>Mon devis</th>
                                    <th>Contacter</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="mobileHide">001</td>
                                    <td>Test</td>
                                    <td class="mobileHide">Terrasse extérieure</td>
                                    <td class="mobileHide">22/04/2019</td>
                                    <td class="mobileHide">2024.00€</td>
                                    <td>fichier.pdf</td>
                                    <td align="center">
                                        <i class="fas fa-phone-square"></i>
                                        <i class="far fa-comments"></i>
                                        <i class="fas fa-trash"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="mobileHide">002</td>
                                    <td>Test2</td>
                                    <td class="mobileHide">Murets de clôture</td>
                                    <td class="mobileHide">22/04/2019</td>
                                    <td class="mobileHide">7035.00€</td>
                                    <td>fichierMuret.pdf</td>
                                    <td align="center">
                                        <i class="fas fa-phone-square"></i>
                                        <i class="far fa-comments"></i>
                                        <i class="fas fa-trash"></i>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once 'footerSecondary.php'; ?>
