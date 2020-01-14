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