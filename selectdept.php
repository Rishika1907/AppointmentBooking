<?php
  session_start();

 if(isset($_POST['Next'])){
  $deptid=$_POST['dept'];
 
   $_SESSION['deptid']=$deptid;
   header('location:booking.php');
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Department</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="selectdept.css">
</head>
<body>
    
<div id="id01" class="modal">
    
<form class="modal-content animate" action="selectdept.php" method="post">
  <div class="imgcontainer">
    <!-- Close the model  -->
    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
  </div>
  
  <!-- Body of the model for login -->
  <div class="container">
    
    <select id="dept" name="dept" class="form-control dept" required>
        <option value="" disabled selected >Select Department</option>
         <option value="10GM01">General Medicine</option>
         <option value="10PA01">Pediatrics</option>
    </select>
      
    <button type="submit" class="btn next" onclick="document.getElementById('id01').style.display='none'" id="next" name="Next">Next</button>
  </div>
   
</form>
</div>

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