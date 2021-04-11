<?php
class UserModel extends Model
{
	private $_columns = [   'id' , 'username' , 'email' , 'fullname' ,'picture', 'password' , 'created' , 'created_by' , 'modified' , 'modified_by' , 
                            'register_date ', 'register_ip' , 'status' , 'ordering' , 'group_id'    ];
    public function __construct()
    {
        parent::__construct();
        $this->setTable(TBL_USER);
    }
    //LẤY DANH SÁCH
    public function listItem($arrParam, $options = null)
    {
        if($options['task'] == 'books-in-cart'){
            $cart = Session::get('cart');
            $result = [];
            if(!empty($cart)){
                $ids = '(';
                foreach($cart['quantity'] as $key => $value) $ids .= "'$key',";
                $ids .= "'0')";
                $query[] = "SELECT `id`, `name`, `picture`,`price`";
                $query[] = "FROM `book`";
                $query[] = "WHERE `status` = 'active' AND `id` IN  $ids";
                $query[] = "ORDER BY `ordering` ASC";
                $query = implode(" ",$query);
                $result = $this->fetchAll($query);
                foreach ($result as $key => $value){
                    $result[$key]['quantity']   = $cart['quantity'][$value['id']];
                    $result[$key]['totalPrice'] = $cart['price'][$value['id']];
                }
                return $result;
            }
        }
    }
    public function infoItem($arrParam , $option = null){
        if($option == null){
            $username = $arrParam['form']['username'];
            $password = !empty($arrParam['form']['password']) ?  md5($arrParam['form']['password']) : null;
            $query[] = "SELECT `u`.`id` , `u`.`fullname` , `u`.`email` , `u`.`group_id` , `u`.`picture` , `g`.`group_acp` , `g`.`name` ";
            $query[] = "FROM `user` AS `u` LEFT JOIN `group` AS `g` ON `u`.`group_id` = `g`.`id` ";
            $query[] = "WHERE `username` = '$username' AND `password` = '$password' ";
            $query = implode(" " , $query);
            $result = $this->fetchRow($query);
            return $result;
        }
    }
    //SAVE ITEMS
    public function saveItem($arrParam, $options = null)
    {
        if($options['task'] == 'user-register'){
            
            $arrParam['form']['password']           = md5($arrParam['form']['password']);
            $arrParam['form']['register_date']      = date('Y-m-d H:i:s',time());
            $arrParam['form']['register_ip']        = $_SERVER['REMOTE_ADDR'];
            $arrParam['form']['status']             = 'inactive';
            $arrParam['form']['group_id']             = 3;
            $data = array_intersect_key($arrParam['form'],array_flip($this->_columns));
            $this->insert($data);
            return $this->lastID();
        }
        //ADD ORDER CART
        if($options['task'] == 'addOrderCart'){
            require_once LIBRARY_EXT_PATH.'Upload.php';
            $uploadObj = new Upload();
            echo '<pre>';
            print_r($arrParam['form']);
            echo '</pre>';
            
            $id             = $uploadObj->randomString(10);
            $date           = date('Y-m-d H:i:s',time());
            $nameOrder      = $_SESSION['user']['info']['email'];
            $books          = json_encode($arrParam['form']['book_id']);
            $prices         = json_encode($arrParam['form']['price']);
            $quantities     = json_encode($arrParam['form']['quantity']);
            $nameProducts   = json_encode($arrParam['form']['name']);
            $picture        = json_encode($arrParam['form']['picture']);
            $query[]    = "INSERT INTO `cart` (`id`,`username`,`books`,`prices`,`quantities`,`status`,`date`,`names`,`pictures`)"; 
            $query[]    = "VALUES              ('$id','$nameOrder','$books','$prices','$quantities',0,'$date','$nameProducts','$picture')";
            echo $query      = implode(" ",$query);
            $this->query($query);
            Session::delete('cart');
        }
    }
    public function editItem($arrParam, $id ,$options = null){
        
        if($options['task'] == 'edit'){
            require_once LIBRARY_EXT_PATH.'Upload.php';
            $uploadObj = new Upload();
            $arrParam['form']['picture']    = $uploadObj->uploadFile($arrParam['form']['picture'],'user');
            $arrParam['form']['register_ip']        = $_SERVER['REMOTE_ADDR'];
            $data = array_intersect_key($arrParam['form'],array_flip($this->_columns));
            $this->update($data, array(array('id',$id)) );
            if ($data > 0) {
                HelperBackend::setNotify('success', SUCCESS_UPDATE);
            } else {
                HelperBackend::setNotify('error', ERROR_NOTICE);
            }
            return $arrParam['form']['id'];
        }
    }
}
