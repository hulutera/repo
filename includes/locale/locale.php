<?php
$GLOBALS['GEEZ'] = ['am', 'gu', 'wo', 'tg'];
function locale($current_link)
{
    global $lang;
    $en = null;
    $am = null;
    $ao = null;
    $tg = null;
    $so = null;
    if (isset($_GET['lan'])) {
        $arr = array("lan=am", "lan=en", "lan=ao", "lan=tg", "lan=so");
        foreach ($arr as $key => $value) {
            if (strpos($current_link, $value) !== false) {
                $current_link = str_replace($value, '', $current_link);
                break;
            }
        }
        $en = $current_link . 'lan=en';
        $am = $current_link . 'lan=am';
        $ao = $current_link . 'lan=ao';
        $tg = $current_link . 'lan=tg';
        $so = $current_link . 'lan=so';
    } else {

        if (strpos($current_link, "?")) {
            $lang_link = "&lan";
        } else {
            $lang_link = "?lan";
        }

        $en = $current_link . $lang_link . '=en';
        $am = $current_link . $lang_link . '=am';
        $ao = $current_link . $lang_link . '=ao';
        $tg = $current_link . $lang_link . '=tg';
        $so = $current_link . $lang_link . '=so';
    }

    $language = [
        $en => ["ENGLISH", "|"],
        $am => ["አማርኛ", "|"],
        $ao => ["AFAAN OROMOO", "|"],
        $tg => ["ትግርኛ", "|"],
        $so => ["SOMALI", ""]
    ];
    ___open_div_('col-xs-12 col-md-12', '');
    echo '<ul class="lan-selector">';
    echo '<span style="color:white; padding:5px;font-weight:bold;">'.$GLOBALS['lang']['LANGUAGE'].' :</span>';
    foreach ($language as $key => $value) {
        $id = substr($key, -2);
        if(isset($_GET['lan']) && $_GET['lan'] == $id)
        {
            $style = "
            display:inline;
            background-color:yellow;
            font-size:14px;
            color:black;
            font-weight:bold;
            border-radius:5%;
            ";
        } else{
            $style = "display:inline;font-size:14px;color:white;font-weight:bold: border-radius:5%;";
        }
        echo '<a href="'.$key.'" class="'.$id.'" style="'.$style.'"><li  style="display:inline;padding:5px;border:5px;" id="'.$id.'" data-toggle="tooltip" data-placement="bottom" title="'.$value[0].'">' . $value[0];
        echo '</li></a><span style="color:white"> '. $value[1] .' </span>';

    }
    echo '</ul>';
    ___close_div_(1);
}
