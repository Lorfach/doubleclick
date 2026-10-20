<?
    session_start();

    if($_POST['score'] and $_POST['x'] == md5('1ВладЛегендаПередаетОчкиЧерезJS')){
        require_once 'db.php';

        $query_raw = mysqli_fetch_all(mysqli_query($db, "SELECT `suo` FROM `accounts` WHERE `login`='{$_SESSION['logged'][0]}'"));
        $score = $query_raw[0][0] + $_POST["score"];
        mysqli_query($db, "UPDATE `accounts` SET `suo` = '{$score}' WHERE `login`='{$_SESSION['logged'][0]}'");

        $suo_leaderboard = mysqli_fetch_all(mysqli_query($db, "SELECT * FROM `suoLeaderboard{$_POST['mode']}` ORDER BY `top` ASC"));

        if(count($suo_leaderboard) == 100){
            foreach($suo_leaderboard as $key){
                if($_POST['score'] > $key[1] and $_SESSION['logged'][0] == $key[0]){
                    mysqli_query($db, "UPDATE `suoLeaderboard{$_POST['mode']}` SET `score` = '{$_POST["score"]}' WHERE `username` = '{$_SESSION['logged'][0]}'");
                    break;
                }elseif($_POST['score'] > $key[1]){
                    $sql = "DELETE FROM `suoLeaderboard{$_POST['mode']}` WHERE `username` = '{$_SESSION['logged'][0]}';";

                    for($i = $key[2]; $i <= count($suo_leaderboard); $i++){
                        $b = $i+1;
                        $fn = $suo_leaderboard[$i-1][0];
                        $sql = $sql."UPDATE `suoLeaderboard{$_POST['mode']}` SET `top` = '{$b}' WHERE `username` = '{$fn}';";
                    }

                    $sql = $sql."INSERT INTO `suoLeaderboard{$_POST['mode']}` (`username`, `score`, `top`) VALUES ('{$_SESSION['logged'][0]}', '{$_POST["score"]}', '{$key[2]}');";
                    $sql = $sql."DELETE FROM `suoLeaderboard{$_POST['mode']}` WHERE `top` = 101";

                    mysqli_multi_query($db, $sql);
                    break;
                }

            }
        }elseif($suo_leaderboard[0]){
            foreach($suo_leaderboard as $key){

                if(($_SESSION['logged'][0] == $key[0]) and ($_POST['score'] > $key[1])){
                    mysqli_query($db, "UPDATE `suoLeaderboard{$_POST['mode']}` SET `score` = '{$_POST["score"]}' WHERE `username` = '{$_SESSION['logged'][0]}' ");
                    break;
                }elseif(($_POST['score'] > $key[1]) and ($_SESSION['logged'][0] != $key[0])){
                    
                    $sql = "DELETE FROM `suoLeaderboard{$_POST['mode']}` WHERE `username` = '{$_SESSION['logged'][0]}';";

                    for($i = $key[2]; $i <= count($suo_leaderboard); $i++){
                        $b = $i+1;
                        $fn = $suo_leaderboard[$i-1][0];
                        $sql = $sql."UPDATE `suoLeaderboard{$_POST['mode']}` SET `top` = '{$b}' WHERE `username` = '{$fn}';";
                    }

                    $sql = $sql."INSERT INTO `suoLeaderboard{$_POST['mode']}` (`username`, `score`, `top`) VALUES ('{$_SESSION['logged'][0]}', '{$_POST["score"]}', '{$key[2]}')";

                    mysqli_multi_query($db, $sql);
                    break;
            
                }elseif($key[2] == (count($suo_leaderboard)) and ($_SESSION['logged'][0] != $key[0])){
                    $k1 = $key[2] + 1;
                    mysqli_query($db, "INSERT INTO `suoLeaderboard{$_POST['mode']}` (`username`, `score`, `top`) VALUES ('{$_SESSION['logged'][0]}', '{$_POST["score"]}', '{$k1}')");
                    break;
                }
                
            }
        }else{
            mysqli_query($db, "INSERT INTO `suoLeaderboard{$_POST['mode']}` (`username`, `score`, `top`) VALUES ('{$_SESSION['logged'][0]}', '{$_POST["score"]}', 1)");
        }

        echo $score;
    }

?>