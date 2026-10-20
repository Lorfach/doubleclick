<?

    require_once 'php/db.php';

    if($_POST['username'] and $_POST['password']){

        $fetched = mysqli_fetch_all(mysqli_query($db, "SELECT `login`, `password`, `suo`, `circles` FROM `accounts` WHERE `login`='{$_POST['username']}'"));

        $md5_pass = md5($_POST['password'].'VLADZASOLIL');

        if($fetched[0][1] == $md5_pass){
            session_start();
            setcookie(session_name(),session_id(),time()+604800);
            $_SESSION['logged'] = [$_POST['username'], $md5_pass];

            echo '<script>window.location.replace("/index.php");</script>';
        }else{
            echo '
                <style>
                    #incorrect{
                        opacity:1;
                        text-align:center;
                    }
                </style>
            ';
        }
    }

?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>DoubleClick | Log-in</title>
        <link rel="stylesheet" href="styles/account.css">

        <style>
            #log-wrapper{
                height:300px;
                width:365px;
                margin:15px auto;
                position:relative;
                font-family:InterLight;
            }

            #reg-block{
                background: rgba(64, 64, 64, 0.5);
                border-radius: 5px;
                width:365px;
                height:300px;
                border: 2px solid;
                border-image: linear-gradient(180deg, rgba(72, 211, 255, 0.8) 0%, rgba(229, 72, 255, 0.6) 100%) 1;
                background-origin: border-box;
                background-clip: content-box, border-box;
            }
        </style>
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
                    Log-in
                </div>
                <div class="decorate-line"></div>
            </div>
            <div id="right-header-out">
                <div class="lho-in lho-ic"></div>
                <div class="lho-connect lho-ic" style="border-radius:0px 0px 60px 0px;border-width: 0px 2px 2px 0px;"></div>
            </div>
        </div>

        <!-- <div id="arrow-back" onclick="history.back()"></div> -->
        <a href="/index.php"><div id="arrow-back"></div></a>

        <div id="incorrect" class="opacity">
            Incorrect login or password
        </div>

        <div id="log-wrapper">
            <form action="" method="POST">
            <div id="reg-block">
                <div class="field" style="margin:35px auto;">
                    Username
                    <div class="field-block">
                        <input type="text" name="username" value="<?echo $_POST['username']?>"/>
                    </div>
                </div>
                <div id="decorate" style="margin-top:45px;"></div>
                <div class="field" style="margin:35px auto;">
                    Password
                    <div class="field-block">
                        <input type="password" name="password" value="<?echo $_POST['password']?>"/>
                    </div>
                </div>
            </div>
            <div id="done-button">
                Done :)
                <input type="submit" value="">
            </div>

            <div id="if-registred">
                Don't have an account yet? <span><a href="account.php">Register</a></span>
            </div>

        </form>
        </div>

        <script src="js/acc-engine/login.js"></script>
    </body>
</html>