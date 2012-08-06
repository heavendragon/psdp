<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Action
 *
 * @author heaven-dragon
 */
class Vx_Controller_Action extends Zend_Controller_Action
{
    


    public function init()
    {
        
    }
    
    /**
     * Server side of inline editing
     * 
     * @param Doctrine_Table $table 
     * @param string $url redirect location
     * @param array $list list for select input
     * @param boolean $delete flag for delete
     * @param array $tblList list of table model
     * @param string $code table field - DEPRECATED
     * @return string
     */
    protected function _isAjaxPost($table, $url = '/', array $list = null, 
                                   $delete = false, array $tblList = null, 
                                   $code = false)
    {
        if(!$this->_request->isPost()):
            $this->_redirect($url);
            return;
        endif;
        
        $ajaxId = explode('-',$this->_getParam('id'));
        $value['id'] = (int)$ajaxId[0];
        if(empty ($value['id']) || $value['id'] == 0):
            $this->_redirect($url);
            return;
        endif;
        
        /** ADD ARRAY TO PREVENT ERROR */
        $ajaxId[] = 'text'; 
        
        /** COLUMN TABLE */
        $value['field'] = trim($ajaxId[1]);  
        
        /** NEW VALUE */
        $submittedValue = trim($this->_getParam('value'));
        
        /** ATTACH NEW VALUE INTO ARRAY */  
        $value['value'] = $submittedValue;
        
        /** SELECT INPUT */
        if($ajaxId[2] == 'select' && null != $list):
            $updatedView = $list[$submittedValue];
        else:
            $updatedView = $value['value'];
        endif;
        
        /** ALTERNATE TABLE */
        if(count($ajaxId) > 3 && $tblList):
            $table = $tblList[$ajaxId[3]];
        endif;
        
        /** GET TABLE USING DOCTRINE_CORE */
        $loadTable = Doctrine_Core::getTable($table);
        /** GET SPECIFIED RECORD */
        $load = $loadTable->findOneBy('id', $value['id']);

        /** TO DO CROSS CHECK WITH AUTHOR */
        
        /** UNIQUE VALUE */
        $ATS = true;
        if($ajaxId[2] == 'unique'):
            $isExist = $loadTable->findOneBy($value['field'], $value['value']);
            if($isExist !== FALSE):
                $ATS = false;
            endif;
        endif;
        
        /** ENSURE THE RECORD WAS FOUND */
        if($load !== FALSE && $ATS):
            //$load->$value['field'] = $value['value'];
            /** ENABLE TO DELETED IF THERE's etd AND INPUT is EMPTY */
            if(true === $delete && $ajaxId[2] == 'etd'):
                /** DELETED VALUE IF NEW VALUE WAS EMPTY */
                if(trim($value['value']) == ''):
                    $load->delete();
                    $updatedView = 'deleted';
                    $this->view->notify = 'Deleted';
                /** SAVE NEW VALUE */
                else: 
                    $load->$value['field'] = $value['value'];                   
                    $load->save();
                    $this->view->notification = array('Saved');
                endif;
            else:
                $load->$value['field'] = $value['value'];
                $load->save();
                $this->view->notification = array('Saved');
            endif;
            $this->view->notification = array('Saved');

            /** VIEW NEW VALUE */
            echo $updatedView;
        else:
            /** OLD VALUE WAS NOT CHANGED */
            echo $load->$value['field'];
        endif;
    }

    protected function _uniqueValue($table, $column, $value, $alert = 'Please used another one')
    {
        $status = Doctrine_Core::getTable($table)->findOneBy($column, $value);
        $notification = array();
        if($status):                    
            $notification['alert'] = $alert;
        endif;
        echo Zend_Json::encode($notification);
    }


    
}

