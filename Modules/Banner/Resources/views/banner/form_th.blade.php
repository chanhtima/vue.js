{{-- Tap 1 --}}
<div class="tab_content active">
    {{-- Start Input --}}
    <div class="alert alert-default" role="alert">
        <span class="alert-inner--icon"><i class="fe fe-bell"></i></i></span>
        <span class="alert-inner--text">{{ __('banner_admin.form_alert') }}
            <strong>{{ __('banner_admin.th') }}</strong></span>
    </div>
    <div class="form-group">
        <label class="form-label">{{ __('banner_admin.name_th') }}</label>
        <input type="text" class="form-control" name="name_th" id="name_th"
            placeholder="{{ __('banner_admin.name_placeholder_th') }}"
            value="{{ !empty($data->name_th) ? $data->name_th : '' }}">
        <input id="param" type="hidden" class="form-control" name="params" value="" placeholder="param">
    </div>
    {{-- End Input --}}
</div>
{{-- End Tap 1 --}}
