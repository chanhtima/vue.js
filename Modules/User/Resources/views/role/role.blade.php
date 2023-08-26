
<?php
     $all_check  =  (!empty($checked['all'])&&$checked['all']=='all')?"checked":'';
?>
<div class="row">
    <div class="col-md-6">
        <div class="form-group form-check pl-0">
            <label class="form-label">{{ __('user_admin.permission') }}</label>
        </div>
    </div>
    <div class="col-md-6 text-right">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="all" id="CheckAllPermission" value="all" <?=$all_check?> onclick="setCheckAllPermission(this);">
            <label class="custom-control-label" for="CheckAllPermission">Check All</label>
        </div>
    </div>
</div>
<div class="row">
    {{-- <hr> --}}
    <ul id="show_roles" class="treeview">
        <?php foreach($permissions as $module => $pg){
            $all_module_check   =  (!empty($checked['module'])&&isset($checked['module'][$module])&&$checked['module'][$module]['all']=='all')?"checked":'';
        ?>
        @if (__("user::permission.module.".$module) != '')
            <li style="border:1px solid #ccc; padding:5px; margin-bottom:5px;">
                <a href="#">
                    <div class="form-check form-check-inline">
                    <input class="form-check-input module_<?= $module  ?>" name="module[<?= $module ?>][all]" type="checkbox" id="<?= $module ?>_all"
                        value="all" onclick="setCheckAllModulePermission(this,'<?= $module ?>');"
                        <?=$all_module_check ?>>
                    </div>
                    <strong><?=__("user::permission.module.".$module) ?></strong>
                </a>
                <ul style="margin-left: 20px;">
                    <?php foreach($pg as $group => $permissions){ 
                        $all_group_check = (!empty($checked['group'])&&isset($checked['group'][$module][$group])&&$checked['group'][$module][$group]['all']=='all')?"checked":'';	
                    ?>
                    {{-- @dump($group) --}}
                    <li style="border-bottom: 1px dotted #ccc ; margin-bottom:5px;">
                        <div class="row">
                            @if (!empty($permissions))
                            {{-- @dump($permissions) --}}
                                <div class="col-md-1">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input module_<?=$module ?> module_<?=$module ?>_<?= $group ?>"
                                            name="group[<?=$module ?>][<?= $group ?>][all]" type="checkbox" id="<?= $module ?>_<?= $group ?>_all"
                                            value="all" onclick="setCheckAllModuleGroupPermission(this,'<?= $module ?>,<?= $group ?>');"
                                        <?=$all_group_check?>>
                                    </div>
                                    <strong><?=$group?></strong>
                                </div>
                            @endif
                            <div class="col-md-11">
                                <?php foreach($permissions as $pk => $permission){
                                    $module_permission_checked =  (!empty($checked['permissions'])&&in_array($permission['id'],$checked['permissions']))?"checked":'';	
                                ?>
                                @if (__("user::permission.".$permission['name'] ) != '')
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input module_<?=$module ?> module_<?= $module ?>_<?= $group ?>"
                                        name="permissions[]" type="checkbox"
                                        id="<?= $module ?>_<?= $group ?>_<?= $permission['id']?>" value="<?= $permission['id'] ?>"
                                        <?= $module_permission_checked ?> >
                                        <label class="form-check-label" for="<?= $module ?>_<?= $group ?>"><?= __("user::permission.".$permission['name']) ?></label>
                                </div>
                                @endif
                                <?php } ?>
                            </div>
                        </div>
                        {{-- .row --}}
                    </li>
                    <?php } ?>

                </ul>
            </li>
        @endif
       
        <?php } ?>
    </ul>
</div>
