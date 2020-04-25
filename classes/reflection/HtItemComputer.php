<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/classes/reflection/class.config.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/classes/reflection/HtUserAll.php';

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
    private $ddl = "Q1JFQVRFIFRBQkxFIGBpdGVtX2NvbXB1dGVyYCAoCiAgYGlkYCBpbnQoNDApIE5PVCBOVUxMIEFVVE9fSU5DUkVNRU5ULAogIGBpZF90ZW1wYCBpbnQoMjApIERFRkFVTFQgTlVMTCwKICBgaWRfdXNlcmAgaW50KDQwKSBOT1QgTlVMTCwKICBgaWRfY2F0ZWdvcnlgIGludCg0MCkgTk9UIE5VTEwsCiAgYGlkX2NvbnRhY3RfY2F0ZWdvcnlgIGludCgzKSBOT1QgTlVMTCwKICBgZmllbGRfcHJpY2VgIHZhcmNoYXIoNDApIERFRkFVTFQgTlVMTCwKICBgZmllbGRfcHJpY2VfbmVnb2AgdmFyY2hhcigyMCkgREVGQVVMVCBOVUxMLAogIGBmaWVsZF9wcmljZV9jdXJyZW5jeWAgdmFyY2hhcigyMCkgTk9UIE5VTEwgREVGQVVMVCAnQmlycicsCiAgYGZpZWxkX21hZGVgIHZhcmNoYXIoMjApIERFRkFVTFQgTlVMTCwKICBgZmllbGRfb3NgIHZhcmNoYXIoMjApIERFRkFVTFQgTlVMTCwKICBgZmllbGRfbW9kZWxgIHZhcmNoYXIoMjApIERFRkFVTFQgTlVMTCwKICBgZmllbGRfcHJvY2Vzc29yYCB2YXJjaGFyKDIwKSBERUZBVUxUIE5VTEwsCiAgYGZpZWxkX3JhbWAgdmFyY2hhcigyMCkgREVGQVVMVCBOVUxMLAogIGBmaWVsZF9oYXJkX2RyaXZlYCB2YXJjaGFyKDIwKSBERUZBVUxUIE5VTEwsCiAgYGZpZWxkX2NvbG9yYCB2YXJjaGFyKDIwKSBERUZBVUxUIE5VTEwsCiAgYGZpZWxkX2ltYWdlYCBsb25ndGV4dCBOT1QgTlVMTCwKICBgZmllbGRfbG9jYXRpb25gIHZhcmNoYXIoNDApIERFRkFVTFQgTlVMTCwKICBgZmllbGRfZXh0cmFfaW5mb2AgbWVkaXVtdGV4dCwKICBgZmllbGRfdGl0bGVgIHZhcmNoYXIoMTI1KSBERUZBVUxUIE5VTEwsCiAgYGZpZWxkX3VwbG9hZF9kYXRlYCB0aW1lc3RhbXAgTk9UIE5VTEwgREVGQVVMVCBDVVJSRU5UX1RJTUVTVEFNUCBPTiBVUERBVEUgQ1VSUkVOVF9USU1FU1RBTVAsCiAgYGZpZWxkX3RvdGFsX3ZpZXdgIGludCgxMCkgREVGQVVMVCBOVUxMLAogIGBmaWVsZF9zdGF0dXNgIHZhcmNoYXIoMTApIE5PVCBOVUxMIERFRkFVTFQgJ3BlbmRpbmcnLAogIGBmaWVsZF9tYXJrZXRfY2F0ZWdvcnlgIHZhcmNoYXIoMTApIE5PVCBOVUxMLAogIGBmaWVsZF90YWJsZV90eXBlYCBpbnQoMTApIE5PVCBOVUxMIERFRkFVTFQgJzMnLAogIFBSSU1BUlkgS0VZIChgaWRgKSwKICBLRVkgYHVJRF9GSzJgIChgaWRfdXNlcmApLAogIEtFWSBgZF9DYXRlZ29yeUlEX0ZLYCAoYGlkX2NhdGVnb3J5YCksCiAgQ09OU1RSQUlOVCBgaXRlbV9jb21wdXRlcl9pYmZrXzFgIEZPUkVJR04gS0VZIChgaWRfdXNlcmApIFJFRkVSRU5DRVMgYHVzZXJfYWxsYCAoYGlkYCkgT04gREVMRVRFIENBU0NBREUgT04gVVBEQVRFIENBU0NBREUsCiAgQ09OU1RSQUlOVCBgaXRlbV9jb21wdXRlcl9pYmZrXzJgIEZPUkVJR04gS0VZIChgaWRfY2F0ZWdvcnlgKSBSRUZFUkVOQ0VTIGBjYXRlZ29yeV9jb21wdXRlcmAgKGBpZGApIE9OIERFTEVURSBDQVNDQURFIE9OIFVQREFURSBDQVNDQURFCikgRU5HSU5FPUlubm9EQiBBVVRPX0lOQ1JFTUVOVD01NyBERUZBVUxUIENIQVJTRVQ9bGF0aW4x";

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
        $object = new HtCategoryComputer("*");
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
     * setFieldMade Sets the class attribute fieldMade with a given value
     *
     * The attribute fieldMade maps the field field_made defined as varchar(20).<br>
     * Comment for field field_made: Not specified.<br>
     * @param string $fieldMade
     * @category Modifier
     */
    public function setFieldMade($fieldMade)
    {
        $this->fieldMade = (string) $fieldMade;
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
        $this->fieldOs = (string) $fieldOs;
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
     * setFieldProcessor Sets the class attribute fieldProcessor with a given value
     *
     * The attribute fieldProcessor maps the field field_processor defined as varchar(20).<br>
     * Comment for field field_processor: Not specified.<br>
     * @param string $fieldProcessor
     * @category Modifier
     */
    public function setFieldProcessor($fieldProcessor)
    {
        $this->fieldProcessor = (string) $fieldProcessor;
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
        $this->fieldRam = (string) $fieldRam;
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
        $this->fieldHardDrive = (string) $fieldHardDrive;
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
     * setFieldMarketCategory Sets the class attribute fieldMarketCategory with a given value
     *
     * The attribute fieldMarketCategory maps the field field_market_category defined as varchar(10).<br>
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
        $this->setFieldMade($_POST['fieldMade']);
        $this->setFieldModel($_POST['fieldModel']);
        $this->setFieldOs($_POST['fieldOs']);
        $this->setFieldProcessor($_POST['fieldProcessor']);
        $this->setFieldRam($_POST['fieldRam']);
        $this->setFieldHardDrive($_POST['fieldHardDrive']);
        $this->setFieldColor($_POST['fieldColor']);
        $this->setFieldPriceSell($_POST['fieldPriceSell']);
        $this->setFieldPriceCurrency($_POST['fieldPriceCurrency']);
        $this->setFieldPriceNego($_POST['fieldPriceNego']);
        $this->setFieldTitle($_POST['fieldTitle']);
        $this->setFieldContactMethod($_POST['fieldContactMethod']);
        $this->setFieldImage($_POST['fileuploader-list-files']);
        $this->setFieldUploadDate(date("Y-m-d H:i:s"));
        $this->setFieldStatus("pending");
        $this->setFieldMarketCategory('sell');
        $this->setFieldTableType(3);

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
     * Gets the name of the managed table short name
     * @return string
     * @category Accessor
     */
    public function getTableNameShort()
    {
        return "computer";
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
        if ($id == "*") {
            $sql = "SELECT * FROM item_computer";
        } else { //id
            $sql =  "SELECT * FROM item_computer WHERE id={$this->parseValue($id, 'int')}";
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
            @$this->fieldPriceSell = $this->replaceAposBackSlash($rowObject->field_price_sell);
            @$this->fieldPriceNego = $this->replaceAposBackSlash($rowObject->field_price_nego);
            @$this->fieldPriceCurrency = $this->replaceAposBackSlash($rowObject->field_price_currency);
            @$this->fieldMade = $this->replaceAposBackSlash($rowObject->field_made);
            @$this->fieldOs = $this->replaceAposBackSlash($rowObject->field_os);
            @$this->fieldModel = $this->replaceAposBackSlash($rowObject->field_model);
            @$this->fieldProcessor = $this->replaceAposBackSlash($rowObject->field_processor);
            @$this->fieldRam = $this->replaceAposBackSlash($rowObject->field_ram);
            @$this->fieldHardDrive = $this->replaceAposBackSlash($rowObject->field_hard_drive);
            @$this->fieldColor = $this->replaceAposBackSlash($rowObject->field_color);
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
     * Deletes a specific row from the table item_computer
     * @param int $id the primary key id value of table item_computer which identifies the row to delete.
     * @return int affected deleted row
     * @category DML
     */
    public function delete($id)
    {
        $sql = "DELETE FROM item_computer WHERE id={$this->parseValue($id, 'int')}";
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->lastSql = $sql;
        if (!$result) {
            $this->lastSqlError = $this->sqlstate . " - " . $this->error;
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
        $this->setFieldPost();

        if ($this->isPkAutoIncrement) {
            $this->id = "";
        }
        // $constants = get_defined_constants();
        $sql = <<< SQL
            INSERT INTO item_computer
            (id_temp,id_user,id_category,field_contact_method,field_price_sell,field_price_nego,field_price_currency,field_made,field_os,field_model,field_processor,field_ram,field_hard_drive,field_color,field_image,field_location,field_extra_info,field_title,field_upload_date,field_total_view,field_status,field_market_category,field_table_type)
            VALUES(
			{$this->parseValue($this->idTemp)},
			{$this->parseValue($this->idUser)},
			{$this->parseValue($this->idCategory)},
			{$this->parseValue($this->fieldContactMethod, 'notNumber')},
			{$this->parseValue($this->fieldPriceSell, 'notNumber')},
			{$this->parseValue($this->fieldPriceNego, 'notNumber')},
			{$this->parseValue($this->fieldPriceCurrency, 'notNumber')},
			{$this->parseValue($this->fieldMade, 'notNumber')},
			{$this->parseValue($this->fieldOs, 'notNumber')},
			{$this->parseValue($this->fieldModel, 'notNumber')},
			{$this->parseValue($this->fieldProcessor, 'notNumber')},
			{$this->parseValue($this->fieldRam, 'notNumber')},
			{$this->parseValue($this->fieldHardDrive, 'notNumber')},
			{$this->parseValue($this->fieldColor, 'notNumber')},
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

        echo $sql;
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
				id_category={$this->parseValue($this->idCategory)},
				field_contact_method={$this->parseValue($this->fieldContactMethod, 'notNumber')},
				field_price_sell={$this->parseValue($this->fieldPriceSell, 'notNumber')},
				field_price_nego={$this->parseValue($this->fieldPriceNego, 'notNumber')},
				field_price_currency={$this->parseValue($this->fieldPriceCurrency, 'notNumber')},
				field_made={$this->parseValue($this->fieldMade, 'notNumber')},
				field_os={$this->parseValue($this->fieldOs, 'notNumber')},
				field_model={$this->parseValue($this->fieldModel, 'notNumber')},
				field_processor={$this->parseValue($this->fieldProcessor, 'notNumber')},
				field_ram={$this->parseValue($this->fieldRam, 'notNumber')},
				field_hard_drive={$this->parseValue($this->fieldHardDrive, 'notNumber')},
				field_color={$this->parseValue($this->fieldColor, 'notNumber')},
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

    /**
     * Facility for display a row for item_computer previously loaded.
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

    private $uploadOptionShort = array(
        'idCategory' => 'Type',
        'fieldContactMethod' => 'Contact Method',
        'fieldPriceSell' => 'Price Sell',
        'fieldPriceNego' => 'Price Nego',
        'fieldPriceCurrency' => 'Price Currency',
        'fieldMade' => 'Made',
        'fieldOs' => 'OS (Operting System)',
        'fieldModel' => 'Model',
        'fieldProcessor' => 'Processor',
        'fieldRam' => 'Ram',
        'fieldHardDrive' => 'Hard Drive',
        'fieldColor' => 'Color',
        'fieldImage' => 'Image',
        'fieldLocation' => 'Location',
        'fieldExtraInfo' => 'Extra Info',
        'fieldTitle' => 'Title',
        'fieldTableType' => 'Table Type'
    );

    /**
     * Class attribute for storing default upload values from upload functionality     
     */
    private $uploadOption = array(
        'idCategory' => 'Type',
        'fieldContactMethod' => 'Contact Method',
        'fieldPriceSell' => 'Price Sell',
        'fieldPriceNego' => 'Price Nego',
        'fieldPriceCurrency' => 'Price Currency',
        'fieldMade' => 'Made',
        'fieldModel' => 'Model',
        'fieldOs' => 'OS (Operting System)',
        'fieldProcessor' => 'Processor',
        'fieldRam' => 'Ram',
        'fieldHardDrive' => 'Hard Drive',
        'fieldColor' => 'Color',
        'fieldImage' => 'Image',
        'fieldLocation' => 'option',
        'fieldExtraInfo' => 'Extra Info',
        'fieldTitle' => 'Title',
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

    /**
     * Facility for upload a new row into item_computer.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating.
     * @category DML Helper
     * @return mixed MySQLi update result
     */
    public function upload()
    {
        $lang_sw = isset($_GET['lan']) ? "&lan=" . $_GET['lan'] : "";
        echo '<form class="form-horizontal" action="../../includes/thumbnails/php/form_upload.php?table=' . $this->getTableName() . $lang_sw . '" method="post" enctype="multipart/form-data">';
        $itemName = $this->getTableNameShort();
        $this->insertAllField($itemName);
        echo '</form>';
    }

    protected function insertAllField($itemName)
    {
        ___open_div_("container-fluid", '" style="margin-left:15%; margin-right:15%;');
        $this->insertHeader($itemName);
        ////
        ___open_div_("row", "");
        ___open_div_("col-md-12", '" style="border:1px solid #c7c7c7;border-bottom: 1px solid white;');
        ___open_div_("form-group upload", "");

        ___open_div_("col-md-4", '');        
        $this->insertSelectable('idCategory', 'upload_specific_array', $itemName);
        ___close_div_(1);

        ___open_div_("col-md-4", '');
        $this->insertSelectable('fieldMade', 'upload_specific_array', $itemName);
        ___close_div_(1);

        ___open_div_("col-md-4", '');
        $this->insertFillable('fieldModel', 'upload_specific_array', $itemName);
        ___close_div_(1);
        ___close_div_(3); //top-3
        ////
        ___open_div_("row", "");
        ___open_div_("col-md-12", '" style="border:1px solid #c7c7c7;border-bottom: 1px solid white;');
        ___open_div_("form-group upload", "");
        ___open_div_("col-md-4", '');
        $this->insertSelectable('fieldOs', 'upload_specific_array', $itemName);
        ___close_div_(1);
        ___open_div_("col-md-4", '');
        $this->insertSelectable('fieldProcessor', 'upload_specific_array', $itemName);
        ___close_div_(1);
        ___open_div_("col-md-4", '');
        $this->insertSelectable('fieldRam', 'upload_specific_array', $itemName);
        ___close_div_(1);
        ___close_div_(3);
        ////
        ___open_div_("row", "");
        ___open_div_("col-md-12", '" style="border:1px solid #c7c7c7;border-bottom: 1px solid white;');
        ___open_div_("form-group upload", "");
        ___open_div_("col-md-4", '');
        $this->insertSelectable('fieldHardDrive', 'upload_specific_array', $itemName);
        ___close_div_(1);
        ___open_div_("col-md-4", '');
        $this->insertFieldColor();
        ___close_div_(1);
        ___close_div_(3);
        ////
        ___open_div_("row", "");
        ___open_div_("col-md-12 upload", '" style="border:1px solid #c7c7c7; border-bottom: 1px solid white;');
        ___open_div_("form-group upload", "");
        $this->insertFieldPriceNego();
        $this->insertFieldPriceCurrency();
        $this->insertPriceTypeSell();
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
}
