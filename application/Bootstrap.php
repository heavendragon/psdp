<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    public function _initModuleLoaders()
    {
        $this->bootstrap('FrontController');
        $fc = $this->getResource('FrontController');

        $modules = $fc->getControllerDirectory();
        foreach($modules as $module => $dir):
            $moduleName = strtolower($module);
            $moduleName = str_replace(array('-', '.'), " ", $moduleName);
            $moduleName = ucwords($moduleName);
            $moduleName = str_replace(' ', '', $moduleName);

            $loader = new Zend_Application_Module_Autoloader(array(
                'namespace' => $moduleName,
                'basePath' => $dir . '/../'));
        endforeach;
    }

    protected function _initView()
    {
        $view = new Zend_View();
        $view->doctype('XHTML1_STRICT');

        $view->headTitle('PSPD _')->setSeparator(' - ');
        $view->headMeta()
                ->appendHttpEquiv('Expires', gmdate('D, d M Y H:i:s', time( ) + 10800) . ' GMT')
                ->appendHttpEquiv('Cache-Control', 'must-revalidate')
                ->appendHttpEquiv('Content-Type', 'application/xhtml+xml; charset=utf-8')
                ->appendHttpEquiv('Accept-Encoding', 'gzip, deflate')
                ->appendHttpEquiv('Content-Encoding', 'deflate')
                ->setName('description', 'Perencanaan Sumber Daya Pendidikan')
                ->setName('keywords', 'pendidikan sekolah education')
                ->setName('robots', 'index, follow');

        $view->headLink()->headLink(array('rel' => 'favicon', 'href'=> '/favicon.ico','type' => 'image/x-icon'), 'PREPEND');

        $view->headLink()->appendStylesheet($view->baseUrl('css/reset.css'));
        //$view->headLink()->appendStylesheet($view->baseUrl('themes/base/minified/jquery.ui.all.min.css'));

        $view->headLink()->appendStylesheet($view->baseUrl('css/bootstrap.css'));
        $view->headLink()->appendStylesheet($view->baseUrl('css/bootstrap-responsive.css'));


        $view->addHelperPath('ZendX/JQuery/View/Helper', 'ZendX_JQuery_View_Helper');

        $view->addHelperPath('Vx/View/Helper', 'Vx_View_Helper');
        $view->addHelperPath('EasyBib/View/Helper', 'EasyBib_View_Helper');
        //$view->JQuery()->enable()->setVersion('1.7.2');
        //$view->JQuery()->uiEnable()->setUiVersion('1.8.18');
        $view->JQuery()->setLocalPath($view->baseUrl('js/jquery.min.js'))->enable();
        $view->headScript()->appendFile($view->baseUrl('js/bootstrap/bootstrap-dropdown.js'));
        //$view->JQuery()->setUiLocalPath($view->baseUrl('js/ui/jquery-ui.min.js'))->uiEnable();

        $auth = Zend_Auth::getInstance();
        if($auth->hasIdentity()):
            $view->activeUser = ucfirst($auth->getIdentity()->username);
        endif;

        $viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('ViewRenderer');
        $viewRenderer->setView($view);
        return $view;
    }

    protected function _initAuthLayout()
    {
        $this->bootstrap('Layout');
        $layout = $this->getResource('Layout');
        if(Zend_Auth::getInstance()->hasIdentity()):
            $layout->setLayout('authorized');
        else:
            $layout->setLayout('layout');
        endif;

        return $layout;
    }
}

