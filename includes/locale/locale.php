<?php

function locale($current_link)
{
    $en = null;
    $am = null;
    $ao = null;
    $tg = null;
    $so = null;
    $gu = null;
    $si = null;
    $wo = null;
    if (isset($_GET['type'])) {
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
    }
    else
    {
        $en = $current_link . '?&lan=en';
        $am = $current_link . '?&lan=am';
        $ao = $current_link . '?&lan=ao';
        $tg = $current_link . '&lan=tg';
        $so = $current_link . '&lan=so';
        $gu = $current_link . '&lan=gu';
        $si = $current_link . '&lan=si';
        $wo = $current_link . '&lan=wo';
    }

    echo '<div id="toplinktexts">';
    echo '<select onchange="location =this.options[this.selectedIndex].value;" name="language" class="locale">';
    echo '<option value = "">LANGUAGE</option>';
    echo '<option value = "' . $en. '">ENGLISH</option>';
    echo '<option value = "' . $am. '">አማርኛ</option>';
    echo '<option value = "' . $ao. '">AFAN OROMO</option>';
    echo '<option value = "' . $tg. '">ትግርኛ</option>';
    echo '<option value = "' . $so. '">SOMALI</option>';
    echo '<option value = "' . $si. '">SIDAAMU AFOO</option>';
    echo '<option value = "' . $gu. '">ጉራግኛ</option>';
    echo '<option value = "' . $wo. '">ወላይትኛ</option>';
    echo '</select>';
    echo '<div>';
}
