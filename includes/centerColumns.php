<?php
function location($hash)
{
	$region = isset($_GET['region'])?$_GET['region']:'';
	$printObj = new CommonItemPrintout("en");

	echo '<div id="region">';
	echo '<label>'.$printObj->city("City").'</label>';
	echo '<select name="region" id="city">';
	echo '<option value="000" selected>['.$printObj->choiceTxt("City").']</option>';
	echo '<option value = "Addis Ababa" ';if($region=="Addis Ababa") echo " selected"; echo '>'.$printObj->city("Addis Ababa").'</option>';
	echo '<option value = "Dire Dawa" ';if($region=="Dire Dawa") echo " selected"; echo '>'.$printObj->city("Dire Dawa").'</option>';
	echo '<option value = "Adama" ';if($region=="Adama") echo " selected"; echo '>'.$printObj->city("Adama").'</option>';
	echo '<option value = "Bahir Dar" ';if($region=="Bahir Dar") echo " selected"; echo '>'.$printObj->city("Bahir Dar").'</option>';
	echo '<option value = "Mekele" ';if($region=="Mekele") echo " selected"; echo '>'.$printObj->city("Mekele").'</option>';
	echo '<option value = "Awassa" ';if($region=="Awassa") echo " selected"; echo '>'.$printObj->city("Awassa").'</option>';
	echo '<option value = "Asaita" ';if($region=="Asaita") echo " selected"; echo '>'.$printObj->city("Asaita").'</option>';
	echo '<option value = "Debre Berhan" ';if($region=="Debre Berhan") echo " selected"; echo '>'.$printObj->city("Debre Brhane").'</option>';
	echo '<option value = "Dessie" ';if($region=="Dessie") echo " selected"; echo '>'.$printObj->city("Dessie").'</option>';
	echo '<option value = "Gondar" ';if($region=="Gondar") echo " selected"; echo '>'.$printObj->city("Gondar").'</option>';
	echo '<option value = "Gambela" ';if($region=="Gambela") echo " selected"; echo '>'.$printObj->city("Gambela").'</option>';
	echo '<option value = "Harar" ';if($region=="Harar") echo " selected"; echo '>'.$printObj->city("Harar").'</option>';
	echo '<option value = "Asella" ';if($region=="Asella") echo " selected"; echo '>'.$printObj->city("Asella").'</option>';
	echo '<option value = "Debre Zeit" ';if($region=="Debre Zeit") echo " selected"; echo '>'.$printObj->city("Bishoftu").'</option>';
	echo '<option value = "Jimma" ';if($region=="Jimma") echo " selected"; echo '>'.$printObj->city("Jimma").'</option>';
	echo '<option value = "Nekemte" ';if($region=="Nekemte") echo " selected"; echo '>'.$printObj->city("Nekemte").'</option>';
	echo '<option value = "Shashemene" ';if($region=="Shashemene") echo " selected"; echo '>'.$printObj->city("Shashemene").'</option>';
	echo '<option value = "Arba Minch" ';if($region=="Arba Minch") echo " selected"; echo '>'.$printObj->city("Arba Minch").'</option>';
	echo '<option value = "Dila" ';if($region=="Dila") echo " selected"; echo '>'.$printObj->city("Dila").'</option>';
	echo '<option value = "Hosaena" ';if($region=="Hosaena") echo " selected"; echo '>'.$printObj->city("Hosaena").'</option>';
	echo '<option value = "Sodo" ';if($region=="Sodo") echo " selected"; echo '>'.$printObj->city("Wolayita Sodo").'</option>';
	echo '<option value = "Somali-Jijiga" ';if($region=="Somali-Jijiga") echo " selected"; echo '>'.$printObj->city("Jijiga").'</option>';
	echo '<option value = "Axum" ';if($region=="Axum") echo " selected"; echo '>'.$printObj->city("Axum").'</option>';
	echo '<option value = "Other" ';if($region=="Other") echo " selected"; echo '>'.$printObj->city("Other").'</option>';	
	echo '</select>';
	if(crypt(116, $hash) == $hash)
	{
		echo '<div id="myform_errorloc" class="error_strings">'.$printObj->requireTxt("Region").'</div>';
	}	
	echo '</div>';
	if($region)
	{
		$show="display:inline;";
	}
	else
	{
		$show="display:none;";
	}
	echo '<div id="subcity" style="'.$show.'">';
	echo '<label>'.$printObj->city("Subcity").'</label>';
	echo '<select name="subcity">';
	echo '<option value = "Addis Ababa">['.$printObj->choiceTxt("Subcity").']</option>';
	echo '<option value = "Addis Ababa" selected>'.$printObj->city("Addis Ababa").'</option>';
	echo '<option value = "Addis Ketema">'.$printObj->city("Addis ketema").'</option>';
	echo '<option value = "Akaki Kality">'.$printObj->city("Akaki Kality").'</option>';
	echo '<option value = "Arada">'.$printObj->city("Arada").'</option>';
	echo '<option value = "Bole">'.$printObj->city("Bole").'</option>';
	echo '<option value = "Gullele">'.$printObj->city("Gullele").'</option>';
	echo '<option value = "Kirkos">'.$printObj->city("Kirkos").'</option>';
	echo '<option value = "Kolfe Keraniyo">'.$printObj->city("Kolfe Keraniyo").'</option>';
	echo '<option value = "Lideta">'.$printObj->city("Lideta").'</option>';
	echo '<option value = "Nifassilk Lafto">'.$printObj->city("Nifassilk Lafto").'</option>';
	echo '<option value = "Yeka">'.$printObj->city("Yeka").'</option>';
	echo '</select>';
	echo '</div>';

}
function currency($hash)
{
	$currency    = isset($_GET['currency'])?$_GET['currency']:'';
	$printObj = new CommonItemPrintout("en");
	echo '<div>';
	echo '<label>';
	echo $printObj->curr("Currency");
	echo '</label>';
	echo '<select name="currency" class="smallselectcurrency">';
	echo '<option value="000">[Currency]</option>';
	echo '<option value = "Birr"';if($currency=="Birr") echo " selected"; echo '>'.$printObj->curr("BIRR").'</option>';
	echo '<option value = "USD"';if($currency=="USD") echo " selected"; echo '>'.$printObj->curr("USD").'</option>';
	echo '</select>';
	if(crypt(117, $hash) == $hash)
	{
		echo '<div id="myform_errorloc" class="error_strings">'.$printObj->requireTxt("Currency").'</div>';
	}
	echo '</div>';
}
function priceCommon($hash)
{
	//
	$price = isset($_GET['price'])?$_GET['price']:'';
	$nego  = isset($_GET['nego'])?$_GET['nego']:0;
	$printObj = new CommonItemPrintout("en");
	
	echo '<div id="priceCommon">';
	echo '<table>';
	echo '<tr>';
	echo '<td width="10%;">';
	echo '<label>'.$printObj->price().'</label>';
	echo '</td>';
	echo '<td width="90%;">';
	echo '<input type="text" name="priceCommon" class="commonprice" id="priceText" value="'.$price.'">';
	echo '<input type="checkbox" name="nego" class="radio" id="nego"';
	if($nego)
	{
		echo ' checked';
	}	
	echo '>';
	echo '<label style="float:left;text-align:left;width:50%;padding-top:1%;" >';
	echo '&nbsp;'.$printObj->negotiable().'</label>';
	echo '</td>';
	echo '</tr>';
	echo '</table>';
	if(crypt(100, $hash) == $hash && $nego == 0)
	{
		echo '<div id="myform_errorloc"  style="margin-left:160px;" class="error_strings">'.$printObj->requireTxt("Sell or Rent or negotiable price").'</div>';
	}
	echo '</div>';
}
function contactMethod($hash)
{
	$contact = isset($_GET['contact'])?$_GET['contact']:'';
	$printObj = new CommonItemPrintout("en");
	echo '<div id ="contactMethod">';
	echo '<label for="comp">'.$printObj->contact.'</label>';
	echo '<select name="contactMethod">';
	echo '<option value="000">['.$printObj->contactMethod("contact method").']</option>';
	echo '<option value="1"';if($contact=="1") echo " selected"; echo '>'.$printObj->contactMethod("e-mail").'</option>';
	echo '<option value="2"';if($contact=="2") echo " selected"; echo '>'.$printObj->contactMethod("Phone").'</option>';
	echo '<option value="3"';if($contact=="3") echo " selected"; echo '>'.$printObj->contactMethod("Both").'</option>';
	echo '</select>';
	if(crypt(111, $hash) == $hash)
	{
		echo '<div id="myform_errorloc" class="error_strings">'.$printObj->requireTxt("Contact method").'</div>';
	}
	echo '</div>';
}
/*Extra Info*/
function title($hash)
{

	$title  = isset($_GET['title'])?$_GET['title']:'';
	$printObj = new CommonItemPrintout("en");
	
	echo '<div id="subject">';
	echo '<label>'.$printObj->title().'</label>';
	echo '<input type="text" id="title" name="title" value="'.$title.'">';
	if(crypt(108, $hash) == $hash)
	{
		echo '<div id="myform_errorloc" class="error_strings">'.$printObj->requireTxt("Title").'</div>';
	}
	echo '</div>';
}
function description($hash)
{
	$description = isset($_GET['description'])?$_GET['description']:'';
	$printObj = new CommonItemPrintout("en");
	
	echo '<div id="Description">';
	echo '<label for="description">'.$printObj->des().'</label>';
	echo '<textarea id="styled" name="description" rows="8">';
	echo $description; echo '</textarea>';
	echo '</div>';
}
function pictureForm()
{	
	$maxNoOfImage = 5;
	$printObj = new CommonItemPrintout("en");
	echo '<div  class="test">';
	echo '<div style=" margin-left:160px;">';
	for ($i = 1; $i <= $maxNoOfImage; $i++)
	{
		echo '<div id="picture_'.$i.'_preview" style="text-align:center; padding-left:5px; float:left;">';
		echo '<div id="preview_ie_'.$i.'"></div>';
		echo '<div style="border:1px solid black; width: 138px;">'.$printObj->pic("Picture") . $i.'<input class="picture_'.$i.'" type="file" name="picture_'.$i.'" id="picture_'.$i.'" onchange="readURL(this,'.$i.');"/>';
		echo '</div>';
		echo '<img id="preview_'.$i.'"	src=""	alt="" style="display:none; width: 100px; height: 100px; border: none;"/>';
		echo '<div style=" display:none; text-align:center;border:1px solid black;border-radius:5px;width:100px;overflow:hidden;height:30px;cursor:pointer;background:#fe1a00;margin:auto" id="deleteBtn'.$i.'" onClick="removeImg(this,'.$i.')" > <span style="line-height:30px;vertical-align:middle">Remove</span>';		
		echo '</div>';
		echo '</div>';
	}
	echo '</div>';
	echo '</div>';	
}
function centerPicture($hash)
{
	$image  = isset($_GET['image'])?$_GET['image']:'';
	$printObj = new CommonItemPrintout("en");
	echo '<div id="x">';
	echo '<label>'.$printObj->pic("Item Pictures").'</label>';
	pictureForm();
	if(crypt(300, $hash["300"]) == $hash["300"])
	{
		echo '<div id="myform_errorloc" class="error_strings">'.$image . $printObj->pic("exceeds size 5MB").'</div>';
	}
	if(crypt(301, $hash["301"]) == $hash["301"])
	{
		echo '<div id="myform_errorloc" class="error_strings"> <bold>'.$image.'</bold>'.$printObj->pic("is not of type jpeg ,bmp,gif,jpg or png").'</div>';
	}
	echo ' </div>';

}
?>
