<?php

/**
 * Textarea element based on bootstrap twitter
 * 
 * @category   Vx
 * @package    Vx_Form
 * @subpackage Vx_Form_Element
 * @author     heaven-dragon <poweredby.zendframework@gmail.com>
 */

class Vx_Form_Element_TwitterTextareaIcon extends Zend_Form_Element_Textarea
{
    public function init()
    {
        $this->addDecorators(array(
            'ViewHelper',
            'Errors',
            array('Description', array('tag' => 'p', 'class' => 'help-block')),
            array(array('icon' => 'HtmlTag'), array('tag' => 'span', 
                                                    'placement' => 'append', 
                                                    'class' => 'icon-plus new-value')),
            array(array('data' => 'HtmlTag'), array('tag' => 'div', 'class' => "controls")),            
            array('Label', array('class' => 'control-label')), 
            array(array('row' => 'Htmltag'), array('tag' => 'div', 'class' => 'control-group'))            
        ));

    }
}