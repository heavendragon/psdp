<?php

class Administrasi_IndexController extends Vx_Controller_Action
{

    public function init()
    {
        parent::init();
        $ajaxContext = $this->_helper->getHelper('AjaxContext');
        $ajaxContext->addActionContext('xhr', 'html')
                    ->initContext();
    }

    public function indexAction()
    {

        $this->view->headScript()->appendFile($this->view->baseUrl('js/bootstrap/bootstrap-collapse.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('js/plugins/jquery.form.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('js/plugins/jquery.metadata.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('js/plugins/jquery.validate.min.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('js/plugins/jquery.quicksearch.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('js/plugins/jquery.jeditable.mini.js'));
    }

    public function xhrAction()
    {
        $params = $this->_getAllParams();
        if($this->_getParam('do')):
        switch($params['do']):
            case 'daftar-siswa':
                $siswa = Doctrine_Core::getTable('Administrasi_Model_Bis')->findAll();
                $this->view->siswa = $siswa;
                $this->render('daftar-siswa');
            break;

            case 'input-siswa':
                $form = new Administrasi_Form_InputSiswa();
                $form->setAttrib('id', 'form-input-siswa');
                $form->setAction('/administrasi/index/xhr/do/siswa-data-baru/format/html');
                $this->view->form = $form;
                $this->render('input-siswa');
            break;

            case 'siswa-data-baru':
                $this->_helper->ViewRenderer->setNoRender(true);
                $table = new Administrasi_Model_Bis();
                $table->fromArray($params);
                $table->save();
                echo Zend_Json::encode($params);
            break;

            case 'siswa-inline-update':
                $this->_helper->ViewRenderer->setNoRender(true);
                $this->_isAjaxPost('Administrasi_Model_Bis', '/', null, true);
            break;


            case 'daftar-guru':
                $guru = Doctrine_Core::getTable('Administrasi_Model_Big')->findAll();
                $this->view->guru = $guru;
                $this->render('daftar-guru');
            break;
            case 'input-guru':
                $form = new Administrasi_Form_InputGuru();
                $form->setAttrib('id', 'form-input-guru');
                $form->setAction('/administrasi/index/xhr/do/guru-data-baru/format/html');
                $this->view->form = $form;
                $this->render('input-guru');
            break;
            case 'guru-data-baru':
                $this->_helper->ViewRenderer->setNoRender(true);
                $table = new Administrasi_Model_Big();
                $table->fromArray($params);
                $table->save();
                echo Zend_Json::encode($params);
            break;
            case 'guru-inline-update':
                $this->_helper->ViewRenderer->setNoRender(true);
                $this->_isAjaxPost('Administrasi_Model_Big', '/', null, true);
            break;

            case 'daftar-pelajaran':
                $pelajaran = Doctrine_Core::getTable('Administrasi_Model_Bip')->findAll();
                $this->view->pelajaran = $pelajaran;
                $this->render('daftar-pelajaran');
            break;
            case 'input-pelajaran':
                $form = new Administrasi_Form_InputPelajaran();
                $form->setAttrib('id', 'form-input-pelajaran');
                $form->setAction('/administrasi/index/xhr/do/pelajaran-data-baru/format/html');
                $this->view->form = $form;
                $this->render('input-pelajaran');
            break;
            case 'pelajaran-data-baru':
                $this->_helper->ViewRenderer->setNoRender(true);
                $table = new Administrasi_Model_Bip();
                $table->fromArray($params);
                $table->save();
                echo Zend_Json::encode($params);
            break;
            case 'pelajaran-inline-update':
                $this->_helper->ViewRenderer->setNoRender(true);
                $this->_isAjaxPost('Administrasi_Model_Bip', '/', null, true);
            break;

            case 'daftar-user':
                $user = Doctrine_Core::getTable('Administrasi_Model_User')->findAll();
                $this->view->user = $user;
                $this->render('daftar-user');
            break;
            case 'input-user':
                $form = new Administrasi_Form_InputUser();
                $form->setAttrib('id', 'form-input-user');
                $form->setAction('/administrasi/index/xhr/do/user-data-baru/format/html');
                $this->view->form = $form;
                $this->render('input-user');
            break;
            case 'user-data-baru':
                $this->_helper->ViewRenderer->setNoRender(true);
                $table = new Administrasi_Model_User();
                $params['username'] = strtolower($params['username']);
                $params['password'] = sha1($params['password']);
                $params['isactive'] = 1;
                $table->fromArray($params);
                $table->save();
                echo Zend_Json::encode($params);
            break;
            case 'user-inline-update':

            case 'isunique':
                $val = $params['val'];
                $tbl = 'Administrasi_Model_' . ucfirst($params['tbl']);
                $fld = $params['fld'];
                $this->_helper->ViewRenderer->setNoRender(true);
                $table = Doctrine_Core::getTable($tbl)->findOneBy($fld, $val);
                $respon = array();
                if($table):
                    $respon['alert'] = 'Data yang sama sudah ada, silakan dicheck ulang';
                else:
                    $respon['continue'] = 'Konfirmasi';
                endif;
                echo Zend_Json::encode($respon);
            break;

            default:
                $this->_helper->ViewRenderer->setNoRender(true);
            break;
        endswitch;
        endif;
    }


}



