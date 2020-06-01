<div class="page-header navbar navbar-fixed-top">
<style>
    .page-header.navbar {
        background-color: #8A42A8;
    }
    .page-header.navbar .page-logo .logo-default {
        margin: 0px -20px 0;
        width: 235px;
        height: 48px;
    }
    .page-header.navbar .menu-toggler.sidebar-toggler {
        float: left;
        margin: 12px -45px 0;
    }
    .page-header.navbar .top-menu .navbar-nav>li.dropdown-language>.dropdown-toggle>.langname, .page-header.navbar .top-menu .navbar-nav>li.dropdown-user>.dropdown-toggle>.username, .page-header.navbar .top-menu .navbar-nav>li.dropdown-user>.dropdown-toggle>i{
        color: black;
    }
    .page-sidebar-closed.page-sidebar-closed-hide-logo .page-header.navbar .page-logo {
        padding: 0;
        width: 45px;
        border: 1px solid #F2F3F8;
    }
    .page-header.navbar .top-menu .navbar-nav>li.dropdown .dropdown-toggle:hover, .page-header.navbar .top-menu .navbar-nav>li.dropdown.open .dropdown-toggle{
        background-color: #F2F3F8;
    }
</style>
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="{{asset('/dashboard')}}">
                        <img src="{{asset('dashboard_files/theme_rtl')}}/img/logo.png" alt="logo" class="logo-default" /> </a>
                    <div class="menu-toggler sidebar-toggler"> </div>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        <!-- BEGIN NOTIFICATION DROPDOWN -->
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img alt="" class="img-circle" src="{{ auth()->user()->image_path }}" />
                                <span style="font-weight: bold;" class="username username-hide-on-mobile"> {{ auth()->user()->name }} </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="{{ route('dashboard.profiles.edit', auth()->user()->id) }}">
                                        <i class="icon-user"></i> الملف الشخصي </a>
                                </li>
                                <li class="divider"> </li>
                                <!-- <li>
                                    <a href="page_user_lock_1.html">
                                        <i class="icon-lock"></i>قفل لوحة التحكم </a>
                                </li> -->
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        <i class="icon-key"></i> تسجيل الخروج </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-quick-sidebar-toggler" title="الخروج">
                            <a href="{{ route('logout') }}" class="dropdown-toggle" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                <i class="icon-logout"></i>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                        <!-- END QUICK SIDEBAR TOGGLER -->
                    </ul>
                </div>
                <!-- END TOP NAVIGATION MENU -->
            </div>
            <!-- END HEADER INNER -->
</div>