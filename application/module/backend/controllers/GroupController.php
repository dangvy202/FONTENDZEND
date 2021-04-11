<?php
class GroupController extends Controller
{
    public function __construct($arrParams)
    {
        parent::__construct($arrParams);
        $this->_templateObj->setFolderTemplate('backend/main/');
        $this->_templateObj->setFileTemplate('index.php');
        $this->_templateObj->setFileConfig('template.ini');
        $this->_templateObj->load();
    }
    //LẤY LIST GROUP
    public function indexAction()
    {
        $this->_view->title = ucfirst($this->_arrParam['controller']) . ' Manager :: List';
        $this->_view->_title = strtoupper($this->_arrParam['controller']);
        $this->_view->countActive = $this->_model->countItems($this->_arrParam, ['task' => 'count-active']);
        $this->_view->countInactive = $this->_model->countItems($this->_arrParam, ['task' => 'count-inactive']);
        $totalItems  = $this->_model->countItem($this->_arrParam,null);
        $configPagination = ['totalItemsPerPage'=> 5,'pageRange'=> 10];
        $this->setPagination($configPagination);
        $this->_view->pagination = new Pagination($totalItems,$this->_pagination);
        $this->_view->items = $this->_model->listItem($this->_arrParam, null);
        $this->_view->render($this->_arrParam['controller'] . '/index');
    }
    //LẤY FORM ACTION ADD VÀ EDIT
    public function formAction()
    {
        $this->_view->title = ucfirst($this->_arrParam['controller']) . " Manager : Add";
        $this->_view->_title = "ADD";
        if(isset($this->_arrParam['id'])){
            $this->_view->title = ucfirst($this->_arrParam['controller']) . " Manager : Edit";
            $this->_view->_title = "EDIT";
            $this->_arrParam['form'] = $this->_model->infoItem($this->_arrParam);
            if(empty($this->_arrParam['form'])) URL::redirect($this->_arrParam['module'],$this->_arrParam['controller'],'index');
        }

        if(isset($this->_arrParam['form']['token']) > 0){            
            $valid = new Validate($this->_arrParam['form']);
            $valid  ->addRule('name' ,'string',['min' => 3 , 'max' => 255])
                    ->addRule('status','status',['deny' => [0]])
                    ->addRule('group_acp','status',['deny' => ['default']]);
            $valid  ->run();
            $this->_arrParam['form'] = $valid->getResult();
            if($valid->isValid() == false){
                $this->_view->errors = $valid->showErrors();
            }
            else{
                $task = (isset($this->_arrParam['form']['id'])) ? "edit" : "add";
                $id = $this->_model->saveItem($this->_arrParam,['task' => $task]);
                if($this->_arrParam['type'] == 'save')         URL::redirect($this->_arrParam['module'],$this->_arrParam['controller'],'index',['id' => $id]);
                if($this->_arrParam['type'] == 'saveAndClose') URL::redirect($this->_arrParam['module'],$this->_arrParam['controller'],'index');
                if($this->_arrParam['type'] == 'saveAndNew')   URL::redirect($this->_arrParam['module'],$this->_arrParam['controller'],$this->_arrParam['action']);
            }
        }
        $this->_view->arrParam = $this->_arrParam;
        $this->_view->render($this->_arrParam['controller'].'/form');
    }
    //THAY ĐỔI STATUS
    public function changeStatusAction()
    {
        $this->_model->changeStatus($this->_arrParam, null);
        URL::redirect($this->_arrParam['module'], $this->_arrParam['controller'], 'index');
    }
    //THAY ĐỔI GROUP
    public function changeGroupACPAction()
    {
        $this->_model->changeGroupACP($this->_arrParam);
        URL::redirect($this->_arrParam['module'], $this->_arrParam['controller'], 'index');
    }
    //XÓA NHIỀU PHẦN TỬ
    public function multiDeleteAction(){
        $this->_model->trashItems($this->_arrParam);
        URL::redirect($this->_arrParam['module'], $this->_arrParam['controller'], 'index');
    }
    //XÓA 1 PHẦN TỬ
    public function deleteAction()
    {
        $this->_model->deleteItem($this->_arrParam);
        URL::redirect($this->_arrParam['module'], $this->_arrParam['controller'], 'index');
    }

    public function activeAction()
    {
        $this->_model->activeItems($this->_arrParam);
        URL::redirect($this->_arrParam['module'], $this->_arrParam['controller'], 'index');
    }

    public function inactiveAction()
    {
        $this->_model->inactiveItems($this->_arrParam);
        URL::redirect($this->_arrParam['module'], $this->_arrParam['controller'], 'index');
    }
}
