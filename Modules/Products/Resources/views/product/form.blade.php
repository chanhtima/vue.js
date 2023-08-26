@extends('layouts.app')

@section('styles')
    <!--Select2 css -->
    <link href="{{ URL::asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />

    <!-- Time picker css-->
    <link href="{{ URL::asset('assets/plugins/time-picker/jquery.timepicker.css') }}" rel="stylesheet" />

    <!-- Date Picker css-->
    <link href="{{ URL::asset('assets/plugins/spectrum-date-picker/spectrum.css') }}" rel="stylesheet" />>

    <!--switch-button css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/bootstrap-switch/bootstrap-switch-button.min.css') }}">
    <!--Mutipleselect css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/multipleselect/multiple-select.css') }}">

    <!-- File Uploads css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/dropify.css') }}" rel="stylesheet" type="text/css" />

    <!--Mutiple-select css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/multiple-select/multiple-select.css') }}">

    <link rel="stylesheet" href="{{ Module::asset('product:css/custom.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <style>
        .select2 {
            width: 100% !important;
        }
    </style>

    <link href="{{ asset('assets/css/upload-image.css') }}" rel="stylesheet">
@endsection

@section('content')
    <!-- page-header -->
    <div class="page-header">
        <ol class="breadcrumb">
            <!-- breadcrumb -->
            <li class="breadcrumb-item"><a href="{{ route('admin.homepage') }}">{{ __('admin.homepage') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.product.list.index') }}">สินค้า</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.product.list.index') }}">รายการสินค้า</a></li>
            <li class="breadcrumb-item active" aria-current="page" data-sidebar="{{ route('admin.product.list.index') }}">
                {{ !empty($product['data']->id) ? 'แก้ไข' : 'เพิ่ม' }}</li>
        </ol>
    </div>
    <!-- End page-header -->

    <!-- row -->
    <div id="container" class="row">
        <div class="col-md-12">
            <form id="product_frm" name="product_frm" method="POST" onsubmit="setSave();return false;"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="product_id"
                    value="{{ !empty($product['data']->id) ? $product['data']->id : '0' }}">
                <input type="hidden" name="item_id"
                    value="{{ !empty($product['item']->id) ? $product['item']->id : '0' }}">
                <input type="hidden" name="price_id"
                    value="{{ !empty($product['price']->id) ? $product['price']->id : '0' }}">
                <input type="hidden" name="stock_id"
                    value="{{ !empty($product['stock']->id) ? $product['stock']->id : '0' }}">
                <!-- row -->
                <div class="card border-0">
                    <!-- tab -->
                    <div class="tab_wrapper mt-3" id="product-tab">
                        <!-- Tabs -->
                        <ul class="tab_list">
                            <li><span>รายละเอียด</span></li>
                            <li><span>รูปภาพ</span></li>
                            <li><span>{{ __('websetting_admin.seo') }}</span></li>
                        </ul>
                        <div class="content_wrapper">
                            <!-- form_detail -->
                            @includeIf('products::product.form_detail')
                            <!-- .form_detail -->
                            <!-- form_image -->
                            @includeIf('products::product.form_image')
                            <!-- .form_image -->
                            <!-- form_seo -->
                            @includeIf('products::seo.form_seo')
                            <!-- .form_seo -->
                        </div>
                    </div>
                    <!-- .tab -->
                    <div class="p-4" style="border: 1px solid #eaeaea;border-top: 0;">
                        <div class="form-group m-0">
                            <div class="btn-list">
                                <button type="button" onclick="setSave();" class="btn btn-primary"><i
                                        class="fa fa-save mr-1"></i>บันทึก</button>
                                <button onclick="mwz_redirect('{{ route('admin.product.list.index') }}');" type="button"
                                    class="btn btn-warning"><i class="fa fa-undo mr-1"
                                        aria-hidden="true"></i>ย้อนกลับ</button>
                            </div>
                        </div>
                    </div>
                    <!-- .row -->
                </div>
            </form>
        </div>
    </div>
    <!-- .row -->
@endsection('content')

@section('scripts')
    <!--Jquery Sparkline js-->
    <script src="{{ URL::asset('assets/plugins/vendors/jquery.sparkline.min.js') }}"></script>

    <!-- tab -->
    <script src="{{ URL::asset('assets/plugins/tabs/jquery.multipurpose_tabcontent.js') }}"></script>
    <link href="{{ URL::asset('assets/plugins/tabs/tabs-style.css') }}" rel="stylesheet" />

    <!-- File uploads js -->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/dropify.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/dropify-multiple.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/dropify-demo.js') }}"></script>
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/dropify.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/dropify-multiple.min.css') }}" rel="stylesheet"
        type="text/css" />

    <!-- File uploads multiple js -->
    <script src="{{ URL::asset('assets/plugins/dropzone/dropzone.min.js') }}"></script>
    <link href="{{ URL::asset('assets/plugins/dropzone/dropzone.min.css') }}" rel="stylesheet" />
    <script type="text/javascript">
        Dropzone.autoDiscover = false;
    </script>


    <!-- Notifications js -->
    <link href="{{ URL::asset('assets/plugins/notify-growl/css/jquery.growl.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/notify-growl/css/notifIt.css') }}" rel="stylesheet" />
    <script src="{{ URL::asset('assets/plugins/bootbox/bootbox.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/notify-growl/js/rainbow.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/notify-growl/js/jquery.growl.js') }}"></script>

    <!--tinymce js-->
    <script src="{{ URL::asset('assets/plugins/tinymce/jquery.tinymce.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/tinymce/tinymce.min.js') }}"></script>

    <!--Select2 js -->
    <script src="{{ URL::asset('assets/plugins/select2/select2.full.min.js') }}"></script>
    <link href="{{ URL::asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />


    <!--MutipleSelect js-->
    {{-- <script src="{{ URL::asset('assets/plugins/multipleselect/multiple-select.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/multipleselect/multi-select.js') }}"></script> --}}
    {{-- <link rel="stylesheet" href="{{ URL::asset('assets/plugins/multipleselect/multiple-select.css') }}"> --}}

    <!-- validator js -->
    <script src="{{ URL::asset('assets/plugins/validator/js/jquery.validate.min.js') }}"></script>

    <!-- bootstrap-switch -->
    <script src="{{ URL::asset('assets/plugins/bootstrap-switch/bootstrap-switch-button.min.js') }}"></script>
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/bootstrap-switch/bootstrap-switch-button.min.css') }}">

    <!-- Time picker css-->
    <link href="{{ URL::asset('assets/plugins/time-picker/jquery.timepicker.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/spectrum-date-picker/spectrum.css') }}" rel="stylesheet" />

    <!-- Jquery UI2-->
    <script src="{{ URL::asset('assets/plugins/jquery-ui2/jquery-ui.min.js') }}"></script>
    <link href="{{ URL::asset('assets/plugins/jquery-ui2/jquery-ui.min.css') }}" rel="stylesheet" />

    {{-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script> --}}
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>


    <!-- config to js -->
    {{-- <script>
        console.log('$_config');
        var $_config = $.parseJSON('<?= json_encode($config) ?>');
        console.log($_config);
    </script> --}}

    <!-- mwz master js css -->
    <link rel="stylesheet" href="{{ mix('css/mwz.css') }}">
    <script src="{{ mix('js/mwz.js') }}"></script>

    <!-- module js css -->
    <link rel="stylesheet" href="{{ mix('css/product.css') }}">
    <script src="{{ mix('js/product.th.js') }}"></script>
    <script src="{{ mix('js/product.js') }}"></script>
@endsection
