<!doctype html>
<html lang="en">
  <head>
  	<title>ECommunity | Universiti Malaysia Pahang</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body class="img js-fullheight" style="background-image: url(images/bg.jpg);">
	<section class="ftco-section">
		<div class="container">
			<div style="justify-content: right" class="row ">
				<div class="col-md-4 text-center mb-5">
					<h2 class="heading-section">ECommunityUMP</h2>
				</div>
			</div>
			<div style="justify-content: right" class="row">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<h3 class="mb-4 text-center">Have an account?</h3>

                @include('_message')
		      	<form action="{{ url('login') }}" method="POST" class="signin-form">
                    {{ csrf_field() }}
		      		<div class="form-group">
		      			<input type="text" class="form-control" name="matrixid" placeholder="Matrix ID Or Username" required>
		      		</div>
	            <div class="form-group">
	              <input id="password-field" type="password"  name="password" class="form-control" placeholder="Password" required>
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
		            	<label class="checkbox-wrap checkbox-primary">Remember Me
									  <input type="checkbox" id="remember" name="remember">
									  <span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="{{ url('forgot-password') }}" style="color: #fff">Forgot Password</a>
								</div>
	            </div>
	          </form>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

