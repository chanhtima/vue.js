
<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar toggle-sidebar">

    <!-- Zcom menu -->
    <ul class="side-menu toggle-menu">
        @php
            $side_admin_menus = mwz_get_side_admin_menu();
        @endphp
        @if (!empty($side_admin_menus))
            @foreach ($side_admin_menus as $side_admin_menu)
                @if (!empty($side_admin_menu->children) && count($side_admin_menu->children) > 0)
                    {{-- @if (mwz_roles($side_admin_menu->route_name)) --}}
                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#">
                                @if (!empty($side_admin_menu->icon))
                                    <i class="side-menu__icon {{ $side_admin_menu->icon }}"></i>
                                @endif
                                <span class="side-menu__label active">{{ $side_admin_menu->{'name_' . app()->getLocale()} }}</span>
                                <i class="angle fa fa-angle-right"></i>
                            </a>

                            @if (!empty($side_admin_menu->children))
                                <ul class="slide-menu">
                                    @foreach ($side_admin_menu->children as $side_admin_menu_c1)
                                        @if (mwz_roles($side_admin_menu_c1->route_name))
                                            @if (!empty($side_admin_menu_c1->children) && count($side_admin_menu_c1->children) > 0)
                                                <li class="sub-slide">
                                                    <a href="{{ \Illuminate\Support\Facades\Route::has($side_admin_menu_c1->route_name) ? route($side_admin_menu_c1->route_name, $side_admin_menu_c1->params) : '#' . $side_admin_menu_c1->{'name_' . app()->getLocale()} }}" data-toggle="sub-slide" class="sub-slide-item">
                                                        <i class="side-menu__icon {{ $side_admin_menu_c1->icon }}"></i>
                                                        <span class="sub-side-menu__label">{{ $side_admin_menu_c1->{'name_' . app()->getLocale()} }}</span>
                                                        <i class="sub-angle fa fa-angle-right"></i>
                                                    </a>
                                                    <ul class="sub-slide-menu">
                                                        @foreach ($side_admin_menu_c1->children as $side_admin_menu_c2)
                                                            <li>
                                                                <a href="{{ \Illuminate\Support\Facades\Route::has($side_admin_menu_c2->route_name) ? route($side_admin_menu_c2->route_name, $side_admin_menu_c2->params) : '#' . $side_admin_menu_c2->{'name_' . app()->getLocale()} }}" class="sub-slide-item">
                                                                    <i class="side-menu__icon {{ $side_admin_menu_c2->icon }}"></i>
                                                                    {{ $side_admin_menu_c2->{'name_' . app()->getLocale()} }}
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @else
                                                <li class="sub-slide">
                                                    <a class="slide-item" href="{{ \Illuminate\Support\Facades\Route::has($side_admin_menu_c1->route_name) ? route($side_admin_menu_c1->route_name, $side_admin_menu_c1->params) : '#' . $side_admin_menu_c1->{'name_' . app()->getLocale()} }}">
                                                        <i class="side-menu__icon {{ $side_admin_menu_c1->icon }}"></i>
                                                        <span>{{ $side_admin_menu_c1->{'name_' . app()->getLocale()} }}</span>
                                                    </a>
                                                </li>
                                            @endif
                                        @endif
                                    @endforeach
                                </ul>
                            @endif
                            
                        </li>
                    {{-- @endif --}}
                @else
                    @if (empty($side_admin_menu->parent_id))
                        @if (mwz_roles($side_admin_menu->route_name))
                            <li class="slide">
                                <a class="side-menu__item" data-toggle="slide" href="{{ \Illuminate\Support\Facades\Route::has($side_admin_menu->route_name) ? route($side_admin_menu->route_name, $side_admin_menu->params) : '' }}">
                                    @if (!empty($side_admin_menu->icon))
                                        <i class="side-menu__icon {{ $side_admin_menu->icon }}"></i>
                                    @endif
                                    <span class="side-menu__label">{{ $side_admin_menu->{'name_' . app()->getLocale()} }}</span>
                                </a>
                            </li>
                        @endif
                    @endif
                @endif
            @endforeach
        @endif
        {{-- fixed menu --}}
        @if (mwz_roles('admin.filemanager.filemanager.index'))
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ route('admin.filemanager.filemanager.index') }}"><i class="side-menu__icon ion-folder"></i><span class="side-menu__label active">{{ __('menu_admin.manage_files') }}</span></a>
            </li>
        @endif
        @if (mwz_roles('admin.setting.websetting.edit') || mwz_roles('admin.setting.websetting.save') || mwz_roles('admin.setting.slug.index') || mwz_roles('admin.setting.slug.edit') || mwz_roles('admin.setting.slug.set_delete') || mwz_roles('admin.setting.slug.sitemap') || mwz_roles('admin.setting.tag.index') || mwz_roles('admin.setting.tag.add') || mwz_roles('admin.setting.tag.edit') || mwz_roles('admin.setting.tag.set_delete'))
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon ion-gear-b"></i><span class="side-menu__label active">SuperAdmin</span><i class="angle fa fa-angle-right"></i></a>
                <ul class="slide-menu">
                    {{-- @if (mwz_roles('admin.admin_menu.admin_menu.index') || mwz_roles('admin.admin_menu.admin_menu.edit'))
                        <li><a class="slide-item" href="{{ route('admin.admin_menu.admin_menu.index') }}"><span> {{__('mwz::module.menu.admin_menu')}}</span></a></li>
                    @endif --}}
                    @if (mwz_roles('admin.user.user.index') || mwz_roles('admin.user.user.add') || mwz_roles('admin.user.user.edit') || mwz_roles('admin.user.user.set_delete'))
                        <li class="sub-slide">
                            <a href="{{ mwz_route('admin.user.user.index') }}" data-toggle="sub-slide" class="sub-slide-item">
                                ผู้ใช้งาน
                                {{-- <i class="sub-angle fa fa-angle-right"></i> --}}
                            </a>
                            {{-- <a href="#" data-toggle="sub-slide" class="sub-slide-item">
                                <span class="sub-side-menu__label">{{ __('menu_admin.admin') }}</span>
                                <i class="sub-angle fa fa-angle-right"></i>
                            </a> --}}
                            {{-- <ul class="sub-slide-menu ">
                                <li><a href="{{ mwz_route('admin.user.user.index') }}" class="sub-slide-item">ผู้ใช้งาน</a></li>
                                <li><a href="{{ mwz_route('admin.user.role.index')}}" class="sub-slide-item">สิทธิ์</a></li>
                                <li><a href="{{ mwz_route('admin.user.permission.index')}}" class="sub-slide-item">ฟังก์ชั่น</a></li>
                            </ul> --}}
                        </li>
                    @endif
                    {{-- @if (mwz_roles('admin.log.log.index') || mwz_roles('admin.log.log.edit')) --}}
                    {{-- {{ route('admin.log.log.index') }} --}}
                        {{-- <li><a class="slide-item" href="#"><span>{{ __('mwz::module.menu.log') }}</span></a></li> --}}
                    {{-- @endif --}}
                </ul>
            </li>
        @endif
        {{-- fixed menu --}}

    </ul>
    <!-- .Zcom menu -->

</aside>
<!--sidemenu end-->
