<?php
class ContactModel extends Model
{
    private $_columns = ['id','name','description','price','special','sale_off', 'picture', 'created', 'created_by', 'modified', 'modified_by', 'status', 'ordering','category_id'];

    public function __construct()
    {
        parent::__construct();
        $this->setTable(TBL_BOOK);
    }

}
