<?php
include 'index.php';
require 'pdo.php';

$article = null;
$commentaires = [];
if (isset($_GET['id'])) {
    try {
        $queryArticle = $db->prepare('SELECT titre, contenu FROM articles WHERE id = :id');
        $queryArticle -> execute(['id' => $_GET['id']]);
        $article = $queryArticle -> fetch(PDO::FETCH_ASSOC);

        $queryCommentaires = $db->prepare('SELECT auteur, contenu FROM commentaires WHERE id_article = :id ORDER BY date DESC');
        $queryCommentaires -> execute(['id' => $_GET['id']]);
        $commentaires = $queryCommentaires -> fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        error_log($e->getMessage());
        echo '<p>Error fetching article. Please try again later.</p>';
    }
}

if (isset($_POST['comment']) && $_POST['comment'] !== "" && isset($_SESSION['user'])) {
    try {
        $query = $db->prepare('INSERT INTO commentaires(auteur, contenu, id_article) VALUES(:auteur, :contenu, :id_article)');
        $query->execute([
            'auteur' => $_SESSION['user']['email'],
            'contenu' => htmlspecialchars($_POST['comment']),
            'id_article' => $_GET['id'],
        ]);
        echo '<script>console.log("Commentaire ajouté")</script>';
        header('Location: article.php?id=' . $_GET['id']);
    } catch (Exception $e) {
        echo '<script>console.warn("' . $e->getMessage() . '")</script>';
    }
} 
?>

<h2>Article</h2>
<?php 
if ($article) {
    echo '<hr>';
    echo '<h3>' . $article['titre'] . '</h3>';
    echo '<p>' . $article['contenu'] . '</p>';
    echo '<h4>Commentaires</h4>';
    if (count($commentaires) > 0) {
        foreach ($commentaires as $commentaire) {
            echo '<h5>' . htmlspecialchars($commentaire['auteur']) . '</h5>';
            echo '<p>' . htmlspecialchars($commentaire['contenu']) . '</p>';
        }
    } else {
        echo '<p>Aucun commentaire</p>';
    }
    echo '<hr>';
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