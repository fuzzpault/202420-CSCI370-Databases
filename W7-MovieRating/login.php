<?php
	session_start();
	include('db.php');

	if(isset($_REQUEST['logout'])){
		session_unset();
	}
?>




<?php

	// Trying to log in
	if(isset($_REQUEST['email'])){ 
		$sql = "SELECT * FROM user WHERE email = ? AND password = ?;";
		$statement = $pdo->prepare($sql);
		$statement->bindValue(1, $_REQUEST['email']);
		$statement->bindValue(2, hash('sha256',$_REQUEST['password']));
		try{
			$ret = $statement->execute();
		}catch(Exception $e){
			echo "Error: " , $e;
		}
		$row = $statement->fetch(PDO::FETCH_ASSOC);
		if($row){
			echo "Correct login.";
			$_SESSION['email'] = $_REQUEST['email'];
		}else{
			echo "WRONG login";
		}
	}
	// new user
	if(isset($_REQUEST['new_email'])){ 
		$sql = "INSERT INTO user (email, password) VALUES (?, ?)";
		$statement = $pdo->prepare($sql);
		$statement->bindValue(1, $_REQUEST['new_email']);
		$statement->bindValue(2, hash('sha256',$_REQUEST['password']));
		try{
			$ret = $statement->execute();
		}catch(Exception $e){
			echo "Error: " , $e;
		}
		$row = $statement->rowCount();
		if($row){
			echo "User Added";
			$_SESSION['email'] = $_REQUEST['new_email'];
		}else{
			echo "Something went wrong";
		}
	}
?>

<html>
<head>
	<title>Login</title>
</head>

<body>

<?php
	include("menu.php");
?>

<h1>It works! This is a change</h1>

<h2>Login here:</h2>
<form>
	<label>Email:</label><input type="text" name="email"><br>
	<label>Password:</label><input type="password" name="password"><br>
	<input type="submit" value="Log me in!">
</form>

<h2>Create new user</h2>
<form>
	<label>Email:</label><input type="text" name="new_email"><br>
	<label>Password:</label><input type="password" name="password"><br>
	<input type="submit" value="Create new user">
</form>



</body>
</html>