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

        $price = ["fieldPriceSell", "fieldPriceRent", "fieldPriceRate"];
        var_dump($_POST);

        /**
         * Get all information for the IUT (Item Under Test) for validation
         */
        foreach ($this->default_options as $key => $value) {
            if (isset($_POST[$key])) {
                $postValue = $_POST[$key];
                if (in_array($key, $price)) {
                    continue;
                }
                if (
                    strpos($postValue, $GLOBALS['lang']['Choose']) !== false or //Error if value start with Choose
                    strpos($postValue, 'Write') !== false or  //Error if value start with Write
                    $postValue === ''
                ) //Error if field is empty or not provided
                {
                    $input = array($key => 'The value for ' . $this->_runnerName->getUploadOptionShort($key) . ' should be provided.  Try again!<br>');
                    array_push($err, $input);
                }
            }
        }

        /**
         * check if rentOrSell radio is selected report if not 
         */
        if (isset($_POST["rentOrSell"]) && strpos($_POST['rentOrSell'], $GLOBALS['lang']['Choose']) !== false) {
            $input = array("rentOrSell" => 'The value for ' . $_POST["rentOrSell"] . ' should be provided.  Try again!<br>');
            array_push($err, $input);
        }

        if (isset($_POST["rentOrSell"])) {
            if ($_POST["rentOrSell"] == "fieldPriceRent") {
                $this->validatePrice($err, "fieldPriceRent");
            } else if ($_POST["rentOrSell"] == "fieldPriceSell") {
                $this->validatePrice($err, "fieldPriceSell");
                $_POST["fieldPriceRate"] = null;
            } else if ($_POST["rentOrSell"] == "both") {
                $this->validatePrice($err, "fieldPriceRent");
                $this->validatePrice($err, "fieldPriceSell");
            }
            if ($_POST["rentOrSell"] == "fieldPriceRent" || $_POST["rentOrSell"] == "both") {
                if (isset($_POST["fieldPriceRate"]) && strpos($_POST["fieldPriceRate"], $GLOBALS['lang']['Choose']) !== false) {
                    $input = array("fieldPriceRate" => 'The value for ' . $_POST["fieldPriceRate"] . ' should be provided.  Try again!<br>');
                    array_push($err, $input);
                }
            }
        } else if (isset($_POST["fieldPriceSell"])) {
            $this->validatePrice($err, "fieldPriceSell");
        }

        /**
         * Check if image have been provided report if not
         */
        if (isset($_POST["fileuploader-list-files"]) && $_POST["fileuploader-list-files"] === '[]') {
            $input = array("fileuploader-list-files" => 'At least one image should be provided.  Try again!<br>');
            array_push($err, $input);
        }


        //check if all fields are set
        foreach ($this->default_options as $key => $value) {
            if (isset($_POST[$key]) && $value == 'input') {
                $_POST[$key] = filter_var($_POST[$key], FILTER_SANITIZE_STRING);
                // echo $key . ' =  ' . $_POST[$key] . '<br>';
            }
        }

        //unset some errors
        if (isset($_POST["idCategory"]) && $_POST["idCategory"] === "Land") {
            $unsetables = ["fieldBuildYear", "fieldBathroom", "fieldToilet", "fieldNrBedroom"];

            foreach ($err as $k1 => $v1) {
                foreach ($v1 as $k2 => $v2) {
                    if (in_array($k2, $unsetables)) {
                        unset($err[$k1][$k2]);
                    }
                }
            }
            foreach ($unsetables as $key => $value) {
                $_POST[$value] = 0;
            }
        }
    }

    /**
     * validate price
     */
    private function validatePrice(&$err, $key)
    {
        if (isset($_POST[$key]) && (!is_numeric($_POST[$key]) or !filter_var($_POST[$key], FILTER_VALIDATE_INT))) {
            $input = array($key => 'Invalid input, Should be number! Try again!');
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
