<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      

    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="visitinghours.css">
<body> 
 <div id="visithour" class="style">   
 <div id="id01" class="modal">
    
    <form class="modal-content animate" action="setdepr.php" method="POST">
      <div class="imgcontainer">
        <!-- Close the model  -->
        <span onclick="window.location.href='booking.php'" class="close" title="Close Modal">&times;</span>
      </div>
      
      <!-- Body of the model for login -->
      <div class="container">

  <table border="2" align="center" style="margin-top:10%">
    <thead>
    <tr>
      <th>Doctor Name</th>
      <th colspan="2">Visiting Time</th>
    </tr>
    </thead>
    <tbody>
    
<?php
   session_start();
   include("connection.php");

   if(isset($_POST['Vist'])){
     $depid=$_SESSION['deptid'];
       
     $sql=mysqli_query($con,"SELECT * FROM doctorregistration WHERE depid='$depid'");
     while( $row = mysqli_fetch_assoc($sql))
        {
            echo "<tr><td>{$row['dname']}</td>";
            echo "<td>{$row['timing']} to {$row['dtiming']}</td>";
            echo "<td>{$row['etiming']} to {$row['edtiming']}</td></tr>";
        }
   }
  ?>
   </tbody>
   </table>
 </div>
</div>

<script>
  // Get the modal
 var modal = document.getElementById('id01');
  
  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
      if (event.target == modal) {
        window.location.href='booking.php';
      }
  }
</script>

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