<?php
class CategoryModel extends Model
{
    private $_columns = ['id', 'name', 'picture', 'created', 'created_by', 'modified', 'modified_by', 'status', 'ordering'];

    public function __construct()
    {
        parent::__construct();
        $this->setTable(TBL_CATEGORY);
    }

    public function listItem($arrParam, $options = null)
    {
        $query[] = "SELECT `id`, `name`, `picture`";
        $query[] = "FROM `$this->table`";
        $query[] = "WHERE `status` = 'active'";
        $query[] = "ORDER BY `ordering` ASC";

            // if (isset($arrParam['search_value']) && trim($arrParam['search_value']) != '') {
            //     $searchValue = trim($arrParam['search_value']);
            //     $query[] = "AND `name` LIKE '%$searchValue%'";
            // }

            // if (isset($arrParam['filter_status']) && $arrParam['filter_status'] != 'all') {
            //     $query[] = "AND `status` = '{$arrParam['filter_status']}'";
            // }
        $query = implode(" ",$query);
        $result = $this->fetchAll($query);
        return $result;
    }

}
