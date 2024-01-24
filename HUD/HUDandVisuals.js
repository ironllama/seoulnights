//HUD
const playerHUD = document.querySelector(".hud");
const energyBar = document.querySelector(".player-energy-bar");
const drunkBar = document.querySelector(".player-drunk-bar");
const energyNum = document.querySelector(".player-energy-num");
const drunkNum = document.querySelector(".player-drunk-num");
const moneyNum = document.querySelector(".player-money-num");

function updateHUD() {
    fetch('../HUD/updateHUD.php')
        .then(res => res.json())
        .then(data => {
            console.log("updateHUD:", data)
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
        }, 750);
    }
}

//Encounter Zone, Narration Box
const encounterZone = document.querySelector("#encounter-zone");
const narrationBox = document.querySelector(".narration-box");
const narrationText = document.querySelector(".narration-text");

function narrationTypewriter(inString) {
    narrationText.classList.remove("marquee-elem");
    narrationText.innerHTML = inString;
    narrationText.classList.add("marquee-elem");
}

function formatAsOclock(hour) {
    let num;
    let amOrPm;
    if (hour < 4) {
        num = hour + 8;
        amOrPm = "AM";
    } else if (hour === 4) {
        num = 12;
        amOrPm = "AM";
    } else if (hour > 4) {
        num = hour - 4;
        amOrPm = "PM";
    }

    return num + "o'clock " + amOrPm;
}