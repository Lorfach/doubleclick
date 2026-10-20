<?
    session_start();
    setcookie(session_name(),session_id(),time()+604800);

    if($_SESSION['logged']){
        require_once 'php/db.php';
        
        $fetched = mysqli_fetch_all(mysqli_query($db, "SELECT `suo`, `circles` FROM `accounts` WHERE `login`='{$_SESSION['logged'][0]}' AND `password`='{$_SESSION['logged'][1]}'"));

        $suo_coins = $fetched[0][0];
        $circles_coins = $fetched[0][1];
    }

    if($_POST['logout']){
        unset($_SESSION['logged']);
    }

?>