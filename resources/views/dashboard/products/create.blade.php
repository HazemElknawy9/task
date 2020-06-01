@extends('layouts.dashboard.app')
@section('title','إضافة المنتجات')
@push('css')
<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
<link href="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/bootstrap-select/css/bootstrap-select-rtl.min.css" rel="stylesheet" type="text/css" />
<style>

</style>
@endpush
@section('content')
<style>
    .btn {
        padding: 12px 12px;
        border-radius: 6px !important

    }

    .addVendor:hover{
        background-color: #3c3f72 !important;
        color: white !important;
    }
</style>    

<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{asset('dashboard')}}">الرئيسية</a>
                    <i class="fa fa-angle-double-left"></i>
                </li>
                <li>
                    <a href="{{asset('dashboard/products')}}">المنتجات</a>
                    <i class="fa fa-angle-double-left"></i>
                </li>
                <li>
                    <span>عرض</span>
                </li>
            </ul>
        </div>
        <h3 class="page-title">
        </h3>
        <div class="row">
            <div class="viewaddPro col-md-12 hidden">
                <!-- BEGIN S AMPLE FORM PORTLET-->
                <div style="border-radius: 9px !important;-webkit-box-shadow: 0 0 2rem 0 rgba(136,152,170,.15) !important;" class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-red-sunglo">
                            <i class="icon-plus"></i>
                            <span class="caption-subject bold uppercase"> إضافة فواتير الشراء</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        @include('partials._errors')
                    <form action="{{ route('dashboard.products.store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('post') }}
                           
                            <div class="form-body">
                               <div class="row">
                                    <div class="col-md-6">
                                        <i class="fa fa-user"></i>
                                        <label> الموردين <span style="color: red" class="required" aria-required="true"> * </span></label>
                                        <div id="selectVendor">
                                            @include('dashboard.products.vendor')
                                        </div>
                                    </div> 
                                    <div class="col-md-6">
                                        <i class="fa fa-folder"></i>
                                        <label> القسم <span style="color: red" class="required" aria-required="true"> * </span></label>
                                        <select  name="category_id" class="bs-select form-control input-lg" data-live-search="true" data-size="8">
                                            <option value="">@lang('site.all_categories')</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                   <!-- <div class="col-md-6">
                                        <div class="form-group">
                                            <label>الموردين <span class="required" aria-required="true"> * </span></label>
                                            <i class="fa fa-user"></i>
                                            <input type="text" class="form-control input-lg" placeholder=''> 
                                        </div>
                                    </div>  -->
                                    
                                </div> 
                                 <div class="row">
                                <div class="col-md-12">
                                    @include('dashboard.products.invoice')
                                </div>
                            </div>       
                            </div>
                            
                            <div class="form-actions">
                                <button type="submit" class="btn blue">حفظ</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="removaddPro col-md-12">
                <div class="portlet light bordered">
                    <div class="row">
                        <div class="col-md-6">
                            <p style="margin-top: 125px;font-size: 21px;" class="text-justify description">يمكن أن تكون الفواتير مرة واحدة أو متكررة. إنها تشير إلى ما تدين به للموردين للمنتجات أو الخدمات التي تشتريها.</p>
                            <button type="button" class="addPro btn btn-success"> إنشاء فواتير الشراء <i class="fa fa-plus"></i></button>
                        </div>
                        <div class="col-md-6">
                            <img style="width: 61%;margin-right: 95px;" src="{{asset('dashboard_files/theme_rtl')}}/bills.png">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- model -->
<div id="formModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div style="border-radius: 24px !important;" class="modal-content">
            <div class="modal-header">
               <h4 style="display: inline-block;" class="modal-title">Add New Record</h4>
               <button style="padding: 7px 12px; float: left; border-color: transparent;" type="button" class="btn dark btn-outline" data-dismiss="modal">X</button>
            </div>
            <div class="modal-body">
                <form method="post" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                        <div class="col-md-12">
                            <div class="loading hidden">Loading&#8230;</div>
                            <div style="border-radius: 9px !important;-webkit-box-shadow: 0 0 2rem 0 rgba(136,152,170,.15) !important;" class="portlet light">
                                <div class="portlet-body form">
                                        <div class="form-body">
                                           <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <i class="fa fa-user"></i>
                                                        <label>الاسم <span class="required" aria-required="true"> * </span></label>
                                                        <input type="text" name="name" id="name" required class="form-control input-lg" placeholder="إدخال الاسم"> 
                                                    </div>
                                                </div>
                                               
                                                <div style="margin-top: -1px;" class="col-md-6">
                                                    <div class="form-group">
                                                        <i class="fa fa-envelope"></i>
                                                        <label>البريد الإلكتروني <span class="required" aria-required="true"> * </span></label>
                                                        <input type="email" name="email" id="email" required class="form-control input-lg" placeholder='إدخال البريد الإلكتروني'> 
                                                    </div>
                                                </div> 
                                                
                                            </div>
                                            <div class="row">
                                                @for ($i = 0; $i < 2; $i++)
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <i class="fa fa-user"></i>
                                                            <label>رقم التليفون {{$i+1}} <span class="required" aria-required="true"> * </span></label>
                                                            <input type="text" name="phone[]" id="phone{{$i}}" required class="form-control input-lg" placeholder="إدخال رقم التليفون"> 
                                                        </div>
                                                    </div>
                                                @endfor
                                            </div> 
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>العنوان</label>
                                                        <textarea class="form-control" name="address" id="address" placeholder="إدخال العنوان" rows="3"></textarea>
                                                    </div>
                                                </div>
                                            </div>   
                                            <div class="row">
                                                <div class="col-md-12">
                                                  <div style="height: 122px;" class="form-group">
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div id="store_image" class="fileinput-new thumbnail">
                                                            </div>
                                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 100%; height: 112px;"> </div>
                                                            <div>
                                                                <span class="btn default btn-file">
                                                                    <span class="fileinput-new"> اختر الصورة </span>
                                                                    <span class="fileinput-exists"> تغير </span>
                                                                    <input type="file" name="image" id="image"> </span>
                                                                <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> حذف </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 

                                        </div>
                                </div>
                            </div>
                        </div>
                   </div> 
                   <br />
                   <div style="height: 0px" class="form-group" align="center">
                        <input type="hidden" name="action" id="action" />
                        <input type="hidden" name="hidden_id" id="hidden_id" />
                        <input style="margin-top: -26px;" type="submit" name="action_button" id="action_button" class="btn sbold green" value="Add" />
                   </div>
                </form>
            </div>
        </div>
    </div>
