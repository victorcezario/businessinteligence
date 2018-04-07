<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autenticacao</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/nifty.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/demo/nifty-demo-icons.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/demo/nifty-demo.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/plugins/magic-check/css/magic-check.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/plugins/pace/pace.min.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>assets/plugins/pace/pace.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/nifty.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/demo/bg-images.js"></script>
</head>
<body>
<div id="container" class="cls-container">
    <div id="bg-overlay"></div>
    <div class="cls-content">
        <div class="cls-content-sm panel">
            <div class="panel-body">
                <div class="mar-ver pad-btm">
                    <h1><?php echo lang('login_heading');?></h1>
                    <p><?php echo lang('login_subheading');?></p>
                    <div id="infoMessage"><?php echo $message;?></div>
                </div>
                <?php echo form_open("auth/login");?>
                    <div class="form-group">
                        <?php echo form_input($identity);?>
                    </div>
                    <div class="form-group">
                        <?php echo form_input($password);?>
                    </div>
                        <?php echo form_checkbox('remember', '1', FALSE, 'id="demo-form-checkbox" class="magic-checkbox"');?>
                <?php echo form_submit('submit', lang('login_submit_btn'),'class="btn btn-primary btn-lg btn-block"');?>
                <?php echo form_close();?>
            </div>

            <div class="pad-all">
                <a href="forgot_password"><?php echo lang('login_forgot_password');?>
                <div class="media pad-top bord-top">
                    <div class="pull-right">
                        <a href="#" class="pad-rgt"><i class="demo-psi-facebook icon-lg text-primary"></i></a>
                        <a href="#" class="pad-rgt"><i class="demo-psi-twitter icon-lg text-info"></i></a>
                        <a href="#" class="pad-rgt"><i class="demo-psi-google-plus icon-lg text-danger"></i></a>
                    </div>
                    <div class="media-body text-left">
                        Logar com
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
