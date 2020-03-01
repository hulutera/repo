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
    public function __construct($item, &$err)
    {
        $this->_runnerName = ObjectPool::getInstance()->getObjectWithId($item, null);
        $this->default_options = $this->_runnerName->getUploadOption();
        
        //check if all fields are set
        foreach ($this->default_options as $key => $value) {
            if (isset($_POST[$key]) && $value == 'input') {
                $_POST[$key] = filter_var($_POST[$key], FILTER_SANITIZE_STRING);
                echo $key . ' =  ' . $_POST[$key] . '<br>';
            }
        }

        // checks if input text fields are set and are valid type
        // Special handling of price inputs 
        foreach ($this->default_options as $key => $value) {
            if (isset($_POST[$key]) && $value == 'input' && ($key == 'fieldPriceRent' || $key == 'fieldPriceSell')) {
                $value = $_POST[$key];
                $_POST[$key] = filter_var($_POST[$key], FILTER_SANITIZE_NUMBER_INT);
                if (!filter_var($_POST[$key], FILTER_VALIDATE_INT)) {
                    $errOnKey = ($key == 'fieldPriceRent') ? "Rent" : "Sell";
                    // Use openssl_encrypt() function to encrypt the data 
                    $input = 'The value for ' . $errOnKey . ' is considered invalid, you provided value "' . $value . '". Should be number! Try again!<br>';
                    array_push($err, $input);
                }
            }
        }
    }
}
