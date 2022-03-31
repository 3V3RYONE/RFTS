<?php
                   if(isset($_POST["home"])){
                    echo "<script type='text/javascript'>alert('You are logged out!')</script>";
                    echo "<script>window.location = 'https://road-freight-transport.000webhostapp.com/'</script>";
                    }
                   
                   if(isset($_POST['login_sender']))
                   {
			   ob_start();
			   header("Location: https://road-freight-transport.000webhostapp.com/login_sender.php");
			   ob_end_flush();
		}
                if(isset($_POST['login_truck']))
		{
			ob_start();
			header("Location: https://road-freight-transport.000webhostapp.com/login_trucks.php");
			ob_end_flush();
		}
		  if(isset($_POST['login_receiver']))
		{
			ob_start();
			header("Location: https://road-freight-transport.000webhostapp.com/login_receiver.php");
			ob_end_flush();
		}


         ?>


<!DOCTYPE html>
<html>
<head>
<title>RFTS</title>
<link rel="stylesheet" href="style.css">
</head>
<body style="background-color: #bdc3c7">
    <div id="main-wrapper">
    <center><h1>Road Freight Transport System</h1></center>
    <center><p>RFTS is a revolutionary Free Web Service in Goods Carriage Systems, brought to you with fresh feel and introspection! We at RFTS, aim to deliver the best in class integrity services to give a boost to your business outstripping any possibilities of SCAMS. Our Partners and Associates are committed to excellence and give a new dimension to this area of interest. We propose easier access to live detect your exports and imports, with high-end security of your transactions just at your finger-tips.....</p></center>
         <center><h2>Please select your group</h2></center>
    <div class="inner_container">
         <form action='index.php' method="post">
             <button id="home" name="home" type="submit">HOME</button>

             <center>
                   <button id="login_sender" name="login_sender" type="submit">SENDER</button>
		   <button id="login_truck" name="login_truck" type="submit">TRUCK OWNER</button>
                   <button id="login_receiver" name="login_receiver" type="submit">RECEIVER</button>
             </center>
	 </form>
       </div>
    </div>
</body>
</html>

