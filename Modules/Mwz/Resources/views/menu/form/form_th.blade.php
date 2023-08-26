<!-- form-th -->
<div class="tab_content active">
    <div class="row">
        <div class="col-md-12">

            <div class="alert alert-default" role="alert">
                <span class="alert-inner--icon">
                    <i class="fe fe-bell"></i>
                </span>
                <span class="alert-inner--text">{{__('mwz::menu.form.you_are_edit_the_display')}}
                    <strong>{{__('mwz::menu.form.lang_th')}}</strong>
                </span>
            </div>
            
            <div class="form-group">
                <label class="form-label">{{__('mwz::menu.field.name')}} {{__('mwz::menu.field.lang_th')}}</label>
                <input type="text" class="form-control" id="name_th" name="name_th"
                    placeholder="{{__('mwz::menu.field.name_placeholder')}}"
                    value="{{ !empty($data->name_th) ? $data->name_th : '' }}">
                <input id="param" type="hidden" class="form-control" name="params"
                    value="" placeholder="param">
            </div>
            
           
        </div>
    </div>
</div>
<!-- .form-th -->
     