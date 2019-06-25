<?php
/**
 * Je crée une classe database qui me permettra de me connecter à la base de données
 * Toutes mes autres classes hériteront de cette classe grâce au mot-clé extends
 * L'avantage est qu'on ne répète pas ce bout de code, que si l'on a une modification à effectuer
 * on ne devra la faire que dans ce fichier
 */
class database {
    //Mon attribut database est en visibilité protected pour que les classes qui héritent de database puissent y avoir accès
    protected $db;
    public function __construct() {
        //Je me connecte à ma base de donnée comme d'habitude
        /*
         * J'utilise un try catch pour essayer (try) de me connecter à la base de données et si il y a une erreur je l'attrape (catch), 
         * j'arrête le code (die) et j'affiche l'erreur (getMessage) 
         */
        try {
            /*
             * Mon attribut $db devient un objet PDO, il va me permettre de me connecter à la base de données 
             * il a besoin d'une phrase de connection: 
             * host=localhost - il s'agit de l'hôte sur lequel est hébergé mon site
             * dbname=hospitalE2N - c'est la base de donnée que je vais utiliser 
             * charset=utf8 - permet de concerver les caractères speciaux qui sont récupérés de la base de données
             * les deux autres paramètres de PDO sont : le nom de l'utilisateur permettant de se connecter à la base de données et le mot de passe. 
             */
            $this->db = new PDO('mysql:host=localhost;dbname=Projet_Btp;charset=utf8', 'admin_btp', '123');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

}


