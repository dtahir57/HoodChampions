<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <link rel="apple-touch-icon" href="{{ asset('app-assets/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('app-assets/images/ico/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/material-vendors.min.css') }}">
    @yield('vendor-css')
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/material.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/material-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/material-colors.css') }}">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    @yield('page-css')
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern material-vertical-layout material-layout 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-dark navbar-shadow">
        <div class="navbar-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mobile-menu d-lg-none mr-auto">
                        <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#">
                            <i class="ft-menu font-large-1"></i>
                        </a>
                    </li>
                    <li class="nav-item mr-auto">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img class="" alt="HoodChampions admin logo" src="{{ asset('assets/graphics/HoodChampions Logo.svg') }}">
                        </a>
                    </li>
                </ul>
            </div>
            <div class="navbar-container content">
                <div class="collapse navbar-collapse" id="navbar-mobile">
                    <ul class="nav navbar-nav mr-auto float-left">
                        <!--  -->
                    </ul>
                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-notification nav-item">

                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                <li class="dropdown-menu-header">
                                    <h6 class="dropdown-header m-0"><span class="grey darken-2">Notifications</span></h6><span class="notification-tag badge badge-danger float-right m-0">5 New</span>
                                </li>

                            </ul>
                        </li>
                        <li class="dropdown dropdown-user nav-item">
                            <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <span class="mr-1 user-name text-bold-700">{{Auth::user()->name}}</span>
                                <span class="avatar avatar-online">
                                    <img src="../../../app-assets/images/portrait/small/avatar-s-19.png" alt="avatar">
                                    <i></i>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{ route('user.show', Auth::user()->id) }}">
                                    <i class="material-icons">person</i> Edit Profile
                                </a>
                                <a class="dropdown-item" href="{{ route('setting.index') }}">
                                    <i class="material-icons">settings</i> Settings
                                </a>
                                <div class="dropdown-divider">
                                    <!--  -->
                                </div>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="material-icons">power_settings_new</i>
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->

    <div class="main-menu material-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="user-profile">
            <div class="user-info text-center pb-2"><img class="user-img img-fluid rounded-circle w-25 mt-2" src="../../../app-assets/images/portrait/medium/avatar-m-1.png" alt="" />
                <div class="name-wrapper d-block dropdown mt-1"><a class="white dropdown-toggle" id="user-account" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="user-name">{{ Auth::user()->name }}</span></a>
                    <div class="text-light">{{ Auth::user()->email }}</div>
                    <div class="dropdown-menu arrow" aria-labelledby="dropdownMenuLink"><a class="dropdown-item"><i class="material-icons align-middle mr-1">person</i><span class="align-middle">Profile</span></a><a class="dropdown-item"><i class="material-icons align-middle mr-1">message</i><span class="align-middle">Messages</span></a><a class="dropdown-item"><i class="material-icons align-middle mr-1">attach_money</i><span class="align-middle">Balance</span></a><a class="dropdown-item"><i class="material-icons align-middle mr-1">settings</i><span class="align-middle">Settings</span></a><a class="dropdown-item"><i class="material-icons align-middle mr-1">power_settings_new</i><span class="align-middle">Log Out</span></a></div>
                </div>
            </div>
        </div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="nav-item {{ (Request::is('home') ? 'active' : '') }}">
                    <a class="menu-item" href="{{ route('home') }}">
                        <i class="material-icons">settings_input_svideo</i>
                        Dashboard
                    </a>
                </li>
                @if(auth::user()->can('View_Region'))
                <li class="nav-item {{ (Request::is('admin/regions') ? 'active' : '') }}
                                    {{ (Request::is('admin/region/create') ? 'active' : '') }}
                                    {{ (Request::is('admin/region/'.request()->route('id').'/edit') ? 'active' : '') }}">
                    <a class="menu-item" href="{{ route('region.index') }}">
                        <i class="material-icons">place</i>
                        Regions
                    </a>
                </li>
                @endif
                @if(auth::user()->can('View_Hood'))
                <li class="nav-item {{ (Request::is('admin/hoods') ? 'active' : '') }}
                                    {{ (Request::is('admin/hood/create') ? 'active' : '') }}
                                    {{ (Request::is('admin/hood/'.request()->route('id').'/edit') ? 'active' : '') }}">
                    <a class="menu-item" href="{{ route('hood.index') }}">
                        <i class="material-icons">home</i>
                        Hoods
                    </a>
                </li>
                @endif
                @if(auth::user()->can('View_Categories'))
                <li class="nav-item {{ (Request::is('admin/categories') ? 'active' : '') }}
                                    {{ (Request::is('admin/category/'.request()->route('id').'/edit') ? 'active' : '') }}
                                    {{ (Request::is('admin/category/create') ? 'active' : '') }}">
                    <a class="menu-item" href="{{ route('category.index') }}">
                        <i class="material-icons">category</i>
                        Categories
                    </a>
                </li>
                @endif
                @if(auth::user()->can('View_Battles'))
                <li class="nav-item {{ (Request::is('admin/battles') ? 'active' : '') }}
                                    {{ (Request::is('admin/battle/'.request()->route('id').'/edit') ? 'active' : '') }}
                                    {{ (Request::is('admin/battle/create') ? 'active' : '') }}">
                    <a class="menu-item" href="{{ route('battle.index') }}">
                        <i class="material-icons">compare</i>
                        Battles
                    </a>
                </li>
                @endif
                @if(auth::user()->can('View_Interest_Groups'))
                <li class="nav-item {{ Request::is('admin/interest_groups') ? 'active' : '' }}
                                    {{ Request::is('admin/interest_group/create') ? 'active' : '' }}
                                    {{ Request::is('admin/interest_group/'.request()->route('id').'/edit') ? 'active' : '' }}">
                    <a class="menu-item" href="{{ route('interest_group.index') }}">
                        <i class="material-icons">group_work</i>
                        Interest Groups
                    </a>
                </li>
                @endif
                @if(auth::user()->can('View_Activities'))
                <li class="nav-item {{ Request::is('admin/activities') ? 'active' : '' }}
                                    {{ Request::is('admin/activity/create') ? 'active' : '' }}
                                    {{ Request::is('admin/activity/'.request()->route('id').'/edit') ? 'active' : '' }}">
                    <a class="menu-item" href="{{ route('activity.index') }}">
                        <i class="material-icons">local_activity</i>
                        Activities
                    </a>
                </li>
                @endif
                @if(auth::user()->can('View_Service'))
                <li class="nav-item {{ (Request::is('admin/services') ? 'active' : '') }}
                                    {{ (Request::is('admin/service/create') ? 'active' : '') }}
                                    {{ (Request::is('admin/service/'.request()->route('id').'/edit') ? 'active' : '') }}">
                    <a class="menu-item" href="{{ route('service.index') }}">
                        <i class="material-icons">settings_overscan</i>
                        Services
                    </a>
                </li>
                @endif
                @if(auth::user()->can('View_Team'))
                <li class="nav-item {{ (Request::is('admin/teams') ? 'active' : '') }}
                                    {{ (Request::is('admin/team/create') ? 'active' : '') }}
                                    {{ (Request::is('admin/team/'.request()->route('id').'/edit') ? 'active' : '') }}">
                    <a class="menu-item" href="{{ route('team.index') }}">
                        <i class="material-icons">people</i>
                        Teams
                    </a>
                </li>
                @endif
                @if(auth::user()->can('View_Lost_And_Found'))
                <li class="nav-item {{ (Request::is('admin/lost_and_founds') ? 'active' : '') }}
                                    {{ (Request::is('admin/lost_and_found/create') ? 'active' : '') }}
                                    {{ (Request::is('admin/lost_and_found/'.request()->route('id').'/edit') ? 'active' : '') }}">
                    <a class="menu-item" href="{{ route('lost_and_found.index') }}">
                        <i class="material-icons">find_replace</i>
                        Lost And Found
                    </a>
                </li>
                @endif
                @if(auth::user()->can('View_Permission') OR auth::user()->can('View_Role') OR auth::user()->can('View_User'))
                <li class="nav-item">
                    <a href="#"><i class="material-icons">accessibility</i><span class="menu-title" data-i18n="nav.invoice.main">User Management</span></a>
                    <ul class="menu-content">
                        @if(auth::user()->can('View_Permission'))
                        <li class="{{(Request::is('admin/permissions') ? 'active' : '')}}
                                    {{(Request::is('admin/permission/'.request()->route('id').'/edit') ? 'active' : '')}}
                                    {{ (Request::is('admin/permission/create') ? 'active' : '') }}"><a class="menu-item" href="{{ route('permission.index') }}">Permissions</a>
                        </li>
                        @endif
                        @if(auth::user()->can('View_Role'))
                        <li class="{{(Request::is('admin/roles') ? 'active' : '')}}
                                    {{ (Request::is('admin/role/'.request()->route('id').'/edit') ? 'active' : '') }}
                                    {{ (Request::is('admin/role/create') ? 'active' : '') }}"><a class="menu-item" href="{{ route('role.index') }}">Roles</a>
                        </li>
                        @endif
                        @if(auth::user()->can('View_User'))
                        <li class="{{(Request::is('admin/users') ? 'active' : '')}}
                                    {{ (Request::is('admin/user/create') ? 'active' : '') }}
                                    {{ (Request::is('admin/user/'.request()->route('id').'/edit') ? 'active' : '') }}"><a class="menu-item" href="{{ route('user.index') }}">Users</a>
                        </li>
                        @endif
                    </ul>
                </li>
                @endif
            </ul>
        </div>
    </div>

    <!-- END: Main Menu-->
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-header row">
        </div>
        @yield('content')
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer fixed-bottom footer-light navbar-border navbar-shadow">
        <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2019 <a class="text-bold-800 grey darken-2" href="{{ url('/') }}" target="_blank">HoodChampions</a></p>
    </footer>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/material-vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{ asset('app-assets/js/core/app.js')}}"></script>
    <!-- END: Theme JS-->
    @yield('script')
</body>
<!-- END: Body-->

</html>
