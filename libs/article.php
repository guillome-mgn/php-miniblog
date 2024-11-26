<?php

function getAllArticles(PDO $db) {
    try {
        $query = $db->query('SELECT titre, contenu, id FROM articles');
        return $query->fetchAll();
    } catch (Exception $e) {
        echo '<script>console.warn("' . $e->getMessage() . '")</script>';
    }
}

function getArticleById(PDO $db, $id) {
    try {
        $queryArticle = $db->prepare('SELECT titre, contenu FROM articles WHERE id = :id');
        $queryArticle -> execute(['id' => $_GET['id']]);
        return $queryArticle -> fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        error_log($e->getMessage());
        echo '<p>Error fetching article. Please try again later.</p>';
    }
}

function getArticleCommentsById(PDO $db, $id) {
    try {
        $queryCommentaires = $db->prepare('SELECT auteur, contenu FROM commentaires WHERE id_article = :id ORDER BY date DESC');
        $queryCommentaires -> execute(['id' => $_GET['id']]);
        return $queryCommentaires -> fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        error_log($e->getMessage());
        echo '<p>Error fetching comments. Please try again later.</p>';
    }
}

function postComment($db, $comment, $articleId, $user) {
    try {
        $query = $db->prepare('INSERT INTO commentaires(auteur, contenu, id_article) VALUES(:auteur, :contenu, :id_article)');
        $query->execute([
            'auteur' => $user['email'],
            'contenu' => htmlspecialchars($comment),
            'id_article' => $articleId,
        ]);
        echo '<script>console.log("Commentaire ajouté")</script>';
        header('Location: article.php?id=' . $articleId);
    } catch (Exception $e) {
        echo '<script>console.warn("' . $e->getMessage() . '")</script>';
    }
}

?>