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

    

@section('content')
    <!-- page-header -->
    <div class="page-header">
        <ol class="breadcrumb">
            <!-- breadcrumb -->
            <li class="breadcrumb-item"><a href="{{ route('admin.homepage') }}">{{ __('admin.homepage') }}</a></li>
            <li class="breadcrumb-item">{{ __('content::admin.content') }}</li>
            <li class="breadcrumb-item active" aria-current="page"><a
                    href="{{ route('admin.content.content.index', $type) }}">{{ __('content::admin.' . $type . '.name') }}</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                {{ !empty($content->id) ? __('content::admin.edit') : __('content::admin.add') }}</li>
        </ol>
    </div>
    <!-- End page-header -->

    <!-- row -->
    <div class="row">
        <div class="col-md-12">
            <form id="content_frm" name="content_frm" method="POST" onsubmit="setSave(); return false;"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="id"
                    value="{{ !empty($content->id) ? $content->id : '0' }}">
                <input type="hidden" name="type" type="type" value="{{ $type }}">


                <div class="card">
                    <div class="card-header p-3 border-bottom">
                        <div class="tabs-menu1 ">
                            <!-- Tabs -->
                            <ul class="nav panel-tabs"
                                id="content-main-tab-{{ !empty($content->id) ? $content->id : '0' }}-{{ $type }}">
                                <li><a href="#content-main-tab-1" class="active"
                                        data-toggle="tab">{{ __('content::admin.' . $type . '.name') }}</a></li>
                                <li><a href="#content-main-tab-2" data-toggle="tab">{{ __('websetting_admin.seo') }}</a>
                                </li>
                            </ul>
                            <!-- .Tabs -->
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="tab-content">
                            <div class="tab-pane active" id="content-main-tab-1">
                                <!-- form -->

                                {{-- content.form_image --}}
                                @include('content::content.form.form_image')
                                {{-- .content.form_image --}}
                                {{-- content.form_file --}}
                                @include('content::content.form.form_file')
                                {{-- .content.form_file --}}
                                {{-- tab content.form_content --}}
                                @include('content::content.form.form_tab')
                                {{-- .tab content.form_content --}}


                                {{-- content.form_clip --}}
                                @include('content::content.form.form_clip')
                                {{-- .content.form_clip --}}

                                {{-- content.form_hashtag --}}
                                @include('content::content.form.form_hashtag')
                                {{-- .content.form_hashtag --}}

                                {{-- content.form_status --}}
                                @include('content::content.form.form_status')
                                {{-- .content.form_status --}}

                            </div>
                            <div class="tab-pane" id="content-main-tab-2">
                                <!-- form_tab_seo -->
                                @include('content::seo.form')
                                <!-- .form_tab_seo -->
                            </div>
                        </div>
                        <div class="form-group mb-1">
                            <div class="btn-list">
                                <button type="submit" class="btn btn-primary">
                                    <i
                                        class="fa fa-save mr-1"></i>{{ !empty($content->id) ? __('content::admin.update') : __('content::admin.save') }}</button>
                                <button onclick="mwz_redirect('{{ route('admin.content.content.index', $type) }}');"
                                    type="button" class="btn btn-warning">
                                    <i class="fa fa-undo" aria-hidden="true"></i>{{ __('content::admin.cancel') }}</button>
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

    <script src="{{ URL::asset('assets/plugins/tabs/jquery.multipurpose_tabcontent.js') }}"></script>

    <!-- bootstrap-switch -->
    <script src="{{ URL::asset('assets/plugins/bootstrap-switch/bootstrap-switch-button.min.js') }}"></script>
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/bootstrap-switch/bootstrap-switch-button.min.css') }}">
    
    {{-- module config to js --}}
    <script>
        console.log('$_config');
        var $_config = $.parseJSON('<?= json_encode($config) ?>');
        console.log($_config);
    </script>

    <!-- mwz master js css -->
    <link rel="stylesheet" href="{{ mix('css/mwz.css') }}">
    <script src="{{ mix('js/mwz.js') }}"></script>

    <!-- module js css -->
    <link rel="stylesheet" href="{{ mix('css/content.css') }}">
    <script src="{{ mix('js/content.th.js') }}"></script>
    <script src="{{ mix('js/content.js') }}"></script>
@endsection
