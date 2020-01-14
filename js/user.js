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
