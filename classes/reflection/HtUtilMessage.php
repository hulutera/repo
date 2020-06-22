<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/classes/reflection/class.config.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/classes/reflection/HtUserAll.php';

/**
 * Class HtUtilMessage
 * @extends MySqlRecord
 * @filesource HtUtilMessage.php
 */

// namespace hulutera;

class HtUtilMessage extends MySqlRecord
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
     * Class attribute for mapping the primary key id of table util_message
     *
     * Comment for field id: Not specified<br>
     * @var int $id
     */
    private $id;

    /**
     * A class attribute for evaluating if the table has an autoincrement primary key
     * @var bool $isPkAutoIncrement
     */
    private $isPkAutoIncrement = false;

    /**
     * Class attribute for mapping table field field_receiver
     *
     * Comment for field field_receiver: Not specified.<br>
     * Field information:
     *  - Data type: int(11)
     *  - Null : NO
     *  - DB Index:
     *  - Default:
     *  - Extra:
     * @var int $fieldReceiver
     */
    private $fieldReceiver;

    /**
     * Class attribute for mapping table field field_sender
     *
     * Comment for field field_sender: Not specified.<br>
     * Field information:
     *  - Data type: int(11)
     *  - Null : NO
     *  - DB Index:
     *  - Default:
     *  - Extra:
     * @var int $fieldSender
     */
    private $fieldSender;

    /**
     * Class attribute for mapping table field field_subject
     *
     * Comment for field field_subject: Not specified.<br>
     * Field information:
     *  - Data type: varchar(80)
     *  - Null : NO
     *  - DB Index:
     *  - Default:
     *  - Extra:
     * @var string $fieldSubject
     */
    private $fieldSubject;

    /**
     * Class attribute for mapping table field field_body
     *
     * Comment for field field_body: Not specified.<br>
     * Field information:
     *  - Data type: mediumtext
     *  - Null : NO
     *  - DB Index:
     *  - Default:
     *  - Extra:
     * @var string $fieldBody
     */
    private $fieldBody;

    /**
     * Class attribute for mapping table field field_sent_date
     *
     * Comment for field field_sent_date: Not specified.<br>
     * Field information:
     *  - Data type: datetime
     *  - Null : NO
     *  - DB Index:
     *  - Default:
     *  - Extra:
     * @var string $fieldSentDate
     */
    private $fieldSentDate;

    /**
     * Class attribute for mapping table field field_status
     *
     * Comment for field field_status: Not specified.<br>
     * Field information:
     *  - Data type: varchar(20)
     *  - Null : NO
     *  - DB Index:
     *  - Default:
     *  - Extra:
     * @var string $fieldStatus
     */
    private $fieldStatus;

    /**
     * Class attribute for storing the SQL DDL of table util_message
     * @var string base64 encoded string for DDL
     */
    private $ddl = "Q1JFQVRFIFRBQkxFIGB1dGlsX21lc3NhZ2VgICgKICBgaWRgIGludCgxMSkgTk9UIE5VTEwsCiAgYGZpZWxkX3JlY2VpdmVyYCBpbnQoMTEpIE5PVCBOVUxMLAogIGBmaWVsZF9zZW5kZXJgIGludCgxMSkgTk9UIE5VTEwsCiAgYGZpZWxkX3N1YmplY3RgIHZhcmNoYXIoODApIENIQVJBQ1RFUiBTRVQgdXRmOCBDT0xMQVRFIHV0ZjhfdW5pY29kZV9jaSBOT1QgTlVMTCwKICBgZmllbGRfYm9keWAgbWVkaXVtdGV4dCBDSEFSQUNURVIgU0VUIHV0ZjggQ09MTEFURSB1dGY4X3VuaWNvZGVfY2kgTk9UIE5VTEwsCiAgYGZpZWxkX3NlbnRfZGF0ZWAgZGF0ZXRpbWUgTk9UIE5VTEwsCiAgYGZpZWxkX3N0YXR1c2AgdmFyY2hhcigyMCkgQ0hBUkFDVEVSIFNFVCB1dGY4IENPTExBVEUgdXRmOF91bmljb2RlX2NpIE5PVCBOVUxMLAogIFBSSU1BUlkgS0VZIChgaWRgKQopIEVOR0lORT1Jbm5vREIgREVGQVVMVCBDSEFSU0VUPWxhdGluMQ==";

    /**
     * setId Sets the class attribute id with a given value
     *
     * The attribute id maps the field id defined as int(11).<br>
     * Comment for field id: Not specified.<br>
     * @param int $id
     * @category Modifier
     */
    public function setId($id)
    {
        $this->id = (int) $id;
    }

    /**
     * setFieldReceiver Sets the class attribute fieldReceiver with a given value
     *
     * The attribute fieldReceiver maps the field field_receiver defined as int(11).<br>
     * Comment for field field_receiver: Not specified.<br>
     * @param int $fieldReceiver
     * @category Modifier
     */
    public function setFieldReceiver($fieldReceiver)
    {
        $this->fieldReceiver = (int) $fieldReceiver;
    }

    /**
     * setFieldSender Sets the class attribute fieldSender with a given value
     *
     * The attribute fieldSender maps the field field_sender defined as int(11).<br>
     * Comment for field field_sender: Not specified.<br>
     * @param int $fieldSender
     * @category Modifier
     */
    public function setFieldSender($fieldSender)
    {
        $this->fieldSender = (int) $fieldSender;
    }

    /**
     * setFieldSubject Sets the class attribute fieldSubject with a given value
     *
     * The attribute fieldSubject maps the field field_subject defined as varchar(80).<br>
     * Comment for field field_subject: Not specified.<br>
     * @param string $fieldSubject
     * @category Modifier
     */
    public function setFieldSubject($fieldSubject)
    {
        $this->fieldSubject = (string) $fieldSubject;
    }

    /**
     * setFieldBody Sets the class attribute fieldBody with a given value
     *
     * The attribute fieldBody maps the field field_body defined as mediumtext.<br>
     * Comment for field field_body: Not specified.<br>
     * @param string $fieldBody
     * @category Modifier
     */
    public function setFieldBody($fieldBody)
    {
        $this->fieldBody = (string) $fieldBody;
    }

    /**
     * setFieldSentDate Sets the class attribute fieldSentDate with a given value
     *
     * The attribute fieldSentDate maps the field field_sent_date defined as datetime.<br>
     * Comment for field field_sent_date: Not specified.<br>
     * @param string $fieldSentDate
     * @category Modifier
     */
    public function setFieldSentDate($fieldSentDate)
    {
        $this->fieldSentDate = (string) $fieldSentDate;
    }

    /**
     * setFieldStatus Sets the class attribute fieldStatus with a given value
     *
     * The attribute fieldStatus maps the field field_status defined as varchar(20).<br>
     * Comment for field field_status: Not specified.<br>
     * @param string $fieldStatus
     * @category Modifier
     */
    public function setFieldStatus($fieldStatus)
    {
        $this->fieldStatus = (string) $fieldStatus;
    }

    /**
     * getId gets the class attribute id value
     *
     * The attribute id maps the field id defined as int(11).<br>
     * Comment for field id: Not specified.
     * @return int $id
     * @category Accessor of $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * getFieldReceiver gets the class attribute fieldReceiver value
     *
     * The attribute fieldReceiver maps the field field_receiver defined as int(11).<br>
     * Comment for field field_receiver: Not specified.
     * @return int $fieldReceiver
     * @category Accessor of $fieldReceiver
     */
    public function getFieldReceiver()
    {
        return $this->fieldReceiver;
    }

    /**
     * getFieldSender gets the class attribute fieldSender value
     *
     * The attribute fieldSender maps the field field_sender defined as int(11).<br>
     * Comment for field field_sender: Not specified.
     * @return int $fieldSender
     * @category Accessor of $fieldSender
     */
    public function getFieldSender()
    {
        return $this->fieldSender;
    }

    /**
     * getFieldSubject gets the class attribute fieldSubject value
     *
     * The attribute fieldSubject maps the field field_subject defined as varchar(80).<br>
     * Comment for field field_subject: Not specified.
     * @return string $fieldSubject
     * @category Accessor of $fieldSubject
     */
    public function getFieldSubject()
    {
        return $this->fieldSubject;
    }

    /**
     * getFieldBody gets the class attribute fieldBody value
     *
     * The attribute fieldBody maps the field field_body defined as mediumtext.<br>
     * Comment for field field_body: Not specified.
     * @return string $fieldBody
     * @category Accessor of $fieldBody
     */
    public function getFieldBody()
    {
        return $this->fieldBody;
    }

    /**
     * getFieldSentDate gets the class attribute fieldSentDate value
     *
     * The attribute fieldSentDate maps the field field_sent_date defined as datetime.<br>
     * Comment for field field_sent_date: Not specified.
     * @return string $fieldSentDate
     * @category Accessor of $fieldSentDate
     */
    public function getFieldSentDate()
    {
        return $this->fieldSentDate;
    }

    /**
     * getFieldStatus gets the class attribute fieldStatus value
     *
     * The attribute fieldStatus maps the field field_status defined as varchar(20).<br>
     * Comment for field field_status: Not specified.
     * @return string $fieldStatus
     * @category Accessor of $fieldStatus
     */
    public function getFieldStatus()
    {
        return $this->fieldStatus;
    }

    /**
     * Gets DDL SQL code of the table util_message
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
        return "util_message";
    }

    /**
     * The HtUtilMessage constructor
     *
     * It creates and initializes an object in two way:
     *  - with null (not fetched) data if none $id is given.
     *  - with a fetched data row from the table util_message having id=$id
     * @param int $id. If omitted an empty (not fetched) instance is created.
     * @return HtUtilMessage Object
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
     * Fetchs a table row of util_message into the object.
     *
     * Fetched table fields values are assigned to class attributes and they can be managed by using
     * the accessors/modifiers methods of the class.
     * @param int $id the primary key id value of table util_message which identifies the row to select.
     * @return int affected selected row
     * @category DML
     */
    public function select($id)
    {
        if ($id == "*") {
            $sql = "SELECT * FROM util_message";
        } else { //id
            $sql =  "SELECT * FROM util_message WHERE id={$this->parseValue($id, 'int')}";
        }

        $this->resetLastSqlError();
        $result =  $this->query($sql);
        $this->resultSet = $result;
        $this->lastSql = $sql;
        if ($result) {
            $rowObject = $result->fetch_object();
            @$this->id = (int) $rowObject->id;
            @$this->fieldReceiver = (int) $rowObject->field_receiver;
            @$this->fieldSender = (int) $rowObject->field_sender;
            @$this->fieldSubject = $this->replaceAposBackSlash($rowObject->field_subject);
            @$this->fieldBody = $this->replaceAposBackSlash($rowObject->field_body);
            @$this->fieldSentDate = empty($rowObject->field_sent_date) ? null : date(FETCHED_DATETIME_FORMAT, strtotime($rowObject->field_sent_date));
            @$this->fieldStatus = $this->replaceAposBackSlash($rowObject->field_status);
            $this->allowUpdate = true;
        } else {
            $this->lastSqlError = $this->sqlstate . " - " . $this->error;
        }
        return $this->affected_rows;
    }

    /**
     * Deletes a specific row from the table util_message
     * @param int $id the primary key id value of table util_message which identifies the row to delete.
     * @return int affected deleted row
     * @category DML
     */
    public function delete($id)
    {
        $sql = "DELETE FROM util_message WHERE id={$this->parseValue($id, 'int')}";
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
     * Insert the current object into a new table row of util_message
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
            INSERT INTO util_message
            (id,field_receiver,field_sender,field_subject,field_body,field_sent_date,field_status)
            VALUES({$this->parseValue($this->id)},
			{$this->parseValue($this->fieldReceiver)},
			{$this->parseValue($this->fieldSender)},
			{$this->parseValue($this->fieldSubject, 'notNumber')},
			{$this->parseValue($this->fieldBody, 'notNumber')},
			{$this->parseValue($this->fieldSentDate, 'datetime')},
			{$this->parseValue($this->fieldStatus, 'notNumber')})
SQL;
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
     * Updates a specific row from the table util_message with the values of the current object.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating of selected row.<br>
     * Null values are used for all attributes not previously setted.
     * @param int $id the primary key id value of table util_message which identifies the row to update.
     * @return mixed MySQL update result
     * @category DML
     */
    public function update($id)
    {
        // $constants = get_defined_constants();
        if ($this->allowUpdate) {
            $sql = <<< SQL
            UPDATE
                util_message
            SET
				field_receiver={$this->parseValue($this->fieldReceiver)},
				field_sender={$this->parseValue($this->fieldSender)},
				field_subject={$this->parseValue($this->fieldSubject, 'notNumber')},
				field_body={$this->parseValue($this->fieldBody, 'notNumber')},
				field_sent_date={$this->parseValue($this->fieldSentDate, 'datetime')},
				field_status={$this->parseValue($this->fieldStatus, 'notNumber')}
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
     * Facility for updating a row of util_message previously loaded.
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
     * Facility for display a row for util_message previously loaded.
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
     * Facility for upload a new row into util_message.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating.
     * @category DML Helper
     * @return mixed MySQLi update result
     */
    public function upload()
    {
        global $documnetRootPath;
        echo "!!!! SELAM NEW! UPLOAD CONTENT EMPTY, JUMP ON IT :) !!!";
    }
}
