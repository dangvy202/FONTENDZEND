<?php
    class IndexController extends Controller
    {
        public function __construct($arrParams)
        {
            parent::__construct($arrParams);
            $this->_templateObj->setFolderTemplate('client/main/');
            $this->_templateObj->setFileTemplate('index.php');
            $this->_templateObj->setFileConfig('template.ini');
            $this->_templateObj->load();
        }
        public function IndexAction(){
            $this->_view->title         = ucfirst($this->_arrParam['controller']) . ' Manager :: List';
            $this->_view->_title        = "THẾ GIỚI FAKE";
            $this->_view->specialBooks  = $this->_model->listItem($this->_arrParam, ['task' => 'book-special']); 
            $this->_view->saleBooks     = $this->_model->listItem($this->_arrParam, ['task' => 'book-sale']); 
            $this->_view->newProducts   = $this->_model->listItem($this->_arrParam, ['task' => 'new-products']); 
            $this->_view->render($this->_arrParam['controller'] . '/index');
        }
        public function contactAction(){
            $this->_view->title = ucfirst($this->_arrParam['controller']);
            $this->_view->_title = "LIÊN HỆ";
            $this->_view->render($this->_arrParam['controller'] . '/contact');
        }
    }
?>