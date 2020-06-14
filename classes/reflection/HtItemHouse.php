<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/classes/reflection/class.config.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/classes/reflection/HtUserAll.php';

/**
 * Class HtItemHouse
 * @extends MySqlRecord
 * @filesource HtItemHouse.php
 */

// namespace hulutera;

class HtItemHouse extends MySqlRecord
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
     * Class attribute for mapping the primary key id of table item_house
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
     *  - Null : NO
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
     *  - Default: 
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
     *  - Data type: varchar(10)
     *  - Null : YES
     *  - DB Index: 
     *  - Default: Birr
     *  - Extra:  
     * @var string $fieldPriceCurrency
     */
    private $fieldPriceCurrency;

    /**
     * Class attribute for mapping table field field_image
     *
     * Comment for field field_image: Not specified.<br>
     * Field information:
     *  - Data type: longtext
     *  - Null : NO
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
     * Class attribute for mapping table field field_kebele
     *
     * Comment for field field_kebele: Not specified.<br>
     * Field information:
     *  - Data type: int(10)
     *  - Null : YES
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var int $fieldKebele
     */
    private $fieldKebele;

    /**
     * Class attribute for mapping table field field_wereda
     *
     * Comment for field field_wereda: Not specified.<br>
     * Field information:
     *  - Data type: int(10)
     *  - Null : YES
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var int $fieldWereda
     */
    private $fieldWereda;

    /**
     * Class attribute for mapping table field field_lot_size
     *
     * Comment for field field_lot_size: Not specified.<br>
     * Field information:
     *  - Data type: int(10)
     *  - Null : YES
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var int $fieldLotSize
     */
    private $fieldLotSize;

    /**
     * Class attribute for mapping table field field_nr_bedroom
     *
     * Comment for field field_nr_bedroom: Not specified.<br>
     * Field information:
     *  - Data type: int(10)
     *  - Null : YES
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var int $fieldNrBedroom
     */
    private $fieldNrBedroom;

    /**
     * Class attribute for mapping table field field_toilet
     *
     * Comment for field field_toilet: Not specified.<br>
     * Field information:
     *  - Data type: int(10)
     *  - Null : YES
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var int $fieldToilet
     */
    private $fieldToilet;

    /**
     * Class attribute for mapping table field field_bathroom
     *
     * Comment for field field_bathroom: Not specified.<br>
     * Field information:
     *  - Data type: int(10)
     *  - Null : NO
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var int $fieldBathroom
     */
    private $fieldBathroom;

    /**
     * Class attribute for mapping table field field_build_year
     *
     * Comment for field field_build_year: Not specified.<br>
     * Field information:
     *  - Data type: year(4)
     *  - Null : YES
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var int $fieldBuildYear
     */
    private $fieldBuildYear;

    /**
     * Class attribute for mapping table field field_water
     *
     * Comment for field field_water: Not specified.<br>
     * Field information:
     *  - Data type: varchar(10)
     *  - Null : YES
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var string $fieldWater
     */
    private $fieldWater;

    /**
     * Class attribute for mapping table field field_electricity
     *
     * Comment for field field_electricity: Not specified.<br>
     * Field information:
     *  - Data type: varchar(10)
     *  - Null : YES
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var string $fieldElectricity
     */
    private $fieldElectricity;

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
     * Class attribute for mapping table field field_report
     *
     * Comment for field field_report: Not specified.<br>
     * Field information:
     *  - Data type: varchar(125)
     *  - Null : YES
     *  - DB Index: 
     *  - Default: NULL
     *  - Extra:  
     * @var string $fieldReport
     */
    private $fieldReport;

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
     *  - Default: 2
     *  - Extra:  
     * @var int $fieldTableType
     */
    private $fieldTableType;

    /**
     * Class attribute for storing the SQL DDL of table item_house
     * @var string base64 encoded string for DDL
     */
    private $ddl = "Q1JFQVRFIFRBQkxFIGBpdGVtX2hvdXNlYCAoCiAgYGlkYCBpbnQoNDApIE5PVCBOVUxMIEFVVE9fSU5DUkVNRU5ULAogIGBpZF90ZW1wYCBpbnQoMjApIE5PVCBOVUxMLAogIGBpZF91c2VyYCBpbnQoNDApIE5PVCBOVUxMLAogIGBpZF9jYXRlZ29yeWAgaW50KDQwKSBOT1QgTlVMTCwKICBgZmllbGRfY29udGFjdF9tZXRob2RgIHZhcmNoYXIoNTApIE5PVCBOVUxMLAogIGBmaWVsZF9wcmljZV9yZW50YCB2YXJjaGFyKDQwKSBERUZBVUxUIE5VTEwsCiAgYGZpZWxkX3ByaWNlX3NlbGxgIHZhcmNoYXIoNDApIERFRkFVTFQgTlVMTCwKICBgZmllbGRfcHJpY2VfbmVnb2AgdmFyY2hhcigyMCkgREVGQVVMVCAnTmVnb3RpYWJsZScsCiAgYGZpZWxkX3ByaWNlX3JhdGVgIHZhcmNoYXIoMjApIERFRkFVTFQgTlVMTCwKICBgZmllbGRfcHJpY2VfY3VycmVuY3lgIHZhcmNoYXIoMTApIERFRkFVTFQgJ0JpcnInLAogIGBmaWVsZF9pbWFnZWAgbG9uZ3RleHQgTk9UIE5VTEwsCiAgYGZpZWxkX2xvY2F0aW9uYCB2YXJjaGFyKDQwKSBERUZBVUxUIE5VTEwsCiAgYGZpZWxkX2tlYmVsZWAgaW50KDEwKSBERUZBVUxUIE5VTEwsCiAgYGZpZWxkX3dlcmVkYWAgaW50KDEwKSBERUZBVUxUIE5VTEwsCiAgYGZpZWxkX2xvdF9zaXplYCBpbnQoMTApIERFRkFVTFQgTlVMTCwKICBgZmllbGRfbnJfYmVkcm9vbWAgaW50KDEwKSBERUZBVUxUIE5VTEwsCiAgYGZpZWxkX3RvaWxldGAgaW50KDEwKSBERUZBVUxUIE5VTEwsCiAgYGZpZWxkX2JhdGhyb29tYCBpbnQoMTApIE5PVCBOVUxMLAogIGBmaWVsZF9idWlsZF95ZWFyYCB5ZWFyKDQpIERFRkFVTFQgTlVMTCwKICBgZmllbGRfd2F0ZXJgIHZhcmNoYXIoMTApIERFRkFVTFQgTlVMTCwKICBgZmllbGRfZWxlY3RyaWNpdHlgIHZhcmNoYXIoMTApIERFRkFVTFQgTlVMTCwKICBgZmllbGRfZXh0cmFfaW5mb2AgbWVkaXVtdGV4dCwKICBgZmllbGRfdGl0bGVgIHZhcmNoYXIoMTI1KSBERUZBVUxUIE5VTEwsCiAgYGZpZWxkX3VwbG9hZF9kYXRlYCB0aW1lc3RhbXAgTk9UIE5VTEwgREVGQVVMVCBDVVJSRU5UX1RJTUVTVEFNUCBPTiBVUERBVEUgQ1VSUkVOVF9USU1FU1RBTVAsCiAgYGZpZWxkX3RvdGFsX3ZpZXdgIGludCgxMCkgREVGQVVMVCBOVUxMLAogIGBmaWVsZF9zdGF0dXNgIHZhcmNoYXIoMTApIE5PVCBOVUxMIERFRkFVTFQgJ3BlbmRpbmcnLAogIGBmaWVsZF9tYXJrZXRfY2F0ZWdvcnlgIHZhcmNoYXIoMTUpIE5PVCBOVUxMLAogIGBmaWVsZF90YWJsZV90eXBlYCBpbnQoMTApIE5PVCBOVUxMIERFRkFVTFQgJzInLAogIFBSSU1BUlkgS0VZIChgaWRgKSwKICBLRVkgYHVJRF9GSzNgIChgaWRfdXNlcmApLAogIEtFWSBgaENhdGVnb3J5SURfRktgIChgaWRfY2F0ZWdvcnlgKSwKICBDT05TVFJBSU5UIGBpdGVtX2hvdXNlX2liZmtfMWAgRk9SRUlHTiBLRVkgKGBpZF91c2VyYCkgUkVGRVJFTkNFUyBgdXNlcl9hbGxgIChgaWRgKSBPTiBERUxFVEUgQ0FTQ0FERSBPTiBVUERBVEUgQ0FTQ0FERSwKICBDT05TVFJBSU5UIGBpdGVtX2hvdXNlX2liZmtfMmAgRk9SRUlHTiBLRVkgKGBpZF9jYXRlZ29yeWApIFJFRkVSRU5DRVMgYGNhdGVnb3J5X2hvdXNlYCAoYGlkYCkgT04gREVMRVRFIENBU0NBREUgT04gVVBEQVRFIENBU0NBREUKKSBFTkdJTkU9SW5ub0RCIEFVVE9fSU5DUkVNRU5UPTE3IERFRkFVTFQgQ0hBUlNFVD1sYXRpbjE=";

    /*
     * prop for search elements
    */
    private $maxPriceValue;
    private $typeValue;
    private $maxBedroomValue;
    private $maxToiletValue;
    private $builtYrValue;
    private $locationValue;
    private $keyWordValue;

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
        $object = new HtCategoryHouse("*");
        $result = $object->getResultSet();
        while ($row = $result->fetch_array()) {
            if ($row['field_name'] === $idCategory) {
                $idCategory = $row['id'];
                break;
            }
        }
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
     * The attribute fieldPriceCurrency maps the field field_price_currency defined as varchar(10).<br>
     * Comment for field field_price_currency: Not specified.<br>
     * @param string $fieldPriceCurrency
     * @category Modifier
     */
    public function setFieldPriceCurrency($fieldPriceCurrency)
    {
        $this->fieldPriceCurrency = (string) $fieldPriceCurrency;
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
     * setFieldKebele Sets the class attribute fieldKebele with a given value
     *
     * The attribute fieldKebele maps the field field_kebele defined as int(10).<br>
     * Comment for field field_kebele: Not specified.<br>
     * @param int $fieldKebele
     * @category Modifier
     */
    public function setFieldKebele($fieldKebele)
    {
        $this->fieldKebele = (int) $fieldKebele;
    }

    /**
     * setFieldWereda Sets the class attribute fieldWereda with a given value
     *
     * The attribute fieldWereda maps the field field_wereda defined as int(10).<br>
     * Comment for field field_wereda: Not specified.<br>
     * @param int $fieldWereda
     * @category Modifier
     */
    public function setFieldWereda($fieldWereda)
    {
        $this->fieldWereda = (int) $fieldWereda;
    }

    /**
     * setFieldLotSize Sets the class attribute fieldLotSize with a given value
     *
     * The attribute fieldLotSize maps the field field_lot_size defined as int(10).<br>
     * Comment for field field_lot_size: Not specified.<br>
     * @param int $fieldLotSize
     * @category Modifier
     */
    public function setFieldLotSize($fieldLotSize)
    {
        $this->fieldLotSize = (int) $fieldLotSize;
    }

    /**
     * setFieldNrBedroom Sets the class attribute fieldNrBedroom with a given value
     *
     * The attribute fieldNrBedroom maps the field field_nr_bedroom defined as int(10).<br>
     * Comment for field field_nr_bedroom: Not specified.<br>
     * @param int $fieldNrBedroom
     * @category Modifier
     */
    public function setFieldNrBedroom($fieldNrBedroom)
    {
        $this->fieldNrBedroom = (int) $fieldNrBedroom;
    }

    /**
     * setFieldToilet Sets the class attribute fieldToilet with a given value
     *
     * The attribute fieldToilet maps the field field_toilet defined as int(10).<br>
     * Comment for field field_toilet: Not specified.<br>
     * @param int $fieldToilet
     * @category Modifier
     */
    public function setFieldToilet($fieldToilet)
    {
        $this->fieldToilet = (int) $fieldToilet;
    }

    /**
     * setFieldBathroom Sets the class attribute fieldBathroom with a given value
     *
     * The attribute fieldBathroom maps the field field_bathroom defined as int(10).<br>
     * Comment for field field_bathroom: Not specified.<br>
     * @param int $fieldBathroom
     * @category Modifier
     */
    public function setFieldBathroom($fieldBathroom)
    {
        $this->fieldBathroom = (int) $fieldBathroom;
    }

    /**
     * setFieldBuildYear Sets the class attribute fieldBuildYear with a given value
     *
     * The attribute fieldBuildYear maps the field field_build_year defined as year(4).<br>
     * Comment for field field_build_year: Not specified.<br>
     * @param int $fieldBuildYear
     * @category Modifier
     */
    public function setFieldBuildYear($fieldBuildYear)
    {
        $this->fieldBuildYear = (int) $fieldBuildYear;
    }

    /**
     * setFieldWater Sets the class attribute fieldWater with a given value
     *
     * The attribute fieldWater maps the field field_water defined as varchar(10).<br>
     * Comment for field field_water: Not specified.<br>
     * @param string $fieldWater
     * @category Modifier
     */
    public function setFieldWater($fieldWater)
    {
        $this->fieldWater = (string) $fieldWater;
    }

    /**
     * setFieldElectricity Sets the class attribute fieldElectricity with a given value
     *
     * The attribute fieldElectricity maps the field field_electricity defined as varchar(10).<br>
     * Comment for field field_electricity: Not specified.<br>
     * @param string $fieldElectricity
     * @category Modifier
     */
    public function setFieldElectricity($fieldElectricity)
    {
        $this->fieldElectricity = (string) $fieldElectricity;
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
     * setFieldStatus Sets the class attribute fieldReport with a given value
     *
     * The attribute fieldReport maps the field field_report defined as varchar(10).<br>
     * Comment for field field_report: Not specified.<br>
     * @param string $fieldReport
     * @category Modifier
     */
    public function setFieldReport($fieldReport)
    {
        $this->fieldReport = (string) $fieldReport;
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
        $this->setFieldKebele($_POST['fieldKebele']);
        $this->setFieldWereda($_POST['fieldWereda']);
        $this->setFieldLotSize($_POST['fieldLotSize']);
        $this->setFieldBuildYear($_POST['fieldBuildYear']);
        $this->setFieldNrBedroom($_POST['fieldNrBedroom']);
        $this->setFieldBathroom($_POST['fieldBathroom']);
        $this->setFieldToilet($_POST['fieldToilet']);
        $this->setFieldWater($_POST['fieldWater']);
        $this->setFieldElectricity($_POST['fieldElectricity']);
        $this->setFieldPriceRent($_POST['fieldPriceRent']);
        $this->setFieldPriceRate(isset($_POST['fieldPriceRate']) ? $_POST['fieldPriceRate'] : null);
        $this->setFieldPriceSell($_POST['fieldPriceSell']);
        $this->setFieldPriceCurrency($_POST['fieldPriceCurrency']);
        $this->setFieldPriceNego($_POST['fieldPriceNego']);
        $this->setFieldTitle($_POST['fieldTitle']);
        $this->setFieldContactMethod($_POST['fieldContactMethod']);
        $this->setFieldImage($_POST['fileuploader-list-files']);
        $this->setFieldUploadDate(date("Y-m-d H:i:s"));
        $this->setFieldStatus("pending");

        if (isset($_POST['rentOrSell'])) {
            if ($_POST['rentOrSell'] == "fieldPriceRent") {
                $this->setFieldMarketCategory('rent');
            } else if ($_POST['rentOrSell'] == "fieldPriceSell") {
                $this->setFieldMarketCategory('sell');
            } else if ($_POST['rentOrSell'] == "both") {
                $this->setFieldMarketCategory('rent and sell');
            }
        }
        $this->setFieldTableType(2);

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
     * The attribute fieldPriceCurrency maps the field field_price_currency defined as varchar(10).<br>
     * Comment for field field_price_currency: Not specified.
     * @return string $fieldPriceCurrency
     * @category Accessor of $fieldPriceCurrency
     */
    public function getFieldPriceCurrency()
    {
        return $this->fieldPriceCurrency;
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
     * getFieldKebele gets the class attribute fieldKebele value
     *
     * The attribute fieldKebele maps the field field_kebele defined as int(10).<br>
     * Comment for field field_kebele: Not specified.
     * @return int $fieldKebele
     * @category Accessor of $fieldKebele
     */
    public function getFieldKebele()
    {
        return $this->fieldKebele;
    }

    /**
     * getFieldWereda gets the class attribute fieldWereda value
     *
     * The attribute fieldWereda maps the field field_wereda defined as int(10).<br>
     * Comment for field field_wereda: Not specified.
     * @return int $fieldWereda
     * @category Accessor of $fieldWereda
     */
    public function getFieldWereda()
    {
        return $this->fieldWereda;
    }

    /**
     * getFieldLotSize gets the class attribute fieldLotSize value
     *
     * The attribute fieldLotSize maps the field field_lot_size defined as int(10).<br>
     * Comment for field field_lot_size: Not specified.
     * @return int $fieldLotSize
     * @category Accessor of $fieldLotSize
     */
    public function getFieldLotSize()
    {
        return $this->fieldLotSize;
    }

    /**
     * getFieldNrBedroom gets the class attribute fieldNrBedroom value
     *
     * The attribute fieldNrBedroom maps the field field_nr_bedroom defined as int(10).<br>
     * Comment for field field_nr_bedroom: Not specified.
     * @return int $fieldNrBedroom
     * @category Accessor of $fieldNrBedroom
     */
    public function getFieldNrBedroom()
    {
        return $this->fieldNrBedroom;
    }

    /**
     * getFieldToilet gets the class attribute fieldToilet value
     *
     * The attribute fieldToilet maps the field field_toilet defined as int(10).<br>
     * Comment for field field_toilet: Not specified.
     * @return int $fieldToilet
     * @category Accessor of $fieldToilet
     */
    public function getFieldToilet()
    {
        return $this->fieldToilet;
    }

    /**
     * getFieldBathroom gets the class attribute fieldBathroom value
     *
     * The attribute fieldBathroom maps the field field_bathroom defined as int(10).<br>
     * Comment for field field_bathroom: Not specified.
     * @return int $fieldBathroom
     * @category Accessor of $fieldBathroom
     */
    public function getFieldBathroom()
    {
        return $this->fieldBathroom;
    }

    /**
     * getFieldBuildYear gets the class attribute fieldBuildYear value
     *
     * The attribute fieldBuildYear maps the field field_build_year defined as year(4).<br>
     * Comment for field field_build_year: Not specified.
     * @return int $fieldBuildYear
     * @category Accessor of $fieldBuildYear
     */
    public function getFieldBuildYear()
    {
        return $this->fieldBuildYear;
    }

    /**
     * getFieldWater gets the class attribute fieldWater value
     *
     * The attribute fieldWater maps the field field_water defined as varchar(10).<br>
     * Comment for field field_water: Not specified.
     * @return string $fieldWater
     * @category Accessor of $fieldWater
     */
    public function getFieldWater()
    {
        return $this->fieldWater;
    }

    /**
     * getFieldElectricity gets the class attribute fieldElectricity value
     *
     * The attribute fieldElectricity maps the field field_electricity defined as varchar(10).<br>
     * Comment for field field_electricity: Not specified.
     * @return string $fieldElectricity
     * @category Accessor of $fieldElectricity
     */
    public function getFieldElectricity()
    {
        return $this->fieldElectricity;
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
     * getFieldReport gets the class attribute fieldReport value
     *
     * The attribute fieldReport maps the field field_report defined as varchar(10).<br>
     * Comment for field field_report: Not specified.
     * @return string $fieldReport
     * @category Accessor of $fieldReport
     */
    public function getFieldReport()
    {
        return $this->fieldReport;
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
     * Gets DDL SQL code of the table item_house
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
        return "item_house";
    }

    /**
     * Gets the name of the corresponding category table name
     * @return string
     * @category Accessor
     */
    public function getCatTableName()
    {
        return "category_house";
    }

    /**
     * Gets the name of the managed table short name
     * @return string
     * @category Accessor
     */
    public function getTableNameShort()
    {
        return "house";
    }
    /**
     * The HtItemHouse constructor
     *
     * It creates and initializes an object in two way:
     *  - with null (not fetched) data if none $id is given.
     *  - with a fetched data row from the table item_house having id=$id
     * @param int $id. If omitted an empty (not fetched) instance is created.
     * @return HtItemHouse Object
     */
    public function __construct($id = null, $status = null)
    {
        parent::__construct();
        if (!empty($id)) {
            $this->select($id, $status);
        }
        $this->setCategoryName();
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
     * Fetchs a table row of item_house into the object.
     *
     * Fetched table fields values are assigned to class attributes and they can be managed by using
     * the accessors/modifiers methods of the class.
     * @param int $id the primary key id value of table item_house which identifies the row to select.
     * @return int affected selected row
     * @category DML
     */
    public function select($id = null, $status = null)
    {
        $useQuery = true;
        if ($id == NULL and $status == NULL) {
            $sql = [];
        } elseif ($id == "*" and $status == NULL) {
            $sql = "SELECT * FROM item_house";
        } elseif ($id == "*" and $status != NULL) {
            $sql =  "SELECT * FROM item_house WHERE field_status={$this->parseValue($status, 'notNumber')}";
        } elseif ($id != "*" and $status == NULL) {
            $sql =  "SELECT * FROM item_house WHERE id={$this->parseValue($id, 'int')}";
        } else { //id
            $sql =  "SELECT * FROM item_house WHERE id={$this->parseValue($id, 'int')} AND field_status={$this->parseValue($status, 'notNumber')}";
            $useQuery = false;
        }

        $this->resetLastSqlError();
        if ($useQuery) {
            $result =  $this->query($sql);
            $this->resultSet = $result;
            $this->setFieldValuesForOneItem($result);
        }
        $this->lastSql = $sql;
        return $this->affected_rows;
    }

    /**
     * Run a house query with a request
     * $filter: query condition e.g field_status = 'active' or field_status = 'pending'
     * $start: the first item to fetch
     * $itemPerPage: the total number of items to be fetched from the table
     * return: the number of affected rows
     * N.B: the query is done based on the number of items to be fetched and that is dueto the pagination
     */
    public function runQuery($filter, $start = null, $itemPerPage = null)
    {
        if ($itemPerPage == null) {
            $sql =  "SELECT * FROM item_house $filter";
        } else {
            $sql =  "SELECT * FROM item_house $filter ORDER BY field_upload_date DESC LIMIT $start, $itemPerPage";
        }
        $this->resetLastSqlError();
        $result =  $this->query($sql);
        $this->resultSet = $result;
        $this->lastSql = $sql;
        return $this->affected_rows;
    }

    /**
     * $GET search elements of house
     */
    public function setSearchElements()
    {
        $this->maxPriceValue = (isset($_GET['house_max_price'])) ? $_GET['house_max_price'] : "000";
        $this->typeValue = (isset($_GET['house_type'])) ? $_GET['house_type'] : "none";
        $this->maxBedroomValue = (isset($_GET['house_bedroom'])) ? $_GET['house_bedroom'] : 0;
        $this->maxToiletValue = (isset($_GET['house_toilet'])) ? $_GET['house_toilet'] : 0;
        $this->builtYrValue = (isset($_GET['house_built_year'])) ? $_GET['house_built_year'] : 0;
        $this->locationValue = (isset($_GET['cities'])) ? $_GET['cities'] : "%";
        $this->keyWordValue = (isset($_GET['search_text'])) ? $_GET['search_text'] : "No search word given";
    }

    /**
     * Run a house search query with a request
     * $filter: query condition e.g field_status = 'active' or field_status = 'pending'
     * $start: the first item to fetch
     * $itemPerPage: the total number of items to be fetched from the table
     * return: the number of affected rows
     * N.B: the query is done based on the number of items to be fetched and that is dueto the pagination
     */
    public function searchQuery($start = null, $itemPerPage = null, $searchType)
    {

        $itemTable = $this->getTableName();
        $catTableName =   $this->getCatTableName();
        $joinCatTable = "INNER JOIN " . $catTableName . " ON " . $itemTable . ".id_category = " . $catTableName . ".id ";
        $statusFilter = " WHERE field_status LIKE 'active'";
        $maxPriceFilter = ($this->maxPriceValue != "000")  ? ($this->maxPriceValue == 20000001) ? "field_price_sell LIKE '%'" : "field_price_sell <= " .  (int) ($this->maxPriceValue) : "field_price_sell LIKE '%'";
        $maxBedroomFilter = ($this->maxBedroomValue != 0)  ? ($this->maxBedroomValue == 101) ? "field_nr_bedroom >= " .  (int) ($this->maxBedroomValue) : "field_nr_bedroom >= " .  (int) ($this->maxBedroomValue) : "field_nr_bedroom LIKE '%'";
        $maxToiletFilter = ($this->maxToiletValue != 0)  ? ($this->maxToiletValue == 101) ? "field_toilet >= " .  (int) ($this->maxToiletValue) : "field_toilet >= " .  (int) ($this->maxToiletValue) : "field_toilet LIKE '%'";
        $builtYrFilter = $this->builtYear();

        if ($searchType == "single-item") {
            $titleFilter = "field_title LIKE '%" . $this->replaceAposBackSlash($this->keyWordValue) . "%'";
            $typeFilter = ($this->typeValue != "none") ? "field_name LIKE '" .  $this->replaceAposBackSlash($this->typeValue) . "'" : "( field_name LIKE '%' OR field_name is null )";
            $locationFilter =  ($this->locationValue != "000")  ? "field_location LIKE '" . $this->replaceAposBackSlash($this->locationValue) . "'" : "( field_location LIKE '%' OR field_location is null )";

            $itemFilter = "$typeFilter AND  $titleFilter AND $locationFilter";
        } else {
            $titleFilter = ($this->keyWordValue != "") ? "field_title LIKE '%" . $this->replaceAposBackSlash($this->keyWordValue) . "%'" : "field_title LIKE 'No search word given'";
            $typeFilter = ($this->keyWordValue != "") ? "field_name LIKE '%" . $this->replaceAposBackSlash($this->keyWordValue) . "%'" : "field_name LIKE 'No search word given'";
            $locationFilter = ($this->keyWordValue != "") ? "field_location LIKE '%" . $this->replaceAposBackSlash($this->keyWordValue) . "%'" : "field_location LIKE 'No search word given'";
            $locationFilter2 = ($this->locationValue != "000")  ? "field_location LIKE '" . $this->replaceAposBackSlash($this->locationValue) . "'" : "( field_location LIKE 'No search word given')";

            $itemFilter = "( $typeFilter OR $titleFilter OR $locationFilter OR $locationFilter2 )";
        }

        $filter = "$statusFilter AND $maxPriceFilter AND  $itemFilter AND  $maxBedroomFilter AND  $maxToiletFilter AND $builtYrFilter";

        if ($itemPerPage == null) {
            $sql =  "SELECT $itemTable.id, field_upload_date, field_table_type FROM $itemTable  $joinCatTable $filter";
        } else {
            $sql =  "SELECT * FROM $itemTable $joinCatTable $filter ORDER BY field_upload_date DESC LIMIT $start, $itemPerPage";
        }


        $this->resetLastSqlError();
        $result =  $this->query($sql);
        $this->resultSet = $result;
        $this->lastSql = $sql;
        return $this->affected_rows;
    }


    public function builtYear()
    {

        $yr = (int) ($this->builtYrValue);

        if ($yr == 0) {
            $filter = "field_build_year LIKE '%'";
        } else {
            if ($yr  <= 1940) {
                $lower = 1939;
                $upper = 1940;
            } else if ($yr > 1940 and $yr < 1950) {
                $lower = 1940;
                $upper = 1950;
            } else if ($yr >= 1950 and $yr < 1960) {
                $lower = 1950;
                $upper = 1960;
            } else if ($yr >= 1960 and $yr < 1970) {
                $lower = 1960;
                $upper = 1970;
            } else if ($yr >= 1970 and $yr < 1980) {
                $lower = 1970;
                $upper = 1980;
            } else if ($yr >= 1980 and $yr < 1990) {
                $lower = 1980;
                $upper = 1990;
            } else if ($yr >= 1990 and $yr < 2000) {
                $lower = 1990;
                $upper = 2000;
            } else if ($yr >= 2000 and $yr < 2005) {
                $lower = 2000;
                $upper = 2005;
            } else if ($yr >= 2005 and $yr < 2010) {
                $lower = 2005;
                $upper = 2010;
            } else if ($yr >= 2010 and $yr < 2015) {
                $lower = 2010;
                $upper = 2015;
            }

            $filter = "field_model_year >=  $lower AND field_model_year < $upper";
        }

        return $filter;
    }



    /* 
    ** Set the house element values
    * $rows: it takes the array of one item row and it sets the values
    */
    public function setFieldValues($input)
    {
        if (!is_object($input)) {
            $rowObject = (object) $input;
        } else {
            $rowObject = $input->fetch_object();
        }
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
        @$this->fieldImage = $this->replaceAposBackSlash($rowObject->field_image);
        @$this->fieldLocation = $this->replaceAposBackSlash($rowObject->field_location);
        @$this->fieldKebele = (int) $rowObject->field_kebele;
        @$this->fieldWereda = (int) $rowObject->field_wereda;
        @$this->fieldLotSize = (int) $rowObject->field_lot_size;
        @$this->fieldNrBedroom = (int) $rowObject->field_nr_bedroom;
        @$this->fieldToilet = (int) $rowObject->field_toilet;
        @$this->fieldBathroom = (int) $rowObject->field_bathroom;
        @$this->fieldBuildYear = $rowObject->field_build_year;
        @$this->fieldWater = $this->replaceAposBackSlash($rowObject->field_water);
        @$this->fieldElectricity = $this->replaceAposBackSlash($rowObject->field_electricity);
        @$this->fieldExtraInfo = $this->replaceAposBackSlash($rowObject->field_extra_info);
        @$this->fieldTitle = $this->replaceAposBackSlash($rowObject->field_title);
        @$this->fieldUploadDate = $rowObject->field_upload_date;
        @$this->fieldTotalView = (int) $rowObject->field_total_view;
        @$this->fieldStatus = $this->replaceAposBackSlash($rowObject->field_status);
        @$this->fieldReport = $this->replaceAposBackSlash($rowObject->field_report);
        @$this->fieldMarketCategory = $this->replaceAposBackSlash($rowObject->field_market_category);
        @$this->fieldTableType = (int) $rowObject->field_table_type;
    }

    public function setFieldValuesForOneItem($input)
    {
        $this->allowUpdate = true;
        $this->setFieldValues($input);
    }
    /* 
    ** Set the house category elements
    * 
    */
    public function setCategoryName()
    {
        $object = new HtCategoryHouse("*");
        $result = $object->getResultSet();
        while ($row = $result->fetch_assoc()) {
            $catArray[] = $row;
        }
        $this->categoryNameArray = $catArray;
    }

    /**
     * Deletes a specific row from the table item_house
     * @param int $id the primary key id value of table item_house which identifies the row to delete.
     * @return int affected deleted row
     * @category DML
     */
    public function delete($id)
    {
        $sql = "DELETE FROM item_house WHERE id={$this->parseValue($id, 'int')}";
        $this->resetLastSqlError();

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
     * Insert the current object into a new table row of item_house
     *
     * All class attributes values defined for mapping all table fields are automatically used during inserting
     * @return mixed MySQL insert result
     * @category DML
     */
    public function insertPost()
    {
        $this->setFieldPost();
        $this->insert();
    }

    public function insert()
    {
        if ($this->isPkAutoIncrement) {
            $this->id = "";
        }
        // $constants = get_defined_constants();
        $sql = <<< SQL
            INSERT INTO item_house
            (id_temp,id_user,id_category,field_contact_method,field_price_rent,field_price_sell,field_price_nego,field_price_rate,field_price_currency,field_image,field_location,field_kebele,field_wereda,field_lot_size,field_nr_bedroom,field_toilet,field_bathroom,field_build_year,field_water,field_electricity,field_extra_info,field_title,field_upload_date,field_total_view,field_status,field_report,field_market_category,field_table_type)
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
			{$this->parseValue($this->fieldImage, 'notNumber')},
			{$this->parseValue($this->fieldLocation, 'notNumber')},
			{$this->parseValue($this->fieldKebele)},
			{$this->parseValue($this->fieldWereda)},
			{$this->parseValue($this->fieldLotSize)},
			{$this->parseValue($this->fieldNrBedroom)},
			{$this->parseValue($this->fieldToilet)},
			{$this->parseValue($this->fieldBathroom)},
			{$this->parseValue($this->fieldBuildYear)},
			{$this->parseValue($this->fieldWater, 'notNumber')},
			{$this->parseValue($this->fieldElectricity, 'notNumber')},
			{$this->parseValue($this->fieldExtraInfo, 'notNumber')},
			{$this->parseValue($this->fieldTitle, 'notNumber')},
			{$this->parseValue($this->fieldUploadDate, 'notNumber')},
			{$this->parseValue($this->fieldTotalView)},
			{$this->parseValue($this->fieldStatus, 'notNumber')},
			{$this->parseValue($this->fieldMarketCategory, 'notNumber')},
			{$this->parseValue($this->fieldTableType)})
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
     * Updates a specific row from the table item_house with the values of the current object.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating of selected row.<br>
     * Null values are used for all attributes not previously setted.
     * @param int $id the primary key id value of table item_house which identifies the row to update.
     * @return mixed MySQL update result
     * @category DML
     */
    public function update($id)
    {
        // $constants = get_defined_constants();
        if ($this->allowUpdate) {
            $sql = <<< SQL
            UPDATE
                item_house
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
				field_image={$this->parseValue($this->fieldImage, 'notNumber')},
				field_location={$this->parseValue($this->fieldLocation, 'notNumber')},
				field_kebele={$this->parseValue($this->fieldKebele)},
				field_wereda={$this->parseValue($this->fieldWereda)},
				field_lot_size={$this->parseValue($this->fieldLotSize)},
				field_nr_bedroom={$this->parseValue($this->fieldNrBedroom)},
				field_toilet={$this->parseValue($this->fieldToilet)},
				field_bathroom={$this->parseValue($this->fieldBathroom)},
				field_build_year={$this->parseValue($this->fieldBuildYear)},
				field_water={$this->parseValue($this->fieldWater, 'notNumber')},
				field_electricity={$this->parseValue($this->fieldElectricity, 'notNumber')},
				field_extra_info={$this->parseValue($this->fieldExtraInfo, 'notNumber')},
				field_title={$this->parseValue($this->fieldTitle, 'notNumber')},
				field_upload_date={$this->parseValue($this->fieldUploadDate, 'notNumber')},
				field_total_view={$this->parseValue($this->fieldTotalView)},
				field_status={$this->parseValue($this->fieldStatus, 'notNumber')},
                field_report={$this->parseValue($this->fieldReport, 'notNumber')},
                field_market_category={$this->parseValue($this->fieldMarketCategory, 'notNumber')},
				field_table_type={$this->parseValue($this->fieldTableType)}
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
     * Facility for updating a row of item_house previously loaded.
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
     * Facility for display a row for item_house previously loaded.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating.
     * @category DML Helper
     * @return mixed MySQLi update result
     */
    public function display()
    {
        echo '<div>';
        echo "<p class=\"bg-success\"><a href=\"javascript:void(0)\" onclick=\"hidespec('" . $this->getTableNameShort() . "', '" . $this->getId() . "')\"><i id=\"spec_up_" . $this->getTableNameShort() . $this->getId() . "\" class=\"glyphicon glyphicon-chevron-up\"></i></a><a href=\"javascript:void(0)\" onclick=\"showspec('" . $this->getTableNameShort() . "', '" . $this->getId() . "')\"><i id=\"spec_down_" . $this->getTableNameShort() . $this->getId() . "\" class=\"glyphicon glyphicon-chevron-down\" style=\"display:none\"></i></a> <strong>" . $GLOBALS['lang']['item specification'] . "</strong></p>";
        echo '<div id="spec_' . $this->getTableNameShort() . $this->getId() . '" class="itemSpecDiv col-xs-12 col-md-12">';

        if ($this->getidCategory() != null) {
            if ($this->getidCategory() != 6) {
                $houseCategory = $GLOBALS['upload_specific_array']['house']['idCategory'][2][$this->houseCategory($this->getIdCategory())];
                echo $this->getIdCategory() != null ? "<p>" . $GLOBALS['upload_specific_array']['house']['idCategory'][0] . ":&nbsp<strong>" .  $houseCategory . "</strong></p>" : "";
            }
        }

        echo $this->getFieldKebele() != null ? '<p>' . $GLOBALS["upload_specific_array"]["house"]["fieldKebele"][0] . ':&nbsp<strong>' . $this->getFieldKebele() . '</strong></p>' : "";
        echo $this->getFieldWereda() != null  ? '<p>' . $GLOBALS["upload_specific_array"]["house"]["fieldWereda"][0] . ':&nbsp<strong>' . $this->getFieldWereda() . '</strong></p>' : "";
        echo $this->getFieldLotSize() != null  ? '<p>' . $GLOBALS["upload_specific_array"]["house"]["fieldLotSize"][0] . ':&nbsp<strong>' . $this->getFieldLotSize() . '</strong></p>' : "";
        echo $this->getFieldNrBedroom() != null  ? '<p>' . $GLOBALS["upload_specific_array"]["house"]["fieldNrBedroom"][0] . ':&nbsp<strong>' . $this->getFieldNrBedroom() . '</strong></p>' : "";
        echo $this->getFieldToilet() != null  ? '<p>' . $GLOBALS["upload_specific_array"]["house"]["fieldToilet"][0] . ':&nbsp<strong>' . $this->getFieldToilet() . '</strong></p>' : "";
        echo $this->getFieldBathroom() != null  ? '<p>' . $GLOBALS["upload_specific_array"]["house"]["fieldBathroom"][0] . ':&nbsp<strong>' . $this->getFieldBathroom() . '</strong></p>' : "";

        if ($this->getFieldBuildYear() != null) {
            if ($this->getFieldBuildYear() < 1970 or $this->getFieldBuildYear() == "unknown") {
                $buildYear = $GLOBALS["upload_specific_array"]["house"]["fieldBuildYear"][2][$this->getFieldBuildYear()];
            } else {
                $buildYear =  $this->getFieldBuildYear();
            }

            echo $this->getFieldBuildYear() != null  ? '<p>' . $GLOBALS["upload_specific_array"]["house"]["fieldBuildYear"][0] . ':&nbsp<strong>' . $buildYear . '</strong></p>' : "";
        }
        echo $this->getFieldWater() != null  ? '<p>' . $GLOBALS["upload_specific_array"]["house"]["fieldWater"][0] . ':&nbsp<strong>' . $GLOBALS["upload_specific_array"]["house"]["fieldWater"][2][$this->getFieldWater()] . '</strong></p>' : "";
        //echo $this->getFieldExtraInfo() != null   ? "<p><p><strong>Extra Info:</strong></p><p style=\"border:1px solid darkkhaki;overflow:scroll;height:70px; width:100%;\">" . $this->getFieldExtraInfo() . "</p>" : "";
        echo '</div>';
        echo '</div>';
        echo '<div class="priceDivTitle col-xs-12 col-md-12"><p class="bg-success"><strong>' . $GLOBALS["upload_specific_array"]["common"]["rentOrSell"][3] . '</strong></p></div>';
    }

    private $uploadOption = array(
        'idTemp' => 'id Temp',
        'idUser' => 'id User',
        'idCategory' => 'Type',
        'fieldContactMethod' => 'Contact Method',
        'fieldPriceRent' => 'Price Rent',
        'fieldPriceSell' => 'Price Sell',
        'fieldPriceNego' => 'Price Nego',
        'fieldPriceRate' => 'Price Rate',
        'fieldPriceCurrency' => 'Price Currency',
        'fieldImage' => 'Image',
        'fieldLocation' => 'Location',
        'fieldKebele' => 'Kebele',
        'fieldWereda' => 'Wereda',
        'fieldLotSize' => 'Lot Size',
        'fieldNrBedroom' => 'Nr Bedroom',
        'fieldToilet' => 'Toilet',
        'fieldBathroom' => 'Bathroom',
        'fieldBuildYear' => 'Build Year',
        'fieldWater' => 'Water',
        'fieldElectricity' => 'Electricity',
        'fieldExtraInfo' => 'Extra Info',
        'fieldTitle' => 'Title',
        'fieldUploadDate' => 'Upload Date',
        'fieldTotalView' => 'Total View',
        'fieldStatus' => 'Status',
        'fieldMarketCategory' => 'Market Category',
        'fieldTableType' => 'Table Type'
    );
    /**
     * Class attribute for storing default upload values from upload functionality     
     */
    private $uploadOptionShort = array(
        'idTemp' => 'id Temp',
        'idUser' => 'id User',
        'idCategory' => 'Type',
        'fieldContactMethod' => 'Contact Method',
        'fieldPriceRent' => 'Price Rent',
        'fieldPriceSell' => 'Price Sell',
        'fieldPriceNego' => 'Price Nego',
        'fieldPriceRate' => 'Price Rate',
        'fieldPriceCurrency' => 'Price Currency',
        'fieldImage' => 'Image',
        'fieldLocation' => 'Location',
        'fieldKebele' => 'Kebele',
        'fieldWereda' => 'Wereda',
        'fieldLotSize' => 'Lot Size',
        'fieldNrBedroom' => 'Nr Bedroom',
        'fieldToilet' => 'Toilet',
        'fieldBathroom' => 'Bathroom',
        'fieldBuildYear' => 'Build Year',
        'fieldWater' => 'Water',
        'fieldElectricity' => 'Electricity',
        'fieldExtraInfo' => 'Extra Info',
        'fieldTitle' => 'Title',
        'fieldUploadDate' => 'Upload Date',
        'fieldTotalView' => 'Total View',
        'fieldStatus' => 'Status',
        'fieldMarketCategory' => 'Market Category',
        'fieldTableType' => 'Table Type'
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

    public function upload()
    {
        $lang_sw = isset($_GET['lan']) ? "&lan=" . $_GET['lan'] : "";
        echo '<form class="form-horizontal" action="../../includes/thumbnails/php/form_upload.php?table=' . $this->getTableName() . $lang_sw . '" method="post" enctype="multipart/form-data">';
        $itemName = $this->getTableNameShort();
        $this->insertAllField($itemName);
        echo '</form>';
    }

    protected function insertAllField($itemName,  $skipRow = null)
    {
        ___open_div_("container-fluid", '" style="margin-left:15%; margin-right:15%;');
        $this->insertHeader($itemName);
        ////
        ___open_div_("row", "");
        ___open_div_("col-md-12", '" style="border:1px solid #c7c7c7;border-bottom: 1px solid white;');
        ___open_div_("form-group upload", "");

        ___open_div_("col-md-12", '');
        $this->insertSelectable('idCategory', 'upload_specific_array', $itemName);
        ___close_div_(1);

        ___open_div_("col-md-4", '');
        $selectable = $this->lister(1, 100);
        $this->insertSelectable('fieldKebele', 'upload_specific_array', $itemName, $selectable);
        ___close_div_(1);

        ___open_div_("col-md-4", '');
        $this->insertSelectable('fieldWereda', 'upload_specific_array', $itemName, $selectable);
        ___close_div_(1);

        ___open_div_("col-md-4", '');
        $this->insertSelectable('fieldWater', 'upload_specific_array', $itemName);
        ___close_div_(1);
        ___open_div_("col-md-4", '');
        $this->insertSelectable('fieldElectricity', 'upload_specific_array', $itemName);
        ___close_div_(1);

        ___open_div_("col-md-4 lotsize", '');
        $selectable = $this->lister(1, 10000, 50);
        $this->insertFillable('fieldLotSize', 'upload_specific_array', $itemName); //, $selectable);
        ___close_div_(1);

        ___close_div_(3); //top-3
        ////
        $this->insertDetails($itemName);
        ////
        ___open_div_("row", "");
        ___open_div_("col-md-12 upload", '" style="border:1px solid #c7c7c7; border-bottom: 1px solid white;');
        ___open_div_("form-group upload", "");
        $this->insertItemPrice();
        ___close_div_(3);
        ////
        ___open_div_("row", "");
        ___open_div_("col-md-12 upload", '" style="border:1px solid #c7c7c7; border-bottom: 1px solid white;');
        ___open_div_("form-group upload", "");
        $this->insertFieldContactMethod();
        ___close_div_(3);
        ////        
        ___open_div_("row", "");
        ___open_div_("col-md-12 upload", '" style="border:1px solid #c7c7c7; border-bottom: 1px solid white;');
        ___open_div_("form-group upload", "");
        $this->insertItemImages();
        ___close_div_(3);

        ___open_div_("row", "");
        ___open_div_("col-md-12 upload", '" style="border:1px solid #c7c7c7;');
        ___open_div_("form-group upload", "");
        echo '<button name="submit" type="submit" class="btn btn-primary btn-lg btn-block">' . $GLOBALS['lang']['submit'] . '</button>';
        ___close_div_(3);
        ___close_div_(1);
    }

    private function insertDetails($itemName)
    {
        $style = "display: block;";

        if (
            isset($_SESSION['POST']["idCategory"]) &&
            ($_SESSION['POST']["idCategory"] === "Land")
        ) {
            $style = "display: none;";
        }
        $globalArrayName = 'upload_specific_array';
        ___open_div_("row land", '" style="' . $style);
        ___open_div_("col-md-12", '" style="border:1px solid #c7c7c7;border-bottom: 1px solid white;');
        ___open_div_("form-group upload", "");
        ___open_div_("col-md-6", '');
        $this->insertSelectable('fieldBuildYear', $globalArrayName, $itemName);
        ___close_div_(1);
        ___open_div_("col-md-6", '');
        $selectable = $this->lister(1, 100);
        $this->insertSelectable('fieldBathroom', $globalArrayName, $itemName, $selectable);
        ___close_div_(1);
        ___open_div_("col-md-6", '');
        $this->insertSelectable('fieldToilet', $globalArrayName, $itemName, $selectable);
        ___close_div_(1);
        ___open_div_("col-md-6", '');
        $this->insertSelectable('fieldNrBedroom', $globalArrayName, $itemName, $selectable);
        ___close_div_(1);
        ___close_div_(3);
    }

    /**
     * input: category id
     * returns car category name
     */

    public function houseCategory($categoryId)
    {
        $row = $this->categoryNameArray;
        $cat = $row[$categoryId - 1]['field_name'];
        return $cat;
    }
}
