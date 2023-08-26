<div class="tab_content active">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label">{{ __('pdpa_admin.name') }} (TH) <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="pdpa_title_th" name="pdpa_title_th"
                    placeholder="{{ __('pdpa_admin.name_placeholder') }}"
                    value="{{ !empty($pdpa->pdpa_title_th) ? $pdpa->pdpa_title_th : '' }}">
            </div>
            <div class="form-group">
                <label class="form-label">{{ __('pdpa_admin.detail') }} (TH)
                    <span class="text-danger">*</span></label>
                <textarea id="pdpa_detail_th" class="form-control texteditor" name="pdpa_detail_th" rows="4"
                    placeholder="{{ __('pdpa_admin.detail_placeholder') }}">{{ !empty($pdpa->pdpa_detail_th) ? $pdpa->pdpa_detail_th : '' }}</textarea>
            </div>
            <div class="form-group">
                <label class="form-label">{{ __('pdpa_admin.detail_long') }} (TH)
                    <span class="text-danger">*</span></label>
                <textarea id="pdpa_detail_long_th" class="form-control texteditor" name="pdpa_detail_long_th" rows="4"
                    placeholder="{{ __('pdpa_admin.detail_long_placeholder') }}">{{ !empty($pdpa->pdpa_detail_long_th) ? $pdpa->pdpa_detail_long_th : '' }}</textarea>
            </div>
        </div>
    </div>
</div>
