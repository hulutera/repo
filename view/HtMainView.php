<?php
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/classes/objectPool.class.php';


class HtMainView
{

    private $_runnerName; //track current running item name (car, ..., all, latest)
    private $_runnerId;   //track current running item id, optional for all, latest
    private $_pItem;      //track object to classes

    function __construct($newRunnerName, $newRunnerId)
    {
        $this->_runnerName = $newRunnerName;
        $this->_runnerId = $newRunnerId;
    }

    function __destruct()
    {
        $this->_pItem->__destruct();
    }

    /**
     * Main interface to display item
     * e.g.
     *  (new HtMainView("all",null))->show();    // select * from all  (car, computer, ...)
	 *  (new HtMainView("car",null))->show();     // select * car
	 *  (new HtMainView("car",13))->show();       // select * car where id=13
	 *  (new HtMainView("latest",null))->show();  //select * latestupdate 
	 *  
     * @param resolved by construtor
     */
    public function show()
    {
        if ($this->_runnerName == 'latest') {
            $this->showLatest();
        } 
        elseif ($this->_runnerName == 'all') {
            $this->showAll();
        }
        else {
            if (!empty($this->_runnerId)) {
                $this->showItemWithId();
            } else {
                $this->showItem();
            }
        }
    }

    /**
     * Alternative interface to display item
     * e.g.
	 *  (new HtMainView("latest",null))->showLatest();  //select * latestupdate 
	 *  
     * @param resolved by construtor
     */
    public function showLatest()
    {
        $this->_pItem = ObjectPool::getInstance()->getObjectWithId($this->_runnerName, $this->_runnerId);
        $result = $this->_pItem->getResultSet();
        while ($row = $result->fetch_assoc()) {

            $runnerObj = ObjectPool::getInstance()->getObjectWithId($this->_runnerName, $row['id']);

            $id = $runnerObj->getId();
            $newRunnerName = $runnerObj->getFieldItemName();
            $itemObject = ObjectPool::getInstance()->getObjectWithId($newRunnerName, $id);
            if (!empty($itemObject)) {
                $itemObject->leftJoin();
                $itemResult = $itemObject->getResultSet();
                while ($p = $itemResult->fetch_assoc()) {
                    foreach ($p as $key => $value) {
                        echo '<div class="' . $newRunnerName . '_' . $id . '">' . $value . '</div>';
                    }
                }
            }
        }
    }
    /**
     * Alternative interface to display item
     * e.g.
	 *  (new HtMainView("car",null))->showItem();  //select * item 
     * @param resolved by construtor
     */
    public function showItem()
    {
        $this->_pItem = ObjectPool::getInstance()->getObjectWithId($this->_runnerName, $this->_runnerId);
        $result = $this->_pItem->getResultSet();
        while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $itemObject = ObjectPool::getInstance()->getObjectWithId($this->_runnerName, $id);
            $itemObject->display();//Specific();
            return;
            // $test = $itemObject->__toString();
            // $test2 = json_decode($test, true);
            // var_dump($test2[0]['CONTROL']);
            // var_dump($test2[1]['PRICE']);
            // var_dump($test2[2]['SPECIFIC']);
            // var_dump($test2[3]['COMMON']);
            // if (!empty($itemObject)) {
            //     $itemObject->leftJoin();
            //     $itemResult = $itemObject->getResultSet();
            //     while ($p = $itemResult->fetch_assoc()) {
            //         foreach ($p as $key => $value) {
            //             $p['id'] = $id;
            //             echo '<div class="' . $this->_runnerName . '_' . $id . '">'.$key.'=' . $value . '</div>';
            //         }
            //     }
            // }
        }
    }

    /**
     * Alternative interface to display item with id
     * e.g.
	 *  (new HtMainView("car",12))->showItemWithId();  //select * item where id=12
     * @param resolved by construtor
     */
    public function showItemWithId()
    {
        $this->_pItem = ObjectPool::getInstance()->getObjectWithId($this->_runnerName, $this->_runnerId);
        if (!empty($this->_pItem)) {
            $this->_pItem->leftJoin();
            $result = $this->_pItem->getResultSet();
            while ($p = $result->fetch_assoc()) {
                foreach ($p as $key => $value) {
                    echo '<div class="' . $this->_runnerName . '_' . $this->_runnerId . '">' . $value . '</div>';
                }
            }
        }
    }

    /**
     * Alternative interface to display item with id
     * e.g.
	 *  (new HtMainView("all",null))->showAll();  //select * item where id=12
     * @param resolved by construtor
     */
    public function showAll()
    {
        //every thing from one item
        // all, array pointers return 
        $runnerArray = ObjectPool::getInstance()->getObjectSpecial($this->_runnerName);

        //iterate
        foreach ($runnerArray as $key => $value) {
            //echo '<div class="'.$key.'">';
            $this->_pItem = $value;
            $result = $this->_pItem->getResultSet();
            while ($row = $result->fetch_assoc()) {
                //echo '<div class="' . $row['id'] . '">';
                //get one item with id
                $itemObject = ObjectPool::getInstance()->getObjectWithId($key, $row['id']);
                if (!empty($itemObject)) {
                    
                    $itemObject->leftJoin();

                    $itemResult = $itemObject->getResultSet();

                    while ($p = $itemResult->fetch_assoc()) {
                        echo '<div class="' . $key . '_' . $row['id'] . '">';
                        foreach ($p as $key2 => $value2) {
                            echo '<p> ' . $key . '  ' . $key2 . '   ' . $value2 . '</p>';
                        }
                        echo  '</div>';
                    }
                }

                //  foreach ($row as $key2 => $value2) {
                //     echo '<div class="' . $key . '_' . $key2 . '">' . $value2 . '</div>';
                }
                //echo '</div>';
            }
            //echo '</div>';
    
    }
}