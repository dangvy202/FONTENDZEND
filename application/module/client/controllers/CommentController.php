<?php
class CommentController extends Controller
{
    public function __construct($arrParams)
    {
        parent::__construct($arrParams);
        $this->_templateObj->setFolderTemplate('client/main/');
        $this->_templateObj->setFileTemplate('index.php');
        $this->_templateObj->setFileConfig('template.ini');
        $this->_templateObj->load();
    }
    public function commentAction(){
        $result     = $this->_model->commentAjax($this->_arrParam, null);
        // return $result;
        // if($_SESSION['user']['login'] == true){
        //     if($this->_arrParam['form']['token'] > 0){
        //         $result = $this->_model->commentAjax($this->_arrParam, null);
        //         echo json_encode($result);
        //     }
        // }else{
        //     $this->_view->successMail = HelperBackend::setNotify('error', 'Chưa đăng nhập không comment được');
        //     URL::redirect('client','user','login');
        // }
    }
}
