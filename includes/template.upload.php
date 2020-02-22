<?php
session_start();
ob_start();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath.'/includes/cmn.upload.php';
require_once $documnetRootPath . '/includes/common.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Upload | ንብረቱን ያስገቡ</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8 ">
<?php commonHeader();?>
<style type="text/css">

  #preview_ie_1,#preview_ie_2,#preview_ie_3,#preview_ie_4,#preview_ie_5 {
    FILTER: progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)
  }

</style>
<script type="text/javascript" src="../../js/upload.min.js"></script>
<script type="text/javascript" src="../../js/imgUpload.min.js"></script>
<script type="text/javascript" src="../../js/jquery1.11.1.min.js"></script>
<script type="text/javascript">
    function readURL(input,val) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();

	        reader.onload = function (e) {
	            $('#preview_'+val).attr('src', e.target.result);
	            $('#preview_'+val).show();
	            $('#deleteBtn'+val).show();
	            
	        }
			input.files[0] = '';
	        reader.readAsDataURL(input.files[0]);
	    }
	}
	function removeImg(target,val)
	{
		$(target).remove();
		//$('#preview_'+val).attr('src','');
		$('#preview_'+val).remove();
		$('#picture_'+val).replaceWith($('#picture_'+val).clone(true));
		
	}

	</script>
<!--[if gte IE 7]> 
<script type="text/javascript">
  function readURL(imgFile,val)
  {    
      var newPreview = document.getElementById("preview_ie_"+val);
      newPreview.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = imgFile.value;
      newPreview.style.width = "100px";
      newPreview.style.height = "100px";
  }   
</script>
<![endif]-->
</head>
<body>
	<div id="whole">
		<div id="wrapper">
			<?php uploadHeaderAndSearchCode("");?>
			<div id="main_section">
				<?php (new HtMainView($_GET['type'],null))->upload();
				?>
			</div>
		</div>
		<div class="push"></div>
	</div>
	<?php footerCode(); ?>
</body>
</html>
