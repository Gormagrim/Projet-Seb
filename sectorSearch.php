<?php
include_once 'navbarSecondary.php';
include_once 'TestBaseDeDonnées.php';
include_once 'function.php';
?>

<div class="w3-sidebar w3-bar-block w3-card w3-animate-left sideBarMenu entreprise" style="display:none" id="mySidebar">
    <button class="w3-bar-item w3-button w3-large slideMenuCloseBtn" onclick="w3_close()">Fermer le Menu &times;</button>
    <p><span class="orange">.</span>Recherches par :</p>
    <a href="/particularUser.php" class="w3-bar-item w3-button "><span class="orange">.</span>Entreprises</a>
    <a href="/partUserProduction.php" class="w3-bar-item w3-button noMargingTop"><span class="orange">.</span>Réalisations</a>
    <a href="/sectorSearch.php" class="w3-bar-item w3-button noMargingTop"><span class="orange">.</span>Secteurs</a>
    <p><span class="orange">.</span>Mon activité :</p>
    <a href="/estimate.php" class="w3-bar-item w3-button"><span class="orange">.</span>Mes devis</a>
    <a href="/userWorks.php" class="w3-bar-item w3-button"><span class="orange">.</span>Mes travaux</a>
    <a href="/userFavorites.php" class="w3-bar-item w3-button"><span class="orange">.</span>Mes favoris</a>
    <a href="/userContact.php" class="w3-bar-item w3-button"><span class="orange">.</span>Mes contacts</a>
    <p><a href="/userAccount.php"><span class="orange">.</span>Mon compte</a></p>
