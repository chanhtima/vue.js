@extends('layouts.app')

@section('styles')
    <!-- Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/responsivebootstrap4.min.css') }}" rel="stylesheet" />
    <!-- Select2 css -->
    <link href="{{ URL::asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />

    <!-- Tabs css-->
    <link href="{{ URL::asset('assets/plugins/tabs/tabs-style.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <!-- page-header -->
    <div class="page-header">
        <ol class="breadcrumb">
            <!-- breadcrumb -->
            <li class="breadcrumb-item"><a href="{{ route('admin.homepage') }}">{{ __('admin.homepage') }}</a></li>
            {{-- <li class="breadcrumb-item">{{ __('menu_admin.menu') }}</li>  --}}

            <li class="breadcrumb-item active" aria-current="page">
                @if (session()->get('type_menu') == '' || session()->get('type_menu') == 1)
                    {{ __('menu_admin.header_menu') }}
                @else
                    {{ __('menu_admin.footer_menu') }}
                @endif
            </li>
        </ol><!-- End breadcrumb -->
        @if (mwz_roles('admin.menu.menu.add'))
            {{-- <div class="ml-auto">
                <div class="input-group">
                    <a href="{{ route('admin.menu.menu.add') }}" class="btn btn-secondary text-white mr-2 btn-sm"
                        data-toggle="tooltip" title="" data-placement="bottom" data-original-title="Add">
                        <span>
                            <i class="fa fa-plus" aria-hidden="true"></i> {{ __('menu_admin.add') }}
                        </span>
                    </a>
                </div>
            </div> --}}
        @endif
    </div>
    <!-- End page-header -->

    <!-- row opened -->
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body ">
                    {{-- <ol class="breadcrumb1">
                        <li class="breadcrumb-item1">
                            <a class="{{ session()->get('type_menu') == '' || session()->get('type_menu') == 1 ? 'text-gray' : '' }}"
                                href="{{ route('admin.menu.menu.type_menu', 1) }}">{{ __('menu_admin.header_menu') }}</a>
                        </li>
                        <li class="breadcrumb-item1">
                            <a class="{{ session()->get('type_menu') == 2 ? 'text-gray' : '' }}"
                                href="{{ route('admin.menu.menu.type_menu', 2) }}">{{ __('menu_admin.footer_menu') }}</a>
                        </li>
                    </ol> --}}

                    <div class="table-responsive">
                        <table id="menu-datatable" class="table table-bordered key-buttons text-nowrap w-100">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0" width="5%">{{ __('menu_admin.sequence') }}</th>
                                    <th class="border-bottom-0" width="30%">{{ __('menu_admin.name_menu_th') }}</th>
                                    <th class="border-bottom-0" width="30%">{{ __('menu_admin.name_menu_en') }}</th>
                                    <th class="border-bottom-0" width="20%">{{ __('menu_admin.update_at') }}</th>
                                    <th class="border-bottom-0" width="5%">{{ __('menu_admin.manage') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection

@section('scripts')
    <!--Jquery Sparkline js-->
    <script src="{{ URL::asset('assets/plugins/vendors/jquery.sparkline.min.js') }}"></script>

    <!-- Chart Circle js-->
    <script src="{{ URL::asset('assets/plugins/vendors/circle-progress.min.js') }}"></script>

    <!--Time Counter js-->
    <script src="{{ URL::asset('assets/plugins/counters/jquery.missofis-countdown.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/counters/counter.js') }}"></script>

    <!---Tabs js-->
    <script src="{{ URL::asset('assets/plugins/tabs/jquery.multipurpose_tabcontent.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/tabs/tabs.js') }}"></script>

    <!-- INTERNAL Data tables -->
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/responsive.bootstrap4.min.js') }}"></script>

    <!-- datatable re order -->
    <link href=" https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css" rel="stylesheet" />
    <script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>



    <!-- Notifications js -->
    <link href="{{ URL::asset('assets/plugins/notify-growl/css/jquery.growl.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/notify-growl/css/notifIt.css') }}" rel="stylesheet" />
    <script src="{{ URL::asset('assets/plugins/bootbox/bootbox.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/notify-growl/js/rainbow.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/notify-growl/js/jquery.growl.js') }}"></script>

    <!-- mwz member js css -->
    <link rel="stylesheet" href="{{ mix('css/mwz.css') }}">
    <script src="{{ mix('js/mwz.js') }}"></script>

    <!-- module js css -->
    <link rel="stylesheet" href="{{ mix('css/menu.css') }}">
    <script src="{{ mix('js/menu.js') }}"></script>
    <script src="{{ mix('js/menu.th.js') }}"></script>
@endsection
