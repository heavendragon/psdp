<?php

class Home_Form_Login extends EasyBib_Form
{

    public function init()
    {        
        $this->setAttrib('class', 'form-horizontal');        
        $username        = new Zend_Form_Element_Text('username');
        $password        = new Zend_Form_Element_Password('password');        
        $submit      = new Zend_Form_Element_Button('submit');
        

        $username->setLabel('Username')
            ->setRequired(true)
            ->setAttribs(array('class' => 'span3 required', 'placeholder' => 'Username'));

        $password->setLabel('Password')
            ->setRequired(true)
            ->setAttribs(array('class' => 'span3 required', 'placeholder' => 'Password'));

        $submit->setLabel('Login')->setIgnore(true);
        

        // add elements
        $this->addElements(array(
            $username, $password, $submit));

        // add display group
        $this->addDisplayGroup(
            array('username', 'password', 'submit'),
            'logins'
        );
        $this->getDisplayGroup('logins')->setLegend('Login');

        // set decorators
        EasyBib_Form_Decorator::setFormDecorator($this, EasyBib_Form_Decorator::BOOTSTRAP, 'submit');

    }


}

