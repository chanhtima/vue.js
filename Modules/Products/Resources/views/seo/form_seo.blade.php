<!-- product seo tab  -->
<div class="tab_content">
    <div class="tab_wrapper" id="product-seo-tab">
        <ul class="tab_list">
            <li class="icons-list-item" style="height: 36px;"><i class="flag flag-th"></i>
            </li>
            <li class="icons-list-item" style="height: 36px;"><i class="flag flag-gb"></i>
            </li>
        </ul>
        <div class="content_wrapper">
            <!-- form_seo_th -->
                @includeIf('products::seo.form_seo_th')
            <!-- .form_seo_th -->
           <!-- form_seo_en -->
                @includeIf('products::seo.form_seo_en')
            <!-- .form_seo_en -->
        </div>
    </div>
</div>
<!-- product seo tab  -->                            