<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/classes/reflection/class.config.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/classes/reflection/HtUserAll.php';

/**
 * Class HtCategoryAbuse
 * @extends MySqlRecord
 * @filesource HtCategoryAbuse.php
*/

// namespace hulutera;

class HtCategoryAbuse extends MySqlRecord
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
     * Class attribute for mapping the primary key id of table category_abuse
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
     *  - Data type: varchar(255)
     *  - Null : NO
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var string $fieldName
     */
    private $fieldName;

    /**
     * Class attribute for storing the SQL DDL of table category_abuse
     * @var string base64 encoded string for DDL
     */
    private $ddl = "Q1JFQVRFIFRBQkxFIGBjYXRlZ29yeV9hYnVzZWAgKAogIGBpZGAgaW50KDQwKSBOT1QgTlVMTCBBVVRPX0lOQ1JFTUVOVCwKICBgZmllbGRfbmFtZWAgdmFyY2hhcigyNTUpIE5PVCBOVUxMLAogIFBSSU1BUlkgS0VZIChgaWRgKQopIEVOR0lORT1Jbm5vREIgQVVUT19JTkNSRU1FTlQ9MTQgREVGQVVMVCBDSEFSU0VUPWxhdGluMQ==";

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
        $this->id = (int)$id;
    }

    /**
     * setFieldName Sets the class attribute fieldName with a given value
     *
     * The attribute fieldName maps the field field_name defined as varchar(255).<br>
     * Comment for field field_name: Not specified.<br>
     * @param string $fieldName
     * @category Modifier
     */
    public function setFieldName($fieldName)
    {
        $this->fieldName = (string)$fieldName;
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
     * The attribute fieldName maps the field field_name defined as varchar(255).<br>
     * Comment for field field_name: Not specified.
     * @return string $fieldName
     * @category Accessor of $fieldName
     */
    public function getFieldName()
    {
        return $this->fieldName;
    }

    /**
     * Gets DDL SQL code of the table category_abuse
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
        return "category_abuse";
    }

    /**
     * The HtCategoryAbuse constructor
     *
     * It creates and initializes an object in two way:
     *  - with null (not fetched) data if none $id is given.
     *  - with a fetched data row from the table category_abuse having id=$id
     * @param int $id. If omitted an empty (not fetched) instance is created.
     * @return HtCategoryAbuse Object
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
     * Fetchs a table row of category_abuse into the object.
     *
     * Fetched table fields values are assigned to class attributes and they can be managed by using
     * the accessors/modifiers methods of the class.
     * @param int $id the primary key id value of table category_abuse which identifies the row to select.
     * @return int affected selected row
     * @category DML
     */
    public function select($id)
    {
        if($id == "*"){
            $sql = "SELECT * FROM category_abuse";
        } else { //id
            $sql =  "SELECT * FROM category_abuse WHERE id={$this->parseValue($id,'int')}";
        }

        $this->resetLastSqlError();
        $result =  $this->query($sql);
        $this->resultSet=$result;
        $this->lastSql = $sql;
        if ($result){
            $rowObject = $result->fetch_object();
            @$this->id = (integer)$rowObject->id;
            @$this->fieldName = $this->replaceAposBackSlash($rowObject->field_name);
            $this->allowUpdate = true;
        } else {
            $this->lastSqlError = $this->sqlstate . " - ". $this->error;
        }
        return $this->affected_rows;
        
    }

    /**
     * Deletes a specific row from the table category_abuse
     * @param int $id the primary key id value of table category_abuse which identifies the row to delete.
     * @return int affected deleted row
     * @category DML
     */
    public function delete($id)
    {
        $sql = "DELETE FROM category_abuse WHERE id={$this->parseValue($id,'int')}";
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->lastSql = $sql;
        if (!$result) {
            $this->lastSqlError = $this->sqlstate . " - ". $this->error;
        }
        return $this->affected_rows;
    }

    /**
     * Insert the current object into a new table row of category_abuse
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
            INSERT INTO category_abuse
            (field_name)
            VALUES(
			{$this->parseValue($this->fieldName,'notNumber')})
SQL;
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->lastSql = $sql;
        if (!$result) {
            $this->lastSqlError = $this->sqlstate . " - ". $this->error;
        } else {
            $this->allowUpdate = true;
            if ($this->isPkAutoIncrement) {
                $this->id = $this->insert_id;
            }
        }
        return $result;
    }

    /**
     * Updates a specific row from the table category_abuse with the values of the current object.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating of selected row.<br>
     * Null values are used for all attributes not previously setted.
     * @param int $id the primary key id value of table category_abuse which identifies the row to update.
     * @return mixed MySQL update result
     * @category DML
     */
    public function update($id)
    {
        // $constants = get_defined_constants();
        if ($this->allowUpdate) {
            $sql = <<< SQL
            UPDATE
                category_abuse
            SET 
				field_name={$this->parseValue($this->fieldName,'notNumber')}
            WHERE
                id={$this->parseValue($id,'int')}
SQL;
            $this->resetLastSqlError();
            $result = $this->query($sql);
            if (!$result) {
                $this->lastSqlError = $this->sqlstate . " - ". $this->error;
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
     * Facility for updating a row of category_abuse previously loaded.
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
    * Facility for display a row for category_abuse previously loaded.
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
    * Facility for upload a new row into category_abuse.
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
?>
