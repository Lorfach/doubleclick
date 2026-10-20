<?

    session_start();

    if(!empty($_SESSION['logged'])){
        if(!isset($_SESSION['first_request'])){

            $_SESSION['first_request'] = true;
            $response = md5('1ВладЛегендаПередаетОчкиЧерезJS');
    
        }else{
            $response = "nothing";
        }
    
        echo $response;
    }

?>