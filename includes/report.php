<?php
$documnetRootPath = $_SERVER["DOCUMENT_ROOT"];
require_once $documnetRootPath . "/db/database.class.php";
require_once $documnetRootPath . '/classes/objectPool.class.php';
require_once $documnetRootPath . "/classes/reflection/HtUtilAbuse.php";
require_once $documnetRootPath . "/classes/reflection/HtCategoryAbuse.php";
session_start();

if (!isset($_SESSION["uID"]) || !(isset($_GET["itemid"]) && isset($_GET["itemtype"]) && isset($_GET["selected"]))) {
	header("Location: ../index.php");
}

/**
 * Get CategoryId
 * all Abuse Categories and get the id matching
 */
$abuseCategoryObject = new HtCategoryAbuse();
$abuseCategoryObject->select("*");
$result = $abuseCategoryObject->getResultSet();
$found = false;
while ($row = $result->fetch_assoc()) {
	if (strtolower($_GET["selected"]) == strtolower($row["field_name"])) {
		$categoryId = $row["id"];
		$found = true;
	}
}
if (!$found) {
	header('Location: ../index.php');
}

$id  = $_GET["itemid"];
$item = $_GET["itemtype"];

//// Item not in table abort
$allItems = new HtItemAll("*");
$result = $allItems->getResultSet();
$result->data_seek(0);
$found = false;
while ($row = $result->fetch_assoc()) {
	if (strtolower($item) == strtolower($row["field_name"])) {
		$found = true;
	}
}
if (!$found) {
	header('Location: ../index.php');
}

/**
 * Add the item missing and set one
 */
$object = ObjectPool::getInstance()->getObjectWithId($item, $id);
$result = $object->getResultSet();
$result->data_seek(0);
$currentReport = $object->getFieldReport();
$delimiter = ($currentReport == null) ? "" : ",";

///fetch databse if there exists a similar
/// report before and ignore if theres exist
/// otherwise add the new abuse report
$found = false;
if ($currentReport !== null) {
	$reportsArray = explode(',', $currentReport);
	foreach ($reportsArray as $key => $value) {
		if ((int) $value == (int) $categoryId) {
			$found = true;
		}
	}
}
if (!$found) {
	$object->setFieldReport($currentReport . $delimiter . (string) $categoryId);
	$object->updateCurrent();
}
