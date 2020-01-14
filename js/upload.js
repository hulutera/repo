$(document).ready(function(){
	$("#Item").change(function(){
		clearError('myform_errorloc');
		$("#carContent").slideUp('fast');
		$("#houseContent").slideUp('fast');
		$("#compContent").slideUp('fast');
		$("#electronicContent").slideUp('fast');
		$("#phoneContent").slideUp('fast');
		$("#householdContent").slideUp('fast');
		$("#othersContent").slideUp('fast');
		$("#uploadImgBox").slideUp('fast');
		$("#priceCommon").slideUp('fast');
		$('input:checkbox').removeAttr('checked');
		$(".c_isAdvanced").slideUp();
		$(".h_isAdvanced").slideUp();
		$(".c_isrent").hide();
		$(".c_issell").hide();
		$(".h_isrent").hide();
		$(".h_issell").hide();
		var selectedValue = $(this).val();		
		switch(selectedValue){
		case 'carClass':
			$("#carContent").slideDown('fast'); 
			$("#uploadImgBox").slideDown('fast');
			//$("#priceCommon").slideUp('fast');
			$('.commonprice').css('border','1px solid #3399FF');
			$('#title').css('border','1px solid #3399FF');
			break;
		case 'computerClass':
			$("#compContent").slideDown('fast');
			$("#uploadImgBox").slideDown('fast');
			$("#priceCommon").slideDown('fast');
			$('.commonprice').css('border','1px solid #3399FF');
			$('#title').css('border','1px solid #3399FF');
			break;
		case 'houseClass':
			$("#houseContent").slideDown('fast');
			$("#uploadImgBox").slideDown('fast');
			//$("#priceCommon").slideUp('fast');
			$('.commonprice').css('border','1px solid #3399FF');
			$('#title').css('border','1px solid #3399FF');
			break;
		case 'electronicsClass'	:
			$("#electronicContent").slideDown('fast');
			$("#uploadImgBox").slideDown('fast');
			$("#priceCommon").slideDown('fast');
			$('.commonprice').css('border','1px solid #3399FF');
			$('#title').css('border','1px solid #3399FF');
			break;
		case 'phoneClass':
			$("#phoneContent").slideDown('fast');
			$("#uploadImgBox").slideDown('fast');
			$("#priceCommon").slideDown('fast');
			$('.commonprice').css('border','1px solid #3399FF');
			$('#title').css('border','1px solid #3399FF');
			break;
		case 'householdClass':
			$("#householdContent").slideDown('fast');
			$("#uploadImgBox").slideDown('fast');
			$("#priceCommon").slideDown('fast');
			$('.commonprice').css('border','1px solid #3399FF');
			$('#title').css('border','1px solid #3399FF');
			break;
		case 'otherClass':
			$("#othersContent").slideDown('fast');
			$("#uploadImgBox").slideDown('fast');
			$("#priceCommon").slideDown('fast');
			$('.commonprice').css('border','1px solid #3399FF');
			$('#title').css('border','1px solid #3399FF');
			break;
		default:
			$('.commonprice').css('border','1px solid #3399FF');
		    $('#title').css('border','1px solid #3399FF');
		break;
		}
	}); 

	/*choosing rent/sell*/
	$("input[type=checkbox]").change(function(){
		var divId = $(this).attr("id");
		if ($(this).is(":checked")){
			switch(divId){
			case 'c_isrent':
				$("." + divId).show(); //show div
				break;
			case 'c_issell':
				$("." + divId).show(); //show div
				break;
			case 'h_isrent':
				$("." + divId).show(); //show div
				break;
			case 'h_issell':
				$("." + divId).show(); //show div
				break;
			default:
				break;
			}
		}else{
			$("." + divId).hide();			
		}
	});
	$("input[type=checkbox]").change(function(){
		var divId = $(this).attr("id");
		if ($(this).is(":checked")){
			switch(divId){
			case 'c_isAdvanced':
				$("." + divId).slideDown(); //show advanced div-car
				break;
			case 'h_isAdvanced':
				$("." + divId).slideDown(); //show advanced div-house
				break;
			default:
				break;
			}
		}else{
			$("." + divId).slideUp();
		}
	});
	/*choose house category*/
	$("#hcategory").change(function(){
		var selectedValue = $(this).val();
		switch(selectedValue){
		case '4':
			$("#lotsize").show();
			$("#metersquare").show();
			$("#condeminiumFloor").hide();
			break;
		case '3':
			$("#lotsize").hide();
			$("#metersquare").hide();
			$("#condeminiumFloor").show();
			break;
		default: 
			$("#lotsize").hide();
		$("#metersquare").hide();
		$("#condeminiumFloor").hide();
		break;
		}
	});
	/*choose computer category*/
	$("#computer").change(function(){
		var selectedValue = $(this).val();
		switch(selectedValue){
		case '1':
			$("#computerBrand").show();
			$("#computeracc").hide();
			$("#computerBrand").slideDown('fast');
			$("#ram").slideDown('fast');
			$("#harddisk").slideDown('fast');
			$("#processor").slideDown('fast');
			$("#OS").slideDown('fast');
		case '2':
			$("#computerBrand").show();
			$("#computeracc").hide();
			$("#computerBrand").slideDown('fast');
			$("#ram").slideDown('fast');
			$("#harddisk").slideDown('fast');
			$("#processor").slideDown('fast');
			$("#OS").slideDown('fast');
		case '3':
			$("#computerBrand").show();
			$("#computeracc").hide();
			$("#computerBrand").slideDown('fast');
			$("#ram").slideDown('fast');
			$("#harddisk").slideDown('fast');
			$("#processor").slideDown('fast');
			$("#OS").slideDown('fast');
			break;
		case '4':
			$("#computeracc").slideDown('fast');
			$("#computerBrand").slideUp('fast');
			$("#ram").slideUp('fast');
			$("#harddisk").slideUp('fast');
			$("#processor").slideUp('fast');
			$("#OS").slideUp('fast');
			break;
		default:
			$("#computeracc").slideUp('fast');
		$("#computerBrand").slideUp('fast');
		break;
		}
	});	
	/*choose color*/
	$("#ccolor").change(function(){
		var selectedValue = $(this).val();
		if(selectedValue!=='999'){
			$('#colorz').show();
			$('#colorz').css({'background-color':selectedValue});
		}else{
			$('#colorz').hide();
		}
	});

	/*Displaying the selection list for Addis Ababa subcity*/

	$("#city").change(function(){
	var selectedval = $(this).val();
	if(selectedval == 'Addis Ababa')$("#subcity").slideDown('fast');
	else $("#subcity").slideUp('fast');
	});
	

});





