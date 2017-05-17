<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="styles/home.css">
	<title>Home</title>
</head>

<body>
    <?php
    	require 'home_header.html';
    ?>

	<div class="parallax" id="parallax1">
		<div class="overlay">
    		<div class="text">DINING</div>
			<a href="dining.php"><button class="viewbutton" style="vertical-align:middle">View</button></a>
  		</div>
	</div>
	<div class="parallax" id="parallax2">
		<div class="overlay">
    		<div class="text">ROOMS</div>
			<a href="book.php"><button class="viewbutton" style="vertical-align:middle">View</button></a>
  		</div>
	</div>
	<div class="parallax" id="parallax3">
		<div class="overlay">
    		<div class="text">ABOUT US</div>
			<a href="about.php"><button class="viewbutton" style="vertical-align:middle">View</button></a>
  		</div>
	</div>
	<div class="parallax" id="parallax4">
		<div class="overlay">
    		<div class="text">GALLERY</div>
			<a href="gallery.php"><button class="viewbutton" style="vertical-align:middle" >View</button></a>
  		</div>
	</div>
	<div class="parallax" id="parallax5">
		<div class="overlay">
    		<div class="text">CONTACT US</div>
			<a href="contact.php"><button class="viewbutton" style="vertical-align:middle">View</button></a>
  		</div>
	</div>

    <?php
        require 'footer.html';
    ?>
</body>

</html>