<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/classes/reflection/class.config.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/classes/reflection/HtUserAll.php';

/**
 * Class HtUserAll
 * @extends MySqlRecord
 * @filesource HtUserAll.php
 */

// namespace hulutera;

class HtUserAll extends MySqlRecord
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
     * Class attribute for mapping the primary key id of table user_all
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
     * Class attribute for storing the SQL DDL of table user_all
     * @var string base64 encoded string for DDL
     */
    private $ddl = "Q1JFQVRFIFRBQkxFIGB1c2VyX2FsbGAgKAogIGBpZGAgaW50KDQwKSBOT1QgTlVMTCBBVVRPX0lOQ1JFTUVOVCwKICBgZmllbGRfdXNlcl9uYW1lYCB2YXJjaGFyKDUwKSBOT1QgTlVMTCwKICBgZmllbGRfZmlyc3RfbmFtZWAgdmFyY2hhcig0MCkgREVGQVVMVCBOVUxMLAogIGBmaWVsZF9sYXN0X25hbWVgIHZhcmNoYXIoNDApIERFRkFVTFQgTlVMTCwKICBgZmllbGRfZW1haWxgIHZhcmNoYXIoNDApIE5PVCBOVUxMIERFRkFVTFQgJycsCiAgYGZpZWxkX3Bob25lX25yYCB2YXJjaGFyKDQwKSBOT1QgTlVMTCwKICBgZmllbGRfYWRkcmVzc2AgdmFyY2hhcig0MCkgREVGQVVMVCBOVUxMLAogIGBmaWVsZF9wYXNzd29yZGAgdmFyY2hhcigxMDApIE5PVCBOVUxMIERFRkFVTFQgJycsCiAgYGZpZWxkX3ByaXZpbGVnZWAgdmFyY2hhcig0MCkgTk9UIE5VTEwgREVGQVVMVCAndXNlcicsCiAgYGZpZWxkX2NvbnRhY3RfbWV0aG9kYCB2YXJjaGFyKDQwKSBOT1QgTlVMTCwKICBgZmllbGRfdGVybV9hbmRfY29uZGl0aW9uYCB0aW55aW50KDEpIE5PVCBOVUxMLAogIGBmaWVsZF9yZWdpc3Rlcl9kYXRlYCB0aW1lc3RhbXAgTk9UIE5VTEwgREVGQVVMVCBDVVJSRU5UX1RJTUVTVEFNUCBPTiBVUERBVEUgQ1VSUkVOVF9USU1FU1RBTVAsCiAgYGZpZWxkX25ld19wYXNzd29yZGAgdmFyY2hhcigxMDApIERFRkFVTFQgTlVMTCwKICBgZmllbGRfYWN0aXZhdGlvbmAgdmFyY2hhcig2MCkgREVGQVVMVCBOVUxMLAogIFBSSU1BUlkgS0VZIChgaWRgKQopIEVOR0lORT1Jbm5vREIgQVVUT19JTkNSRU1FTlQ9MTIgREVGQVVMVCBDSEFSU0VUPWxhdGluMQ==";

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
     * setFieldUserName Sets the class attribute fieldUserName with a given value
     *
     * The attribute fieldUserName maps the field field_user_name defined as varchar(50).<br>
     * Comment for field field_user_name: Not specified.<br>
     * @param string $fieldUserName
     * @category Modifier
     */
    public function setFieldUserName($fieldUserName)
    {
        $this->fieldUserName = (string) $fieldUserName;
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
        $this->fieldFirstName = (string) $fieldFirstName;
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
        $this->fieldLastName = (string) $fieldLastName;
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
     * setFieldPhoneNr Sets the class attribute fieldPhoneNr with a given value
     *
     * The attribute fieldPhoneNr maps the field field_phone_nr defined as varchar(40).<br>
     * Comment for field field_phone_nr: Not specified.<br>
     * @param string $fieldPhoneNr
     * @category Modifier
     */
    public function setFieldPhoneNr($fieldPhoneNr)
    {
        $this->fieldPhoneNr = (string) $fieldPhoneNr;
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
        $this->fieldAddress = (string) $fieldAddress;
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
        $crypto = new Cryptor();
        $cryptoPassword = base64_encode($crypto->encryptor($fieldPassword));
        $this->fieldPassword = (string) $cryptoPassword;
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
        $this->fieldPrivilege = (string) $fieldPrivilege;
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
        $this->fieldContactMethod = (string) $fieldContactMethod;
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
        $this->fieldTermAndCondition = (int) $fieldTermAndCondition;
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
        $this->fieldRegisterDate = (string) $fieldRegisterDate;
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
        $this->fieldNewPassword = (string) $fieldNewPassword;
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
        $this->fieldActivation = (string) $fieldActivation;
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
        $crypto = new Cryptor();
        return  $crypto->decryptor(base64_decode($this->fieldPassword));
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
     * Gets DDL SQL code of the table user_all
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
        return "user_all";
    }

    /**
     * The HtUserAll constructor
     *
     * It creates and initializes an object in two way:
     *  - with null (not fetched) data if none $id is given.
     *  - with a fetched data row from the table user_all having id=$id
     * @param int $id. If omitted an empty (not fetched) instance is created.
     * @return HtUserAll Object
     */
    public function __construct($input = [])
    {
        parent::__construct();
        if (is_array($input) && sizeof($input) !== 0) {
            $this->select($input);
        } else if (!empty($input)) {
            $this->select($input);
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
     * Fetchs a table row of user_all into the object.
     *
     * Fetched table fields values are assigned to class attributes and they can be managed by using
     * the accessors/modifiers methods of the class.
     * @param int $id the primary key id value of table user_all which identifies the row to select.
     * @return int affected selected row
     * @category DML
     */
    public function select($input)
    {
        if (is_array($input)) {
            $sql = $input['sql'];
        } else {
            if ($input == "*") {
                $sql = "SELECT * FROM user_all";
            } else { //id
                $sql =  "SELECT * FROM user_all WHERE id={$this->parseValue($input, 'int')}";
            }
        }

        $this->resetLastSqlError();
        $result =  $this->query($sql);
        $this->resultSet = $result;
        $this->lastSql = $sql;
        if ($result) {
            $rowObject = $result->fetch_object();
            @$this->id = (int) $rowObject->id;
            @$this->fieldUserName = $this->replaceAposBackSlash($rowObject->field_user_name);
            @$this->fieldFirstName = $this->replaceAposBackSlash($rowObject->field_first_name);
            @$this->fieldLastName = $this->replaceAposBackSlash($rowObject->field_last_name);
            @$this->fieldEmail = $this->replaceAposBackSlash($rowObject->field_email);
            @$this->fieldPhoneNr = $this->replaceAposBackSlash($rowObject->field_phone_nr);
            @$this->fieldAddress = $this->replaceAposBackSlash($rowObject->field_address);
            @$this->fieldPassword = $this->replaceAposBackSlash($rowObject->field_password);
            @$this->fieldPrivilege = $this->replaceAposBackSlash($rowObject->field_privilege);
            @$this->fieldContactMethod = $this->replaceAposBackSlash($rowObject->field_contact_method);
            @$this->fieldTermAndCondition = (int) $rowObject->field_term_and_condition;
            @$this->fieldRegisterDate = $rowObject->field_register_date;
            @$this->fieldNewPassword = $this->replaceAposBackSlash($rowObject->field_new_password);
            @$this->fieldActivation = $this->replaceAposBackSlash($rowObject->field_activation);
            $this->allowUpdate = true;
        } else {
            $this->lastSqlError = $this->sqlstate . " - " . $this->error;
        }
        return $this->affected_rows;
    }


    /**
     * Deletes a specific row from the table user_all
     * @param int $id the primary key id value of table user_all which identifies the row to delete.
     * @return int affected deleted row
     * @category DML
     */
    public function delete($id)
    {
        $sql = "DELETE FROM user_all WHERE id={$this->parseValue($id, 'int')}";
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->lastSql = $sql;
        if (!$result) {
            $this->lastSqlError = $this->sqlstate . " - " . $this->error;
        }
        return $this->affected_rows;
    }

    /**
     * Insert the current object into a new table row of user_all
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
            INSERT INTO user_all
            (field_user_name,field_first_name,field_last_name,field_email,field_phone_nr,field_address,field_password,field_privilege,field_contact_method,field_term_and_condition,field_register_date,field_new_password,field_activation)
            VALUES(
			{$this->parseValue($this->fieldUserName, 'notNumber')},
			{$this->parseValue($this->fieldFirstName, 'notNumber')},
			{$this->parseValue($this->fieldLastName, 'notNumber')},
			{$this->parseValue($this->fieldEmail, 'notNumber')},
			{$this->parseValue($this->fieldPhoneNr, 'notNumber')},
			{$this->parseValue($this->fieldAddress, 'notNumber')},
			{$this->parseValue($this->fieldPassword, 'notNumber')},
			{$this->parseValue($this->fieldPrivilege, 'notNumber')},
			{$this->parseValue($this->fieldContactMethod, 'notNumber')},
			{$this->parseValue($this->fieldTermAndCondition)},
			{$this->parseValue($this->fieldRegisterDate, 'notNumber')},
			{$this->parseValue($this->fieldNewPassword, 'notNumber')},
			{$this->parseValue($this->fieldActivation, 'notNumber')})
SQL;
        $this->resetLastSqlError();
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
     * Updates a specific row from the table user_all with the values of the current object.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating of selected row.<br>
     * Null values are used for all attributes not previously setted.
     * @param int $id the primary key id value of table user_all which identifies the row to update.
     * @return mixed MySQL update result
     * @category DML
     */
    public function update($id)
    {
        // $constants = get_defined_constants();
        if ($this->allowUpdate) {
            $sql = <<< SQL
            UPDATE
                user_all
            SET 
				field_user_name={$this->parseValue($this->fieldUserName, 'notNumber')},
				field_first_name={$this->parseValue($this->fieldFirstName, 'notNumber')},
				field_last_name={$this->parseValue($this->fieldLastName, 'notNumber')},
				field_email={$this->parseValue($this->fieldEmail, 'notNumber')},
				field_phone_nr={$this->parseValue($this->fieldPhoneNr, 'notNumber')},
				field_address={$this->parseValue($this->fieldAddress, 'notNumber')},
				field_password={$this->parseValue($this->fieldPassword, 'notNumber')},
				field_privilege={$this->parseValue($this->fieldPrivilege, 'notNumber')},
				field_contact_method={$this->parseValue($this->fieldContactMethod, 'notNumber')},
				field_term_and_condition={$this->parseValue($this->fieldTermAndCondition)},
				field_register_date={$this->parseValue($this->fieldRegisterDate, 'notNumber')},
				field_new_password={$this->parseValue($this->fieldNewPassword, 'notNumber')},
				field_activation={$this->parseValue($this->fieldActivation, 'notNumber')}
            WHERE
                id={$this->parseValue($id, 'int')}
SQL;
            $this->resetLastSqlError();
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
     * Facility for updating a row of user_all previously loaded.
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
     * Facility for display a row for user_all previously loaded.
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
     * Facility for register a new user row into user_all.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating.
     * @category DML Helper
     * @return mixed MySQLi update result
     */
    public function register()
    {
        if (isset($_GET['lan'])) {
            $lang_url = "&lan=" . $_GET['lan'];
        } else {
            $lang_url = "";
        }
        echo '<form class="form-horizontal" action="../../includes/form_user.php?&function=register' . $lang_url . '" method="post" enctype="multipart/form-data">';
        $this->insertRegisterField();
        echo '</form>';
    }

    /**
     * Facility for register a new user row into user_all.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating.
     * @category DML Helper
     * @return mixed MySQLi update result
     */
    public function login()
    {
        if (isset($_GET['lan'])) {
            $lang_url = "&lan=" . $_GET['lan'];
        } else {
            $lang_url = "";
        }
        echo '<form class="form-horizontal" action="../../includes/form_user.php?&function=login' . $lang_url . '" method="post" enctype="multipart/form-data">';
        $this->insertLoginField();
        echo '</form>';
    }

    public function passRecovery()
    {
        if (isset($_GET['lan'])) {
            $lang_url = "&lan=" . $_GET['lan'];
        } else {
            $lang_url = "";
        }
        echo '<form class="form-horizontal" action="../../includes/form_user.php?&function=passRecovery' . $lang_url . '" method="post" enctype="multipart/form-data">';
        $this->insertPassRecoveryField();
        echo '</form>';
    }
    /**
     * 
     */
    public function insertRegisterField()
    {
        //uploadResetErrors();
        ___open_div_("container-fluid", '');
        ___open_div_("row justify-content-center", '" style="border:1px solid #c7c7c7; width:60%; margin-left:20%; margin-right:25%; padding: 20px;');
        ////
        ___open_div_("row", "");
        ___open_div_("col-md-12", '');
        ___open_div_("form-group", "");
        ___open_div_("col-md-6", '');
        logoText();
        ___close_div_(1);
        ___open_div_("col-md-6", '');
        topRightLinks();
        ___close_div_(2);
        ___close_div_(4);
        ///
        ___open_div_("row", "");
        ___open_div_('col-md-12', '" style="text-align:center;color:#31708f; border-bottom:1px solid #c7c7c7;');
        echo '<strong><p class="h2">' . $GLOBALS['user_specific_array']['user']['registeration'] . '</strong></p>';
        ___close_div_(2);
        ///
        $style = '" style="text-align: left;font-size:18px;';
        ___open_div_("row", "");
        ___open_div_("col-md-12", $style . 'padding-top: 10px;');
        ___open_div_("form-group ", "");
        ___open_div_("col-md-12", '');
        ___open_div_("col-md-12", '');
        ___open_div_("col-md-12", '');
        $this->insertFillable('fieldUserName',  'user_specific_array', 'user');
        ___close_div_(2);
        $fillableFields = ['fieldFirstName', 'fieldLastName'];
        foreach ($fillableFields as $value) {
            ___open_div_("col-md-6", '');
            ___open_div_("col-md-12", '');
            $this->insertFillable($value,  'user_specific_array', 'user');
            ___close_div_(2);
        }
        ___close_div_(4);
        ///
        $fillableFields = ['fieldEmail', 'fieldPhoneNr'];
        ___open_div_("row", "");
        ___open_div_("col-md-12", $style);
        ___open_div_("form-group ", "");
        ___open_div_("col-md-12", '');
        foreach ($fillableFields as $value) {
            ___open_div_("col-md-6", '');
            ___open_div_("col-md-12", '');
            $this->insertFillable($value,  'user_specific_array', 'user');
            ___close_div_(2);
        }
        $this->insertPassword();
        ___close_div_(4);
        ///
        ___open_div_("row", "");
        ___open_div_("col-md-12 ", $style);
        ___open_div_("form-group ", "");
        ___open_div_("col-md-12", '');
        ___open_div_("col-md-12", '');
        ___open_div_("col-md-12", '');
        $this->insertSelectable('fieldContactMethod',  'upload_specific_array', 'common');
        ___close_div_(6);
        ///
        ___open_div_("row", "");
        ___open_div_("col-md-12 ", $style);
        ___open_div_("form-group ", "");
        ___open_div_("col-md-12", '');
        ___open_div_("col-md-12", '');
        ___open_div_("col-md-12", '');
        $this->insertSelectable('fieldTermAndCondition',  'user_specific_array', 'user');
        ___close_div_(1);
        //___open_div_("col-md-12", '');
        global $str_url;
        ___open_div_("col-md-6", '');
        echo '<p><a class="text-info" href="../../includes/template.proxy.php?type=terms' . $str_url . '">' .
            $GLOBALS['user_specific_array']['user']['fieldTermAndCondition'][3]['message'] . '</a></p>';
        ___close_div_(1);
        ___open_div_("col-md-6", '');
        echo '<p ><a class="text-info" href="../../includes/template.proxy.php?type=privacy' . $str_url . '">' .
            $GLOBALS['user_specific_array']['user']['fieldPrivacyPolicy'][0]['message'] . '</a></p>';
        ___close_div_(1);
        ___close_div_(5);
        ///
        ___open_div_("row", "");
        ___open_div_("col-md-12", '');
        ___open_div_("form-group ", "");
        ___open_div_("col-md-12", '');
        ___open_div_("col-md-12", '');

        echo '<button name="submit" type="submit" value="submit" class="btn btn-primary btn-lg btn-block">' . $GLOBALS['lang']['Register'] . '</button>';
        ___close_div_(5);
        ___close_div_(2);
    }

    public function insertLoginField()
    {
        if (isset($_GET['lan'])) {
            $lang_url = "?&lan=" . $_GET['lan'];
        } else {
            $lang_url = "";
        }
        //uploadResetErrors();
        ___open_div_("container-fluid", '');
        ___open_div_("row justify-content-center", '" style="border:1px solid #c7c7c7; width:50%; margin-left:25%; margin-right:25%; padding: 20px;');

        ////
        ___open_div_("row", "");
        ___open_div_("col-md-12", '');
        ___open_div_("form-group", "");
        ___open_div_("col-md-6", '');
        logoText();
        ___close_div_(1);
        ___open_div_("col-md-6", '');
        ___open_div_("toprightlink", '');
        $current_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        locale($current_link);
        topRightHelpLink();
        ___close_div_(2);
        ___close_div_(3);
        ///
        ////        
        ___open_div_("row", "");
        ___open_div_('col-md-12', '" style="text-align:center;color:#31708f; border-bottom:1px solid #c7c7c7;');
        echo '<strong><p class="h2">' . $GLOBALS['user_specific_array']['user']['login'] . '</strong></p>';
        ___close_div_(2);
        ////
        ___open_div_("row", "");
        ___open_div_("col-md-12", '" style="text-align: left;font-size:18px;');
        ___open_div_("form-group ", "");
        ___open_div_("col-md-12", '');
        ___open_div_("col-md-12", '');
        ___open_div_("col-md-12", '');
        $this->insertFillable('fieldEmail',  'user_specific_array', 'user');
        ___close_div_(1);
        ___open_div_("col-md-12", '');
        $this->insertFillable('fieldPassword',  'user_specific_array', 'user', 'password');
        ___close_div_(1);
        ___close_div_(4);
        ////
        ___open_div_("row", "");
        ___open_div_("col-md-12", '');
        ___open_div_("form-group ", "");
        ___open_div_("col-md-12", '');
        ___open_div_("col-md-12", '');
        echo '<button name="submit" type="submit" value="submit" class="btn btn-primary btn-lg btn-block">' . $GLOBALS['lang']['Login'] . '</button>';
        ___close_div_(5);

        ////
        ___open_div_("row", "");
        ___open_div_("col-md-12", '');
        ___open_div_("form-group ", "");
        ___open_div_("col-md-12", '');
        ___open_div_("col-md-12", '');
        ___open_div_("col-md-6", '');
        echo '<a class="forgot" href="../includes/passRecovery.php' . $lang_url . '">' . $GLOBALS['lang']['Forgot your password'] . ' </a> ';
        ___close_div_(1);
        ___open_div_("col-md-6", '" style="text-align:right;');
        echo '<a class="forgot" href="../includes/register.php' . $lang_url . '">' . $GLOBALS['lang']['Register'] . '</a>';
        ___close_div_(1);
        ___close_div_(5);

        ___close_div_(2);
    }

    private function insertPassword()
    {
        $fillableFields = ['fieldPassword', 'fieldPasswordRepeat'];
        foreach ($fillableFields as $value) {
            ___open_div_("col-md-6", '');
            ___open_div_("col-md-12", '');
            $this->insertFillable($value,  'user_specific_array', 'user', 'password');
            ___close_div_(2);
        }
    }

    public function insertPassRecoveryField()
    {
        //uploadResetErrors();
        ___open_div_("container-fluid", '');
        ___open_div_("row justify-content-center", '" style="border:1px solid #c7c7c7; width:54%; margin-left:20%; margin-right:25%; padding: 20px;');
        ////
        ___open_div_("row", "");
        ___open_div_("col-md-12", '');
        ___open_div_("form-group", "");
        ___open_div_("col-md-6", '');
        logoText();
        ___close_div_(1);
        ___open_div_("col-md-6", '');
        topRightLinks();
        ___close_div_(2);
        ___close_div_(4);
        ///
        ___open_div_("row", "");
        ___open_div_('col-md-12', '" style="text-align:center;color:#31708f; border-bottom:1px solid #c7c7c7;');
        echo '<strong><p class="h2">' . $GLOBALS['user_specific_array']['user']['passwordRecovery'][0] . '</strong></p>';
        ___close_div_(2);
        ///
        $style = '" style="text-align: left;font-size:18px;';
        ___open_div_("row", "");
        ___open_div_("col-md-12", $style . 'padding-top: 10px;');
        ___open_div_("form-group ", "");
        ___open_div_("col-md-12", '');
        ___open_div_("col-md-12", '');
        ___open_div_("col-md-12", '');
        $this->insertFillable('fieldUserName',  'user_specific_array', 'user');
        ___close_div_(2);
        ___close_div_(4);
        ///
        ___open_div_("row", "");
        ___open_div_("col-md-12", $style);
        ___open_div_("form-group ", "");
        ___open_div_("col-md-12", '');
        ___open_div_("col-md-12", '');
        ___open_div_("col-md-12", '');
        $this->insertFillable('fieldEmail',  'user_specific_array', 'user');
        ___close_div_(2);
        ///
        ___close_div_(4);
        ___open_div_("row", "");
        ___open_div_("col-md-12", '');
        ___open_div_("form-group ", "");
        ___open_div_("col-md-12", '');
        ___open_div_("col-md-12", '');
        echo '<button name="submit" type="submit" value="submit" class="btn btn-primary btn-lg btn-block">' . $GLOBALS['user_specific_array']['user']['passwordRecovery'][1] . '</button>';
        ___close_div_(5);
        ___close_div_(2);
    }

    /**
     * 
     */
    public function recoverPassword()
    {
        //Generate a RANDOM MD5 Hash for a password
        $randomPassword = md5(uniqid(rand()));
        $randomPassword08 = substr($randomPassword, 0, 8);

        $email = $this->fieldEmail;
        $crypto = new Cryptor();
        $cryptoPassword = base64_encode($crypto->encryptor($randomPassword08));
        $activation = sha1(mt_rand(10000, 99999) . time() . $email . $cryptoPassword);

        $this->fieldNewPassword = $cryptoPassword;
        $this->fieldActivation = $activation;
        $this->update($this->getId());

        $recoveryLink = "http://hulutera.com/includes/activate.php?key=" . $activation . "&newPass=yes";
        $subject = $GLOBALS['user_specific_array']['message']['passRecovery']['subject'];
        $body = $GLOBALS['user_specific_array']['message']['passRecovery']['body'][0];
        $body .= $GLOBALS['user_specific_array']['message']['passRecovery']['body'][1][0] . $recoveryLink . "<br><br><br>";
        $body .= $GLOBALS['user_specific_array']['message']['passRecovery']['body'][1][1] . $randomPassword08 . "<br>";
        $body .= $GLOBALS['user_specific_array']['message']['passRecovery']['body'][1][2] . "<br><br>";

        /// temporary disable for message sending
        if (DBHOST == 'localhost') {
            header('Location: ../includes/prompt.php?type=4');
            return;
        }
        $isMailDelivered = mail($email, $subject, $body, 'From:admin@hulutera.com');
        //Check if mail Delivered or die
        if (!$isMailDelivered) {
            die("Sending Email Failed. Please Contact Site Admin!");
        } else {
            header('Location: ../includes/prompt.php?type=4');
        }
    }

    public function finalizeEditProfile()
    {
        $fieldBefore = [
            $this->fieldUserName,
            $this->fieldFirstName,
            $this->fieldLastName,
            $this->fieldEmail,
            $this->fieldPhoneNr,
            $this->fieldAddress,
            $this->fieldPassword,
            $this->fieldContactMethod,
            $this->fieldNewPassword
        ];

        $this->fieldUserName = isset($_POST['fieldUserName']) ? $_POST['fieldUserName'] : $this->fieldUserName;
        $this->fieldFirstName = isset($_POST['fieldFirstName']) ? $_POST['fieldFirstName'] : $this->fieldFirstName;
        $this->fieldLastName = isset($_POST['fieldLastName']) ? $_POST['fieldLastName'] : $this->fieldLastName;
        $this->fieldEmail = isset($_POST['fieldEmail']) ? $_POST['fieldEmail'] : $this->fieldEmail;
        $this->fieldPhoneNr = isset($_POST['fieldPhoneNr']) ? $_POST['fieldPhoneNr'] : $this->fieldPhoneNr;
        $this->fieldAddress  = isset($_POST['fieldAddress']) ? $_POST['fieldAddress'] : $this->fieldAddress;
        $this->fieldPassword      = isset($_POST['fieldPassword']) ? $_POST['fieldPassword'] : $this->fieldPassword;
        $this->fieldContactMethod = isset($_POST['fieldContactMethod']) ? $_POST['fieldContactMethod'] : $this->fieldContactMethod;
        $this->fieldNewPassword   = isset($_POST['fieldNewPassword']) ? $_POST['fieldNewPassword'] : $this->fieldNewPassword;
        $fieldAfter = [
            $this->fieldUserName,
            $this->fieldFirstName,
            $this->fieldLastName,
            $this->fieldEmail,
            $this->fieldPhoneNr,
            $this->fieldAddress,
            $this->fieldPassword,
            $this->fieldContactMethod,
            $this->fieldNewPassword
        ];
        var_dump($fieldBefore);
        var_dump($fieldAfter);
        if ($fieldBefore !== $fieldAfter) {
            //var_dump($_SESSION);
        }

        $lang_sw = isset($_GET['lan']) ? "&lan=" . $_GET['lan'] : "";
        if ($fieldBefore !== $fieldAfter) {
            $this->update($_SESSION['uID']);

            $subject = $GLOBALS['user_specific_array']['message']['editProfile']['subject'];
            $body = $GLOBALS['user_specific_array']['message']['editProfile']['body'][0] . "<br><br>";


            /// temporary disable for message sending
            if (DBHOST == 'localhost') {
                $_SESSION['editProfileSuccess'] = 1;
                header('Location: ../includes/editProfile.php?function=editProfile' . $lang_sw);
                return;
            }
            $isMailDelivered = mail($this->field_email, $subject, $body, 'From:admin@hulutera.com');
            //Check if mail Delivered or die
            if (!$isMailDelivered) {
                die("Sending Email Failed. Please Contact Site Admin!");
            } else {
                $_SESSION['editProfileSuccess'] = 1;
                header('Location: ../includes/editProfile.php?function=editProfile' . $lang_sw);
            }
        } else {
            header('Location: ../includes/editProfile.php?function=editProfile' . $lang_sw);
        }
    }
    public function updateProfile()
    {
        if (isset($_SESSION['editProfileSuccess'])) {
            ___open_div_("container-fluid", '');
            ___open_div_("row justify-content-center", '" style=" width:54%; margin-left:20%; margin-right:25%; padding: 20px;');
            ___open_div_("row", "");
            ___open_div_('col-md-12', '" style="text-align:center;color:#31708f;');
            ___open_div_('col-md-12 alert alert-success" role="alert', '');
            echo $GLOBALS['message']['success'];
            ___close_div_(5);
        }
        $fields = [
            'fieldName' => $this->getFieldFirstName() . ' ' . $this->getFieldLastName(),
            'fieldEmail' => $this->getFieldEmail(),
            'fieldUserName' => $this->getFieldUserName(),
            'fieldPhoneNr' => $this->getFieldPhoneNr(),
            'fieldPassword' => $this->getFieldPassword(),
            'fieldContactMethod' => $this->getFieldContactMethod(),
        ];
        ___open_div_("container-fluid ", '');
        ___open_div_('row justify-content-center alert alert-info" role="alert"', '" style=" color:black;width:54%; margin-left:20%; margin-right:25%; padding: 20px; border:1px solid #c7c7c7;');
        ___open_div_("row", "");
        ___open_div_('col-md-12', '" style="text-align:center;color:#31708f; border-bottom:1px solid #c7c7c7;');
        ___open_div_('col-md-12', ' ');
        echo '<strong><p class="h2">' . $GLOBALS['lang']['my profile'] . '</strong></p>';
        ___close_div_(1);

        ___close_div_(2);
        foreach ($fields as $key => $value) {
            $style = '" style="text-align: left;font-size:18px;';
            ___open_div_("row", "");
            ___open_div_("col-md-12", $style . ' border-bottom:1px solid #c7c7c7;');
            ___open_div_("form-group ", "");
            $lable = $GLOBALS['user_specific_array']['user'][$key][0];
            if ($key == 'fieldName') {
                $lable = $GLOBALS['user_specific_array']['user']['fieldName'][0];
                $value = $value;
            }
            if ($key == 'fieldContactMethod') {
                $lable = $GLOBALS['upload_specific_array']['common'][$key][0];
                $value = $GLOBALS['upload_specific_array']['common'][$key][2][$value];
            }
            if ($key == 'fieldPassword') {
                $value = '********';
            }
            echo '<strong>' . $lable . '</strong>';
            echo '<p>' . $value;
            global $lang_url;

            echo '
            <a href="../../includes/editProfile.php' . $lang_url . '&function=editProfile&update=' . $key . '&order=open" type="button" class="btn btn-warning btn-md" 
                        style="float:right;color:black;font-size:16px;font-weight:bold;">' .  $GLOBALS['lang']['edit'] . '</a>';
            ___close_div_(3);
        }
        ___open_div_("row", "");
        ___open_div_("col-md-12", '" style="padding:20px;');
        echo '<a href="http://hulutera/includes/mypage.php?' . $lang_url . '" type="button" class="btn btn-primary  btn-lg btn-block"
                                style="">' . $GLOBALS['lang']['to my page'] . '</a>';
        ___close_div_(2);
        ___close_div_(2);
        unset($_SESSION['POST']);
        unset($_SESSION['errorRaw']);
        unset($_SESSION['editProfileSuccess']);
    }


    public function editProfile($field)
    {
        $fieldAll = [
            'fieldUserName' => $this->fieldUserName,
            'fieldFirstName' => $this->fieldFirstName,
            'fieldLastName' => $this->fieldLastName,
            'fieldEmail' => $this->fieldEmail,
            'fieldPhoneNr' => $this->fieldPhoneNr,
            'fieldAddress' => $this->fieldAddress,
            'fieldPassword' => $this->fieldPassword,
            'fieldContactMethod' => $this->fieldContactMethod,
            'fieldNewPasswor' => $this->fieldNewPassword
        ];

        if (isset($_GET['lan'])) {
            $lang_url = "&lan=" . $_GET['lan'];
        } else {
            $lang_url = "";
        }
        echo '<form class="form-horizontal" action="../../includes/form_user.php?&function=editProfile' . $lang_url . '" method="post" enctype="multipart/form-data">';

        ___open_div_("container-fluid", '');
        ___open_div_("row justify-content-center", '" style="border:1px solid #c7c7c7; width:50%; margin-left:25%; margin-right:25%; padding: 20px;');
        ///
        ___open_div_("row", "");
        ___open_div_('col-md-12', '" style="text-align:center;color:#31708f; border-bottom:1px solid #c7c7c7;');
        $index = ($field == 'fieldContactMethod' || $field == 'fieldPassword') ?3 :2;
        echo '<strong><p class="h2">' . $GLOBALS['user_specific_array']['user'][$field][$index] . '</strong></p>';
        echo '<p style="text-align:justify; color:#6c757d;font-size:20px">' . $GLOBALS['message']['change']['name'] . '</p>';
        ___close_div_(2);
        ///
        $style = '" style="text-align: left;font-size:18px;';
        ___open_div_("row", "");
        ___open_div_("col-md-12", $style . 'padding-top: 10px;');
        ___open_div_("form-group ", "");
        ___open_div_("col-md-12", '');
        ___open_div_("col-md-12", '');
        ___open_div_("col-md-12", '');
        if ($field == 'fieldName') {
            $label = $GLOBALS['lang']['new'] . ' ' . $GLOBALS['user_specific_array']['user']['fieldFirstName'][0];
            $this->insertFillable('fieldFirstName',  'user_specific_array', 'user', null, $label, $this->fieldFirstName);
            $label = $GLOBALS['lang']['new'] . ' ' . $GLOBALS['user_specific_array']['user']['fieldLastName'][0];
            $this->insertFillable('fieldLastName',  'user_specific_array', 'user', null, $label, $this->fieldLastName);
        } else if ($field == 'fieldPassword') {
            $label = $GLOBALS['lang']['old'] . ' ' . $GLOBALS['user_specific_array']['user'][$field][0];
            $this->insertFillable('fieldPassword',  'user_specific_array', 'user', 'password', $label, null);

            $label = $GLOBALS['lang']['new'] . ' ' . $GLOBALS['user_specific_array']['user'][$field][0];
            $placeholder = $GLOBALS['lang']['new'] . ' ' . $GLOBALS['user_specific_array']['user'][$field][1];
            $this->insertFillable('fieldPasswordRepeat',  'user_specific_array', 'user', 'password', $label, null, $placeholder);

            $label = $GLOBALS['lang']['new'] . ' ' . $GLOBALS['user_specific_array']['user']['fieldPasswordRepeat2'][0];
            $placeholder = $GLOBALS['lang']['new'] . ' ' . $GLOBALS['user_specific_array']['user']['fieldPasswordRepeat2'][1];
            $this->insertFillable('fieldPasswordRepeat2',  'user_specific_array', 'user', 'password', $label, null, $placeholder);
        } else if ($field == 'fieldContactMethod') {
            $label = $GLOBALS['lang']['new'] . ' ' . $GLOBALS['user_specific_array']['user'][$field][0];
            $this->insertSelectable($field,  'user_specific_array', 'user', null, $label);
        } else {
            $label = $GLOBALS['lang']['new'] . ' ' . $GLOBALS['user_specific_array']['user'][$field][0];
            $this->insertFillable($field,  'user_specific_array', 'user', null, $label, $fieldAll[$field]);
        }
        ___close_div_(2);
        ___close_div_(4);
        ___open_div_("row", "");
        ___open_div_("col-md-12", '');
        ___open_div_("form-group ", "");
        ___open_div_("col-md-12", '');
        ___open_div_("col-md-6", '');
        echo '<button name="submit" type="submit" value="submit" class="btn btn-primary btn-lg btn-block">' . $GLOBALS['lang']['save changes'] . '</button>';
        ___close_div_(1);
        ___open_div_("col-md-6", '');
        echo '<a href="../../includes/editProfile.php?' . $lang_url . '&function=editProfile&update=' . $field . '&order=cancel" type="button" class="btn btn-danger btn-lg btn-block"
                                style="float:right;">' . $GLOBALS['lang']['cancel changes'] . '</a>';
        ___close_div_(1);
        ___close_div_(5);
        ___close_div_(2);
        echo '</form>';
    }
}
