<?php

class Auth_Result
{

    const FAILURE = 0;

    const FAILURE_IDENTITY_NOT_FOUND = -1;

    /**
     * Для идентификатора пользователя найдено два соответствия
     */
    const FAILURE_IDENTITY_AMBIGUOUS = -2;

    const FAILURE_UNCATEGORIZED = -3;

    const SUCCESS = 1;

    protected $_code;

    /**
     *
     * @var mixed
     */
    protected $_identity;

    protected $_messages;

    public function __construct($code, $identity, array $messages = array())
    {
        $code = (int) $code;
        
        if ($code < self::FAILURE_UNCATEGORIZED) {
            $code = self::FAILURE;
        } elseif ($code > self::SUCCESS) {
            $code = 1;
        }
        
        $this->_code = $code;
        $this->_identity = $identity;
        $this->_messages = $messages;
    }

    public function isValid()
    {
        return ($this->_code > 0) ? true : false;
    }

    public function getCode()
    {
        return $this->_code;
    }

    public function getIdentity()
    {
        return $this->_identity;
    }

    public function getMessages()
    {
        return $this->_messages;
    }
}