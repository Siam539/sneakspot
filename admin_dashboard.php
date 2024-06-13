<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: admin_login.php');
    exit();
}
require_once "header.php"
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
</head>

<body>
    <h1>Bienvenue sur le portail administratif</h1>
    <p>Accessible uniquement à l'administrateur.</p>
    <?php
    require_once "admin.php"

    ?>
</body>

</html>