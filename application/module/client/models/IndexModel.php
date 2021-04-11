<?php
    class IndexModel extends Model
    {
        public function __construct()
        {
            parent::__construct();
        }
        public function listItem($arrParam, $options = null)
        {
            if($options['task'] == 'book-special'){
                $query[] = "SELECT `p`.`id`, `p`.`name`, `p`.`picture`, `p`.`description`,`p`.`category_id`,`p`.`sale_off`,`p`.`price`,`p`.`special`,`c`.`id` AS `category_id`,`c`.`name` AS `category_name`";
                $query[] = "FROM `".TBL_BOOK."` AS `p` LEFT JOIN `category` AS `c` ON `p`.`category_id` = `c`.`id`";
                $query[] = "WHERE `p`.`status` = 'active' AND `p`.`special` = 1";
                $query[] = "ORDER BY `p`.`ordering` ASC";
                $query = implode(" ",$query);
                $result = $this->fetchAll($query);
                return $result;
            }
            else if($options['task'] == 'book-sale'){
                $query[] = "SELECT `id`, `name`, `picture`, `description`,`category_id`,`sale_off`,`price`";
                $query[] = "FROM `".TBL_BOOK."`";
                $query[] = "WHERE `status` = 'active' AND `sale_off` != 0";
                $query[] = "ORDER BY `ordering` ASC";
                // $query[] = "LIMIT 0,4";
                $query = implode(" ",$query);
                $result = $this->fetchAll($query);
                return $result;
            }
            else if($options['task'] == 'new-products'){
                $query[] = "SELECT `id`, `name`, `picture`, `description`,`category_id`,`sale_off`,`price`";
                $query[] = "FROM `".TBL_BOOK."`";
                $query[] = "WHERE `status` = 'active'";
                $query[] = "ORDER BY `id` DESC";
                $query[] = "LIMIT 0,8";
                $query = implode(" ",$query);
                $result = $this->fetchAll($query);
                return $result;
            }
        }
    }
?>