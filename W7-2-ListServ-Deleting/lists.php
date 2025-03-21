<html>
<head>
	<title>It works!</title>
</head>

<body>

<?php
	// Handle form input
	include 'db.php';
	if(isset($_REQUEST['new_list'])){
		// Add a new type of list 
		$sql = "INSERT INTO List_name (Name) VALUES (?);";
		$statement = $pdo->prepare($sql);
		$statement->bindValue(1, $_REQUEST['new_list']);
		try{
			$ret = $statement->execute();
		}catch(Exception $e){
			echo "Error: ", $e->getMessage();
		}
	}
	if(isset($_REQUEST['new_email'])){
		// Add a new email
		$sql = "INSERT INTO MyUser (Email) VALUES (?);";
		$statement = $pdo->prepare($sql);
		$statement->bindValue(1, $_REQUEST['new_email']);
		try{
			$ret = $statement->execute();
		}catch(Exception $e){
			echo "Error: ", $e->getMessage();
		}

	}
	if(isset($_REQUEST['email']) and isset($_REQUEST['lists'])){
		// Add a new membership
		$sql = "INSERT INTO List_User (Email_id, List_id) VALUES (?,?);";
		$statement = $pdo->prepare($sql);
		$statement->bindValue(1, $_REQUEST['email']);
		$statement->bindValue(2, $_REQUEST['lists']);
		try{
			$ret = $statement->execute();
		}catch(Exception $e){
			echo "Error: ", $e->getMessage();
		}
	}
	// Delete an email
	if(isset($_REQUEST['delete_email'])){
		// Delete an email
		$sql = "DELETE FROM MyUser WHERE Email = ?;";
		$statement = $pdo->prepare($sql);
		$statement->bindValue(1, $_REQUEST['delete_email']);
		try{
			$ret = $statement->execute();
		}catch(Exception $e){
			echo "Error: ", $e->getMessage();
		}
	}
?>

<h1>Here are the available lists</h1>
<?php
	
	$sql = 'SELECT * FROM List_name;';

	$statement = $pdo->prepare($sql);

	try{
		$ret = $statement->execute();
	}catch(Exception $e){
		echo "Error: ", $e->getMessage();
	}

	echo "<table>\n";
	while($row = $statement->fetch(PDO::FETCH_ASSOC)){
		echo "<tr><td>";
		echo $row['Name'];
		echo "</td></tr>\n";
	}
	echo "</table>\n";
?>
<hr>
<h1>Here are the emails</h1>
<?php
	
	$sql = 'SELECT * FROM MyUser;';
	$statement = $pdo->prepare($sql);
	try{
		$ret = $statement->execute();
	}catch(Exception $e){
		echo "Error: ", $e->getMessage();
	}

	echo "<table>\n";
	while($row = $statement->fetch(PDO::FETCH_ASSOC)){
		echo "<tr><td>";
		echo $row['Email'];
		echo '</td><td>';
		echo '<a href="lists.php?delete_email=', $row['Email'], '">Delete</a>';
		echo "</td></tr>\n";
	}
	echo "</table>\n";
?>
<hr>
<h1>Here are the memberships</h1>
<?php
	
	$sql = 'SELECT * FROM List_User INNER JOIN MyUser ON MyUser.Email = List_User.Email_id INNER JOIN  List_name ON  List_name.ID = List_User.List_id;';
	$statement = $pdo->prepare($sql);
	try{
		$ret = $statement->execute();
	}catch(Exception $e){
		echo "Error: ", $e->getMessage();
	}

	echo "<table>\n";
	while($row = $statement->fetch(PDO::FETCH_ASSOC)){
		echo "<tr><td>";
		echo $row['Email'], $row['Name'];
		echo "</td></tr>\n";
	}
	echo "</table>\n";
?>
<hr>
<h1>Add new list</h1>
<form>
New List name: <input type="text" name="new_list">
<input type="submit" value="Add this list" >
</form>

<hr>
<h1>Add new email</h1>
<form>
Email address: <input type="text" name="new_email">
<input type="submit" value="Add this email" >
</form>

<hr>
<h1>Add new membership</h1>
<form>
<select name="email">
	<?php
	
		$sql = 'SELECT * FROM MyUser;';
		$statement = $pdo->prepare($sql);
		try{
			$ret = $statement->execute();
		}catch(Exception $e){
			echo "Error: ", $e->getMessage();
		}
		while($row = $statement->fetch(PDO::FETCH_ASSOC)){
			$key = $row['Email'];
			echo "<option value=\"$key\">$key</option>\n";
		}
	?>
</select>

<select name="lists">
<?php
	$sql = 'SELECT * FROM List_name;';
	$statement = $pdo->prepare($sql);
	try{
		$ret = $statement->execute();
	}catch(Exception $e){
		echo "Error: ", $e->getMessage();
	}
	while($row = $statement->fetch(PDO::FETCH_ASSOC)){
		$name = $row['Name'];
		$key = $row['ID'];
		echo "<option value=\"$key\">$name</option>\n";
	}
?>
</select>

<input type="submit" value="Add Membership" >
</form>

</body>
</html>