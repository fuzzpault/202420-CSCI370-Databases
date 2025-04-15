<?php
    session_start();
?>

<html>
<head>
    <title>Ratings</title>
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

<h1>Ratings</h1>
<?php
    include('db.php');
    $ratings = $db->ratings;

    if(isset($_REQUEST['professor'])){
        $doc = ['professor_id' => $_REQUEST['professor'], 
            'rating' => $_REQUEST['rating'], 
            'comment' => $_REQUEST['comment'],
            'dept' => $_REQUEST['dept'],
            'user_id' => $_SESSION['email']];
        $ratings->insertOne($doc);
        echo "User added!";
    }

    echo "<h2>All Ratings</h2>";
    //$records = $collection->find( ['age' => ['$gt' => '10'] ] );
    $records = $ratings->find([], ['sort' => ['rating' => -1]]);
    foreach($records as $r){
        echo '<p>' . $r['professor_id'] . ' ' . $r['rating'] . ' ' . $r['comment'] . '</p>';
    }
    echo "Got here!";
?>



<hr>

<h2>Insert a new Comment</h2>
<form>
    Professor:<input type='text' name='professor'><br>
    Rating:<input type='text' name='rating'><br>
    Department:<input type='text' name='dept'><br>
    Comment:<input type='text' name='comment'><br>
    <input type='submit'>
</form>
</body>
</html>