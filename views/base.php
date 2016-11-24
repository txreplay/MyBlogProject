<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo ucfirst($template); ?></title>
</head>
<body>
    <header>
        <h1><a href="index.php">MyBlogProject</a></h1>
        <nav>
            <ul>
                <li><a href="index.php?action=signup">S'inscrire</a></li>
                <?php if (!key_exists('user', $_SESSION)) { ?>
                    <li><a href="index.php?action=login">Connexion</a></li>
                <?php } else { ?>
                    <li><a href="index.php?action=action_logout">Déconnexion (<?=$user['username']?>)</a></li>
                <?php } ?>
            </ul>
        </nav>
    </header>
    <div id="content">
        <?php include 'views/'.$template.'.php'; ?>
    </div>
    <footer>

    </footer>
</body>
</html>