{{-- tap 2 --}}
<div class="tab_content">
    {{-- start input --}}
    <div class="alert alert-default" role="alert" title="ภาษอังกฤษ">
        <span class="alert-inner--icon"><i class="fe fe-bell"></i></i></span>
        <span class="alert-inner--text">{{ __('contact_admin.you_are_edit_the_display') }}
            <strong>{{ __('contact_admin.lang_eng') }}</strong></span>
    </div>
    {{-- <div class="form-group">
        <label class="form-label">{{ __('contact_admin.name_company') }}
            (EN)</label>
        <input type="text" class="form-control" name="name_en" maxlength="100"
            placeholder="{{ __('contact_admin.name_company_placeholder') }} (EN)"
            value="{{ !empty($data->name_en) ? $data->name_en : '' }}">
    </div> --}}
    {{-- <div class="form-group">
        <label class="form-label">รายละเอียด (EN)</label>
        <textarea id="desc_en" class="form-control texteditor" name="desc_en" rows="2" placeholder="ที่อยู่ (EN)">{{ !empty($data->desc_en) ? $data->desc_en : '' }}</textarea>
    </div> --}}
    <div class="form-group">
        <label class="form-label">{{ __('contact_admin.head_office') }}
            (EN)</label>
        <textarea class="form-control" name="office_en" id="office_en" rows="3"
            placeholder="{{ __('contact_admin.head_office_placeholder') }} (EN)">{{ !empty($data->office_en) ? $data->office_en : '' }}</textarea>
    </div>
    {{-- end input --}}
</div>
{{-- end tap 2 --}}
