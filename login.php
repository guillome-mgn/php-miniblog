<?php
require 'libs/header.php';
require 'libs/pdo.php';
require 'libs/user.php';

if (isset($_POST['email']) && isset($_POST['password']) && !isset($_SESSION['user'])) {
    login($db, $_POST['email'], $_POST['password']);
} else {
    echo '<script>console.warn("Connexion impossible ou tous les champs ne sont pas renseignés")</script>';
}
?>

<h2>Connexion</h2>
<form method="POST">
    <input type="text" name="email" placeholder="E-mail">
    <input type="password" name="password" placeholder="Password">
    <button type="submit">Se connecter</button>
</form>