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
            console.log('locationClicked:', encounterData);
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
//Endgame
const playAgainButton = document.querySelector(".play-again");
const leaderboardButton = document.querySelector(".see-leaderboard");
const endGame = document.querySelector("#end-game");
const finalScore = document.querySelector(".final-score");

function youLose() {
    storeButton.style.display = "none";
    encounterZone.style.display = "none";
    encounterResult.style.display = "flex";
    narrationTypewriter("Go home, you're broke!")
    energyBar.value = 0;
    energyNum.innerHTML = 0;
    resolutionText.innerHTML = "You are out of money and too broke to go on! You couldn't handle a night out in Hongdae! Try again?"
    document.querySelector(".state-changes-container").innerHTML = "";
    encounterResult.addEventListener("click", () => {
        window.location.reload();
    });
}

//shows splash screen after a location encounter is resolved, displaying gamestate changes    
function showResults(inData) {
    narrationBox.classList.remove("battle-mode");
    console.log(gameRound, cardZoneList.length);
    if (gameRound < cardZoneList.length - 1) {
        narrationTypewriter(`It is now ${formatAsOclock(gameRound)}. Your night continues...`);
    } else narrationTypewriter(`You have survived Seoul Nights: Hongdae!`);
    encounterZone.style.display = "none";
    eventZone.style.display = "none";
    battleZone.style.display = "none";
    battleRewardScreen.style.display = "none";
    encounterResult.style.display = "flex";
    playerHUD.style.display = "flex";
    console.log("Data coming into showResults:", inData);

    energyChange.innerHTML = energyBar.value + " > " + inData['updatedEnergyLevel'];
    drunkChange.innerHTML = drunkBar.value + " > " + inData['updatedDrunkLevel'];
    moneyChange.innerHTML = moneyNum.innerHTML + " > " + inData['updatedMoneyLevel'].toLocaleString('en-US');

    if (inData['updatedEnergyLevel'] <= 0) { //you lose
        energyBar.value = 0;
        energyNum.innerHTML = 0;
        narrationTypewriter("Go home! You're wasted!");
        resolutionText.innerHTML = "You are out of energy and couldn't handle a night out in Hongdae! Try again?"
        document.querySelector(".state-changes-container").innerHTML = "";
        encounterResult.addEventListener("click", () => {
            window.location.reload();
        });
    } else {
        updateHUD();
        if (gameRound >= cardZoneList.length - 1) {
            encounterResult.addEventListener("click", () => {
                storeButton.style.display = "none";
                endGame.style.display = "flex";
                document.querySelector(".end-energy-num").innerHTML = energyBar.value;
                document.querySelector(".end-drunk-num").innerHTML = drunkBar.value;
                document.querySelector(".end-money-num").innerHTML = moneyNum.innerHTML;
                fetch('../leaderboard/updateLeaderboard.php')
                    .then(res => res.json())
                    .then(data => {
                        finalScore.innerHTML = data['run_score'];
                    })
            }); //end game
            playAgainButton.addEventListener("click", () => window.location.reload());
            leaderboardButton.addEventListener("click", () => window.location.href = "../leaderboard/leaderboard.php");
        } else encounterResult.addEventListener("click", () => {
            storeButton.style.display = "flex";
            encounterResult.style.display = "none"
        }); //click to continue game
    }
}