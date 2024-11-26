<?php
require 'libs/header.php';
require 'libs/pdo.php';
require 'libs/article.php';

$article = null;
$commentaires = [];
if (isset($_GET['id'])) {
    $article = getArticleById($db, $_GET['id']);
    $commentaires = getArticleCommentsById($db, $_GET['id']);
}

if (isset($_POST['comment']) && $_POST['comment'] !== "" && isset($_SESSION['user'])) {
    postComment($db, $_POST['comment'], $_GET['id'], $_SESSION['user']);
} 
?>

<h2>Article</h2>
<?php 
if ($article) {
    echo '<div><div class="article-box">';
    echo '<h3>' . $article['titre'] . '</h3>';
    echo '<p>' . $article['contenu'] . '</p></div>';
    echo '<h4>Commentaires</h4>';
    if (count($commentaires) > 0) {
        foreach ($commentaires as $commentaire) {
            echo '<div class="comment-box"><h5>' . htmlspecialchars($commentaire['auteur']) . '</h5>';
            echo '<p>' . htmlspecialchars($commentaire['contenu']) . '</p></div>';
        }
    } else {
        echo '<p>Aucun commentaire</p>';
    }
    echo '</div>';
} else {
    echo '<p>Article inexistant</p>';
}
?>

<p>Ajouter un commentaire<p>
<?php
//Afficher le formulaire seulement si l'utilisateur est connecté
if (isset($_SESSION['user'])) {
    echo '<form method="POST">';
    echo '<input type="text" name="comment" placeholder="Votre message...">';
    echo '<button type="submit">Envoyer</button>';
    echo '</form>';
} else {
    echo '<p>Connectez-vous pour ajouter un commentaire</p>';
}
?>