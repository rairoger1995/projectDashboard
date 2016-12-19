<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- custom css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('/assets/css/loginstyle.css') ?>">

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    
    <!-- jquery library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.js"></script>

</head>
<body>

<div class="container">
    <div class="card card-container">
    <img class="img-responsive logo-login" src="<?= base_url('/assets/image/logo.png') ?>">
        <?= validation_errors() ?>
        <?= form_open('login', '', 'class="form-signin"', 'class="form-inline"') ?>
            <div class="form-group">
                <label><?= lang('user_name', 'user_name') ?></label>
				<?= form_input('user_name', '', 'class="form-control" placeholder="Username"') ?>
			</div>
            <div class="form-group">
                <label><?= lang('password', 'password') ?></label>
				<?= form_password('password', '', 'class="form-control" placeholder="Password"') ?>
			</div>
        
            <?= form_submit('submit', 'Login', 'class="btn btn-lg btn-primary btn-block btn-signin"') ?>
        <?= form_close() ?>
        <a href="#" class="forgot-password">
            Forgot the password?
        </a>
    </div><!-- /card-container -->
</div><!-- /container -->

</body>
</html>