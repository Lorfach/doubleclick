<?

    require_once './php/logged.php';

?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>DoubleClick | Circles</title>
        <link rel="stylesheet" href="styles/jquery-ui.min.css">
        <link rel="stylesheet" href="styles/bootstrap.min.css">
        <link rel="stylesheet" href="styles/circles.css?v=1">
    </head>
    <body>

        <div id="m-changeMode">
            <div id="m-changeMode-title">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
                    <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
                </svg>
            </div>

            <div id="m-changeMode-menu">
                <div id="changeMode" class="text-justify block">
                    <div class="cm-item cm-item-first" id="normal">Normal</div>
                    <div class="cm-item" id="harder">Harder</div>
                    <div class="cm-item" id="satanic">Satanic</div>
                </div>
            </div>
        </div>

        <div id="changeMode" class="text-jusfy">
            <div class="cm-item cm-item-first" id="normal">Normal</div>
            <div class="cm-item" id="harder">Harder</div>
            <div class="cm-item" id="satanic">Satanic</div>
        </div>

        <div class="container-md" id="wrapper">
            <div id="topDecoBar"></div>
            <div id="lines">
                <div class="line">
                    <div class="deco-arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="blackblack" class="bi bi-arrow-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z"/>
                        </svg>
                    </div>
                    <div class="keypadOut">
                        <div class="keypadIn"><span>Q</span></div>
                    </div>

                    <div class="circle" style="display:none;">
                        <svg width="100%" height="92%" viewBox="0 0 85 81" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g filter="url(#filter0_i_9_40)">
                            <path d="M42.5 0L52.4909 30.7487L84.822 30.7487L58.6656 49.7525L68.6564 80.5013L42.5 61.4975L16.3436 80.5013L26.3344 49.7525L0.177986 30.7487L32.5091 30.7487L42.5 0Z" fill="#00C2FF"/>
                            </g>
                            <defs>
                            <filter id="filter0_i_9_40" x="0.177986" y="0" width="84.644" height="84.5013" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                            <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                            <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                            <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                            <feOffset dy="4"/>
                            <feGaussianBlur stdDeviation="2"/>
                            <feComposite in2="hardAlpha" operator="arithmetic" k2="-1" k3="1"/>
                            <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                            <feBlend mode="normal" in2="shape" result="effect1_innerShadow_9_40"/>
                            </filter>
                            </defs>
                        </svg>
                            
                    </div>
                </div>
                <div class="line">
                    <div class="deco-arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="blackblack" class="bi bi-arrow-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z"/>
                        </svg>
                    </div>
                    <div class="minipad" style="right:-17px;"></div>
                    <div class="keypadOut">
                        <div class="keypadIn"><span>W</span></div>
                    </div>
                    <div class="minipad" style="left:-17px;"></div>
                    <div class="circle lasts-circle" style="display:none;">
                        <svg width="100%" height="92%" viewBox="0 0 85 81" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g filter="url(#filter0_i_9_40)">
                            <path d="M42.5 0L52.4909 30.7487L84.822 30.7487L58.6656 49.7525L68.6564 80.5013L42.5 61.4975L16.3436 80.5013L26.3344 49.7525L0.177986 30.7487L32.5091 30.7487L42.5 0Z" fill="#00C2FF"/>
                            </g>
                            <defs>
                            <filter id="filter0_i_9_40" x="0.177986" y="0" width="84.644" height="84.5013" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                            <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                            <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                            <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                            <feOffset dy="4"/>
                            <feGaussianBlur stdDeviation="2"/>
                            <feComposite in2="hardAlpha" operator="arithmetic" k2="-1" k3="1"/>
                            <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                            <feBlend mode="normal" in2="shape" result="effect1_innerShadow_9_40"/>
                            </filter>
                            </defs>
                        </svg>
                          
                        <span>5</span>
                    </div>
                </div>
                <div class="line">
                    <div class="deco-arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="blackblack" class="bi bi-arrow-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z"/>
                        </svg>
                    </div>
                    <div class="keypadOut">
                        <div class="keypadIn"><span>E</span></div>
                    </div>


                </div>
            </div>
            <div id="startTitle">
                <div id="start-title-text">Press Q | W | E to start </div>
            </div>
        </div>

        <div id="score"><span>0</span> <div id="circlesCounter"><span>80</span></div></div>

        <?
        
            if($_SESSION['logged']){
                echo <<<HTML
                <div id="account">
                    <div class="account-item" id="account-title">{$_SESSION['logged'][0]}</div>
                    <div class="account-item" id="account-score">{$circles_coins}</div>
                    <div class="account-item" id="account-shop-button">Shop</div>
                    <div class="account-item" id="account-leaderboard-button" style="padding:0px 15px 0px 15px;"><a href="leaderboard.html" class="link-full">Leaderboard</a></div>
                    <div class="account-item" id="account-logout-button" style="padding:0px;">
                    <div id="logout">
                        <form action="" method="POST"><input type="submit" name="logout"/></form>
                    </div>
                    </div>
                </div>

                <div id="account-mobile">
                    <div class="account-item" id="account-title">{$_SESSION['logged'][0]}</div>
                </div>

                <div id="m-account-menu">
                    <div class="account-item" id="account-score">{$circles_coins}</div>
                    <div class="account-item" id="account-shop-button">Shop</div>
                    <div class="account-item" id="account-leaderboard-button" style="padding:0px 15px 0px 15px;"><a href="leaderboard.html" class="link-full">Leaderboard</a></div>
                    
                    <div id="logout-mobile">
                        <form action="" method="POST"><input type="submit" name="logout"/></form>
                    </div>

                    <div id="home-button-mobile" class="hb">
                        <a href="index.php" class="link-full" style="position:relative;"></a>
                    </div>
                </div>
HTML;
            }else{
                echo <<<HTML
                <div id="account">
                    <div class="account-item" id="account-title"><svg xmlns="http://www.w3.org/2000/svg" width="35%" height="35%" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
                    <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                  </svg></div>
                    <div class="account-item" id="account-shop-button"><a href="login.php">Login</a></div>
                    <div class="account-item" id="account-leaderboard-button" style="padding:0px 15px 0px 15px;"><a href="account.php" class="link-full">Register</a></div>
                </div>

                <div id="account-mobile">
                    <div class="account-item" id="account-title"><svg xmlns="http://www.w3.org/2000/svg" width="85%" height="85%" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
                    <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                  </svg></div>
                </div>

                <div id="m-account-menu">
                    <div class="account-item" id="account-shop-button"><a href="login.php" class="link-full">Log-in</a></div>
                    <div class="account-item" id="account-leaderboard-button" style="padding:0px 15px 0px 15px;"><a href="account.php" class="link-full">Register</a></div>
                    
                    <div id="home-button-mobile" class="hb">
                        <a href="index.php" class="link-full" style="position:relative;"></a>
                    </div>
                </div>
HTML;
            }
        
        ?>

                <div id="home-button" class="hb">
                    <a href="index.php" class="link-full" style="position:relative;"></a>
                </div>

        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery-3.7.0.min.js"></script>
        <script src="js/circles/ui.js"></script>
        <script src="js/circles/engine.js"></script>
    </body>
</html>