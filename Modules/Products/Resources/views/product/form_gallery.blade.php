<div class="tab_content">
    @if (!empty($product['data']->gallery))
        @for ($i = 0; $i < count($product['data']->gallery); $i++)
            <input type="hidden" name="hide_image_multi[{{ $i }}]" value="{{ !empty($product['data']->gallery[$i]['image']) ? $product['data']->gallery[$i]['image'] : '' }}">
        @endfor
    @endif
   
    {{-- <input type="hidden" name="hide_image_multi" value="{{!empty($product['data']->gallery) ? $product['data']->gallery : ''}} "> --}}
    <?= image_upload_multiple($id = 'image_multi', $name = 'image_multi', $files = !empty($product['data']->gallery) ? $product['data']->gallery : '', $action = '/admin/product/list/save_image_multi', $thumbnail_path = '', $accept_files = '.jpg,.png,.jpeg,.gif', $max_file = 5, $upload_msg = 'Drop image here (or click) to capture/upload', $remove_msg = 'remove', $max_file_msg = 'You can not upload any more files.', $inputs = []) ?>
</div>
{{-- /admin/product/list/save_image_multi --}}
