<?php 

function logo(){
	echo '<div class ="logo"><a href="../main/pagemaintenance.php"><img src="http://static.katomer.com/img/katomer_logo.png"></a></div>';
	
}

function maintenancePage(){
	$messageEn = "Sorry! At the moment, the page is undergoing some scheduled maintenance"; 
	$messageEn .= " and it will be available very shortly.We apologize for the inconvenience this might cause.";
	$messageAm = "ድሕረገጹ በአሁኑ ሰዓት እድሳት ላይ ነው። ይህም ሆኖ በአፍታ ጊዜ ውስጥ እድሳቱ አልቆ ወደቀድሞው ይዘቱ ይመለሳል። ለተፈጠረው የአገልግሎት መቋረጥ ከፍ ያለ ይቅርታ እንጠይቃለን ።";
	echo'
			<div id="maintenanceDiv">
			<div id="maintenanceHeader">
			<div>Site Maintenance</div>
			<div>የድሕረ ገጽ እድሳት</div>
			</div>
			<div id="maintenanceText">
			<div>'.$messageEn.'<div>
			<div>'.$messageAm.'</div>
		    </div>		 
			<div id="maintenancefooter">
			<div>Katomer Team</div>
			<div>የካቶመር ቡድን</div>
			</div>
			</div>
			 
			';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Katomer | ካቶመር</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8 ">
<link rel="shortcut icon" href="http://static.katomer.com/img/katomer_xx.ico" />
<link rel="stylesheet" href="http://static.katomer.com/css/main.css">
</head>
<body>
	<div id="whole">
		<div id="wrapper">
			<?php   logo(); ?>
			<div id="main_section">
				<div id="mainColumn">
					<?php maintenancePage();?>
				</div>
			</div>
		</div>
	</div>

</body>
</html>
