<?php
     session_start();
    if(isset($_POST['book'])){
       
        //to check whether it is sunday
        function isSunday($date) {
            $weekDay = date('w', strtotime($date));
           // echo $weekDay;
           if($weekDay == 0){
               return true;
            }
            else{
               return false;
           }
        }

        include("connection.php");
        $regno=$_POST['regno'];
        $depid=$_SESSION['deptid'];
        $docname=$_POST['dr'];
        $date=$_POST['date'];
        $time=$_POST['time'];
        $reason=$_POST['reason'];

        //checking whether the day is sunday.
        if((isSunday($date))){
            echo '<script>alert("Doctors are unavailable on Sunday.📅")</script>';
        }
        else{
            //doctor name matching it to department id
            $did=mysqli_query($con,"SELECT did,depid FROM doctorregistration WHERE '$docname'= dname");
            $docid=mysqli_fetch_array($did,MYSQLI_NUM);
            //doctor id
            $doctorid=$docid[0];
            //department of the doctor.
            $dep=$docid[1];

            //checking the timings of the given doctor.
            $checktime=mysqli_query($con,"SELECT * from doctorregistration where did='$doctorid'
            AND ('$time' between timing AND dtiming
            OR '$time' between etiming AND edtiming)");
            $row1=mysqli_num_rows($checktime);
            if($row1==0){
                echo '<script>alert("Check the visiting hours of the doctor🕗");</script>';
            }
            else{
            //checking for free slots
            $d=mysqli_query($con,"SELECT * from doctorregistration where '$doctorid'=did
                                    AND ('$time' between timing AND dtiming
                                    OR '$time' between etiming AND edtiming) AND
                                    '$time' NOT IN(SELECT btime from booking where '$doctorid'=did AND bdate='$date')");
            $row2 = mysqli_num_rows($d);
            //if doctor is available procceed to booking.
            if($row2==1){
                 //booking appointment
                $no_of_bookings=mysqli_query($con,"SELECT COUNT(bno)AS Counts,'$doctorid'
                                                   FROM booking 
                                                   WHERE bdate='$date'
                                                   GROUP BY'$doctorid'");

                $book=mysqli_fetch_array($no_of_bookings,MYSQLI_NUM); 
                if($book==NULL){
                    $bookno=1;
                }else{
                    $bookno=$book[0]+1;
                }
                 $sqlinsert=mysqli_query($con,"INSERT INTO booking (`bno`,`pid`, `depid`, `did`, `btime`, `bdate`, `reason`) VALUES ('$bookno','$regno','$dep','$doctorid','$time','$date','$reason')");
                // echo $sqlinsert;
                   if ($sqlinsert) {
                    // $token=mysqli_query($con,"") 
                    echo '<script>alert("Booking Successful\n");</script>';
                    $confirm='Your booking number is '.$bookno.' on '.$date.' at '.$time;
                    
                    echo '<h1 style="color:navy;">'.$confirm.'</h1>';
                    } 
                    else {
                        echo "Error: " . $sqlinsert . "<br>" . mysqli_error($con);
                    }
                    
                }
               //if slots are full
            else{
                echo '<script>alert("Slots are full.")</script>';
                }
            }    
        }
    $con->close();
            
    }
    
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book appointment</title>
    <link rel="stylesheet" href="booking.css">


</head>
<body>
    <div class="nav">
       <form action="vistinghours.php" method="post">
        <button style="color:white;background-color:blue;margin-left:0px; height: 30px; font-family: sans-serif; border: 0px; border-radius: 10px; margin-left: 20px;" type="submit" name="Vist" value="Vist">VISITING HOURS OF THE DOCTOR</button>
       </form>
        <h1 style="display: inline; margin-left: 230px;">Appointment Booking</h1>
        <button onclick="redirect()" style="color:white;background-color:blue;; height: 30px; font-family: sans-serif; border: 0px; border-radius: 10px; margin-left: 300px; ">Logout</button>
       
    </div>
    <div class="form" id="Form">
        <form action="booking.php" method="POST">
            
            
            <table class="form">
                <tr>
                    <td>
                        <label for="regno">Registration Number</label>
                    </td>
                    <td>
                        <input type="text" name=regno required>
                    </td>

                </tr>
                <tr>
                    <td>
                        <label for="name">Name of the patient</label>
                    </td>
                    <td>
                        <input type="text" name=name required>
                    </td>
                </tr>

                </tr>
                <tr>
                    <td>
                        <label for="phone">Phone Number</label>
                    </td>
                    <td>
                        <input type="text" name=phone required>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="department">Department</label>
                    </td>
                    <td>
                        <!-- <select name="dept" id="dept" required>
                            <option disabled select value selected>--select an option--</option>
                            <option value="dept">General Medicine</option>
                            <option value="dept">Pediatrics</option>
                        </select> -->
                    <?php 
                        include('connection.php');
                        
                        $depid=$_SESSION['deptid'];

                        $sql=mysqli_query($con,"SELECT depname FROM department WHERE depid='$depid'");
                        $row=mysqli_fetch_assoc($sql);
                        echo "<input type='text' name='dept' value=".$row['depname']." id='department'>";
 
                    echo "</td>";

               echo "</tr>";
                echo "<tr>";
                 echo  "<td>";
                    echo  "<label for='doctor'>Doctor's name<sup style='color:red'>*</sup></label>";
                    echo "</td>";
                   echo "<td>";

                        echo "<select name='dr' id='dr' required>";
                        echo "<option disabled select value selected>--select an option--</option>";
                          
                            $sql1=mysqli_query($con,"SELECT dname FROM doctorregistration WHERE depid='$depid'");
                            while( $row1 = mysqli_fetch_assoc($sql)){
                            //    $dnam=$row1['dname'];
                             echo "<option  value='".$row1['dname']."'>".$row1['dname']."</option>";
                            // <option value="Erica">Dr.Erica</option>
                            // <option value="James Anderson">Dr.James Anderson</option>
                            }
                        ?>
                        </select>

                   </td>
                
                </tr>
                <tr>
                    <td>
                        <label for="date"> Date</label>
                    </td>
                    <td>
                        <input type="date" name="date" id="date" min="today" required>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="time"> Time</label>
                    </td>
                    <td>
                        <input type="time" name="time" id="time" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="reason">Reason for appointment</label>
                    </td>
                    <td>
                        <textarea name="reason" id="reason" cols="30" rows="5" required></textarea>
                    </td>

                </tr>
            </table>
            <input type="submit" name="book" value="BOOK AN APPOINTMENT" class="btn"
                style="color:white;background-color:blue;margin-left:550px; height: 30px; font-family: sans-serif; border: 0px;">
        </form>
    </div>
    <div class="booking">


    </div>
    <footer >
        <p style="font-style:italic;">*Appointment booking may vary depending on the visiting time of the doctors.
        </p>
        <h3>CONTACT</h3>
        <div class="contact">Phone number:(0820)-255555
           
        </div>

    </footer>
    <script>
         function redirect(){
             window.location="http://localhost/dbmsProject/patientmainpage.html";
         }
    </script>
</body>

</html>

