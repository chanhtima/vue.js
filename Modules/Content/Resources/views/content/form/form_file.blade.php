<!-- file upload -->
<div class="card" style="<?= $config['file'] ? '' : 'display: none;' ?>">
    <div class="card-body">
        <div class="mb-2">
            <div class="form-group">
                @if ($type == 'blog' || $type == 'news')
                    <?= image_upload($id = '2', $name = 'file', $label = __('content::admin.field.image') . ' แบนเนอร์', $image = !empty($content->file) ? $content->file : '', $size_recommend = '1920 x 1080 px') ?>
                @else
                    <?= image_upload($id = '2', $name = 'file', $label = __('content::admin.field.file') . '', $image = !empty($content->file) ? $content->file : '', $size_recommend = ' ไม่เกิน 100 MB') ?>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- .file upload -->
