<?php $__env->startSection('main-content'); ?>

    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Add Job Role
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                    <form method="POST" id="add_attribute" action="<?php echo e(url('/add-new-job-role')); ?>" novalidate="novalidate">
                                        <?php echo e(csrf_field()); ?>

                                        <label class="form-label">Job Role Name</label>
                                        <div class="form-group form-float">
                                            <div class="form-line">

                                                <input type="text" name="job_by_role" required class="form-control">

                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Add Job Role</button>
                                    </form>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="card">
                                        <div class="header">
                                            <h2>
                                                All Job Roles
                                            </h2>
                                        </div>
                                        <div class="body">
                                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                <thead>
                                                <tr>

                                                    <th>S. No.</th>
                                                    <th>Job Roles Name</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                <?php $i=0; ?>
                                                <?php $__currentLoopData = $job_by_roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_role => $value_role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td>
                                                            <?php $i++; echo $i; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo e($value_role['job_by_role']); ?>

                                                        </td>

                                                        <td>
                                                            <a href="<?php echo e(url('edit-job-by-role').'/'.$value_role['id']); ?>"><button type="submit" class="btn btn-primary m-t-15 waves-effect">Edit</button></a>
                                                           <a onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo e(url('delete-job-by-role').'/'.$value_role['id']); ?>"> <button type="submit" class="btn btn-info m-t-15 waves-effect">Delete</button></a>
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
                </div>
            </div>

        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>