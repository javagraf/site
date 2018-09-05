<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Api-Panel</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- Jquery Core Js -->
    <script src="<?php echo e(URL::asset('plugins/jquery/jquery.min.js')); ?>"></script>

</head>
<body>
<script type="text/javascript">
    var APP_URL = <?php echo json_encode(url('/')); ?>

    var token = '<?php echo csrf_token(); ?>'

</script>

<h1>
    URL::   <?php echo e(url('/').'/api/job-application'); ?>


</h1>
<form method="POST" enctype="multipart/form-data" action="<?php echo e(url('/api/job-application')); ?>" >

    Recruiter(recruiter_id) ::<span style="color: red">*</span>  <select name="recruiter_id" id="recruiterID">
        <option value="">Please select</option>
        <?php $__currentLoopData = $recruiter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_recruiter => $value_recruiter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($value_recruiter['id']); ?>"><?php echo e($value_recruiter['organisation_name']); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <br />
    <br />
    Job(job_id) ::<span style="color: red">*</span>  <select name="job_id" id="jobID">
        <option value="">Please select</option>
        
            
        
    </select>
    <br />
    <br />




    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">Submit</button>

</form>
<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('change','#recruiterID' ,function () {
            var x = $(this).val();
            $('#jobID').not(':first-child').empty();
            if(x == ''){
                var option1 = "<option value=''>Please select</option>"
                var selector = $('#jobID');
                selector.append(option1);
             return false;
            }
            else{
                $.ajax({
                    type:'POST',
                    url: APP_URL +'/api/get-recruiter-jobs',
                    data:{recruiter_id:x},
                    success:function(data){

                        $.each(data.data, function(index, valueOption) {
                          console.log(valueOption);
                          var option = "<option value="+valueOption.id + ">"+valueOption.specialization+"</option>"
                            //var option = "<option  value=" + valueOption.id + "> + valueOption.specialization + '</option>";
                            var selector = $('#jobID');
                            selector.append(option);
                        });
                    }
                });
            }


        });


    });

</script>

</body>
</html>