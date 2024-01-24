<?php
session_start();
$session_id = session_id();

if (isset($_SESSION['name'])) {
    // Redirect to another page if 'name' is set
    // header('Location: ../map/map.php');
    // echo $_SESSION['name'];
};

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Seoul Nights!</title>
    <link rel="stylesheet" href="loginStyles.css">
    <script src="https://developers.kakao.com/sdk/js/kakao.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <div class="sessionID"><?= session_id() ?></div>
    <div class="game-intro">
        <h2>You're headed out for a night in Hongdae.</h2>
        <p>The goal is to maximize your <span class="drunk-text">drunk</span> score while keeping your <span class="energy-text">energy</span> and <span class="money-text">money</span> levels high. Choose your path through the <span class="focus-e">events</span>, and fight your way through <span class="focus-b">battles</span> to make it to dawn (when the subway opens).</p>
        <h2>Your train is arriving...</h2>
    </div>
    <div class="fade-out-overlay"></div>
    <img src="../media/login/seoulnights.png" class="seoulnights" />
    <img class="hongdae" src="../media/login/hongdae.png">
    <div class="welcome"></div>
    <div class="not-logged-in">
        <div class="buttons">
            <button class="loginButton">
                <img class="logo" src="../media/login/googlelogin.png">
                <span>Sign in with Google</span>
            </button>
            <a id="kakao-login-btn"></a>
            <!-- <button class="api-btn" onclick="unlinkApp()">앱 탈퇴하기</button> -->
            <!-- <div id="result"></div> -->
        </div>
    </div>
    <div class="logged-in-wrapper">
        <img class="playerPic">
            <button class="playButton">Play</button>
            <button class="leaderboardButton">Leaderboard</button>
            <!-- <button class="signoutButton">Sign Out</button> -->
    </div>

    <script type="text/javascript">
        const loginButton = document.querySelector(".loginButton");
        const signoutButton = document.querySelector(".signoutButton");
        const welcomeMessage = document.querySelector(".welcome");
        const playButton = document.querySelector(".playButton");
        const leaderboardButton = document.querySelector(".leaderboardButton");
        const playerPic = document.querySelector(".playerPic");
        const kakaoButton = document.getElementById("kakao-login-btn");
        const overlay = document.querySelector(".fade-out-overlay");
        const audio = new Audio('../media/music/hongdae-korean.mp3');
        const introScroller = document.querySelector(".game-intro");


        function unlinkApp() {
            Kakao.API.request({
                url: '/v1/user/unlink',
                success: function(res) {
                    alert('success: ' + JSON.stringify(res))
                },
                fail: function(err) {
                    alert('fail: ' + JSON.stringify(err))
                },
            })
        }
    </script>
    <script type="text/javascript">
        Kakao.init('3ffee278c83057c7a42a90c437cfaae2');
        console.log(Kakao.isInitialized());

        Kakao.Auth.createLoginButton({
            container: '#kakao-login-btn',
            success: function(authObj) {
                Kakao.API.request({
                    url: '/v2/user/me',
                    success: function(result) {
                        data = result;
                        console.log(data);
                        kakao = 'kakao';
                        playerName = data['properties']['nickname'];
                        playerImgURL = data['properties']['profile_image']
                        welcomeMessage.innerHTML = ("Welcome, " + playerName + "!");
                        playerPic.src = playerImgURL;
                        playerPic.style.display = "flex";
                        loginButton.style.display = "none";
                        // signoutButton.style.display = "initial";
                        playButton.style.display = "initial";
                        leaderboardButton.style.display = "initial";
                        kakaoButton.style.display = "none";

                        fetch('loginAPI.php', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/x-www-form-urlencoded',
                                },
                                body: 'name=' + playerName + '&loginMethod=' + kakao + '&playerid=' + data.id
                            })
                            .then(res => res.text())
                            .then(data => {
                                console.log(data)
                            })

                        playButton.addEventListener("click", function(event) {
                            introScroller.classList.add("scroller");
                            event.preventDefault();
                            audio.play();
                            fetch('startNewGame.php', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/x-www-form-urlencoded',
                                    },
                                    body: 'player_identifier=' + data.id
                                })
                                .then(res => res.text())
                                .then(data => {
                                    console.log(data);
                                    overlay.style.opacity = "1"; // Set overlay opacity to fully opaque
                                    overlay.style.pointerEvents = "auto"; // Allow interactions with the overlay
                                    // After a delay (for the fade-out effect), navigate to the new site
                                    setTimeout(function() {
                                        window.location.href = "../map/map.php";
                                    }, 10000); // Adjust the delay time (in milliseconds) as needed
                                })
                        })

                    },
                    fail: function(error) {
                        alert(
                            'login success, but failed to request user information: ' +
                            JSON.stringify(error)
                        )
                    },
                })
            },
            fail: function(err) {
                alert('failed to login: ' + JSON.stringify(err))
            },
        })
    </script>
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
            kakaoButton.style.display = "none";
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
                            body: 'email=' + user.email + '&name=' + user.displayName + '&loginMethod=google'
                        })
                        .then(res => res.text())
                        .then(data => {
                            console.log(data)
                        })

                    // IdP data available using getAdditionalUserInfo(result)
                    // ...
                    welcomeMessage.innerHTML = ("Welcome, " + user.displayName + "!");
                    playerPic.src = user.photoURL;
                    playerPic.style.display = "flex";
                    loginButton.style.display = "none";
                    // signoutButton.style.display = "initial";
                    playButton.style.display = "initial";
                    leaderboardButton.style.display = "initial";


                    playButton.addEventListener("click", function() {
                        introScroller.classList.add("scroller");
                        audio.play();
                        fetch('startNewGame.php', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/x-www-form-urlencoded',
                                },
                                body: 'player_identifier=' + user.email
                            })
                            .then(res => res.text())
                            .then(data => {
                                console.log(data);
                                overlay.style.opacity = "1"; // Set overlay opacity to fully opaque
                                overlay.style.pointerEvents = "auto"; // Allow interactions with the overlay

                                // After a delay (for the fade-out effect), navigate to the new site
                                setTimeout(function() {
                                    window.location.href = "../map/map.php";
                                }, 10000); // Adjust the delay time (in milliseconds) as needed
                            })
                    })
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

        // signoutButton.addEventListener("click", (e) => {
        //     signOut(auth).then(() => {
        //         welcomeMessage.innerHTML = '';
        //         loginButton.style.display = "initial";
        //         signoutButton.style.display = 'none';
        //         playButton.style.display = "none";
        //         leaderboardButton.style.display = "none";
        //         playerPic.style.display = "none";
        //         <?php session_destroy() ?>;
        //         console.log(" Sign-out successful");
        //     }).catch((error) => {
        //         // An error happened.
        //     });
        // })
    })

    leaderboardButton.addEventListener("click", (event) => {
        event.preventDefault();

        window.location.href = "../leaderboard/leaderboard.php";
    })
</script>

</html>