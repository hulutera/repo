/***********************************************************
 * editProfile.jss*/
/* javascript for editing profile 
 * Author: Abiy Terefe
 * */
/*to highlight selected list*/
$('.LeftNav li a').live('click', function() {
	$('.LeftNav li a').removeClass("selected");
	$(this).addClass("selected");
	return false;
});
/*
 * to show class overview form only*/
function showSection(showDiv)
{
	var showthis = showDiv;
	$(document).ready(function(){
		$('.eName').slideUp('fast');
		$('.ePass').slideUp('fast');
		$('.ePInfo').slideUp('fast');
		$('.eCMthd').slideUp('fast');
		$('.eCloseAcc').slideUp('fast');
		$('.overview').slideUp('fast');	
		switch(showthis)
		{
		case 100:
			$('.eName').slideDown('fast');
			break;
		case 200:
			$('.ePass').slideDown('fast');
			break;
		case 300:
			$('.ePInfo').slideDown('fast');
			break;
		case 400:
			$('.eCMthd').slideDown('fast');
			break;
		case 500:
			$('.eCloseAcc').slideDown('fast');
			break;
		default:
			$('.overview').slideDown('fast')
			break;
		}
	});
}
/*********************************************
 * hejp.js*/
$(document).ready(function(){
	$('#help > li > a').click(function(){
		$(this).next('#help li ul').slideToggle("fast")
		.siblings('#help li ul:visible').slideUp("fast");
		$(this).toggleClass("active");
		$(this).siblings('#help li ul').removeClass("active");
	});

	$('#menu_1 > li > a').click(function(){
		$(this).next('#menu_1 li ul').slideToggle("fast")
		.siblings('#menu_1 li ul:visible').slideUp("fast");
		$(this).toggleClass("active");
		$(this).siblings('#menu_1 li ul').removeClass("active");
	});	

});
function amharicJs(){
	$(document).ready(function(){
		$('.helpAmharic').show();
		$('.helpEnglish').hide();
	});

}
function englishJs(){
	$(document).ready(function(){
		$('.helpAmharic').hide();
		$('.helpEnglish').show();
	});
}
function amharicAboutUs(){
	$(document).ready(function(){
		$('#aboutUsAmharic').show();
		$('#aboutUsEnglish').hide();
	});

}
function englishAboutUs(){
	$(document).ready(function(){
		$('#aboutUsAmharic').hide();
		$('#aboutUsEnglish').show();
	});
}
function amharicTerms(){

	$(document).ready(function(){
		$('#termsDivEnglish').hide();
		$('#termsDivAmharic').show();
	});

}

function englishTerms(){

	$(document).ready(function(){
		$('#termsDivEnglish').show();
		$('#termsDivAmharic').hide();
	});

}

function amharicPrivacyPo(){

	$(document).ready(function(){
		$('#privacyPolicyEnglish').hide();
		$('#privacyPolicyAmharic').show();
	});

}

function englishPrivacyPo(){

	$(document).ready(function(){
		$('#privacyPolicyEnglish').show();
		$('#privacyPolicyAmharic').hide();
	});

}
/******************************************************
 * imageSlider.js*/
/* This changes the thumbnail image to be a bigger img*/
function imgnumber(imgDirectory, imgName, itemid, itemtype)
{
	document.getElementById("largeImg"+itemtype+itemid).src= imgDirectory+imgName;
}

