<?php
global $documnetRootPath;

require_once $documnetRootPath . "/classes/reflection/class.config.php";


/**
 * Class HtItemComputer
 * @extends MySqlRecord
 * @filesource HtItemComputer.php
*/

// namespace hulutera;

class HtItemComputer extends MySqlRecord
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
     * Class attribute for mapping the primary key id of table item_computer
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
     * Class attribute for mapping table field id_temp
     *
     * Comment for field id_temp: Not specified.<br>
     * Field information:
     *  - Data type: int(20)
     *  - Null : YES
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var int $idTemp
     */
    private $idTemp;

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
     * Class attribute for mapping table field id_catergory
     *
     * Comment for field id_catergory: Not specified.<br>
     * Field information:
     *  - Data type: int(40)
     *  - Null : NO
     *  - DB Index: MUL
     *  - Default: 
     *  - Extra:  
     * @var int $idCatergory
     */
    private $idCatergory;

    /**
     * Class attribute for mapping table field id_contact_category
     *
     * Comment for field id_contact_category: Not specified.<br>
     * Field information:
     *  - Data type: int(3)
     *  - Null : NO
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var int $idContactCategory
     */
    private $idContactCategory;

    /**
     * Class attribute for mapping table field field_price
     *
     * Comment for field field_price: Not specified.<br>
     * Field information:
     *  - Data type: varchar(40)
     *  - Null : YES
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var string $fieldPrice
     */
    private $fieldPrice;

    /**
     * Class attribute for mapping table field field_price_nego
     *
     * Comment for field field_price_nego: Not specified.<br>
     * Field information:
     *  - Data type: varchar(20)
     *  - Null : YES
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var string $fieldPriceNego
     */
    private $fieldPriceNego;

    /**
     * Class attribute for mapping table field field_price_currency
     *
     * Comment for field field_price_currency: Not specified.<br>
     * Field information:
     *  - Data type: varchar(20)
     *  - Null : NO
     *  - DB Index: 
     *  - Default: Birr
     *  - Extra:  
     * @var string $fieldPriceCurrency
     */
    private $fieldPriceCurrency;

    /**
     * Class attribute for mapping table field field_made
     *
     * Comment for field field_made: Not specified.<br>
     * Field information:
     *  - Data type: varchar(20)
     *  - Null : YES
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var string $fieldMade
     */
    private $fieldMade;

    /**
     * Class attribute for mapping table field field_os
     *
     * Comment for field field_os: Not specified.<br>
     * Field information:
     *  - Data type: varchar(20)
     *  - Null : YES
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var string $fieldOs
     */
    private $fieldOs;

    /**
     * Class attribute for mapping table field field_model
     *
     * Comment for field field_model: Not specified.<br>
     * Field information:
     *  - Data type: varchar(20)
     *  - Null : YES
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var string $fieldModel
     */
    private $fieldModel;

    /**
     * Class attribute for mapping table field field_processor
     *
     * Comment for field field_processor: Not specified.<br>
     * Field information:
     *  - Data type: varchar(20)
     *  - Null : YES
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var string $fieldProcessor
     */
    private $fieldProcessor;

    /**
     * Class attribute for mapping table field field_ram
     *
     * Comment for field field_ram: Not specified.<br>
     * Field information:
     *  - Data type: varchar(20)
     *  - Null : YES
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var string $fieldRam
     */
    private $fieldRam;

    /**
     * Class attribute for mapping table field field_hard_drive
     *
     * Comment for field field_hard_drive: Not specified.<br>
     * Field information:
     *  - Data type: varchar(20)
     *  - Null : YES
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var string $fieldHardDrive
     */
    private $fieldHardDrive;

    /**
     * Class attribute for mapping table field field_color
     *
     * Comment for field field_color: Not specified.<br>
     * Field information:
     *  - Data type: varchar(20)
     *  - Null : YES
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var string $fieldColor
     */
    private $fieldColor;

    /**
     * Class attribute for mapping table field field_location
     *
     * Comment for field field_location: Not specified.<br>
     * Field information:
     *  - Data type: varchar(40)
     *  - Null : YES
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var string $fieldLocation
     */
    private $fieldLocation;

    /**
     * Class attribute for mapping table field field_extra_info
     *
     * Comment for field field_extra_info: Not specified.<br>
     * Field information:
     *  - Data type: mediumtext
     *  - Null : YES
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var string $fieldExtraInfo
     */
    private $fieldExtraInfo;

    /**
     * Class attribute for mapping table field field_title
     *
     * Comment for field field_title: Not specified.<br>
     * Field information:
     *  - Data type: varchar(125)
     *  - Null : YES
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var string $fieldTitle
     */
    private $fieldTitle;

    /**
     * Class attribute for mapping table field field_upload_date
     *
     * Comment for field field_upload_date: Not specified.<br>
     * Field information:
     *  - Data type: timestamp
     *  - Null : NO
     *  - DB Index: 
     *  - Default: CURRENT_TIMESTAMP
     *  - Extra:  on update CURRENT_TIMESTAMP
     * @var string $fieldUploadDate
     */
    private $fieldUploadDate;

    /**
     * Class attribute for mapping table field field_total_view
     *
     * Comment for field field_total_view: Not specified.<br>
     * Field information:
     *  - Data type: int(10)
     *  - Null : YES
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var int $fieldTotalView
     */
    private $fieldTotalView;

    /**
     * Class attribute for mapping table field field_status
     *
     * Comment for field field_status: Not specified.<br>
     * Field information:
     *  - Data type: varchar(10)
     *  - Null : NO
     *  - DB Index: 
     *  - Default: pending
     *  - Extra:  
     * @var string $fieldStatus
     */
    private $fieldStatus;

    /**
     * Class attribute for mapping table field field_market_category
     *
     * Comment for field field_market_category: Not specified.<br>
     * Field information:
     *  - Data type: varchar(10)
     *  - Null : NO
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var string $fieldMarketCategory
     */
    private $fieldMarketCategory;

    /**
     * Class attribute for mapping table field field_table_type
     *
     * Comment for field field_table_type: Not specified.<br>
     * Field information:
     *  - Data type: int(10)
     *  - Null : NO
     *  - DB Index: 
     *  - Default: 3
     *  - Extra:  
     * @var int $fieldTableType
     */
    private $fieldTableType;

    /**
     * Class attribute for storing the SQL DDL of table item_computer
     * @var string base64 encoded string for DDL
     */
    private $ddl = "Q1JFQVRFIFRBQkxFIGBpdGVtX2NvbXB1dGVyYCAoCiAgYGlkYCBpbnQoNDApIE5PVCBOVUxMIEFVVE9fSU5DUkVNRU5ULAogIGBpZF90ZW1wYCBpbnQoMjApIERFRkFVTFQgTlVMTCwKICBgaWRfdXNlcmAgaW50KDQwKSBOT1QgTlVMTCwKICBgaWRfY2F0ZXJnb3J5YCBpbnQoNDApIE5PVCBOVUxMLAogIGBpZF9jb250YWN0X2NhdGVnb3J5YCBpbnQoMykgTk9UIE5VTEwsCiAgYGZpZWxkX3ByaWNlYCB2YXJjaGFyKDQwKSBERUZBVUxUIE5VTEwsCiAgYGZpZWxkX3ByaWNlX25lZ29gIHZhcmNoYXIoMjApIERFRkFVTFQgTlVMTCwKICBgZmllbGRfcHJpY2VfY3VycmVuY3lgIHZhcmNoYXIoMjApIE5PVCBOVUxMIERFRkFVTFQgJ0JpcnInLAogIGBmaWVsZF9tYWRlYCB2YXJjaGFyKDIwKSBERUZBVUxUIE5VTEwsCiAgYGZpZWxkX29zYCB2YXJjaGFyKDIwKSBERUZBVUxUIE5VTEwsCiAgYGZpZWxkX21vZGVsYCB2YXJjaGFyKDIwKSBERUZBVUxUIE5VTEwsCiAgYGZpZWxkX3Byb2Nlc3NvcmAgdmFyY2hhcigyMCkgREVGQVVMVCBOVUxMLAogIGBmaWVsZF9yYW1gIHZhcmNoYXIoMjApIERFRkFVTFQgTlVMTCwKICBgZmllbGRfaGFyZF9kcml2ZWAgdmFyY2hhcigyMCkgREVGQVVMVCBOVUxMLAogIGBmaWVsZF9jb2xvcmAgdmFyY2hhcigyMCkgREVGQVVMVCBOVUxMLAogIGBmaWVsZF9sb2NhdGlvbmAgdmFyY2hhcig0MCkgREVGQVVMVCBOVUxMLAogIGBmaWVsZF9leHRyYV9pbmZvYCBtZWRpdW10ZXh0LAogIGBmaWVsZF90aXRsZWAgdmFyY2hhcigxMjUpIERFRkFVTFQgTlVMTCwKICBgZmllbGRfdXBsb2FkX2RhdGVgIHRpbWVzdGFtcCBOT1QgTlVMTCBERUZBVUxUIENVUlJFTlRfVElNRVNUQU1QIE9OIFVQREFURSBDVVJSRU5UX1RJTUVTVEFNUCwKICBgZmllbGRfdG90YWxfdmlld2AgaW50KDEwKSBERUZBVUxUIE5VTEwsCiAgYGZpZWxkX3N0YXR1c2AgdmFyY2hhcigxMCkgTk9UIE5VTEwgREVGQVVMVCAncGVuZGluZycsCiAgYGZpZWxkX21hcmtldF9jYXRlZ29yeWAgdmFyY2hhcigxMCkgTk9UIE5VTEwsCiAgYGZpZWxkX3RhYmxlX3R5cGVgIGludCgxMCkgTk9UIE5VTEwgREVGQVVMVCAnMycsCiAgUFJJTUFSWSBLRVkgKGBpZGApLAogIEtFWSBgdUlEX0ZLMmAgKGBpZF91c2VyYCksCiAgS0VZIGBkX0NhdGVnb3J5SURfRktgIChgaWRfY2F0ZXJnb3J5YCksCiAgQ09OU1RSQUlOVCBgaXRlbV9jb21wdXRlcl9pYmZrXzFgIEZPUkVJR04gS0VZIChgaWRfdXNlcmApIFJFRkVSRU5DRVMgYHVzZXJfYWxsYCAoYGlkYCkgT04gREVMRVRFIENBU0NBREUgT04gVVBEQVRFIENBU0NBREUsCiAgQ09OU1RSQUlOVCBgaXRlbV9jb21wdXRlcl9pYmZrXzJgIEZPUkVJR04gS0VZIChgaWRfY2F0ZXJnb3J5YCkgUkVGRVJFTkNFUyBgY2F0ZWdvcnlfY29tcHV0ZXJgIChgaWRgKSBPTiBERUxFVEUgQ0FTQ0FERSBPTiBVUERBVEUgQ0FTQ0FERQopIEVOR0lORT1Jbm5vREIgQVVUT19JTkNSRU1FTlQ9NTcgREVGQVVMVCBDSEFSU0VUPWxhdGluMQ==";

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
     * setIdTemp Sets the class attribute idTemp with a given value
     *
     * The attribute idTemp maps the field id_temp defined as int(20).<br>
     * Comment for field id_temp: Not specified.<br>
     * @param int $idTemp
     * @category Modifier
     */
    public function setIdTemp($idTemp)
    {
        $this->idTemp = (int)$idTemp;
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
     * setIdCatergory Sets the class attribute idCatergory with a given value
     *
     * The attribute idCatergory maps the field id_catergory defined as int(40).<br>
     * Comment for field id_catergory: Not specified.<br>
     * @param int $idCatergory
     * @category Modifier
     */
    public function setIdCatergory($idCatergory)
    {
        $this->idCatergory = (int)$idCatergory;
    }

    /**
     * setIdContactCategory Sets the class attribute idContactCategory with a given value
     *
     * The attribute idContactCategory maps the field id_contact_category defined as int(3).<br>
     * Comment for field id_contact_category: Not specified.<br>
     * @param int $idContactCategory
     * @category Modifier
     */
    public function setIdContactCategory($idContactCategory)
    {
        $this->idContactCategory = (int)$idContactCategory;
    }

    /**
     * setFieldPrice Sets the class attribute fieldPrice with a given value
     *
     * The attribute fieldPrice maps the field field_price defined as varchar(40).<br>
     * Comment for field field_price: Not specified.<br>
     * @param string $fieldPrice
     * @category Modifier
     */
    public function setFieldPrice($fieldPrice)
    {
        $this->fieldPrice = (string)$fieldPrice;
    }

    /**
     * setFieldPriceNego Sets the class attribute fieldPriceNego with a given value
     *
     * The attribute fieldPriceNego maps the field field_price_nego defined as varchar(20).<br>
     * Comment for field field_price_nego: Not specified.<br>
     * @param string $fieldPriceNego
     * @category Modifier
     */
    public function setFieldPriceNego($fieldPriceNego)
    {
        $this->fieldPriceNego = (string)$fieldPriceNego;
    }

    /**
     * setFieldPriceCurrency Sets the class attribute fieldPriceCurrency with a given value
     *
     * The attribute fieldPriceCurrency maps the field field_price_currency defined as varchar(20).<br>
     * Comment for field field_price_currency: Not specified.<br>
     * @param string $fieldPriceCurrency
     * @category Modifier
     */
    public function setFieldPriceCurrency($fieldPriceCurrency)
    {
        $this->fieldPriceCurrency = (string)$fieldPriceCurrency;
    }

    /**
     * setFieldMade Sets the class attribute fieldMade with a given value
     *
     * The attribute fieldMade maps the field field_made defined as varchar(20).<br>
     * Comment for field field_made: Not specified.<br>
     * @param string $fieldMade
     * @category Modifier
     */
    public function setFieldMade($fieldMade)
    {
        $this->fieldMade = (string)$fieldMade;
    }

    /**
     * setFieldOs Sets the class attribute fieldOs with a given value
     *
     * The attribute fieldOs maps the field field_os defined as varchar(20).<br>
     * Comment for field field_os: Not specified.<br>
     * @param string $fieldOs
     * @category Modifier
     */
    public function setFieldOs($fieldOs)
    {
        $this->fieldOs = (string)$fieldOs;
    }

    /**
     * setFieldModel Sets the class attribute fieldModel with a given value
     *
     * The attribute fieldModel maps the field field_model defined as varchar(20).<br>
     * Comment for field field_model: Not specified.<br>
     * @param string $fieldModel
     * @category Modifier
     */
    public function setFieldModel($fieldModel)
    {
        $this->fieldModel = (string)$fieldModel;
    }

    /**
     * setFieldProcessor Sets the class attribute fieldProcessor with a given value
     *
     * The attribute fieldProcessor maps the field field_processor defined as varchar(20).<br>
     * Comment for field field_processor: Not specified.<br>
     * @param string $fieldProcessor
     * @category Modifier
     */
    public function setFieldProcessor($fieldProcessor)
    {
        $this->fieldProcessor = (string)$fieldProcessor;
    }

    /**
     * setFieldRam Sets the class attribute fieldRam with a given value
     *
     * The attribute fieldRam maps the field field_ram defined as varchar(20).<br>
     * Comment for field field_ram: Not specified.<br>
     * @param string $fieldRam
     * @category Modifier
     */
    public function setFieldRam($fieldRam)
    {
        $this->fieldRam = (string)$fieldRam;
    }

    /**
     * setFieldHardDrive Sets the class attribute fieldHardDrive with a given value
     *
     * The attribute fieldHardDrive maps the field field_hard_drive defined as varchar(20).<br>
     * Comment for field field_hard_drive: Not specified.<br>
     * @param string $fieldHardDrive
     * @category Modifier
     */
    public function setFieldHardDrive($fieldHardDrive)
    {
        $this->fieldHardDrive = (string)$fieldHardDrive;
    }

    /**
     * setFieldColor Sets the class attribute fieldColor with a given value
     *
     * The attribute fieldColor maps the field field_color defined as varchar(20).<br>
     * Comment for field field_color: Not specified.<br>
     * @param string $fieldColor
     * @category Modifier
     */
    public function setFieldColor($fieldColor)
    {
        $this->fieldColor = (string)$fieldColor;
    }

    /**
     * setFieldLocation Sets the class attribute fieldLocation with a given value
     *
     * The attribute fieldLocation maps the field field_location defined as varchar(40).<br>
     * Comment for field field_location: Not specified.<br>
     * @param string $fieldLocation
     * @category Modifier
     */
    public function setFieldLocation($fieldLocation)
    {
        $this->fieldLocation = (string)$fieldLocation;
    }

    /**
     * setFieldExtraInfo Sets the class attribute fieldExtraInfo with a given value
     *
     * The attribute fieldExtraInfo maps the field field_extra_info defined as mediumtext.<br>
     * Comment for field field_extra_info: Not specified.<br>
     * @param string $fieldExtraInfo
     * @category Modifier
     */
    public function setFieldExtraInfo($fieldExtraInfo)
    {
        $this->fieldExtraInfo = (string)$fieldExtraInfo;
    }

    /**
     * setFieldTitle Sets the class attribute fieldTitle with a given value
     *
     * The attribute fieldTitle maps the field field_title defined as varchar(125).<br>
     * Comment for field field_title: Not specified.<br>
     * @param string $fieldTitle
     * @category Modifier
     */
    public function setFieldTitle($fieldTitle)
    {
        $this->fieldTitle = (string)$fieldTitle;
    }

    /**
     * setFieldUploadDate Sets the class attribute fieldUploadDate with a given value
     *
     * The attribute fieldUploadDate maps the field field_upload_date defined as timestamp.<br>
     * Comment for field field_upload_date: Not specified.<br>
     * @param string $fieldUploadDate
     * @category Modifier
     */
    public function setFieldUploadDate($fieldUploadDate)
    {
        $this->fieldUploadDate = (string)$fieldUploadDate;
    }

    /**
     * setFieldTotalView Sets the class attribute fieldTotalView with a given value
     *
     * The attribute fieldTotalView maps the field field_total_view defined as int(10).<br>
     * Comment for field field_total_view: Not specified.<br>
     * @param int $fieldTotalView
     * @category Modifier
     */
    public function setFieldTotalView($fieldTotalView)
    {
        $this->fieldTotalView = (int)$fieldTotalView;
    }

    /**
     * setFieldStatus Sets the class attribute fieldStatus with a given value
     *
     * The attribute fieldStatus maps the field field_status defined as varchar(10).<br>
     * Comment for field field_status: Not specified.<br>
     * @param string $fieldStatus
     * @category Modifier
     */
    public function setFieldStatus($fieldStatus)
    {
        $this->fieldStatus = (string)$fieldStatus;
    }

    /**
     * setFieldMarketCategory Sets the class attribute fieldMarketCategory with a given value
     *
     * The attribute fieldMarketCategory maps the field field_market_category defined as varchar(10).<br>
     * Comment for field field_market_category: Not specified.<br>
     * @param string $fieldMarketCategory
     * @category Modifier
     */
    public function setFieldMarketCategory($fieldMarketCategory)
    {
        $this->fieldMarketCategory = (string)$fieldMarketCategory;
    }

    /**
     * setFieldTableType Sets the class attribute fieldTableType with a given value
     *
     * The attribute fieldTableType maps the field field_table_type defined as int(10).<br>
     * Comment for field field_table_type: Not specified.<br>
     * @param int $fieldTableType
     * @category Modifier
     */
    public function setFieldTableType($fieldTableType)
    {
        $this->fieldTableType = (int)$fieldTableType;
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
     * getIdTemp gets the class attribute idTemp value
     *
     * The attribute idTemp maps the field id_temp defined as int(20).<br>
     * Comment for field id_temp: Not specified.
     * @return int $idTemp
     * @category Accessor of $idTemp
     */
    public function getIdTemp()
    {
        return $this->idTemp;
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
     * getIdCatergory gets the class attribute idCatergory value
     *
     * The attribute idCatergory maps the field id_catergory defined as int(40).<br>
     * Comment for field id_catergory: Not specified.
     * @return int $idCatergory
     * @category Accessor of $idCatergory
     */
    public function getIdCatergory()
    {
        return $this->idCatergory;
    }

    /**
     * getIdContactCategory gets the class attribute idContactCategory value
     *
     * The attribute idContactCategory maps the field id_contact_category defined as int(3).<br>
     * Comment for field id_contact_category: Not specified.
     * @return int $idContactCategory
     * @category Accessor of $idContactCategory
     */
    public function getIdContactCategory()
    {
        return $this->idContactCategory;
    }

    /**
     * getFieldPrice gets the class attribute fieldPrice value
     *
     * The attribute fieldPrice maps the field field_price defined as varchar(40).<br>
     * Comment for field field_price: Not specified.
     * @return string $fieldPrice
     * @category Accessor of $fieldPrice
     */
    public function getFieldPrice()
    {
        return $this->fieldPrice;
    }

    /**
     * getFieldPriceNego gets the class attribute fieldPriceNego value
     *
     * The attribute fieldPriceNego maps the field field_price_nego defined as varchar(20).<br>
     * Comment for field field_price_nego: Not specified.
     * @return string $fieldPriceNego
     * @category Accessor of $fieldPriceNego
     */
    public function getFieldPriceNego()
    {
        return $this->fieldPriceNego;
    }

    /**
     * getFieldPriceCurrency gets the class attribute fieldPriceCurrency value
     *
     * The attribute fieldPriceCurrency maps the field field_price_currency defined as varchar(20).<br>
     * Comment for field field_price_currency: Not specified.
     * @return string $fieldPriceCurrency
     * @category Accessor of $fieldPriceCurrency
     */
    public function getFieldPriceCurrency()
    {
        return $this->fieldPriceCurrency;
    }

    /**
     * getFieldMade gets the class attribute fieldMade value
     *
     * The attribute fieldMade maps the field field_made defined as varchar(20).<br>
     * Comment for field field_made: Not specified.
     * @return string $fieldMade
     * @category Accessor of $fieldMade
     */
    public function getFieldMade()
    {
        return $this->fieldMade;
    }

    /**
     * getFieldOs gets the class attribute fieldOs value
     *
     * The attribute fieldOs maps the field field_os defined as varchar(20).<br>
     * Comment for field field_os: Not specified.
     * @return string $fieldOs
     * @category Accessor of $fieldOs
     */
    public function getFieldOs()
    {
        return $this->fieldOs;
    }

    /**
     * getFieldModel gets the class attribute fieldModel value
     *
     * The attribute fieldModel maps the field field_model defined as varchar(20).<br>
     * Comment for field field_model: Not specified.
     * @return string $fieldModel
     * @category Accessor of $fieldModel
     */
    public function getFieldModel()
    {
        return $this->fieldModel;
    }

    /**
     * getFieldProcessor gets the class attribute fieldProcessor value
     *
     * The attribute fieldProcessor maps the field field_processor defined as varchar(20).<br>
     * Comment for field field_processor: Not specified.
     * @return string $fieldProcessor
     * @category Accessor of $fieldProcessor
     */
    public function getFieldProcessor()
    {
        return $this->fieldProcessor;
    }

    /**
     * getFieldRam gets the class attribute fieldRam value
     *
     * The attribute fieldRam maps the field field_ram defined as varchar(20).<br>
     * Comment for field field_ram: Not specified.
     * @return string $fieldRam
     * @category Accessor of $fieldRam
     */
    public function getFieldRam()
    {
        return $this->fieldRam;
    }

    /**
     * getFieldHardDrive gets the class attribute fieldHardDrive value
     *
     * The attribute fieldHardDrive maps the field field_hard_drive defined as varchar(20).<br>
     * Comment for field field_hard_drive: Not specified.
     * @return string $fieldHardDrive
     * @category Accessor of $fieldHardDrive
     */
    public function getFieldHardDrive()
    {
        return $this->fieldHardDrive;
    }

    /**
     * getFieldColor gets the class attribute fieldColor value
     *
     * The attribute fieldColor maps the field field_color defined as varchar(20).<br>
     * Comment for field field_color: Not specified.
     * @return string $fieldColor
     * @category Accessor of $fieldColor
     */
    public function getFieldColor()
    {
        return $this->fieldColor;
    }

    /**
     * getFieldLocation gets the class attribute fieldLocation value
     *
     * The attribute fieldLocation maps the field field_location defined as varchar(40).<br>
     * Comment for field field_location: Not specified.
     * @return string $fieldLocation
     * @category Accessor of $fieldLocation
     */
    public function getFieldLocation()
    {
        return $this->fieldLocation;
    }

    /**
     * getFieldExtraInfo gets the class attribute fieldExtraInfo value
     *
     * The attribute fieldExtraInfo maps the field field_extra_info defined as mediumtext.<br>
     * Comment for field field_extra_info: Not specified.
     * @return string $fieldExtraInfo
     * @category Accessor of $fieldExtraInfo
     */
    public function getFieldExtraInfo()
    {
        return $this->fieldExtraInfo;
    }

    /**
     * getFieldTitle gets the class attribute fieldTitle value
     *
     * The attribute fieldTitle maps the field field_title defined as varchar(125).<br>
     * Comment for field field_title: Not specified.
     * @return string $fieldTitle
     * @category Accessor of $fieldTitle
     */
    public function getFieldTitle()
    {
        return $this->fieldTitle;
    }

    /**
     * getFieldUploadDate gets the class attribute fieldUploadDate value
     *
     * The attribute fieldUploadDate maps the field field_upload_date defined as timestamp.<br>
     * Comment for field field_upload_date: Not specified.
     * @return string $fieldUploadDate
     * @category Accessor of $fieldUploadDate
     */
    public function getFieldUploadDate()
    {
        return $this->fieldUploadDate;
    }

    /**
     * getFieldTotalView gets the class attribute fieldTotalView value
     *
     * The attribute fieldTotalView maps the field field_total_view defined as int(10).<br>
     * Comment for field field_total_view: Not specified.
     * @return int $fieldTotalView
     * @category Accessor of $fieldTotalView
     */
    public function getFieldTotalView()
    {
        return $this->fieldTotalView;
    }

    /**
     * getFieldStatus gets the class attribute fieldStatus value
     *
     * The attribute fieldStatus maps the field field_status defined as varchar(10).<br>
     * Comment for field field_status: Not specified.
     * @return string $fieldStatus
     * @category Accessor of $fieldStatus
     */
    public function getFieldStatus()
    {
        return $this->fieldStatus;
    }

    /**
     * getFieldMarketCategory gets the class attribute fieldMarketCategory value
     *
     * The attribute fieldMarketCategory maps the field field_market_category defined as varchar(10).<br>
     * Comment for field field_market_category: Not specified.
     * @return string $fieldMarketCategory
     * @category Accessor of $fieldMarketCategory
     */
    public function getFieldMarketCategory()
    {
        return $this->fieldMarketCategory;
    }

    /**
     * getFieldTableType gets the class attribute fieldTableType value
     *
     * The attribute fieldTableType maps the field field_table_type defined as int(10).<br>
     * Comment for field field_table_type: Not specified.
     * @return int $fieldTableType
     * @category Accessor of $fieldTableType
     */
    public function getFieldTableType()
    {
        return $this->fieldTableType;
    }

    /**
     * Gets DDL SQL code of the table item_computer
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
        return "item_computer";
    }

    /**
     * The HtItemComputer constructor
     *
     * It creates and initializes an object in two way:
     *  - with null (not fetched) data if none $id is given.
     *  - with a fetched data row from the table item_computer having id=$id
     * @param int $id. If omitted an empty (not fetched) instance is created.
     * @return HtItemComputer Object
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
     * Fetchs a table row of item_computer into the object.
     *
     * Fetched table fields values are assigned to class attributes and they can be managed by using
     * the accessors/modifiers methods of the class.
     * @param int $id the primary key id value of table item_computer which identifies the row to select.
     * @return int affected selected row
     * @category DML
     */
    public function select($id)
    {
        $sql =  "SELECT * FROM item_computer WHERE id={$this->parseValue($id,'int')}";
        $this->resetLastSqlError();
        $result =  $this->query($sql);
        $this->resultSet=$result;
        $this->lastSql = $sql;
        if ($result){
            $rowObject = $result->fetch_object();
            @$this->id = (integer)$rowObject->id;
            @$this->idTemp = (integer)$rowObject->id_temp;
            @$this->idUser = (integer)$rowObject->id_user;
            @$this->idCatergory = (integer)$rowObject->id_catergory;
            @$this->idContactCategory = (integer)$rowObject->id_contact_category;
            @$this->fieldPrice = $this->replaceAposBackSlash($rowObject->field_price);
            @$this->fieldPriceNego = $this->replaceAposBackSlash($rowObject->field_price_nego);
            @$this->fieldPriceCurrency = $this->replaceAposBackSlash($rowObject->field_price_currency);
            @$this->fieldMade = $this->replaceAposBackSlash($rowObject->field_made);
            @$this->fieldOs = $this->replaceAposBackSlash($rowObject->field_os);
            @$this->fieldModel = $this->replaceAposBackSlash($rowObject->field_model);
            @$this->fieldProcessor = $this->replaceAposBackSlash($rowObject->field_processor);
            @$this->fieldRam = $this->replaceAposBackSlash($rowObject->field_ram);
            @$this->fieldHardDrive = $this->replaceAposBackSlash($rowObject->field_hard_drive);
            @$this->fieldColor = $this->replaceAposBackSlash($rowObject->field_color);
            @$this->fieldLocation = $this->replaceAposBackSlash($rowObject->field_location);
            @$this->fieldExtraInfo = $this->replaceAposBackSlash($rowObject->field_extra_info);
            @$this->fieldTitle = $this->replaceAposBackSlash($rowObject->field_title);
            @$this->fieldUploadDate = $rowObject->field_upload_date;
            @$this->fieldTotalView = (integer)$rowObject->field_total_view;
            @$this->fieldStatus = $this->replaceAposBackSlash($rowObject->field_status);
            @$this->fieldMarketCategory = $this->replaceAposBackSlash($rowObject->field_market_category);
            @$this->fieldTableType = (integer)$rowObject->field_table_type;
            $this->allowUpdate = true;
        } else {
            $this->lastSqlError = $this->sqlstate . " - ". $this->error;
        }
        return $this->affected_rows;
    }

    /**
     * Deletes a specific row from the table item_computer
     * @param int $id the primary key id value of table item_computer which identifies the row to delete.
     * @return int affected deleted row
     * @category DML
     */
    public function delete($id)
    {
        $sql = "DELETE FROM item_computer WHERE id={$this->parseValue($id,'int')}";
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->lastSql = $sql;
        if (!$result) {
            $this->lastSqlError = $this->sqlstate . " - ". $this->error;
        }
        return $this->affected_rows;
    }

    /**
     * Insert the current object into a new table row of item_computer
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
            INSERT INTO item_computer
            (id_temp,id_user,id_catergory,id_contact_category,field_price,field_price_nego,field_price_currency,field_made,field_os,field_model,field_processor,field_ram,field_hard_drive,field_color,field_location,field_extra_info,field_title,field_upload_date,field_total_view,field_status,field_market_category,field_table_type)
            VALUES(
			{$this->parseValue($this->idTemp)},
			{$this->parseValue($this->idUser)},
			{$this->parseValue($this->idCatergory)},
			{$this->parseValue($this->idContactCategory)},
			{$this->parseValue($this->fieldPrice,'notNumber')},
			{$this->parseValue($this->fieldPriceNego,'notNumber')},
			{$this->parseValue($this->fieldPriceCurrency,'notNumber')},
			{$this->parseValue($this->fieldMade,'notNumber')},
			{$this->parseValue($this->fieldOs,'notNumber')},
			{$this->parseValue($this->fieldModel,'notNumber')},
			{$this->parseValue($this->fieldProcessor,'notNumber')},
			{$this->parseValue($this->fieldRam,'notNumber')},
			{$this->parseValue($this->fieldHardDrive,'notNumber')},
			{$this->parseValue($this->fieldColor,'notNumber')},
			{$this->parseValue($this->fieldLocation,'notNumber')},
			{$this->parseValue($this->fieldExtraInfo,'notNumber')},
			{$this->parseValue($this->fieldTitle,'notNumber')},
			{$this->parseValue($this->fieldUploadDate,'notNumber')},
			{$this->parseValue($this->fieldTotalView)},
			{$this->parseValue($this->fieldStatus,'notNumber')},
			{$this->parseValue($this->fieldMarketCategory,'notNumber')},
			{$this->parseValue($this->fieldTableType)})
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
     * Updates a specific row from the table item_computer with the values of the current object.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating of selected row.<br>
     * Null values are used for all attributes not previously setted.
     * @param int $id the primary key id value of table item_computer which identifies the row to update.
     * @return mixed MySQL update result
     * @category DML
     */
    public function update($id)
    {
        // $constants = get_defined_constants();
        if ($this->allowUpdate) {
            $sql = <<< SQL
            UPDATE
                item_computer
            SET 
				id_temp={$this->parseValue($this->idTemp)},
				id_user={$this->parseValue($this->idUser)},
				id_catergory={$this->parseValue($this->idCatergory)},
				id_contact_category={$this->parseValue($this->idContactCategory)},
				field_price={$this->parseValue($this->fieldPrice,'notNumber')},
				field_price_nego={$this->parseValue($this->fieldPriceNego,'notNumber')},
				field_price_currency={$this->parseValue($this->fieldPriceCurrency,'notNumber')},
				field_made={$this->parseValue($this->fieldMade,'notNumber')},
				field_os={$this->parseValue($this->fieldOs,'notNumber')},
				field_model={$this->parseValue($this->fieldModel,'notNumber')},
				field_processor={$this->parseValue($this->fieldProcessor,'notNumber')},
				field_ram={$this->parseValue($this->fieldRam,'notNumber')},
				field_hard_drive={$this->parseValue($this->fieldHardDrive,'notNumber')},
				field_color={$this->parseValue($this->fieldColor,'notNumber')},
				field_location={$this->parseValue($this->fieldLocation,'notNumber')},
				field_extra_info={$this->parseValue($this->fieldExtraInfo,'notNumber')},
				field_title={$this->parseValue($this->fieldTitle,'notNumber')},
				field_upload_date={$this->parseValue($this->fieldUploadDate,'notNumber')},
				field_total_view={$this->parseValue($this->fieldTotalView)},
				field_status={$this->parseValue($this->fieldStatus,'notNumber')},
				field_market_category={$this->parseValue($this->fieldMarketCategory,'notNumber')},
				field_table_type={$this->parseValue($this->fieldTableType)}
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
     * Facility for updating a row of item_computer previously loaded.
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
