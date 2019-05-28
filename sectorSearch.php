<?php
include_once 'navbarSecondary.php';
include_once 'TestBaseDeDonnées.php';
include_once 'function.php';
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
    <div class="row">
        <div class="bigCompanyCard col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10 sectorSearch">
            <h2 class="sectorSearchMainTitle" id="topPage"><span class="orange">.</span>Recherche par secteur géographique ou par secteur d'activité :</h2>
            <div class="row">
                <div class="col-12 offset-sm-4 col-sm-4 offset-md-4 col-md-4 offset-lg-4 col-lg-4 zipCode">
                    <label for="zipCode"><span class="orange">.</span>Votre code postal :</label>
                    <form class="form-inline position-center">
                        <input class="form-control mr-sm-2 searchNav" type="search" placeholder="Recherche" aria-label="Search">
                        <button class="btn btn-outline-warning zipCodeBtn" type="submit">Rechercher</button>
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
                                <li><a class="dropdown-item hideOne" href="#"><span class="orange">.</span>Fondations</a></li>
                                <li><a class="dropdown-item hideOne" href="#"><span class="orange">.</span>Maçonnerie</a></li>
                                <li><a class="dropdown-item hideOne" href="#"><span class="orange">.</span>Dallage</a></li>
                                <li><a class="dropdown-item hideOne" href="#"><span class="orange">.</span>Chape</a></li>
                            </ul>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                            <h5 class="hideOne"><span class="orange">.</span>Agrandissement</h5>
                            <ul>
                                <li><a class="dropdown-item hideOne" href="#"><span class="orange">.</span>Extension</a></li>
                                <li><a class="dropdown-item hideOne" href="#"><span class="orange">.</span>Surélévation</a></li>
                                <li><a class="dropdown-item hideOne" href="#"><span class="orange">.</span>Garage</a></li>
                            </ul>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                            <h5 class="hideOne"><span class="orange">.</span>Rénovation</h5>
                            <ul>
                                <li><a class="dropdown-item hideOne" href="#"><span class="orange">.</span>Maison</a></li>
                                <li><a class="dropdown-item hideOne" href="#"><span class="orange">.</span>Appartement</a></li>
                            </ul>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                            <h5 class="hideOne"><span class="orange">.</span>Terrassement et canalisation</h5>
                            <ul>
                                <li><a class="dropdown-item hideOne" href="#"><span class="orange">.</span>Tranchée et trou</a></li>
                                <li><a class="dropdown-item hideOne" href="#"><span class="orange">.</span>Nivelement</a></li>
                                <li><a class="dropdown-item hideOne" href="#"><span class="orange">.</span>Puisard</a></li>
                                <li><a class="dropdown-item hideOne" href="#"><span class="orange">.</span>Canalisation</a></li>
                                <li><a class="dropdown-item hideOne" href="#"><span class="orange">.</span>Relevage</a></li>
                                <li><a class="dropdown-item hideOne" href="#"><span class="orange">.</span>Fosse</a></li>
                                <li><a class="dropdown-item hideOne" href="#"><span class="orange">.</span>Entretien de fosse</a></li>
                                <li><a class="dropdown-item hideOne" href="#"><span class="orange">.</span>Remblai</a></li>
                                <li><a class="dropdown-item hideOne" href="#"><span class="orange">.</span>Epandage</a></li>
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
                                <li><a class="dropdown-item hideTwo" href="#"><span class="orange">.</span>Bois</a></li>
                                <li><a class="dropdown-item hideTwo" href="#"><span class="orange">.</span>Métalique</a></li>
                                <li><a class="dropdown-item hideTwo" href="#"><span class="orange">.</span>Rénovation bois</a></li>
                                <li><a class="dropdown-item hideTwo" href="#"><span class="orange">.</span>Diagnostique</a></li>
                            </ul>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                            <h5 class="hideTwo"><span class="orange">.</span>Couverture</h5>
                            <ul>
                                <li><a class="dropdown-item hideTwo" href="#"><span class="orange">.</span>Tuiles plate</a></li>
                                <li><a class="dropdown-item hideTwo" href="#"><span class="orange">.</span>Tuiles mécaniques</a></li>
                                <li><a class="dropdown-item hideTwo" href="#"><span class="orange">.</span>Ardoises</a></li>
                                <li><a class="dropdown-item hideTwo" href="#"><span class="orange">.</span>Réparation</a></li>
                                <li><a class="dropdown-item hideTwo" href="#"><span class="orange">.</span>Entretien</a></li>
                            </ul>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                            <h5 class="hideTwo"><span class="orange">.</span>Couverture(suite)</h5>
                            <ul>
                                <li><a class="dropdown-item hideTwo" href="#"><span class="orange">.</span>Descente et gouttière</a></li>
                                <li><a class="dropdown-item hideTwo" href="#"><span class="orange">.</span>Châssis de toit</a></li>
                                <li><a class="dropdown-item hideTwo" href="#"><span class="orange">.</span>Souches</a></li>
                                <li><a class="dropdown-item hideTwo" href="#"><span class="orange">.</span>Accessoires</a></li>
                                <li><a class="dropdown-item hideTwo" href="#"><span class="orange">.</span>Isolation par l'extérieur</a></li>
                            </ul>
                        </div>

                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                            <h5 class="hideTwo"><span class="orange">.</span>Toiture Terrasse</h5>
                            <ul>
                                <li><a class="dropdown-item hideTwo" href="#"><span class="orange">.</span>Bois</a></li>
                                <li><a class="dropdown-item hideTwo" href="#"><span class="orange">.</span>Béton armé</a></li>
                                <li><a class="dropdown-item hideTwo" href="#"><span class="orange">.</span>Isolation par l'extérieur</a></li>
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
                                <li><a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Soutènement</a></li>
                                <li><a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Carreaux de plâtre</a></li>
                                <li><a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Placostyle</a></li>
                                <li><a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Isolation</a></li>
                                <li><a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Béton cellulaire</a></li>
                                <li><a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Maçonnerie</a></li>
                                <li><a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Pierre naturelle</a></li>
                                <li><a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Carottage</a></li>
                                <li><a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Ouverture avec linteau</a></li>
                                <li><a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Peinture</a></li>
                                <li><a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Bardage</a></li>
                                <li><a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Enduits extérieur</a></li>
                                <li><a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Parement</a></li>
                            </ul>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                            <h5 class="hideThree"><span class="orange">.</span>Sol</h5>
                            <ul>
                                <li><a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Chape</a></li>
                                <li><a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Plancher chauffant</a></li>
                                <li><a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Carrelage</a></li>
                                <li><a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Peinture de sol</a></li>
                                <li><a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Sol souple</a></li>
                                <li><a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Moquette</a></li>
                                <li><a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Statifié</a></li>
                                <li><a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Solivage bois</a></li>
                                <li><a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Parquet massif</a></li>
                                <li><a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Rénovation parquet massif</a></li>
                                <li><a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Ragréage</a></li>
                            </ul>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                            <h5 class="hideThree"><span class="orange">.</span>Plafond</h5>
                            <ul>
                                <li><a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Plâtre</a></li>
                                <li><a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Placostyle</a></li>
                                <li><a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Toile tendus</a></li>
                                <li><a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Peinture</a></li>
                            </ul>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                            <h5 class="hideThree"><span class="orange">.</span>Isolation</h5>
                            <ul>
                                <li><a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Par l'exterieur</a></li>
                                <li><a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Par l'intérieur</a></li>
                                <li><a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Comble habité</a></li>
                                <li><a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Comble perdu</a></li>
                                <li><a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Comble perdu</a></li>
                                <li><a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Laine minérale</a></li>
                                <li><a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Soufflage</a></li>
                                <li><a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Acoustique</a></li>
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
                                <li><a class="dropdown-item hideFour" href="#"><span class="orange">.</span>Fenêtre aluminium</a></li>
                                <li><a class="dropdown-item hideFour" href="#"><span class="orange">.</span>Fenêtre bois</a></li>
                                <li><a class="dropdown-item hideFour" href="#"><span class="orange">.</span>Fenêtre PVC</a></li>
                                <li><a class="dropdown-item hideFour" href="#"><span class="orange">.</span>Volet battant</a></li>
                                <li><a class="dropdown-item hideFour" href="#"><span class="orange">.</span>Volet roulant</a></li>
                                <li><a class="dropdown-item hideFour" href="#"><span class="orange">.</span>Chassis coulissant</a></li>
                                <li><a class="dropdown-item hideFour" href="#"><span class="orange">.</span>Baie vitrée</a></li>
                                <li><a class="dropdown-item hideFour" href="#"><span class="orange">.</span>Chassis à galandage</a></li>
                            </ul>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                            <h5 class="hideFour"><span class="orange">.</span>Extérieur(suite)</h5>
                            <ul>
                                <li><a class="dropdown-item hideFour" href="#"><span class="orange">.</span>Chassis de toit</a></li>
                                <li><a class="dropdown-item hideFour" href="#"><span class="orange">.</span>Bloc-porte aluminium</a></li>
                                <li><a class="dropdown-item hideFour" href="#"><span class="orange">.</span>Bloc-porte bois</a></li>
                                <li><a class="dropdown-item hideFour" href="#"><span class="orange">.</span>Bloc-porte PVC</a></li>
                                <li><a class="dropdown-item hideFour" href="#"><span class="orange">.</span>Portail</a></li>
                                <li><a class="dropdown-item hideFour" href="#"><span class="orange">.</span>Porte de garage</a></li>
                                <li><a class="dropdown-item hideFour" href="#"><span class="orange">.</span>Serrurerie</a></li>
                                <li><a class="dropdown-item hideFour" href="#"><span class="orange">.</span>Dépannage Serrurerie</a></li>
                            </ul>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                            <h5 class="hideFour"><span class="orange">.</span>Intérieur</h5>
                            <ul>
                                <li><a class="dropdown-item hideFour" href="#"><span class="orange">.</span>Bloc-porte</a></li>
                                <li><a class="dropdown-item hideFour" href="#"><span class="orange">.</span>Porte de placard</a></li>
                                <li><a class="dropdown-item hideFour" href="#"><span class="orange">.</span>Aménagement de placard</a></li>
                                <li><a class="dropdown-item hideFour" href="#"><span class="orange">.</span>Dressing</a></li>
                                <li><a class="dropdown-item hideFour" href="#"><span class="orange">.</span>Plan de travail</a></li>
                            </ul>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                            <h5 class="hideFour"><span class="orange">.</span>Intérieur(suite)</h5>
                            <ul>
                                <li><a class="dropdown-item hideFour" href="#"><span class="orange">.</span>Escalier</a></li>
                                <li><a class="dropdown-item hideFour" href="#"><span class="orange">.</span>Garde-corps</a></li>
                                <li><a class="dropdown-item hideFour" href="#"><span class="orange">.</span>Main courante</a></li>
                                <li><a class="dropdown-item hideFour" href="#"><span class="orange">.</span>Plinthe bois</a></li>
                                <li><a class="dropdown-item hideFour" href="#"><span class="orange">.</span>Accessoires</a></li>
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
                                <li><a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Réseau sanitaire</a></li>
                                <li><a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Réparation</a></li>
                                <li><a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Débouchage</a></li>
                                <li><a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Ballon d'eau chaude</a></li>
                                <li><a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Chaudière</a></li>
                                <li><a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Entretien chaudière</a></li>
                                <li><a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Robineterie</a></li>
                                <li><a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Baignoire</a></li>
                                <li><a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Baignoire balnéo</a></li>
                            </ul>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                            <h5 class="hideFive"><span class="orange">.</span>Plomberie(suite)</h5>
                            <ul>
                                <li><a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Douche</a></li>
                                <li><a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Douche à l'Italienne</a></li>
                                <li><a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Lavabo</a></li>
                                <li><a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Wc</a></li>
                                <li><a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Wc suspendu</a></li>
                                <li><a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Wc japonnais</a></li>
                                <li><a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Salle de bain</a></li>
                                <li><a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Jacuzzi / sauna</a></li>
                                <li><a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Cuisine</a></li>
                            </ul>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                            <h5 class="hideFive"><span class="orange">.</span>Chauffage</h5>
                            <ul>
                                <li><a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Chaudière</a></li>
                                <li><a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Entretien chaudière</a></li>
                                <li><a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Cheminée</a></li>
                                <li><a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Insert</a></li>
                                <li><a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Chauffage electrique</a></li>
                                <li><a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Poêle à granules</a></li>
                                <li><a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Pompe à chaleur</a></li>
                                <li><a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Plancher chauffant</a></li>
                                <li><a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Citerne enterré</a></li>
                                <li><a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Conduit de cheminée</a></li>
                                <li><a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Ramonage</a></li>
                                <li><a class="dropdown-item hideFive" href="#"><span class="orange">.</span>VMC</a></li>
                                <li><a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Climatisation</a></li>
                            </ul>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                            <h5 class="hideFive"><span class="orange">.</span>Electricité</h5>
                            <ul>
                                <li><a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Installation</a></li>
                                <li><a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Réparation</a></li>
                                <li><a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Mise au norme</a></li>
                                <li><a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Consuel</a></li>
                                <li><a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Contrôle d'installation</a></li>
                                <li><a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Chauffage electrique</a></li>
                                <li><a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Climatisation</a></li>
                                <li><a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Domotique</a></li>
                                <li><a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Réseaux et informatique</a></li>
                                <li><a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Motorisation de porte</a></li>
                                <li><a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Visiophonie</a></li>
                                <li><a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Alarme</a></li>
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
                                <li><a class="dropdown-item hideSix" href="#"><span class="orange">.</span>Béton armé</a></li>
                                <li><a class="dropdown-item hideSix" href="#"><span class="orange">.</span>Aménagement</a></li>
                                <li><a class="dropdown-item hideSix" href="#"><span class="orange">.</span>Carrelage</a></li>
                                <li><a class="dropdown-item hideSix" href="#"><span class="orange">.</span>Bois</a></li>
                                <li><a class="dropdown-item hideSix" href="#"><span class="orange">.</span>Composite</a></li>
                                <li><a class="dropdown-item hideSix" href="#"><span class="orange">.</span>Soutenement</a></li>
                                <li><a class="dropdown-item hideSix" href="#"><span class="orange">.</span>Pavage</a></li>
                                <li><a class="dropdown-item hideSix" href="#"><span class="orange">.</span>Bordurette</a></li>
                                <li><a class="dropdown-item hideSix" href="#"><span class="orange">.</span>enrobé</a></li>
                            </ul>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                            <h5 class="hideSix"><span class="orange">.</span>Clôture</h5>
                            <ul>
                                <li><a class="dropdown-item hideSix" href="#"><span class="orange">.</span>Maçonnerie</a></li>
                                <li><a class="dropdown-item hideSix" href="#"><span class="orange">.</span>Grillage souple</a></li>
                                <li><a class="dropdown-item hideSix" href="#"><span class="orange">.</span>Grillage rigide</a></li>
                                <li><a class="dropdown-item hideSix" href="#"><span class="orange">.</span>Palissage</a></li>
                                <li><a class="dropdown-item hideSix" href="#"><span class="orange">.</span>Brise vue</a></li>
                                <li><a class="dropdown-item hideSix" href="#"><span class="orange">.</span>Portail</a></li>
                                <li><a class="dropdown-item hideSix" href="#"><span class="orange">.</span>Portillon</a></li>
                            </ul>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                            <h5 class="hideSix"><span class="orange">.</span>Aménagement</h5>
                            <ul>
                                <li><a class="dropdown-item hideSix" href="#"><span class="orange">.</span>Véranda</a></li>
                                <li><a class="dropdown-item hideSix" href="#"><span class="orange">.</span>Pergola</a></li>
                                <li><a class="dropdown-item hideSix" href="#"><span class="orange">.</span>Store banne</a></li>
                                <li><a class="dropdown-item hideSix" href="#"><span class="orange">.</span>Abri de jardin</a></li>
                                <li><a class="dropdown-item hideSix" href="#"><span class="orange">.</span>Bungalow</a></li>
                                <li><a class="dropdown-item hideSix" href="#"><span class="orange">.</span>Paysagerie</a></li>
                            </ul>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                            <h5 class="hideSix"><span class="orange">.</span>Piscine</h5>
                            <ul>
                                <li><a class="dropdown-item hideSix" href="#"><span class="orange">.</span>Maçonnerie enterrée</a></li>
                                <li><a class="dropdown-item hideSix" href="#"><span class="orange">.</span>Maçonnerie hors sol</a></li>
                                <li><a class="dropdown-item hideSix" href="#"><span class="orange">.</span>Coque enterrée</a></li>
                                <li><a class="dropdown-item hideSix" href="#"><span class="orange">.</span>Abri de piscine</a></li>
                                <li><a class="dropdown-item hideSix" href="#"><span class="orange">.</span>Equipement</a></li>
                                <li><a class="dropdown-item hideSix" href="#"><span class="orange">.</span>Clôture</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once 'footerSecondary.php'; ?>
