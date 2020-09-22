<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/classes/reflection/class.config.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/classes/reflection/HtUserAll.php';

/**
 * Class HtUtilContactUs
 * @extends MySqlRecord
 * @filesource HtUtilContactUs.php
 */

// namespace hulutera;

class HtUtilContactUs extends MySqlRecord
{
    /**
     * A control attribute for the update operation.
     * @note An instance fetched from db is allowed to run the update operation.
     *       A new instance (not fetched from db) is allowed only to run the insert operation but,
     *       after running insertion, the instance is automatically allowed to run update operation.
     * @var bool
     */
    private $allowUpdate = false;

    /**
     * Class attribute for mapping the primary key id of table util_contact_us
     *
     * Comment for field id: Not specified<br>
     * @var int $id
     */
    private $id;

    /**
     * A class attribute for evaluating if the table has an autoincrement primary key
     * @var bool $isPkAutoIncrement
     */
    private $isPkAutoIncrement = true;

    /**
     * Class attribute for mapping table field field_name
     *
     * Comment for field field_name: Not specified.<br>
     * Field information:
     *  - Data type: varchar(125)
     *  - Null : NO
     *  - DB Index:
     *  - Default:
     *  - Extra:
     * @var string $fieldName
     */
    private $fieldName;

    /**
     * Class attribute for mapping table field field_company
     *
     * Comment for field field_company: Not specified.<br>
     * Field information:
     *  - Data type: varchar(125)
     *  - Null : YES
     *  - DB Index:
     *  - Default:
     *  - Extra:
     * @var string $fieldCompany
     */
    private $fieldCompany;

    /**
     * Class attribute for mapping table field field_email
     *
     * Comment for field field_email: Not specified.<br>
     * Field information:
     *  - Data type: varchar(40)
     *  - Null : NO
     *  - DB Index:
     *  - Default:
     *  - Extra:
     * @var string $fieldEmail
     */
    private $fieldEmail;

    /**
     * Class attribute for mapping table field field_subject
     *
     * Comment for field field_subject: Not specified.<br>
     * Field information:
     *  - Data type: varchar(125)
     *  - Null : YES
     *  - DB Index:
     *  - Default:
     *  - Extra:
     * @var string $fieldSubject
     */
    private $fieldSubject;

    /**
     * Class attribute for mapping table field field_purpose
     *
     * Comment for field field_purpose: Not specified.<br>
     * Field information:
     *  - Data type: varchar(125)
     *  - Null : NO
     *  - DB Index:
     *  - Default:
     *  - Extra:
     * @var string $fieldPurpose
     */
    private $fieldPurpose;

    /**
     * Class attribute for mapping table field field_description
     *
     * Comment for field field_description: Not specified.<br>
     * Field information:
     *  - Data type: mediumtext
     *  - Null : NO
     *  - DB Index:
     *  - Default:
     *  - Extra:
     * @var string $fieldDescription
     */
    private $fieldDescription;

    /**
     * Class attribute for mapping table field field_message_status
     *
     * Comment for field field_message_status: Not specified.<br>
     * Field information:
     *  - Data type: varchar(10)
     *  - Null : NO
     *  - DB Index:
     *  - Default:
     *  - Extra:
     * @var string $fieldMessageStatus
     */
    private $fieldMessageStatus;

    /**
     * Class attribute for mapping table field field_received_date
     *
     * Comment for field field_received_date: Not specified.<br>
     * Field information:
     *  - Data type: timestamp
     *  - Null : NO
     *  - DB Index:
     *  - Default: CURRENT_TIMESTAMP
     *  - Extra:
     * @var string $fieldReceivedDate
     */
    private $fieldReceivedDate;

