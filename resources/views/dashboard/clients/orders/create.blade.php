@extends('layouts.dashboard.app')
@section('title','اضافة مستخدم')
@push('css')
<link href="{{asset('dashboard_files/theme_rtl')}}/spinner.css" rel="stylesheet" type="text/css" />
<link href="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/icheck/skins/all.css" rel="stylesheet" type="text/css" />
<link href="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
<link href="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/bootstrap-select/css/bootstrap-select-rtl.min.css" rel="stylesheet" type="text/css" />
<link href="{{asset('dashboard_files/theme_rtl')}}/style.css" rel="stylesheet" type="text/css" />
<link href="{{asset('dashboard_files/theme_rtl')}}/blog-rtl.min.css" rel="stylesheet" type="text/css" />
<style>
  .blog-content-1 .blog-post-content {
    padding: 0px 20px 0px;
    background-color: #fff;
  }
  .blog-content-1 .blog-post-sm>.blog-img-thumb {
    height: 121px;
  }

  .blog-content-1 .blog-post-content>.blog-post-title>a {
    font-size: 16px;
  }
 .blog-content-1 .blog-post-sm>.blog-post-content>.blog-post-title {
    margin: 0 0 0px;
  }
  .portlet>.portlet-body p {
    margin-top: 0;
    margin-bottom: 10px;
 }
 .btn {
    outline: 0!important;
    display: block;
 }
  .img-responsive, .img-thumbnail, .table, label {
    max-width: 106%;
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
                        <div style="margin-right: -7px;" class="col-md-8">
                            <div class="loading hidden">Loading&#8230;</div>
                            <div class="portlet light bordered">
                                <div class="portlet-body">
                                    <ul class="nav nav-pills">
                                      @foreach($categories as $key => $value)
                                        <li @if($key == 0) class="active" @endif>
                                          <a class="lolo" id="{{$value->id}}" href="#tab_{{$value->id}}" data-toggle="tab">{{$value->name}} </a>
                                        </li>
                                      @endforeach      
                                    </ul>
                                    <hr>
                                    <div class="tab-content">
                                      @foreach($categories as $keys => $value)
                                          <div class="tab-pane fade{{$value->id}} @if($keys == 0)home active in @endif" id="#tab_{{$value->id}}">
                                            <div class="blog-page blog-content-1">
                                              <div class="row">
                                                <div class="col-lg-12">
                                                  <div class="row">
                                                    @foreach($value->products as $key => $pro)
                                                      <div style="position: relative;min-height: 1px;padding-right: 5px;padding-left: 5px;" class="col-sm-2">
                                                          <div style="height: 223px;" class="blog-post-sm bordered blog-container">
                                                              <div class="blog-img-thumb">
                                                                  <a href="javascript:;">
                                                                      <img src="{{ URL::to('/') }}/storage/products_images/{{$pro->image}}" />
                                                                  </a>
                                                              </div>
                                                              <div style="height: 44px;" class="blog-post-content">
                                                                  <h6 style="font-size: 13px !important;font-weight: bold;" class="blog-title blog-post-title">
                                                                      {{$pro->name}}
                                                                  </h6>
                                              
                                                              </div>
                                                              <div style="height: 38px;" class="blog-post-content">
                                                                  
                                                                  <p>
                                                                      {{$pro->sale_price}} جنيه
                                                                      <a href=""
                                                                     id="product-{{ $pro->id }}"
                                                                     data-name="{{ $pro->name }}"
                                                                     data-id="{{ $pro->id }}"
                                                                     data-price="{{ $pro->sale_price }}"
                                                                     data-stock="{{ $pro->stock }}"
                                                                     class="btn btn-success btn-sm add-product-btn">
                                                                      <i class="fa fa-plus"></i>
                                                                  </a>
                                                                  </p>
                                                                  
                                                              </div>
                                                          </div>
                                                      </div>
                                                    @endforeach
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                      @endforeach 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="margin-right: -8px;" class="col-md-4">
                          <div class="portlet light bordered">
                             

                                @include('partials._errors')
                                <form action="{{ route('dashboard.clients.orders.store', $client->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('post') }}
                                <table style="width: 106%;" class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>@lang('site.product')</th>
                                        <th>@lang('site.quantity')</th>
                                        <th>@lang('site.price')</th>
                                    </tr>
                                    </thead>

                                    <tbody class="order-list">


                                    </tbody>

                                </table><!-- end of table -->

                                <h4>الخصم: <input id="dicount" class="dicount" type="number" name="dicount"></h4>
                                <h4>@lang('site.total') : <span class="total-price">0</span></h4>
                                <div class="form-group">
                                  <label>إختر اسلوب الدفع</label>
                                    <div class="input-group">
                                        <div class="icheck-inline">
                                            <label>
                                              <input type="radio" name="payment_method" id="COD" value="COD" checked class="icheck"> كاش 
                                            </label>
                                            <label>
                                              <input type="radio" name="payment_method" id="Paypal" value="Paypal" class="icheck"> Paypal
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-block disabled" id="add-order-form-btn" onclick="return selectPaymentMethod();"><i class="fa fa-plus"></i> @lang('site.add_order')</button>

                            </form>
                          </div>
                          <div class="portlet light bordered">
                            @if ($client->orders->count() > 0)

                              <div class="box box-primary">

                                  <div class="box-header">

                                      <h3 class="box-title" style="margin-bottom: 10px">@lang('site.previous_orders')
                                          <small>{{ $orders->total() }}</small>
                                      </h3>

                                  </div><!-- end of box header -->

                                  <div class="box-body">

                                      @foreach ($orders as $order)

                                          <div class="panel-group">

                                              <div class="panel panel-success">

                                                  <div class="panel-heading">
                                                      <h4 class="panel-title">
                                                          <a data-toggle="collapse" href="#{{ $order->created_at->format('d-m-Y-s') }}">{{ $order->created_at->toFormattedDateString() }}</a>
                                                      </h4>
                                                  </div>

                                                  <div id="{{ $order->created_at->format('d-m-Y-s') }}" class="panel-collapse collapse">

                                                      <div class="panel-body">

                                                          <ul class="list-group">
                                                              @foreach ($order->products as $product)
                                                                  <li class="list-group-item">{{ $product->name }}</li>
                                                              @endforeach
                                                          </ul>

                                                      </div><!-- end of panel body -->

                                                  </div><!-- end of panel collapse -->

                                              </div><!-- end of panel primary -->

                                          </div><!-- end of panel group -->

                                      @endforeach

                                      {{ $orders->links() }}

                                  </div><!-- end of box body -->

                              </div><!-- end of box -->

                          @endif
                          </div>
                        </div>
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
@endsection
@push('js')
 
<script src="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<script src="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/icheck/icheck.min.js" type="text/javascript"></script>
<script src="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
<script src="{{asset('dashboard_files/theme_rtl')}}/assets/pages/scripts/components-bootstrap-select.min.js" type="text/javascript"></script>
<script src="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/jquery.number.min.js" type="text/javascript"></script>
<script>
  $(document).on('click', '.lolo', function(){
    user_id = $(this).attr('id');
    //alert(user_id); 
    $('.tab-pane').removeClass('active in');
    $('.home').removeClass('active in');
    $('.fade'+ user_id).addClass('active in');
  });
</script>
<script>
  $(document).ready(function () {
    
    //add product btn
    $('.add-product-btn').on('click', function (e) {

        e.preventDefault();
        var name = $(this).data('name');
        var id = $(this).data('id');
        var stock = $(this).data('stock');
        var price = $.number($(this).data('price'), 2);
        

        $(this).removeClass('btn-success').addClass('btn-default disabled');
        
        var html =
            `<tr>
                <td>${name}</td>
                <td style="width: 90px"><input type="number" id="toto${id}" name="products[${id}][quantity]" data-price="${price}" class="form-control input-sm product-quantity" min="1" max="${stock}" value="1"></td>
                <td class="product-price">${price}</td>               
                <td><button class="btn btn-danger btn-sm remove-product-btn" data-id="${id}"><span class="fa fa-trash"></span></button></td>
            </tr>`;

        $('.order-list').append(html);
        var number = document.getElementById('toto'+id);

        // Listen for input event on numInput.
        number.onkeydown = function(e) {
          e.preventDefault();
            if(!((e.keyCode > stock && e.keyCode < 0))) {
                return false;
            }
        }
        //to calculate total price
        calculateTotal();
    });

    //disabled btn
    $('body').on('click', '.disabled', function(e) {

        e.preventDefault();

    });//end of disabled

    //remove product btn
    $('body').on('click', '.remove-product-btn', function(e) {

        e.preventDefault();
        var id = $(this).data('id');

        $(this).closest('tr').remove();
        $('#product-' + id).removeClass('btn-default disabled').addClass('btn-success');

        //to calculate total price
        calculateTotal();

    });//end of remove product btn

    //change product quantity
    $('body').on('keyup change', '.product-quantity', function() {

        var quantity = Number($(this).val()); //2
        var unitPrice = parseFloat($(this).data('price').replace(/,/g, '')); //150
        console.log(unitPrice);
        $(this).closest('tr').find('.product-price').html($.number(quantity * unitPrice, 2));
        calculateTotal();

    });//end of product quantity change

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

    //print order
    $(document).on('click', '.print-btn', function() {

        $('#print-area').printThis();

    });//end of click function

});//end of document ready

//calculate the total
function calculateTotal() {

    var price = 0;

    $('.order-list .product-price').each(function(index) {
        
        price += parseFloat($(this).html().replace(/,/g, ''));

    });//end of product price

    $('.total-price').html($.number(price, 2));

    $(document).on('change', '.dicount', function(){
     var id = $('#dicount').val();
      $('.total-price').html($.number(price-id, 2));
    
   });
    //check if price > 0
    if (price > 0) {

        $('#add-order-form-btn').removeClass('disabled')

    } else {

        $('#add-order-form-btn').addClass('disabled')

    }//end of else

}//end of calculate total

function selectPaymentMethod(){
  if($('#Paypal').is(':checked') || $('#COD').is(':checked')){
  }else{
    // alert("من فضلك اختر وسيلة دفع ");
    toastr.error("من فضلك اختر وسيلة دفع ",'خطأ',{
        closeButton:true,
        progressBar:true,
     });
    return false;
  }
}   
 
</script>
@endpush
