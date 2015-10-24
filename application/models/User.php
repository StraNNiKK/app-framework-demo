<?php

class User extends App_Zend_Model
{

    protected $_name = 'user';

    public function __construct()
    {
        App_Event_Dispatcher::getInstance()->addEvent('getCountUser', $this);
        App_Event_Dispatcher::getInstance()->sign('getCountUser', array(
            'object' => new Event_Test(),
            'method' => 'abc'
        ), $this);
        
        parent::__construct();
    }

    public function getCount()
    {
        $select = $this->getAdapter()
            ->select()
            ->from($this->_name, array(
            'c' => 'count(*)'
        ));
        
        $stmt = $this->getAdapter()
            ->query($select)
            ->fetch();
        
        $this->fire('getCountUser');
        
        return intval($stmt['c']);
    }

    public function getCountAnother()
    {
        $sql = "select count(*) as c from user";
        $res = $this->getAdapter()
            ->query($sql)
            ->fetch();
        
        return $res['c'];
    }

    public function fire($event)
    {
        App_Event_Dispatcher::getInstance()->fire($event, $this);
    }
}