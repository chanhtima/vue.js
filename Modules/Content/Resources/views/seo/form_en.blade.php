{{-- seo form en --}}
<div class="tab_content active">
    <input type="hidden" name="metadata[en][module]" value="<?=$metadata['en']['module']?>">
    <input type="hidden" name="metadata[en][method]" value="<?=$metadata['en']['method']?>">
    <input type="hidden" name="metadata[en][level]"  value="<?=$metadata['en']['level']?>">
    <div class="form-group frm-name">
        <label class="form-label">{{ __('content::metadata.slug') }} (EN)</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">{{ Request::root() }}/en/</span>
            </div>
            <input type="text" class="form-control" name="metadata[en][slug]" id="metadata_en_slug" placeholder="Slug"
                value="{{ !empty($metadata['en']['slug']) ? $metadata['en']['slug'] : '' }}">
            <div class="input-group-append">
                <span class="input-group-text" id="generate-from-name">
                    <a class="btn btn-app btn-secondary" href="javascript:void(0)" onclick="mwzGenerateMatadata();">
                        <i class="fa fa-magic"></i> {{ __('content::metadata.generate') }} 
                    </a>
                </span>
            </div>
        </div>
    </div>

    <div class="form-group frm-name">
        <label class="form-label">{{ __('content::metadata.meta_title') }} (EN)</label>
        <input type="text" class="form-control" name="metadata[en][meta_title]" id="metadata_en_title"  placeholder="Meta title"
            value="{{ !empty($metadata['en']['meta_title']) ? $metadata['en']['meta_title'] : '' }}">
    </div>
    <div class="form-group frm-name">
        <label class="form-label">{{ __('content::metadata.meta_keyword') }} (EN)</label>
        <input type="text" class="form-control" name="metadata[en][meta_keywords]" id="metadata_en_keywords" placeholder="Meta Keyword"
            value="{{ !empty($metadata['en']['meta_keywords']) ? $metadata['en']['meta_keywords'] : '' }}">
    </div>
    <div class="form-group frm-name">
        <label class="form-label">{{ __('content::metadata.meta_description') }}
            (EN)</label>
        <input type="text" class="form-control" name="metadata[en][meta_description]" id="metadata_en_description"  placeholder="Meta Description"
            value="{{ !empty($metadata['en']['meta_description']) ? $metadata['en']['meta_description'] : '' }}">
    </div>

</div>
{{-- .seo form en --}}
