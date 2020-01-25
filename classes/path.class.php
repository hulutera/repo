<?php

/* Class for common methods used for all items
 * */
class DirectoryClass
{
	public $host;
	public $IMG_NOT_AVAIL_THMBNL = "";
	public $PATH_MAIL_ICON       = "../images/mail.ico";
	public $PATH_PHN_ICON 		 = "../images/phone.ico";
	public $PATH_RPT_ICON 		 = "../images/report.ico";
	public $dir ="";

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
	}
}
?>