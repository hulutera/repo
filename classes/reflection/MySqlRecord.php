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

    protected function insertHeader($item)
    {
        ___open_div_("row", "");
        ___open_div_('col-md-12 upload-header alert alert-info" role="alert', '');
        echo '<strong><p class="h2">' . $GLOBALS['upload_specific_array'][$item]['Uploading'] . '</strong></p>';
        ___close_div_(2);

        ___open_div_("row", "");
        ___open_div_("col-md-12", '" style="border:1px solid #c7c7c7;border-bottom: 1px solid white;');
        ___open_div_("form-group upload", "");
        ___open_div_("col-md-6", '');
        $this->insertFieldLocation();
        ___close_div_(1);
        ////
        ___open_div_("col-md-6", '');
        $this->insertFillable('fieldTitle', 'common');
        ___close_div_(1);
        ___close_div_(3);
    }
    protected function insertFieldLocation()
    {
        $selectable = [];
        $city = $GLOBALS['city_lang_arr'];
        foreach ($city as $key => $value) {
            if ($key === '000' || $key === 'All') {
                continue;
            }
            $input = [$key => $value];
            array_push($selectable, $input);
        }
        $this->insertSelectable('fieldLocation', 'common', $selectable);
    }

    protected function insertFillable($fieldName, $item)
    {
        $errorMsg = "";
        $errorClass = '';
        if (isset($_SESSION['errorRaw'][$fieldName])) {
            $errorMsg = $GLOBALS['upload_specific_array']['common']['validate'][1];
            $errorClass = ' alert-custom';
        }

        $title = $GLOBALS['upload_specific_array'][$item][$fieldName][0];
        $placeholder = $GLOBALS['upload_specific_array'][$item][$fieldName][1];
        $choose = "";
        if (isset($_SESSION['POST'][$fieldName])) {
            $choose = $_SESSION['POST'][$fieldName];
        }

        ___open_div_("row", '');
        ___open_div_("col-md-12", $errorClass);
        ___open_div_("form-group", '');
        echo <<< EOD
        <label for="{$fieldName}">{$title}</label> {$errorMsg}
         <input id="{$fieldName}" name="{$fieldName}" type="text" placeholder="{$placeholder}" value="{$choose}" class="form-control">
EOD;
        ___close_div_(3);
    }

    protected function insertFieldExtraInfo()
    {
        ___open_div_("col-md-4", "");
        ___open_div_("form-group", "");
        echo '
        <label for="fieldExtraInfo">Extra Info</label> 
          <textarea id="fieldExtraInfo" name="fieldExtraInfo" cols="50" rows="2" class="form-control">' . $_SESSION['POST']['fieldExtraInfo'] . '</textarea>';
        ___close_div_(2);
    }

    protected function insertFieldContactMethod()
    {
        $selectable = [];
        $contactMeWith = $GLOBALS['upload_specific_array']['common']['fieldContactMethod'][2];
        foreach ($contactMeWith as $key => $value) {
            $input = [$key => $value];
            array_push($selectable, $input);
        }
        $this->insertSelectable('fieldContactMethod', 'common', $selectable);
    }

    protected function insertItemImages()
    {
        $errorMsg = "";
        $errorClass = '';
        if (isset($_SESSION['errorRaw']['fileuploader-list-files'])) {
            $validate = $GLOBALS['upload_specific_array']['common']['validate'][2];
            $errorMsg = $validate['fileuploader-list-files'];
            $errorClass = ' alert-custom';
        }

        $image = $GLOBALS['upload_specific_array']['common']['Choose Images here'];

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

    protected function selectPriceRentOrSell()
    {
        $selectable = [];
        $rentOrSell = $GLOBALS['upload_specific_array']['common']['rentOrSell'][2];
        foreach ($rentOrSell as $key => $value) {
            $input = [$key => $value];
            array_push($selectable, $input);
        }
        $this->insertSelectable('rentOrSell', 'common', $selectable);
    }

    protected function insertFieldPriceNego()
    {
        $selectable = [];
        $negotiable = $GLOBALS['upload_specific_array']['common']['fieldPriceNego'][2];
        foreach ($negotiable as $key => $value) {
            $input = [$key => $value];
            array_push($selectable, $input);
        }
        $this->insertSelectable('fieldPriceNego', 'common', $selectable);
    }

    protected function insertFieldPriceCurrency()
    {
        $selectable = [];
        $currency = $GLOBALS['upload_specific_array']['common']['fieldPriceCurrency'][2];
        foreach ($currency as $key => $value) {
            $input = [$key => $value];
            array_push($selectable, $input);
        }
        $this->insertSelectable('fieldPriceCurrency', 'common', $selectable);
    }

    protected function insertFieldPriceRate()
    {
        $selectable = [];
        $rate = $GLOBALS['upload_specific_array']['common']['fieldPriceRate'][2];
        foreach ($rate as $key => $value) {
            $input = [$key => $value];
            array_push($selectable, $input);
        }
        $this->insertSelectable('fieldPriceRate', 'common', $selectable);
    }
    protected function insertPriceTypeRent($option = null)
    {
        $style = "display: block;";
        if (!empty($option)) {
            $style = "display: none;";
            if (
                isset($_SESSION['POST']["rentOrSell"]) &&
                ($_SESSION['POST']["rentOrSell"] === "fieldPriceRent" || $_SESSION['POST']["rentOrSell"] === "both")
            ) {
                $style = "display: block;";
            }
        }
        ___open_div_("row", '');
        ___open_div_("col-md-12", '');
        ___open_div_("form-group fieldPriceRent", '" style="' . $style);
        $this->insertFieldPriceRent($option);
        $this->insertFieldPriceRate();
        ___close_div_(3);
    }
    protected function insertFieldPriceRent($option = null)
    {
        $this->insertPriceType('fieldPriceRent', $option);
    }
    protected function insertPriceTypeSell($option = null)
    {
        $style = "display: block;";
        if (!empty($option)) {
            $style = "display: none;";
            if (
                isset($_SESSION['POST']["rentOrSell"]) &&
                ($_SESSION['POST']["rentOrSell"] === "fieldPriceSell" || $_SESSION['POST']["rentOrSell"] === "both")
            ) {
                $style = "display: block;";
            }
        }
        ___open_div_("row", '');
        ___open_div_("col-md-12", '');
        ___open_div_("form-group fieldPriceSell", '" style="' . $style);
        $this->insertPriceType('fieldPriceSell');
        ___close_div_(3);
    }
    protected function insertFieldColor()
    {
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
        $selectable = [];
        $type = $GLOBALS['upload_specific_array']['common']['fieldColor'][2];
        foreach ($colors as $key => $value) {
            $input = [$key . '" style="background-color:' . $value[0] . ';color:' . $value[1] . '"' => $type[$key]];
            array_push($selectable, $input);
        }
        $this->insertSelectable('fieldColor', 'common', $selectable);
    }
    protected function insertPriceType($marketType, $option = null)
    {
        $errorMsg = "";
        $errorClass = "";
        if (isset($_SESSION['errorRaw'][$marketType])) {

            $errorClass = ' alert-custom';
            $variable = explode(' ', trim($_SESSION['errorRaw'][$marketType]));

            if (
                strpos($GLOBALS['lang'][$variable[0]], $GLOBALS['lang']['Invalid']) !== false &&
                $_SESSION['POST'][$marketType] !== ''
            ) {
                $errorMsg = '<p> "' . $_SESSION['POST'][$marketType] . '" ' . $GLOBALS['upload_specific_array']['common']['validate'][2]['number'];
            } else {
                $errorMsg = $GLOBALS['upload_specific_array']['common']['validate'][1];
            }
        }


        $style = "display: block;";
        if (!empty($option)) {
            $style = "display: none;";
            if (
                isset($_SESSION['POST']["rentOrSell"]) &&
                ($_SESSION['POST']["rentOrSell"] === $marketType || $_SESSION['POST']["rentOrSell"] === "both")
            ) {
                $style = "display: block;";
            }
        }

        $type = $GLOBALS['upload_specific_array']['common'][$marketType];
        $label = $type[0];
        $placeholder = $type[1];
        $value = "";
        if (isset($_SESSION['POST'][$marketType]) && $_SESSION['POST'][$marketType] !== "0") {
            $value = $_SESSION['POST'][$marketType];
        }
        ___open_div_("row", "");
        ___open_div_("col-md-12", ' ' . $marketType . ' ' . $errorClass . '" style="' . $style);
        ___open_div_("form-group", "");
        echo <<< EOD
            <label for="{$marketType}">{$label}</label> {$errorMsg}
                <input id="{$marketType}" name="{$marketType}" type="text"  value="{$value}" placeholder="{$placeholder}" class="form-control">
EOD;
        ___close_div_(3);
    }

    protected function insertSelectable($fieldName, $source = null, $selectable = null)
    {
        $errorMsg = "";
        $errorClass = '';
        if (isset($_SESSION['errorRaw'][$fieldName])) {
            $errorMsg = $GLOBALS['upload_specific_array']['common']['validate'][0];
            $errorClass = ' alert-custom';
        }
        $selected = 0;
        $label = $GLOBALS['upload_specific_array'][$source][$fieldName][0];
        $choose = $GLOBALS['upload_specific_array'][$source][$fieldName][1];
        $types = [];
        if (empty($selectable)) {
            $types = $GLOBALS['upload_specific_array'][$source][$fieldName][2];
        } else {
            foreach ($selectable as $row) {
                foreach ($row as $key => $value) {
                    $types[$key] = $value;
                }
            }
        }
        $choose1 = $choose2 = $choose;
        if (isset($_SESSION['POST'][$fieldName])) {
            if (strpos($_SESSION['POST'][$fieldName], $GLOBALS['lang']['Choose']) !== false) {
                $choose1 = $choose2 = $choose;
            } else {
                $temp = $_SESSION['POST'][$fieldName];
                $choose1 = $temp;
                $choose2 = $types[$temp];
                $selected = 1;
            }
        }
        ___open_div_("row", "");
        ___open_div_("col-md-12", $errorClass);
        ___open_div_("form-group", "");
        echo <<< EOD
        <label for="{$fieldName}">{$label}</label>{$errorMsg}        
        <select id="{$fieldName}" name="{$fieldName}" class="select form-control">
        <option value="{$choose1}">{$choose2}</option>
EOD;
        if ($selected == 1) {
            echo <<< EOD
<option value="{$choose}">{$choose}</option>
EOD;
        }

        foreach ($types as $key => $value) {
            echo '
        <option value = "' . $key . '">' . $value . '</option>';
        }

        echo '</select>';
        ___close_div_(3);
    }

    protected function insertItemPrice()
    {
        ___open_div_("row", "");
        ___open_div_("col-md-12", '');
        ___open_div_("form-group", "");

        ___open_div_("col-md-6", '');
        $this->selectPriceRentOrSell();
        $this->insertFieldPriceNego();
        $this->insertFieldPriceCurrency();
        ___close_div_(1); //col-md-6

        ___open_div_("col-md-6", '');
        $this->insertPriceTypeRent('rentOrSell');
        $this->insertPriceTypeSell('rentOrSell');
        ___close_div_(1); //col-md-6

        ___close_div_(3); //top-3
    }

    protected function insertAllField($itemName, $skipRow = null)
    {
        ___open_div_("container-fluid", '" style="margin-left:15%; margin-right:15%;');
        ///
        if ($skipRow != 1) {
            $this->insertHeader($itemName);
        }
        ///
        if ($skipRow != 2) {
            ___open_div_("row", "");
            ___open_div_("col-md-12", '" style="border:1px solid #c7c7c7;border-bottom: 1px solid white;');
            ___open_div_("form-group upload", "");
            ___open_div_("col-md-12", '');
            $this->insertSelectable('idCategory', $itemName);
            ___close_div_(1);
            ___close_div_(3); //top-3
        }
        ///
        if ($skipRow != 3) {
            ___open_div_("row", "");
            ___open_div_("col-md-12 upload", '" style="border:1px solid #c7c7c7; border-bottom: 1px solid white;');
            ___open_div_("form-group upload", "");
            $this->insertFieldPriceNego();
            $this->insertFieldPriceCurrency();
            $this->insertPriceTypeSell();
            ___close_div_(3);
        }
        ///
        if ($skipRow != 4) {
            ___open_div_("row", "");
            ___open_div_("col-md-12 upload", '" style="border:1px solid #c7c7c7; border-bottom: 1px solid white;');
            ___open_div_("form-group upload", "");
            $this->insertFieldContactMethod();
            ___close_div_(3);
        }
        ///  
        if ($skipRow != 5) {
            ___open_div_("row", "");
            ___open_div_("col-md-12 upload", '" style="border:1px solid #c7c7c7; border-bottom: 1px solid white;');
            ___open_div_("form-group upload", "");
            $this->insertItemImages();
            ___close_div_(3);
        }
        ///
        if ($skipRow != 6) {
            ___open_div_("row", "");
            ___open_div_("col-md-12 upload", '" style="border:1px solid #c7c7c7;');
            ___open_div_("form-group upload", "");
            echo '<button name="submit" type="submit" class="btn btn-primary btn-lg btn-block">' . $GLOBALS['lang']['submit'] . '</button>';
            ___close_div_(3);
        }
        ___close_div_(1);
    }

    protected function lister($start, $end, $stage = null)
    {
        $selectable = [];
        if (empty($stage)) {
            for ($i = $start; $i <= $end; $i++) {
                $input = [$i => $i];
                array_push($selectable, $input);
            }
        } else {
            for ($i = $start; $i <= $end; $i += $stage) {
                $j = $i + $stage - 1;
                $input = [$i . '-' . $j => $i . '-' . $j];
                array_push($selectable, $input);
            }
        }
        return $selectable;
    }
}
function ___open_div_($class, $options)
{
    echo '<div class="' . $class . ' ' . $options . '">';
}
function ___close_div_($number)
{
    $div = "";
    for ($i = 0; $i < $number; $i++) {
        $div .= "</div>";
    }
    echo $div;
}
