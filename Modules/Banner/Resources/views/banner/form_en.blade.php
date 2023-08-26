{{-- Tap 2 --}}
<div class="tab_content">
    {{-- Start Input --}}
    <div class="alert alert-default" role="alert">
        <span class="alert-inner--icon"><i class="fe fe-bell"></i></i></span>
        <span class="alert-inner--text">{{ __('banner_admin.form_alert') }}
            <strong>{{ __('banner_admin.en') }}</strong></span>
    </div>
    <div class="form-group">
        <label class="form-label">{{ __('banner_admin.name_en') }}</label>
        <input type="text" class="form-control" name="name_en" id="name_en"
            placeholder="{{ __('banner_admin.name_placeholder_en') }}"
            value="{{ !empty($data->name_en) ? $data->name_en : '' }}">
    </div>
    {{-- End Input --}}
</div>
