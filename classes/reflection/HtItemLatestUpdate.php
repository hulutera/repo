<?php
global $documnetRootPath;

require_once $documnetRootPath . "/classes/reflection/class.config.php";


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
     * Class attribute for mapping table field id_car
     *
     * Comment for field id_car: Not specified.<br>
     * Field information:
     *  - Data type: int(40)
     *  - Null : YES
     *  - DB Index: MUL
     *  - Default: 
     *  - Extra:  
     * @var int $idCar
     */
    private $idCar;

    /**
     * Class attribute for mapping table field id_computer
     *
     * Comment for field id_computer: Not specified.<br>
     * Field information:
     *  - Data type: int(40)
     *  - Null : YES
     *  - DB Index: MUL
     *  - Default: 
     *  - Extra:  
     * @var int $idComputer
     */
    private $idComputer;

    /**
     * Class attribute for mapping table field id_house
     *
     * Comment for field id_house: Not specified.<br>
     * Field information:
     *  - Data type: int(40)
     *  - Null : YES
     *  - DB Index: MUL
     *  - Default: 
     *  - Extra:  
     * @var int $idHouse
     */
    private $idHouse;

    /**
     * Class attribute for mapping table field id_household
     *
     * Comment for field id_household: Not specified.<br>
     * Field information:
     *  - Data type: int(40)
     *  - Null : YES
     *  - DB Index: MUL
     *  - Default: 
     *  - Extra:  
     * @var int $idHousehold
     */
    private $idHousehold;

    /**
     * Class attribute for mapping table field id_electronic
     *
     * Comment for field id_electronic: Not specified.<br>
     * Field information:
     *  - Data type: int(40)
     *  - Null : YES
     *  - DB Index: MUL
     *  - Default: 
     *  - Extra:  
     * @var int $idElectronic
     */
    private $idElectronic;

    /**
     * Class attribute for mapping table field id_phone
     *
     * Comment for field id_phone: Not specified.<br>
     * Field information:
     *  - Data type: int(40)
     *  - Null : YES
     *  - DB Index: UNI
     *  - Default: 
     *  - Extra:  
     * @var int $idPhone
     */
    private $idPhone;

    /**
     * Class attribute for mapping table field id_other
     *
     * Comment for field id_other: Not specified.<br>
     * Field information:
     *  - Data type: int(40)
     *  - Null : YES
     *  - DB Index: UNI
     *  - Default: 
     *  - Extra:  
     * @var int $idOther
     */
    private $idOther;

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
    private $ddl = "Q1JFQVRFIFRBQkxFIGBpdGVtX2xhdGVzdF91cGRhdGVgICgKICBgaWRgIGludCg0MCkgTk9UIE5VTEwgQVVUT19JTkNSRU1FTlQsCiAgYGlkX2NhcmAgaW50KDQwKSBERUZBVUxUIE5VTEwsCiAgYGlkX2NvbXB1dGVyYCBpbnQoNDApIERFRkFVTFQgTlVMTCwKICBgaWRfaG91c2VgIGludCg0MCkgREVGQVVMVCBOVUxMLAogIGBpZF9ob3VzZWhvbGRgIGludCg0MCkgREVGQVVMVCBOVUxMLAogIGBpZF9lbGVjdHJvbmljYCBpbnQoNDApIERFRkFVTFQgTlVMTCwKICBgaWRfcGhvbmVgIGludCg0MCkgREVGQVVMVCBOVUxMLAogIGBpZF9vdGhlcmAgaW50KDQwKSBERUZBVUxUIE5VTEwsCiAgYGZpZWxkX3VwbG9hZF90aW1lYCBpbnQoNDApIERFRkFVTFQgTlVMTCwKICBQUklNQVJZIEtFWSAoYGlkYCksCiAgVU5JUVVFIEtFWSBgb0lEYCAoYGlkX290aGVyYCksCiAgVU5JUVVFIEtFWSBgcElEYCAoYGlkX3Bob25lYCksCiAgVU5JUVVFIEtFWSBgaGhJRGAgKGBpZF9ob3VzZWhvbGRgLGBpZF9waG9uZWAsYGlkX290aGVyYCksCiAgS0VZIGBoSURfRktgIChgaWRfaG91c2VgKSwKICBLRVkgYGRJRF9GS2AgKGBpZF9jb21wdXRlcmApLAogIEtFWSBgY0lEX0ZLYCAoYGlkX2NhcmApLAogIEtFWSBgZUlEYCAoYGlkX2VsZWN0cm9uaWNgKSwKICBDT05TVFJBSU5UIGBpdGVtX2xhdGVzdF91cGRhdGVfaWJma18xMGAgRk9SRUlHTiBLRVkgKGBpZF9ob3VzZWhvbGRgKSBSRUZFUkVOQ0VTIGBpdGVtX2hvdXNlaG9sZGAgKGBpZGApIE9OIERFTEVURSBDQVNDQURFIE9OIFVQREFURSBDQVNDQURFLAogIENPTlNUUkFJTlQgYGl0ZW1fbGF0ZXN0X3VwZGF0ZV9pYmZrXzExYCBGT1JFSUdOIEtFWSAoYGlkX3Bob25lYCkgUkVGRVJFTkNFUyBgaXRlbV9waG9uZWAgKGBpZGApIE9OIERFTEVURSBDQVNDQURFIE9OIFVQREFURSBDQVNDQURFLAogIENPTlNUUkFJTlQgYGl0ZW1fbGF0ZXN0X3VwZGF0ZV9pYmZrXzEyYCBGT1JFSUdOIEtFWSAoYGlkX290aGVyYCkgUkVGRVJFTkNFUyBgaXRlbV9vdGhlcmAgKGBpZGApIE9OIERFTEVURSBDQVNDQURFIE9OIFVQREFURSBDQVNDQURFLAogIENPTlNUUkFJTlQgYGl0ZW1fbGF0ZXN0X3VwZGF0ZV9pYmZrXzEzYCBGT1JFSUdOIEtFWSAoYGlkX2VsZWN0cm9uaWNgKSBSRUZFUkVOQ0VTIGBpdGVtX2VsZWN0cm9uaWNgIChgaWRgKSBPTiBERUxFVEUgQ0FTQ0FERSBPTiBVUERBVEUgQ0FTQ0FERSwKICBDT05TVFJBSU5UIGBpdGVtX2xhdGVzdF91cGRhdGVfaWJma183YCBGT1JFSUdOIEtFWSAoYGlkX2NhcmApIFJFRkVSRU5DRVMgYGl0ZW1fY2FyYCAoYGlkYCkgT04gREVMRVRFIENBU0NBREUgT04gVVBEQVRFIENBU0NBREUsCiAgQ09OU1RSQUlOVCBgaXRlbV9sYXRlc3RfdXBkYXRlX2liZmtfOGAgRk9SRUlHTiBLRVkgKGBpZF9jb21wdXRlcmApIFJFRkVSRU5DRVMgYGl0ZW1fY29tcHV0ZXJgIChgaWRgKSBPTiBERUxFVEUgQ0FTQ0FERSBPTiBVUERBVEUgQ0FTQ0FERSwKICBDT05TVFJBSU5UIGBpdGVtX2xhdGVzdF91cGRhdGVfaWJma185YCBGT1JFSUdOIEtFWSAoYGlkX2hvdXNlYCkgUkVGRVJFTkNFUyBgaXRlbV9ob3VzZWAgKGBpZGApIE9OIERFTEVURSBDQVNDQURFIE9OIFVQREFURSBDQVNDQURFCikgRU5HSU5FPUlubm9EQiBBVVRPX0lOQ1JFTUVOVD00OCBERUZBVUxUIENIQVJTRVQ9bGF0aW4x";

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
     * setIdCar Sets the class attribute idCar with a given value
     *
     * The attribute idCar maps the field id_car defined as int(40).<br>
     * Comment for field id_car: Not specified.<br>
     * @param int $idCar
     * @category Modifier
     */
    public function setIdCar($idCar)
    {
        $this->idCar = (int)$idCar;
    }

    /**
     * setIdComputer Sets the class attribute idComputer with a given value
     *
     * The attribute idComputer maps the field id_computer defined as int(40).<br>
     * Comment for field id_computer: Not specified.<br>
     * @param int $idComputer
     * @category Modifier
     */
    public function setIdComputer($idComputer)
    {
        $this->idComputer = (int)$idComputer;
    }

    /**
     * setIdHouse Sets the class attribute idHouse with a given value
     *
     * The attribute idHouse maps the field id_house defined as int(40).<br>
     * Comment for field id_house: Not specified.<br>
     * @param int $idHouse
     * @category Modifier
     */
    public function setIdHouse($idHouse)
    {
        $this->idHouse = (int)$idHouse;
    }

    /**
     * setIdHousehold Sets the class attribute idHousehold with a given value
     *
     * The attribute idHousehold maps the field id_household defined as int(40).<br>
     * Comment for field id_household: Not specified.<br>
     * @param int $idHousehold
     * @category Modifier
     */
    public function setIdHousehold($idHousehold)
    {
        $this->idHousehold = (int)$idHousehold;
    }

    /**
     * setIdElectronic Sets the class attribute idElectronic with a given value
     *
     * The attribute idElectronic maps the field id_electronic defined as int(40).<br>
     * Comment for field id_electronic: Not specified.<br>
     * @param int $idElectronic
     * @category Modifier
     */
    public function setIdElectronic($idElectronic)
    {
        $this->idElectronic = (int)$idElectronic;
    }

    /**
     * setIdPhone Sets the class attribute idPhone with a given value
     *
     * The attribute idPhone maps the field id_phone defined as int(40).<br>
     * Comment for field id_phone: Not specified.<br>
     * @param int $idPhone
     * @category Modifier
     */
    public function setIdPhone($idPhone)
    {
        $this->idPhone = (int)$idPhone;
    }

    /**
     * setIdOther Sets the class attribute idOther with a given value
     *
     * The attribute idOther maps the field id_other defined as int(40).<br>
     * Comment for field id_other: Not specified.<br>
     * @param int $idOther
     * @category Modifier
     */
    public function setIdOther($idOther)
    {
        $this->idOther = (int)$idOther;
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
        $this->fieldUploadTime = (int)$fieldUploadTime;
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
     * getIdCar gets the class attribute idCar value
     *
     * The attribute idCar maps the field id_car defined as int(40).<br>
     * Comment for field id_car: Not specified.
     * @return int $idCar
     * @category Accessor of $idCar
     */
    public function getIdCar()
    {
        return $this->idCar;
    }

    /**
     * getIdComputer gets the class attribute idComputer value
     *
     * The attribute idComputer maps the field id_computer defined as int(40).<br>
     * Comment for field id_computer: Not specified.
     * @return int $idComputer
     * @category Accessor of $idComputer
     */
    public function getIdComputer()
    {
        return $this->idComputer;
    }

    /**
     * getIdHouse gets the class attribute idHouse value
     *
     * The attribute idHouse maps the field id_house defined as int(40).<br>
     * Comment for field id_house: Not specified.
     * @return int $idHouse
     * @category Accessor of $idHouse
     */
    public function getIdHouse()
    {
        return $this->idHouse;
    }

    /**
     * getIdHousehold gets the class attribute idHousehold value
     *
     * The attribute idHousehold maps the field id_household defined as int(40).<br>
     * Comment for field id_household: Not specified.
     * @return int $idHousehold
     * @category Accessor of $idHousehold
     */
    public function getIdHousehold()
    {
        return $this->idHousehold;
    }

    /**
     * getIdElectronic gets the class attribute idElectronic value
     *
     * The attribute idElectronic maps the field id_electronic defined as int(40).<br>
     * Comment for field id_electronic: Not specified.
     * @return int $idElectronic
     * @category Accessor of $idElectronic
     */
    public function getIdElectronic()
    {
        return $this->idElectronic;
    }

    /**
     * getIdPhone gets the class attribute idPhone value
     *
     * The attribute idPhone maps the field id_phone defined as int(40).<br>
     * Comment for field id_phone: Not specified.
     * @return int $idPhone
     * @category Accessor of $idPhone
     */
    public function getIdPhone()
    {
        return $this->idPhone;
    }

    /**
     * getIdOther gets the class attribute idOther value
     *
     * The attribute idOther maps the field id_other defined as int(40).<br>
     * Comment for field id_other: Not specified.
     * @return int $idOther
     * @category Accessor of $idOther
     */
    public function getIdOther()
    {
        return $this->idOther;
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
    public function select($id)
    {
        $sql =  "SELECT * FROM item_latest_update WHERE id={$this->parseValue($id,'int')}";
        $this->resetLastSqlError();
        $result =  $this->query($sql);
        $this->resultSet=$result;
        $this->lastSql = $sql;
        if ($result){
            $rowObject = $result->fetch_object();
            @$this->id = (integer)$rowObject->id;
            @$this->idCar = (integer)$rowObject->id_car;
            @$this->idComputer = (integer)$rowObject->id_computer;
            @$this->idHouse = (integer)$rowObject->id_house;
            @$this->idHousehold = (integer)$rowObject->id_household;
            @$this->idElectronic = (integer)$rowObject->id_electronic;
            @$this->idPhone = (integer)$rowObject->id_phone;
            @$this->idOther = (integer)$rowObject->id_other;
            @$this->fieldUploadTime = (integer)$rowObject->field_upload_time;
            $this->allowUpdate = true;
        } else {
            $this->lastSqlError = $this->sqlstate . " - ". $this->error;
        }
        return $this->affected_rows;
    }

    /**
     * Deletes a specific row from the table item_latest_update
     * @param int $id the primary key id value of table item_latest_update which identifies the row to delete.
     * @return int affected deleted row
     * @category DML
     */
    public function delete($id)
    {
        $sql = "DELETE FROM item_latest_update WHERE id={$this->parseValue($id,'int')}";
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->lastSql = $sql;
        if (!$result) {
            $this->lastSqlError = $this->sqlstate . " - ". $this->error;
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
            (id_car,id_computer,id_house,id_household,id_electronic,id_phone,id_other,field_upload_time)
            VALUES(
			{$this->parseValue($this->idCar)},
			{$this->parseValue($this->idComputer)},
			{$this->parseValue($this->idHouse)},
			{$this->parseValue($this->idHousehold)},
			{$this->parseValue($this->idElectronic)},
			{$this->parseValue($this->idPhone)},
			{$this->parseValue($this->idOther)},
			{$this->parseValue($this->fieldUploadTime)})
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
				id_car={$this->parseValue($this->idCar)},
				id_computer={$this->parseValue($this->idComputer)},
				id_house={$this->parseValue($this->idHouse)},
				id_household={$this->parseValue($this->idHousehold)},
				id_electronic={$this->parseValue($this->idElectronic)},
				id_phone={$this->parseValue($this->idPhone)},
				id_other={$this->parseValue($this->idOther)},
				field_upload_time={$this->parseValue($this->fieldUploadTime)}
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

}
?>