    /**
     * Class attribute for storing the SQL DDL of table util_contact_us
     * @var string base64 encoded string for DDL
     */
    private $ddl = "Q1JFQVRFIFRBQkxFIGB1dGlsX2NvbnRhY3RfdXNgICgKICBgaWRgIGludCg0MCkgTk9UIE5VTEwgQVVUT19JTkNSRU1FTlQsCiAgYGZpZWxkX25hbWVgIHZhcmNoYXIoMTI1KSBOT1QgTlVMTCwKICBgZmllbGRfY29tcGFueWAgdmFyY2hhcigxMjUpIERFRkFVTFQgTlVMTCwKICBgZmllbGRfZW1haWxgIHZhcmNoYXIoNDApIE5PVCBOVUxMLAogIGBmaWVsZF9zdWJqZWN0YCB2YXJjaGFyKDEyNSkgREVGQVVMVCBOVUxMLAogIGBmaWVsZF9wdXJwb3NlYCB2YXJjaGFyKDEyNSkgTk9UIE5VTEwsCiAgYGZpZWxkX2Rlc2NyaXB0aW9uYCBtZWRpdW10ZXh0IE5PVCBOVUxMLAogIGBmaWVsZF9tZXNzYWdlX3N0YXR1c2AgdmFyY2hhcigxMCkgTk9UIE5VTEwsCiAgYGZpZWxkX3JlY2VpdmVkX2RhdGVgIHRpbWVzdGFtcCBOT1QgTlVMTCBERUZBVUxUIENVUlJFTlRfVElNRVNUQU1QLAogIFBSSU1BUlkgS0VZIChgaWRgKQopIEVOR0lORT1Jbm5vREIgQVVUT19JTkNSRU1FTlQ9MjcgREVGQVVMVCBDSEFSU0VUPWxhdGluMQ==";

    /**
     * setId Sets the class attribute id with a given value
     *
     * The attribute id maps the field id defined as int(40).<br>
     * Comment for field id: Not specified.<br>
     * @param int $id
     * @category Modifier
     */
    public function setId($id)
    {
        $this->id = (int) $id;
    }

    /**
     * setFieldName Sets the class attribute fieldName with a given value
     *
     * The attribute fieldName maps the field field_name defined as varchar(125).<br>
     * Comment for field field_name: Not specified.<br>
     * @param string $fieldName
     * @category Modifier
     */
    public function setFieldName($fieldName)
    {
        $this->fieldName = (string) $fieldName;
    }

    /**
     * setFieldCompany Sets the class attribute fieldCompany with a given value
     *
     * The attribute fieldCompany maps the field field_company defined as varchar(125).<br>
     * Comment for field field_company: Not specified.<br>
     * @param string $fieldCompany
     * @category Modifier
     */
    public function setFieldCompany($fieldCompany)
    {
        $this->fieldCompany = (string) $fieldCompany;
    }

    /**
     * setFieldEmail Sets the class attribute fieldEmail with a given value
     *
     * The attribute fieldEmail maps the field field_email defined as varchar(40).<br>
     * Comment for field field_email: Not specified.<br>
     * @param string $fieldEmail
     * @category Modifier
     */
    public function setFieldEmail($fieldEmail)
    {
        $this->fieldEmail = (string) $fieldEmail;
    }

    /**
     * setFieldSubject Sets the class attribute fieldSubject with a given value
     *
     * The attribute fieldSubject maps the field field_subject defined as varchar(125).<br>
     * Comment for field field_subject: Not specified.<br>
     * @param string $fieldSubject
     * @category Modifier
     */
    public function setFieldSubject($fieldSubject)
    {
        $this->fieldSubject = (string) $fieldSubject;
    }

    /**
     * setFieldPurpose Sets the class attribute fieldPurpose with a given value
     *
     * The attribute fieldPurpose maps the field field_purpose defined as varchar(125).<br>
     * Comment for field field_purpose: Not specified.<br>
     * @param string $fieldPurpose
     * @category Modifier
     */
    public function setFieldPurpose($fieldPurpose)
    {
        $this->fieldPurpose = (string) $fieldPurpose;
    }

    /**
     * setFieldDescription Sets the class attribute fieldDescription with a given value
     *
     * The attribute fieldDescription maps the field field_description defined as mediumtext.<br>
     * Comment for field field_description: Not specified.<br>
     * @param string $fieldDescription
     * @category Modifier
     */
    public function setFieldDescription($fieldDescription)
    {
        $this->fieldDescription = (string) $fieldDescription;
    }