/* This inserts images from the file on the thumbnail position */
function insertimg(imgDirectory,itemid,itemType,pic_1)
{
	var array = pic_1.split(',')
	for(var i = 0; i < array.length; i++)
	{
		j= i + 1;
		document.getElementById("bottomimg"+itemType+itemid+j).src = imgDirectory+array[i];
	}	
}
/*******************************************************/
$(document).ready(function(){
	var fileName, fileExt;
	// valid image extensions
	var validImageExtensions = ["gif","jpeg","jpg","png","bmp"];

	// to check image extension is valid , return true if found
	function checkImageExtenstion(fileExt)
	{
		fileExt = fileExt.toLowerCase();
		var isfileExtValid = false;

		for (var j = 0; j < validImageExtensions.length; j++) 
		{
			if(fileExt == validImageExtensions[j])
			{
				isfileExtValid = true;
				break;		
			}
		}
		if (!isfileExtValid) 
		{            
			return false;
		}
		return true;
	}
//	for(var x = 0;x<=5;x++)
//	{
//	$('#input'+x).change(function(){
//	fileName = $('#input1'+x).val().replace(/.+[\\\/]/, "");
//	fileExt = fileName.substring(fileName.lastIndexOf('.') + 1);
//	if(checkImageExtenstion(fileExt))
//	{
//	//insert file name in imgName1
//	$('#imgName'+x).text(fileName);
//	$('#img'+x).show();
//	freeSlot[x-1]=x;
//	inputFlag = 0;
//	showInput();               
//	$('#input'+x).hide(); 
//	}
//	else
//	{
//	alert("Sorry, " + fileName + " is invalid, allowed extensions are: " + validImageExtensions.join(", "));
//	input1.focus()
//	}
//	});
//	}
	$('#input1').change(function(){
		fileName = $("#input1").val().replace(/.+[\\\/]/, "");
		fileExt = fileName.substring(fileName.lastIndexOf('.') + 1);
		if(checkImageExtenstion(fileExt))
		{
			$("#imgName1").text(fileName);
			$('#img1').show();
			freeSlot[0]=1;
			inputFlag = 0;
			showInput();               
			$('#input1').hide(); 
		}
		else
		{
			alert("Sorry, " + fileName + " is invalid, allowed extensions are: " + validImageExtensions.join(", "));
			input1.focus()
		}
	});

	$('#input2').change(function(){
		fileName = $("#input2").val().replace(/.+[\\\/]/, "");
		fileExt = fileName.substring(fileName.lastIndexOf('.') + 1);
		if(checkImageExtenstion(fileExt))
		{
			$("#imgName2").text(fileName);
			$('#img2').show();
			freeSlot[1]=1;
			inputFlag = 0;
			showInput();
			$('#input2').hide();
		}
		else
		{
			alert("Sorry, " + fileName + " is invalid, allowed extensions are: " + validImageExtensions.join(", "));
			input2.focus()
		}
	});
	$('#input3').change(function(){
		fileName = $("#input3").val().replace(/.+[\\\/]/, "");        
		fileExt = fileName.substring(fileName.lastIndexOf('.') + 1);
		if(checkImageExtenstion(fileExt))
		{
			$("#imgName3").text(fileName);
			$('#img3').show();
			freeSlot[2]=1;
			inputFlag = 0;
			showInput();
			$('#input3').hide();
		}
		else{
			alert("Sorry, " + fileName + " is invalid, allowed extensions are: " + validImageExtensions.join(", "));
			input3.focus()
		}
	});
	$('#input4').change(function(){
		fileName = $("#input4").val().replace(/.+[\\\/]/, "");
		fileExt = fileName.substring(fileName.lastIndexOf('.') + 1);
		if(checkImageExtenstion(fileExt))
		{
			$("#imgName4").text(fileName);
			$('#img4').show();
			freeSlot[3]=1;
			inputFlag = 0;
			showInput();
			$('#input4').hide();
		}
		else
		{
			alert("Sorry, " + fileName + " is invalid, allowed extensions are: " + validImageExtensions.join(", "));
			input4.focus();
		}
	}); 
	$('#input5').change(function(){
		fileName = $("#input5").val().replace(/.+[\\\/]/, "");
		fileExt = fileName.substring(fileName.lastIndexOf('.') + 1);
		if(checkImageExtenstion(fileExt))
		{
			$("#imgName5").text(fileName);
			$('#img5').show();
			freeSlot[4]=1;
			inputFlag = 0;
			showInput();
			$('#input5').hide();
		}
		else
		{
			alert("Sorry, " + fileName + " is invalid, allowed extensions are: " + validImageExtensions.join(", "));
			input5.focus();
		}

	});
	$('#deleteBtn1').click(function(){
		$('#input1').val('');
		$('#img1').hide();               
		freeSlot[0]=0;
		showInput();
	});
	$('#deleteBtn2').click(function(){
		$('#input2').val('');
		$('#img2').hide();
		freeSlot[1]=0;
		showInput();
	});
	$('#deleteBtn3').click(function(){
		$('#input3').val('');
		$('#img3').hide();
		freeSlot[2]=0;
		showInput();
	});
	$('#deleteBtn4').click(function(){
		$('#input4').val('');
		$('#img4').hide();
		freeSlot[3]=0;
		showInput();
	});
	$('#deleteBtn5').click(function(){
		$('#input5').val('');
		$('#img5').hide();
		freeSlot[4]=0;
		showInput();
	});
	$('#submitBtn').click(function(){
		if(freeSlot[0]==0){
			$('#input1').attr('disabled','');
		}
		if(freeSlot[1]==0){
			$('#input2').attr('disabled','');
		}
		if(freeSlot[2]==0){
			$('#input3').attr('disabled','');
		}
		if(freeSlot[3]==0){
			$('#input4').attr('disabled','');
		}
		if(freeSlot[4]==0){
			$('#input5').attr('disabled','');
		}    
	});
});
/*********************************************************
 * login.js*/
