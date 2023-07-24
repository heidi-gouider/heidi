<!-- je demande au programme de parcourir tous les champs du formulaire
de récupérer et afficher toutes les données saisies sous forme de tableau -->

<!-- 1/ Je vérifie le type de requete utiliser avec une condition-->
<!-- 2/ Je récupère des données du form avec la superglobale $_SERVER-->

<?PHP
if ($_SERVER['REQUEST-METHOD'] === "POST") {

    // elements à afficher
    $datas = $_POST;
    // chemin du fichier vers lequel les données récupérés vont être affiché
    $cheminTarget = "target.txt";
    // le fichier cheminTarget contient les valeurs de la variable datas/ "a"=append
    $fp = fopen($cheminTarget, "a");
// Parcours des données et écriture dans le fichier txt
    // foreach ($REQUEST as $data=>$valeur)
    foreach ($datas as $data => $valeur)  {
fwrite($fp, $data .":". $valeur . "\n");
    }
    fclose($fp);
}
?>