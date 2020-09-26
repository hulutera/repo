<?php

//Array of similar words in another language. e.g put the translation of same words with thier key from en.php or am.php files ( 'LANGUAGE' => 'LANGUAGE' or 'LANGUAGE' => 'ቋንቋ')
$lang = array (
     // array of similar words with their keys
);

// Put the translated words in an array format e.g: 'one', 'two', 'three'
// If the translated words aren't in an array format then use Notepad++'s replace Regular-expression to format it
$lang2 = array(
    // put an array of the translation of words stated in the above array in another language
);

//create an array with the key of the Main array
$lang5 = array();
foreach ($lang as $key => $value ) {
    if (is_array($value)){
        foreach ($value as $key1 => $value1 ) {
            if (is_array($value1)){
                foreach ($value1 as $key2 => $value2 ) {
                    if (is_array($value2)){
                        foreach ($value2 as $key3 => $value3 ) {
                            if (is_array($value3)){
                                foreach ($value3 as $key4 => $value4 ) {
                                    if (is_array($value4)){
                                        foreach ($value4 as $key5 => $value5 ) {
                                            if (is_array($value5)){
                                                foreach ($value5 as $key6 => $value6 ) {
                                                    if (is_array($value6)){
                                                        echo "haha";
                                                    } else {
                                                        $lang16 = array();
                                                        $lang17 = array_push($lang16, $key6);
                                                        array_push($lang5, $lang17);
                                                    }
                                                }

                                            } else {
                                                $lang14 = array();
                                                $lang15 = array_push($lang14, $key5);
                                                array_push($lang5, $lang15);
                                            }
                                        }

                                    } else {
                                        $lang12 = array();
                                        $lang13 = array_push($lang12, $key4);
                                        array_push($lang5, $lang13);
                                    }
                                }

                            } else {
                                $lang10 = array();
                                $lang11 = array_push($lang10, $key3);
                                array_push($lang5, $lang11);
                            }
                        }

                    } else {
                        $lang8 = array();
                        $lang9 = array_push($lang8, $key2);
                        array_push($lang5, $lang9);
                    }
                }
            }
            else{
                $lang6 = array();
                $lang7 = array_push($lang6, $key1);
                array_push($lang5, $lang7);
            }

        }
    } else {
        array_push($lang5, $key);
    }

}

//create an array format with key of the main array and value of the translated words

foreach (array_map(null, $lang5, $lang2) as list($item1, $item2))
{
    //echo gettype($item1);
    echo "\"" . $item1 ."\" => '" . $item2 . "',";
    echo "</br>";
}

?>