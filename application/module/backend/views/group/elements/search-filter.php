<?php
$groupACPValues = ['default' => '- Select Group ACP -', 0 => 'No', 1 => 'Yes'];
$slbGroupACP = FormBackend::selectIsNumeric('filter_groupacp', $groupACPValues, $this->arrParam['filter_groupacp'] ?? 'default', 'custom-select custom-select-sm mr-1', 'filter_groupacp', 'width: unset');

$statusValues = [
    'all' => $this->countInactive + $this->countActive,
    'active' => $this->countActive,
    'inactive' => $this->countInactive
];
$filterStatus = HelperBackend::showFilterStatus($statusValues, $this->arrParam['controller'], $this->arrParam['filter_status'] ?? 'all');
?>

<div class="card card-info card-outline">
    <div class="card-header">
        <h6 class="card-title">Search & Filter</h6>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
        </div>
    </div>
    <div class="card-body">
        <div class="row justify-content-between">
            <div class="mb-1">
                <?php echo $filterStatus ?>
            </div>
            <div class="mb-1">
                <form action="" method="GET" id="filter-form">
                    <input type="hidden" name="module" value="<?php echo $this->arrParam['module'] ?>">
                    <input type="hidden" name="controller" value="<?php echo $this->arrParam['controller'] ?>">
                    <input type="hidden" name="action" value="<?php echo $this->arrParam['action'] ?>">
                    <?php echo $slbGroupACP ?>
                    <!-- <select id="filter_groupacp" name="filter_groupacp" class="custom-select custom-select-sm mr-1" style="width: unset">
                        <option value="default">- Select Group ACP -</option>
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select> -->
                </form>
            </div>
            <div class="mb-1">
                <form action="" method="GET" id="search-form">
                    <div class="input-group">
                        <input type="hidden" name="module" value="<?php echo $this->arrParam['module'] ?>">
                        <input type="hidden" name="controller" value="<?php echo $this->arrParam['controller'] ?>">
                        <input type="hidden" name="action" value="<?php echo $this->arrParam['action'] ?>">
                        <input type="text" class="form-control form-control-sm" name="search_value" placeholder="Tìm kiếm..." value="<?php echo $this->arrParam['search_value'] ?? '' ?>" style="min-width: 300px">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-sm btn-danger" data-url="<?php echo URL::createLink($this->arrParam['module'], $this->arrParam['controller'], $this->arrParam['action']); ?>" id="btn-clear-search">Clear</button>
                            <button type="submit" class="btn btn-sm btn-info" id="btn-search">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>