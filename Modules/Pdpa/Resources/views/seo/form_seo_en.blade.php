{{-- Tap 1 --}}
<div class="tab_content">
    <input type="hidden" name="metadata[en][module]" value="policy">
    <input type="hidden" name="metadata[en][method]" value="policy">
    <input type="hidden" name="metadata[en][level]" value="1">
    <div class="form-group frm-name">
        <label class="form-label">Slug (EN)</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">{{ Request::root() }}/</span>
            </div>
            <input type="text" class="form-control" name="metadata[en][slug]" placeholder="Slug"
                value="{{ !empty($metadata['en']['slug']) ? $metadata['en']['slug'] : '' }}">
        </div>
    </div>

    <div class="form-group frm-name">
        <label class="form-label">Meta title (EN)</label>
        <input type="text" class="form-control" name="metadata[en][meta_title]" placeholder="Meta title"
            value="{{ !empty($metadata['en']['meta_title']) ? $metadata['en']['meta_title'] : '' }}">
    </div>
    <div class="form-group frm-name">
        <label class="form-label">Meta Keyword (EN)</label>
        <input type="text" class="form-control" name="metadata[en][meta_keywords]" placeholder="Meta Keyword"
            value="{{ !empty($metadata['en']['meta_keywords']) ? $metadata['en']['meta_keywords'] : '' }}">
    </div>
    <div class="form-group frm-name">
        <label class="form-label">Meta Description
            (EN)</label>
        <input type="text" class="form-control" name="metadata[en][meta_description]" placeholder="Meta Description"
            value="{{ !empty($metadata['en']['meta_description']) ? $metadata['en']['meta_description'] : '' }}">
    </div>

</div>
{{-- End Tap 1 --}}
