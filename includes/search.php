<?php
function carSearch()
{
    echo '<div class ="row car_search_cl se-el hide">';
    // Choose max price
    echo '<div class="col-xs-6 col-md-4">
            <p > ' . $GLOBALS['upload_specific_array']['common']['fieldPriceSell'][4] . '</p>
            <select  class="col-xs-12 col-md-8 car-select form-control" name="car_max_price">';
    echo '<option value="000">' . $GLOBALS['upload_specific_array']['common']['fieldPriceSell'][3] . '</option>';
    foreach ($GLOBALS['upload_specific_array']['common']['fieldPriceSell'][5] as $key => $value) {
        echo '<option value="' . $key . '">' . $GLOBALS['upload_specific_array']['common']['fieldPriceSell'][5][$key] . '</option>';
    }
    echo '</select></div>';

    // Car make
    echo '<div class="col-xs-6 col-md-4">
            <p > ' . $GLOBALS['upload_specific_array']['car']['fieldMake'][0] . '</p>
            <select  class="col-xs-12 col-md-8 car-select form-control" name="car_make">';
    echo '<option value="none">' . $GLOBALS['upload_specific_array']['car']['fieldMake'][1] . '</option>';
    foreach ($GLOBALS['upload_specific_array']['car']['fieldMake'][2] as $key => $value) {
        echo '<option value="' . $key . '">' . $GLOBALS['upload_specific_array']['car']['fieldMake'][2][$key] . '</option>';
    }
    echo '</select></div>';

    // Car type
    echo '<div class="col-xs-6 col-md-4">
            <p > ' . $GLOBALS['upload_specific_array']['car']['idCategory'][0] . '</p>
            <select  class="col-xs-12 col-md-8 car-select form-control" name="car_type">';
    echo '<option value="none">' . $GLOBALS['upload_specific_array']['car']['idCategory'][1] . '</option>';
    foreach ($GLOBALS['upload_specific_array']['car']['idCategory'][2] as $key => $value) {
        echo '<option value="' . $key . '">' . $GLOBALS['upload_specific_array']['car']['idCategory'][2][$key] . '</option>';
    }
    echo '</select></div>';

    // Car color
    $colors = [
        "black"    => ["#000000", "#000000"],
        "green"    => ["#009f6b", "#FFFFFF"],
        "red"      => ["#C40233", "#FFFFFF"],
        "yellow"   => ["#FFD300", "#000000"],
        "blue"     => ["#0087BD", "#FFFFFF"],
        "white"    => ["#ffffff", "#000000"],
        "brown"    => ["#a52a2a", "#FFFFFF"],
        "silver"   => ["#c0c0c0", "#FFFFFF"],
        "liver"    => ["#534b4f", "#FFFFFF"]
    ];
    $selectable = [];
    echo '<div class="col-xs-6 col-md-4">
            <p > ' . $GLOBALS['upload_specific_array']['common']['fieldColor'][0] . '</p>
            <select  class="col-xs-12 col-md-8 car-select form-control" name="car_color">';
    echo '<option value="none">' . $GLOBALS['upload_specific_array']['common']['fieldColor'][1] . '</option>';
    foreach ($colors as $key => $value) {
        echo '<option  style="background-color:' . $value[0] . ';color:' . $value[1] . ';width:90%">' . $GLOBALS['upload_specific_array']['common']['fieldColor'][2][$key] . '</option>';
    }
    echo '</select></div>';


    // Car Year of made
    echo '<div class="col-xs-6 col-md-4">
            <p > ' . $GLOBALS['upload_specific_array']['car']['fieldModelYear'][0] . '</p>
            <select  class="col-xs-12 col-md-8 car-select form-control" name="car_model_year">';
    echo '<option value="000">' . $GLOBALS['upload_specific_array']['car']['fieldModelYear'][1] . '</option>';
    foreach ($GLOBALS['upload_specific_array']['car']['fieldModelYear'][3] as $key => $value) {
        echo '<option value="' . $key . '">' . $GLOBALS['upload_specific_array']['car']['fieldModelYear'][3][$key] . '</option>';
    }
    echo '</select></div>';


    // Car gear type
    echo '<div class="col-xs-6 col-md-4">
            <p > ' . $GLOBALS['upload_specific_array']['car']['fieldGearType'][0] . '</p>
            <select  class="col-xs-12 col-md-8 car-select form-control" name="car_gear_type">';
    echo '<option value="none">' . $GLOBALS['upload_specific_array']['car']['fieldGearType'][1] . '</option>';
    foreach ($GLOBALS['upload_specific_array']['car']['fieldGearType'][2] as $key => $value) {
        echo '<option value="' . $key . '">' . $GLOBALS['upload_specific_array']['car']['fieldGearType'][2][$key] . '</option>';
    }
    echo '</select></div>';


    // Car fuel type
    echo '<div class="col-xs-6 col-md-4">
            <p > ' . $GLOBALS['upload_specific_array']['car']['fieldFuelType'][0] . '</p>
            <select  class="col-xs-12 col-md-8 car-select form-control" name="car_fuel_type">';
    echo '<option value="none">' . $GLOBALS['upload_specific_array']['car']['fieldFuelType'][1] . '</option>';
    foreach ($GLOBALS['upload_specific_array']['car']['fieldFuelType'][2] as $key => $value) {
        echo '<option value="' . $key . '">' . $GLOBALS['upload_specific_array']['car']['fieldFuelType'][2][$key] . '</option>';
    }
    echo '</select></div>';
    echo '</div>';
}

