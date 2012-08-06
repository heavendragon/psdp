<?php

/**
 * Form layout based on bootstrap twitter
 * 
 * @category Vx
 * @package  Vx_Form
 * @author   heaven-dragon <poweredby.zendframework@gmail.com>
 */

class Vx_Form_TwitterBootstrap extends ZendX_JQuery_Form
{
    protected $_style = 'form-horizontal';
    public function init()
    {
        $this->addPrefixPath('Vx_Form_Element', 'Vx/Form/Element/', 'element');
        $this->addElementPrefixPath('Vx_Filter', 'Vx/Filter/', 'filter');
        $this->setMethod('post');

        $this->addElement('twitterSubmit', 'submit', array(
            'label' => 'Save',
            'ignore' => true,
            'order' => 100
        ));
    }

    public function loadDefaultDecorators()
    {
        $this->setDecorators(array(
            'FormElements',
            array('HtmlTag', array('tag' => 'fieldset')),
            array('Form', array('class' => $this->_style))
        ));
    }

    public function setStyle($style)
    {
        $this->_style = $style;
    }
}