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

    <!--switch-button css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/bootstrap-switch/bootstrap-switch-button.min.css') }}">
@endsection

@section('content')
    <!-- page-header -->
    <div class="page-header">
        <ol class="breadcrumb">
            <!-- breadcrumb -->
            <li class="breadcrumb-item"><a href="{{ route('admin.homepage') }}">{{ __('admin.homepage') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.menu.menu.index') }}">{{ __('menu_admin.menu') }}</a>
            </li>
            @if ($type == 1)
                <li class="breadcrumb-item active" aria-current="page">
                    {{ empty($data['menu']->id) ? __('menu_admin.add_menu_header') : __('menu_admin.edit_menu_header') }}
                </li>
            @else
                <li class="breadcrumb-item active" aria-current="page">
                    {{ empty($data['menu']->id) ? __('menu_admin.add_menu_footer') : __('menu_admin.edit_menu_footer') }}
                </li>
            @endif
        </ol><!-- End breadcrumb -->
    </div>

    <!-- End page-header -->

    <!-- row -->
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <form id="menu_frm" name="menu_frm" method="POST" onsubmit="setSaveMenu(); return false;"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ !empty($data['menu']->id) ? $data['menu']->id : '0' }}">
                    <input type="hidden" name="type" value="{{ $type }}" />
                    <div class="card-body">
                        <div class="panel panel-primary mb-3">
                            {{-- start tap --}}
                            <div class="tab_wrapper"
                                id="menu_{{ !empty($data['menu']->id) ? $data['menu']->id : '0' }}_tap">
                                <ul class="tab_list">
                                    <li>
                                        <img style="height: 16px;" src="{{ URL::asset('assets/images/flags/th.svg') }}">
                                    </li>
                                    <li><img style="height: 16px;" src="{{ URL::asset('assets/images/flags/gb.svg') }}">
                                    </li>
                                </ul>
                                <div class="content_wrapper">
                                    {{-- tap 1 --}}
                                    <div class="tab_content active">
                                        <div class="alert alert-default" role="alert">
                                            <span class="alert-inner--icon"><i class="fe fe-bell"></i></i></span>
                                            <span class="alert-inner--text">{{ __('menu_admin.edit') }}
                                                <strong>{{ __('menu_admin.lang_thai') }}</strong></span>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label required">{{ __('menu_admin.name_menu_th') }}</label>
                                            <input type="text" class="form-control" id="name_th" name="name_th"
                                                placeholder="โปรดระบุชื่อเมนู"
                                                value="{{ !empty($data['menu']->name_th) ? $data['menu']->name_th : '' }}">
                                        </div>
                                        {{-- <div class="form-group">
                                            <label class="form-label">{{ __('content::category_admin.field.desc') }}
                                                (TH)</label>
                                            <textarea id="desc_th" class="form-control texteditor" name="desc_th" rows="4"
                                                placeholder="{{ __('content::category_admin.field.desc') }}">{{ !empty($data['menu']->desc_th) ? $data['menu']->desc_th : '' }}</textarea>
                                        </div> --}}
                                    </div>
                                    {{-- end tap 1 --}}
                                    {{-- tap 2 --}}
                                    <div class="tab_content">
                                        <div class="alert alert-default" role="alert">
                                            <span class="alert-inner--icon"><i class="fe fe-bell"></i></i></span>
                                            <span class="alert-inner--text">{{ __('menu_admin.edit') }}
                                                <strong>{{ __('menu_admin.lang_eng') }}</strong></span>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label required">{{ __('menu_admin.name_menu_en') }}</label>
                                            <input type="text" class="form-control" id="name_en" name="name_en"
                                                placeholder="โปรดระบุชื่อเมนู"
                                                value="{{ !empty($data['menu']->name_en) ? $data['menu']->name_en : '' }}">
                                        </div>
                                        {{-- <div class="form-group">
                                            <label
                                                class="form-label">{{ __('content::category_admin.field.desc') }}(EN)</label>
                                            <textarea id="desc_en" class="form-control texteditor" name="desc_en" rows="4"
                                                placeholder="{{ __('content::category_admin.field.desc') }}">{{ !empty($data['menu']->desc_en) ? $data['menu']->desc_en : '' }}</textarea>
                                        </div> --}}
                                    </div>
                                    {{-- end tap 2 --}}
                                </div>
                            </div>
                            {{-- end tap --}}
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                {{-- <div class="col-12">
                                    <label class="form-label">ประเภทลิงค์</label>
                                    <select name="link_type" id="link_type" class="form-control select2"
                                        onchange="select_slug(this.value)" data-placeholder="Choose Parent">
                                        <option value="1" @if (!empty($data['menu']->link_type) == 1 && $data['menu']->link_type == 1) selected @endif>ระบบ
                                        </option>
                                        <option value="2" @if (!empty($data['menu']->link_type) == 2 && $data['menu']->link_type == 2) selected @endif>URL
                                        </option>
                                    </select>
                                </div> --}}
                                
                                {{-- <div class="col-12 pt-2">
                                    <div class="form-group" id="frm-slug">
                                        <label class="form-label">ระบบ</label>
                                        <select name="slug_id" id="slug_id" class="form-control select2"
                                            data-placeholder="Choose Parent">
                                            <option value="" selected>-- no Slug --</option>
                                            @foreach ($slugs as $slug)
                                                @if (!empty($slug->id))
                                                    <option value="{{ $slug->id }}"
                                                        @if (!empty($data['menu']->slug_id) == $slug->id && $data['menu']->slug_id == $slug->id) selected @endif>
                                                        {{ !empty($slug->level) && $slug->level == 2 ? '-' : '' }}
                                                        {{ !empty($slug->slug) ? $slug->slug : '' }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group" id="frm-url">
                                        <label class="form-label">URL</label>
                                        <input type="text" class="form-control" name="url" placeholder="URL"
                                            value="{{ !empty($slug->url) ? $slug->url : '' }}">
                                    </div>
                                </div> --}}

                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label required">{{ __('menu_admin.sequence_menu') }}</label>
                                        <input type="text" class="form-control" id="sequence" name="sequence"
                                            placeholder="โปรดระบุลำดับการแสดงผล" onkeypress="InputValidateString()"
                                            value="{{ !empty($data['menu']->sequence) ? $data['menu']->sequence : '' }}">
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="form-group col-md-6">
                                <label class="form-label required">{{ __('menu_admin.parent_menu') }}</label>
                                <select name="parent_id" id="parent_id" class="form-control select2"
                                    data-placeholder="Choose Parent">
                                    <option value="" selected>-- {{ __('menu_admin.parent_menu') }} --</option>
                                    @foreach ($data['list'] as $list)
                                        <option value="{{ $list->id }}"
                                            @if (!empty($data['menu']->parent_id) == $list->id && $data['menu']->parent_id == $list->id) selected @endif>
                                            {{ !empty($list->name_th) ? $list->name_th : '' }}</option>
                                    @endforeach
                                </select>
                            </div> --}}
                            <div class="form-group col-md-6">
                                <label class="form-label">การแสดงผล</label>
                                <table class="table table-bordered">
                                    <thead>
                                      <tr>
                                        <td scope="col">
                                            <label class="form-label">สถานะ</label>
                                        </td>
                                        <td scope="col">
                                            <div class="button button-r btn-switch">
                                                <input type="checkbox" class="checkbox" id="status" name="status" value="1" {{ isset($data['menu']->status) ? ($data['menu']->status == 1 ? 'checked' : '') : 'checked' }}>
                                                <div class="knobs"></div>
                                                <div class="layer"></div>
                                            </div>
                                        </td>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <label class="form-label">แสดง footer</label>
                                            </td>
                                            <td>
                                                <div class="button button-r btn-switch">
                                                    <input type="checkbox" class="checkbox" id="show_location" name="show_location" value="1" {{ isset($data['menu']->show_location) ? ($data['menu']->show_location == 1 ? 'checked' : '') : 'checked' }}>
                                                    <div class="knobs"></div>
                                                    <div class="layer"></div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="form-group mb-1">
                            <div class="btn-list">
                                <button type="submit" class="btn btn-primary"
                                    onclick="$(this).closest('form').submit();"><i
                                        class="fa fa-save mr-1"></i>{{ __('menu_admin.save') }}</button>
                                <button onclick="mwz_redirect('{{ route('admin.menu.menu.index') }}');" type="button"
                                    class="btn btn-warning"><i class="fa fa-undo mr-1"
                                        aria-hidden="true"></i>{{ __('menu_admin.cancel') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            select_slug($('#link_type').val());
            $('.select2-show-search').select2({
                minimumResultsForSearch: ''
            });

        })

        function select_slug(type) {
            if (type == 2) {
                document.getElementById('frm-slug').style.display = 'none';
                document.getElementById('frm-url').style.display = 'block';
            } else {
                document.getElementById('frm-slug').style.display = 'block';
                document.getElementById('frm-url').style.display = 'none';
            }
        }
    </script>
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

    <!-- mwz menu js css -->
    <link rel="stylesheet" href="{{ mix('css/mwz.css') }}">
    <script src="{{ mix('js/mwz.js') }}"></script>

    <!-- module js css -->
    <link rel="stylesheet" href="{{ mix('css/menu.css') }}">
    <script src="{{ mix('js/menu.js') }}"></script>
    <script src="{{ mix('js/menu.th.js') }}"></script>
@endsection
