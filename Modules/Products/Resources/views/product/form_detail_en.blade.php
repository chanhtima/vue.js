{{-- Tap 2 --}}
<div class="tab_content">
    <div class="form-group frm-name">
        <label class="form-label">ชื่อสินค้า (EN)</label>
        <input type="text" class="form-control" name="name_en" placeholder="ชื่อสินค้า"
            value="{{ !empty($product['data']->name_en) ? $product['data']->name_en : '' }}">
    </div>
    <div class="form-group frm-pDescp">
        <label class="form-label">คำอธิบาย (EN)</label>
        <textarea id="master_description_en" class="form-control texteditor" name="description_en" rows="1"
            placeholder="คำอธิบาย">{{ !empty($product['data']->description_en) ? $product['data']->description_en : '' }}</textarea>
    </div>
    <div class="form-group frm-pDetail">
        <label class="form-label">รายละเอียดสินค้า
            (EN)</label>
        <textarea id="master_detail_en" class="form-control texteditor" name="detail_en" rows="4"
            placeholder="รายละเอียดสินค้า">{{ !empty($product['data']->detail_en) ? $product['data']->detail_en : '' }}</textarea>
    </div>

</div>
{{-- End Tap 2 --}}
