<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="styles/reset.css">
	<link rel="stylesheet" href="styles/dining.css">
	<title>Dining</title>
</head>

<body>
	<?php
    require 'header.html';
    ?>
    <script type="text/javascript" src="script/applybackground.js"></script>
	<ul class="dining">
		<li><a href="dining.php"><b>Dining:</b></a></li>
		<li><a href="dining_room.php"><b>The Dining Room</b></a></li>
		<li><a href="private_dining.php"><b>Private Dining</b></a></li>
		<li><a href="in_room_dining.php"><b>In Room Dining</b></a></li>
	</ul>
	<br>
	<h2 class="logo"><img src="images/florida_logo.png"></h2>
	<h3 class="enjoy"><img src="images/experience.png"></h3>
	<br>
	<h4 class="para"><img src="images/para_dining.png"/></h4>
	
	<ul class="photo">
	<li>
	<a href="dining_room.php"><img src="images/d1.png"/></a>
	</li>
	<li>
	<a href="private_dining.php"><img src="images/d2.png"/></a>
	</li>
	<li>
	<a href="in_room_dining.php"><img src="images/d3.png"/></a>
	</li>
	</ul>
	<?php
	  require 'footer.html';
    ?>
</body>
</html>