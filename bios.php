<?php
$language = $_COOKIE['language'] ?? 'en';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $language = $_POST["language"];
    setcookie("language", $language, time() + (24 * 60 * 60 * 30), "/"); // 30 days
}
?>

<!DOCTYPE html>
<html lang=<?= $language ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="images/logos/luna-logo.webp">
    <link rel="stylesheet" type="text/css" href="css/nav.css">
    <link rel="stylesheet" type="text/css" href="css/flex-boxes.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/bios.css">
    <title>Luna | About</title>

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
            <li><a id="home-nav" class="only-desktop" href="/">Home</a></li>
            <li><a id="bios-nav" href="#">About</a></li>
            <li><a id="media-nav" href="gallery.php">Media</a></li>
            <li><a id="patreon-nav" href="contact.php">Contact</a></li>
            <li class="lang-chg trans-17">
                <form id="language-form" action="bios.php" method="POST">
                    <input type="hidden" name="language" id="language-input">
                    <button type="submit"><img id="change-language-img" alt="Button that changes the page's language" src="images/buttons/globe-white-es.webp"></button>
                </form>
            </li>
        </ul>
    </div>
</nav>
<main>
    <div class="trans-contained-box page-title-white grey-bg" style="padding-bottom: 40px">
        <div class="main-title-text"><h1 id="page-title">Meet the Trio</h1></div>
        <img src="images/desktop/trio.webp" class="rounded" id="band-pic" alt="Trio Luna Band">
        <div class="black-bg rounded inner-div">
            <!-- ABOUT BIOS -->
            <div class="flex-container-bio" id="carmen">
                <div class="info-contained-box">
                    <p class="info-title">Carmen Mañón</p>
                    <p class="info-text" id="carmen-bio">&ensp;&ensp;&ensp;&ensp;Carmen Mañón, born in Mexico, is a talented singer of Latin American music who currently resides in New York City. With a captivating voice and a unique style, Carmen has stood out for her ability to convey the feelings and emotions of Latin songs. Passionate about her art, Carmen finds deep satisfaction in sharing the nostalgia and joy that characterize Latin music, thus reaching the hearts of her audience. Through her music, Carmen Mañón brings harmony and happiness to those who have the privilege of listening to her, leaving a lasting mark on the world of Latin American music.</p>
                </div>
                <div class="info-contained-box bio-img-container">
                    <img class="bio-img rounded" src="images/desktop/P1001384-cropped.webp" alt="Portrait of Carmen Mañón">
                </div>
            </div>
            <div class="flex-container-bio" id="nicolas">
                <div class="info-contained-box">
                    <p class="info-title">Nicolas Carter</p>
                    <p class="info-text" id="nicolas-bio">&ensp;&ensp;&ensp;&ensp;Nicolas Carter is a Paraguayan harpist, educator, storyteller, and bilingual and bicultural theatre artist. Nicolas has composed, recorded, and performed harp music internationally for 35 years and has recorded over a dozen albums as a solo artist and with Latin American and world music ensembles. He is often featured as a concert performer and master teacher at national and international harp festivals.</p>
                </div>
                <div class="info-contained-box bio-img-container">
                    <img class="bio-img rounded" src="images/desktop/P1001197-cropped.webp" alt="Portrait of Nicolas Carter">
                </div>
            </div>
            <div class="flex-container-bio" id="marco">
                <div class="info-contained-box">
                    <p class="info-title">Marco Spíndola</p>
                    <p class="info-text" id="marco-bio">&ensp;&ensp;&ensp;&ensp;Marco Spíndola is a versatile Mexican artist, photographer, scene director, and guitarist. With over 30 years of experience as an educator, Marco has been a source of inspiration for individuals of all ages - from children to the elderly - in the fields of music, theater, and performing arts. Marco's extensive career in education includes teaching at various schools in Mexico, Costa Rica, Canada, and the United States.</p>
                </div>
                <div class="info-contained-box bio-img-container">
                    <img class="bio-img rounded" src="images/desktop/P1001427-cropped.webp" alt="Portrait of Marco Spíndola">
                </div>
            </div>
        </div>
    </div>
</main>

<footer>
    <div class="flex-container">
        <div class="trans-contained-box" id="copyright">
            Copyright &copy; 2024, All Rights Reserved Trio Luna and <a target="_blank" href="https://felixcreations.com"><img alt="Felixcreations Logo" class="img-logo trans-30" src="images/logos/felix-logo-white.webp"></a>
        </div>
    </div>
    <div class="flex-container" style="padding-bottom: 20px" id="footer-text">
        If you have any questions or concerns, please contact Michael Felix through <a class="email-link" target="_blank" href="mailto:mikemh@uri.edu">mikemh@uri.edu</a>
    </div>
</footer>

<script src="js/change-language.js"></script>
<script src="js/bios.js"></script>
</body>
</html>
