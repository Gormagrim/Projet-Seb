<?php
session_start();
include_once 'navbarProfessionnal.php';
?>
<div class="row">
    <div class="bigCompanyCard col-12 offset-sm-2 col-sm-8 offset-md-2 col-md-8 offset-lg-2 col-lg-8">
        <h2 class="estimateTitle"><span class="orange">.</span>Mes devis</h2>
        <div class='estimateSent'><a class="estimateSent" href="/professionnal/sendEstimate.php"><span class="orange">.</span>Envoyer un devis</a></div>
        <div class="row">
            <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10 userEstimate">
                <center>
                    <table>
                        <thead>
                            <tr>
                                <th class="mobileHide">Numero de devis</th>
                                <th>Entreprise</th>
                                <th class="mobileHide">Type de réalisation</th>
                                <th>Envoyé à</th>
                                <th class="mobileHide">Date d'envoi</th>
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
                                <td>Sébastien LARRIVÉE</td>
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
                                <td>Pierre ROUX</td>
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



<?php include_once '../footerSecondary.php'; ?>

