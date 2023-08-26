<div class="row mt-3">
    <div class="form-group col-lg-6">
        <label class="form-label" title="phone">เบอร์โทรศัพท์</label>
        <input type="text" class="form-control" name="phone" id="phone" placeholder="Tel"maxlength="100"
            onkeypress="InputValidateString();" value="{{ !empty($data->phone) ? $data->phone : '' }}">
    </div>

    <div class="form-group col-6">
        <label class="form-label">email</label>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">{{__('contactus::admin.url')}}</span>
            <input type="text" class="form-control" placeholder="email" aria-label="email" aria-describedby="basic-addon1"
            id ="email" name ="email" value="{{ !empty($data->email) ? $data->email : '' }}">
        </div>
    </div>
    
    <div class="form-group col-6">
        <label class="form-label">{{__('contactus::admin.facebook') }}</label>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">{{__('contactus::admin.url')}}</span>
            <input type="text" class="form-control" placeholder="{{__('contactus::admin.facebook') }}" aria-label="{{__('contactus::admin.facebook') }}" aria-describedby="basic-addon1"
            id ="facebook" name ="facebook" value="{{ !empty($data->facebook) ? $data->facebook : '' }}">
        </div>
    </div>

    <div class="form-group col-6">
        <label class="form-label">{{__('contactus::admin.youtube') }}</label>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">{{__('contactus::admin.url')}}</span>
            <input type="text" class="form-control" placeholder="{{__('contactus::admin.youtube') }}" aria-label="{{__('contactus::admin.youtube') }}" aria-describedby="basic-addon1"
            id ="youtube" name ="youtube" value="{{ !empty($data->youtube) ? $data->youtube : '' }}">
        </div>
    </div>
    <div class="form-group col-6">
        <label class="form-label">{{__('contactus::admin.line') }}</label>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">{{__('contactus::admin.url')}}</span>
            <input type="text" class="form-control" placeholder="line" aria-label="line" aria-describedby="basic-addon1"
            id ="line" name ="line" value="{{ !empty($data->line) ? $data->line : '' }}">
        </div>
    </div>

    <div class="form-group col-6">
        <label class="form-label">tiktok</label>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">{{__('contactus::admin.url')}}</span>
            <input type="text" class="form-control" placeholder="tiktok" aria-label="tiktok" aria-describedby="basic-addon1"
            id ="tiktok" name ="tiktok" value="{{ !empty($data->tiktok) ? $data->tiktok : '' }}">
        </div>
    </div>

    <div class="form-group col-6">
        <label class="form-label">instagram</label>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">{{__('contactus::admin.url')}}</span>
            <input type="text" class="form-control" placeholder="ig" aria-label="ig" aria-describedby="basic-addon1"
            id ="ig" name ="ig" value="{{ !empty($data->ig) ? $data->ig : '' }}">
        </div>
    </div>

    <div class="form-group col-lg-6">
        <label class="form-label">{{ __('contact_admin.gmaps') }}</label>
        <textarea id="gmaps" class="form-control" name="gmaps" rows="4"
            placeholder="{{ __('contact_admin.gmaps') }}">{{ !empty($data->gmaps) ? $data->gmaps : '' }}</textarea>
    </div>
    {{-- <div class="form-group col-lg-6">
        <label class="form-label" title="line">{{__('contactus::admin.line_off') }}</label>
        <input type="text" class="form-control" name="line_name" id="line_name" placeholder="Line"maxlength="300" value="{{ !empty($data->line['name']) ? $data->line['name'] : '' }}">
        <?= image_upload($id = '1', $name = 'qr_code', $label = __('about_admin.qr_code') . '', $image = !empty($data->qr_code)  ? $data->qr_code : '') ?>
    </div> --}}
</div>
