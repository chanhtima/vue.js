{{-- start input --}}
<div class="alert alert-default" role="alert" title="ภาษาไทย">
    <span class="alert-inner--icon"><i class="fe fe-bell"></i></i></span>
    <span class="alert-inner--text">{{ __('websetting_admin.seo_alert') }}
        <strong>{{ __('contact_admin.lang_thai') }}</strong></span>
</div>

<div class="form-group">
    <label class="form-label"
        title="{{ __('websetting_admin.meta_title') }}">{{ __('websetting_admin.meta_title') }}</label>
    <input type="text" class="form-control" id="meta_title_th" name="meta_title_th"
        placeholder="{{ __('websetting_admin.meta_title') }}"
        value="{{ !empty($setting->meta_title_th) ? $setting->meta_title_th : '' }}">
</div>
<div class="form-group">
    <label class="form-label"
        title="{{ __('websetting_admin.meta_keywords') }}">{{ __('websetting_admin.meta_keywords') }}</label>
    <textarea class="form-control" id="meta_keywords_th" name="meta_keywords_th" rows="3"
        placeholder="{{ __('websetting_admin.meta_keywords') }}">{{ !empty($setting->meta_keywords_th) ? $setting->meta_keywords_th : '' }}</textarea>
</div>
<div class="form-group">
    <label class="form-label"
        title="{{ __('websetting_admin.meta_description') }}">{{ __('websetting_admin.meta_description') }}</label>
    <textarea class="form-control" id="meta_description_th" name="meta_description_th" rows="3"
        placeholder="{{ __('websetting_admin.meta_description') }}">{{ !empty($setting->meta_description_th) ? $setting->meta_description_th : '' }}</textarea>
</div>
{{-- end input --}}
