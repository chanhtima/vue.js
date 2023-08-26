{{-- start tap --}}
<div class="tab_wrapper" id="tab_websetting_seo">
    <ul class="tab_list">
        <li class="icons-list-item" style="height: 36px;"><i class="flag flag-th"></i>
        </li>
        <li class="icons-list-item" style="height: 36px;"><i class="flag flag-gb"></i>
        </li>
    </ul>
    <input type="hidden" name="other_id" id="other_id" value="{{ !empty($other->id) ? $other->id : 0 }}">
    <div class="content_wrapper">
        {{-- tap 1 --}}
        <div class="tab_content active">
            <!-- form_tab_seo_th -->
                @includeIf('websetting::other.form_other_th')
            <!-- .form_tab_seo_th -->
        </div>
        {{-- end tap 1 --}}
        {{-- tap 2 --}}
        <div class="tab_content">
            <!-- form_tab_seo_en -->
                @includeIf('websetting::other.form_other_en')
            <!-- .form_tab_seo_en -->
        </div>
        {{-- end tap 2 --}}
    </div>
</div>
{{-- end tap --}}


