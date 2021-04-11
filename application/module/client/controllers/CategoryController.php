<?php
class CategoryController extends Controller
{
    public function __construct($arrParams)
    {
        parent::__construct($arrParams);
        $this->_templateObj->setFolderTemplate('client/main/');
        $this->_templateObj->setFileTemplate('index.php');
        $this->_templateObj->setFileConfig('template.ini');
        $this->_templateObj->load();
    }
    //LẤY LIST DANH SÁCH CATEGORY
    public function indexAction()
    {
        $this->_view->title = ucfirst($this->_arrParam['controller']) . ' List';
        $this->_view->_title = strtoupper($this->_arrParam['controller']);
        $this->_view->items = $this->_model->listItem($this->_arrParam, null);
        $this->_view->render('category/index');
    }
}
