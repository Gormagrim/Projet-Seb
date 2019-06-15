<?php
session_start();
include_once 'navbarSecondary.php';
require_once 'models/database.php';
require_once 'models/city.php';
require_once 'models/company.php';
require_once 'models/production.php';
require_once 'controllers/sectorSearchCtrl.php';
?>

<div class="w3-sidebar w3-bar-block w3-card w3-animate-left sideBarMenu" style="display:none" id="mySidebar">
    <button class="w3-bar-item slide-button w3-large slideMenuCloseBtn" onclick="slide_close()">Fermer le Menu &times;</button>
    <p><span class="orange">.</span>Recherches par :</p>
    <a href="/partUserCompany.php" class="w3-bar-item slide-button"><span class="orange">.</span>Entreprises</a>
    <a href="/partUserProduction.php" class="w3-bar-item slide-button"><span class="orange">.</span>Réalisations</a>
    <a href="/sectorSearch.php" class="w3-bar-item slide-button"><span class="orange">.</span>Secteurs</a>
    <p><span class="orange">.</span>Mon activité :</p>
    <a href="/estimate.php" class="w3-bar-item slide-button"><span class="orange">.</span>Mes devis</a>
    <a href="/userWorks.php" class="w3-bar-item slide-button"><span class="orange">.</span>Mes travaux</a>
    <a href="/userFavorites.php" class="w3-bar-item slide-button"><span class="orange">.</span>Mes favoris</a>
    <a href="/userContact.php" class="w3-bar-item slide-button"><span class="orange">.</span>Mes contacts</a>
    <p><a href="/userAccount.php"><span class="orange">.</span>Mon compte</a></p>
