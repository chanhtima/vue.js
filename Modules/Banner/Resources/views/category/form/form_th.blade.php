<!-- form-th -->
<div class="tab_content active">
    <div class="row">
        <div class="col-md-12">

            <div class="alert alert-default" role="alert">
                <span class="alert-inner--icon">
                    <i class="fe fe-bell"></i>
                </span>
                <span class="alert-inner--text">{{__('banner::module.form.you_are_edit_the_display')}}
                    <strong>{{__('banner::module.form.lang_th')}}</strong>
                </span>
            </div>
            
            <div class="form-group">
                <label class="form-label">{{__('banner::category.field.name')}} {{__('banner::category.field.lang_th')}}</label>
                <input type="text" class="form-control" id="name_th" name="name_th"
                    placeholder="{{__('banner::category.field.name_placeholder')}}"
                    value="{{ !empty($category->name_th) ? $category->name_th : '' }}">
                <input id="param" type="hidden" class="form-control" name="params"
                    value="" placeholder="param">
            </div>
            
            <div class="row" style="<?=($config['desc'])?'':'display: none;'?>">
                <div class="form-group col-md-12">
                    <label class="form-label">{{__('banner::category.field.desc')}} {{__('banner::category.field.lang_th')}}</label>
                    <textarea id="desc_th" class="form-control"
                        name="desc_th" rows="4"
                        placeholder="{{__('banner::category.field.desc_placeholder')}}">{{ !empty($category->desc_th) ? $category->desc_th : '' }}</textarea>
                </div>
            </div>

            <div class="row" style="<?=($config['detail'])?'':'display: none;'?>">
                <div class="form-group col-md-12">
                    <label class="form-label">{{__('banner::category.field.detail')}} {{__('banner::category.field.lang_th')}}</label>
                    <textarea id="detail_th" class="form-control texteditor"
                        name="detail_th" rows="4"
                        placeholder="{{__('banner::category.field.detail_placeholder')}}">{{ !empty($category->detail_th) ? $category->detail_th : '' }}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- .form-th -->
     