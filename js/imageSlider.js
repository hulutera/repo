/* This changes the thumbnail image to be a bigger img*/
function imgnumber(imgDirectory, imgName, itemid, itemtype)
{
	document.getElementById("largeImg"+itemtype+itemid).src= imgDirectory+imgName;
}

/* This inserts images from the file on the thumbnail position */
function insertimg(imgDirectory,itemid,itemType,pictures)
{
	var picArray = pictures.split(',');
	var imageLib    = new Array();
	var thumbImgDir = imgDirectory+'thumbnail/';
	var orignImgDir = imgDirectory+'original/';
	
	var largeImgId  = 'largeImg'itemType+itemid; 
	var bottomImgId  = 'bottomimg'itemType+itemid;
	
	var orignImgWidth  = document.getElementById(largeImgId).offsetWidth;
	var orignImgHeight = document.getElementById(largeImgId).offsetHeight;
	var index = '';
	var j = 0;
	for(var i = 0; i < picArray.length; i++)
	{
		j = i + 1;
		
		index = bottomImgId + j;
		
		document.getElementById(index).src = thumbImgDir + picArray[i];
		
		imageLib[index] = new Image(orignImgWidth,orignImgHeight);
		
		imageLib[index].src = orignImgDir + picArray[i];
		
		alert(index);
	}
}