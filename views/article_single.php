<?php
if (isset($message)) {
    echo '<p>'.$message.'</p>';
}
?>

<h2><?=$article['article_title']?></h2>
<p>Créé par <?=$article['user_username']?>, le <?=$article['article_created']?></p>

<p><?=$article['article_content']?></p>