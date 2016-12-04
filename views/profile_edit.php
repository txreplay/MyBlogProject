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
                        <input type="email" class="form-control" readonly disabled name="email" value="<?php if (isset($_POST['email'])) { echo $_POST['email']; } else { echo $profile['email']; } ?>" id="email" placeholder="Votre adresse e-mail">
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

<script>
    (function() {
        <?php
        if (isset($errors)) {
        foreach ($errors as $key => $error):
        ?>
        iziToast.error({
            title: 'Erreur',
            message: "<?php echo $error ?>",
            position: 'topRight',
            layout: 2,
            color: 'red',
            timeout: 10000
        });
        <?php
        endforeach;
        }
        ?>
    })();
</script>