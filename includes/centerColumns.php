<?php
function location($hash)
{
	$region = isset($_GET['region'])?$_GET['region']:'';
	echo '<div id="region">';
	echo '<label>City<div id="uploadAmharic">ከተማ</div></label>';
	echo '<select name="region" id="city">';
	echo '<option value="000" selected>[choose City]</option>';
	echo '<option value = "Addis Ababa" ';if($region=="Addis Ababa") echo " selected"; echo '>Addis Ababa*/አዲስ አበባ</option>';
	echo '<option value = "Dire Dawa" ';if($region=="Dire Dawa") echo " selected"; echo '>Dire Dawa*/ድሬ ዳዋ</option>';
	echo '<option value = "Adama" ';if($region=="Adama") echo " selected"; echo '>Adama*/አዳማ</option>';
	echo '<option value = "Bahir Dar" ';if($region=="Bahir Dar") echo " selected"; echo '>Bahir Dar*/ባሕር ዳር</option>';
	echo '<option value = "Mekele" ';if($region=="Mekele") echo " selected"; echo '>Mekele*/መቀሌ</option>';
	echo '<option value = "Awassa" ';if($region=="Awassa") echo " selected"; echo '>Awassa*/አዋሳ</option>';
	echo '<option value = "Asaita" ';if($region=="Asaita") echo " selected"; echo '>Afar-Asaita/አሳይታ</option>';
	echo '<option value = "Debre Berhan" ';if($region=="Debre Berhan") echo " selected"; echo '>Amhara-Debre Brhane/ደብረ ብርሃን</option>';
	echo '<option value = "Dessie" ';if($region=="Dessie") echo " selected"; echo '>Amhara-Dessie/ደሴ</option>';
	echo '<option value = "Gondar" ';if($region=="Gondar") echo " selected"; echo '>Amhara-Gondar/ጎንደር</option>';
	echo '<option value = "Gambela" ';if($region=="Gambela") echo " selected"; echo '>Gambela-Gambela/ጋንቤላ</option>';
	echo '<option value = "Harar" ';if($region=="Harar") echo " selected"; echo '>Harari-Harar/ሐረር</option>';
	echo '<option value = "Asella" ';if($region=="Asella") echo " selected"; echo '>Oromia-Asella/አሰላ</option>';
	echo '<option value = "Debre Zeit" ';if($region=="Debre Zeit") echo " selected"; echo '>Oromia-Debre Zeit/ደብረ ዘይት</option>';
	echo '<option value = "Jimma" ';if($region=="Jimma") echo " selected"; echo '>Oromia-Jimma/ጅማ</option>';
	echo '<option value = "Nekemte" ';if($region=="Nekemte") echo " selected"; echo '>Oromia-Nekemte/ነቀምት</option>';
	echo '<option value = "Shashemene" ';if($region=="Shashemene") echo " selected"; echo '>Oromia-Shashemene/ሻሸመኔ</option>';
	echo '<option value = "Arba Minch" ';if($region=="Arba Minch") echo " selected"; echo '>SNNP-Arba Minch/አርባ ምንጭ</option>';
	echo '<option value = "Dila" ';if($region=="Dila") echo " selected"; echo '>SNNP-Dila/ዲላ</option>';
	echo '<option value = "Hosaena" ';if($region=="Hosaena") echo " selected"; echo '>SNNP-Hosaena/ሆሳና</option>';
	echo '<option value = "Sodo" ';if($region=="Sodo") echo " selected"; echo '>SNNP-Sodo/ሶዶ</option>';
	echo '<option value = "Somali-Jijiga" ';if($region=="Somali-Jijiga") echo " selected"; echo '>Somali-Jijiga/ጅጅጋ</option>';
	echo '<option value = "Axum" ';if($region=="Axum") echo " selected"; echo '>Tigray-Axum/አክሱም</option>';
	echo '<option value = "Other" ';if($region=="Other") echo " selected"; echo '>Other/ሌሎች</option>';	
	echo '</select>';
	if(crypt(116, $hash) == $hash)
	{
		echo '<div id="myform_errorloc" class="error_strings">Region is required</div>';
	}	
	echo '</div>';
	if($region)
	{
		$show="display:;";
	}
	else
	{
		$show="display:none;";
	}
	echo '<div id="subcity" style="'.$show.'">';
	echo '<label>Subcity<div id="uploadAmharic">ክፍለ ከተማ</div></label>';
	echo '<select name="subcity">';
	echo '<option value = "Addis Ababa">[choose Subcity]</option>';
	echo '<option value = "Addis Ababa" selected>Addis Ababa*/አዲስ አበባ</option>';
	echo '<option value = "Addis Ketema">Addis ketema/አዲስ ከተማ</option>';
	echo '<option value = "Akaki Kality">Akaki Kality/አቃቂ ቃሊቲ</option>';
	echo '<option value = "Arada">Arada/አራዳ</option>';
	echo '<option value = "Bole">Bole/ቦሌ</option>';
	echo '<option value = "Gullele">Gullele/ጉለሌ</option>';
	echo '<option value = "Kirkos">Kirkos/ቂርቆስ</option>';
	echo '<option value = "Kolfe Keraniyo">Kolfe Keraniyo/ኮልፌ ቀራንዮ</option>';
	echo '<option value = "Lideta">Lideta/ልደታ</option>';
	echo '<option value = "Nifassilk Lafto">Nifassilk Lafto/ነፋስ ስልክ ላፍቶ</option>';
	echo '<option value = "Yeka">Yeka/የካ</option>';
	echo '</select>';
	echo '</div>';

}
function currency($hash)
{
	$currency    = isset($_GET['currency'])?$_GET['currency']:'';
	echo '<div>';
	echo '<label>';
	echo 'Currency<div id="uploadAmharic">ምንዛሬ</div>';
	echo '</label>';
	echo '<select name="currency" class="smallselectcurrency">';
	echo '<option value="000">[Currency]</option>';
	echo '<option value = "Birr"';if($currency=="Birr") echo " selected"; echo '>BIRR/ብር</option>';
	echo '<option value = "USD"';if($currency=="USD") echo " selected"; echo '>USD/ዶላር</option>';
	echo '</select>';
	if(crypt(117, $hash) == $hash)
	{
		echo '<div id="myform_errorloc" class="error_strings">Currency is required</div>';
	}
	echo '</div>';
}
function priceCommon($hash)
{
	//
	$price = isset($_GET['price'])?$_GET['price']:'';
	$nego  = isset($_GET['nego'])?$_GET['nego']:0;
	
	echo '<div id="priceCommon">';
	echo '<table>';
	echo '<tr>';
	echo '<td width="10%;">';
	echo '<label>Price<div id="uploadAmharic">ዋጋ</div></label>';
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
	echo '&nbsp;negotiable price/እንስማማለን</label>';
	echo '</td>';
	echo '</tr>';
	echo '</table>';
	if(crypt(100, $hash) == $hash && $nego == 0)
	{
		echo '<div id="myform_errorloc"  style="margin-left:160px;" class="error_strings">Sell price or negotiable is required</div>';
	}
	echo '</div>';
}
function contactMethod($hash)
{
	$contact = isset($_GET['contact'])?$_GET['contact']:'';
	echo '<div id ="contactMethod">';
	echo '<label for="comp">Contact by<div id="uploadAmharic">እንዲገኙበት የሚፈልጉት</div></label>';
	echo '<select name="contactMethod">';
	echo '<option value="000">[Choose contact method]</option>';
	echo '<option value="1"';if($contact=="1") echo " selected"; echo '>e-mail/በኢሜይል</option>';
	echo '<option value="2"';if($contact=="2") echo " selected"; echo '>Phone/በስልክ</option>';
	echo '<option value="3"';if($contact=="3") echo " selected"; echo '>Both/በሁለቱም</option>';
	echo '</select>';
	if(crypt(111, $hash) == $hash)
	{
		echo '<div id="myform_errorloc" class="error_strings">Contact method is required</div>';
	}
	echo '</div>';
}
/*Extra Info*/
function title($hash)
{

	$title  = isset($_GET['title'])?$_GET['title']:'';
	
	echo '<div id="subject">';
	echo '<label>Title<div id="uploadAmharic">ርዕስ</div></label>';
	echo '<input type="text" id="title" name="title" value="'.$title.'">';
	if(crypt(108, $hash) == $hash)
	{
		echo '<div id="myform_errorloc" class="error_strings">Title is required</div>';
	}
	echo '</div>';
}
function description($hash)
{
	$description = isset($_GET['description'])?$_GET['description']:'';
	
	echo '<div id="Description">';
	echo '<label for="description">Description<div id="uploadAmharic">ገለጻ</div></label>';
	echo '<textarea id="styled" name="description" rows="8">';
	echo $description; echo '</textarea>';
	echo '</div>';
}
function pictureForm()
{	
	$maxNoOfImage = 5;
	echo '<div  class="test">';
	echo '<div style=" margin-left:160px;">';
	for ($i = 1; $i <= $maxNoOfImage; $i++)
	{
		echo '<div id="picture_'.$i.'_preview" style="text-align:center; padding-left:5px; float:left;">';
		echo '<div id="preview_ie_'.$i.'"></div>';
		echo '<div style="border:1px solid black; width: 138px;">Picture '.$i.'<input class="picture_'.$i.'" type="file" name="picture_'.$i.'" id="picture_'.$i.'" onchange="readURL(this,'.$i.');"/>';
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
	echo '<div id="x">';
	echo '<label>Item Pictures<div id="uploadAmharic">የንብረቱ ፎቶ</div></label>';
	pictureForm();
	if(crypt(300, $hash["300"]) == $hash["300"])
	{
		echo '<div id="myform_errorloc" class="error_strings">'.$image.' exceeds size 5MB</div>';
	}
	if(crypt(301, $hash["301"]) == $hash["301"])
	{
		echo '<div id="myform_errorloc" class="error_strings"> <bold>'.$image.'</bold> is not of type jpeg ,bmp,gif,jpg or png</div>';
	}
	echo ' </div>';

}
?>
