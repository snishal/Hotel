<?php 
    session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="styles/book.css">
	<title>Rooms</title>
</head>

<body>
    <?php
    require 'header.html';
    ?>
    <script type="text/javascript" src="script/applybackground.js"></script>
    <center><button type = "button" class="button" style = "background:black;margin-top:50px;border-radius:8px;"><a href = 'cancel.php'>Cancel Booking</a></button></center>
    <article>
        <div id="myModal" class="modal">
            <div class="modal-content">
                <div class="modal-header" id="modalheader">
                    <span class="close"><a href = "book.php" style="text-decoration:none; color:white;">&times;</a></span>
                    <h2>Message</h2>
                </div>
                <div class="modal-body" id="modalbody">
                    <p>Invalid Date Selection</p>
                </div>
                <div class="modal-footer" id="modalfooter">
                    <h3>Alert</h3>
            </div>
        </div>
        </div>
        <h2>OUR ROOMS</h2>
        <hr>
        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']);  ?>" method = "post">
            <label>Check-In : </label> 
            <input type = "date" name = "check-in" required/>
            <label>Check-Out : </label>
            <input type = "date" name = "check-out" required/>
            <button type = "submit" name = "search" class="button">Search</button>
        </form>
        <hr>
        <form action = "detail.php" method = "post">
            <div class="alert" id="alertbut">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                <font>Available Rooms</font>
            </div>
            <div class="columns">
                <ul class="price" id="1">
                    <li class=" header" id="room1"></li>
                    <li class="grey">Rs. 1000 / day</li>
                    <li>Standard Single Room</li>
                    <li>Single Bed</li>
                    <li></li>
                    <li></li>
                    <li class="grey"><input type="submit" name="1" value="Book Now" class="button" /></li>
                </ul>
            </div>
            <div class="columns" id="2">
                <ul class="price">
                    <li class="header" id="room2"></li>
                    <li class="grey">Rs. 2000 / day</li>
                    <li>Standard Double Room</li>
                    <li>Double Bed</li>
                    <li></li>
                    <li></li>
                    <li class="grey"><input type="submit" name="2" value="Book Now" class="button"/></li>
                </ul>
            </div>
            <div class="columns" id="3">
                <ul class="price">
                    <li class="header" id="room3"></li>
                    <li class="grey">Rs. 3000 / day</li>
                    <li>Deluxe Single Room</li>
                    <li>Single Bed</li>
                    <li></li>
                    <li></li>
                    <li class="grey"><input type="submit" name="3" value="Book Now" class="button"/></li>
                </ul>
            </div>
            <br>
            <div class="columns" id="4">
                <ul class="price">
                    <li class="header" id="room4"></li>
                    <li class="grey">Rs. 4000 / day</li>
                    <li>Deluxe Double Room</li>
                    <li>Single Bed</li>
                    <li></li>
                    <li></li>
                    <li class="grey"><input type="submit" name="4" value="Book Now" class="button"/></li>
                </ul>
            </div>
            <div class="columns" id="5">
                <ul class="price">
                    <li class="header" id="room5"></li>
                    <li class="grey">Rs. 5000 / day</li>
                    <li>Super Deluxe Single Room</li>
                    <li>Single Bed</li>
                    <li></li>
                    <li></li>
                    <li class="grey"><input type="submit" name="5" value="Book Now" class="button"/></li>
                </ul>
            </div>
            <div class="columns" id="6">
                <ul class="price">
                    <li class="header" id="room6"></li>
                    <li class="grey">Rs. 6000 / day</li>
                    <li>Super Deluxe Double Room</li>
                    <li>Double Bed</li>
                    <li></li>
                    <li></li>
                    <li class="grey"><input type="submit" name="6" value="Book Now" class="button"/></li>
                </ul>
            </div>
        </form>
    </article>
    <?php

        require 'booking.php';
        require 'footer.html';
    ?>
</body>

</html>