<?php

$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/classes/objectPool.class.php';

$action = isset($_GET['actionType']) ? $_GET['actionType'] : "";
$item = isset($_GET['itemtype']) ? $_GET['itemtype'] : "";
$id = isset($_GET['itemid']) ? $_GET['itemid'] : "";


if ($action == "delete" and $item != "" and $id != "") {
    $item_tb = ObjectPool::getInstance()->getObjectWithId($item, $id);
    $latest_tb = ObjectPool::getInstance()->getObjectWithId("latest");
    $latest_tb->setFieldValues($id, $item);
    ///here permanent damage, data unrecoverable!!
    $item_tb->delete($id);
    $latest_tb->delete();
}
?>