// House search elements
function houseSearch()
{
    echo '<div class ="row house_search_cl se-el hide">';
    // Choose max price
    echo '<div class="col-xs-6 col-md-4">
            <p > ' . $GLOBALS['upload_specific_array']['common']['fieldPriceSell'][4] . '</p>
            <select  class="col-xs-12 col-md-8 house_select form-control" name="house_max_price">';
    echo '<option value="000">' . $GLOBALS['upload_specific_array']['common']['fieldPriceSell'][3] . '</option>';
    foreach ($GLOBALS['upload_specific_array']['common']['fieldPriceSell'][6] as $key => $value) {
        echo '<option value="' . $key . '">' . $GLOBALS['upload_specific_array']['common']['fieldPriceSell'][6][$key] . '</option>';
    }
    echo '</select></div>';

    // House type
    echo '<div class="col-xs-6 col-md-4">
            <p > ' . $GLOBALS['upload_specific_array']['house']['idCategory'][0] . '</p>
            <select  class="col-xs-12 col-md-8 house_select form-control" name="house_type">';
    echo '<option value="none">' . $GLOBALS['upload_specific_array']['house']['idCategory'][1] . '</option>';
    foreach ($GLOBALS['upload_specific_array']['house']['idCategory'][2] as $key => $value) {
        echo '<option value="' . $key . '">' . $GLOBALS['upload_specific_array']['house']['idCategory'][2][$key] . '</option>';
    }
    echo '</select></div>';

    // House bedroom
    echo '<div class="col-xs-6 col-md-4">
            <p > ' . $GLOBALS['upload_specific_array']['house']['fieldNrBedroom'][3] . '</p>
            <select  class="col-xs-12 col-md-8 house_select form-control" name="house_bedroom">';
    echo '<option value="0">' . $GLOBALS['upload_specific_array']['house']['fieldNrBedroom'][1] . '</option>';
    for ($i = 1; $i <= 100; $i++) {
        echo '<option value="' . $i . '">' . $i . '</option>';
    }
    echo '<option value="101">' . $GLOBALS['upload_specific_array']['house']['fieldNrBedroom'][2] . '</option>';
    echo '</select></div>';

    // House toilet number
    echo '<div class="col-xs-6 col-md-4">
            <p > ' . $GLOBALS['upload_specific_array']['house']['fieldToilet'][3] . '</p>
            <select  class="col-xs-12 col-md-8 house_select form-control" name="house_toilet">';
    echo '<option value="0">' . $GLOBALS['upload_specific_array']['house']['fieldToilet'][1] . '</option>';
    for ($i = 1; $i <= 100; $i++) {
        echo '<option value="' . $i . '">' . $i . '</option>';
    }
    echo '<option value="101">' . $GLOBALS['upload_specific_array']['house']['fieldToilet'][2] . '</option>';

    echo '</select></div>';

    // House built year
    echo '<div class="col-xs-6 col-md-4">
            <p > ' . $GLOBALS['upload_specific_array']['house']['fieldBuildYear'][0] . '</p>
            <select  class="col-xs-12 col-md-8 house_select form-control" name="house_built_year">';
    echo '<option value="0">' . $GLOBALS['upload_specific_array']['house']['fieldBuildYear'][1] . '</option>';
    foreach ($GLOBALS['upload_specific_array']['house']['fieldBuildYear'][3] as $key => $value) {
        echo '<option value="' . $key . '">' . $GLOBALS['upload_specific_array']['house']['fieldBuildYear'][3][$key] . '</option>';
    }
    echo '</select></div>';
    echo '</div>';
}


