<article>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <h2 class="section-heading">
                    <?=$article['article_title']?>
                    <?php if (isset($user) && $article['user_id'] === $user['id'] || $user['role_id'] == 1) { ?>
                        <small>
                            <a href="index.php?action=article_edit&id=<?=$article['article_id']?>" title="Modifier cet article"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        </small>
                    <?php } ?>
                </h2>
                <h4 class="subheading"><?=$article['article_chapeau']?></h4>
                <span class="meta">Posté par <a href="index.php?action=profile_show&id=<?=$article['user_id']?>"><?=$article['user_username']?></a> le  <?=$article['article_created']?></span>

                <p><?=$article['article_content']?></p>
            </div>
        </div>
    </div>
</article>

<script>
    (function() {
        iziToast.<?php echo $message['type'] ?>({
            title: "<?php echo $message['title'] ?>",
            message: "<?php echo $message['text'] ?>",
            position: 'topCenter',
            layout: 2,
            timeout: 5000
        });
    })();
</script>