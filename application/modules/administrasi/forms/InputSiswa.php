<?php

class Administrasi_Form_InputSiswa extends Zend_Form
{

    public function init()
    {
        $this->setAttrib('class', 'form-horizontal');
        $this->addElement('text', 'nis', array(
            'label' => 'NIS',
            'attribs' => array('class' => 'span4 required', 'placeholder' => 'Nomer Induk')
            ));
        $this->addElement('text', 'nama', array(
            'label' => 'Nama',
            'attribs' => array('class' => 'span4 required', 'placeholder' => 'Nama Siswa')
            ));
        
        $this->addElement('radio', 'jk', array(
            'label' => 'Jenis Kelamin',
            'attribs' => array('class' => 'required'),
            'multiOptions' => array('L' => 'Laki Laki', 'P' => 'Perempuan')));
        $this->addElement('submit', 'submit', array(
            'label' => 'Simpan',            
            'ignore' => true));

        $this->addDisplayGroup(array('nis', 'nama', 'jk', 'submit'), 'input-siswa');
        $this->getDisplayGroup('input-siswa')->setLegend('Input Data Siswa');

        EasyBib_Form_Decorator::setFormDecorator($this, EasyBib_Form_Decorator::BOOTSTRAP, 'submit');
    }


}

