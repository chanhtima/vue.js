@extends('layouts.app')

@section('styles')
    <!---Tabs css-->
    <link href="{{ URL::asset('assets/plugins/tabs/tabs-style.css') }}" rel="stylesheet" />

    <!--Select2 css -->
    <link href="{{ URL::asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />

    <!-- Datetime Picker css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/datetime-picker/bootstrap-datetimepicker.min.css') }}">

    <!-- File Uploads css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/dropify.css') }}" rel="stylesheet" type="text/css" />

    <!--Mutipleselect css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/multipleselect/multiple-select.css') }}">
@endsection

@section('content')
    <!-- page-header -->
    <div class="page-header">
        <ol class="breadcrumb">
            <!-- breadcrumb -->
            <li class="breadcrumb-item"><a href="{{ route('admin.homepage') }}">{{ __('admin.homepage') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a
                    href="{{ route('admin.banner.banner.index') }}">{{ __('about_admin.about') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('about_admin.manage_data') }}</li>
        </ol>
    </div>
    <!-- End page-header -->

    <!-- row -->
    <div class="row">
        <div class="col-md-12">
            <form id="about_frm" name="about_frm" method="POST" onsubmit="setSave(); return false;"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ !empty($about->id) ? $about->id : '0' }}">
                <!-- <div class="card"> -->
                <div class="card">
                    <div class="card-header pb-0">
                        <h3 class="card-title">{{ __('about_admin.about_data') }}</h3>
                    </div>
                    <div class="panel panel-primary">

                        <div class="form-group mt-3">
                            {{-- <div class="card"> --}}
                                <div class="card-body">
                                    <div class="row">
                                        {{-- Start Tap --}}
                                        <div class="tab_wrapper first_tab col-12">
                                            <ul class="tab_list">
                                                <li class="icons-list-item" style="height: 36px;"><i
                                                        class="flag flag-th"></i></li>
                                                <li class="icons-list-item" style="height: 36px;"><i
                                                        class="flag flag-gb"></i></li>
                                            </ul>
                                            <div class="content_wrapper">
                                                {{-- Tap 1 --}}
                                                <div class="tab_content active">
                                                    {{-- Start Input --}}
                                                    <div class="alert alert-default" role="alert">
                                                        <span class="alert-inner--icon"><i class="fe fe-bell"></i></i></span>
                                                        <span class="alert-inner--text">{{ __('about_admin.form_alert') }}
                                                        <strong>{{ __('about_admin.thai_lang') }}</strong></span>
                                                    </div>
                                                    {{-- <div class="form-group">
                                                        <label class="form-label">{{ __('about_admin.name_th') }}</label>
                                                        <input type="text" class="form-control" name="name_th"  id="name_th" placeholder="โปรดระบุชื่อหัวข้อ" value="{{ !empty($about->name_th) ? $about->name_th : '' }}">
                                                        <input id="param" type="hidden" class="form-control" name="params" value="" placeholder="param">
                                                    </div> --}}
                                                    {{-- <div class="form-group">
                                                        <label class="form-label">รายละเอียดอย่างย่อ (TH)</label>
                                                        <textarea id="detail_th" class="form-control texteditor" name="detail_th" rows="4" placeholder="description">{{ !empty($about->detail_th) ? $about->detail_th : '' }}</textarea>
                                                    </div> --}}

                                                    <div class="form-group">
                                                        <label class="form-label">{{ __('about_admin.description_th') }}</label>
                                                        <textarea id="description_th" class="form-control texteditor" name="description_th" rows="4" placeholder="description">{{ !empty($about->description_th) ? $about->description_th : '' }}</textarea>
                                                    </div>
                                                    {{-- End Input --}}
                                                </div>
                                                {{-- End Tap 1 --}}
                                                {{-- Tap 2 --}}
                                                <div class="tab_content">
                                                    {{-- Start Input --}}
                                                    <div class="alert alert-default" role="alert">
                                                        <span class="alert-inner--icon"><i
                                                                class="fe fe-bell"></i></i></span>
                                                        <span class="alert-inner--text">{{ __('about_admin.form_alert') }}
                                                            <strong>{{ __('about_admin.eng_lang') }}</strong></span>
                                                    </div>
                                                    {{-- <div class="form-group">
                                                        <label class="form-label">{{ __('about_admin.name_en') }}</label>
                                                        <input type="text" class="form-control" name="name_en" id="name_en" placeholder="โปรดระบุชื่อหัวข้อ" value="{{ !empty($about->name_en) ? $about->name_en : '' }}">
                                                    </div> --}}
                                                    {{-- <div class="form-group">
                                                        <label class="form-label">รายละเอียดอย่างย่อ (EN)</label>
                                                        <textarea id="detail_en" class="form-control texteditor" name="detail_en" rows="4" placeholder="description">{{ !empty($about->detail_en) ? $about->detail_en : '' }}</textarea>
                                                    </div> --}}

                                                    <div class="form-group">
                                                        <label class="form-label">{{ __('about_admin.description_en') }}</label>
                                                        <textarea id="description_en" class="form-control texteditor" name="description_en" rows="6" placeholder="description">{{ !empty($about->description_en) ? $about->description_en : '' }}</textarea>
                                                    </div>
                                                    <!-- </div> -->
                                                    {{-- End Input --}}
                                                </div>
                                                {{-- End Tap 2 --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group pt-3">
                                        <div class="btn-list">
                                            <button type="submit" class="btn btn-primary"><i
                                                    class="fa fa-save"></i>{{ __('about_admin.save') }}</button>
                                            <button onclick="mwz_redirect('{{ route('admin.about.about.index') }}');" type="button"
                                                class="btn btn-warning"><i class="fa fa-undo"
                                                    aria-hidden="true"></i>{{ __('about_admin.cancel') }}</button>
                                        </div>
                                    </div>
                                </div>
                            {{-- </div> --}}
                            
                        </div>
                        

                    </div>
                </div>
                <!-- </div> -->
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

    <!-- Tabs js -->
    <script src="{{ URL::asset('assets/plugins/tabs/jquery.multipurpose_tabcontent.js') }}"></script>
    <!-- <script src="{{ URL::asset('assets/plugins/tabs/tabs.js') }}"></script> -->

    <!-- mwz master js css -->
    <link rel="stylesheet" href="{{ mix('css/mwz.css') }}">
    <script src="{{ mix('js/mwz.js') }}"></script>

    <!-- module js css -->
    <link rel="stylesheet" href="{{ mix('css/about.css') }}">
    <script src="{{ mix('js/about.js') }}"></script>
@endsection
