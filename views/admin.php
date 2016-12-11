<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <h2>Administration</h2>
            <?php
                foreach ($users as $user) {
            ?>
                    <a href="index.php?action=profile_edit&id=<?=$user['id']?>" title="Modifier mon profil">
                        <h3 class="post-title"><?=$user['id']?>. <?=$user['username']?> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></h3>
                    </a>
            <?php
                }
            ?>
        </div>
    </div>
</div>