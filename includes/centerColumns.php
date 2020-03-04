<?php
function location($hash)
{
	$region = isset($_GET['region'])?$_GET['region']:'';
	global $lang;

	echo '<div id="region">';
	echo '<label>'. $lang['City'] .'</label>';
	echo '<select name="region" id="city">';
	echo '<option value="000" selected>[' . $lang['City'] . ' ' . $lang['Choose'] .']</option>';
	echo '<option value = "Addis Ababa" ';if($region=="Addis Ababa") echo " selected"; echo '>' . $lang['Addis Ababa'] . '</option>';
	echo '<option value = "Dire Dawa" ';if($region=="Dire Dawa") echo " selected"; echo '>' . $lang['Dire Dawa'] . '</option>';
	echo '<option value = "Adama" ';if($region=="Adama") echo " selected"; echo '>' . $lang['Adama'] . '</option>';
	echo '<option value = "Bahir Dar" ';if($region=="Bahir Dar") echo " selected"; echo '>' . $lang['Bahir Dar'] . '</option>';
	echo '<option value = "Mekele" ';if($region=="Mekele") echo " selected"; echo '>' . $lang['Mekele'] . '</option>';
	echo '<option value = "Awassa" ';if($region=="Awassa") echo " selected"; echo '>' . $lang['Awassa'] . '</option>';
	echo '<option value = "Asaita" ';if($region=="Asaita") echo " selected"; echo '>' . $lang['Asaita'] . '</option>';
	echo '<option value = "Debre Birhan" ';if($region=="Debre Birhan") echo " selected"; echo '>' . $lang['Debre Birhan'] . '</option>';
	echo '<option value = "Dessie" ';if($region=="Dessie") echo " selected"; echo '>' . $lang['Dessie'] . '</option>';
	echo '<option value = "Gonder" ';if($region=="Gonder") echo " selected"; echo '>' . $lang['Gonder'] . '</option>';
	echo '<option value = "Gambela" ';if($region=="Gambela") echo " selected"; echo '>' . $lang['Gambela'] . '</option>';
	echo '<option value = "Harar" ';if($region=="Harar") echo " selected"; echo '>' . $lang['Harar'] . '</option>';
	echo '<option value = "Asella" ';if($region=="Asella") echo " selected"; echo '>' . $lang['Asella'] . '</option>';
	echo '<option value = "Bishoftu" ';if($region=="Bishoftu") echo " selected"; echo '>' . $lang['Bishoftu'] . '</option>';
	echo '<option value = "Jimma" ';if($region=="Jimma") echo " selected"; echo '>' . $lang['Jimma'] . '</option>';
	echo '<option value = "Nekemte" ';if($region=="Nekemte") echo " selected"; echo '>' . $lang['Nekemte'] . '</option>';
	echo '<option value = "Shashemene" ';if($region=="Shashemene") echo " selected"; echo '>' . $lang['Shashemene'] . '</option>';
	echo '<option value = "Arba Minch" ';if($region=="Arba Minch") echo " selected"; echo '>' . $lang['Arba Minch'] . '</option>';
	echo '<option value = "Dila" ';if($region=="Dila") echo " selected"; echo '>' . $lang['Dila'] . '</option>';
	echo '<option value = "Hosaena" ';if($region=="Hosaena") echo " selected"; echo '>' . $lang['Hosaena'] . '</option>';
	echo '<option value = "Sodo" ';if($region=="Sodo") echo " selected"; echo '>' . $lang['Sodo'] . '</option>';
	echo '<option value = "Jijiga" ';if($region=="Jijiga") echo " selected"; echo '>' . $lang['Jijiga'] . '</option>';
	echo '<option value = "Axum" ';if($region=="Axum") echo " selected"; echo '>' . $lang['Axum'] . '</option>';
	echo '<option value = "Adigrat" ';if($region=="Adigrat") echo " selected"; echo '>' . $lang['Adigrat'] . '</option>';
	echo '<option value = "Ambo" ';if($region=="Ambo") echo " selected"; echo '>' . $lang['Ambo'] . '</option>';
	echo '<option value = "Debre Markos" ';if($region=="Debre Markos") echo " selected"; echo '>' . $lang['Debre Markos'] . '</option>';
	echo '<option value = "Other" ';if($region=="Other") echo " selected"; echo '>' . $lang['Other'] . '</option>';	
	echo '</select>';
	if(crypt(116, $hash) == $hash)
	{
		echo '<div id="myform_errorloc" class="error_strings">' . $lang['City'] . ' ' . $lang['is required'] . '</div>';
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
	echo '<label>' . $lang['Subcity'] . '</label>';
	echo '<select name="subcity">';
	echo '<option value = "Addis Ababa">[' . $lang['Addis Ababa'] . ']</option>';
	echo '<option value = "Addis Ababa" selected>' . $lang['Addis Ababa'] . '</option>';
	echo '<option value = "Addis Ketema">' . $lang['Addis Ketema'] . '</option>';
	echo '<option value = "Akaki Kality">' . $lang['Akaki Kality'] . '</option>';
	echo '<option value = "Arada">' . $lang['Arada'] . '</option>';
	echo '<option value = "Bole">' . $lang['Bole'] . '</option>';
	echo '<option value = "Gullele">' . $lang['Gullele'] . '</option>';
	echo '<option value = "Kirkos">' . $lang['Kirkos'] . '</option>';
	echo '<option value = "Kolfe Keraniyo">' . $lang['Kolfe Keraniyo'] . '</option>';
	echo '<option value = "Lideta">' . $lang['Lideta'] . '</option>';
	echo '<option value = "Nifassilk Lafto">' . $lang['Nifassilk Lafto'] . '</option>';
	echo '<option value = "Yeka">' . $lang['Yeka'] . '</option>';
	echo '</select>';
	echo '</div>';

}
function currency($hash)
{
	$currency    = isset($_GET['currency'])?$_GET['currency']:'';
	global $lang;

	echo '<div>';
	echo '<label>';
	echo $lang['Currency'];
	echo '</label>';
	echo '<select name="currency" class="smallselectcurrency">';
	echo '<option value="000">[Currency]</option>';
	echo '<option value = "Birr"';if($currency=="Birr") echo " selected"; echo '>'. $lang['BIRR'] .'</option>';
	echo '<option value = "USD"';if($currency=="USD") echo " selected"; echo '>'. $lang['USD'] .'</option>';
	echo '</select>';
	if(crypt(117, $hash) == $hash)
	{
		echo '<div id="myform_errorloc" class="error_strings">' . $lang['Currency'] . ' ' . $lang['is required'] . '</div>';
	}
	echo '</div>';
}
function priceCommon($hash)
{
	//
	$price = isset($_GET['price'])?$_GET['price']:'';
	$nego  = isset($_GET['nego'])?$_GET['nego']:0;
	global $lang;
	
	echo '<div id="priceCommon">';
	echo '<table>';
	echo '<tr>';
	echo '<td width="10%;">';
	echo '<label>' . $lang['Price'] . '</label>';
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
	echo '&nbsp;' . $lang['Negotiable'] . '</label>';
	echo '</td>';
	echo '</tr>';
	echo '</table>';
	if(crypt(100, $hash) == $hash && $nego == 0)
	{
		echo '<div id="myform_errorloc"  style="margin-left:160px;" class="error_strings">' . $lang['Sell or Rent or negotiable price'] . ' ' . $lang['is required'] . '</div>';
	}
	echo '</div>';
}
function contactMethod($hash)
{
	$contact = isset($_GET['contact'])?$_GET['contact']:'';
	global $lang;

	echo '<div id ="contactMethod">';
	echo '<label for="comp">' . $lang['Contact'] . '</label>';
	echo '<select name="contactMethod">';
	echo '<option value="000">[' . $lang['contact method'] . ']</option>';
	echo '<option value="1"';if($contact=="1") echo " selected"; echo '>' . $lang['e-mail'] . '</option>';
	echo '<option value="2"';if($contact=="2") echo " selected"; echo '>' . $lang['phone'] .'</option>';
	echo '<option value="3"';if($contact=="3") echo " selected"; echo '>' . $lang['with both'] .'</option>';
	echo '</select>';
	if(crypt(111, $hash) == $hash)
	{
		echo '<div id="myform_errorloc" class="error_strings">' . $lang['contact method'] . ' ' . $lang['is required'] .'</div>';
	}
	echo '</div>';
}
/*Extra Info*/
function title($hash)
{

	$title  = isset($_GET['title'])?$_GET['title']:'';
	global $lang;
	
	echo '<div id="subject">';
	echo '<label>' . $lang['Title'] .'</label>';
	echo '<input type="text" id="title" name="title" value="'.$title.'">';
	if(crypt(108, $hash) == $hash)
	{
		echo '<div id="myform_errorloc" class="error_strings">'. $lang['Title'] . ' ' . $lang['is required'] .'</div>';
	}
	echo '</div>';
}
function description($hash)
{
	$description = isset($_GET['description'])?$_GET['description']:'';
	global $lang;
	
	echo '<div id="Description">';
	echo '<label for="description">'. $lang['Description'] .'</label>';
	echo '<textarea id="styled" name="description" rows="8">';
	echo $description; echo '</textarea>';
	echo '</div>';
}
function pictureForm($item)
{	
	$maxNoOfImage = 5;
	global $lang;
	echo '<div  class="test">';
	echo '<div style=" margin-left:160px;">';
	for ($i = 1; $i <= $maxNoOfImage; $i++)
	{
		echo '<div id="picture_'.$i.'_preview" style="text-align:center; padding-left:5px; float:left;">';
		echo '<div id="preview_ie_'.$i.'"></div>';
		echo '<div style="border:1px solid black; width: 138px;">'.$lang['Picture'] . $i.'<input class="picture_'.$i.'" type="file" name="picture_'.$i.'" id="picture_'.$i.'" onchange="readURL(this,'.$i.');"/>';
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
	global $lang;
	
	echo '<div id="x">';
	echo '<label>'.$lang['Item Pictures'].'</label>';
	pictureForm();
	if(crypt(300, $hash["300"]) == $hash["300"])
	{
		echo '<div id="myform_errorloc" class="error_strings">'.$image .' '. $lang['exceeds size 5MB'].'</div>';
	}
	if(crypt(301, $hash["301"]) == $hash["301"])
	{
		echo '<div id="myform_errorloc" class="error_strings"> <bold>'.$image.'</bold>'.$lang['is not of type jpeg ,bmp,gif,jpg or pnggit '].'</div>';
	}
	echo ' </div>';

}
?>
