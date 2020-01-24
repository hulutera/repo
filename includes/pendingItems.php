<?php
//get name of the calling script
$file = basename($_SERVER['SCRIPT_NAME']);
//remove php extention
$file = str_replace(".php","",$file);
//redirect to template.item file
header('Location: ../../includes/template.content.php?type='.$file);
?>