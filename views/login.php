<h2>Connexion</h2>

<form action="index.php?action=action_login" method="post">
    <div>
        <label for="username">Nom d'utilisateur</label>
        <input type="text" name="username" <?php if (isset($_POST['username'])) { echo 'value="'.$_POST['username'].'"'; } ?> id="username" placeholder="Votre nom d'utilisateur">
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Votre mot de passe">
    </div>
    <div>
        <input type="submit" value="Se connecter">
    </div>

    <ul>
        <?php
        if (isset($errors)) {
            foreach ($errors as $key => $error) {
                echo '<li>'.$key.': '.$error.'</li>';
            }
        }
        ?>
    </ul>
</form>