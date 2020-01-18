<?php

/* Class for common methods used for all items
 * */
class DirectoryClass
{
	public $host;
	public $IMG_NOT_AVAIL        = "http://static.katomer.com/img/mk.png";
	public $IMG_NOT_AVAIL_THMBNL = "http://static.katomer.com/img/mkThumbnail.png";
	public $PATH_MAIL_ICON       = "http://static.katomer.com/img/mail.ico";
	public $PATH_PHN_ICON 		 = "http://static.katomer.com/img/phone.ico";
	public $PATH_RPT_ICON 		 = "http://static.katomer.com/img/report.ico";
	public $PATH_ITEM_CAR 		 = "http://static.katomer.com/uploads/carimages/";
	public $PATH_ITEM_CMP        = "http://static.katomer.com/uploads/computerimages/";
	public $PATH_ITEM_ELR        = "http://static.katomer.com/uploads/electronicsimages/";
	public $PATH_ITEM_HUS        = "http://static.katomer.com/uploads/houseimages/";
	public $PATH_ITEM_HLD        = "http://static.katomer.com/uploads/householdimages/";
	public $PATH_ITEM_PHN        = "http://static.katomer.com/uploads/phoneimages/";
	public $PATH_ITEM_THR        = "http://static.katomer.com/uploads/othersimages/";
	public $dir ="";

	public function getDirectory()
	{
		return $this->dir;	
	}
	public function setDirectory($type,$itemId)
	{
		$this->host = substr($_SERVER['HTTP_HOST'],0,5);
		if(in_array($this->host, array('local','127.0','192.1')))
		{
			$this->dir = "../../uploads/".$type."/".$itemId."/";
		}
		else
		{
			$this->dir = "http://static.katomer.com/uploads/".$type."/".$itemId."/";
		}
	}
}
?>