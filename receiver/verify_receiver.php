<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<?php
                   require "config.php";
                    @$fastag = $row['Fastag'];
			       @$transaction_id = $row['Transaction_ID'];
			        @$numplate=$_POST['numberplate'];
			         
			        @$received_fastag = $row['Received_Fastag'] ;

if(isset($_POST["home"])){
    echo "<script type='text/javascript'>alert('You are logged out!')</script>";
    echo "<script>window.location = 'https://road-freight-transport.000webhostapp.com/'</script>";
}


if(isset($_POST['logout'])){
                ob_start();
                header("Location: https://road-freight-transport.000webhostapp.com/logout.php");
                ob_end_flush();
            }

if(isset($_POST['backtoservices'])){
                ob_start();
                header("Location: https://road-freight-transport.000webhostapp.com/services_receiver.php");
                ob_end_flush();
            }
            
           
                  
                 
                  if(isset($_POST['check_button']))
                   {
			   
                           @$numplate=$_POST['numberplate'];
                            $_SESSION['otherpage_numplate'] = $numplate;
			   $query_run = mysqli_query($con,"select T.Fastag,R.Fastag Received_Fastag,T.Transaction_ID from Transactions T INNER JOIN Receiver R on T.Fastag = R.Send_Fastag where Number_Plate='$numplate'");
			if($query_run)
			{
			    if(mysqli_num_rows($query_run)>0)
			    {
			       $row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
			       @$fastag = $row['Fastag'];
			       @$transaction_id = $row['Transaction_ID'];
			       @$received_fastag = $row['Received_Fastag'] ;
			       if($fastag == $received_fastag)
			       {
			           $query_setstatus = mysqli_query($con,"Update Receiver set Status ='Fastag Verified' where Send_Fastag = (select Fastag from Transactions where Number_Plate = '$numplate')");
			           $query_setstatus = mysqli_query($con,"Update Transactions set Status ='Fastag Verified'  where Number_Plate = '$numplate'");
			           
			       }
			       else
			       {
			         
			        $query_setstatus_else = mysqli_query($con,"Update Receiver set Status ='Transaction Rejected' where Send_Fastag = (select Fastag from Transactions where Number_Plate = '$numplate')"); 
			        $query_setstatus_else = mysqli_query($con,"Update Transactions set Status ='Transaction Rejected'  where Number_Plate = '$numplate'");
			       }
			    }
			    else
			    {
			        echo '<script type ="text/javascript">alert("Invalid Number Plate")</script>';
			    }
			}
			else
			    {
			        echo '<script type ="text/javascript">alert("Invalid Number Plate")</script>';
			    }
            }
?>

<!DOCTYPE html>
<html>
<head>
<title>Verify Record Receiver</title>
<link rel="stylesheet" href="https://road-freight-transport.000webhostapp.com/style.css">
</head>
<body style = "background-color:#bdc3c7">
    <div id="main-wrapper">
        <center><h1>Automatic Fastag Verification</h1><center>
             <center><p>It is advisable that fastags at both ends should match. If not then there is a high chance, that your transaction has been compromised</p><center>
	 <center><h1>Please Enter The Number Plate</h1></center>
         <center><h2>[*] Marked Fields are Mandatory</h2></center>
    <div class="inner_container_update">
         <form action='verify_receiver.php' method="post">
             <button id="home" name="home" type="submit">HOME</button>

	     <center>
                   <label><b>Number Plate*</b></label>
		   <input type="text" placeholder="Enter Number Plate" name="numberplate" value="<?php echo @$_POST['numberplate'];?>"><button id = "check" name = "check_button" type = "Submit">CHECK</button
		   <br></br>
		   <br></br>
		   	   <label><b>Transaction ID</b></label>
		   <input type="text" name="transaction_id" disabled value="<?php echo $transaction_id;?>">
		   <label><b>Sender Fastag</b></label>
		    <input type="text" name="sender_fastag" disabled value="<?php echo $fastag;?>">
		     <label><b>Received Fastag</b></label>
		     <input type="text" name="recv_fastag" disabled value="<?php echo $received_fastag;?>">
		     
		   <button id="Proceed" name="proceed" type="submit">Proceed</button>
		    <button id="backtoservices" name="backtoservices" type="submit">Back To Services</button>
		  
                   <button id="logout" name="logout" type="submit">Logout</button>
             </center>
	 </form>
     </div>
    </div>
</body>
</html>


<?php

if(isset($_POST['proceed'])){
                
	@$numplate=$_POST['numberplate'];
	$_SESSION['otherpage_numplate'] = $numplate;
   $query_run = mysqli_query($con,"select T.Fastag,R.Fastag Received_Fastag,T.Transaction_ID from Transactions T INNER JOIN Receiver R on T.Fastag = R.Send_Fastag where Number_Plate='$numplate'");
if($query_run)
{
	if(mysqli_num_rows($query_run)>0)
	{
	   $row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
	   @$fastag = $row['Fastag'];
	   @$transaction_id = $row['Transaction_ID'];
	   @$received_fastag = $row['Received_Fastag'] ;
	  // @$flag=0;
	   if($fastag == $received_fastag)
	   {
		 // echo "<script>window.location = 'https://road-freight-transport.000webhostapp.com/proceed_receiver.php'</script>";





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

require "config.php";
//require "verify_receiver.php";
   
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
<div id = "proceed_receiver">
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
</div>
</html>

	   <?php
	   }

	   else
	   {
		   echo"<script type='text/javascript'>alert('Sorry, FASTAG Verification Failed!Transaction rejected.')</script>";
	   }
	}
}


}

?>