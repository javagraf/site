<?php if(session('status') && session('status') == 101): ?>
    <script type="text/javascript">
        var status = <?php echo json_encode(session('status')); ?>

        var message = <?php echo json_encode(session('message')); ?>

 </script>
<?php endif; ?>
