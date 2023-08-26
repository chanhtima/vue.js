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
@endsection

@section('content')
    <!-- page-header -->
    <div class="page-header">
        <ol class="breadcrumb">
            <!-- breadcrumb -->
            <li class="breadcrumb-item"><a href="{{ route('admin.homepage') }}">{{ __('admin.homepage') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.contactus.page.edit') }}">ติดต่อเรา</a></li>

            <li class="breadcrumb-item"><a
                    href="{{ route('admin.contactus.branch.index') }}">{{ __('menu_admin.branch') }}</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                {{ empty($data->id) ? __('contact_admin.add') : __('contact_admin.edit') }}
            </li>
        </ol>
    </div>
    <!-- End page-header -->

    <!-- row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form id="branch_frm" name="branch_frm" method="POST" onsubmit="setSaveBranch(); return false;">
                    @csrf
                    <input type="hidden" name="id" value="{{ !empty($data->id) ? $data->id : '0' }}">
                    <div class="card-body">
                        <div class="panel panel-primary">
                            <div class="tab_wrapper" id="contact-branch-tab-{{ !empty($data->id) ? $data->id : '0' }}">
                                <ul class="tab_list">
                                    <li class="icons-list-item" style="height: 36px;"><i class="flag flag-th"></i>
                                    </li>
                                    <li class="icons-list-item" style="height: 36px;"><i class="flag flag-gb"></i>
                                    </li>
                                </ul>
                                <div class="content_wrapper">
                                    {{-- !-- form_contact_branch_th --> --}}
                                    @includeIf('contactus::branch.form_th')
                                    <!-- .form_contact_branch_th -->
                                    <!-- form_contact_branch_en -->
                                    @includeIf('contactus::branch.form_en')
                                    <!-- .form_contact_branch_en -->

                                </div>
                            </div>
                        </div>
                        {{-- End Tap --}}

                        <!-- form_contact_branch_other -->
                        @includeIf('contactus::branch.form_other')
                        <!-- .form_contact_branch_other -->

                        <div class="form-group m-0">
                            <div class="btn-list">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-1"></i>
                                    {{ __('contact_admin.save') }}</button>
                                <button onclick="mwz_redirect('{{ route('admin.contactus.branch.index') }}');"
                                    type="button" class="btn btn-warning"><i class="fa fa-undo mr-1"
                                        aria-hidden="true"></i>{{ __('contact_admin.cancel') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
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
    <link rel="stylesheet" href="{{ mix('css/contactus.css') }}">
    <script src="{{ mix('js/contactus.th.js') }}"></script>
    <script src="{{ mix('js/contactus.js') }}"></script>
@endsection
