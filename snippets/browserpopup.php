<?php 
    $useragent = getBrowser();
    if($useragent['bname'] == "Internet Explorer" and !isset($_COOKIE['warningSeen'])): 
    
    setcookie('warningSeen', true, time() + (86400 * 30), "/"); // 86400 = 1 day
    
    ?>
    <style>
        .oldBrowserWarning{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 9999999;
            padding: 2rem;
            width: 80vw;
            max-height: 80vw;
            overflow: auto;
            background-color: #fff;
        }
        .warningWrapper::before{
            content: "";
            background-color: #000;
            width: 100%;
            height: 100%;
            position: absolute;
            z-index: 999999;
            top: 0;
            opacity: .6;
        }

        body.noscroll{
            overflow: hidden;
        }
    </style>
    <?php 
        $standardprompts = array(
            'popupText'     => "Hey, it looks like you're using " . $useragent['bname'] . " Version:" . $useragent['version'] . ". That's an unsafe and old browser. We recommend getting a modern one from the list below: \n (link: https://www.google.com/intl/de_de/chrome/ text: Google Chrome target: new) \n (link: https://www.apple.com/de/safari/ https://www.mozilla.org/de/firefox/new/ text: Mozilla Firefox target: new) \n (link: text: Apple Safari target: new)",
            'popupButton'   => "close"
        );

        $popupText      = !empty($site->popupText()) ? $site->popupText()->kt() : kirbytext($standardprompts['popupText']);
        $popupButton    = !empty($site->popupButton()) ? $site->popupButton() : $standardprompts['popupButton'];

        $popupText = str_replace('%browsername', $useragent['bname'], $popupText);
        $popupText = str_replace('%browserversion', $useragent['version'], $popupText);
        $popupText = str_replace('%platform', $useragent['platform'], $popupText);
        $popupText = str_replace('%pattern', $useragent['pattern'], $popupText);
        $popupText = str_replace('%useragent', $useragent['userAgent'], $popupText);
    ?>

    <div class="warningWrapper">
        <div class="oldBrowserWarning">
            <div><?= $popupText ?></div>
            <button class="" onclick="seenBrowserWarning();"><?= $popupButton ?></button>
        </div>
    </div>


    <script>
        function browserWarningBlock(){
            document.querySelector('body').classList.add('noscroll');
        }

        function seenBrowserWarning(){
            let warningmodal = document.querySelector('.warningWrapper');
            warningmodal.style.display = "none";
            document.querySelector('body').classList.remove('noscroll');
        }

        browserWarningBlock();
    </script>
<?php 
    endif; 
?>