<?php

$con = mysqli_connect('localhost','root','','mychats');

    $users = "select * from users";

    $run_users = mysqli_query($con,$users);

    while($row = mysqli_fetch_array($run_users))
    {
           $user_id = $row['user_id'];
           $user_name = $row['user_name'];
           $user_profile = $row['user_profile'];
           $login = $row['log_in'];

           echo "
             <li>
                 <div class='chat-left-img'>
                   <img src='$user_profile'>
                 </div>
                 <div class='chat-left-detail'>
                    <p><a href='home.php?user_name=$user_name'>$user_name</a></p>";

           if($login =='Online')
           {
                echo "<span><i class='fa fa-circle' aria-hidden='true'>Online<i></span>";
           }else{
                echo "<span><i class='fa fa-circle-o' aria-hidden='true'>Offline<i></span>";
           } 
           "
           </div>
           </li>
           ";
    }
    
?>