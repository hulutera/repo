<?php

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
     * Facility for upload a new row into item_car.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating.
     * @category DML Helper
     * @return mixed MySQLi update result
     */
    public function upload()
    {
        $this->inputCarType();
        $this->inputCarMake();
        $this->inputCarModel();
        $this->inputCarYear();
        $this->inputCarGearType();
        $this->inputCarFuelType();
        $this->inputCarPlateType();
        $this->inputCarMilage();
        $this->inputCarSeat();
        $this->inputCarColor();
        $this->contactMeWith($this->getTableName());
        $this->inputItemLocation();
        $this->inputItemImages();       
    }
    private function inputItemLocation()
    {
        $location = array(
        "Addis Ababa" => "Addis Ababa",         
        "Dire Dawa" =>"Dire Dawa",
        "Adama"  => "Adama"  ,
        "Bahir Dar"  => "Bahir Dar"  ,
        "Mekele"  => "Mekele"  ,
        "Awassa"  => "Awassa"  ,
        "Asaita"  => "Asaita"  ,
        "Debre Berhan"=>"Debre Berhan",
        "Dessie"  => "Dessie"  ,
        "Gondar"  => "Gondar"  ,
        "Gambela"  => "Gambela"  ,
        "Harar"  => "Harar"  ,
        "Asella"  => "Asella"  ,
        "Debre Zeit" =>  "Debre Zeit",
        "Jimma"  => "Jimma"  ,
        "Nekemte"  => "Nekemte"  ,
        "Shashemene" => "Shashemene",
        "Arba Minch" => "Arba Minch",
        "Dila"  => "Dila"  ,
        "Hosaena"  => "Hosaena"  ,
        "Sodo"  => "Sodo"  ,
        "Somali-Jijig" =>"Somali-Jijig",
        "Axum"  => "Axum"  ,
        "Other"  => "Other"  ,
        );
        echo '
        <div class="form-group">
           <label for="car_make" class="control-label col-xs-4">Item Location</label> 
           <div class="col-xs-8">
             <select id="car_make" name="car_region" class="select form-control" required="required">
             <option value="0">Choose Region</option>';

        foreach ($location as $key => $value) {
            echo '<option value="' . $key . '">' . $value . '</option>';
        }
        echo '</select></div></div>';
    }
    private function inputItemImages()
    {
        echo '<div class="form-group">
            <label for="car_image" class="control-label col-xs-4"><br><br><br><br>Choose Images here</label>
            <div class="col-xs-8">
                    <!-- file input -->
                    <input type="file" name="files">
            </div>
        </div>';
    }
    private function inputCarType()
    {
        echo '
        <div class="form-group">
            <label for="car_type" class="control-label col-xs-4">Type</label> 
        <div class="col-xs-8">
        <select id="car_type" name="car_type" class="select form-control" required="required">
        <option value="0">Choose Type</option>
        ';
        $type = new HtCategoryCar("*");
        $result = $type->getResultSet();
        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row['id'] . '">' . $row['field_name'] . '</option>';
        }
        echo '</select></div></div>';
    }

    private function inputCarMake()
    {
        echo '
        <div class="form-group">
           <label for="car_make" class="control-label col-xs-4">Make</label> 
           <div class="col-xs-8">
             <select id="car_make" name="car_make" class="select form-control" required="required">
             <option value="0">Choose Make</option>';
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
            echo '<option value="' . $key . '">' . $value . '</option>';
        }
        echo '</select></div></div>';
    }

    private function inputCarModel()
    {
        echo '
        <div class="form-group">
          <label for="car_model" class="control-label col-xs-4">Model</label> 
          <div class="col-xs-8">
            <input id="car_model" name="car_model" type="text" class="form-control" required="required">
          </div>
        </div>';
    }

    private function inputCarYear()
    {
        echo '
        <div class="form-group">
        <label for="car_year" class="control-label col-xs-4">Year Made</label> 
        <div class="col-xs-8">
        <select id="car_year" name="car_year" class="select form-control" required="required">
          <option value="0">Choose Year</option>';


        for ($i = date('Y'); $i >= 1980; --$i) {
            echo '<option value = "' . $i . '">' . $i . '</option>';
        }
        echo '
        <option value = "1940">Cars in 50s (1940)</option>
        <option value = "1950">Cars in 50s (1950)</option>
        <option value = "1960">Cars in 60s (1960)</option>
        <option value = "1970">Cars in 70s (1970)</option>
        </select>
      </div>
    </div>';
    }

    private function inputCarFuelType()
    {
        echo '
        <div class="form-group">
        <label for="car_gear" class="control-label col-xs-4">Fuel Type</label> 
        <div class="col-xs-8">
          <label class="radio-inline">
            <input type="radio" name="car_gear" value="1">
                  Besine
          </label>
          <label class="radio-inline">
            <input type="radio" name="car_gear" value="2">
                  Diesel
          </label>
          <label class="radio-inline">
            <input type="radio" name="car_gear" value="3">
                  Bio-gas
          </label>
          <label class="radio-inline">
            <input type="radio" name="car_gear" value="4">
                  Besine/Electric (Hybrid)
          </label>
          <label class="radio-inline">
            <input type="radio" name="car_gear" value="5">
                  Electric
          </label>
        </div>
      </div>
        ';
    }

    private function inputCarPlateType()
    {
        echo '
        <div class="form-group">
        <label for="car_registered" class="control-label col-xs-4">Registered</label> 
        <div class="col-xs-8">
          <label class="radio-inline">
            <input type="radio" name="car_plate_yes" value="1">
                  Yes
          </label>
          <label class="radio-inline">
            <input type="radio" name="car_plate_no" value="2">
                  No
          </label>
          <label class="radio-inline">
            <input type="radio" name="car_plate_process" value="3">
                  Processing
          </label>
        </div>
      </div>
        ';
        
    }
    private function inputCarGearType()
    {
        echo '
        <div class="form-group">
          <label for="car_fuel" class="control-label col-xs-4">Gear Type</label> 
          <div class="col-xs-8">
            <label class="radio-inline">
              <input type="radio" name="car_fuel" value="1">
                    Manual
            </label>
            <label class="radio-inline">
              <input type="radio" name="car_fuel" value="2">
                    Automatic
            </label>
            <label class="radio-inline">
              <input type="radio" name="car_fuel" value="3">
                    Semi-automatic
            </label>
          </div>
        </div>
        ';
    }
    private function inputCarMilage()
    {
        echo '
        <div class="form-group">
        <label for="car_milage" class="control-label col-xs-4">Milage</label> 
        <div class="col-xs-8">
        <select id="car_milage" name="car_milage" required="required" class="select form-control">
        <option value="0">Choose Milage [Km]</option>';
        for ($i = 0; $i <= 40000;) {
            $j = $i + 4999;
            echo '<option value="' . $i . '">' . $i . '-' . $j . '</option>';
            $i += 5000;
        }
        echo '</select></div></div>';
    }

    private function inputCarSeat()
    {
        echo '
        <div class="form-group">
          <label for="car_seat" class="control-label col-xs-4">Number of Seat</label> 
          <div class="col-xs-8">
            <select id="car_seat" name="car_seat" class="select form-control" required="required">
              <option value="1">Choose Seat</option>';
        for ($i = 0; $i <= 100;) {
            $j = $i + 5;
            echo '<option value="' . $i . '">' . $i . '-' . $j . '</option>';
            $i += 5;
        }
        echo '</select></div></div>';
    }

    private function inputCarColor()
    {
        echo '
        <div class="form-group">
        <label for="car_color" class="control-label col-xs-4">Color</label> 
        <div class="col-xs-8">';
        $colors = [
            "black" => "#000000",
            "green" => "#009f6b",
            "red" => "#C40233",
            "yellow" => "#FFD300",
            "blue" => "#0087BD",
            "white" => "#ffffff",
            "brown" => "#a52a2a",
            "silver" => "#c0c0c0"
        ];
        foreach ($colors as $key => $value) {
            # code...

            echo
                '
          <label class="radio-inline" style="border:1px solid black; background-color:' . $value . ';">
            <input type="radio" name="car_color" value=' . $key . ' >                  
          </label>';
        }

        echo '</div></div>';
    }

    private function contactMeWith($item)
    {
        echo '
        <div class="form-group">
        <label for="' . $item . '_title" class="control-label col-xs-4">Title</label> 
        <div class="col-xs-8">
          <input id="' . $item . '_title" name="' . $item . '_title" type="text" class="form-control" required="required">
        </div>
      </div>
      <div class="form-group">
        <label for="' . $item . '_description" class="control-label col-xs-4">Description</label> 
        <div class="col-xs-8">
          <textarea id="' . $item . '_description" name="' . $item . '_description" cols="40" rows="5" class="form-control"></textarea>
        </div>
      </div>
        <div class="form-group">
        <label for="' . $item . '_contact_me" class="control-label col-xs-4">Contact Me With</label> 
        <div class="col-xs-8">
          <label class="checkbox-inline">
            <input type="checkbox" name="' . $item . '_contact_me" value="1">
                  Phone
          </label>
          <label class="checkbox-inline">
            <input type="checkbox" name="' . $item . '_contact_me" value="2">
                  E-mail
          </label>
          <label class="checkbox-inline">
            <input type="checkbox" name="' . $item . '_contact_me" value="3">
                  Both
          </label>
          <label class="checkbox-inline">
            <input type="checkbox" name="' . $item . '_contact_me" value="4">
                  Message
          </label>
        </div>
      </div>';
    }
}
