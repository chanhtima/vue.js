<div class="form-group col-md-12">
    <label class="form-label">{{ __('product::brand.field.status') }}</label>
    <input type="checkbox" id="status" name="status" value="1" data-toggle="switchbutton" checked
        data-onstyle="outline-success" data-offstyle="outline-danger"
        {{ isset($data->status) ? ($data->status == 1 ? 'checked' : '') : 'checked' }}>
</div>
