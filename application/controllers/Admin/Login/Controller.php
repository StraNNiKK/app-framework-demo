<?php

class Admin_Login_Controller extends App_Controller
{

    protected $_urls = array(
        'adminUrl' => '/admin/',
        'formUrl' => '/admin/login/',
        'loginUrl' => '/admin/login/authenticate/',
        'captchaUrl' => '/admin/login/captcha/',
        'cancelUrl' => '/'
    );

    public function _init()
    {
        if (Auth::getInstance()->getIdentity()) {
            $this->_response->redirect($this->_router->backRoute('Admin_Controller'));
        }
    }

    protected function _getError()
    {
        $messages = App_Session::getInstance()->getFlashMessages();
        if ($messages) {
            return implode(', ', $messages);
        } else {
            return null;
        }
    }

    protected function _setError($txt)
    {
        App_Session::getInstance()->addFlashMessage($txt);
    }

    public function indexAction()
    {
        $this->assignView('error', strval($this->_getError()));
        $this->assignView('urls', $this->_urls);
    }

    public function authenticateAction()
    {
        $params = $this->_request->getPostParams();
        $captchaObj = new Captcha();
        
        if ($captchaObj->check($params['code'])) {
            $UserModel = new User();
            $authAdapter = new Auth_Adapter_Db($UserModel->getAdapter(), 'user', 'login', 'password');
            $authAdapter->setIdentity($params['login'])
                ->setPassword(md5($params['password']))
                ->setConditions("`type` = 'admin'");
            
            $result = Auth::getInstance()->authenticate($authAdapter);
            
            if ($result->isValid()) {
                $authStorage = Auth::getInstance()->getStorage();
                $authStorage->write($authAdapter->getResult(array(
                    'login',
                    'type',
                    'name'
                )));
                $this->_response->redirect($this->_router->backRoute('Admin_Controller'));
                return null;
            } else {
                $this->_setError('Неверный логин/пароль');
            }
        } else {
            $this->_setError('Неверный код');
        }
        
        $this->_response->redirect($this->_router->backRoute('Admin_Login_Controller'));
    }

    public function captchaAction()
    {
        $captchaObj = new Captcha();
        $image = $captchaObj->generate(array(
            'width' => 240,
            'height' => 80
        ));
        
        $this->assignView('image', $image);
    }
}