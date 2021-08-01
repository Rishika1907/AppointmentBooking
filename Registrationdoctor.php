<?php
$pass_error=false;
$email_error=false;
$registartion_error=false;
  include("connection.php");
  
  if(isset($_POST['Register'])){
       
    $name=$_POST['dname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $degree=$_POST['degree'];
    $dob=$_POST['dob'];
    $address=$_POST['address'];
    $visthour=$_POST['visthour'];
    $dtiming=$_POST['dhour'];
    $etiming=$_POST['ehour'];
    $edtiming=$_POST['edhour'];
    $dept=$_POST['dept'];
    $pwd=$_POST['pwd'];
    $conpwd=$_POST['conpwd'];

    if($pwd != $conpwd){
        $pass_error=true;
    }
    $sql=mysqli_query($con,"SELECT * FROM doctorregistration where email='$email'");
    $row=mysqli_num_rows($sql);
    if($row > 0){
        $email_error=true;
    }

    if($pass_error == false and $email_error == false){
            $sql=mysqli_query($con,"INSERT INTO doctorregistration(`dname`,`phone`,`email`,`password`,`address`,`dob`,`degree`,`timing`,`dtiming`,`etiming`,`edtiming`,`depid`) VALUES('$name','$phone','$email','$pwd','$address','$dob','$degree','$visthour','$dtiming','$etiming','$edtiming','$dept')");
            if($sql){
                header("location:doctorHomepage.html?success");
            }
            else{
                $registartion_error=true;
            }
    }
  }
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="Registartiondoctor.css">
</head>
<body>
    <div>
        <form action="Registrationdoctor.php" method="post">
            <table>
                <div>
                   <h6 class="mainhead">Registartion Form</h6>
                </div>

                    <tr>
                        <td>Name</td>
                         <td><input type="text" class="form-control" name="dname" placeholder="Name" required></td>
                         <td><span class="textleft"></span>Email Id</td>
                         <td><input type="email" class="form-control" name="email" placeholder="Email Id" required></td>
                    </tr>
                
                    <tr>
                        <td>Phone Number</td>
                        <td><input type="tel" class="form-control" name="phone" placeholder="Phone Number" pattern="[0-9]{10}" required></td>
                        <td><span class="textleft"></span>Degree</td>
                        <td><input type="text" name="degree" class="form-control" placeholder="Degree" required></td>
                    </tr>

                    <tr>
                        <td>Address</td>
                        <td><textarea class="form-control" name="address" placeholder="Address" required></textarea></td>
                        <td><span class="textleft"></span>Date of Birth</td>
                        <td><input type="date" name="dob" class="form-control" required></td>
                    </tr>

                    <tr>
                        <td>Department</td>
                        <td><select id="dept" name="dept" class="form-control" required>
                            <option value="" disabled selected >Select Department</option>
                            <option value="10GM01">General Medicine</option>
                            <option value="10PA01">Pediatrics</option>
                        </td>

                        <td><span class="textleft"></span>Gender</td>
                        <td><select id="Gender" name="gender" class="form-control">
                            <option value="" disabled selected >Select Gender</option>
                           <option value="Male">Male</option>
                           <option value="Female">Female</option>
                            <option value="Other">Other</option>
                         </select>
                        </td>
                   </tr>
        
                    <tr>
                         <td>Visiting Time</td>
                        <td class="form-inline"><input type="time" name="visthour" class="form-control" required>
                        to
                        <input type="time" name="dhour" class="form-control" required></td>

                        <td><span class="textleft"></span>Visiting Time</td>
                        <td class="form-inline"><input type="time" name="ehour" class="form-control" required>
                        to
                        <input type="time" name="edhour" class="form-control" required></td>
                    </tr>

                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="pwd" class="form-control" placeholder="Password" required></td>
                        <td><span class="textleft"></span>Confirm Password</td>
                        <td><input type="password" name="conpwd" class="form-control" placeholder="Confirm Password" required></td>
                    </tr>

            </table>
            <?php
            if($pass_error == true){
                echo"<span id='demo1'style='color:red;font-weight:bold;margin-left:-25px';><br>Password and Confirm Password does not match</span>";
            }

            if($email_error == true){
                echo"<span id='demo1'style='color:red;font-weight:bold;margin-left:-25px';><br>Email already registred</span>";
            }
            if($registartion_error == true){
                echo"<span id='demo1'style='color:red;font-weight:bold;margin-left:-25px';><br>Registration Unsuccessful</span>";
            }
            ?>
            <div>
                <button type="reset" class="btn cancel" onclick="window.location.href='doctorHomepage.html'">Back</button>
                <button type="submit" class="btn register" name="Register" >Register</button>
               
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