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
        } elseif ($this->_runnerName == 'all') {
            $this->showAll();
        } else {
            if (!empty($this->_runnerId)) {
                if ($this->_runnerId == "*") {
                    $this->showItem();
                } else {
                    $this->showItemWithId();
                }
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
            $this->_runnerId = $runnerObj->getId();
            $this->_runnerName = $runnerObj->getFieldItemName();
            $this->showItemWithId();
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
            $this->_runnerId = $row['id'];
            $this->showItemWithId();
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
        $this->_pItem->display();
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
        $this->_pItem = ObjectPool::getInstance()->getObjectSpecial($this->_runnerName, $this->_runnerId);
        foreach ($this->_pItem as $key => $value) {
            $this->_pItem = $value;
            $result = $this->_pItem->getResultSet();
            while ($row = $result->fetch_assoc()) {
                $this->_runnerId = $row['id'];
                $this->_runnerName = $key;
                $this->showItemWithId();
            }
        }
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
    public function upload()
    {
        $this->_pItem = ObjectPool::getInstance()->getObjectWithId($this->_runnerName, $this->_runnerId);
        $this->_pItem->upload();
    }
}
