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

<?php include 'articles_list.php'; ?>