<?php
                   session_start();
                   if(!isset($_SESSION["sess_user"])){
			   header("location: https://road-freight-transport.000webhostapp.com/login_sender.php");
		   } else{
                   if(isset($_POST["home"])){
                    echo "<script type='text/javascript'>alert('You are logged out!')</script>";
                    echo "<script>window.location = 'https://road-freight-transport.000webhostapp.com/'</script>";
                    }
                   
                   if(isset($_POST['update_sender']))
                   {
			   ob_start();
			   header("Location: https://road-freight-transport.000webhostapp.com/update_sender.php");
			   ob_end_flush();
		}
                if(isset($_POST['logout_sender']))
		{
			ob_start();
			header("Location: https://road-freight-transport.000webhostapp.com/logout.php");
			ob_end_flush();
		}
		  if(isset($_POST['view_sender']))
		{
			ob_start();
			header("Location: https://road-freight-transport.000webhostapp.com/view_sender.php");
			ob_end_flush();
		}


         ?>


<!DOCTYPE html>
<html>
<head>
<title>Services of Sender</title>
<link rel="stylesheet" href="style.css">
</head>
<body style = "background-color:#bdc3c7">
    <div id="main-wrapper">
    <center><h1>Hey <?=$_SESSION['sess_user'];?>, Nice to see you again!</h1></center>
         <center><h2>Please select your service</h2></center>
    <div class="inner_container">
         <form action='services_sender.php' method="post">
             <button id="home" name="home" type="submit">HOME</button>

             <center>
                   <button id="sender_update" name="update_sender" type="submit">UPDATE RECORDS</button>
		   <button id="sender_view" name="view_sender" type="submit">VIEW RECORDS</button>
                   <button id="logout" name="logout_sender" type="submit">LOGOUT</button>
             </center>
	 </form>
       </div>
    </div>
</body>
</html>

<?php
}
?>
