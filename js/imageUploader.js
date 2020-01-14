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
//    for(var x = 0;x<=5;x++)
//    {
//    	$('#input'+x).change(function(){
//        fileName = $('#input1'+x).val().replace(/.+[\\\/]/, "");
//        fileExt = fileName.substring(fileName.lastIndexOf('.') + 1);
//        if(checkImageExtenstion(fileExt))
//        {
//            //insert file name in imgName1
//        	$('#imgName'+x).text(fileName);
//            $('#img'+x).show();
//            freeSlot[x-1]=x;
//            inputFlag = 0;
//            showInput();               
//            $('#input'+x).hide(); 
//        }
//        else
//        {
//        	alert("Sorry, " + fileName + " is invalid, allowed extensions are: " + validImageExtensions.join(", "));
//            input1.focus()
//        }
//    });
//    }
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
