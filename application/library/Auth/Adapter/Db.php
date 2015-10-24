<?php

class Auth_Adapter_Db implements Auth_Adapter_Interface
{

    protected $_login = null;

    protected $_password = null;

    protected $_dbAdapter = null;

    protected $_dbSelect = null;

    protected $_tableName = null;

    protected $_identityColumn = null;

    protected $_passwordColumn = null;

    protected $_someConditions = null;

    protected $_authenticateResultInfo = null;

    protected $_foundUserData = null;

    public function __construct($dbAdapter, $tableName = null, $identityColumn = null, $passwordColumn = null)
    {
        $this->_dbAdapter = $dbAdapter;
        
        if (null !== $tableName) {
            $this->setTableName($tableName);
        }
        
        if (null !== $identityColumn) {
            $this->setIdentityColumn($identityColumn);
        }
        
        if (null !== $passwordColumn) {
            $this->setPasswordColumn($passwordColumn);
        }
    }

    public function setTableName($tableName)
    {
        $this->_tableName = $tableName;
        
        return $this;
    }

    public function setIdentityColumn($identityColumn)
    {
        $this->_identityColumn = $identityColumn;
        
        return $this;
    }

    public function setPasswordColumn($passwordColumn)
    {
        $this->_passwordColumn = $passwordColumn;
        
        return $this;
    }

    public function setIdentity($login)
    {
        $this->_login = $login;
        
        return $this;
    }

    public function setPassword($password)
    {
        $this->_password = $password;
        
        return $this;
    }

    public function setConditions($conditions)
    {
        $this->_someConditions = $conditions;
    }

    public function getDbSelect()
    {
        if ($this->_dbSelect == null) {
            $this->_dbSelect = $this->_dbAdapter->select();
        }
        
        return $this->_dbSelect;
    }

    protected function _authenticateSetup()
    {
        $this->_authenticateResultInfo = array(
            'code' => Auth_Result::FAILURE,
            'identity' => $this->_login,
            'messages' => array()
        );
        
        return true;
    }

    public function authenticate()
    {
        $this->_authenticateSetup();
        
        $dbSelect = clone $this->getDbSelect();
        $dbSelect->from($this->_tableName)
            ->where($this->_dbAdapter->quoteIdentifier($this->_identityColumn, true) . ' = ?', $this->_login)
            ->where($this->_dbAdapter->quoteIdentifier($this->_passwordColumn, true) . ' = ?', $this->_password);
        
        if ($this->_someConditions) {
            $dbSelect->where($this->_someConditions);
        }
        
        $results = $this->_dbAdapter->fetchAll($dbSelect->__toString());
        $this->_foundUserData = (! is_array($results) ? $results->toArray() : $results);
        
        $authResult = $this->_authenticateValidateResult($this->_foundUserData);
        return $authResult;
    }

    protected function _authenticateValidateResult(array $resultIdentities)
    {
        if (count($resultIdentities) < 1) {
            $this->_authenticateResultInfo['code'] = Auth_Result::FAILURE_IDENTITY_NOT_FOUND;
            $this->_authenticateResultInfo['messages'][] = 'Запись не найдена.';
            return $this->_authenticateCreateAuthResult();
        } elseif (count($resultIdentities) > 1) {
            $this->_authenticateResultInfo['code'] = Auth_Result::FAILURE_IDENTITY_AMBIGUOUS;
            $this->_authenticateResultInfo['messages'][] = 'Найдено более одной записи.';
            return $this->_authenticateCreateAuthResult();
        } else {
            $this->_authenticateResultInfo['code'] = Auth_Result::SUCCESS;
            $this->_authenticateResultInfo['messages'][] = 'Авторизация прошла успешно.';
            return $this->_authenticateCreateAuthResult();
        }
    }

    protected function _authenticateCreateAuthResult()
    {
        return new Auth_Result($this->_authenticateResultInfo['code'], $this->_authenticateResultInfo['identity'], $this->_authenticateResultInfo['messages']);
    }

    public function getResult($rows = array())
    {
        if (is_array($this->_foundUserData)) {
            $userData = current($this->_foundUserData);
            if (count($rows) > 0) {
                $resultArr = array();
                foreach ($rows as $v) {
                    if (array_key_exists($v, $userData)) {
                        $resultArr[$v] = $userData[$v];
                    }
                }
                return $resultArr;
            } else {
                return $this->_foundUserData;
            }
        } else {
            return null;
        }
    }
}