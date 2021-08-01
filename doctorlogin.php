<?php

session_start();
  include("connection.php");

  if(isset($_POST['Login'])){

     $email=$_POST['email'];
     $pwd=$_POST['pwd'];

     $_SESSION['demail']=$email;

     $sql=mysqli_query($con,"SELECT * FROM doctorregistration WHERE email='$email' and password='$pwd'");
     $row=mysqli_num_rows($sql);
     if($row > 0){
         header("location:doctordashboard.html?success");
     }
     else{
         echo "<script type='text/javascript'>
                alert('Something went wrong!!!!');
               </script>";
         header("location:doctorlogin.php?error");
     }
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <style>
        div.container {
            margin-top: 100px;
            height: 369px;
        }

        div.drimg {

            background-image: url(images/doctorlogin.png);
            background-repeat: no-repeat;
            height: 369px;


        }

        div.form {
            margin-top: -23px;
            width: auto;
            padding: 25px;
            border-radius: 20px;
            border: solid 1px orangered;
            height: auto;

            box-shadow: 0px 8px 15px rgba(228, 173, 173, 0.4);
        }

        div.footer {

            background-color: whitesmoke;
            height: 136px;
            width: 100%;

        }
    </style>


</head>

<body>
    <div class="nav">
        <!-- Image and text -->
        <nav class="navbar navbar-light  fixed-top" style="width: 100%; background-color:white;">
            <div class="container-fluid">
                <a class="navbar-brand" style="margin-left: 30px;">
                    <img src="images/cadecus2.png" alt="" width="50" height="50" class="d-inline-block align-top">
                    <h1 style="display: inline;">DOCTOR'S LOGIN </h1>
                </a>

            </div>
        </nav>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-8 drimg"></div>
            <div class="col-sm-4 form">
                <form action="doctorlogin.php" method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" name="pwd" id="exampleInputPassword1">
                    </div>

                    <button type="submit" class="btn"
                        style="background-image: linear-gradient(to right, orangered , orange); border-radius:50px; margin-left:60px; color:white; font-weight:bold;" name="Login">SIGN
                        IN</button>
                    <a href="forgotpwddoctor.php" style="display: block; color:orangered">Forgot Password?
                    </a>
                    <hr>
                    <label for="exampleInputPassword1" class="form-label" style="display:block;">New Doctor?Register
                        here</label>
                    <button onclick="register();"  class="btn"
                        style="background-image: linear-gradient(to right, orangered , orange); border-radius:50px; display:block;margin-left:60px; color:white; font-weight:bold;"type="submit" >REGISTER</button>
                </form>

            </div>
        </div>
    </div>

    <div class="footer">
        <div class="contact" style="margin-left: 120px;">

            <address>
                <h4>Location</h4>
                'hospital name',<br>
                hospital-street,hospital-district,<br>
                Karnataka,India<br>
                <pincode->hospital pincode</pincode->
            </address>

        </div>
    </div>
    <script >
        function register(){
            window.location="Registrationdoctor.html";
        }
    </script>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>