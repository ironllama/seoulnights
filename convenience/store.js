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
        narrationTypewriter("You leave the store...");
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
            console.log('Visits Left:', visitsLeft);
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
            console.log("buyItems:", data);
            updateHUD();
        });
    //update each button in store after purchase
    document.querySelectorAll(".shopButton").forEach((item) => {
        let checkItemID = item.id;
        console.log("Checking total money vs price of:", checkItemID);
        fetch('../convenience/buyItems.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(checkItemID)
            })
            .then(response => response.json())
            .then(data => {
                console.log("You can buy this:", data);
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
            console.log("drinks:", data);
            data.items['drink'].forEach(drink => {
                console.log(drink);
                var drinkButton = document.createElement('div');
                drinkButton.classList.add('shopButton');
                drinkButton.innerHTML = drink['item'] + "<br>" + Math.abs(drink['price_hit']).toLocaleString('en-US');
                drinkButton.id = "s" + drink['mart_id'];
                drinkButton.style.backgroundImage = "url(../media/mart/" + drink["item_img"];
                if (parseInt(moneyNum.innerHTML.replace(/,/g, ''), 10) > drink['price_hit']) {
                    drinkButton.addEventListener('click', buyItem);
                }
                drinkContainer.appendChild(drinkButton);
            });

            data.items['food'].forEach(food => {
                console.log("food:", food);
                var foodButton = document.createElement('div');
                foodButton.classList.add('shopButton');
                foodButton.innerHTML = food['item'] + "<br>" + Math.abs(food['price_hit']).toLocaleString('en-US');
                foodButton.id = "s" + food['mart_id'];
                foodButton.style.backgroundImage = "url(../media/mart/" + food["item_img"];
                if (parseInt(moneyNum.innerHTML.replace(/,/g, ''), 10) > food['price_hit']) {
                    foodButton.addEventListener('click', buyItem);
                }
                foodContainer.appendChild(foodButton);
            });
        });
}