<!-- file upload -->
<p>
    <div class="card" style="<?=($config['image'])?'':'display: none;'?>">
        <div class="card-body">
            <div class="mb-2">
                <div class="form-group">
                    <?= image_upload(
                        $id = '1', 
                        $name = 'image', 
                        $label = __('banner::category.field.image') . '', 
                        $image = (!empty($category->image))?$category->image:'', 
                        $size_recommend =  __('banner::category.field.image_size')
                        )
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- .file upload -->