<?php
class BookController extends Controller
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
    public function listAction()
    {
        $this->_view->title         = ucfirst('Category: '.$this->_model->infoItem($this->_arrParam, ['task' => 'get-category-name']));
        $this->_view->_title        = strtoupper($this->_arrParam['controller']);
        $this->_view->categoryName  = $this->_model->infoItem($this->_arrParam, ['task' => 'get-category-name']);
        $this->_view->items         = $this->_model->listItem($this->_arrParam, ['task' => 'book-in-category']);
        $this->_view->sum           = $this->_model->listItem($this->_arrParam, ['task' => 'sum-product']);
        $this->_view->render('book/list');
    }
    //LẤY LIST DANH SÁCH CATEGORY
    public function detailAction()
    {
        $this->_view->title         = ucfirst('Category: CHI TIẾT SẢN PHẨM');
        $this->_view->_title        = strtoupper('CHI TIẾT SẢN PHẨM');
        $this->_view->bookInfo      = $this->_model->infoItem($this->_arrParam, ['task' => 'book-info']);
        $this->_view->bookRelate    = $this->_model->listItem($this->_arrParam, ['task' => 'book-relate']);
        $this->_view->render('book/detail');
    }
    public function buyAction()
    {
        $this->_view->bookInfo      = $this->_model->infoItem($this->_arrParam, ['task' => 'book-info']);
        $this->_view->bookRelate    = $this->_model->listItem($this->_arrParam, ['task' => 'book-relate']);
        URL::redirect('client','book','detail');
    }
}
