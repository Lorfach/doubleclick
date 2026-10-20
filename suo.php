<?php

    require_once './php/logged.php';
    if($_SESSION['first_request']) unset($_SESSION['first_request']);

?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>DoubleClick | SUO</title>
        <link rel="stylesheet" href="styles/suo.css">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
    </head>
    <body>

        <div id="deathWrap">
            <div id="dMenu">
                <div id="reason">
                    Time is Left!
                </div>
                <div id="scoreEnd">
                    <div>Score:&nbsp;</div><div>10000</div>
                </div>

                <div id="deathButtons">
                    <div id="left">
                        <a href="index.php"></a>
                    </div>
                    <div id="right"></div>
                </div>

                <div id="tryBetter">Try better :(</div>
            </div>
        </div>
        <div id="menuWrap">
            <div id="menuButton">
                <div id="background-menu-button">
                    <div id="linesWrap">
                        <div class="fst-line"></div>
                        <div class="fst-line"></div>
                        <div class="fst-line"></div>
                    </div>
                </div>

                
            </div>

            <div id="menuBody">
                <div id="mbTitle1">
                    <div>Modes</div>
                </div>
                <div id="modes">
                    <div id="normalMode" class="chooseModeBox">                    
                        <div class="modeText">Normal</div>
                        <div class="modeCheckBox"><input type="checkbox" name="normal"/></div>
                    </div>
                    <div id="harderMode" class="chooseModeBox">
                        <div class="modeText">Harder</div>
                        <div class="modeCheckBox"><input type="checkbox" name="harder"/></div>
                    </div>
                    <div id="satanicMode" class="chooseModeBox">
                        <div class="modeText">Satanic</div>
                        <div class="modeCheckBox"><input type="checkbox" name="satanic"/></div>
                    </div>
                </div>

                

                <div id="additionally">
                    <div id="aText">Additionally</div>
                    <div id="aCircle">
                        !
                        <div id="warn">
                            <div id="attention">Attention!</div>
                            When this feature is enabled, you will not be able to earn points and get into the leaderboard
                        </div>
                    </div>
                </div>
                <div class="turnoff" style="height:635%;border-radius:10px;top:101px;"></div>
            </div>
        </div>

        <div id="arrow-back" onclick="history.back()"></div>

        <div id="score">
            <div id="scoreSpan">0</div>
        </div>

        <div id="gameWrap">
            <div id="gameButtons">
                <div class="btn" style="border-radius: 10px 0px 0px 0px;"></div>
                <div class="btn"></div>
                <div class="btn"></div>
                <div class="btn" style="border-radius: 0px 10px 0px 0px;"></div>
                <div class="btn"></div>
                <div class="btn"></div>
                <div class="btn"></div>
                <div class="btn"></div>
                <div class="btn"></div>
                <div class="btn"></div>
                <div class="btn"></div>
                <div class="btn"></div>
                <div class="btn" style="border-radius: 0px 0px 0px 10px;"></div>
                <div class="btn"></div>
                <div class="btn"></div>
                <div class="btn" style="border-radius: 0px 0px 10px 0px;"></div>
            </div>

            <div id="timer">
                <div id="circleOutside">
                    <div id="inRingButton"></div>
                    <div id="topRing">
                        
                    </div>
                    
                    <div id="outsideButton"></div>
                    <div id="timerText">15</div>
                    <div id="circleInside">
                        
                    </div>
                </div>
            </div>
        </div>

        <div id="accountWrap">
            <div id="accountButton">
                
            </div>

            <div id="accountBody">
                <?
                    
                    if($_SESSION['logged']){
                        
                        echo <<<HTML
                            <div id="username">{$_SESSION['logged'][0]}</div>
                            <div id="lineDeco">
                                <div class="lines" style="margin:0px;"></div>
                                <div class="lines"></div>
                                <div class="lines"></div>
                                <div class="lines"></div>
                                <div class="lines"></div>
                            </div>
                            <div id="accScore">
                                <span>{$suo_coins}</span>
                            </div>
                            <div id="accBtns">
                                <a href="/leaderboard.html"><div id="leaderboard" class="aB"><div id="lbMin">Leaderboard</div><div class="btnImage" style="background-image:url('img/leaderboard1.png')"></div></div></a>
                                <div id="shop" class="aB"><div id="sMin">Shop</div><div class="btnImage" style="background-image:url('img/shop.png');z-index:-1"></div></div>
                            </div>
                            <div id="logout">
                                <form action="" method="POST">
                                    <input type="submit" name="logout"/>
                                </form>
                        </div>
HTML;
                    }else{
                        echo <<<HTML
                            <div id="register-login">
                                <a href="leaderboard.html">
                                    <div id="leaderboardUnreg" class="rl">
                                        Leaderboard
                                    </div>
                                </a>
                                <a href="login.php">
                                    <div id="login" class="rl">
                                        Log-in
                                    </div>
                                </a>
                                <a href="account.php">
                                    <div id="register" class="rl">
                                        Register
                                    </div>
                                </a>
                            </div>
HTML;
                    }
                ?>
                
                <div class="turnoff" style="border-radius:7px;top:106px;height:383px;"></div>
            </div>
        </div>

        <div id="deathLine">
            <div id="line"></div>
        </div>
        <script src="js/anime.min.js"></script>
        <script src="js/suo/ui.js"></script>
        <script src="js/suo/engine.js"></script>
    </body>
</html>