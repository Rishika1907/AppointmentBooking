<?php
    $login_error=false;
    
    if(isset($_POST['Login']))
    {
        include("connection.php");
        
        $phone=$_POST["phone"];
        $regno=$_POST["regno"];
        $pwd=$_POST["password"];
        
        $sql=mysqli_query($con,"SELECT * FROM patientregistration where phone='$phone' and pid='$regno' and password='$pwd'");
        $row=mysqli_num_rows($sql);
        if($row > 0){
            $login_error=false;
            header('location:selectdept.php');
        }
        else{
            $login_error=true;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="loginpatient.css">
</head>
<body>
    <div class="divalign">
        <form action="loginpatient.php" method="post">
            <div>
                <h6 class="loghead">Login Form</h6>
               </div>           
                <table>
                <tr>
                    <td>Phone Number</td>
                    <td><input type="tel" class="form-control" name="phone" placeholder="Phone number" pattern="[0-9]{10}" required></td>
                </tr>
                <tr>
                    <td>Registration Number</td>
                    <td><input type="text" class="form-control" name="regno" placeholder="Registration Number" required></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" class="form-control" name="password" placeholder="Password" required></td>
                </tr>
                
            </table>
            <div>
                    <input type="checkbox" name="remember" checked="checked"><span class="marginleft"></span>Remember me
                    <a href="forgotpwdpatient.php" class="forgot">Forgot Password?</a>
            </div>
            <?php
               if($login_error == true){
                echo"<span id='demo1'style='color:red;font-weight:bold;margin-left:5%';><br>Something went wrong!</span>";
               }
            ?>
            <div>
                <button type="button" class="btn cnl" onclick="window.location.href='patientmainpage.html'">Cancel</button>
                <button type="submit" class="btn login" name="Login" value="Login">Login</button>           
            </div>
            <hr class="line">
            <div style="margin-top:1%;margin-left:7%;">
                Don't have an Account?<span class="marginleft"></span><a href="registerpatient.php">Create one</a>
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