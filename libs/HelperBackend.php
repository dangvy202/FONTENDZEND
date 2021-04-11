<?php
class HelperBackend
{
    //NÚT SHOW MENU SLIDEBAR
    public  static function showMenuSideBar($classLi,$classA,$classI,$className,$classNameI,$id,$arrParamList = [],$classListActive = 'active',$arrParamForm = [])
    {
        if($id == 'category' || $id == 'product' || $id == 'user'){
            $xhtml = " <li class='$classLi'>
                        <a href='#' class='$classA' data-active='category'>
                            <i class='$classI'></i>
                            <p>$className<i class='$classNameI'></i></p>
                        </a>
                        <ul class='nav nav-treeview'>
                            <li class='nav-item'>
                                <a id='$id' href='index.php?module=$arrParamList[0]&controller=$arrParamList[1]&action=$arrParamList[2]' class='nav-link $classListActive' data-active='index'>
                                    <i class='nav-icon fas fa-list-ul'></i>
                                    <p>List</p>
                                </a>
                            </li>

                            <li class='nav-item'>
                                <a href='index.php?module=$arrParamForm[0]&controller=$arrParamForm[1]&action=$arrParamForm[2]' class='nav-link' data-active='form'>
                                    <i class='nav-icon fas fa-edit'></i>
                                    <p>Form</p>
                                </a>
                            </li>

                            <li class='nav-item'>
                                <a href='index.php?module=$arrParamForm[0]&controller=$arrParamForm[1]&action=picture' class='nav-link' data-active='form'>
                                <i class='nav-icon far fa-images'></i>
                                    <p>Picture</p>
                                </a>
                            </li>
                        </ul>
                    </li>";
        }
        else{
            $xhtml = " <li class='$classLi'>
                            <a href='#' class='$classA' data-active='category'>
                                <i class='$classI'></i>
                                <p>$className<i class='$classNameI'></i></p>
                            </a>
                            <ul class='nav nav-treeview'>
                                <li class='nav-item'>
                                    <a id='$id' href='index.php?module=$arrParamList[0]&controller=$arrParamList[1]&action=$arrParamList[2]' class='nav-link $classListActive' data-active='index'>
                                        <i class='nav-icon fas fa-list-ul'></i>
                                        <p>List</p>
                                    </a>
                                </li>

                                <li class='nav-item'>
                                    <a href='index.php?module=$arrParamForm[0]&controller=$arrParamForm[1]&action=$arrParamForm[2]' class='nav-link' data-active='form'>
                                        <i class='nav-icon fas fa-edit'></i>
                                        <p>Form</p>
                                    </a>
                                </li>
                            </ul>
                        </li>";
        }
        return $xhtml;
    }
    public static function showItemStatus($controller, $statusValue, $id)
    {
        $icon = 'check';
        $color = 'success';

        if ($statusValue == 'inactive') {
            $icon = 'minus';
            $color = 'danger';
        }

        $link = URL::createLink('backend', $controller, 'changeStatus', ['id' => $id, 'status' => $statusValue]);
        $xhtml = sprintf('<a href="%s" class="my-btn-state rounded-circle btn btn-sm btn-%s"><i class="fas fa-%s"></i></a>', $link, $color, $icon);

        return $xhtml;
    }
    public static function showItemSpecial($controller, $specialValue, $id)
    {
        $icon = 'check';
        $color = 'success';

        if ($specialValue == 0) {
            $icon = 'minus';
            $color = 'danger';
        }

        $link = URL::createLink('backend', $controller, 'changeSpecial', ['id' => $id, 'special' => $specialValue]);
        $xhtml = sprintf('<a href="%s" class="my-btn-state special rounded-circle btn btn-sm btn-%s"><i class="fas fa-%s"></i></a>', $link, $color, $icon);

        return $xhtml;
    }

    public static function showItemGroupACP($groupACP, $id)
    {
        $icon = 'check';
        $color = 'success';

        if ($groupACP == 0) {
            $icon = 'minus';
            $color = 'danger';
        }

        $link = URL::createLink('backend', 'group', 'changeGroupACP', ['id' => $id, 'group_acp' => $groupACP]);
        $xhtml = sprintf('<a href="%s" class="my-btn-state rounded-circle btn btn-sm btn-%s"><i class="fas fa-%s"></i></a>', $link, $color, $icon);

        return $xhtml;
    }

