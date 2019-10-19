<body class="hold-transition skin-blue fixed layout-top-nav">
	<div class="wrapper">

<?php
require_once 'config/db.php';
// Header
include 'common/header.php';

  if (Input::exists()) {
    if (Token::check(Input::get('token'))) {
      $validate = new Validate();
      $validation = $validate->check($_POST, array(
        'username' => array(
          'required' => true,
          'min' => 2,
          'max' => 50,
          'unique' => 'users'
        ),
        'password' => array(
          'required' => true,
          'min' => 6
        ),
        'password_again' => array(
          'required' => true,
          'matches' => 'password'
        ),
        'name' => array(
          'required' => true,
          'min' => 2,
          'max' => 50
        )
      ));

      if ($validation->passed()) {
          $user = new User();
          try {

            $salt = Hash::salt(32);

            $user->create(array(
              'username' => Input::get('username'),
              'password' => Hash::make(Input::get('password'), $salt),
              'salt' => $salt,
              'name' => Input::get('name'),
              'enabled' => 1
            ));

            Session::flash('home', 'You have been registered and can now log in!');
        
            Redirect::to('registersuccess.php');

          } catch (Exception $e) {
            die($e->getMessage());
          }

      } else {
       //diplay validation errors
        foreach ($validation->errors() as $error) {
          echo '<div style="background: white; padding-left:500px; color:red;font-size:20px">',$error,'</div>';
        }
      }

    } 
  } 
?>
		<div class="content-wrapper">
			<div style="margin-left: 500px">
			<!-- Content Header (Page header) -->
				<section class="content-header">
					<h1>
						User<small>Registration</small>
					</h1>
				</section>
				
				<div class="col-md-6" th:if="${user}">
					<div class="box box-primary">
						<div class="box-header with-border">
							<h3 class="box-title">User's Information</h3>
						</div>
						<!-- /.box-header -->
						<!-- form start -->
						<form role="form"  action=""
							
							method="post">
							<div class="box-body">
								<div class="form-group">
									<label for="exampleInputPassword1">Full Name</label> <input
										type="text" class="form-control" id="exampleInputPassword1" autocomplete="off"
										placeholder="enter your full name" name="name" value="<?php echo escape(Input::get('name')); ?>" />
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Email address</label> <input
										type="email" class="form-control" id="exampleInputEmail1"
										placeholder="Enter email" name="username" autocomplete="off" value="<?php echo escape(Input::get('username')); ?>" />
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Password</label> <input
										type="password" class="form-control" id="exampleInputEmail1"
										placeholder="....." autocomplete="off" name="password" />
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Confirm Password</label> <input
										type="password" class="form-control" id="exampleInputEmail1"
										placeholder="....." autocomplete="off" name="password_again" />
								</div>
							</div>
							<!-- /.box-body -->
<div class="box-footer">
								<button type="submit" class="btn btn-primary">Submit</button>
								<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
							</div>
		</form>
	</div>
</div>
</div>
</div>
</div>
</body>
</html>
