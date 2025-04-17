<?php
    session_start();
?>

<html>
<head>
    <title>Login</title>
</head>

<body>
<?php
    if(isset($_REQUEST['logout'])){
        session_unset();
    }

    if(isset($_SESSION['name'])){
        echo "Hello " . $_SESSION['name'] . '. <a href="login.php?logout=1">Logout</a>';
    }else{
        echo 'Not logged in.  <a href="login.php">Login Here</a>';
    }
?>

<h1>Login</h1>
<?php
    include('db.php');
    $collection = $db->users;

    if(isset($_REQUEST['name'])){
        $doc = ['name' => $_REQUEST['name'], '_id' => $_REQUEST['email'], 'password' => $_REQUEST['pass']];
        $collection->insertOne($doc);
        echo "User added!";
    }else if(isset($_REQUEST['email'])){
        $doc = ['_id' => $_REQUEST['email'], 'password' => $_REQUEST['pass']];
        $result = $collection->find($doc);
        $result = $result->toarray();
        if(sizeof($result) != 0){
            // Valid login!
            echo "Hello " . $result[0]['name'] . " Logged in";
            $_SESSION['email'] = $result[0]['_id'];
            $_SESSION['name'] = $result[0]['name'];
        }else{
            echo "Invalid login.";
        }
        //print_r($result);
        //$result = $collection->countDocuments($doc);

        
    }

    echo "<h2>All users</h2>";
    //$records = $collection->find( ['age' => ['$gt' => '10'] ] );
    $records = $collection->find( );
    foreach($records as $user){
        echo '<p>' . $user['name'] . '</p>';
    }
    echo "Got here!";
?>

<h2>Login</h2>
<form>
    Email:<input type='text' name='email'><br>
    Password:<input type='password' name='pass'><br>
    <input type='submit'>
</form>

<hr>

<h2>Insert a new user</h2>
<form>
    Name:<input type='text' name='name'><br>
    Email:<input type='text' name='email'><br>
    Password:<input type='password' name='pass'><br>
    <input type='submit'>
</form>
</body>
</html>