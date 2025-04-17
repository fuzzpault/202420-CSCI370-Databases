<?php
    include('db.php');
    $collection = $db->users;

    $docs = [['name' => 'Bob Jones', '_id' => 'bjones@uindy.edu', 'password' => 'pass', 'admin' => 0],
        ['name' => 'Mary Smith', '_id' => 'msmith@uindy.edu', 'password' => 'pass', 'admin' => 0],
        ['name' => 'Phil Collins', '_id' => 'pcollins@uindy.edu', 'password' => 'pass' , 'admin' => 0],
        ['name' => 'Paul', '_id' => 'ptalaga@uindy.edu', 'password' => 'pass', 'admin' => 1],
    ];
    $collection->insertMany($docs);

    $ratings = $db->ratings;
    $docs = [['user' => 'pcollins@uindy.edu', 'message' => 'Great classes', 'rating' => 4.5, 'professor' => "Talaga", 'department' => 'csci'],
        ['user' => 'bjones@uindy.edu', 'message' => 'Good work', 'rating' => 4.8, 'professor' => "Martinez", 'department' => 'isen'],
    ];

    $ratings->insertMany($docs);
    $ratings->createIndex(['user' => 'text']);

?>

<h1>Data inserted</h1>