@extends('layouts.app')

@section('styles')
    <!---Tabs css-->
    <link href="{{ URL::asset('assets/plugins/tabs/tabs-style.css') }}" rel="stylesheet" />

    <!--Select2 css -->
    <link href="{{ URL::asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />

    <!-- File Uploads css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/dropify.css') }}" rel="stylesheet" type="text/css" />

    <!--Mutipleselect css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/multipleselect/multiple-select.css') }}">

    <!-- Gallery css -->
    <link href="{{ URL::asset('assets/plugins/gallery/gallery.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/upload-image.css') }}" rel="stylesheet">
@endsection

@section('content')
    <!-- page-header -->
    <div class="page-header">
        <ol class="breadcrumb">
            <!-- breadcrumb -->
            <li class="breadcrumb-item"><a href="{{ route('admin.homepage') }}">{{ __('admin.homepage') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('admin.websetting') }}</li>
            <li class="breadcrumb-item active" aria-current="page">
                <a href="{{ route('admin.setting.tag.index') }}">ตั้งค่า Tag</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">แก้ไข</li>
        </ol>
    </div>
    <!-- End page-header -->

    <!-- row -->

    <div class="row">
        <div class="col-md-12">
            <form id="tag_frm" name="tag_frm" method="POST" onsubmit="setTagSave(); return false;"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ !empty($data->id) ? $data->id : '0' }}">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label">ประเภท</label>
                            <input type="text" class="form-control" name="type" placeholder="ประเภท"
                                value="{{ !empty($data->type) ? $data->type : '' }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Head</label>
                            <textarea class="form-control" name="head" id="head" rows="8" placeholder="<head>">{{ !empty($data->head) ? $data->head : '' }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Body</label>
                            <textarea class="form-control" name="body" id="body" rows="8" placeholder="<body>">{{ !empty($data->body) ? $data->body : '' }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Footer</label>
                            {{-- id="footer" --}}
                            <textarea class="form-control" name="footer"  rows="8" placeholder="<footer>">{{ !empty($data->footer) ? $data->footer : '' }}</textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="form-label">สถานะ</label>
                            <div class="button button-r btn-switch">
                                <input type="checkbox" class="checkbox" id="status" name="status" value="1" {{ isset($data->status) ? ($data->status == 1 ? 'checked' : '') : 'checked' }}>
                                <div class="knobs"></div>
                                <div class="layer"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="btn-list">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save mr-1"></i>{{ __('websetting_admin.save') }}</button>
                                <button onclick="mwz_redirect('{{ route('admin.setting.tag.index') }}');" type="button"
                                    class="btn btn-warning"><i class="fa fa-undo mr-1"
                                        aria-hidden="true"></i>{{ __('banner_admin.cancel') }}</button>
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

    <!-- Notifications js -->
    <link href="{{ URL::asset('assets/plugins/notify-growl/css/jquery.growl.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/notify-growl/css/notifIt.css') }}" rel="stylesheet" />
    <script src="{{ URL::asset('assets/plugins/bootbox/bootbox.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/notify-growl/js/rainbow.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/notify-growl/js/jquery.growl.js') }}"></script>

    <!-- validator js -->
    <script src="{{ URL::asset('assets/plugins/validator/js/jquery.validate.min.js') }}"></script>

    <!-- Tabs js -->
    <script src="{{ URL::asset('assets/plugins/tabs/jquery.multipurpose_tabcontent.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/tabs/tabs.js') }}"></script>

    <!-- Gallery js -->
    <script src="{{ URL::asset('assets/plugins/gallery/picturefill.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/gallery/lightgallery.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/gallery/lg-pager.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/gallery/lg-autoplay.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/gallery/lg-fullscreen.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/gallery/lg-zoom.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/gallery/lg-hash.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/gallery/lg-share.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/gallery/gallery.js') }}"></script>
    {{--  --}}

    <!-- mwz master js css -->
    <link rel="stylesheet" href="{{ mix('css/mwz.css') }}">
    <script src="{{ mix('js/mwz.js') }}"></script>

    <!-- module js css -->
    <link rel="stylesheet" href="{{ mix('css/websetting.css') }}">
    <script src="{{ mix('js/websetting.js') }}"></script>
@endsection
