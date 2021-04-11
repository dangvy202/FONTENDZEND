<?php
    // $cateID = isset($this->arrParam['category_id']) ? $this->arrParam['category_id'] : null;
    $model = new Model();
    $query = "SELECT * FROM `slider` WHERE `status` = 'active' ORDER BY `ordering` ASC";
    // $query = implode(" ",$query);
    $result = $model->fetchAll($query);
    //DANH MỤC banner
    $xhtml ='';
    foreach($result as $cate){
        $picture    =   UPLOAD_URL.'banner'.DS.$cate['picture'];
        echo $xhtml   .='<div class="ps-banner bg--cover" data-background="'.$picture.'">
                        <a class="ps-banner__overlay" href="'.$cate['link'].'"></a>
                    </div>';
    }
?>
