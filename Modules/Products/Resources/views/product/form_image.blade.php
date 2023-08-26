<!-- product image tab  -->
<div class="tab_content">
    <div class="form-group frm-image">
        <label class="form-label">รูปสินค้า</label>
        <div class="row">
            <div class="col-md-12">
                <div class="row group-image">
                    <?php $image_count = 0;
                    $default_image_box = 8; ?>
                    @if (!empty($product['data']->images))
                        @foreach ($product['data']->images as $k => $image)
                            <input type="hidden" name="hide_uploadfiles[{{ $image_count }}]" value="{{ !empty($image['image']) ? $image['image'] : '' }}">
                             @if ($k == 0)
                                <div class="col-md-12 pt-4 box-image">
                                    <?= image_upload($id = $image_count + 4, $name = 'uploadfiles[' . $image_count . ']', $label = __('websetting_admin.upload_image_header'), $image = !empty($image['image']) ? $image['image'] : '', $size_recommend = '800 x 600px',false,true) ?>
                                </div>
                             @else
                                <div class="col-md-3 pt-4 box-image">
                                    <?= image_upload($id = $image_count + 4, $name = 'uploadfiles[' . $image_count . ']', $label = __('websetting_admin.upload_image_header'), $image = !empty($image['image']) ? $image['image'] : '', $size_recommend = '800 x 600px',false,true) ?>
                                </div>
                             @endif
                           
                            <?php $image_count++; ?>
                        @endforeach
                    @else
                   
                        <div class="col-md-12 pt-4 box-image">
                            <input type="hidden" name="hide_uploadfiles[{{ $image_count }}]" value="">
                            <?= image_upload($id = $image_count + 2, $name = 'uploadfiles[' . $image_count . ']', $label = __('websetting_admin.upload_image_header'), $image = !empty($image['image']) ? $image['image'] : '', $size_recommend = '800 x 600px',false,true) ?>
                        </div>
                        <?php $image_count++; ?>
                    @endif
                    @if ($image_count < $default_image_box)
                        @while ($image_count < $default_image_box)
                            <div class="col-md-3 pt-4 box-image">
                                <input type="hidden" name="hide_uploadfiles[{{ $image_count }}]" value="">
                                <?= image_upload($id = $image_count + 10, $name = 'uploadfiles[' . $image_count . ']', $label = __('websetting_admin.upload_image_header'), $image = !empty($image['image']) ? $image['image'] : '', $size_recommend = '800 x 600px',false,true) ?>
                            </div>
                            <?php $image_count++; ?>
                        @endwhile
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
<!-- product image tab  -->
