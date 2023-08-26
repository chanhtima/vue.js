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
    {{-- <div class="form-group">
        <label class="form-label">{{ __('banner_admin.description_en') }}</label>
        <textarea id="description_en" class="form-control texteditor" name="description_en" rows="4"
            placeholder="{{ __('banner_admin.description_placeholder_en') }}">{{ !empty($data->description_en) ? $data->description_en : '' }}</textarea>
    </div> --}}
    {{-- End Input --}}
</div>
