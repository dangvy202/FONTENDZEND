<?php echo HelperBackend::showNotify(); ?>
<?php
$xhtml ='';
$id = 1;
    foreach($this->picture as $key => $name){
        $actionBtn  = HelperBackend::showActionButtons($this->arrParam['controller'], null);
        $xhtml .= '
        <tr>
            <td class="text-center">
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" id="checkbox-' . $id . '" name="checkbox[]" value="' . $name . '">
                    <label for="checkbox-' . $id . '" class="custom-control-label"></label>
                </div>
            </td>
            <td class="text-center">' . $id++         . '</td>
            <td class="text-center">' . $name       . '</td>
            <td class="text-center">' .  '<img class="item-image" height="90px" width="60px" src="'.UPLOAD_URL.'book'.DS.$name.'">'.'</td>
            <td class="text-center">' . $actionBtn  . '</td>
        </tr>
        ';
    }

?>
<div class="card card-info card-outline">
    <div class="card-header">
        <h4 class="card-title">List</h4>
        <div class="card-tools">
            <a href="<?php echo URL::createLink($this->arrParam['module'], $this->arrParam['controller'], $this->arrParam['action']) ?>" class="btn btn-tool"><i class="fas fa-sync"></i></a>
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>
        </div>
    </div>
    <div class="card-body">
        <!-- Control -->
        <div class="d-flex flex-wrap align-items-center justify-content-between mb-2">
            <div class="mb-1">
                <select id="bulk-action" name="bulk-action" class="custom-select custom-select-sm mr-1" style="width: unset" data-url="<?php echo URL::createLink($this->arrParam['module'], $this->arrParam['controller'], 'value_new'); ?>">
                    <option value="" selected="">Bulk Action</option>
                    <option value="multiDeletePicture">Multi Delete</option>
                </select> <button id="bulk-apply" class="btn btn-sm btn-info">Apply <span class="badge badge-pill badge-danger navbar-badge" style="display: none"></span></button>
            </div>
            <a href="<?php echo URL::createLink($this->arrParam['module'] ,$this->arrParam['controller'],'form');?>" class="btn btn-sm btn-info"><i class="fas fa-plus"></i> Add New</a>
        </div>
        <!-- List Content -->
        <form action="" method="post" class="table-responsive" id="form-table">
            <table class="table table-bordered table-hover text-nowrap btn-table mb-0">
                <thead>
                    <tr>
                        <th class="text-center">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="check-all">
                                <label for="check-all" class="custom-control-label"></label>
                            </div>
                        </th>
                        <th class="text-center">ID</a></th>
                        <th class="text-center">Name</a></th>
                        <th class="text-center">Picture</a></th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php echo $xhtml; ?>
                </tbody>
            </table>
            <div>
                <input type="hidden" name="filter_column" value="name">
                <input type="hidden" name="filter_page" value="1">
                <input type="hidden" name="filter_column_dir" value="asc">
            </div>
        </form>
    </div>
    <?php
        // echo $paginationHTM = $this->pagination->showPagination(URL::createLink('admin','group','index'));
    ?>
</div>