<?

    $host = getenv('DB_HOST') ?: 'localhost';
    $user = getenv('DB_USER') ?: 'root';
    $pass = getenv('DB_PASS') ?: '';
    $name = getenv('DB_NAME') ?: 'doubleclick';
    $port = getenv('DB_PORT') ?: 3306;

    if($host != 'localhost'){
        $db = mysqli_init();
        mysqli_ssl_set($db, NULL, NULL, NULL, NULL, NULL);
        mysqli_real_connect($db, $host, $user, $pass, $name, $port, NULL, MYSQLI_CLIENT_SSL);
    }else{
        $db = mysqli_connect($host, $user, $pass, $name, $port);
    }

?>