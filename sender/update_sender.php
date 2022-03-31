<?php

                  require "config.php";
                  if(isset($_POST['sender_submit']))
                   {
			   @$sid=$_POST['senderid'];
			   @$oid=$_POST['orderid'];
			   @$tid=$_POST['tranid'];
			   @$did=$_POST['driverid'];
                           @$numplate=$_POST['numplate'];
		           @$company=$_POST['company'];
			   @$nowheels=$_POST['noofwheels'];
			   @$towner=$_POST['ownername'];
			   @$oretype=$POST['oretype'];
			   @$wtore=$_POST['wtore'];
			   @$date=$_POST['date'];
			   @$time=$_POST['time'];
			   @$fastag=$_POST['fastag'];
			   @$todest=$_POST['todest'];
			   @$fromdest=$_POST['fromdest'];
			   @$status=$_POST['status'];
			   //implement to check not null condition
			   $query_chkord=mysqli_query($con,"select * from Sender where Sender_ID='$sid' and Order_ID='$oid'");
			   if(!$query_chkord){
			   $query_sender=mysqli_query($con,"insert into Sender values('$sid','$oid')");
			   if(!$query_sender)
			   {
				 echo '<script type="text/javascript">alert("Sorry, Values not Inserted. Please fill out all fields in correct format and check for duplicate entires in SENDER fields")</script>';
			   }
			   else if($query_sender)
			   {
			     $prequery_trucks=mysqli_query($con,"Select Truck_Owner_ID from Truck_Owner where Truck_Owner_Name='$towner'");
			     $numrows=mysqli_num_rows($prequery_trucks); 
			     $trid=NULL;
    				if($numrows!=0)  
   				 {  
   					 while($row=mysqli_fetch_assoc($prequery_trucks))  
   			                 {  
    					    $trid=$row['Truck_Owner_ID'];  
					 } 
				}
				else
				{
				    echo '<script type="text/javascript">alert("CHOOSE FROM GIVEN TRUCK OWNERS ONLY")</script>';
				}
			     $query_trucks=mysqli_query($con,"insert into Trucks values('$numplate','$company',$nowheels,'$trid')");
                             if(!$query_trucks)
			     {
				     echo '<script type="text/javascript">alert("Sorry, Values not Inserted. Please fill out all fields in correct format and check for duplicate entries in TRUCKS fields")</script>';
				     $remove_query_sender=mysqli_query($con,"delete from Sender where Sender_ID='$sid' and Order_ID='$oid'");
			     }
			     else if($query_trucks)
			     {
				     $query_transaction=mysqli_query($con,"insert into Transactions values('$tid','$wtore','$oretype','$fromdest','$todest','$date','$time','$fastag','$status','$numplate','R001','$oid')");
				     if(!$query_transaction)
				     {
                                          echo '<script type="text/javascript">alert("Sorry, Values not Inserted. Please fill out all fields in correct format and check for duplicate entries in TRANSACTION fields")</script>';
                                           $remove_query_sender=mysqli_query($con,"delete from Sender where Sender_ID='$sid' and Order_ID='$oid'");
					  $remove_query_trucks=mysqli_query($con,"delete from Trucks where Number_Plate='$numplate'");
				     }
				     else if($query_transaction)
				     {
					     $query_drivers=mysqli_query($con,"insert into Drivers values('$sid','$did')");
					     if(!$query_drivers)
					     {
						     echo '<script type="text/javascript">alert("Sorry, Values not Inserted. Please fill out all fields in correct format and check for duplicate entries in DRIVERS fields")</script>';
						     $remove_query_sender=mysqli_query($con,"delete from Sender where Sender_ID='$sid' and Order_ID='$oid'");
					             $remove_query_trucks=mysqli_query($con,"delete from Trucks where Number_Plate='$numplate'");
						     $remove_query_transaction=mysqli_query($con,"delete from Transactions where Transaction_ID='$tid'");
					     }
				             else if($query_drivers)
					     {
					             $query_receiver=mysqli_query($con,"INSERT INTO `Receiver` VALUES ('R001','$fastag','$fastag',NULL,NULL,NULL)");
					             if(!$query_receiver)
					             {
					                 echo '<script type="text/javascript">alert("Sorry, Values not Inserted. Please fill out all fields in correct format and check for duplicate entries in RECEIVER fields")</script>';
					                 $remove_query_sender=mysqli_query($con,"delete from Sender where Sender_ID='$sid' and Order_ID='$oid'");
					                 $remove_query_trucks=mysqli_query($con,"delete from Trucks where Number_Plate='$numplate'");
						             $remove_query_transaction=mysqli_query($con,"delete from Transactions where Transaction_ID='$tid'");
						             $remove_query_driver=mysqli_query($con,"delete from Drivers where Sender_ID='$sid' and Driver_ID='$did'");
					             }
					             else if($query_receiver)
					             {
					              $query_increment=mysqli_query($con,"update Truck_Owner SET Num_Trucks = Num_Trucks+1 where Truck_Owner_ID='$trid'");
					              echo '<script type="text/javascript">alert("Successfully Inserted New Record!")</script>';   
					             }
					     } // else if of Drivers closed
				     } //else if of Transaction closed 
			      } //else if of Trucks closed
			   } //else if sender closed
			   }
			 else{
			     
			     $prequery_trucks=mysqli_query($con,"Select Truck_Owner_ID from Truck_Owner where Truck_Owner_Name='$towner'");
			     $numrows=mysqli_num_rows($prequery_trucks); 
			     $trid=NULL;
    				if($numrows!=0)  
   				 {  
   					 while($row=mysqli_fetch_assoc($prequery_trucks))  
   			                 {  
    					    $trid=$row['Truck_Owner_ID'];  
					 } 
				}
				else
				{
				    echo '<script type="text/javascript">alert("CHOOSE FROM GIVEN TRUCK OWNERS ONLY")</script>';
				}
			     $query_trucks=mysqli_query($con,"insert into Trucks values('$numplate','$company',$nowheels,'$trid')");
                             if(!$query_trucks)
			     {
				     echo '<script type="text/javascript">alert("Sorry, Values not Inserted. Please fill out all fields in correct format and check for duplicate entries in TRUCKS fields")</script>';
			     }
			     else if($query_trucks)
			     {
				     $query_transaction=mysqli_query($con,"insert into Transactions values('$tid','$wtore','$oretype','$fromdest','$todest','$date','$time','$fastag','$status','$numplate','R001','$oid')");
				     if(!$query_transaction)
				     {
                                          echo '<script type="text/javascript">alert("Sorry, Values not Inserted. Please fill out all fields in correct format and check for duplicate entries in TRANSACTION fields")</script>';
					  $remove_query_trucks=mysqli_query($con,"delete from Trucks where Number_Plate='$numplate'");
				     }
				     else if($query_transaction)
				     {
					     $query_drivers=mysqli_query($con,"insert into Drivers values('$sid','$did')");
					     if(!$query_drivers)
					     {
						     echo '<script type="text/javascript">alert("Sorry, Values not Inserted. Please fill out all fields in correct format and check for duplicate entries in DRIVERS fields")</script>';
					             $remove_query_trucks=mysqli_query($con,"delete from Trucks where Number_Plate='$numplate'");
						     $remove_query_transaction=mysqli_query($con,"delete from Transactions where Transaction_ID='$tid'");
					     }
				             else if($query_drivers)
					     {
					             $query_receiver=mysqli_query($con,"INSERT INTO `Receiver` VALUES ('R001','$fastag','$fastag',NULL,NULL,NULL)");
					             if(!$query_receiver)
					             {
					                 echo '<script type="text/javascript">alert("Sorry, Values not Inserted. Please fill out all fields in correct format and check for duplicate entries in RECEIVER fields")</script>';
					                 $remove_query_trucks=mysqli_query($con,"delete from Trucks where Number_Plate='$numplate'");
						             $remove_query_transaction=mysqli_query($con,"delete from Transactions where Transaction_ID='$tid'");
						             $remove_query_driver=mysqli_query($con,"delete from Drivers where Sender_ID='$sid' and Driver_ID='$did'");
					             }
					             else if($query_receiver)
					             {
					              $query_increment=mysqli_query($con,"update Truck_Owner SET Num_Trucks = Num_Trucks+1 where Truck_Owner_ID='$trid'");
					              echo '<script type="text/javascript">alert("Successfully Inserted New Record!")</script>';   
					             }
					     } // else if of Drivers closed
				     } //else if of Transaction closed 
			      } //else if of Trucks closed
			 }
			} //if isset closed
			
			if(isset($_POST["home"])){
    echo "<script type='text/javascript'>alert('You are logged out!')</script>";
    echo "<script>window.location = 'https://road-freight-transport.000webhostapp.com/'</script>";
}

                   if(isset($_POST['backtoservices']))
                   {
			   ob_start();
			   header("Location: https://road-freight-transport.000webhostapp.com/services_sender.php");
			   ob_end_flush();
		   }

		   if(isset($_POST['logout']))
		   {
			   ob_start();
			   header("Location: https://road-freight-transport.000webhostapp.com/logout.php");
			   ob_end_flush();
		   }
         ?>

