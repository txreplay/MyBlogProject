<?php

if (isset($message)) {
    echo '<p>'.$message.'</p>';
}
?>

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <h2 class="section-heading">Modification du profil</h2>
            <form action="index.php?action=action_profile_edit" method="post">
                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label for="username">Nom d'utilisateur</label>
                        <input type="text" class="form-control" name="username" value="<?php if (isset($_POST['username'])) { echo $_POST['username']; } else { echo $profile['username']; } ?>" id="username" placeholder="Votre nom d'utilisateur">
                    </div>
                </div>
                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" value="<?php if (isset($_POST['email'])) { echo $_POST['email']; } else { echo $profile['email']; } ?>" id="email" placeholder="Votre adresse e-mail">
                    </div>
                </div>
                <br>
                <div id="success"></div>
                <div class="row">
                    <div class="form-group col-xs-12">
                        <input type="submit" class="btn btn-default" value="Mettre à jour">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>