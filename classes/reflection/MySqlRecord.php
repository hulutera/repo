<?php

/**
 * Class MySqlRecord
 * Base class for the auto generated beans
 *
 * @author Rosario Carvello <rosario.carvello@gmail.com>
 * @version GIT:v1.1.0
 * @copyright (c) 2016 Rosario Carvello <rosario.carvello@gmail.com> - All rights reserved. See License.txt file
 * @license BSD Clause 3 License
 * @license https://opensource.org/licenses/BSD-3-Clause This software is distributed under BSD-3-Clause Public License
 */


class MySqlRecord extends Model
{
    /**
     * A control attribute for storing the last executed SQL statement.
     * @var string
     */
    protected $lastSql = null;

    /**
     * A control attribute for storing the last SQL error.
     * @var string
     */
    protected $lastSqlError = null;

    /**
     * lastSql Gets the last executed SQL statement
     * @return string
     */
    public function lastSql()
    {
        return $this->lastSql;
    }

    /**
     * lastSqlError Gets the last occurred SQL error
     * @return string
     */
    public function lastSqlError()
    {
        return $this->lastSqlError;
    }

    /**
     * isSqlError Gets if an Sql error occurred
     * @return bool
     */
    public function isSqlError()
    {
        if ($this->lastSqlError() != "") {
            return true;
        } else {
            return false;
        }
    }

    /**
     * resetLastSqlError Reset the SQL error information
     */
    protected function resetLastSqlError()
    {
        $this->lastSqlError = "";
    }

    /**
     * parseValue Parses the value and returns NULL if null occurred
     *
     * For a not null value, depending on data type, adjusts
     * the correct quotation by returning a quoted or not escaped string to be used during SQL statements.
     * @param mixed $value The value to evaluate
     * @param string $type The data type of first parameter, default is number (int/float) value
     * @return null|string|int|float quoted or not value
     */
    protected function parseValue($value = null, $type = "number")
    {
        $constants = get_defined_constants();

        if ($type == "int" || $type == "float" || $type == "real" || $type == "double") {
            if ($value != null) {
                switch ($type) {
                    case "double":
                        $value = (float) $value;
                        break;
                    case "float":
                        $value = (float) $value;;
                        break;
                    case "real":
                        $value = (float) $value;;
                        break;
                    default:
                        $value = (int) $value;;
                }
            }
            $type = "number";
        }
        if ($value == null) {
            return "NULL";
        } else if ($value != null && $type != "number" && $type != "date" && $type != "datetime") {
            return "'" . $this->real_escape_string($value) . "'";
        } else if ($value != null && $type != "number" && $type == "date") {
            return    "STR_TO_DATE('" . $this->real_escape_string($value) . "','" . $constants['STORED_DATE_FORMAT'] . "')";
        } else if ($value != null && $type != "number" && $type == "datetime") {
            return    "STR_TO_DATE('" . $this->real_escape_string($value) . "','" . $constants['STORED_DATETIME_FORMAT'] . "')";
        } else if ($value != null && $type == "number" && is_numeric($value)) {
            return $value;
        } else {
            return "NULL";
        }
    }

    /**
     * Replaces backslash present into MySQL strings which containing apostrophes.
     *
     * @param  string $field The field to replace
     * @return string the field without backslash for the aphos
     */
    protected function replaceAposBackSlash($field)
    {
        $r1 =  str_replace("\'", "'", $field);
        $r2 =  str_replace("\\\\", "\\", $r1);
        return $r2;
    }