$(document).ready(function() {
	$('.tabs li a [id^="active"]').click(function(){
		$(this).css('background-color',"#ccc")
	})
	$('a.login-window').click(function() {

		//Getting the variable's value from a link 
		var loginBox = $(this).attr('href');

		//Fade in the Popup
		$(loginBox).fadeIn(300);

		//Set the center alignment padding + border see css style
		var popMargTop = ($(loginBox).height() + 24) / 2; 
		var popMargLeft = ($(loginBox).width() + 24) / 2; 

		$(loginBox).css({ 
			'margin-top' : -popMargTop,
			'margin-left' : -popMargLeft
		});

		// Add the mask to body
		$('body').append('<div id="mask"></div>');
		$('#mask').fadeIn(300);

		return false;
	});
	/*-----------------------------*/
	$('a.tou-window').click(function() {

		//Getting the variable's value from a link 
		var touBox = $(this).attr('href');

		//Fade in the Popup
		$(touBox).fadeIn(300);

		//Set the center alignment padding + border see css style
		var popMargTop = ($(touBox).height()) / 2; 
		var popMargLeft = ($(touBox).width()) / 2; 

		$(touBox).css({ 
			'margin-top' : -popMargTop,
			'margin-left' : -popMargLeft
		});

		// Add the mask to body
		$('body').append('<div id="mask"></div>');
		$('#mask').fadeIn(300);

		return false;
	});
	/*-----------------------------*/
	$('a.private-window').click(function() {

		//Getting the variable's value from a link 
		var privateBox = $(this).attr('href');

		//Fade in the Popup
		$(privateBox).fadeIn(300);

		//Set the center alignment padding + border see css style
		var popMargTop = ($(privateBox).height()) / 2; 
		var popMargLeft = ($(privateBox).width()) / 2; 

		$(privateBox).css({ 
			'margin-top' : -popMargTop,
			'margin-left' : -popMargLeft
		});

		// Add the mask to body
		$('body').append('<div id="mask"></div>');
		$('#mask').fadeIn(300);

		return false;
	});
	// When clicking on the button close or the mask layer the popup closed
	$('a.close, #mask').live('click', function() { 
		$('#mask , .login-popup').fadeOut(300 , function() {
			$('#mask').remove();  
		}); 
		$('#mask , .tou-popup').fadeOut(300 , function() {
			$('#mask').remove();  
		});
		$('#mask , .private-popup').fadeOut(300 , function() {
			$('#mask').remove();  
		});

		return false;
	});

});
/*********************************************************
 * message.js*/
