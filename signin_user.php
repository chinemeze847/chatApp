<?php
include('include/connection.php');

    if(isset($_POST['sign_in']))
    {
    
    $pass = htmlentities(mysqli_real_escape_string($con, $_POST['user_pass']));
    $email = htmlentities(mysqli_real_escape_string($con, $_POST['user_email']));	
    

    $select_user = "select * from users where user_email='$email' AND user_pass='$pass' ";

    $query = mysqli_query($con, $select_user);

    $num_rows = mysqli_num_rows($query);

    if($num_rows == 1){
     	$_SESSION['user_email'] = $email;

     	$update_msg = mysqli_query($con, "UPDATE users SET log_in='online' WHERE user_email='$email' ");

     	$user =  $_SESSION['user_email'];
     	$get_user = "SELECT * FROM users WHERE user_email='$user' ";
     	$run_user = mysqli_query($con, $get_user);

     	$row = mysqli_fetch_array($run_user);
        
        $user_name = $row['user_name'];
        $_SESSION['user_name'] = $user_name;

        echo "<script>window.open('home.php?user_name=$user_name','_self')</script>";
     }else{

     	echo "
     	   <div class='alert alert-danger'>
     	   <strong>Check your email and password </strong>
     	   </div>
     	";
     }

 }

?>