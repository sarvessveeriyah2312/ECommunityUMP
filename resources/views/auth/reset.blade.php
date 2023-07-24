<!doctype html>
<html lang="en">
  <head>
  	<title>ECommunity | Universiti Malaysia Pahang</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{ url('css/style.css') }}">

	</head>
	<body class="img js-fullheight" style="background-image: url({{ url('images/bg.jpg') }});">
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
		      	<h3 class="mb-4 text-center">Reset Your Password</h3>

                @include('_message')
		      	<form action="" method="POST" class="signin-form">
                    {{ csrf_field() }}
		      		<div class="form-group">
		      			<input type="password" class="form-control" name="password" placeholder="New Password" required>
		      		</div>
                      <div class="form-group">
                        <input type="password" class="form-control" name="cpassword" placeholder="Confirm Password" required>
                    </div>
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary submit px-3">Reset</button>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
								</div>
								<div class="w-50 text-md-right">
									<a href="{{ url('/') }}" style="color: #fff">Login</a>
								</div>
	            </div>
	          </form>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{ url('js/jquery.min.js') }}"></script>
  <script src="{{ url('js/popper.js') }}"></script>
  <script src="{{ url('js/bootstrap.min.js') }}"></script>
  <script src="{{ url('js/main.js') }}"></script>

	</body>
</html>