</div>
<div id="main">
    <div class="row">
        <div class="bigCompanyCard col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10 sectorSearch">
            <h2 class="sectorSearchMainTitle" id="topPage"><span class="orange">.</span>Recherche</h2>
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
                <div class="col-12 col-sm-12 col-lg-12">
                    <p>Cliquez sur une titre pour afficher le menu</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-6 col-md-6 col-lg-6">

                    <div class="row">
                        <div class="col-12 col-sm-12 col-lg-12">
                            <h2 class="sectorSearchTitle" id="go"><span class="orange">.</span>Gros oeuvre</h2>
                            <p class="reHideOne">(Masquer)</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-3 col-lg-3">
                            <h5 class="hideOne"><span class="orange">.</span>Construction neuve</h5>
                            <a class="dropdown-item hideOne" href="#"><span class="orange">.</span>Fondations</a>
                            <a class="dropdown-item hideOne" href="#"><span class="orange">.</span>Maçonnerie</a>
                            <a class="dropdown-item hideOne" href="#"><span class="orange">.</span>Dallage</a>
                            <a class="dropdown-item hideOne" href="#"><span class="orange">.</span>Chape</a>
                        </div>
                        <div class="col-12 col-sm-3 col-lg-3">
                            <h5 class="hideOne"><span class="orange">.</span>Agrandissement</h5>
                            <a class="dropdown-item hideOne" href="#"><span class="orange">.</span>Extension</a>
                            <a class="dropdown-item hideOne" href="#"><span class="orange">.</span>Surélévation</a>
                            <a class="dropdown-item hideOne" href="#"><span class="orange">.</span>Garage</a>
                        </div>
                        <div class="col-12 col-sm-3 col-lg-3">
                            <h5 class="hideOne"><span class="orange">.</span>Rénovation</h5>
                            <a class="dropdown-item hideOne" href="#"><span class="orange">.</span>Maison</a>
                            <a class="dropdown-item hideOne" href="#"><span class="orange">.</span>Appartement</a>
                        </div>
                        <div class="col-12 col-sm-3 col-lg-3">
                            <h5 class="hideOne"><span class="orange">.</span>Terrassement et canalisation</h5>
                            <a class="dropdown-item hideOne" href="#"><span class="orange">.</span>Tranchée et trou</a>
                            <a class="dropdown-item hideOne" href="#"><span class="orange">.</span>Nivelement</a>
                            <a class="dropdown-item hideOne" href="#"><span class="orange">.</span>Puisard</a>
                            <a class="dropdown-item hideOne" href="#"><span class="orange">.</span>Canalisation</a>
                            <a class="dropdown-item hideOne" href="#"><span class="orange">.</span>Relevage</a>
                            <a class="dropdown-item hideOne" href="#"><span class="orange">.</span>Fosse</a>
                            <a class="dropdown-item hideOne" href="#"><span class="orange">.</span>Entretien de fosse</a>
                            <a class="dropdown-item hideOne" href="#"><span class="orange">.</span>Remblai</a>
                            <a class="dropdown-item hideOne" href="#"><span class="orange">.</span>Epandage</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-lg-12">
                            <h2 class="sectorSearchTitle" id="charp"><span class="orange">.</span>Charpente et Couverture</h2>
                            <p class="reHideTwo">(Masquer)</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-3 col-lg-3">
                            <h5 class="hideTwo"><span class="orange">.</span>Charpente</h5>
                            <a class="dropdown-item hideTwo" href="#"><span class="orange">.</span>Bois</a>
                            <a class="dropdown-item hideTwo" href="#"><span class="orange">.</span>Métalique</a>
                            <a class="dropdown-item hideTwo" href="#"><span class="orange">.</span>Rénovation bois</a>
                            <a class="dropdown-item hideTwo" href="#"><span class="orange">.</span>Diagnostique</a>
                        </div>
                        <div class="col-12 col-sm-3 col-lg-3">
                            <h5 class="hideTwo"><span class="orange">.</span>Couverture</h5>
                            <a class="dropdown-item hideTwo" href="#"><span class="orange">.</span>Tuiles plate</a>
                            <a class="dropdown-item hideTwo" href="#"><span class="orange">.</span>Tuiles mécaniques</a>
                            <a class="dropdown-item hideTwo" href="#"><span class="orange">.</span>Ardoises</a>
                            <a class="dropdown-item hideTwo" href="#"><span class="orange">.</span>Réparation</a>
                            <a class="dropdown-item hideTwo" href="#"><span class="orange">.</span>Entretien</a>
                        </div>
                        <div class="col-12 col-sm-3 col-lg-3">
                            <h5 class="hideTwo"><span class="orange">.</span>Couverture(suite)</h5>
                            <a class="dropdown-item hideTwo" href="#"><span class="orange">.</span>Descente et gouttière</a>
                            <a class="dropdown-item hideTwo" href="#"><span class="orange">.</span>Châssis de toit</a>
                            <a class="dropdown-item hideTwo" href="#"><span class="orange">.</span>Souches</a>
                            <a class="dropdown-item hideTwo" href="#"><span class="orange">.</span>Accessoires</a>
                            <a class="dropdown-item hideTwo" href="#"><span class="orange">.</span>Isolation par l'extérieur</a>
                        </div>

                        <div class="col-12 col-sm-3 col-lg-3">
                            <h5 class="hideTwo"><span class="orange">.</span>Toiture Terrasse</h5>
                            <a class="dropdown-item hideTwo" href="#"><span class="orange">.</span>Bois</a>
                            <a class="dropdown-item hideTwo" href="#"><span class="orange">.</span>Béton armé</a>
                            <a class="dropdown-item hideTwo" href="#"><span class="orange">.</span>Isolation par l'extérieur</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-lg-12">
                            <h2 class="sectorSearchTitle" id="wall"><span class="orange">.</span>Mur, Sol et Plafond</h2>
                            <p class="reHideThree">(Masquer)</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-3 col-lg-3">
                            <h5 class="hideThree"><span class="orange">.</span>Mur</h5>
                            <a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Soutènement</a>
                            <a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Carreaux de plâtre</a>
                            <a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Placostyle</a>
                            <a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Isolation</a>
                            <a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Béton cellulaire</a>
                            <a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Maçonnerie</a>
                            <a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Pierre naturelle</a>
                            <a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Carottage</a>
                            <a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Ouverture avec linteau</a>
                            <a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Peinture</a>
                            <a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Bardage</a>
                            <a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Enduits extérieur</a>
                            <a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Parement</a>
                        </div>
                        <div class="col-12 col-sm-3 col-lg-3">
                            <h5 class="hideThree"><span class="orange">.</span>Sol</h5>
                            <a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Chape</a>
                            <a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Plancher chauffant</a>
                            <a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Carrelage</a>
                            <a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Peinture de sol</a>
                            <a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Sol souple</a>
                            <a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Moquette</a>
                            <a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Statifié</a>
                            <a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Solivage bois</a>
                            <a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Parquet massif</a>
                            <a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Rénovation parquet massif</a>
                            <a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Ragréage</a>
                        </div>
                        <div class="col-12 col-sm-3 col-lg-3">
                            <h5 class="hideThree"><span class="orange">.</span>Plafond</h5>
                            <a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Plâtre</a>
                            <a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Placostyle</a>
                            <a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Toile tendus</a>
                            <a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Peinture</a>
                        </div>
                        <div class="col-12 col-sm-3 col-lg-3">
                            <h5 class="hideThree"><span class="orange">.</span>Isolation</h5>
                            <a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Par l'exterieur</a>
                            <a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Par l'intérieur</a>
                            <a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Comble habité</a>
                            <a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Comble perdu</a>
                            <a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Comble perdu</a>
                            <a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Laine minérale</a>
                            <a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Soufflage</a>
                            <a class="dropdown-item hideThree" href="#"><span class="orange">.</span>Acoustique</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-6">

                    <div class="row">
                        <div class="col-12 col-sm-12 col-lg-12">
                            <h2 class="sectorSearchTitle" id="menui"><span class="orange">.</span>Menuiserie</h2>
                            <p class="reHideFour">(Masquer)</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-3 col-lg-3">
                            <h5 class="hideFour"><span class="orange">.</span>Extérieur</h5>
                            <a class="dropdown-item hideFour" href="#"><span class="orange">.</span>Fenêtre aluminium</a>
                            <a class="dropdown-item hideFour" href="#"><span class="orange">.</span>Fenêtre bois</a>
                            <a class="dropdown-item hideFour" href="#"><span class="orange">.</span>Fenêtre PVC</a>
                            <a class="dropdown-item hideFour" href="#"><span class="orange">.</span>Volet battant</a>
                            <a class="dropdown-item hideFour" href="#"><span class="orange">.</span>Volet roulant</a>
                            <a class="dropdown-item hideFour" href="#"><span class="orange">.</span>Chassis coulissant</a>
                            <a class="dropdown-item hideFour" href="#"><span class="orange">.</span>Baie vitrée</a>
                            <a class="dropdown-item hideFour" href="#"><span class="orange">.</span>Chassis à galandage</a>
                        </div>
                        <div class="col-12 col-sm-3 col-lg-3">
                            <h5 class="hideFour"><span class="orange">.</span>Extérieur(suite)</h5>
                            <a class="dropdown-item hideFour" href="#"><span class="orange">.</span>Chassis de toit</a>
                            <a class="dropdown-item hideFour" href="#"><span class="orange">.</span>Bloc-porte aluminium</a>
                            <a class="dropdown-item hideFour" href="#"><span class="orange">.</span>Bloc-porte bois</a>
                            <a class="dropdown-item hideFour" href="#"><span class="orange">.</span>Bloc-porte PVC</a>
                            <a class="dropdown-item hideFour" href="#"><span class="orange">.</span>Portail</a>
                            <a class="dropdown-item hideFour" href="#"><span class="orange">.</span>Porte de garage</a>
                            <a class="dropdown-item hideFour" href="#"><span class="orange">.</span>Serrurerie</a>
                            <a class="dropdown-item hideFour" href="#"><span class="orange">.</span>Dépannage Serrurerie</a>
                        </div>
                        <div class="col-12 col-sm-3 col-lg-3">
                            <h5 class="hideFour"><span class="orange">.</span>Intérieur</h5>
                            <a class="dropdown-item hideFour" href="#"><span class="orange">.</span>Bloc-porte</a>
                            <a class="dropdown-item hideFour" href="#"><span class="orange">.</span>Porte de placard</a>
                            <a class="dropdown-item hideFour" href="#"><span class="orange">.</span>Aménagement de placard</a>
                            <a class="dropdown-item hideFour" href="#"><span class="orange">.</span>Dressing</a>
                            <a class="dropdown-item hideFour" href="#"><span class="orange">.</span>Plan de travail</a>
                        </div>
                        <div class="col-12 col-sm-3 col-lg-3">
                            <h5 class="hideFour"><span class="orange">.</span>Intérieur(suite)</h5>
                            <a class="dropdown-item hideFour" href="#"><span class="orange">.</span>Escalier</a>
                            <a class="dropdown-item hideFour" href="#"><span class="orange">.</span>Garde-corps</a>
                            <a class="dropdown-item hideFour" href="#"><span class="orange">.</span>Main courante</a>
                            <a class="dropdown-item hideFour" href="#"><span class="orange">.</span>Plinthe bois</a>
                            <a class="dropdown-item hideFour" href="#"><span class="orange">.</span>Accessoires</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-lg-12">
                            <h2 class="sectorSearchTitle" id="plomb"><span class="orange">.</span>Plomberie, chauffage et électricité</h2>
                            <p class="reHideFive">(Masquer)</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-3 col-lg-3">
                            <h5 class="hideFive"><span class="orange">.</span>Plomberie</h5>
                            <a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Réseau sanitaire</a>
                            <a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Réparation</a>
                            <a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Débouchage</a>
                            <a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Ballon d'eau chaude</a>
                            <a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Chaudière</a>
                            <a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Entretien chaudière</a>
                            <a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Robineterie</a>
                            <a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Baignoire</a>
                            <a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Baignoire balnéo</a>
                        </div>
                        <div class="col-12 col-sm-3 col-lg-3">
                            <h5 class="hideFive"><span class="orange">.</span>Plomberie(suite)</h5>
                            <a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Douche</a>
                            <a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Douche à l'Italienne</a>
                            <a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Lavabo</a>
                            <a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Wc</a>
                            <a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Wc suspendu</a>
                            <a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Wc japonnais</a>
                            <a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Salle de bain</a>
                            <a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Jacuzzi / sauna</a>
                            <a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Cuisine</a>
                        </div>
                        <div class="col-12 col-sm-3 col-lg-3">
                            <h5 class="hideFive"><span class="orange">.</span>Chauffage</h5>
                            <a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Chaudière</a>
                            <a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Entretien chaudière</a>
                            <a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Cheminée</a>
                            <a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Insert</a>
                            <a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Chauffage electrique</a>
                            <a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Poêle à granules</a>
                            <a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Pompe à chaleur</a>
                            <a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Plancher chauffant</a>
                            <a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Citerne enterré</a>
                            <a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Conduit de cheminée</a>
                            <a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Ramonage</a>
                            <a class="dropdown-item hideFive" href="#"><span class="orange">.</span>VMC</a>
                            <a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Climatisation</a>
                        </div>
                        <div class="col-12 col-sm-3 col-lg-3">
                            <h5 class="hideFive"><span class="orange">.</span>Electricité</h5>
                            <a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Installation</a>
                            <a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Réparation</a>
                            <a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Mise au norme</a>
                            <a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Consuel</a>
                            <a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Contrôle d'installation</a>
                            <a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Chauffage electrique</a>
                            <a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Climatisation</a>
                            <a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Domotique</a>
                            <a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Réseaux et informatique</a>
                            <a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Motorisation de porte</a>
                            <a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Visiophonie</a>
                            <a class="dropdown-item hideFive" href="#"><span class="orange">.</span>Alarme</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-lg-12">
                            <h2 class="sectorSearchTitle" id="out"><span class="orange">.</span>Extérieur</h2>
                            <p class="reHideSix">(Masquer)</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-3 col-lg-3">
                            <h5 class="hideSix"><span class="orange">.</span>Terrasse et chemin</h5>
                            <a class="dropdown-item hideSix" href="#"><span class="orange">.</span>Béton armé</a>
                            <a class="dropdown-item hideSix" href="#"><span class="orange">.</span>Aménagement</a>
                            <a class="dropdown-item hideSix" href="#"><span class="orange">.</span>Carrelage</a>
                            <a class="dropdown-item hideSix" href="#"><span class="orange">.</span>Bois</a>
                            <a class="dropdown-item hideSix" href="#"><span class="orange">.</span>Composite</a>
                            <a class="dropdown-item hideSix" href="#"><span class="orange">.</span>Soutenement</a>
                            <a class="dropdown-item hideSix" href="#"><span class="orange">.</span>Pavage</a>
                            <a class="dropdown-item hideSix" href="#"><span class="orange">.</span>Bordurette</a>
                            <a class="dropdown-item hideSix" href="#"><span class="orange">.</span>enrobé</a>
                        </div>
                        <div class="col-12 col-sm-3 col-lg-3">
                            <h5 class="hideSix"><span class="orange">.</span>Clôture</h5>
                            <a class="dropdown-item hideSix" href="#"><span class="orange">.</span>Maçonnerie</a>
                            <a class="dropdown-item hideSix" href="#"><span class="orange">.</span>Grillage souple</a>
                            <a class="dropdown-item hideSix" href="#"><span class="orange">.</span>Grillage rigide</a>
                            <a class="dropdown-item hideSix" href="#"><span class="orange">.</span>Palissage</a>
                            <a class="dropdown-item hideSix" href="#"><span class="orange">.</span>Brise vue</a>
                            <a class="dropdown-item hideSix" href="#"><span class="orange">.</span>Portail</a>
                            <a class="dropdown-item hideSix" href="#"><span class="orange">.</span>Portillon</a>
                        </div>
                        <div class="col-12 col-sm-3 col-lg-3">
                            <h5 class="hideSix"><span class="orange">.</span>Aménagement</h5>
                            <a class="dropdown-item hideSix" href="#"><span class="orange">.</span>Véranda</a>
                            <a class="dropdown-item hideSix" href="#"><span class="orange">.</span>Pergola</a>
                            <a class="dropdown-item hideSix" href="#"><span class="orange">.</span>Store banne</a>
                            <a class="dropdown-item hideSix" href="#"><span class="orange">.</span>Abri de jardin</a>
                            <a class="dropdown-item hideSix" href="#"><span class="orange">.</span>Bungalow</a>
                            <a class="dropdown-item hideSix" href="#"><span class="orange">.</span>Paysagerie</a>
                        </div>
                        <div class="col-12 col-sm-3 col-lg-3">
                            <h5 class="hideSix"><span class="orange">.</span>Piscine</h5>
                            <a class="dropdown-item hideSix" href="#"><span class="orange">.</span>Maçonnerie enterrée</a>
                            <a class="dropdown-item hideSix" href="#"><span class="orange">.</span>Maçonnerie hors sol</a>
                            <a class="dropdown-item hideSix" href="#"><span class="orange">.</span>Coque enterrée</a>
                            <a class="dropdown-item hideSix" href="#"><span class="orange">.</span>Abri de piscine</a>
                            <a class="dropdown-item hideSix" href="#"><span class="orange">.</span>Equipement</a>
                            <a class="dropdown-item hideSix" href="#"><span class="orange">.</span>Clôture</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-12 col-lg-12 return">
                    <a href="#topPage" class="return">Retour en haut de page</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once 'footerSecondary.php'; ?>
