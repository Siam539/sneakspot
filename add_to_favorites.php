<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $favorite_id = intval($_POST['favorite_id']);
    if (!isset($_SESSION['favorites'])) {
        $_SESSION['favorites'] = [];
    }

    if (!in_array($favorite_id, $_SESSION['favorites'])) {
        $_SESSION['favorites'][] = $favorite_id;
    }
}

header('Location: favorites.php');
exit();
?>
