<?php
class ElecClass
{
	private $id,$sell,$nego,$curr,$title,$loc,$info,$time,$mktTyp,$cat,$cntTyp;
	public function setElements($row)
	{
		$this->id    = $row['eID'];
		$this->sell  = $row['ePricesell'];
		$this->nego  = $row['ePriceNego'];
		$this->curr  = $row['currency'];
		$this->title = $row['eTitle'];
		$this->loc   = $row['eLocation'];
		$this->info  = $row['eExtraInfo'];
		// common
		$this->time   = $row['UploadedDate'];
		$this->mktTyp = $row['marketCategory'];
		$this->cat    = $row['categoryName'];
		$this->cntTyp = $row['contactMethod'];
	}
	public function getId()
	{
		return $this->id;
	}
	public function getIdName()
	{
		return "eID";
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
		return "Electronics";
	}
	public function getUpldTime()
	{
		return $this->time;
	}
}

?>