</div> 
@endsection
@push('js')
<script src="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
<script src="{{asset('dashboard_files/theme_rtl')}}/assets/pages/scripts/components-bootstrap-select.min.js" type="text/javascript"></script>
<script src="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<script src="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="jquery.invoice.js"></script>
<script>
    jQuery(document).ready(function(){
        jQuery().invoice({
            addRow : "#addRow",
            delete : ".delete",
            parentClass : ".item-row",

            price : ".price",
            qty : ".qty",
            total : ".total",
            totalQty: "#totalQty",

            subtotal : "#subtotal",
            discount: "#discount",
            shipping : "#shipping",
            grandTotal : "#grandTotal"
        });
    });
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<script>
$(document).ready(function(){
    $(document).on('click', '.addPro', function(){
      $('.viewaddPro').removeClass('hidden');
      $('.removaddPro').addClass('hidden');
    });

    $(document).on('click', '.addVendor', function(){    
        $('.modal-title').text("اضف مورد جديدة");
        $('#action_button').val("أضف");
        $('#action').val("Add");
        $('#formModal').modal('show');
    });
    $(document).on('click', '.pull-left', function(){    
        $('.btn-group bootstrap-select bs-select form-control input-lg').addClass('open');
    });
    /////////////////////////////////////// 

$('#sample_form').on('submit', function(event){
  event.preventDefault();
  if($('#action').val() == 'Add')
  {
   $.ajax({
    url:"{{ route('dashboard.vendors.store') }}",
    method:"POST",
    data: new FormData(this),
    contentType: false,
    cache:false,
    processData: false,
    dataType:"json",
    beforeSend:function(){
    $('.loading').removeClass('hidden');
   },
   success:function(data)
   {
      setTimeout(function(){
        $('#sample_form')[0].reset();
       $('#formModal').modal('hide');
       $('.loading').addClass('hidden');
          toastr.success(data.success, data.title);  
          loadComments();
      }, 2000);
   },error(response){
      $('.loading').addClass('hidden');
      var error_li = '';
      $.each(response.responseJSON.errors,function(index,value) {
        error_li +='<li>'+value+'</li>';
      });
      toastr.error(error_li,'خطأ',{
        closeButton:true,
        progressBar:true,
      });
    }
   })
  }

});

function loadComments(){
    $.ajax({
    url:'{{ url('dashboard/view/vendors') }}',    
    type:'get',
    success:function(data) {
      $('#selectVendor').html(data);
    }
  });
  }
});
</script>
<script>
    (function (jQuery) {
    $.opt = {};  // jQuery Object

    jQuery.fn.invoice = function (options) {
        var ops = jQuery.extend({}, jQuery.fn.invoice.defaults, options);
        $.opt = ops;

        var inv = new Invoice();
        inv.init();

        jQuery('body').on('click', function (e) {
            var cur = e.target.id || e.target.className;

            if (cur == $.opt.addRow.substring(1))
                inv.newRow();

            if (cur == $.opt.delete.substring(1))
                inv.deleteRow(e.target);

            inv.init();
        });

        jQuery('body').on('keyup', function (e) {
            inv.init();
        });

        return this;
    };
}(jQuery));

function Invoice() {
    self = this;
}

