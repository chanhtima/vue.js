<!-- form en -->
<div class="tab_content">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-default" role="alert">
                <span class="alert-inner--icon"><i
                        class="fe fe-bell"></i></i></span>
                <span class="alert-inner--text">{{__('mwz::menu.form.you_are_edit_the_display')}}
                    <strong>{{__('mwz::menu.form.lang_en')}}</strong></span>
            </div>
            <div class="form-group">
                <label class="form-label">{{__('mwz::menu.field.name')}} {{__('mwz::menu.field.lang_en')}}</label>
                <input type="text" class="form-control" id="name_en" name="name_en"
                    placeholder="{{__('mwz::menu.field.name_placeholder')}}"
                    value="{{ !empty($data->name_en) ? $data->name_en : '' }}">
            </div>
            
        </div>
    </div>
</div>
<!-- .form en -->