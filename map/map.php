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

        <div class="hud">
            <div class="username">Player: <?php echo $_SESSION['name'] ?></div>
            <div class="stat">
                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512"><path d="M349.4 44.6c5.9-13.7 1.5-29.7-10.6-38.5s-28.6-8-39.9 1.8l-256 224c-10 8.8-13.6 22.9-8.9 35.3S50.7 288 64 288H175.5L98.6 467.4c-5.9 13.7-1.5 29.7 10.6 38.5s28.6 8 39.9-1.8l256-224c10-8.8 13.6-22.9 8.9-35.3s-16.6-20.7-30-20.7H272.5L349.4 44.6z" fill="cornflowerblue"/></svg>
                <label>Energy:</label>
                <div class="progress-container">
                    <progress max="100" value="100" class="player-energy-bar"></progress>
                    <span class="player-energy-num">100</span>
                </div>
            </div>
            <div class="stat">
                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><path d="M393.4 9.4c12.5-12.5 32.8-12.5 45.3 0l64 64c12.5 12.5 12.5 32.8 0 45.3c-11.8 11.8-30.7 12.5-43.2 1.9l-9.5 9.5-48.8 48.8c-9.2 9.2-11.5 22.9-8.6 35.6c9.4 40.9-1.9 85.6-33.8 117.5L197.3 493.3c-25 25-65.5 25-90.5 0l-88-88c-25-25-25-65.5 0-90.5L180.2 153.3c31.9-31.9 76.6-43.1 117.5-33.8c12.6 2.9 26.4 .5 35.5-8.6l48.8-48.8 9.5-9.5c-10.6-12.6-10-31.4 1.9-43.2zM99.3 347.3l65.4 65.4c6.2 6.2 16.4 6.2 22.6 0l97.4-97.4c6.2-6.2 6.2-16.4 0-22.6l-65.4-65.4c-6.2-6.2-16.4-6.2-22.6 0L99.3 324.7c-6.2 6.2-6.2 16.4 0 22.6z" fill="darkolivegreen"/></svg>
                <label>Drunk:</label>
                <div class="progress-container">
                    <progress max="100" value="0" class="player-drunk-bar"></progress>
                    <span class="player-drunk-num">0</span>
                </div>
            </div>
            <div class="stat money-container">
                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512"><path d="M64 64C28.7 64 0 92.7 0 128V384c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64H64zm64 320H64V320c35.3 0 64 28.7 64 64zM64 192V128h64c0 35.3-28.7 64-64 64zM448 384c0-35.3 28.7-64 64-64v64H448zm64-192c-35.3 0-64-28.7-64-64h64v64zM288 160a96 96 0 1 1 0 192 96 96 0 1 1 0-192z" fill="gold"/></svg>
                <label>Money:</label>
                <span class="player-money-num">100,000</span>
            </div>
        </div>

    </div>

    <div id="encounter-zone">
        <div class="event-zone">
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
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512"><path d="M349.4 44.6c5.9-13.7 1.5-29.7-10.6-38.5s-28.6-8-39.9 1.8l-256 224c-10 8.8-13.6 22.9-8.9 35.3S50.7 288 64 288H175.5L98.6 467.4c-5.9 13.7-1.5 29.7 10.6 38.5s28.6 8 39.9-1.8l256-224c10-8.8 13.6-22.9 8.9-35.3s-16.6-20.7-30-20.7H272.5L349.4 44.6z"/></svg>
                                    <div class="option-energy"></div>
                                </div>
                                <div class="drunk-svg-box svg-box">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><path d="M393.4 9.4c12.5-12.5 32.8-12.5 45.3 0l64 64c12.5 12.5 12.5 32.8 0 45.3c-11.8 11.8-30.7 12.5-43.2 1.9l-9.5 9.5-48.8 48.8c-9.2 9.2-11.5 22.9-8.6 35.6c9.4 40.9-1.9 85.6-33.8 117.5L197.3 493.3c-25 25-65.5 25-90.5 0l-88-88c-25-25-25-65.5 0-90.5L180.2 153.3c31.9-31.9 76.6-43.1 117.5-33.8c12.6 2.9 26.4 .5 35.5-8.6l48.8-48.8 9.5-9.5c-10.6-12.6-10-31.4 1.9-43.2zM99.3 347.3l65.4 65.4c6.2 6.2 16.4 6.2 22.6 0l97.4-97.4c6.2-6.2 6.2-16.4 0-22.6l-65.4-65.4c-6.2-6.2-16.4-6.2-22.6 0L99.3 324.7c-6.2 6.2-6.2 16.4 0 22.6z"/></svg>
                                    <div class="option-drunk"></div>
                                </div>
                                <div class="money-svg-box svg-box">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512"><path d="M64 64C28.7 64 0 92.7 0 128V384c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64H64zm64 320H64V320c35.3 0 64 28.7 64 64zM64 192V128h64c0 35.3-28.7 64-64 64zM448 384c0-35.3 28.7-64 64-64v64H448zm64-192c-35.3 0-64-28.7-64-64h64v64zM288 160a96 96 0 1 1 0 192 96 96 0 1 1 0-192z"/></svg>
                                    <div class="option-money"></div>
                                </div>
                            </div>
                        </div>
                        <button class="option-button option-button1">
                            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512"><path d="M9.4 86.6C-3.1 74.1-3.1 53.9 9.4 41.4s32.8-12.5 45.3 0l192 192c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L178.7 256 9.4 86.6zM256 416H544c17.7 0 32 14.3 32 32s-14.3 32-32 32H256c-17.7 0-32-14.3-32-32s14.3-32 32-32z"/></svg>
                        </button>
                    </div>
                    <div class="option-container">
                    <div class="option-info">
                            <div class="option-description"></div>
                            <div class="option-EDMchanges">
                                <div class="energy-svg-box svg-box">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512"><path d="M349.4 44.6c5.9-13.7 1.5-29.7-10.6-38.5s-28.6-8-39.9 1.8l-256 224c-10 8.8-13.6 22.9-8.9 35.3S50.7 288 64 288H175.5L98.6 467.4c-5.9 13.7-1.5 29.7 10.6 38.5s28.6 8 39.9-1.8l256-224c10-8.8 13.6-22.9 8.9-35.3s-16.6-20.7-30-20.7H272.5L349.4 44.6z"/></svg>
                                    <div class="option-energy"></div>
                                </div>
                                <div class="drunk-svg-box svg-box">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><path d="M393.4 9.4c12.5-12.5 32.8-12.5 45.3 0l64 64c12.5 12.5 12.5 32.8 0 45.3c-11.8 11.8-30.7 12.5-43.2 1.9l-9.5 9.5-48.8 48.8c-9.2 9.2-11.5 22.9-8.6 35.6c9.4 40.9-1.9 85.6-33.8 117.5L197.3 493.3c-25 25-65.5 25-90.5 0l-88-88c-25-25-25-65.5 0-90.5L180.2 153.3c31.9-31.9 76.6-43.1 117.5-33.8c12.6 2.9 26.4 .5 35.5-8.6l48.8-48.8 9.5-9.5c-10.6-12.6-10-31.4 1.9-43.2zM99.3 347.3l65.4 65.4c6.2 6.2 16.4 6.2 22.6 0l97.4-97.4c6.2-6.2 6.2-16.4 0-22.6l-65.4-65.4c-6.2-6.2-16.4-6.2-22.6 0L99.3 324.7c-6.2 6.2-6.2 16.4 0 22.6z"/></svg>
                                    <div class="option-drunk"></div>
                                </div>
                                <div class="money-svg-box svg-box">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512"><path d="M64 64C28.7 64 0 92.7 0 128V384c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64H64zm64 320H64V320c35.3 0 64 28.7 64 64zM64 192V128h64c0 35.3-28.7 64-64 64zM448 384c0-35.3 28.7-64 64-64v64H448zm64-192c-35.3 0-64-28.7-64-64h64v64zM288 160a96 96 0 1 1 0 192 96 96 0 1 1 0-192z"/></svg>
                                    <div class="option-money"></div>
                                </div>
                            </div>
                        </div>
                        <button class="option-button option-button2">
                            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512"><path d="M9.4 86.6C-3.1 74.1-3.1 53.9 9.4 41.4s32.8-12.5 45.3 0l192 192c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L178.7 256 9.4 86.6zM256 416H544c17.7 0 32 14.3 32 32s-14.3 32-32 32H256c-17.7 0-32-14.3-32-32s14.3-32 32-32z"/></svg>
                        </button>
                    </div>
                    <div class="option-container">
                    <div class="option-info">
                            <div class="option-description"></div>
                            <div class="option-EDMchanges">
                                <div class="energy-svg-box svg-box">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512"><path d="M349.4 44.6c5.9-13.7 1.5-29.7-10.6-38.5s-28.6-8-39.9 1.8l-256 224c-10 8.8-13.6 22.9-8.9 35.3S50.7 288 64 288H175.5L98.6 467.4c-5.9 13.7-1.5 29.7 10.6 38.5s28.6 8 39.9-1.8l256-224c10-8.8 13.6-22.9 8.9-35.3s-16.6-20.7-30-20.7H272.5L349.4 44.6z"/></svg>
                                    <div class="option-energy"></div>
                                </div>
                                <div class="drunk-svg-box svg-box">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><path d="M393.4 9.4c12.5-12.5 32.8-12.5 45.3 0l64 64c12.5 12.5 12.5 32.8 0 45.3c-11.8 11.8-30.7 12.5-43.2 1.9l-9.5 9.5-48.8 48.8c-9.2 9.2-11.5 22.9-8.6 35.6c9.4 40.9-1.9 85.6-33.8 117.5L197.3 493.3c-25 25-65.5 25-90.5 0l-88-88c-25-25-25-65.5 0-90.5L180.2 153.3c31.9-31.9 76.6-43.1 117.5-33.8c12.6 2.9 26.4 .5 35.5-8.6l48.8-48.8 9.5-9.5c-10.6-12.6-10-31.4 1.9-43.2zM99.3 347.3l65.4 65.4c6.2 6.2 16.4 6.2 22.6 0l97.4-97.4c6.2-6.2 6.2-16.4 0-22.6l-65.4-65.4c-6.2-6.2-16.4-6.2-22.6 0L99.3 324.7c-6.2 6.2-6.2 16.4 0 22.6z"/></svg>
                                    <div class="option-drunk"></div>
                                </div>
                                <div class="money-svg-box svg-box">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512"><path d="M64 64C28.7 64 0 92.7 0 128V384c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64H64zm64 320H64V320c35.3 0 64 28.7 64 64zM64 192V128h64c0 35.3-28.7 64-64 64zM448 384c0-35.3 28.7-64 64-64v64H448zm64-192c-35.3 0-64-28.7-64-64h64v64zM288 160a96 96 0 1 1 0 192 96 96 0 1 1 0-192z"/></svg>
                                    <div class="option-money"></div>
                                </div>
                            </div>
                        </div>
                        <button class="option-button option-button3">
                            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512"><path d="M9.4 86.6C-3.1 74.1-3.1 53.9 9.4 41.4s32.8-12.5 45.3 0l192 192c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L178.7 256 9.4 86.6zM256 416H544c17.7 0 32 14.3 32 32s-14.3 32-32 32H256c-17.7 0-32-14.3-32-32s14.3-32 32-32z"/></svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="battle-zone">
            <img class="enemy" src="" />
            <div class="PC-cards"></div>
        </div>
    </div>

    <div id="encounter-result">
        <div class="resolution-text">Your night continues!</div>
        <div class="state-changes-container">
            <div class="attribute energy">
                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512"><path d="M349.4 44.6c5.9-13.7 1.5-29.7-10.6-38.5s-28.6-8-39.9 1.8l-256 224c-10 8.8-13.6 22.9-8.9 35.3S50.7 288 64 288H175.5L98.6 467.4c-5.9 13.7-1.5 29.7 10.6 38.5s28.6 8 39.9-1.8l256-224c10-8.8 13.6-22.9 8.9-35.3s-16.6-20.7-30-20.7H272.5L349.4 44.6z" fill="cornflowerblue"/></svg>
                <div class="energy-num">energy change value</div>
            </div>
            <div class="attribute drunk">
                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><path d="M393.4 9.4c12.5-12.5 32.8-12.5 45.3 0l64 64c12.5 12.5 12.5 32.8 0 45.3c-11.8 11.8-30.7 12.5-43.2 1.9l-9.5 9.5-48.8 48.8c-9.2 9.2-11.5 22.9-8.6 35.6c9.4 40.9-1.9 85.6-33.8 117.5L197.3 493.3c-25 25-65.5 25-90.5 0l-88-88c-25-25-25-65.5 0-90.5L180.2 153.3c31.9-31.9 76.6-43.1 117.5-33.8c12.6 2.9 26.4 .5 35.5-8.6l48.8-48.8 9.5-9.5c-10.6-12.6-10-31.4 1.9-43.2zM99.3 347.3l65.4 65.4c6.2 6.2 16.4 6.2 22.6 0l97.4-97.4c6.2-6.2 6.2-16.4 0-22.6l-65.4-65.4c-6.2-6.2-16.4-6.2-22.6 0L99.3 324.7c-6.2 6.2-6.2 16.4 0 22.6z" fill="darkolivegreen"/></svg>
                <div class="drunk-num">drunk change value</div>
            </div>
            <div class="attribute money">
                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512"><path d="M64 64C28.7 64 0 92.7 0 128V384c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64H64zm64 320H64V320c35.3 0 64 28.7 64 64zM64 192V128h64c0 35.3-28.7 64-64 64zM448 384c0-35.3 28.7-64 64-64v64H448zm64-192c-35.3 0-64-28.7-64-64h64v64zM288 160a96 96 0 1 1 0 192 96 96 0 1 1 0-192z" fill="gold"/></svg>
                <div class="money-num">money change value</div>
            </div>
        </div>
        <h3>click to continue...</h3>
    </div>

    <div id="end-game">
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

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            fetch('getLocationData.php')
                .then(res => res.json())
                .then(data => {
                    console.log(data);
                    // console.log(data.length)

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
                                // const locImg = document.createElement("img");
                                // locImg.src = data[0]["img_url"];
                                // newLocationCard.appendChild(locImg);
                                data.shift();

                                parentZone.appendChild(newLocationCard.cloneNode(true));
                            }
                        } else {
                            newLocationCard.classList.add("location-card");

                            newLocationCard.id = data[0]["location_id"];
                            newLocationCard.textContent = "" + newLocationCard.id[0] + " - " + data[0]["location_name"];
                            newLocationCard.style.backgroundImage = "url(pics/" + data[0]["location_img"] + ")";
                            // const locImg = document.createElement("img");
                            // locImg.src = data[0]["img_url"];
                            // newLocationCard.appendChild(locImg);
                            data.shift();

                            parentZone.appendChild(newLocationCard);
                        }

                        i++;
                    }

                    //game prep and start
                    let gameRound = 0;

                    //get DOM elements
                    const currentZone = document.querySelector("#start")
                    let currentCards = currentZone.querySelectorAll(".location-card");

                    let nextZone = document.querySelector("#zone" + (gameRound));
                    let nextCards = nextZone.querySelectorAll(".location-card");
                    const cardZoneList = document.querySelectorAll(".card-zone"); //creates a nodelist of zones
                    const lastZone = cardZoneList[cardZoneList.length - 1]; //final round

                    const encounterZone = document.querySelector("#encounter-zone");
                    const endGame = document.querySelector("#end-game");
                    //event
                    const eventZone = document.querySelector(".event-zone");
                    
                    const optionDescriptionArray = Array.from(document.querySelectorAll(".option-description"));
                    const optionEnergyArray = Array.from(document.querySelectorAll(".option-energy"));
                    const optionDrunkArray = Array.from(document.querySelectorAll(".option-drunk"));
                    const optionMoneyArray = Array.from(document.querySelectorAll(".option-money"));
                    const optionButton1 = document.querySelector('.option-button1');
                    const optionButton2 = document.querySelector('.option-button2');
                    const optionButton3 = document.querySelector('.option-button3');
                    //battle
                    const battleZone = document.querySelector(".battle-zone");
                    const pcCardZone = document.querySelector(".PC-cards");
                    //result
                    const encounterResult = document.getElementById("encounter-result");
                    const resolutionText = document.querySelector(".resolution-text");
                    const energyChange = document.querySelector(".energy-num");
                    const drunkChange = document.querySelector(".drunk-num");
                    const moneyChange = document.querySelector(".money-num");
                    //hud
                    const energyBar = document.querySelector(".player-energy-bar");
                    const drunkBar = document.querySelector(".player-drunk-bar");
                    const energyNum = document.querySelector(".player-energy-num");
                    const drunkNum = document.querySelector(".player-drunk-num");
                    const moneyNum = document.querySelector(".player-money-num");

                    function prepareRound() {
                        if (gameRound < cardZoneList.length - 1) {

                            nextZone = document.querySelector("#zone" + (gameRound)); // identifying the next decision zone
                            nextCards = nextZone.querySelectorAll(".location-card"); // getting every card within the next decision zone

                            function locationClicked(event) {
                                nextCards.forEach((card) => card.removeEventListener("click", locationClicked));
                                const locationID = event.target.id + "";

                                fetch(`getEventData.php`, {
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

                            if (nextCards) { // if cards in the current zone exist
                                nextCards.forEach((card) => card.classList.add("focus")); // adding a focus class to each card in the current zone
                                nextCards.forEach((card) => card.addEventListener("click", locationClicked)); // essentially removing the click event listener after been clicked
                                if (nextCards.length == 2) {
                                    console.log("Player is at a choice of " + nextCards[0].innerHTML + " or " + nextCards[1].innerHTML); // Log player's location
                                } else console.log("Player is at choice of " + nextCards[0].innerHTML);
                            }
                        }
                    }

                    function locationTrigger(inData) { // once you click on a location this function is triggered
                        nextCards.forEach((card) => card.classList.remove("focus")); // removing focus from the locations in the clicked zone
                        encounterZone.style.display = "block"; //displaying the encounter zone

                        function showResults(inData) { // creating a function that hides the popup
                            encounterZone.style.display = "none"; // hides the encounter zone
                            eventZone.style.display = "none"; // hides the eventzone
                            battleZone.style.display = "none"; // hides the battlezone
                            encounterResult.style.display = "flex"; // displays encounterResult
                            console.log((inData['updatedDrunkLevel']/100)*2 + "px");
                            document.documentElement.style.setProperty('--maxblur', ((inData['updatedDrunkLevel']/100)*2 + "px")); //needs to be tweaked
                            document.documentElement.style.setProperty('--midX', ((inData['updatedDrunkLevel']/100)*5 + "px")); //needs to be tweaked
                            document.documentElement.style.setProperty('--maxX', ((inData['updatedDrunkLevel']/100)*10 + "px")); //needs to be tweaked
                            document.documentElement.style.setProperty('--upY', ((inData['updatedDrunkLevel']/100)*5 + "px")); //needs to be tweaked
                            document.documentElement.style.setProperty('--downY', ("-" + (inData['updatedDrunkLevel']/100)*5 + "px")); //needs to be tweaked
                            energyChange.innerHTML = energyBar.value + " > " + inData['updatedEnergyLevel'];
                            drunkChange.innerHTML = drunkBar.value + " > " + inData['updatedDrunkLevel'];
                            moneyChange.innerHTML = moneyNum.innerHTML + " > " + inData['updatedMoneyLevel'].toLocaleString('en-US');

                            if (inData['updatedEnergyLevel'] <= 0) {
                                //you lose
                                energyBar.value = 0;
                                energyNum.innerHTML = 0;
                                resolutionText.innerHTML = "You are out of energy and couldn't handle a night out in Hongdae! Try again?"
                                document.querySelector(".state-changes-container").innerHTML = "";
                                encounterResult.addEventListener("click", () => {
                                    window.location.reload();
                                });
                            } else {
                            //update hud - energyBar.value, drunkBar.value, energyNum.innerHTML, drunkNum.innerHTMl
                                energyBar.value = inData['updatedEnergyLevel'];
                                energyNum.innerHTML = inData['updatedEnergyLevel'];
                                drunkBar.value = inData['updatedDrunkLevel'];
                                drunkNum.innerHTML = inData['updatedDrunkLevel'];
                                moneyNum.innerHTML = parseInt(inData['updatedMoneyLevel']).toLocaleString('en-US') + "";
                                if (gameRound >= cardZoneList.length - 1) {
                                    encounterResult.addEventListener("click", () => endGame.style.display = "flex"); //end game
                                } else encounterResult.addEventListener("click", () => encounterResult.style.display = "none"); //click to continue game
                            }
                        }

                        function triggerEvent(inData) {
                            eventZone.style.display = "flex"; // displays eventzone
                            eventZone.querySelector(".event-title").innerHTML = inData.event_title; // assigns eventzone title to the returned datasets title key value pair
                            eventZone.querySelector(".event-image").style.backgroundImage = `url('${inData.event_img}')`; // sets background image to event_img key value pair
                            eventZone.querySelector(".prompt-container").innerHTML = inData.event_description; // sets description to event_desc key value pair

                            let currentMoney = parseInt(moneyNum.innerHTML.replace(/,/g, ''), 10);

                            optionDescriptionArray[0].innerHTML = inData.options[0].option_name;
                            optionEnergyArray[0].innerHTML = inData.options[0].option_energy;
                            optionDrunkArray[0].innerHTML = inData.options[0].option_drunk;
                            optionMoneyArray[0].innerHTML = inData.options[0].option_money;
                            optionButton1.id = inData.options[0].option_id;
                            if (inData.options[0].option_money + currentMoney >= 0) optionButton1.addEventListener('click', sendChoice);
                            else optionButton1.style.backgroundColor = "red"; //not enough money

                            optionDescriptionArray[1].innerHTML = inData.options[1].option_name;
                            optionEnergyArray[1].innerHTML = inData.options[1].option_energy;
                            optionDrunkArray[1].innerHTML = inData.options[1].option_drunk;
                            optionMoneyArray[1].innerHTML = inData.options[1].option_money;
                            optionButton2.id = inData.options[1].option_id;
                            if (inData.options[1].option_money + currentMoney >= 0) optionButton2.addEventListener('click', sendChoice);
                            else optionButton2.style.backgroundColor = "red"; //not enough money

                            optionDescriptionArray[2].innerHTML = inData.options[2].option_name;
                            optionEnergyArray[2].innerHTML = inData.options[2].option_energy;
                            optionDrunkArray[2].innerHTML = inData.options[2].option_drunk;
                            optionMoneyArray[2].innerHTML = inData.options[2].option_money;
                            optionButton3.id = inData.options[2].option_id;
                            if (inData.options[2].option_money + currentMoney >= 0) optionButton3.addEventListener('click', sendChoice);
                            else optionButton3.style.backgroundColor = "red"; //not enough money

                            function sendChoice(event) { // function for sending the options data to be tracked once clicked
                                optionButton1.removeEventListener('click', sendChoice);
                                optionButton1.style.backgroundColor = "";
                                optionButton2.removeEventListener('click', sendChoice);
                                optionButton2.style.backgroundColor = "";
                                optionButton3.removeEventListener('click', sendChoice);
                                optionButton3.style.backgroundColor = "";
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

                        //this is loose af
                        function triggerBattle(inData) {

                            //get enemy data
                            fetch(`getBattleData.php`, {
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
                                .then(battleData => {
                                    console.log('Received data:', battleData);
                                })
                                .catch(error => console.log(error));

                            //get card data
                            // fetch(`getPCCardData.php`, {
                            //         method: 'POST',
                            //     })
                            //     .then(response => {
                            //         console.log(response);
                            //         if (!response.ok) throw new Error('Network response was not ok');
                            //         return response.json();
                            //     })
                            //     .then(PCcardData => {
                            //         console.log('Received data:', PCcardData);
                            //     })
                            //     .catch(error => console.log(error));
                        }

                        function playCard() {
                            //what does the card do when clicked?
                        }

                        //generate battle
                        // battleZone.style.display = "flex";
                        // document.querySelector(".enemy").style.backgroundImage = //battleData.img_url;
                        //     PCcardData.forEach((card) => {
                        //         const newCardDiv = document.createElement("div");
                        //         newCardDiv.classList.add("card-body");
                        //         newCardDiv.innerHTML = `<div class="card-image"></div>
                        //                             <div class="card-text">
                        //                             <span class="card-title"></span>
                        //                             <span class="card-action-text"></span>
                        //                             </div>`;
                        //         newCardDiv.querySelector(".card-image").backgroundImage = card.card_img;
                        //         newCardDiv.querySelector(".card-title").innerHTML = card.card_text;
                        //         newCardDiv.querySelector(".card-action-text").innerHTML = card.card_action_text;
                        //         newCardDiv.addEventListener("click", playCard);
                        //         pcCardZone.appendChild(newCardDiv);
                        //     });

                        //assuming event, will later need a flag and if/else for "e" or "b"
                        triggerEvent(inData);
                        //or triggerBattle(inData);

                        gameRound += 1;
                        prepareRound();
                    }

                    prepareRound();
                });
        });
    </script>
</body>

</html>