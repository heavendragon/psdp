<?php

/**
 * Select Input based twitter-bootstrap
 * 
 * @category Vx
 * @package  Form
 * @author   heaven-dragon <poweredby.zendframework@gmail.com>
 */

class Vx_Form_Element_TwitterCheckbox extends Zend_Form_Element_Checkbox
{
    //public $helper = 'formCheckbox';
    public function init()
    {
        $this->addDecorators(array(
            'ViewHelper',
            'Errors',
            //array('Description', array('tag' => 'p', 'class' => 'help-block')),
            //array(array('data' => 'HtmlTag'), array('class' => "checkbox")),            
            
            array(array('label' => 'Htmltag'), array('tag' => 'label', 'class' => 'checkbox inline')),
            array('Label')            
        ));        
    }
}
