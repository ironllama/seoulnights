//Events
const eventZone = document.querySelector(".event-zone");
const optionDescriptionArray = Array.from(document.querySelectorAll(".option-description"));
const optionEnergyArray = Array.from(document.querySelectorAll(".option-energy"));
const optionDrunkArray = Array.from(document.querySelectorAll(".option-drunk"));
const optionMoneyArray = Array.from(document.querySelectorAll(".option-money"));
const optionButtons = document.querySelectorAll('.option-button');

function triggerEvent(inData) {
    let possibleChoices = 3;
    eventZone.style.display = "flex";
    eventZone.querySelector(".event-title").innerHTML = inData.event_title;
    eventZone.querySelector(".event-image").style.backgroundImage = `url("../media/events/${inData.event_img}")`;
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
        possibleChoices--;
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
        possibleChoices--;
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
        possibleChoices--;
    }

    if (possibleChoices <= 0) {
        youLose();
    }

    function sendChoice(event) { // nested function - sending the options data to be tracked once clicked
        optionButtons[0].removeEventListener('click', sendChoice);
        optionButtons[1].removeEventListener('click', sendChoice);
        optionButtons[2].removeEventListener('click', sendChoice);
        const currentPlayerState = JSON.stringify([event.currentTarget.id + ""]);
        console.log("id of chosen option button:", currentPlayerState);
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
                console.log('sendChoice received:', optionResultsData);
                showResults(optionResultsData);
            })
            .catch(error => console.log(error));
    }
}