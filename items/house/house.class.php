<?php
class HouseClass
{
	private $id,$rent,$sell,$nego,$curr,$rate,$wereda,$lotsz,$title,$yrOBlt,$tlt,$bdrm,$bathrm,$wtr,$ele,$info,$time,$mktTyp,$cat,$loc,$cntTyp;
	private $_tableName = "house";
	public function setElements($row)
	{
		$this->id   = $row['hID'];
		$this->rent = $row['hPriceRent'];
		$this->sell = $row['hPricesell'];
		$this->nego = $row['hPriceNego'];
		$this->curr = $row['currency'];
		$this->rate = $row['hPriceRate'];
		$this->wedea  = $row['hWereda'];
		$this->lotsz  = $row['hLotSize'];
		$this->title  = $row['hTitle'];
		$this->yrOBlt = $row['hYearOfBuilt'];
		$this->tlt    = $row['hToilet'];
		$this->bdrm   = $row['hBedrooms'];
		$this->bathrm   = $row['hBathroom'];
		$this->wtr    = $row['hWater'];
		$this->ele    = $row['hElectricity'];
		$this->loc    = $row['hLocation'];
		$this->info   = $row['hExtraInfo'];
		// common
		$this->time   = $row['UploadedDate'];
		$this->mktTyp = $row['marketCategory'];
		$this->cat    = $row['categoryName'];
		$this->cntTyp = $row['contactMethod'];
	}
	public function getId(){
		return $this->id;
	}
	public function getIdName()
	{
		return "hID";
	}
	public function getRent(){
		return $this->rent;
	}
	public function getSell(){
		return $this->sell;
	}
	public function getNego(){
		return $this->nego;
	}
	public function getCurr(){
		return $this->curr;
	}
	public function getRate(){
		return $this->rate;
	}
	public function getWereda(){
		return $this->wedea;
	}
	public function getLotSize(){
		return $this->lotsz;
	}
	public function getTitle(){
		return $this->title;
	}
	public function getYrOfBlt(){
		return $this->yrOBlt;
	}
	public function getBedrooms(){
		return $this->bdrm;
	}
	public function getToilet(){
		return $this->tlt;
	}
	public function getBathrooms(){
		return $this->bathrm;
	}
	public function getWater(){
		return $this->wtr;
	}
	public function getElec(){
		return $this->ele;
	}
	public function getLoc(){
		return $this->loc;
	}
	public function getInfo(){
		return $this->info;
	}
	//common
	public function getMktType(){
		return $this->mktTyp;
	}
	public function getCategory(){
		return $this->cat;
	}
	public function getContactMethod(){
		return $this->cntTyp;
	}
	public function getItemName(){
		return "House";
	}
	public function getUpldTime(){
		return $this->time;
	}
	public function getIdFieldName()
	{
		return DatabaseClass::getInstance()->getFieldName($this->_tableName, 0);
	}
}
?>