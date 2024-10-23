<?php
include 'index.php';
require 'pdo.php';

try {
    if (isset($_POST['email']) && isset($_POST['password']) && !isset($_SESSION['user'])) {
        $query = $db->prepare('SELECT * FROM users WHERE email = :email');
        $query->execute([
            'email' => $_POST['email'],
        ]);
        $user = $query->fetch();
        if ($user && password_verify($_POST['password'], $user['password'])) {
            echo '<script>console.log("Connexion réussie")</script>';
            $_SESSION['user'] = $user;
            header('Location: news.php');
        } else {
            echo '<script>console.warn("Identifiants incorrects")</script>';
        }
    } else {
        echo '<script>console.warn("Connexion impossible ou tous les champs ne sont pas renseignés")</script>';
    }
} catch (Exception $e) {
    echo '<script>console.warn("' . $e->getMessage() . '")</script>';
}
?>

<h2>Connexion</h2>
<form method="POST">
    <input type="text" name="email" placeholder="E-mail">
    <input type="password" name="password" placeholder="Password">
    <button type="submit">Se connecter</button>
</form>