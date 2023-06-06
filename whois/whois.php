<?php
require_once "_WHOIS.php";
$WHOIS = new WHOIS("WHOIS_SERVERS.json");


if(isset($_POST['domain'])){
    $HEY_WAKE_UP = true;
    $CALL_WHOIS = $WHOIS->WHOIS($_POST['domain']);
    if($CALL_WHOIS['STATUS'] !== "OK"){
        $DISPLAY = $CALL_WHOIS['MSG'];
    }else{
        $DISPLAY = str_replace("\n", "<br>", $CALL_WHOIS['RESULT']);
    }
}
?>

    <link rel="stylesheet" as="style" crossorigin href="https://cdn.jsdelivr.net/gh/orioncactus/pretendard@v1.3.6/dist/web/static/pretendard.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.16.18/dist/css/uikit.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.16.18/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.16.18/dist/js/uikit-icons.min.js"></script>
    <style>
        *, html, body,h1,pre{
            font-family: "Pretendard Variable", Pretendard, -apple-system, BlinkMacSystemFont, system-ui, Roboto, "Helvetica Neue", "Segoe UI", "Apple SD Gothic Neo", "Noto Sans KR", "Malgun Gothic", "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", sans-serif;
        }
    </style>

<div class="uk-container uk-container-small" style="margin-top: 30px">
    <h1>Hasil WHOIS</h1>
        <div class="uk-margin">
            <input class="uk-input" type="text" aria-label="Input" autocomplete="off" name="domain" value="URL : <?=$_POST['domain']?>" disabled>
        </div>
    <?php if($HEY_WAKE_UP){?>
    <div class="uk-margin">
        <pre><?=$DISPLAY?></pre>
    </div>
    <?php }?>
</div>
