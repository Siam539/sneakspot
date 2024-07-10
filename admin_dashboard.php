<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: admin_login.php');
    exit();
}
require_once "header.php"
?>

<?php
if (isset($_POST["submit"])) {


    require_once "DB.php";

    // Répertoire de destination pour les fichiers uploadés
    $upload_dir = "uploads";
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $image_name = "";
    $image = $_FILES["image"];
    if ($image["name"]) {
        $image_name = $image["name"];
        $image_tmp_name = explode(".", $image_name);
        $image_ext = end($image_tmp_name);
        $image_final_name = time() . rand(1000, 9999) . "." . $image_ext;
        $image_path = $upload_dir . "/" . $image_final_name;
        move_uploaded_file($image["tmp_name"], $image_path);
    }

    // Préparation de la requête d'insertion SQL
    $sql = "INSERT INTO sneaker (model, size, price, date, image, percent_show) VALUES (:model, :size, :price, :date, :image, :percent_show)";
    $stmt = $pdo->prepare($sql);

    // Les données du formulaire
    $model = $_POST['model'];
    $size = $_POST['size'];
    $price = $_POST['price'];
    $date = $_POST['date'];
    $percent_show = $_POST['percent_show'];

    // Liaison des paramètres
    $stmt->bindParam(':model', $model);
    $stmt->bindParam(':size', $size);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':image', $image_final_name);
    $stmt->bindParam(':percent_show', $percent_show);

    $stmt->execute();

    $product_id = $pdo->lastInsertId();

    $count = count($_FILES["gallery"]["name"]);
    for ($i = 0; $i < $count; $i++) {
        $image_name = $_FILES["gallery"]["name"][$i];
        if ($image_name) {
            $image_tmp_name = explode(".", $image_name);
            $image_ext = end($image_tmp_name);
            $image_final_name = time() . rand(1000, 9999) . "." . $image_ext;
            $image_path = $upload_dir . "/" . $image_final_name;
            move_uploaded_file($_FILES["gallery"]["tmp_name"][$i], $image_path);
            $sqlimg = "INSERT INTO product_images (product_id, image) VALUES (:product_id, :image)";
            $stmt2 = $pdo->prepare($sqlimg);
            $stmt2->bindParam(':product_id', $product_id);
            $stmt2->bindParam(':image', $image_final_name);
            $stmt2->execute();
        }
    }
}
?>

<div class="error-area text-center ptb-100">
    <div class="container">
        <h1>Bienvenue sur le portail administratif</h1>
        <p>Accessible uniquement à l'administrateur.</p>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="model">Modèle:</label><br>
            <input type="text" id="model" name="model" required><br><br>

            <label for="size">Taille:</label><br>
            <input type="text" id="size" name="size" required><br><br>

            <label for="price">Prix:</label><br>
            <input type="number" id="price" name="price" step="0.01" required><br><br>

            <label for="percent_show">Réduction:</label><br>
            <input type="number" id="percent_show" name="percent_show" step="0.01"><br><br>

            <label for="date">Disponibilité:</label><br>
            <input type="text" id="date" name="date" required><br><br>

            <label for="image">Image devant :</label><br>
            <input type="file" id="image" name="image" required><br><br>

            <label for="gallery">Galerie d'images :</label><br>
            <input type="file" id="image1" name="gallery[]" multiple required><br><br>

            <input type="submit" name="submit" value="Soumettre">
        </form>
    </div>
</div>
<?php
require_once "footer.php";
?>