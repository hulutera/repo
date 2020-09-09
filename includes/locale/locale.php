<?php
$GLOBALS['GEEZ'] = ['am', 'gu', 'wo', 'tg'];
function locale($current_link)
{
    global $lang;
    $ln = 0;
    $en = null;
    $am = null;
    $ao = null;
    $tg = null;
    $so = null;
    $gu = null;
    $si = null;
    $wo = null;
    if (isset($_GET['lan'])) {
        $arr = array("&lan=am", "&lan=en", "&lan=ao", "&lan=tg", "&lan=so", "&lan=gu", "&lan=si", "&lan=wo");
        foreach ($arr as $key => $value) {
            if (strpos($current_link, $value) !== false) {
                $current_link = str_replace($value, '', $current_link);
                break;
            }
        }
        $en = $current_link . '&lan=en';
        $am = $current_link . '&lan=am';
        $ao = $current_link . '&lan=ao';
        $tg = $current_link . '&lan=tg';
        $so = $current_link . '&lan=so';
        $gu = $current_link . '&lan=gu';
        $si = $current_link . '&lan=si';
        $wo = $current_link . '&lan=wo';
    } else {

        if (strpos($current_link, "?")) {
            $lang_link = "&lan";
        } else {
            $lang_link = "?&lan";
        }


        $en = $current_link . $lang_link . '=en';
        $am = $current_link . $lang_link . '=am';
        $ao = $current_link . $lang_link . '=ao';
        $tg = $current_link . $lang_link . '=tg';
        $so = $current_link . $lang_link . '=so';
        $gu = $current_link . $lang_link . '=gu';
        $si = $current_link . $lang_link . '=si';
        $wo = $current_link . $lang_link . '=wo';
    }

    $language = [
        $ln => $lang['LANGUAGE'],
        $en => "ENGLISH",
        $am => "አማርኛ",
        $ao => "AFAAN OROMO",
        $tg => "ትግርኛ",
        $so => "SOMALI",
        $si => "SIDAAMU AFOO",
        $gu => "ጉራግኛ",
        $wo => "ወላይትኛ"
    ];
    ___open_div_('lan-selector', '" style="float:right;');
    echo '<select onchange="location =this.options[this.selectedIndex].value;" name="language" class="locale select-css">';
    foreach ($language as $key => $value) {
        //use mb_substr($value,0,2) to get the first two characters
        echo $key;
        echo '<option value = "' . $key . '" data-image="../images/icons/ethiopia.png" ><strong>' . $value . '</strong></option>';
    }
    echo '</select>';
    ___close_div_(1);
}
