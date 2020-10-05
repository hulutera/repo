<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/reflection/class.config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/reflection/HtUserAll.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/class.fileuploader.php';

/**
 * Class HtItemPhone
 * @extends MySqlRecord
 * @filesource HtItemPhone.php
 */

// namespace hulutera;

class HtItemPhone extends MySqlRecord
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
     * Class attribute for mapping the primary key id of table item_phone
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
     *  - Data type: int(11)
     *  - Null : NO
     *  - DB Index:
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
     *  - Default: Negotiable
     *  - Extra:
     * @var string $fieldPriceNego
     */
    private $fieldPriceNego;

    /**
     * Class attribute for mapping table field field_price_currency
     *
     * Comment for field field_price_currency: Not specified.<br>
     * Field information:
     *  - Data type: varchar(10)
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
     * Class attribute for mapping table field field_camera
     *
     * Comment for field field_camera: Not specified.<br>
     * Field information:
     *  - Data type: varchar(40)
     *  - Null : YES
     *  - DB Index:
     *  - Default:
     *  - Extra:
     * @var string $fieldCamera
     */
    private $fieldCamera;

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
     *  - Data type: varchar(10)
     *  - Null : YES
     *  - DB Index:
     *  - Default: Sale
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
     *  - Default: 4
     *  - Extra:
     * @var int $fieldTableType
     */
    private $fieldTableType;

    /**
     * Class attribute for storing the SQL DDL of table item_phone
     * @var string base64 encoded string for DDL
     */
    private $ddl = "Q1JFQVRFIFRBQkxFIGBpdGVtX3Bob25lYCAoCiAgYGlkYCBpbnQoNDApIE5PVCBOVUxMIEFVVE9fSU5DUkVNRU5ULAogIGBpZF90ZW1wYCBpbnQoMjApIERFRkFVTFQgTlVMTCwKICBgaWRfdXNlcmAgaW50KDQwKSBOT1QgTlVMTCwKICBgaWRfY2F0ZWdvcnlgIGludCgxMSkgTk9UIE5VTEwsCiAgYGZpZWxkX2NvbnRhY3RfbWV0aG9kYCB2YXJjaGFyKDUwKSBOT1QgTlVMTCwKICBgZmllbGRfcHJpY2Vfc2VsbGAgdmFyY2hhcig0MCkgREVGQVVMVCBOVUxMLAogIGBmaWVsZF9wcmljZV9uZWdvYCB2YXJjaGFyKDIwKSBERUZBVUxUICdOZWdvdGlhYmxlJywKICBgZmllbGRfcHJpY2VfY3VycmVuY3lgIHZhcmNoYXIoMTApIE5PVCBOVUxMIERFRkFVTFQgJ0JpcnInLAogIGBmaWVsZF9tYWRlYCB2YXJjaGFyKDIwKSBERUZBVUxUIE5VTEwsCiAgYGZpZWxkX21vZGVsYCB2YXJjaGFyKDIwKSBERUZBVUxUIE5VTEwsCiAgYGZpZWxkX29zYCB2YXJjaGFyKDIwKSBERUZBVUxUIE5VTEwsCiAgYGZpZWxkX2NhbWVyYWAgdmFyY2hhcig0MCkgREVGQVVMVCBOVUxMLAogIGBmaWVsZF9pbWFnZWAgbG9uZ3RleHQgTk9UIE5VTEwsCiAgYGZpZWxkX2xvY2F0aW9uYCB2YXJjaGFyKDQwKSBERUZBVUxUIE5VTEwsCiAgYGZpZWxkX2V4dHJhX2luZm9gIG1lZGl1bXRleHQsCiAgYGZpZWxkX3RpdGxlYCB2YXJjaGFyKDEyNSkgTk9UIE5VTEwsCiAgYGZpZWxkX3VwbG9hZF9kYXRlYCB0aW1lc3RhbXAgTk9UIE5VTEwgREVGQVVMVCBDVVJSRU5UX1RJTUVTVEFNUCBPTiBVUERBVEUgQ1VSUkVOVF9USU1FU1RBTVAsCiAgYGZpZWxkX3RvdGFsX3ZpZXdgIGludCgxMCkgREVGQVVMVCBOVUxMLAogIGBmaWVsZF9zdGF0dXNgIHZhcmNoYXIoMTApIE5PVCBOVUxMIERFRkFVTFQgJ3BlbmRpbmcnLAogIGBmaWVsZF9tYXJrZXRfY2F0ZWdvcnlgIHZhcmNoYXIoMTApIERFRkFVTFQgJ1NhbGUnLAogIGBmaWVsZF90YWJsZV90eXBlYCBpbnQoMTApIE5PVCBOVUxMIERFRkFVTFQgJzQnLAogIFBSSU1BUlkgS0VZIChgaWRgKSwKICBLRVkgYHVJRF9GSzFgIChgaWRfdXNlcmApLAogIENPTlNUUkFJTlQgYGl0ZW1fcGhvbmVfaWJma18xYCBGT1JFSUdOIEtFWSAoYGlkX3VzZXJgKSBSRUZFUkVOQ0VTIGB1c2VyX2FsbGAgKGBpZGApIE9OIERFTEVURSBDQVNDQURFIE9OIFVQREFURSBDQVNDQURFCikgRU5HSU5FPUlubm9EQiBBVVRPX0lOQ1JFTUVOVD0zMCBERUZBVUxUIENIQVJTRVQ9bGF0aW4x";

    /*
     * prop for search elements
    */
    private $maxPriceValue;
    private $typeValue;
    private $makeValue;
    private $osValue;
    private $cameraValue;
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
     * The attribute idCategory maps the field id_category defined as int(11).<br>
     * Comment for field id_category: Not specified.<br>
     * @param int $idCategory
     * @category Modifier
     */
    public function setIdCategory($idCategory)
    {
        $object = new HtCategoryPhone("*");
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
     * setFieldCamera Sets the class attribute fieldCamera with a given value
     *
     * The attribute fieldCamera maps the field field_camera defined as varchar(40).<br>
     * Comment for field field_camera: Not specified.<br>
     * @param string $fieldCamera
     * @category Modifier
     */
    public function setFieldCamera($fieldCamera)
    {
        $this->fieldCamera = (string) $fieldCamera;
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
     * setFieldReport Sets the class attribute fieldReport with a given value
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
        $this->setFieldMake($_POST['fieldMake']);
        $this->setFieldModel($_POST['fieldModel']);
        $this->setFieldOs($_POST['fieldOs']);
        $this->setFieldCamera($_POST['fieldCamera']);
        $this->setFieldPriceSell($_POST['fieldPriceSell']);
        $this->setFieldPriceCurrency($_POST['fieldPriceCurrency']);
        $this->setFieldPriceNego($_POST['fieldPriceNego']);
        $this->setFieldTitle($_POST['fieldTitle']);
        $this->setFieldContactMethod($_POST['fieldContactMethod']);
        $this->setFieldImage($_POST['fileuploader-list-files']);
        $this->setFieldUploadDate(date("Y-m-d H:i:s"));
        $this->setFieldStatus("pending");
        $this->setFieldMarketCategory('sell');
        $this->setFieldTableType(4);

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
     * The attribute idCategory maps the field id_category defined as int(11).<br>
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
     * getfieldMade gets the class attribute fieldMake value
     *
     * The attribute fieldMake maps the field field_make defined as varchar(20).<br>
     * Comment for field field_make: Not specified.
     * @return string $fieldMake
     * @category Accessor of $fieldMake
     */
    public function getfieldMade()
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
     * getFieldCamera gets the class attribute fieldCamera value
     *
     * The attribute fieldCamera maps the field field_camera defined as varchar(40).<br>
     * Comment for field field_camera: Not specified.
     * @return string $fieldCamera
     * @category Accessor of $fieldCamera
     */
    public function getFieldCamera()
    {
        return $this->fieldCamera;
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
     * Gets DDL SQL code of the table item_phone
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
        return "item_phone";
    }

    /**
     * Gets the name of the corresponding category table name
     * @return string
     * @category Accessor
     */
    public function getCatTableName()
    {
        return "category_phone";
    }

    /**
     * Gets the name of the managed table
     * @return string
     * @category Accessor
     */
    public function getTableNameShort()
    {
        return "phone";
    }

    /**
     * The HtItemPhone constructor
     *
     * It creates and initializes an object in two way:
     *  - with null (not fetched) data if none $id is given.
     *  - with a fetched data row from the table item_phone having id=$id
     * @param int $id. If omitted an empty (not fetched) instance is created.
     * @return HtItemPhone Object
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
     * Fetchs a table row of item_phone into the object.
     *
     * Fetched table fields values are assigned to class attributes and they can be managed by using
     * the accessors/modifiers methods of the class.
     * @param int $id the primary key id value of table item_phone which identifies the row to select.
     * @return int affected selected row
     * @category DML
     */
    public function select($id = NULL, $status = null)
    {
        $useQuery = true;
        if ($id == NULL and $status == NULL) {
            $sql = [];
        } elseif ($id == "*" and $status == NULL) {
            $sql = "SELECT * FROM item_phone";
        } elseif ($id == "*" and $status != NULL) {
            $sql =  "SELECT * FROM item_phone WHERE field_status={$this->parseValue($status, 'notNumber')}";
        } elseif ($id != "*" and $status == NULL) {
            $sql =  "SELECT * FROM item_phone WHERE id={$this->parseValue($id, 'int')}";
        } else { //id
            $sql =  "SELECT * FROM item_phone WHERE id={$this->parseValue($id, 'int')} AND field_status={$this->parseValue($status, 'notNumber')}";
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
     * Run a phone query with a request
     * $filter: query condition e.g field_status = 'active' or field_status = 'pending'
     * $start: the first item to fetch
     * $itemPerPage: the total number of items to be fetched from the table
     * return: the number of affected rows
     * N.B: the query is done based on the number of items to be fetched and that is dueto the pagination
     */
    public function runQuery($filter, $start = null, $itemPerPage = null)
    {
        if ($itemPerPage == null) {
            $sql =  "SELECT * FROM item_phone $filter";
        } else {
            $sql =  "SELECT * FROM item_phone $filter ORDER BY field_upload_date DESC LIMIT $start, $itemPerPage";
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
        $this->maxPriceValue = (isset($_GET['phone_max_price'])) ? $_GET['phone_max_price'] : "000";
        $this->typeValue = (isset($_GET['phone_type'])) ? $_GET['phone_type'] : "none";
        $this->makeValue = (isset($_GET['phone_make'])) ? $_GET['phone_make'] : "none";
        $this->osValue = (isset($_GET['phone_os'])) ? $_GET['phone_os'] : "none";
        $this->cameraValue = (isset($_GET['phone_camera'])) ? $_GET['phone_camera'] : "none";
        $this->locationValue = (isset($_GET['cities'])) ? $_GET['cities'] : "000";
        $this->keyWordValue = (isset($_GET['search_text'])) ? $_GET['search_text'] : "No search word given";
    }

    /**
     * Run a phone search query with a request
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
        $maxPriceFilter = $this->getMaxPriceFilter($this->maxPriceValue, 50001);

        if ($searchType == "single-item") {
            $locationFilter = ($this->locationValue != "000") ? "field_location LIKE '" . $this->replaceAposBackSlash($this->locationValue) . "'" : "( field_location LIKE '%' OR field_location is null )";;
            $titleFilter = "field_title LIKE '%" . $this->replaceAposBackSlash($this->keyWordValue) . "%'";
            $typeFilter = ($this->typeValue != "none") ? "field_name LIKE '" .  $this->replaceAposBackSlash($this->typeValue) . "'" : "( field_name LIKE '%' OR field_name is null )";
            $makeFilter = ($this->makeValue != "none") ? "field_make LIKE '" .  $this->replaceAposBackSlash($this->makeValue) . "'" : "( field_make LIKE '%' OR field_make is null )";
            $osFilter = ($this->osValue != "none") ? "field_os LIKE '" .  $this->replaceAposBackSlash($this->osValue) . "'" : "( field_os LIKE '%' OR field_os is null )";
            $cameraFilter = ($this->cameraValue != "none" and $this->locationValue != "All") ? "field_camera LIKE '" .  $this->replaceAposBackSlash($$this->cameraValue) . "'" : "( field_camera LIKE '%' OR field_camera is null )";

            $itemFilter = "$locationFilter AND $titleFilter AND $typeFilter AND $makeFilter AND $osFilter AND $cameraFilter";
        } else {
            $locationFilter = ($this->keyWordValue != "") ? "field_location LIKE '%" . $this->replaceAposBackSlash($this->keyWordValue) . "%'" : "field_location LIKE 'No search word given'";
            $titleFilter = ($this->keyWordValue != "") ? "field_title LIKE '%" . $this->replaceAposBackSlash($this->keyWordValue) . "%'" : "field_title LIKE 'No search word given'";
            $typeFilter = ($this->keyWordValue != "") ? "field_name LIKE '%" . $this->replaceAposBackSlash($this->keyWordValue) . "%'" : "field_name LIKE 'No search word given'";
            $makeFilter = ($this->keyWordValue != "") ? "field_make LIKE '%" . $this->replaceAposBackSlash($this->keyWordValue) . "%'" : "field_make LIKE 'No search word given'";
            $osFilter = ($this->keyWordValue != "") ? "field_os LIKE '%" . $this->replaceAposBackSlash($this->keyWordValue) . "%'" : "field_os LIKE 'No search word given'";
            $cameraFilter = ($this->keyWordValue != "") ? "field_camera LIKE '%" . $this->replaceAposBackSlash($this->keyWordValue) . "%'" : "field_camera LIKE  'No search word given'";
            $locationFilter2 = ($this->locationValue != "000" and $this->locationValue != "All" and $this->keyWordValue != "")  ? "AND (field_location LIKE '" . $this->replaceAposBackSlash($this->locationValue) . "')" : "OR (field_location LIKE '" . $this->replaceAposBackSlash($this->locationValue) . "')";

            $itemFilter = "( ($locationFilter OR $titleFilter OR $typeFilter OR $makeFilter OR $osFilter OR $cameraFilter) $locationFilter2 )";
        }

        $filter = "$statusFilter AND $maxPriceFilter AND $itemFilter";

        if ($itemPerPage == null) {
            $sql =  "SELECT DISTINCT $itemTable.id, field_upload_date, field_table_type FROM $itemTable  $joinCatTable $filter";
        } else {
            $sql =  "SELECT DISTINCT * FROM $itemTable $joinCatTable $filter ORDER BY field_upload_date DESC LIMIT $start, $itemPerPage";
        }

        $this->resetLastSqlError();
        $result =  $this->query($sql);
        $this->resultSet = $result;
        $this->lastSql = $sql;
        return $this->affected_rows;
    }

    /*
    ** Set the phone element values
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
        @$this->fieldPriceSell = $this->replaceAposBackSlash($rowObject->field_price_sell);
        @$this->fieldPriceNego = $this->replaceAposBackSlash($rowObject->field_price_nego);
        @$this->fieldPriceCurrency = $this->replaceAposBackSlash($rowObject->field_price_currency);
        @$this->fieldMake = $this->replaceAposBackSlash($rowObject->field_make);
        @$this->fieldModel = $this->replaceAposBackSlash($rowObject->field_model);
        @$this->fieldOs = $this->replaceAposBackSlash($rowObject->field_os);
        @$this->fieldCamera = $this->replaceAposBackSlash($rowObject->field_camera);
        @$this->fieldImage = $this->replaceAposBackSlash($rowObject->field_image);
        @$this->fieldLocation = $this->replaceAposBackSlash($rowObject->field_location);
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
    ** Set the phone category elements
    *
    */
    public function setCategoryName()
    {
        $object = new HtCategoryPhone("*");
        $result = $object->getResultSet();
        while ($row = $result->fetch_assoc()) {
            $catArray[] = $row;
        }
        $this->categoryNameArray = $catArray;
    }

    /**
     * Deletes a specific row from the table item_phone
     * @param int $id the primary key id value of table item_phone which identifies the row to delete.
     * @return int affected deleted row
     * @category DML
     */
    public function delete($id)
    {
        $sql = "DELETE FROM item_phone WHERE id={$this->parseValue($id, 'int')}";
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
     * Insert the current object into a new table row of item_phone
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
            INSERT INTO item_phone
            (id_temp,id_user,id_category,field_contact_method,field_price_sell,field_price_nego,field_price_currency,field_make,field_model,field_os,field_camera,field_image,field_location,field_extra_info,field_title,field_upload_date,field_total_view,field_status,field_report,field_market_category,field_table_type)
            VALUES(
			{$this->parseValue($this->idTemp)},
			{$this->parseValue($this->idUser)},
			{$this->parseValue($this->idCategory)},
			{$this->parseValue($this->fieldContactMethod, 'notNumber')},
			{$this->parseValue($this->fieldPriceSell, 'notNumber')},
			{$this->parseValue($this->fieldPriceNego, 'notNumber')},
			{$this->parseValue($this->fieldPriceCurrency, 'notNumber')},
			{$this->parseValue($this->fieldMake, 'notNumber')},
			{$this->parseValue($this->fieldModel, 'notNumber')},
			{$this->parseValue($this->fieldOs, 'notNumber')},
			{$this->parseValue($this->fieldCamera, 'notNumber')},
			{$this->parseValue($this->fieldImage, 'notNumber')},
			{$this->parseValue($this->fieldLocation, 'notNumber')},
			{$this->parseValue($this->fieldExtraInfo, 'notNumber')},
			{$this->parseValue($this->fieldTitle, 'notNumber')},
			{$this->parseValue($this->fieldUploadDate, 'notNumber')},
			{$this->parseValue($this->fieldTotalView)},
			{$this->parseValue($this->fieldStatus, 'notNumber')},
            {$this->parseValue($this->fieldReport, 'notNumber')},
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
     * Updates a specific row from the table item_phone with the values of the current object.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating of selected row.<br>
     * Null values are used for all attributes not previously setted.
     * @param int $id the primary key id value of table item_phone which identifies the row to update.
     * @return mixed MySQL update result
     * @category DML
     */
    public function update($id)
    {
        // $constants = get_defined_constants();
        if ($this->allowUpdate) {
            $sql = <<< SQL
            UPDATE
                item_phone
            SET
				id_temp={$this->parseValue($this->idTemp)},
				id_user={$this->parseValue($this->idUser)},
				id_category={$this->parseValue($this->idCategory)},
				field_contact_method={$this->parseValue($this->fieldContactMethod, 'notNumber')},
				field_price_sell={$this->parseValue($this->fieldPriceSell, 'notNumber')},
				field_price_nego={$this->parseValue($this->fieldPriceNego, 'notNumber')},
				field_price_currency={$this->parseValue($this->fieldPriceCurrency, 'notNumber')},
				field_make={$this->parseValue($this->fieldMake, 'notNumber')},
				field_model={$this->parseValue($this->fieldModel, 'notNumber')},
				field_os={$this->parseValue($this->fieldOs, 'notNumber')},
				field_camera={$this->parseValue($this->fieldCamera, 'notNumber')},
				field_image={$this->parseValue($this->fieldImage, 'notNumber')},
				field_location={$this->parseValue($this->fieldLocation, 'notNumber')},
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
     * Facility for updating a row of item_phone previously loaded.
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
     * Facility for display a row for item_phone previously loaded.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating.
     * @category DML Helper
     * @return mixed MySQLi update result
     */
    public function display()
    {
        echo '<div>';
        echo "<p class=\"bg-success\"><a   href=\"javascript:void(0)\" onclick=\"hidespec('" . $this->getTableNameShort() . "', '" . $this->getId() . "')\"><i id=\"spec_up_" . $this->getTableNameShort() . $this->getId() . "\" class=\"glyphicon glyphicon-chevron-up\" style=\"background-color:#337ab7;color:white\"></i></a><a   href=\"javascript:void(0)\" onclick=\"showspec('" . $this->getTableNameShort() . "', '" . $this->getId() . "')\"><i id=\"spec_down_" . $this->getTableNameShort() . $this->getId() . "\" class=\"glyphicon glyphicon-chevron-down\" style=\"display:none;background-color:#337ab7;color:white\"></i></a> <strong>" . $GLOBALS['lang']['item specification'] . "</strong></p>";
        echo '<div id="spec_' . $this->getTableNameShort() . $this->getId() . '" class="itemSpecDiv col-xs-12 col-md-12">';
        if ($this->getIdCategory() != null or $this->getIdCategory() != 7) {
            $phoneCategory = $GLOBALS['upload_specific_array']['phone']['idCategory'][2][$this->category($this->getIdCategory())];
            echo "<p>" . $GLOBALS['upload_specific_array']['phone']['idCategory'][0] . ":&nbsp<strong>" .  $phoneCategory . "</strong></p>";
        }
        echo $this->getfieldMade() != "unlisted" ? '<p>' . $GLOBALS["upload_specific_array"]["phone"]["fieldMake"][0] . ':&nbsp<strong>' . $this->getfieldMade() . '</strong></p>' : "";
        echo $this->getFieldModel() != null  ? '<p>' . $GLOBALS["upload_specific_array"]["phone"]["fieldModel"][0] . ':&nbsp<strong>' . $this->getFieldModel() . '</strong></p>' : "";

        if ($this->getFieldOs() != null or $this->getFieldOs() != "unlisted") {
            echo $this->getFieldOs() != null  ? '<p>' . $GLOBALS["upload_specific_array"]["phone"]["fieldOs"][0] . ':&nbsp<strong>' . $GLOBALS["upload_specific_array"]["phone"]["fieldOs"][2][$this->getFieldOs()] . '</strong></p>' : "";
        }

        echo $this->getFieldCamera() != null  ? '<p>' . $GLOBALS["upload_specific_array"]["phone"]["fieldCamera"][0] . ':&nbsp<strong>' . $GLOBALS["upload_specific_array"]["phone"]["fieldCamera"][2][$this->getFieldCamera()] . '</strong></p>' : "";
        //echo $this->getFieldExtraInfo() != null   ? "<p><p><strong>Extra Info:</strong></p><p style=\"border:1px solid darkkhaki;overflow:scroll;height:70px; width:100%;\">" . $this->getFieldExtraInfo() . "</p>" : "";
        echo '</div>';
        echo '</div>';
        echo '<div class="priceDivTitle col-xs-12 col-md-12"><p class="bg-success"><strong>' . $GLOBALS["upload_specific_array"]["common"]["rentOrSell"][3] . '</strong></p></div>';
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
        'fieldMake' => 'Made',
        'fieldOs' => 'OS (Operting System)',
        'fieldModel' => 'Model',
        'fieldCamera' => 'Camera Size',
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
        'fieldMake' => 'Made',
        'fieldModel' => 'Model',
        'fieldOs' => 'OS (Operting System)',
        'fieldCamera' => 'Camera Size',
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

    public function upload($data = null)
    {
        $lang_sw = isset($_GET['lan']) ? "&lan=" . $_GET['lan'] : "";
        echo '<form class="form-horizontal" action="../../includes//form_upload.php?table=' . $this->getTableName() . $lang_sw . '" method="post" enctype="multipart/form-data">';
        $itemName = $this->getTableNameShort();
        $this->insertAllField($itemName);
        echo '</form>';
    }

    protected function insertAllField($itemName, $skipRow = NULL)
    {
        ___open_div_("col-md-8 col-xs-12 upload-container", '');
        $this->insertHeader($itemName);
        ////
        ___open_div_("row", "");
        ___open_div_("col-md-12", '" style="border:1px solid #c7c7c7;border-bottom: 1px solid white;');
        ___open_div_("form-group upload", "");

        ___open_div_("col-md-4", '');
        $this->insertSelectable('idCategory', 'upload_specific_array', $itemName);
        ___close_div_(1);

        ___open_div_("col-md-4", '');
        $this->insertSelectable('fieldMake', 'upload_specific_array', $itemName);
        ___close_div_(1);

        ___open_div_("col-md-4", '');
        $this->insertFillable('fieldModel', 'upload_specific_array', $itemName);
        ___close_div_(1);
        ___close_div_(3); //top-3
        ////
        ___open_div_("row", "");
        ___open_div_("col-md-12", '" style="border:1px solid #c7c7c7;border-bottom: 1px solid white;');
        ___open_div_("form-group upload", "");
        ___open_div_("col-md-6", '');
        $this->insertSelectable('fieldOs', 'upload_specific_array', $itemName);
        ___close_div_(1);
        ___open_div_("col-md-6", '');
        $this->insertSelectable('fieldCamera', 'upload_specific_array', $itemName);
        ___close_div_(1);
        ___close_div_(3);
        ////
        ___open_div_("row", "");
        ___open_div_("col-md-12 upload", '" style="border:1px solid #c7c7c7; border-bottom: 1px solid white;');
        ___open_div_("form-group upload", "");
        $this->insertFieldPriceCurrency();
        $this->insertPriceTypeSell();
        $this->insertFieldPriceNego();
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

        if ($skipRow == 6) {
            ___open_div_("row", "");
            ___open_div_("col-md-12 upload", '" style="border:1px solid #c7c7c7;');
            ___open_div_("form-group upload", "");
            echo '<button name="submit" type="submit" class="btn btn-primary btn-lg btn-block">' . $GLOBALS['lang']['submit'] . '</button>';
            $lang_sw = isset($_GET['lan']) ? "&lan=" . $_GET['lan'] : "";
            echo '<a href="../../includes/mypage.php?' . $lang_sw . '" class="btn btn-danger btn-lg btn-block">' . $GLOBALS['lang']['cancel changes'] . '</a>';
            ___close_div_(3);
        } else {
            ___open_div_("row", "");
            ___open_div_("col-md-12 upload", '" style="border:1px solid #c7c7c7;');
            ___open_div_("form-group upload", "");
            echo '<button name="submit" type="submit" class="btn btn-primary btn-lg btn-block">' . $GLOBALS['lang']['submit'] . '</button>';
            ___close_div_(3);
        }
        ___close_div_(1);
    }

    public function category($categoryId)
    {
        $row = $this->categoryNameArray;
        $cat = $row[$categoryId - 1]['field_name'];
        return $cat;
    }
    /**
     * Edit the current object into a new table row of item_other
     * @return mixed MySQL insert result
     * @category DML
     */
    public function uploadEdit()
    {
        $this->setFieldPostEdit();
        //exit;
        $this->allowUpdate = true;
        $this->updateCurrent();
        ///final session
    }

    /**
     * Save data from Post or Session_Post to memeber fields
     * @return mixed MySQL insert result
     * @category DML
     */
    private function setFieldPostEdit()
    {
        $postFiles = $this->prePostEdit();
        //----------------------------------
        $this->setFieldLocation($_POST['fieldLocation']);
        $this->setIdCategory($_POST['idCategory']);
        $this->setIdUser((int)$_POST['idUser']);
        $this->setIdTemp((int) $_POST['idTemp']);
        $this->setFieldMake($_POST['fieldMake']);
        $this->setFieldModel($_POST['fieldModel']);
        $this->setFieldOs($_POST['fieldOs']);
        $this->setFieldMake($_POST['fieldMake']);
        $this->setFieldModel($_POST['fieldModel']);
        $this->setFieldOs($_POST['fieldOs']);
        $this->setFieldCamera($_POST['fieldCamera']);
        $this->setFieldPriceSell($_POST['fieldPriceSell']);
        $this->setFieldPriceCurrency($_POST['fieldPriceCurrency']);
        $this->setFieldPriceNego($_POST['fieldPriceNego']);
        $this->setFieldTitle($_POST['fieldTitle']);
        $this->setFieldContactMethod($_POST['fieldContactMethod']);
        $this->setFieldImage(json_encode($postFiles));
        $this->setFieldUploadDate(date("Y-m-d H:i:s"));
        $this->setFieldStatus("pending");
        $this->setFieldMarketCategory('sell');
        $this->priceTypeSetter();
        $this->setFieldTableType(4);
        // $this->setFieldRam($_POST['fieldRam']);
        // $this->setFieldHardDrive($_POST['fieldHardDrive']);
        // $this->setFieldColor($_POST['fieldColor']);
    }

    /**
     * Display form for Edit with Session Data
     * @return mixed MySQL insert result
     * @category DML
     */
    public function edit($data = null)
    {
        $this->preEdit($this, $data);
        ////------------------------------------------------------------------
        $lang_sw = isset($_GET['lan']) ? "&lan=" . $_GET['lan'] : "";
        echo '<form class="form-horizontal" action="../../includes//form_upload.php?table=' . $this->getTableName() . '&function=edit' . $lang_sw . '" method="post" enctype="multipart/form-data">';
        echo '<!-- file input -->';
        $itemName = $this->getTableNameShort();
        $_SESSION['POST']['rentOrSell'] = $this->priceTypeGetter();
        $this->insertAllField($itemName, 6);
        echo '</form>';
    }
}
