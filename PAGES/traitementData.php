<!-- je demande au programme de parcourir tous les champs du formulaire
de récupérer et afficher toutes les données saisies sous forme de tableau -->

<!-- 1/ Je vérifie le type de requete utiliser avec une condition-->
<!-- 2/ Je récupère des données du form avec la superglobale $_SERVER-->

<?php
// $cheminTarget = __DIR__ . "/target.txt";

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    // elements à afficher
    $datas = $_POST;

    // Ajout de la date (heure d'envoi) aux données
    $datas['timestamp'] = date('Y-m-d H:i:s');

    // Je stocke le chemin du fichier vers lequel les données récupérés vont être affiché dans une variables
    $cheminTarget = "target.txt";

    // La fonction fopen() = file open > permet d'ouvrir un fichier
    // les paramètres de cette fonction sont (nom du fichier à ouvrir, mode d'ouverture du dit fichier)"a"=append
    $fp = fopen($cheminTarget, "a");

    // Parcours des données et écriture dans le fichier txt
    // foreach ($REQUEST as $data=>$valeur){
    foreach ($datas as $champ => $valeur) {
        fwrite($fp, $champ . ":" . $valeur . "\n");
        // fputs($fp, $datas . ":" . $valeur . "\n");
    }

    fclose($fp);
    // var_dump($_POST);
  // Redirige l'utilisateur vers une page de confirmation après la soumission réussie
  header("Location: confirmation.php");
  exit(); //  terminer le script ici pour éviter toute exécution supplémentaire
}

// Lire le contenu du fichier target.txt et afficher les données
// if (file_exists($cheminTarget)) {
// Lire le contenu du fichier dans une variable
// $contenu = file_get_contents($cheminTarget);

// Diviser le contenu en lignes en utilisant le saut de ligne comme délimiteur
// $lignes = explode("\n", $contenu);

// Parcourir chaque ligne et afficher les données
// foreach ($lignes as $ligne) {
// Diviser la ligne en deux parties : le nom du champ et sa valeur
// $donnees = explode(":", $ligne);

// Vérifier si le champ et sa valeur existent
// if (count($donnees) === 2) {
//     $champ = trim($donnees[0]);
//     $valeur = trim($donnees[1]);

// Afficher le champ et sa valeur
//             echo "$champ : $valeur<br>";
//         }
//     }
// } else {
//     echo "Aucune donnée n'a été enregistrée pour le moment.";
// }
?>