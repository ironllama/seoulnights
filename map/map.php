<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Map</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            width: 100vw;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .map {
            padding: 0 1em;
            width: 95vw;
            height: 95vh;
            background: #0f0f0f;
            border: 2px solid palegreen;
            box-shadow: 2px 2px hotpink;
            display: flex;
            align-items: center;
            justify-content: space-evenly;
            overflow: scroll;
            gap: 1em;
        }

        .location-card {
            background-color: linen;
            width: 100%;
            height: 20%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bolder;
            font-family: sans-serif;
        }

        .card-zone {
            height: 100%;
            width: 20%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 1.5em;
        }

        .focus {
            animation: 1s linear infinite alternate focused;
        }

        @keyframes focused {
            from {
                box-shadow: 0px 0px 0px hotpink;
            }

            to {
                box-shadow: 0px 0px 0px .3em hotpink;
            }
        }

        #encounter-zone {
            position: absolute;
            z-index: 999;
            width: 85vw;
            height: 85vh;
            background: #0f0f0f;
            display: none;
            flex-direction: row;
            border: 2px solid red;
        }

        .event-zone, .res {
            width: 100%;
            height: 100%;
            background: linen;

            display: none;
            flex-direction: row;
        }

        .event-section {
            height: 100%;
            width: 50%;
            border: 2px solid green;
        }

        .event-right {
            height: 50%;
            border: 2px solid yellow;
        }

        .option-button-container {
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
        }

        .option-button {
            height: 25%;
        }

        #encounter-result {
            position: absolute;
            z-index: 999;
            width: 85vw;
            height: 85vh;
            background: #0f0f0f;
            display: none;
            border: 2px solid purple;
        }
    </style>
</head>

<body>
    <div class="map"> <!-- excepting the first location, these should be generated from database pulls, displaying E/B and location name-->
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

        <!-- see map-card.php if you wanna generate locations in php -->

    </div>
    <div id="encounter-zone">
        <div class="event-zone">
            <div class="event-section">
                <div class="event-title"></div>
                <div class="event-image"></div>
            </div>
            <div class="event-section">
                <div class="event-right prompt-container"></div>
                <div class="event-right option-button-container">
                    <button id="option-button1" class="option-button">Option 1</button>
                    <button id="option-button2" class="option-button">Option 2</button>
                    <button id="option-button3" class="option-button">Option 3</button>
                </div>
            </div>
        </div>
        <!-- another div with a class of "battle" here -->
    </div>

    <div id="encounter-result">result of your choices will be shown here - yay</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        fetch('getLocationData.php')
            .then(res => res.json())
            .then(data => {
                console.log(data);
                console.log(data.length)

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

                            newLocationCard.id = data[0]["id"];
                            newLocationCard.textContent = data[0]["location_name"];
                            const locImg = document.createElement("img");
                            locImg.src = data[0]["img_url"];
                            newLocationCard.appendChild(locImg);
                            data.shift();

                            parentZone.appendChild(newLocationCard.cloneNode(true));
                        }
                    } else {
                        newLocationCard.classList.add("location-card");

                        newLocationCard.id = data[0]["id"];
                        newLocationCard.textContent = data[0]["location_name"];
                        const locImg = document.createElement("img");
                        locImg.src = data[0]["img_url"];
                        newLocationCard.appendChild(locImg);
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

                const encounterZone = document.querySelector("#encounter-zone");
                const eventZone = document.querySelector(".event-zone");

                const optionButton1 = document.getElementById('option-button1');
                const optionButton2 = document.getElementById('option-button2');
                const optionButton3 = document.getElementById('option-button3');
    
                const encounterResult = document.getElementById("encounter-result");

                function prepareRound() {
                    if (gameRound < 10) {

                        nextZone = document.querySelector("#zone" + (gameRound)); // identifying the next decision zone
                        nextCards = nextZone.querySelectorAll(".location-card"); // getting every card within the next decision zone

                        function locationClicked(event) {
                            nextCards.forEach((card) => card.removeEventListener("click", locationClicked));
                            let locationID = event.target.id + "";
                            //Thank you, Alex ㅠㅠ
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

                function locationTrigger(inData) {
                    nextCards.forEach((card) => card.classList.remove("focus"));
                    // Trigger event or battle at the location, currently only event default

                    encounterZone.style.display = "block";

                    function hidePops() {
                        encounterZone.style.display = "none";
                        eventZone.style.display = "none";
                        //add battleZone.style.display = "none" here
                        encounterResult.style.display = "flex";
                        encounterResult.addEventListener("click", () => encounterResult.style.display = "none");
                    }

                    function triggerEvent(inData) {
                        eventZone.style.display = "flex";
                        eventZone.querySelector(".event-title").innerHTML = inData.title;
                        eventZone.querySelector(".event-image").style.backgroundImage = `url('${inData.image}')`;
                        eventZone.querySelector(".prompt-container").innerHTML = inData.description;
                        eventZone.querySelector("#option-button1").innerHTML = inData.options;

                        optionButton1.addEventListener('click', function() {
                            //send choice value to db for game-state update
                            console.log("option 1 chosen");
                            hidePops();
                        }); 

                        optionButton2.addEventListener('click', function() {
                            //send choice value to db for game-state update
                            console.log("option 2 chosen");
                            hidePops();
                        });

                        optionButton3.addEventListener('click', function() {
                            //send choice value to db for game-state update
                            console.log("option 3 chosen");
                            hidePops();
                        });
                    }

                    //assuming event
                    triggerEvent(inData);

                    gameRound += 1;
                    prepareRound();
                }

                prepareRound();
            });
    });
</script>
</body>

</html>