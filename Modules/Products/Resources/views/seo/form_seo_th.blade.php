{{-- Tap 1 --}}
<div class="tab_content active">
    <input type="hidden" name="metadata[th][module]" value="product">
    <input type="hidden" name="metadata[th][method]" value="productDetail">
    <input type="hidden" name="metadata[th][level]" value="3">
    <div class="form-group frm-name">
        <label class="form-label">Slug (TH)</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">{{ Request::root() }}/</span>
            </div>
            <input type="text" class="form-control" name="metadata[th][slug]" placeholder="Slug"
                value="{{ !empty($metadata['th']['slug']) ? $metadata['th']['slug'] : '' }}">
        </div>
    </div>

    <div class="form-group frm-name">
        <label class="form-label">Meta title (TH)</label>
        <input type="text" class="form-control" name="metadata[th][meta_title]" placeholder="Meta title"
            value="{{ !empty($metadata['th']['meta_title']) ? $metadata['th']['meta_title'] : '' }}">
    </div>
    <div class="form-group frm-name">
        <label class="form-label">Meta Keyword (TH)</label>
        <input type="text" class="form-control" name="metadata[th][meta_keywords]" placeholder="Meta Keyword"
            value="{{ !empty($metadata['th']['meta_keywords']) ? $metadata['th']['meta_keywords'] : '' }}">
    </div>
    <div class="form-group frm-name">
        <label class="form-label">Meta Description
            (TH)</label>
        <input type="text" class="form-control" name="metadata[th][meta_description]" placeholder="Meta Description"
            value="{{ !empty($metadata['th']['meta_description']) ? $metadata['th']['meta_description'] : '' }}">
    </div>

</div>
{{-- End Tap 1 --}}
