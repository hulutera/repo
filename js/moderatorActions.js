function func_moderatorActions(actionType, itemtype, itemid, time,user,link){
	$(document).ready(function (){
		$('.thumblist_'+itemtype+itemid).hide();
		$.ajax({
			url:'/includes/moderatorActions.php?actionType='+actionType+'&itemtype='+itemtype+'&itemid='+itemid+'&time='+time+'&user='+user+'&link='+link,
			method:"GET",
			success: function(data){ $('#'+link).html(data); } 
		});    
	}); 
}

function func_moderatorShow(actionType, itemtype, itemid){
	$(document).ready(function (){
		$.ajax({
			url:'/includes/moderatorActions.php?actionType='+actionType+'&itemtype='+itemtype+'&itemid='+itemid,
			method:"GET",
			success: function(data){ alert(data); }
		});    
	}); 
}


