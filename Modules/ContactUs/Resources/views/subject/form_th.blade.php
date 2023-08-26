{{-- Tap 1 --}}
<div class="tab_content active">
    <div class="alert alert-default" role="alert">
        <span class="alert-inner--icon"><i
                class="fe fe-bell"></i></i></span>
        <span class="alert-inner--text">{{ __('banner_admin.form_alert') }}
            <strong>{{ __('banner_admin.th') }}</strong></span>
    </div>
    <div class="form-group col-md-12">
        <label
            class="form-label required">{{ __('contact_admin.subject_th') }}</label>
        <input type="text" class="form-control" name="name_th"
            placeholder="{{ __('contact_admin.subject_th') }}"
            value="{{ !empty($data->name_th) ? $data->name_th : '' }}">
    </div>
</div>
{{-- End Tap 1 --}}
                                            