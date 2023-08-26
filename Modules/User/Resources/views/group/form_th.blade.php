<div class="tab_content active">
    <div class="alert alert-default" role="alert">
        <span class="alert-inner--icon"><i class="fe fe-bell"></i></i></span>
        <span class="alert-inner--text">{{ __('product::module.form.you_are_edit_the_display') }}
            <strong>{{ __('product::module.form.lang_th') }}</strong></span>
    </div>

    <div class="form-group">
        <label class="form-label">{{__('product::brand.field.name')}} {{__('product::brand.field.lang_th')}}</label>
        <input type="text" class="form-control" id="name_th" name="name_th"
            placeholder="{{__('product::brand.field.name_placeholder')}}"
            value="{{ !empty($data->name_th) ? $data->name_th : '' }}">
    </div>
    
    <div class="row" style="<?=($config['desc'])?'':'display: none;'?>">
        <div class="form-group col-md-12">
            <label class="form-label">{{__('product::brand.field.desc')}} {{__('product::brand.field.lang_th')}}</label>
            <textarea id="desc_th" class="form-control"
                name="desc_th" rows="4"
                placeholder="{{__('product::brand.field.desc_placeholder')}}">{{ !empty($data->desc_th) ? $data->desc_th : '' }}</textarea>
        </div>
    </div>

    <div class="row" style="<?=($config['detail'])?'':'display: none;'?>">
        <div class="form-group col-md-12">
            <label class="form-label">{{__('product::brand.field.detail')}} {{__('product::brand.field.lang_th')}}</label>
            <textarea id="detail_th" class="form-control texteditor"
                name="detail_th" rows="4"
                placeholder="{{__('product::brand.field.detail_placeholder')}}">{{ !empty($data->detail_th) ? $data->detail_th : '' }}</textarea>
        </div>
    </div>
</div>
