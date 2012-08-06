<?php

class Guru_IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $this->view->headScript()->appendFile($this->view->baseUrl('js/bootstrap/bootstrap-collapse.js'));
    }


}

