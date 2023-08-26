<!-- form status -->
<div class="row">
    <div class="form-group col" style="<?= $config['start_at'] || $config['end_at'] ? '' : 'display: none;' ?>">
        <label class="form-label">วันที่ของงาน</label>
        <div class="input-group mb-3">
            <input type="date" class="form-control" name="start_at" id="start_at"
                style="<?= $config['start_at'] ? '' : 'display: none;' ?>"
                value="{{ !empty($content->start_at) ? date('Y-m-d', strtotime($content->start_at)) : '' }}">
            <div class="input-group-prepend">
            </div>
            <input type="date" class="form-control" name="end_at" id="end_at"
                style="<?= $config['end_at'] ? '' : 'display: none;' ?>"
                value="{{ !empty($content->end_at) ? ate('Y-m-d', strtotime($content->end_at)) : '' }}">
        </div>
    </div>

    <div class="form-group col-md-6" style="<?= $config['category'] ? '' : 'display: none;' ?>">
        <label class="form-label">{{ __('content::admin.field.category') }}</label>
        <select name="category_id" class="form-control select2"
            data-placeholder="{{ __('content::admin.field.category_placeholder') }}">
            <option value="0">-- {{ __('content::admin.field.category_placeholder') }} --</option>
            @if (!empty($parents))
                @foreach ($parents as $parent)
                    @if (!empty($content->id) && $parent->id == $content->category_id)
                        <option value="{{ $parent->id }}" selected="selected">
                            {{ str_pad('', $parent->level, '-', STR_PAD_LEFT) . $parent->name_th }}
                        </option>
                    @else
                        <option value="{{ $parent->id }}">
                            {{ str_pad('', $parent->level, '-', STR_PAD_LEFT) . $parent->name_th }}
                        </option>
                    @endif
                @endforeach
            @endif
        </select>
    </div>
    <input type="hidden" name="sequence" id="sequence" value="{{ !empty($content->sequence) ? $content->sequence : '' }}">
</div>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label class="form-label">{{ __('content::admin.field.status') }}</label>
                <div class="button button-r btn-switch">
                    <input type="checkbox" class="checkbox" id="status" name="status" value="1" {{ isset($content->status) ? ($content->status == 1 ? 'checked' : '') : 'checked' }}>>
                    <div class="knobs"></div>
                    <div class="layer"></div>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label class="form-label">{{ __('content::admin.field.status_index') }}</label>
                <div class="button button-r btn-switch">
                    <input type="checkbox" class="checkbox" id="index_status" name="index_status" value="1" {{ isset($content->status_index) ? ($content->status_index == 1 ? 'checked' : '') : 'checked' }}>>
                    <div class="knobs"></div>
                    <div class="layer"></div>
            </div>
        </div>
    </div>
</div>



<!-- .form status -->
