<?php
        $date_error=false;
        $date_err=false;
        session_start();

       include('connection.php');
      if(isset($_POST['Send'])){
       $email=$_SESSION['demail'];

       $bdate=$_POST['bodate'];

       $sql=mysqli_query($con,"SELECT did FROM doctorregistration WHERE email='$email'");
       $row=mysqli_fetch_assoc($sql);

       $did=$row['did'];

       $sql1=mysqli_query($con,"SELECT * FROM booking WHERE did='$did' and bdate='$bdate' ORDER BY btime");
       $row1=mysqli_fetch_assoc($sql1);
       $num_row=mysqli_num_rows($sql1);
       if($num_row >0){

       $pid=$row1['pid'];

       $sql2=mysqli_query($con,"SELECT fname,lname FROM patientregistration WHERE pid='$pid'");
       $row2=mysqli_fetch_assoc($sql2);

    ?>
    <table border="2" align="center">
        <thead>
            <tr>
              <th>Patient Id</th>
              <th>Patient Name</th>
              <th>Timing</th>
              <th>Reason</th>
            </tr>
        </thead>
        <tbody>
    <?php
     for($i=0;$i<$num_row;$i++){
       echo "<tr><td>".$row1['pid']."</td>";
       echo "<td>".$row2['fname']." ".$row2['lname']."</td>";
       echo "<td>".$row1['btime']."</td>";
       echo "<td>".$row1['reason']."</td></tr>";
     }
    }
    else{
        echo '<script  type="text/JavaScript">
                window.location="http://localhost/dbmsProject1/dbmsProject/doctordashboard.html";
                alert("You do not have any appoitment");
                </script>';
    }
}
    ?>
   </tbody>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Booking</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="viewbooking.css">
</head>
<body>
    <form action="viewbooking.php" method="post">
        <label for="date" class="datestyle">Enter the date</label>
         <input type="date" id="date" name="bodate" class="form-control style" min=<?php echo date('Y-m-d') ?>>
         <button type="submit" class="btn send" name="Send">Send</button>
    </form>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
    integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
    crossorigin="anonymous"></script>
</body>
</html>