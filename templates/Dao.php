<!-- // J'utilise Le design pattern(modèle conception) DAO = Data Access Object//
        pour la gestion des données -->
<?php
// Active l'affichage des erreurs dans le navigateur
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//inclusion de la page de connexion à la base de donnée
// require_once('db_connect.php');

class Dao
{
    //objet de connexion à la bdd
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    //mes attricuts 

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

    //fonction page commande et panier pour récupérer un plat par son id
    public function getPlatById($id)
    {
        $requete = $this->db->prepare("SELECT * FROM plat WHERE id = ?");
        $requete->execute([$id]);
        $plat = $requete->fetch(PDO::FETCH_OBJ);
        $requete->closeCursor();
        return $plat;
    }
    //fonction pour inserer les données du panier et du formulaire de commande dans la table commande
    public function insertDataCommande($id_plat, $quantite, $total, $nom_client, $tel_client, $email_client, $adresse_client)
    {
        $stmt = $this->db->prepare("INSERT INTO commande (id_plat, quantite, total, date_commande, etat, nom_client, tel_client, email_client, adresse_client) 
VALUES (:id_plat, :quantite, 10, NOW(), 'En attente', :nom_client, :tel_client, :email_client, :adresse_client)");
        // Associez les valeurs récupérées aux paramètres de la requête
        $stmt->bindParam(':id_plat', $id_plat, PDO::PARAM_INT); // Si id_plat est un entier, utilisez PDO::PARAM_INT
        $stmt->bindParam(':quantite', $quantite, PDO::PARAM_INT); // Si quantite est un entier, utilisez PDO::PARAM_INT
        // $stmt->bindParam(':total', $total, PDO::PARAM_STR); 
        $stmt->bindParam(':nom_client', $nom_client, PDO::PARAM_STR);
        $stmt->bindParam(':tel_client', $tel_client, PDO::PARAM_STR);
        $stmt->bindParam(':email_client', $email_client, PDO::PARAM_STR);
        $stmt->bindParam(':adresse_client', $adresse_client, PDO::PARAM_STR);
        return $stmt->execute();

    }

    //     public function insertCommandeDataUser($id, $nom, $prenom, $email, $mot)
    //     {
    //         $requete = $this->db->prepare("INSERT INTO user (id, nom, prenom, email, adresse)
    // VALUES (:id, :nom, :prenom, :email, :mot_de_passe)");
    //         $requete->bindParam(':id', $id, PDO::PARAM_STR);
    //         $requete->bindParam(':nom_client', $nom, PDO::PARAM_STR);
    //         $requete->bindParam(':telephone_client', $prenom, PDO::PARAM_STR);
    //         $requete->bindParam(':email_client', $email, PDO::PARAM_STR);
    //         $requete->bindParam(':adresse_client', $adresse, PDO::PARAM_STR);

    //         return $requete->execute();
    //     }
}
