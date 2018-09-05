<?php $__env->startSection('main-content'); ?>

    <section class="content">
        <div class="container-fluid">

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">

                            <div class="body">
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="card">
                                            <div class="header">
                                                <h2>
                                                        <?php echo e($recruiter->organisation_name); ?> posted jobs

                                                </h2>
                                                
                                                    
                                                        
                                                            
                                                        
                                                        
                                                            
                                                            
                                                            
                                                        
                                                    
                                                
                                            </div>
                                            <div class="body">
                                                <ul class="list-group">
                                                    <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_jobs => $value_jobs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li class="list-group-item"><?php echo e($value_jobs['specialization']); ?> <span class="badge bg-pink custom-badge getdetails" data-recruiter="<?php echo e($recruiter->id); ?>" data-react="<?php echo e($value_jobs['id']); ?>">View Detail</span></li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- #END# Badges -->
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="job-detail" tabindex="-1" role="dialog">
            <div class="modal-dialog custom-modal-dialog" role="document">
                <div class="modal-content">
                    
                    
                    
                    <div class="row clearfix" id="orderDetails">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="card">
                                <div class="header">
                                    <div class="row clearfix">
                                        <div class="col-xs-12 col-sm-12">
                                            <h3>Recruiter details with posted job</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="body">
                                    <div class="row clearfix">
                                        <div class="col-md-12 clearfix">
                                            <h4>Job Details</h4>
                                            <li class="list-group-item">
                                                <span >Job Role : </span>
                                                <input type="hidden" value="" id="orderId">
                                                <span id="job_by_roles" style="margin-left: 15px"></span>
                                            </li>
                                            <li class="list-group-item">
                                                <span >Job Location : </span>
                                                <span id="job_location" style="margin-left: 15px"></span>
                                            </li>
                                            <li class="list-group-item">
                                                <span>Specialization : </span>
                                                <span id="specialization" style="margin-left: 15px"></span>
                                            </li>
                                            <li class="list-group-item">
                                                <span >Qualification :</span>
                                                <span id="qualification" style="margin-left: 15px"></span>
                                            </li>
                                            <li class="list-group-item">
                                                <span >Year of Passing :</span>
                                                <span id="year_of_passing" style="margin-left: 15px"></span>
                                            </li>
                                            <li class="list-group-item">
                                                <span >Percentage :</span>
                                                <span id="percentage_or_cgpa" style="margin-left: 15px"></span>
                                            </li>
                                            <li class="list-group-item">
                                                <span >Skills Required :</span>
                                                <span id="skills_required" style="margin-left: 15px"></span>
                                            </li>
                                            <li class="list-group-item">
                                                <span >Minimum Salary :</span>
                                                <span id="min_sal" style="margin-left: 15px"></span>
                                            </li>
                                            <li class="list-group-item">
                                                <span >Maximum Salary :</span>
                                                <span id="max_sal" style="margin-left: 15px"></span>
                                            </li>
                                            <li class="list-group-item">
                                                <span >Job Type :</span>
                                                <span id="job_type" style="margin-left: 15px"></span>
                                            </li>
                                            <li class="list-group-item">
                                                <span >Process :</span>
                                                <span id="process" style="margin-left: 15px"></span>
                                            </li>
                                            <li class="list-group-item">
                                                <span >Job Description :</span>
                                                <span id="job_discription" style="margin-left: 15px;word-wrap:break-word;"></span>
                                            </li>
                                            </ul>
                                        </div>

                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-md-12 clearfix">
                                            <h4>Recruiter Details</h4>
                                            <li class="list-group-item">
                                                <span >Organisation Name : </span>
                                                <input type="hidden" value="" id="orderId">
                                                <span id="organisation_name" style="margin-left: 15px"></span>
                                            </li>
                                            <li class="list-group-item">
                                                <span >Recruiter Contact No. : </span>
                                                <span id="recruiter_mobile_no" style="margin-left: 15px"></span>
                                            </li>
                                            <li class="list-group-item">
                                                <span>Recruiter Email : </span>
                                                <span id="recruiter_email" style="margin-left: 15px"></span>
                                            </li>
                                            <li class="list-group-item">
                                                <span >Recruiter Identity :</span>
                                                <span id="i_am" style="margin-left: 15px"></span>
                                            </li>
                                            <li class="list-group-item">
                                                <span >Recruiter Address :</span>
                                                <span id="org_address" style="margin-left: 15px"></span>
                                            </li>
                                            <li class="list-group-item">
                                                <span >Recruiter Location :</span>
                                                <span id="org_location" style="margin-left: 15px"></span>
                                            </li>
                                            <li class="list-group-item">
                                                <span >Recruiter Website :</span>
                                                <span id="org_website" style="margin-left: 15px"></span>
                                            </li>

                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    


                    
                    <div class="modal-footer">
                        <div class="confirm-loading">
                            <div class="preloader pl-size-xs" >
                                <div class="spinner-layer pl-red-grey">
                                    <div class="circle-clipper left">
                                        <div class="circle"></div>
                                    </div>
                                    <div class="circle-clipper right">
                                        <div class="circle"></div>
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