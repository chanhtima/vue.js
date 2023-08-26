<!-- content seo tab  -->
<div class="tab_content">
    <div class="tab_wrapper" id="content-seo-tab" data-mode="">
        <ul class="tab_list">
            <li class="icons-list-item" style="height: 36px;"><i class="flag flag-th"></i></li>
            <li class="icons-list-item" style="height: 36px;"><i class="flag flag-gb"></i></li>
        </ul>
        <div class="content_wrapper">
            <!-- content form_seo_th -->
                @includeIf('content::seo.form_th')
            <!-- .content form_seo_th -->
            
            <!-- content form_seo_en -->
                @includeIf('content::seo.form_en')
            <!-- . contentform_seo_en -->
        </div>
    </div>
</div>
<!-- .content seo tab  -->   
                       