    /**
     * setFieldMessageStatus Sets the class attribute fieldMessageStatus with a given value
     *
     * The attribute fieldMessageStatus maps the field field_message_status defined as varchar(10).<br>
     * Comment for field field_message_status: Not specified.<br>
     * @param string $fieldMessageStatus
     * @category Modifier
     */
    public function setFieldMessageStatus($fieldMessageStatus)
    {
        $this->fieldMessageStatus = (string) $fieldMessageStatus;
    }

    /**
     * setFieldReceivedDate Sets the class attribute fieldReceivedDate with a given value
     *
     * The attribute fieldReceivedDate maps the field field_received_date defined as timestamp.<br>
     * Comment for field field_received_date: Not specified.<br>
     * @param string $fieldReceivedDate
     * @category Modifier
     */
    public function setFieldReceivedDate($fieldReceivedDate)
    {
        $this->fieldReceivedDate = (string) $fieldReceivedDate;
    }

    /**
     * getId gets the class attribute id value
     *
     * The attribute id maps the field id defined as int(40).<br>
     * Comment for field id: Not specified.
     * @return int $id
     * @category Accessor of $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * getFieldName gets the class attribute fieldName value
     *
     * The attribute fieldName maps the field field_name defined as varchar(125).<br>
     * Comment for field field_name: Not specified.
     * @return string $fieldName
     * @category Accessor of $fieldName
     */
    public function getFieldName()
    {
        return $this->fieldName;
    }

    /**
     * getFieldCompany gets the class attribute fieldCompany value
     *
     * The attribute fieldCompany maps the field field_company defined as varchar(125).<br>
     * Comment for field field_company: Not specified.
     * @return string $fieldCompany
     * @category Accessor of $fieldCompany
     */
    public function getFieldCompany()
    {
        return $this->fieldCompany;
    }

    /**
     * getFieldEmail gets the class attribute fieldEmail value
     *
     * The attribute fieldEmail maps the field field_email defined as varchar(40).<br>
     * Comment for field field_email: Not specified.
     * @return string $fieldEmail
     * @category Accessor of $fieldEmail
     */
    public function getFieldEmail()
    {
        return $this->fieldEmail;
    }

    /**
     * getFieldSubject gets the class attribute fieldSubject value
     *
     * The attribute fieldSubject maps the field field_subject defined as varchar(125).<br>
     * Comment for field field_subject: Not specified.
     * @return string $fieldSubject
     * @category Accessor of $fieldSubject
     */
    public function getFieldSubject()
    {
        return $this->fieldSubject;
    }

    /**
     * getFieldPurpose gets the class attribute fieldPurpose value
     *
     * The attribute fieldPurpose maps the field field_purpose defined as varchar(125).<br>
     * Comment for field field_purpose: Not specified.
     * @return string $fieldPurpose
     * @category Accessor of $fieldPurpose
     */
    public function getFieldPurpose()
    {
        return $this->fieldPurpose;
    }

    /**
     * getFieldDescription gets the class attribute fieldDescription value
     *
     * The attribute fieldDescription maps the field field_description defined as mediumtext.<br>
     * Comment for field field_description: Not specified.
     * @return string $fieldDescription
     * @category Accessor of $fieldDescription
     */
    public function getFieldDescription()
    {
        return $this->fieldDescription;
    }

    /**
     * getFieldMessageStatus gets the class attribute fieldMessageStatus value
     *
     * The attribute fieldMessageStatus maps the field field_message_status defined as varchar(10).<br>
     * Comment for field field_message_status: Not specified.
     * @return string $fieldMessageStatus
     * @category Accessor of $fieldMessageStatus
     */
    public function getFieldMessageStatus()
    {
        return $this->fieldMessageStatus;
    }

    /**
     * getFieldReceivedDate gets the class attribute fieldReceivedDate value
     *
     * The attribute fieldReceivedDate maps the field field_received_date defined as timestamp.<br>
     * Comment for field field_received_date: Not specified.
     * @return string $fieldReceivedDate
     * @category Accessor of $fieldReceivedDate
     */
    public function getFieldReceivedDate()
    {
        return $this->fieldReceivedDate;
    }

    /**
     * Gets DDL SQL code of the table util_contact_us
     * @return string
     * @category Accessor
     */
    public function getDdl()
    {
        return base64_decode($this->ddl);
    }

