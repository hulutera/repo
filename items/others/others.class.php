<?php
class OtherClass
{
	private $id,$sell,$nego,$curr,$title,$loc,$info,$time,$mktTyp,$cntTyp;
	private $_tableName = "others";
	public function setElements($row)
	{
		$this->id    = $row['oID'];
		$this->sell  = $row['oPricesell'];
		$this->nego  = $row['oPriceNego'];
		$this->curr  = $row['currency'];
		$this->title = $row['oTitle'];
		$this->loc   = $row['oLocation'];
		$this->info  = $row['oExtraInfo'];
		// common
		$this->time   = $row['UploadedDate'];
		$this->mktTyp = $row['marketCategory'];
		$this->cntTyp = $row['contactMethod'];
	}
	public function printItemSpecific()
	{
	}
	public function getId()
	{
		return $this->id;
	}
	public function getIdName()
	{
		return "oID";
	}
	public function getSell()
	{
		return $this->sell;
	}
	public function getNego()
	{
		return $this->nego;
	}
	public function getCurr()
	{
		return $this->curr;
	}
	public function getTitle()
	{
		return $this->title;
	}
	public function getLoc()
	{
		return $this->loc;
	}
	public function getInfo()
	{
		return $this->info;
	}
	//common
	public function getMktType()
	{
		return $this->mktTyp;
	}
	public function getCategory()
	{
		return $this->cat;
	}
	public function getContactMethod()
	{
		return $this->cntTyp;
	}
	public function getItemName()
	{
		return "Others";
	}
	public function getUpldTime()
	{
		return $this->time;
	}
	public function getIdFieldName()
	{
		return DatabaseClass::getInstance()->getFieldName($this->_tableName, 0);
	}
}
?>