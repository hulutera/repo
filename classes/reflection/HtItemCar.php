<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/class.fileuploader.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/classes/reflection/class.config.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/classes/reflection/HtUserAll.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/centerColumns.php';

/**
 * Class HtItemCar
 * @extends MySqlRecord
 * @filesource HtItemCar.php
 */

// namespace hulutera;

class HtItemCar extends MySqlRecord
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
     * Class attribute for mapping the primary key id of table item_car
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
     * Class attribute for mapping table field field_contact_method
     *
     * Comment for field field_contact_method: Not specified.<br>
     * Field information:
     *  - Data type: varchar(50)
     *  - Null : NO
     *  - DB Index: 
     *  - Default: phone
     *  - Extra:  
     * @var string $fieldContactMethod
     */
    private $fieldContactMethod;

    /**
     * Class attribute for mapping table field field_price_rent
     *
     * Comment for field field_price_rent: Not specified.<br>
     * Field information:
     *  - Data type: varchar(40)
     *  - Null : YES
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var string $fieldPriceRent
     */
    private $fieldPriceRent;

    /**
     * Class attribute for mapping table field field_price_sell
     *
     * Comment for field field_price_sell: Not specified.<br>
     * Field information:
     *  - Data type: varchar(40)
     *  - Null : YES
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var string $fieldPriceSell
     */
    private $fieldPriceSell;

    /**
     * Class attribute for mapping table field field_price_nego
     *
     * Comment for field field_price_nego: Not specified.<br>
     * Field information:
     *  - Data type: varchar(20)
     *  - Null : YES
     *  - DB Index: 
     *  - Default: Negotiable
     *  - Extra:  
     * @var string $fieldPriceNego
     */
    private $fieldPriceNego;

    /**
     * Class attribute for mapping table field field_price_rate
     *
     * Comment for field field_price_rate: Not specified.<br>
     * Field information:
     *  - Data type: varchar(20)
     *  - Null : YES
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var string $fieldPriceRate
     */
    private $fieldPriceRate;

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
     * Class attribute for mapping table field field_make
     *
     * Comment for field field_make: Not specified.<br>
     * Field information:
     *  - Data type: varchar(20)
     *  - Null : YES
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var string $fieldMake
     */
    private $fieldMake;

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
     * Class attribute for mapping table field field_model_year
     *
     * Comment for field field_model_year: Not specified.<br>
     * Field information:
     *  - Data type: year(4)
     *  - Null : YES
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var int $fieldModelYear
     */
    private $fieldModelYear;

    /**
     * Class attribute for mapping table field field_no_of_seat
     *
     * Comment for field field_no_of_seat: Not specified.<br>
     * Field information:
     *  - Data type: int(40)
     *  - Null : YES
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var int $fieldNoOfSeat
     */
    private $fieldNoOfSeat;

    /**
     * Class attribute for mapping table field field_fuel_type
     *
     * Comment for field field_fuel_type: Not specified.<br>
     * Field information:
     *  - Data type: varchar(20)
     *  - Null : YES
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var string $fieldFuelType
     */
    private $fieldFuelType;

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
     * Class attribute for mapping table field field_gear_type
     *
     * Comment for field field_gear_type: Not specified.<br>
     * Field information:
     *  - Data type: varchar(20)
     *  - Null : YES
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var string $fieldGearType
     */
    private $fieldGearType;

    /**
     * Class attribute for mapping table field field_milage
     *
     * Comment for field field_milage: Not specified.<br>
     * Field information:
     *  - Data type: varchar(20)
     *  - Null : YES
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var string $fieldMilage
     */
    private $fieldMilage;

    /**
     * Class attribute for mapping table field field_image
     *
     * Comment for field field_image: Not specified.<br>
     * Field information:
     *  - Data type: longtext
     *  - Null : YES
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var string $fieldImage
     */
    private $fieldImage;

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
     *  - Data type: longtext
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
     *  - Null : NO
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
     *  - Data type: varchar(15)
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
     *  - Default: 1
     *  - Extra:  
     * @var int $fieldTableType
     */
    private $fieldTableType;

    /**
     * Class attribute for storing the SQL DDL of table item_car
     * @var string base64 encoded string for DDL
     */
    private $ddl = "Q1JFQVRFIFRBQkxFIGBpdGVtX2NhcmAgKAogIGBpZGAgaW50KDQwKSBOT1QgTlVMTCBBVVRPX0lOQ1JFTUVOVCwKICBgaWRfdGVtcGAgaW50KDIwKSBERUZBVUxUIE5VTEwsCiAgYGlkX3VzZXJgIGludCg0MCkgTk9UIE5VTEwsCiAgYGlkX2NhdGVnb3J5YCBpbnQoNDApIE5PVCBOVUxMLAogIGBmaWVsZF9jb250YWN0X21ldGhvZGAgdmFyY2hhcig1MCkgTk9UIE5VTEwgREVGQVVMVCAncGhvbmUnLAogIGBmaWVsZF9wcmljZV9yZW50YCB2YXJjaGFyKDQwKSBERUZBVUxUIE5VTEwsCiAgYGZpZWxkX3ByaWNlX3NlbGxgIHZhcmNoYXIoNDApIERFRkFVTFQgTlVMTCwKICBgZmllbGRfcHJpY2VfbmVnb2AgdmFyY2hhcigyMCkgREVGQVVMVCAnTmVnb3RpYWJsZScsCiAgYGZpZWxkX3ByaWNlX3JhdGVgIHZhcmNoYXIoMjApIERFRkFVTFQgTlVMTCwKICBgZmllbGRfcHJpY2VfY3VycmVuY3lgIHZhcmNoYXIoMjApIE5PVCBOVUxMIERFRkFVTFQgJ0JpcnInLAogIGBmaWVsZF9tYWtlYCB2YXJjaGFyKDIwKSBERUZBVUxUIE5VTEwsCiAgYGZpZWxkX21vZGVsYCB2YXJjaGFyKDIwKSBERUZBVUxUIE5VTEwsCiAgYGZpZWxkX21vZGVsX3llYXJgIHllYXIoNCkgREVGQVVMVCBOVUxMLAogIGBmaWVsZF9ub19vZl9zZWF0YCBpbnQoNDApIERFRkFVTFQgTlVMTCwKICBgZmllbGRfZnVlbF90eXBlYCB2YXJjaGFyKDIwKSBERUZBVUxUIE5VTEwsCiAgYGZpZWxkX2NvbG9yYCB2YXJjaGFyKDIwKSBERUZBVUxUIE5VTEwsCiAgYGZpZWxkX2dlYXJfdHlwZWAgdmFyY2hhcigyMCkgREVGQVVMVCBOVUxMLAogIGBmaWVsZF9taWxhZ2VgIHZhcmNoYXIoMjApIERFRkFVTFQgTlVMTCwKICBgZmllbGRfaW1hZ2VgIGxvbmd0ZXh0LAogIGBmaWVsZF9sb2NhdGlvbmAgdmFyY2hhcig0MCkgREVGQVVMVCBOVUxMLAogIGBmaWVsZF9leHRyYV9pbmZvYCBsb25ndGV4dCwKICBgZmllbGRfdGl0bGVgIHZhcmNoYXIoMTI1KSBOT1QgTlVMTCwKICBgZmllbGRfdXBsb2FkX2RhdGVgIHRpbWVzdGFtcCBOT1QgTlVMTCBERUZBVUxUIENVUlJFTlRfVElNRVNUQU1QIE9OIFVQREFURSBDVVJSRU5UX1RJTUVTVEFNUCwKICBgZmllbGRfdG90YWxfdmlld2AgaW50KDEwKSBERUZBVUxUIE5VTEwsCiAgYGZpZWxkX3N0YXR1c2AgdmFyY2hhcigxMCkgTk9UIE5VTEwgREVGQVVMVCAncGVuZGluZycsCiAgYGZpZWxkX21hcmtldF9jYXRlZ29yeWAgdmFyY2hhcigxNSkgTk9UIE5VTEwsCiAgYGZpZWxkX3RhYmxlX3R5cGVgIGludCgxMCkgTk9UIE5VTEwgREVGQVVMVCAnMScsCiAgUFJJTUFSWSBLRVkgKGBpZGApLAogIEtFWSBgdUlEX0ZLMWAgKGBpZF91c2VyYCksCiAgS0VZIGBjY2F0ZWdvcnlJRF9GS2AgKGBpZF9jYXRlZ29yeWApLAogIENPTlNUUkFJTlQgYGl0ZW1fY2FyX2liZmtfMWAgRk9SRUlHTiBLRVkgKGBpZF91c2VyYCkgUkVGRVJFTkNFUyBgdXNlcl9hbGxgIChgaWRgKSBPTiBERUxFVEUgQ0FTQ0FERSBPTiBVUERBVEUgQ0FTQ0FERSwKICBDT05TVFJBSU5UIGBpdGVtX2Nhcl9pYmZrXzJgIEZPUkVJR04gS0VZIChgaWRfY2F0ZWdvcnlgKSBSRUZFUkVOQ0VTIGBjYXRlZ29yeV9jYXJgIChgaWRgKSBPTiBERUxFVEUgQ0FTQ0FERSBPTiBVUERBVEUgQ0FTQ0FERQopIEVOR0lORT1Jbm5vREIgQVVUT19JTkNSRU1FTlQ9MzAgREVGQVVMVCBDSEFSU0VUPWxhdGluMQ==";

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
     * setIdTemp Sets the class attribute idTemp with a given value
     *
     * The attribute idTemp maps the field id_temp defined as int(20).<br>
     * Comment for field id_temp: Not specified.<br>
     * @param int $idTemp
     * @category Modifier
     */
    public function setIdTemp($idTemp)
    {
        $this->idTemp = (int) $idTemp;
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
        $this->idUser = (int) $idUser;
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
        $this->idCategory = (int) $idCategory;
    }

    /**
     * setFieldContactMethod Sets the class attribute fieldContactMethod with a given value
     *
     * The attribute fieldContactMethod maps the field field_contact_method defined as varchar(50).<br>
     * Comment for field field_contact_method: Not specified.<br>
     * @param string $fieldContactMethod
     * @category Modifier
     */
    public function setFieldContactMethod($fieldContactMethod)
    {
        $this->fieldContactMethod = (string) $fieldContactMethod;
    }

    /**
     * setFieldPriceRent Sets the class attribute fieldPriceRent with a given value
     *
     * The attribute fieldPriceRent maps the field field_price_rent defined as varchar(40).<br>
     * Comment for field field_price_rent: Not specified.<br>
     * @param string $fieldPriceRent
     * @category Modifier
     */
    public function setFieldPriceRent($fieldPriceRent)
    {
        $this->fieldPriceRent = (string) $fieldPriceRent;
    }

    /**
     * setFieldPriceSell Sets the class attribute fieldPriceSell with a given value
     *
     * The attribute fieldPriceSell maps the field field_price_sell defined as varchar(40).<br>
     * Comment for field field_price_sell: Not specified.<br>
     * @param string $fieldPriceSell
     * @category Modifier
     */
    public function setFieldPriceSell($fieldPriceSell)
    {
        $this->fieldPriceSell = (string) $fieldPriceSell;
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
        $this->fieldPriceNego = (string) $fieldPriceNego;
    }

    /**
     * setFieldPriceRate Sets the class attribute fieldPriceRate with a given value
     *
     * The attribute fieldPriceRate maps the field field_price_rate defined as varchar(20).<br>
     * Comment for field field_price_rate: Not specified.<br>
     * @param string $fieldPriceRate
     * @category Modifier
     */
    public function setFieldPriceRate($fieldPriceRate)
    {
        $this->fieldPriceRate = (string) $fieldPriceRate;
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
        $this->fieldPriceCurrency = (string) $fieldPriceCurrency;
    }

    /**
     * setFieldMake Sets the class attribute fieldMake with a given value
     *
     * The attribute fieldMake maps the field field_make defined as varchar(20).<br>
     * Comment for field field_make: Not specified.<br>
     * @param string $fieldMake
     * @category Modifier
     */
    public function setFieldMake($fieldMake)
    {
        $this->fieldMake = (string) $fieldMake;
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
        $this->fieldModel = (string) $fieldModel;
    }

    /**
     * setFieldModelYear Sets the class attribute fieldModelYear with a given value
     *
     * The attribute fieldModelYear maps the field field_model_year defined as year(4).<br>
     * Comment for field field_model_year: Not specified.<br>
     * @param int $fieldModelYear
     * @category Modifier
     */
    public function setFieldModelYear($fieldModelYear)
    {
        $this->fieldModelYear = (int) $fieldModelYear;
    }

    /**
     * setFieldNoOfSeat Sets the class attribute fieldNoOfSeat with a given value
     *
     * The attribute fieldNoOfSeat maps the field field_no_of_seat defined as int(40).<br>
     * Comment for field field_no_of_seat: Not specified.<br>
     * @param int $fieldNoOfSeat
     * @category Modifier
     */
    public function setFieldNoOfSeat($fieldNoOfSeat)
    {
        $this->fieldNoOfSeat = (int) $fieldNoOfSeat;
    }

    /**
     * setFieldFuelType Sets the class attribute fieldFuelType with a given value
     *
     * The attribute fieldFuelType maps the field field_fuel_type defined as varchar(20).<br>
     * Comment for field field_fuel_type: Not specified.<br>
     * @param string $fieldFuelType
     * @category Modifier
     */
    public function setFieldFuelType($fieldFuelType)
    {
        $this->fieldFuelType = (string) $fieldFuelType;
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
        $this->fieldColor = (string) $fieldColor;
    }

    /**
     * setFieldGearType Sets the class attribute fieldGearType with a given value
     *
     * The attribute fieldGearType maps the field field_gear_type defined as varchar(20).<br>
     * Comment for field field_gear_type: Not specified.<br>
     * @param string $fieldGearType
     * @category Modifier
     */
    public function setFieldGearType($fieldGearType)
    {
        $this->fieldGearType = (string) $fieldGearType;
    }

    /**
     * setFieldMilage Sets the class attribute fieldMilage with a given value
     *
     * The attribute fieldMilage maps the field field_milage defined as varchar(20).<br>
     * Comment for field field_milage: Not specified.<br>
     * @param string $fieldMilage
     * @category Modifier
     */
    public function setFieldMilage($fieldMilage)
    {
        $this->fieldMilage = (string) $fieldMilage;
    }

    /**
     * setFieldImage Sets the class attribute fieldImage with a given value
     *
     * The attribute fieldImage maps the field field_image defined as longtext.<br>
     * Comment for field field_image: Not specified.<br>
     * @param string $fieldImage
     * @category Modifier
     */
    public function setFieldImage($fieldImage)
    {
        $this->fieldImage = (string) $fieldImage;
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
        $this->fieldLocation = (string) $fieldLocation;
    }

    /**
     * setFieldExtraInfo Sets the class attribute fieldExtraInfo with a given value
     *
     * The attribute fieldExtraInfo maps the field field_extra_info defined as longtext.<br>
     * Comment for field field_extra_info: Not specified.<br>
     * @param string $fieldExtraInfo
     * @category Modifier
     */
    public function setFieldExtraInfo($fieldExtraInfo)
    {
        $this->fieldExtraInfo = (string) $fieldExtraInfo;
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
        $this->fieldTitle = (string) $fieldTitle;
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
        $this->fieldUploadDate = (string) $fieldUploadDate;
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
        $this->fieldTotalView = (int) $fieldTotalView;
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
        $this->fieldStatus = (string) $fieldStatus;
    }

    /**
     * setFieldMarketCategory Sets the class attribute fieldMarketCategory with a given value
     *
     * The attribute fieldMarketCategory maps the field field_market_category defined as varchar(15).<br>
     * Comment for field field_market_category: Not specified.<br>
     * @param string $fieldMarketCategory
     * @category Modifier
     */
    public function setFieldMarketCategory($fieldMarketCategory)
    {
        $this->fieldMarketCategory = (string) $fieldMarketCategory;
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
        $this->fieldTableType = (int) $fieldTableType;
    }

    /**
     * setField from $_POST
     *
     * Comment for field field_table_type: Not specified.<br>
     * @param int $fieldTableType
     * @category Modifier
     */
    private function setFieldPost()
    {
        $_item = $_GET['table'];
        $_userId = $_SESSION['uID'];
        $result =  $this->query("SELECT id_temp FROM $_item ORDER BY id DESC LIMIT 1");
        $_itemTempId = (int) $result->fetch_object()->id_temp + 1;
        $this->setFieldLocation($_POST['fieldLocation']);
        $this->setIdCategory($_POST['idCategory']);
        $this->setIdUser($_userId);
        $this->setIdTemp($_itemTempId);
        $this->setFieldMake($_POST['fieldMake']);
        $this->setFieldModel($_POST['fieldModel']);
        $this->setFieldModelYear($_POST['fieldModelYear']);
        $this->setFieldGearType($_POST['fieldGearType']);
        $this->setFieldFuelType($_POST['fieldFuelType']);
        $this->setFieldMilage($_POST['fieldMilage']);
        $this->setFieldNoOfSeat($_POST['fieldNoOfSeat']);
        $this->setFieldColor($_POST['fieldColor']);
        $this->setFieldPriceRent($_POST['fieldPriceRent']);
        $this->setFieldPriceRate($_POST['fieldPriceRate']);
        $this->setFieldPriceSell($_POST['fieldPriceSell']);
        $this->setFieldPriceCurrency($_POST['fieldPriceCurrency']);
        $this->setFieldPriceNego($_POST['fieldPriceNego']);
        $this->setFieldTitle($_POST['fieldTitle']);
        $this->setFieldContactMethod($_POST['fieldContactMethod']);
        $this->setFieldImage($_POST['fileuploader-list-files']);
        $this->setFieldUploadDate(date("Y-m-d H:i:s"));
        $this->setFieldStatus("pending");

        if (isset($_POST['fieldPriceRent']) && isset($_POST['fieldPriceSell'])) {
            $market = "rent and sell";
        } else if (!isset($_POST['fieldPriceRent']) && isset($_POST['fieldPriceSell'])) {
            $market = "sell";
        } else if (isset($_POST['fieldPriceRent']) && !isset($_POST['fieldPriceSell'])) {
            $market = "rent";
        }
        $this->setFieldMarketCategory($market);
        $this->setFieldTableType(1);

        //create a folder for image upload
        $directory = $_SERVER['DOCUMENT_ROOT'] . '/upload/' . $_item . '/user_id_' . $_userId . '/item_temp_id_' . $_itemTempId;
        mkdir($directory, 0777, true);
        while (!file_exists($directory)) {
            mkdir($directory, 0777, true);
        }

        //create a prefic for all images, with userId and item tempId
        $imgPrefix = 'hulutera_user_id_' . $_userId . '_item_temp_id_' . $_itemTempId . '_';

        // initialize FileUploader
        $FileUploader = new FileUploader('files', array(
            'limit' => null,
            'maxSize' => null,
            'fileMaxSize' => null,
            'extensions' => null,
            'required' => true,
            'uploadDir' => $directory . '/',
            'title' => 'hulutera',
            'replace' => false,
            'editor' => array(
                'maxWidth' => 640,
                'maxHeight' => 480,
                'quality' => 90
            ),
            'listInput' => true,
            'files' => null,
            'id' => $imgPrefix
        ));

        // unlink the files
        // !important only for preloaded files
        // you will need to give the array with appendend files in 'files' option of the fileUploader
        foreach ($FileUploader->getRemovedFiles('file') as $key => $value) {
            unlink('../uploads/' . $value['name']);
        }


        // call to upload the files
        $data = $FileUploader->upload();

        // if uploaded and success
        if ($data['isSuccess'] && count($data['files']) > 0) {
            // get uploaded files
            $uploadedFiles = $data['files'];
        }
        // if warnings
        if ($data['hasWarnings']) {
            $warnings = $data['warnings'];
            header('Location: ../../template.upload.php?type=' . $this->getTableName() . '&=' . $warnings);
        }

        // get the fileList and encode in json
        $fileList = json_encode($FileUploader->getFileList('name'));
        $this->setFieldImage($fileList);
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
     * getFieldContactMethod gets the class attribute fieldContactMethod value
     *
     * The attribute fieldContactMethod maps the field field_contact_method defined as varchar(50).<br>
     * Comment for field field_contact_method: Not specified.
     * @return string $fieldContactMethod
     * @category Accessor of $fieldContactMethod
     */
    public function getFieldContactMethod()
    {
        return $this->fieldContactMethod;
    }

    /**
     * getFieldPriceRent gets the class attribute fieldPriceRent value
     *
     * The attribute fieldPriceRent maps the field field_price_rent defined as varchar(40).<br>
     * Comment for field field_price_rent: Not specified.
     * @return string $fieldPriceRent
     * @category Accessor of $fieldPriceRent
     */
    public function getFieldPriceRent()
    {
        return $this->fieldPriceRent;
    }

    /**
     * getFieldPriceSell gets the class attribute fieldPriceSell value
     *
     * The attribute fieldPriceSell maps the field field_price_sell defined as varchar(40).<br>
     * Comment for field field_price_sell: Not specified.
     * @return string $fieldPriceSell
     * @category Accessor of $fieldPriceSell
     */
    public function getFieldPriceSell()
    {
        return $this->fieldPriceSell;
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
     * getFieldPriceRate gets the class attribute fieldPriceRate value
     *
     * The attribute fieldPriceRate maps the field field_price_rate defined as varchar(20).<br>
     * Comment for field field_price_rate: Not specified.
     * @return string $fieldPriceRate
     * @category Accessor of $fieldPriceRate
     */
    public function getFieldPriceRate()
    {
        return $this->fieldPriceRate;
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
     * getFieldMake gets the class attribute fieldMake value
     *
     * The attribute fieldMake maps the field field_make defined as varchar(20).<br>
     * Comment for field field_make: Not specified.
     * @return string $fieldMake
     * @category Accessor of $fieldMake
     */
    public function getFieldMake()
    {
        return $this->fieldMake;
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
     * getFieldModelYear gets the class attribute fieldModelYear value
     *
     * The attribute fieldModelYear maps the field field_model_year defined as year(4).<br>
     * Comment for field field_model_year: Not specified.
     * @return int $fieldModelYear
     * @category Accessor of $fieldModelYear
     */
    public function getFieldModelYear()
    {
        return $this->fieldModelYear;
    }

    /**
     * getFieldNoOfSeat gets the class attribute fieldNoOfSeat value
     *
     * The attribute fieldNoOfSeat maps the field field_no_of_seat defined as int(40).<br>
     * Comment for field field_no_of_seat: Not specified.
     * @return int $fieldNoOfSeat
     * @category Accessor of $fieldNoOfSeat
     */
    public function getFieldNoOfSeat()
    {
        return $this->fieldNoOfSeat;
    }

    /**
     * getFieldFuelType gets the class attribute fieldFuelType value
     *
     * The attribute fieldFuelType maps the field field_fuel_type defined as varchar(20).<br>
     * Comment for field field_fuel_type: Not specified.
     * @return string $fieldFuelType
     * @category Accessor of $fieldFuelType
     */
    public function getFieldFuelType()
    {
        return $this->fieldFuelType;
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
     * getFieldGearType gets the class attribute fieldGearType value
     *
     * The attribute fieldGearType maps the field field_gear_type defined as varchar(20).<br>
     * Comment for field field_gear_type: Not specified.
     * @return string $fieldGearType
     * @category Accessor of $fieldGearType
     */
    public function getFieldGearType()
    {
        return $this->fieldGearType;
    }

    /**
     * getFieldMilage gets the class attribute fieldMilage value
     *
     * The attribute fieldMilage maps the field field_milage defined as varchar(20).<br>
     * Comment for field field_milage: Not specified.
     * @return string $fieldMilage
     * @category Accessor of $fieldMilage
     */
    public function getFieldMilage()
    {
        return $this->fieldMilage;
    }

    /**
     * getFieldImage gets the class attribute fieldImage value
     *
     * The attribute fieldImage maps the field field_image defined as longtext.<br>
     * Comment for field field_image: Not specified.
     * @return string $fieldImage
     * @category Accessor of $fieldImage
     */
    public function getFieldImage()
    {
        return $this->fieldImage;
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
     * The attribute fieldExtraInfo maps the field field_extra_info defined as longtext.<br>
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
     * The attribute fieldMarketCategory maps the field field_market_category defined as varchar(15).<br>
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
     * Gets DDL SQL code of the table item_car
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
        return "item_car";
    }

    /**
     * The HtItemCar constructor
     *
     * It creates and initializes an object in two way:
     *  - with null (not fetched) data if none $id is given.
     *  - with a fetched data row from the table item_car having id=$id
     * @param int $id. If omitted an empty (not fetched) instance is created.
     * @return HtItemCar Object
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
     * Fetchs a table row of item_car into the object.
     *
     * Fetched table fields values are assigned to class attributes and they can be managed by using
     * the accessors/modifiers methods of the class.
     * @param int $id the primary key id value of table item_car which identifies the row to select.
     * @return int affected selected row
     * @category DML
     */
    public function select($id)
    {
        if ($id == "*") {
            $sql = "SELECT * FROM item_car";
        } else { //id
            $sql =  "SELECT * FROM item_car WHERE id={$this->parseValue($id, 'int')}";
        }

        $this->resetLastSqlError();
        $result =  $this->query($sql);
        $this->resultSet = $result;
        $this->lastSql = $sql;
        if ($result) {
            $rowObject = $result->fetch_object();
            @$this->id = (int) $rowObject->id;
            @$this->idTemp = (int) $rowObject->id_temp;
            @$this->idUser = (int) $rowObject->id_user;
            @$this->idCategory = (int) $rowObject->id_category;
            @$this->fieldContactMethod = $this->replaceAposBackSlash($rowObject->field_contact_method);
            @$this->fieldPriceRent = $this->replaceAposBackSlash($rowObject->field_price_rent);
            @$this->fieldPriceSell = $this->replaceAposBackSlash($rowObject->field_price_sell);
            @$this->fieldPriceNego = $this->replaceAposBackSlash($rowObject->field_price_nego);
            @$this->fieldPriceRate = $this->replaceAposBackSlash($rowObject->field_price_rate);
            @$this->fieldPriceCurrency = $this->replaceAposBackSlash($rowObject->field_price_currency);
            @$this->fieldMake = $this->replaceAposBackSlash($rowObject->field_make);
            @$this->fieldModel = $this->replaceAposBackSlash($rowObject->field_model);
            @$this->fieldModelYear = $rowObject->field_model_year;
            @$this->fieldNoOfSeat = (int) $rowObject->field_no_of_seat;
            @$this->fieldFuelType = $this->replaceAposBackSlash($rowObject->field_fuel_type);
            @$this->fieldColor = $this->replaceAposBackSlash($rowObject->field_color);
            @$this->fieldGearType = $this->replaceAposBackSlash($rowObject->field_gear_type);
            @$this->fieldMilage = $this->replaceAposBackSlash($rowObject->field_milage);
            @$this->fieldImage = $this->replaceAposBackSlash($rowObject->field_image);
            @$this->fieldLocation = $this->replaceAposBackSlash($rowObject->field_location);
            @$this->fieldExtraInfo = $this->replaceAposBackSlash($rowObject->field_extra_info);
            @$this->fieldTitle = $this->replaceAposBackSlash($rowObject->field_title);
            @$this->fieldUploadDate = $rowObject->field_upload_date;
            @$this->fieldTotalView = (int) $rowObject->field_total_view;
            @$this->fieldStatus = $this->replaceAposBackSlash($rowObject->field_status);
            @$this->fieldMarketCategory = $this->replaceAposBackSlash($rowObject->field_market_category);
            @$this->fieldTableType = (int) $rowObject->field_table_type;
            $this->allowUpdate = true;
        } else {
            $this->lastSqlError = $this->sqlstate . " - " . $this->error;
        }
        return $this->affected_rows;
    }

    /**
     * Deletes a specific row from the table item_car
     * @param int $id the primary key id value of table item_car which identifies the row to delete.
     * @return int affected deleted row
     * @category DML
     */
    public function delete($id)
    {
        $sql = "DELETE FROM item_car WHERE id={$this->parseValue($id, 'int')}";
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->lastSql = $sql;
        if (!$result) {
            $this->lastSqlError = $this->sqlstate . " - " . $this->error;
        }
        return $this->affected_rows;
    }

    /**
     * Insert the current object into a new table row of item_car
     *
     * All class attributes values defined for mapping all table fields are automatically used during inserting
     * @return mixed MySQL insert result
     * @category DML
     */
    public function insert()
    {
        $this->setFieldPost();

        if ($this->isPkAutoIncrement) {
            $this->id = "";
        }
        // $constants = get_defined_constants();
        $sql = <<< SQL
            INSERT INTO item_car
            (id_temp,id_user,id_category,field_contact_method,field_price_rent,field_price_sell,field_price_nego,field_price_rate,field_price_currency,field_make,field_model,field_model_year,field_no_of_seat,field_fuel_type,field_color,field_gear_type,field_milage,field_image,field_location,field_extra_info,field_title,field_upload_date,field_total_view,field_status,field_market_category,field_table_type)
            VALUES(
			{$this->parseValue($this->idTemp)},
			{$this->parseValue($this->idUser)},
			{$this->parseValue($this->idCategory)},
			{$this->parseValue($this->fieldContactMethod, 'notNumber')},
			{$this->parseValue($this->fieldPriceRent, 'notNumber')},
			{$this->parseValue($this->fieldPriceSell, 'notNumber')},
			{$this->parseValue($this->fieldPriceNego, 'notNumber')},
			{$this->parseValue($this->fieldPriceRate, 'notNumber')},
			{$this->parseValue($this->fieldPriceCurrency, 'notNumber')},
			{$this->parseValue($this->fieldMake, 'notNumber')},
			{$this->parseValue($this->fieldModel, 'notNumber')},
			{$this->parseValue($this->fieldModelYear)},
			{$this->parseValue($this->fieldNoOfSeat)},
			{$this->parseValue($this->fieldFuelType, 'notNumber')},
			{$this->parseValue($this->fieldColor, 'notNumber')},
			{$this->parseValue($this->fieldGearType, 'notNumber')},
			{$this->parseValue($this->fieldMilage, 'notNumber')},
			{$this->parseValue($this->fieldImage, 'notNumber')},
			{$this->parseValue($this->fieldLocation, 'notNumber')},
			{$this->parseValue($this->fieldExtraInfo, 'notNumber')},
			{$this->parseValue($this->fieldTitle, 'notNumber')},
			{$this->parseValue($this->fieldUploadDate, 'notNumber')},
			{$this->parseValue($this->fieldTotalView)},
			{$this->parseValue($this->fieldStatus, 'notNumber')},
			{$this->parseValue($this->fieldMarketCategory, 'notNumber')},
			{$this->parseValue($this->fieldTableType)})
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
     * Updates a specific row from the table item_car with the values of the current object.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating of selected row.<br>
     * Null values are used for all attributes not previously setted.
     * @param int $id the primary key id value of table item_car which identifies the row to update.
     * @return mixed MySQL update result
     * @category DML
     */
    public function update($id)
    {
        // $constants = get_defined_constants();
        if ($this->allowUpdate) {
            $sql = <<< SQL
            UPDATE
                item_car
            SET 
				id_temp={$this->parseValue($this->idTemp)},
				id_user={$this->parseValue($this->idUser)},
				id_category={$this->parseValue($this->idCategory)},
				field_contact_method={$this->parseValue($this->fieldContactMethod, 'notNumber')},
				field_price_rent={$this->parseValue($this->fieldPriceRent, 'notNumber')},
				field_price_sell={$this->parseValue($this->fieldPriceSell, 'notNumber')},
				field_price_nego={$this->parseValue($this->fieldPriceNego, 'notNumber')},
				field_price_rate={$this->parseValue($this->fieldPriceRate, 'notNumber')},
				field_price_currency={$this->parseValue($this->fieldPriceCurrency, 'notNumber')},
				field_make={$this->parseValue($this->fieldMake, 'notNumber')},
				field_model={$this->parseValue($this->fieldModel, 'notNumber')},
				field_model_year={$this->parseValue($this->fieldModelYear)},
				field_no_of_seat={$this->parseValue($this->fieldNoOfSeat)},
				field_fuel_type={$this->parseValue($this->fieldFuelType, 'notNumber')},
				field_color={$this->parseValue($this->fieldColor, 'notNumber')},
				field_gear_type={$this->parseValue($this->fieldGearType, 'notNumber')},
				field_milage={$this->parseValue($this->fieldMilage, 'notNumber')},
				field_image={$this->parseValue($this->fieldImage, 'notNumber')},
				field_location={$this->parseValue($this->fieldLocation, 'notNumber')},
				field_extra_info={$this->parseValue($this->fieldExtraInfo, 'notNumber')},
				field_title={$this->parseValue($this->fieldTitle, 'notNumber')},
				field_upload_date={$this->parseValue($this->fieldUploadDate, 'notNumber')},
				field_total_view={$this->parseValue($this->fieldTotalView)},
				field_status={$this->parseValue($this->fieldStatus, 'notNumber')},
				field_market_category={$this->parseValue($this->fieldMarketCategory, 'notNumber')},
				field_table_type={$this->parseValue($this->fieldTableType)}
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
     * Facility for updating a row of item_car previously loaded.
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
     * Facility for display a row for item_car previously loaded.
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
     * Class attribute for storing default upload values from upload functionality     
     */
    private $uploadOption = array(
        'fieldLocation' => 'option',
        'idCategory' => 'option',
        'fieldMake' => 'input',
        'fieldModel' => 'input',
        'fieldModelYear' => 'option',
        'fieldGearType' => 'option',
        'fieldFuelType' => 'option',
        'fieldMilage' => 'option',
        'fieldNoOfSeat' => 'option',
        'fieldColor' => 'option',
        'fieldPriceRent' => 'input',
        'fieldPriceRate' => 'option',
        'fieldPriceSell' => 'input',
        'fieldPriceCurrency' => 'option',
        'fieldPriceNego' => 'option',
        'fieldTitle' => 'input',
        'fieldExtraInfo' => 'input',
        'fieldContactMethod' => 'option',
        'fileuploader-list-files' => 'input'
    );

    /**
     * Class attribute for storing default upload values from upload functionality     
     */
    private $uploadOptionShort = array(
        'fieldLocation' => 'Location',
        'idCategory' => 'Type',
        'fieldMake' => 'Make',
        'fieldModel' => 'Model',
        'fieldModelYear' => 'Year Made',
        'fieldGearType' => 'Gear Type',
        'fieldFuelType' => 'Fuel Type',
        'fieldMilage' => 'Milage',
        'fieldNoOfSeat' => 'No of Seats',
        'fieldColor' => 'Color',
        'fieldPriceRent' => 'Rent Price',
        'fieldPriceRate' => 'Rent Rate',
        'fieldPriceSell' => 'Sell Price',
        'fieldPriceCurrency' => 'Currency',
        'fieldPriceNego' => 'Negotiable',
        'fieldTitle' => 'Title',
        'fieldExtraInfo' => 'Extra Info',
        'fieldContactMethod' => 'Contact Method',
        'fileuploader-list-files' => 'Image files'
    );

    /**
     * Facility for access upload options
     * @category DML Helper
     * @return uploadOptions
     */
    public function getUploadOption()
    {
        return $this->uploadOption;
    }

    /**
     * Facility for access upload options
     * @category DML Helper
     * @return uploadOptions
     */
    public function getUploadOptionShort($key)
    {
        return $this->uploadOptionShort[$key];
    }



    /**
     * Facility for upload a new row into item_car.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating.
     * @category DML Helper
     * @return mixed MySQLi update result
     */
    public function upload()
    {

        $lang_sw = isset($_GET['lan']) ? "&lan=" . $_GET['lan'] : "";

        echo '<form class="form-horizontal" action="../../includes/thumbnails/php/form_upload.php?table=' . $this->getTableName() . $lang_sw . '" method="post" enctype="multipart/form-data">';
        $this->newForm();
        if ($_SESSION['warnings']) {
            echo '<pre>';
            print_r($_SESSION['warnings']);
            echo '</pre>';
        }
        $_SESSION['warnings'] = null;
        echo '<div class="form-group row no-gutters">
                <div class="col-md-offset-4">
                    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                </div>
             </div>
        </form>';
    }

    private function newForm()
    {
        echo '<div class="container-fluid" style="margin-left:15%; margin-right:15%;">';
        echo '<div class="row">';
        echo '<div class="col-md-12">';
        echo '<div class="row">';
        $this->inputItemLocation();
        echo '</div>';
        echo '<div class="row">';
        $this->inputTitle();
        echo '</div>';
        echo '<div class="row">';
        echo '<div class="col-md-12" style="border:1px solid #c7c7c7; border-bottom: 1px solid white;">';
        echo '<div class="row upload">';
        $this->inputCarType();
        $this->inputCarMake();
        $this->inputCarModel();
        echo '</div>';
        echo '<div class="row upload">';
        $this->inputCarYear();
        $this->inputCarGearType();
        $this->inputCarFuelType();
        echo '</div>';
        echo '<div class="row upload">';
        $this->inputCarMilage();
        $this->inputCarSeat();
        $this->inputCarColor();
        echo '</div></div></div>';
        echo '<div class="row">';
        echo '<div class="col-md-12" style="border:1px solid #c7c7c7; border-bottom: 1px solid white;">';
        echo '<div class="row upload">';
        $this->inputItemPrice();
        echo '</div></div></div>';
        echo '<div class="row">';
        echo '<div class="col-md-12" style="border:1px solid #c7c7c7; border-bottom: 1px solid white;">';
        echo '<div class="row upload">';
        $this->inputItemContactMeWith();
        echo '</div></div></div>';
        echo '<div class="row">';
        echo '<div class="col-md-12" style="border:1px solid #c7c7c7;">';
        echo '<div class="row upload">';
        $this->inputItemImages();
        echo '</div></div></div></div></div>';
    }

    private function inputItemLocation()
    {
        $errorMsg = "";
        $errorClass = '';
        if (isset($_SESSION['errorRaw']['fieldLocation'])) {
            $validate = $GLOBALS['item_specific_array']['car']['validate'];
            $errorMsg = $validate['fieldLocation'];
            $errorClass = ' alert alert-custom" role="alert';
        }
        $selected = 0;
        $city = $GLOBALS['city_lang_arr'];
        $location = $GLOBALS['item_specific_array']['common']['Location'][0];
        $choose = $GLOBALS['item_specific_array']['common']['Location'][1];
        $choose1 = $choose2 = $choose;
        if (isset($_SESSION['POST']['fieldLocation'])) {
            if (strpos($_SESSION['POST']['fieldLocation'], $GLOBALS['lang']['Choose']) !== false) {
                $choose1 = $choose2 = $choose;
            } else {
                $temp = $_SESSION['POST']['fieldLocation'];
                $choose1 = $temp;
                $choose2 = $city[$temp];
                $selected = 1;
            }
        }
        echo <<< EOD
        <div class="col-md-4 {$errorClass}">
        <div class="form-group">
           <label for="fieldLocation">{$location}</label>{$errorMsg}
            <div>
             <select id="fieldLocation" name="fieldLocation" class="select form-control" >
        <option value="{$choose1}">{$choose2}</option>
EOD;
        if ($selected == 1)
            echo <<< EOD
        <option value="{$choose}">{$choose}</option>;
EOD;
        foreach ($city as $key => $value) {
            if ($key === '000' || $key === 'All') {
                continue;
            }
            echo '<option value="' . $key . '">' . $value . '</option>';
        }
        echo <<<EOD
            </select></div></div></div>
EOD;
    }

    private function inputCarType()
    {
        $errorMsg = "";
        $errorClass = '';
        if (isset($_SESSION['errorRaw']['idCategory'])) {
            $validate = $GLOBALS['item_specific_array']['car']['validate'];
            $errorMsg = $validate['idCategory'];
            $errorClass = ' alert alert-custom" role="alert';
        }
        $type = $GLOBALS['item_specific_array']['car']['Type'][0];
        echo <<< EOD
        <div class="col-md-4 {$errorClass}">
        <div class="form-group"> <label for="idCategory">{$type}</label>{$errorMsg} 
        <div> 
EOD;

        echo '<select id="idCategory" name="idCategory" class="select form-control">';
        $choose = $GLOBALS['item_specific_array']['car']['Type'][1];
        $choose1 = $choose2 = $choose;
        $selected = 0;
        if (isset($_SESSION['POST']['idCategory'])) {

            if (strpos($_SESSION['POST']['idCategory'], $GLOBALS['lang']['Choose']) !== false) {
                $choose1 = $choose2 = $choose;
            } else {
                $id = $_SESSION['POST']['idCategory'];
                $type = new HtCategoryCar("*");
                $result = $type->getResultSet();
                while ($row = $result->fetch_array()) {
                    if ($row['id'] === $id) {
                        $choose1 = $id;
                        $choose2 = $GLOBALS['lang'][$row['field_name']];
                        $selected = 1;
                        break;
                    }
                }
            }
        }

        echo <<< EOD
        <option value="{$choose1}">{$choose2}</option>
EOD;
        if ($selected == 1)
            echo <<< EOD
        <option value="{$choose}">{$choose}</option>;
EOD;
        $type = new HtCategoryCar("*");
        $result = $type->getResultSet();

        while ($row = $result->fetch_assoc()) {
            if (isset($GLOBALS['lang'][$row['field_name']])) {
                echo '<option value="' . $row['id'] . '">' . $GLOBALS['lang'][$row['field_name']] . '</option>';
            }
        }
        echo <<<EOD
            </select></div></div></div>
EOD;
    }

    private function inputCarMake()
    {
        $errorMsg = "";
        $errorClass = '';
        if (isset($_SESSION['errorRaw']['fieldMake'])) {
            $validate = $GLOBALS['item_specific_array']['car']['validate'];
            $errorMsg = $validate['fieldMake'];
            $errorClass = ' alert alert-custom" role="alert';
        }
        $selected = 0;
        $make = $GLOBALS['item_specific_array']['car']['Make'][0];
        $choose = $GLOBALS['item_specific_array']['car']['Make'][1];
        $choose1 = $choose2 = $choose;
        if (isset($_SESSION['POST']['fieldMake'])) {
            if (strpos($_SESSION['POST']['fieldMake'], $GLOBALS['lang']['Choose']) !== false) {
                $choose1 = $choose2 = $choose;
            } else {
                $temp = $_SESSION['POST']['fieldMake'];
                $choose1 = $temp;
                $choose2 = strtoupper($temp);
                $selected = 1;
            }
        }

        echo <<< EOD
        <div class="col-md-4 {$errorClass}">
        <div class="form-group"><label for="fieldMake">{$make}</label> {$errorMsg}
            <div>
             <select id="fieldMake" name="fieldMake" class="select form-control">;
            <option value="{$choose1}">{$choose2}</option>
EOD;
        if ($selected == 1)
            echo <<< EOD
            <option value="{$choose}">{$choose}</option>;
EOD;
        $make = array(
            "aston-martin" => "aston-martin", "audi" => "audi", "bentley" => "bentley", "bmw" => "bmw",
            "buick" => "buick", "cadillac" => "cadillac", "chevrolet" => "chevrolet", "chevrolet-truck" => "chevrolet-truck",
            "chrysler" => "chrysler", "dodge" => "dodge", "ferrari" => "ferrari", "fiat" => "fiat", "fisker" => "fisker",
            "ford" => "ford", "ford-truck" => "ford-truck", "freightliner" => "freightliner", "gmc" => "gmc",
            "gmc-truck" => "gmc-truck", "honda" => "honda", "hyundai" => "hyundai", "infiniti" => "infiniti",
            "jaguar" => "jaguar", "jeep" => "jeep", "kia" => "kia", "lamborghini" => "lamborghini", "land-rover" => "land-rover",
            "lexus" => "lexus", "lincoln" => "lincoln", "lotus" => "lotus", "maserati" => "maserati", "maybach" => "maybach",
            "mazda" => "mazda", "mercedes-benz" => "mercedes-benz", "mini" => "mini", "mitsubishi" => "mitsubishi",
            "nissan" => "nissan", "nissan-truck" => "nissan-truck", "porsche" => "porsche", "ram" => "ram",
            "rolls-royce" => "rolls-royce", "saab" => "saab", "scion" => "scion", "smart" => "smart", "subaru" => "subaru",
            "suzuki" => "suzuki", "tesla" => "tesla", "toyota" => "toyota", "toyota-truck" => "toyota-truck",
            "volkswagen" => "volkswagen", "volvo" => "volvo"
        );
        foreach ($make as $key => $value) {
            echo '<option value="' . $key . '">' . strtoupper($value) . '</option>';
        }
        echo '</select></div></div></div>';
    }

    private function inputCarModel()
    {
        $errorMsg = "";
        $errorClass = '';
        if (isset($_SESSION['errorRaw']['fieldModel'])) {
            $validate = $GLOBALS['item_specific_array']['car']['validate'];
            $errorMsg = $validate['fieldModel'];
            $errorClass = ' alert alert-custom" role="alert';
        }

        $model = $GLOBALS['item_specific_array']['car']['Model'][0];
        $placeholder = $GLOBALS['item_specific_array']['car']['Model'][1];

        echo <<< EOD
        <div class="col-md-4 {$errorClass}">
        <div class="form-group">
          <label for="fieldModel">{$model}</label>{$errorMsg}
          <div>
EOD;
        $value = "";
        if (isset($_SESSION['POST']['fieldModel']) && $_SESSION['POST']['fieldModel'] !== "0") {
            $value = $_SESSION['POST']['fieldModel'];
        }
        echo '
            <input id="fieldModel" name="fieldModel" type="text" value="' . $value . '" class="form-control" placeholder="' . $placeholder . '" >
          </div>
        </div></div>';
    }

    private function inputCarYear()
    {
        $errorMsg = "";
        $errorClass = '';
        if (isset($_SESSION['errorRaw']['fieldModelYear'])) {
            $validate = $GLOBALS['item_specific_array']['car']['validate'];
            $errorMsg = $validate['fieldModelYear'];
            $errorClass = ' alert alert-custom" role="alert';
        }

        $selected = 0;
        $yearMade = $GLOBALS['item_specific_array']['car']['Year Made'][0];
        $choose = $GLOBALS['item_specific_array']['car']['Year Made'][1];
        $choose1 = $choose2 = $choose;
        if (isset($_SESSION['POST']['fieldModelYear'])) {
            if (strpos($_SESSION['POST']['fieldModelYear'], $GLOBALS['lang']['Choose']) !== false) {
                $choose1 = $choose2 = $choose;
            } else {
                $temp = $_SESSION['POST']['fieldModelYear'];
                $choose1 = $temp;
                $choose2 = $GLOBALS['item_specific_array']['car']['Year Made'][2][$temp];
                $selected = 1;
            }
        }
        echo <<< EOD
        <div class="col-md-4 {$errorClass}">
        <div class="form-group"><label for="fieldModelYear">{$yearMade}</label>{$errorMsg}
        <div>
        <select id="fieldModelYear" name="fieldModelYear" class="select form-control">
        <option value="{$choose1}">{$choose2}</option>
EOD;

        if ($selected == 1) {
            echo <<< EOD
    <option value="{$choose}">{$choose}</option>
EOD;
        }


        for ($i = date('Y'); $i >= 1980; --$i) {
            echo '<option value = "' . $i . '">' . $i . '</option>';
        }

        echo '
        <option value = "1970">' . $GLOBALS['item_specific_array']['car']['Year Made'][2]['1970'] . '</option>
        <option value = "1960">' . $GLOBALS['item_specific_array']['car']['Year Made'][2]['1960'] . '</option>
        <option value = "1950">' . $GLOBALS['item_specific_array']['car']['Year Made'][2]['1950'] . '</option>
        <option value = "1940">' . $GLOBALS['item_specific_array']['car']['Year Made'][2]['1940'] . '</option>
        <option value = "1970">' . $GLOBALS['item_specific_array']['car']['Year Made'][2]['unknown'] . '</option>

        </select>
      </div>
    </div></div>';
    }

    private function inputCarFuelType()
    {
        $errorMsg = "";
        $errorClass = '';
        if (isset($_SESSION['errorRaw']['fieldFuelType'])) {
            $validate = $GLOBALS['item_specific_array']['car']['validate'];
            $errorMsg = $validate['fieldFuelType'];
            $errorClass = ' alert alert-custom" role="alert';
        }
        $selected = 0;
        $fuleType = $GLOBALS['item_specific_array']['car']['Fuel Type'][0];
        $types = $GLOBALS['item_specific_array']['car']['Fuel Type'][2];
        $choose = $GLOBALS['item_specific_array']['car']['Fuel Type'][1];
        $choose1 = $choose2 = $choose;
        if (isset($_SESSION['POST']['fieldFuelType'])) {
            if (strpos($_SESSION['POST']['fieldFuelType'], $GLOBALS['lang']['Choose']) !== false) {
                $choose1 = $choose2 = $choose;
            } else {
                $temp = $_SESSION['POST']['fieldFuelType'];
                $choose1 = $temp;
                $choose2 = $types[$temp];
                $selected = 1;
            }
        }

        echo <<<EOD
        <div class="col-md-4 {$errorClass}">
        <div class="form-group">
        <label for="fieldFuelType">{$fuleType}</label>{$errorMsg}
        <div>
        <select id="fieldFuelType" name="fieldFuelType" class="select form-control">
        <option value="{$choose1}">{$choose2}</option>
EOD;

        if ($selected == 1) {
            echo <<< EOD
<option value="{$choose}">{$choose}</option>
EOD;
        }
        echo '        
        <option value="bensine" >' . $types['bensine'] . '</option>
        <option value="bensine-electric" >' . $types['bensine-electric'] . '</option>
        <option value="bio-gas" >' . $types['bio-gas'] . '</option>        
        <option value="diesel" >' . $types['diesel'] . '</option>
        <option value="electric" >' . $types['electric'] . '</option>
        </select></div></div></div>';
    }
    //temporary disabled no database reflection, need generation
    private function inputCarPlateType()
    {
        echo '
        <div class="form-group">
        <label for="car_registered">Registered</label> 
        <div>
          <label class="radio-inline">
            <input type="radio" name="car_registered" value="1">
                  Yes
          </label>
          <label class="radio-inline">
            <input type="radio" name="car_registered" value="2">
                  No
          </label>
          <label class="radio-inline">
            <input type="radio" name="car_registered" value="3">
                  Processing
          </label>
        </div>
      </div></div>
        ';
    }

    private function inputCarGearType()
    {
        $errorMsg = "";
        $errorClass = '';
        if (isset($_SESSION['errorRaw']['fieldGearType'])) {
            $validate = $GLOBALS['item_specific_array']['car']['validate'];
            $errorMsg = $validate['fieldGearType'];
            $errorClass = ' alert alert-custom" role="alert';
        }
        $selected = 0;
        $gearType = $GLOBALS['item_specific_array']['car']['Gear Type'][0];
        $types = $GLOBALS['item_specific_array']['car']['Gear Type'][2];
        $choose = $GLOBALS['item_specific_array']['car']['Gear Type'][1];
        $choose1 = $choose2 = $choose;
        if (isset($_SESSION['POST']['fieldGearType'])) {
            if (strpos($_SESSION['POST']['fieldGearType'], $GLOBALS['lang']['Choose']) !== false) {
                $choose1 = $choose2 = $choose;
            } else {
                $temp = $_SESSION['POST']['fieldGearType'];
                $choose1 = $temp;
                $choose2 = $types[$temp];
                $selected = 1;
            }
        }

        echo <<<EOD
        <div class="col-md-4 {$errorClass}">
        <div class="form-group">
        <label for="fieldGearType">{$gearType}</label>{$errorMsg}
        <div>
        <select id="fieldGearType" name="fieldGearType" class="select form-control">
        <option value="{$choose1}">{$choose2}</option>
EOD;

        if ($selected == 1) {
            echo <<< EOD
<option value="{$choose}">{$choose}</option>
EOD;
        }
        echo '
        <option value="manual" >' . $types['manual'] . '</option>
        <option value="automatic" >' . $types['automatic'] . '</option>
        <option value="semi-automatic" >' . $types['semi-automatic'] . '</option>
        </select></div></div></div>';
    }
    private function inputCarMilage()
    {
        $errorMsg = "";
        $errorClass = '';
        if (isset($_SESSION['errorRaw']['fieldMilage'])) {
            $validate = $GLOBALS['item_specific_array']['car']['validate'];
            $errorMsg = $validate['fieldMilage'];
            $errorClass = ' alert alert-custom" role="alert';
        }
        $selected = 0;
        $milageKm = $GLOBALS['item_specific_array']['car']['Milage [Km]'][0];
        $types = $GLOBALS['item_specific_array']['car']['Milage [Km]'][2];
        $choose = $GLOBALS['item_specific_array']['car']['Milage [Km]'][1];
        $choose1 = $choose2 = $choose;
        if (isset($_SESSION['POST']['fieldMilage'])) {
            if (strpos($_SESSION['POST']['fieldMilage'], $GLOBALS['lang']['Choose']) !== false) {
                $choose1 = $choose2 = $choose;
            } else {
                $temp = $_SESSION['POST']['fieldMilage'];
                $choose1 = $temp;
                $choose2 = $temp;
                $selected = 1;
            }
        }

        echo <<<EOD
        <div class="col-md-4 {$errorClass}">
        <div class="form-group">
        <label for="fieldMilage">{$milageKm}</label>{$errorMsg}
        <div>
        <select id="fieldMilage" name="fieldMilage" class="select form-control">
        <option value="{$choose1}">{$choose2}</option>
EOD;

        if ($selected == 1) {
            echo <<< EOD
<option value="{$choose}">{$choose}</option>
EOD;
        }
        for ($i = 0; $i <= 4000000;) {
            $j = $i + 499999;
            echo '<option value="' . $i . '-' . $j . '">' . $i . '-' . $j . '</option>';
            $i += 500000;
        }
        $unknown = $GLOBALS['item_specific_array']['car']['Milage [Km]'][2]['unknown'];
        echo '<option value="unknown">' . $unknown . '</option>';
        echo '</select></div></div></div>';
    }

    private function inputCarSeat()
    {
        $errorMsg = "";
        $errorClass = '';
        if (isset($_SESSION['errorRaw']['fieldNoOfSeat'])) {
            $validate = $GLOBALS['item_specific_array']['car']['validate'];
            $errorMsg = $validate['fieldNoOfSeat'];
            $errorClass = ' alert alert-custom" role="alert';
        }
        $selected = 0;
        $numberOfSeats = $GLOBALS['item_specific_array']['car']['Number of Seats'][0];
        $types = $GLOBALS['item_specific_array']['car']['Number of Seats'][2];
        $choose = $GLOBALS['item_specific_array']['car']['Number of Seats'][1];
        $choose1 = $choose2 = $choose;
        if (isset($_SESSION['POST']['fieldNoOfSeat'])) {
            if (strpos($_SESSION['POST']['fieldNoOfSeat'], $GLOBALS['lang']['Choose']) !== false) {
                $choose1 = $choose2 = $choose;
            } else {
                $temp = $_SESSION['POST']['fieldNoOfSeat'];
                $choose1 = $temp;
                $choose2 = !empty($types[$temp]) ? $types[$temp] : $temp;
                $selected = 1;
            }
        }

        echo <<<EOD
        <div class="col-md-4 {$errorClass}">
        <div class="form-group">
        <label for="fieldNoOfSeat">{$numberOfSeats}</label>{$errorMsg}
        <div>
        <select id="fieldNoOfSeat" name="fieldNoOfSeat" class="select form-control">
        <option value="{$choose1}">{$choose2}</option>
EOD;

        if ($selected == 1) {
            echo <<< EOD
<option value="{$choose}">{$choose}</option>
EOD;
        }

        for ($i = 1; $i <= 100;) {
            $j = $i - 1 + 5;
            echo '<option value="' . $i . '-' . $j . '">' . $i . '-' . $j . '</option>';
            $i += 5;
        }
        echo '<option value="over100">' . $types['over100'] . '</option>';
        echo '<option value="unknown">' . $types['unknown'] . '</option>';
        echo '</select></div></div></div>';
    }

    private function inputCarColor()
    {
        $errorMsg = "";
        $errorClass = '';
        if (isset($_SESSION['errorRaw']['fieldColor'])) {
            $validate = $GLOBALS['item_specific_array']['car']['validate'];
            $errorMsg = $validate['fieldColor'];
            $errorClass = ' alert alert-custom" role="alert';
        }
        $selected = 0;
        $color = $GLOBALS['item_specific_array']['car']['Color'][0];
        $choose = $GLOBALS['item_specific_array']['car']['Color'][1];
        $types = $GLOBALS['item_specific_array']['car']['Color'][2];

        $choose1 = $choose2 = $choose;
        if (isset($_SESSION['POST']['fieldColor'])) {
            if (strpos($_SESSION['POST']['fieldColor'], $GLOBALS['lang']['Choose']) !== false) {
                $choose1 = $choose2 = $choose;
            } else {
                $temp = $_SESSION['POST']['fieldColor'];
                $choose1 = $temp;
                $choose2 = $types[$temp];
                $selected = 1;
            }
        }

        echo <<< EOD
        <div class="col-md-4 {$errorClass}">
        <div class="form-group"><label for="fieldColor">{$color}</label> {$errorMsg}
            <div>
             <select id="fieldColor" name="fieldColor" class="select form-control">;
            <option value="{$choose1}">{$choose2}</option>
EOD;
        if ($selected == 1)
            echo <<< EOD
            <option value="{$choose}">{$choose}</option>;
EOD;
        $colors = [
            "black"    => ["#000000", "#FFFFFF"],
            "green"    => ["#009f6b", "#FFFFFF"],
            "red"      => ["#C40233", "#FFFFFF"],
            "yellow"   => ["#FFD300", "#000000"],
            "blue"     => ["#0087BD", "#FFFFFF"],
            "white"    => ["#ffffff", "#000000"],
            "brown"    => ["#a52a2a", "#FFFFFF"],
            "silver"   => ["#c0c0c0", "#FFFFFF"],
            "liver"    => ["#534b4f", "#FFFFFF"],
            "unknown"  => ["#ffffff", "#000000"]
        ];
        foreach ($colors as $key => $value) {
            echo '<option value="' . $key . '" style="background-color:' . $value[0] . ';color:' . $value[1] . ';">' . $types[$key] . '</option>';
        }
        echo '</select></div></div></div>';
    }

    private function inputTitle()
    {
        $errorMsg = "";
        $errorClass = '';
        if (isset($_SESSION['errorRaw']['fieldTitle'])) {
            $validate = $GLOBALS['item_specific_array']['car']['validate'];
            $errorMsg = $validate['fieldTitle'];
            $errorClass = ' alert alert-custom" role="alert';
        }

        $title = $GLOBALS['item_specific_array']['common']['Title'][0];
        $placeholder = $GLOBALS['item_specific_array']['common']['Title'][1];
        $choose = "";
        if (isset($_SESSION['POST']['fieldTitle'])) {
            $choose = $_SESSION['POST']['fieldTitle'];
        }
        echo <<< EOD
        <div class="col-md-4 {$errorClass}"">
        <div class="form-group">
        <label for="fieldTitle">{$title}</label> {$errorMsg}
        <div>
          <input id="fieldTitle" name="fieldTitle" type="text" placeholder="{$placeholder}" value="{$choose}" class="form-control">
        </div>
      </div></div>
EOD;
    }
    private function inputExtraInfo()
    {
        echo '
        <div class="form-group">
        <label for="fieldExtraInfo">Extra Info</label> 
        <div>
          <textarea id="fieldExtraInfo" name="fieldExtraInfo" cols="50" rows="2" class="form-control">' . $_SESSION['POST']['fieldExtraInfo'] . '</textarea>
        </div>
      </div></div>';
    }

    private function inputItemContactMeWith()
    {
        $errorMsg = "";
        $errorClass = '';
        if (isset($_SESSION['errorRaw']['fieldContactMethod'])) {
            $validate = $GLOBALS['item_specific_array']['common']['validate'];
            $errorMsg = $validate['fieldContactMethod'];
            $errorClass = ' alert alert-custom" role="alert';
        }
        $selected = 0;
        $contactMeWith = $GLOBALS['item_specific_array']['common']['contactMeWith'][0];
        $choose = $GLOBALS['item_specific_array']['common']['contactMeWith'][1];
        $types = $GLOBALS['item_specific_array']['common']['contactMeWith'][2];        


        $choose1 = $choose2 = $choose;
        if (isset($_SESSION['POST']['fieldContactMethod'])) {
            if (strpos($_SESSION['POST']['fieldContactMethod'], $GLOBALS['lang']['Choose']) !== false) {
                $choose1 = $choose2 = $choose;
            } else {
                $temp = $_SESSION['POST']['fieldContactMethod'];
                $choose1 = $temp;
                $choose2 = $types[$temp];
                $selected = 1;
            }
        }

        echo <<<EOD
        <div class="col-md-4 {$errorClass}">
        <div class="form-group">
        <label for="fieldContactMethod">{$contactMeWith}</label>{$errorMsg}
        <div>
        <select id="fieldContactMethod" name="fieldContactMethod" class="select form-control">
        <option value="{$choose1}">{$choose2}</option>
EOD;

        if ($selected == 1) {
            echo <<< EOD
<option value="{$choose}">{$choose}</option>
EOD;
        }
        foreach ($types as $key => $value) {
            echo '        
            <option value="'.$key.'" >' . $value . '</option>';
        }
        echo '</select></div></div></div>';
    }

    private function inputItemImages()
    {
        $errorMsg = "";
        $errorClass = '';
        if (isset($_SESSION['errorRaw']['fileuploader-list-files'])) {
            $validate = $GLOBALS['item_specific_array']['common']['validate'];
            $errorMsg = $validate['fileuploader-list-files'];
            $errorClass = ' alert alert-custom" role="alert';
        }

        $image = $GLOBALS['item_specific_array']['common']['Choose Images here'];

        echo <<< EOD
        <div class="row upload {$errorClass}">
        <div class="form-group">
            <label for="fieldImage"> {$image} </label>{$errorMsg}
            <div>
                    <!-- file input -->
                    <input type="file" name="files">
            </div>
        </div>
        </div>        
EOD;
    }
    private function inputItemPrice()
    {
        echo '
        <div class="row upload">
            <div class="col-md-4">
                <div class="form-group">';
        $this->inputPriceRentOrSell();
        $this->priceNegotiable();
        $this->inputPriceCurreny();
        echo '</div></div>';
        $this->inputPriceRentType();
        $this->inputPriceSellType();
        echo '</div>';
    }

    private function inputPriceRentOrSell()
    {
        $errorMsg = "";
        $errorClass = '';
        if (isset($_SESSION['errorRaw']['rentOrSell'])) {
            $validate = $GLOBALS['item_specific_array']['common']['validate'];
            $errorMsg = $validate['rentOrSell'];
            $errorClass = ' alert alert-custom" role="alert';
        }
        $selected = 0;
        $rentOrSell = $GLOBALS['item_specific_array']['common']['rentOrSell'];
        $label = $rentOrSell[0];
        $choose = $rentOrSell[1];
        $choose1 = 'rentOrSell';
        $choose2 = $choose;
        if (isset($_SESSION['POST']['rentOrSell'])) {
            if (strpos($_SESSION['POST']['rentOrSell'], 'rentOrSell') !== false) {
                $choose1 = 'rentOrSell';
                $choose2 = $choose;
            } else {
                $temp = $_SESSION['POST']['rentOrSell'];
                $choose1 = $temp;
                $choose2 = $rentOrSell[2][$temp];
                $selected = 1;
            }
        }

        echo <<<EOD
    <div class="col-md-12 {$errorClass}">
    <div class="form-group">
    <label for="rentOrSell">{$label}</label>{$errorMsg}
    <div>
    <select id="rentOrSell" name="rentOrSell" class="select form-control">
    <option value="{$choose1}">{$choose2}</option>
EOD;

        if ($selected == 1) {
            echo <<< EOD
<option value="{$choose1}">{$choose}</option>
EOD;
        }
        echo '
    <option value="rent" >' . $rentOrSell[2]['rent'] . '</option>
    <option value="sell" >' . $rentOrSell[2]['sell'] . '</option>
    <option value="both" >' . $rentOrSell[2]['both'] . '</option>
    </select></div></div></div>';
    }
    private function priceNegotiable()
    {
        $errorMsg = "";
        $errorClass = '';
        if (isset($_SESSION['errorRaw']['fieldPriceNego'])) {
            $validate = $GLOBALS['item_specific_array']['common']['validate'];
            $errorMsg = $validate['fieldPriceNego'];
            $errorClass = ' alert alert-custom" role="alert';
        }
        $selected = 0;
        $negotiable = $GLOBALS['item_specific_array']['common']['negotiable'];
        $label = $negotiable[0];
        $choose = $negotiable[1];
        $choose1 = $choose2 = $choose;
        if (isset($_SESSION['POST']['fieldPriceNego'])) {
            if (strpos($_SESSION['POST']['fieldPriceNego'], $GLOBALS['lang']['Choose']) !== false) {
                $choose1 = $choose2 = $choose;
            } else {
                $temp = $_SESSION['POST']['fieldPriceNego'];
                $choose1 = $temp;
                $choose2 = $negotiable[2][$temp];
                $selected = 1;
            }
        }

        echo <<<EOD
    <div class="col-md-12 {$errorClass}">
    <div class="form-group">
    <label for="fieldPriceNego">{$label}</label>{$errorMsg}
    <div>
    <select id="fieldPriceNego" name="fieldPriceNego" class="select form-control">
    <option value="{$choose1}">{$choose2}</option>
EOD;

        if ($selected == 1) {
            echo <<< EOD
<option value="{$choose}">{$choose}</option>
EOD;
        }
        echo '
    <option value="yes" >' . $negotiable[2]['yes'] . '</option>
    <option value="no" >' . $negotiable[2]['no'] . '</option>
    </select></div></div></div>';
    }

    private function inputPriceCurreny()
    {
        $errorMsg = "";
        $errorClass = '';
        if (isset($_SESSION['errorRaw']['fieldPriceCurrency'])) {
            $validate = $GLOBALS['item_specific_array']['common']['validate'];
            $errorMsg = $validate['fieldPriceCurrency'];
            $errorClass = ' alert alert-custom" role="alert';
        }
        $selected = 0;
        $currency = $GLOBALS['item_specific_array']['common']['currency'];
        $label = $currency[0];
        $choose = $currency[1];
        $choose1 = $choose2 = $choose;
        if (isset($_SESSION['POST']['fieldPriceCurrency'])) {
            if (strpos($_SESSION['POST']['fieldPriceCurrency'], $GLOBALS['lang']['Choose']) !== false) {
                $choose1 = $choose2 = $choose;
            } else {
                $temp = $_SESSION['POST']['fieldPriceCurrency'];
                $choose1 = $temp;
                $choose2 = $currency[2][$temp];
                $selected = 1;
            }
        }

        echo <<<EOD
    <div class="col-md-12 {$errorClass}">
    <div class="form-group">
    <label for="fieldPriceCurrency">{$label}</label>{$errorMsg}
    <div>
    <select id="fieldPriceCurrency" name="fieldPriceCurrency" class="select form-control">
    <option value="{$choose1}">{$choose2}</option>
EOD;

        if ($selected == 1) {
            echo <<< EOD
<option value="{$choose}">{$choose}</option>
EOD;
        }
        echo '
        <option value="ETB" >' . $currency[2]['ETB'] . '</option>
        <option value="USD" >' . $currency[2]['USD'] . '</option>
        </select></div></div></div>';
    }

    private function inputPriceRentType()
    {
        $errorMsg1 = $errorMsg2 = "";
        $errorClass1 = $errorClass2 = "";
        if (isset($_SESSION['errorRaw']['fieldPriceRent'])) {
            $validate = $GLOBALS['item_specific_array']['common']['validate'];
            $errorMsg1 = $validate['fieldPriceRent'];
            $errorClass1 = ' alert alert-custom" role="alert';
        }
        if (isset($_SESSION['errorRaw']['fieldPriceRate'])) {
            $validate = $GLOBALS['item_specific_array']['common']['validate'];
            $errorMsg2 = $validate['fieldPriceRate'];
            $errorClass2 = ' alert alert-custom" role="alert';
        }

        $diplayRent = "display: none; background:#fafbfd;";
        if (
            isset($_SESSION['POST']["rentOrSell"]) &&
            ($_SESSION['POST']["rentOrSell"] == "rent" || $_SESSION['POST']["rentOrSell"] == "both")
        ) {
            $diplayRent = "display: block; background:#fafbfd;";
        }

        $placeholder = "How much for Rent?";    
        $rentPrice = $GLOBALS['item_specific_array']['common']['Rent Price'];
        $rentRate = $GLOBALS['item_specific_array']['common']['Rent Rate'];
        $selected = 0;
        $labelRentPrice = $rentPrice[0];
        $placeholder = $rentPrice[1];//"How much for Rent?";    
        $labelRate = $rentRate[0];
        $choose = $rentRate[1];
        $choose1 = $choose2 = $choose;
        if (isset($_SESSION['POST']['fieldPriceRate'])) {
            if (strpos($_SESSION['POST']['fieldPriceRate'], $GLOBALS['lang']['Choose']) !== false) {
                $choose1 = $choose2 = $choose;
            } else {
                $temp = $_SESSION['POST']['fieldPriceRate'];
                $choose1 = $temp;
                $choose2 = $rentRate[2][$temp];
                $selected = 1;
            }
        }
        $value = "";
        if (isset($_SESSION['POST']['fieldPriceRent']) && $_SESSION['POST']['fieldPriceRent'] !== "0") {
            $value = $_SESSION['POST']['fieldPriceRent'];        
        }
        echo <<< EOD
        <div class="col-md-4 fieldPriceRent {$errorClass1}" style="{$diplayRent}">
        <div class="form-group" >
        <div>
            <div class="row" >
            <label for="fieldPriceRent">{$labelRentPrice}</label>{$errorMsg1}
                <input id="fieldPriceRent" name="fieldPriceRent" type="text" placeholder="{$placeholder}" value="{$value}" class="form-control">
            </div>
            <div class="row {$errorClass2}" >
                <label for="fieldPriceRate">{$labelRate}</label>{$errorMsg2}
                <select id="fieldPriceRate" name="fieldPriceRate" class="form-control">
EOD;

        echo <<< EOD
        <option value="{$choose1}">{$choose2}</option>
EOD;
        if ($selected == 1) {
            echo <<< EOD
        <option value="{$choose}">{$choose}</option>
EOD;
        }
        $rate = $GLOBALS['item_specific_array']['common']['Rent Rate'][2];
        foreach ($rate as $key => $value) {
            echo '<option value="' . $key . '">' . $value . '</option>';
        }
        echo '</select></div></div></div></div>';
    }

    private function inputPriceSellType()
    {
        $errorMsg = $errorMsg2 = "";
        $errorClass = $errorClass2 = "";
        if (isset($_SESSION['errorRaw']['fieldPriceSell'])) {
            $validate = $GLOBALS['item_specific_array']['common']['validate'];
            $errorMsg = $validate['fieldPriceSell'];
            $errorClass = ' alert alert-custom" role="alert';
        }

        $diplaySell = "display: none; background:#fafbfd;";
        if (
            isset($_SESSION['POST']["rentOrSell"]) &&
            ($_SESSION['POST']["rentOrSell"] == "sell" || $_SESSION['POST']["rentOrSell"] == "both")
        ) {
            $diplaySell = "display: block; background:#fafbfd;";
        }


        $sellPrice = $GLOBALS['item_specific_array']['common']['Sell Price'];
        $label = $sellPrice[0];
        $placeholder = $sellPrice[1];
        $value = "";
        if (isset($_SESSION['POST']['fieldPriceSell']) && $_SESSION['POST']['fieldPriceSell'] !== "0") {
            $value = $_SESSION['POST']['fieldPriceSell'];        
        }

        echo <<< EOD
        <div class="col-md-4 fieldPriceSell {$errorClass}" style="{$diplaySell}">
        <div class="form-group" >
        <div>
        <div class="row" >
            <label for="fieldPriceSell">{$label}</label> {$errorMsg}
                <input id="fieldPriceSell" name="fieldPriceSell" type="text"  value="{$value}" placeholder="{$placeholder}" class="form-control">
           </div></div></div></div>
EOD;
    }
}
