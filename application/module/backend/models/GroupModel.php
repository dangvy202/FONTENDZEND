<?php
class GroupModel extends Model
{
    private $_columns = ['id', 'name', 'group_acp', 'created', 'created_by', 'modified', 'modified_by', 'status', 'ordering'];

    public function __construct()
    {
        parent::__construct();
        $this->setTable(TBL_GROUP);
    }

    //LẤY THÔNG TIN CHỈNH SỬA
    public function infoItem($arrParam,$options = null){
        if($options == null){
            $query[] = "SELECT `id`, `name`, `group_acp`, `status`";
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
            $query[] = "AND `name` LIKE '%$searchValue%'";
        }

        if (isset($arrParam['filter_groupacp']) && $arrParam['filter_groupacp'] != 'default') {
            $query[] = "AND `group_acp` = {$arrParam['filter_groupacp']}";
        }

        if (isset($arrParam['filter_status']) && $arrParam['filter_status'] != 'all') {
            $query[] = "AND `status` = '{$arrParam['filter_status']}'";
        }

        $query = implode(" ", $query);
        $result = $this->fetchRow($query);
        return $result['total'];
    }

    public function listItem($arrParam, $options = null)
    {
        $query[] = "SELECT `id`, `name`, `group_acp`, `status`, `ordering`, `created`, `created_by`, `modified`, `modified_by`";
        $query[] = "FROM `$this->table`";
        $query[] = "WHERE `id` > 0";

        if (isset($arrParam['search_value']) && trim($arrParam['search_value']) != '') {
            $searchValue = trim($arrParam['search_value']);
            $query[] = "AND `name` LIKE '%$searchValue%'";
        }

        if (isset($arrParam['filter_groupacp']) && $arrParam['filter_groupacp'] != 'default') {
            $query[] = "AND `group_acp` = {$arrParam['filter_groupacp']}";
        }

        if (isset($arrParam['filter_status']) && $arrParam['filter_status'] != 'all') {
            $query[] = "AND `status` = '{$arrParam['filter_status']}'";
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
}
