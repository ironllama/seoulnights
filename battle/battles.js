//Battles
const battleZone = document.querySelector(".battle-zone");
playedCards = [];
currentRound = [];
currentEnemy = [];
cardArea = document.querySelector(".card-area");
battleMusic = new Audio("../media/music/battlemusic.mp3")

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
    console.log("sendBattleReward input:", inData);
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
            console.log('getEncounterResults echo: ', encounterResultsData);
            showResults(encounterResultsData);
        })
        .catch(error => console.log(error));
}

function triggerBattle(data) {

    narrationBox.classList.add("battle-mode");
    narrationTypewriter(`A wild ${data['enemy_name']} appeared!`);

    mapMusic.volume = 0.1;
    battleMusic.play();

    playerHUD.style.display = "none";
    // backgroundImages = ['pics/rooftop.jpeg', 'pics/ruraljapan.jpeg'];
    // currentSessionBG = backgroundImages[randomValue = Math.round(Math.random())];
    // battleZone.style.backgroundImage = "url(../media/battle/" + currentSessionBG + ")";
    battleZone.style.backgroundImage = "url(../media/battle/battlebg.png)";
    battleZone.style.backgroundPosition = 'center';
    battleZone.style.display = "flex";
    cardArea.innerHTML = ''; // empties out the cards from previous battle, basically makes sure its a clean slate
    playerHealthBar.value = data['currentPlayerEnergy']; // initializes the healthbar value at begining of round to the current state of the game
    playerHealthNum.innerHTML = data['currentPlayerEnergy']; // shows the client

    // setting up battle 
    // initializing enemy
    currentEnemy = data; // mainly just to check whats coming back
    enemyPic.src = "../media/enemies/" + data['enemy_img'];
    enemyName.innerHTML = data['enemy_name'];
    enemyHealthBar.value = data['enemy_energy'];
    enemyHealthBar.max = data['enemy_energy'];
    enemyHealthNum.innerHTML = data['enemy_energy'] + "/" + data['enemy_energy'];

    // setting up enemy moves to visualize
    enemyMoves = data['enemy_moves'];
    enemyMovesetTitle = document.createElement("h3");

    enemyTurn = enemyMoves[Math.floor(Math.random() * 4)]; // enemy picks a random move from the 4 or however many available
    console.log("enemy turn", enemyTurn);

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
                console.log("getCards:", data);
                cards = data;

                // card creation at bottom of battle screen
                cards.slice(0, 4).forEach((card) => { // only having first 4 cards
                    cardDiv = document.createElement("div");
                    cardDiv.className = "card";

                    cardDiv.addEventListener("click", function(event) {
                        event.stopPropagation();
                        playedCards.push(card['card_name']); // pushing into array to track # of cards played
                        currentRound = card; // currentRound is basically the card you clicked just so we can track and have battle logic be sound

                        let moveID = "#move" + enemyTurn['move_id'];

                        if (!enemyMoveset.querySelector(moveID)) {
                            enemyMove = document.createElement("div");
                            enemyMove.className = "enemyMove";
                            enemyMove.id = "move" + enemyTurn['move_id'];
                            enemyMoveName = document.createElement("div");
                            enemyMoveName.innerHTML = enemyTurn['move_name'];
                            enemyMoveAttack = document.createElement("div");
                            enemyMoveAttack.innerHTML = "Attack: " + enemyTurn['move_attack'];
                            enemyMoveDefense = document.createElement("div");
                            enemyMoveDefense.innerHTML = "Defend: " + enemyTurn['move_defend'];
                            enemyMove.appendChild(enemyMoveName);
                            enemyMove.appendChild(enemyMoveAttack);
                            enemyMove.appendChild(enemyMoveDefense);
                            enemyMoveset.append(enemyMove);
                        }

                        narrationTypewriter(enemyTurn["move_desc"]);
                        playerVisualPulse(enemyMoveset.querySelector(moveID));

                        // putting the card you clicked, and enemy move into an array to push to an api
                        roundData = [currentRound, enemyTurn];

                        console.log("roundData:", roundData); // the array

                        fetch('getRoundResult.php', { // pushing into this api so that backend can do calc
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json'
                                },
                                body: JSON.stringify(roundData)
                            })
                            .then(res => res.json())
                            .then(data => { // what we get back is the updated values for the client
                                console.log("getRoundResult:", data);

                                updatedHealth = data['updatedEnergyLevel'];
                                updatedMoney = data['updatedMoneyLevel'];
                                updatedDrunk = data['updatedDrunkLevel'];

                                playerHealthBar.value = updatedHealth; // updates actual value here
                                playerHealthNum.innerHTML = updatedHealth + "/100"; // updates for client here so they can view
                                playerVisualPulse(playerHealthNum);

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
                            narrationTypewriter(`You defeated ${enemyName.innerHTML}!`);
                            battleZone.style.display = "none";
                            battleRewardScreen.style.display = "flex";
                            updateHUD();
                            playerHUD.style.display = "flex";
                            battleMusic.pause();
                            mapMusic.volume = 1;
                        }

                        //upon loss
                        if (playerHealthBar.value <= 0) {
                            playedCards = [];

                            battleMusic.pause();
                            mapMusic.volume = 1;

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
                        console.log("enemyTurn:", enemyTurn);

                        document.querySelectorAll(".enemyMove").forEach((elem) => {
                            if (elem.querySelector("div").innerHTML === enemyTurn["move_name"]) {
                                elem.classList.add("focus-b");
                            } else elem.classList.remove("focus-b");
                        });
                    });

                    // actually creating the cards
                    cardImage = document.createElement("img");
                    cardImage.className = "cardpic", cardImage.src = "../media/cards/" + card['card_img'];

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