// Computer search elements
function computerSearch()
{
    echo '<div class ="row computer_search_cl se-el hide">';
    // Choose max price
    echo '<div class="col-xs-6 col-md-4">
            <p > ' . $GLOBALS['upload_specific_array']['common']['fieldPriceSell'][4] . '</p>
            <select  class="col-xs-12 col-md-8 computer_select form-control" name="computer_max_price">';
    echo '<option value="000">' . $GLOBALS['upload_specific_array']['common']['fieldPriceSell'][3] . '</option>';
    foreach ($GLOBALS['upload_specific_array']['common']['fieldPriceSell'][7] as $key => $value) {
        echo '<option value="' . $key . '">' . $GLOBALS['upload_specific_array']['common']['fieldPriceSell'][7][$key] . '</option>';
    }
    echo '</select></div>';

    // Computer type
    echo '<div class="col-xs-6 col-md-4">
            <p > ' . $GLOBALS['upload_specific_array']['computer']['idCategory'][0] . '</p>
            <select  class="col-xs-12 col-md-8 computer_select form-control" name="computer_type">';
    echo '<option value="none">' . $GLOBALS['upload_specific_array']['computer']['idCategory'][1] . '</option>';
    foreach ($GLOBALS['upload_specific_array']['computer']['idCategory'][2] as $key => $value) {
        echo '<option value="' . $key . '">' . $GLOBALS['upload_specific_array']['computer']['idCategory'][2][$key] . '</option>';
    }
    echo '</select></div>';

    // Computer make
    echo '<div class="col-xs-6 col-md-4">
            <p > ' . $GLOBALS['upload_specific_array']['computer']['fieldMake'][0] . '</p>
            <select  class="col-xs-12 col-md-8 computer_select form-control" name="computer_make">';
    echo '<option value="none">' . $GLOBALS['upload_specific_array']['computer']['fieldMake'][1] . '</option>';
    foreach ($GLOBALS['upload_specific_array']['computer']['fieldMake'][2] as $key => $value) {
        echo '<option value="' . $key . '">' . $GLOBALS['upload_specific_array']['computer']['fieldMake'][2][$key] . '</option>';
    }
    echo '</select></div>';

    // Computer OS
    echo '<div class="col-xs-6 col-md-4">
            <p > ' . $GLOBALS['upload_specific_array']['computer']['fieldOs'][0] . '</p>
            <select  class="col-xs-12 col-md-8 computer_select form-control" name="computer_os">';
    echo '<option value="none">' . $GLOBALS['upload_specific_array']['computer']['fieldOs'][1] . '</option>';
    foreach ($GLOBALS['upload_specific_array']['computer']['fieldOs'][2] as $key => $value) {
        echo '<option value="' . $key . '">' . $GLOBALS['upload_specific_array']['computer']['fieldOs'][2][$key] . '</option>';
    }
    echo '</select></div>';

    // Computer processor
    echo '<div class="col-xs-6 col-md-4">
            <p > ' . $GLOBALS['upload_specific_array']['computer']['fieldProcessor'][0] . '</p>
            <select  class="col-xs-12 col-md-8 computer_select form-control" name="computer_proc">';
    echo '<option value="none">' . $GLOBALS['upload_specific_array']['computer']['fieldProcessor'][1] . '</option>';
    foreach ($GLOBALS['upload_specific_array']['computer']['fieldProcessor'][2] as $key => $value) {
        echo '<option value="' . $key . '">' . $GLOBALS['upload_specific_array']['computer']['fieldProcessor'][2][$key] . '</option>';
    }
    echo '</select></div>';

    // Computer harddrive
    echo '<div class="col-xs-6 col-md-4">
            <p > ' . $GLOBALS['upload_specific_array']['computer']['fieldHardDrive'][0] . '</p>
            <select  class="col-xs-12 col-md-8 computer_select form-control" name="computer_hd">';
    echo '<option value="none">' . $GLOBALS['upload_specific_array']['computer']['fieldHardDrive'][1] . '</option>';
    foreach ($GLOBALS['upload_specific_array']['computer']['fieldHardDrive'][2] as $key => $value) {
        echo '<option value="' . $key . '">' . $GLOBALS['upload_specific_array']['computer']['fieldHardDrive'][2][$key] . '</option>';
    }
    echo '</select></div>';


    // Computer color
    $colors = [
        "black"    => ["#000000", "#ffffff"],
        "white"    => ["#ffffff", "#000000"],
        "silver"   => ["#c0c0c0", "#FFFFFF"],

    ];
    $selectable = [];
    echo '<div class="col-xs-6 col-md-4">
            <p > ' . $GLOBALS['upload_specific_array']['common']['fieldColor'][0] . '</p>
            <select  class="col-xs-12 col-md-8 computer_select form-control" name="computer_color">';
    echo '<option value="none">' . $GLOBALS['upload_specific_array']['common']['fieldColor'][1] . '</option>';
    foreach ($colors as $key => $value) {
        echo '<option  style="background-color:' . $value[0] . ';color:' . $value[1] . ';width:90%">' . $GLOBALS['upload_specific_array']['common']['fieldColor'][2][$key] . '</option>';
    }
    echo '</select></div>';
    echo '</div>';
}


