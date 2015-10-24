<?php

class Auth
{

    protected static $_instance = null;

    protected $_storage = null;

    protected function __construct()
    {}

    protected function __clone()
    {}

    public static function getInstance()
    {
        if (null === self::$_instance) {
            self::$_instance = new self();
        }
        
        return self::$_instance;
    }

    public function setStorage(Auth_Storage_Interface $storage)
    {
        $this->_storage = $storage;
        
        return $this;
    }

    public function getStorage()
    {
        if (null === $this->_storage) {
            require_once 'Auth/Storage/Session.php';
            $this->setStorage(new Auth_Storage_Session());
        }
        
        return $this->_storage;
    }

    public function authenticate(Auth_Adapter_Interface $adapter)
    {
        $result = $adapter->authenticate();
        
        if ($this->hasIdentity()) {
            $this->clearIdentity();
        }
        
        if ($result->isValid()) {
            $this->getStorage()->write($result->getIdentity());
        }
        
        return $result;
    }

    public function hasIdentity()
    {
        return ! $this->getStorage()->isEmpty();
    }

    public function getIdentity()
    {
        $storage = $this->getStorage();
        
        if ($storage->isEmpty()) {
            return null;
        }
        
        return $storage->read();
    }

    public function clearIdentity()
    {
        $this->getStorage()->clear();
    }
}