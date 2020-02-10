<?php
global $documnetRootPath;

require_once $documnetRootPath . "/classes/reflection/class.config.php";


/**
 * Class HtUserTemp
 * @extends MySqlRecord
 * @filesource HtUserTemp.php
*/

// namespace hulutera;

class HtUserTemp extends MySqlRecord
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
     * Class attribute for mapping the primary key id of table user_temp
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
     * Class attribute for mapping table field field_user_name
     *
     * Comment for field field_user_name: Not specified.<br>
     * Field information:
     *  - Data type: varchar(50)
     *  - Null : NO
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var string $fieldUserName
     */
    private $fieldUserName;

    /**
     * Class attribute for mapping table field field_first_name
     *
     * Comment for field field_first_name: Not specified.<br>
     * Field information:
     *  - Data type: varchar(40)
     *  - Null : YES
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var string $fieldFirstName
     */
    private $fieldFirstName;

    /**
     * Class attribute for mapping table field field_last_name
     *
     * Comment for field field_last_name: Not specified.<br>
     * Field information:
     *  - Data type: varchar(40)
     *  - Null : YES
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var string $fieldLastName
     */
    private $fieldLastName;

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
     * Class attribute for mapping table field field_phone_nr
     *
     * Comment for field field_phone_nr: Not specified.<br>
     * Field information:
     *  - Data type: varchar(40)
     *  - Null : NO
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var string $fieldPhoneNr
     */
    private $fieldPhoneNr;

    /**
     * Class attribute for mapping table field field_address
     *
     * Comment for field field_address: Not specified.<br>
     * Field information:
     *  - Data type: varchar(40)
     *  - Null : YES
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var string $fieldAddress
     */
    private $fieldAddress;

    /**
     * Class attribute for mapping table field field_password
     *
     * Comment for field field_password: Not specified.<br>
     * Field information:
     *  - Data type: varchar(100)
     *  - Null : NO
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var string $fieldPassword
     */
    private $fieldPassword;

    /**
     * Class attribute for mapping table field field_privilege
     *
     * Comment for field field_privilege: Not specified.<br>
     * Field information:
     *  - Data type: varchar(40)
     *  - Null : NO
     *  - DB Index: 
     *  - Default: user
     *  - Extra:  
     * @var string $fieldPrivilege
     */
    private $fieldPrivilege;

    /**
     * Class attribute for mapping table field field_contact_method
     *
     * Comment for field field_contact_method: Not specified.<br>
     * Field information:
     *  - Data type: varchar(40)
     *  - Null : NO
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var string $fieldContactMethod
     */
    private $fieldContactMethod;

    /**
     * Class attribute for mapping table field field_term_and_condition
     *
     * Comment for field field_term_and_condition: Not specified.<br>
     * Field information:
     *  - Data type: tinyint(1)
     *  - Null : NO
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var int $fieldTermAndCondition
     */
    private $fieldTermAndCondition;

    /**
     * Class attribute for mapping table field field_register_date
     *
     * Comment for field field_register_date: Not specified.<br>
     * Field information:
     *  - Data type: timestamp
     *  - Null : NO
     *  - DB Index: 
     *  - Default: CURRENT_TIMESTAMP
     *  - Extra:  on update CURRENT_TIMESTAMP
     * @var string $fieldRegisterDate
     */
    private $fieldRegisterDate;

    /**
     * Class attribute for mapping table field field_new_password
     *
     * Comment for field field_new_password: Not specified.<br>
     * Field information:
     *  - Data type: varchar(100)
     *  - Null : YES
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var string $fieldNewPassword
     */
    private $fieldNewPassword;

    /**
     * Class attribute for mapping table field field_activation
     *
     * Comment for field field_activation: Not specified.<br>
     * Field information:
     *  - Data type: varchar(60)
     *  - Null : YES
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var string $fieldActivation
     */
    private $fieldActivation;

    /**
     * Class attribute for storing the SQL DDL of table user_temp
     * @var string base64 encoded string for DDL
     */
    private $ddl = "Q1JFQVRFIFRBQkxFIGB1c2VyX3RlbXBgICgKICBgaWRgIGludCg0MCkgTk9UIE5VTEwgQVVUT19JTkNSRU1FTlQsCiAgYGZpZWxkX3VzZXJfbmFtZWAgdmFyY2hhcig1MCkgTk9UIE5VTEwsCiAgYGZpZWxkX2ZpcnN0X25hbWVgIHZhcmNoYXIoNDApIERFRkFVTFQgTlVMTCwKICBgZmllbGRfbGFzdF9uYW1lYCB2YXJjaGFyKDQwKSBERUZBVUxUIE5VTEwsCiAgYGZpZWxkX2VtYWlsYCB2YXJjaGFyKDQwKSBOT1QgTlVMTCBERUZBVUxUICcnLAogIGBmaWVsZF9waG9uZV9ucmAgdmFyY2hhcig0MCkgTk9UIE5VTEwsCiAgYGZpZWxkX2FkZHJlc3NgIHZhcmNoYXIoNDApIERFRkFVTFQgTlVMTCwKICBgZmllbGRfcGFzc3dvcmRgIHZhcmNoYXIoMTAwKSBOT1QgTlVMTCBERUZBVUxUICcnLAogIGBmaWVsZF9wcml2aWxlZ2VgIHZhcmNoYXIoNDApIE5PVCBOVUxMIERFRkFVTFQgJ3VzZXInLAogIGBmaWVsZF9jb250YWN0X21ldGhvZGAgdmFyY2hhcig0MCkgTk9UIE5VTEwsCiAgYGZpZWxkX3Rlcm1fYW5kX2NvbmRpdGlvbmAgdGlueWludCgxKSBOT1QgTlVMTCwKICBgZmllbGRfcmVnaXN0ZXJfZGF0ZWAgdGltZXN0YW1wIE5PVCBOVUxMIERFRkFVTFQgQ1VSUkVOVF9USU1FU1RBTVAgT04gVVBEQVRFIENVUlJFTlRfVElNRVNUQU1QLAogIGBmaWVsZF9uZXdfcGFzc3dvcmRgIHZhcmNoYXIoMTAwKSBERUZBVUxUIE5VTEwsCiAgYGZpZWxkX2FjdGl2YXRpb25gIHZhcmNoYXIoNjApIERFRkFVTFQgTlVMTCwKICBQUklNQVJZIEtFWSAoYGlkYCkKKSBFTkdJTkU9SW5ub0RCIERFRkFVTFQgQ0hBUlNFVD1sYXRpbjE=";

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
     * setFieldUserName Sets the class attribute fieldUserName with a given value
     *
     * The attribute fieldUserName maps the field field_user_name defined as varchar(50).<br>
     * Comment for field field_user_name: Not specified.<br>
     * @param string $fieldUserName
     * @category Modifier
     */
    public function setFieldUserName($fieldUserName)
    {
        $this->fieldUserName = (string)$fieldUserName;
    }

    /**
     * setFieldFirstName Sets the class attribute fieldFirstName with a given value
     *
     * The attribute fieldFirstName maps the field field_first_name defined as varchar(40).<br>
     * Comment for field field_first_name: Not specified.<br>
     * @param string $fieldFirstName
     * @category Modifier
     */
    public function setFieldFirstName($fieldFirstName)
    {
        $this->fieldFirstName = (string)$fieldFirstName;
    }

    /**
     * setFieldLastName Sets the class attribute fieldLastName with a given value
     *
     * The attribute fieldLastName maps the field field_last_name defined as varchar(40).<br>
     * Comment for field field_last_name: Not specified.<br>
     * @param string $fieldLastName
     * @category Modifier
     */
    public function setFieldLastName($fieldLastName)
    {
        $this->fieldLastName = (string)$fieldLastName;
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
        $this->fieldEmail = (string)$fieldEmail;
    }

    /**
     * setFieldPhoneNr Sets the class attribute fieldPhoneNr with a given value
     *
     * The attribute fieldPhoneNr maps the field field_phone_nr defined as varchar(40).<br>
     * Comment for field field_phone_nr: Not specified.<br>
     * @param string $fieldPhoneNr
     * @category Modifier
     */
    public function setFieldPhoneNr($fieldPhoneNr)
    {
        $this->fieldPhoneNr = (string)$fieldPhoneNr;
    }

    /**
     * setFieldAddress Sets the class attribute fieldAddress with a given value
     *
     * The attribute fieldAddress maps the field field_address defined as varchar(40).<br>
     * Comment for field field_address: Not specified.<br>
     * @param string $fieldAddress
     * @category Modifier
     */
    public function setFieldAddress($fieldAddress)
    {
        $this->fieldAddress = (string)$fieldAddress;
    }

    /**
     * setFieldPassword Sets the class attribute fieldPassword with a given value
     *
     * The attribute fieldPassword maps the field field_password defined as varchar(100).<br>
     * Comment for field field_password: Not specified.<br>
     * @param string $fieldPassword
     * @category Modifier
     */
    public function setFieldPassword($fieldPassword)
    {
        $this->fieldPassword = (string)$fieldPassword;
    }

    /**
     * setFieldPrivilege Sets the class attribute fieldPrivilege with a given value
     *
     * The attribute fieldPrivilege maps the field field_privilege defined as varchar(40).<br>
     * Comment for field field_privilege: Not specified.<br>
     * @param string $fieldPrivilege
     * @category Modifier
     */
    public function setFieldPrivilege($fieldPrivilege)
    {
        $this->fieldPrivilege = (string)$fieldPrivilege;
    }

    /**
     * setFieldContactMethod Sets the class attribute fieldContactMethod with a given value
     *
     * The attribute fieldContactMethod maps the field field_contact_method defined as varchar(40).<br>
     * Comment for field field_contact_method: Not specified.<br>
     * @param string $fieldContactMethod
     * @category Modifier
     */
    public function setFieldContactMethod($fieldContactMethod)
    {
        $this->fieldContactMethod = (string)$fieldContactMethod;
    }

    /**
     * setFieldTermAndCondition Sets the class attribute fieldTermAndCondition with a given value
     *
     * The attribute fieldTermAndCondition maps the field field_term_and_condition defined as tinyint(1).<br>
     * Comment for field field_term_and_condition: Not specified.<br>
     * @param int $fieldTermAndCondition
     * @category Modifier
     */
    public function setFieldTermAndCondition($fieldTermAndCondition)
    {
        $this->fieldTermAndCondition = (int)$fieldTermAndCondition;
    }

    /**
     * setFieldRegisterDate Sets the class attribute fieldRegisterDate with a given value
     *
     * The attribute fieldRegisterDate maps the field field_register_date defined as timestamp.<br>
     * Comment for field field_register_date: Not specified.<br>
     * @param string $fieldRegisterDate
     * @category Modifier
     */
    public function setFieldRegisterDate($fieldRegisterDate)
    {
        $this->fieldRegisterDate = (string)$fieldRegisterDate;
    }

    /**
     * setFieldNewPassword Sets the class attribute fieldNewPassword with a given value
     *
     * The attribute fieldNewPassword maps the field field_new_password defined as varchar(100).<br>
     * Comment for field field_new_password: Not specified.<br>
     * @param string $fieldNewPassword
     * @category Modifier
     */
    public function setFieldNewPassword($fieldNewPassword)
    {
        $this->fieldNewPassword = (string)$fieldNewPassword;
    }

    /**
     * setFieldActivation Sets the class attribute fieldActivation with a given value
     *
     * The attribute fieldActivation maps the field field_activation defined as varchar(60).<br>
     * Comment for field field_activation: Not specified.<br>
     * @param string $fieldActivation
     * @category Modifier
     */
    public function setFieldActivation($fieldActivation)
    {
        $this->fieldActivation = (string)$fieldActivation;
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
     * getFieldUserName gets the class attribute fieldUserName value
     *
     * The attribute fieldUserName maps the field field_user_name defined as varchar(50).<br>
     * Comment for field field_user_name: Not specified.
     * @return string $fieldUserName
     * @category Accessor of $fieldUserName
     */
    public function getFieldUserName()
    {
        return $this->fieldUserName;
    }

    /**
     * getFieldFirstName gets the class attribute fieldFirstName value
     *
     * The attribute fieldFirstName maps the field field_first_name defined as varchar(40).<br>
     * Comment for field field_first_name: Not specified.
     * @return string $fieldFirstName
     * @category Accessor of $fieldFirstName
     */
    public function getFieldFirstName()
    {
        return $this->fieldFirstName;
    }

    /**
     * getFieldLastName gets the class attribute fieldLastName value
     *
     * The attribute fieldLastName maps the field field_last_name defined as varchar(40).<br>
     * Comment for field field_last_name: Not specified.
     * @return string $fieldLastName
     * @category Accessor of $fieldLastName
     */
    public function getFieldLastName()
    {
        return $this->fieldLastName;
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
     * getFieldPhoneNr gets the class attribute fieldPhoneNr value
     *
     * The attribute fieldPhoneNr maps the field field_phone_nr defined as varchar(40).<br>
     * Comment for field field_phone_nr: Not specified.
     * @return string $fieldPhoneNr
     * @category Accessor of $fieldPhoneNr
     */
    public function getFieldPhoneNr()
    {
        return $this->fieldPhoneNr;
    }

    /**
     * getFieldAddress gets the class attribute fieldAddress value
     *
     * The attribute fieldAddress maps the field field_address defined as varchar(40).<br>
     * Comment for field field_address: Not specified.
     * @return string $fieldAddress
     * @category Accessor of $fieldAddress
     */
    public function getFieldAddress()
    {
        return $this->fieldAddress;
    }

    /**
     * getFieldPassword gets the class attribute fieldPassword value
     *
     * The attribute fieldPassword maps the field field_password defined as varchar(100).<br>
     * Comment for field field_password: Not specified.
     * @return string $fieldPassword
     * @category Accessor of $fieldPassword
     */
    public function getFieldPassword()
    {
        return $this->fieldPassword;
    }

    /**
     * getFieldPrivilege gets the class attribute fieldPrivilege value
     *
     * The attribute fieldPrivilege maps the field field_privilege defined as varchar(40).<br>
     * Comment for field field_privilege: Not specified.
     * @return string $fieldPrivilege
     * @category Accessor of $fieldPrivilege
     */
    public function getFieldPrivilege()
    {
        return $this->fieldPrivilege;
    }

    /**
     * getFieldContactMethod gets the class attribute fieldContactMethod value
     *
     * The attribute fieldContactMethod maps the field field_contact_method defined as varchar(40).<br>
     * Comment for field field_contact_method: Not specified.
     * @return string $fieldContactMethod
     * @category Accessor of $fieldContactMethod
     */
    public function getFieldContactMethod()
    {
        return $this->fieldContactMethod;
    }

    /**
     * getFieldTermAndCondition gets the class attribute fieldTermAndCondition value
     *
     * The attribute fieldTermAndCondition maps the field field_term_and_condition defined as tinyint(1).<br>
     * Comment for field field_term_and_condition: Not specified.
     * @return int $fieldTermAndCondition
     * @category Accessor of $fieldTermAndCondition
     */
    public function getFieldTermAndCondition()
    {
        return $this->fieldTermAndCondition;
    }

    /**
     * getFieldRegisterDate gets the class attribute fieldRegisterDate value
     *
     * The attribute fieldRegisterDate maps the field field_register_date defined as timestamp.<br>
     * Comment for field field_register_date: Not specified.
     * @return string $fieldRegisterDate
     * @category Accessor of $fieldRegisterDate
     */
    public function getFieldRegisterDate()
    {
        return $this->fieldRegisterDate;
    }

    /**
     * getFieldNewPassword gets the class attribute fieldNewPassword value
     *
     * The attribute fieldNewPassword maps the field field_new_password defined as varchar(100).<br>
     * Comment for field field_new_password: Not specified.
     * @return string $fieldNewPassword
     * @category Accessor of $fieldNewPassword
     */
    public function getFieldNewPassword()
    {
        return $this->fieldNewPassword;
    }

    /**
     * getFieldActivation gets the class attribute fieldActivation value
     *
     * The attribute fieldActivation maps the field field_activation defined as varchar(60).<br>
     * Comment for field field_activation: Not specified.
     * @return string $fieldActivation
     * @category Accessor of $fieldActivation
     */
    public function getFieldActivation()
    {
        return $this->fieldActivation;
    }

    /**
     * Gets DDL SQL code of the table user_temp
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
        return "user_temp";
    }

    /**
     * The HtUserTemp constructor
     *
     * It creates and initializes an object in two way:
     *  - with null (not fetched) data if none $id is given.
     *  - with a fetched data row from the table user_temp having id=$id
     * @param int $id. If omitted an empty (not fetched) instance is created.
     * @return HtUserTemp Object
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
     * Fetchs a table row of user_temp into the object.
     *
     * Fetched table fields values are assigned to class attributes and they can be managed by using
     * the accessors/modifiers methods of the class.
     * @param int $id the primary key id value of table user_temp which identifies the row to select.
     * @return int affected selected row
     * @category DML
     */
    public function select($id)
    {
        $sql =  "SELECT * FROM user_temp WHERE id={$this->parseValue($id,'int')}";
        $this->resetLastSqlError();
        $result =  $this->query($sql);
        $this->resultSet=$result;
        $this->lastSql = $sql;
        if ($result){
            $rowObject = $result->fetch_object();
            @$this->id = (integer)$rowObject->id;
            @$this->fieldUserName = $this->replaceAposBackSlash($rowObject->field_user_name);
            @$this->fieldFirstName = $this->replaceAposBackSlash($rowObject->field_first_name);
            @$this->fieldLastName = $this->replaceAposBackSlash($rowObject->field_last_name);
            @$this->fieldEmail = $this->replaceAposBackSlash($rowObject->field_email);
            @$this->fieldPhoneNr = $this->replaceAposBackSlash($rowObject->field_phone_nr);
            @$this->fieldAddress = $this->replaceAposBackSlash($rowObject->field_address);
            @$this->fieldPassword = $this->replaceAposBackSlash($rowObject->field_password);
            @$this->fieldPrivilege = $this->replaceAposBackSlash($rowObject->field_privilege);
            @$this->fieldContactMethod = $this->replaceAposBackSlash($rowObject->field_contact_method);
            @$this->fieldTermAndCondition = (integer)$rowObject->field_term_and_condition;
            @$this->fieldRegisterDate = $rowObject->field_register_date;
            @$this->fieldNewPassword = $this->replaceAposBackSlash($rowObject->field_new_password);
            @$this->fieldActivation = $this->replaceAposBackSlash($rowObject->field_activation);
            $this->allowUpdate = true;
        } else {
            $this->lastSqlError = $this->sqlstate . " - ". $this->error;
        }
        return $this->affected_rows;
    }

    /**
     * Deletes a specific row from the table user_temp
     * @param int $id the primary key id value of table user_temp which identifies the row to delete.
     * @return int affected deleted row
     * @category DML
     */
    public function delete($id)
    {
        $sql = "DELETE FROM user_temp WHERE id={$this->parseValue($id,'int')}";
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->lastSql = $sql;
        if (!$result) {
            $this->lastSqlError = $this->sqlstate . " - ". $this->error;
        }
        return $this->affected_rows;
    }

    /**
     * Insert the current object into a new table row of user_temp
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
            INSERT INTO user_temp
            (field_user_name,field_first_name,field_last_name,field_email,field_phone_nr,field_address,field_password,field_privilege,field_contact_method,field_term_and_condition,field_register_date,field_new_password,field_activation)
            VALUES(
			{$this->parseValue($this->fieldUserName,'notNumber')},
			{$this->parseValue($this->fieldFirstName,'notNumber')},
			{$this->parseValue($this->fieldLastName,'notNumber')},
			{$this->parseValue($this->fieldEmail,'notNumber')},
			{$this->parseValue($this->fieldPhoneNr,'notNumber')},
			{$this->parseValue($this->fieldAddress,'notNumber')},
			{$this->parseValue($this->fieldPassword,'notNumber')},
			{$this->parseValue($this->fieldPrivilege,'notNumber')},
			{$this->parseValue($this->fieldContactMethod,'notNumber')},
			{$this->parseValue($this->fieldTermAndCondition)},
			{$this->parseValue($this->fieldRegisterDate,'notNumber')},
			{$this->parseValue($this->fieldNewPassword,'notNumber')},
			{$this->parseValue($this->fieldActivation,'notNumber')})
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
     * Updates a specific row from the table user_temp with the values of the current object.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating of selected row.<br>
     * Null values are used for all attributes not previously setted.
     * @param int $id the primary key id value of table user_temp which identifies the row to update.
     * @return mixed MySQL update result
     * @category DML
     */
    public function update($id)
    {
        // $constants = get_defined_constants();
        if ($this->allowUpdate) {
            $sql = <<< SQL
            UPDATE
                user_temp
            SET 
				field_user_name={$this->parseValue($this->fieldUserName,'notNumber')},
				field_first_name={$this->parseValue($this->fieldFirstName,'notNumber')},
				field_last_name={$this->parseValue($this->fieldLastName,'notNumber')},
				field_email={$this->parseValue($this->fieldEmail,'notNumber')},
				field_phone_nr={$this->parseValue($this->fieldPhoneNr,'notNumber')},
				field_address={$this->parseValue($this->fieldAddress,'notNumber')},
				field_password={$this->parseValue($this->fieldPassword,'notNumber')},
				field_privilege={$this->parseValue($this->fieldPrivilege,'notNumber')},
				field_contact_method={$this->parseValue($this->fieldContactMethod,'notNumber')},
				field_term_and_condition={$this->parseValue($this->fieldTermAndCondition)},
				field_register_date={$this->parseValue($this->fieldRegisterDate,'notNumber')},
				field_new_password={$this->parseValue($this->fieldNewPassword,'notNumber')},
				field_activation={$this->parseValue($this->fieldActivation,'notNumber')}
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
     * Facility for updating a row of user_temp previously loaded.
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