    /**
     * Gets the name of the managed table
     * @return string
     * @category Accessor
     */
    public function getTableName()
    {
        return "util_contact_us";
    }

    /**
     * The HtUtilContactUs constructor
     *
     * It creates and initializes an object in two way:
     *  - with null (not fetched) data if none $id is given.
     *  - with a fetched data row from the table util_contact_us having id=$id
     * @param int $id. If omitted an empty (not fetched) instance is created.
     * @return HtUtilContactUs Object
     */
    public function __construct($id = null)
    {
        parent::__construct();
        if (!empty($id)) {
            $this->select($id);
        }
    }

    /**
     * The implicit destructor
     */
    public function __destruct()
    {
        $this->close();
    }

    /**
     * Explicit destructor. It calls the implicit destructor automatically.
     */
    public function close()
    {
    }

    /**
     * Fetchs a table row of util_contact_us into the object.
     *
     * Fetched table fields values are assigned to class attributes and they can be managed by using
     * the accessors/modifiers methods of the class.
     * @param int $id the primary key id value of table util_contact_us which identifies the row to select.
     * @return int affected selected row
     * @category DML
     */
    public function select($id)
    {
        if ($id == "*") {
            $sql = "SELECT * FROM util_contact_us";
        } else { //id
            $sql =  "SELECT * FROM util_contact_us WHERE id={$this->parseValue($id, 'int')}";
        }

        $this->resetLastSqlError();
        $result =  $this->query($sql);
        $this->resultSet = $result;
        $this->lastSql = $sql;
        if ($result) {
            $rowObject = $result->fetch_object();
            @$this->id = (int) $rowObject->id;
            @$this->fieldName = $this->replaceAposBackSlash($rowObject->field_name);
            @$this->fieldCompany = $this->replaceAposBackSlash($rowObject->field_company);
            @$this->fieldEmail = $this->replaceAposBackSlash($rowObject->field_email);
            @$this->fieldSubject = $this->replaceAposBackSlash($rowObject->field_subject);
            @$this->fieldPurpose = $this->replaceAposBackSlash($rowObject->field_purpose);
            @$this->fieldDescription = $this->replaceAposBackSlash($rowObject->field_description);
            @$this->fieldMessageStatus = $this->replaceAposBackSlash($rowObject->field_message_status);
            @$this->fieldReceivedDate = $rowObject->field_received_date;
            $this->allowUpdate = true;
        } else {
            $this->lastSqlError = $this->sqlstate . " - " . $this->error;
        }
        return $this->affected_rows;
    }

    /**
     * Deletes a specific row from the table util_contact_us
     * @param int $id the primary key id value of table util_contact_us which identifies the row to delete.
     * @return int affected deleted row
     * @category DML
     */
    public function delete($id)
    {
        $sql = "DELETE FROM util_contact_us WHERE id={$this->parseValue($id, 'int')}";
        $this->resetLastSqlError();

        $this->set_charset('utf8');
        $this->query('SET NAMES utf8');
        $result = $this->query($sql);
        $this->lastSql = $sql;
        if (!$result) {
            $this->lastSqlError = $this->sqlstate . " - " . $this->error;
        }
        return $this->affected_rows;
    }

    /**
     * Insert the current object into a new table row of util_contact_us
     *
     * All class attributes values defined for mapping all table fields are automatically used during inserting
     * @return mixed MySQL insert result
     * @category DML
     */
    public function insert()
    {
        if ($this->isPkAutoIncrement) {
            $this->id = "";
        }
        // $constants = get_defined_constants();
        $sql = <<< SQL
            INSERT INTO util_contact_us
            (field_name,field_company,field_email,field_subject,field_purpose,field_description,field_message_status,field_received_date)
            VALUES(
			{$this->parseValue($this->fieldName, 'notNumber')},
			{$this->parseValue($this->fieldCompany, 'notNumber')},
			{$this->parseValue($this->fieldEmail, 'notNumber')},
			{$this->parseValue($this->fieldSubject, 'notNumber')},
			{$this->parseValue($this->fieldPurpose, 'notNumber')},
			{$this->parseValue($this->fieldDescription, 'notNumber')},
			{$this->parseValue($this->fieldMessageStatus, 'notNumber')},
			{$this->parseValue($this->fieldReceivedDate, 'notNumber')})
SQL;
        echo $sql;
        $this->resetLastSqlError();

        $this->set_charset('utf8');
        $this->query('SET NAMES utf8');
        $result = $this->query($sql);
        $this->lastSql = $sql;
        if (!$result) {
            $this->lastSqlError = $this->sqlstate . " - " . $this->error;
        } else {
            $this->allowUpdate = true;
            if ($this->isPkAutoIncrement) {
                $this->id = $this->insert_id;
            }
        }
        return $result;
    }

