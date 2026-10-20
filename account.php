<?
    session_start();
    require_once './php/db.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    if(mb_strlen($username) > 2){
        $query_raw = mysqli_fetch_all(mysqli_query($db, "SELECT `login` FROM `accounts` WHERE `login`='$username'"));
        if($query_raw[0]){
            echo '<style>#username-taken{opacity:1;</style>';
        }else{

            if(mb_strlen($username) <= 16 and mb_strlen($password) >= 6 and mb_strlen($password) <= 24 and $_POST['repeat-password'] == $password and !$_SESSION['logged']){

                $md5_pass = md5($password.'VLADZASOLIL');

                mysqli_query($db, "INSERT INTO `accounts` (`login`, `password`) VALUES ('$username', '$md5_pass')");

                setcookie(session_name(),session_id(),time()+604800, '/');

                $_SESSION['logged'] = [$username, $md5_pass];

                echo '<script>window.location.replace("/index.php");</script>';
            }
        }
    }

?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>DoubleClick | Register</title>
        <link rel="stylesheet" href="styles/account.css">
    </head>
    <body>
        <div id="header">
            <div id="left-header-out">
                <div class="lho-in lho-ic"></div>
                <div class="lho-connect lho-ic" style="border-radius:0px 0px 0px 60px;"></div>
            </div>
            <div id="mid-header" class="lho-ic">
                <div id="mh-decorate">
                    <div id="mhd1"></div>
                    <div id="mhd2"></div>
                </div>
                <div class="decorate-line" style="left:20px;"></div>
                <div id="mh-title">
                    Register
                </div>
                <div class="decorate-line"></div>
            </div>
            <div id="right-header-out">
                <div class="lho-in lho-ic"></div>
                <div class="lho-connect lho-ic" style="border-radius:0px 0px 60px 0px;border-width: 0px 2px 2px 0px;"></div>
            </div>
        </div>

        <a href="/index.php"><div id="arrow-back"></div></a>

        <div id="username-taken" class="opacity">
            Username is already taken
        </div>

        <div id="wrapper">
            <form action="" method="POST">
            <div id="reg-block">
                <div class="field" style="margin:15px auto;">
                    Username
                    <div class="field-block">
                        <input type="text" name="username" value="<?echo $_POST['username']?>"/>
                    </div>
                </div>
                <div id="decorate"></div>
                <div class="field" style="margin:auto;">
                    Password
                    <div class="field-block">
                        <input type="password" name="password" value="<?echo $_POST['password']?>"/>
                    </div>
                </div>
                <div class="field" style="margin:30px auto;">
                    Repeat password
                    <div class="field-block">
                        <input type="password" name="repeat-password" value="<?echo $_POST['repeat-password']?>"/>
                    </div>
                </div>
            </div>
            <div id="done-button">
                Done :)
                <input type="submit" value="">
            </div>

            <div id="if-registred">
                Already registered? <span><a href="login.php">Log-in</a></span>
            </div>

        </form>

            <div id="warns">
                <div id="username-char" class="opacity">
                    Username must have more than 2 characters
                </div>

                <div id="pass-char" class="opacity">
                    Password must be at least 6 characters
                </div>


                <div id="dont-match" class="opacity">
                    Passwords don't match
                </div>
            </div>
        </div>

        <script src="js/acc-engine/account.js"></script>
    </body>
</html>