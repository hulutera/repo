<?php
global $documnetRootPath;

require_once $documnetRootPath . "/classes/reflection/class.config.php";


/**
 * Class HtImageHousehold
 * @extends MySqlRecord
 * @filesource HtImageHousehold.php
*/

// namespace hulutera;

class HtImageHousehold extends MySqlRecord
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
     * Class attribute for mapping the primary key id of table image_household
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
     *  - DB Index: MUL
     *  - Default: 
     *  - Extra:  
     * @var int $idItem
     */
    private $idItem;

    /**
     * Class attribute for mapping table field field_image_string
     *
     * Comment for field field_image_string: Not specified.<br>
     * Field information:
     *  - Data type: longtext
     *  - Null : YES
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var string $fieldImageString
     */
    private $fieldImageString;

    /**
     * Class attribute for storing the SQL DDL of table image_household
     * @var string base64 encoded string for DDL
     */
    private $ddl = "Q1JFQVRFIFRBQkxFIGBpbWFnZV9ob3VzZWhvbGRgICgKICBgaWRgIGludCg0MCkgTk9UIE5VTEwgQVVUT19JTkNSRU1FTlQsCiAgYGlkX2l0ZW1gIGludCg0MCkgTk9UIE5VTEwsCiAgYGZpZWxkX2ltYWdlX3N0cmluZ2AgbG9uZ3RleHQsCiAgUFJJTUFSWSBLRVkgKGBpZGApLAogIEtFWSBgaXRlbV9JRGAgKGBpZF9pdGVtYCkKKSBFTkdJTkU9SW5ub0RCIEFVVE9fSU5DUkVNRU5UPTcgREVGQVVMVCBDSEFSU0VUPWxhdGluMQ==";

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
     * setIdItem Sets the class attribute idItem with a given value
     *
     * The attribute idItem maps the field id_item defined as int(40).<br>
     * Comment for field id_item: Not specified.<br>
     * @param int $idItem
     * @category Modifier
     */
    public function setIdItem($idItem)
    {
        $this->idItem = (int)$idItem;
    }

    /**
     * setFieldImageString Sets the class attribute fieldImageString with a given value
     *
     * The attribute fieldImageString maps the field field_image_string defined as longtext.<br>
     * Comment for field field_image_string: Not specified.<br>
     * @param string $fieldImageString
     * @category Modifier
     */
    public function setFieldImageString($fieldImageString)
    {
        $this->fieldImageString = (string)$fieldImageString;
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
     * getFieldImageString gets the class attribute fieldImageString value
     *
     * The attribute fieldImageString maps the field field_image_string defined as longtext.<br>
     * Comment for field field_image_string: Not specified.
     * @return string $fieldImageString
     * @category Accessor of $fieldImageString
     */
    public function getFieldImageString()
    {
        return $this->fieldImageString;
    }

    /**
     * Gets DDL SQL code of the table image_household
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
        return "image_household";
    }

    /**
     * The HtImageHousehold constructor
     *
     * It creates and initializes an object in two way:
     *  - with null (not fetched) data if none $id is given.
     *  - with a fetched data row from the table image_household having id=$id
     * @param int $id. If omitted an empty (not fetched) instance is created.
     * @return HtImageHousehold Object
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
     * Fetchs a table row of image_household into the object.
     *
     * Fetched table fields values are assigned to class attributes and they can be managed by using
     * the accessors/modifiers methods of the class.
     * @param int $id the primary key id value of table image_household which identifies the row to select.
     * @return int affected selected row
     * @category DML
     */
    public function select($id)
    {
        $sql =  "SELECT * FROM image_household WHERE id={$this->parseValue($id,'int')}";
        $this->resetLastSqlError();
        $result =  $this->query($sql);
        $this->resultSet=$result;
        $this->lastSql = $sql;
        if ($result){
            $rowObject = $result->fetch_object();
            @$this->id = (integer)$rowObject->id;
            @$this->idItem = (integer)$rowObject->id_item;
            @$this->fieldImageString = $this->replaceAposBackSlash($rowObject->field_image_string);
            $this->allowUpdate = true;
        } else {
            $this->lastSqlError = $this->sqlstate . " - ". $this->error;
        }
        return $this->affected_rows;
    }

    /**
     * Deletes a specific row from the table image_household
     * @param int $id the primary key id value of table image_household which identifies the row to delete.
     * @return int affected deleted row
     * @category DML
     */
    public function delete($id)
    {
        $sql = "DELETE FROM image_household WHERE id={$this->parseValue($id,'int')}";
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->lastSql = $sql;
        if (!$result) {
            $this->lastSqlError = $this->sqlstate . " - ". $this->error;
        }
        return $this->affected_rows;
    }

    /**
     * Insert the current object into a new table row of image_household
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
            INSERT INTO image_household
            (id_item,field_image_string)
            VALUES(
			{$this->parseValue($this->idItem)},
			{$this->parseValue($this->fieldImageString,'notNumber')})
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
     * Updates a specific row from the table image_household with the values of the current object.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating of selected row.<br>
     * Null values are used for all attributes not previously setted.
     * @param int $id the primary key id value of table image_household which identifies the row to update.
     * @return mixed MySQL update result
     * @category DML
     */
    public function update($id)
    {
        // $constants = get_defined_constants();
        if ($this->allowUpdate) {
            $sql = <<< SQL
            UPDATE
                image_household
            SET 
				id_item={$this->parseValue($this->idItem)},
				field_image_string={$this->parseValue($this->fieldImageString,'notNumber')}
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
     * Facility for updating a row of image_household previously loaded.
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

}
?>
