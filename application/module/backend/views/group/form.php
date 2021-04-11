<?php echo HelperBackend::showNotify(); ?>
<?php
    $inputName          = HelperBackend::cmsInput('text','form[name]','form[name]',isset($this->arrParam['form']['name']) ? $this->arrParam['form']['name'] : null,'form-control form-control-sm');
    $inputNameRow       = HelperBackend::cmsRowForm('form-group row','name','col-sm-2 col-form-label text-sm-right required','Name','col-xs-12 col-sm-8',$inputName);
    
    $optionStatus       = HelperBackend::cmsOptionStatus([ 0 => ' - Select Status - ' , 'inactive' => 'Inactive' , 'active' => 'Active' ] , isset($this->arrParam['form']['status']) ? $this->arrParam['form']['status'] : null);
    $selectStatus       = HelperBackend::cmsSelectBox('form-group row','status','col-sm-2 col-form-label text-sm-right','Status','col-xs-12 col-sm-8','form[status]','form[status]','custom-select custom-select-sm',$optionStatus);
    
    $optionGroupACP     = HelperBackend::cmsOption([ 'default' => ' - Select Group ACP - ' , 0 => 'No' , 1 => 'Yes' ],isset($this->arrParam['form']['group_acp']) ? $this->arrParam['form']['group_acp'] : null);
    $selectGroupACP     = HelperBackend::cmsSelectBox('form-group row','group_acp','col-sm-2 col-form-label text-sm-right','Group ACP','col-xs-12 col-sm-8','form[group_acp]','form[group_acp]','custom-select custom-select-sm',$optionGroupACP);
    
    $linkSave           = URL::createLink($this->arrParam['module'],$this->arrParam['controller'],$this->arrParam['action'],['type'=> 'save']);
    $saveButton         = HelperBackend::cmsButtonForm($linkSave,'btn btn-sm btn-success mr-1','Save');
    
    $linkSaveAndClose   = URL::createLink($this->arrParam['module'],$this->arrParam['controller'],$this->arrParam['action'],['type'=> 'saveAndClose']);
    $saveAndCloseButton = HelperBackend::cmsButtonForm( $linkSaveAndClose,'btn btn-sm btn-success mr-1','Save & Close');
    
    $linkSaveAndNew     = URL::createLink($this->arrParam['module'],$this->arrParam['controller'],$this->arrParam['action'],['type'=> 'saveAndNew']);
    $saveAndNewButton   = HelperBackend::cmsButtonForm($linkSaveAndNew,'btn btn-sm btn-success mr-1','Save & New');
    
    $linkCancel         = URL::createLink($this->arrParam['module'],$this->arrParam['controller'],'index');
    $cancelButton       = HelperBackend::cmsButtonForm($linkCancel,'btn btn-sm btn-danger mr-1','Cancel');
    $inputIdRow ='';
    if(isset($this->arrParam['id'])){
        $inputId          = HelperBackend::cmsInput('hidden','form[id]','form[id]',isset($this->arrParam['form']['id']) ? $this->arrParam['form']['id'] : null,'form-control form-control-sm');
        $inputIdRow       = HelperBackend::cmsRowForm('form-group row','id','col-sm-2 col-form-label text-sm-right required','Id','col-xs-12 col-sm-8',$inputId,'display:none');
    }
?>
<section class="content">
    <div class="container-fluid">
        <!-- SHOW ERRORS FORM -->
        <?php echo isset($this->errors) ? $this->errors : "";?>
        <!-- END SHOW ERRORS FORM -->
        <div class="card card-info card-outline">
                <form action="#" method="POST" class="mb-0" id="admin-form">
                    <div class="card-body">
                            <?php 
                                echo $inputNameRow.$selectStatus.$selectGroupACP.$inputIdRow;
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