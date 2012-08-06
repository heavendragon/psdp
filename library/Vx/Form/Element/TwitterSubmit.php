<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TabularText
 *
 * @author nix
 */
class Vx_Form_Element_TwitterSubmit extends Zend_Form_Element_Submit
{
    public function init(){
        $this->addDecorators(array(
            'ViewHelper',
            'Errors',
            array('Description'),
            array(array('data' => 'HtmlTag'), array('tag' => 'div', 'class' => 'controls')),
            //array('Label', array('class' => 'control-label')), 
            array(array('row' => 'Htmltag'), array('tag' => 'div', 'class' => 'control-group')) 
        ));
        $this->addFilters(array('StringTrim'));
    }
}

