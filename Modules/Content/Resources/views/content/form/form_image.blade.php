<!-- file upload -->
<div class="card" style="<?= $config['image'] ? '' : 'display: none;' ?>">
    <div class="card-body">
        <div class="form-group">
            <?= image_upload($id = '1', $name = 'image', $label = __('content::admin.field.image') . '', $image = !empty($content->image) ? $content->image : '', $size_recommend = ' 1920 x 1080 px',false,true) ?>
        </div>
    </div>
</div>
<!-- .file upload -->
