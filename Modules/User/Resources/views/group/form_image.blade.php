<!-- file upload -->
<div class="form-group col-md-6">
    <div class="card" style="<?= $config['image'] ? '' : 'display: none;' ?>">
        <div class="card-body">
            <div class="form-group">
                <?= image_upload($id = '1', $name = 'image', $label = __('product::brand.field.image') . '', $image = !empty($data->image) ? $data->image : '', $size_recommend = __('product::brand.field.image_size')) ?>
            </div>
        </div>
    </div>
</div>
<!-- .file upload -->

