{{-- seo form th --}}
<div class="tab_content">
    <input type="hidden" name="metadata[th][module]" value="<?=$metadata['th']['module']?>">
    <input type="hidden" name="metadata[th][method]" value="<?=$metadata['th']['method']?>">
    <input type="hidden" name="metadata[th][level]"  value="<?=$metadata['th']['level']?>">
    <div class="form-group frm-name">
        <label class="form-label">{{ __('content::metadata.slug') }} (TH)</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">{{ Request::root() }}/</span>
            </div>
            <input type="text" class="form-control" name="metadata[th][slug]" id="metadata_th_slug" placeholder="{{ __('content::metadata.slug_placeholder') }}"
                value="{{ !empty($metadata['th']['slug']) ? $metadata['th']['slug'] : '' }}">
            <div class="input-group-append">
                <span class="input-group-text" id="generate-from-name">
                    <a class="btn btn-app btn-secondary " href="javascript:void(0)" onclick="mwzGenerateMatadata();">
                        <i class="fa fa-magic"></i> {{ __('content::metadata.generate') }} 
                    </a>
                </span>
            </div>
        </div>
    </div>

    <div class="form-group frm-name">
        <label class="form-label">{{ __('content::metadata.meta_title') }} (TH)</label>
        <input type="text" class="form-control" name="metadata[th][meta_title]" id="metadata_th_title" placeholder="{{ __('content::metadata.meta_title_placeholder') }} title"
            value="{{ !empty($metadata['th']['meta_title']) ? $metadata['th']['meta_title'] : '' }}">
    </div>
    <div class="form-group frm-name">
        <label class="form-label">{{ __('content::metadata.meta_keyword') }} (TH)</label>
        <input type="text" class="form-control" name="metadata[th][meta_keywords]" id="metadata_th_keywords"  placeholder="{{ __('content::metadata.meta_keyword_placeholder') }}"
            value="{{ !empty($metadata['th']['meta_keywords']) ? $metadata['th']['meta_keywords'] : '' }}">
    </div>
    <div class="form-group frm-name">
        <label class="form-label">{{ __('content::metadata.meta_description') }}
            (TH)</label>
        <input type="text" class="form-control" name="metadata[th][meta_description]" id="metadata_th_description" placeholder="{{ __('content::metadata.meta_description_placeholder') }}"
            value="{{ !empty($metadata['th']['meta_description']) ? $metadata['th']['meta_description'] : '' }}">
    </div>

</div>
{{-- seo form th --}}