/*this displays the message show div*/
function showMsgBox(id,action)
{       
	$(document).ready(function (){
		$("#msgbox"+id).show();
		$("#innermsgbox"+id).show();  
		$("#divListbox"+id).hide();
		$("#nameColumn"+id).css("font-weight", "normal" );
		$("#subjectColumn"+id).css("font-weight", "normal");
		$.ajax({
			url:'/helper/actionOnMessage.php?idArray='+id+'&action='+action,
			method:"GET"
		});
	}); 
	return false;
}
/*closes the #messageshow div*/
function closeMsgBox(id)
{    
	$(document).ready(function (){
		$("#msgbox"+id).hide();
		$("#innermsgbox"+id).hide();  
		$("#divListbox"+id).show();
		$("#txtMsgSent"+id).hide();
	}); 
	return false;
}

/*displays the reply box*/
function showReplyBox(id)
{
	$(document).ready(function (){
		$("#innerreplybox"+id).show();  
		$("#msgReplyClose"+id).hide();
	}); 
	return false;
}
/*closes the reply box*/
function closeReplyBox(id)
{
	$(document).ready(function (){
		$("#innerreplybox"+id).hide();  
		$("#msgReplyClose"+id).show();
	}); 
	return false;	
}
/*sending a message to the sender*/
function sendReplyMsg(useremail,youremail,id)
{
	$(document).ready(function(){
		var msg = "";
		msg = $("#replyMsg"+id).val();
		if(msg == '')
		{
			alert("Please enter a message.");
		}
		else
		{
			$('#innerreplybox'+id).hide();  
			$('#msgReplyClose'+id).show();
			$('#txtMsgSent'+id).show();	
			$.ajax({
				url:'/helper/actionOnMessage.php?msg='+msg+'&useremail='+useremail+'&youremail='+youremail+'&action=reply',
				method:"GET"

			});
			return false;
		}
	});
}
/*message action*/
function msgActions(action)
{

	var stringArray ="";
	$(document).ready(function(){
		$("#topButtons").hide();
		$("#nextopButtons").show();
		stringArray = checkboxArray.join(",");
		$.ajax({
			url:'/helper/actionOnMessage.php?idArray='+stringArray+'&action='+action,
			method:"GET",

			/*! it sends the number of message to myaccount which was returned from the above file 
			 * On Delete: we hide the message div from the message list 
			 * On Follow: We show the follow sign
			 * On Unfollow: We hide the follow sign 
			 * */

			success: function(data){ $('#msgNumb').html(data); }
		}); 
		$("input:checkbox").each(function(index){
			if($(this).is(":checked") == true)
			{
				var id = $(this).val();
				switch (action)
				{
				case 'delete':
					$("#divListbox"+id).hide();
					break;
				case 'follow':
					$("#followSign"+id).show();
					break;
				case 'unfollow':
					$("#followSign"+id).hide();
					break;
				}	     
			}
		});
	});
	$("input:checkbox").attr("checked",false);
}
/* read, follow, unread or all*/
function messagetype(mailtype)
{
	$(document).ready(function (){
		$.ajax({
			url:'../helper/message.php?mail_type='+mailtype,
			method:"GET",
			success: function(data){ $('#mainColumn').html(data); }
		});    
	});
}
/***********************************************************
 * moderatorActions.js*/
function func_moderatorActions(actionType, itemtype, itemid, time,user,link){
	$(document).ready(function (){
		$('.thumblist_'+itemtype+itemid).hide();
		$.ajax({
			url:'/helper/moderatorActions.php?actionType='+actionType+'&itemtype='+itemtype+'&itemid='+itemid+'&time='+time+'&user='+user+'&link='+link,
			method:"GET",
			success: function(data){ $('#'+link).html(data); } 
		});    
	}); 
}

function func_moderatorShow(actionType, itemtype, itemid){
	$(document).ready(function (){
		$.ajax({
			url:'/helper/moderatorActions.php?actionType='+actionType+'&itemtype='+itemtype+'&itemid='+itemid,
			method:"GET",
			success: function(data){ alert(data); }
		});    
	}); 
}
/***********************************************************
 * swap.js*/
