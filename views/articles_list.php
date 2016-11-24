<?php

foreach ($articles as $article) {
    echo '<h2><a href="index.php?action=article_single&id='.$article['article_id'].'" title="'.$article['article_title'].'">'.$article['article_title'].'</a></h2>';
}