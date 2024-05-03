<?php
if(isset($_POST["submit"])){


define('DB_USER', "root");
define('DB_PASSWORD', "Super");

// Connexion à la base de données
try {
    $pdo = new PDO("mysql:host=localhost;dbname=SneakerWeb", DB_USER, DB_PASSWORD);
} catch (Exception $e) {
    die("Erreur de connexion à la base de données: " . $e->getMessage());
}

// Préparation de la requête d'insertion SQL
$sql = "INSERT INTO sneaker (model, size, price, date, image, Dprice) VALUES (:model, :size, :price, :date, :image, :Dprice)";
$stmt = $pdo->prepare($sql);

// Les données du formulaire
$model = $_POST['model'];
$size = $_POST['size'];
$price = $_POST['price'];
$date = $_POST['date']; // Assurez-vous que le formulaire contient un champ 'date'
$image = $_POST['image']; // Utilisez le nom de la variable correcte
$Dprice = $_POST['Dprice'];

// Liaison des paramètres
$stmt->bindParam(':model', $model);
$stmt->bindParam(':size', $size);
$stmt->bindParam(':price', $price);
$stmt->bindParam(':date', $date);
$stmt->bindParam(':image', $image);
$stmt->bindParam(':Dprice', $Dprice);

// Exécution de la requête
if ($stmt->execute()) {
    echo "Les données du produit ont été insérées avec succès.";
} else {
    echo "Une erreur s'est produite lors de l'insertion des données.";
}
}
?>




<?php
require_once "header.php"
?>


<div class="error-area text-center ptb-100">
    <form action="" method="post">
        <label for="model">Modèle:</label><br>
        <input type="text" id="model" name="model" required><br><br>

        <label for="size">Taille:</label><br>
        <input type="text" id="size" name="size" required><br><br>

        <label for="price">Prix:</label><br>
        <input type="number" id="price" name="price" step="0.01" required><br><br>

        <label for="Dprice">Prix remisé:</label><br>
        <input type="number" id="Dprice" name="Dprice" step="0.01"><br><br>

        <label for="date">Disponibilité:</label><br>
        <input type="text" id="date" name="date" required><br><br>

        <label for="image">Nom de l'image:</label><br>
        <input type="text" id="image" name="image" required><br><br>


        <input type="submit" name="submit" value="Soumettre">
    </form>
</div>

<?php
require_once "footer.php"
?>