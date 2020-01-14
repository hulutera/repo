function swap(){
	$(document).ready(function (){
		
		$('#login').click(function () {
			$('#loginInputs').slideDown('fast');
			$('#login').slideUp('fast');
			
		});
		$('#close').click(function () {
			$('#loginInputs').slideUp('fast');
			$('#login').slideDown('fast');
		});
		$('#detailbottom_out').click(function () {
			$('#detailInfo_mini').slideDown('fast');
		});
		
		$('#detailInfo_mini').click(function () {
			$('#detailInfo_mini').slideUp('fast');
		});
		$('#mob_icon').click(function () {
			$('#sidebar').slideDown('fast');
			$('#mob_icon').slideUp('fast');
			$('#mob_icon_close').slideDown('fast');
		});
		$('#mob_icon_close').click(function () {
			$('#sidebar').slideUp('fast');
			$('#mob_icon').slideDown('fast');
			$('#mob_icon_close').slideUp('fast');
		});

		$(window).resize(function () {
			if ($(window).width() <= 759)
			{	
				$('#sidebar').hide();
				$('#mob_icon').show();
				$('#mob_icon_close').hide();
				$('#detailInfo_mini').hide();
				
				$('#loginInputs').hide();
				$('#login').show();
			}
			else
			{
				$('#sidebar').show();
				$('#mob_icon').hide();
			}	

		});
	}); 

}