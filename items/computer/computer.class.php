<?php
class CompClass
{
	private $id,$sell,$nego,$curr,$title,$make,$os,$pros,$ram,$hd,$color,$info,$time,$mktTyp,$cat,$loc,$cntTyp;
	private $_tableName = "computer";
	public function setElements($row)
	{
		$this->id   = $row['dID'];
		$this->sell = $row['dPrice'];
		$this->nego = $row['dPriceNego'];
		$this->curr = $row['currency'];

		$this->make  = $row['dMade'];
		$this->os    = $row['dOS'];
		$this->title = $row['dTitle'];
		$this->pros  = $row['dProcessor'];
		$this->ram   = $row['dRAM'];
		$this->hd    = $row['dHardDrive'];
		$this->loc   = $row['dLocation'];
		$this->info  = $row['dExtraInfo'];
		$this->color = $row['dColor'];
		// common
		$this->time   = $row['UploadedDate'];
		$this->mktTyp = $row['marketCategory'];
		$this->cat    = $row['categoryName'];
		$this->cntTyp = $row['contactMethod'];
	}

	public function displayItemSpecific()
	{
	}
	public function getId()
	{
		return $this->id;
	}
	public function getIdName()
	{
		return "dID";
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
	public function getMake()
	{
		return $this->make;
	}
	public function getProcessor()
	{
		return $this->pros;
	}
	public function getOS()
	{
		return $this->os;
	}
	public function getRAM()
	{
		return $this->ram;
	}
	public function getHardDisk()
	{
		return $this->hd;
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
		return "Computer";
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