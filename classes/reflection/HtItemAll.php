<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/classes/reflection/class.config.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/classes/reflection/HtUserAll.php';

/**
 * Class HtItemAll
 * @extends MySqlRecord
 * @filesource HtItemAll.php
 */

// namespace hulutera;

class HtItemAll extends MySqlRecord
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
     * Class attribute for mapping the primary key id of table item_all
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
     * Class attribute for mapping table field id_table
     *
     * Comment for field id_table: Not specified.<br>
     * Field information:
     *  - Data type: int(50)
     *  - Null : NO
     *  - DB Index:
     *  - Default:
     *  - Extra:
     * @var int $idTable
     */
    private $idTable;

    /**
     * Class attribute for mapping table field field_name
     *
     * Comment for field field_name: Not specified.<br>
     * Field information:
     *  - Data type: varchar(50)
     *  - Null : NO
     *  - DB Index:
     *  - Default:
     *  - Extra:
     * @var string $fieldName
     */
    private $fieldName;

    /**
     * Class attribute for storing the SQL DDL of table item_all
     * @var string base64 encoded string for DDL
     */
    private $ddl = "Q1JFQVRFIFRBQkxFIGBpdGVtX2FsbGAgKAogIGBpZGAgaW50KDUwKSBOT1QgTlVMTCwKICBgaWRfdGFibGVgIGludCg1MCkgTk9UIE5VTEwsCiAgYGZpZWxkX25hbWVgIHZhcmNoYXIoNTApIE5PVCBOVUxMLAogIFBSSU1BUlkgS0VZIChgaWRgKQopIEVOR0lORT1NeUlTQU0gREVGQVVMVCBDSEFSU0VUPWxhdGluMQ==";

    /**
     * setId Sets the class attribute id with a given value
     *
     * The attribute id maps the field id defined as int(50).<br>
     * Comment for field id: Not specified.<br>
     * @param int $id
     * @category Modifier
     */
    public function setId($id)
    {
        $this->id = (int) $id;
    }

    /**
     * setIdTable Sets the class attribute idTable with a given value
     *
     * The attribute idTable maps the field id_table defined as int(50).<br>
     * Comment for field id_table: Not specified.<br>
     * @param int $idTable
     * @category Modifier
     */
    public function setIdTable($idTable)
    {
        $this->idTable = (int) $idTable;
    }

    /**
     * setFieldName Sets the class attribute fieldName with a given value
     *
     * The attribute fieldName maps the field field_name defined as varchar(50).<br>
     * Comment for field field_name: Not specified.<br>
     * @param string $fieldName
     * @category Modifier
     */
    public function setFieldName($fieldName)
    {
        $this->fieldName = (string) $fieldName;
    }

    /**
     * getId gets the class attribute id value
     *
     * The attribute id maps the field id defined as int(50).<br>
     * Comment for field id: Not specified.
     * @return int $id
     * @category Accessor of $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * getIdTable gets the class attribute idTable value
     *
     * The attribute idTable maps the field id_table defined as int(50).<br>
     * Comment for field id_table: Not specified.
     * @return int $idTable
     * @category Accessor of $idTable
     */
    public function getIdTable()
    {
        return $this->idTable;
    }

    /**
     * getFieldName gets the class attribute fieldName value
     *
     * The attribute fieldName maps the field field_name defined as varchar(50).<br>
     * Comment for field field_name: Not specified.
     * @return string $fieldName
     * @category Accessor of $fieldName
     */
    public function getFieldName()
    {
        return $this->fieldName;
    }

    /**
     * Gets DDL SQL code of the table item_all
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
        return "item_all";
    }

    /**
     * The HtItemAll constructor
     *
     * It creates and initializes an object in two way:
     *  - with null (not fetched) data if none $id is given.
     *  - with a fetched data row from the table item_all having id=$id
     * @param int $id. If omitted an empty (not fetched) instance is created.
     * @return HtItemAll Object
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
     * Fetchs a table row of item_all into the object.
     *
     * Fetched table fields values are assigned to class attributes and they can be managed by using
     * the accessors/modifiers methods of the class.
     * @param int $id the primary key id value of table item_all which identifies the row to select.
     * @return int affected selected row
     * @category DML
     */
    public function select($id)
    {
        if ($id == "*") {
            $sql = "SELECT * FROM item_all";
        } else { //id
            $sql =  "SELECT * FROM item_all WHERE id={$this->parseValue($id, 'int')}";
        }

        $this->resetLastSqlError();
        $result =  $this->query($sql);
        $this->resultSet = $result;
        $this->lastSql = $sql;
        if ($result) {
            $rowObject = $result->fetch_object();
            @$this->id = (int) $rowObject->id;
            @$this->idTable = (int) $rowObject->id_table;
            @$this->fieldName = $this->replaceAposBackSlash($rowObject->field_name);
            $this->allowUpdate = true;
        } else {
            $this->lastSqlError = $this->sqlstate . " - " . $this->error;
        }
        return $this->affected_rows;
    }

    /**
     * Deletes a specific row from the table item_all
     * @param int $id the primary key id value of table item_all which identifies the row to delete.
     * @return int affected deleted row
     * @category DML
     */
    public function delete($id)
    {
        $sql = "DELETE FROM item_all WHERE id={$this->parseValue($id, 'int')}";
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
     * Insert the current object into a new table row of item_all
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
            INSERT INTO item_all
            (id,id_table,field_name)
            VALUES({$this->parseValue($this->id)},
			{$this->parseValue($this->idTable)},
			{$this->parseValue($this->fieldName, 'notNumber')})
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
     * Updates a specific row from the table item_all with the values of the current object.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating of selected row.<br>
     * Null values are used for all attributes not previously setted.
     * @param int $id the primary key id value of table item_all which identifies the row to update.
     * @return mixed MySQL update result
     * @category DML
     */
    public function update($id)
    {
        // $constants = get_defined_constants();
        if ($this->allowUpdate) {
            $sql = <<< SQL
            UPDATE
                item_all
            SET
				id_table={$this->parseValue($this->idTable)},
				field_name={$this->parseValue($this->fieldName, 'notNumber')}
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
     * Facility for updating a row of item_all previously loaded.
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
     * Facility for display a row for item_all previously loaded.
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
     * Facility for upload a new row into item_all.
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
