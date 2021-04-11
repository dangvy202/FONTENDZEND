<?php
class BookModel extends Model
{
    private $_columns = ['id','name','description','price','special','sale_off', 'picture', 'created', 'created_by', 'modified', 'modified_by', 'status', 'ordering','category_id'];

    public function __construct()
    {
        parent::__construct();
        $this->setTable(TBL_BOOK);
    }

    public function listItem($arrParam, $options = null)
    {
        if($options['task'] == 'book-in-category'){
            $idCategory = $arrParam['category_id'];
            $query[] = "SELECT `id`, `name`, `picture`, `description`,`category_id`,`sale_off`,`price`";
            $query[] = "FROM `$this->table`";
            $query[] = "WHERE `status` = 'active' AND `category_id` = '$idCategory'";
            $query[] = "ORDER BY `ordering` ASC";
            $query = implode(" ",$query);
            $result = $this->fetchAll($query);
            return $result;
        }
        if($options['task'] == 'sum-product'){
            $idCategory = $arrParam['category_id'];
            $query2[] = "SELECT COUNT(`id`) AS `total`";
            $query2[] = "FROM `$this->table`";
            $query2[] = "WHERE `status` = 'active' AND `category_id` = '$idCategory'";
            $query2[] = "ORDER BY `ordering` ASC";
            $query2 = implode(" ",$query2);
            $result = $this->fetchRow($query2);
            return $result;
        }
        if($options['task'] == 'book-relate'){ 
            $bookID     = $arrParam['book_id'];
            $queryCate  = "SELECT `category_id` FROM `book` WHERE `id` = '$bookID'";
            $resultCate = $this->fetchRow($queryCate);

            $idCategory = $resultCate['category_id'];
            $query[] = "SELECT `id`, `name`, `picture`, `description`,`category_id`,`sale_off`,`price`";
            $query[] = "FROM `$this->table`";
            $query[] = "WHERE `status` = 'active' AND `category_id` = '$idCategory' AND `id` <> '$bookID' ";
            $query[] = "ORDER BY `ordering` ASC";
            $query = implode(" ",$query);
            $result = $this->fetchAll($query);
            return $result;
        }
    }
    public function infoItem($arrParam,$options= null)
    {
        if($options['task'] == 'get-category-name'){
            $query[] = "SELECT `name`";
            $query[] = "FROM `".TBL_CATEGORY."`";
            $query[] = "WHERE `id` = '$arrParam[category_id]'";
            $query   = implode(" ",$query);
            $result  = $this->fetchRow($query);
            return $result['name'];
        }
        else if($options['task'] == 'book-info'){
            $query[] = "SELECT `id`,`price`,`sale_off`,`picture`, `description`, `name`";
            $query[] = "FROM `".TBL_BOOK."`";
            $query[] = "WHERE `id` = '$arrParam[book_id]'";
            $query   = implode(" ",$query);
            $result  = $this->fetchRow($query);
            return $result;
        }
    }
}
