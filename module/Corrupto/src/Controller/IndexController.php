<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Corrupto\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Corrupto\Model\Corrupto;

class IndexController extends AbstractActionController
{
    private $sm;
    
    public function __construct($sm)
    {
        $this->sm = $sm;
    }
    
    
    public function indexAction()
    {
        $corruptos = $this->sm
        ->get('CorruptoTable')
        ->getAll();
        return new ViewModel([
            'corruptos' => $corruptos
        ]);
    }
    
    public function editAction()
    {
        $codigo = $this->params('codigo');
        
        $corrupto = $this->sm
        ->get('CorruptoTable')
        ->get($codigo);
        
        return new ViewModel([
            'corrupto' => $corrupto
        ]);
    }
    
    public function saveAction()
    {
        $corrupto = new Corrupto();
        $corrupto->exchangeArray($_POST);
        
        $this->sm->get('CorruptoTable')
        ->save($corrupto);
        
        $this->redirect()->toRoute('corrupto');
          
    }
    
    public function deleteAction()
    {
        $codigo = $this->params('codigo');
        
        $this->sm->get('CorruptoTable')
        ->delete($codigo);
        
        $this->redirect()->toRoute('corrupto');        
    }
    
    
    
}
