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
            <li class="breadcrumb-item"><a href="{{ route('admin.homepage') }}">{{__('admin.homepage')}}</a></li>
            <li class="breadcrumb-item" aria-current="page">{{__('mwz::menu.page.setting')}}</li>
            <li class="breadcrumb-item active" aria-current="page">{{__('mwz::menu.name')}}</li>
        </ol><!-- End breadcrumb -->
        <div class="ml-auto">
            <div class="input-group">
                @if(mwz_roles('admin.admin_menu.admin_menu.add'))
                <a href="{{ route('admin.admin_menu.admin_menu.add') }}" class="btn btn-secondary text-white mr-2 btn-sm" data-toggle="tooltip" title="" data-placement="bottom" data-original-title="Add">
                    <span>
                        <i class="fa fa-plus" aria-hidden="true"></i> {{__('mwz::module.action.add')}}
                    </span>
                </a>
                @endif
            </div>
        </div>
    </div>
    <!-- End page-header -->

    <!-- row opened -->
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">{{__('mwz::menu.name')}}</div>
                </div>
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table id="menu-datatable" data-type="" class="table table-bordered key-buttons text-nowrap w-100">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0" width="5%">{{__('mwz::menu.datatable.sequence')}}</th>
                                    <?php if($config['image']){ ?>
                                    <th class="border-bottom-0" width="15%">{{__('mwz::menu.datatable.image')}}</th>
                                    <?php } ?>
                                    <th class="border-bottom-0" width="">{{__('mwz::menu.datatable.icon')}}</th>
                                    <th class="border-bottom-0" width="">{{__('mwz::menu.datatable.name')}}</th>
                                    <th class="border-bottom-0" width="">{{__('mwz::menu.datatable.link')}}</th>
                                    <th class="border-bottom-0" width="10%">{{__('mwz::menu.datatable.sort')}}</th>
                                    <th class="border-bottom-0" width="15%">{{__('mwz::menu.datatable.updated_at')}}</th>
                                    <th class="border-bottom-0" width="5%">{{__('mwz::menu.datatable.manage')}}</th>
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
    
    <script src="{{ URL::asset('assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/responsive.bootstrap4.min.js') }}"></script>
    
    <!-- datatable re order -->
    <link href="{{ URL::asset('assets/plugins/datatable-reorder/rowReorder.dataTables.min.css') }}" rel="stylesheet" />
    <script src="{{ URL::asset('assets/plugins/datatable-reorder/dataTables.rowReorder.min.js') }}"></script>
     
    <!-- Notifications js -->
    <link href="{{ URL::asset('assets/plugins/notify-growl/css/jquery.growl.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/notify-growl/css/notifIt.css') }}" rel="stylesheet" />
    <script src="{{ URL::asset('assets/plugins/bootbox/bootbox.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/notify-growl/js/rainbow.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/notify-growl/js/jquery.growl.js') }}"></script>

    <!-- config to js -->
    <script>
        console.log('$_config');
        var $_config = $.parseJSON('<?=json_encode($config)?>');
        console.log($_config);
    </script>

    <!-- mwz master js css -->
    <link rel="stylesheet" href="{{ mix('css/mwz.css') }}">
    <script src="{{ mix('js/mwz.js') }}"></script>

    <!-- module js css -->
    <link rel="stylesheet" href="{{ mix('css/admin_menu.css') }}">
    <script src="{{ mix('js/mwz.th.js') }}"></script>
    <script src="{{ mix('js/admin_menu.js') }}"></script>
    
@endsection
