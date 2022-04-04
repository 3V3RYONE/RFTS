<?php
session_start();
if(isset($_POST['backtoservices']))
{
ob_start();
header("Location: https://road-freight-transport.000webhostapp.com/services_truck.php");
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
		     $query_viewtruck = mysqli_query($con,"select T.Number_Plate,T.Company_Name,Tr.Date,Tr.Time,Tr.Status,R.Date adate,R.Time atime,Tr.To_Dest,Tr.From_Dest from Trucks T Inner Join Transactions Tr on T.Number_Plate=Tr.Number_Plate 
		     Inner Join Receiver R on Tr.Fastag  = R.Send_Fastag");
		 }
		 else
		 {
		      $query_viewtruck = mysqli_query($con,"select T.Number_Plate,T.Company_Name,Tr.Date,Tr.Time,Tr.Status,R.Date adate,R.Time atime,Tr.To_Dest,Tr.From_Dest from Trucks T Inner Join Transactions Tr on T.Number_Plate=Tr.Number_Plate 
		     Inner Join Receiver R on Tr.Fastag  = R.Send_Fastag
		     where T.Truck_Owner_ID = (select ID from Login where Username='$user')");
		 }
		  if (!$query_viewtruck) {
          printf("Error: %s\n", mysqli_error($con));
          exit();
		 }
		 if(mysqli_num_rows($query_viewtruck) > 0){
?>

        <center>  <?php	 echo "<table border = 1>
			<tr>
                          <th>Sl.No.</th>
			  <th>Number Plate</th>
                          <th>Company Name</th>
                          <th>Departure Date</th>
                          <th>Departure Time</th>
			  <th>Status</th>
                          <th>Arrival Date</th>
                          <th>Arrival Time</th>
                          <th>To Destination</th>
                          <th>From Destination</th>
		    </tr>" ; 
		    ?>
		 </center>
<?php
             $counter = 0;

			while ($row = mysqli_fetch_assoc($query_viewtruck)) {
				echo '<tr>';
				?>
               <td><?php echo ++$counter; ?></td>
			<?php	echo '<td>'. $row["Number_Plate"] .'</td>';
				echo '<td>'. $row["Company_Name"] .'</td>';
				echo '<td>'. $row["Date"] .'</td>';
				echo '<td>'. $row["Time"] .'</td>';
				echo '<td>'. $row["Status"] .'</td>';
				echo '<td>'. $row["adate"] .'</td>';
				echo '<td>'. $row["atime"] .'</td>';
				echo '<td>'. $row["To_Dest"] .'</td>';
				echo '<td>'. $row["From_Dest"] .'</td>';				
				echo '</tr>';
			}
		   }
?>




<!DOCTYPE html>
<html>
<head>
<title>View Records for Truck Owner</title>
<link rel="stylesheet" href="https://road-freight-transport.000webhostapp.com/style.css">
</head>
<body style = "background-color:#bdc3c7">
    <div id="main-wrapper">
	 <center><h1><b>Records Fetched Successfully</b></h1></center>
    <div class="inner_container_update">
         <form action='view_truck.php' method="post">
             <button id="home" name="home" type="submit">HOME</button>

	     <center>
                   <button id="backtoservices" name="backtoservices" type="submit">Back To Services</button>
                   <button id="logout" name="logout" type="submit">Logout</button>
             </center>

	 </form>
     </div>
    </div>
</body>
</html>
