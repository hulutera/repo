<?php
//get name of the calling script
$file = basename($_SERVER['SCRIPT_NAME']);
//remove php extention
$file = str_replace(".php","",$file);
//redirect to itemTemplate file
header('Location: ../../template/proxyTemplate.php?type='.$file);
?>