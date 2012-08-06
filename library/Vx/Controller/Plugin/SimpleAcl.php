<?php

/**
 * Description of Auth
 *
 * @author heaven-dragon
 */
class Vx_Controller_Plugin_SimpleAcl extends Zend_Controller_Plugin_Abstract
{
    public function preDispatch(Zend_Controller_Request_Abstract $request) 
    {
        $auth = Zend_Auth::getInstance();
        if(!$auth->hasIdentity()){
            $role = 'public';
        }else{
            $role = $auth->getIdentity()->role;
        }
        
        $acl = new Zend_Acl();
        $acl->addRole(new Zend_Acl_Role('public'))
            ->addRole(new Zend_Acl_Role('siswa'), 'public')
                ->addRole(new Zend_Acl_Role('guru'), 'public')
                ->addRole(new Zend_Acl_Role('admin'), 'public');
                
        
        $acl->addResource(new Zend_Acl_Resource('home'))
                ->addResource(new Zend_Acl_Resource('install'))
                ->addResource(new Zend_Acl_Resource('administrasi'))
                ->addResource(new Zend_Acl_Resource('guru'));
        
        $resource = $request->getModuleName();
        $privilege = $request->getControllerName() . '/' . $request->getActionName();
        $acl->deny();
        $acl->allow('public', array('home', 'install'));
        $acl->deny('public', 'home', 'login/no-akses');
        $acl->allow(array('guru', 'admin'), 'home', 'login/no-akses');
        $acl->allow('guru', 'guru');
        $acl->allow('admin', 'administrasi');
        
        if(!$acl->isAllowed($role, $resource, $privilege)){
            $request->setModuleName('home')
                    ->setControllerName('login')                    
                    ->setActionName('no-akses')
                    ->setDispatched(true);
        }
        
        if(!$acl->has($resource)){
            throw new Exception($resource . ' was not on the resource list');
        }

       
    }
}

