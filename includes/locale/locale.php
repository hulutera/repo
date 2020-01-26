<?php

function locale($current_link)
{
    $en = null;
    $am = null;
    $ao = null;
    $tg = null;
    if (isset($_GET['type'])) {
        $arr = array("&lan=am", "&lan=en", "&lan=ao", "&lan=tg", "&lan=so");
        foreach ($arr as $key => $value) {
            if (strpos($current_link, $value) !== false) {
                $current_link = str_replace($value, '', $current_link);
                break;
            }
        }
        $en = $current_link . '&lan=en';
        $am = $current_link . '&lan=am';
        $ao = $current_link . '&lan=ao';
        $so = $current_link . '&lan=so';
        $tg = $current_link . '&lan=tg';
    }
    else
    {
        $en = $current_link . '?&lan=en';
        $am = $current_link . '?&lan=am';
        $ao = $current_link . '?&lan=ao';
        $so = $current_link . '?&lan=so';
        $tg = $current_link . '?&lan=tg';
    }

    echo '<div id="toplinktexts">';
    echo '<select onchange="location =this.options[this.selectedIndex].value;" name="language" class="locale">';
    echo '<option value = "">LANGUAGE</option>';
    echo '<option value = "' . $en. '">ENGLISH</option>';
    echo '<option value = "' . $am. '">AMHARIC</option>';
    echo '<option value = "' . $ao. '">AFAN OROMO</option>';
    echo '<option value = "' . $so. '">SOMALI</option>';
    echo '<option value = "' . $tg. '">TIGRIGAN</option>';
    echo '</select>';
    echo '<div>';
}
