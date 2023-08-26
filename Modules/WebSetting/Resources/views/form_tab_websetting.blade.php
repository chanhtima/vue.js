<div class="panel panel-primary">
    {{-- start tap --}}
    <div class="tab_wrapper" id="tab_logo_header">
        <ul class="tab_list">
            {{-- header tap 1 --}}
            <li class="icons-list-item" style="height: 36px;">
                {{ __('websetting_admin.logo_header') }}</i>
            </li>
            {{-- header tap 2 --}}
            <li class="icons-list-item" style="height: 36px;">
                {{ __('websetting_admin.logo_footer') }}
            </li>
            {{-- header tap 3 --}}
            <li class="icons-list-item" style="height: 36px;">
                {{ __('websetting_admin.logo_favicon') }}
            </li>
        </ul>
        <div class="content_wrapper">
            {{-- tap 1 --}}
            <div class="tab_content active">
                <div class="row">
                    <div class="col-md-12">
                        {{-- start input --}}
                        <div class="alert alert-default" role="alert" title="ภาษาไทย">
                            <span class="alert-inner--icon"><i class="fe fe-bell"></i></i></span>
                            <span class="alert-inner--text">คุณกำลังแก้ไข Logo</span>
                        </div>
                        <!-- upload image logo header -->
                        <div class="mb-2">
                            <div class="form-group">
                                <?= image_upload($id = '1', $name = 'logo_header', $label = __('websetting_admin.upload_image_header'), 
                                $image = !empty($setting->logo_header) ? $setting->logo_header : '', $size_recommend = ' 360 x 80px',false,true,"ลบรูปภาพ","DeleteImage",!mwz_roles('admin.setting.delete_image')) ?>
                            </div>
                        </div>
                        {{-- end input --}}
                    </div>
                </div>
            </div>
            {{-- end tap 1 --}}
            {{-- tap 2 --}}
            <div class="tab_content">
                <div class="row">
                    <div class="col-md-12">
                        {{-- start input --}}
                        <div class="alert alert-default" role="alert" title="ภาษอังกฤษ">
                            <span class="alert-inner--icon"><i class="fe fe-bell"></i></i></span>
                            <span class="alert-inner--text">{{ __('websetting_admin.edit_image_footer') }}
                                <strong>Footer</strong></span>
                        </div>
                        <!-- upload image footer -->
                        <div class="form-group">
                            <?= image_upload($id = '2', $name = 'logo_footer', $label = __('websetting_admin.upload_image_header'), $image = !empty($setting->logo_footer) ? $setting->logo_footer : '', $size_recommend = '254 x 22p') ?>
                        </div>

                        <div class="mb-2">
                            <div class="form-group">
                                <label class="form-label"
                                    title="Copyright">{{ __('websetting_admin.copyright') }}</label>
                                <input type="text" class="form-control" name="link_login" placeholder="Copyright"
                                    value="{{ !empty($setting->link_login) ? $setting->link_login : '' }}">
                            </div>
                        </div>

                        {{-- end input --}}
                    </div>
                </div>
            </div>
            {{-- end tap  --}}
            {{-- tap - --}}

             {{-- tap 4 --}}
            <div class="tab_content">
                <div class="row">
                    <div class="col-md-12">
                        {{-- start input --}}
                        <div class="alert alert-default" role="alert" title="ภาษาไทย">
                            <span class="alert-inner--icon"><i class="fe fe-bell"></i></i></span>
                            <span class="alert-inner--text">คุณกำลังแก้ไข FAVICON</span>
                        </div>
                        <!-- upload image logo header -->
                        <div class="mb-2">
                            <div class="form-group">
                                <?= image_upload($id = '6', $name = 'logo_favicon', $label = __('websetting_admin.upload_image_header') . ' Favicon', $image = !empty($setting->logo_favicon) ? $setting->logo_favicon : '', $size_recommend = '32 x 32px') ?>
                            </div>
                        </div>
                        {{-- end input --}}
                    </div>
                </div>
            </div>

            <div class="tab_content">
                <div class="row">
                    <div class="col-md-12">
                        {{-- start input --}}
                        <div class="alert alert-default" role="alert" title="ภาษาไทย">
                            <span class="alert-inner--icon"><i class="fe fe-bell"></i></i></span>
                            <span class="alert-inner--text">คุณกำลังแก้ไข ตั้งค่าอื่นๆ</span>
                        </div>
                        <!-- upload image logo header -->
                        {{-- <div class="mb-2">
                            <div class="form-group">
                                <?= image_upload($id = '6', $name = 'logo_favicon', $label = __('websetting_admin.upload_image_header') . ' Favicon', $image = !empty($setting->logo_favicon) ? $setting->logo_favicon : '', $size_recommend = '32 x 32px') ?>
                            </div>
                        </div> --}}
                        {{-- end input --}}
                    </div>
                </div>
            </div>

        </div>
    </div>
    {{-- end tap --}}

</div>