    /**
     * Updates a specific row from the table util_contact_us with the values of the current object.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating of selected row.<br>
     * Null values are used for all attributes not previously setted.
     * @param int $id the primary key id value of table util_contact_us which identifies the row to update.
     * @return mixed MySQL update result
     * @category DML
     */
    public function update($id)
    {
        // $constants = get_defined_constants();
        if ($this->allowUpdate) {
            $sql = <<< SQL
            UPDATE
                util_contact_us
            SET
				field_name={$this->parseValue($this->fieldName, 'notNumber')},
				field_company={$this->parseValue($this->fieldCompany, 'notNumber')},
				field_email={$this->parseValue($this->fieldEmail, 'notNumber')},
				field_subject={$this->parseValue($this->fieldSubject, 'notNumber')},
				field_purpose={$this->parseValue($this->fieldPurpose, 'notNumber')},
				field_description={$this->parseValue($this->fieldDescription, 'notNumber')},
				field_message_status={$this->parseValue($this->fieldMessageStatus, 'notNumber')},
				field_received_date={$this->parseValue($this->fieldReceivedDate, 'notNumber')}
            WHERE
                id={$this->parseValue($id, 'int')}
SQL;
            $this->resetLastSqlError();

            $this->set_charset('utf8');
            $this->query('SET NAMES utf8');
            $result = $this->query($sql);
            if (!$result) {
                $this->lastSqlError = $this->sqlstate . " - " . $this->error;
            } else {
                $this->select($id);
                $this->lastSql = $sql;
                return $result;
            }
        } else {
            return false;
        }
    }

    /**
     * Facility for updating a row of util_contact_us previously loaded.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating.
     * @category DML Helper
     * @return mixed MySQLi update result
     */
    public function updateCurrent()
    {
        if ($this->id != "") {
            return $this->update($this->id);
        } else {
            return false;
        }
    }

    /**
     * Facility for display a row for util_contact_us previously loaded.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating.
     * @category DML Helper
     * @return mixed MySQLi update result
     */
    public function display()
    {
        echo "!!!! SELAM NEW! DISPLAY CONTENT EMPTY, JUMP ON IT :) !!!";
    }

    /**
     * Facility for upload a new row into util_contact_us.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating.
     * @category DML Helper
     * @return mixed MySQLi update result
     */
    public function upload($data = null)
    {
        global $documnetRootPath;
        echo "!!!! SELAM NEW! UPLOAD CONTENT EMPTY, JUMP ON IT :) !!!";
    }

    /**
     * Facility for upload a new row into util_contact_us.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating.
     * @category DML Helper
     * @return mixed MySQLi update result
     */
    public function contactUs()
    {
        if (isset($_GET['lan'])) {
            $lang_url = "&lan=" . $_GET['lan'];
        } else {
            $lang_url = "";
        }
        echo '<form class="form-horizontal" action="../../includes/form_user.php?&function=contact-us' . $lang_url . '" method="post" enctype="multipart/form-data">';
        $this->insertContactUsField();
        echo '</form>';
    }

