<!-- file upload -->
<div class="card" style="<?=($config['clip'])?'':'display: none;'?>">
    <div class="card-body">
        <div class="mb-2">
            <div class="form-group">
                <?= image_upload(
                    $id = '2', 
                    $name = 'clip', 
                    $label = __('content::admin.field.clip') . '', 
                    $image = (!empty($content->file))?$content->file:'', 
                    $size_recommend = ' ไม่เกิน 100 MB');
                ?>
            </div>
        </div>
    </div>
</div>
<!-- .file upload -->