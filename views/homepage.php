<?php if (isset($message)) { ?>
    <script>
        (function() {
            iziToast.<?php echo $message['type'] ?>({
                title: "<?php echo $message['title'] ?>",
                message: "<?php echo $message['text'] ?>",
                position: 'topCenter',
                layout: 2,
                timeout: 5000
            });
        })();
    </script>
<?php } ?>

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <?php include 'partials/articles_list.php'; ?>
        </div>
    </div>
</div>