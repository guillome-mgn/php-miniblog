<!DOCTYPE html>
<html>
    <body>
        <h1>Mini Blog</h1>
    </body>

    <?php
        session_start();
        if (isset($_SESSION['user'])) {
            echo '<p>Bonjour ' . $_SESSION['user']['email'] . '</p>';
        }
    ?>

    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="news.php">News</a></li>
            <li><a href="inscription.php">Inscription</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
</html>
