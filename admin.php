<body class="hold-transition skin-blue fixed layout-top-nav">
	<div class="wrapper">
<?php
require_once 'config/db.php';

echo "<div class='maincontainer'>";
include 'common/header.php';

if (Input::exists()) {
  if(Token::check(Input::get('token'))) {

    $validate = new Validate();
    $validation = $validate->check($_POST, array(
      'username' => array('required' => true),
      'password' => array('required' => true)
    ));
    if($validation->passed()) {
      $user = new User();
      $remember = (Input::get('remember') === 'on') ? true : false;
      $login = $user->login(Input::get('username'), Input::get('password'), $remember);

      if ($login) {
  ;
        Redirect::to('adminHome.php');
      } else {
        echo "<p class='label label-danger'>Sorry, logging in failed.</p><br><br>";
      }

    } else {
      foreach($validation->errors() as $error) {
        echo $error, '<br>';
      }
    }

  }
}
?>
<div class="content-wrapper">
			<div class="container">
				<!-- Content Header (Page header) -->
				<br /> <br /> <br /> <br /> <br /><br /><br /><br /><br />
				<!-- Main content -->
				<section class="content">
					<div class="row">
						<div class="col-sm-4"></div>
						<div class="col-sm-4">
							<div class="login-box-body">
								<p class="login-box-msg">Sign In To Your Account</p>
								<form action="" method="post" role="login" class="login100-form validate-form">
									<div class="form-group has-feedback">
										<input type="email" name="username" class="form-control" placeholder="Email" />
										<span
											class="glyphicon glyphicon-envelope form-control-feedback"></span>
									</div>
									<div class="form-group has-feedback">
										<input type="password" class="form-control" name="password"
											placeholder="Password" /> <span
											class="glyphicon glyphicon-lock form-control-feedback"></span>
									</div>
									<div class="row">
										<!-- /.col -->
										<div class="col-xs-8"><a href="#">I forgot my password</a>
											    <label for="remember">
      <input type="checkbox" name="remember" id="remember"> Remember me
    </label>
										</div>
										<div class="col-xs-4">
											<button type="submit"
												class="btn btn-primary btn-block btn-flat">Sign In</button>
										</div>
  <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">		<!-- /.col -->
								</div>
								</form>
							</div>
						</div>
						<div class="col-sm-4"></div>
					</div>
					<!-- /.box -->
				</section>
				<!-- /.content -->
			</div>
			<!-- /.container -->
		</div>
		<!-- Main Footer -->

		<footer th:replace="common/header :: footer"></footer>
	</div>
	<div th:replace="common/header :: body-bottom-scripts"></div>
</body>
</html>
