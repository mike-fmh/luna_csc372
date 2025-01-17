<?php
$language = $_COOKIE['language'] ?? 'en';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $language = $_POST["language"];
    setcookie("language", $language, time() + (24 * 60 * 60 * 30), "/"); // 30 days
}
?>

<!doctype html>
<html lang=<?= $language ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="images/logos/luna-logo.webp">
    <link rel="stylesheet" type="text/css" href="css/nav.css">
    <link rel="stylesheet" type="text/css" href="css/flex-boxes.css">
    <link rel="stylesheet" type="text/css" href="css/background.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <title>Luna | Home</title>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- if we fail to load from the CDN, use our local download of jquery -->
    <script>window.jQuery || document.write('<script src="https://trioluna.com/static/js/jquery-3-7-1.js"><\/script>')</script>
</head>
<body>
<nav class="navbar" id="navbar">
    <div class="nav-content">
        <div class="logo">
            <a href="/"><img alt="Trio Luna Logo" class="img-logo trans-17" src="images/logos/luna-logo.webp"></a>
        </div>
        <ul class="nav-links">
            <li><a id="home-nav" class="only-desktop" href="#">Home</a></li>
            <li><a id="bios-nav" href="bios.php">About</a></li>
            <li><a id="media-nav" href="gallery.php">Media</a></li>
            <li><a id="patreon-nav" href="contact.php">Contact</a></li>
            <li class="lang-chg trans-17">
                <form id="language-form" action="index.php" method="POST">
                    <input type="hidden" name="language" id="language-input">
                    <button type="submit"><img id="change-language-img" alt="Button that changes the page's language" src="images/buttons/globe-white-es.webp"></button>
                </form>
            </li>
        </ul>
    </div>
</nav>
<main>
    <div>
        <!--
            These images are background images defined in background.css
            So their 'alts' are defined as 'aria-labels'
        -->
        <div class="b-img" id="img1" aria-label="Image of Carmen holding a flower">
            <div class="text-overlay">
                <div class="container center-text">
                    <p id="name-splash" class="main-title">TRIO LUNA</p>
                </div>
            </div>
        </div>
        <div class="b-img" id="img2" aria-label="Image of Nicolas sitting with his harp">
            <div class="text-overlay">
                <div class="flex-container height-25">
                    <p class="main-subhead" id="div1-text">We are a group of musicians who are a part of a movement within Latin artists of popularizing Latin Folk music within the Americas.</p>
                </div>
            </div>
        </div>
        <div class="b-img" id="img3" aria-label="Image of Marco standing with his guitar">
            <div class="text-overlay">
                <div class="trans-contained-box">
                    <div class="container center-text">
                        <p id="patreon-text" class="height-14 main-subhead">Support our creative process</p>
                        <div class="social-links-container">
                            <div class="social-link" id="patreon-button">
                                <a href="https://www.patreon.com/bePatron?u=21895737" id="patreon-subscribe-btn" class="patreon-subscribe-button" data-patreon-widget-type="become-patron-button">Become a Patron</a>
                            </div>
                        </div>
                        <p id="div2-text" class="height-14 main-subhead">Follow us on our musical journey</p>
                        <div class="social-links-container">
                            <div id="instagram-social-link" class="social-link">
                                <a href="https://instagram.com/tri0luna"><img alt="Instagram Logo" class="img-logo" src="images/logos/instagram-white.webp"></a>
                            </div>
                            <div id="youtube-social-link" class="social-link">
                                <a href="https://youtube.com/@trioluna"><img alt="YouTube Logo" class="img-logo" src="images/logos/youtube-white.webp"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<footer>
    <div class="flex-container">
        <div class="trans-contained-box" id="copyright">
            Copyright &copy; 2024, All Rights Reserved Trio Luna and <a href="https://felixcreations.com"><img alt="Felixcreations Logo" class="img-logo trans-30" src="images/logos/felix-logo-white.webp"></a>
        </div>
    </div>
    <div class="flex-container" style="padding-bottom: 20px" id="footer-text">
        If you have any questions or concerns, please contact Michael Felix through <a class="email-link" target="_blank" href="mailto:mikemh@uri.edu">mikemh@uri.edu</a>
    </div>
</footer>

<script src="js/change-language.js"></script>
<script src="js/home.js"></script>
</body>
</html>