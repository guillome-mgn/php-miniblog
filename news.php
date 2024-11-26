<?php
require 'libs/header.php';
require 'libs/pdo.php';
require 'libs/article.php';

$articles = getAllArticles($db);
?>

<h2>News</h2>
<?php 
if (count($articles) > 0) {
    foreach ($articles as $article) {
        echo '<div class="article-box">';
        echo '<a href="article.php?id=' . $article['id'] . '"><h3>' . $article['titre'] . '</h3></a>';
        echo '<p>' . $article['contenu'] . '</p>';
        echo '</div>';
    }
} else {
    echo '<p>Aucun article</p>';
}
?>