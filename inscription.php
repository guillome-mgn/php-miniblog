<?php
require 'libs/header.php';
require 'libs/pdo.php';
require 'libs/user.php';

if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
    addUser($db, $_POST['username'], $_POST['email'], $_POST['password']);
    header('Location: login.php');
}
?>

<h2>Inscription</h2>
<form method="POST">
    <input type="text" name="username" id="username" placeholder="Nom d'utilisateur" required>
    <input type="email" name="email" id="email" placeholder="E-mail" required>
    <input type="password" name="password" id="password" placeholder="Mot de passe" required>
    <button type="submit">S'inscrire</button>
</form>