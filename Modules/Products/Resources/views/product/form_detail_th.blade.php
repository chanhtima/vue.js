{{-- Tap 1 --}}
<div class="tab_content active">
    <div class="form-group frm-name">
        <label class="form-label">ชื่อสินค้า (TH)</label>
        <input type="text" class="form-control" name="name_th"
            placeholder="ชื่อสินค้า"
            value="{{ !empty($product['data']->name_th) ? $product['data']->name_th : '' }}">
    </div>
    <div class="form-group frm-pDescp">
        <label class="form-label">คำอธิบาย (TH)</label>
        <textarea id="master_description_th" class="form-control texteditor" name="description_th" rows="1"
            placeholder="คำอธิบาย">{{ !empty($product['data']->description_th) ? $product['data']->description_th : '' }}</textarea>
    </div>
    <div class="form-group frm-pDetail">
        <label class="form-label">รายละเอียดสินค้า
            (TH)</label>
        <textarea id="master_detail_th" class="form-control texteditor" name="detail_th" rows="4"
            placeholder="รายละเอียดสินค้า">{{ !empty($product['data']->detail_th) ? $product['data']->detail_th : '' }}</textarea>
    </div>

    {{-- ค้นหา  --}}
    {{-- <input id="tags" class="form-control">
    <input type = "hidden" id = "project-id">
    <p id = "project-description"></p> --}}
</div>

