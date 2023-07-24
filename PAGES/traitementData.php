<!-- je demande au programme de parcourir tous les champs du formulaire
de récupérer et afficher toutes les données saisies sous forme de tableau -->

<!-- 1/ Je vérifie le type de requete utiliser avec une condition-->
<!-- 2/ Je récupère des données du form avec la superglobale $_SERVER-->

<?PHP
$cheminTarget = __DIR__ . "/target.txt";

if ($_SERVER['REQUEST-METHOD'] === "POST") {

    // elements à afficher
    $datas = $_POST;
    // chemin du fichier vers lequel les données récupérés vont être affiché
    // $cheminTarget = "target.txt";
    // le fichier cheminTarget contient les valeurs de la variable datas/ "a"=append
    $fp = fopen($cheminTarget, "a");
    // Parcours des données et écriture dans le fichier txt
    // foreach ($REQUEST as $data=>$valeur)
    foreach ($datas as $champ => $valeur) {
        fwrite($fp, $champ . ":" . $valeur . "\n");
        // fputs($fp, $datas .":". $valeur . "\n");

    }
    fclose($fp);
}

var_dump($_POST); // Affiche le contenu des données du formulaire

// Lire le contenu du fichier target.txt et afficher les données
if (file_exists($cheminTarget)) {
    // Lire le contenu du fichier dans une variable
    $contenu = file_get_contents($cheminTarget);

    // Diviser le contenu en lignes en utilisant le saut de ligne comme délimiteur
    $lignes = explode("\n", $contenu);

    // Parcourir chaque ligne et afficher les données
    foreach ($lignes as $ligne) {
        // Diviser la ligne en deux parties : le nom du champ et sa valeur
        $donnees = explode(":", $ligne);

        // Vérifier si le champ et sa valeur existent
        if (count($donnees) === 2) {
            $champ = trim($donnees[0]);
            $valeur = trim($donnees[1]);

            // Afficher le champ et sa valeur
            echo "$champ : $valeur<br>";
        }
    }
} else {
    echo "Aucune donnée n'a été enregistrée pour le moment.";
}

?>