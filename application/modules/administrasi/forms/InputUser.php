<?php

class Administrasi_Form_InputUser extends EasyBib_Form
{

    public function init()
    {
        $this->setAttrib('class', 'form-horizontal');
        
        $this->addElement('text', 'username', array(
            'label' => 'Username',
            'attribs' => array('class' => 'span4 required', 
                    'minLength' => 4,
                    'placeholder' => 'Username')
            ));
        $this->addElement('password', 'password', array(
            'label' => 'Password',
            'attribs' => array('class' => 'span4 required', 
                    'minLength' => 6,
                    'placeholder' => 'Password')
            ));
        $this->addElement('password', 'confirm', array(
            'label' => 'Confirm Password',
            'attribs' => array('class' => 'span4 required', 
                    'equalTo' => '#password',
                    'minLength' => 6,
                    'placeholder' => 'Confirm Password')
            ));
        
        $this->addElement('radio', 'role', array(
            'label' => 'Status',
            'attribs' => array('class' => 'required'),
            'multiOptions' => array('siswa' => 'Siswa', 'guru' => 'Guru', 'admin' => 'Admin')));
        $this->addElement('submit', 'submit', array(
            'label' => 'Simpan',            
            'ignore' => true));

        $this->addDisplayGroup(array('username', 'password', 'confirm', 'role', 'submit'), 'input-user');
        $this->getDisplayGroup('input-user')->setLegend('Input Pengguna Baru');

        EasyBib_Form_Decorator::setFormDecorator($this, EasyBib_Form_Decorator::BOOTSTRAP, 'submit');
    }


}

