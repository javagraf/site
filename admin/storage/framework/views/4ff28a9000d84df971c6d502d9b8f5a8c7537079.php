<!DOCTYPE html>
<html>

<?php echo $__env->make('layout.headdefault', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<body class="theme-blue">


<script type="text/javascript">
    var APP_URL = <?php echo json_encode(url('/')); ?>

    var token = '<?php echo csrf_token(); ?>'

</script>
<?php if(session('returnStatus')): ?>
    <?php echo $__env->make('partials.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>

<?php echo $__env->make('layout.headerdefault', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<?php echo $__env->make('layout.admin.asidebardefault', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>



<?php echo $__env->yieldContent('main-content'); ?>




<?php echo $__env->make('layout.scriptdefault', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


</body>

</html>