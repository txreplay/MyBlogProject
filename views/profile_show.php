<?php

if (isset($message)) {
    echo '<p>'.$message.'</p>';
}
?>

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <h2>
                <?=$profile['username']?>
                <?php if ($profile['id'] === $user['id']) { ?>
                    <small><a href="index.php?action=profile_edit&id=<?=$user['id']?>" title="Modifier mon profil"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></small>
            <?php } ?>
            </h2>
            <h3><small>Inscris le <?=strftime('%d %B %G', strtotime($profile['created'])); ?>.</small></h3>
        </div>
    </div>
</div>