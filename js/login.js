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

