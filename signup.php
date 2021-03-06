<!DOCTYPE html>
<html>
<head>
	<title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale = 1">

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Courgette|Pacifico:400,700;">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

	<link rel="stylesheet" href="css/signup.css">

	<script  src="js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

	
</head>
<body>
       <div class="signup-form">
	       	<form action="" method="POST">
	       		<div class="form-header">
	       			<h2>Sign Up</h2>
	       			<p>SignUp to MyChat</p>
	       		</div>

	       		<div class="form-group">
	       			<label>Username</label>
	       			<input type="text" name="user_name" class="form-control" placeholder="Example:John" autocomplete="off" required="true">
	       		</div>

                <div class="form-group">
	       			<label>Password</label>
	       			<input type="password" name="user_pass" class="form-control" placeholder="Password">
	       		</div>

	       		<div class="form-group">
	       			<label>Email Address</label>
	       			<input type="email" name="user_email" class="form-control" placeholder="example@gmail.com" autocomplete="off" required="true">
	       		</div>

                <div class="form-group">
	       			<label >Country</label>
	       			<select class="form-control" name="user_country" required="true">
	       				<option disabled>Select a Country</option>
	       				<option>Nigeria</option>
	       				<option>Israel</option>
	       				<option>USA</option>
	       				<option>India</option>
	       				<option>Cameroon</option>
	       			</select>
	       		</div>

	       		 <div class="form-group">
	       			<label >Gender</label>
	       			<select class="form-control" name="user_gender" required="true">
	       				<option disabled>Select</option>
	       				<option>Male</option>
	       				<option>Female</option>
	       				<option>Others</option>
	       			</select>
	       		</div>

	       		<div class="form-group">
	       			<label class="checkbox-inline"><input type="checkbox" required="">I accept the <a href="#">Terms of Use
	       			</a> &amp <a href="#">Privacy Policy</a></label>
	       		</div>

	       		<div class="form-group">
	       			<button type="submit" name="sign_up" class="btn btn-primary btn-block btn-lg">Sign Up</button>
	       		</div>
	       	    <?php include('signup_user.php') ;?>
	       	</form>	

	       	<div class="text-center small" style="color:#67428B">Already have an account?<a href="signin.php">signin here!</a></div>
       </div>

</body>
</html>