<?php
session_start();
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

if(isset($_POST["home"])){
    echo "<script type='text/javascript'>alert('You are logged out!')</script>";
    echo "<script>window.location = 'https://road-freight-transport.000webhostapp.com/'</script>";
}

?>

<?php
		 
		 require "config.php";
		 $user=$_SESSION['sess_user'];
		 if($user=='web_admin')
		 {
		     $query_viewsender = mysqli_query($con,"select T.Number_Plate,T.Company_Name,T.Num_Wheels,Tr.Weight_Ore,Tr.Order_ID,Tr.To_Dest,Tr.From_Dest,Tr.Date,Tr.Time,Tr.Status,O.Truck_Owner_Name 
		   from Trucks T INNER JOIN Transactions Tr on (T.Number_Plate=Tr.Number_Plate) 
		   INNER JOIN Truck_Owner O on (O.Truck_Owner_ID = T.Truck_Owner_ID)");
		 }
		 else
		 {
		     $query_viewsender = mysqli_query($con,"select T.Number_Plate,T.Company_Name,T.Num_Wheels,Tr.Weight_Ore,Tr.Order_ID,Tr.To_Dest,Tr.From_Dest,Tr.Date,Tr.Time,Tr.Status,O.Truck_Owner_Name 
		   from Trucks T INNER JOIN Transactions Tr on (T.Number_Plate=Tr.Number_Plate) 
		   INNER JOIN Truck_Owner O on (O.Truck_Owner_ID = T.Truck_Owner_ID) 
		   where Tr.Order_ID in (select Order_ID from Sender where Sender_ID = (select ID from Login where Username = '$user'))");
		 }
		   if(mysqli_num_rows($query_viewsender) > 0){
?>

        <center>  <?php	 echo "<table border = 1>
			<tr>
			              <th>S.No</th>
			              <th>Number Plate</th>
                          <th>Company Name</th>
                          <th>Number of Wheels</th>
                          <th>Weight of Ore</th>
                          <th>Order ID</th>
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

			while ($row = mysqli_fetch_assoc($query_viewsender)) {
				echo '<tr>';
				?>
               <td><?php echo ++$counter; ?></td>
			<?php	echo '<td>'. $row["Number_Plate"] .'</td>';
				echo '<td>'. $row["Company_Name"] .'</td>';
				echo '<td>'. $row["Num_Wheels"] .'</td>';
				echo '<td>'. $row["Weight_Ore"] .'</td>';
			
				echo '<td>'. $row["Order_ID"] .'</td>';
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
<title>View Records Sender</title>
<link rel="stylesheet" href="https://road-freight-transport.000webhostapp.com/style.css">
</head>
<body style = "background-color:#bdc3c7">
    <div id="main-wrapper">
	 <center><h1><b>Records Fetched Successfully</b></h1></center>
    <div class="inner_container_update">
        <button id="home" name="home" type="submit">HOME</button>

         <form action='view_sender.php' method="post">
		           <button id="backtoservices" name="backtoservices" type="submit">Back To Services</button>
                   <button id="logout" name="logout" type="submit">Logout</button>
             </center>

	 </form>
     </div>
    </div>
</body>
</html>
