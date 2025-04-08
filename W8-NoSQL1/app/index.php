<html>
<head>
</head>
<body>
    <?php
    $mem = new Memcached();
    //$mem->addServer('host.docker.internal',11211);
    //$mem->addServer('172.17.0.3',11211);
    $mem->addServer('memcache',11211);
    // Add other servers here if needed

    ?>
    <h1>This works!</h1>

    <?php
    if($mem->getVersion() === FALSE){
        echo "Can not connect to Memcache server";
    }else{
        echo "Connection successful!";
    }
    ?>
</body>
</html>