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
			url:'/includes/actionOnMessage.php?idArray='+id+'&action='+action,
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
				url:'/includes/actionOnMessage.php?msg='+msg+'&useremail='+useremail+'&youremail='+youremail+'&action=reply',
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
			url:'/includes/actionOnMessage.php?idArray='+stringArray+'&action='+action,
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
			url:'../includes/message.php?mail_type='+mailtype,
			method:"GET",
			success: function(data){ $('#mainColumn').html(data); }
		});    
	});
}