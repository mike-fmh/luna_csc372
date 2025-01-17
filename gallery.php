<?php

$language = $_COOKIE['language'] ?? 'en';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $language = $_POST["language"];
    setcookie("language", $language, time() + (24 * 60 * 60 * 30), "/"); // 30 days
}

class GalleryImage {
    public $url;
    public $alt;

    function __construct($url, $alt) {
        $this->url = $url;
        $this->alt = $alt;
    }

    function toHTML() {
        return "<div class='gallery-container'><img class='gallery-img rounded' src='{$this->url}' alt='{$this->alt}'></div>";
    }
}

function loadGallery($filepath) {
    $jsonData = file_get_contents($filepath); // create an xml request for the gallery json file
    $imagesData = json_decode($jsonData, true); // load the json as a key-value array
    $parsedHTML = '';
    foreach ($imagesData['pictures'] as $picture) {
        $image = new GalleryImage($picture['url'], $picture['alt']);
        $parsedHTML .= "\n" . $image->toHTML();
    }
    return $parsedHTML;
}

$galleryHtml = loadGallery('data/json/gallery.json');
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
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/gallery.css">
    <title>Luna | Media</title>

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
            <li><a id="bios-nav" href="bios.php">About</a></li>
            <li><a id="media-nav" href="#">Media</a></li>
            <li><a id="patreon-nav" href="contact.php">Contact</a></li>
            <li class="lang-chg trans-17">
                <form id="language-form" action="gallery.php" method="POST">
                    <input type="hidden" name="language" id="language-input">
                    <button type="submit"><img id="change-language-img" alt="Button that changes the page's language" src="images/buttons/globe-white-es.webp"></button>
                </form>
            </li>
        </ul>
    </div>
</nav>
<main>
    <div class="trans-contained-box page-title-white grey-bg">
        <div class="main-title-text"><h1 id="page-title">Media</h1></div>
        <div class="videoWrapper">
            <iframe allowfullscreen src="https://www.youtube.com/embed/Ua5sYoeHdfo"></iframe>
        </div>

        <div class="main-title-text"><h1 id="gallery-title">Gallery</h1></div>
        <div class="black-bg rounded inner-div">
            <div class="gallery-box" id="main-gallery-container">
                <?= $galleryHtml ?>
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
<script src="js/gallery-lang.js"></script>
</body>
</html>