    protected function insertFieldLocation()
    {
        $errorMsg = "";
        $errorClass = '';
        if (isset($_SESSION['errorRaw']['fieldLocation'])) {
            $errorMsg = $GLOBALS['item_specific_array']['common']['validate'][0];
            $errorClass = ' alert alert-custom" role="alert';
        }
        $selected = 0;
        $city = $GLOBALS['city_lang_arr'];
        $location = $GLOBALS['item_specific_array']['common']['Location'][0];
        $choose = $GLOBALS['item_specific_array']['common']['Location'][1];
        $choose1 = $choose2 = $choose;
        if (isset($_SESSION['POST']['fieldLocation'])) {
            if (strpos($_SESSION['POST']['fieldLocation'], $GLOBALS['lang']['Choose']) !== false) {
                $choose1 = $choose2 = $choose;
            } else {
                $temp = $_SESSION['POST']['fieldLocation'];
                $choose1 = $temp;
                $choose2 = $city[$temp];
                $selected = 1;
            }
        }
        echo <<< EOD
        <div class="col-md-4 {$errorClass}">
        <div class="form-group">
           <label for="fieldLocation">{$location}</label>{$errorMsg}
            <div>
             <select id="fieldLocation" name="fieldLocation" class="select form-control" >
        <option value="{$choose1}">{$choose2}</option>
EOD;
        if ($selected == 1)
            echo <<< EOD
        <option value="{$choose}">{$choose}</option>;
EOD;
        foreach ($city as $key => $value) {
            if ($key === '000' || $key === 'All') {
                continue;
            }
            echo '<option value="' . $key . '">' . $value . '</option>';
        }
        echo <<<EOD
            </select></div></div></div>
EOD;
    }

    protected function insertFieldTitle()
    {
        $errorMsg = "";
        $errorClass = '';
        if (isset($_SESSION['errorRaw']['fieldTitle'])) {
            $errorMsg = $GLOBALS['item_specific_array']['common']['validate'][1];
            $errorClass = ' alert alert-custom" role="alert';
        }

        $title = $GLOBALS['item_specific_array']['common']['Title'][0];
        $placeholder = $GLOBALS['item_specific_array']['common']['Title'][1];
        $choose = "";
        if (isset($_SESSION['POST']['fieldTitle'])) {
            $choose = $_SESSION['POST']['fieldTitle'];
        }
        echo <<< EOD
        <div class="col-md-4 {$errorClass}"">
        <div class="form-group">
        <label for="fieldTitle">{$title}</label> {$errorMsg}
        <div>
          <input id="fieldTitle" name="fieldTitle" type="text" placeholder="{$placeholder}" value="{$choose}" class="form-control">
        </div>
      </div></div>
EOD;
    }
    
    protected function insertFieldExtraInfo()
    {
        echo '
        <div class="form-group">
        <label for="fieldExtraInfo">Extra Info</label> 
        <div>
          <textarea id="fieldExtraInfo" name="fieldExtraInfo" cols="50" rows="2" class="form-control">' . $_SESSION['POST']['fieldExtraInfo'] . '</textarea>
        </div>
      </div></div>';
    }

    protected function insertFieldContactMethod()
    {
        $errorMsg = "";
        $errorClass = '';
        if (isset($_SESSION['errorRaw']['fieldContactMethod'])) {
            $errorMsg = $GLOBALS['item_specific_array']['common']['validate'][0];
            $errorClass = ' alert alert-custom" role="alert';
        }
        $selected = 0;
        $contactMeWith = $GLOBALS['item_specific_array']['common']['contactMeWith'][0];
        $choose = $GLOBALS['item_specific_array']['common']['contactMeWith'][1];
        $types = $GLOBALS['item_specific_array']['common']['contactMeWith'][2];


        $choose1 = $choose2 = $choose;
        if (isset($_SESSION['POST']['fieldContactMethod'])) {
            if (strpos($_SESSION['POST']['fieldContactMethod'], $GLOBALS['lang']['Choose']) !== false) {
                $choose1 = $choose2 = $choose;
            } else {
                $temp = $_SESSION['POST']['fieldContactMethod'];
                $choose1 = $temp;
                $choose2 = $types[$temp];
                $selected = 1;
            }
        }

        echo <<<EOD
        <div class="col-md-4 {$errorClass}">
        <div class="form-group">
        <label for="fieldContactMethod">{$contactMeWith}</label>{$errorMsg}
        <div>
        <select id="fieldContactMethod" name="fieldContactMethod" class="select form-control">
        <option value="{$choose1}">{$choose2}</option>
EOD;

        if ($selected == 1) {
            echo <<< EOD
<option value="{$choose}">{$choose}</option>
EOD;
        }
        foreach ($types as $key => $value) {
            echo '        
            <option value="' . $key . '" >' . $value . '</option>';
        }
        echo '</select></div></div></div>';
    }

