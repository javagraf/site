<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Api-Panel</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#accordion" ).accordion();
        } );
    </script>
</head>
<body>

<div id="accordion">
    <h3>Seeker</h3>
    <div>
        <p><a href="<?php echo e(url('/active-jobs')); ?>">Active Jobs</a></p>
        <p><a href="<?php echo e(url('/job-by-id-form')); ?>">Job-By-Id</a></p>
        <p><a href="<?php echo e(url('/seeker-register')); ?>">Register Seeker</a></p>
        <p><a href="<?php echo e(url('/seeker-login')); ?>">Login Seeker</a></p>
        <p><a href="<?php echo e(url('/seeker-profile')); ?>">Seeker Fill-Profile</a></p>
        <p><a href="<?php echo e(url('/apply-for-job')); ?>">Apply on Job</a></p>
        <p><a href="<?php echo e(url('/seeker-change-pass-form')); ?>">Change Password</a></p>
        <p><a href="<?php echo e(url('/seeker-search-job-form')); ?>">Search Jobs</a></p>


    </div>
    <h3>Recruiter</h3>
    <div>
        <p><a href="<?php echo e(url('/recruiter-register')); ?>">Register Recruiter</a></p>
        <p><a href="<?php echo e(url('/recruiter-login')); ?>">Login Recruiter</a></p>
        <p><a href="<?php echo e(url('/recruiter-profile')); ?>">Recruiter Fill-Profile</a></p>
        <p><a href="<?php echo e(url('/post-new-job')); ?>">Post New Job</a></p>
        <p><a href="<?php echo e(url('/update-job-form')); ?>">Update Job</a></p>
        <p><a href="<?php echo e(url('/delete-job-form')); ?>">Delete Job</a></p>
        <p><a href="<?php echo e(url('/job-applications-form')); ?>">Job Application Applied By</a></p>
        <p><a href="<?php echo e(url('/recruiter-change-pass-form')); ?>">Change Password</a></p>
        <p><a href="<?php echo e(url('/recruiter-posted-job-form')); ?>">Recruiter Posted jobs</a></p>
        <p><a href="<?php echo e(url('/seeker-profile-job-form')); ?>">Seeker Profile On Job</a></p>
        <p><a href="<?php echo e(url('/recruiter-job-detail-form')); ?>">Recruiter Job Detail </a></p>

        


    </div>

    <h3>Common</h3>
    <div>
        <p><a href="<?php echo e(url('/api/general')); ?>">General Information</a></p>
        <p><a href="<?php echo e(url('/forgot-password-form')); ?>">Forgot Password</a></p>
        <p><a href="<?php echo e(url('/get-notifications-form')); ?>">Get All Notifications</a></p>


    </div>

</div>



</body>
</html>