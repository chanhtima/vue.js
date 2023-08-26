{{-- Tap 2 --}}
<div class="tab_content">
    <div class="alert alert-default" role="alert">
        <span class="alert-inner--icon"><i class="fe fe-bell"></i></i></span>
        <span class="alert-inner--text">{{ __('banner_admin.form_alert') }}
            <strong>{{ __('banner_admin.en') }}</strong></span>
    </div>
    <div class="form-group col-md-12">
        <label class="form-label required">{{ __('contact_admin.subject_en') }}</label>
        <input type="text" class="form-control" name="name_en" placeholder="{{ __('contact_admin.subject_en') }}"
            value="{{ !empty($data->name_en) ? $data->name_en : '' }}">
    </div>
</div>
{{-- End Tap 2 --}}
