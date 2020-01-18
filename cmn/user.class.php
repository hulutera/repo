<?php
class UserClass
{
	public $id,$email,$phone,$name,$role;
	public function setUserElements($itemrow)
	{
		$this->id    = $itemrow['uID'];
		$this->role  = $itemrow['uRole'];
		$this->name  = $itemrow['uFirstName'];
		$this->email = $itemrow['uEmail'];
		$this->phone = $itemrow['uPhone'];
	}
	public function getUserId()
	{
		return $this->id;
	}
	public function getUserRole()
	{
		return $this->role;
	}
	public function getUserName()
	{
		return $this->name;
	}
	public function getUserEmail()
	{
		return $this->email;
	}
	public function getUserPhone()
	{
		return $this->phone;
	}
}
?>