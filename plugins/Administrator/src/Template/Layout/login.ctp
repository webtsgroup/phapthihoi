<?= $this->element('load') ?>
<!DOCTYPE html>
<html>
<?= $this->element('head') ?>
<body class="gray-bg">
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
              <h1 class="logo-name">CMS</h1>
            </div>
            <h3>Welcome to Administrator</h3>
            <form class="form-login" id="loginForm" >
  		        <div class="login-wrap">
                <div class="form-group input-group">
                  <div id="js-show-result"></div>
                </div>
                <div class="form-group input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input type="text" required="required" name="username" id="username" class="form-control" placeholder="<?php echo __('Username',true);?>" autofocus>
                </div>
                <div class="form-group input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                  <input type="password" required="required" name="pass" id="pass" class="form-control" placeholder="<?php echo __('Password',true);?>">
                </div>
                <div class="form-group">
                  <button class="btn btn-primary btn-block" onclick="login('loginForm', '/administrator/users/login');" type="button">
                    <i class="fa fa-lock"></i> <?php echo __('Sign in',true);?>
                  </button>
                </div>
  		        </div>
  		      </form>
            <p class="m-t"> <small>CMS we app framework base on CakePHP 3.x &copy; 2016</small> </p>
        </div>
    </div>
    <!-- Mainly scripts -->
    <?= $this->Html->script([
      'Administrator.jquery-2.1.1.js',
      'Administrator.bootstrap.min.js',
      'Administrator.basic.js'
    ]) ?>
</body>
</html>