function validateForm()
{
	var item = document.getElementById('Item').value;
	switch (item){
	case '000':
		clearError('myform_errorloc');
		$(document).ready(function (){
			$('#commonprice').css('border','1px solid #3399FF');
			$('#title').css('border','1px solid #3399FF');
		});
		var error_msg_item = "Please choose Item type<br>የንብረት ዓይነት መምረጥ ረስተዋል <br><br>";
		$( '#myform_errorloc').append( '<li>'+error_msg_item+'</li>');
		return false;
		break;
	case 'phoneClass':
	case 'computerClass':
	case 'electronicsClass': 
	case 'householdClass': 
	case 'otherClass':
		clearError('myform_errorloc');
		var pcommon = document.getElementById('commonprice').value;
		var item_title = document.getElementById('title').value;
		var price_msg = "Please enter price<br>የመሸጫ ዋጋ ማስገባት ረስተዋል <br><br>";
		var title_msg = "Please enter your Title<br>ርዕስ ማስገባት ረስተዋል <br><br>";
		var pcommon_bool=  (pcommon=="" || pcommon==null)?true:false;
		var item_bool = (item_title=="")?true:false;
		if (!pcommon_bool & !item_bool)
		{
			return true;
		}else if(pcommon_bool & !item_bool){
			clearError('myform_errorloc');
			$(document).ready(function (){
				$('#title').css('border','1px solid #3399FF');
				$('#commonprice').css('border','1px solid #D8000C');
				$( '#myform_errorloc').append( '<li>'+price_msg+'</li>');
			});
			return false;
		}else if(!pcommon_bool & item_bool){
			clearError('myform_errorloc');
			$(document).ready(function (){
				$('#title').css('border','1px solid #D8000C');
				$('#commonprice').css('border','1px solid #3399FF');
				$( '#myform_errorloc').append( '<li>'+title_msg+'</li>');
			});
			return false;
		}else{
			clearError('myform_errorloc');
			$(document).ready(function (){
				$('#commonprice').css('border','1px solid #D8000C');
				$('#title').css('border','1px solid #D8000C');
				$( '#myform_errorloc').append( '<li>'+price_msg+'</li>');
				$( '#myform_errorloc').append( '<li>'+title_msg+'</li>');				
			});
			return false;
		}
		break;
	case 'carClass':
		clearError('myform_errorloc');
		var rent_chkb= document.getElementById('c_isrent').checked?true:false;
		var sell_chkb= document.getElementById('c_issell').checked?true:false;
		var nego_cbkb= document.getElementById('c_isnego').checked?true:false;
		var rent_msg = "Please Rent enter price<br>የኪራይ ዋጋ ማስገባት ረስተዋል <br><br>";
		var rent_rate_msg = "Please enter Rent rate<br>የኪራይ እግድ መምረጥ ረስተዋል <br><br>";
		if(rent_chkb || sell_chkb || nego_cbkb){

			//validate sell and Rent
			if(rent_chkb && sell_chkb){		
				clearError('myform_errorloc');
				var prent = document.getElementById('c_rent_amt_input').value;
				var rent_rate = document.getElementById('c_rate_select').value;
				var rent_amnt_bool= (prent=="" || prent==null) ? true :false;
				var rent_rate_bool =  rent_rate=='000'?true:false;
				var psell = document.getElementById('c_sell_amt_input').value;
				var sell_amnt_bool= (psell=="" || psell==null) ? true :false;
				var sell_msg = "Please enter price<br>የመሸጫ ዋጋ ማስገባት ረስተዋል <br><br>";
				if(!rent_amnt_bool && !rent_rate_bool &&!sell_amnt_bool){ //fff, no validation needed
					clearError('myform_errorloc')
					return true;
				}else if (rent_amnt_bool && !rent_rate_bool && sell_amnt_bool){//tft
					clearError('myform_errorloc')
					$(document).ready(function (){
						$('#c_rate_select').css('border','1px solid #3399FF');
						$('#c_sell_amt_input').css('border','1px solid #D8000C');
						$('#c_rent_amt_input').css('border','1px solid #D8000C');
						$( '#myform_errorloc').append( '<li>'+rent_msg+'</li>');
						$( '#myform_errorloc').append( '<li>'+sell_msg+'</li>');
					});
					return false;
				}else if(rent_amnt_bool && !rent_rate_bool && !sell_amnt_bool){//tff
					clearError('myform_errorloc')
					$(document).ready(function (){
						$('#c_rent_amt_input').css('border','1px solid #D8000C');
						$('#c_sell_amt_input').css('border','1px solid #3399FF');
						$('#c_rate_select').css('border','1px solid #3399FF');
						$('#myform_errorloc').append( '<li>'+rent_msg+'</li>');

					});
					return false;
				}else if(!rent_amnt_bool && !rent_rate_bool && sell_amnt_bool){//fft
					clearError('myform_errorloc')
					$(document).ready(function (){
						$('#c_rent_amt_input').css('border','1px solid #3399FF');
						$('#c_rate_select').css('border','1px solid #3399FF');
						$('#c_sell_amt_input').css('border','1px solid #D8000C');
						$( '#myform_errorloc').append( '<li>'+sell_msg+'</li>');
					});
					return false;
				}else if(!rent_amnt_bool && rent_rate_bool && sell_amnt_bool){//ftt
					clearError('myform_errorloc')
					$(document).ready(function (){
						$('#c_rent_amt_input').css('border','1px solid #3399FF');
						$('#c_rate_select').css('border','1px solid #D8000C');
						$('#c_sell_amt_input').css('border','1px solid #D8000C');
						$( '#myform_errorloc').append( '<li>'+rent_rate_msg+'</li>');
						$( '#myform_errorloc').append( '<li>'+sell_msg+'</li>');
					});
					return false;
				}else if(!rent_amnt_bool && rent_rate_bool && !sell_amnt_bool){ //ftf
					clearError('myform_errorloc')
					$(document).ready(function (){
						$('#c_rent_amt_input').css('border','1px solid #3399FF');
						$('#c_rate_select').css('border','1px solid #D8000C');
						$('#c_sell_amt_input').css('border','1px solid #3399FF');
						$( '#myform_errorloc').append( '<li>'+rent_rate_msg+'</li>');
					});
					return false;
				}else if(rent_amnt_bool && rent_rate_bool && !sell_amnt_bool){ //ttf
					clearError('myform_errorloc')
					$(document).ready(function (){
						$('#c_rent_amt_input').css('border','1px solid #D8000C');
						$('#c_rate_select').css('border','1px solid #D8000C');
						$('#c_sell_amt_input').css('border','1px solid #3399FF');
						$( '#myform_errorloc').append( '<li>'+rent_msg+'</li>');
						$( '#myform_errorloc').append( '<li>'+rent_rate_msg+'</li>');
					});
					return false;
				}else if(rent_amnt_bool && rent_rate_bool && sell_amnt_bool){ //ttt, all need validation
					clearError('myform_errorloc')
					$(document).ready(function (){
						$('#c_rate_select').css('border','1px solid #D8000C');
						$('#c_rent_amt_input').css('border','1px solid #D8000C');
						$('#c_sell_amt_input').css('border','1px solid #D8000C');
						$( '#myform_errorloc').append( '<li>'+rent_msg+'</li>');
						$( '#myform_errorloc').append( '<li>'+rent_rate_msg+'</li>');
						$( '#myform_errorloc').append( '<li>'+sell_msg+'</li>');
					});
					return false;
				}

			}
			//validate sell only
			if(!rent_chkb && sell_chkb){

				clearError('myform_errorloc');
				var psell = document.getElementById('c_sell_amt_input').value;
				var sell_amnt_bool= (psell=="" || psell==null) ? true :false;
				var sell_msg = "Please enter price<br>የመሸጫ ዋጋ ማስገባት ረስተዋል <br><br>";
				if(sell_amnt_bool){
					$(document).ready(function (){
						$('#c_sell_amt_input').css('border','1px solid #D8000C');
						$( '#myform_errorloc').append( '<li>'+sell_msg+'</li>');
					});
					return false;		
				}else{
					return true;
				}
			}
			//validate rent only
			if(rent_chkb && !sell_chkb){		
				clearError('myform_errorloc');
				var prent = document.getElementById('c_rent_amt_input').value;
				var rent_rate = document.getElementById('c_rate_select').value;
				var rent_amnt_bool= (prent=="" || prent==null) ? true :false;
				var rent_rate_bool =  rent_rate=='000'?true:false;

				if(!rent_amnt_bool && !rent_rate_bool){ //fff, no validation needed
					clearError('myform_errorloc')
					return true;
				}else if (rent_amnt_bool && !rent_rate_bool){//tf
					clearError('myform_errorloc')
					$(document).ready(function (){
						$('#c_rate_select').css('border','1px solid #3399FF');
						$('#c_rent_amt_input').css('border','1px solid #D8000C');
						$( '#myform_errorloc').append( '<li>'+rent_msg+'</li>');
					});
					return false;
				}else if(!rent_amnt_bool && rent_rate_bool){//ft
					clearError('myform_errorloc')
					$(document).ready(function (){
						$('#c_rent_amt_input').css('border','1px solid #3399FF');
						$('#c_rate_select').css('border','1px solid #D8000C');
						$( '#myform_errorloc').append( '<li>'+rent_rate_msg+'</li>');						
					});
					return false;
				}else if(rent_amnt_bool && rent_rate_bool){//ftt
					clearError('myform_errorloc')
					$(document).ready(function (){
						$('#c_rent_amt_input').css('border','1px solid #D8000C');
						$('#c_rate_select').css('border','1px solid #D8000C');
						$( '#myform_errorloc').append( '<li>'+rent_msg+'</li>');
						$( '#myform_errorloc').append( '<li>'+rent_rate_msg+'</li>');
					});
					return false;
				}
			}
		}else{
			clearError('myform_errorloc');
			var chk_msg = "Please Select at least 1 option for Price (Rent,sell or Negotiable) <br>" +
			" ቢያንስ አንድ የመሸጫ መንገድ ይምረጡ (ከሚከተሉት ኪራይ፣ ሽያጭ ወይም በዋጋው እንስማማለን) <br> ";
			$( '#myform_errorloc').append( '<li>'+chk_msg+'</li>');
			return false;
		}
		break;
	case 'houseClass':
		clearError('myform_errorloc');
		var rent_chkb= document.getElementById('h_isrent').checked?true:false;
		var sell_chkb= document.getElementById('h_issell').checked?true:false;
		var nego_cbkb= document.getElementById('h_isnego').checked?true:false;
		var rent_msg = "Please Rent enter price<br>የኪራይ ዋጋ ማስገባት ረስተዋል <br><br>";
		var rent_rate_msg = "Please enter Rent rate<br>የኪራይ እግድ መምረጥ ረስተዋል <br><br>";
		if(rent_chkb || sell_chkb || nego_cbkb){

			//validate sell and Rent
			if(rent_chkb && sell_chkb){		
				clearError('myform_errorloc');
				var prent = document.getElementById('h_rent_amt_input').value;
				var rent_rate = document.getElementById('h_rate_select').value;
				var rent_amnt_bool= (prent=="" || prent==null) ? true :false;
				var rent_rate_bool =  rent_rate=='000'?true:false;
				var psell = document.getElementById('h_sell_amt_input').value;
				var sell_amnt_bool= (psell=="" || psell==null) ? true :false;
				var sell_msg = "Please enter price<br>የመሸጫ ዋጋ ማስገባት ረስተዋል <br><br>";
				if(!rent_amnt_bool && !rent_rate_bool &&!sell_amnt_bool){ //fff, no validation needed
					clearError('myform_errorloc')
					return true;
				}else if (rent_amnt_bool && !rent_rate_bool && sell_amnt_bool){//tft
					clearError('myform_errorloc')
					$(document).ready(function (){
						$('#h_rate_select').css('border','1px solid #3399FF');
						$('#h_sell_amt_input').css('border','1px solid #D8000C');
						$('#h_rent_amt_input').css('border','1px solid #D8000C');
						$( '#myform_errorloc').append( '<li>'+rent_msg+'</li>');
						$( '#myform_errorloc').append( '<li>'+sell_msg+'</li>');
					});
					return false;
				}else if(rent_amnt_bool && !rent_rate_bool && !sell_amnt_bool){//tff
					clearError('myform_errorloc')
					$(document).ready(function (){
						$('#h_rent_amt_input').css('border','1px solid #D8000C');
						$('#h_sell_amt_input').css('border','1px solid #3399FF');
						$('#h_rate_select').css('border','1px solid #3399FF');
						$( '#myform_errorloc').append( '<li>'+rent_msg+'</li>');

					});
					return false;
				}else if(!rent_amnt_bool && !rent_rate_bool && sell_amnt_bool){//fft
					clearError('myform_errorloc')
					$(document).ready(function (){
						$('#h_rent_amt_input').css('border','1px solid #3399FF');
						$('#h_rate_select').css('border','1px solid #3399FF');
						$('#h_sell_amt_input').css('border','1px solid #D8000C');
						$( '#myform_errorloc').append( '<li>'+sell_msg+'</li>');
					});
					return false;
				}else if(!rent_amnt_bool && rent_rate_bool && sell_amnt_bool){//ftt
					clearError('myform_errorloc')
					$(document).ready(function (){
						$('#h_rent_amt_input').css('border','1px solid #3399FF');
						$('#h_rate_select').css('border','1px solid #D8000C');
						$('#h_sell_amt_input').css('border','1px solid #D8000C');
						$( '#myform_errorloc').append( '<li>'+rent_rate_msg+'</li>');
						$( '#myform_errorloc').append( '<li>'+sell_msg+'</li>');
					});
					return false;
				}else if(!rent_amnt_bool && rent_rate_bool && !sell_amnt_bool){ //ftf
					clearError('myform_errorloc')
					$(document).ready(function (){
						$('#h_rent_amt_input').css('border','1px solid #3399FF');
						$('#h_rate_select').css('border','1px solid #D8000C');
						$('#h_sell_amt_input').css('border','1px solid #3399FF');
						$( '#myform_errorloc').append( '<li>'+rent_rate_msg+'</li>');
					});
					return false;
				}else if(rent_amnt_bool && rent_rate_bool && !sell_amnt_bool){ //ttf
					clearError('myform_errorloc')
					$(document).ready(function (){
						$('#h_rent_amt_input').css('border','1px solid #D8000C');
						$('#h_rate_select').css('border','1px solid #D8000C');
						$('#h_sell_amt_input').css('border','1px solid #3399FF');
						$( '#myform_errorloc').append( '<li>'+rent_msg+'</li>');
						$( '#myform_errorloc').append( '<li>'+rent_rate_msg+'</li>');
					});
					return false;
				}else if(rent_amnt_bool && rent_rate_bool && sell_amnt_bool){ //ttt, all need validation
					clearError('myform_errorloc')
					$(document).ready(function (){
						$('#h_rate_select').css('border','1px solid #D8000C');
						$('#h_rent_amt_input').css('border','1px solid #D8000C');
						$('#h_sell_amt_input').css('border','1px solid #D8000C');
						$( '#myform_errorloc').append( '<li>'+rent_msg+'</li>');
						$( '#myform_errorloc').append( '<li>'+rent_rate_msg+'</li>');
						$( '#myform_errorloc').append( '<li>'+sell_msg+'</li>');
					});
					return false;
				}

			}
			//validate sell only
			if(!rent_chkb && sell_chkb){

				clearError('myform_errorloc');
				var psell = document.getElementById('h_sell_amt_input').value;
				var sell_amnt_bool= (psell=="" || psell==null) ? true :false;
				var sell_msg = "Please enter price<br>የመሸጫ ዋጋ ማስገባት ረስተዋል <br><br>";
				if(sell_amnt_bool){
					$(document).ready(function (){
						$('#h_sell_amt_input').css('border','1px solid #D8000C');
						$( '#myform_errorloc').append( '<li>'+sell_msg+'</li>');
					});
					return false;		
				}else{
					return true;
				}
			}
			//validate rent only
			if(rent_chkb && !sell_chkb){		
				clearError('myform_errorloc');
				var prent = document.getElementById('h_rent_amt_input').value;
				var rent_rate = document.getElementById('h_rate_select').value;
				var rent_amnt_bool= (prent=="" || prent==null) ? true :false;
				var rent_rate_bool =  rent_rate=='000'?true:false;

				if(!rent_amnt_bool && !rent_rate_bool){ //fff, no validation needed
					clearError('myform_errorloc')
					return true;
				}else if (rent_amnt_bool && !rent_rate_bool){//tf
					clearError('myform_errorloc')
					$(document).ready(function (){
						$('#h_rate_select').css('border','1px solid #3399FF');
						$('#h_rent_amt_input').css('border','1px solid #D8000C');
						$( '#myform_errorloc').append( '<li>'+rent_msg+'</li>');
					});
					return false;
				}else if(!rent_amnt_bool && rent_rate_bool){//ft
					clearError('myform_errorloc')
					$(document).ready(function (){
						$('#h_rent_amt_input').css('border','1px solid #3399FF');
						$('#h_rate_select').css('border','1px solid #D8000C');
						$( '#myform_errorloc').append( '<li>'+rent_rate_msg+'</li>');						
					});
					return false;
				}else if(rent_amnt_bool && rent_rate_bool){//ftt
					clearError('myform_errorloc')
					$(document).ready(function (){
						$('#h_rent_amt_input').css('border','1px solid #D8000C');
						$('#h_rate_select').css('border','1px solid #D8000C');
						$( '#myform_errorloc').append( '<li>'+rent_msg+'</li>');
						$( '#myform_errorloc').append( '<li>'+rent_rate_msg+'</li>');
					});
					return false;
				}
			}
		}else{
			clearError('myform_errorloc');
			var chk_msg = "Please Select at least 1 option for Price (Rent,sell or Negotiable) <br>" +
			" ቢያንስ አንድ የመሸጫ መንገድ ይምረጡ (ከሚከተሉት ኪራይ፣ ሽያጭ ወይም በዋጋው እንስማማለን) <br> ";
			$( '#myform_errorloc').append( '<li>'+chk_msg+'</li>');
			return false;
		}
		break;
	default:
		break;		
	}
	return true;
}

function clearError(elementID)
{
	document.getElementById(elementID).innerHTML = "";
}
