<label class="form-label">{{ __('user_admin.permission') }}</label>
<ul id="show_roles" class="treeview">
    <?php foreach($roles as $rm_k => $rm_p){ ?>
    <li><a href="#">@lang("user::lang.$rm_k")</a>
        <ul>
            <?php foreach($rm_p as $rmm_k => $rmm_p){ 
                $all_check = '';
				if(!empty($user->role[$rm_k][$rmm_k])){
					$all_check = (in_array('all',$user->role[$rm_k][$rmm_k]))?'checked="checked"':'';
				}?>
            <li>
                <div class="form-check form-check-inline"><input class="form-check-input <?= $rm_k ?>_<?= $rmm_k ?>"
                        name="role[<?= $rm_k ?>][<?= $rmm_k ?>][all]" type="checkbox" id="<?= $rm_k ?>_<?= $rmm_k ?>_all"
                        value="all" onclick="setCheckAllPermission(this,'<?= $rm_k ?>_<?= $rmm_k ?>');"
                        <?= $all_check ?>></div><strong>@lang("user::lang.o_$rm_k.$rmm_k")<?= ' :  ' ?></strong>
                <?php foreach($rmm_p as $rmmm_k => $rmmm_p){
                    $module_role_checked= '';
		            if(!empty($user->role[$rm_k][$rmm_k])){
			            $module_role_checked = (in_array($rmmm_k,$user->role[$rm_k][$rmm_k]))?'checked="checked"':'';
		                }?>
                <div class="form-check form-check-inline">
                    <input class="form-check-input <?= $rm_k ?>_<?= $rmm_k ?>"
                        name="role[<?= $rm_k ?>][<?= $rmm_k ?>][<?= $rmmm_k ?>]" type="checkbox"
                        id="<?= $rm_k ?>_<?= $rmm_k ?>_<?= $rmmm_k ?>" value="<?= $rmmm_k ?>"
                        <?= $module_role_checked ?>>
                    <label class="form-check-label" for="<?= $rmm_k ?>_<?= $rmmm_k ?>">@lang("user::lang.$rmmm_k")</label>
                </div>
                <?php } ?>
            </li>
            <?php } ?>

        </ul>
    </li>
    <?php } ?>
</ul>
