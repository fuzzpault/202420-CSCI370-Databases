<!DOCTYPE html>
<html>
  <head>
    <title>Reservations</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

    <?php 
      // Memcached manual: https://www.php.net/manual/en/book.memcached.php

      $mem  = new Memcached();
      // List memcache servers
      $mem->addServer('memcache',11211);

      if($mem->getVersion() === FALSE){
        echo "<h2>Memcache server connection error</h2>";
      }

      if(isset($_GET['key'])){
        $mem->set($_GET['key'], $_GET['value'], (int)$_GET['time']);
      }

    if( $mem->add("mystr","this is a memcache test!",10)){
        echo  'Added!<br>';
    }else{
        echo 'Already there：'.$mem->get("mystr"), "<br>";
    }
     //echo "version: <br>",var_dump($mem->getVersion());
     //echo "stats: <br>", var_dump($mem->getStats());

    $mem->add("counter",0);
    //$curvalue = $mem->get("counter");
    //if($curvalue !== FALSE){
    //  $mem->set("counter", $curvalue + 1);
    //};
    $mem->increment("counter");

    echo "Counter: ". $mem->get("counter"). "<br>";
    //$mem->flush();
    ?>

    

    <form method="get">
      <label>Key:</label>
      <input type="text" name="key" /><br>
      <label>Value:</label>
      <input type="text" name="value" /><br>
      <label>Timeout:</label>
      <input type="text" name="time" /><br>
      <input type="submit" value="Submit" />
    </form>
  </body>
</html>