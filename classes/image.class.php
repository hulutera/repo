<?php
class ImgHandler
{
	public $host;
	public $IMG_NOT_AVAIL_THMBNL = "";
	public $PATH_MAIL_ICON       = "../images/mail.ico";
	public $PATH_PHN_ICON 		 = "../images/phone.ico";
	public $PATH_RPT_ICON 		 = "../images/report.ico";
	public $dir ="";

	public  $nbrOfImgs = 1;
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
	public function getDirectory()
	{
		return $this->dir;	
	}
	public function setDirectory($type,$itemId)
	{
		$this->host = $_SERVER['HTTP_HOST'];
		if(in_array(substr($this->host,0,5), array('local','127.0','192.1')) || $this->host =='hulutera')
		{
			$this->dir = "../images/uploads/".$type."/".$itemId."/";
			$this->IMG_NOT_AVAIL_THMBNL = "../images/uploads/".$type."/". $type;
		}
		else
		{
			$this->dir = "http://static.hulutera.com/images/upload/".$type."/".$itemId."/";
		}

		return $this->dir;
	}
}
?>