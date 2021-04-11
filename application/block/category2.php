<?php
    $cateID = isset($this->arrParam['category_id']) ? $this->arrParam['category_id'] : null;
    $model = new Model();
    $query = "SELECT `id`, `name`, `picture` FROM `category` WHERE `status` = 'active' ORDER BY `ordering` ASC";
    // $query = implode(" ",$query);
    $result = $model->fetchAll($query);
    //DANH MỤC MENU
    $xhtml ='';
    foreach($result as $cate){
        $link       =   URL::createLink('client','book','list', ['category_id' => $cate['id']]);
        $picture    =   UPLOAD_URL.'category'.DS.$cate['picture'];
        $xhtml   .='<div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-6 ">
                        <div class="ps-block--category"><a class="ps-block__overlay" href="'.$link.'"></a><img src="'.$picture.'" alt="" width="100%" height="100px">
                            <p style = "font-size:11px;">'.$cate['name'].'</p>
                        </div>
                    </div>';
    }
?>
