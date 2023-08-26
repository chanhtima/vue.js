{{-- start input --}}
<div class="alert alert-default" role="alert" title="ภาษาไทย">
    <span class="alert-inner--icon"><i class="fe fe-bell"></i></i></span>
        <strong>กำหนดภาษาส่วนหน้าแรก ภาษาไทย</strong></span>
</div>

<div class="form-group">
    <label class="form-label" title="{{ __('websetting_admin.meta_title') }}">section ทำนายเบอร์มือถือ (TH)</label>
    <textarea class="form-control texteditor" id="text_predict_th_1" name="text_predict_th_1" rows="3"
    placeholder="{{ __('websetting_admin.meta_keywords') }}">{{ !empty($other->text_predict_th_1) ? $other->text_predict_th_1 : '' }}</textarea>
</div>
{{-- <div class="form-group">
    <label class="form-label"
        title="{{ __('websetting_admin.meta_keywords') }}">{{ __('websetting_admin.meta_keywords') }}</label>
    <textarea class="form-control" id="meta_keywords_th" name="meta_keywords_th" rows="3"
        placeholder="{{ __('websetting_admin.meta_keywords') }}">{{ !empty($setting->meta_keywords_th) ? $setting->meta_keywords_th : '' }}</textarea>
</div> --}}
{{-- <div class="form-group">
    <label class="form-label"
        title="{{ __('websetting_admin.meta_description') }}">{{ __('websetting_admin.meta_description') }}</label>
    <textarea class="form-control" id="meta_description_th" name="meta_description_th" rows="3"
        placeholder="{{ __('websetting_admin.meta_description') }}">{{ !empty($setting->meta_description_th) ? $setting->meta_description_th : '' }}</textarea>
</div> --}}
{{-- end input --}}