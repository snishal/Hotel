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
                            <input type="text" name="firstname" placeholder="First Name" />
                            <span class="popuptext" id="1"></span>
                        </div>
                        <br/>
                        <div class="popup">
                            <input type="text" name="lastname" placeholder="Last Name" />
                            <span class="popuptext" id="2"></span>
                        </div>
                        <br/>
                        <div class="popup">
                            <input type="number" name="member" placeholder="Num Members" />
                            <span class="popuptext" id="2"></span>
                        </div>
                        <br/>
                        <div class="popup">
                            <input type="tel" name="phone" placeholder="Phone Number" />
                            <span class="popuptext" id="10"></span>
                        </div>
                        <br/>
                        <div class="popup">
                            <select name="meal">
                            <option value="breakfast">Breakfast</option>
                            <option value="lunch">Lunch</option>
                            <option value="dinner">Dinner</option>
                        </select>
                            <span class="popuptext" id="10"></span>
                        </div>
                        <br/>
                        <button type="submit" name="search">Submit</button>
                    </form>
                </div>
            </div>
        </article>
        <?php

        function test_input($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        if(isset($_POST['search'])){
            $fname = $lname = $phone = $member = $meal = "";
            $fname_err = $lname_err = $phone_err = $member_err = "";
                    
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
                        if(empty($_POST['member'])){
                            $member_err = "Required";
                        }else{
                            $member = test_input($_POST['member']);
                            if(!preg_match("/^[1-6]+$/",$member)){
                                $member_err = "only numbers allowed";
                                $member = "";
                            }
                        }
                        if($member_err != null){
                            echo "<script>var popup = document.getElementById('4');
                            popup.innerHTML = '$adult_err';
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
                        $meal = test_input($_POST['meal']);
                        $conn = mysqli_connect("localhost", "root", "snishal", "hotelcs");
                        $query = "Insert into dining(fname,lname,members,contact,meal) values('$fname','$lname',$member,'$phone','$meal')";
                        $result = mysqli_query($conn, $query) or die("not execute".mysql_error());
                        

            }

        require 'footer.html';
    ?>
</body>

</html>