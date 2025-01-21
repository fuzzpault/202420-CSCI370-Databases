<html>
<head>
	<title>It works!</title>
</head>

<body>

<h1>It works!</h1>
<?php
	$width = 50;
	$height = 300;
	
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
<table>
	<tr> <td>stuff</td> <td>more stuff</td>.   </tr>
	<tr> <td>stuff</td> <td>more stuff</td>.   </tr>
</table>

</body>
</html>