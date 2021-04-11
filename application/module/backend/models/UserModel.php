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

    //LẤY THÔNG TIN CHỈNH SỬA
    public function infoItem($arrParam,$options = null){
        if($options == null){
            $query[] = "SELECT `id`, `username`, `email`, `fullname`, `password`, `status`, `group_id`";
            $query[] = "FROM `$this->table`";
            $query[] = "WHERE `id` = '$arrParam[id]'";
            $query   = implode(" ",$query);
            $result  = $this->fetchRow($query);
            return $result;
        }
    }

    //SAVE ITEMS
    public function saveItem($arrParam, $options = null)
    {
        if($options['task'] == 'add'){
            require_once LIBRARY_EXT_PATH.'Upload.php';
            $uploadObj = new Upload();

            $arrParam['form']['picture']    = $uploadObj->uploadFile($arrParam['form']['picture'],'user');
            $arrParam['form']['password']    = md5($arrParam['form']['password']);
            $arrParam['form']['created']     = date('Y-m-d H:i:s',time());
            $arrParam['form']['created_by']  =  $_SESSION['user']['info']['name'];
            $data = array_intersect_key($arrParam['form'],array_flip($this->_columns));
            $this->insert($data);
            if ($data > 0) {
                HelperBackend::setNotify('success', SUCCESS_INSERT);
            } else {
                HelperBackend::setNotify('error', ERROR_NOTICE);
            }
            return $this->lastID();
        }
        if($options['task'] == 'edit'){
            require_once LIBRARY_EXT_PATH.'Upload.php';
            $uploadObj = new Upload();

            $arrParam['form']['picture']    = $uploadObj->uploadFile($arrParam['form']['picture'],'user');
            $arrParam['form']['modified']    = date('Y-m-d H:i:s',time());
            $arrParam['form']['modified_by'] = $_SESSION['user']['info']['name'];
            $data = array_intersect_key($arrParam['form'],array_flip($this->_columns));
            $this->update($data, array(array('id',$arrParam['form']['id'])) );
            if ($data > 0) {
                HelperBackend::setNotify('success', SUCCESS_UPDATE);
            } else {
                HelperBackend::setNotify('error', ERROR_NOTICE);
            }
            return $arrParam['form']['id'];
        }
    }

    public function countItem($arrParam, $options = null)
    {
        $query[] = "SELECT COUNT(`id`) as `total`";
        $query[] = "FROM `$this->table`";
        $query[] = "WHERE `id` > 0";

        if (isset($arrParam['search_value']) && trim($arrParam['search_value']) != '') {
            $searchValue = trim($arrParam['search_value']);
            $query[] = "AND `username` LIKE '%$searchValue%'";
        }

        if (isset($arrParam['filter_groupacp']) && $arrParam['filter_groupacp'] != 'default') {
            $query[] = "AND `group_id` = {$arrParam['filter_groupacp']}";
        }

        if (isset($arrParam['filter_status']) && $arrParam['filter_status'] != 'all') {
            $query[] = "AND `status` = '{$arrParam['filter_status']}'";
        }

        $query = implode(" ", $query);
        $result = $this->fetchRow($query);
        return $result['total'];
    }

    //LẤY THÔNG TIN GROUP
    public function listGroup($arrParam,$options = null)
    {
        // $tableGroup = TBL_GROUP;
        // $query[] = "SELECT `id`, `name`";
        // $query[] = "FROM `$tableGroup`";
        // $query[] = "WHERE `id` > 0";
        // $query = implode(" ", $query);
        // $result = $this->fetchPairs($query);
        // return $result;
        // if($option == null){
			$query 	= "SELECT `id`, `name` FROM `" . TBL_GROUP . "`";
			$result = $this->fetchPairs($query);
			$result['default'] = "- Select Group -";
			ksort($result);
		// }
		return $result;
    }

    //LẤY THÔNG TIN DANH SÁCH
    public function listItem($arrParam, $options = null)
    {
        $query[] = "SELECT `u`.`id`, `u`.`username`, `u`.`email`, `u`.`fullname`, `u`.`created`, `u`.`created_by`, `u`.`modified`, `u`.`modified_by`, `u`.`register_date`, `u`.`register_ip`, `u`.`status`, `u`.`ordering`, `u`.`group_id` , `g`.`name` AS `group_name`";
        $query[] = "FROM `$this->table` AS `u` LEFT JOIN `". TBL_GROUP . "` AS `g` ON `u`.`group_id` = `g`.`id` ";
        $query[] = "WHERE `u`.`id` > 0";
        //TÌM KIẾM TỪ KHÓA
        if (isset($arrParam['search_value']) && trim($arrParam['search_value']) != '') {
            $searchValue = trim($arrParam['search_value']);
            $query[] = "AND `u`.`username` LIKE '%$searchValue%'";
        }

        if (isset($arrParam['filter_groupacp']) && $arrParam['filter_groupacp'] != 'default') {
            $query[] = "AND `u`.`group_id` = {$arrParam['filter_groupacp']}";
        }

        if (isset($arrParam['filter_status']) && $arrParam['filter_status'] != 'all') {
            $query[] = "AND `u`.`status` = '{$arrParam['filter_status']}'";
        }

        //PAGINATION
        $pagination = $arrParam['pagination'];
        $totalItemsPerPage = $pagination['totalItemsPerPage'];
        if($totalItemsPerPage > 0 ){
            $position = ( $pagination['currentPage'] - 1 ) * $totalItemsPerPage;
            $query[] = "LIMIT $position,$totalItemsPerPage";
        }
        $query = implode(" ", $query);
        $result = $this->fetchAll($query);
        return $result;
    }

    public function changeStatus($arrParam, $options = [])
    {
        $status = $arrParam['status'] == 'active' ? 'inactive' : 'active';
        $query = "UPDATE `$this->table` SET `status` = '$status' WHERE `id` = {$arrParam['id']}";
        $this->query($query);

        if ($this->affectedRows() > 0) {
            HelperBackend::setNotify('success', SUCCESS_UPDATE_STATUS);
        } else {
            HelperBackend::setNotify('error', ERROR_NOTICE);
        }
    }

    public function changeGroupACP($arrParam, $options = [])
    {
        $groupACP = $arrParam['group_acp'] == 1 ? 0 : 1;
        $query = "UPDATE `$this->table` SET `group_acp` = '$groupACP' WHERE `id` = {$arrParam['id']}";
        $this->query($query);

        if ($this->affectedRows() > 0) {
            HelperBackend::setNotify('success', SUCCESS_UPDATE_GROUPACP);
        } else {
            HelperBackend::setNotify('error', ERROR_NOTICE);
        }
    }
    //XÓA NHIỀU PHẨN TỬ
    public function trashItems($arrParam,$options = [])
    {
        $arrCheckboxAction = $arrParam['checkbox'];
        $affectedRows = $this->delete($arrCheckboxAction);

        if ($affectedRows > 0) {
            HelperBackend::setNotify('success', SUCCESS_DELETE);
        } else {
            HelperBackend::setNotify('error', ERROR_NOTICE);
        }
    }
    //XÓA 1 PHẦN TỬ
    public function deleteItem($arrParam, $options = [])
    {
        $ids = [$arrParam['id']];
        $affectedRows = $this->delete($ids);

        if ($affectedRows > 0) {
            HelperBackend::setNotify('success', SUCCESS_DELETE);
        } else {
            HelperBackend::setNotify('error', ERROR_NOTICE);
        }
    }

    public function countItems($arrParam, $options = [])
    {
        if ($options['task'] == 'count-active') {
            $query = "SELECT count(`id`) as `total` FROM `$this->table` WHERE `status` = 'active'";
            $result = $this->fetchRow($query);
            return $result['total'];
        }

        if ($options['task'] == 'count-inactive') {
            $query = "SELECT count(`id`) as `total` FROM `$this->table` WHERE `status` = 'inactive'";
            $result = $this->fetchRow($query);
            return $result['total'];
        }
    }

    public function activeItems($arrParam, $options = [])
    {
        $ids = $arrParam['checkbox'];
        $ids = implode(', ', $ids);
        $query = "UPDATE `$this->table` SET `status` = 'active' WHERE `id` IN ($ids)";
        $this->query($query);
        HelperBackend::setNotify('success', SUCCESS_UPDATE_STATUS);
    }

    public function inactiveItems($arrParam, $options = [])
    {
        $ids = $arrParam['checkbox'];
        $ids = implode(', ', $ids);
        $query = "UPDATE `$this->table` SET `status` = 'inactive' WHERE `id` IN ($ids)";
        $this->query($query);
        HelperBackend::setNotify('success', SUCCESS_UPDATE_STATUS);
    }
    //LẤY HÌNH ẢNH TỪ FLODER FILE PICTURE
    public function listPicture($arrParam,$options = null){
        $dir        = UPLOAD_PATH.$arrParam;
        $getDir = scandir($dir);
        foreach($getDir as $keyDir => $valueDir)
        {
            if($valueDir == "." || $valueDir == "..")
            {
                unset($getDir[$keyDir]);
            }   
        }
        return $getDir;
    }
    //XÓA NHIỀU HÌNH ẢNH
    public function trashPicture($arrParam,$options = []){
        require_once LIBRARY_EXT_PATH.'Upload.php';
        $ids = $arrParam['checkbox'];
        $uploadObj = new Upload();
        $uploadObj->removeFile($arrParam['controller'], $ids);
        HelperBackend::setNotify('success', SUCCESS_PICTURE);
    }
}
