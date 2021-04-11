<?php echo HelperBackend::showNotify(); ?>
<?php
// TURN OFF WARNING 
error_reporting(E_ERROR | E_PARSE);

    $inputName                  = HelperBackend::cmsInput('text','form[name]','form[name]',isset($this->arrParam['form']['name']) ? $this->arrParam['form']['name'] : null,'form-control form-control-sm');
    $inputNameRow               = HelperBackend::cmsRowForm('form-group row','name','col-sm-2 col-form-label text-sm-right required','Name Product','col-xs-12 col-sm-8',$inputName);
    
    $inputDescription           = HelperBackend::cmsArea('form[description]','form-control form-control-sm','form[description]',10,isset($this->arrParam['form']['description']) ? $this->arrParam['form']['description'] : null);
    $inputDescriptionRow        = HelperBackend::cmsRowForm('form-group row','description','col-sm-2 col-form-label text-sm-right required','Description','col-xs-12 col-sm-8',$inputDescription);
    
    $inputPrice                 = HelperBackend::cmsInput('number','form[price]','form[price]',isset($this->arrParam['form']['price']) ? $this->arrParam['form']['price'] : null,'form-control form-control-sm');
    $inputPriceRow              = HelperBackend::cmsRowForm('form-group row','price','col-sm-2 col-form-label text-sm-right required','Price','col-xs-12 col-sm-8',$inputPrice);
    
    $inputSaleOff               = HelperBackend::cmsInput('number','form[sale_off]','form[sale_off]',isset($this->arrParam['form']['sale_off']) ? $this->arrParam['form']['sale_off'] : null,'form-control form-control-sm',0,100);
    $inputSaleOffRow            = HelperBackend::cmsRowForm('form-group row','sale_off','col-sm-2 col-form-label text-sm-right required','Sale Off','col-xs-12 col-sm-8',$inputSaleOff);
    
    // $slbCategory    = FormBackend::selectIsNumeric('filter_category', $this->categoryName , $this->arrParam['filter_category'] ?? 0, 'custom-select custom-select-sm mr-1', 'filter_category', 'width: unset');   

    $optionCategory             = HelperBackend::cmsOption($this->categoryName,isset($this->arrParam['form']['category_id']) ? $this->arrParam['form']['category_id'] : null);
    $selectCategory             = HelperBackend::cmsSelectBox('form-group row','category_id','col-sm-2 col-form-label text-sm-right','Category','col-xs-12 col-sm-8','form[category_id]','form[category_id]','custom-select custom-select-sm',$optionCategory);

    $optionStatus               = HelperBackend::cmsOptionStatus([ 0 => ' - Select Status - ' , 'inactive' => 'Inactive' , 'active' => 'Active' ] , isset($this->arrParam['form']['status']) ? $this->arrParam['form']['status'] : null);
    $selectStatus               = HelperBackend::cmsSelectBox('form-group row','status','col-sm-2 col-form-label text-sm-right','Status','col-xs-12 col-sm-8','form[status]','form[status]','custom-select custom-select-sm',$optionStatus);
    
    $optionSpecial              = HelperBackend::cmsOptionStatus([ 'default' => ' - Select Special - ' , 0 => 'No' , 1 => 'Yes' ] , isset($this->arrParam['form']['special']) ? $this->arrParam['form']['special'] : null);
    $selectSpecial              = HelperBackend::cmsSelectBox('form-group row','special','col-sm-2 col-form-label text-sm-right','Special','col-xs-12 col-sm-8','form[special]','form[special]','custom-select custom-select-sm',$optionSpecial);
    
    $inputFile          = HelperBackend::cmsInput('file','picture','picture',isset($this->_arrParam['form']['picture']['name']) ? $this->_arrParam['form']['picture']['name'] : null,'form-control form-control-sm');
    $inputFileRow       = HelperBackend::cmsRowForm('form-group row','file','col-sm-2 col-form-label text-sm-right required','Picture','col-xs-12 col-sm-8',$inputFile);

    $linkSave           = URL::createLink($this->arrParam['module'],$this->arrParam['controller'],$this->arrParam['action'],['type'=> 'save']);
    $saveButton         = HelperBackend::cmsButtonForm($linkSave,'btn btn-sm btn-success mr-1','Save');
    
    $linkSaveAndClose   = URL::createLink($this->arrParam['module'],$this->arrParam['controller'],$this->arrParam['action'],['type'=> 'saveAndClose']);
    $saveAndCloseButton = HelperBackend::cmsButtonForm( $linkSaveAndClose,'btn btn-sm btn-success mr-1','Save & Close');
    
    $linkSaveAndNew     = URL::createLink($this->arrParam['module'],$this->arrParam['controller'],$this->arrParam['action'],['type'=> 'saveAndNew']);
    $saveAndNewButton   = HelperBackend::cmsButtonForm($linkSaveAndNew,'btn btn-sm btn-success mr-1','Save & New');
    
    $linkCancel         = URL::createLink($this->arrParam['module'],$this->arrParam['controller'],'index');
    $cancelButton       = HelperBackend::cmsButtonForm($linkCancel,'btn btn-sm btn-danger mr-1','Cancel');
    $inputIdRow ='';
    $inputPicture ='';
    if(isset($this->arrParam['id'])){
        $inputId            = HelperBackend::cmsInput('text','form[id]','form[id]',isset($this->arrParam['form']['id']) ? $this->arrParam['form']['id'] : null,'form-control form-control-sm');
        $inputIdRow         = HelperBackend::cmsRowForm('form-group row','id','col-sm-2 col-form-label text-sm-right required','Id','col-xs-12 col-sm-8',$inputId,'display:none');

        $pathImg	        = UPLOAD_URL . "book" . DS . $this->arrParam['form']['picture'];
		$picture        	= '<img src="'.$pathImg.'">';
        $inputPicture       = HelperBackend::cmsRowForm('form-group row','file','col-sm-2 col-form-label text-sm-right required',null,'col-xs-12 col-sm-8',$picture);
    }
?>
<section class="content">
    <div class="container-fluid">
        <!-- SHOW ERRORS FORM -->
        <?php echo isset($this->errors) ? $this->errors : "";?>
        <!-- END SHOW ERRORS FORM -->
        <div class="card card-info card-outline">
                <form action="#" method="POST" class="mb-0" id="admin-form" enctype="multipart/form-data">
                    <div class="card-body">
                            <?php 
                                echo $inputNameRow.$inputDescriptionRow.$inputPriceRow.$inputSaleOffRow.$selectCategory.$selectStatus.$selectSpecial.$inputFileRow.$inputPicture.$inputIdRow;
                            ?>
                            <input type="hidden" id="form[token]" name="form[token]" value="1596364518">
                    </div>
                    <div class="card-footer">
                        <div class="col-12 col-sm-8 offset-sm-2">
                            <?php echo $saveButton.$saveAndCloseButton.$saveAndNewButton.$cancelButton; ?>
                        </div>
                    </div>
                </form>
        </div>
    </div>
</section>