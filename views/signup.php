<h2>Inscription</h2>

<form action="index.php?action=action_signup" method="post">
    <div>
        <label for="username">Nom d'utilisateur</label>
        <input type="text" name="username" <?php if (isset($_POST['username'])) { echo 'value="'.$_POST['username'].'"'; } ?> id="username" placeholder="Votre nom d'utilisateur">
    </div>
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" <?php if (isset($_POST['email'])) { echo 'value="'.$_POST['email'].'"'; } ?> id="email" placeholder="Votre adresse e-mail">
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Votre mot de passe">
        <input type="password" name="password_repeat" id="password_repeat" placeholder="Confirmation de mot de passe">
    </div>
    <div>
        <input type="submit" value="S'inscrire">
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