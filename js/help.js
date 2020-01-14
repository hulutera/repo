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
