<?php $__env->startSection('main-content'); ?>
    
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                
            </div>


            <!-- Horizontal Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Send notification to all Recruiter
                            </h2>

                        </div>
                        <div class="body">

                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="card">
                                        <div class="header">
                                            <h2>
                                                All Users
                                            </h2>
                                        </div>
                                        <div class="body">
                                            <div class="row clearfix">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <button type="button" class="btn bg-red waves-effect" id="send-to-selected-seeker">Send Notification</button>
                                                </div>
                                            </div>
                                            <table class="table table-bordered table-striped table-hover notify-user js-basic-example dataTable">
                                                <thead>
                                                <tr>

                                                    <th>S No.</th>
                                                    <th>Full Name</th>
                                                    <th>Email</th>
                                                    <th>Mobile</th>
                                                    <th>
                                                        <span>Select All</span>
                                                        <input type="checkbox" id="basic_checkbox_select_all_seeker" class="filled-in selected-all" />
                                                        <label for="basic_checkbox_select_all_seeker"></label>
                                                    </th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                <?php $__currentLoopData = $seeker; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_seeker => $value_seeker): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo e($key_seeker + 1); ?>

                                                        </td>
                                                        <td>
                                                            <?php echo e($value_seeker['full_name']); ?>

                                                        </td>

                                                        <td>
                                                            <?php echo e($value_seeker['email']); ?>

                                                        </td>
                                                        <td>
                                                            <?php echo e($value_seeker['mobile_no']); ?>

                                                        </td>
                                                        <td class="text-center">
                                                            <input type="checkbox" data-react-id="<?php echo e($value_seeker['id']); ?>" id="basic_checkbox_<?php echo e($key_seeker); ?>" class="filled-in select-me-seeker particular-me-seeker"  />
                                                            <label for="basic_checkbox_<?php echo e($key_seeker); ?>"></label>
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
            <!-- #END# Horizontal Layout -->



            <!-- #END# Inline Layout | With Floating Label -->

        </div>
        <div class="modal" id="notify-selected-seeker-modal" tabindex="-1" role="dialog">
            <div class="modal-dialog custom-modal-dialog" role="document">
                <div class="modal-content">
                    
                    
                    
                    <div class="row clearfix" id="orderDetails">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="card">
                                <div class="header">
                                    <div class="row clearfix">
                                        <div class="col-xs-12 col-sm-6">
                                            <h3>Send notification to seeker</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="body">
                                    <form method="POST" id="add_attribute" action="<?php echo e(url('/notify-selected-seekers')); ?>">

                                        <?php echo e(csrf_field()); ?>


                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="notification_title">Notification Title</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input  type="text" name="notification_title_seeker" id="notification_title_seeker" required class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="notification_body">Notification Body</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                <textarea  type="text" rows="3" name="notification_body_seeker" id="notification_body_seeker"  class="form-control required">
                                                </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                    <div class="row clearfix">
                                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                            <button  type="submit" id="notify-seeker" class="btn btn-primary m-t-15 waves-effect">Send</button>
                                        </div>
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