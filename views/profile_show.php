<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <img src="<?=$gravatar?>" class="avatar" alt="Votre photo de profil">
            <h2>
                <?=$profile['username']?>
                <?php if (isset($user) && $profile['id'] === $user['id']) { ?>
                    <small><a href="index.php?action=profile_edit&id=<?=$user['id']?>" title="Modifier mon profil"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></small>
            <?php } ?>
            </h2>
            <h3><small>Inscris le <?=strftime('%d %B %G', strtotime($profile['created'])); ?>.</small></h3>
        </div>
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <p>Articles de <?=$profile['username']?> :</p>

            <?php include 'partials/articles_list.php'; ?>
        </div>
    </div>
</div>

<?php if (isset($message)) { ?>
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
<?php } ?>