<!DOCTYPE html>
<html>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="news.php">News</a></li>
            <li><a href="inscription.php">Inscription</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <body>
        <h1>Mini Blog</h1>
    </body>

    <?php
        session_start();
        if (isset($_SESSION['user'])) {
            echo '<p>Bonjour ' . $_SESSION['user']['email'] . '</p>';
        }
    ?>

    <hr>
</html>

<style>
    nav > ul {
        display: flex;
        gap: 15px;
        list-style-type: none;
        flex-direction: row;
        width: fit-content;
        margin: auto;
    }
    nav > ul > li {
        border: 2px solid gray;
        padding: 10px;
        background-color: lightgray;
        cursor: pointer;
    }
    nav > ul > li:first-child {
        border-radius: 10px 0 0 10px;
    }
    nav > ul > li:last-child {
        border-radius: 0 10px 10px 0;
    }
    nav > ul > li > a {
        text-decoration: none;
        color: black;
    }

    h1, h2, h3, h4, h5, p {
        text-align: center;
    }

    form {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: auto;
    }
    form > input {
        margin-bottom: 10px;
    }

    .article-box {
        width: 500px;
        height: fit-content;
        margin: auto;
        border-radius: 10px;
        padding: 10px;
        background-color: lightgray;
        margin-bottom: 20px;
    }

    .comment-box {
        display: flex;
        align-items: center;
        flex-direction: column;
        border-radius: 10px;
        padding: 10px;
        width: fit-content;
        margin: auto;
        margin-bottom: 20px;
        background-color: lightgray;
    }
    .comment-box > h5, .comment-box > p {
        width: fit-content;
        margin: 0;
    }
    .comment-box > h5 {
        align-self: flex-start;
    }
</style>