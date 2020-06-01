@extends('layouts.dashboard.app')
@section('title','الرئيسية')
@push('css')
<link href="{{asset('dashboard_files/theme_rtl')}}/assets/global/css/morris.css" rel="stylesheet" type="text/css" />
<style>
    .dashboard-stat.blue .visual>i {
    color: #FFF;
    opacity: 0.4;
    filter: alpha(opacity=10);
}
</style>
@endpush
@section('content')

    
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="{{asset('dashboard')}}">الرئيسية</a>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <h3 class="page-title">
        </h3>
        <!-- BEGIN DASHBOARD STATS 1-->
        @if(Session::has('flash_message_error'))
              <div style="color: white;background: red;" class="alert alert-error alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{!! session('flash_message_error') !!}</strong>
             </div>
          @endif

          @if(Session::has('flash_message_success'))
              <div style="color: white;background: green;" class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{!! session('flash_message_success') !!}</strong>
             </div>
        @endif
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat blue">
                    <div class="visual">
                        <i style="margin-right: -4px;" class="icon-users"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="1349">{{$users}}</span>
                        </div>
                        <div class="desc"> الموردين</div>
                    </div>
                    <a style="font-size: 20px;" class="more" href="{{asset('dashboard/users')}}"> عرض
                        <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat red">
                    <div class="visual">
                        <i style="margin-right: -4px;" class="fa fa-sitemap"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="12,5"></span>{{$categories}}</div>
                        <div class="desc"> الأقسام </div>
                    </div>
                    <a style="font-size: 20px;" class="more" href="{{asset('dashboard/categories')}}"> عرض
                        <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat yellow">
                    <div class="visual">
                        <i style="margin-right: -4px;" class="icon-briefcase"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="12,5"></span>{{$products}}</div>
                        <div class="desc"> المنتجات </div>
                    </div>
                    <a style="font-size: 20px;" class="more" href="{{asset('dashboard/products?category_id=')}}"> عرض
                        <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat green">
                    <div class="visual">
                        <i style="margin-right: -4px;" class="fa fa-shopping-cart"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="549">{{$orders}}</span>
                        </div>
                        <div class="desc"> الطلبات </div>
                    </div>
                    <a style="font-size: 20px;" class="more" href="{{asset('dashboard/orders')}}"> عرض
                        <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat purple">
                    <div class="visual">
                        <i style="margin-right: -4px;" class="icon-user-following"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="89"></span>{{$clients}}</div>
                        <div class="desc"> العملاء </div>
                    </div>
                    <a style="font-size: 20px;" class="more" href="{{asset('dashboard/clients')}}"> عرض
                        <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 ">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-red-sunglo">
                            <i class="icon-pie-chart"></i>
                            <span class="caption-subject bold uppercase"> المبيعات الشهرية</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                       <div class="chart" id="line-chart" style="height: 250px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>

@endsection
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/morris.min.js" type="text/javascript"></script>

<script>
    //line chart
    var line = new Morris.Line({
        element: 'line-chart',
        resize: true,
        data: [
            @foreach ($sales_data as $data)
            {
                ym: "{{ $data->year }}-{{ $data->month }}", sum: "{{ $data->sum }}"
            },
            @endforeach
        ],
        xkey: 'ym',
        ykeys: ['sum'],
        labels: ['@lang('site.total')'],
        lineWidth: 2,
        hideHover: 'auto',
        gridStrokeWidth: 0.4,
        pointSize: 4,
        gridTextFamily: 'Open Sans',
        gridTextSize: 10
    });
</script>

@endpush

