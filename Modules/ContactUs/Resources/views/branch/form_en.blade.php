{{-- Tap 2 --}}
<div class="tab_content">
    <div class="alert alert-default" role="alert">
        <span class="alert-inner--icon"><i class="fe fe-bell"></i></i></span>
        <span class="alert-inner--text">{{ __('banner_admin.form_alert') }}
            <strong>{{ __('banner_admin.en') }}</strong></span>
    </div>
    <div class="form-group">
        <label class="form-label required">{{ __('contact_admin.name_en') }}</label>
        <input type="text" class="form-control" name="name_en" placeholder="{{ __('contact_admin.name_en') }}"
            value="{{ !empty($data->name_en) ? $data->name_en : '' }}">
    </div>
    <div class="form-group">
        <label class="form-label">{{ __('contact_admin.head_office') }}
            (TH)</label>
        <textarea class="form-control" name="office_en" id="office_en" rows="3"
            placeholder="{{ __('contact_admin.head_office_placeholder') }} (EN)">{{ !empty($data->office_en) ? $data->office_en : '' }}</textarea>
    </div>
</div>
{{-- End Tap 2 --}}
