{{-- start input --}}
<div class="alert alert-default" role="alert" title="ภาษอังกฤษ">
    <span class="alert-inner--icon"><i class="fe fe-bell"></i></i></span>
    <span
        class="alert-inner--text">{{ __('websetting_admin.seo_alert') }}
        <strong>{{ __('contact_admin.lang_eng') }}</strong></span>
</div>

<div class="form-group">
    <label class="form-label" title="{{ __('websetting_admin.meta_title') }}">{{ __('websetting_admin.meta_title') }}</label>
    <input type="text" class="form-control" id="meta_title_en" name="meta_title_en" placeholder="{{ __('websetting_admin.meta_title') }}" value="{{ !empty($setting->meta_title_en) ? $setting->meta_title_en : '' }}">
</div>
<div class="form-group">
    <label class="form-label" title="{{ __('websetting_admin.meta_keywords') }}">{{ __('websetting_admin.meta_keywords') }}</label>
    <textarea class="form-control" id="meta_keywords_en" name="meta_keywords_en" rows="3" placeholder="{{ __('websetting_admin.meta_keywords') }}">{{ !empty($setting->meta_keywords_en) ? $setting->meta_keywords_en : '' }}</textarea>
</div>
<div class="form-group">
    <label class="form-label" title="{{ __('websetting_admin.meta_description') }}">{{ __('websetting_admin.meta_description') }}</label>
    <textarea class="form-control" id="meta_description_en" name="meta_description_en" rows="3" placeholder="{{ __('websetting_admin.meta_description') }}">{{ !empty($setting->meta_description_en) ? $setting->meta_description_en : '' }}</textarea>
</div>

{{-- end input --}}



