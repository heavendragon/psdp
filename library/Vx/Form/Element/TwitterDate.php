<?php
/**
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Jquery Date Picker - bootstrap twitter
 *
 * @category   Vx
 * @package    Form
 * @subpackage Form_Element
 * @author     heaven-dragon <poweredby.zendframework@gmail.com>
 */
class Vx_Form_Element_TwitterDate extends ZendX_JQuery_Form_Element_DatePicker
{
    public function init()
    {
        $this->addDecorators(array(
            array('UiWidgetElement', array('tag' => '')),
            array('Errors'),
            array('Description', array('tag' => 'p', 'class' => 'help-block')),
            array(array('data' => 'HtmlTag'), array('tag' => 'div', 'class' => 'controls')),
            array('Label', array('class' => 'control-label')), 
            array(array('row' => 'Htmltag'), array('tag' => 'div', 'class' => 'control-group'))            
        ));
        $this->setJQueryParams(array(
            'dateFormat'=> 'yy-mm-dd',
            'numberOfMonths' => 1,
            'changeMonth' => true,
            'changeYear' => true,
            'showButtonPanel' => true
        ));
    }
}