    protected function insertItemImages()
    {
        $errorMsg = "";
        $errorClass = '';
        if (isset($_SESSION['errorRaw']['fileuploader-list-files'])) {
            $validate = $GLOBALS['item_specific_array']['common']['validate'][2];
            $errorMsg = $validate['fileuploader-list-files'];
            $errorClass = ' alert alert-custom" role="alert';
        }

        $image = $GLOBALS['item_specific_array']['common']['Choose Images here'];

        echo <<< EOD
        <div class="row upload {$errorClass}">
        <div class="form-group">
            <label for="fieldImage"> {$image} </label>{$errorMsg}
            <div>
                    <!-- file input -->
                    <input type="file" name="files">
            </div>
        </div>
        </div>        
EOD;
    }

    protected function inputPriceRentOrSell()
    {
        $errorMsg = "";
        $errorClass = '';
        if (isset($_SESSION['errorRaw']['rentOrSell'])) {
            $validate = $GLOBALS['item_specific_array']['common']['validate'][2];
            $errorMsg = $validate['rentOrSell'];
            $errorClass = ' alert alert-custom" role="alert';
        }
        $selected = 0;
        $rentOrSell = $GLOBALS['item_specific_array']['common']['rentOrSell'];
        $label = $rentOrSell[0];
        $choose = $rentOrSell[1];
        $choose1 = 'rentOrSell';
        $choose2 = $choose;
        if (isset($_SESSION['POST']['rentOrSell'])) {
            if (strpos($_SESSION['POST']['rentOrSell'], 'rentOrSell') !== false) {
                $choose1 = 'rentOrSell';
                $choose2 = $choose;
            } else {
                $temp = $_SESSION['POST']['rentOrSell'];
                $choose1 = $temp;
                $choose2 = $rentOrSell[2][$temp];
                $selected = 1;
            }
        }

        echo <<<EOD
    <div class="col-md-12 {$errorClass}">
    <div class="form-group">
    <label for="rentOrSell">{$label}</label>{$errorMsg}
    <div>
    <select id="rentOrSell" name="rentOrSell" class="select form-control">
    <option value="{$choose1}">{$choose2}</option>
EOD;

        if ($selected == 1) {
            echo <<< EOD
<option value="{$choose1}">{$choose}</option>
EOD;
        }
        foreach ($rentOrSell[2] as $key => $value) {
            echo '<option value="' . $key . '" >' . $value . '</option>';
        }
        echo '</select></div></div></div>';
    }

    protected function insertFieldPriceNego()
    {
        $errorMsg = "";
        $errorClass = '';
        if (isset($_SESSION['errorRaw']['fieldPriceNego'])) {
            $errorMsg = $GLOBALS['item_specific_array']['common']['validate'][0];
            $errorClass = ' alert alert-custom" role="alert';
        }
        $selected = 0;
        $negotiable = $GLOBALS['item_specific_array']['common']['negotiable'];
        $label = $negotiable[0];
        $choose = $negotiable[1];
        $choose1 = $choose2 = $choose;
        if (isset($_SESSION['POST']['fieldPriceNego'])) {
            if (strpos($_SESSION['POST']['fieldPriceNego'], $GLOBALS['lang']['Choose']) !== false) {
                $choose1 = $choose2 = $choose;
            } else {
                $temp = $_SESSION['POST']['fieldPriceNego'];
                $choose1 = $temp;
                $choose2 = $negotiable[2][$temp];
                $selected = 1;
            }
        }

        echo <<<EOD
    <div class="col-md-12 {$errorClass}">
    <div class="form-group">
    <label for="fieldPriceNego">{$label}</label>{$errorMsg}
    <div>
    <select id="fieldPriceNego" name="fieldPriceNego" class="select form-control">
    <option value="{$choose1}">{$choose2}</option>
EOD;

        if ($selected == 1) {
            echo <<< EOD
<option value="{$choose}">{$choose}</option>
EOD;
        }
        echo '
    <option value="yes" >' . $negotiable[2]['yes'] . '</option>
    <option value="no" >' . $negotiable[2]['no'] . '</option>
    </select></div></div></div>';
    }

