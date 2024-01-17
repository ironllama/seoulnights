<?php
session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top 10 Leaderboard</title>
    <link rel="stylesheet" href="leaderboardStyles.css">
</head>

<body>
    <?php echo session_id() ?>
    <button class="mainscreen">Return to Main Screen</button>
    <div class="main1">
        <div class="leaderboardTitle">
            <h1>Leaderboard</h1>
        </div>
        <table class="leaderboard">
            <thead>
                <tr>
                    <td>Ranking</td>
                    <td>Name</td>
                    <td>Score</td>
                    <td>Date Played</td>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <br>
        <br>
        <div class="errorresult"></div>
        <table class="playerRun">
            <thead>
                <tr>
                    <td>Ranking</td>
                    <td>Name</td>
                    <td>Score</td>
                    <td>Date Played</td>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <button class="upload">Upload Score</button>
        <div class="uploadComplete"></div>
    </div>
</body>

</html>
<script>
    // creating variables for HTML
    leaderboardButton = document.querySelector(".leaderboardButton");
    main = document.querySelector(".main1");
    uploadButton = document.querySelector(".upload");
    playerStats = document.querySelector(".playerRun");
    uploadCompleteMessage = document.querySelector(".uploadComplete");
    tableBody1 = document.getElementsByTagName("tbody")[0];
    tableBody2 = document.getElementsByTagName("tbody")[1];
    errorResult = document.querySelector(".errorresult");
    mainscreenButton = document.querySelector(".mainscreen");


    // creating a function called getLeaderboard to get leaderboard data
    function getLeaderboard() {
        rankCounter = 1;
        fetch('getLeaderboard.php')
            .then(res => res.json())
            .then(data => {
                tableBody1.innerHTML = "";
                data.forEach((row) => {

                    // creating table elements
                    tableRow = document.createElement("tr");
                    tableRank = document.createElement("td");
                    tableName = document.createElement("td");
                    tableScore = document.createElement("td");
                    tableDate = document.createElement("td");

                    tableRank.innerHTML = rankCounter;
                    tableName.innerHTML = row['player_name'];
                    tableScore.innerHTML = row['run_score'];
                    tableDate.innerHTML = new Date(row['run_timestamp']).toLocaleDateString('en-US');


                    tableRow.appendChild(tableRank);
                    tableRow.appendChild(tableName);
                    tableRow.appendChild(tableScore);
                    tableRow.appendChild(tableDate);

                    tableBody1.appendChild(tableRow);
                    rankCounter++;
                })
            })
    }

    fetch('../map/updateHUD.php') //calls to existing api that gets current state of run
        .then(res => res.json())
        .then(data => {
            if (data !== false) {

                fetch('updateLeaderboard.php')
                    .then(res1 => res1.json())
                    .then(data1 => {
                        console.log("final player details: " + data1);
                        // creating table elements
                        tableRow = document.createElement("tr");
                        tableRank = document.createElement("td");
                        tableName = document.createElement("td");
                        tableScore = document.createElement("td");
                        tableDate = document.createElement("td");

                        tableRank.innerHTML = "?";
                        tableName.innerHTML = data1['player_name'];
                        tableScore.innerHTML = data1['run_score'];
                        tableDate.innerHTML = new Date(data1['run_timestamp']).toLocaleDateString('en-US');

                        tableRow.appendChild(tableRank);
                        tableRow.appendChild(tableName);
                        tableRow.appendChild(tableScore);
                        tableRow.appendChild(tableDate);

                        tableBody2.appendChild(tableRow);
                    })
            } else {
                errorResult.innerHTML = "RUN HAS NOT BEEN STARTED";
                playerStats.style.display = "none";
                uploadButton.style.display = "none";
            }
        })

    getLeaderboard(); // calls function to populate leaderboard



    //displays update leaderboard button upon upload click
    uploadButton.addEventListener("click", () => {
        uploadButton.style.display = "none";
        playerStats.style.display = "none";

        fetch('updateLeaderboard.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: "update=yes"
            })
            .then(res => res.text())
            .then(data => {
                console.log(data);
                uploadCompleteMessage.innerHTML = data;
            })

        getLeaderboard();
    })



    mainscreenButton.addEventListener("click", (event) => {
        event.preventDefault();

        window.location.href = "../map/map.php";
    })
</script>