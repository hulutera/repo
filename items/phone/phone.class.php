<?php
class PhoneClass
{
	private $id,$sell,$nego,$curr,$make,$model,$os,$title,$loc,$info,$time,$mktTyp,$cntTyp;
	public function setElements($row)
	{
		$this->id   = $row['pID'];
		$this->sell = $row['pPricesell'];
		$this->nego = $row['pPriceNego'];
		$this->curr = $row['currency'];

		$this->make  = $row['pMake'];
		$this->model = $row['pModel'];
		$this->os    = $row['pOS'];
		$this->title = $row['pTitle'];
		$this->loc   = $row['pLocation'];
		$this->info  = $row['pExtraInfo'];
		// common
		$this->time   = $row['UploadedDate'];
		$this->mktTyp = $row['marketCategory'];
		$this->cntTyp = $row['contactMethod'];
	}

	public function getId()
	{
		return $this->id;
	}
	public function getIdName()
	{
		return "pID";
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
	public function getModel()
	{
		return $this->model;
	}
	public function getOS()
	{
		return $this->os;
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
		return "Phone";
	}
	public function getUpldTime()
	{
		return $this->time;
	}
}
?>