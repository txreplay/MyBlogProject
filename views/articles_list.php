<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <?php foreach ($articles as $article) { ?>
            <div class="post-preview">
                <a href="index.php?action=article_single&id=<?=$article['article_id']?>" title="<?=$article['article_title']?>">
                    <h2 class="post-title">
                        <?=$article['article_title']?>
                    </h2>
                    <h3 class="post-subtitle">
                        Problems look mighty small from 150 miles up
                    </h3>
                </a>
                <p class="post-meta">Posté par <a href="index.php?action=profile_show&id=<?=$article['user_id']?>"><?=$article['user_username']?></a> le  <?=$article['article_created']?></p>
            </div>
            <hr>
            <?php } ?>
        </div>
    </div>
</div>