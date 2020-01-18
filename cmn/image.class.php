<?php
class ImgHandler
{
	public  $nbrOfImgs = 0;
	private $ctr = 1;
	private $maxNumOfImg = 5;
	public  $image = array();
	
	public function initImage($itemRow)
	{
		$k = 1;
		$i = 1;
		while($k <= 5)
		{
			if($itemRow['picture_'.$k] != NULL)
			{
				$this->image[$i] = $itemRow['picture_'.$k];
				$i++;
			}
			$k++;
		}
		$this->nbrOfImgs = $i;
		return $this->image;
	}
	public function getNumOfImg()
	{
		return $this->nbrOfImgs;
	}
}
?>