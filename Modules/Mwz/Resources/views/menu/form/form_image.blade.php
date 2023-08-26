<!-- file upload -->
<p>
<div class="card" style="<?=($config['image'])?'':'display: none;'?>">
    <div class="card-body">
        <div class="mb-2">
            <div class="form-group">
                <?= image_upload(
                    $id = '1', 
                    $name = 'image', 
                    $label = __('mwz::menu.field.image') . '', 
                    $image = (!empty($data->image))?$date->image:'', 
                    $size_recommend =  __('mwz::menu.field.image_size')
                    )
                ?>
            </div>
        </div>
    </div>
</div>
<!-- .file upload -->