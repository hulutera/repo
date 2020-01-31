<?php
class UserClass
{
	private $_id;
	private $_userName;
	private $_firstName;
	private $_lastName;
	private $_email;
	private $_phone;
	private $_address;
	private $_password;
	private $_role;
	private $_contactMethod;
	private $_termAndCondition;
	private $_date;
	private $_newPassword;
	private $_activation;
	private $_tableName;
	private $_tableFieldName = array();
	function __construct($itemrow)
	{
		$this->_tableName = "user";
		$this->_tableFieldName = DatabaseClass::getInstance()->getAllFields($this->_tableName);
		$this->_id = $itemrow[$this->getUserIdFieldName()];
		$this->_userName = $itemrow[$this->getUserNameFieldName()];
		$this->_firstName = $itemrow[$this->getFirstNameFieldName()];
		$this->_lastName = $itemrow[$this->getLastNameFieldName()];
		$this->_email = $itemrow[$this->getEmailFieldName()];
		$this->_phone = $itemrow[$this->getPhoneFieldName()];
		$this->_address = $itemrow[$this->getAddressFieldName()];
		$this->_password = $itemrow[$this->getPasswordFieldName()];
		$this->_role = $itemrow[$this->getUserRoleFieldName()];
		$this->_contactMethod = $itemrow[$this->getContactMethodFieldName()];
		$this->_termAndCondition = $itemrow[$this->getTermAndConditionFieldName()];
		$this->_date = $itemrow[$this->getDateFieldName()];
		$this->_newPassword = $itemrow[$this->getNewPasswordFieldName()];
		$this->_activation = $itemrow[$this->getActivationFieldName()];
	}
	public function getUserId()
	{
		$name = $this->getUserIdFieldName();
		return isset($_SESSION[$name]) ? $_SESSION[$name] : $this->_id;
	}
	public function getUserName()
	{
		return $this->_userName;
	}
	public function getFirstName()
	{
		return $this->_firstName;
	}
	public function getLastName()
	{
		return $this->_lastName;
	}
	public function getEmail()
	{
		return $this->_email;
	}
	public function getPhone()
	{
		return $this->_phone;
	}
	public function getAddress()
	{
		return $this->_address;
	}
	public function getUserRole()
	{
		return $this->_role;
	}
	public function getContactMethod()
	{
		return $this->_contactMethod;
	}
	public function getTermAndCondition()
	{
		return $this->_termAndCondition;
	}
	public function getDate()
	{
		return $this->_date;
	}
	public function getPassword()
	{
		return $this->_password;
	}
	public function getNewPassword()
	{
		return $this->_newPassword;
	}
	public function getActivation()
	{
		return $this->_activation;
	}
	////
	public function getUserIdFieldName()
	{
		return $this->_tableFieldName[0];
	}
	public function getUserNameFieldName()
	{
		return $this->_tableFieldName[1];
	}
	public function getFirstNameFieldName()
	{
		return $this->_tableFieldName[2];
	}
	public function getLastNameFieldName()
	{
		return $this->_tableFieldName[3];
	}
	public function getEmailFieldName()
	{
		return $this->_tableFieldName[4];
	}
	public function getPhoneFieldName()
	{
		return $this->_tableFieldName[5];
	}
	public function getAddressFieldName()
	{
		return $this->_tableFieldName[6];
	}
	public function getUserRoleFieldName()
	{
		return $this->_tableFieldName[7];
	}
	public function getContactMethodFieldName()
	{
		return $this->_tableFieldName[8];
	}
	public function getTermAndConditionFieldName()
	{
		return $this->_tableFieldName[9];
	}
	public function getDateFieldName()
	{
		return $this->_tableFieldName[10];
	}
	public function getPasswordFieldName()
	{
		return $this->_tableFieldName[11];
	}
	public function getNewPasswordFieldName()
	{
		return $this->_tableFieldName[12];
	}
	public function getActivationFieldName()
	{
		return $this->_tableFieldName[13];
	}
}
