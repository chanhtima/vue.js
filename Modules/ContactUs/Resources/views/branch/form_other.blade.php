<div class="row mt-3">
    <div class="form-group col-lg-4">
        <label class="form-label" title="E-mail">E-mail</label>
        <input type="email" class="form-control" name="email" placeholder="E-mail"maxlength="100"
            value="{{ !empty($data->email) ? $data->email : '' }}">
    </div>
    <div class="form-group col-lg-4">
        <label class="form-label" title="phone">Tel</label>
        <input type="text" class="form-control" name="phone" placeholder="Tel"maxlength="100"
            onkeypress="InputValidateString();" value="{{ !empty($data->phone) ? $data->phone : '' }}">
    </div>
    <div class="form-group col-lg-4">
        <label class="form-label" title="fax">Fax</label>
        <input type="text" class="form-control" name="fax" placeholder="fax"maxlength="100"
            onkeypress="InputValidateString();" value="{{ !empty($data->fax) ? $data->fax : '' }}">
    </div>
    <div class="form-group col-lg-6">
        <label class="form-label" title="Facebook">Facebook</label>
        <input type="text" class="form-control" name="facebook" placeholder="Facebook"maxlength="300"
            value="{{ !empty($data->facebook) ? $data->facebook : '' }}">
    </div>
    <div class="form-group col-lg-6">
        <label class="form-label" title="messenger">Messenger</label>
        <input type="text" class="form-control" name="messenger" placeholder="Messenger"maxlength="300"
            value="{{ !empty($data->messenger) ? $data->messenger : '' }}">
    </div>
    <div class="form-group col-lg-6">
        <label class="form-label" title="line">Line</label>
        <input type="text" class="form-control" name="line" id="line" placeholder="Line"maxlength="300"
            value="{{ !empty($data->line) ? $data->line : '' }}">
    </div>

    <div class="form-group col-lg-6">
        <label class="form-label" title="Youtube">Youtube</label>
        <input type="text" class="form-control" name="youtube" placeholder="Youtube"maxlength="300"
            value="{{ !empty($data->youtube) ? $data->youtube : '' }}">
    </div>
    <div class="form-group col-lg-6">
        <label class="form-label" title="Instagram">Instagram</label>
        <input type="text" class="form-control" name="instagram" placeholder="Instagram"maxlength="300"
            value="{{ !empty($data->instagram) ? $data->instagram : '' }}">
    </div>
    <div class="form-group col-lg-6">
        <label class="form-label" title="tiktok">Tiktok</label>
        <input type="text" class="form-control" name="tiktok" placeholder="Tiktok"maxlength="300"
            value="{{ !empty($data->tiktok) ? $data->tiktok : '' }}">
    </div>
</div>
<div class="form-group">
    <label class="form-label">Google Map </label>
    <textarea class="form-control" name="google_map" placeholder="Google Map" rows="4"
        value="">{{ !empty($data->google_map) ? $data->google_map : '' }}</textarea>
</div>
<div class="form-group">
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
