<?php 
session_start();
include ('include/connection.php');

if(!isset($_SESSION['user_email'])){
	header("Location:signin.php");
}
?>

<!DOCTYPE html>

<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/home.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script  src="js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
	<div class= "main-section">
		<div class="row">
			<div class="col-md-3 col-sm-3 col-xs-12 left-sidebar">
				<div class="input-group searchbox">
					<div class="input-group-btn">
						<center><a href="include/find-friends.php"><button type="submit" class="btn btn-default search-icon" name="search-user"></button></a></center>
					</div>
				</div>
				<div class="left-chat">
					<ul>
						<?php include('get_users_data.php'); ?>	
					</ul>					
				</div>
				
			</div>
			<div class="col-md-9 col-sm-9 col-xs-12 right-sidebar">
				<div class="row">
					<!--Getting user information who is logged in -->
					<?php 
					  $user = $_SESSION['user_email'];
					  $ger_user = "SELECT * FROM users WHERE user_email=$user";
					  $run_user = mysqli_query($con, $get_user);
					  $row = mysqli_fetch_array($run_user);

					  $user_id = $row['user_id'];
					  $user_name = $row['user_name'];
					?>

					<!-- Getting user data on which user clicked -->
					<?php
					    if(isset($_GET['user_name'])){
					        global $con;

					        $get_username = $_GET['user_name'];
							$ger_user = "SELECT * FROM users WHERE user_name=$get_username' ";
							$run_user = mysqli_query($con, $get_user);
							$row_user = mysqli_fetch_array($run_user);

							$username = $row_user['user_name'];
							$user_profile_pic = $row['user_profile'];

				        }
				        $total_messages = "SELECT * FROM users_chat where (sender_username='$user_name' AND receiver_username='$username') OR (receiver_username='$user_name' AND sender_username='$username')";
				        $run_messages = mysqli_query($con, $total_messages);
				        $num_rows = mysqli_num_rows($run_messages);
					?> 

					<div class="col-md-12 right-header">
						<div class="rigt-header-img">
							<img src="<?php echo'$user_profile_pic'; ?> ">
						</div>
						<div class="right-header-detail">
							<form method="post">
								<p><?php echo"$username" ?></p>
								<span><?echo $total; ?> messages</span>&nbsp &nbsp
								<button class="btn btn-danger" name="logout">Logout</button>
							</form>

							<?php 
							   if(isset($_POST['logout'])){
							   	  $update_msg = mysqli_query($con,"UPDATE users SET log_in='offline' WHERE user_name='$user_name'");
							   	  header("Location:logout.php");
							   	  exit();
							   }

							?>
						</div>	
					</div>
				</div>
                <div class="row">
                	<div id="scrolling-to-bottom" class="col-md-12 right-header-contentChat">
                		<?php
                		    $update_msg=mysqli_query($con , "UPDATE users_chat SET msg_status='read' 
                		    	WHERE sender_username='$username' AND receiver_username='$user_name' ");

                		    $sel_msg = "SELECT * FROM users_chat WHERE (sender_username='$username'
                		    	AND receiver_username='$user_name') OR (sender_username='$user_name'
                		    	AND receiver_username='$username') ORDER by 1 ASC";

                		    $run_msg = mysqli_query($con, $sel_msg);

                		    while($run=mysqli_fetch_array($run_msg))
                		    { 
                                $sender_username = $row['sender_username'];
                                $receiver_username = $row['receiver_username'];
                                $msg_content = $row['msg_content'];
                                $msg_date = $row['msg_date'];
  	
                		 ?>

                		 <ul>
                		 	<?php 
                		 	   if($user_name == $sender_username AND $username == $receiver_username )
                		 	   {
                                    echo" 
                                    <li>
                                      <div class='rightside-right-chat'>
                                            <span>$username<small>$msg_date</small></span>
                                            <p>$msg_content</p>
                                      </div>
                                    </li";
                		 	   }

                		 	   else if($user_name == $receiver_username AND $username == $sender_username )
                		 	   {
                                    echo" 
                                    <li>
                                      <div class='rightside-left-chat'>
                                            <span>$username<small>$msg_date</small></span>
                                            <p>$msg_content</p>
                                      </div>
                                    </li";
                		 	   }
                		 	?>
                		 </ul>
                		 <?php 

                		    }

                		?>
                		    
                	</div>
                </div>

                <div class="row">
                	<div class="col-md-12 right-chat-textbox">
                		<form method="post">
                		    <input type="text" autocomplete="off" name="msg_content" placeholder="write something...">
                		    <button name="submit" class="btn"><i class="fas fa-telegram" aria-hidden="true"></i></button>
                		</form>
                	</div>
                </div>
			</div>
		</div>	
	</div>

	<?php
      if(isset($_POST['submit']))
      {

        $msg = htmlentities($_POST['msg_content']);

        if($msg == '')
        {
            echo 
            "
              <div class='alert alert-danger'>
                  <strong>Message was unable to send</strong>
              </div>
            ";
        }else if(strlen($msg>100))
        {
            echo 
            "
              <div class='alert alert-danger'>
                  <strong><center>Message is too long</center></strong>
              </div>
            ";
        }else{
        	$insert = "INSSERT into users_chat($sender_username,$receiver_username,$msg_content,$msg_status,$msg_date)VALUES('$user_name','$username','$msg','unread','NOW()')";
        	$run_insert = mysqli_query($con,$insert);
        }

      }
	?>
	
</body>
</html>