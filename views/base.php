<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo ucfirst($template); ?></title>

    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles/clean-blog.min.css" rel="stylesheet">
    <link href="bower_components/izitoast/dist/css/iziToast.min.css" rel="stylesheet">
    <link href="styles/main.css" rel="stylesheet">
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="javascript/clean-blog.min.js"></script>
    <script src="bower_components/izitoast/dist/js/iziToast.min.js" type="text/javascript"></script>
</head>
<body>
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.php">MyKittenBlog</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right main-menu">
                    <?php if (!key_exists('user', $_SESSION)) { ?>
                        <li><a href="index.php?action=signup">S'inscrire</a></li>
                        <li><a href="index.php?action=login">Connexion</a></li>
                    <?php } else { ?>
                        <li><a href="index.php?action=article_new">Écrire un article</a></li>
                        <li>
                            <a href="javascript:void(0)" class="submenu-owner"><?=$user['username']?> <i class="fa fa-chevron-down" aria-hidden="true"></i></a>
                            <ul class="submenu">
                                <li><a href="index.php?action=profile_show&id=<?=$user['id']?>">Mon compte</a></li>
                                <li><a href="index.php?action=action_logout">Déconnexion</a></li>
                            </ul>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
    <header class="intro-header" style="background-image: url('images/header-home.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1><img src="images/logo-white.png" class="logo" alt="Logo"></h1>
                        <hr class="small">
                        <span class="subheading">A sweet blog about kittens.</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div id="content">
        <?php include 'views/'.$template.'.php'; ?>
    </div>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <ul class="list-inline text-center">
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <p class="copyright text-muted">Copyright &copy; MyKittyBlog 2016</p>
                </div>
            </div>
        </div>
    </footer>

    <script>
        $(document).ready(function() {
            $('.submenu-owner').click(function() {
                $('.submenu').fadeToggle();
            });
        });
    </script>
</body>
</html>