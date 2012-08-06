<?php

class Install_IndexController extends Zend_Controller_Action
{

    public function init()
    {
        $ajaxContext = $this->_helper->getHelper('AjaxContext');
        $ajaxContext->addActionContext('xhr', 'html')
                    ->initContext();
    }

    public function indexAction()
    {
        $form = new Install_Form_AdminUser();
        $form->setAttrib('id', 'admin-user');
        $adminUser = Doctrine_Core::getTable('Administrasi_Model_User')->findBy('role', 'admin');
        if(!count($adminUser)):
            if($this->_request->isPost() && $form->isValid($_POST)):
                $values = $form->getValues();
                $values['password'] = sha1($values['password']);
                $values['role'] = 'admin';
                $values['isactive'] = 1;
                $tableUser = new Administrasi_Model_User();
                $tableUser->fromArray($values);
                $tableUser->save();
                $this->_redirect('/');
            else:
                $this->view->form = $form;
            endif;
        else:
            $resetData = new Install_Form_ResetData();
            if($this->_request->isPost() && $resetData->isValid($_POST)):
                $this->view->list = $resetData->getValues();
            else:
                $this->view->resetData = $resetData;
            endif;
        endif;

        $this->view->headScript()->appendFile($this->view->baseUrl('js/plugins/jquery.form.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('js/plugins/jquery.metadata.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('js/plugins/jquery.validate.min.js'));
    }

    public function xhrAction()
    {
        $params = $this->_getAllParams();
        if($this->_getParam('do')):
            switch($params['do']):
                case 'reset-user':                    
                    $this->_helper->ViewRenderer->setNoRender(true);
                    $table = Doctrine_Core::getTable('Administrasi_Model_User')->findAll();
                    $table->delete();
                break;
                case 'reset-siswa':
                    $this->_helper->ViewRenderer->setNoRender(true);
                    $table = Doctrine_Core::getTable('Administrasi_Model_Bis')->findAll();
                    $table->delete();
                break;
                case 'reset-guru':
                    $this->_helper->ViewRenderer->setNoRender(true);
                    $table = Doctrine_Core::getTable('Administrasi_Model_Big')->findAll();
                    $table->delete();
                break;
                case 'reset-pelajaran':
                    $this->_helper->ViewRenderer->setNoRender(true);
                    $table = Doctrine_Core::getTable('Administrasi_Model_Bip')->findAll();
                    $table->delete();
                break;
                default:
                    $this->_helper->ViewRenderer->setNoRender(true);
                break;
            endswitch;
        endif;
    }


}



