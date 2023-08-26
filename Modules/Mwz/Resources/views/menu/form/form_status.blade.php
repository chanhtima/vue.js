<!-- form status -->
<div class="row">
    <div class="form-group col-md-6" style="<?=($config['parent'])?'':'display: none;'?>">
        <label class="form-label">{{__('mwz::menu.field.category')}}</label>
        <select name="parent_id" class="form-control select2" data-placeholder="{{__('mwz::menu.field.category_placeholder')}}">
            <option value="0">-- {{__('mwz::menu.field.category_placeholder')}} --</option>
            @foreach ($parents as $parent)
                @if (!empty($data->id) && $parent->id == $data->parent_id)
                    <option value="{{ $parent->id }}" selected="selected">
                        {{ str_pad('', $parent->level, '-', STR_PAD_LEFT) . $parent->name_th }}
                    </option>
                @else
                    @if (empty($data->id) || (!empty($data->id) && $parent->id != $data->id) ) 
                        <option value="{{ $parent->id }}">
                            {{ str_pad('', $parent->level, '-', STR_PAD_LEFT) . $parent->name_th }}
                        </option>
                    @endif
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group col-lg-6">
        <label class="form-label">{{__('mwz::menu.field.status')}}</label>
        <div class="button button-r btn-switch">
            <input type="checkbox" class="checkbox" id="status" name="status" value="1" {{ isset($menu->status) ? ($menu->status == 1 ? 'checked' : '') : 'checked' }}>
            <div class="knobs"></div>
            <div class="layer"></div>
        </div>
    </div>
</div>
<!-- .form status -->