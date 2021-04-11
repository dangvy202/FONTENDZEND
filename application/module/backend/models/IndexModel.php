<?php
class IndexModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function infoItem($arrParam , $option = null){
        if($option == null){
            $username = $arrParam['form']['username'];
            $password = md5($arrParam['form']['password']);
            $query[] = "SELECT `u`.`id` , `u`.`fullname` , `u`.`email` , `u`.`group_id` , `u`.`picture` , `g`.`group_acp` , `g`.`name` ";
            $query[] = "FROM `user` AS `u` LEFT JOIN `group` AS `g` ON `u`.`group_id` = `g`.`id` ";
            $query[] = "WHERE `username` = '$username' AND `password` = '$password' ";
            $query = implode(" " , $query);
            $result = $this->fetchRow($query);
            return $result;
        }
    }
    //ĐẾM GROUP
    public function countGroup($arrParam, $option = null){
        $query = "SELECT COUNT(`id`) AS `total` FROM `group` WHERE `id` > 0";
        $result = $this->fetchRow($query);
        return $result['total'];
    }
    //ĐẾM USER
    public function countUser($arrParam, $option = null){
        $query = "SELECT COUNT(`id`) AS `total` FROM `user` WHERE `id` > 0";
        $result = $this->fetchRow($query);
        return $result['total'];
    }
    //ĐẾM category
    public function countCategory($arrParam, $option = null){
        $query = "SELECT COUNT(`id`) AS `total` FROM `category` WHERE `id` > 0";
        $result = $this->fetchRow($query);
        return $result['total'];
    }
    //ĐẾM product
    public function countProduct($arrParam, $option = null){
        $query = "SELECT COUNT(`id`) AS `total` FROM `book` WHERE `id` > 0";
        $result = $this->fetchRow($query);
        return $result['total'];
    }
    //ĐẾM slider
    public function countSlider($arrParam, $option = null){
        $query = "SELECT COUNT(`id`) AS `total` FROM `slider` WHERE `id` > 0";
        $result = $this->fetchRow($query);
        return $result['total'];
    }
}
?>