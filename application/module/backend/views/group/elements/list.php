<?php

$xhtml = '';
foreach ($this->items as $item) {
    $id         = $item['id'];
    $name       = HelperBackend::highlight(isset($this->arrParam['search_value']) ? $this->arrParam['search_value'] : "", $item['name']);
    $status     = HelperBackend::showItemStatus($this->arrParam['controller'], $item['status'], $item['id']);
    $groupACP   = HelperBackend::showItemGroupACP($item['group_acp'], $item['id']);
    $created    = HelperBackend::showItemHistory($item['created_by'], $item['created']);
    $modified   = HelperBackend::showItemHistory($item['modified_by'], $item['modified']);
    $actionBtn  = HelperBackend::showActionButtons($this->arrParam['controller'], $item['id']);
    $xhtml .= '
    <tr>
        <td class="text-center">
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="checkbox-' . $id . '" name="checkbox[]" value="' . $id . '">
                <label for="checkbox-' . $id . '" class="custom-control-label"></label>
            </div>
        </td>
        <td class="text-center">' . $id . '</td>
        <td class="text-center">' . $name . '</td>
        <td class="text-center position-relative">' . $status . '</td>
        <td class="text-center position-relative">' . $groupACP . '</td>
        <td class="text-center position-relative"><button type="button" class="btn btn-success btn-test">Test</button></td>
        <td class="text-center">' . $created . '</td>
        <td class="text-center modified-1">' . $modified . '</td>
        <td class="text-center">' . $actionBtn . '</td>
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
                    <option value="multiDelete">Multi Delete</option>
                    <option value="active">Multi Active</option>
                    <option value="inactive">Multi Inactive</option>
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
                        <th class="text-center">Status</a></th>
                        <th class="text-center">Group ACP</a></th>
                        <th class="text-center">test</a></th>
                        <th class="text-center">Created</a></th>
                        <th class="text-center">Modified</a></th>
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
        echo $paginationHTM = $this->pagination->showPagination(URL::createLink('admin','group','index'));
    ?>
</div>