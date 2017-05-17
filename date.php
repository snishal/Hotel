<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="styles/book.css">
	<title>Home</title>
</head>

<body>
    <?php
    require 'header.html';
    ?>
	<fieldset>
		<legend>BOOK NOW</legend>
		<form>
			<table cellspacing = "20">
				<tr class = "row">
					<td><label for = "name">Name : </label></td>
					<td><input type = "text" id = "name" name = "name"/></td>
				</tr>
				<tr class = "row">
					<td><label for = "class">Class : </label></td>
					<td><input type = "text" id = "class" name = "class"/></td>
				</tr>
			</table>
		</form>
	</fieldset>
    <?php
        require 'footer.html';
    ?>
</body>

</html>