<?php
include 'index.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['user'])) {
        session_unset();
        session_destroy();
        echo '<script>console.log("Déconnexion réussie")</script>';
        header('Location: login.php');
    } else {
        echo '<script>console.warn("Déconnexion impossible")</script>';
    }
}
?>

<h2>Deconnexion</h2>
<form method="POST">
    <input type="hidden" name="logout" value="true">
    <button type="submit">Se deconnecter</button>
</form>