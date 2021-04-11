<?php
class ProductModel extends Model
{
    private $_columns = ['id','name','description','price','special','sale_off', 'picture', 'created', 'created_by', 'modified', 'modified_by', 'status', 'ordering','category_id'];

    public function __construct()
    {
        parent::__construct();
        $this->setTable(TBL_BOOK);
    }

    //LẤY THÔNG TIN CHỈNH SỬA
    public function infoItem($arrParam,$options = null){
        if($options == null){
            $query[] = "SELECT `id`,`name`,`description`,`price`,`special`,`sale_off`, `picture`, `created`, `created_by`, `modified`, `modified_by`, `status`, `ordering`,`category_id`";
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

            $arrParam['form']['picture']    = $uploadObj->uploadFile($arrParam['form']['picture'],'book');
            $arrParam['form']['created']    = date('Y-m-d H:i:s',time());
            $arrParam['form']['created_by'] = $_SESSION['user']['info']['name'];
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

            $arrParam['form']['picture']    = $uploadObj->uploadFile($arrParam['form']['picture'],'book');
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
        //TÌM KIẾM TỪ KHÓA
        if (isset($arrParam['search_value']) && trim($arrParam['search_value']) != '') {
            $searchValue = trim($arrParam['search_value']);
            $query[] = "AND `name` LIKE '%$searchValue%'";
        }
        //TÌM KIẾM STATUS
        if (isset($arrParam['filter_status']) && $arrParam['filter_status'] != 'all') {
            $query[] = "AND `status` = '{$arrParam['filter_status']}'";
        }
        //TÌM KIẾM SẢN PHẨM ĐẶC BIỆT
        if (isset($arrParam['filter_special']) && $arrParam['filter_special'] != 'default') {
            $query[] = "AND `special` = {$arrParam['filter_special']}";
        }
        //TÌM KIẾM THEO DANH SÁCH CATEGORY
        if (isset($arrParam['filter_category']) && $arrParam['filter_category'] != 0) {
            $query[] = "AND `category_id` = {$arrParam['filter_category']}";
        }
        $query = implode(" ", $query);
        $result = $this->fetchRow($query);
        return $result['total'];
    }
    //LẤY THÔNG TIN CATEGORY
    public function listCategory($arrParam,$options = null)
    {
        // $tableCategory = TBL_CATEGORY;
        // $query[] = "SELECT `id`, `name`";
        // $query[] = "FROM `$tableCategory`";
        // $query[] = "WHERE `id` > 0";
        // $query = implode(" ", $query);
        // $result = $this->fetchAll($query);
        // return $result;
        $query 	= "SELECT `id`, `name` FROM `" . TBL_CATEGORY . "`";
			$result = $this->fetchPairs($query);
			$result[0] = "- Select Category -";
			ksort($result);
		// }
		return $result;
    }
    public function listItem($arrParam, $options = null)
    {
        $query[] = "SELECT `p`.`id`, `p`.`name`, `p`.`picture`,`p`.`price`,`p`.`sale_off`,`p`.`category_id`,`p`.`created`,`p`.`created_by`,`p`.`status`,`p`.`ordering`,`p`.`special`,`p`.`modified`,`p`.`modified_by`,`c`.`id` AS `id_c`,`c`.`name` AS `cname`";
        $query[] = "FROM `$this->table` AS `p` LEFT JOIN `". TBL_CATEGORY . "` AS `c` ON `p`.`category_id` = `c`.`id` ";
        $query[] = "WHERE `p`.`id` > 0";
        //TÌM KIẾM TỪ KHÓA
        if (isset($arrParam['search_value']) && trim($arrParam['search_value']) != '') {
            $searchValue = trim($arrParam['search_value']);
            $query[] = "AND `p`.`name` LIKE '%$searchValue%'";
        }
        //TÌM KIẾM THEO STATUS
        if (isset($arrParam['filter_status']) && $arrParam['filter_status'] != 'all') {
            $query[] = "AND `p`.`status` = '{$arrParam['filter_status']}'";
        }
        //TÌM KIẾM SẢN PHẨM ĐẶC BIỆT
        if (isset($arrParam['filter_special']) && $arrParam['filter_special'] != 'default') {
            $query[] = "AND `p`.`special` = {$arrParam['filter_special']}";
        }
        //TÌM KIẾM THEO DANH SÁCH CATEGORY
        if (isset($arrParam['filter_category']) && $arrParam['filter_category'] != 0) {
            $query[] = "AND `p`.`category_id` = {$arrParam['filter_category']}";
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
    //THAY ĐỔI SẢN PHẨM ĐẶC BIỆT
    public function changeSpecial($arrParam, $options = []){
        $special = $arrParam['special'] == 1 ? 0 : 1;
        $query = "UPDATE `$this->table` SET `special` = '$special' WHERE `id` = {$arrParam['id']}";
        $this->query($query);
        
        if ($this->affectedRows() > 0) {
            HelperBackend::setNotify('success', SUCCESS_UPDATE_STATUS);
        } else {
            HelperBackend::setNotify('error', ERROR_NOTICE);
        }
    }
    //XÓA NHIỀU PHẨN TỬ
    public function trashItems($arrParam,$options = [])
    {
        require_once LIBRARY_EXT_PATH.'Upload.php';
        $uploadObj = new Upload();
        $arrCheckboxAction = $arrParam['checkbox'];
        foreach($arrCheckboxAction as $v){
            $query  = "SELECT `picture` FROM `$this->table` WHERE `id` IN ($v)";
            $arrImg = $this->fetchAll($query);
            $uploadObj->removeFile('category',$arrImg[0]['picture']);
        }
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
        require_once LIBRARY_EXT_PATH.'Upload.php';
        $uploadObj = new Upload();
        $ids = [$arrParam['id']];
        $query  = "SELECT `picture` FROM `$this->table` WHERE `id` IN ($ids[0])";
        $arrImg = $this->fetchAll($query);
        $uploadObj->removeFile('category',$arrImg[0]['picture']);
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
     //LẤY HÌNH ẢNH TỪ FLODER FILE PICTURE
    public function listPicture($arrParam,$options = null){
        $dir        = UPLOAD_PATH.'book';
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
        $uploadObj->removeFile('book', $ids);
        HelperBackend::setNotify('success', SUCCESS_PICTURE);
    }
    public function inactiveItems($arrParam, $options = [])
    {
        $ids = $arrParam['checkbox'];
        $ids = implode(', ', $ids);
        $query = "UPDATE `$this->table` SET `status` = 'inactive' WHERE `id` IN ($ids)";
        $this->query($query);
        HelperBackend::setNotify('success', SUCCESS_UPDATE_STATUS);
    }
}
