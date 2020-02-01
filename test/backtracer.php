<?php

function backTrace($data)
{
    backTraceFinal($data);
}
function backTraceFinal($data)
{
  global $documnetRootPath;
    if (isset($_SESSION['uID'])) {
        $id = $_SESSION['uID'];
        // search user role in DB
        $result = DatabaseClass::getInstance()->runQuery("SELECT uRole FROM user WHERE uID LIKE '$id' LIMIT 1");
        if ($userId = $result->fetch_assoc()) {
            //Check if user is Administrator for error report
            $role = $userId['uRole'];
            if ($role == 'user') {
                return ;       
            }
        }
        $e = new Exception();
        echo '<div style="font-family: consolas; font-size:16px; padding: 2em 2em 1em; background-color:#EA5E3D;">';
        echo '<p style="font-size:16px;font-weight:bold"> Hulutera debugger::</p>';
        echo '<p style="text-decoration:underline;"> Usage: include file: '.$documnetRootPath.'/test/<strong>backtracer.php</strong>, and call with <strong>backTrace($somedata)</strong></p>';
        echo '<p style="font-size:16px;font-weight:bold"> Section::Files => </p>';
        echo '<pre style="color:white;">', $e->getTraceAsString(), '</pre>';
        echo '</div>';
        echo '<div style="font-family: consolas; font-size:16px; padding: 2em 2em 1em; background-color:#ea993d54;">';
        echo '<p style="font-size:16px;font-weight:bold"> Section::Data => </p>';

        echo '<pre style="">',var_dump($data), '</pre>';
        echo '</div>';
    }
}