<!DOCTYPE html>
<html>
<head>
<title>Update Record Sender</title>
<link rel="stylesheet" href="https://road-freight-transport.000webhostapp.com/style.css">
</head>
<body style = "background-color:#bdc3c7">
    <div id="main-wrapper">
	 <center><h1>Please fill the following details for new record</h1></center>
         <center><h2>[*] Marked Fields are Mandatory</h2></center>
    <div class="inner_container_update">
         <form action='update_sender.php' method="post">
             <button id="home" name="home" type="submit">HOME</button>

	     <center>
                   <label><b>Sender ID *</b></label>
		   <input type="text" placeholder="Enter Sender ID" name="senderid">
	           <label><b>Order ID *</b></label>
                   <input type="text" placeholder="Enter Order ID" name="orderid">
		   <label><b>Transaction ID *</b></label>
		   <input type="text" placeholder="Enter Transaction ID" name="tranid">
                   <label><b>Driver ID *</b></label>
                   <input type="text" placeholder="Enter Driver ID" name="driverid">
		   <label><b>Truck Number Plate *</b></label>
		   <input type="text" placeholder="Enter Number Plate" name="numplate">
                   <label><b>Truck Company Name *</b></label>
                   <input type="text" placeholder="Enter Company Name" name="company">
                   <label><b>Number of Wheels *</b></label>
		   <input type="number" placeholder="Enter Number of Wheels" name="noofwheels">
                   <label><b>Truck Owner Name *</b></label>
                   <input type="text" placeholder="Enter Truck Owner Name" name="ownername">
                   <label><b>Type of Ore *</b></label>
                   <input type="text" placeholder="Enter Type of Ore" name="oretype">
                   <label><b>Weight of Raw Material *</b></label>
                   <input type="text" placeholder="Enter Weight of Raw Material" name="wtore">
		   <label><b>Date *</b></label>
                   <input type="text" placeholder="Enter Date (YYYY-MM-DD)" name="date">
		   <label><b>Time *</b></label>
                   <input type="text" placeholder="Enter Time (HH:MM:SS) 24-Hour-Format" name="time">
		   <label><b>Fastag *</b></label>
                   <input type="text" placeholder="Enter Scanned Fastag" name="fastag">
	           <label><b>To Destination *</b></label>
                   <input type="text" placeholder="Enter To Destination" name="todest">
  		   <label><b>From Destination *</b></label>
                   <input type="text" placeholder="Enter From Destination" name="fromdest">
    		   <label><b>Status *</b></label>
                   <input type="text" placeholder="Enter Status (Sent, Processed)" name="status">
		   <button id="submit_sender" name="sender_submit" type="submit">SUBMIT</button>
		   <button id="backtoservices" name="backtoservices" type="submit">Back To Services</button>
                   <button id="logout" name="logout" type="submit">Logout</button>
             </center>
	 </form>
     </div>
    </div>
</body>
</html>
