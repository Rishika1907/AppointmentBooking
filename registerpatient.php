<?php
$pass_error=false;
$email_error=false;
// $register_success=false;
  include("connection.php");

  if(isset($_POST['register'])){

     $fname=$_POST['fname'];
     $lanme=$_POST['lname'];
     $address=$_POST['address'];
     $zip=$_POST['zip'];
     $pwd=$_POST['pwd'];
     $conpwd=$_POST['conpwd'];
     $gender=$_POST['gender'];
     $dob=$_POST['dob'];
     $phone=$_POST['phone'];
     $email=$_POST['email'];

     if($pwd != $conpwd){
         $pass_error=true;
     }
     $result = mysqli_query($con,"SELECT * FROM patientregistration WHERE email = '$email'");
     $row = mysqli_num_rows($result);
     //Check whether the Email is already registred
     if($row >0){
         $email_error=true;
     }
     if($pass_error == false and $email_error == false){
         $sql=mysqli_query($con,"INSERT INTO patientregistration(`fname`,`lname`,`sex`,`phone`,`address`,`zip`,`dob`,`password`,`email`) VALUES('$fname','$lname','$gender','$phone','$address','$zip','$dob','$pwd','$email')");
         if($sql){
            //  $register_success=true;
             echo "<scripe type='text/javascript'>
                     alert('Registeration Successful');
                    </script>";
            header("location:patientmainpage.html?success");
         }
         else{
            // $register_success=false;
            echo "<scripe type='text/javascript'>
                     alert('Registeration Unsuccessful');
                    </script>";
            header("location:registerpatient.php?error");
         }
     }
  }
  $con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="registerpatient.css">
</head>
<body>
    <div class="container">
            <form action="registerpatient.php" method="POST">
        <div>
         <h2 class="card bg-light styles"  align="center">Patient Registration Form</h2>
        </div>
        <div class="card bg-light heig jumbotron">
         <table class="table form-group">
          <div class="form-inline margintop">
            <tr>
                <td>First Name</td>
                <td><input type="text" name="fname" class="form-control" placeholder="Full name" required></td>
                <td><span class="space"></span>Last Name</td>
                <td><input type="text" name="lname" class="form-control" placeholder="Last name" required></td>
            </tr>
          </div>

          <div class="form-inline">
            <tr>
                <td>Address</td>
                <td><textarea class="form-control" name="address" placeholder="Address" required></textarea></td>
              
                <td><span class="space"></span>Zip code</td>
                <td><input type="zip" class="form-control" name="zip" placeholder="Zip code" pattern="[0-9]{6}" required></td>
                
            </tr>
          </div>

          <div class="form-inline">
            <tr>
                <td>Phone Number</td>
                <td><input type="tel" class="form-control" name="phone" placeholder="Phone Number" pattern="[0-9]{10}" required></td>
                <td><span class="space"></span>E-mail</td>
                <td><input type="email" class="form-control" name="email" placeholder="Your e-mail" required></td>
            </tr>
          </div>

          <div class="form-inline">
            <tr>
                <td>Gender</td>
                <td><select id="Gender" name="gender" class="form-control" required>
                    <option value="" disabled selected >Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                   </select>
                </td>
                <td><span class="space"></span>Date of Birth</td>
                <td><input type="date" name="dob" class="form-control" placeholder="Select DOB" required></td>
            </tr>
          </div>

          <div class="form-inline">
              <tr>
                  <td>Password</td>
                  <td><input type="password" name="pwd" class="form-control" placeholder="Password" required></td>
                  <td><span class="space"></span>Confirm Password</td>
                  <td><input type="password" name="conpwd" class="form-control" placeholder="Confirm Password" required></td>
              </tr>
          </div> 
        </table>
        <?php
            if($pass_error == true){
                echo"<span id='demo1'style='color:red;font-weight:bold;margin-left:-25px';><br>Password and Confirm Password does not match</span>";
            }

            if($email_error == true){
                echo"<span id='demo1'style='color:red;font-weight:bold;margin-left:-25px';><br>Email already registred</span>";
            }

            // if($register_success == false){
            //     echo"<span id='demo1'style='color:red;font-weight:bold;margin-left:-25px';><br>Registration unsussceful</span>";
            // }
            // else{
            //     echo"<span id='demo1'style='color:green;font-weight:bold;margin-left:-25px';><br>Registration Successful</span>";
            // }
        ?>
    <div>
       <button type="reset" class="btn back" onclick="window.location.href='patientmainpage.html'">Back</button>
       <button type="submit" class="btn register" value="register" name="register">Register</button>
        <span class="spacetop"></span> 
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