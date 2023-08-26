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
                    href="{{ route('admin.pdpa.pdpa.index') }}">{{ __('pdpa_admin.pdpa') }}</a></li>
            {{-- @if (empty($pdpa->id))
                <li class="breadcrumb-item active" aria-current="page">{{__('pdpa_admin.add_pdpa')}}</li>
            @else
                <li class="breadcrumb-item active" aria-current="page">{{__('pdpa_admin.edit_pdpa')}}</li>
            @endif --}}
        </ol>
    </div>
    <!-- End page-header -->

    <!-- row -->
    <div class="row">
        <div class="col-md-12">
            <form id="pdpa_frm" name="pdpa_frm" method="POST" onsubmit="setSave(); return false;">
                @csrf
                <input type="hidden" name="id" value="{{ !empty($pdpa->id) ? $pdpa->id : '0' }}">
                <div class="card">
                    <div class="card-header p-3 border-bottom">
                        <div class="tabs-menu1 ">
                            <!-- Tabs -->
                            <ul class="nav panel-tabs" id="pdpa-tab">
                                <li class="___class_+?10___"><a href="#tab5" class="active"
                                        data-toggle="tab">นโยบายความเป็นส่วนตัว</a></li>
                                {{-- <li><a href="#tab6" data-toggle="tab">{{ __('websetting_admin.seo') }}</a></li> --}}
                            </ul>
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="tab-content">
                            <div class="tab-pane p-0 active" id="tab5">
                                <div class="tab_wrapper" id="pdpa-data-tab">
                                    <ul class="tab_list">
                                        <li class="icons-list-item" style="height: 36px;"><i class="flag flag-th"></i></li>
                                        <li class="icons-list-item" style="height: 36px;"><i class="flag flag-gb"></i></li>
                                    </ul>
                                    <div class="content_wrapper">
                                        <!-- form_tab_about_th -->
                                        @includeIf('pdpa::form_th')
                                        <!-- .form_tab_about_th -->
                                        <!-- form_tab_about_en -->
                                        @includeIf('pdpa::form_en')
                                        <!-- .form_tab_about_en -->
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="tab-pane p-0" id="tab6">
                                @include('pdpa::seo.form_seo')
                            </div> --}}
                        </div>
                        @if (mwz_roles('admin.pdpa.pdpa.edit'))
                            <div class="form-group mt-3">
                                <div class="btn-list">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-1"></i>
                                        {{ __('pdpa_admin.save') }}</button>
                                </div>
                            </div>
                        @endif
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

    <!-- Tabs js -->
    <script src="{{ URL::asset('assets/plugins/tabs/jquery.multipurpose_tabcontent.js') }}"></script>
    <!-- <script src="{{ URL::asset('assets/plugins/tabs/tabs.js') }}"></script> -->

    <!-- mwz master js css -->
    <link rel="stylesheet" href="{{ mix('css/mwz.css') }}">
    <script src="{{ mix('js/mwz.js') }}"></script>

    <!-- module js css -->
    <link rel="stylesheet" href="{{ mix('css/pdpa.css') }}">
    <script src="{{ mix('js/pdpa.js') }}"></script>
@endsection
