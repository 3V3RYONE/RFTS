<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<?php

if(isset($_POST["home"])){
    echo "<script type='text/javascript'>alert('You are logged out!')</script>";
    echo "<script>window.location = 'https://road-freight-transport.000webhostapp.com/'</script>";
}

 if(isset($_POST['next']))
		{
			ob_start();
			header("Location: https://road-freight-transport.000webhostapp.com/input_receiver.php");
			ob_end_flush();
		}
		?>
<?php
            
			require "config.php";
            require "verify_receiver.php";
               
			@$numplatep = $row['Number_Plate'];
			@$companynamep = $row['Company_Name'];
 			@$numwheelsp = $row['Num_Wheels'];
 			@$typeorep = $row['Type_Ore'];
			 @$wtorep = $row['Weight_Ore'];
 			@$ownernamep = $row['Truck_Owner_Name'];
 			@$sidp = $row['Sender_ID'];
 			@$tidp = $row['Transaction_ID'];
 			@$oidp = $row['Order_ID'];
 		
			       @$fastag = $row['Fastag'];
			       @$transaction_id = $row['Transaction_ID'];
			       @$received_fastag = $row['Received_Fastag'] ;
 			$numplate = $_SESSION['otherpage_numplate'];
 			   $query_run = mysqli_query($con,"select T.Fastag,R.Fastag Received_Fastag,T.Transaction_ID from Transactions T INNER JOIN Receiver R on T.Fastag = R.Send_Fastag where Number_Plate='$numplate'");
 			   	$row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
			if($query_run)
			{
			    if(mysqli_num_rows($query_run)>0)
			    {
			       $row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
			       @$fastag = $row['Fastag'];
			       @$transaction_id = $row['Transaction_ID'];
			       @$received_fastag = $row['Received_Fastag'] ;
			        echo("<meta http-equiv='https://road-freight-transport.000webhostapp.com/verify_receiver.php' content='1'>");
			    }}
			       
			       
			       
 $query_runp = mysqli_query($con,"select T.Number_Plate,T.Company_Name,T.Num_Wheels,Tr.Type_Ore,Tr.Weight_Ore,O.Truck_Owner_Name,S.Sender_ID,Tr.Transaction_ID,Tr.Order_ID from Trucks T Inner Join Transactions Tr on T.Number_Plate = Tr.Number_Plate Inner join Truck_Owner O on T.Truck_Owner_ID = O.Truck_Owner_ID inner join Sender S on Tr.Order_ID = S.Order_ID where T.Number_Plate = '$numplate'");
	 if($query_runp)
			{
			    if(mysqli_num_rows($query_runp)>0)
			    {
				    $row = mysqli_fetch_array($query_runp,MYSQLI_ASSOC);
				    @$numplatep = $row['Number_Plate'];
			@$companynamep = $row['Company_Name'];
 			@$numwheelsp = $row['Num_Wheels'];
 			@$typeorep = $row['Type_Ore'];
			 @$wtorep = $row['Weight_Ore'];
 			@$ownernamep = $row['Truck_Owner_Name'];
 			@$sidp = $row['Sender_ID'];
 			@$tidp = $row['Transaction_ID'];
 			@$oidp = $row['Order_ID'];
			    }
			    else
			    {
			        echo '<script type ="text/javascript">alert("Invalid Number Plate CHUTIYA")</script>';
			    }
			}
			else
			    {
			        echo '<script type ="text/javascript">alert("Invalid Number Plate")</script>';
			    }
         ?>

<!DOCTYPE html>
<html>
<head>
<title>Proceed Receiver</title>
<link rel="stylesheet" href="https://road-freight-transport.000webhostapp.com/style.css">
</head>
<body style = "background-color:#bdc3c7">
    <div id="main-wrapper">
        <center><h1>Manual Truck Verification</h1><center>
             <center><p>It is advisable that the following Truck details should match.</p><center>
	    <div class="inner_container_update">
         <form action='proceed_receiver.php' method="post">
             <button id="home" name="home" type="submit">HOME</button>

	     <center>

<label><b>Number Plate</b></label>
		   <input type="text" name="numberplate" disabled value="<?php echo $numplatep;?>">
<label><b>Company Name</b></label>
		   <input type="text" name="companyname" disabled value="<?php echo $companynamep;?>">
<label><b>Number of Wheels</b></label>
		   <input type="text" name="numwheels" disabled value="<?php echo $numwheelsp;?>">
<label><b>Type of Ore</b></label>
		   <input type="text" name="typeore" disabled value="<?php echo $typeorep;?>">
<label><b>Weight of Ore</b></label>
		   <input type="text" name="weightore" disabled value="<?php echo $wtorep;?>">
<label><b>Truck Owner Name</b></label>
		   <input type="text" name="ownername" disabled value="<?php echo $ownernamep;?>">
<label><b>Sender ID</b></label>
		   <input type="text" name="sid" disabled value="<?php echo $sidp;?>">
<label><b>Transaction ID</b></label>
		   <input type="text" name="transaction_id" disabled value="<?php echo $tidp;?>">
<label><b>Order ID</b></label>
		   <input type="text" name="orderid" disabled value="<?php echo $oidp;?>">
		     
		   <button id="Next" name="next" type="submit">NEXT</button>
             </center>
	 </form>
     </div>
    </div>
</body>
</html>
