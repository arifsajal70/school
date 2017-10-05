<?php defined('BASEPATH') or exit('No deirect script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Title -->
    <title><?php echo $this->lang->line('page_title');?></title>
    <!-- Icon -->
    <link rel="icon" type="img/icon" href="./assets/img/icon.png">
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="./assets/plugins/bootstrap4/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/plugins/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="./assets/plugins/font-awesome/css/font-awesome.min.css">
    <!-- Neptune CSS -->
    <link rel="stylesheet" href="./assets/css/core.css">

  </head>
  <body class="auth-bg">
    
    <div class="auth">
      <div class="auth-header">
        <div class="mb-2"><img src="./assets/img/logo.png" title="" width="250"></div>
        <p><?php echo $this->lang->line('welcome');?></p>
      </div>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4 offset-md-4">
            <form id="signin_form">
            <div id="error_box"></div>
              <div class="form-group">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('username');?>" name="username">
                  <div class="input-group-addon"><i class="fa fa-user"></i></div>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                <input type="password" class="form-control" placeholder="<?php echo $this->lang->line('password');?>" name="password">
                  <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                </div>
              </div>
              <div class="form-group clearfix">
                <div class="float-xs-left">
                  <label class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description font-90"><?php echo $this->lang->line('remember_me');?></span>
                  </label>
                </div>
                <div class="float-xs-right">
                  <a class="text-white font-90" href="#"><?php echo $this->lang->line('forget_password');?></a>
                </div>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block"><?php echo $this->lang->line('page_title');?></button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Vendor JS -->
    <script type="text/javascript" src="./assets/plugins/jquery/jquery-1.12.3.min.js"></script>
    <script type="text/javascript" src="./assets/plugins/js/tether.min.js"></script>
    <script type="text/javascript" src="./assets/plugins/bootstrap4/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="./assets/ajax/login_ajax.js"></script>
  </body>
</html>