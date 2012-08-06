<?php

class Install_Form_AdminUser extends Vx_Form_TwitterBootstrap
{

    public function init()
    {
        parent::init();

        $this->addElement('twitterText', 'username', array(
            'label' => 'Username',
            'required' => true,
            'attribs' => array('class' => 'span3 required unique', 'minLength' => 5,
                                'placeholder' => 'Username')));

        $this->addElement('twitterPassword', 'password', array(
            'label' => 'Password',
            'required' => true,
            'attribs' => array('class' => 'span3 required', 'minLength' => 6,
                            'placeholder' => 'Password')));

        $this->addElement('twitterPassword', 'confirm', array(
            'label' => 'Confirm Password',
            'required' => true,
            'attribs' => array('class' => 'span3 required', 'minLength' => 6,
                            'equalTo' => '#password', 'placeholder' => 'Confirm Password')));

        $this->getElement('submit')->setLabel('Create Admin');
    }


}

