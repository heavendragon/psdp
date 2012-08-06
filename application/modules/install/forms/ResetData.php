<?php

class Install_Form_ResetData extends EasyBib_Form
{

    public function init()
    {
        $this->setAttrib('class', 'form-horizontal');
        
        
        $this->addElement('multiCheckbox', 'resetdata', array(
            'label' => 'Reset Data',
            'attribs' => array('class' => 'required'),
            'multiOptions' => array('user' => 'User', 
                                    'siswa' => 'Siswa',
                                    'guru' => 'Guru',
                                    'pelajaran' => 'Pelajaran')));

        $this->addElement('submit', 'submit', array(
            'label' => 'Reset',            
            'ignore' => true));

        $this->addDisplayGroup(array('resetdata', 'submit'), 'reset-data');
        $this->getDisplayGroup('reset-data')->setLegend('Reset Data');

        EasyBib_Form_Decorator::setFormDecorator($this, EasyBib_Form_Decorator::BOOTSTRAP, 'submit');        
        
    }


}

