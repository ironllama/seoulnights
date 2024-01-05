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

    <script>
        mapArray = [];

        //import map data here (a sample array is provided below)
        document.addEventListener("DOMContentLoaded", () => {
            fetch('getLocationData.php')
                .then(res => res.json())
                .then(data => {
                    console.log(data);
                    console.log(data.length)

                    for (a = 0; a < data.length; a++) {
                        mapArray.push(data[a]['location_name']);
                    }

                    //map generation
                    // const testArray = ["samgyupsal", "pocha", "playground", "noraebang", "Bar Da", "Club FF", "chimaek", "place 8", "place 9", "place 10", "place 11", "place 12", "place 13", "place 14"];

                    const mapElement = document.querySelector(".map");
                    let pathBranchesLeft = 4;
                    let i = 0; // ultimately ends up being the zone identifier

                    // ** FIXED ** this works in all cases except when there is a branch at the wrong time, and causes "parentZone" to be null at that point (missing place14) ** FIXED **
                    while (mapArray.length > 0) {
                        let branchPath = false;
                        const newLocationCard = document.createElement("div");
                        const parentZone = document.querySelector("#zone" + i);

                        // Calculate remaining non-branch iterations
                        const remainingNonBranchIterations = mapArray.length - pathBranchesLeft * 2;

                        // Determine if a branch should be created based on remaining iterations and branches
                        if (pathBranchesLeft > 0 && (Math.floor(Math.random() * remainingNonBranchIterations) === 0 || remainingNonBranchIterations <= 0)) {
                            branchPath = true;
                            pathBranchesLeft--;
                        }

                        if (branchPath) {
                            for (let branchLoc = 0; branchLoc < 2; branchLoc++) {
                                if (mapArray.length === 0) break; // Prevent creating branches if testArray is empty
                                newLocationCard.classList.add("location-card");
                                newLocationCard.id = "card" + i;
                                newLocationCard.textContent = mapArray.shift();
                                parentZone.appendChild(newLocationCard.cloneNode(true));
                            }
                        } else {
                            newLocationCard.classList.add("location-card");
                            newLocationCard.id = "card" + i;
                            newLocationCard.textContent = mapArray.shift();
                            parentZone.appendChild(newLocationCard);
                        }

                        i++;
                    }

                    //game prep and start
                    let gameRound = 0; // Game start point

                    const currentZone = document.querySelector("#start")
                    let currentCards = currentZone.querySelectorAll(".location-card");

                    let nextZone = document.querySelector("#zone" + (gameRound));
                    let nextCards = nextZone.querySelectorAll(".location-card");

                    function prepareRound() {
                        if (gameRound < 10) {

                            nextZone = document.querySelector("#zone" + (gameRound)); // identifying the next decision zone
                            nextCards = nextZone.querySelectorAll(".location-card"); // getting every card within the next decision zone


                            function locationClicked() {
                                nextCards.forEach((card) => card.removeEventListener("click", locationClicked));
                                locationTrigger();
                                console.log(nextZone.id + "'s location cards are clickable now");
                            }

                            if (nextCards) { // if cards in the current zone exist
                                nextCards.forEach((card) => card.classList.add("focus")); // adding a focus class to each card in the current zone
                                nextCards.forEach((card) => card.addEventListener("click", locationClicked)); // essentially removing the click event listener after been clicked
                                if (nextCards.length == 2) {
                                    console.log("Player is at a choice of " + nextCards[0].innerHTML + " or " + nextCards[1].innerHTML); // ** FIXED ** Log player's location - doesn't work as a nodelist ** FIXED **
                                } else console.log("Player is at choice of " + nextCards[0].innerHTML);
                            }
                        }
                    }

                    function locationTrigger() {
                        nextCards.forEach((card) => card.classList.remove("focus"));
                        // Trigger event or battle at the location
                        gameRound += 1;
                        prepareRound();
                    }

                    prepareRound();


                })
        })
    </script>
</body>

</html>