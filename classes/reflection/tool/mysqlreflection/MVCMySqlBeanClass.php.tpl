<!-- BEGIN PhpHeader --><?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/classes/reflection/class.config.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/classes/reflection/HtUserAll.php';

/**
 * Class {ClassName}
 * @extends {ClassParent}
 * @filesource {ClassFileName}
*/

// namespace hulutera;

class {ClassName} extends {ClassParent}
{
    /**
     * A control attribute for the update operation.
     * @note An instance fetched from db is allowed to run the update operation.
     *       A new instance (not fetched from db) is allowed only to run the insert operation but,
     *       after running insertion, the instance is automatically allowed to run update operation.
     * @var bool
     */
    private $allowUpdate = false;
<!-- END PhpHeader -->
<!-- BEGIN PkAttribute -->
    /**
     * Class attribute for mapping the primary key {TablePkName} of table {TableName}
     *
     * Comment for field {TablePkName}: {Comment}<br>
     * @var {ClassPkAttributeType} ${ClassPkAttributeName}
     */
    private ${ClassPkAttributeName};

    /**
     * A class attribute for evaluating if the table has an autoincrement primary key
     * @var bool $isPkAutoIncrement
     */
    private $isPkAutoIncrement = {AutoIncrement};
<!-- END PkAttribute -->
<!-- BEGIN Attributes -->
    /**
     * Class attribute for mapping table field {TableFieldName}
     *
     * Comment for field {TableFieldName}: {Comment}.<br>
     * Field information:
     *  - Data type: {TableFieldTypeAndLenght}
     *  - Null : {TableFieldNullable}
     *  - DB Index: {TableFieldIndex}
     *  - Default: {TableFieldDefault}
     *  - Extra:  {TableFieldExtra}
     * @var {ClassAttributeType} ${ClassAttributeName}
     */
    private ${ClassAttributeName};
<!-- END Attributes -->
<!-- BEGIN DdlAttribute -->
    /**
     * Class attribute for storing the SQL DDL of table {TableName}
     * @var string base64 encoded string for DDL
     */
    private $ddl = "{Ddl}";
<!-- END DdlAttribute -->
<!-- BEGIN Constructor -->
    /**
     * The {ClassName} constructor
     *
     * It creates and initializes an object in two way:
     *  - with null (not fetched) data if none ${ClassPkAttributeName} is given.
     *  - with a fetched data row from the table {TableName} having {TablePkName}=${ClassPkAttributeName}
     * @param {ClassPkAttributeType} ${ClassPkAttributeName}. If omitted an empty (not fetched) instance is created.
     * @return {ClassName} Object
     */
    public function __construct(${ClassPkAttributeName} = null)
    {
        parent::__construct();
        if (!empty(${ClassPkAttributeName})) {
            $this->select(${ClassPkAttributeName});
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
<!-- END Constructor -->
<!-- BEGIN ConstructorForMultiplePK -->
    /**
    * The {ClassName} constructor
    *
    * It creates and initializes an object in two way:
    *  - with null (not fetched) data if none ${ClassPkAttributeName} is given.
    *  - with a fetched data row from the table {TableName} having {TablePkName}=${ClassPkAttributeName}
{PKParametersDocumentation}
    * @return {ClassName} Object
    */
    public function __construct({PKDMLFunctionParametersNullDefault})
    {
        parent::__construct();
        if ({PKDMLFunctionParametersIsNotNull}) {
            $this->select({PKDMLFunctionParameters});
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
<!-- END ConstructorForMultiplePK -->
<!-- BEGIN Setters -->
    /**
     * {SetterMethod} Sets the class attribute {ClassAttributeName} with a given value
     *
     * The attribute {ClassAttributeName} maps the field {TableFieldName} defined as {TableFieldTypeAndLenght}.<br>
     * Comment for field {TableFieldName}: {Comment}.<br>
     * @param {ClassAttributeType} ${ClassAttributeName}
     * @category Modifier
     */
    public function {SetterMethod}(${ClassAttributeName})
    {
        $this->{ClassAttributeName} = {Cast}${ClassAttributeName};
    }
<!-- END Setters -->
<!-- BEGIN Getters -->
    /**
     * {GetterMethod} gets the class attribute {ClassAttributeName} value
     *
     * The attribute {ClassAttributeName} maps the field {TableFieldName} defined as {TableFieldTypeAndLenght}.<br>
     * Comment for field {TableFieldName}: {Comment}.
     * @return {ClassAttributeType} ${ClassAttributeName}
     * @category Accessor of ${ClassAttributeName}
     */
    public function {GetterMethod}()
    {
        return $this->{ClassAttributeName};
    }
<!-- END Getters -->
<!-- BEGIN DdlGetter -->
    /**
     * Gets DDL SQL code of the table {TableName}
     * @return string
     * @category Accessor
     */
    public function getDdl()
    {
        return base64_decode($this->ddl);
    }
<!-- END DdlGetter -->
<!-- BEGIN TableGetter -->
    /**
    * Gets the name of the managed table
    * @return string
    * @category Accessor
    */
    public function getTableName()
    {
        return "{TableName}";
    }
<!-- END TableGetter -->
<!-- BEGIN Select -->
    /**
     * Fetchs a table row of {TableName} into the object.
     *
     * Fetched table fields values are assigned to class attributes and they can be managed by using
     * the accessors/modifiers methods of the class.
     * @param {ClassPkAttributeType} ${ClassPkAttributeName} the primary key {TablePkName} value of table {TableName} which identifies the row to select.
     * @return int affected selected row
     * @category DML
     */
    public function select(${ClassPkAttributeName})
    {
        if(${ClassPkAttributeName} == "*"){
            $sql = "SELECT * FROM {TableName}";
        } else { //id
            $sql =  "SELECT * FROM {TableName} WHERE {TablePkName}={$this->parseValue(${ClassPkAttributeName},'{ClassPkAttributeType}')}";
        }

        $this->resetLastSqlError();
        $result =  $this->query($sql);
        $this->resultSet=$result;
        $this->lastSql = $sql;
        if ($result){
            $rowObject = $result->fetch_object();
            <!-- BEGIN InitFields -->@$this->{Attribute} = {Cast}{StartCaseDateField}{StartreplaceApos}$rowObject->{Field}{EndreplaceApos}{EndCaseDateField};
            <!-- END InitFields -->$this->allowUpdate = true;
        } else {
            $this->lastSqlError = $this->sqlstate . " - ". $this->error;
        }
        return $this->affected_rows;

    }
<!-- END Select -->
<!-- BEGIN SelectForMultiplePK -->
    /**
    * Fetchs a table row of {TableName} into the object.
    *
    * Fetched table fields values are assigned to class attributes and they can be managed by using
    * the accessors/modifiers methods of the class.
{PKParametersDocumentation}
    * @return int affected selected row
    * @category DML
    */
    public function select({PKDMLFunctionParameters})
    {
        $sql =  "SELECT * FROM {TableName} WHERE {PKWhereCondition}";
        $this->resetLastSqlError();
        $result =  $this->query($sql);
        $this->resultSet=$result;
        $this->lastSql = $sql;
        if ($result){
            $rowObject = $result->fetch_object();
            <!-- BEGIN InitFields -->@$this->{Attribute} = {Cast}{StartCaseDateField}{StartreplaceApos}$rowObject->{Field}{EndreplaceApos}{EndCaseDateField};
            <!-- END InitFields -->$this->allowUpdate = true;
        } else {
            $this->lastSqlError = $this->sqlstate . " - ". $this->error;
        }
    return $this->affected_rows;
    }
<!-- END SelectForMultiplePK -->
<!-- BEGIN Delete -->
    /**
     * Deletes a specific row from the table {TableName}
     * @param {ClassPkAttributeType} ${ClassPkAttributeName} the primary key {TablePkName} value of table {TableName} which identifies the row to delete.
     * @return int affected deleted row
     * @category DML
     */
    public function delete(${ClassPkAttributeName})
    {
        $sql = "DELETE FROM {TableName} WHERE {TablePkName}={$this->parseValue(${ClassPkAttributeName},'{ClassPkAttributeType}')}";
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->lastSql = $sql;
        if (!$result) {
            $this->lastSqlError = $this->sqlstate . " - ". $this->error;
        }
        return $this->affected_rows;
    }
<!-- END Delete -->
<!-- BEGIN DeleteForMultiplePK -->
    /**
    * Deletes a specific row from the table {TableName}
{PKParametersDocumentation}
    * @return int affected deleted row
    * @category DML
    */
    public function delete({PKDMLFunctionParameters})
    {
        $sql = "DELETE FROM {TableName} WHERE {PKWhereCondition}";
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->lastSql = $sql;
        if (!$result) {
            $this->lastSqlError = $this->sqlstate . " - ". $this->error;
        }
        return $this->affected_rows;
    }
<!-- END DeleteForMultiplePK -->
<!-- BEGIN Insert -->
    /**
     * Insert the current object into a new table row of {TableName}
     *
     * All class attributes values defined for mapping all table fields are automatically used during inserting
     * @return mixed MySQL insert result
     * @category DML
     */
    public function insert()
    {
        if ($this->isPkAutoIncrement) {
            $this->{ClassPkAttributeName} = "";
        }
        // $constants = get_defined_constants();
        $sql = <<< SQL
            INSERT INTO {TableName}
            ({Fields})
            VALUES({Values})
SQL;
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->lastSql = $sql;
        if (!$result) {
            $this->lastSqlError = $this->sqlstate . " - ". $this->error;
        } else {
            $this->allowUpdate = true;
            if ($this->isPkAutoIncrement) {
                $this->{ClassPkAttributeName} = $this->insert_id;
            }
        }
        return $result;
    }
<!-- END Insert -->
<!-- BEGIN InsertForMultiplePK -->
    /**
    * Insert the current object into a new table row of {TableName}
    *
    * All class attributes values defined for mapping all table fields are automatically used during inserting
    * @return mixed MySQL insert result
    * @category DML
    */
    public function insert()
    {
        // $constants = get_defined_constants();
        $sql = <<< SQL
        INSERT INTO {TableName}
        ({Fields})
        VALUES({Values})
SQL;
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->lastSql = $sql;
        if (!$result) {
            $this->lastSqlError = $this->sqlstate . " - ". $this->error;
        } else {
            $this->allowUpdate = true;
        }
        return $result;
    }
<!-- END InsertForMultiplePK -->
<!-- BEGIN Update -->
    /**
     * Updates a specific row from the table {TableName} with the values of the current object.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating of selected row.<br>
     * Null values are used for all attributes not previously setted.
     * @param {ClassPkAttributeType} ${ClassPkAttributeName} the primary key {TablePkName} value of table {TableName} which identifies the row to update.
     * @return mixed MySQL update result
     * @category DML
     */
    public function update(${ClassPkAttributeName})
    {
        // $constants = get_defined_constants();
        if ($this->allowUpdate) {
            $sql = <<< SQL
            UPDATE
                {TableName}
            SET {FileldsEqualValues}
            WHERE
                {TablePkName}={$this->parseValue(${ClassPkAttributeName},'{ClassPkAttributeType}')}
SQL;
            $this->resetLastSqlError();
            $result = $this->query($sql);
            if (!$result) {
                $this->lastSqlError = $this->sqlstate . " - ". $this->error;
            } else {
                $this->select(${ClassPkAttributeName});
                $this->lastSql = $sql;
                return $result;
            }
        } else {
            return false;
        }
    }
<!-- END Update -->
<!-- BEGIN UpdateForMultiplePK -->
    /**
    * Updates a specific row from the table {TableName} with the values of the current object.
    *
    * All class attribute values defined for mapping all table fields are automatically used during updating of selected row.<br>
    * Null values are used for all attributes not previously setted.
{PKParametersDocumentation}
    * @return mixed MySQL update result
    * @category DML
    */
    public function update({PKDMLFunctionParameters})
    {
        // $constants = get_defined_constants();
        if ($this->allowUpdate) {
            $sql = <<< SQL
            UPDATE
                {TableName}
                SET {FileldsEqualValues}
            WHERE
                {PKWhereCondition}
SQL;
            $this->resetLastSqlError();
            $result = $this->query($sql);
            if (!$result) {
                $this->lastSqlError = $this->sqlstate . " - ". $this->error;
            } else {
                $this->select({PKDMLFunctionParameters});
                $this->lastSql = $sql;
                return $result;
            }
        } else {
            return false;
        }
    }
<!-- END UpdateForMultiplePK -->
<!-- BEGIN UpdateCurrent -->
    /**
     * Facility for updating a row of {TableName} previously loaded.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating.
     * @category DML Helper
     * @return mixed MySQLi update result
     */
    public function updateCurrent()
    {
        if ($this->{ClassPkAttributeName} != "") {
            return $this->update($this->{ClassPkAttributeName});
        } else {
            return false;
        }
    }

    /**
    * Facility for display a row for {TableName} previously loaded.
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
    * Facility for upload a new row into {TableName}.
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
<!-- END UpdateCurrent -->
<!-- BEGIN UpdateCurrentForMultiplePK -->
    /**
    * Facility for updating a row of {TableName} previously loaded.
    *
    * All class attribute values defined for mapping all table fields are automatically used during updating.
    * @category DML Helper
    * @return mixed MySQLi update result
    */
    public function updateCurrent()
    {
        if ({PKAttributeIsNotNull}) {
           return $this->update({PKForUpdateCurrent});
        } else {
            return false;
        }
    }
<!-- END UpdateCurrentForMultiplePK -->
<!-- BEGIN PhpFooter -->
}
?>
<!-- END PhpFooter -->