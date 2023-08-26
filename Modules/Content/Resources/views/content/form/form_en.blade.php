<!-- form en -->
<div class="tab_content">
    <div class="row">
        <div class="col-md-12">

            <div class="alert alert-default" role="alert">
                <span class="alert-inner--icon"><i class="fe fe-bell"></i></i></span>
                <span class="alert-inner--text">{{ __('content::admin.form.you_are_edit_the_display') }}
                    <strong>{{ __('content::admin.lang_en') }}</strong></span>
            </div>
            <div class="form-group">
                <label class="form-label">{{ __('content::admin.field.name') }} (EN)</label>
                <input type="text" class="form-control" id="name_en" name="name_en"
                    placeholder="{{ __('content::admin.field.name_placeholder') }}"
                    value="{{ !empty($content->name_en) ? $content->name_en : '' }}">
            </div>

            <div class="row">
                <div class="form-group col-md-12" style="<?= $config['desc'] ? '' : 'display: none;' ?>">
                    <label class="form-label">{{ __('content::admin.field.desc') }} (EN)</label>
                    <textarea id="desc_en" name="desc_en" class="form-control " rows="4"
                        placeholder="{{ __('content::admin.field.desc_placeholder') }}">{{ !empty($content->desc_en) ? $content->desc_en : '' }}</textarea>
                </div>
                <div class="form-group col-md-12"style="<?= $config['detail'] ? '' : 'display: none;' ?>">
                    <label class="form-label">{{ __('content::admin.field.detail') }} (EN)</label>
                    <textarea id="detail_en" class="form-control texteditor" name="detail_en" rows="4"
                        placeholder="{{ __('content::admin.field.detail_placeholder') }}">{{ !empty($content->detail_en) ? $content->detail_en : '' }}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- .form en -->
