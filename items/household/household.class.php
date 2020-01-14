<?php
class HouseHoldClass
{
	private $id,$sell,$nego,$curr,$title,$loc,$info,$time,$mktTyp,$cat,$cntTyp;
	public function setElements($row)
	{
		$this->id    = $row['hhID'];
		$this->sell  = $row['hhPricesell'];
		$this->nego  = $row['hhPriceNego'];
		$this->curr  = $row['currency'];
		$this->title = $row['hhTitle'];
		$this->loc   = $row['hhLocation'];
		$this->info  = $row['hhExtraInfo'];
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
		return "Household";
	}
	public function getUpldTime()
	{
		return $this->time;
	}
}
?>