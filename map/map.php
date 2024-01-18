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
                        <button class="option-button option-button1  can-choose">
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
                        <button class="option-button option-button2 can-choose">
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
                        <button class="option-button option-button3 can-choose">
                            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512">
                                <path d="M9.4 86.6C-3.1 74.1-3.1 53.9 9.4 41.4s32.8-12.5 45.3 0l192 192c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L178.7 256 9.4 86.6zM256 416H544c17.7 0 32 14.3 32 32s-14.3 32-32 32H256c-17.7 0-32-14.3-32-32s14.3-32 32-32z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="battle-zone dynamic-game-element">
            <div class="top">
                <div class="enemy-zone">
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
                    <div class="enemymove-zone"></div>
                </div>
            </div>
            <div class="card-area">
            </div>
            <div class="player-healthbar">
                <h5>Your Energy</h5>
                <progress max="100" value="100" class="player-health-bar"></progress>
                <span class="player-health-num">100</span>
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
        <div class="below-menu">
            <div class="below-menu-left"></div>
            <div class="leave-store-button">Leave Store</div>
        </div>
    </div>

    <div class="store-button-container">
        <div class="open-store-button focus-e"></div>
        <div class="store-intro">
            <p>Convenience Store</p>
            <p>(Visits Remaining: <span class="store-visits-left">2</span>)</p>
        </div>
    </div>

    <div class="dynamic-game-element battle-reward">
        <div>
            <h2>You win the battle! Choose your reward:</h2>
        </div>
        <div class="battle-reward-choice-container">
            <div class="battle-reward-button">
                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
                    <path d="M349.4 44.6c5.9-13.7 1.5-29.7-10.6-38.5s-28.6-8-39.9 1.8l-256 224c-10 8.8-13.6 22.9-8.9 35.3S50.7 288 64 288H175.5L98.6 467.4c-5.9 13.7-1.5 29.7 10.6 38.5s28.6 8 39.9-1.8l256-224c10-8.8 13.6-22.9 8.9-35.3s-16.6-20.7-30-20.7H272.5L349.4 44.6z" fill="cornflowerblue" />
                </svg>
                <div class="battle-reward-label">Energy Boost (+15)!</div>
            </div>
            <div class="battle-reward-button">
                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
                    <path d="M393.4 9.4c12.5-12.5 32.8-12.5 45.3 0l64 64c12.5 12.5 12.5 32.8 0 45.3c-11.8 11.8-30.7 12.5-43.2 1.9l-9.5 9.5-48.8 48.8c-9.2 9.2-11.5 22.9-8.6 35.6c9.4 40.9-1.9 85.6-33.8 117.5L197.3 493.3c-25 25-65.5 25-90.5 0l-88-88c-25-25-25-65.5 0-90.5L180.2 153.3c31.9-31.9 76.6-43.1 117.5-33.8c12.6 2.9 26.4 .5 35.5-8.6l48.8-48.8 9.5-9.5c-10.6-12.6-10-31.4 1.9-43.2zM99.3 347.3l65.4 65.4c6.2 6.2 16.4 6.2 22.6 0l97.4-97.4c6.2-6.2 6.2-16.4 0-22.6l-65.4-65.4c-6.2-6.2-16.4-6.2-22.6 0L99.3 324.7c-6.2 6.2-6.2 16.4 0 22.6z" fill="darkolivegreen" />
                </svg>
                <div class="battle-reward-label">Bottom's Up (+5)!</div>
            </div>
            <div class="battle-reward-button">
                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512">
                    <path d="M64 64C28.7 64 0 92.7 0 128V384c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64H64zm64 320H64V320c35.3 0 64 28.7 64 64zM64 192V128h64c0 35.3-28.7 64-64 64zM448 384c0-35.3 28.7-64 64-64v64H448zm64-192c-35.3 0-64-28.7-64-64h64v64zM288 160a96 96 0 1 1 0 192 96 96 0 1 1 0-192z" fill="gold" />
                </svg>
                <div class="battle-reward-label">Cha-ching (+20,000원)!</div>
            </div>
        </div>
    </div>

    <div class="map-key">
        <div class="battle-key">Battle = <div class="battle-square focus-b"></div>
        </div>
        <div class="event-key">Event = <div class="event-square focus-e"></div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            fetch('getLocationData.php')
                .then(res => res.json())
                .then(data => {
                    console.log(data);

                    //map generation
                    const mapElement = document.querySelector(".map");
                    let pathBranchesLeft = 4; // init how many path forks we want
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
                                newLocationCard.textContent = data[0]["location_name"];
                                newLocationCard.style.backgroundImage = "url(pics/" + data[0]["location_img"] + ")";
                                data.shift();

                                parentZone.appendChild(newLocationCard.cloneNode(true));
                            }
                        } else {
                            newLocationCard.classList.add("location-card");
                            newLocationCard.id = data[0]["location_id"];
                            newLocationCard.textContent = data[0]["location_name"];
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
                    const playerHUD = document.querySelector(".hud");
                    const energyBar = document.querySelector(".player-energy-bar");
                    const drunkBar = document.querySelector(".player-drunk-bar");
                    const energyNum = document.querySelector(".player-energy-num");
                    const drunkNum = document.querySelector(".player-drunk-num");
                    const moneyNum = document.querySelector(".player-money-num");

                    function updateHUD() {
                        fetch('updateHUD.php')
                            .then(res => res.json())
                            .then(data => {
                                console.log(data)
                                energyBar.value = data['run_energyLevel'];
                                energyNum.innerHTML = data['run_energyLevel'];
                                drunkBar.value = data['run_drunkLevel'];
                                drunkNum.innerHTML = data['run_drunkLevel'];
                                moneyNum.innerHTML = parseInt(data['run_moneyLevel']).toLocaleString('en-US') + "";

                                document.documentElement.style.setProperty('--maxblur', ((data['run_drunkLevel'] / 100) * 2 + "px"));
                                document.documentElement.style.setProperty('--midX', ((data['run_drunkLevel'] / 100) * 5 + "px"));
                                document.documentElement.style.setProperty('--maxX', ((data['run_drunkLevel'] / 100) * 10 + "px"));
                                document.documentElement.style.setProperty('--upY', ((data['run_drunkLevel'] / 100) * 5 + "px"));
                                document.documentElement.style.setProperty('--downY', ("-" + (data['run_drunkLevel'] / 100) * 5 + "px"));
                            });
                        playerVisualPulse(playerHUD);
                    }

                    function playerVisualPulse(inElem) {
                        if (inElem) {
                            inElem.classList.add("highlight");
                            setTimeout(function() {
                                inElem.classList.remove("highlight");
                            }, 1000);
                        }
                    }

                    //Encounter zones and their children
                    const encounterZone = document.querySelector("#encounter-zone");

                    //Endgame
                    const playAgainButton = document.querySelector(".play-again");
                    const leaderboardButton = document.querySelector(".see-leaderboard");
                    const endGame = document.querySelector("#end-game");

                    //Convenience Store
                    const storeScreen = document.querySelector(".convenience-store");
                    const storeButton = document.querySelector(".store-button-container");
                    storeButton.addEventListener("click", storeButtonHandler);
                    const leaveStoreButton = document.querySelector(".leave-store-button");
                    const storeVisitsLeft = document.querySelector(".store-visits-left");
                    const drinkContainer = document.querySelector('#drinks');
                    const foodContainer = document.querySelector('#food');

                    function storeButtonHandler() {
                        storeScreen.style.display = "flex";
                        leaveStoreButton.addEventListener("click", () => {
                            storeScreen.style.display = "none";
                            storeButton.style.display = "flex";
                        });
                        storeButton.style.display = "none";
                        updateVisitsLeft();
                    }

                    function updateVisitsLeft() {
                        fetch(`getEncounterData.php`, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/x-www-form-urlencoded'
                                },
                                body: `locationID=store`
                            })
                            .then(response => {
                                return response.text();
                            })
                            .then(visitsLeft => {
                                console.log('Received data:', visitsLeft);
                                if (visitsLeft <= 0) {
                                    storeButton.removeEventListener("click", storeButtonHandler);
                                    document.querySelector(".open-store-button").classList.remove("focus-e");
                                }
                                storeVisitsLeft.innerHTML = visitsLeft;
                            })
                            .catch(error => console.log(error));
                    }

                    function buyItem(event) {
                        let itemID = event.currentTarget.id.substring(1);
                        console.log(event.currentTarget.id.substring(1));
                        playerVisualPulse(event.currentTarget);
                        fetch('../convenience/buyItems.php', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json'
                                },
                                body: JSON.stringify(itemID)
                            })
                            .then(response => response.json())
                            .then(data => {
                                console.log(data);
                                updateHUD();
                            });
                        //update each button in store after purchase
                        document.querySelectorAll(".shopButton").forEach((item) => {
                            let checkItemID = item.id;
                            console.log(checkItemID);
                            fetch('../convenience/buyItems.php', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json'
                                    },
                                    body: JSON.stringify(checkItemID)
                                })
                                .then(response => response.json())
                                .then(data => {
                                    console.log(data);
                                    if (!data) {
                                        item.removeEventListener("click", buyItem);
                                        item.classList.add("cant-buy");
                                    } else item.classList.remove("cant-buy");
                                });
                        })
                    }

                    function getStoreItems() {
                        drinkContainer.innerHTML = "";
                        foodContainer.innerHTML = "";
                        fetch('../convenience/getStoreItems.php')
                            .then(response => response.json())
                            .then(data => {
                                console.log(data);
                                data.items['drink'].forEach(drink => {
                                    console.log(drink);
                                    var drinkButton = document.createElement('div');
                                    drinkButton.classList.add('shopButton');
                                    drinkButton.innerHTML = drink['item'] + "<br>" + Math.abs(drink['price_hit']).toLocaleString('en-US');
                                    drinkButton.id = "s" + drink['mart_id'];
                                    drinkButton.style.backgroundImage = "url(../convenience/mart_icons/" + drink["item_img"];
                                    if (parseInt(moneyNum.innerHTML.replace(/,/g, ''), 10) > drink['price_hit']) {
                                        drinkButton.addEventListener('click', buyItem);
                                    }
                                    drinkContainer.appendChild(drinkButton);
                                });

                                data.items['food'].forEach(food => {
                                    console.log(food);
                                    var foodButton = document.createElement('div');
                                    foodButton.classList.add('shopButton');
                                    foodButton.innerHTML = food['item'] + "<br>" + Math.abs(food['price_hit']).toLocaleString('en-US');
                                    foodButton.id = "s" + food['mart_id'];
                                    foodButton.style.backgroundImage = "url(../convenience/mart_icons/" + food["item_img"];
                                    if (parseInt(moneyNum.innerHTML.replace(/,/g, ''), 10) > food['price_hit']) {
                                        foodButton.addEventListener('click', buyItem);
                                    }
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
                                nextCards.forEach((card) => {
                                    if (card.id[0] === "e") card.classList.add("focus-e");
                                    else card.classList.add("focus-b");
                                });
                                nextCards.forEach((card) => {
                                    card.addEventListener("click", locationClicked);
                                });
                            }
                        }
                        getStoreItems();
                    }

                    //used assigned element data to retrieve associated data from the db and prepare the event or battle expected
                    function locationClicked(event) {
                        mapElement.scrollTo({
                            left: nextZone.offsetLeft,
                            behavior: 'smooth'
                        });
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
                        nextCards.forEach((card) => {
                            card.classList.remove("focus-e");
                            card.classList.remove("focus-b");
                        });
                        encounterZone.style.display = "block";
                        storeButton.style.display = "none";

                        if (inData['encounter_type'] == "event") {
                            triggerEvent(inData);
                        } else if (inData['encounter_type'] == "battle") {
                            triggerBattle(inData);
                        };

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
                        battleRewardScreen.style.display = "none";
                        encounterResult.style.display = "flex";
                        playerHUD.style.display = "flex";
                        console.log(inData);

                        energyChange.innerHTML = energyBar.value + " > " + inData['updatedEnergyLevel'];
                        drunkChange.innerHTML = drunkBar.value + " > " + inData['updatedDrunkLevel'];
                        moneyChange.innerHTML = moneyNum.innerHTML + " > " + inData['updatedMoneyLevel'].toLocaleString('en-US');

                        if (inData['updatedEnergyLevel'] <= 0) { //you lose
                            energyBar.value = 0;
                            energyNum.innerHTML = 0;
                            resolutionText.innerHTML = "You are out of energy and couldn't handle a night out in Hongdae! Try again?"
                            document.querySelector(".state-changes-container").innerHTML = "";
                            encounterResult.addEventListener("click", () => {
                                window.location.reload();
                            });
                        } else {
                            updateHUD();
                            if (gameRound >= cardZoneList.length - 1) {
                                encounterResult.addEventListener("click", () => endGame.style.display = "flex"); //end game
                                playAgainButton.addEventListener("click", () => window.location.reload());
                                leaderboardButton.addEventListener("click", () => window.location.href = "../leaderboard/leaderboard.php");
                            } else encounterResult.addEventListener("click", () => {
                                storeButton.style.display = "flex";
                                encounterResult.style.display = "none"
                            }); //click to continue game
                        }
                    }

                    //Events
                    const eventZone = document.querySelector(".event-zone");
                    const optionDescriptionArray = Array.from(document.querySelectorAll(".option-description"));
                    const optionEnergyArray = Array.from(document.querySelectorAll(".option-energy"));
                    const optionDrunkArray = Array.from(document.querySelectorAll(".option-drunk"));
                    const optionMoneyArray = Array.from(document.querySelectorAll(".option-money"));
                    const optionButtons = document.querySelectorAll('.option-button');

                    function triggerEvent(inData) {
                        eventZone.style.display = "flex";
                        eventZone.querySelector(".event-title").innerHTML = inData.event_title;
                        eventZone.querySelector(".event-image").style.backgroundImage = `url('${inData.event_img}')`;
                        eventZone.querySelector(".prompt-container").innerHTML = inData.event_description;
                        optionButtons.forEach((button) => {
                            button.classList.add("can-choose");
                            button.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512">
                                <path d="M9.4 86.6C-3.1 74.1-3.1 53.9 9.4 41.4s32.8-12.5 45.3 0l192 192c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L178.7 256 9.4 86.6zM256 416H544c17.7 0 32 14.3 32 32s-14.3 32-32 32H256c-17.7 0-32-14.3-32-32s14.3-32 32-32z" />
                            </svg>)`;
                            button.style.fill = "";
                        });
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
                            optionButtons[0].classList.remove("can-choose");
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
                            optionButtons[1].classList.remove("can-choose");
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
                            optionButtons[2].classList.remove("can-choose");
                        }

                        function sendChoice(event) { // nested function - sending the options data to be tracked once clicked
                            optionButtons[0].removeEventListener('click', sendChoice);
                            optionButtons[1].removeEventListener('click', sendChoice);
                            optionButtons[2].removeEventListener('click', sendChoice);
                            const currentPlayerState = JSON.stringify([event.currentTarget.id + ""]);
                            console.log(currentPlayerState);
                            fetch(`getEncounterResults.php`, {
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
                    cardArea = document.querySelector(".card-area");

                    //enemy section
                    enemyMoveset = document.querySelector(".enemymove-zone");
                    enemyPic = document.querySelector(".enemypic");
                    enemyName = document.querySelector(".enemyname");
                    enemyHealthBar = document.querySelector(".enemy-health-bar");
                    enemyHealthNum = document.querySelector(".enemy-health-num");
                    enemyMoves = [];

                    //user section
                    playerHealthBar = document.querySelector(".player-health-bar");
                    playerHealthNum = document.querySelector(".player-health-num");

                    //battle rewards
                    let battleRewardScreen = document.querySelector(".battle-reward");
                    let battleRewardButtons = document.querySelectorAll(".battle-reward-button");
                    battleRewardButtons[0].addEventListener("click", function() {
                        sendBattleReward("b1");
                    });
                    battleRewardButtons[1].addEventListener("click", function() {
                        sendBattleReward("b2");
                    });
                    battleRewardButtons[2].addEventListener("click", function() {
                        sendBattleReward("b3");
                    });

                    function sendBattleReward(inData) {
                        const rewardChoice = JSON.stringify(inData);
                        console.log(inData);
                        fetch(`getEncounterResults.php`, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json'
                                },
                                body: rewardChoice
                            })
                            .then(response => {
                                console.log(response);
                                if (!response.ok) throw new Error('Network response was not ok');
                                return response.json();
                            })
                            .then(encounterResultsData => {
                                console.log('Received data: ', encounterResultsData);
                                showResults(encounterResultsData);
                            })
                            .catch(error => console.log(error));
                    }

                    function triggerBattle(data) {
                        playerHUD.style.display = "none";
                        backgroundImages = ['pics/rooftop.jpeg', 'pics/ruraljapan.jpeg'];
                        currentSessionBG = backgroundImages[randomValue = Math.round(Math.random())];
                        battleZone.style.backgroundImage = "url(" + currentSessionBG + ")";
                        battleZone.style.display = "flex";
                        cardArea.innerHTML = ''; // empties out the cards from previous battle, basically makes sure its a clean slate
                        playerHealthBar.value = data['currentPlayerEnergy']; // initializes the healthbar value at begining of round to the current state of the game
                        playerHealthNum.innerHTML = data['currentPlayerEnergy']; // shows the client

                        // setting up battle 
                        // initializing enemy
                        currentEnemy = data; // mainly just to check whats coming back
                        enemyPic.src = "../battle/pics/" + data['enemy_img'];
                        enemyName.innerHTML = data['enemy_name'];
                        enemyHealthBar.value = data['enemy_energy'];
                        enemyHealthBar.max = data['enemy_energy'];
                        enemyHealthNum.innerHTML = data['enemy_energy'] + "/" + data['enemy_energy'];

                        // setting up enemy moves to visualize
                        enemyMoves = data['enemy_moves'];
                        enemyMovesetTitle = document.createElement("h3");
                        enemyMoves.forEach(function(move, index) {
                            enemyMove = document.createElement("div");
                            // enemyMove.className = "enemyMove" + (index + 1)
                            enemyMove.className = "enemyMove";
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

                            enemyMove.appendChild(enemyMoveName);
                            enemyMove.appendChild(enemyMoveAttack);
                            enemyMove.appendChild(enemyMoveDefense);

                            enemyMoveset.append(enemyMove);
                        });

                        enemyTurn = enemyMoves[Math.floor(Math.random() * 4)]; // enemy picks a random move from the 4 or however many available
                        console.log(enemyTurn);


                        //nested function - setting up cards available for client
                        function getNewCards() {
                            document.querySelectorAll(".enemyMove").forEach((elem) => {
                                if (elem.querySelector("div").innerHTML === enemyTurn["move_name"]) {
                                    elem.classList.add("focus-b");
                                } else elem.classList.remove("focus-b");
                            });
                            fetch('../battle/getCards.php')
                                .then(res => res.json())
                                .then(data => {
                                    console.log(data);
                                    cards = data;

                                    // card creation at bottom of battle screen
                                    cards.slice(0, 4).forEach((card) => { // only having first 4 cards
                                        cardDiv = document.createElement("div");
                                        cardDiv.className = "card";

                                        cardDiv.addEventListener("click", function(event) {
                                            event.stopPropagation();
                                            playedCards.push(card['card_name']); // pushing into array to track # of cards played
                                            currentRound = card; // currentRound is basically the card you clicked just so we can track and have battle logic be sound


                                            // putting the card you clicked, and enemy move into an array to push to an api
                                            roundData = [currentRound, enemyTurn];

                                            console.log(roundData); // the array

                                            fetch('getRoundResult.php', { // pushing into this api so that backend can do calc
                                                    method: 'POST',
                                                    headers: {
                                                        'Content-Type': 'application/json'
                                                    },
                                                    body: JSON.stringify(roundData)
                                                })
                                                .then(res => res.json())
                                                .then(data => { // what we get back is the updated values for the client
                                                    console.log(data);

                                                    updatedHealth = data['updatedEnergyLevel'];
                                                    updatedMoney = data['updatedMoneyLevel'];
                                                    updatedDrunk = data['updatedDrunkLevel'];

                                                    playerHealthBar.value = updatedHealth; // updates actual value here
                                                    playerHealthNum.innerHTML = updatedHealth + "/100"; // updates for client here so they can view

                                                })

                                            // enemy stuff is all done on front end
                                            // enemy battle logic which is also the exact same for client, but done on back end
                                            takenEnemyDamage = enemyTurn['move_defend'] - currentRound['card_attack']; // -
                                            totalEnemyRegen = enemyTurn['move_regen'];

                                            /* because takenEnemyDamage is calc by enemy_defense# - client_attack#, sometimes enemy defense is higher
                                            because the final calc is done by taking the takenEnemyDamage and adding it to the regen, 
                                            we don't want to add instances where defense is higher because that shouldnt count as regen
                                                so we make it 0, otherwise calculation is correct
                                            */
                                            if (takenEnemyDamage >= 0) {
                                                takenEnemyDamage = 0;
                                            } else takenEnemyDamage;

                                            // roundEnemyEnergy = total damage taken by enemy + total amount regen
                                            // ex. -6 (0 defense from enemy - 6 attack from client ) + 10 (total regen by enemy) = 4. enemy gains 4 health
                                            roundEnemyEnergy = (takenEnemyDamage + totalEnemyRegen);

                                            // this is how the enemy health value gets updated, but it cant go over what it started with
                                            if (enemyHealthBar.value + roundEnemyEnergy > currentEnemy['enemy_energy']) {
                                                enemyHealthBar.value = currentEnemy['enemy_energy'];
                                                enemyHealthNum.innerHTML = currentEnemy['enemy_energy'] + "/" + currentEnemy['enemy_energy'];
                                            } else {
                                                newEnemyHealthValue = (enemyHealthBar.value + roundEnemyEnergy);
                                                enemyHealthBar.value = newEnemyHealthValue;
                                                enemyHealthNum.innerHTML = newEnemyHealthValue + "/" + currentEnemy['enemy_energy'];
                                            }

                                            //upon win
                                            if (enemyHealthBar.value <= 0) {
                                                playedCards = [];
                                                enemyMoveset.innerHTML = '';
                                                alert("Battle Over, you won!");
                                                battleZone.style.display = "none";
                                                battleRewardScreen.style.display = "flex";
                                                updateHUD();
                                                playerHUD.style.display = "flex";
                                            }

                                            //upon loss
                                            if (playerHealthBar.value <= 0) {
                                                playedCards = [];
                                                alert("Battle Over, you lost!");
                                                fetch('getRoundResult.php')
                                                    .then(res => res.json())
                                                    .then(data => showResults(data))
                                            }

                                            // just console.log stuff to verify results
                                            console.log("Turn")
                                            console.log("Your Move: " + JSON.stringify(currentRound));
                                            console.log("Enemy Move: " + JSON.stringify(enemyTurn));

                                            // logic to see if new cards are needed. we check length of playedcards
                                            // if they've played 4, rerun the getNewCards function
                                            if (playedCards.length % 4 == 0 && playedCards.length > 1) {
                                                getNewCards();
                                            }

                                            // remove the card upon click
                                            cardArea.removeChild(event.currentTarget);

                                            enemyTurn = enemyMoves[Math.floor(Math.random() * 4)];
                                            console.log(enemyTurn);

                                            document.querySelectorAll(".enemyMove").forEach((elem) => {
                                                if (elem.querySelector("div").innerHTML === enemyTurn["move_name"]) {
                                                    elem.classList.add("focus-b");
                                                } else elem.classList.remove("focus-b");
                                            });
                                        });

                                        // actually creating the cards
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

                                        cardDesc.appendChild(cardTitle);
                                        cardDesc.appendChild(cardAttack);
                                        cardDesc.appendChild(cardDefense);

                                        cardDiv.appendChild(cardImage);
                                        cardDiv.appendChild(cardDesc);

                                        cardArea.appendChild(cardDiv);
                                    })
                                })
                        }
                        // run this function at the beginning of each battle clicked
                        getNewCards();
                    }

                    prepareRound();
                });
        });
    </script>
</body>

</html>