function swap(itemId, itemType){
	$(document).ready(function (){
		$('.thumblist_'+itemType+itemId).slideUp('fast');
		$('#divDetail_'+itemType+itemId).slideDown('fast');
	}); 
}

function swapback(itemId,itemType){
	$(document).ready(function (){
		$('.thumblist_'+itemType+itemId).slideDown('fast');
		$('#divDetail_'+itemType+itemId).slideUp('fast');
	});
}

function swapmail(itemId, itemType){
	$(document).ready(function (){
		$('.message_'+itemType+itemId).slideDown('fast'); 
		$('.contact_'+itemType+itemId).slideUp('fast');
		$('.showbutton_hide').slideUp('fast');
	});
}

function closeMsgbox(itemId, itemType){
	$(document).ready(function (){
		$('.message_'+itemType+itemId).slideUp('fast'); 
		$('.contact_'+itemType+itemId).slideDown('fast');
		$('.showbutton_hide').slideDown('fast');
		$('.error_1'+itemType+itemId).slideUp('fast');
		$('.error_2'+itemType+itemId).slideUp('fast');
		$('#name_'+itemType+itemId).removeAttr('style');
		$('#email_'+itemType+itemId).removeAttr('style');
		$('#description_'+itemType+itemId).removeAttr('style');
	});
}

function validateEmail(email){
	var atpos=email.indexOf("@");
	var dotpos=email.lastIndexOf(".");
	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length)
	{
		return false;
	}
	return true;
}

function swapmailback(itemId,uemail,itemType){
	$(document).ready(function (){
		var form = $('#msgcontainer');
		var name = $('#name_'+itemType+itemId).val();
		var email = $('#email_'+itemType+itemId).val();
		var msg = $('#description_'+itemType+itemId).val();

		if(name==='' && email==='' && msg==='')
		{
			var errmsg1 = "You forgort to enter your name, email address and Message." +
			" ስም ፣የኢሜይል አድራሻ እና መልዕክት ማስገባት ረስተዋል።";
			$('.error_1'+itemType+itemId)
			.slideDown('fast')
			.replaceWith('<div style="background-color: #FFBABA; color: #D8000C;"class="error_1'+itemType+itemId+'">'+errmsg1+'</div>');
			$('#name_'+itemType+itemId).css('border','1px solid #D8000C');
			$('#email_'+itemType+itemId).css('border','1px solid #D8000C');
			$('#description_'+itemType+itemId).css('border','1px solid #D8000C');

		}
		else if(validateEmail(email))
		{
			$('.error_1'+itemType+itemId).slideUp('fast');
			$('.message_'+itemType+itemId).slideUp('fast'); 
			$('.sent_'+itemType+itemId).slideDown('fast'); 
			$.ajax({
				url:'/helper/sendMessage.php?itemid='+itemId+'&name='+name+'&email='+email+'&msg='+msg+'&uemail='+uemail+'&itemtype='+itemType,
				method:"GET",	
				success: function(data){ 
				}
			}); 
			$('#name_'+itemType+itemId).val('');
			$('#email_'+itemType+itemId).val('');
			$('#description_'+itemType+itemId).val('');
			$('.error_2'+itemType+itemId).slideUp('fast');
		}else{
			var errmsg2 = "Please Enter a valid email address.የኢሜይል አድራሻ  ማስገባት ረስተዋል።";
			$('.error_1'+itemType+itemId).slideUp('fast');
			$('.error_2'+itemType+itemId)
			.slideDown('fast')
			.replaceWith('<div style="background-color:#FFBABA; color: #D8000C;"class="error_2'+itemType+itemId+'">'+errmsg2+'</div>');
			$('#name_'+itemType+itemId).css('border','1px solid #4F8A10');
			$('#email_'+itemType+itemId).css({'background-color':'#FFBABA' ,'border':'1px solid #D8000C'});
			$('#description_'+itemType+itemId).css('border','1px solid #4F8A10');
		}

	});
}

