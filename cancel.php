<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="styles/cancel.css">
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
                <p>No such Reservation</p>
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
                        <input type = "date" name="arrival" placeholder="Arrival Date"/>
                        <span class="popuptext" id="1"></span>
                    </div>
                    <br/>
                    <div class="popup">
                        <input type = "date" name="depart" placeholder="Depart Date"/>
                        <span class="popuptext" id="2"></span>
                    </div>
                    <br/>
                    <div class="popup">
                        <input type = "roomno" name="roomno" placeholder="Room No"/>
                        <span class="popuptext" id="3"></span>
                    </div>
                    <br />
                    <button type = "submit" name = "cancel">Submit</button>
                </form>
            </div>
        </article>
        <?php
            include 'udao.php';
            include 'footer.html';
        ?>
</body>
</html>