    protected function insertFieldPriceCurrency()
    {
        $errorMsg = "";
        $errorClass = '';
        if (isset($_SESSION['errorRaw']['fieldPriceCurrency'])) {
            $errorMsg = $GLOBALS['item_specific_array']['common']['validate'][0];
            $errorClass = ' alert alert-custom" role="alert';
        }
        $selected = 0;
        $currency = $GLOBALS['item_specific_array']['common']['currency'];
        $label = $currency[0];
        $choose = $currency[1];
        $choose1 = $choose2 = $choose;
        if (isset($_SESSION['POST']['fieldPriceCurrency'])) {
            if (strpos($_SESSION['POST']['fieldPriceCurrency'], $GLOBALS['lang']['Choose']) !== false) {
                $choose1 = $choose2 = $choose;
            } else {
                $temp = $_SESSION['POST']['fieldPriceCurrency'];
                $choose1 = $temp;
                $choose2 = $currency[2][$temp];
                $selected = 1;
            }
        }

        echo <<<EOD
    <div class="col-md-12 {$errorClass}">
    <div class="form-group">
    <label for="fieldPriceCurrency">{$label}</label>{$errorMsg}
    <div>
    <select id="fieldPriceCurrency" name="fieldPriceCurrency" class="select form-control">
    <option value="{$choose1}">{$choose2}</option>
EOD;

        if ($selected == 1) {
            echo <<< EOD
<option value="{$choose}">{$choose}</option>
EOD;
        }
        echo '
        <option value="ETB" >' . $currency[2]['ETB'] . '</option>
        <option value="USD" >' . $currency[2]['USD'] . '</option>
        </select></div></div></div>';
    }

    protected function insertFieldPriceRate()
    {
        $errorMsg2 = "";
        $errorClass2 = "";

        if (isset($_SESSION['errorRaw']['fieldPriceRate'])) {
            $errorMsg2 = $GLOBALS['item_specific_array']['common']['validate'][0];
            $errorClass2 = ' alert alert-custom" role="alert';
        }
        $selected = 0;
        $rentRate = $GLOBALS['item_specific_array']['common']['Rent Rate'];
        $labelRate = $rentRate[0];
        $choose = $rentRate[1];
        $choose1 = 'default';
        $choose2 = $choose;
        if (isset($_SESSION['POST']['fieldPriceRate'])) {
            if (strpos($_SESSION['POST']['fieldPriceRate'], 'default') !== false) {
                $choose1 = 'default';
                $choose2 = $choose;
            } else {
                $temp = $_SESSION['POST']['fieldPriceRate'];
                $choose1 = $temp;
                $choose2 = $rentRate[2][$temp];
                $selected = 1;
            }
        }
        echo <<< EOD
            <div class="row" >
            <div class="row {$errorClass2}">

                <label for="fieldPriceRate">{$labelRate}</label>{$errorMsg2}
                <select id="fieldPriceRate" name="fieldPriceRate" class="form-control">
EOD;

        echo <<< EOD
        <option value="{$choose1}">{$choose2}</option>
EOD;
        if ($selected == 1) {
            echo <<< EOD
        <option value="{$choose}">{$choose}</option>
EOD;
        }
        $rate = $GLOBALS['item_specific_array']['common']['Rent Rate'][2];
        foreach ($rate as $key => $value) {
            echo '<option value="' . $key . '">' . $value . '</option>';
        }
        echo '</select></div></div>';
    }
    protected function insertPriceTypeRent()
    {
        $diplayRent = "display: none;";
        if (
            isset($_SESSION['POST']["rentOrSell"]) &&
            ($_SESSION['POST']["rentOrSell"] == "fieldPriceRent" || $_SESSION['POST']["rentOrSell"] == "both")
        ) {
            $diplayRent = "display: block;";
        }
        echo <<< EOD
        <div class="col-md-4 fieldPriceRent" style="{$diplayRent}">
        <div class="form-group" >
        <div>
EOD;
        $this->insertFieldPriceRent();
        $this->insertFieldPriceRate();

        echo '</div></div></div>';
    }
    protected function insertFieldPriceRent()
    {
        $this->insertPriceType('fieldPriceRent');
    }
    protected function insertPriceTypeSell()
    {
        $this->insertPriceType('fieldPriceSell');
    }
    protected function insertPriceType($marketType)
    {
        $errorMsg = "";
        $errorClass = "";
        if (isset($_SESSION['errorRaw'][$marketType])) {

            $errorClass = ' alert alert-custom" role="alert';
            $variable = explode(' ', trim($_SESSION['errorRaw'][$marketType]));

            if (strpos($GLOBALS['lang'][$variable[0]], $GLOBALS['lang']['Invalid']) !== false &&
                $_SESSION['POST'][$marketType] !== ''){
                $errorMsg = '<p> "' . $_SESSION['POST'][$marketType] . '" ' . $GLOBALS['item_specific_array']['common']['validate'][2]['number'];
            } else {
                $errorMsg = $GLOBALS['item_specific_array']['common']['validate'][1];
            }
        }

        $style = "display: none;";
        if (isset($_SESSION['POST']["rentOrSell"]) && 
            ($_SESSION['POST']["rentOrSell"] == $marketType ||
             $_SESSION['POST']["rentOrSell"] == "both")){
            $style = "display: block;";
        }

        $type = $GLOBALS['item_specific_array']['common'][$marketType];
        $label = $type[0];
        $placeholder = $type[1];
        $value = "";
        if (isset($_SESSION['POST'][$marketType]) && $_SESSION['POST'][$marketType] !== "0") {
            $value = $_SESSION['POST'][$marketType];
        }

        echo <<< EOD
        <div class="row">
        <div class="col-md-4 {$marketType} {$errorClass}" style="{$style}">
        <div class="form-group" >
        <div>
        <div class="row" >
            <label for="{$marketType}">{$label}</label> {$errorMsg}
                <input id="{$marketType}" name="{$marketType}" type="text"  value="{$value}" placeholder="{$placeholder}" class="form-control">
           </div></div></div></div></div>
EOD;
    }

