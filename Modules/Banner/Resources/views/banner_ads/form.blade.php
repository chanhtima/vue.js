@extends('layouts.app')

@section('styles')
    <!---Tabs js-->
    <link href="{{ URL::asset('assets/plugins/tabs/tabs-style.css') }}" rel="stylesheet" />

    <!--Select2 css -->
    <link href="{{ URL::asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />

    <!-- Datetime Picker css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/datetime-picker/bootstrap-datetimepicker.min.css') }}">

    <!-- File Uploads css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/dropify.css') }}" rel="stylesheet" type="text/css" />

    <!--Mutipleselect css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/multipleselect/multiple-select.css') }}">

    <!--bootstrap-switch css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/bootstrap-switch/bootstrap-switch-button.min.css') }}">

    <link href="{{ asset('assets/css/upload-image.css') }}" rel="stylesheet">
@endsection

@section('content')
    <!-- page-header -->
    <div class="page-header">
        <ol class="breadcrumb">
            <!-- breadcrumb -->
            <li class="breadcrumb-item"><a
                    href="{{ route('admin.dashboard.dashboard.index') }}">{{ __('banner_admin.homepage') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a
                    href="{{ route('admin.banner.banner.index') }}">{{ __('banner_admin.banner') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                {{ !empty($data->id) ? 'แก้ไข' : 'เพิ่ม' }}</li>
        </ol>
    </div>
    <!-- End page-header -->

    <!-- row -->
    <div class="row">
        <div class="col-md-12">
            <form id="banner_ads_frm" name="banner_ads_frm" method="POST" onsubmit="setSave(); return false;"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ !empty($data->id) ? $data->id : '0' }}">
                <div class="card">
                    <div class="card-body">
                        <div class="panel panel-primary">
                            <div class="form-group col-md-12">
                                <label class="form-label">{{ __('banner_admin.menu_display') }}</label>
                                <select name="category_id" id="category_id" class="form-control select2" data-placeholder="Choose Parent">
                                    <option value="" selected>-- no Slug --</option>
                                    {{-- @if (!empty($list['data_parent']))
                                        @foreach ($list['data_parent'] as $parent)
                                            @if (!empty($parent['id']))
                                                <option value="{{ $parent['id'] }}"
                                                    @if (!empty($data->category_id) == 1 && $data->category_id == $parent['id'])
                                                        selected 
                                                    @endif>
                                                        {{ $parent['name'] }}
                                                </option>
                                            @endif
                                        @endforeach
                                    @endif --}}

                                    @if (!empty($list['data_parent'][1]))
                                        {{-- @foreach ($list['data_parent'] as $parent) --}}
                                            @if (!empty( $list['data_parent'][1]['id']))
                                                <option value="{{ $list['data_parent'][1]['id'] }}" selected
                                                    {{-- @if (!empty($data->category_id) == $list['data_parent'][1]['id'] && $data->category_id ==  $list['data_parent'][1]['id'])
                                                        selected 
                                                    @endif --}}
                                                    >
                                                        {{  $list['data_parent'][1]['name'] }}
                                                </option>
                                            @endif
                                        {{-- @endforeach --}}
                                    @endif
                                </select>
                            </div>

                       
                            <div class="form-group image_banner" >
                                <?= image_upload($id = '1', $name = 'image', $label = __('websetting_admin.upload_image_header'), $image = !empty($data->image) ? $data->image : '', $size_recommend = '350 x 280px') ?>
                            </div>

                            {{-- url link youtube  --}}
                            @if (!empty($data->category_id ) and $data->category_id != 4)
                                <div class="form-group vdo_banner  {{ !empty($data->type) ? $data->type == 2 ? "" : "d-none" : "d-none" }}">
                                    <label class="form-label">{{ __('banner_admin.link_url_yb') }}</label>
                                    <textarea id="url_video" class="form-control" name="url_video" rows="4"
                                        placeholder="{{ __('banner_admin.link_url_yb') }}">{{ !empty($data->url_video) ? $data->url_video : '' }}</textarea>
                                </div>
                            @endif
                           
                            <input type="hidden" name="type" id="type" value="{{ !empty($data->type) ? $data->type : "" }}">

                            {{-- Start Tap --}}
                            <div class="tab_wrapper mb-3" id="banner_tab">
                                <ul class="tab_list">
                                    <li class="icons-list-item" style="height: 36px;"><i class="flag flag-th"></i></li>
                                    <li class="icons-list-item" style="height: 36px;"><i class="flag flag-gb"></i></li>
                                </ul>
                                <div class="content_wrapper">
                                    <!-- banner::form_th -->
                                    @includeIf('banner::banner.form_th')
                                    <!-- .form_th -->
                                    <!-- banner::form_en -->
                                    @includeIf('banner::banner.form_en')
                                    <!-- .form_en -->

                                </div>
                            </div>
                            {{-- End Tap --}}
                            <!-- banner::form_footer -->
                            @includeIf('banner::banner.form_footer')
                            <!-- .form_footer -->
                            <div class="form-group mb-2">
                                <div class="btn-list">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-1"></i>
                                        {{ __('banner_admin.save') }}</button>
                                    <button onclick="mwz_redirect('{{ route('admin.banner.ads.index') }}');"
                                        type="button" class="btn btn-warning"><i class="fa fa-undo mr-1"
                                            aria-hidden="true"></i>{{ __('banner_admin.cancel') }}</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- .row -->
@endsection('content')

@section('scripts')
    <!--Jquery Sparkline js-->
    <script src="{{ URL::asset('assets/plugins/vendors/jquery.sparkline.min.js') }}"></script>

    <!-- File uploads js -->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/dropify.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/dropify-demo.js') }}"></script>

    <!--Select2 js -->
    <script src="{{ URL::asset('assets/plugins/select2/select2.full.min.js') }}"></script>
    <!-- <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script> -->

    <!--MutipleSelect js-->
    <script src="{{ URL::asset('assets/plugins/multipleselect/multiple-select.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/multipleselect/multi-select.js') }}"></script>

    <!--ckeditor js-->
    <script src="{{ URL::asset('assets/plugins/tinymce/tinymce.min.js') }}"></script>
    <!-- <script src="{{ URL::asset('assets/js/formeditor.js') }}"></script> -->

    <!-- Datetimepicker js -->
    <script src="{{ URL::asset('assets/plugins/datetime-picker/moment.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datetime-picker/bootstrap-datetimepicker.min.js') }}"></script>

    <!-- Notifications js -->
    <link href="{{ URL::asset('assets/plugins/notify-growl/css/jquery.growl.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/notify-growl/css/notifIt.css') }}" rel="stylesheet" />
    <script src="{{ URL::asset('assets/plugins/bootbox/bootbox.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/notify-growl/js/rainbow.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/notify-growl/js/jquery.growl.js') }}"></script>

    <!-- validator js -->
    <script src="{{ URL::asset('assets/plugins/validator/js/jquery.validate.min.js') }}"></script>

    <!-- bootstrap-switch -->
    <script src="{{ URL::asset('assets/plugins/bootstrap-switch/bootstrap-switch-button.min.js') }}"></script>

    <script src="{{ URL::asset('assets/plugins/tabs/jquery.multipurpose_tabcontent.js') }}"></script>
    <!-- <script src="{{ URL::asset('assets/plugins/tabs/tabs.js') }}"></script> -->

    <!-- mwz master js css -->
    <link rel="stylesheet" href="{{ mix('css/mwz.css') }}">
    <script src="{{ mix('js/mwz.js') }}"></script>

    <!-- module js css -->
    <link rel="stylesheet" href="{{ mix('css/banner_ads.css') }}">
    <script src="{{ mix('js/banner_ads.js') }}"></script>
    <script src="{{ mix('js/banner.th.js') }}"></script>
@endsection
