<?php

class Administrasi_Form_InputGuru extends EasyBib_Form
{

    public function init()
    {
        $this->setAttrib('class', 'form-horizontal');
        $this->addElement('text', 'nip', array(
            'label' => 'NIP',
            'attribs' => array('class' => 'span4 required', 'placeholder' => 'Nomer Induk')
            ));
        $this->addElement('text', 'nama', array(
            'label' => 'Nama',
            'attribs' => array('class' => 'span4 required', 'placeholder' => 'Nama Guru')
            ));
        
        $this->addElement('text', 'kode', array(
            'label' => 'Kode',
            'attribs' => array('class' => 'span4'),
            ));
        $this->addElement('submit', 'submit', array(
            'label' => 'Simpan',            
            'ignore' => true));

        $this->addDisplayGroup(array('nip', 'nama', 'kode', 'submit'), 'input-guru');
        $this->getDisplayGroup('input-guru')->setLegend('Input Data Guru');

        EasyBib_Form_Decorator::setFormDecorator($this, EasyBib_Form_Decorator::BOOTSTRAP, 'submit'); 
    }


}