    protected function insertFieldColor()
    {
        $errorMsg = "";
        $errorClass = '';
        if (isset($_SESSION['errorRaw']['fieldColor'])) {
            $errorMsg = $GLOBALS['item_specific_array']['common']['validate'][0];
            $errorClass = ' alert alert-custom" role="alert';
        }
        $selected = 0;
        $color = $GLOBALS['item_specific_array']['common']['fieldColor'][0];
        $choose = $GLOBALS['item_specific_array']['common']['fieldColor'][1];
        $types = $GLOBALS['item_specific_array']['common']['fieldColor'][2];

        $choose1 = $choose2 = $choose;
        if (isset($_SESSION['POST']['fieldColor'])) {
            if (strpos($_SESSION['POST']['fieldColor'], $GLOBALS['lang']['Choose']) !== false) {
                $choose1 = $choose2 = $choose;
            } else {
                $temp = $_SESSION['POST']['fieldColor'];
                $choose1 = $temp;
                $choose2 = $types[$temp];
                $selected = 1;
            }
        }

        echo <<< EOD
        <div class="col-md-4 {$errorClass}">
        <div class="form-group"><label for="fieldColor">{$color}</label> {$errorMsg}
            <div>
             <select id="fieldColor" name="fieldColor" class="select form-control">;
            <option value="{$choose1}">{$choose2}</option>
EOD;
        if ($selected == 1)
            echo <<< EOD
            <option value="{$choose}">{$choose}</option>;
EOD;
        $colors = [
            "black"    => ["#000000", "#FFFFFF"],
            "green"    => ["#009f6b", "#FFFFFF"],
            "red"      => ["#C40233", "#FFFFFF"],
            "yellow"   => ["#FFD300", "#000000"],
            "blue"     => ["#0087BD", "#FFFFFF"],
            "white"    => ["#ffffff", "#000000"],
            "brown"    => ["#a52a2a", "#FFFFFF"],
            "silver"   => ["#c0c0c0", "#FFFFFF"],
            "liver"    => ["#534b4f", "#FFFFFF"],
            "unknown"  => ["#ffffff", "#000000"]
        ];
        foreach ($colors as $key => $value) {
            echo '<option value="' . $key . '" style="background-color:' . $value[0] . ';color:' . $value[1] . ';">' . $types[$key] . '</option>';
        }
        echo '</select></div></div></div>';
    }
}
