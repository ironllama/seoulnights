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
        <br>
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
    rankCounter = 1;
    tableBody1 = document.getElementsByTagName("tbody")[0];
    tableBody2 = document.getElementsByTagName("tbody")[1];

    // creating a function called getLeaderboard to get leaderboard data
    function getLeaderboard() {
        fetch('getLeaderboard.php')
            .then(res => res.json())
            .then(data => {
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

        fetch('../map/updateHUD.php') //calls to existing api that gets current state of run
            .then(res => res.json())
            .then(data => {
                console.log("final player details: " + data);
                // creating table elements
                tableRow = document.createElement("tr");
                tableRank = document.createElement("td");
                tableName = document.createElement("td");
                tableScore = document.createElement("td");
                tableDate = document.createElement("td");

                tableRank.innerHTML = "?";
                tableName.innerHTML = data['player_name'];
                tableScore.innerHTML = data['run_score'];
                tableDate.innerHTML = new Date(data['run_timestamp']).toLocaleDateString('en-US');

                tableRow.appendChild(tableRank);
                tableRow.appendChild(tableName);
                tableRow.appendChild(tableScore);
                tableRow.appendChild(tableDate);

                tableBody2.appendChild(tableRow);
            })
    }

    getLeaderboard(); // calls function to populate leaderboard



    //displays update leaderboard button upon upload click
    uploadButton.addEventListener("click", () => {
        uploadButton.style.display = "none";
        playerStats.style.display = "none";
        uploadCompleteMessage.innerHTML = "Score Uploaded and Leaderboard Updated!";
    })
</script>