<?php
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/classes/reflection/HtItemCar.php';
require_once $documnetRootPath . '/classes/reflection/HtItemComputer.php';
require_once $documnetRootPath . '/classes/reflection/HtItemHouse.php';
require_once $documnetRootPath . '/classes/reflection/HtItemHousehold.php';
require_once $documnetRootPath . '/classes/reflection/HtItemElectronic.php';
require_once $documnetRootPath . '/classes/reflection/HtItemPhone.php';
require_once $documnetRootPath . '/classes/reflection/HtItemOther.php';
require_once $documnetRootPath . '/classes/reflection/HtItemLatestUpdate.php';

class ObjectPool
{
    private static $_instance;

    /*
	Get an instance of the ObjecPool class
	@return Instance
	*/
    public static function getInstance()
    {
        if (!self::$_instance) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    // prevent duplication of connection
    private function __clone()
    {
    }

    public function getViewObject($item)
    {
        global $documnetRootPath;
        require_once $documnetRootPath . '/view/main.view.class.php';
        return DatabaseClass::getInstance()->checkIfItemExitByName($item) ?
            (new MainView($item)) : (new EmptyView());
    }

    public function getClassObject($item)
    {
        global $documnetRootPath;
        require_once $documnetRootPath . '/items/' . $item . '/' . $item . '.class.php';

        if ($item == "car") {
            return (new CarClass());
        } else if ($item == "house") {
            return (new HouseClass());
        } else if ($item == "computer") {
            return (new CompClass());
        } else if ($item == "electronics") {
            return (new ElecClass());
        } else if ($item == "phone") {
            return (new PhoneClass());
        } else if ($item == "household") {
            return (new HouseholdClass());
        } else if ($item == "others") {
            return (new OtherClass());
        }
    }

    public function getObjectWithId($item, $id)
    {
        switch ($item) {
            case 'car':
                return (new HtItemCar($id));
            case 'computer':
                return (new HtItemComputer($id));
            case 'house':
                return (new HtItemHouse($id));
            case 'household':
                return (new HtItemHousehold($id));
            case 'electronic':
                return (new HtItemElectronic($id));
            case 'phone':
                return (new HtItemPhone($id));
            case 'other':
                return (new HtItemOther($id));
            case 'latest':
                return !empty($id) ? (new HtItemLatestUpdate($id)) : (new HtItemLatestUpdate());
            case 'latest':
                return !empty($id) ? (new HtItemLatestUpdate($id)) : (new HtItemLatestUpdate());
            default:
                echo '<p style="color:red;">ERROR:Object for item = ' . $item . ' Not found!!</p>';
                return null;
        }
    }

    public function getObjectSpecial($item)
    {
        $objects = array(
            'car' => (new HtItemCar()),
            'computer' => (new HtItemComputer()),
            'house' => (new HtItemHouse()),
            'household' => (new HtItemHousehold()),
            'electronic' => (new HtItemElectronic()),
            'phone' => (new HtItemPhone()),
            'other' => (new HtItemOther())
        );
        if (!empty($item) && $item !== 'all') {
            return array($objects[$item]);
        }
        else {
            return $objects;
        }
    }
}
