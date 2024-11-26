<?php
function addUser(PDO $db, $username, $email, $password) {
    try {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $query = $db->prepare('INSERT INTO users(username, email, password) VALUES(:username, :email, :password)');
        $query->execute([
            'username' => $username,
            'email' => $email,
            'password' => $hashedPassword
        ]);
        echo '<script>console.log("Inscription réussie")</script>';
    } catch (exception $e) {
        echo '<script>console.warn("' . $e->getMessage() . '")</script>';
    }
}

function login(PDO $db, $email, $password) {
    try {
        $query = $db->prepare('SELECT * FROM users WHERE email = :email');
        $query->execute([
            'email' => $_POST['email'],
        ]);
        $user = $query->fetch();
        if ($user && password_verify($_POST['password'], $user['password'])) {
            echo '<script>console.log("Connexion réussie")</script>';
            $_SESSION['user'] = $user;
            session_regenerate_id(true);
            header('Location: news.php');
        } else {
            echo '<script>console.warn("Identifiants incorrects")</script>';
        }
    } catch (exception $e) {
        echo '<script>console.warn("' . $e->getMessage() . '")</script>';
    }

}

function logout() {
    if (isset($_SESSION['user'])) {
        session_unset();
        session_destroy();
        echo '<script>console.log("Déconnexion réussie")</script>';
        session_regenerate_id(true);
        header('Location: login.php');
    } else {
        echo '<script>console.warn("Déconnexion impossible")</script>';
    }
}
?>