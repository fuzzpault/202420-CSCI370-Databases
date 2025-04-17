<?php
    session_start();
?>

<html>
<head>
    <title>Ratings</title>

    <script>
        var xhr = new XMLHttpRequest();


    function thumbs(element, increment){
        // element is the HTML element that sent this function, so we can find which professor this was for
        xhr.open('POST','api.php');
        xhr.setRequestHeader('Content-Type', 'application/json');
        const data = {
            'professor': element.id,
            'increment': increment,
        };
        xhr.send(JSON.stringify(data));
        // The response will trigger the onreadystatechange function below when (and if) it completes.
    }

    xhr.onreadystatechange = function () {
        var DONE = 4; // readyState 4 means the request is done.
        var OK = 200; // status 200 is a successful return.
        if (xhr.readyState === DONE) {
            if (xhr.status === OK) {
                console.log(xhr.responseText); // For debugging, show what got sent back
                extract = JSON.parse(xhr.responseText); // This may fail if the response was not proper JSON
                console.log(extract['professor_id']);   // For debugging
                console.log(extract['thumbs']);

                // Search the current HTML document (DOM) for an element with this ID, which should be the
                // span for the line they clicked.
                var profs = document.getElementById(extract['professor_id'] + "-span");
                if(profs){  // If an element got returned, change its inner html to the new data.
                    profs.innerHTML = "Votes: " + extract['thumbs'];
                }else{
                    console.log("not found");
                }

            } else {
                console.log('Error: ' + xhr.status); // An error occurred during the request.
            }
        }
    };


    </script>
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

    if(isset($_REQUEST['professor'])){. // Handle a new rating
        $doc = ['_id' => $_REQUEST['professor'] . $_SESSION['email'],
            'professor_id' => $_REQUEST['professor'], 
            'rating' => intval($_REQUEST['rating']), 
            'comment' => $_REQUEST['comment'],
            'dept' => $_REQUEST['dept'],
            'user_id' => $_SESSION['email'],
            'thumbs' => ['a' => 0], // This is optional, but could be used to store who up/down rate the post,
                                    // to help restrict multiple clicks.
        ];
        $ratings->insertOne($doc);
        echo "Rating added!";
    }

    echo "<h2>All Ratings</h2>";
    //$records = $collection->find( ['age' => ['$gt' => '10'] ] );
    $records = $ratings->find([], ['sort' => ['rating' => -1]]);
    foreach($records as $r){
        echo '<p>' . $r['professor_id'] . ' ' . $r['rating'] . ' ' . $r['comment'];
        echo '<a onClick="thumbs(this,1)" id="' . $r['professor_id'] . '">&#128077;</a>';
        echo '<a onClick="thumbs(this,-1)" id="' . $r['professor_id'] . '">&#128078;</a>'; 
        $total = 0;
        $thumbs = array($r['thumbs'])[0];
        foreach($thumbs as $x => $y){ // This will need to be changed!
            $total = $total + $y;
        }
        echo ' <span id="' . $r['professor_id'] . '-span">Votes: ' . $total . "</span>";
        echo "</p>\n";
    }
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