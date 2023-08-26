<!-- form en -->
<div class="tab_content">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-default" role="alert">
                <span class="alert-inner--icon"><i
                        class="fe fe-bell"></i></i></span>
                <span class="alert-inner--text">{{__('banner::module.form.you_are_edit_the_display')}}
                    <strong>{{__('banner::module.form.lang_en')}}</strong></span>
            </div>
            <div class="form-group">
                <label class="form-label">{{__('banner::category.field.name')}} {{__('banner::category.field.lang_en')}}</label>
                <input type="text" class="form-control" id="name_en" name="name_en"
                    placeholder="{{__('banner::category.field.name_placeholder')}}"
                    value="{{ !empty($category->name_en) ? $category->name_en : '' }}">
            </div>
            
            <div class="row" style="<?=($config['desc'])?'':'display: none;'?>">
                <div class="form-group col-md-12">
                    <label class="form-label">{{__('banner::category.field.desc')}} {{__('banner::category.field.lang_en')}}</label>
                    <textarea id="desc_en" class="form-control"
                        name="desc_en" rows="4"
                        placeholder="{{__('banner::category.field.desc_placeholder')}}">{{ !empty($category->desc_en) ? $category->desc_en : '' }}</textarea>
                </div>
            </div>

            <div class="row" style="<?=($config['detail'])?'':'display: none;'?>">
                <div class="form-group col-md-12">
                    <label class="form-label">{{__('banner::category.field.detail')}} {{__('banner::category.field.lang_th')}}</label>
                    <textarea id="detail_en" class="form-control texteditor"
                        name="detail_en" rows="4"
                        placeholder="{{__('banner::category.field.detail_placeholder')}}">{{ !empty($category->detail_en) ? $category->detail_en : '' }}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- .form en -->