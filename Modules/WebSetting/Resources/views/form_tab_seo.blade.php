{{-- start tap --}}
<div class="form-group">
    <?= image_upload(
        $id = '7', 
        $name = 'seo_image', 
        $label =   'อัปโหลดรูปภาพ SEO', 
        $image = (!empty($setting->seo_image))?$setting->seo_image:'', 
        $size_recommend =  '600 x 200px',
        )
    ?>
</div>
<div class="tab_wrapper" id="tab_websetting_seo">
    <ul class="tab_list">
        <li class="icons-list-item" style="height: 36px;"><i class="flag flag-th"></i>
        </li>
        <li class="icons-list-item" style="height: 36px;"><i class="flag flag-gb"></i>
        </li>
    </ul>
    <div class="content_wrapper">
        {{-- tap 1 --}}
        <div class="tab_content active">

            <!-- form_tab_seo_th -->
                @includeIf('websetting::form_tab_seo_th')
            <!-- .form_tab_seo_th -->

        </div>
        {{-- end tap 1 --}}
        {{-- tap 2 --}}
        <div class="tab_content">
            <!-- form_tab_seo_en -->
                @includeIf('websetting::form_tab_seo_en')
            <!-- .form_tab_seo_en -->
        </div>
        {{-- end tap 2 --}}
    </div>
</div>
{{-- end tap --}}


