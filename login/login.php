<?php
session_start();

echo $_SESSION['name'];

if (isset($_SESSION['name'])) {
    // Redirect to another page if 'name' is set
    header('Location: ../map/map.php');
    exit; // Ensure the script exits after redirection
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Seoul Nights!</title>
    <link rel="stylesheet" href="loginStyles.css">
</head>

<body>
    <h1>Seoul Nights</h1>
    <div class="welcome"></div>
    <img class="playerPic">
    <div class="main">
        <div class="buttons">
            <button class="loginButton">Login</button>
            <button class="playButton"><a href="../map/map.php">Play</a></button>
            <button class="leaderboardButton">Leaderboard</button>
            <button class="signoutButton">Sign Out</button>
        </div>
    </div>
</body>
<script type="module">
    import {
        initializeApp
    } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-app.js";
    import {
        getAnalytics
    } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-analytics.js";
    import {
        getAuth,
        GoogleAuthProvider,
        signInWithPopup,
        getRedirectResult,
        signOut
    } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-auth.js";

    document.addEventListener("DOMContentLoaded", () => {
        const loginButton = document.querySelector(".loginButton");
        const signoutButton = document.querySelector(".signoutButton");
        const welcomeMessage = document.querySelector(".welcome");
        const playButton = document.querySelector(".playButton");
        const leaderboardButton = document.querySelector(".leaderboardButton");
        const playerPic = document.querySelector(".playerPic");
        // Import the functions you need from the SDKs you need

        // TODO: Add SDKs for Firebase products that you want to use
        // https://firebase.google.com/docs/web/setup#available-libraries

        // Your web app's Firebase configuration
        // For Firebase JS SDK v7.20.0 and later, measurementId is optional
        const firebaseConfig = {
            apiKey: "AIzaSyAg1L2n6FyTFaWKojheqPU1ag5REv5YVOM",
            authDomain: "seoulnights-f07f4.firebaseapp.com",
            projectId: "seoulnights-f07f4",
            storageBucket: "seoulnights-f07f4.appspot.com",
            messagingSenderId: "529940003055",
            appId: "1:529940003055:web:5d5dfd7332e760ca94c31a",
            measurementId: "G-5YBBRCF2K8"
        };

        // Initialize Firebase
        const app = initializeApp(firebaseConfig);
        const auth = getAuth(app);
        const analytics = getAnalytics(app);
        const provider = new GoogleAuthProvider(app);

        loginButton.addEventListener('click', (e) => {
            signInWithPopup(auth, provider)

                // getRedirectResult(auth)
                .then((result) => {
                    // This gives you a Google Access Token. You can use it to access Google APIs.
                    const credential = GoogleAuthProvider.credentialFromResult(result);
                    const token = credential.accessToken;

                    // The signed-in user info.
                    const user = result.user;
                    console.log(user);




                    fetch('loginAPI.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded',
                            },
                            body: 'email=' + user.email + '&name=' + user.displayName
                        })
                        .then(res => res.text())
                        .then(data => {
                            console.log(data)
                        })

                    // IdP data available using getAdditionalUserInfo(result)
                    // ...
                    welcomeMessage.innerHTML = ("Welcome " + user.displayName + "!");
                    playerPic.src = user.photoURL;
                    loginButton.style.display = "none";
                    signoutButton.style.display = "initial";
                    playButton.style.display = "initial";
                    leaderboardButton.style.display = "initial";
                }).catch((error) => {
                    // Handle Errors here.
                    const errorCode = error.code;
                    const errorMessage = error.message;
                    // The email of the user's account used.
                    const email = error.customData.email;
                    // The AuthCredential type that was used.
                    const credential = GoogleAuthProvider.credentialFromError(error);
                    // ...
                });
        })

        signoutButton.addEventListener("click", (e) => {
            signOut(auth).then(() => {
                welcomeMessage.innerHTML = '';
                loginButton.style.display = "initial";
                signoutButton.style.display = 'none';
                playButton.style.display = "none";
                leaderboardButton.style.display = "none";
                playerPic.style.display = "none";
                <?php session_destroy() ?>;
                console.log(" Sign-out successful");
            }).catch((error) => {
                // An error happened.
            });
        })
    })
</script>

</html>