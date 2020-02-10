<?php
session_start();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/classes/reflection/HtUserAll.php';
echo '<style>body {
    font-family: Arial, Helvetica, sans-serif;
}
.card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    max-width: 300px;
    text-align: left;
    diplay:inline-block;
  }
  
  .title {
    color: grey;
    font-size: 18px;
  }
</style>';
for ($i = 1; $i < 100; $i++) {
    $user = new HtUserAll($i);
    if($user->getId() !== 0){
        echo '<div class="card">';        
        //echo $user->getId() . ' '; # code...
        echo '<h1>'. $user->getFieldUserName() . '   '. $user->getFieldFirstName() . '   '. $user->getFieldLastName() . '</h1>  '; # code...
        echo '<p class="title">'.$user->getFieldPrivilege() . '@hulutera.com</p> '; # code...
        echo $user->getFieldPhoneNr() . '  '; # code...
        echo $user->getFieldEmail();
        echo '</div>'; # code...
    }
  
}
