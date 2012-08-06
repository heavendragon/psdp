<?php

/**
 * Select Input based twitter-bootstrap
 * 
 * @category Vx
 * @package  Form
 * @author   heaven-dragon <poweredby.zendframework@gmail.com>
 */

class Vx_Form_Element_TwitterSelect extends Zend_Form_Element_Select
{
    public function init()
    {
        $this->addDecorators(array(
            'ViewHelper',
            'Errors',
            array('Description', array('tag' => 'p', 'class' => 'help-block')),
            array(array('data' => 'HtmlTag'), array('tag' => 'div', 'class' => "controls")),            
            array('Label', array('class' => 'control-label')), 
            array(array('row' => 'Htmltag'), array('tag' => 'div', 'class' => 'control-group'))            
        ));        
    }
}