function swapmailclose(itemId,itemType){
	$(document).ready(function (){
		$('.message_'+itemType+itemId).slideUp('fast'); 
		$('.sent_'+itemType+itemId).slideUp('fast'); 
		$('.contact_'+itemType+itemId).slideDown('fast');
		$('.showbutton_hide').slideDown('fast');
		$('#name_'+itemType+itemId).removeAttr('style');
		$('#email_'+itemType+itemId).removeAttr('style');
		$('#description_'+itemType+itemId).removeAttr('style');
	});
}

function swapabuse(itemId, itemType){
	$(document).ready(function (){
		$('.reportbox_'+itemType+itemId).slideDown('fast'); 
		$('.contact_'+itemType+itemId).slideUp('fast');
	});
}

function closeAbusebox(itemId, itemType){
	$(document).ready(function (){
		$('.reportbox_'+itemType+itemId).slideUp('fast'); 
		$('.contact_'+itemType+itemId).slideDown('fast');
		$('.errorabuse_'+itemType+itemId).slideUp('fast');
		$('#selectabuse_'+itemType+'_'+itemId).removeAttr('style');
		$('#selectabuse_'+itemType+'_'+itemId).val('');
	});
}

function swapabuseback(itemId, itemType){
	$(document).ready(function (){
		var choosenAbuse = $('#selectabuse_'+itemType+'_'+itemId).val();
		if(choosenAbuse === '000'){
			$('.errorabuse_'+itemType+itemId)
			.slideDown('fast')
			.replaceWith('<div style="background-color: #FFBABA; color: #D8000C;"class="errorabuse_'+itemType+itemId+'">You forgort to choose Report type. የሪፖርት ዓይነት መምረጥ ረስተዋል።	</div>');
			$('#selectabuse_'+itemType+'_'+itemId).css('border','1px solid #D8000C');
		}else{
			$('.errorabuse_'+itemType+itemId).slideUp('fast');
			$.ajax({
				url:'/helper/report.php?itemid='+itemId+'&selected='+choosenAbuse+'&itemtype='+itemType+'ID',
				method:"GET"
			});
			$('.reportbox_'+itemType+itemId).slideUp('fast');
			$('.reportcfrm_'+itemType+itemId).slideDown('fast');
		}
	});
}

function swapabuseclose(itemId, itemType){
	$(document).ready(function (){
		$('.reportbox_'+itemType+itemId).slideUp('fast'); 
		$('.reportcfrm_'+itemType+itemId).slideUp('fast'); 
		$('.contact_'+itemType+itemId).slideDown('fast');
		$('.errorabuse_'+itemType+itemId).slideUp('fast');
		$('#selectabuse_'+itemType+'_'+itemId).removeAttr('style');
		$('#selectabuse_'+itemType+'_'+itemId).val('');
	});
}

function adminAccount(){

	$(document).ready(function (){

		$('.commonAccount').hide();
		$('.adminClass').show();
	});
}
function userAccount(){

	$(document).ready(function (){

		$('.commonAccount').show();
		$('.adminClass').hide();
	});
}
/*************************************************************
 * upload.js*/
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

/***************************************************************
 * user.js*/
function usernumber_of_active_items(items,myid){
	$(document).ready(function (){
		$.ajax({
			url:'/kista507/kista507/trunk/js/useractiveview.php?numberofuseractiveitems='+items+'&userid='+myid+'&action_type= 1',
			method:"GET",	
			success: function(data){ $('#mainColumn').html(data); 
			}
		}); 
	}); 
}

function usernumber_of_pending_items(items,myid)
{
	$(document).ready(function (){
		$.ajax({

			url:'/kista507/kista507/trunk/js/useractiveview.php?numberofuseractiveitems='+items+'&userid='+myid+'&action_type= 2',
			method:"GET",	
			success: function(data){ $('#mainColumn').html(data); 
			}
		}); 
	}); 
}
