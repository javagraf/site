<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Api-Panel</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

</head>
<body>
<h1>
    URL::   <?php echo e(url('/').'/api/search-job'); ?>


</h1>
<form method="POST" action="<?php echo e(url('/api/search-job')); ?>" >



    Value(value) ::*<input type="text" name="value" >
    <br />
    <br />



    Seeker(seeker_id) ::*<input type="text" name="seeker_id" >
    <br />
    <br />

    Job Type(job_type) ::
    <?php $__currentLoopData = $basicInfo['job_types']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_jobtype => $value_jobtype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <input type="checkbox" value="<?php echo e($value_jobtype['id']); ?>" name="job_type[]"> <?php echo e($value_jobtype['job_type']); ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <br />
    <br />
    Location(job_location) ::
    <?php $__currentLoopData = $basicInfo['locations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_loca => $value_loca): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <input type="checkbox" value="<?php echo e($value_loca['id']); ?>" name="job_location[]"> <?php echo e($value_loca['location_name']); ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <br />
    <br />
    Specialization(specialization) ::
    <?php $__currentLoopData = $basicInfo['specialization']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_spec => $value_spec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <input type="checkbox" value="<?php echo e($value_spec['id']); ?>" name="specialization[]"> <?php echo e($value_spec['specialization']); ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <br />
    <br />
    Qualification(qualification) ::
    <?php $__currentLoopData = $basicInfo['qualifications']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_qua => $value_qua): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <input type="checkbox" value="<?php echo e($value_qua['id']); ?>" name="qualification[]"> <?php echo e($value_qua['qualification']); ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <br />
    <br />

    Designation(job_by_roles) ::
    <?php $__currentLoopData = $basicInfo['job_by_roles']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_role => $value_role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <input type="checkbox" value="<?php echo e($value_role['id']); ?>" name="job_by_roles[]"> <?php echo e($value_role['job_by_role']); ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <br />
    <br />

    Area of Sector(area_of_sector) ::
    <?php $__currentLoopData = $basicInfo['area_of_sectors']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_sec => $value_sec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <input type="checkbox" value="<?php echo e($value_sec['id']); ?>" name="area_of_sector[]"> <?php echo e($value_sec['area_of_sector']); ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <br />
    <br />
    Experience(experience) ::  <input type="checkbox" value="Fresher" name="experience[]"> Fresher
                                <input type="checkbox" value="06 Months" name="experience[]"> 06 Months
                                <input type="checkbox" value="1 Year" name="experience[]"> 1 Year
                                <input type="checkbox" value="1.5 Year" name="experience[]"> 1.5 Year
                                <input type="checkbox" value="2 Year" name="experience[]"> 2 Year
                                <input type="checkbox" value="2.5 Year" name="experience[]"> 2.5 Year
                                <input type="checkbox" value="3 Year" name="experience[]"> 3 Year
                                <input type="checkbox" value="3+ Year" name="experience[]"> 3+ Year



    <br />
    <br />

    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">Search</button>

</form>


</body>
</html>