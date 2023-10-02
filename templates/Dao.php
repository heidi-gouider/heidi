<?php
// Active l'affichage des erreurs dans le navigateur
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//inclusion de la page de connexion à la base de donnée
// require_once('db_connect.php');

class Dao
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    //mes requetes 

    //Fonction page accueil avec les 6 catégories les plus populaires
    public function getTopSellingPlatsByCategorie()
    {
        $requete = $this->db->query("SELECT categorie.id, categorie.image, categorie.libelle AS nom_categorie, SUM(quantite) AS nombre_vendu FROM commande LEFT JOIN plat ON commande.id_plat = plat.id INNER JOIN categorie ON plat.id_categorie = categorie.id WHERE commande.etat != 'Annulée' GROUP BY categorie.id, categorie.libelle ORDER BY nombre_vendu DESC LIMIT 6");
        $tableau = $requete->fetchAll(PDO::FETCH_OBJ);
        $requete->closeCursor();
        return $tableau;
    }


    //Fonction pour  la page plats par catégorie
    public function getPlatsByCategorie($id_categorie)
    {
        $requete = $this->db->prepare("SELECT plat.*, categorie.libelle AS nom_categorie FROM plat INNER JOIN categorie ON plat.id_categorie = categorie.id WHERE plat.id_categorie = ?");

        // récupération les données
        $requete->execute([$id_categorie]);
        $plats = $requete->fetchAll(PDO::FETCH_OBJ);
        //Cette ligne ferme le curseur de la requête. Cela libère les ressources associées à la requête et permet de faire d'autres requêtes avec la même connexion PDO.
        $requete->closeCursor();
        return $plats;
    }

    //Fonction page catégorie
    public function getCategoriesWithActivePlatsCount()
    {
        $requete = $this->db->query("SELECT categorie.*, (SELECT COUNT(*) FROM plat WHERE plat.id_categorie = categorie.id AND plat.active = 'yes') AS count_active FROM categorie WHERE active = 'yes' LIMIT 6");
        // $requete->execute();
        $tableau = $requete->fetchAll(PDO::FETCH_OBJ);
        $requete->closeCursor();
        return $tableau;
    }

    //Fonction page plats
    public function getPlats()
    {
        $requete = $this->db->query("SELECT plat.*FROM plat LIMIT 6");
        // récupération les données
        $tableau = $requete->fetchAll(PDO::FETCH_OBJ);
        //Cette ligne ferme le curseur de la requête. Cela libère les ressources associées à la requête et permet de faire d'autres requêtes avec la même connexion PDO.
        $requete->closeCursor();
    }


    public function getTopSellingPlats()
    {
        $requete = $this->db->query("SELECT plat.id, plat.libelle AS nom_plat, SUM(quantite) AS nombre_vendu FROM commande LEFT JOIN plat ON commande.id_plat = plat.id WHERE commande.etat != 'Annulée' GROUP BY plat.id, plat.libelle ORDER BY nombre_vendu DESC LIMIT 6");
        $tableau = $requete->fetchAll(PDO::FETCH_OBJ);
        $requete->closeCursor();
        return $tableau;
    }

    public function getTopRevenuePlat()
    {
        $requete = $this->db->query("SELECT plat.id, plat.libelle AS nom_plat, SUM(total) recette FROM commande LEFT JOIN plat ON commande.id_plat = plat.id WHERE commande.etat != 'Annulée' GROUP BY plat.id, plat.libelle ORDER BY recette DESC LIMIT 1");
        $tableaux = $requete->fetchAll(PDO::FETCH_OBJ);
        $requete->closeCursor();
        return $tableaux;
    }
}
