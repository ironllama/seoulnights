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
    <div class="sessionID"><?= $session_id ?></div>
    <div class="main1">
        <div class="leaderboardTitle">
            <img class="ribbon" src="../media/leaderboard/award.svg">
            <h1>Leaderboard</h1>
            <img class="ribbon" src="../media/leaderboard/award.svg">
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
        <button class="mainscreen">Go Back</button>
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
        <div class="sns">
            <div class="tw">
                <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-text="Can you beat my score??" data-lang="en" data-show-count="false">Tweet</a>
                <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
            <br>
            <div class="fb">
                <div id="fb-root"></div>
                <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v18.0" nonce="r16SucX5"></script>
                <div class="fb-share-button" data-href="https://twitter.com" data-layout="" data-size=""><a target="_blank" href="https://twitter.com" class="fb-xfbml-parse-ignore">Share your score!</a></div>
            </div>
        </div>
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
    twitterMessage = document.querySelector(".twitter-share-button");

    errorResult = document.querySelector(".errorresult");
    mainscreenButton = document.querySelector(".mainscreen");

    // sns share
    facebook = document.querySelector(".fb");
    twitter = document.querySelector(".tw");


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

    fetch('../HUD/updateHUD.php') //calls to existing api that gets current state of run
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

                        twitterMessage.setAttribute("data-text", `Can you beat my score of ${data1['run_score']}?? Play SeoulNights Hongdae Edition @`);

                        tableRow.appendChild(tableRank);
                        tableRow.appendChild(tableName);
                        tableRow.appendChild(tableScore);
                        tableRow.appendChild(tableDate);

                        tableBody2.appendChild(tableRow);
                    })

                facebook.style.display = "initial";
                twitter.style.display = "flex";
            } else {
                errorResult.innerHTML = "CANNOT SUBMIT - RUN HAS NOT BEEN STARTED";
                playerStats.style.display = "none";
                uploadButton.style.display = "none";
            }
        })

    getLeaderboard(); // calls function to populate leaderboard



    //displays update leaderboard button upon upload click
    uploadButton.addEventListener("click", () => {
        uploadButton.style.display = "none";
        playerStats.style.display = "none";

        uploadCompleteMessage.innerHTML = "Score Uploaded and Leaderboard Updated!";


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
                uploadCompleteMessage.innerHTML = data; // just outputs "score uploaded"
                getLeaderboard();
            })
        facebook.style.display = 'none';
        twitter.style.display = 'none';
    })

    mainscreenButton.addEventListener("click", (event) => {
        event.preventDefault();
        window.location.href = "../login/login.php";
    })
</script>