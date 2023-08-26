<!-- form-th -->
<div class="tab_content active">
    <div class="row">
        <div class="col-md-12">

            <div class="alert alert-default" role="alert">
                <span class="alert-inner--icon">
                    <i class="fe fe-bell"></i>
                </span>
                <span class="alert-inner--text">{{__('content::admin.form.you_are_edit_the_display')}}
                    <strong>{{__('content::admin.lang_th')}}</strong>
                </span>
            </div>
            <div class="form-group">
                <label class="form-label">{{__('content::admin.field.name')}} (TH)</label>
                <input type="text" class="form-control" id="name_th" name="name_th"
                    placeholder="{{__('content::admin.field.name_placeholder')}}"
                    value="{{ !empty($content->name_th) ? $content->name_th : '' }}">
                <input id="param" type="hidden" class="form-control" name="params"
                    value="" placeholder="param">
            </div>
            
            <div class="row">

                <div class="form-group col-md-12" style="<?=($config['desc'])?'':'display: none;'?>" >
                    <label class="form-label">{{__('content::admin.field.desc')}} (TH)</label>
                    <textarea id="desc_th" name="desc_th" class="form-control" rows="4"
                        placeholder="{{__('content::admin.field.desc_placeholder')}}">{{ !empty($content->desc_th) ? $content->desc_th : '' }}</textarea>
                </div>
                <div class="form-group col-md-12" style="<?=($config['detail'])?'':'display: none;'?>" >
                    <label class="form-label">{{__('content::admin.field.detail')}} (TH)</label>
                    <textarea id="detail_th" class="form-control texteditor"
                        name="detail_th" rows="4"
                        placeholder="{{__('content::admin.field.detail_placeholder')}}">{{ !empty($content->detail_th) ? $content->detail_th : '' }}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- .form-th -->
     