</div>
<div id="main">
    <?php if (!isset($_GET['zipcodeSearch'])) { ?>
        <div class="row">
            <div class="bigCompanyCard col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10 sectorSearch">
                <h2 class="sectorSearchMainTitle" id="topPage"><span class="orange">.</span>Recherche par secteur géographique ou par secteur d'activité :</h2>
                <div class="row">
                    <div class="col-12 offset-sm-3 col-sm-6 offset-md-3 col-md-6 offset-lg-3 col-lg-6">
                        <form class="form-inline position-center"  action="sectorSearch.php" method="GET">
                            <label for="zipcodeSearch"><span class="orange">.</span>Votre code postal :</label>
                            <input class="form-control mr-sm-2 searchNav" id="zipcodeSearch" name="zipcodeSearch" type="search" placeholder="60000" />
                            <button class="btn btn-outline-warning hightBtn" type="submit">Rechercher</button>
                        </form>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <p>Cliquez sur une titre pour afficher le menu</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6">

                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <h2 class="sectorSearchTitle" id="go"><span class="orange">.</span>Gros oeuvre</h2>
                                <p class="reHideOne">(Masquer)</p>
                            </div>
                        </div>
                        <div class="row hideMenu">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <h5 class="hideOne"><span class="orange">.</span>Construction neuve</h5>
                                <ul>
                                    <li><a class="dropdown-item hideOne" href="typeSearch.php?type=Fondations"><span class="orange">.</span>Fondations</a></li>
                                    <li><a class="dropdown-item hideOne" href="typeSearch.php?type=Maçonnerie"><span class="orange">.</span>Maçonnerie</a></li>
                                    <li><a class="dropdown-item hideOne" href="typeSearch.php?type=Dallage"><span class="orange">.</span>Dallage</a></li>
                                    <li><a class="dropdown-item hideOne" href="typeSearch.php?type=Chape"><span class="orange">.</span>Chape</a></li>
                                </ul>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <h5 class="hideOne"><span class="orange">.</span>Agrandissement</h5>
                                <ul>
                                    <li><a class="dropdown-item hideOne" href="typeSearch.php?type=Extension"><span class="orange">.</span>Extension</a></li>
                                    <li><a class="dropdown-item hideOne" href="typeSearch.php?type=Surélévation"><span class="orange">.</span>Surélévation</a></li>
                                    <li><a class="dropdown-item hideOne" href="typeSearch.php?type=Garage"><span class="orange">.</span>Garage</a></li>
                                </ul>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <h5 class="hideOne"><span class="orange">.</span>Rénovation</h5>
                                <ul>
                                    <li><a class="dropdown-item hideOne" href="typeSearch.php?type=Maison"><span class="orange">.</span>Maison</a></li>
                                    <li><a class="dropdown-item hideOne" href="typeSearch.php?type=Appartement"><span class="orange">.</span>Appartement</a></li>
                                </ul>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <h5 class="hideOne"><span class="orange">.</span>Terrassement et canalisation</h5>
                                <ul>
                                    <li><a class="dropdown-item hideOne" href="typeSearch.php?type=Tranchée et trou"><span class="orange">.</span>Tranchée et trou</a></li>
                                    <li><a class="dropdown-item hideOne" href="typeSearch.php?type=Nivelement"><span class="orange">.</span>Nivelement</a></li>
                                    <li><a class="dropdown-item hideOne" href="typeSearch.php?type=Puisard"><span class="orange">.</span>Puisard</a></li>
                                    <li><a class="dropdown-item hideOne" href="typeSearch.php?type=Canalisation"><span class="orange">.</span>Canalisation</a></li>
                                    <li><a class="dropdown-item hideOne" href="typeSearch.php?type=Relevage"><span class="orange">.</span>Relevage</a></li>
                                    <li><a class="dropdown-item hideOne" href="typeSearch.php?type=Fosse"><span class="orange">.</span>Fosse</a></li>
                                    <li><a class="dropdown-item hideOne" href="typeSearch.php?type=Entretien de fosse"><span class="orange">.</span>Entretien de fosse</a></li>
                                    <li><a class="dropdown-item hideOne" href="typeSearch.php?type=Remblai"><span class="orange">.</span>Remblai</a></li>
                                    <li><a class="dropdown-item hideOne" href="typeSearch.php?type=Epandage"><span class="orange">.</span>Epandage</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <h2 class="sectorSearchTitle" id="charp"><span class="orange">.</span>Charpente et Couverture</h2>
                                <p class="reHideTwo">(Masquer)</p>
                            </div>
                        </div>
                        <div class="row hideMenuTwo">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <h5 class="hideTwo"><span class="orange">.</span>Charpente</h5>
                                <ul>
                                    <li><a class="dropdown-item hideTwo" href="typeSearch.php?type=Bois"><span class="orange">.</span>Bois</a></li>
                                    <li><a class="dropdown-item hideTwo" href="typeSearch.php?type=Métalique"><span class="orange">.</span>Métalique</a></li>
                                    <li><a class="dropdown-item hideTwo" href="typeSearch.php?type=Rénovation bois"><span class="orange">.</span>Rénovation bois</a></li>
                                    <li><a class="dropdown-item hideTwo" href="typeSearch.php?type=Diagnostique"><span class="orange">.</span>Diagnostique</a></li>
                                </ul>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <h5 class="hideTwo"><span class="orange">.</span>Couverture</h5>
                                <ul>
                                    <li><a class="dropdown-item hideTwo" href="typeSearch.php?type=Tuiles plate"><span class="orange">.</span>Tuiles plate</a></li>
                                    <li><a class="dropdown-item hideTwo" href="typeSearch.php?type=Tuiles mécaniques"><span class="orange">.</span>Tuiles mécaniques</a></li>
                                    <li><a class="dropdown-item hideTwo" href="typeSearch.php?type=Ardoises"><span class="orange">.</span>Ardoises</a></li>
                                    <li><a class="dropdown-item hideTwo" href="typeSearch.php?type=Réparation"><span class="orange">.</span>Réparation</a></li>
                                    <li><a class="dropdown-item hideTwo" href="typeSearch.php?type=Entretien"><span class="orange">.</span>Entretien</a></li>
                                </ul>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <h5 class="hideTwo"><span class="orange">.</span>Couverture(suite)</h5>
                                <ul>
                                    <li><a class="dropdown-item hideTwo" href="typeSearch.php?type=Descente et gouttière"><span class="orange">.</span>Descente et gouttière</a></li>
                                    <li><a class="dropdown-item hideTwo" href="typeSearch.php?type=Châssis de toit"><span class="orange">.</span>Châssis de toit</a></li>
                                    <li><a class="dropdown-item hideTwo" href="typeSearch.php?type=Souches"><span class="orange">.</span>Souches</a></li>
                                    <li><a class="dropdown-item hideTwo" href="typeSearch.php?type=Accessoires"><span class="orange">.</span>Accessoires</a></li>
                                    <li><a class="dropdown-item hideTwo" href="typeSearch.php?type=Isolation par l'extérieur"><span class="orange">.</span>Isolation par l'extérieur</a></li>
                                </ul>
                            </div>

                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <h5 class="hideTwo"><span class="orange">.</span>Toiture Terrasse</h5>
                                <ul>
                                    <li><a class="dropdown-item hideTwo" href="typeSearch.php?type=Bois"><span class="orange">.</span>Bois</a></li>
                                    <li><a class="dropdown-item hideTwo" href="typeSearch.php?type=Béton armé"><span class="orange">.</span>Béton armé</a></li>
                                    <li><a class="dropdown-item hideTwo" href="typeSearch.php?type=Isolation par l'extérieur"><span class="orange">.</span>Isolation par l'extérieur</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <h2 class="sectorSearchTitle" id="wall"><span class="orange">.</span>Mur, Sol et Plafond</h2>
                                <p class="reHideThree">(Masquer)</p>
                            </div>
                        </div>
                        <div class="row hideMenuThree">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <h5 class="hideThree"><span class="orange">.</span>Mur</h5>
                                <ul>
                                    <li><a class="dropdown-item hideThree" href="typeSearch.php?type=Soutènement"><span class="orange">.</span>Soutènement</a></li>
                                    <li><a class="dropdown-item hideThree" href="typeSearch.php?type=Carreaux de plâtre"><span class="orange">.</span>Carreaux de plâtre</a></li>
                                    <li><a class="dropdown-item hideThree" href="typeSearch.php?type=Placostyle"><span class="orange">.</span>Placostyle</a></li>
                                    <li><a class="dropdown-item hideThree" href="typeSearch.php?type=Isolation"><span class="orange">.</span>Isolation</a></li>
                                    <li><a class="dropdown-item hideThree" href="typeSearch.php?type=Béton cellulaire"><span class="orange">.</span>Béton cellulaire</a></li>
                                    <li><a class="dropdown-item hideThree" href="typeSearch.php?type=Maçonnerie"><span class="orange">.</span>Maçonnerie</a></li>
                                    <li><a class="dropdown-item hideThree" href="typeSearch.php?type=Pierre naturelle"><span class="orange">.</span>Pierre naturelle</a></li>
                                    <li><a class="dropdown-item hideThree" href="typeSearch.php?type=Carottage"><span class="orange">.</span>Carottage</a></li>
                                    <li><a class="dropdown-item hideThree" href="typeSearch.php?type=Ouverture avec linteau"><span class="orange">.</span>Ouverture avec linteau</a></li>
                                    <li><a class="dropdown-item hideThree" href="typeSearch.php?type=Peinture"><span class="orange">.</span>Peinture</a></li>
                                    <li><a class="dropdown-item hideThree" href="typeSearch.php?type=Bardage"><span class="orange">.</span>Bardage</a></li>
                                    <li><a class="dropdown-item hideThree" href="typeSearch.php?type=Enduits extérieur"><span class="orange">.</span>Enduits extérieur</a></li>
                                    <li><a class="dropdown-item hideThree" href="typeSearch.php?type=Parement"><span class="orange">.</span>Parement</a></li>
                                </ul>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <h5 class="hideThree"><span class="orange">.</span>Sol</h5>
                                <ul>
                                    <li><a class="dropdown-item hideThree" href="typeSearch.php?type=Chape"><span class="orange">.</span>Chape</a></li>
                                    <li><a class="dropdown-item hideThree" href="typeSearch.php?type=Plancher chauffant"><span class="orange">.</span>Plancher chauffant</a></li>
                                    <li><a class="dropdown-item hideThree" href="typeSearch.php?type=Carrelage"><span class="orange">.</span>Carrelage</a></li>
                                    <li><a class="dropdown-item hideThree" href="typeSearch.php?type=Peinture de sol"><span class="orange">.</span>Peinture de sol</a></li>
                                    <li><a class="dropdown-item hideThree" href="typeSearch.php?type=Sol souple"><span class="orange">.</span>Sol souple</a></li>
                                    <li><a class="dropdown-item hideThree" href="typeSearch.php?type=Moquette"><span class="orange">.</span>Moquette</a></li>
                                    <li><a class="dropdown-item hideThree" href="typeSearch.php?type=Statifié"><span class="orange">.</span>Statifié</a></li>
                                    <li><a class="dropdown-item hideThree" href="typeSearch.php?type=Solivage bois"><span class="orange">.</span>Solivage bois</a></li>
                                    <li><a class="dropdown-item hideThree" href="typeSearch.php?type=Parquet massif"><span class="orange">.</span>Parquet massif</a></li>
                                    <li><a class="dropdown-item hideThree" href="typeSearch.php?type=Rénovation parquet massif"><span class="orange">.</span>Rénovation parquet massif</a></li>
                                    <li><a class="dropdown-item hideThree" href="typeSearch.php?type=Ragréage"><span class="orange">.</span>Ragréage</a></li>
                                </ul>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <h5 class="hideThree"><span class="orange">.</span>Plafond</h5>
                                <ul>
                                    <li><a class="dropdown-item hideThree" href="typeSearch.php?type=Plâtre"><span class="orange">.</span>Plâtre</a></li>
                                    <li><a class="dropdown-item hideThree" href="typeSearch.php?type=Placostyle"><span class="orange">.</span>Placostyle</a></li>
                                    <li><a class="dropdown-item hideThree" href="typeSearch.php?type=Toile tendus"><span class="orange">.</span>Toile tendus</a></li>
                                    <li><a class="dropdown-item hideThree" href="typeSearch.php?type=Peinture"><span class="orange">.</span>Peinture</a></li>
                                </ul>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <h5 class="hideThree"><span class="orange">.</span>Isolation</h5>
                                <ul>
                                    <li><a class="dropdown-item hideThree" href="typeSearch.php?type=Par l'exterieur"><span class="orange">.</span>Par l'exterieur</a></li>
                                    <li><a class="dropdown-item hideThree" href="typeSearch.php?type=Par l'intérieur"><span class="orange">.</span>Par l'intérieur</a></li>
                                    <li><a class="dropdown-item hideThree" href="typeSearch.php?type=Comble habité"><span class="orange">.</span>Comble habité</a></li>
                                    <li><a class="dropdown-item hideThree" href="typeSearch.php?type=Comble perdu"><span class="orange">.</span>Comble perdu</a></li>
                                    <li><a class="dropdown-item hideThree" href="typeSearch.php?type=Laine minérale"><span class="orange">.</span>Laine minérale</a></li>
                                    <li><a class="dropdown-item hideThree" href="typeSearch.php?type=Soufflage"><span class="orange">.</span>Soufflage</a></li>
                                    <li><a class="dropdown-item hideThree" href="typeSearch.php?type=Acoustique"><span class="orange">.</span>Acoustique</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6">

                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <h2 class="sectorSearchTitle" id="menui"><span class="orange">.</span>Menuiserie</h2>
                                <p class="reHideFour">(Masquer)</p>
                            </div>
                        </div>
                        <div class="row hideMenuFour">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <h5 class="hideFour"><span class="orange">.</span>Extérieur</h5>
                                <ul>
                                    <li><a class="dropdown-item hideFour" href="typeSearch.php?type=Fenêtre aluminium"><span class="orange">.</span>Fenêtre aluminium</a></li>
                                    <li><a class="dropdown-item hideFour" href="typeSearch.php?type=Fenêtre bois"><span class="orange">.</span>Fenêtre bois</a></li>
                                    <li><a class="dropdown-item hideFour" href="typeSearch.php?type=Fenêtre PVC"><span class="orange">.</span>Fenêtre PVC</a></li>
                                    <li><a class="dropdown-item hideFour" href="typeSearch.php?type=Volet battant"><span class="orange">.</span>Volet battant</a></li>
                                    <li><a class="dropdown-item hideFour" href="typeSearch.php?type=Volet roulant"><span class="orange">.</span>Volet roulant</a></li>
                                    <li><a class="dropdown-item hideFour" href="typeSearch.php?type=Chassis coulissant"><span class="orange">.</span>Chassis coulissant</a></li>
                                    <li><a class="dropdown-item hideFour" href="typeSearch.php?type=Baie vitrée"><span class="orange">.</span>Baie vitrée</a></li>
                                    <li><a class="dropdown-item hideFour" href="typeSearch.php?type=Chassis à galandage"><span class="orange">.</span>Chassis à galandage</a></li>
                                </ul>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <h5 class="hideFour"><span class="orange">.</span>Extérieur(suite)</h5>
                                <ul>
                                    <li><a class="dropdown-item hideFour" href="typeSearch.php?type=Chassis de toit"><span class="orange">.</span>Chassis de toit</a></li>
                                    <li><a class="dropdown-item hideFour" href="typeSearch.php?type=Bloc-porte aluminium"><span class="orange">.</span>Bloc-porte aluminium</a></li>
                                    <li><a class="dropdown-item hideFour" href="typeSearch.php?type=Bloc-porte bois"><span class="orange">.</span>Bloc-porte bois</a></li>
                                    <li><a class="dropdown-item hideFour" href="typeSearch.php?type=Bloc-porte PVC"><span class="orange">.</span>Bloc-porte PVC</a></li>
                                    <li><a class="dropdown-item hideFour" href="typeSearch.php?type=Portail"><span class="orange">.</span>Portail</a></li>
                                    <li><a class="dropdown-item hideFour" href="typeSearch.php?type=Porte de garage"><span class="orange">.</span>Porte de garage</a></li>
                                    <li><a class="dropdown-item hideFour" href="typeSearch.php?type=Serrurerie"><span class="orange">.</span>Serrurerie</a></li>
                                    <li><a class="dropdown-item hideFour" href="typeSearch.php?type=Dépannage Serrurerie"><span class="orange">.</span>Dépannage Serrurerie</a></li>
                                </ul>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <h5 class="hideFour"><span class="orange">.</span>Intérieur</h5>
                                <ul>
                                    <li><a class="dropdown-item hideFour" href="typeSearch.php?type=Bloc-porte"><span class="orange">.</span>Bloc-porte</a></li>
                                    <li><a class="dropdown-item hideFour" href="typeSearch.php?type=Porte de placard"><span class="orange">.</span>Porte de placard</a></li>
                                    <li><a class="dropdown-item hideFour" href="typeSearch.php?type=Aménagement de placard"><span class="orange">.</span>Aménagement de placard</a></li>
                                    <li><a class="dropdown-item hideFour" href="typeSearch.php?type=Dressing"><span class="orange">.</span>Dressing</a></li>
                                    <li><a class="dropdown-item hideFour" href="typeSearch.php?type=Plan de travail"><span class="orange">.</span>Plan de travail</a></li>
                                </ul>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <h5 class="hideFour"><span class="orange">.</span>Intérieur(suite)</h5>
                                <ul>
                                    <li><a class="dropdown-item hideFour" href="typeSearch.php?type=Escalier"><span class="orange">.</span>Escalier</a></li>
                                    <li><a class="dropdown-item hideFour" href="typeSearch.php?type=Garde-corps"><span class="orange">.</span>Garde-corps</a></li>
                                    <li><a class="dropdown-item hideFour" href="typeSearch.php?type=Main courante"><span class="orange">.</span>Main courante</a></li>
                                    <li><a class="dropdown-item hideFour" href="typeSearch.php?type=Plinthe bois"><span class="orange">.</span>Plinthe bois</a></li>
                                    <li><a class="dropdown-item hideFour" href="typeSearch.php?type=Accessoires"><span class="orange">.</span>Accessoires</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <h2 class="sectorSearchTitle" id="plomb"><span class="orange">.</span>Plomberie, chauffage et électricité</h2>
                                <p class="reHideFive">(Masquer)</p>
                            </div>
                        </div>
                        <div class="row hideMenuFive">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <h5 class="hideFive"><span class="orange">.</span>Plomberie</h5>
                                <ul>
                                    <li><a class="dropdown-item hideFive" href="typeSearch.php?type=Réseau sanitaire"><span class="orange">.</span>Réseau sanitaire</a></li>
                                    <li><a class="dropdown-item hideFive" href="typeSearch.php?type=Réparation"><span class="orange">.</span>Réparation</a></li>
                                    <li><a class="dropdown-item hideFive" href="typeSearch.php?type=Débouchage"><span class="orange">.</span>Débouchage</a></li>
                                    <li><a class="dropdown-item hideFive" href="typeSearch.php?type=Ballon d'eau chaude"><span class="orange">.</span>Ballon d'eau chaude</a></li>
                                    <li><a class="dropdown-item hideFive" href="typeSearch.php?type=Chaudière"><span class="orange">.</span>Chaudière</a></li>
                                    <li><a class="dropdown-item hideFive" href="typeSearch.php?type=Entretien chaudière"><span class="orange">.</span>Entretien chaudière</a></li>
                                    <li><a class="dropdown-item hideFive" href="typeSearch.php?type=Robineterie"><span class="orange">.</span>Robineterie</a></li>
                                    <li><a class="dropdown-item hideFive" href="typeSearch.php?type=Baignoire"><span class="orange">.</span>Baignoire</a></li>
                                    <li><a class="dropdown-item hideFive" href="typeSearch.php?type=Baignoire balnéo"><span class="orange">.</span>Baignoire balnéo</a></li>
                                </ul>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <h5 class="hideFive"><span class="orange">.</span>Plomberie(suite)</h5>
                                <ul>
                                    <li><a class="dropdown-item hideFive" href="typeSearch.php?type=Douche"><span class="orange">.</span>Douche</a></li>
                                    <li><a class="dropdown-item hideFive" href="typeSearch.php?type=Douche à l'Italienne"><span class="orange">.</span>Douche à l'Italienne</a></li>
                                    <li><a class="dropdown-item hideFive" href="typeSearch.php?type=Lavabo"><span class="orange">.</span>Lavabo</a></li>
                                    <li><a class="dropdown-item hideFive" href="typeSearch.php?type=Wc"><span class="orange">.</span>Wc</a></li>
                                    <li><a class="dropdown-item hideFive" href="typeSearch.php?type=Wc suspendu"><span class="orange">.</span>Wc suspendu</a></li>
                                    <li><a class="dropdown-item hideFive" href="typeSearch.php?type=Wc japonnais"><span class="orange">.</span>Wc japonnais</a></li>
                                    <li><a class="dropdown-item hideFive" href="typeSearch.php?type=Salle de bain"><span class="orange">.</span>Salle de bain</a></li>
                                    <li><a class="dropdown-item hideFive" href="typeSearch.php?type=Jacuzzi / sauna"><span class="orange">.</span>Jacuzzi / sauna</a></li>
                                    <li><a class="dropdown-item hideFive" href="typeSearch.php?type=Cuisine"><span class="orange">.</span>Cuisine</a></li>
                                </ul>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <h5 class="hideFive"><span class="orange">.</span>Chauffage</h5>
                                <ul>
                                    <li><a class="dropdown-item hideFive" href="typeSearch.php?type=Chaudière"><span class="orange">.</span>Chaudière</a></li>
                                    <li><a class="dropdown-item hideFive" href="typeSearch.php?type=Entretien chaudière"><span class="orange">.</span>Entretien chaudière</a></li>
                                    <li><a class="dropdown-item hideFive" href="typeSearch.php?type=Cheminée"><span class="orange">.</span>Cheminée</a></li>
                                    <li><a class="dropdown-item hideFive" href="typeSearch.php?type=Insert"><span class="orange">.</span>Insert</a></li>
                                    <li><a class="dropdown-item hideFive" href="typeSearch.php?type=Chauffage electrique"><span class="orange">.</span>Chauffage electrique</a></li>
                                    <li><a class="dropdown-item hideFive" href="typeSearch.php?type=Poêle à granules"><span class="orange">.</span>Poêle à granules</a></li>
                                    <li><a class="dropdown-item hideFive" href="typeSearch.php?type=Pompe à chaleur"><span class="orange">.</span>Pompe à chaleur</a></li>
                                    <li><a class="dropdown-item hideFive" href="typeSearch.php?type=Plancher chauffant"><span class="orange">.</span>Plancher chauffant</a></li>
                                    <li><a class="dropdown-item hideFive" href="typeSearch.php?type=Citerne enterré"><span class="orange">.</span>Citerne enterré</a></li>
                                    <li><a class="dropdown-item hideFive" href="typeSearch.php?type=Conduit de cheminée"><span class="orange">.</span>Conduit de cheminée</a></li>
                                    <li><a class="dropdown-item hideFive" href="typeSearch.php?type=Ramonage"><span class="orange">.</span>Ramonage</a></li>
                                    <li><a class="dropdown-item hideFive" href="typeSearch.php?type=VMC"><span class="orange">.</span>VMC</a></li>
                                    <li><a class="dropdown-item hideFive" href="typeSearch.php?type=Climatisation"><span class="orange">.</span>Climatisation</a></li>
                                </ul>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <h5 class="hideFive"><span class="orange">.</span>Electricité</h5>
                                <ul>
                                    <li><a class="dropdown-item hideFive" href="typeSearch.php?type=Installation"><span class="orange">.</span>Installation</a></li>
                                    <li><a class="dropdown-item hideFive" href="typeSearch.php?type=Réparation"><span class="orange">.</span>Réparation</a></li>
                                    <li><a class="dropdown-item hideFive" href="typeSearch.php?type=Mise au norme"><span class="orange">.</span>Mise au norme</a></li>
                                    <li><a class="dropdown-item hideFive" href="typeSearch.php?type=Consuel"><span class="orange">.</span>Consuel</a></li>
                                    <li><a class="dropdown-item hideFive" href="typeSearch.php?type=Contrôle d'installation"><span class="orange">.</span>Contrôle d'installation</a></li>
                                    <li><a class="dropdown-item hideFive" href="typeSearch.php?type=Chauffage electrique"><span class="orange">.</span>Chauffage electrique</a></li>
                                    <li><a class="dropdown-item hideFive" href="typeSearch.php?type=Climatisation"><span class="orange">.</span>Climatisation</a></li>
                                    <li><a class="dropdown-item hideFive" href="typeSearch.php?type=Domotique"><span class="orange">.</span>Domotique</a></li>
                                    <li><a class="dropdown-item hideFive" href="typeSearch.php?type=Réseaux et informatiqu"><span class="orange">.</span>Réseaux et informatique</a></li>
                                    <li><a class="dropdown-item hideFive" href="typeSearch.php?type=Motorisation de porte"><span class="orange">.</span>Motorisation de porte</a></li>
                                    <li><a class="dropdown-item hideFive" href="typeSearch.php?type=Visiophonie"><span class="orange">.</span>Visiophonie</a></li>
                                    <li><a class="dropdown-item hideFive" href="typeSearch.php?type=Alarme"><span class="orange">.</span>Alarme</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <h2 class="sectorSearchTitle" id="out"><span class="orange">.</span>Extérieur</h2>
                                <p class="reHideSix">(Masquer)</p>
                            </div>
                        </div>
                        <div class="row hideMenuSix">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <h5 class="hideSix"><span class="orange">.</span>Terrasse et chemin</h5>
                                <ul>
                                    <li><a class="dropdown-item hideSix" href="typeSearch.php?type=Béton armé"><span class="orange">.</span>Béton armé</a></li>
                                    <li><a class="dropdown-item hideSix" href="typeSearch.php?type=Aménagement"><span class="orange">.</span>Aménagement</a></li>
                                    <li><a class="dropdown-item hideSix" href="typeSearch.php?type=Carrelage"><span class="orange">.</span>Carrelage</a></li>
                                    <li><a class="dropdown-item hideSix" href="typeSearch.php?type=Bois"><span class="orange">.</span>Bois</a></li>
                                    <li><a class="dropdown-item hideSix" href="typeSearch.php?type=Composite"><span class="orange">.</span>Composite</a></li>
                                    <li><a class="dropdown-item hideSix" href="typeSearch.php?type=Soutenement"><span class="orange">.</span>Soutenement</a></li>
                                    <li><a class="dropdown-item hideSix" href="typeSearch.php?type=Pavage"><span class="orange">.</span>Pavage</a></li>
                                    <li><a class="dropdown-item hideSix" href="typeSearch.php?type=Bordurette"><span class="orange">.</span>Bordurette</a></li>
                                    <li><a class="dropdown-item hideSix" href="typeSearch.php?type=enrobé"><span class="orange">.</span>enrobé</a></li>
                                </ul>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <h5 class="hideSix"><span class="orange">.</span>Clôture</h5>
                                <ul>
                                    <li><a class="dropdown-item hideSix" href="typeSearch.php?type=Maçonnerie"><span class="orange">.</span>Maçonnerie</a></li>
                                    <li><a class="dropdown-item hideSix" href="typeSearch.php?type=Grillage souple"><span class="orange">.</span>Grillage souple</a></li>
                                    <li><a class="dropdown-item hideSix" href="typeSearch.php?type=Grillage rigide"><span class="orange">.</span>Grillage rigide</a></li>
                                    <li><a class="dropdown-item hideSix" href="typeSearch.php?type=Palissage"><span class="orange">.</span>Palissage</a></li>
                                    <li><a class="dropdown-item hideSix" href="typeSearch.php?type=Brise vue"><span class="orange">.</span>Brise vue</a></li>
                                    <li><a class="dropdown-item hideSix" href="typeSearch.php?type=Portail"><span class="orange">.</span>Portail</a></li>
                                    <li><a class="dropdown-item hideSix" href="typeSearch.php?type=Portillon"><span class="orange">.</span>Portillon</a></li>
                                </ul>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <h5 class="hideSix"><span class="orange">.</span>Aménagement</h5>
                                <ul>
                                    <li><a class="dropdown-item hideSix" href="typeSearch.php?type=Véranda"><span class="orange">.</span>Véranda</a></li>
                                    <li><a class="dropdown-item hideSix" href="typeSearch.php?type=Pergola"><span class="orange">.</span>Pergola</a></li>
                                    <li><a class="dropdown-item hideSix" href="typeSearch.php?type=Store banne"><span class="orange">.</span>Store banne</a></li>
                                    <li><a class="dropdown-item hideSix" href="typeSearch.php?type=Abri de jardin"><span class="orange">.</span>Abri de jardin</a></li>
                                    <li><a class="dropdown-item hideSix" href="typeSearch.php?type=Bungalow"><span class="orange">.</span>Bungalow</a></li>
                                    <li><a class="dropdown-item hideSix" href="typeSearch.php?type=Paysagerie"><span class="orange">.</span>Paysagerie</a></li>
                                </ul>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <h5 class="hideSix"><span class="orange">.</span>Piscine</h5>
                                <ul>
                                    <li><a class="dropdown-item hideSix" href="typeSearch.php?type=Maçonnerie enterrée"><span class="orange">.</span>Maçonnerie enterrée</a></li>
                                    <li><a class="dropdown-item hideSix" href="typeSearch.php?type=Maçonnerie hors sol"><span class="orange">.</span>Maçonnerie hors sol</a></li>
                                    <li><a class="dropdown-item hideSix" href="typeSearch.php?type=Coque enterrée"><span class="orange">.</span>Coque enterrée</a></li>
                                    <li><a class="dropdown-item hideSix" href="typeSearch.php?type=Abri de piscine"><span class="orange">.</span>Abri de piscine</a></li>
                                    <li><a class="dropdown-item hideSix" href="typeSearch.php?type=Equipement"><span class="orange">.</span>Equipement</a></li>
                                    <li><a class="dropdown-item hideSix" href="typeSearch.php?type=Clôture"><span class="orange">.</span>Clôture</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } else { ?>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 firstCard">
            <h2><span class="orange">.</span>Résultat de votre recherche pour le code postal "<?= $_GET['zipcodeSearch'] ?>"</h2>
        </div>
    </div>
    <div class="row secondCards">
        <?php foreach ($productionSearchByZipcode as $smallProduction) { ?>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                <div class="card mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="professionnal/<?= $smallProduction->photo ?>" class="card-img firstImg" title="Travaux de l'entreprise <?= $smallProduction->name ?> : <?= $smallProduction->description ?>" alt="Travaux de l'entreprise <?= $smallProduction->name ?> : <?= $smallProduction->description ?>">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h4 class="card-title"><?= $smallProduction->title ?></h4>
                                <h5 class="card-title">Chantier réalisé à <?= $smallProduction->city ?> (<?= $smallProduction->zipcode ?>) par l'entreprise <?= $smallProduction->name ?></h5>
                                <h5 class="card-title">De type : <?= $smallProduction->category ?> / <?= $smallProduction->type ?></h5>
                                <button type="button" class="btn btn-outline-warning registrationBtn cardBtn" onclick="javascript:location.href = '/productionDetail.php?id=<?= $smallProduction->id ?>'">Voir plus</button>
                                <div class="socialMedia">
                                    <a href="#" title="J'aime"><i class="fas fa-sun fa-2x"></i></a>
                                    <span><p></p></span>
                                    <a href="#" title="J'aime moins"><i class="fas fa-snowflake fa-2x"></i></a>
                                    <span><p></p></span>
                                    <a href="#" title="Ajouter aux favoris"><i class="far fa-plus-square fa-2x"></i></a>
                                    <span><p></p></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <button type="button" class="btn registrationBtn" onclick="history.go(-1)">Retour</button>
    <?php
}
include_once 'footerSecondary.php';
?>
