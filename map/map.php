<?php
session_start();

if (!isset($_SESSION['loaded'])) {
    $_SESSION['loaded'] = true;
} else {
    unset($_SESSION['name']);
    // Destroy the session
    session_regenerate_id(true);
    session_destroy();
    header('Location: ../login/login.php');
    exit; // Ensure the script exits after redirection
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Map</title>
    <link rel="stylesheet" href="mapstyles.css" />
    <link rel="stylesheet" href="../battle/battle.css" />
</head>

<body>
    <div class="map">
        <div class="card-zone" id="start">
            <div class="location-card" id="start-loc">Exit 9</div>
        </div>
        <div class="card-zone" id="zone0"></div>
        <div class="card-zone" id="zone1"></div>
        <div class="card-zone" id="zone2"></div>
        <div class="card-zone" id="zone3"></div>
        <div class="card-zone" id="zone4"></div>
        <div class="card-zone" id="zone5"></div>
        <div class="card-zone" id="zone6"></div>
        <div class="card-zone" id="zone7"></div>
        <div class="card-zone" id="zone8"></div>
        <div class="card-zone" id="zone9"></div>
    </div>

    <div class="hud">
        <div class="username">Player: <?php echo $_SESSION['name'] ?></div>
        <div class="stat">
            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
                <path d="M349.4 44.6c5.9-13.7 1.5-29.7-10.6-38.5s-28.6-8-39.9 1.8l-256 224c-10 8.8-13.6 22.9-8.9 35.3S50.7 288 64 288H175.5L98.6 467.4c-5.9 13.7-1.5 29.7 10.6 38.5s28.6 8 39.9-1.8l256-224c10-8.8 13.6-22.9 8.9-35.3s-16.6-20.7-30-20.7H272.5L349.4 44.6z" fill="cornflowerblue" />
            </svg>
            <label>Energy:</label>
            <div class="progress-container">
                <progress max="100" value="100" class="player-energy-bar"></progress>
                <span class="player-energy-num">100</span>
            </div>
        </div>
        <div class="stat">
            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
                <path d="M393.4 9.4c12.5-12.5 32.8-12.5 45.3 0l64 64c12.5 12.5 12.5 32.8 0 45.3c-11.8 11.8-30.7 12.5-43.2 1.9l-9.5 9.5-48.8 48.8c-9.2 9.2-11.5 22.9-8.6 35.6c9.4 40.9-1.9 85.6-33.8 117.5L197.3 493.3c-25 25-65.5 25-90.5 0l-88-88c-25-25-25-65.5 0-90.5L180.2 153.3c31.9-31.9 76.6-43.1 117.5-33.8c12.6 2.9 26.4 .5 35.5-8.6l48.8-48.8 9.5-9.5c-10.6-12.6-10-31.4 1.9-43.2zM99.3 347.3l65.4 65.4c6.2 6.2 16.4 6.2 22.6 0l97.4-97.4c6.2-6.2 6.2-16.4 0-22.6l-65.4-65.4c-6.2-6.2-16.4-6.2-22.6 0L99.3 324.7c-6.2 6.2-6.2 16.4 0 22.6z" fill="darkolivegreen" />
            </svg>
            <label>Drunk:</label>
            <div class="progress-container">
                <progress max="100" value="0" class="player-drunk-bar"></progress>
                <span class="player-drunk-num">0</span>
            </div>
        </div>
        <div class="stat money-container">
            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512">
                <path d="M64 64C28.7 64 0 92.7 0 128V384c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64H64zm64 320H64V320c35.3 0 64 28.7 64 64zM64 192V128h64c0 35.3-28.7 64-64 64zM448 384c0-35.3 28.7-64 64-64v64H448zm64-192c-35.3 0-64-28.7-64-64h64v64zM288 160a96 96 0 1 1 0 192 96 96 0 1 1 0-192z" fill="gold" />
            </svg>
            <label>Money:</label>
            <span class="player-money-num">100,000</span>
        </div>
    </div>

    <div id="encounter-zone" class="dynamic-game-element">
        <div class="event-zone dynamic-game-element">
            <div class="event-section-left">
                <div class="event-title"></div>
                <div class="event-image"></div>
            </div>
            <div class="event-section-right">
                <div class="event-right prompt-container"></div>
                <div class="event-right option-button-container">
                    <div class="option-container">
                        <div class="option-info">
                            <div class="option-description"></div>
                            <div class="option-EDMchanges">
                                <div class="energy-svg-box svg-box">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
                                        <path d="M349.4 44.6c5.9-13.7 1.5-29.7-10.6-38.5s-28.6-8-39.9 1.8l-256 224c-10 8.8-13.6 22.9-8.9 35.3S50.7 288 64 288H175.5L98.6 467.4c-5.9 13.7-1.5 29.7 10.6 38.5s28.6 8 39.9-1.8l256-224c10-8.8 13.6-22.9 8.9-35.3s-16.6-20.7-30-20.7H272.5L349.4 44.6z" />
                                    </svg>
                                    <div class="option-energy"></div>
                                </div>
                                <div class="drunk-svg-box svg-box">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
                                        <path d="M393.4 9.4c12.5-12.5 32.8-12.5 45.3 0l64 64c12.5 12.5 12.5 32.8 0 45.3c-11.8 11.8-30.7 12.5-43.2 1.9l-9.5 9.5-48.8 48.8c-9.2 9.2-11.5 22.9-8.6 35.6c9.4 40.9-1.9 85.6-33.8 117.5L197.3 493.3c-25 25-65.5 25-90.5 0l-88-88c-25-25-25-65.5 0-90.5L180.2 153.3c31.9-31.9 76.6-43.1 117.5-33.8c12.6 2.9 26.4 .5 35.5-8.6l48.8-48.8 9.5-9.5c-10.6-12.6-10-31.4 1.9-43.2zM99.3 347.3l65.4 65.4c6.2 6.2 16.4 6.2 22.6 0l97.4-97.4c6.2-6.2 6.2-16.4 0-22.6l-65.4-65.4c-6.2-6.2-16.4-6.2-22.6 0L99.3 324.7c-6.2 6.2-6.2 16.4 0 22.6z" />
                                    </svg>
                                    <div class="option-drunk"></div>
                                </div>
                                <div class="money-svg-box svg-box">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512">
                                        <path d="M64 64C28.7 64 0 92.7 0 128V384c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64H64zm64 320H64V320c35.3 0 64 28.7 64 64zM64 192V128h64c0 35.3-28.7 64-64 64zM448 384c0-35.3 28.7-64 64-64v64H448zm64-192c-35.3 0-64-28.7-64-64h64v64zM288 160a96 96 0 1 1 0 192 96 96 0 1 1 0-192z" />
                                    </svg>
                                    <div class="option-money"></div>
                                </div>
                            </div>
                        </div>
                        <button class="option-button option-button1 can-buy">
                            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512">
                                <path d="M9.4 86.6C-3.1 74.1-3.1 53.9 9.4 41.4s32.8-12.5 45.3 0l192 192c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L178.7 256 9.4 86.6zM256 416H544c17.7 0 32 14.3 32 32s-14.3 32-32 32H256c-17.7 0-32-14.3-32-32s14.3-32 32-32z" />
                            </svg>
                        </button>
                    </div>
                    <div class="option-container">
                        <div class="option-info">
                            <div class="option-description"></div>
                            <div class="option-EDMchanges">
                                <div class="energy-svg-box svg-box">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
                                        <path d="M349.4 44.6c5.9-13.7 1.5-29.7-10.6-38.5s-28.6-8-39.9 1.8l-256 224c-10 8.8-13.6 22.9-8.9 35.3S50.7 288 64 288H175.5L98.6 467.4c-5.9 13.7-1.5 29.7 10.6 38.5s28.6 8 39.9-1.8l256-224c10-8.8 13.6-22.9 8.9-35.3s-16.6-20.7-30-20.7H272.5L349.4 44.6z" />
                                    </svg>
                                    <div class="option-energy"></div>
                                </div>
                                <div class="drunk-svg-box svg-box">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
                                        <path d="M393.4 9.4c12.5-12.5 32.8-12.5 45.3 0l64 64c12.5 12.5 12.5 32.8 0 45.3c-11.8 11.8-30.7 12.5-43.2 1.9l-9.5 9.5-48.8 48.8c-9.2 9.2-11.5 22.9-8.6 35.6c9.4 40.9-1.9 85.6-33.8 117.5L197.3 493.3c-25 25-65.5 25-90.5 0l-88-88c-25-25-25-65.5 0-90.5L180.2 153.3c31.9-31.9 76.6-43.1 117.5-33.8c12.6 2.9 26.4 .5 35.5-8.6l48.8-48.8 9.5-9.5c-10.6-12.6-10-31.4 1.9-43.2zM99.3 347.3l65.4 65.4c6.2 6.2 16.4 6.2 22.6 0l97.4-97.4c6.2-6.2 6.2-16.4 0-22.6l-65.4-65.4c-6.2-6.2-16.4-6.2-22.6 0L99.3 324.7c-6.2 6.2-6.2 16.4 0 22.6z" />
                                    </svg>
                                    <div class="option-drunk"></div>
                                </div>
                                <div class="money-svg-box svg-box">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512">
                                        <path d="M64 64C28.7 64 0 92.7 0 128V384c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64H64zm64 320H64V320c35.3 0 64 28.7 64 64zM64 192V128h64c0 35.3-28.7 64-64 64zM448 384c0-35.3 28.7-64 64-64v64H448zm64-192c-35.3 0-64-28.7-64-64h64v64zM288 160a96 96 0 1 1 0 192 96 96 0 1 1 0-192z" />
                                    </svg>
                                    <div class="option-money"></div>
                                </div>
                            </div>
                        </div>
                        <button class="option-button option-button2 can-buy">
                            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512">
                                <path d="M9.4 86.6C-3.1 74.1-3.1 53.9 9.4 41.4s32.8-12.5 45.3 0l192 192c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L178.7 256 9.4 86.6zM256 416H544c17.7 0 32 14.3 32 32s-14.3 32-32 32H256c-17.7 0-32-14.3-32-32s14.3-32 32-32z" />
                            </svg>
                        </button>
                    </div>
                    <div class="option-container">
                        <div class="option-info">
                            <div class="option-description"></div>
                            <div class="option-EDMchanges">
                                <div class="energy-svg-box svg-box">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
                                        <path d="M349.4 44.6c5.9-13.7 1.5-29.7-10.6-38.5s-28.6-8-39.9 1.8l-256 224c-10 8.8-13.6 22.9-8.9 35.3S50.7 288 64 288H175.5L98.6 467.4c-5.9 13.7-1.5 29.7 10.6 38.5s28.6 8 39.9-1.8l256-224c10-8.8 13.6-22.9 8.9-35.3s-16.6-20.7-30-20.7H272.5L349.4 44.6z" />
                                    </svg>
                                    <div class="option-energy"></div>
                                </div>
                                <div class="drunk-svg-box svg-box">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
                                        <path d="M393.4 9.4c12.5-12.5 32.8-12.5 45.3 0l64 64c12.5 12.5 12.5 32.8 0 45.3c-11.8 11.8-30.7 12.5-43.2 1.9l-9.5 9.5-48.8 48.8c-9.2 9.2-11.5 22.9-8.6 35.6c9.4 40.9-1.9 85.6-33.8 117.5L197.3 493.3c-25 25-65.5 25-90.5 0l-88-88c-25-25-25-65.5 0-90.5L180.2 153.3c31.9-31.9 76.6-43.1 117.5-33.8c12.6 2.9 26.4 .5 35.5-8.6l48.8-48.8 9.5-9.5c-10.6-12.6-10-31.4 1.9-43.2zM99.3 347.3l65.4 65.4c6.2 6.2 16.4 6.2 22.6 0l97.4-97.4c6.2-6.2 6.2-16.4 0-22.6l-65.4-65.4c-6.2-6.2-16.4-6.2-22.6 0L99.3 324.7c-6.2 6.2-6.2 16.4 0 22.6z" />
                                    </svg>
                                    <div class="option-drunk"></div>
                                </div>
                                <div class="money-svg-box svg-box">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512">
                                        <path d="M64 64C28.7 64 0 92.7 0 128V384c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64H64zm64 320H64V320c35.3 0 64 28.7 64 64zM64 192V128h64c0 35.3-28.7 64-64 64zM448 384c0-35.3 28.7-64 64-64v64H448zm64-192c-35.3 0-64-28.7-64-64h64v64zM288 160a96 96 0 1 1 0 192 96 96 0 1 1 0-192z" />
                                    </svg>
                                    <div class="option-money"></div>
                                </div>
                            </div>
                        </div>
                        <button class="option-button option-button3 can-buy">
                            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512">
                                <path d="M9.4 86.6C-3.1 74.1-3.1 53.9 9.4 41.4s32.8-12.5 45.3 0l192 192c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L178.7 256 9.4 86.6zM256 416H544c17.7 0 32 14.3 32 32s-14.3 32-32 32H256c-17.7 0-32-14.3-32-32s14.3-32 32-32z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="battle-zone dynamic-game-element">
            <div class="container">
                <div class="main">
                    <div class="top">
                        <div class="movedescriptionArea">
                            <h3>Current Move</h3>
                            <h4 class="movedescription">Example of Move Description</h4>
                        </div>
                        <div class="enemy">
                            <h2 class="enemyname"></h2>
                            <div class="healthbar">
                                <progress max="100" value="80" class="enemy-health-bar"></progress>
                                <span class="enemy-health-num"></span>
                            </div>
                            <div class="enemy_pic">
                                <img class="enemypic" src="">
                            </div>
                        </div>
                        <div class="moveset">
                            <h2>Enemy Moveset</h2>
                            <div class="enemymoves"></div>
                        </div>
                    </div>
                    <div class="bot">
                    </div>
                    <div class="healthbar">
                        <progress max="100" value="100" class="player-health-bar"></progress>
                        <span class="player-health-num">100</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="encounter-result" class="dynamic-game-element">
        <div class="resolution-text">Your night continues!</div>
        <div class="state-changes-container">
            <div class="attribute energy">
                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
                    <path d="M349.4 44.6c5.9-13.7 1.5-29.7-10.6-38.5s-28.6-8-39.9 1.8l-256 224c-10 8.8-13.6 22.9-8.9 35.3S50.7 288 64 288H175.5L98.6 467.4c-5.9 13.7-1.5 29.7 10.6 38.5s28.6 8 39.9-1.8l256-224c10-8.8 13.6-22.9 8.9-35.3s-16.6-20.7-30-20.7H272.5L349.4 44.6z" fill="cornflowerblue" />
                </svg>
                <div class="energy-num">energy change value</div>
            </div>
            <div class="attribute drunk">
                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
                    <path d="M393.4 9.4c12.5-12.5 32.8-12.5 45.3 0l64 64c12.5 12.5 12.5 32.8 0 45.3c-11.8 11.8-30.7 12.5-43.2 1.9l-9.5 9.5-48.8 48.8c-9.2 9.2-11.5 22.9-8.6 35.6c9.4 40.9-1.9 85.6-33.8 117.5L197.3 493.3c-25 25-65.5 25-90.5 0l-88-88c-25-25-25-65.5 0-90.5L180.2 153.3c31.9-31.9 76.6-43.1 117.5-33.8c12.6 2.9 26.4 .5 35.5-8.6l48.8-48.8 9.5-9.5c-10.6-12.6-10-31.4 1.9-43.2zM99.3 347.3l65.4 65.4c6.2 6.2 16.4 6.2 22.6 0l97.4-97.4c6.2-6.2 6.2-16.4 0-22.6l-65.4-65.4c-6.2-6.2-16.4-6.2-22.6 0L99.3 324.7c-6.2 6.2-6.2 16.4 0 22.6z" fill="darkolivegreen" />
                </svg>
                <div class="drunk-num">drunk change value</div>
            </div>
            <div class="attribute money">
                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512">
                    <path d="M64 64C28.7 64 0 92.7 0 128V384c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64H64zm64 320H64V320c35.3 0 64 28.7 64 64zM64 192V128h64c0 35.3-28.7 64-64 64zM448 384c0-35.3 28.7-64 64-64v64H448zm64-192c-35.3 0-64-28.7-64-64h64v64zM288 160a96 96 0 1 1 0 192 96 96 0 1 1 0-192z" fill="gold" />
                </svg>
                <div class="money-num">money change value</div>
            </div>
        </div>
        <h3>click to continue...</h3>
    </div>

    <div id="end-game" class="dynamic-game-element">
        <div class="end-game-text">You win. Nice.</div>
        <div class="state-changes-container">
            <div class="attribute energy">
                <!-- <img src="energy.jpg" /> -->
                <div class="energy-num">end value</div>
            </div>
            <div class="attribute drunk">
                <!-- <img src="drunk.jpg" /> -->
                <div class="drunk-num">end value</div>
            </div>
            <div class="attribute money">
                <!-- <img src="money.jpg" /> -->
                <div class="money-num">end value</div>
            </div>
        </div>
        <div class="final-score">final score</div>
        <div>
            <button class="play-again">Play Again</button>
            <button class="see-leaderboard">Leaderboard</button>
        </div>
    </div>

    <div class="convenience-store dynamic-game-element">
        <div class="store-menu">
            <div id="inventory">
                <h2>Inventory</h2>
                <div id="user_stats"></div>
            </div>
            <div class='menu_parent'>
                <div class='drink_selection'>
                    <h2>Drinks</h2>
                    <div id="drinks"></div>
                </div>
                <div class='food_selection'>
                    <h2>Food</h2>
                    <div id="food"></div>
                </div>
            </div>
        </div>
        <div class="below-menu">
            <div class="below-menu-left">Some info about the CU mart or whatever</div>
            <div class="leave-store-button"></div>
        </div>
    </div>
    <div class="store-button-container">
        <div class="store-button"></div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            fetch('getLocationData.php')
                .then(res => res.json())
                .then(data => {
                    console.log(data);

                    //map generation
                    const mapElement = document.querySelector(".map");
                    let pathBranchesLeft = 4;
                    let i = 0; // ultimately ends up being the zone identifier

                    while (data.length > 0) {
                        let branchPath = false;
                        const newLocationCard = document.createElement("div");
                        const parentZone = document.querySelector("#zone" + i);

                        // Calculate remaining non-branch iterations
                        const remainingNonBranchIterations = data.length - pathBranchesLeft * 2;

                        // Determine if a branch should be created based on remaining iterations and branches
                        if (pathBranchesLeft > 0 && (Math.floor(Math.random() * remainingNonBranchIterations) === 0 || remainingNonBranchIterations <= 0)) {
                            branchPath = true;
                            pathBranchesLeft--;
                        }

                        if (branchPath) {
                            for (let branchLoc = 0; branchLoc < 2; branchLoc++) {
                                if (data.length === 0) break; // Prevent creating branches if testArray is empty
                                newLocationCard.classList.add("location-card");
                                newLocationCard.id = data[0]["location_id"];
                                newLocationCard.textContent = "" + newLocationCard.id[0] + " - " + data[0]["location_name"];
                                newLocationCard.style.backgroundImage = "url(pics/" + data[0]["location_img"] + ")";
                                data.shift();

                                parentZone.appendChild(newLocationCard.cloneNode(true));
                            }
                        } else {
                            newLocationCard.classList.add("location-card");
                            newLocationCard.id = data[0]["location_id"];
                            newLocationCard.textContent = "" + newLocationCard.id[0] + " - " + data[0]["location_name"];
                            newLocationCard.style.backgroundImage = "url(pics/" + data[0]["location_img"] + ")";
                            data.shift();

                            parentZone.appendChild(newLocationCard);
                        }

                        i++;
                    }

                    let gameRound = 0;

                    //Map Zones / Location Cards
                        const currentZone = document.querySelector("#start")
                        let currentCards = currentZone.querySelectorAll(".location-card");
                        let nextZone = document.querySelector("#zone" + (gameRound));
                        let nextCards = nextZone.querySelectorAll(".location-card");
                        const cardZoneList = document.querySelectorAll(".card-zone"); //creates a nodelist of zones
                        const lastZone = cardZoneList[cardZoneList.length - 1]; //final round

                    //HUD
                        const energyBar = document.querySelector(".player-energy-bar");
                        const drunkBar = document.querySelector(".player-drunk-bar");
                        const energyNum = document.querySelector(".player-energy-num");
                        const drunkNum = document.querySelector(".player-drunk-num");
                        const moneyNum = document.querySelector(".player-money-num");

                    //Encounter zones and their children
                        const encounterZone = document.querySelector("#encounter-zone");


                    //Endgame
                        const playAgainButton = document.querySelector(".play-again");
                        const leaderBoardButton = document.querySelector(".see-leaderboard");
                        const endGame = document.querySelector("#end-game");

                    //Convenience Store
                        const storeScreen = document.querySelector(".convenience-store");
                        const storeButton = document.querySelector(".store-button-container");
                        const leaveStoreButton = document.querySelector(".leave-store-button");
                        storeButton.addEventListener("click", () => {
                            storeScreen.style.display = "flex";
                            getStoreItems();
                            leaveStoreButton.addEventListener("click", () => storeScreen.style.display = "none");
                        });

                    function getStoreItems() {
                        fetch('../mart/genStoreItems.php')
                            .then(response => response.json())
                            .then(data => {
                                console.log(data);

                                let drinks = document.querySelector('#drinks');
                                let foodContainer = document.querySelector('#food');


                                data.items['drink'].forEach(drink => {
                                    console.log(drink);
                                    var drinkButton = document.createElement('button');
                                    drinkButton.classList.add('shopButton');
                                    drinkButton.innerHTML = `${drink['item']} <br>${drink['price_hit']}`;
                                    drinkButton.addEventListener('click', () => {
                                        console.log(drink['id'])
                                        console.log(`Clicked on drink: ${drink['item']}`);
                                        fetch('../mart/buyItem.php', {
                                                method: 'POST',
                                                headers: {
                                                    'Content-Type': 'application/json'
                                                },
                                                body: JSON.stringify(drink['id'])

                                            })
                                            .then(response => response.json())
                                            .then(data => {
                                                console.log(data);
                                                let user_stats = document.querySelector('#user_stats');
                                                user_stats.innerHTML = `Energy: ${data.user_stats['run_energyLevel']} <br> Money: ${data.user_stats['run_moneyLevel']} <br> Drunk: ${data.user_stats['run_drunkLevel']}`;
                                            });

                                    });
                                    drinks.appendChild(drinkButton);
                                });

                                data.items['food'].forEach(food => {
                                    var foodButton = document.createElement('button');
                                    foodButton.innerHTML = `${food['item']} <br>${food['price_hit']}`;
                                    foodButton.addEventListener('click', () => {
                                        console.log(`Clicked on food: ${food['item']}`);

                                    });
                                    foodContainer.appendChild(foodButton);
                                });
                            });
                    }

                    //runs initially to begin the game, then runs after a location card is clicked to prepare the next locations for clicks and it's generated effects
                    function prepareRound() {
                        if (gameRound < cardZoneList.length - 1) {
                            nextZone = document.querySelector("#zone" + (gameRound));
                            nextCards = nextZone.querySelectorAll(".location-card");

                            if (nextCards) {
                                nextCards.forEach((card) => card.classList.add("focus"));
                                nextCards.forEach((card) => {
                                    card.addEventListener("click", locationClicked);
                                    card.addEventListener("click", () => {
                                        mapElement.scrollTo({
                                            left: nextZone.offsetLeft,
                                            behavior: 'smooth'
                                        });
                                    });
                                });
                            }
                        }
                    }

                    //used assigned element data to retrieve associated data from the db and prepare the event or battle expected
                    function locationClicked(event) {
                        nextCards.forEach((card) => card.removeEventListener("click", locationClicked));
                        const locationID = event.target.id + "";

                        fetch(`getEncounterData.php`, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/x-www-form-urlencoded'
                                },
                                body: `locationID=${locationID}`
                            })
                            .then(response => {
                                console.log(response);
                                if (!response.ok) throw new Error('Network response was not ok');
                                return response.json();
                            })
                            .then(encounterData => {
                                console.log('Received data:', encounterData);
                                locationTrigger(encounterData);
                            })
                            .catch(error => console.log(error));
                    }

                    //checks encounter type, fires according function - afterwhich increases global gameRound and starts new gameplay loop
                    function locationTrigger(inData) {
                        nextCards.forEach((card) => card.classList.remove("focus"));
                        encounterZone.style.display = "block";

                        if (inData['encounter_type'] == "event") {
                            triggerEvent(inData);
                        } else if (inData['encounter_type'] == "battle") {
                            triggerBattle(inData);
                        }

                        gameRound += 1;
                        prepareRound();
                    }

                    //Encounter Results
                        const encounterResult = document.getElementById("encounter-result");
                        const resolutionText = document.querySelector(".resolution-text");
                        const energyChange = document.querySelector(".energy-num");
                        const drunkChange = document.querySelector(".drunk-num");
                        const moneyChange = document.querySelector(".money-num");
                    //shows splash screen after a location encounter is resolved, displaying gamestate changes
                    function showResults(inData) {
                            encounterZone.style.display = "none";
                            eventZone.style.display = "none";
                            battleZone.style.display = "none";
                            encounterResult.style.display = "flex";

                            //dynamic styles according to gamestate drunk value
                            document.documentElement.style.setProperty('--maxblur', ((inData['updatedDrunkLevel'] / 100) * 2 + "px"));
                            document.documentElement.style.setProperty('--midX', ((inData['updatedDrunkLevel'] / 100) * 5 + "px"));
                            document.documentElement.style.setProperty('--maxX', ((inData['updatedDrunkLevel'] / 100) * 10 + "px"));
                            document.documentElement.style.setProperty('--upY', ((inData['updatedDrunkLevel'] / 100) * 5 + "px"));
                            document.documentElement.style.setProperty('--downY', ("-" + (inData['updatedDrunkLevel'] / 100) * 5 + "px"));

                            energyChange.innerHTML = energyBar.value + " > " + inData['updatedEnergyLevel'];
                            drunkChange.innerHTML = drunkBar.value + " > " + inData['updatedDrunkLevel'];
                            moneyChange.innerHTML = moneyNum.innerHTML + " > " + inData['updatedMoneyLevel'].toLocaleString('en-US');

                            if (inData['updatedEnergyLevel'] <= 0) {
                                //you lose
                                energyBar.value = 0;
                                energyNum.innerHTML = 0;
                                resolutionText.innerHTML = "Placeholder(?) YOULOSE screen, click to reload window"
                                document.querySelector(".state-changes-container").innerHTML = "";
                                encounterResult.addEventListener("click", () => {
                                    window.location.reload();
                                });
                            } else {
                                //updates HUD
                                energyBar.value = inData['updatedEnergyLevel'];
                                energyNum.innerHTML = inData['updatedEnergyLevel'];
                                drunkBar.value = inData['updatedDrunkLevel'];
                                drunkNum.innerHTML = inData['updatedDrunkLevel'];
                                moneyNum.innerHTML = parseInt(inData['updatedMoneyLevel']).toLocaleString('en-US') + "";
                                if (gameRound >= cardZoneList.length - 1) {
                                    encounterResult.addEventListener("click", () => endGame.style.display = "flex"); //end game screen
                                    playAgainButton.addEventListener("click", () => location.reload());
                                    leaderboardButton.addEventListener("click", () => alert("Gotta add a leaderboard"));
                                } else encounterResult.addEventListener("click", () => encounterResult.style.display = "none"); //click to continue game
                            }
                        }

                    //Events
                        const eventZone = document.querySelector(".event-zone");
                        const optionDescriptionArray = Array.from(document.querySelectorAll(".option-description"));
                        const optionEnergyArray = Array.from(document.querySelectorAll(".option-energy"));
                        const optionDrunkArray = Array.from(document.querySelectorAll(".option-drunk"));
                        const optionMoneyArray = Array.from(document.querySelectorAll(".option-money"));
                        const optionButtons = document.querySelectorAll('.option-button');
                        const optionButton1 = document.querySelector('.option-button1');
                        const optionButton2 = document.querySelector('.option-button2');
                        const optionButton3 = document.querySelector('.option-button3');

                    function triggerEvent(inData) {
                        eventZone.style.display = "flex";
                        eventZone.querySelector(".event-title").innerHTML = inData.event_title;
                        eventZone.querySelector(".event-image").style.backgroundImage = `url('${inData.event_img}')`;
                        eventZone.querySelector(".prompt-container").innerHTML = inData.event_description;
                        optionButtons.forEach((button) => button.classList.add("can-buy"));
                        console.log(optionButtons);

                        let currentMoney = parseInt(moneyNum.innerHTML.replace(/,/g, ''), 10);
                        
                        //option buttons setup
                        optionDescriptionArray[0].innerHTML = inData.options[0].option_name;
                        optionEnergyArray[0].innerHTML = inData.options[0].option_energy;
                        optionDrunkArray[0].innerHTML = inData.options[0].option_drunk;
                        optionMoneyArray[0].innerHTML = inData.options[0].option_money;
                        optionButtons[0].id = inData.options[0].option_id;
                        if (inData.options[0].option_money + currentMoney >= 0) optionButtons[0].addEventListener('click', sendChoice);
                        else {
                            optionButtons[0].innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><path d="M367.2 412.5L99.5 144.8C77.1 176.1 64 214.5 64 256c0 106 86 192 192 192c41.5 0 79.9-13.1 111.2-35.5zm45.3-45.3C434.9 335.9 448 297.5 448 256c0-106-86-192-192-192c-41.5 0-79.9 13.1-111.2 35.5L412.5 367.2zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256z"/></svg>';
                            optionButtons[0].style.fill = "firebrick";
                            optionButtons[0].classList.remove("can-buy");
                        }

                        optionDescriptionArray[1].innerHTML = inData.options[1].option_name;
                        optionEnergyArray[1].innerHTML = inData.options[1].option_energy;
                        optionDrunkArray[1].innerHTML = inData.options[1].option_drunk;
                        optionMoneyArray[1].innerHTML = inData.options[1].option_money;
                        optionButtons[1].id = inData.options[1].option_id;
                        if (inData.options[1].option_money + currentMoney >= 0) optionButtons[1].addEventListener('click', sendChoice);
                        else {
                            optionButtons[1].innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><path d="M367.2 412.5L99.5 144.8C77.1 176.1 64 214.5 64 256c0 106 86 192 192 192c41.5 0 79.9-13.1 111.2-35.5zm45.3-45.3C434.9 335.9 448 297.5 448 256c0-106-86-192-192-192c-41.5 0-79.9 13.1-111.2 35.5L412.5 367.2zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256z"/></svg>';
                            optionButtons[1].style.fill = "firebrick";
                            optionButtons[1].classList.remove("can-buy");
                        }

                        optionDescriptionArray[2].innerHTML = inData.options[2].option_name;
                        optionEnergyArray[2].innerHTML = inData.options[2].option_energy;
                        optionDrunkArray[2].innerHTML = inData.options[2].option_drunk;
                        optionMoneyArray[2].innerHTML = inData.options[2].option_money;
                        optionButtons[2].id = inData.options[2].option_id;
                        if (inData.options[2].option_money + currentMoney >= 0) optionButtons[2].addEventListener('click', sendChoice);
                        else {
                            optionButtons[2].innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><path d="M367.2 412.5L99.5 144.8C77.1 176.1 64 214.5 64 256c0 106 86 192 192 192c41.5 0 79.9-13.1 111.2-35.5zm45.3-45.3C434.9 335.9 448 297.5 448 256c0-106-86-192-192-192c-41.5 0-79.9 13.1-111.2 35.5L412.5 367.2zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256z"/></svg>';
                            optionButtons[2].style.fill = "firebrick";
                            optionButtons[2].classList.remove("can-buy");
                        }

                        //nested function - sends player's event choice for processing
                        function sendChoice(event) {
                            optionButtons[0].removeEventListener('click', sendChoice);
                            optionButtons[1].removeEventListener('click', sendChoice);
                            optionButtons[2].removeEventListener('click', sendChoice);
                            const currentPlayerState = JSON.stringify([event.currentTarget.id + ""]);
                            console.log(currentPlayerState);
                            fetch(`getOptionsResults.php`, {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json'
                                    },
                                    body: currentPlayerState
                                })
                                .then(response => {
                                    console.log(response);
                                    if (!response.ok) throw new Error('Network response was not ok');
                                    return response.json();
                                })
                                .then(optionResultsData => {
                                    console.log('Received data: ', optionResultsData);
                                    showResults(optionResultsData);
                                })
                                .catch(error => console.log(error));
                        }
                    }

                    //Battles
                        const battleZone = document.querySelector(".battle-zone");
                        playedCards = [];
                        currentRound = [];
                        currentEnemy = [];
                        button = document.querySelector(".battleStart");
                        mainBattleArea = document.querySelector(".main");

                        backgroundImages = ['pics/rooftop.jpeg', 'pics/ruraljapan.jpeg'];
                        currentSessionBG = backgroundImages[randomValue = Math.round(Math.random())];
                        document.querySelector(".container").style.backgroundImage = "url(" + currentSessionBG + ")";

                        //enemy section
                            enemyMoveset = document.querySelector(".enemymoves");
                            enemyPic = document.querySelector(".enemypic");
                            enemyName = document.querySelector(".enemyname");
                            enemyHealthBar = document.querySelector(".enemy-health-bar");
                            enemyHealthNum = document.querySelector(".enemy-health-num");
                            enemyMoves = [];

                        //user section
                            playerHealthBar = document.querySelector(".player-health-bar");
                            playerHealthNum = document.querySelector(".player-health-num");

                    function triggerBattle(data) {
                        console.log('works as intended');
                        backgroundImages = ['../battle/pics/rooftop.jpeg', '../battle/pics/ruraljapan.jpeg'];
                        currentSessionBG = backgroundImages[randomValue = Math.round(Math.random())];
                        document.querySelector(".container").style.backgroundImage = "url(" + currentSessionBG + ")";
                        battleZone.style.display = "flex";

                        currentEnemy = data;
                        enemyPic.src = "pics/" + data['enemy_img'];
                        enemyName.innerHTML = data['enemy_name'];
                        enemyHealthBar.value = data['enemy_energy'];
                        enemyHealthBar.max = data['enemy_energy'];
                        enemyHealthNum.innerHTML = data['enemy_energy'] + "/" + data['enemy_energy'];

                        enemyMoves = data['enemy_moves'];
                        enemyMovesetTitle = document.createElement("h3");
                        enemyMoves.forEach(function(move, index) {
                            enemyMove = document.createElement("div");
                            enemyMove.className = "enemyMove" + (index + 1)
                            enemyMove.id = "move" + move['move_id'];

                            enemyMoveName = document.createElement("div");
                            enemyMoveName.className = "move" + (index + 1) + "Name";
                            enemyMoveName.innerHTML = move['move_name'];

                            enemyMoveAttack = document.createElement("div");
                            enemyMoveAttack.className = "move" + (index + 1) + "Attack";
                            enemyMoveAttack.innerHTML = "Attack: " + move['move_attack'];

                            enemyMoveDefense = document.createElement("div");
                            enemyMoveDefense.className = "move" + (index + 1) + "Defense";
                            enemyMoveDefense.innerHTML = "Defend: " + move['move_defend'];

                            enemyMoveRegen = document.createElement("div");
                            enemyMoveRegen.className = "move" + (index + 1) + "Regen";
                            enemyMoveRegen.innerHTML = "Regen: " + move['move_regen'];

                            enemyMove.appendChild(enemyMoveName);
                            enemyMove.appendChild(enemyMoveAttack);
                            enemyMove.appendChild(enemyMoveDefense);
                            enemyMove.appendChild(enemyMoveRegen);

                            enemyMoveset.append(enemyMove);
                        });

                        //nested function - gameplay loop for card generation
                        function getNewCards() {
                            fetch('../battle/getCards.php')
                                .then(res => res.json())
                                .then(data => {
                                    console.log(data);
                                    cards = data;
                                    cardArea = document.querySelector(".bot");

                                    cards.slice(0, 4).forEach((card) => {
                                        cardDiv = document.createElement("div");
                                        cardDiv.className = "card";

                                        cardDiv.addEventListener("click", function(event) {
                                            event.stopPropagation();
                                            playedCards.push(card['card_name']);
                                            currentRound = card;
                                            enemyTurn = enemyMoves[Math.floor(Math.random() * 4)];

                                            takenPlayerDamage = currentRound['card_defense'] - enemyTurn['move_attack']; // -
                                            takenEnemyDamage = enemyTurn['move_defend'] - currentRound['card_attack']; // -
                                            totalPlayerRegen = currentRound['card_regen'];
                                            totalEnemyRegen = enemyTurn['move_regen'];

                                            if (takenPlayerDamage >= 0) {
                                                takenPlayerDamage = 0;
                                            } else takenPlayerDamage;

                                            if (takenEnemyDamage >= 0) {
                                                takenEnemyDamage = 0;
                                            } else takenEnemyDamage;

                                            roundPlayerEnergy = (takenPlayerDamage + totalPlayerRegen);
                                            roundEnemyEnergy = (takenEnemyDamage + totalEnemyRegen);

                                            if (enemyHealthBar.value + roundEnemyEnergy > currentEnemy['enemy_energy']) {
                                                enemyHealthBar.value = currentEnemy['enemy_energy'];
                                                enemyHealthNum.innerHTML = currentEnemy['enemy_energy'] + "/" + currentEnemy['enemy_energy'];
                                            } else {
                                                newEnemyHealthValue = (enemyHealthBar.value + roundEnemyEnergy);
                                                enemyHealthBar.value = newEnemyHealthValue;
                                                enemyHealthNum.innerHTML = newEnemyHealthValue + "/" + currentEnemy['enemy_energy'];
                                            }

                                            if (playerHealthBar.value + roundPlayerEnergy > 100) {
                                                playerHealthBar.value = 100;
                                                playerHealthNum.innerHTML = "100/100"
                                            } else {
                                                newPlayerHealthValue = (playerHealthBar.value + roundPlayerEnergy);
                                                playerHealthBar.value = newPlayerHealthValue;
                                                playerHealthNum.innerHTML = newPlayerHealthValue + "/100";
                                            }

                                            //upon win
                                            if (enemyHealthBar.value <= 0) {
                                                alert("Battle Over, you won!");
                                                location.reload();
                                            }

                                            //upon loss
                                            if (playerHealthBar.value <= 0) {
                                                alert("Battle Over, you lost!");
                                                location.reload();
                                            }

                                            console.log("Turn")
                                            console.log("Your Move: " + JSON.stringify(currentRound));
                                            console.log("Enemy Move: " + JSON.stringify(enemyTurn));
                                            if (playedCards.length % 4 == 0 && playedCards.length > 1) {
                                                getNewCards();
                                            }
                                            cardArea.removeChild(event.currentTarget);
                                        });

                                        cardImage = document.createElement("img");
                                        cardImage.className = "cardpic", cardImage.src = "../battle/pics/" + card['card_img'];

                                        cardDesc = document.createElement("div");
                                        cardDesc.className = "carddesc";

                                        cardTitle = document.createElement("div")
                                        cardTitle.className = "cardtitle";
                                        cardTitle.innerHTML = card['card_name'];

                                        cardAttack = document.createElement("div")
                                        cardAttack.className = "cardattack";
                                        cardAttack.innerHTML = "Attack: " + card['card_attack'];

                                        cardDefense = document.createElement("div")
                                        cardDefense.className = "carddefense";
                                        cardDefense.innerHTML = "Defense: " + card['card_defense'];

                                        cardRegen = document.createElement("div")
                                        cardRegen.className = "cardregen";
                                        cardRegen.innerHTML = "Regen: " + card['card_regen'];

                                        cardDesc.appendChild(cardTitle);
                                        cardDesc.appendChild(cardAttack);
                                        cardDesc.appendChild(cardDefense);
                                        cardDesc.appendChild(cardRegen);

                                        cardDiv.appendChild(cardImage);
                                        cardDiv.appendChild(cardDesc);

                                        cardArea.appendChild(cardDiv);
                                    });
                                });
                        }
                        getNewCards();
                    }
                    prepareRound();
                });
        });
    </script>
</body>

</html>