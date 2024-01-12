<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Battle!</title>
    <link rel="stylesheet" href="battle.css">
</head>

<body>
    <div class="container">
        <div class="location">
            <button value="3" class="battleStart">Start Random Location Battle</button>
        </div>
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
</body>

</html>

<script>
    /*
            Battle Databases
                - enemies
                    - database of ALL enemies
                - enemy_moves
                    - database of which enemies are associated with which moves
                - moves
                    - database of ALL enemy moves
                - cards
                    - database of ALL cards
                
    */

    // Initialization
    /* 
        1. Upon battle location click, location id sent to the enemies database via fetch
        1A. There will be multiple enemies for a single location, so would have to randomize something to this effect.
            SELECT * FROM enemies db where enemy_location = $locationID ORDER BY rand() LIMIT 1;
            Once we receive the enemy_id after running the query above, we have to now query for the moves this enemy can have as 1 enemy can have multiple moves.
            SELECT * FROM enemy_moves db where enemy_id = enemies.enemy_id ORDER BY rand() LIMIT 3;
            We receive 3 move_id(s).

            This is on the assumption that the enemy_moves db has been pre-mapped and pre-filled via the moves db.
            The moves db has all the possible moves any enemy can do in this game. 

            We now query the moves database using the 3 move_id(s) we queried for earlier, and receive the exact moves each enemy will have for this fight at this location.
            We put the moves into an object and combine that object with the enemies array. 

            It should look something like this; 

            {
                "enemy_id": 6,
                "enemy_name": "Evil Ajumma",
                "enemy_img": "ajumma.png",
                "enemy_locationID": 1,
                "moves": [
                    {
                    "move_id": 1,
                    "move_name": "Kimchi Slap",
                    "move_description": "The crazy ajumma slapped you with kimchi",
                    "move_attack": 5,
                    "move_defense": 0,
                    "move_regen": 0
                    },
                    {
                    "move_id": 1,
                    "move_name": "Visor Block",
                    "move_description": "The ajumma blocked your attack with her visor",
                    "move_attack": 0,
                    "move_defense": 5,
                    "move_regen": 0
                    },
                    {
                    "move_id": 1,
                    "move_name": "Fruit Break",
                    "move_description": "Ajumma stops for a breather and eats some apples",
                    "move_attack": 0,
                    "move_defense": 0,
                    "move_regen": 5
                    }]
                        }
        
        2. Enemies database receives this location id, and populates the enemies div
        2A. 


    */
    //battle init
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


    button.addEventListener("click", function(event) {
        event.preventDefault(); // prevent default button submission

        mainBattleArea.style.display = "flex"; //displaying the main battle area
        button.style.display = "none"; // hiding the button

        locationID = button.value
        fetch('getEnemy.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: `location=${locationID}`
            })
            .then(res => res.json())
            .then(data => {
                console.log(data);

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
                })
            })
        cards = [];

        function getNewCards() {
            fetch('getCards.php')
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

                            // enemyHealthBar = document.querySelector(".enemy-health-bar");
                            // enemyHealthNum = document.querySelector(".enemy-health-num");

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
                        cardImage.className = "cardpic", cardImage.src = "pics/" + card['card_img'];

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
                    })
                })
        }
        getNewCards();
    })
</script>