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
            <li class="breadcrumb-item" aria-current="page">{{__('mwz::menu.page.setting')}}</li>
            <li class="breadcrumb-item" aria-current="page">ผู้ดูแลระบบ</li>
            <li class="breadcrumb-item" aria-current="page"><a href={{ route('admin.user.permission.index') }}">ฟังก์ชั่น</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                {{ !empty($data->id) ?  __('user::module.action.edit')  : __('user::module.action.add') }}
            </li>
        </ol>
    </div>
    <!-- End page-header -->

    <!-- row -->
    <div class="row">
        <div class="col-md-12">
            <form id="permission_frm" name="permission_frm" method="POST" onsubmit="setSave(); return false;"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ !empty($data->id) ? $data->id : '0' }}">
                <div class="card">
                    <div class="card-header p-3 border-bottom">
                        <div class="tabs-menu1 ">
                            <!-- Tabs -->
                            <ul class="nav panel-tabs" id="permission-main-tab">
                                <li><a href="#permission-main-tab-1" class="active" data-toggle="tab">{{ __('user::permission.name') }}</a></li>
                            </ul>
                            <!-- .Tabs -->
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="tab-content">
                            <div class="tab-pane active" id="permission-main-tab-1">
                                <div class="form-group">
                                    <label class="form-label">{{__('user::permission.field.name')}}</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="{{__('user::permission.field.name_placeholder')}}"
                                        value="{{ !empty($data->name) ? $data->name : '' }}">
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label class="form-label">{{__('user::permission.field.group')}}</label>
                                            <input type="text" class="form-control" id="group" name="group" readonly
                                                value="{{ !empty($data->group) ? $data->group : '' }}">
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">{{__('user::permission.field.module')}}</label>
                                            <input type="text" class="form-control" id="module" name="module" readonly
                                                value="{{ !empty($data->module) ? $data->module : '' }}">
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">{{__('user::permission.field.page')}}</label>
                                            <input type="text" class="form-control" id="page" name="page" readonly
                                                value="{{ !empty($data->page) ? $data->page : '' }}">
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">{{__('user::permission.field.action')}}</label>
                                            <input type="text" class="form-control" id="action" name="action" readonly
                                                value="{{ !empty($data->action) ? $data->action : '' }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">{{__('user::permission.field.route_name')}}</label>
                                            <input type="text" class="form-control" id="route_name" name="route_name" readonly
                                                value="{{ !empty($data->route_name) ? $data->route_name : '' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                         
                        </div>
                        <div class="form-group mb-1">
                            <div class="btn-list">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save mr-1"></i>{{ !empty($category->id) ? __('user::module.action.update') : __('user::module.action.save') }}</button>
                                <button onclick="mwz_redirect('{{ route('admin.user.permission.index') }}');" type="button" class="btn btn-warning">
                                    <i class="fa fa-undo"
                                        aria-hidden="true"></i>{{__('user::module.action.cancel')}}</button>
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

    <!-- mwz master js css -->
    <link rel="stylesheet" href="{{ mix('css/mwz.css') }}">
    <script src="{{ mix('js/mwz.js') }}"></script>

    <!-- module js css -->
    <link rel="stylesheet" href="{{ mix('css/user_permission.css') }}">
    <script src="{{ mix('js/user.th.js') }}"></script>
    <script src="{{ mix('js/user_permission.js') }}"></script>
@endsection