Invoice.prototype = {
    constructor: Invoice,

    init: function () {
        this.calcTotal();
        this.calcTotalQty();
        this.calcSubtotal();
        this.calcGrandTotal();
    },

    /**
     * Calculate total price of an item.
     *
     * @returns {number}
     */
    calcTotal: function () {
         jQuery($.opt.parentClass).each(function (i) {
             var row = jQuery(this);
             var total = row.find($.opt.price).val() * row.find($.opt.qty).val();

             total = self.roundNumber(total, 2);

             row.find($.opt.total).html(total);
         });

         return 1;
     },
    
    /***
     * Calculate total quantity of an order.
     *
     * @returns {number}
     */
    calcTotalQty: function () {
         var totalQty = 0;
         jQuery($.opt.qty).each(function (i) {
             var qty = jQuery(this).val();
             if (!isNaN(qty)) totalQty += Number(qty);
         });

         totalQty = self.roundNumber(totalQty, 2);

         jQuery($.opt.totalQty).html(totalQty);

         return 1;
     },

    /***
     * Calculate subtotal of an order.
     *
     * @returns {number}
     */
    calcSubtotal: function () {
         var subtotal = 0;
         jQuery($.opt.total).each(function (i) {
             var total = jQuery(this).html();
             if (!isNaN(total)) subtotal += Number(total);
         });

         subtotal = self.roundNumber(subtotal, 2);

         jQuery($.opt.subtotal).html(subtotal);

         return 1;
     },

    /**
     * Calculate grand total of an order.
     *
     * @returns {number}
     */
    calcGrandTotal: function () {
        var grandTotal = Number(jQuery($.opt.subtotal).html())
                       + Number(jQuery($.opt.shipping).val())
                       - Number(jQuery($.opt.discount).val());
        grandTotal = self.roundNumber(grandTotal, 2);

        jQuery($.opt.grandTotal).html(grandTotal);

        return 1;
    },

    /**
     * Add a row.
     *
     * @returns {number}
     */
    newRow: function () {
        jQuery(".item-row:last").after('<tr class="item-row"><td class="item-name"><div class="delete-btn"><input type="text" class="form-control item" placeholder="الاسم" name="name[]" type="text"><a class=' + $.opt.delete.substring(1) + ' href="javascript:;" title="Remove row">X</a></div></td><td><input class="form-control price" name="price[]" placeholder="السعر" type="text"> </td><td><input class="form-control qty" placeholder="الكمية" name="quantity[]" type="text"></td><td><span class="total">0.00</span></td></tr>');
        
        if (jQuery($.opt.delete).length > 0) {
            jQuery($.opt.delete).show();
        }

        return 1;
    },

    /**
     * Delete a row.
     *
     * @param elem   current element
     * @returns {number}
     */
    deleteRow: function (elem) {
        jQuery(elem).parents($.opt.parentClass).remove();

        if (jQuery($.opt.delete).length < 2) {
            jQuery($.opt.delete).hide();
        }

        return 1;
    },

    /**
     * Round a number.
     * Using: http://www.mediacollege.com/internet/javascript/number/round.html
     *
     * @param number
     * @param decimals
     * @returns {*}
     */
    roundNumber: function (number, decimals) {
        var newString;// The new rounded number
        decimals = Number(decimals);

        if (decimals < 1) {
            newString = (Math.round(number)).toString();
        } else {
            var numString = number.toString();

            if (numString.lastIndexOf(".") == -1) {// If there is no decimal point
                numString += ".";// give it one at the end
            }

            var cutoff = numString.lastIndexOf(".") + decimals;// The point at which to truncate the number
            var d1 = Number(numString.substring(cutoff, cutoff + 1));// The value of the last decimal place that we'll end up with
            var d2 = Number(numString.substring(cutoff + 1, cutoff + 2));// The next decimal, after the last one we want

            if (d2 >= 5) {// Do we need to round up at all? If not, the string will just be truncated
                if (d1 == 9 && cutoff > 0) {// If the last digit is 9, find a new cutoff point
                    while (cutoff > 0 && (d1 == 9 || isNaN(d1))) {
                        if (d1 != ".") {
                            cutoff -= 1;
                            d1 = Number(numString.substring(cutoff, cutoff + 1));
                        } else {
                            cutoff -= 1;
                        }
                    }
                }

                d1 += 1;
            }

            if (d1 == 10) {
                numString = numString.substring(0, numString.lastIndexOf("."));
                var roundedNum = Number(numString) + 1;
                newString = roundedNum.toString() + '.';
            } else {
                newString = numString.substring(0, cutoff) + d1.toString();
            }
        }

        if (newString.lastIndexOf(".") == -1) {// Do this again, to the new string
            newString += ".";
        }

        var decs = (newString.substring(newString.lastIndexOf(".") + 1)).length;

        for (var i = 0; i < decimals - decs; i++)
            newString += "0";
        //var newNumber = Number(newString);// make it a number if you like

        return newString; // Output the result to the form field (change for your purposes)
    }
};

/**
 *  Publicly accessible defaults.
 */
jQuery.fn.invoice.defaults = {
    addRow: "#addRow",
    delete: ".delete",
    parentClass: ".item-row",

    price: ".price",
    qty: ".qty",
    total: ".total",
    totalQty: "#totalQty",

    subtotal: "#subtotal",
    discount: "#discount",
    shipping: "#shipping",
    grandTotal: "#grandTotal"
};
</script>
@endpush

