<?php

class Auth_Storage_Session implements Auth_Storage_Interface
{

    const KEY_DEFAULT = 'auth';

    const SESSION_NAMESPACE = 'authSession';

    protected $_key;

    public function __construct($key = self::KEY_DEFAULT)
    {
        $this->_key = $key;
    }

    public function isEmpty()
    {
        return ! App_Session::check($this->_key, self::SESSION_NAMESPACE);
    }

    public function read()
    {
        if (! $this->isEmpty()) {
            return App_Session::get($this->_key, self::SESSION_NAMESPACE);
        } else {
            return null;
        }
    }

    public function write($contents)
    {
        App_Session::set($this->_key, $contents, self::SESSION_NAMESPACE);
    }

    public function clear()
    {
        App_Session::remove($this->_key, self::SESSION_NAMESPACE);
    }
}
