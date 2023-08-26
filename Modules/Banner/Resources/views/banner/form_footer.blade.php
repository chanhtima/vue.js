{{-- end locatiion --}}
<div class="row">
    <div class="form-group col-md-6 {{ $config['link'] ? "" : "d-none" }}">
        <label class="form-label">{{ __('banner_admin.link') }}</label>
        <input type="text" class="form-control" name="link" id="link"
            placeholder="{{ __('banner_admin.link_placeholder') }}" value="{{ !empty($data->link) ? $data->link : '' }}">
    </div>
    <div class="form-group col-md-6">
        <label class="form-label">{{ __('banner_admin.sequence') }}</label>
        <input id="sequence" type="text" class="form-control" name="sequence" placeholder="โปรดระบุลำดับการแสดงผล"
            maxlength="3" onkeypress="InputValidateString()" value="{{ !empty($data->sequence) ? $data->sequence : '' }}">
    </div>
    {{-- <div class="row"> --}}
        <div class="form-group col-md-6">
            <label class="form-label">{{ __('banner_admin.display') }}</label>
                <div class="button button-r btn-switch">
                    <input type="checkbox" class="checkbox" id="status" name="status" value="1" {{ isset($data->status) ? ($data->status == 1 ? 'checked' : '') : 'checked' }}>>
                    <div class="knobs"></div>
                    <div class="layer"></div>
            </div>
        </div>
    {{-- </div> --}}
</div>






