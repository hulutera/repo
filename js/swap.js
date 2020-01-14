

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









