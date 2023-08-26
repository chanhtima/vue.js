
<div class="tab_content content-info">
    {{-- <img src="{{URL::asset('assets/images/brand/favicon.ico')}}" alt=""> --}}
    {{-- <div class="form-group frm-color">
        <label class="form-label">สินค้าที่เกี่ยวข้อง</label>
        <select style="width:100%;" class="form-control select2multiple" id="related_product" name="related_product[]"
            multiple="true">
            @if (!empty($data['product_all']))
                @foreach ($data['product_all'] as $kk => $item)
                    <option
                        {{ !empty($product['data']->related_product) && in_array($item->id, $product['data']->related_product) ? 'selected="selected"' : '' }} value="{{ $item->id }}">
                        {{$item->name_th }} 
                    </option>
                @endforeach
            @endif
        </select>
    </div> --}}
   

    <div class="row">
        {{-- <div class="form-group col-md-6">
            <label class="form-label">แบรนด์</label>
            <select name="brand_id" class="form-control select2" data-placeholder="Choose Brand">
                <option value="0">-- ไม่มีแบรนด์ --</option>
                @if (!empty($data['brand']))
                    @foreach ($data['brand'] as $brand)
                        <option value="{{ $brand->id }}" @if (!empty($product['data']->brand_id) && $brand->id == $product['data']->brand_id) selected @endif>
                            {{$brand->name_th }}
                        </option>
                    @endforeach
                @endif
            </select>
        </div> --}}

        <div class="form-group col-md-6">
            <label class="form-label">{{ __('news_admin.sequence') }}</label>
            <input type="text" class="form-control" maxlength="3" onkeypress="InputValidateString()" id="sort"
                name="sort" placeholder="{{ __('news_admin.sequence_placeholder') }}"
                value="{{ !empty($product['data']->sort) ? $product['data']->sort : '' }}">
        </div>

    </div>

    <div class='row'>
        {{-- <div class="form-group col-md-6">
            <label class="form-label">แสดงหน้าแรก</label>
            <div class="button button-r btn-switch">
                <input type="checkbox" class="checkbox" id="index_status" name="index_status" value="1"
                    {{ isset($product['data']->index_status) ? ($product['data']->index_status == 1 ? 'checked' : '') : 'checked' }}>>
                <div class="knobs"></div>
                <div class="layer"></div>
            </div>
        </div> --}}

        <div class="form-group col-md-6">
            <label class="form-label">{{ __('content::admin.field.status') }}</label>
            <div class="button button-r btn-switch">
                <input type="checkbox" class="checkbox" id="status" name="status" value="1"
                    {{ isset($product['data']->status) ? ($product['data']->status == 1 ? 'checked' : '') : 'checked' }}>>
                <div class="knobs"></div>
                <div class="layer"></div>
            </div>
        </div>
    </div>
</div>
