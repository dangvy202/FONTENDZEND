<?php
class UserController extends Controller
{
    public function __construct($arrParams)
    {
        parent::__construct($arrParams);
        $this->_templateObj->setFolderTemplate('client/main/');
        $this->_templateObj->setFileTemplate('index.php');
        $this->_templateObj->setFileConfig('template.ini');
        $this->_templateObj->load();
    }
    //MUA HÀNG
    public function orderAction(){
        $cart = Session::get('cart');
        
        $bookID = $this->_arrParam['book_id'];
        $price  = $this->_arrParam['price'];
        if(empty($cart)){
            $cart['quantity'][$bookID]  = $this->_arrParam['quantity'];
            $cart['price'][$bookID]     = $price * $cart['quantity'][$bookID];
        }else{
            if(key_exists($bookID,$cart['quantity'])){
                $cart['quantity'][$bookID]  += $this->_arrParam['quantity'];
                $cart['price'][$bookID]     = $price * $cart['quantity'][$bookID];
            }else{
                $cart['quantity'][$bookID]  = $this->_arrParam['quantity'];
                $cart['price'][$bookID]     = $price * $cart['quantity'][$bookID];
            }
        }
        Session::set('cart',$cart);
        URL::redirect('client','book','detail', ['book_id' => $bookID] );
    }
    //LƯU ĐẶT HÀNG
    public function cartsuccessAction(){
        $user       = Session::get('user');
        $orderCart  = Session::get('cart'); 
        if(isset($orderCart)){
            if(isset($user)){
                Session::delete('orderCart');
                $this->_view->addOrder = $this->_model->saveItem($this->_arrParam,[ 'task' => 'addOrderCart' ]);
            }else{
                Session::set('orderCart','Đăng nhập mới mua hàng được');
                URL::redirect('client','user','login');
            }
        }
    }
    //HỦY SẢN PHẨM ĐÃ MUA
    public function destroyproductAction(){
        $id = $this->_arrParam['id'];
        $cart = Session::get('cart');
        if(isset($cart)){
            foreach($cart as $keyCart => $valueCart){
                unset($cart[$keyCart][$id]);
            }
        }
        Session::set('cart', $cart);
        URL::redirect('client','user','cart');
    }
    //GIỎ HÀNG
    public function cartAction(){
        $this->_view->title     = ucfirst('GIỎ HÀNG');
        $this->_view->_title    = strtoupper('GIỎ HÀNG');
        $this->_view->items     = $this->_model->listItem($this->_arrParam,[ 'task' => 'books-in-cart']);
        $this->_view->render('user/cart');
    }
    //KIỂM TRA XÁC NHẬN MAIL
    public function verticalAction(){
        $this->_view->render('user/vertical');
    }
    //THÔNG TIN TÀI KHOẢN
    public function infoAction(){
        $this->_view->title     = ucfirst('THÔNG TIN TÀI KHOẢN');
        $this->_view->_title    = strtoupper('THÔNG TIN TÀI KHOẢN');
        $this->_view->userInfo  = Session::get('user');
        if(!empty($_FILES)) $this->_arrParam['form']['picture'] = $_FILES['picture'];

        if(isset($this->_arrParam['form']['token']) > 0){
            $valid = new Validate($this->_arrParam['form']);
            $valid  ->addRule('fullname','string',['min' => 3 , 'max' => 255])
                    ->addRule('picture','file', array('min' => 100, 'max' => 1000000, 'extension' => array('jpg', 'png')), false);
            $valid  ->run();
            $this->_arrParam['form'] = $valid->getResult();
            if($valid->isValid() == false){
                $this->_view->errors = $valid->showErrors();
            }
            else{
                $id = $this->_model->editItem($this->_arrParam,$_SESSION['user']['info']['id'],['task' => "edit"]);
                URL::redirect($this->_arrParam['module'],$this->_arrParam['controller'],'info',['id' => $id]);
            }
        }
        $this->_view->render('user/info');
    }
    //ĐĂNG NHẬP CLIENT
    public function loginAction(){
        $this->_view->title = ucfirst('ĐĂNG NHẬP');
        $this->_view->_title = strtoupper('ĐĂNG NHẬP');
        if(isset($this->_arrParam['form']['token']) > 0){
            $validate = new Validate($this->_arrParam['form']);
            $username = $this->_arrParam['form']['username'];
            $password = md5($this->_arrParam['form']['password']);
            $query = "SELECT `id` FROM `user` WHERE `username` = '$username' AND `password` = '$password' ";
            $validate   ->addRule('username','existRecord',['database' => $this->_model, 'query' => $query])
                        ->addRule('password','existRecord',['database' => $this->_model, 'query' => $query]);
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
                if( $arrSession['group_acp'] == 1){
                    URL::redirect('backend','index','index');
                }else{
                    URL::redirect('client','index','index');
                }
            }else{
                $infoUser = $this->_model->infoItem($this->_arrParam);
                $this->_view->errors = $validate->showErrors();
            }
        }
        $this->_view->render('user/login');
    }
    //ĐĂNG XUẤT TÀI KHOẢN
    public function logoutAction(){
        Session::delete('user');
        URL::redirect("client","index","index");
    }
    //FORM ĐĂNG KÝ THÀNH VIÊN
    public function registerAction()
    {
        $this->_view->title = ucfirst('ĐĂNG KÝ');
        $this->_view->_title = strtoupper('ĐĂNG KÝ');
        if(isset($this->_arrParam['form']['submit'])){
            if(Session::get('token') == $this->_arrParam['form']['token']){
                Session::delete('token');
            }else{
                Session::set('token',$this->_arrParam['form']['token']);
            }
            $queryUserName	= "SELECT `id` FROM `".TBL_USER."` WHERE `username` = '".$this->_arrParam['form']['username']."'";
            $queryEmail		= "SELECT `id` FROM `".TBL_USER."` WHERE `email` = '".$this->_arrParam['form']['email']."'";
            
            $valid = new Validate($this->_arrParam['form']);
            $valid  //->addRule('username', 'string-notExistRecord', array('database' => $this->_model, 'query' => $queryUserName, 'min' => 3, 'max' => 25))
                    ->addRule('fullname' ,'string',['min' => 3 , 'max' => 255])
                    ->addRule('email', 'email-notExistRecord', array('database' => $this->_model, 'query' => $queryEmail));
            $valid  ->run();
            $this->_arrParam['form'] = $valid->getResult();
            if($valid->isValid() == false){ 
                $this->_view->errors = $valid->showErrors();
            }
            else{
                $this->_view->haha = $this->_model->saveItem($this->_arrParam,['task' => 'user-register']);
                // URL::redirect('client','user','vertical');
            }
        }
        $this->_view->render('user/register');
    }
    public function checkAction(){
        if(isset($this->_arrParam['form']['submit'])){
            if(Session::get('token') == $this->_arrParam['form']['token']){
                Session::delete('token');
            }else{
                Session::set('token',$this->_arrParam['form']['token']);
            }
            $queryUserName	= "SELECT `id` FROM `".TBL_USER."` WHERE `username` = '".$this->_arrParam['form']['username']."'";
            $queryEmail		= "SELECT `id` FROM `".TBL_USER."` WHERE `email` = '".$this->_arrParam['form']['email']."'";
            
            $valid = new Validate($this->_arrParam['form']);
            $valid  //->addRule('username', 'string-notExistRecord', array('database' => $this->_model, 'query' => $queryUserName, 'min' => 3, 'max' => 25))
                    ->addRule('fullname' ,'string',['min' => 3 , 'max' => 255])
                    ->addRule('email', 'email-notExistRecord', array('database' => $this->_model, 'query' => $queryEmail));
            $valid  ->run();
            $this->_arrParam['form'] = $valid->getResult();
            if($valid->isValid() == false){ 
                $this->_view->errors = $valid->showErrors();
            }
            else{
                $this->_view->haha = $this->_model->saveItem($this->_arrParam,['task' => 'user-register']);
                // URL::redirect('client','user','vertical');
            }
        }
        // URL::redirect('client')
        $this->_view->render('user/register');
    }
}
