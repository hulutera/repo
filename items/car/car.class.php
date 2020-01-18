<?php
class CarClass
{
	private $id,$rent,$sell,$nego,$curr,$rate,$make,$model,$title,$mfg,$fule,$seat,$color,$gear,$info,$time,$mktTyp,$cat,$loc,$cntTyp;
	public function setElements($row)
	{
		$this->id   = $row['cID'];
		$this->rent = $row['cPriceRent'];
		$this->sell = $row['cPricesell'];
		$this->nego = $row['cPriceNego'];
		$this->curr = $row['currency'];
		$this->rate = $row['cPriceRate'];
		$this->make = $row['cMake'];
		$this->model = $row['cModel'];
		$this->title = $row['cTitle'];
		$this->mfg   = $row['cYearOfMfg'];
		$this->fuel  = $row['cFuelType'];
		$this->seat  = $row['cNrOfSeats'];
		$this->color = $row['cColor'];
		$this->gear  = $row['cGear'];
		$this->loc   = $row['cLocation'];
		$this->info  = $row['cExtraInfo'];

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
		return "cID";
	}
	public function getRent()
	{
		return $this->rent;
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
	public function getRate()
	{
		return $this->rate;
	}
	public function getMake()
	{
		return $this->make;
	}
	public function getModel()
	{
		return $this->model;
	}
	public function getTitle()
	{
		return $this->title;
	}
	public function getMfg()
	{
		return $this->mfg;
	}
	public function getFuel()
	{
		return $this->fuel;
	}
	public function getSeat()
	{
		return $this->seat;
	}
	public function getColor()
	{
		return $this->color;
	}
	public function getGear()
	{
		return $this->gear;
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
		return "Car";
	}
	public function getUpldTime()
	{
		return $this->time;
	}
	/*@ function to display make and model of item
	 * input: make and model
	* */
	public function printModel()
	{
		echo "<div class=\"MakeandModel\">";
		if($this->make != "" AND $this->make != "000")
		{
			echo $this->make;
		}
		if($this->model != "" AND $this->model != "000")
		{
			echo "&nbsp;".$this->model;
		}
		echo'</div>';
	}

}
?>