    public static function showItemHistory($by, $time)
    {
        $xhtml = sprintf('
        <p class="mb-0 history-by"><i class="far fa-user"></i> %s</p>
        <p class="mb-0 history-time"><i class="far fa-clock"></i> %s</p>
        ', $by, $time);

        return $xhtml;
    }

    public static function highlight($search, $value)
    {
        if ($search != '') {
            return preg_replace('/' . preg_quote($search, '/') . '/ui', '<mark>$0</mark>', $value);
        }

        return $value;
    }

    public static function showActionButtons($controller, $id)
    {
        $linkDelete = URL::createLink('backend', $controller, 'delete', ['id' => $id]);
        $linkEdit   = URL::createLink('backend',$controller,'form',['id' => $id]);
        $xhtml = '
        <a href="'.$linkEdit.'" class="rounded-circle btn btn-sm btn-info" title="Edit">
            <i class="fas fa-pencil-alt"></i>
        </a>
        <a href="' . $linkDelete . '" class="rounded-circle btn btn-sm btn-danger btn-delete" title="Delete">
            <i class="fas fa-trash-alt"></i>
        </a>
        ';

        return $xhtml;
    }

    public static function showActionButtonsUser($controller, $id)
    {
        $linkDelete = URL::createLink('backend', $controller, 'delete', ['id' => $id]);
        $linkEdit   = URL::createLink('backend',$controller,'form',['id' => $id]);
        $linkChange   = URL::createLink('backend',$controller,'form',['id' => $id]);
        $xhtml = '
        <a href="'.$linkChange.'" class="rounded-circle btn btn-sm btn-secondary" title="Change Password">
            <i class="fas fa-key"></i>
        </a>
        <a href="'.$linkEdit.'" class="rounded-circle btn btn-sm btn-info" title="Edit">
            <i class="fas fa-pencil-alt"></i>
        </a>
        <a href="' . $linkDelete . '" class="rounded-circle btn btn-sm btn-danger btn-delete" title="Delete">
            <i class="fas fa-trash-alt"></i>
        </a>
        ';

        return $xhtml;
    }

    public static function showFilterStatus($values, $controller, $currentStatus)
    {
        $xhtml = '';

        foreach ($values as $key => $value) {
            $link = URL::createLink('backend', $controller, 'index', ['filter_status' => $key]);
            $classActive = $currentStatus == $key ? 'btn-info' : 'btn-secondary';
            $name = '';
            switch ($key) {
                case 'all':
                    $name = 'Tất cả';
                    break;
                case 'active':
                    $name = 'Kích hoạt';
                    break;
                case 'inactive':
                    $name = 'Chưa kích hoạt';
                    break;
            }

            $xhtml .= sprintf('<a href="%s" class="mr-1 btn btn-sm %s">%s <span class="badge badge-pill badge-light">%s</span></a>', $link, $classActive, $name, $value);
        }

        return $xhtml;
    }

    public static function showNotify()
    {
        $notify = Session::get('notify');

        $xhtml = '';

        if (!empty($notify)) {
            $color = $notify['type'] == 'success' ? 'success' : 'danger';
            $xhtml = sprintf('
            <div class="alert alert-%s alert-dismissible" id="notify-message">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <p class="mb-0">%s</p>
            </div>
            ', $color, $notify['message']);
        }

        Session::delete('notify');

        return $xhtml;
    }

    public static function setNotify($type, $message)
    {
        Session::set('notify', ['type' => $type, 'message' => $message]);
    }

    //TẠO OPTION TRONG SELECT GROUP
    public static function cmsOption($arrOption = [] , $keySelect = 'default')
    {
        $xhtml = '';
        foreach($arrOption as $k => $v){
            if($k == $keySelect && is_numeric($keySelect)){
                $xhtml .= '<option selected="selected" value = "'.$k.'">'.$v.'</option>';
            }else{
                $xhtml .= '<option value = "'.$k.'">'.$v.'</option>';
            }
        }
        return $xhtml;
    }
    //TẠO ERROR ĐẶT HÀNG
    public static function showErrorsOrder($sessionMessage)
    {
        $xhtml = '';
        if(isset($sessionMessage)){
            $xhtml .= " <div class='alert alert-danger alert-dismissible' id='notify-message'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                            <p class='mb-0'>$sessionMessage</p>
                        </div>";
        }else{
            
            $xhtml .= " <div class='alert alert-danger alert-dismissible' id='notify-message' style='display:none'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                            <p class='mb-0'>$sessionMessage</p>
                        </div>";
        }
        return $xhtml;
    }
    //TẠO OPTION TRONG SELECT STATUS
    public static function cmsOptionStatus($arrOption = [] , $keySelect = 0)
    {
        $xhtml = '';
        foreach($arrOption as $k => $v){
            if($k == $keySelect && is_string($keySelect)){
                $xhtml .= '<option selected="selected" value = "'.$k.'">'.$v.'</option>';
            }else{
                $xhtml .= '<option value = "'.$k.'">'.$v.'</option>';
            }
        }
        return $xhtml;
    }

    //TẠO SELECT BOX
    public static function cmsSelectBox($classRow,$classLabelFor,$classLabel,$nameLabel,$classDiv,$idSelect,$nameSelect,$classSelect,$arrOption){
        $xhtml = "  <div class='$classRow'>
                        <label for='$classLabelFor' class='$classLabel'>$nameLabel</label>
                        <div class='$classDiv'>
                            <select id='$idSelect' name='$nameSelect' class='$classSelect'>
                                $arrOption
                            </select>
                        </div>
                    </div>";
        return $xhtml;
    } 

    //TẠO INPUT
    public static function cmsInput($type,$name,$id,$value,$class,$min = null,$max = null)
    {
        $xhtml = '<input type="'.$type.'" id="'.$id.'" min="'.$min.'" max="'.$max.'" name="'.$name.'" value="'.$value.'" class="'.$class.'">';
        return $xhtml;
    }
    //TẠO AREA
    public static function cmsArea($name,$class,$id,$row,$value)
    {
        $xhtml = '<textarea name="'.$name.'" class="'.$class.'" id="'.$id.'" rows="'.$row.'">'.$value.'</textarea>';
        return $xhtml;
    }

    //TẠO ROW
    public static function cmsRowForm($classRow,$labelFor,$labelClass,$nameLabel,$classInput,$input,$style = null)
    {
        $xhtml = "  <div class='$classRow' style='$style'>
                        <label for='$labelFor' class='$labelClass'>$nameLabel</label>
                        <div class='$classInput'>
                            $input
                        </div>
                    </div>";
        return $xhtml;
    }

    //TẠO BUTTON FORM
    public static function cmsButtonForm($linkButton , $classLink , $nameLink)
    {
        $xhtml = '<a class="'.$classLink.'" href="#" onclick="javascript:submitForm(\''.$linkButton.'\');">'.$nameLink.'</a>';
        return $xhtml;
    }
    //TẠO IMG
    public static function pictureShow($classImg,$dirImg){
        $xhtml = "<img class='$classImg' height='90px' width='60px' src='$dirImg'>";
        return $xhtml;
    }
}
?>
