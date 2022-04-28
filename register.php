
<?php
require_once './components/header.php';

?>

<div class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<img src="./assets/img/logo.png" alt="img">
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Register</h4>
							<form method="POST" class="my-login-validation" novalidate="" action='./php/registerhandler.php'>
								<div class="form-group">
									<label for="name">Choose a Username</label>
									<input id="name" type="text" class="form-control" name="username" required autofocus>
									<div class="invalid-feedback">
										Username is required?
									</div>
								</div>
								<div class="form-group">
									<label for="password">Password</label>
									<input id="password" type="password" class="form-control" name="password" required data-eye>
									<div class="invalid-feedback">
										Password is required
									</div>
								</div>

								<div class="form-group">
									<div class="custom-checkbox custom-control">
										<input type="checkbox" name="agree" id="agree" class="custom-control-input" required="">
										<label for="agree" class="custom-control-label">I agree to the <a href="#">Terms and Conditions</a></label>
										<div class="invalid-feedback">
											You must agree with our Terms and Conditions
										</div>
									</div>
								</div>

								<div class="form-group m-0">
									<button type="submit" name='registerbtn' class="btn btn-primary btn-block">
										REGISTER
									</button>
								</div>
								<div class="mt-4 text-center">
									Already have an account? <a href="login.php">Login</a>
								</div>
							</form>
						</div>
					</div>
				
				</div>
			</div>
		</div>
	</section>
</div>

<?php

require_once './components/footer.php';

?>