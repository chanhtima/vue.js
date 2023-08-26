<div class="tab_content">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label">{{ __('pdpa_admin.name') }} (EN) <span
                        class="text-danger">*</span></label>
                <input type="text" class="form-control" id="pdpa_title_en"
                    name="pdpa_title_en"
                    placeholder="{{ __('pdpa_admin.name_placeholder') }}"
                    value="{{ !empty($pdpa->pdpa_title_en) ? $pdpa->pdpa_title_en : '' }}">
            </div>
            <div class="form-group">
                <label class="form-label">{{ __('pdpa_admin.detail') }} (EN)
                    <span class="text-danger">*</span></label>
                <textarea id="pdpa_detail_en" class="form-control texteditor" name="pdpa_detail_en" rows="4"
                    placeholder="{{ __('pdpa_admin.detail_placeholder') }}">{{ !empty($pdpa->pdpa_detail_en) ? $pdpa->pdpa_detail_en : '' }}</textarea>
            </div>
            <div class="form-group">
                <label class="form-label">{{ __('pdpa_admin.detail_long') }} (EN)
                    <span class="text-danger">*</span></label>
                <textarea id="pdpa_detail_long_en" class="form-control texteditor" name="pdpa_detail_long_en" rows="4"
                    placeholder="{{ __('pdpa_admin.detail_long_placeholder') }}">{{ !empty($pdpa->pdpa_detail_long_en) ? $pdpa->pdpa_detail_long_en : '' }}</textarea>
            </div>
        </div>
    </div>
</div>