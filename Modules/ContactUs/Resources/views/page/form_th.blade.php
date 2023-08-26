{{-- tap 1 --}}
<div class="tab_content active">
    {{-- start input --}}
    <div class="alert alert-default" role="alert" title="ภาษาไทย">
        <span class="alert-inner--icon"><i class="fe fe-bell"></i></i></span>
        <span class="alert-inner--text">{{ __('contact_admin.you_are_edit_the_display') }}
            <strong>{{ __('contact_admin.lang_thai') }}</strong></span>
    </div>
    {{-- <div class="form-group">
        <label class="form-label">{{ __('contact_admin.name_company') }}
            (TH)</label>
        <input type="text" class="form-control" name="name_th"
            placeholder="{{ __('contact_admin.name_company_placeholder') }} (TH)" maxlength="100"
            value="{{ !empty($data->name_th) ? $data->name_th : '' }}">
    </div> --}}
    {{-- <div class="form-group">
        <label class="form-label">รายละเอียด (TH)</label>
        <textarea id="desc_th" class="form-control texteditor" name="desc_th" rows="2" placeholder="ที่อยู่ (TH)">{{ !empty($data->desc_th) ? $data->desc_th : '' }}</textarea>
    </div> --}}
    <div class="form-group">
        <label class="form-label">{{ __('contact_admin.head_office') }}
            (TH)</label>
        <textarea class="form-control" name="office_th" id="office_th" rows="3"
            placeholder="{{ __('contact_admin.head_office_placeholder') }} (TH)">{{ !empty($data->office_th) ? $data->office_th : '' }}</textarea>
    </div>
</div>
