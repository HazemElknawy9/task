<style>
    .page-sidebar .page-sidebar-menu>li.active.open>a, .page-sidebar .page-sidebar-menu>li.active>a, .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover .page-sidebar-menu>li.active.open>a, .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover .page-sidebar-menu>li.active>a {
        background: #32c5d2;
    }

    .page-sidebar .page-sidebar-menu>li.active.open>a>.selected, .page-sidebar .page-sidebar-menu>li.active>a>.selected, .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover .page-sidebar-menu>li.active.open>a>.selected, .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover .page-sidebar-menu>li.active>a>.selected {

            border-right: 8px solid #32c5d2;
        }
</style>

<div class="page-sidebar-wrapper">
   
    <div class="page-sidebar navbar-collapse collapse">
      
        <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-closed" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                        <li class="sidebar-toggler-wrapper hide">
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <div class="sidebar-toggler"> </div>
                            <!-- END SIDEBAR TOGGLER BUTTON -->
                        </li>
                        <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
                        <li class="sidebar-search-wrapper">
                            <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                            <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
                            <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
                            <form class="sidebar-search  " action="#">
                                <a href="javascript:;" class="remove">

                                    <!-- <i class="icon-close"></i> -->
                                </a>
                                <div class="input-group">
                                    <input style="text-align: center; font-weight: bold;" type="text" disabled class="form-control" placeholder="لوجة التحكم">
                                    <span class="input-group-btn">
                                        <a href="#" class="btn submit">
                                            <i class="fa fa-dashboard"></i>
                                        </a>
                                    </span>
                                </div>
                            </form>
                            <!-- END RESPONSIVE QUICK SEARCH FORM -->
                        </li>
                        <li class="nav-item start active open">
                            <a href="{{asset('/dashboard')}}" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="title">الرئيسية</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <li class="heading">
                            <h3 class="uppercase"></h3>
                        </li>
                        <li class="nav-item  ">
                            <a href="{{asset('dashboard/settings')}}" class="nav-link nav-toggle">
                                <i class="icon-settings"></i>
                                <span class="title">اعدادت الموقع</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="{{asset('dashboard/roles/site')}}" class="nav-link nav-toggle">
                                <i class="icon-lock"></i>
                                <span class="title">صلاحيات الموقع</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-users"></i>
                                <span class="title">إدارة المستخدمين</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="{{asset('dashboard/roles')}}" class="nav-link ">
                                        <i class="fa fa-list"></i>
                                        <span class="title">عرض انوع المستخدمين</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="{{asset('dashboard/roles/create')}}" class="nav-link ">
                                        <i class="fa fa-plus"></i>
                                        <span class="title">إضافة مستخدم جديد</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-user-follow"></i>
                                <span class="title">إدارة المستخدمين</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="{{asset('dashboard/users')}}" class="nav-link ">
                                        <i class="fa fa-list"></i>
                                        <span class="title">عرض المستخدمين</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="{{asset('dashboard/users/create')}}" class="nav-link ">
                                        <i class="fa fa-plus"></i>
                                        <span class="title">إضافة مستخدم</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-sitemap"></i>
                                <span class="title">الأقسام</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="{{asset('dashboard/categories')}}" class="nav-link ">
                                        <i class="fa fa-list"></i>
                                        <span class="title">عرض الأقسام</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="{{asset('dashboard/categories')}}" class="nav-link ">
                                        <i class="fa fa-plus"></i>
                                        <span class="title">إضافة الأقسام</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-layers"></i>
                                <span class="title">المنتجات</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="{{asset('dashboard/products?category_id')}}" class="nav-link ">
                                        <i class="fa fa-list"></i>
                                        <span class="title">عرض المنتجات</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="{{asset('dashboard/products/create')}}" class="nav-link ">
                                        <i class="fa fa-plus"></i>
                                        <span class="title">إضافة المنتجات</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-emoticon-smile"></i>
                                <span class="title">العملاء</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="{{asset('dashboard/clients')}}" class="nav-link ">
                                        <i class="fa fa-list"></i>
                                        <span class="title">عرض العملاء</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="{{asset('dashboard/clients')}}" class="nav-link ">
                                        <i class="fa fa-plus"></i>
                                        <span class="title">إضافة العملاء</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-basket-loaded"></i>
                                <span class="title">الطلبات</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="{{asset('dashboard/orders')}}" class="nav-link ">
                                        <i class="fa fa-list"></i>
                                        <span class="title">عرض الطلبات</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="{{asset('dashboard/orders')}}" class="nav-link ">
                                        <i class="fa fa-plus"></i>
                                        <span class="title">تعديل الطلبات</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
    </div>
    <!-- END SIDEBAR -->
</div>