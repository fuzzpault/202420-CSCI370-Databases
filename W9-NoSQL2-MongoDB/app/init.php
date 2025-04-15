
<?php
    include('db.php');
    $db->drop();

    $collection = $db->users;

    $docs = [['name' => "Alice", 'password' => 'pass', '_id' => 'alice@uindy.edu'],
    ['name' => "Bob", 'password' => 'pass', '_id' => 'bob@uindy.edu'],
    ['name' => "Bob2", 'password' => 'pass', '_id' => 'bob2@uindy.edu']
    ];
    $collection->insertMany($docs);

    $ratings = $db->ratings;

    $docs = [ ['professor_id' => "talaga", 'user_id' => 'bob2@uindy.edu', 'rating' => -2, 'comment' => 'Negative integers are very high', 'dept' => 'csci'],
        ['professor_id' => "lancett", 'user_id' => 'alice@uindy.edu', 'rating' => -2, 'comment' => 'Smells funny', 'dept' => 'math'],
    ];
    $ratings->insertMany($docs);
?>
<h1>Success!</h1>
