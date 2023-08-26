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
@endsection

@section('content')
    <!-- page-header -->
    <div class="page-header">
        <ol class="breadcrumb">
            <!-- breadcrumb -->
            <li class="breadcrumb-item"><a href="{{ route('admin.homepage') }}">{{ __('admin.homepage') }}</a></li>
            <li class="breadcrumb-item" aria-current="page">{{__('mwz::menu.page.setting')}}</li>
            {{-- <li class="breadcrumb-item active" aria-current="page">{{__('blog_admin.resource')}}</li> --}}
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.admin_menu.admin_menu.index') }}">{{ __('mwz::menu.name') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                {{ !empty($data->id) ? __('mwz::module.action.edit') : __('mwz::module.action.add') }}</li>
        </ol>
    </div>
    <!-- End page-header -->

    <!-- row -->
    <div class="row">
        <div class="col-md-12">
            <form id="menu_frm" name="menu_frm" method="POST" onsubmit="setSave(); return false;" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="id" value="{{ !empty($data->id) ? $data->id : '0' }}">
                <div class="card">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-6">
                                {{-- tab content.form_content --}}
                                @include('mwz::menu.form.form_tab')
                                {{-- .tab content.form_content --}}

                                {{-- content.form_image --}}
                                @include('mwz::menu.form.form_image')
                                {{-- .content.form_image --}}

                                {{-- content.form_status --}}
                                @include('mwz::menu.form.form_status')
                                {{-- .content.form_status --}}
                            </div>
                            <div class="col-md-6">

                                <div class="form-group col-md-12" style="<?= $config['icon'] ? '' : 'display: none;' ?>">
                                    <label class="form-label">{{ __('mwz::menu.form.icon') }}</label>
                                    <select class="icon-selector" id="icon" name="icon">
                                        <option value="">No icon</option>
                                        @if (!empty($icons))
                                            @foreach ($icons as $icon)
                                                <option value="{{ $icon }}" {{ !empty($data->icon) && $data->icon == $icon ? 'selected' : '' }}>{{ $icon }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                  
                                
                                <div class="form-group col-md-12" id="show-permission-select">
                                    <label class="form-label">Route name</label>
                                    <select id="route_name" name="route_name" class="form-control select2-ajax-with-image" data-selected-id="{{ !empty($data->route_name) ? $data->route_name : '' }}" data-selected-text="{{ !empty($data->route_name) ? $data->route_name : '' }}" data-selected-image="" data-ajax-url="/admin/user/get_permission" data-lang-placeholder="Route name" data-lang-searching="กำลังโหลด" data-parent-id="">
                                    </select>
                                </div>

                                 <div class="form-group col-md-12" id="show-param-select">
                                    <label class="form-label"> Params </label>
                                    <input type="text" class="form-control" id="params" name="params"
                                    placeholder="Params"
                                    value="{{ !empty($data->params) ? $data->params : '' }}">
                                   
                                </div>

                            </div>
                        </div>
                        <div class="form-group mb-1">
                            <div class="btn-list">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save mr-1"></i>{{ !empty($data->id) ? __('mwz::module.action.update') : __('mwz::module.action.save') }}</button>
                                <button onclick="mwz_redirect('{{ route('admin.admin_menu.admin_menu.index') }}');" type="button" class="btn btn-warning">
                                    <i class="fa fa-undo" aria-hidden="true"></i>{{ __('mwz::module.action.cancel') }}</button>
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

    <!--Select2 js -->
    <script src="{{ URL::asset('assets/plugins/select2/select2.full.min.js') }}"></script>

    <!--MutipleSelect js-->
    <script src="{{ URL::asset('assets/plugins/multipleselect/multiple-select.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/multipleselect/multi-select.js') }}"></script>

    <!--ckeditor js-->
    <script src="{{ URL::asset('assets/plugins/tinymce/tinymce.min.js') }}"></script>

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

    <!-- fontIconPicker -->
    <script src="{{ URL::asset('assets/plugins/fontIconPicker/js/jquery.fonticonpicker.min.js') }}"></script>
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/fontIconPicker/css/jquery.fonticonpicker.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/fontIconPicker/css/jquery.fonticonpicker.grey.min.css') }}" />

    <script>
        console.log('$_config');
        var $_config = $.parseJSON('<?= json_encode($config) ?>');
        console.log($_config);
    </script>

    <!-- mwz master js css -->
    <link rel="stylesheet" href="{{ mix('css/mwz.css') }}">
    <script src="{{ mix('js/mwz.js') }}"></script>

    <!-- module js css -->
    <link rel="stylesheet" href="{{ mix('css/admin_menu.css') }}">
    <script src="{{ mix('js/menu.th.js') }}"></script>
    <script src="{{ mix('js/admin_menu.js') }}"></script>
@endsection
