<?php
session_start();
if(isset($_POST['backtoservices']))
{
ob_start();
header("Location: https://road-freight-transport.000webhostapp.com/services_receiver.php");
ob_end_flush();
}

if(isset($_POST['logout']))
{
ob_start();
header("Location: https://road-freight-transport.000webhostapp.com/logout.php");
ob_end_flush();
}

?>

<?php
		 
		 require "config.php";
		 $user=$_SESSION['sess_user'];
		 if($user=='web_admin')
		 {
		     $query_viewreceiver = mysqli_query($con,"select T.Number_Plate,T.Company_Name,T.Num_Wheels,Tr.Weight_Ore,Tr.Type_Ore,Tr.Order_ID,Tr.To_Dest,Tr.From_Dest,R.Date,R.Time,R.Status,O.Truck_Owner_Name 
		   from Trucks T  INNER JOIN Transactions Tr on (T.Number_Plate=Tr.Number_Plate) 
		   INNER JOIN Receiver R on ( Tr.Fastag = R.Send_Fastag)
		   INNER JOIN Truck_Owner O on (T.Truck_Owner_ID = O.Truck_Owner_ID)");
		   
		 }

		 
		 else
		 {
		     $query_viewreceiver = mysqli_query($con,"select T.Number_Plate,T.Company_Name,T.Num_Wheels,Tr.Weight_Ore,Tr.Type_Ore,Tr.Order_ID,Tr.To_Dest,Tr.From_Dest,R.Date,R.Time,R.Status,O.Truck_Owner_Name 
		   from  Trucks T INNER JOIN Transactions Tr on (T.Number_Plate=Tr.Number_Plate) 
		   INNER JOIN Truck_Owner O on (T.Truck_Owner_ID = O.Truck_Owner_ID) 
		   INNER JOIN Receiver R on (Tr.Fastag = R.Send_Fastag)
		   where  R.Receiver_ID = (select ID from Login where Username = '$user')");
		 }
		 
		 
		 
		 if (!$query_viewreceiver) {
          printf("Error: %s\n", mysqli_error($con));
          exit();
		 }
		   if(mysqli_num_rows($query_viewreceiver) > 0){
?>

        <center>  <?php	 echo "<table border = 1>
			<tr>
			              <th>S.No</th>
			              <th>Number Plate</th>
                          <th>Company Name</th>
                          <th>Number of Wheels</th>
                          <th>Type Of Ore</th>
                          <th>Weight of Ore</th>
                          <th>To Destination</th>
                          <th>From Destination</th>
                          <th>Date</th>
						  <th>Time</th>
                          <th>Status</th>
						  <th>Truck_Owner</th>
		    </tr>" ; 
		    ?>
		 </center>
<?php
             $counter = 0;

			while ($row = mysqli_fetch_assoc($query_viewreceiver)) {
				echo '<tr>';
				?>
               <td><?php echo ++$counter; ?></td>
			<?php	echo '<td>'. $row["Number_Plate"] .'</td>';
				echo '<td>'. $row["Company_Name"] .'</td>';
				echo '<td>'. $row["Num_Wheels"] .'</td>';
				echo '<td>'. $row["Type_Ore"] .'</td>';
				echo '<td>'. $row["Weight_Ore"] .'</td>';
				echo '<td>'. $row["To_Dest"] .'</td>';
				echo '<td>'. $row["From_Dest"] .'</td>';
				echo '<td>'. $row["Date"] .'</td>';
				echo '<td>'. $row["Time"] .'</td>';
				echo '<td>'. $row["Status"] .'</td>';
				echo '<td>'. $row["Truck_Owner_Name"] .'</td>';
				
				echo '</tr>';
			}
		   }
?>




<!DOCTYPE html>
<html>
<head>
<title>View Records Receiver</title>
<link rel="stylesheet" href="https://road-freight-transport.000webhostapp.com/style.css">
</head>
<body style = "background-color:#bdc3c7">
    <div id="main-wrapper">
	 <center><h1><b>Records Fetched Successfully</b></h1></center>
    <div class="inner_container_update">
         <form action='view_receiver.php' method="post">
		           <button id="backtoservices" name="backtoservices" type="submit">Back To Services</button>
                   <button id="logout" name="logout" type="submit">Logout</button>
             </center>

	 </form>
     </div>
    </div>
</body>
</html>
