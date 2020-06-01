@extends('layouts.dashboard.app')
@section('title','اضافة مستخدم')
@push('css')
<link href="{{asset('dashboard_files/theme_rtl')}}/spinner.css" rel="stylesheet" type="text/css" />
<link href="{{asset('dashboard_files/theme_rtl')}}/style.css" rel="stylesheet" type="text/css" />
<link href="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
<link href="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css" rel="stylesheet" type="text/css" />
<style>
  .loader {
      border: 5px solid #f3f3f3;
      border-radius: 50%;
      border-top: 5px solid #367FA9;
      width: 60px;
      height: 60px;
      -webkit-animation: spin 1s linear infinite; /* Safari */
      animation: spin 1s linear infinite;
  }
</style>
@endpush
@section('content')

<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
              <li>
                <a href="{{asset('dashboard')}}">الرئيسية</a>
                <i class="fa fa-angle-double-left"></i>
              </li>
              <li>
                <a href="{{asset('dashboard/users')}}">المستخدمين</a>
                <i class="fa fa-angle-double-left"></i>
              </li>
              <li>
                  <span>أضف</span>
              </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
          <h3 class="page-title"> 
              
          </h3>

        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="hidden-print col-md-6">
                <div class="portlet light bordered">
                    <div class="box box-primary">
                      <div class="box-body">
                          @if ($orders->count() > 0)
                            <div class="row">
                              <div class="col-md-12">
                                  <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                      <div class="loading hidden">Loading&#8230;</div>
                                      <div class="portlet-body">
                                          <div class="table-toolbar">
                                              <div class="row">
                                                  <div class="col-md-12">
                                                      <div class="box-header">
                                                        <h3 class="box-title" style="margin-bottom: 10px">@lang('site.orders')</h3>
                                                         <form action="{{url('dashboard/orders')}}" method="get">

                                                          <div class="row">

                                                              <div class="col-md-8">
                                                                  <input type="text" name="search" class="form-control" placeholder="@lang('site.search')" value="{{ request()->search }}">
                                                              </div>

                                                              <div class="col-md-4">
                                                                  <button type="submit" class="btn sbold green"><i class="fa fa-search"></i> @lang('site.search')</button>
                                                                  @if(!empty($_GET['search']))
                                                                    <a href="{{ route('dashboard.orders.index') }}" class="btn sbold green"><i class="icon-action-undo"></i> العودة</a>
                                                                  @endif
                                                              </div>

                                                          </div>
                                                      </form><!-- end of form -->

                                                    </div><!-- end of box header -->
                                                  </div> 
                                              </div>
                                          </div>

                                          <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample">
                                              <thead>
                                                  <tr>
                                                    <th>م</th>
                                                    <th>@lang('site.name')</th>
                                                    <th>@lang('site.price')</th>
                                                    <th>@lang('site.create')</th>
                                                    <th>@lang('site.action')</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                                @foreach ($orders as $index=>$order)
                                                    <tr>
                                                        <td>{{ $index + 1 }}</td>
                                                        <td>{{$order->client->name}}</td>
                                                        <td>{{$order->total_price}}</td>
                                                        <td>{{$order->created_at->toFormattedDateString()}} - {{$order->created_at->diffForHumans()}}</td>
                                                        <td>
                                                            <button class="btn btn-primary btn-sm order-products"
                                                              data-url="{{ route('dashboard.orders.products', $order->id) }}"
                                                              data-method="get">
                                                              <i class="fa fa-list"></i>
                                                              @lang('site.show')
                                                            </button>
                                                            <a href="{{ route('dashboard.clients.orders.edit', ['client' => $order->client->id, 'order' => $order->id]) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> @lang('site.edit')</a>
                                                            <form action="{{ route('dashboard.orders.destroy', $order->id) }}" method="post" style="display: inline-block">
                                                                {{ csrf_field() }}
                                                                {{ method_field('delete') }}
                                                                <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i> @lang('site.delete')</button>
                                                            </form><!-- end of form -->
                                                        </td>
                                                    </tr>
                                                
                                                @endforeach
                                              </tbody>
                                          </table>
                                          
                                      </div>
                                  <!-- END EXAMPLE TABLE PORTLET-->
                              </div>
                          </div>
                      
                         {{ $orders->appends(request()->query())->links() }}
                      
                  @else
                      
                      <h2>@lang('site.no_data_found')
                        @if(!empty($_GET['search']))
                          <a href="{{ route('dashboard.orders.index') }}" class="btn sbold green"><i class="icon-action-undo"></i> العودة</a>
                        @endif  
                      </h2> 
                  @endif

                      </div><!-- end of box body -->

                  </div><!-- end of box -->
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-primary">

                  <div class="box-header">

                      <h3 class="box-title">@lang('site.orders')</h3>

                  </div><!-- end of box header -->

                  <div class="box-body">
                      <div style="display: none; flex-direction: column; align-items: center;" id="loading">
                          <div class="loader"></div>
                          <p style="margin-top: 10px">@lang('site.loading')</p>
                      </div>
                      <div id="order-product-list">
                      </div><!-- end of order product list -->

                  </div><!-- end of box body -->

              </div><!-- end of box -->
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>
@endsection
@push('js')
<script src="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script> 
<script src="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/printThis.js" type="text/javascript"></script>
<script>
  //list all order products
    $('.order-products').on('click', function(e) {

        e.preventDefault();

        $('#loading').css('display', 'flex');
        
        var url = $(this).data('url');
        var method = $(this).data('method');
        $.ajax({
            url: url,
            method: method,
            success: function(data) {
                $('#loading').css('display', 'none');
                $('#order-product-list').empty();
                $('#order-product-list').append(data);

            }
        })

    });//end of order products click

    $(document).on('click','.print-btn', function() {
        $('#print-area').printThis();
    });
</script>
@endpush
