{{-- start input --}}
<div class="alert alert-default" role="alert" title="ภาษาไทย">
    <span class="alert-inner--icon"><i class="fe fe-bell"></i></i></span>
        <strong>กำหนดภาษาส่วนหน้าแรก ภาษาอังกฤษ</strong></span>
</div>
<div class="form-group">
    <label class="form-label" title="{{ __('websetting_admin.meta_title') }}">section ทำนายเบอร์มือถือ (EN)</label>
    <textarea class="form-control texteditor" id="text_predict_en_1" name="text_predict_en_1" rows="3"
    placeholder="{{ __('websetting_admin.meta_keywords') }}">{{ !empty($other->text_predict_en_1) ? $other->text_predict_en_1 : '' }}</textarea>
</div>
{{-- <div class="form-group">
    <label class="form-label" title="{{ __('websetting_admin.meta_keywords') }}">{{ __('websetting_admin.meta_keywords') }}</label>
    <textarea class="form-control" id="meta_keywords_en" name="meta_keywords_en" rows="3" placeholder="{{ __('websetting_admin.meta_keywords') }}">{{ !empty($setting->meta_keywords_en) ? $setting->meta_keywords_en : '' }}</textarea>
</div> --}}
{{-- <div class="form-group">
    <label class="form-label" title="{{ __('websetting_admin.meta_description') }}">{{ __('websetting_admin.meta_description') }}</label>
    <textarea class="form-control" id="meta_description_en" name="meta_description_en" rows="3" placeholder="{{ __('websetting_admin.meta_description') }}">{{ !empty($setting->meta_description_en) ? $setting->meta_description_en : '' }}</textarea>
</div> --}}

{{-- end input --}}