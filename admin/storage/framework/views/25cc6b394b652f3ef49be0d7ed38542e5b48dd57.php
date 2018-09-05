<?php $__env->startSection('main-content'); ?>

    <section class="content">
        <div class="container-fluid">
            

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                        <div class="header">
                            <h2>
                                All Recruiters
                            </h2>
                        </div>
                            <div class="body">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                    <tr>

                                        <th>S. No.</th>
                                        <th>Organization Name</th>
                                        <th>Email</th>
                                        <th>Mobile No.</th>
                                        <th>Action</th>
                                        <th>Delete</th>

                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php $i=0; ?>
                                    <?php $__currentLoopData = $recruiter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_recruiter => $value_recruiter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <?php $i++; echo $i; ?>
                                            </td>
                                            <td>
                                                <?php echo e($value_recruiter['organisation_name']); ?>

                                            </td>
                                            <td>
                                                <?php echo e($value_recruiter['recruiter_email']); ?>

                                            </td>
                                            <td>
                                                <?php echo e($value_recruiter['recruiter_mobile_no']); ?>

                                            </td>
                                            <td>
                                                <a href="<?php echo e(url('/recruiter/posted-jobs').'/'.$value_recruiter['id']); ?> "> <button type="button" class="btn bg-brown waves-effect">See Posted Jobs</button></a>
                                            </td>
                                            <td>
                                                <a onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo e(url('delete-recruiter').'/'.$value_recruiter['id']); ?>"><button type="submit" class="btn btn-info waves-effect">Delete</button></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>