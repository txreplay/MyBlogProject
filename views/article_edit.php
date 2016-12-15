<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <h2>Modifier un article</h2>

            <form action="index.php?action=action_article_edit" method="post">
                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label for="title">Titre de l'article</label>
                        <input type="text" class="form-control" name="title" <?='value="'.$article['article_title'].'"'?> id="title" placeholder="Titre de votre article">
                    </div>
                </div>
                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label for="chapeau">Chapeau de l'article</label>
                        <input type="text" class="form-control" name="chapeau" <?='value="'.$article['article_chapeau'].'"'?> id="title" placeholder="Chapeau de votre article">
                    </div>
                </div>
                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label for="content">Contenu de l'article</label>
                        <textarea name="content" class="form-control" cols="30" rows="10" id="content" placeholder="Contenu de l'article"><?=$article['article_content']?></textarea>
                        </div>
                </div>
                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label for="status">Statut de l'article</label>
                        <select name="status" id="status">
                            <option <?php if ($article['article_status'] == 0) { ?> selected="selected" <?php } ?> value="0">En préparation</option>
                            <option <?php if ($article['article_status'] == 1) { ?> selected="selected" <?php } ?> value="1">Publié</option>
                            <option <?php if ($article['article_status'] == 2) { ?> selected="selected" <?php } ?> value="2">Non-publié</option>
                            <option <?php if ($article['article_status'] == 3) { ?> selected="selected" <?php } ?> value="3">Supprimé</option>
                        </select>
                    </div>
                </div>
                <input type="hidden" name="id" id="id" value="<?=$article['article_id']?>">
                <br>
                <div id="success"></div>
                <div class="row">
                    <div class="form-group col-xs-12">
                        <input type="submit" class="btn btn-default" value="Modifier">
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
<script src="bower_components/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
    tinymce.init({
        selector: '#content',
        menubar: false,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table contextmenu paste code'
        ],
        toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image'
    });
</script>