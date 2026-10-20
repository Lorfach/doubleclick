<?
    require_once './php/logged.php';
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>DoubleClick | Main</title>
        <link rel="stylesheet" href="styles/index.css">
    </head>
    <body>
        <div id="game-title">
            <div style="margin-left:25px;">
                <span>D</span>
                <span>o</span>
                <span>u</span>
                <span>b</span>
                <span>l</span>
                <span>e</span>
                <span>C</span>
                <span>l</span>
                <span>i</span>
                <span>c</span>
                <span>k</span>
            </div>
            <div id="title-lines">
                <div></div>
                <div id="tl-s"></div>
                <div id="tl-t"></div>
            </div>
        </div>

        <div id="f-mouse" class="m"></div>
        <div id="s-mouse" class="m"></div>

        <div id="game-choose">
            <div id="SUO" class="gc">
                <a href="suo.php">
                    <div class="button-desc">
                    <div class="lines">
                        <div id="slv">
                            <div id="sl-v"></div>
                        </div>
                        <div class="sl-h"></div>
                        <div class="sl-h"></div>
                        <div class="sl-h"></div>
                    </div>

                    <div class="button-title">SUO</div>
                    <div class="btn-desc">
                        <div>
                            quickly click on colored elements
                        </div>
                        <div class="l"></div>
                        <div>
                            3 difficulty to choose from
                        </div>
                    </div>
                </div>
                <div class="img-topside" style="background: linear-gradient(180deg, #855DBF 0%, #664291 100%);"></div>
                <div class="img" style="background-image:url('img/suo.png');"></div>
                </a>
            </div>

            
            <div id="Circles" class="gc">
                <a href="circles.php">
                    <div class="button-desc bd-circles">
                        <div class="lines">
                            <div id="sl-v" style="border-color:#E2A146;"></div>
                        </div>
                        <div class="button-title" style="font-size:44px;">CIRCLES</div>
                        <div class="btn-desc" style="box-sizing:border-box;padding:6px;">
                            <div>press the buttons at the right time to catch the circles</div>
                            <div class="l"></div>
                            <div>3 difficulty to choose from</div>
                        </div>

                    </div>
                </a>
                <div class="img-topside" style="background: linear-gradient(180deg, #E2A146 0%, #D87F36 100%);"></div>
                <div class="img" style="background-image:url('img/circles.png');"></div>
            </div>
        </div>

        <?
        
            if($_SESSION['logged']){
                echo '<div id="account-block">
                <div id="acc-title">
                    <div id="ac-t">'.
                        $_SESSION["logged"][0]
                        .'
                    </div>
                </div>
                <div id="coins">
                    <div id="suo-coins" class="c">
                        Suo
                        <div class="c-value">
                            <div class="c-money">'.$suo_coins.'</div>
                            <div class="c-img"></div>
                        </div>
                        <div class="arrow-top" id="a1">
                            <div class="arrow"></div>
    
                            <div id="gb-s" class="go-buttons">
                                <a href="leaderboard.html"><div class="gb-leaderboard">Leaderboard</div></a>
                                <div class="dl-shop">Shop</div>    
                            </div>
                        </div>
                    </div>
                    <div id="circle-coins" class="c">
                        Circles
                        <div class="c-value" style="background:#434343;">
                            <div class="c-money">'.$circles_coins.'</div>
                            <div class="c-img"></div>
                        </div>
                        <div class="arrow-top" id="a2">
                            <div class="arrow"></div>
    
                            <div id="gb-c" class="go-buttons">
                                <a href="leaderboard.html"><div class="gb-leaderboard">Leaderboard</div></a>
                                <div class="dl-shop">Shop</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div id="logout">
                <form action="" method="POST"><input type="submit" name="logout"/></form>
            </div>
            
            ';
            
            }else{
                echo '<div id="register-login">
                <a href="leaderboard.html">
                    <div id="leaderboard" class="rl">
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
            </div>';
            }
        
        ?>

        
        
    </body>
</html>