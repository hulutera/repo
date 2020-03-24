<?php
class Cryptor
{
    // Non-NULL Initialization Vector for decryption 
    private  $iv = '1234567891011121';

    // Store the decryption key 
    private  $key = "hulutera";

    // Store the cipher method 
    private $ciphering = "AES-128-CTR";

    // Use OpenSSl Encryption method 
    //private $iv_length = openssl_cipher_iv_length($this->ciphering);
    private $options = 0;

    /**
     * __construct method
     *
     */
    public function __construct()
    {
    }

    public function encryptor($input)
    {
        // Use openssl_encrypt() function to encrypt the data 
        $in = openssl_encrypt(
            $input,
            $this->ciphering,
            $this->key,
            $this->options,
            $this->iv
        );
        return $in;
    }

    public function decryptor($input)
    {
        // Use openssl_decrypt() function to decrypt the data 
        $out =  openssl_decrypt(
            $input,
            $this->ciphering,
            $this->key,
            $this->options,
            $this->iv
        );
        return $out;
    }
}
class ValidateForm
{
    private $default_options = [];

    /**
     * __construct method
     *
     * @public
     * @param $name {$_FILES key}
     * @param $options {null, Array}
     */
    public function __construct(&$err)
    {
        $item = $_GET['table'];
        $this->_runnerName = ObjectPool::getInstance()->getObjectWithId($item, null);
        $this->default_options = $this->_runnerName->getUploadOption();

        var_dump($_POST);

        /**
         * Get all information for the IUT (Item Under Test) for validation
         */
        foreach ($this->default_options as $key => $value) {
            if (isset($_POST[$key])) {
                $postKey = $_POST[$key];
                if (
                    strpos($postKey, 'Choose') !== false or //Error if value start with Choose
                    strpos($postKey, 'Write') !== false or  //Error if value start with Write
                    $postKey === ''
                ) //Error if field is empty or not provided
                {
                    $input = array($key => 'The value for ' . $this->_runnerName->getUploadOptionShort($key) . ' should be provided.  Try again!<br>');
                    array_push($err, $input);
                }
            }
        }

        /**
         * check if rent-or-sell radio is selected report if not 
         */
        if (isset($_POST["rent-or-sell"]) && $_POST["rent-or-sell"] === '') {
            $input = array("rent-or-sell"=>'The value for ' . $_POST["rent-or-sell"] . ' should be provided.  Try again!<br>');
            array_push($err, $input);
        }

        /**
         * check if rent-or-sell radio is selected report if not 
         */
        if (isset($_POST["rent-or-sell"])) {
            if ($_POST["rent-or-sell"] === '') {
                $input = array("rent-or-sell" =>'The value for ' . $_POST["rent-or-sell"] . ' should be provided.  Try again!<br>');
                array_push($err, $input);
            }
            if ($_POST["rent-or-sell"] == "rent") {
                if (isset($_POST["fieldPriceRent"])) {
                    $value = $_POST["fieldPriceRent"];
                    $this->validatePrice($err, "fieldPriceRent");
                }
            }
            if ($_POST["rent-or-sell"] == "sell") {
                if (isset($_POST["fieldPriceSell"])) {
                    $value = $_POST["fieldPriceSell"];
                    $this->validatePrice($err, "fieldPriceSell");
                }
            }
            if ($_POST["rent-or-sell"] == "rent-or-sell") {
                if (isset($_POST["fieldPriceRent"])) {
                    $value = $_POST["fieldPriceRent"];
                    $this->validatePrice($err, "fieldPriceRent");
                }
                if (isset($_POST["fieldPriceSell"])) {
                    $value = $_POST["fieldPriceSell"];
                    $this->validatePrice($err, "fieldPriceSell");
                }
            }
        }

        /**
         * Check if image have been provided report if not
         */
        if (isset($_POST["fileuploader-list-files"]) && $_POST["fileuploader-list-files"] === '[]') {
            $input = array("fileuploader-list-files" =>'At least one image should be provided.  Try again!<br>');
            array_push($err, $input);
        }


        //check if all fields are set
        foreach ($this->default_options as $key => $value) {
            if (isset($_POST[$key]) && $value == 'input') {
                $_POST[$key] = filter_var($_POST[$key], FILTER_SANITIZE_STRING);
                // echo $key . ' =  ' . $_POST[$key] . '<br>';
            }
        }
    }

    /**
     * validate price
     */
    private function validatePrice(&$err, $key)
    {
        $value = $_POST[$key];
        if ($value !== "0") {
            $_POST[$key] = filter_var($value, FILTER_SANITIZE_NUMBER_INT);
            if (!filter_var($_POST[$key], FILTER_VALIDATE_INT)) {
                // Use openssl_encrypt() function to encrypt the data 
                $input = array($key =>'The value for ' . $this->_runnerName->getUploadOptionShort($key) . ' is considered invalid, you provided value "' . $value . '". Should be number! Try again!<br>');
                array_push($err, $input);
                $_POST[$key] = "0";
            }
        }else{
            $input = array($key =>'The value for ' . $this->_runnerName->getUploadOptionShort($key) . ' should be provided.  Try again!<br>');
            array_push($err, $input);
        }
    }
    /**
     * get default_options
     */
    public function getDefaultOptions()
    {
        return $this->default_options;
    }
}
