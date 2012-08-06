<?php

class Home_LoginController extends Zend_Controller_Action
{

    public function init()
    {
        $this->_bootstrap = $this->getInvokeArg('bootstrap');
    }

    public function indexAction()
    {
        $login = new Home_Form_Login();
        $login->setAttribs(array('accept-charset' => 'utf-8'));

        $dbAdapter = $this->_bootstrap->getPluginResource('db')->getDbAdapter();
        
        
        $auth = Zend_Auth::getInstance();
        if($auth->hasIdentity()):
            $user = Doctrine_Core::getTable('Administrasi_Model_User')
                                 ->findOneBy('username', $auth->getIdentity()->username);
            $this->view->profile = $user;
        else:
            if($this->_request->isPost() && $login->isValid($_POST)):
                $values = $login->getValues();
                $authAdapter = new Zend_Auth_Adapter_DbTable($dbAdapter);

                $authAdapter->setTableName('user')
                        ->setIdentityColumn('username')
                        ->setCredentialColumn('password')
                        ->setIdentity($values['username'])
                        ->setCredential(sha1($values['password']));
                
                $result = $auth->authenticate($authAdapter);
                if($result->isValid()):
                    $storage = $auth->getStorage();
                    $storage->write($authAdapter->getResultRowObject(null, 'password'));
                    $this->_redirect('/');
                    
                else:
                    $this->view->form = $login;
                    echo 'Failed to login';
                endif;
            else:
                $this->view->form = $login;
            endif;
        endif;
    }

    public function outAction()
    {
        $this->_helper->getHelper('ViewRenderer')->setNoRender(true);
        Zend_Auth::getInstance()->clearIdentity();
        $this->_redirect('/');
    }

    public function noAksesAction()
    {
        // action body
    }


}





