<?php
session_start();
require_once "DB.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les valeurs de username et password depuis le formulaire POST
    $username = $_POST['username'] ?? null;
    $password = $_POST['password'] ?? null;

    if ($username && $password) {
        $sql = "SELECT * FROM admin WHERE username = :username";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['username' => $username]);
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($admin && password_verify($password, $admin['password'])) {
            $_SESSION['admin_logged_in'] = true;
            header('Location: admin_dashboard.php');
            exit();
        } else {
            echo "Invalid username or password.";
        }
    } else {
        echo "Username and password are required.";
    }
}