// Computer search elements
function phoneSearch()
{
    echo '<div class ="row phone_search_cl se-el hide">';
    // Choose max price
    echo '<div class="col-xs-6 col-md-4">
            <p > ' . $GLOBALS['upload_specific_array']['common']['fieldPriceSell'][4] . '</p>
            <select  class="col-xs-12 col-md-8 phone_select form-control" name="phone_max_price">';
    echo '<option value="000">' . $GLOBALS['upload_specific_array']['common']['fieldPriceSell'][3] . '</option>';
    foreach ($GLOBALS['upload_specific_array']['common']['fieldPriceSell'][8] as $key => $value) {
        echo '<option value="' . $key . '">' . $GLOBALS['upload_specific_array']['common']['fieldPriceSell'][8][$key] . '</option>';
    }
    echo '</select></div>';

    // Phone type
    echo '<div class="col-xs-6 col-md-4">
            <p > ' . $GLOBALS['upload_specific_array']['phone']['idCategory'][0] . '</p>
            <select  class="col-xs-12 col-md-8 phone_select form-control" name="phone_type">';
    echo '<option value="none">' . $GLOBALS['upload_specific_array']['phone']['idCategory'][1] . '</option>';
    foreach ($GLOBALS['upload_specific_array']['phone']['idCategory'][2] as $key => $value) {
        echo '<option value="' . $key . '">' . $GLOBALS['upload_specific_array']['phone']['idCategory'][2][$key] . '</option>';
    }
    echo '</select></div>';

    // Phone make
    echo '<div class="col-xs-6 col-md-4">
            <p > ' . $GLOBALS['upload_specific_array']['phone']['fieldMake'][0] . '</p>
            <select  class="col-xs-12 col-md-8 phone_select form-control" name="phone_make">';
    echo '<option value="none">' . $GLOBALS['upload_specific_array']['phone']['fieldMake'][1] . '</option>';
    foreach ($GLOBALS['upload_specific_array']['phone']['fieldMake'][2] as $key => $value) {
        echo '<option value="' . $key . '">' . $GLOBALS['upload_specific_array']['phone']['fieldMake'][2][$key] . '</option>';
    }
    echo '</select></div>';

    // Phone OS
    echo '<div class="col-xs-6 col-md-4">
            <p > ' . $GLOBALS['upload_specific_array']['phone']['fieldOs'][0] . '</p>
            <select  class="col-xs-12 col-md-8 phone_select form-control" name="phone_os">';
    echo '<option value="none">' . $GLOBALS['upload_specific_array']['phone']['fieldOs'][1] . '</option>';
    foreach ($GLOBALS['upload_specific_array']['phone']['fieldOs'][2] as $key => $value) {
        echo '<option value="' . $key . '">' . $GLOBALS['upload_specific_array']['phone']['fieldOs'][2][$key] . '</option>';
    }
    echo '</select></div>';

    // Phone camera
    echo '<div class="col-xs-6 col-md-4">
            <p > ' . $GLOBALS['upload_specific_array']['phone']['fieldCamera'][0] . '</p>
            <select  class="col-xs-12 col-md-8 phone_select form-control" name="phone_camera">';
    echo '<option value="none">' . $GLOBALS['upload_specific_array']['phone']['fieldCamera'][1] . '</option>';
    foreach ($GLOBALS['upload_specific_array']['phone']['fieldCamera'][2] as $key => $value) {
        echo '<option value="' . $key . '">' . $GLOBALS['upload_specific_array']['phone']['fieldCamera'][2][$key] . '</option>';
    }
    echo '</select></div>';
    echo '</div>';
}

