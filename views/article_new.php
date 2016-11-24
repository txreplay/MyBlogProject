<h2>Écrire un article</h2>

<form action="index.php?action=action_article_new" method="post">
    <div>
        <label for="title">Titre de l'article</label>
        <input type="text" name="title" <?php if (isset($_POST['title'])) { echo 'value="'.$_POST['title'].'"'; } ?> id="title" placeholder="Titre de votre article">
    </div>

    <div>
        <label for="content">Contenu de l'article</label>
        <textarea name="content" id="" cols="30" rows="10"id="content" placeholder="Contenu de l'article">
            <?php if (isset($_POST['content'])) { echo 'value="'.$_POST['content'].'"'; } ?>
        </textarea>
    </div>
    <div>
        <input type="submit" value="Poster">
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