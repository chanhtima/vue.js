<div class="form-group mt-3">
    <label class="form-label">{{ __('contact_admin.sequence') }}</label>
    <input type="text" class="form-control" name="sequence" onkeypress="InputValidateString()"
        placeholder="{{ __('contact_admin.sequence') }}" value="{{ !empty($data->sequence) ? $data->sequence : '' }}">
</div>
<div class="form-group">
    <label class="form-label">{{ __('banner_admin.display') }}</label>
    <input type="checkbox" id="status" name="status" value="1" data-toggle="switchbutton" checked
        data-onstyle="outline-success" data-offstyle="outline-danger"
        {{ isset($data->status) ? ($data->status == 1 ? 'checked' : '') : 'checked' }}>
</div>