// Electronic search
function electronicSearch()
{
    echo '<div class ="row electronic_search_cl se-el hide">';
    // Choose max price
    echo '<div class="col-xs-6 col-md-4">
            <p > ' . $GLOBALS['upload_specific_array']['common']['fieldPriceSell'][4] . '</p>
            <select  class="col-xs-12 col-md-8 electronic_select form-control" name="electronic_max_price">';
    echo '<option value="000">' . $GLOBALS['upload_specific_array']['common']['fieldPriceSell'][3] . '</option>';
    foreach ($GLOBALS['upload_specific_array']['common']['fieldPriceSell'][8] as $key => $value) {
        echo '<option value="' . $key . '">' . $GLOBALS['upload_specific_array']['common']['fieldPriceSell'][8][$key] . '</option>';
    }
    echo '</select></div>';

    // Electronic type
    echo '<div class="col-xs-6 col-md-4">
            <p > ' . $GLOBALS['upload_specific_array']['electronic']['idCategory'][0] . '</p>
            <select  class="col-xs-12 col-md-8 electronic_select form-control" name="electronic_type">';
    echo '<option value="none">' . $GLOBALS['upload_specific_array']['electronic']['idCategory'][1] . '</option>';
    foreach ($GLOBALS['upload_specific_array']['electronic']['idCategory'][2] as $key => $value) {
        echo '<option value="' . $key . '">' . $GLOBALS['upload_specific_array']['electronic']['idCategory'][2][$key] . '</option>';
    }
    echo '</select></div>';
    echo '</div>';
}

// Household Search elements
function householdSearch()
{
    echo '<div class ="row household_search_cl se-el hide">';
    // Choose max price
    echo '<div class="col-xs-6 col-md-4">
            <p > ' . $GLOBALS['upload_specific_array']['common']['fieldPriceSell'][4] . '</p>
            <select  class="col-xs-12 col-md-8 household_select form-control" name="household_max_price">';
    echo '<option value="000">' . $GLOBALS['upload_specific_array']['common']['fieldPriceSell'][3] . '</option>';
    foreach ($GLOBALS['upload_specific_array']['common']['fieldPriceSell'][8] as $key => $value) {
        echo '<option value="' . $key . '">' . $GLOBALS['upload_specific_array']['common']['fieldPriceSell'][8][$key] . '</option>';
    }
    echo '</select></div>';

    // Electronic type
    echo '<div class="col-xs-6 col-md-4">
            <p > ' . $GLOBALS['upload_specific_array']['household']['idCategory'][0] . '</p>
            <select  class="col-xs-12 col-md-8 household_select form-control" name="household_type">';
    echo '<option value="none">' . $GLOBALS['upload_specific_array']['electronic']['idCategory'][1] . '</option>';
    foreach ($GLOBALS['upload_specific_array']['household']['idCategory'][2] as $key => $value) {
        echo '<option value="' . $key . '">' . $GLOBALS['upload_specific_array']['household']['idCategory'][2][$key] . '</option>';
    }
    echo '</select></div>';
    echo '</div>';
}

// Other Search elements
function otherSearch()
{
    echo '<div class ="row other_search_cl se-el hide">';

    // Choose max price
    echo '<div class="col-xs-6 col-md-4">
            <p > ' . $GLOBALS['upload_specific_array']['common']['fieldPriceSell'][4] . '</p>
            <select  class="col-xs-12 col-md-8 other_select form-control" name="other_max_price">';
    echo '<option value="000">' . $GLOBALS['upload_specific_array']['common']['fieldPriceSell'][3] . '</option>';
    foreach ($GLOBALS['upload_specific_array']['common']['fieldPriceSell'][8] as $key => $value) {
        echo '<option value="' . $key . '">' . $GLOBALS['upload_specific_array']['common']['fieldPriceSell'][8][$key] . '</option>';
    }
    echo '</select></div>';

    // Other type
    echo '<div class="col-xs-6 col-md-4">
            <p > ' . $GLOBALS['upload_specific_array']['other']['idCategory'][0] . '</p>
            <select  class="col-xs-12 col-md-8 other_select form-control" name="other_type">';
    echo '<option value="none">' . $GLOBALS['upload_specific_array']['other']['idCategory'][1] . '</option>';
    foreach ($GLOBALS['upload_specific_array']['other']['idCategory'][2] as $key => $value) {
        echo '<option value="' . $key . '">' . $GLOBALS['upload_specific_array']['other']['idCategory'][2][$key] . '</option>';
    }
    echo '</select></div>';
    echo '</div>';
}
