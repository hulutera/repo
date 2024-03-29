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
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/class.fileuploader.php';

class MySqlRecord extends Model
{
    private $items = ['item_car', 'item_house', 'item_computer', 'item_electronic', 'item_phone', 'item_household', 'item_other'];

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
        } else if ($value != null && $type == "string") {
            return  $this->real_escape_string($value);
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

    /****
     *
     */
    public function countRow($status, $id)
    {
        if (!empty($id) && $id !== "*") {
            $withId = " AND id_user = $id";
        } else {
            $withId = "";
        }
        $sql = '';
        $lastElement = end($this->items);
        foreach ($this->items as $key => $value) {
            if ($lastElement != $value) {
                $union = " UNION ALL ";
            } else {
                $union = " ";
            }
            $sql .= 'SELECT id FROM ' . $value . ' WHERE field_status LIKE "' . $status . '"' . $withId . $union;
        }
        $this->query($sql);
        return $this->affected_rows;
    }
    public function countRowOfItem($item, $status)
    {
        $sql = 'SELECT * FROM ' . $item . ' WHERE field_status = "' . $status . '"';
        $this->query($sql);
        return $this->affected_rows;
    }

    public function getItemWithStatusReported($item)
    {
        $sql = 'SELECT * FROM ' . $item . ' WHERE field_report IS NOT NULL';
        $result = $this->query($sql);
        $count = $this->affected_rows;
        return $count < 0 ? 0 : $count;
    }

    public function getItemPerUser($item, $userId, $status = null)
    {
        $andWithStatus = "";
        if (isset($status)) {
            $andWithStatus = ' AND field_status = "' . $status . '"';
        }
        $sql = 'SELECT * FROM ' . $item . ' WHERE id_user = "' . $userId . '" ' . $andWithStatus;
        $result = $this->query($sql);
        return [$this->affected_rows, $result];
    }

    public function maxQuery($status, $id, $start, $end = null)
    {
        if (!empty($id) && $id !== "*") {
            $withId = " AND id_user = $id";
        } else {
            $withId = "";
        }
        $sql = '';
        $itemPerPage = isset($end) ? $end : 30;
        $lastElement = end($this->items);
        $union = "";
        foreach ($this->items as $key => $value) {
            if ($lastElement != $value) {
                $union = " UNION ALL ";
            } else {
                $union = " ";
            }
            $sql .= 'SELECT ' . $value . '.id,' . $value . '.field_table_type, ' . $value . '.field_upload_date FROM ' . $value . ' WHERE field_status LIKE "' . $status . '"' . $withId . $union;
        }
        $sql .= ' ORDER BY field_upload_date DESC LIMIT ' . $start . ',' . $itemPerPage;
        return $this->fetch_all($sql);
    }
    /***
     *
     */
    protected function insertHeader($item)
    {
        ___open_div_("row", "");
        ___open_div_("col-md-12", '" style="border:1px solid #c7c7c7;border-bottom: 1px solid white;');
        ___open_div_("form-group upload", "");
        ___open_div_("col-md-6", '');
        $this->insertFieldLocation();
        ___close_div_(1);
        ////
        ___open_div_("col-md-6", '');
        $this->insertFillable('fieldTitle', 'upload_specific_array', 'common');
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
        $this->insertSelectable('fieldLocation', 'upload_specific_array', 'common', $selectable);
    }

    protected function insertFillable($fieldName, $globalArrayName, $item, $type = null, $newLabel = null, $value = null, $newPlaceholder = null)
    {
        $errorMsg = "";
        $errorClass = '';
        if (isset($_SESSION['errorRaw'][$fieldName])) {
            $errorMsg = $_SESSION['errorRaw'][$fieldName];
            $errorClass = ' alert-custom';
        }
        $label = ($newLabel !== null) ? $newLabel : $GLOBALS[$globalArrayName][$item][$fieldName][0];
        $placeholder = ($newPlaceholder !== null) ? $newPlaceholder :  $GLOBALS[$globalArrayName][$item][$fieldName][1];

        $choose = ($value !== null) ? $value : "";
        if (isset($_SESSION['POST'][$fieldName])) {
            $choose = $_SESSION['POST'][$fieldName];
        }

        $typetype = isset($type) ? $type : "text";

        ___open_div_("row", '');
        ___open_div_("col-md-12", '');
        ___open_div_("form-group", '');
        echo <<< EOD
        <label for="{$fieldName}">{$label}</label>
EOD;
        if (isset($errorMsg)) {
            ___open_div_("col-md-12", $errorClass);
            echo $errorMsg;
            ___close_div_(1);
        }
        if ($typetype == "textarea") {
            ___open_div_("col-md-12", '" style="width:100%');
            echo <<< EOD
        <textarea id="{$fieldName}" name="{$fieldName}" rows="5" value="{$choose}" autocomplete="off" spellcheck="false" class="form-control"></textarea>
EOD;
            ___close_div_(1);
        } else {
            echo <<< EOD
    <input id="{$fieldName}" name="{$fieldName}" type="{$typetype}" placeholder="{$placeholder}" value="{$choose}" class="form-control" style="padding:10px">
EOD;
        }
        if ($type === 'password') {
            if (strpos($fieldName, "fieldPasswordRepeat") === false) {

                echo '<div style="padding:10px;font-size:16px;">&nbsp<input type="checkbox" onclick="showPassword()" style="padding:10px">' . $GLOBALS[$globalArrayName][$item][$fieldName][2] .'</div>';
            }
        }
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
        $this->insertSelectable('fieldContactMethod', 'upload_specific_array', 'common', $selectable);
    }

    protected function insertItemImages()
    {
        $errorMsg = "";
        $errorClass = '';
        if (isset($_SESSION['errorRaw']['fileuploader-list-files'])) {
            $validate = $GLOBALS['validate_specific_array'][2];
            $errorMsg = $_SESSION['errorRaw']['fileuploader-list-files'];
            $errorClass = ' alert-custom';
        }

        $image = $GLOBALS['upload_specific_array']['common']['Choose Images here'];
        $preloadedFiles = isset($_SESSION['POST']['preloadedFiles']) ? " data-fileuploader-files=" . $_SESSION['POST']['preloadedFiles'] : "";
        echo <<< EOD
        <div class="row upload {$errorClass}">
        <div class="form-group">
            <label for="fieldImage"> {$image} </label>{$errorMsg}
            <div>
                    <!-- file input -->
                    <input type="file" name="files" {$preloadedFiles}>
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
        $this->insertSelectable('rentOrSell', 'upload_specific_array', 'common', $selectable);
    }

    protected function insertFieldPriceNego()
    {
        $selectable = [];
        $negotiable = $GLOBALS['upload_specific_array']['common']['fieldPriceNego'][2];
        foreach ($negotiable as $key => $value) {
            $input = [$key => $value];
            array_push($selectable, $input);
        }
        $this->insertSelectable('fieldPriceNego', 'upload_specific_array', 'common', $selectable);
    }

    protected function insertFieldPriceCurrency()
    {
        $selectable = [];
        $currency = $GLOBALS['upload_specific_array']['common']['fieldPriceCurrency'][2];
        foreach ($currency as $key => $value) {
            $input = [$key => $value];
            array_push($selectable, $input);
        }
        $this->insertSelectable('fieldPriceCurrency', 'upload_specific_array', 'common', $selectable);
    }

    protected function insertFieldPriceRate()
    {
        $selectable = [];
        $rate = $GLOBALS['upload_specific_array']['common']['fieldPriceRate'][2];
        foreach ($rate as $key => $value) {
            $input = [$key => $value];
            array_push($selectable, $input);
        }
        $this->insertSelectable('fieldPriceRate', 'upload_specific_array', 'common', $selectable);
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
    protected function insertFieldColor($color = null)
    {
        $errorMsg = "";
        $errorClass = '';
        if (isset($_SESSION['POST']['fieldColor'])) {
            if ($_SESSION['POST']['fieldColor'] == '') {
                $_SESSION['errorRaw']['fieldColor'] = $GLOBALS['validate_specific_array'][0];
            }
        }
        if (isset($_SESSION['errorRaw']['fieldColor'])) {
            $errorMsg = $_SESSION['errorRaw']['fieldColor'];
            $errorClass = ' alert-custom';
        }
        //return;
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
        foreach ($colors as $key => $value) {
            $input = ['value="' . $key . '" style="background-color:' . $value[0] . ';color:' . $value[1] . '"' => $GLOBALS['upload_specific_array']['common']['fieldColor'][2][$key]];
            array_push($selectable, $input);
        }

        ___open_div_("row", "");
        ___open_div_("col-md-12", '');
        ___open_div_("form-group", "");
        echo '<label for="fieldColor">' . $GLOBALS['upload_specific_array']['common']['fieldColor'][0] . '</label>';
        if (isset($errorMsg)) {
            ___open_div_("col-md-12", $errorClass);
            echo $errorMsg;
            ___close_div_(1);
        }
        echo '<select id="fieldColor" name="fieldColor" class="select form-control">';

        if (isset($color)) {
            $theColor = $colors[$color];
            $v = 'value="' . $color . '" style="background-color:' . $theColor[0] . ';color:' . $theColor[1] . '"';
            $l = $GLOBALS['upload_specific_array']['common']['fieldColor'][2][$color];
            echo '<option ' . $v . '>' . $l . '</option>';
        }
        echo '<option value="">' . $GLOBALS['upload_specific_array']['common']['fieldColor'][1] . '</option>';
        foreach ($selectable as $key => $value) {
            foreach ($value as $key1 => $value1) {
                echo '<option ' . $key1 . '>' . $value1 . '</option>';
            }
        }
        echo '</select>';
        ___close_div_(3);
    }
    protected function insertPriceType($marketType, $option = null)
    {
        $errorMsg = "";
        $errorClass = "";
        if (isset($_SESSION['errorRaw'][$marketType])) {

            $errorClass = ' alert-custom';
            $variable = explode(' ', trim($_SESSION['errorRaw'][$marketType]));

            if (
                strpos($variable[0], 'Invalid') !== false &&
                $_SESSION['POST'][$marketType] !== ''
            ) {
                $errorMsg = '<p> "' . $_SESSION['POST'][$marketType] . '" ' . $GLOBALS['validate_specific_array'][2]['number'];
            } else {
                $errorMsg = $_SESSION['errorRaw'][$marketType];
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
                <input id="{$marketType}" name="{$marketType}" type="number"  value="{$value}" placeholder="{$placeholder}" class="form-control">
EOD;
        ___close_div_(3);
    }

    protected function insertSelectable($fieldName, $globalArrayName, $source = null, $selectable = null, $newLabel = null)
    {
        $errorMsg = "";
        $errorClass = '';
        if (isset($_SESSION['errorRaw'][$fieldName])) {
            $errorMsg = $_SESSION['errorRaw'][$fieldName];
            $errorClass = ' alert-custom';
        }
        $selected = 0;
        $label = ($newLabel !== null) ? $newLabel : $GLOBALS[$globalArrayName][$source][$fieldName][0];
        $choose = $GLOBALS[$globalArrayName][$source][$fieldName][1];
        $types = [];

        if (empty($selectable)) {
            $types = $GLOBALS[$globalArrayName][$source][$fieldName][2];
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
        ___open_div_("col-md-12", '');
        ___open_div_("form-group", "");
        echo <<< EOD
        <label for="{$fieldName}">{$label}</label>
EOD;
        if (isset($errorMsg)) {
            ___open_div_("col-md-12", $errorClass);
            echo $errorMsg;
            ___close_div_(1);
        }
        echo <<< EOD
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

    protected function insertCheckbox($fieldName, $globalArrayName, $item, $selectable = null)
    {
        $errorMsg = "";
        $errorClass = '';
        $checked = ' checked="checked"';
        if (isset($_SESSION['errorRaw'][$fieldName])) {
            $errorMsg = $_SESSION['errorRaw'][$fieldName];
            $errorClass = ' alert-custom';
            $checked = '';
        } elseif (!isset($_SESSION['POST'][$fieldName])) {
            $checked = '';
        }

        $title = $GLOBALS[$globalArrayName][$item][$fieldName][0];
        $placeholder = $GLOBALS[$globalArrayName][$item][$fieldName][1];
        $hiddenValue = 0;
        $showValue = 1;
        if (isset($_SESSION['POST'][$fieldName])) {

            $showValue = $_SESSION['POST'][$fieldName];
        }

        $title = $GLOBALS[$globalArrayName][$item][$fieldName][0];

        ___open_div_("row", '');
        ___open_div_("col-md-12", $errorClass);
        ___open_div_("form-group", '');
        echo <<< EOD
        <label for="{$fieldName}">{$title}</label> {$errorMsg}
        <input type="hidden" name="{$fieldName}" value="{$hiddenValue}" >
        <input type="checkbox" name="{$fieldName}" value="{$showValue}" {$checked}>
EOD;
        ___close_div_(3);
    }

    protected function insertItemPrice()
    {
        ___open_div_("row", "");
        ___open_div_("col-md-12", '');
        ___open_div_("form-group", "");

        ___open_div_("col-md-6", '');
        $this->insertFieldPriceCurrency();
        $this->selectPriceRentOrSell();
        $this->insertFieldPriceNego();
        ___close_div_(1); //col-md-6

        ___open_div_("col-md-6", '');
        $this->insertPriceTypeRent('rentOrSell');
        $this->insertPriceTypeSell('rentOrSell');
        ___close_div_(1); //col-md-6

        ___close_div_(3); //top-3
    }

    protected function insertAllField($itemName, $skipRow = null)
    {
        ___open_div_("col-md-8 col-xs-12 upload-container", '');
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
            $this->insertSelectable('idCategory', 'upload_specific_array', $itemName);
            ___close_div_(1);
            ___close_div_(3); //top-3
        }
        ///
        if ($skipRow != 3) {
            ___open_div_("row", "");
            ___open_div_("col-md-12 upload", '" style="border:1px solid #c7c7c7; border-bottom: 1px solid white;');
            ___open_div_("form-group upload", "");
            $this->insertFieldPriceCurrency();
            $this->insertPriceTypeSell();
            $this->insertFieldPriceNego();
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
        if ($skipRow == 6) {
            ___open_div_("row", "");
            ___open_div_("col-md-12 upload", '" style="border:1px solid #c7c7c7;');
            ___open_div_("form-group upload", "");
            echo '<button name="submit" type="submit" class="btn btn-primary btn-lg btn-block">' . $GLOBALS['lang']['submit'] . '</button>';
            $lang_sw = isset($_GET['lan']) ? "&lan=" . $_GET['lan'] : "";
            echo '<a href="../../includes/mypage.php?' . $lang_sw . '" class="btn btn-danger btn-lg btn-block">' . $GLOBALS['lang']['cancel changes'] . '</a>';
            ___close_div_(3);
        } else {
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

    protected function getMaxPriceFilter($maxPriceValue = null, $limit = null)
    {
        $maxPriceFilter = "";
        if ($maxPriceValue != "000") {
            if ($maxPriceValue == $limit) {
                $maxPriceFilter = "field_price_sell LIKE '%'";
            } else {
                $maxPriceFilter = "field_price_sell <= " .  (int) ($maxPriceValue);
            }
        } else {
            $maxPriceFilter = "(field_price_sell LIKE '%' OR field_price_sell is null)";
        }

        return $maxPriceFilter;
    }

    protected function priceTypeGetter()
    {
        $variable = $_SESSION['POST']['fieldMarketCategory'];
        switch ($variable) {
            case 'rent':
                return 'fieldPriceRent';
                break;
            case 'sell':
                return 'fieldPriceSell';
            case 'rent and sell':
                # code...
                return 'both';
            default:
                # code...
                break;
        }
    }

    protected function priceTypeSetter()
    {
        if (isset($_POST['rentOrSell'])) {
            if ($_POST['rentOrSell'] == "fieldPriceRent") {
                return 'rent';
            } else if ($_POST['rentOrSell'] == "fieldPriceSell") {
                return 'sell';
            } else if ($_POST['rentOrSell'] == "both") {
                return 'rent and sell';
            }
        }else{
            return 'sell';
        }
    }


    protected function editUploadedImages()
    {
        // define uploads path
        $uploadDir = '..' . $_SESSION['POST']['uploadDirRel'];

        // create an empty array
        // we will add to this array the files from directory below
        // here you can also add files from MySQL database
        $preloadedFiles = array();

        // scan uploads directory
        $uploadsFiles = array_diff(scandir($uploadDir), array('.', '..'));

        // add files to our array with
        // made to use the correct structure of a file
        foreach ($uploadsFiles as $file) {
            // skip if directory
            if (is_dir($uploadDir . $file)) {
                continue;
            }
            var_dump($file);
            // add file to our array
            // !important please follow the structure below
            $preloadedFiles[] = array(
                "name" => $file,
                "type" => FileUploader::mime_content_type($uploadDir . $file),
                "size" => filesize($uploadDir . $file),
                "file" => $uploadDir . $file,
                "relative_file" => $uploadDir . $file
            );
        }

        var_dump(($_POST['fileuploader-list-files']));
        var_dump(explode(";", $_POST['fileuploader-list-files']));
        // initialize FileUploader
        $FileUploader = new FileUploader('files', array(
            'limit' => null,
            'maxSize' => null,
            'extensions' => null,
            'uploadDir' => $uploadDir,
            'title' => 'name',
            'files' => $preloadedFiles
        ));

        var_dump($FileUploader->getOptions());
        // unlink the files
        // !important only for preloaded files
        // you will need to give the array with the preloaded files in 'files' option of the FileUploader
        foreach ($FileUploader->getRemovedFiles('file') as $key => $value) {
            $file = $uploadDir . $value['name'];
            var_dump($file);
            if (is_file($file)) {
                unlink($file);
            }
        }

        // call to upload the files
        $FileUploader->upload();
        // get the fileList
        $fileList = $FileUploader->getFileList("name");

        var_dump($fileList);
        var_dump($uploadDir);
        var_dump($_SESSION['POST']);
        var_dump($_POST);
        $fileList = (string)json_encode($fileList);
        return $fileList;
    }

    /**
     * Prepare session post variable
     * @return mixed MySQL insert result
     * @category DML
     */
    protected function preEdit($itemObject = null, $data = null)
    {
        ////------------------------------------------------------------------
        /// add for decoding
        include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/validate.php';
        $crypto = new Cryptor();
        $dataStr = urldecode($data);
        /// start fresh
        $_SESSION['POST'] = null;
        unset($_SESSION['POST']);
        $dataArray = explode("&", $dataStr);

        /// prepare data and create a session variable
        foreach ($dataArray as $key => $value) {
            $temp = explode("=", $value);
            // changes field_contact_method to fieldContactMethod
            $postKey = lcfirst(implode('', array_map('ucfirst', explode('_', $temp[0])))); //$this->camelize($temp[0]);
            $postValue = $temp[1];

            if ($postKey == "idCategory") {
                $postValue = $itemObject->category((int)$postValue);
            }
            $_SESSION['POST'][$postKey] = $postValue;
        }

        // define uploads path
        $uploadDirRelative = '/upload/' . $itemObject->getTableName() . '/user_id_' . $_SESSION['POST']['idUser'] . '/item_temp_id_' . $_SESSION['POST']['idTemp'] .'/';
        $uploadDir = $_SERVER['DOCUMENT_ROOT'] . $uploadDirRelative;
        $_SESSION['POST']['uploadDirRel'] = $uploadDirRelative;

        // create an empty array
        // we will add to this array the files from directory below
        // here you can also add files from MySQL database
        $preloadedFiles = array();

        // scan uploads directory
        $uploadsFiles = array_diff(scandir($uploadDir), array('.', '..'));
        // var_dump($uploadsFiles);
        foreach($uploadsFiles as $file) {
            // skip if directory
            if(is_dir($uploadDir . $file))
                continue;
            // var_dump($file);
            // add file to our array
            // !important please follow the structure below
            $preloadedFiles[] = array(
                "name" => $file,
                "type" => FileUploader::mime_content_type($uploadDir . $file),
                "size" => filesize($uploadDir . $file),
                "file" => $uploadDirRelative . $file,
                "local" => '..' . $uploadDirRelative . $file
            );
        }

        $preloadedFiles = json_encode($preloadedFiles);
        $_SESSION['POST']['preloadedFiles'] = $preloadedFiles;
        // var_dump($_SESSION['POST']['preloadedFiles']);
    }

    protected function loadImages($table, $idUser,$idTemp, &$imagesList)
    {
        //create a folder for image upload
        $dir_img = $_SERVER['DOCUMENT_ROOT'] . '/upload/' . $table  . '/user_id_' . $idUser . '/item_temp_id_' . $idTemp;
        $dir_thumbnail_img = $dir_img . '/thumbnail';

        if (!file_exists($dir_img)) {
            mkdir($dir_img, 0777, true);
        }

        if (!file_exists($dir_thumbnail_img)) {
            mkdir($dir_thumbnail_img, 0777, true);
        }

        // initialize FileUploader
        $FileUploader = new FileUploader('files', array(
            'limit' => null,
            'maxSize' => null,
            'fileMaxSize' => null,
            'extensions' => null,
            'required' => true,
            'uploadDir' => $dir_img . '/',
            'title' => 'name',
            'replace' => false,
            'editor' => array(
                'maxWidth' => 800,
                'maxHeight' => 800,
                'quality' => 95
            ),
            'listInput' => true,
            'files' => null,
            'id' => null
        ));

        // call to upload the files
        $data = $FileUploader->upload();

        if (is_dir($dir_img)) {
            $files = scandir($dir_img);
            foreach ($files as $file)
            {
                if (!is_dir($file))
                {
                    copy($file, $dir_thumbnail_img);
                }
            }
        }

        // if uploaded and success
        if ($data['isSuccess'] && count($data['files']) > 0) {
            // get uploaded files
            $uploadedFiles = $data['files'];
            // create thumbnails
            foreach($uploadedFiles as $item) {
                FileUploader::resize($filename = $item['file'], $width = 150, $height = null, $destination = $dir_thumbnail_img . '/'. $item['name'], $crop = false, $quality = 95);
            }
        }

        // get the fileList and encode in json
        $imagesList = (string)json_encode($FileUploader->getFileList('name'));


    }
}
