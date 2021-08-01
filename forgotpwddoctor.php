<?php
// Start the session
session_start();

$log_err=false;

if(isset($_POST['Submit'])){
    // Include the connection.php to this page
    include("connection.php");

//    Get the data from the form
   $email=$_POST['email'];
   $phone=$_POST['phone'];

// Read the session variable
    $_SESSION['email']=$email;
    
// Check whether the email entered is registered and data entered is proper
   $result = mysqli_query($con,"SELECT * FROM doctorregistration WHERE email = '$email' and phone ='$phone'");
   $row = mysqli_num_rows($result);
   if($row == 0){
    $log_err=true;
      }
    else{
        header("location:resetpwddoctor.php?success");       
    }
   
    // Close the connection
      $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="forgotpwdpatient.css">
</head>
<body>
    <div class="simple-form maindiv">
        <h4></h4>
    <div class="container divtag">
        <div>
            <img src="image\images.png" alt="..." class="user">
       </div>
       <form action="forgotpwddoctor.php" method="post">
         <div style="margin-top:8%;">
         <label for="email">Email:</label><br>
         <input id="email" class="form-control" name="email" type="email" placeholder="Enter your E-mail">
         </div>

         <div style="margin-top:5%;">
         <label for="phone" class="style">Phone Number:</label>
         <input id="phone" class="form-control" name="phone" type="tel" pattern={0-9}[10] placeholder="Enter the phone no.">
        </div>
        <?php
           if($log_err == true){
            echo"<span id='demo1'style='color:red;font-weight:bold;margin-left:15%;margin-top:-7%;'><br>Something went wrong!</span>";
           }
        ?>
        <div>
            <button type="submit" name="Submit" class="btn next">Next</button>
        </div>
       </form>
    </div>
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