<?php
   require 'config.php';
?>
<?php

if(isset($_POST["home"])){
    echo "<script type='text/javascript'>alert('You are logged out!')</script>";
    echo "<script>window.location = 'https://road-freight-transport.000webhostapp.com/'</script>";
}

if(isset($_POST["login_btn_truck"])){  
  
if(!empty($_POST['username']) && !empty($_POST['password'])) {  
    $user=$_POST['username'];  
    $pass=$_POST['password'];  
  
    //$con=mysql_connect('localhost','root','') or die(mysql_error());  
    //mysql_select_db('user_registration') or die("cannot select DB");  
  
    $query=mysqli_query($con,"SELECT * FROM Login WHERE Username='".$user."' AND Password='".$pass."'");  
    $numrows=mysqli_num_rows($query);  
    if($numrows!=0)  
    {  
    while($row=mysqli_fetch_assoc($query))  
    {  
    $dbusername=$row['Username'];  
    $dbpassword=$row['Password'];
    $dbgroups=$row['Groups'];
    $dbid=$row['ID'];
    }  
  
    if($user == $dbusername && $pass == $dbpassword && ($dbgroups=='Truck Owner' || $dbgroups=='Web Admin'))  
    {  
    session_start();  
    $_SESSION['sess_user']=$user;  
  
    /* Redirect browser */  
    header("Location: https://road-freight-transport.000webhostapp.com/services_truck.php");  
    }
     else {  
    echo "<script type='text/javascript'>alert('Wrong Group Login!')</script>";  
    }
    }
    else{
        echo "<script type='text/javascript'>alert('Invalid Username or Password!')</script>";
    }
  
} else {  
    echo "All fields are required!";  
}  
}  
?>

<!DOCTYPE html>
<html>
<head>
<title>Login for Truck Owner</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style = "background-color:#bdc3c7">
    <div id="main-wrapper">
	 <center><h1>Welcome Back!</h1></center>
         <center><h2>Please fill your credentials</h2></center>
    <div class="inner_container">
	 <form action='login_trucks.php' method="post">
	     <button id="home" name="home" type="submit">HOME</button>
           <center>
             <label><b>Username</b></label>
             <input type="text" placeholder="Enter your Username" name="username">
              <label><b>Password</b></label>
             <input type="password" placeholder="Enter your Password" name="password" id="password">
	     <span>
	         <i class="fa fa-eye" aria-hidden="true" id="eye" onclick="toggle()"></i>
	     </span>
             <script>
                 var state = false;
                 function toggle(){
                     if(state){
                         document.getElementById("password").setAttribute("type","password");
                         state = false;
                     }
                     else{
                         document.getElementById("password").setAttribute("type","text");
                         state = true;
                     }
                 }
             </script>
             <button id="login_btn_truck" name="login_btn_truck" type="submit">LOGIN</button>
	    </center>
	 </form>
     </div>
    </div>
</body>
</html>

