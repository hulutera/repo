<?php

/* Class for common methods used for all items
 * */
class DirectoryClass
{
	public $host;
	public $IMG_NOT_AVAIL        = "http://static.hulutera.com/img/mk.png";
	public $IMG_NOT_AVAIL_THMBNL = "http://static.hulutera.com/img/mkThumbnail.png";
	public $PATH_MAIL_ICON       = "http://static.hulutera.com/img/mail.ico";
	public $PATH_PHN_ICON 		 = "http://static.hulutera.com/img/phone.ico";
	public $PATH_RPT_ICON 		 = "http://static.hulutera.com/img/report.ico";
	public $PATH_ITEM_CAR 		 = "http://static.hulutera.com/uploads/carimages/";
	public $PATH_ITEM_CMP        = "http://static.hulutera.com/uploads/computerimages/";
	public $PATH_ITEM_ELR        = "http://static.hulutera.com/uploads/electronicsimages/";
	public $PATH_ITEM_HUS        = "http://static.hulutera.com/uploads/houseimages/";
	public $PATH_ITEM_HLD        = "http://static.hulutera.com/uploads/householdimages/";
	public $PATH_ITEM_PHN        = "http://static.hulutera.com/uploads/phoneimages/";
	public $PATH_ITEM_THR        = "http://static.hulutera.com/uploads/othersimages/";
	public $dir ="";

	public function getDirectory()
	{
		return $this->dir;	
	}
	public function setDirectory($type,$itemId)
	{
		$this->host = substr($_SERVER['HTTP_HOST'],0,5);
		if(in_array($this->host, array('local','127.0','192.1')) || $_SERVER['HTTP_HOST']=='hulutera')
		{
			$this->dir = "../../uploads/".$type."/".$itemId."/";
		}
		else
		{
			$this->dir = "http://static.hulutera.com/uploads/".$type."/".$itemId."/";
		}
	}
}
?>