<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        
        <title>WAH Dashboard</title>
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo asset('public_html/wahlogoo.ico'); ?>" />
        <link rel="stylesheet" href="<?php echo asset('public_html/css/bootstrap.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo asset('public_html/css/metisMenu.min.css') ?>">
        <link rel="stylesheet" href="<?php echo asset('public_html/css/startmin.css'); ?>">
        <link rel="stylesheet" href="<?php echo asset('public_html/css/font-awesome.min.css'); ?>"  type="text/css">
        <link rel="stylesheet" href="<?php echo asset('public_html/css/custom.css'); ?>"  type="text/css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>
            .error{
                color:red;
                text-align:center;
            }

            .custom-login-panel{
                background: rgba(0,0,0,0.3);

            }

            body{
              background: url('<?php echo asset("public_html/imgs/light3.png"); ?>') no-repeat center center fixed; 
              -webkit-background-size: cover;
              -moz-background-size: cover;
              -o-background-size: cover;
              background-size: cover;
            }
        </style>
    </head>
    <body>
        <div class="container">

            <div class="row">
                <center>
                <div class="loginpanel">
                    <div class="login-panel custom-login-panel panel panel-default">
                        <div class="panel-heading" style="background:#29e5b7;">

                        </div>
                        <div class="panel-body text-left" style="background-color:white;">
                            <img src="<?php echo asset('public_html/imgs/wahlogodark.png'); ?>" style="height:110px;">
                            <hr/>
                            <h4 class="signin">Sign in to your Account:<h4>
                            <form role="form" method="POST" action="<?php echo url('login'); ?>">
                                <fieldset>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon addon1"><i class="glyphicon glyphicon-user"></i></span>
                                            <input class="form-control" placeholder="Username" name="admins[username]" id="username" type="text" autofocus required/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon addon2"><i class="glyphicon glyphicon-lock"></i></span>
                                            <input class="form-control" placeholder="Password" name="admins[password]" id="password" type="password" required/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <p class="error"><?php echo isset($error) ? $error : null; ?></p>
                                        </div>
                                    </div>
                                    <input type="hidden" name="_method" value="POST" />
                                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
                                    <button type="submit" class="btn btnlogin">Login <i class="glyphicon glyphicon-menu-right"></i></button>
                                    
                                </fieldset>
                            </form>
                        </div>
                        <div class="panel-footer">
                            <center>&copy;  2016 Wah Dashboard | This system was designed and developed by Tarlac State University - College of Computer Studies. All Rights Reserved.</center>
                        </div>
                    </div> 
                </div>
                </center>
            </div>
        </div>
        <script type="text/javascript" src="<?php echo asset('public_html/js/jquery.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo asset('public_html/js/bootstrap.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo asset('public_html/js/metisMenu.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo asset('public_html/js/startmin.js'); ?>"></script>
    </body>
</html>
