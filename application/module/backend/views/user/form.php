<?php echo HelperBackend::showNotify(); ?>
<?php
// TURN OFF WARNING 
error_reporting(E_ERROR | E_PARSE);


    $inputName          = HelperBackend::cmsInput('text','form[username]','form[username]',isset($this->arrParam['form']['username']) ? $this->arrParam['form']['username'] : null,'form-control form-control-sm');
    $inputNameRow       = HelperBackend::cmsRowForm('form-group row','name','col-sm-2 col-form-label text-sm-right required','UserName','col-xs-12 col-sm-8',$inputName);
    
    $inputPassword      = HelperBackend::cmsInput('password','form[password]','form[password]',isset($this->arrParam['form']['password']) ? $this->arrParam['form']['password'] : null,'form-control form-control-sm');
    $inputPasswordRow   = HelperBackend::cmsRowForm('form-group row','password','col-sm-2 col-form-label text-sm-right required','Password','col-xs-12 col-sm-8',$inputPassword);
    
    $inputFile          = HelperBackend::cmsInput('file','picture','picture',isset($this->_arrParam['form']['picture']['name']) ? $this->_arrParam['form']['picture']['name'] : null,'form-control form-control-sm');
    $inputFileRow       = HelperBackend::cmsRowForm('form-group row','file','col-sm-2 col-form-label text-sm-right required','Picture','col-xs-12 col-sm-8',$inputFile);
    
    $inputEmail         = HelperBackend::cmsInput('text','form[email]','form[email]',isset($this->arrParam['form']['email']) ? $this->arrParam['form']['email'] : null,'form-control form-control-sm');
    $inputEmailRow      = HelperBackend::cmsRowForm('form-group row','email','col-sm-2 col-form-label text-sm-right required','Email','col-xs-12 col-sm-8',$inputEmail);
    
    $inputFullname      = HelperBackend::cmsInput('text','form[fullname]','form[fullname]',isset($this->arrParam['form']['fullname']) ? $this->arrParam['form']['fullname'] : null,'form-control form-control-sm');
    $inputFullNameRow   = HelperBackend::cmsRowForm('form-group row','fullname','col-sm-2 col-form-label text-sm-right required','Full Name','col-xs-12 col-sm-8',$inputFullname);

    $optionStatus       = HelperBackend::cmsOptionStatus([ 0 => ' - Select Status - ' , 'inactive' => 'Inactive' , 'active' => 'Active' ] , isset($this->arrParam['form']['status']) ? $this->arrParam['form']['status'] : null);
    $selectStatus       = HelperBackend::cmsSelectBox('form-group row','status','col-sm-2 col-form-label text-sm-right','Status','col-xs-12 col-sm-8','form[status]','form[status]','custom-select custom-select-sm',$optionStatus);
    
    $optionGroupACP     = HelperBackend::cmsOption($this->groupName,isset($this->arrParam['form']['group_id']) ? $this->arrParam['form']['group_id'] : null);
    $selectGroupACP     = HelperBackend::cmsSelectBox('form-group row','group_id','col-sm-2 col-form-label text-sm-right','Group ID','col-xs-12 col-sm-8','form[group_id]','form[group_id]','custom-select custom-select-sm',$optionGroupACP);
    
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
                <form action="#" method="POST" class="mb-0" id="admin-form" enctype="multipart/form-data">
                    <div class="card-body">
                            <?php 
                                echo $inputNameRow.$inputPasswordRow.$inputEmailRow.$inputFullNameRow.$selectStatus.$selectGroupACP.$inputFileRow.$inputIdRow;
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