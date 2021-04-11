<?php
class IndexController extends Controller
{
    public function __construct($arrParams)
    {
        parent::__construct($arrParams);
        $this->_templateObj->setFolderTemplate('backend/main/');
        $this->_templateObj->setFileTemplate('index.php');
        $this->_templateObj->setFileConfig('template.ini');
        $this->_templateObj->load();
    }

    public function indexAction()
    {
        $this->_view->title = ucfirst($this->_arrParam['controller']) . ' Manager :: List';
        $this->_view->_title = strtoupper($this->_arrParam['controller']);
        $this->_view->countGroup = $this->_model->countGroup($this->_arrParam,null);
        $this->_view->countUser = $this->_model->countUser($this->_arrParam,null);
        $this->_view->countCategory = $this->_model->countCategory($this->_arrParam,null);
        $this->_view->countProduct = $this->_model->countProduct($this->_arrParam,null);
        $this->_view->countSlider = $this->_model->countSlider($this->_arrParam,null);
        $this->_view->render($this->_arrParam['controller'] . '/index');
    }
    //LOGIN ADMIN
    public function loginAction()
    {
        $this->_templateObj->setFolderTemplate('backend/main/');
        $this->_templateObj->setFileTemplate('login.php');
        $this->_templateObj->setFileConfig('template.ini');
        $this->_templateObj->load();
        $this->_view->_title = strtoupper("LOGIN");

        if(isset($this->_arrParam['form']['token']) > 0){
            $validate = new Validate($this->_arrParam['form']);
            $username = $this->_arrParam['form']['username'];
            $password = md5($this->_arrParam['form']['password']);
            $query = "SELECT `id` FROM `user` WHERE `username` = '$username' AND `password` = '$password' ";
            $validate->addRule('username','existRecord',['database' => $this->_model, 'query' => $query]);
            $validate->run();
            if($validate->isValid() == true){
                $infoUser = $this->_model->infoItem($this->_arrParam);
                $arrSession =   [
                                    'login'     => true,
                                    'info'      => $infoUser,
                                    'time'      => time(),
                                    'group_acp' => $infoUser['group_acp']
                                ]; 
                Session::set('user',$arrSession);
                URL::redirect('backend','index','index');
            }else{
                $this->_view->errors = $validate->showErrors();
            }
        }
        $this->_view->render('index/login');
    }
    //LOGOUT ACCOUNT
    public function logoutAction(){
        Session::delete('user');
        URL::redirect('backend','index','login');
    }
}
