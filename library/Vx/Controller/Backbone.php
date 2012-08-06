<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Backbone
 *
 * @author heaven-dragon
 */
class Vx_Controller_Backbone extends Zend_Controller_Action
{
     /**
     * @param string $table Table name
     * @param string $url redirect  url
     * @param array $list data
     * @return mixed
     *
     *
     *
     *
     */
    protected function _isAjaxPost($table, $url = '/', array $list = null, $delete = false, array $tblList = null, $code = false)
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
        
        // add new value to arrray
        $ajaxId[] = 'text'; 
        
        $value['field'] = trim($ajaxId[1]);  
        
        //new text value to submit
        $submittedValue = $this->_getParam('value');
                
        $value['value'] = $submittedValue;
        
        if($ajaxId[2] == 'select' && null != $list):
            $updatedView = $list[$submittedValue];
        else:
            $updatedView = $value['value'];
        endif;
        
        if(count($ajaxId) > 3 && $tblList):
            $table = $tblList[$ajaxId[3]];
        endif;
        
        $loadTable = Doctrine_Core::getTable($table);
        if($code):
            $load = $loadTable->findOneBy('id', $value['id']);
        else:
            $load = $loadTable->find($value['id']);
        endif;
        
        

        
        if($load !== FALSE):
            $load->$value['field'] = $value['value'];
            if(true === $delete && $ajaxId[2] == 'etd'):
                if(trim($value['value']) == ''):
                    $load->delete();
                    $updatedView = 'deleted';
                    $this->view->notify = 'Deleted';
                else:                    
                    $load->save();
                    $this->view->notification = array('Saved');
                endif;
            else:
                $load->save();
                $this->view->notification = array('Saved');
            endif;
            $this->view->notification = array('Saved');
            $this->view->update = $updatedView;
        endif;
    }
    
    protected function _generateCode($data, $first = 0, $length = 1)
    {        
        foreach(explode(" ", $data )as $v):
                        $n[] = substr($v, $first, $length);                
       endforeach;
       return strtoupper(implode($n));
    }
}

