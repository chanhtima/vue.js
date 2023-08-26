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

    <link href="{{ asset('assets/css/upload-image.css') }}" rel="stylesheet">
@endsection

@section('content')
    <!-- page-header -->
    <div class="page-header">
        <ol class="breadcrumb">
            <!-- breadcrumb -->
            <li class="breadcrumb-item">
                <a href="{{ route('admin.homepage') }}">{{ __('admin.homepage') }}</a></li>
            <li class="breadcrumb-item " aria-current="page">
                <a href="{{ route('admin.product.product.index') }}">{{ __('product::module.name') }}</a>
            </li>
            <li class="breadcrumb-item " aria-current="page">
                <a href="{{ route('admin.product.brand.index') }}">{{ __('product::brand.name') }}</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                {{ !empty($data->id) ?  __('product::module.action.edit')  : __('product::module.action.add') }}
            </li>
        </ol>
    </div>
    <!-- End page-header -->

    <!-- row -->
    <div class="row">
        <div class="col-md-12">
            <form id="brand_frm" name="brand_frm" method="POST" onsubmit="setSave(); return false;"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ !empty($data->id) ? $data->id : '0' }}">
                <div class="card">
                    <div class="card-header p-3 border-bottom">
                        <div class="tabs-menu1 ">
                            <!-- Tabs -->
                            <ul class="nav panel-tabs" id="brand-main-tab">
                                <li><a href="#brand-main-tab-1" class="active" data-toggle="tab">{{ __('product::brand.name') }}</a></li>
                                <li><a href="#brand-main-tab-2" data-toggle="tab">{{ __('product::metadata.name') }}</a></li>
                            </ul>
                            <!-- .Tabs -->
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="tab-content">
                            <div class="tab-pane active" id="brand-main-tab-1">
                                <!-- brand-main-tab-1 -->
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <div class="tab_wrapper" id="brand-data-tab">
                                            <ul class="tab_list">
                                                <li class="icons-list-item" style="height: 36px;"><i class="flag flag-th"></i></li>
                                                <li class="icons-list-item" style="height: 36px;"><i class="flag flag-gb"></i></li>
                                            </ul>
                                            <div class="content_wrapper">
                                                <!-- brand::form_th -->
                                                @includeIf('product::brand.form_th')
                                                <!-- .brand::form_th -->
                                                <!-- .brand::form_en -->
                                                @includeIf('product::brand.form_en')
                                                <!-- . brand::form_en -->
                                            </div>
                                        </div>
                                    </div>
                            
                                    <!-- .brand::form_image -->
                                    @includeIf('product::brand.form_image')
                                    <!-- . brand::form_image -->
                                    <!-- .brand::form_status -->
                                    @includeIf('product::brand.form_status')
                                    <!-- . brand::form_status -->
                                </div>
                                <!-- brand-main-tab-1 -->
                            </div>
                            <div class="tab-pane" id="brand-main-tab-2">
                                <!-- form_tab_seo -->
                                @include('product::seo.form_tab')
                                <!-- .form_tab_seo -->
                            </div>
                        </div>
                        <div class="form-group mb-1">
                            <div class="btn-list">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save mr-1"></i>{{ !empty($category->id) ? __('product::module.action.update') : __('product::module.action.save') }}</button>
                                <button onclick="mwz_redirect('{{ route('admin.product.brand.index') }}');" type="button" class="btn btn-warning">
                                    <i class="fa fa-undo"
                                        aria-hidden="true"></i>{{__('product::module.action.cancel')}}</button>
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
    
    <!-- tab -->
    <script src="{{ URL::asset('assets/plugins/tabs/jquery.multipurpose_tabcontent.js') }}"></script>

    <!-- bootstrap-switch -->
    <script src="{{ URL::asset('assets/plugins/bootstrap-switch/bootstrap-switch-button.min.js') }}"></script>
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/bootstrap-switch/bootstrap-switch-button.min.css') }}">
    
    
    <script>
        console.log('$_config');
        var $_config = $.parseJSON('<?=json_encode($config)?>');
        console.log($_config);
    </script>

    <!-- mwz master js css -->
    <link rel="stylesheet" href="{{ mix('css/mwz.css') }}">
    <script src="{{ mix('js/mwz.js') }}"></script>

    <!-- module js css -->
    <link rel="stylesheet" href="{{ mix('css/product_brand.css') }}">
    <script src="{{ mix('js/product.th.js') }}"></script>
    <script src="{{ mix('js/product_brand.js') }}"></script>
@endsection
