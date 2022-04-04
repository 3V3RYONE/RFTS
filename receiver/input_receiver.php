<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<?php

                  require "config.php";
                  require "verify_receiver.php";
                    @$arrivaldate=$_POST['arrivaldate'];
                    @$arrivaltime=$_POST['arrivaltime'];
			        $numplatep = $_SESSION['otherpage_numplate'];
                  if(isset($_POST['complete']))
                   {
                    $numplatep = $_SESSION['otherpage_numplate'];
                    @$arrivaldate=$_POST['arrivaldate'];
                    @$arrivaltime=$_POST['arrivaltime'];
                    @$selected = $_POST['status'];
                    echo $arrivaldate;
                    echo  $numplatep;
                    echo $arrivaltime;
                    echo $selected;
                    if(!($selected))
                    {
                        echo '<script type ="text/javascript">alert("Please Select Status")</script>';    
                    }
                    else
                    { 
                            $query_run_i = mysqli_query($con,"Update Receiver set Date = '$arrivaldate',Time = '$arrivaltime',Status = '$selected' where (Fastag = (select Fastag from Transactions  where Number_Plate='$numplatep')) ");
			if($query_run_i )
			{
			    $query_run_tran_i = mysqli_query($con,"Update Transactions set Status = '$selected' where Number_Plate = '$numplatep'");
			    echo '<script type ="text/javascript">alert("Transaction Completed Successfully")</script>';
			    echo "<script>window.location = 'https://road-freight-transport.000webhostapp.com/verify_receiver.php'</script>";
            }
			else
			    {
			        echo '<script type ="text/javascript">alert("Please Enter Arrival Details Before Completing")</script>';
			    }
                   }
                   
            if(isset($_POST["home"])){
    echo "<script type='text/javascript'>alert('You are logged out!')</script>";
    echo "<script>window.location = 'https://road-freight-transport.000webhostapp.com/'</script>";
}
                    }
                    //echo $selected;
           
?>

<!DOCTYPE html>
<html>
<head>
<title>Status Updation</title>
<link rel="stylesheet" href="https://road-freight-transport.000webhostapp.com/style.css">
</head>
<body style = "background-color:#bdc3c7">
    <div id="main-wrapper">
        <center><h1>Complete Your Transaction</h1><center>
         <center><h2>[*] Marked Fields are Mandatory</h2></center>
    <div class="inner_container_update">
         <form action='input_receiver.php' method="post">
             <button id="home" name="home" type="submit">HOME</button>

	     <center>

         <label><b>Number Plate*</b></label>
		   <input type="text"  name="numberplate" disabled value="<?php echo $numplatep;?>" >
                   <label><b>Arrival Date*</b></label>
		   <input type="text" placeholder="Enter Arrival Date" name="arrivaldate" >
		   	   <label><b>Arrival Time*</b></label>
		   <input type="text" name="arrivaltime" placeholder="Enter Arrival Time">
		    <p>
		        <label><b>Status Update</b></label>
      <select name="status" id="status">
          <option value="">---Update Transaction Status---</option>
          <option value="Transaction Complete">Transaction Complete</option>
          <option value="Transaction Pending">Transaction Pending</option>
          <option value="Transaction Rejected">Transaction Rejected</option>
      </select>
    </p>
		     
		   <button id="complete" name="complete" type="submit">Complete</button>
		  
                   <button id="logout" name="logout" type="submit">Logout</button>
             </center>
	 </form>
     </div>
    </div>
</body>
</html>
