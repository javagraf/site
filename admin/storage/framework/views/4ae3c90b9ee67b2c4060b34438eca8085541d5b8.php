<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Api-Panel</title>
    <script
            src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css">

    <!-- Jquery Core Js -->
    <script src="<?php echo e(URL::asset('plugins/momentjs/moment.js')); ?>"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js" type="text/javascript"></script>

</head>
<body>

<h1>
    URL::   <?php echo e(url('/').'/api/post-job'); ?>


</h1>
<form method="POST" enctype="multipart/form-data" action="<?php echo e(url('/api/post-job')); ?>" >

    Recruiter(recruiter_id)<span style="color: red">*</span> :: <select name="recruiter_id">
        <option >Please select</option>
        <?php $__currentLoopData = $recruiter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_recruiter => $value_recruiter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($value_recruiter['id']); ?>"><?php echo e($value_recruiter['recruiter_email']); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <br />
    <br />
   Job(job_id) ::   <input type="text" name="job_id">
    <br />
    <br />

    Job Type (job_type)<span style="color: red">*</span> :: <?php $__currentLoopData = $basicInfo['job_types']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_job_type => $value_job_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <input type="radio" value="<?php echo e($value_job_type['id']); ?>" name="job_type"><?php echo e($value_job_type['job_type']); ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <br />
    <br />
    Area Of Sector(area_of_sector) :: <select name="area_of_sector">
        <option >Please select</option>
        <?php $__currentLoopData = $basicInfo['area_of_sectors']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_sector => $value_sector): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($value_sector['id']); ?>"><?php echo e($value_sector['area_of_sector']); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <br />
    <br />


    Designation(job_by_roles)<span style="color: red">*</span> :: <select name="job_by_roles">
        <option value="">Please select</option>
        <?php $__currentLoopData = $basicInfo['job_by_roles']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_role => $value_role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($value_role['id']); ?>"><?php echo e($value_role['job_by_role']); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <br />
    <br />
    Qualification/ Eligibility(qualification)<span style="color: red">*</span> ::<select name="qualification">
        <option value="">Please select</option>
        <?php $__currentLoopData = $basicInfo['qualifications']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_qual => $value_qual): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($value_qual['id']); ?>"><?php echo e($value_qual['qualification']); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <br />
    <br />
    Job Location(job_location)<span style="color: red">*</span>  :: <select name="job_location">
        <option value="">Please select</option>
        <?php $__currentLoopData = $basicInfo['locations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_location => $value_location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($value_location['id']); ?>"><?php echo e($value_location['location_name']); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <br />
    <br />
    Year Of Passing(year_of_passing) ::   <input type="text" name="year_of_passing">
    Highest Qualification Marks Above(percentage_or_cgpa) ::  <input type="text" name="percentage_or_cgpa">
    <br />
    <br />

    Specialization (specialization)<span style="color: red">*</span>  :: <select name="specialization">
        <option value="">Please select</option>
        <?php $__currentLoopData = $basicInfo['specialization']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_specilization => $value_specilization): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($value_specilization['id']); ?>"><?php echo e($value_specilization['specialization']); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <br />
    <br />

    Skills(skills_required)<span style="color: red">*</span>  :: <input type="text" name="skills_required">
    <br />
    <br />
    Minimum Experience Required (experience)<span style="color: red">*</span> :: <select name="experience">
        <option value="">Please select</option>
      <option value="0(Freasher)">0(Freasher)</option>
      <option value="06 Months">06 Months</option>
      <option value="1 Year">1 Year</option>
      <option value="1.5 Year">1.5 Year</option>
      <option value="2 Year">2 Year</option>
      <option value="2.5 Year">2.5 Year</option>
      <option value="3 Year">3 Year</option>
      <option value="3+ Year">3+ Year</option>

    </select>
    <br />
    <br />

    Job Discription(job_discription)<span style="color: red">*</span> :: <textarea rows="3" cols="5" name="job_discription"></textarea>

    <br />
    <br />

    Salary Range<span style="color: red">*</span> :: Min(min_sal) :: <input type="text" name="min_sal"> Max(max_sal) :: <input type="text" name="max_sal">
        per(per) :: <select name="per">
        <option value="">Please select</option>
        <option value="Per Year">Per Year</option>
        <option value="Per Month">Per Month</option>
        <option value="Per Day">Per Day</option>
        <option value="Per Hour">Per Hour</option>
    </select>
    <br />
    <br />

    Number of Vacancies(vacancies)<span style="color: red">*</span> ::<input type="text" name="vacancies">
    <br />
    <br />
    Last Date of Application(last_date)<span style="color: red">*</span> ::<input id="datetimepicker1" type="text" name="last_date">
    <br />
    <br />

    Hiring Process(process)<span style="color: red">*</span>::  <input type="checkbox" value="Face to Face" name="process[]"> Face to Face
                                                        <input type="checkbox" value="Written-test" name="process[]"> Written-test
                                                        <input type="checkbox" value="Telephonic" name="process[]"> Telephonic
                                                        <input type="checkbox" value="Group Discussion" name="process[]"> Group Discussion
                                                        <input type="checkbox" value="Walk In" name="process[]"> Walk In

    <br>
    <br>
    <button type="submit">UPDATE</button>

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


    $(function () {
        var date = new Date();
        date.setDate(date.getDate());
        $('#datetimepicker1').datepicker({
            format: 'dd-mm-yyyy',
            startDate: date,
            autoclose: true
        });
    });
</script>

</body>
</html>