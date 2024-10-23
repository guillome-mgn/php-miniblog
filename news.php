<?php
include 'index.php';
require 'pdo.php';

$articles = [];
try {
    $query = $db->query('SELECT titre, contenu, id FROM articles');
    $articles = $query->fetchAll();
} catch (Exception $e) {
    echo '<script>console.warn("' . $e->getMessage() . '")</script>';
}
?>

<h2>News</h2>
<?php 
if (count($articles) > 0) {
    foreach ($articles as $article) {
        echo '<hr>';
        echo '<a href="article.php?id=' . $article['id'] . '"><h3>' . $article['titre'] . '</h3></a>';
        echo '<p>' . $article['contenu'] . '</p>';
        echo '<hr>';
    }
} else {
    echo '<p>Aucun article</p>';
}
?>