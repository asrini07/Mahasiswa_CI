<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>SIMAK UMC | Log in</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?php echo base_url();?>css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url();?>css/adminlte.css" rel="stylesheet" type="text/css" />

        <!--assets/dist/css HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <style type="text/css">
        .control-label, h3{
            color: #ffffff;
        }
    </style>
    <body class="login-page">
        <div class="login-box pull-left">
            <div class="login-box-body box box-solid">
                <div class="box-header"><h3 class="text-center" style="letter-spacing: 0.8px;"><b>LOGIN</b></h3></div>
                <?php echo form_open('login/login_process');?>
                <div class="form-group has-feedback">
                    <input type="text" name="username" class="form-control" placeholder="Username">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <?php
                        if ($this->session->flashdata('message')){
                            $pesan = explode('-',$this->session->flashdata('message'));
                            echo "<div class='label label-".$pesan[0]." text-center'>
                                      <b>".$pesan[1]."</b>
                                  </div>";
                        }
                        ?>
                    </div>
                    <div class="col-xs-4 pull-right">
                        <button type="submit" class="btn btn-info btn-block btn-flat">Sign In</button>
                    </div>
                </div>
                <?php echo form_close();?>
            </div>
        </div>      
    </body>
</html>