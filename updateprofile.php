<?php
session_start();
$pass_error=false;
$success=false;
if(isset($_POST['Submit'])){
    // Add connction.php page to this page
  include("connection.php");
 
//get the data from the to be updated from the form
    $email=$_SESSION['demail'];

    
    $phone=$_POST['phone'];
    $degree=$_POST['degree'];
    $address=$_POST['address'];
    $pwd=$_POST['pwd'];
    $conpwd=$_POST['conpwd'];
    
    //check whether password and confirm password are same
    if($pwd != $conpwd){
        $pass_error=true;
        // echo "<script>console.log('Debug Objects err: " . $pass_error . "' );</script>";
     }

    //if valid data in entered update the data in database
    if($pass_error == false){
    $result=mysqli_query($con,"UPDATE doctorregistration SET phone='$phone',degree='$degree',address='$address',password='$pwd' WHERE email='$email'");
    if($result){
        $success=true;
     }
    }
    // Close connection
    $con->close();
}  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="edit.css">
</head>
<body>
<div class="container">
       <div class="halign">
            <p>Edit Information</p>
        </div>

    <form action="updateprofile.php" method="post">
        
        <table class="table_space align">
            <tr >
                <td>First name</td>
                <?php
                //Add connection.php to this page
                include("connection.php");

                // Read the session variable
                $email=$_SESSION['email'];
                // retrevie the data from database and display it in the table
                $result=mysqli_query($con,"SELECT * FROM doctorregistration WHERE email='$email'");
                $row=mysqli_fetch_array($result);
                    echo "<td><input type='text' class='form-control' name='dname' id='dname' value=" .$row['dname']." readonly></td></tr>";
                     
                   echo " <tr>
                        <td>Departmentid</td>";
                      echo "  <td><input type='text' class='form-control' name='depid' id='depid' value=" .$row['depid']." readonly></td>
                    </tr> ";
                 
                  echo"  <tr>
                        <td>Degree</td>";
                   echo"     <td><input class='form-control' id='degree' name='degree' type='text' value=" .$row['degree']." requried></td>
                    </tr>";
                   
                    echo "<tr>
                        <td>Address</td>";
                     echo "   <td><textarea name='address' id='address' class='form-control' requried>".$row['address']."</textarea></td>
                    </tr>";

                    echo "<tr>
                        <td>DOB</td>";
                    echo " <td><input type='date' name='dob' class='form-control' id='dob' value=" .$row['dob']." readonly><td>
                    </tr>";

                   echo" <tr>
                        <td>Phone no:</td>";
                    echo "<td><input type='tel' pattern='[0-9]{10}' class='form-control' name='phone' id='phone' value=" .$row['phone']." requried></td>
                    </tr>";
                    
                   echo " <tr>
                        <td>Email:</td>";
                     echo " <td><input type='email' name='email' class='form-control' id='email' value=" .$row['email']." readonly></td>
                    </tr>";
                   
                    echo "<tr>
                    <td>MOrning visiting hours</td>";
                      echo "  <td class='form-inline'><input type='time' name='visthour' class='form-control' id='visthour' value=" .$row['timing']." readonly>
                      <input type='time' name='dhour' class='form-control' id='dhour' value=" .$row['dtiming']." readonly></td>
                        </tr>";

                        echo "<tr>
                        <td>Evening visiting hours</td>";
                          echo "  <td class='form-inline'><input type='time' name='ehour' class='form-control' id='ehour' value=" .$row['etiming']." readonly>
                          <input type='time' name='edhour' class='form-control' id='edhour' value=" .$row['edtiming']." readonly></td>
                            </tr>";
    
                
                   echo" <tr>
                        <td>Password:</td>";
                     echo "   <td><input type='password' class='form-control' id='pwd' name='pwd' value=" .$row['password']." requried><td>
                    </tr>";

                   echo" <tr>
                        <td>Confirm Password:</td>";
                    echo "  <td><input type='password' class='form-control' id='conpwd' name='conpwd' value=" .$row['password']." requried></td>
                    </tr>";
                    ?>
                  </table>
                <?php
                   //Display the message if data is updated successfully
                    if($pass_error == true){
                        echo"<span id='demo1'style='color:red;font-weight:bold;margin-left:-50px;margin-top:1%';><br>Password and Confirm Password does not match</span>";
                    }
                    //Display error meassge error occured during updating the data
                    if($success == true){
                        echo "<span id='demo1'style='color:green;font-weight:bold;margin-left:-50px';><br>Update successful</span>";
                    }
                ?>
                <div>  
                    <button type="button" class="btn"  onclick="window.location.href='doctordashboard.html'">Go Back</button>
                    <button id="submit" class="btn"  value="Submit" name="Submit" type="submit">Update now</button><br>
                   
                </div>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
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