<?php
    session_start();

    //phpinfo();

    $request = json_decode(file_get_contents('php://input'), true);
    //print_r($request);

    include('db.php');
    $ratings = $db->ratings;

    if(isset($request['professor']) && $_SERVER['REQUEST_METHOD'] === 'POST'){
        // Update the thumbs for professor
        //$doc = ['name' => $_REQUEST['name'], '_id' => $_REQUEST['email'], 'password' => $_REQUEST['pass']];
        //$collection->insertOne($doc);

        $doc = ['professor_id' => $request['professor']];

        //$up = ['$set' => ['rating' => 10]];
        $up = ['$inc' => ['rating' => $request['increment']]];

        $ratings->updateOne($doc , $up );
        //echo "User added!";

        // Find the current rating for the professor
        $record = $ratings->find($doc);
        $record = $record->toArray();
        if(count($record) >= 1){
            $thumbs = $record[0]['rating'];
            $response = ['rating' => $thumbs, 'professor' => $request['professor']];
            echo json_encode($response);
        }else{
            echo "Bad query";
        }
    }else{
        echo "no professor";
    }

?>