<?php
//LẤY DANH SÁCH CATEGORY
$slbCategory    = FormBackend::selectIsNumeric('filter_category', $this->categoryName , $this->arrParam['filter_category'] ?? 0, 'custom-select custom-select-sm mr-1', 'filter_category', 'width: unset');   
//LẤY DANH SÁCH CÁC SẢN PHẨM ĐẶC BIỆT
$specialValues  = ['default' => '- Select Special -', 0 => 'No', 1 => 'Yes'];
$special        = FormBackend::selectIsNumeric('filter_special', $specialValues , $this->arrParam['filter_special'] ?? 'default', 'custom-select custom-select-sm mr-1', 'filter_special', 'width: unset');

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
                <!-- SPECIAL -->
                <form action="" method="GET" id="filter-form">
                        <input type="hidden" name="module" value="<?php echo $this->arrParam['module'] ?>">
                        <input type="hidden" name="controller" value="<?php echo $this->arrParam['controller'] ?>">
                        <input type="hidden" name="action" value="<?php echo $this->arrParam['action'] ?>">
                        <?php echo $special ?>
                </form>
                <!-- END SPECIAL -->
            </div>
            <div class="mb-1">
                <!-- CATEGORY -->
                <form action="" method="GET" id="filter-categoryform">
                    <input type="hidden" name="module" value="<?php echo $this->arrParam['module'] ?>">
                    <input type="hidden" name="controller" value="<?php echo $this->arrParam['controller'] ?>">
                    <input type="hidden" name="action" value="<?php echo $this->arrParam['action'] ?>">
                    <?php echo $slbCategory ?>
                </form>
                <!-- END CATEGORY -->
            </div>
            <div class="mb-1">
                <form action="" method="GET" id="search-form">
                    <div class="input-group">
                        <input type="hidden" name="module" value="<?php echo $this->arrParam['module'] ?>">
                        <input type="hidden" name="controller" value="<?php echo $this->arrParam['controller'] ?>">
                        <input type="hidden" name="action" value="<?php echo $this->arrParam['action'] ?>">
                        <input type="text" class="form-control form-control-sm" name="search_value" placeholder="Tìm kiếm..." value="<?php echo $this->arrParam['search_value'] ?? '' ?>" style="width: 300px">
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