    /**
     *
     */
    public function insertContactUsField()
    {
        ___open_div_("container-fluid", '');
        ___open_div_("col-md-6 col-xs-12 contactus-container", '');

        ___open_div_("row", "");
        ___open_div_('col-md-12 col-xs-12', '" style="text-align:center;color:#31708f; border-bottom:1px solid #c7c7c7;');
        echo '<strong><p class="h2">' . $GLOBALS['user_specific_array']['user']['contactus'] . '</strong></p>';
        ___close_div_(2);
        ///
        $style = '" style="text-align: left;font-size:18px;';
        ///
        $fillableFields = ['fieldName', 'fieldEmail', 'fieldCompany', 'fieldSubject'];
        ___open_div_("row", '" style="margin-top:15px;');
        ___open_div_("col-md-12 col-xs-12", $style);
        ___open_div_("form-group ", "");
        ___open_div_("col-md-12 col-xs-12", '');
        foreach ($fillableFields as $value) {
            ___open_div_("col-md-12 col-xs-12", '');
            ___open_div_("col-md-12 col-xs-12", '');
            $this->insertFillable($value,  'user_specific_array', 'user');
            ___close_div_(2);
        }

        ___open_div_("col-md-12 col-xs-12", '');
        ___open_div_("col-md-12 col-xs-12", '');
        $this->insertSelectable('fieldPurpose',  'user_specific_array', 'user');
        ___close_div_(2);
        ___open_div_("col-md-12 col-xs-12", '');
        ___open_div_("col-md-12 col-xs-12", '');
        $this->insertFillable('fieldMessage',  'user_specific_array', 'user', 'textarea');
        ___close_div_(2);
        ___close_div_(4);

        ///
        ___open_div_("row", "");
        ___open_div_("col-md-12 col-xs-12", '');
        ___open_div_("form-group ", "");
        ___open_div_("col-md-12 col-xs-12", '');
        ___open_div_("col-md-12 col-xs-12", '');
        echo '<button name="submit" type="submit" value="submit" class="btn btn-primary btn-lg btn-block">' . $GLOBALS['lang']['Send'] . '</button>';
        ___close_div_(5);
        ___close_div_(2);
    }

    public function finalizeContactUs()
    {
        $this->fieldName    = isset($_POST['fieldName']) ? $_POST['fieldName'] : $this->fieldName;
        $this->fieldEmail   = isset($_POST['fieldEmail']) ? $_POST['fieldEmail'] : $this->fieldEmail;
        $this->fieldCompany = isset($_POST['fieldCompany']) ? $_POST['fieldCompany'] : $this->fieldCompany;
        $this->fieldSubject = isset($_POST['fieldSubject']) ? $_POST['fieldSubject'] : $this->fieldSubject;
        $this->fieldPurpose = isset($_POST['fieldPurpose']) ? $_POST['fieldPurpose'] : $this->fieldPurpose;
        $this->fieldMessage = isset($_POST['fieldMessage']) ? $_POST['fieldMessage'] : $this->fieldMessage;
        //$this->fieldMessageStatus = 'unread';
        //$this->fieldReceivedDate = date("Y-m-d H:i:s");
        //$this->insert();
        $msg1 = 'Name: ' . $this->fieldName . "\r\n";
        $msg2 = 'Company: ' . $this->fieldCompany . "\r\n";
        $msg3 = 'Purpose: ' . $this->fieldPurpose . "\r\n";
        $msg4 = 'Message: ' . $this->fieldMessage . "\r\n";
        $message = $msg1 . $msg2 . $msg3 .$msg4;

        $isMessageDeliverdToHT = mail('info@hulutera.com', $this->fieldSubject, $message, 'From:'. $this->fieldEmail .'');

        $lang_sw = isset($_GET['lan']) ? "&lan=" . $_GET['lan'] : "";
        $subject = $GLOBALS['user_specific_array']['message']['contact-us']['subject'];
        $body = $GLOBALS['user_specific_array']['message']['contact-us']['body'][0] . "\r\n";
        /// temporary disable for message sending
        // if (DBHOST == 'localhost') {
        //     header('Location: ../includes/prompt.php?type=7' . $lang_sw);
        //     return;
        // }
        $isMailDelivered = mail($this->field_email, $subject, $body, 'From:info@hulutera.com');
        //Check if mail Delivered or die
        if (!$isMessageDeliverdToHT or !$isMailDelivered) {
            die("Sending Email Failed. Please Contact Site Admin!");
        } else {
            header('Location: ../includes/prompt.php?type=7' . $lang_sw);
        }
    }
}
