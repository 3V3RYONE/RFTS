<?php
                   session_start();
                   if(!isset($_SESSION["sess_user"])){
			   header("location: https://road-freight-transport.000webhostapp.com/login_receiver.php");
		   } else{
                   if(isset($_POST['verify_receiver']))
                   {
			   ob_start();
			   header("Location: https://road-freight-transport.000webhostapp.com/verify_receiver.php");
			   ob_end_flush();
		}
                if(isset($_POST['logout_receiver']))
		{
			ob_start();
			header("Location: https://road-freight-transport.000webhostapp.com/logout.php");
			ob_end_flush();
		}
		  if(isset($_POST['view_receiver']))
		{
			ob_start();
			header("Location: https://road-freight-transport.000webhostapp.com/view_receiver.php");
			ob_end_flush();
		}
		
		if(isset($_POST["home"])){
    echo "<script type='text/javascript'>alert('You are logged out!')</script>";
    echo "<script>window.location = 'https://road-freight-transport.000webhostapp.com/'</script>";
}


         ?>


<!DOCTYPE html>
<html>
<head>
<title>Services of Receiver</title>
<link rel="stylesheet" href="style.css">
</head>
<body style = "background-color:#bdc3c7">
    <div id="main-wrapper">
    <center><h1>Hey <?=$_SESSION['sess_user'];?>, Nice to see you again!</h1></center>
         <center><h2>Please select your service</h2></center>
    <div class="inner_container">
         <form action='services_receiver.php' method="post">
             <button id="home" name="home" type="submit">HOME</button>

             <center>
                   <button id="receiver_verification" name="verify_receiver" type="submit">VERIFY RECORDS</button>
		   <button id="receiver_view" name="view_receiver" type="submit">VIEW RECORDS</button>
                   <button id="logout" name="logout_receiver" type="submit">LOGOUT</button>
             </center>
	 </form>
       </div>
    </div>
</body>
</html>

<?php
}
?>
