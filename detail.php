<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="styles/detail.css">
	<title>Book</title>
</head>

<body>
    <?php
    require 'header.html';
    ?>
    <script type="text/javascript" src="script/applybackground.js"></script>

    <div id="myModal" class="modal">
    <div class="modal-content">
            <div class="modal-header" id="modalheader">
                <span class="close"><a href = "book.php" style="text-decoration:none; color:white;">&times;</a></span>
                <h2>Message</h2>
            </div>
            <div class="modal-body" id="modalbody">
                <p>Please enter check-in and check-out dates.</p>
                <p>Go Back On Previous Page</p>
            </div>
            <div class="modal-footer" id="modalfooter">
                <h3>Alert</h3>
            </div>
        </div>
    </div>
    <article>
        <h2>Guest Information</h2>
        <hr>
        <div id="main">
            <div id="form">
                <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']);  ?>" method="post">
                    <div class="popup">
                        <input type = "text" name="firstname" placeholder="First Name"/>
                        <span class="popuptext" id="1"></span>
                    </div>
                    <br/>
                    <div class="popup">
                        <input type = "text" name="lastname" placeholder="Last Name"/>
                        <span class="popuptext" id="2"></span>
                    </div>
                    <br/>
                    <div class="popup">
                        <input type = "email" name="email" placeholder="Email Address"/>
                        <span class="popuptext" id="3"></span>
                    </div>
                    <br/>
                    <div class="popup">
                        <input type = "number" name="adults" placeholder="Adults"/>
                        <span class="popuptext" id="4"></span>
                    </div>
                    <br/>
                    <div class="popup">
                        <input type = "number" name="child" placeholder="Children"/>
                        <span class="popuptext" id="5"></span>
                    </div>
                    <br/>
                    <div class="popup">
                        <span class="popuptext" id="6"></span>
                        <textarea name= "address" rows="3" cols="20" placeholder="address"></textarea>
                    </div>
                    <br/>
                    <div class="popup">
                        <input type = "text" name="city" placeholder="City"/>
                        <span class="popuptext" id="7"></span>
                    </div>
                    <br/>
                    <div class="popup">
                        <input type = "text" name="state" placeholder="State"/>
                        <span class="popuptext" id="8"></span>
                    </div>
                    <br/>
                    <div class="popup">
                        <input type = "text" name="pincode" placeholder="Postal Code"/>
                        <span class="popuptext" id="9"></span>
                    </div>
                    <br/>
                    <div class="popup">
                        <input type = "tel" name="phone" placeholder="Phone Number"/>
                        <span class="popuptext" id="10"></span>
                    </div>
                    <br/>
                    <button type = "submit" name = "search">Submit</button>
                </form>
            </div>
            <div id="bill">
                <?php
                    function test_input($data){
                        $data = trim($data);
                        $data = stripslashes($data);
                        $data = htmlspecialchars($data);
                        return $data;
                    }

                    $fname = $lname = $email = $adult = $child = $address = $city = $state = $pincode = $phone = "";
                    $fname_err = $lname_err = $email_err = $adult_err = $child_err = $address_err = $city_err = $state_err = $pincode_err = $phone_err = "";
                    $num_days = $_SESSION['num-days'];
                    $check_in_date = $_SESSION['check-in'];
                    $check_out_date = $_SESSION['check-out'];
                    global $roomtype; 
                    if(!isset($_SESSION['num-days'])){
                        echo "<script>
                                var modal = document.getElementById('myModal');
                                modal.style.display = 'block';
                              </script>";
                    }
                    if(isset($_POST['1'])){
                        $_SESSION['roomtype'] = 'Standard Single Room';
                    }
                    else if(isset($_POST['2'])){
                        $_SESSION['roomtype'] = 'Standard Double Room';
                    }
                    else if(isset($_POST['3'])){
                        $_SESSION['roomtype'] = 'Deluxe Single Room';
                    }
                    else if(isset($_POST['4'])){
                        $_SESSION['roomtype'] = 'Deluxe Double Room';
                    }
                    else if(isset($_POST['5'])){
                        $_SESSION['roomtype'] = 'Super Deluxe Single Room';
                    }
                    else if(isset($_POST['6'])){
                        $_SESSION['roomtype'] = 'Super Deluxe Double Room';
                    }

                    $roomtype = $_SESSION['roomtype'];

                    if(isset($_POST['search'])){
                        if(empty($_POST['firstname'])){
                            $fname_err = "First Name Required";
                        }else{
                            $fname = test_input($_POST['firstname']);
                            if(!preg_match("/^[[:alpha:]]+$/",$fname)){
                                $fname_err = "only letters allowed";
                                $fname = "";
                            }
                        }
                        if($fname_err != null){
                            echo "<script>var popup = document.getElementById('1');
                            popup.innerHTML = '$fname_err';
                            popup.classList.toggle('show')</script>";
                        }
                        if(empty($_POST['lastname'])){
                            $lname_err = "Last Name Required";
                        }else{
                            $lname = test_input($_POST['lastname']);
                            if(!preg_match("/^[[:alpha:]]+$/",$lname)){
                                $lname_err = "only letters allowed";
                                $lname = "";
                            }
                        }
                        if($lname_err != null){
                            echo "<script>var popup = document.getElementById('2');
                            popup.innerHTML = '$lname_err';
                            popup.classList.toggle('show')</script>";
                        }
                        if(empty($_POST['email'])){
                            $email_err = "Email Address Required";
                        }else{
                            $email = test_input($_POST['email']);
                            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                $email_err = "Invalid email format"; 
                                $email = "";
                            }
                        }
                        if($email_err != null){
                            echo "<script>var popup = document.getElementById('3');
                            popup.innerHTML = '$email_err';
                            popup.classList.toggle('show')</script>";
                        }
                        if(empty($_POST['adults'])){
                            $adult_err = "Required";
                        }else{
                            $adult = test_input($_POST['adults']);
                            if(!preg_match("/^[1-4]+$/",$adult)){
                                $adult_err = "only numbers allowed";
                                $adult = "";
                            }
                        }
                        if($adult_err != null){
                            echo "<script>var popup = document.getElementById('4');
                            popup.innerHTML = '$adult_err';
                            popup.classList.toggle('show')</script>";
                        }
                        $child = test_input($_POST['child']);
                        if(!preg_match("/^[0-3]+$/",$child)){
                            $child_err = "only numbers allowed";
                            $child = "";
                        }
                        if($child_err != null){
                            echo "<script>var popup = document.getElementById('5');
                            popup.innerHTML = '$child_err';
                            popup.classList.toggle('show')</script>";
                        }
                        if(empty($_POST['address'])){
                            $address_err = "Address Required";
                        }else{
                            $address = test_input($_POST['address']);
                            if(!preg_match("/^[0-9A-Za-z. \-,]+$/",$address)){
                                $address_err = "Letters Number '-' '.' ',' and whitespaces are allowed";
                                $address = "";
                            }
                        }
                        if($address_err != null){
                            echo "<script>var popup = document.getElementById('6');
                            popup.innerHTML = '$address_err';
                            popup.classList.toggle('show')</script>";
                        }
                        if(empty($_POST['city'])){
                            $city_err = "City Required";
                        }else{
                            $city = test_input($_POST['city']);
                            if(!preg_match("/^[[:alpha:] ]*$/",$city)){
                                $city_err = "only letters and whitespaces allowed";
                                $city = "";
                            }
                        }
                        if($city_err != null){
                            echo "<script>var popup = document.getElementById('7');
                            popup.innerHTML = '$city_err';
                            popup.classList.toggle('show')</script>";
                        }
                        if(empty($_POST['state'])){
                            $state_err = "State Required";
                        }else{
                            $state = test_input($_POST['state']);
                            if(!preg_match("/^[[:alpha:] ]*$/",$state)){
                                $state_err = "only letters and whitespaces allowed";
                                $state = "";
                            }
                        }
                        if($state_err != null){
                            echo "<script>var popup = document.getElementById('8');
                            popup.innerHTML = '$state_err';
                            popup.classList.toggle('show')</script>";
                        }
                        if(empty($_POST['pincode'])){
                            $pincode_err = "Pincode Required";
                        }else{
                            $pincode = test_input($_POST['pincode']);
                            if(!preg_match("/^[0-9]{6,6}$/",$pincode)){
                                $pincode_err = "only numbers allowed";
                                $pincode = "";
                            }
                        }
                        if($pincode_err != null){
                            echo "<script>var popup = document.getElementById('9');
                            popup.innerHTML = '$pincode_err';
                            popup.classList.toggle('show')</script>";
                        }
                        if(empty($_POST['phone'])){
                            $phone_err = "Phone Number Required";
                        }else{
                            $phone = test_input($_POST['phone']);
                            if(!preg_match("/^[0-9]{10,10}$/",$phone)){
                                $phone_err = "only numbers allowed";
                                $phone = "";
                            }
                        }
                        if($phone_err != null){
                            echo "<script>var popup = document.getElementById('10');
                            popup.innerHTML = '$phone_err';
                            popup.classList.toggle('show')</script>";
                        }
                        if($fname_err.$lname_err.$email_err.$adult_err.$child_err.$address_err.$city_err.$state_err.$pincode_err.$phone_err == ""){
                            $err = "";
                            $roomtype = $_SESSION['roomtype'];
                            $num_days = $_SESSION['num-days'];
                            $check_in_date = $_SESSION['check-in'];
                            $check_out_date = $_SESSION['check-out'];
                            if(strstr($roomtype,'Single')){
                                if($adult + $child > 2){
                                    $err = "Maximum 2 members allowed";
                                }
                            }else{
                                if($adult + $child > 4){
                                    $err = "Maximum 4 members allowed";
                                }
                            }
                            if($err != null){
                                echo "<script>var popup = document.getElementById('4');
                                popup.innerHTML = '$err';
                                popup.classList.toggle('show')</script>";
                            }else{
                                $rate;
                                $conn = mysqli_connect("localhost", "root", "snishal", "hotelcs");
                                $query = "Select rate from ratelist where room_type = '$roomtype'";
                                $result = mysqli_query($conn, $query);
                                if(mysqli_num_rows($result) > 0){
                                    $row = mysqli_fetch_assoc($result);
                                    $rate = $row['rate'];
                                }
                                mysqli_close($conn);

                                $_SESSION['fname'] = $fname;
                                $_SESSION['lname'] = $lname;
                                $_SESSION['email'] = $email;
                                $_SESSION['adult'] = $adult;
                                $_SESSION['child'] = $child;
                                $_SESSION['address'] = $address;
                                $_SESSION['city'] = $city;
                                $_SESSION['state'] = $state;
                                $_SESSION['pincode'] = $pincode;
                                $_SESSION['phone'] = $phone;
                                
                                echo "<div style='margin-top:30px;padding: 20px;font-size: 15px;font-family: Verdana, Geneva, Tahoma, sans-serif;line-height:30px;letter-spacing:2px;'>
                                            RoomType : $roomtype <br/>
                                            Number of Days : $num_days <br/> 
                                            Name : $fname \t $lname <br/>
                                            Email : $email <br/>
                                            Adults : $adult <br/>
                                            Child : $child <br/>
                                            Address : $address <br/>
                                            City : $city <br/>
                                            State : $state <br/>
                                            Pincode : $pincode <br/>
                                            Contact Number : $phone <br/>
                                            Total Cost : ".$rate*$num_days."
                                            <form method='post'>
                                                <button type='submit' name='confirm'>Confirm Booking</button>
                                            </form>
                                        </div>";
                            }
                        }
                    }
                    if(isset($_POST['confirm'])){
                        $fname = $_SESSION['fname'];
                        $lname = $_SESSION['lname'] ;
                        $email = $_SESSION['email'];
                        $adult = $_SESSION['adult'];
                        $child = $_SESSION['child'];
                        $address = $_SESSION['address'];
                        $city = $_SESSION['city'];
                        $state = $_SESSION['state'];
                        $pincode = $_SESSION['pincode'];
                        $phone = $_SESSION['phone'];
                        
                        $conn = mysqli_connect("localhost", "root", "snishal", "hotelcs");
                        $query = "Select r.roomno from rooms r where r.roomno not in (SELECT roomno from room_date where ('$check_in_date' <= check_in and '$check_out_date' <= check_out and '$check_out_date' >= check_in) or ('$check_in_date' >= check_in  and  '$check_out_date' <= check_out) or ('$check_in_date' >= check_in and '$check_out_date' >= check_out and '$check_in_date' <= check_out)) and r.roomtype = '$roomtype';";
                        $result = mysqli_query($conn, $query);
                        if(mysqli_num_rows($result) > 0){
                            $row = mysqli_fetch_assoc($result);
                            $roomnum = $row['roomno'];
                        }
                        $roomnum = (int)$roomnum;
                        $child = (int)$child;
                        $adult = (int)$adult;
                        $num_days = (int)$num_days;

                        echo $check_in_date." ".$check_out_date;
                        $query = "Insert into reservation(fname,lname,email,adult,child,address,city,state,pincode,contact,num_days,roomtype,roomno,arrival,depart) values('$fname','$lname','$email',$adult,$child,'$address','$city','$state','$pincode','$phone',$num_days,'$roomtype',$roomnum,'$check_in_date','$check_out_date'); ";
                        $result = mysqli_query($conn, $query) or die("notexecuted".mysql_error());

                        $query = "Insert into room_date values('$roomnum','$check_in_date','$check_out_date');";
                        $result = mysqli_query($conn, $query);
                        mysqli_close($conn);

                        echo "<script>
                                var modal = document.getElementById('myModal');
                                var header = document.getElementById('modalheader');
                                var body = document.getElementById('modalbody');
                                var footer = document.getElementById('modalfooter');
                                footer.innerHTML = '<h3>Congrats</h3>';
                                header.style.backgroundColor = 'green';
                                footer.style.backgroundColor = 'green';
                                body.innerHTML = 'Congratulation your room has been booked <br/> Room No : $roomnum';
                                modal.style.display = 'block';
                              </script>";
                        
                        session_unset();
                        session_destroy();

                    }
                ?>
            </div>
        <div>
    </article>
    <?php
        require 'footer.html';
    ?>
</body>
</html>