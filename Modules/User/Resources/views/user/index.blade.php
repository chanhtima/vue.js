@extends('layouts.app')

@section('styles')
    <!-- Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/responsivebootstrap4.min.css') }}" rel="stylesheet" />

    <!-- Select2 css -->
    <link href="{{ URL::asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <!-- page-header -->
    <div class="page-header">
        <ol class="breadcrumb">
            <!-- breadcrumb -->
            <li class="breadcrumb-item"><a href="{{ route('admin.homepage') }}">{{ __('user_admin.home_page') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('user_admin.admin') }}</li>
        </ol><!-- End breadcrumb -->
        @if (mwz_roles('admin.user.user.add'))
            <div class="ml-auto">
                <div class="input-group">
                    <?php if($enable_feature['group']){ ?>
                    <a href="{{ route('admin.user.group.index') }}" class="btn btn-info text-white mr-2 btn-sm"
                        data-toggle="tooltip" title="" data-placement="bottom" data-original-title="Rating">
                        <span>
                            <i class="fa fa-users" aria-hidden="true"></i> {{ __('user_admin.group') }}
                        </span>
                    </a>
                    <?php } ?>
                    <a href="{{ route('admin.user.user.add') }}" class="btn btn-secondary text-white mr-2 btn-sm"
                        data-toggle="tooltip" title="" data-placement="bottom" data-original-title="Rating">
                        <span>
                            <i class="fa fa-plus" aria-hidden="true"></i> {{ __('user_admin.add') }}
                        </span>
                    </a>

                </div>
            </div>
        @endif
    </div>
    <!-- End page-header -->

    <!-- row opened -->
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="user-datatable" class="table table-bordered key-buttons text-nowrap w-100">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0" width="5%">{{ __('user::module.datatable.id') }}</th>
                                    <th class="border-bottom-0" width="40%">{{ __('user::module.datatable.name') }}</th>
                                    <th class="border-bottom-0" width="40%">{{ __('user::module.datatable.username') }}</th>
                                    <th class="border-bottom-0" width="20%">{{ __('user::module.datatable.role') }}</th>
                                    <th class="border-bottom-0" width="20%">{{ __('user::module.datatable.updated_at') }}</th>
                                    <th class="border-bottom-0" width="15%">{{ __('user::module.datatable.manage') }}</th>
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
@endsection('content')

@section('scripts')
    <!--Jquery Sparkline js-->
    <script src="{{ URL::asset('assets/plugins/vendors/jquery.sparkline.min.js') }}"></script>

    <!-- Chart Circle js-->
    <script src="{{ URL::asset('assets/plugins/vendors/circle-progress.min.js') }}"></script>

    <!--Time Counter js-->
    <script src="{{ URL::asset('assets/plugins/counters/jquery.missofis-countdown.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/counters/counter.js') }}"></script>

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
    <!-- <script src="{{ URL::asset('assets/plugins/datatable/datatable-2.js') }}"></script> -->


    <!-- Notifications js -->
    <link href="{{ URL::asset('assets/plugins/notify-growl/css/jquery.growl.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/notify-growl/css/notifIt.css') }}" rel="stylesheet" />
    <script src="{{ URL::asset('assets/plugins/bootbox/bootbox.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/notify-growl/js/rainbow.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/notify-growl/js/jquery.growl.js') }}"></script>

    <!-- mwz master js css -->
    <link rel="stylesheet" href="{{ mix('css/mwz.css') }}">
    <script src="{{ mix('js/mwz.js') }}"></script>

    <!-- module js css -->
    <link rel="stylesheet" href="{{ mix('css/user.css') }}">
    <script src="{{ mix('js/user.th.js') }}"></script>
    <script src="{{ mix('js/user.js') }}"></script>
@endsection
