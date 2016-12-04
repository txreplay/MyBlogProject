<?php
if (isset($message)) {
    echo '<p>'.$message.'</p>';
}
?>

<article>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <h2 class="section-heading"><?=$article['article_title']?></h2>
                <p class="post-meta">Posté par <a href="index.php?action=profile_show&id=<?=$article['user_id']?>"><?=$article['user_username']?></a> le  <?=$article['article_created']?></p>

                <p><?=$article['article_content']?></p>
            </div>
        </div>
    </div>
</article>