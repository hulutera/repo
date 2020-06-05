<?php

spl_autoload_register(function ($className) {
    include_once $_SERVER['DOCUMENT_ROOT'] . '/classes/reflection/' . $className . '.php';
});

class ObjectPool
{
    private static $_instance;

    private $tableType2item = [
        1 => 'car',
        2 => 'house',
        3 => 'computer',
        4 => 'phone',
        5 => 'electronic',
        6 => 'household',
        7 => 'other'
    ];    /*
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
        /*
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
        }*/
    }

    public function getObjectWithId($item, $id = null)
    {
        $itemName = str_replace("item_", "", $item);
        switch ($itemName) {
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
            default:
                echo '<p style="color:red;">ERROR:Object for item = ' . $item . ' Not found!!</p>';
                backTrace($item);
                return null;
        }
    }

    public function getObjectWithTableType($result)
    {
        $tableType = $result['field_table_type'];
        $itemName = $this->tableType2item[$tableType];
        return $this->getObjectWithId($itemName, $result['id']);
    }

    public function getObjectSpecial($item, $id = null)
    {
        $itemName = str_replace("item_", "", $item);

        $objects = array(
            'car' => (new HtItemCar($id)),
            'computer' => (new HtItemComputer($id)),
            'house' => (new HtItemHouse($id)),
            'household' => (new HtItemHousehold($id)),
            'electronic' => (new HtItemElectronic($id)),
            'phone' => (new HtItemPhone($id)),
            'other' => (new HtItemOther($id))
        );
        if (!empty($itemName) && $itemName !== 'all') {
            return array($itemName => $objects[$itemName]);
        } else {
            return $objects;
        }
    }
}
