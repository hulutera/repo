<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/classes/reflection/class.config.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/classes/reflection/HtUserAll.php';

/**
 * Class HtUtilAbuse
 * @extends MySqlRecord
 * @filesource HtUtilAbuse.php
*/

// namespace hulutera;

class HtUtilAbuse extends MySqlRecord
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
     * Class attribute for mapping the primary key id of table util_abuse
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
     * Class attribute for mapping table field id_category
     *
     * Comment for field id_category: Not specified.<br>
     * Field information:
     *  - Data type: int(40)
     *  - Null : NO
     *  - DB Index: MUL
     *  - Default: 
     *  - Extra:  
     * @var int $idCategory
     */
    private $idCategory;

    /**
     * Class attribute for mapping table field id_user
     *
     * Comment for field id_user: Not specified.<br>
     * Field information:
     *  - Data type: int(40)
     *  - Null : NO
     *  - DB Index: MUL
     *  - Default: 
     *  - Extra:  
     * @var int $idUser
     */
    private $idUser;

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
     * Class attribute for mapping table field id_phone
     *
     * Comment for field id_phone: Not specified.<br>
     * Field information:
     *  - Data type: int(40)
     *  - Null : YES
     *  - DB Index: MUL
     *  - Default: 
     *  - Extra:  
     * @var int $idPhone
     */
    private $idPhone;

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
     * Class attribute for mapping table field id_other
     *
     * Comment for field id_other: Not specified.<br>
     * Field information:
     *  - Data type: int(40)
     *  - Null : YES
     *  - DB Index: MUL
     *  - Default: 
     *  - Extra:  
     * @var int $idOther
     */
    private $idOther;

    /**
     * Class attribute for mapping table field field_message
     *
     * Comment for field field_message: Not specified.<br>
     * Field information:
     *  - Data type: varchar(255)
     *  - Null : YES
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var string $fieldMessage
     */
    private $fieldMessage;

    /**
     * Class attribute for mapping table field field_ip_address
     *
     * Comment for field field_ip_address: Not specified.<br>
     * Field information:
     *  - Data type: varchar(40)
     *  - Null : YES
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var string $fieldIpAddress
     */
    private $fieldIpAddress;

    /**
     * Class attribute for storing the SQL DDL of table util_abuse
     * @var string base64 encoded string for DDL
     */
    private $ddl = "Q1JFQVRFIFRBQkxFIGB1dGlsX2FidXNlYCAoCiAgYGlkYCBpbnQoNDApIE5PVCBOVUxMIEFVVE9fSU5DUkVNRU5ULAogIGBpZF9jYXRlZ29yeWAgaW50KDQwKSBOT1QgTlVMTCwKICBgaWRfdXNlcmAgaW50KDQwKSBOT1QgTlVMTCwKICBgaWRfY2FyYCBpbnQoNDApIERFRkFVTFQgTlVMTCwKICBgaWRfY29tcHV0ZXJgIGludCg0MCkgREVGQVVMVCBOVUxMLAogIGBpZF9lbGVjdHJvbmljYCBpbnQoNDApIERFRkFVTFQgTlVMTCwKICBgaWRfaG91c2VgIGludCg0MCkgREVGQVVMVCBOVUxMLAogIGBpZF9waG9uZWAgaW50KDQwKSBERUZBVUxUIE5VTEwsCiAgYGlkX2hvdXNlaG9sZGAgaW50KDQwKSBERUZBVUxUIE5VTEwsCiAgYGlkX290aGVyYCBpbnQoNDApIERFRkFVTFQgTlVMTCwKICBgZmllbGRfbWVzc2FnZWAgdmFyY2hhcigyNTUpIERFRkFVTFQgTlVMTCwKICBgZmllbGRfaXBfYWRkcmVzc2AgdmFyY2hhcig0MCkgREVGQVVMVCBOVUxMLAogIFBSSU1BUlkgS0VZIChgaWRgKSwKICBLRVkgYGFidXNlQ2F0ZWdvcnlJRGAgKGBpZF9jYXRlZ29yeWApLAogIEtFWSBgZWxlY3Ryb25pY3NJRGAgKGBpZF9lbGVjdHJvbmljYCksCiAgS0VZIGB1c2VySURgIChgaWRfdXNlcmApLAogIEtFWSBgaElEYCAoYGlkX2hvdXNlYCksCiAgS0VZIGBjSURgIChgaWRfY2FyYCksCiAgS0VZIGBkSURgIChgaWRfY29tcHV0ZXJgKSwKICBLRVkgYHBob25lSURgIChgaWRfcGhvbmVgKSwKICBLRVkgYGhvdXNlaG9sZElEYCAoYGlkX2hvdXNlaG9sZGApLAogIEtFWSBgIG90aGVyc0lEYCAoYGlkX290aGVyYCksCiAgQ09OU1RSQUlOVCBgdXRpbF9hYnVzZV9pYmZrXzFgIEZPUkVJR04gS0VZIChgaWRfY2FyYCkgUkVGRVJFTkNFUyBgaXRlbV9jYXJgIChgaWRgKSBPTiBERUxFVEUgQ0FTQ0FERSBPTiBVUERBVEUgQ0FTQ0FERSwKICBDT05TVFJBSU5UIGB1dGlsX2FidXNlX2liZmtfMmAgRk9SRUlHTiBLRVkgKGBpZF9jb21wdXRlcmApIFJFRkVSRU5DRVMgYGl0ZW1fY29tcHV0ZXJgIChgaWRgKSBPTiBERUxFVEUgQ0FTQ0FERSBPTiBVUERBVEUgQ0FTQ0FERSwKICBDT05TVFJBSU5UIGB1dGlsX2FidXNlX2liZmtfM2AgRk9SRUlHTiBLRVkgKGBpZF9waG9uZWApIFJFRkVSRU5DRVMgYGl0ZW1fcGhvbmVgIChgaWRgKSBPTiBERUxFVEUgQ0FTQ0FERSBPTiBVUERBVEUgQ0FTQ0FERSwKICBDT05TVFJBSU5UIGB1dGlsX2FidXNlX2liZmtfNGAgRk9SRUlHTiBLRVkgKGBpZF9ob3VzZWhvbGRgKSBSRUZFUkVOQ0VTIGBpdGVtX2hvdXNlaG9sZGAgKGBpZGApIE9OIERFTEVURSBDQVNDQURFIE9OIFVQREFURSBDQVNDQURFLAogIENPTlNUUkFJTlQgYHV0aWxfYWJ1c2VfaWJma181YCBGT1JFSUdOIEtFWSAoYGlkX290aGVyYCkgUkVGRVJFTkNFUyBgaXRlbV9vdGhlcmAgKGBpZGApIE9OIERFTEVURSBDQVNDQURFIE9OIFVQREFURSBDQVNDQURFLAogIENPTlNUUkFJTlQgYHV0aWxfYWJ1c2VfaWJma182YCBGT1JFSUdOIEtFWSAoYGlkX2NhdGVnb3J5YCkgUkVGRVJFTkNFUyBgY2F0ZWdvcnlfYWJ1c2VgIChgaWRgKSBPTiBERUxFVEUgQ0FTQ0FERSBPTiBVUERBVEUgQ0FTQ0FERSwKICBDT05TVFJBSU5UIGB1dGlsX2FidXNlX2liZmtfN2AgRk9SRUlHTiBLRVkgKGBpZF91c2VyYCkgUkVGRVJFTkNFUyBgdXNlcl9hbGxgIChgaWRgKSBPTiBERUxFVEUgQ0FTQ0FERSBPTiBVUERBVEUgQ0FTQ0FERSwKICBDT05TVFJBSU5UIGB1dGlsX2FidXNlX2liZmtfOGAgRk9SRUlHTiBLRVkgKGBpZF9lbGVjdHJvbmljYCkgUkVGRVJFTkNFUyBgaXRlbV9lbGVjdHJvbmljYCAoYGlkYCkgT04gREVMRVRFIENBU0NBREUgT04gVVBEQVRFIENBU0NBREUsCiAgQ09OU1RSQUlOVCBgdXRpbF9hYnVzZV9pYmZrXzlgIEZPUkVJR04gS0VZIChgaWRfaG91c2VgKSBSRUZFUkVOQ0VTIGBpdGVtX2hvdXNlYCAoYGlkYCkgT04gREVMRVRFIENBU0NBREUgT04gVVBEQVRFIENBU0NBREUKKSBFTkdJTkU9SW5ub0RCIERFRkFVTFQgQ0hBUlNFVD1sYXRpbjE=";

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
     * setIdCategory Sets the class attribute idCategory with a given value
     *
     * The attribute idCategory maps the field id_category defined as int(40).<br>
     * Comment for field id_category: Not specified.<br>
     * @param int $idCategory
     * @category Modifier
     */
    public function setIdCategory($idCategory)
    {
        $this->idCategory = (int)$idCategory;
    }

    /**
     * setIdUser Sets the class attribute idUser with a given value
     *
     * The attribute idUser maps the field id_user defined as int(40).<br>
     * Comment for field id_user: Not specified.<br>
     * @param int $idUser
     * @category Modifier
     */
    public function setIdUser($idUser)
    {
        $this->idUser = (int)$idUser;
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
     * setFieldMessage Sets the class attribute fieldMessage with a given value
     *
     * The attribute fieldMessage maps the field field_message defined as varchar(255).<br>
     * Comment for field field_message: Not specified.<br>
     * @param string $fieldMessage
     * @category Modifier
     */
    public function setFieldMessage($fieldMessage)
    {
        $this->fieldMessage = (string)$fieldMessage;
    }

    /**
     * setFieldIpAddress Sets the class attribute fieldIpAddress with a given value
     *
     * The attribute fieldIpAddress maps the field field_ip_address defined as varchar(40).<br>
     * Comment for field field_ip_address: Not specified.<br>
     * @param string $fieldIpAddress
     * @category Modifier
     */
    public function setFieldIpAddress($fieldIpAddress)
    {
        $this->fieldIpAddress = (string)$fieldIpAddress;
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
     * getIdCategory gets the class attribute idCategory value
     *
     * The attribute idCategory maps the field id_category defined as int(40).<br>
     * Comment for field id_category: Not specified.
     * @return int $idCategory
     * @category Accessor of $idCategory
     */
    public function getIdCategory()
    {
        return $this->idCategory;
    }

    /**
     * getIdUser gets the class attribute idUser value
     *
     * The attribute idUser maps the field id_user defined as int(40).<br>
     * Comment for field id_user: Not specified.
     * @return int $idUser
     * @category Accessor of $idUser
     */
    public function getIdUser()
    {
        return $this->idUser;
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
     * getFieldMessage gets the class attribute fieldMessage value
     *
     * The attribute fieldMessage maps the field field_message defined as varchar(255).<br>
     * Comment for field field_message: Not specified.
     * @return string $fieldMessage
     * @category Accessor of $fieldMessage
     */
    public function getFieldMessage()
    {
        return $this->fieldMessage;
    }

    /**
     * getFieldIpAddress gets the class attribute fieldIpAddress value
     *
     * The attribute fieldIpAddress maps the field field_ip_address defined as varchar(40).<br>
     * Comment for field field_ip_address: Not specified.
     * @return string $fieldIpAddress
     * @category Accessor of $fieldIpAddress
     */
    public function getFieldIpAddress()
    {
        return $this->fieldIpAddress;
    }

    /**
     * Gets DDL SQL code of the table util_abuse
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
        return "util_abuse";
    }

    /**
     * The HtUtilAbuse constructor
     *
     * It creates and initializes an object in two way:
     *  - with null (not fetched) data if none $id is given.
     *  - with a fetched data row from the table util_abuse having id=$id
     * @param int $id. If omitted an empty (not fetched) instance is created.
     * @return HtUtilAbuse Object
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
     * Fetchs a table row of util_abuse into the object.
     *
     * Fetched table fields values are assigned to class attributes and they can be managed by using
     * the accessors/modifiers methods of the class.
     * @param int $id the primary key id value of table util_abuse which identifies the row to select.
     * @return int affected selected row
     * @category DML
     */
    public function select($id)
    {
        if($id == "*"){
            $sql = "SELECT * FROM util_abuse";
        } else { //id
            $sql =  "SELECT * FROM util_abuse WHERE id={$this->parseValue($id,'int')}";
        }

        $this->resetLastSqlError();
        $result =  $this->query($sql);
        $this->resultSet=$result;
        $this->lastSql = $sql;
        if ($result){
            $rowObject = $result->fetch_object();
            @$this->id = (integer)$rowObject->id;
            @$this->idCategory = (integer)$rowObject->id_category;
            @$this->idUser = (integer)$rowObject->id_user;
            @$this->idCar = (integer)$rowObject->id_car;
            @$this->idComputer = (integer)$rowObject->id_computer;
            @$this->idElectronic = (integer)$rowObject->id_electronic;
            @$this->idHouse = (integer)$rowObject->id_house;
            @$this->idPhone = (integer)$rowObject->id_phone;
            @$this->idHousehold = (integer)$rowObject->id_household;
            @$this->idOther = (integer)$rowObject->id_other;
            @$this->fieldMessage = $this->replaceAposBackSlash($rowObject->field_message);
            @$this->fieldIpAddress = $this->replaceAposBackSlash($rowObject->field_ip_address);
            $this->allowUpdate = true;
        } else {
            $this->lastSqlError = $this->sqlstate . " - ". $this->error;
        }
        return $this->affected_rows;
        
    }

    /**
     * Deletes a specific row from the table util_abuse
     * @param int $id the primary key id value of table util_abuse which identifies the row to delete.
     * @return int affected deleted row
     * @category DML
     */
    public function delete($id)
    {
        $sql = "DELETE FROM util_abuse WHERE id={$this->parseValue($id,'int')}";
        $this->resetLastSqlError();
        
        $this->set_charset('utf8');
        $this->query('SET NAMES utf8');
        $result = $this->query($sql);
        $this->lastSql = $sql;
        if (!$result) {
            $this->lastSqlError = $this->sqlstate . " - ". $this->error;
        }
        return $this->affected_rows;
    }

    /**
     * Insert the current object into a new table row of util_abuse
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
            INSERT INTO util_abuse
            (id_category,id_user,id_car,id_computer,id_electronic,id_house,id_phone,id_household,id_other,field_message,field_ip_address)
            VALUES(
			{$this->parseValue($this->idCategory)},
			{$this->parseValue($this->idUser)},
			{$this->parseValue($this->idCar)},
			{$this->parseValue($this->idComputer)},
			{$this->parseValue($this->idElectronic)},
			{$this->parseValue($this->idHouse)},
			{$this->parseValue($this->idPhone)},
			{$this->parseValue($this->idHousehold)},
			{$this->parseValue($this->idOther)},
			{$this->parseValue($this->fieldMessage,'notNumber')},
			{$this->parseValue($this->fieldIpAddress,'notNumber')})
SQL;
        $this->resetLastSqlError();
        
        $this->set_charset('utf8');
        $this->query('SET NAMES utf8');
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
     * Updates a specific row from the table util_abuse with the values of the current object.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating of selected row.<br>
     * Null values are used for all attributes not previously setted.
     * @param int $id the primary key id value of table util_abuse which identifies the row to update.
     * @return mixed MySQL update result
     * @category DML
     */
    public function update($id)
    {
        // $constants = get_defined_constants();
        if ($this->allowUpdate) {
            $sql = <<< SQL
            UPDATE
                util_abuse
            SET 
				id_category={$this->parseValue($this->idCategory)},
				id_user={$this->parseValue($this->idUser)},
				id_car={$this->parseValue($this->idCar)},
				id_computer={$this->parseValue($this->idComputer)},
				id_electronic={$this->parseValue($this->idElectronic)},
				id_house={$this->parseValue($this->idHouse)},
				id_phone={$this->parseValue($this->idPhone)},
				id_household={$this->parseValue($this->idHousehold)},
				id_other={$this->parseValue($this->idOther)},
				field_message={$this->parseValue($this->fieldMessage,'notNumber')},
				field_ip_address={$this->parseValue($this->fieldIpAddress,'notNumber')}
            WHERE
                id={$this->parseValue($id,'int')}
SQL;
            $this->resetLastSqlError();
            
        $this->set_charset('utf8');
        $this->query('SET NAMES utf8');
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
     * Facility for updating a row of util_abuse previously loaded.
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
    * Facility for display a row for util_abuse previously loaded.
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
    * Facility for upload a new row into util_abuse.
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
