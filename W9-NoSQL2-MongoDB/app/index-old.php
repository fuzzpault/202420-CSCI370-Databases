<html>
<head>
	<title>MongoTest</title>
</head>

<body>

<?php
	require '/var/www/vendor/autoload.php';
#require 'vendor/autoload.php';

	$name = $_POST['name'];
	$age = $_POST['age'];
	
	//test the post data
	echo "<p>Name: $name and Age: $age</p>";
	
	$connection = new MongoDB\Client("mongodb://root:mongopwd@mongo:27017");
	
	$db = $connection->gettingstarted;
	echo "db 'gettingstarted' selected<br><br>";
	$col = $db->users;  // This is like a table
	echo "Collection $col selected<br><br>";
	
	$doc = ["name" => $name,"age" => $age];
	
	$col->insertOne($doc);
	echo "<p>User inserted successfully: ";
	
	
	$record = $col->find(  );  
    foreach ($record as $user) {  
        echo $user['name'], ': ', $user['age']."</p>";  
    }
?>

<form method='post' >
Name: <input type='text' name='name'><br>
Age: <input type='number' name='age'><br>
<input type='submit' name='Enter' value='Submit'>
</form>

</body>

</html>