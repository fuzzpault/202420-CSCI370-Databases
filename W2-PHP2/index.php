<html>
<head>
	<title>It works!</title>
</head>

<body>

<?php
	include("menu.html");
?>

<h1>It works! This is a change</h1>



<?php
	$width = 5;
	$height = 30;
	
	echo "<table border=\"1\">\n";
	for($h = 0; $h < $height; $h++){
		echo "<tr> ";
		for($w = 0; $w < $width; $w++){
			echo "<td> ", $w + $h, "</td> ";
		}
		echo " </tr>\n";
	}
	echo "</table>\n";
?>


</body>
</html>