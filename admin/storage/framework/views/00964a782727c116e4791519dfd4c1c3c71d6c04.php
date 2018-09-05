<?php $__env->startSection('main-content'); ?>

    <section class="content">
        <div class="container-fluid">

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Update Job Type
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <form method="POST" id="add_attribute" action="<?php echo e(url('/update-job-type')); ?>" novalidate="novalidate">
                                        <?php echo e(csrf_field()); ?>

                                        <label class="form-label">Job Type Name</label>
                                        <div class="form-group form-float">
                                            <div class="form-line">

                                                <input type="text" value="<?php echo e((isset($job_type['job_type']) ? $job_type['job_type'] : '')); ?>" name="job_type" required class="form-control">
                                                <input type="hidden" value="<?php echo e((isset($job_type['id']) ? $job_type['id'] : '')); ?>" name="id">

                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update Job Type</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>