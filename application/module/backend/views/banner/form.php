<?php echo HelperBackend::showNotify(); ?>
<?php
// TURN OFF WARNING 
error_reporting(E_ERROR | E_PARSE);

    $inputType          = HelperBackend::cmsInput('text','form[type]','form[type]',isset($this->arrParam['form']['type']) ? $this->arrParam['form']['type'] : null,'form-control form-control-sm');
    $inputTypeRow       = HelperBackend::cmsRowForm('form-group row','type','col-sm-2 col-form-label text-sm-right required','Type','col-xs-12 col-sm-8',$inputType);
    
    $inputThumb         = HelperBackend::cmsInput('number','form[thumb]','form[thumb]',isset($this->arrParam['form']['thumb']) ? $this->arrParam['form']['thumb'] : null,'form-control form-control-sm');
    $inputThumbRow      = HelperBackend::cmsRowForm('form-group row','thumb','col-sm-2 col-form-label text-sm-right required','Thumb','col-xs-12 col-sm-8',$inputThumb);

    $inputLink          = HelperBackend::cmsInput('text','form[link]','form[link]',isset($this->arrParam['form']['link']) ? $this->arrParam['form']['link'] : null,'form-control form-control-sm');
    $inputLinkRow       = HelperBackend::cmsRowForm('form-group row','link','col-sm-2 col-form-label text-sm-right required','Link Slider','col-xs-12 col-sm-8',$inputLink);
    
    $inputDescription   = HelperBackend::cmsInput('text','form[description]','form[description]',isset($this->arrParam['form']['description']) ? $this->arrParam['form']['description'] : null,'form-control form-control-sm');
    $inputDescriptionRow= HelperBackend::cmsRowForm('form-group row','description','col-sm-2 col-form-label text-sm-right required','Description','col-xs-12 col-sm-8',$inputDescription);
    
    $inputContent       = HelperBackend::cmsInput('text','form[content]','form[content]',isset($this->arrParam['form']['content']) ? $this->arrParam['form']['content'] : null,'form-control form-control-sm');
    $inputContentRow    = HelperBackend::cmsRowForm('form-group row','content','col-sm-2 col-form-label text-sm-right required','Content','col-xs-12 col-sm-8',$inputContent);

    $optionStatus       = HelperBackend::cmsOptionStatus([ 0 => ' - Select Status - ' , 'inactive' => 'Inactive' , 'active' => 'Active' ] , isset($this->arrParam['form']['status']) ? $this->arrParam['form']['status'] : null);
    $selectStatus       = HelperBackend::cmsSelectBox('form-group row','status','col-sm-2 col-form-label text-sm-right','Status','col-xs-12 col-sm-8','form[status]','form[status]','custom-select custom-select-sm',$optionStatus);
    
    $inputOrdering      = HelperBackend::cmsInput('number','form[ordering]','form[ordering]',isset($this->arrParam['form']['ordering']) ? $this->arrParam['form']['ordering'] : null,'form-control form-control-sm');
    $inputOrderingRow   = HelperBackend::cmsRowForm('form-group row','ordering','col-sm-2 col-form-label text-sm-right required','Ordering','col-xs-12 col-sm-8',$inputOrdering);
    
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

        $pathImg	        = UPLOAD_URL . "category" . DS . $this->arrParam['form']['picture'];
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
                                echo $inputTypeRow.$inputThumbRow.$inputLinkRow.$inputDescriptionRow.$inputContentRow.$inputOrderingRow.$selectStatus.$inputFileRow.$inputPicture.$inputIdRow;
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