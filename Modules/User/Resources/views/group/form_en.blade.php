<div class="tab_content active">
    <div class="alert alert-default" role="alert">
        <span class="alert-inner--icon"><i class="fe fe-bell"></i></i></span>
        <span class="alert-inner--text">{{ __('product::module.form.you_are_edit_the_display') }}
            <strong>{{ __('product::module.form.lang_en') }}</strong></span>
    </div>

    <div class="form-group">
        <label class="form-label">{{__('product::brand.field.name')}} {{__('product::brand.field.lang_en')}}</label>
        <input type="text" class="form-control" id="name_en" name="name_en"
            placeholder="{{__('product::brand.field.name_placeholder')}}"
            value="{{ !empty($data->name_en) ? $data->name_en : '' }}">
    </div>
    
    <div class="row" style="<?=($config['desc'])?'':'display: none;'?>">
        <div class="form-group col-md-12">
            <label class="form-label">{{__('product::brand.field.desc')}} {{__('product::brand.field.lang_en')}}</label>
            <textarea id="desc_en" class="form-control"
                name="desc_en" rows="4"
                placeholder="{{__('product::brand.field.desc_placeholder')}}">{{ !empty($data->desc_en) ? $data->desc_en : '' }}</textarea>
        </div>
    </div>

    <div class="row" style="<?=($config['detail'])?'':'display: none;'?>">
        <div class="form-group col-md-12">
            <label class="form-label">{{__('product::brand.field.detail')}} {{__('product::brand.field.lang_en')}}</label>
            <textarea id="detail_en" class="form-control texteditor"
                name="detail_en" rows="4"
                placeholder="{{__('product::brand.field.detail_placeholder')}}">{{ !empty($data->detail_en) ? $data->detail_en : '' }}</textarea>
        </div>
    </div>
</div>