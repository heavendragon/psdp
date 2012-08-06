<?php

class Administrasi_Form_InputPelajaran extends EasyBib_Form
{

    public function init()
    {
        $this->setAttrib('class', 'form-horizontal');
        $this->addElement('text', 'kode', array(
            'label' => 'Kode',
            'attribs' => array('class' => 'span4 required', 'placeholder' => 'Kode')
            ));
        $this->addElement('text', 'nama', array(
            'label' => 'Nama',
            'attribs' => array('class' => 'span4 required', 'placeholder' => 'Nama Pelajaran')
            ));
        
        $this->addElement('textarea', 'keterangan', array(
            'label' => 'Keterangan',
            'attribs' => array('class' => 'span4', 'rows' => 3, 'placeholder' => 'Keterangan')
            ));
        $this->addElement('submit', 'submit', array(
            'label' => 'Simpan',            
            'ignore' => true));

        $this->addDisplayGroup(array('kode', 'nama', 'keterangan', 'submit'), 'input-pelajaran');
        $this->getDisplayGroup('input-pelajaran')->setLegend('Input Data Pelajaran');

        EasyBib_Form_Decorator::setFormDecorator($this, EasyBib_Form_Decorator::BOOTSTRAP, 'submit');
    }


}

