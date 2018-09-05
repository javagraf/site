<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Api-Panel</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- Jquery Core Js -->
    <script src="<?php echo e(URL::asset('public/plugins/jquery/jquery.min.js')); ?>"></script>

</head>
<body>

<h1>
    URL::   <?php echo e(url('/').'/api/fill-seeker-profile'); ?>


</h1>
<form method="POST" enctype="multipart/form-data" action="<?php echo e(url('/api/fill-seeker-profile')); ?>" >

    Seeker(seeker_id) :: <select name="seeker_id">
        <option >Please select</option>
        <?php $__currentLoopData = $seeker; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_seeker => $value_seeker): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($value_seeker['id']); ?>"><?php echo e($value_seeker['email']); ?></option>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <br />
    <br />

    Gender(gender) :: <input type="radio" value="male" name="gender">Male
    <input type="radio" value="female" name="gender">Female

    <br />
    <br />

    Profile Picture(avtar) :: <input type="file" name="avtar">
    <br>
    <br>


    Current Address(current_address) :: <textarea rows="3" cols="5" name="current_address"></textarea>

    <br />
    <br />

    Preferred Location(preferred_location) :: <select name="preferred_location">
        <option >Please select</option>
        <?php $__currentLoopData = $basicInfo['locations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_location => $value_location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($value_location['id']); ?>"><?php echo e($value_location['location_name']); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <br />
    <br />

    Job Type Looking For(job_type) :: <?php $__currentLoopData = $basicInfo['job_types']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_job_type => $value_job_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <input type="radio" value="<?php echo e($value_job_type['id']); ?>" name="job_type"><?php echo e($value_job_type['job_type']); ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <br />
    <br />

    <div class="qualification">
  Highest Qualification(seeker_qualification) :: <select name="seeker_qualification">
        <option >Please select</option>
        <?php $__currentLoopData = $basicInfo['qualifications']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_qual => $value_qual): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <option value="<?php echo e($value_qual['id']); ?>"><?php echo e($value_qual['qualification']); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    Year Of Passing(year_of_passing) ::  * <input type="text" name="year_of_passing">
    Percentage/CGPA(percentage_or_cgpa) ::  * <input type="text" name="percentage_or_cgpa">
    <br />
    <br />
    </div>

    <br>
    <br>
    Area Of Sector(area_of_sector) :: <select name="area_of_sector">
        <option >Please select</option>
        <?php $__currentLoopData = $basicInfo['area_of_sectors']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_sector => $value_sector): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($value_sector['id']); ?>"><?php echo e($value_sector['area_of_sector']); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <br />
    <br />

    Work Experience(work_experience) ::  <input type="radio" id="freasher" value="freasher" name="work_experience">Freasher
    <input type="radio" value="experience" id="experience" name="work_experience">Experienced
    <br>
    <br>

    <div class="experience_cadidate" style="display: none;">
        Total Experience :: (experience_in_year) <select name="experience_in_year">
            <option value="">Please select</option>
            <option value="1-year">1 Year </option>
            <option value="2-year">2 Year </option>
            <option value="3-year">3 Year </option>
            <option value="4-year">4 Year </option>
            <option value="5-year">5 Year </option>
            <option value="6-year">6 Year </option>
            <option value="7-year">7 Year </option>
            <option value="8-year">8 Year </option>
            <option value="9-year">9 Year </option>
            <option value="10-year">10 Year </option>
            <option value="11-year">11 Year </option>
            <option value="12-year">12 Year </option>

        </select>

        (experience_in_months) <select name="experience_in_months">
            <option value="">Please select</option>
            <option value="1-month">1 Month </option>
            <option value="2-month">2 Month </option>
            <option value="3-month">3 Month </option>
            <option value="4-month">4 Month </option>
            <option value="5-month">5 Month </option>
            <option value="6-month">6 Month </option>
            <option value="7-month">7 Month </option>
            <option value="8-month">8 Month </option>
            <option value="9-month">9 Month </option>
            <option value="10-month">10 Month </option>
            <option value="11-month">11 Month </option>
            <option value="12-month">12 Month </option>

        </select>
        <br />
        <br />
        Specialization(specialization) :: <select name="specialization">
        <option value="">Please select</option>
        <?php $__currentLoopData = $basicInfo['specialization']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_specilization => $value_specilization): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($value_specilization['id']); ?>"><?php echo e($value_specilization['specialization']); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <br />
        <br />

        Role Type(role_type) :: <select name="role_type">
            <option value="">Please select</option>
            <?php $__currentLoopData = $basicInfo['job_by_roles']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_role => $value_role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($value_role['id']); ?>"><?php echo e($value_role['job_by_role']); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <br />
        <br />
        Certification(certification) :: <input type="text" name="certification">
    </div>
    
        

    <br />
    <br />

    Upload Resume(resume) :: <input type="file" name="resume">
    <br />


    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">UPDATE</button>

</form>
<script type="text/javascript">
    $(document).ready(function () {

        $(document).on('click','#add_qulaification' ,function () {
                var counter = parseInt($(this).attr('data-counter'));
            $(this).attr('data-counter',+counter+1);
            var clone = $(this).prev().clone();
            clone.find('input[type=text]').val('');
            $(this).before(clone);

        });

        $(document).on('click','#remove_qulaification' ,function () {
            var counter_rom = parseInt($(this).prev().attr('data-counter'));
            if(counter_rom > 1){
                $(this).prev().prev().remove();
                $(this).prev().attr('data-counter',+counter_rom-1);
            }
        });

        $(document).on('click','input[name=work_experience]' ,function () {
            if ($("#freasher").is(":checked")) {
                $('.experience_cadidate').hide()
            }

            if ($("#experience").is(":checked")) {
                $('.experience_cadidate').show()
            }


        });

    });

</script>

</body>
</html>