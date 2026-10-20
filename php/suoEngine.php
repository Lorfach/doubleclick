<?

    session_start();

    if($_SESSION['logged'] and preg_match('/\/suo.php/', $_SERVER['HTTP_REFERER'])){
        if(!isset($_SESSION['first_request'])){

            $_SESSION['first_request'] = true;
            $response = md5('1ВладЛегендаПередаетОчкиЧерезJS');
    
        }else{
            $response = "nothing";
        }
    
        echo $response;
    }

?>