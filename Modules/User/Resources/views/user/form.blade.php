@extends('layouts.app')

@section('styles')
    <!--Select2 css -->
    <link href="{{ URL::asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />

    <!-- Time picker css-->
    <link href="{{ URL::asset('assets/plugins/time-picker/jquery.timepicker.css') }}" rel="stylesheet" />

    <!-- Date Picker css-->
    <link href="{{ URL::asset('assets/plugins/spectrum-date-picker/spectrum.css') }}" rel="stylesheet" />

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
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.dashboard.index') }}">{{ __('admin.homepage') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.user.user.index') }}">{{ __('user_admin.admin') }}</a></li>
            <li class="breadcrumb-item active">{{ !empty($user->id) ? __('user_admin.edit') : __('user_admin.add') }}</li>
        </ol>
    </div>
    <!-- End page-header -->

    <!-- row -->
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header pb-0">
                    <h3 class="mb-0 card-title">{{ __('user_admin.user_form') }}</h3>
                </div>
                <form id="user_frm" name="user_frm" method="POST" onsubmit="setSave(); return false;" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="user_id" value="{{ !empty($user->id) ? $user->id : '0' }}">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label required">{{__('user::module.field.name')}}</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="{{__('user::module.field.name_placeholder')}}" value="{{ !empty($user->name) ? $user->name : '' }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label required">{{__('user::module.field.email')}}</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="{{__('user::module.field.email_placeholder')}}" value="{{ !empty($user->email) ? $user->email : '' }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label required">{{__('user::module.field.username')}}</label>
                                    <input <?= !empty($user->id) ? 'readonly' : '' ?> type="text" class="form-control" name="username" id="username" placeholder="{{__('user::module.field.username_placeholder')}}" value="{{ !empty($user->username) ? $user->username : '' }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label required">{{__('user::module.field.password')}}</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="{{__('user::module.field.password_placeholder')}}" value="{{ !empty($user->password) ? '********' : '' }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label required">{{__('user::module.field.re_password')}}</label>
                                    <input type="password" class="form-control" id="re_password" name="re_password" placeholder="{{__('user::module.field.re_password_placeholder')}}" value="{{ !empty($user->password) ? '********' : '' }}">
                                </div>
                               
                                <div class="form-group">
                                    <label class="form-label required">{{__('user::module.field.role')}}</label>
                                    <select name="role_id" id="role_id"  class="form-control select2" data-placeholder="{{__('user::module.field.role_placeholder')}}">
                                        <?php foreach($roles as $role){ 
                                            $role_selected = (!empty($user->role)&&$user->role==$role->id)?'selected':'';
                                        ?>
                                        <option value="<?=$role->id?>" <?=$role_selected?>  ><?=$role->name?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group mb-3  col-lg-4 " style="<?=(!$enable_feature['api'])?"display:none;":""?>" >
                                    <label class="form-label">{{__('user::module.field.api_enable')}}</label>
                                    <input type="checkbox" id="api_enable" name="api_enable" 
                                    data-onlabel="{{__('user::module.field.status_on')}}" 
                                    data-offlabel="{{__('user::module.field.status_off')}}" 
                                    data-toggle="switchbutton" 
                                    value="1"  
                                    data-onstyle="outline-success" 
                                    data-width="80"
                                    data-offstyle="outline-danger" {{ isset($data->api_enable) ? ($data->api_enable == 1 ? 'checked' : '') : 'checked' }}>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label class="form-label">{{__('user::module.field.status')}}</label>
                                    <div class="button button-r btn-switch">
                                        <input type="checkbox" class="checkbox" id="status" name="status" value="1" {{ isset($user->status) ? ($user->status == 1 ? 'checked' : '') : 'checked' }}>
                                        <div class="knobs"></div>
                                        <div class="layer"></div>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="col-md-6">
                                <div class="form-group required">
                                    <div class="col-md-6">
                                        <?= image_upload($id = '1', $name = 'avatar', $label = __('user::module.field.avatar'), $image = !empty($user->avatar) ? $user->avatar : '', $size_recommend = ' 100 x 100px') ?>
                                    </div>
                                </div>
                            </div>
                           
                        </div>

                    </div>
                    <div class="p-4">
                        <p>
                            <div class="form-group m-0">
                                <div class="btn-list">
                                    <button id="submit" type="submit" class="btn btn-primary"><i
                                            class="fa fa-save mr-1"></i>{{ __('user::module.action.save')}}</button>
                                    <button onclick="mwz_redirect('{{ route('admin.user.user.index') }}');"
                                        type="button" class="btn btn-warning"><i class="fa fa-undo mr-1"
                                            aria-hidden="true"></i>{{ __('user::module.action.cancel')}}</button>
                                </div>
                            </div>
                        </p>
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

    <!-- Notifications js -->
    <link href="{{ URL::asset('assets/plugins/notify-growl/css/jquery.growl.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/notify-growl/css/notifIt.css') }}" rel="stylesheet" />
    <script src="{{ URL::asset('assets/plugins/bootbox/bootbox.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/notify-growl/js/rainbow.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/notify-growl/js/jquery.growl.js') }}"></script>

    <!-- validator js -->
    <script src="{{ URL::asset('assets/plugins/validator/js/jquery.validate.min.js') }}"></script>

    <!--- Internal Treeview js -->
    <script src="{{ URL::asset('assets/plugins/treeview/treeview.js') }}"></script>

    <!--- Internal Treeview -->
    <link href="{{ URL::asset('assets/plugins/treeview/treeview.css') }}" rel="stylesheet" type="text/css" />

    <!-- mwz master js css -->
    <link rel="stylesheet" href="{{ mix('css/mwz.css') }}">
    <script src="{{ mix('js/mwz.js') }}"></script>

    <!-- bootstrap-switch -->
    <script src="{{ URL::asset('assets/plugins/bootstrap-switch/bootstrap-switch-button.min.js') }}"></script>
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/bootstrap-switch/bootstrap-switch-button.min.css') }}">
     
  
    <!-- module js css -->
    <link rel="stylesheet" href="{{ mix('css/user.css') }}">
    <script src="{{ mix('js/user.js') }}"></script>
@endsection
