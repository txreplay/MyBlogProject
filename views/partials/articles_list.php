<?php

if ($list_param == 'full') {
    if(empty($articles)) { ?>
    <p>Aucun article publié.</p>
<?php } ?>
<?php foreach ($articles as $article) { ?>
    <div class="post-preview">
        <a href="index.php?action=article_single&id=<?=$article['article_id']?>" title="<?=$article['article_title']?>">
            <h2 class="post-title">
                <?=$article['article_title']?>
            </h2>
            <h3 class="post-subtitle">
                <?=$article['article_chapeau']?>
            </h3>
        </a>
        <p class="post-meta">Posté par <a href="index.php?action=profile_show&id=<?=$article['user_id']?>"><?=$article['user_username']?></a> le  <?=$article['article_created']?></p>
    </div>
    <hr>
<?php }
} elseif ($list_param == 'title') {
    if(empty($articles)) { ?>
        <p>Aucun article publié.</p>
    <?php } ?>
    <?php foreach ($articles as $article) { ?>
        <div class="post-preview">
            <a href="index.php?action=article_single&id=<?=$article['article_id']?>" title="<?=$article['article_title']?>">
                <h4>
                    <?=$article['article_title']?>
                </h4>
        </div>
        <hr>
    <?php }
} ?>