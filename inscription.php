<?php
include 'index.php';
require 'pdo.php';

try {
    if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
        $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $query = $db->prepare('INSERT INTO users(username, email, password) VALUES(:username, :email, :password)');
        $query->execute([
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'password' => $hashedPassword
        ]);
        echo '<script>console.log("Inscription réussie")</script>';
        header('Location: login.php');
    }
} catch (Exception $e) {
    echo '<script>console.warn("' . $e->getMessage() . '")</script>';
}
?>

<h2>Inscription</h2>
<form method="POST">
    <input type="text" name="username" id="username" placeholder="Nom d'utilisateur" required>
    <input type="email" name="email" id="email" placeholder="E-mail" required>
    <input type="password" name="password" id="password" placeholder="Mot de passe" required>
    <button type="submit">S'inscrire</button>
</form>