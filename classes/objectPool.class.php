<?php

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
        require_once $documnetRootPath.'/view/main.view.class.php';
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
}
