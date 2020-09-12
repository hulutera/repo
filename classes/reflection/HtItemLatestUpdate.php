<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/classes/reflection/class.config.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/classes/reflection/HtUserAll.php';

/**
 * Class HtItemLatestUpdate
 * @extends MySqlRecord
 * @filesource HtItemLatestUpdate.php
 */

// namespace hulutera;

class HtItemLatestUpdate extends MySqlRecord
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
     * Class attribute for mapping the primary key id of table item_latest_update
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
     * Class attribute for mapping table field id_item
     *
     * Comment for field id_item: Not specified.<br>
     * Field information:
     *  - Data type: int(40)
     *  - Null : NO
     *  - DB Index:
     *  - Default:
     *  - Extra:
     * @var int $idItem
     */
    private $idItem;

    /**
     * Class attribute for mapping table field field_item_name
     *
     * Comment for field field_item_name: Not specified.<br>
     * Field information:
     *  - Data type: varchar(50)
     *  - Null : NO
     *  - DB Index:
     *  - Default:
     *  - Extra:
     * @var string $fieldItemName
     */
    private $fieldItemName;

    /**
     * Class attribute for mapping table field field_upload_time
     *
     * Comment for field field_upload_time: Not specified.<br>
     * Field information:
     *  - Data type: int(40)
     *  - Null : YES
     *  - DB Index:
     *  - Default:
     *  - Extra:
     * @var int $fieldUploadTime
     */
    private $fieldUploadTime;

    /**
     * Class attribute for storing the SQL DDL of table item_latest_update
     * @var string base64 encoded string for DDL
     */
    private $ddl = "Q1JFQVRFIFRBQkxFIGBpdGVtX2xhdGVzdF91cGRhdGVgICgKICBgaWRgIGludCg0MCkgTk9UIE5VTEwgQVVUT19JTkNSRU1FTlQsCiAgYGlkX2l0ZW1gIGludCg0MCkgTk9UIE5VTEwsCiAgYGZpZWxkX2l0ZW1fbmFtZWAgdmFyY2hhcig1MCkgTk9UIE5VTEwsCiAgYGZpZWxkX3VwbG9hZF90aW1lYCBpbnQoNDApIERFRkFVTFQgTlVMTCwKICBQUklNQVJZIEtFWSAoYGlkYCkKKSBFTkdJTkU9SW5ub0RCIEFVVE9fSU5DUkVNRU5UPTQ4IERFRkFVTFQgQ0hBUlNFVD1sYXRpbjE=";

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
     * setIdItem Sets the class attribute idItem with a given value
     *
     * The attribute idItem maps the field id_item defined as int(40).<br>
     * Comment for field id_item: Not specified.<br>
     * @param int $idItem
     * @category Modifier
     */
    public function setIdItem($idItem)
    {
        $this->idItem = (int) $idItem;
    }

    /**
     * setFieldItemName Sets the class attribute fieldItemName with a given value
     *
     * The attribute fieldItemName maps the field field_item_name defined as varchar(50).<br>
     * Comment for field field_item_name: Not specified.<br>
     * @param string $fieldItemName
     * @category Modifier
     */
    public function setFieldItemName($fieldItemName)
    {
        $this->fieldItemName = (string) $fieldItemName;
    }

    /**
     * setFieldUploadTime Sets the class attribute fieldUploadTime with a given value
     *
     * The attribute fieldUploadTime maps the field field_upload_time defined as int(40).<br>
     * Comment for field field_upload_time: Not specified.<br>
     * @param int $fieldUploadTime
     * @category Modifier
     */
    public function setFieldUploadTime($fieldUploadTime)
    {
        $this->fieldUploadTime = (int) $fieldUploadTime;
    }

    /**
     *
     */

    public function setFieldValues($itemId, $itemName) {
        $this->idItem = (int) $itemId;
        $this->fieldItemName =  (string) $itemName;
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
     * getIdItem gets the class attribute idItem value
     *
     * The attribute idItem maps the field id_item defined as int(40).<br>
     * Comment for field id_item: Not specified.
     * @return int $idItem
     * @category Accessor of $idItem
     */
    public function getIdItem()
    {
        return $this->idItem;
    }

    /**
     * getFieldItemName gets the class attribute fieldItemName value
     *
     * The attribute fieldItemName maps the field field_item_name defined as varchar(50).<br>
     * Comment for field field_item_name: Not specified.
     * @return string $fieldItemName
     * @category Accessor of $fieldItemName
     */
    public function getFieldItemName()
    {
        return $this->fieldItemName;
    }

    /**
     * getFieldUploadTime gets the class attribute fieldUploadTime value
     *
     * The attribute fieldUploadTime maps the field field_upload_time defined as int(40).<br>
     * Comment for field field_upload_time: Not specified.
     * @return int $fieldUploadTime
     * @category Accessor of $fieldUploadTime
     */
    public function getFieldUploadTime()
    {
        return $this->fieldUploadTime;
    }

    /**
     * Gets DDL SQL code of the table item_latest_update
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
        return "item_latest_update";
    }

    /**
     * The HtItemLatestUpdate constructor
     *
     * It creates and initializes an object in two way:
     *  - with null (not fetched) data if none $id is given.
     *  - with a fetched data row from the table item_latest_update having id=$id
     * @param int $id. If omitted an empty (not fetched) instance is created.
     * @return HtItemLatestUpdate Object
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
     * Fetchs a table row of item_latest_update into the object.
     *
     * Fetched table fields values are assigned to class attributes and they can be managed by using
     * the accessors/modifiers methods of the class.
     * @param int $id the primary key id value of table item_latest_update which identifies the row to select.
     * @return int affected selected row
     * @category DML
     */
    public function select($id, $status = null)
    {
        if ($id == "*") {
            $sql = "SELECT * FROM item_latest_update";
        } else { //id
            $sql =  "SELECT * FROM item_latest_update WHERE id={$this->parseValue($id, 'int')}";
        }

        $this->resetLastSqlError();
        $result =  $this->query($sql);
        $this->resultSet = $result;
        $this->lastSql = $sql;
        $this->affected_rows;
    }

    /**
     * Run a others query with a request
     * $filter: query condition e.g field_status = 'active' or field_status = 'pending'
     * $start: the first item to fetch
     * $itemPerPage: the total number of items to be fetched from the table
     * return: the number of affected rows
     * N.B: the query is done based on the number of items to be fetched and that is dueto the pagination
     */
    public function runQuery($start = null, $itemPerPage = null)
    {
        if ($itemPerPage == null) {
            $sql =  "SELECT * FROM item_latest_update";
        } else {
            $sql =  "SELECT * FROM item_latest_update ORDER BY field_upload_time DESC LIMIT $start, $itemPerPage";
        }
        $this->resetLastSqlError();
        $result =  $this->query($sql);
        $this->resultSet = $result;
        $this->lastSql = $sql;
        return $this->affected_rows;
    }

    /**
     * Deletes a specific row from the table item_latest_update
     * @param int $id the primary key id value of table item_latest_update which identifies the row to delete.
     * @return int affected deleted row
     * @category DML
     */
    public function delete()
    {
        $sql = "DELETE FROM item_latest_update WHERE id_item = {$this->parseValue($this->idItem, 'int')} AND field_item_name LIKE {$this->parseValue($this->fieldItemName, 'notNumber')}";
        $this->resetLastSqlError();
        // {$this->parseValue($this->idItem, 'int')} AND field_item_name LIKE '{$this->parseValue($this->fieldItemName, 'notNumber')}'
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
     * Insert the current object into a new table row of item_latest_update
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
            INSERT INTO item_latest_update
            (id_item,field_item_name)
            VALUES(
			{$this->parseValue($this->idItem)},
			{$this->parseValue($this->fieldItemName, 'notNumber')})
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
     * Updates a specific row from the table item_latest_update with the values of the current object.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating of selected row.<br>
     * Null values are used for all attributes not previously setted.
     * @param int $id the primary key id value of table item_latest_update which identifies the row to update.
     * @return mixed MySQL update result
     * @category DML
     */
    public function update($id)
    {
        // $constants = get_defined_constants();
        if ($this->allowUpdate) {
            $sql = <<< SQL
            UPDATE
                item_latest_update
            SET
				id_item={$this->parseValue($this->idItem)},
				field_item_name={$this->parseValue($this->fieldItemName, 'notNumber')},
				field_upload_time={$this->parseValue($this->fieldUploadTime)}
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
     * Facility for updating a row of item_latest_update previously loaded.
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
     * Facility for display a row for item_latest_update previously loaded.
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
     * Facility for upload a new row into item_latest_update.
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
}
