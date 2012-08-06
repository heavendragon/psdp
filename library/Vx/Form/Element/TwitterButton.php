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
class Vx_Form_Element_TwitterButton extends Zend_Form_Element_Button
{
    public function init(){
        $this->addDecorators(array(
            'ViewHelper',
            'Errors',            
            array('Description', array('tag' => 'p', 'class' => 'help-block')),
            array(array('data' => 'HtmlTag'), array('tag' => 'div', 'class' => 'controls')), 
            //array('Label', array('class' => 'control-label', 'placement' => 'prepend')), 
            array(array('row' => 'Htmltag'), array('tag' => 'div', 'class' => 'control-group'))             
        ));
    }
}

