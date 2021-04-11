<?php
class CommentModel extends Model
{
    private $_columns = ['id_product','comment','rate'];

    public function __construct()
    {
        parent::__construct();
        $this->setTable(TBL_COMMENT);
    }
    public function commentAjax($arrParam,$option = null){
        $data = array_intersect_key($arrParam['form'],array_flip($this->_columns));
        $this->insert($data);
        // $arr = ['message' => $arrParam['form']['message'],'start' => $arrParam['form']['start'],'id_product'=> $arrParam['id_comment']];
        // $message    = $arr['message'];
        // $start      = $arr['start'];
        // $product    = $arr['id_product'];
        // return $query = "INSERT INTO `comment` (`username`,`comment`,`rate`,`id_product`) VALUE('Vy','$message','$start','$product')";
        // $result = $this->query($query);        
        // return $result;
    }
}
