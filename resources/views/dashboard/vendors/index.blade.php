@extends('layouts.dashboard.app')
@section('title','الموردين')
@push('css')
<link href="{{asset('dashboard_files/theme_rtl')}}/spinner.css" rel="stylesheet" type="text/css" />
<link href="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
<link href="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css" rel="stylesheet" type="text/css" />
<link href="{{asset('dashboard_files/theme_rtl')}}/style.css" rel="stylesheet" type="text/css" />
<link href="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />

@endpush

@section('content')
<style>
  .badge{
    font-size: 13px!important;
  }

  .label {
    letter-spacing: 0.05em;
    border-radius: 9px !important;
    padding: 10px 18px 12px;
    font-weight: 500;
    margin-top: 0px !important;
    display: block;
    width: 58px;
  }
  .fileinput {
    margin-right: 0px;
}
</style>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{asset('dashboard')}}">الرئيسية</a>
                    <i class="fa fa-angle-double-left"></i>
                </li>
                
                <li>
                    <span>عرض</span>
                </li>
            </ul>
        </div>
        <h3 class="page-title"> 
            العملاء
        </h3>

        <div class="row">
          
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div style="border-radius: 15px !important;" class="portlet light bordered">
                    <div class="loading hidden">Loading&#8230;</div>
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                      <button type="button" name="create_record" id="create_record" class="btn sbold green"> <i class="fa fa-plus"></i> اضافة مورد جديد</button>
                                    </div>
                                </div> 
                            </div>
                        </div>

                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample">
                            <thead>
                                <tr>
                                  <th style="max-width: 100%;">
                                      <button type="button" name="bulk_delete" id="bulk_delete" class="btn btn-danger"><i class="fa fa-trash"></i></button> 
                                  </th>
                                  <th>الصورة</th>
                                  <th>الاسم</th>
                                  <th>التلفون</th>
                                  <th>الإيميل</th>
                                  <th>العنوان</th>
                                  <th>حالة القسم</th>
                                  <th>تفعيل / تجميد</th>
                                  <th>العمليات</th>
                                </tr>
                                <tr>
                                  <td> </td>
                                  <td>  </td>
                                  <td ></td>
                                  <td>  </td>
                                  <td>  </td>
                                  <td>  </td>
                                  <td>  </td>
                                  <td>  </td>
                                  <td>  </td>
                                </tr>
                            </thead>
                        </table>
                        
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
        
    </div>
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
         <span id="form_result"></span>
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
<script src="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<script src="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
<script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
<script src="{{asset('dashboard_files/theme_rtl')}}/assets/pages/scripts/components-bootstrap-switch.min.js" type="text/javascript"></script>
<script>

$(document).ready(function(){

 $('#sample').DataTable({
  processing: true,
  serverSide: true,
  ajax:{
   url: "{{ route('dashboard.vendors.index') }}",
  },
  columns:[
   {
    data: 'checkbox',
    name: 'checkbox',
    orderable: false
   },
   {
    data: 'image',
    name: 'image',
    render: function(data, type, full, meta){
     return "<img style='height: 60px;' src={{ URL::to('/') }}/storage/vendors_images/" + data + " width='70' class='img-thumbnail' />";
    },
    orderable: false
   },
   {
    data: 'name',
    name: 'name',
    orderable: false
   },
   {
    data: 'phone',
    name: 'phone',
    orderable: false
   },
   {
    data: 'address',
    name: 'address',
    orderable: false
   },
   {
    data: 'email',
    name: 'email',
    orderable: false
   },
   {
    data: 'user_active_or_not',
    name: 'user_active_or_not',
   },
   {
    data: 'inactive',
    name: 'inactive',
   },
   {
    data: 'action',
    name: 'action',
    orderable: false
   }
  ],initComplete: function () {  
     this.api().columns([2]).every(function () {
        var column = this;
        var input = document.createElement("input");
        $(input).addClass("form-control");
        $(input).addClass("form-control");
        $(input).attr("placeholder", 'البحث');
        $(input).appendTo($(column.header()).empty())
        .on('keyup', function () {
            column.search($(this).val()).draw();
        });
    }); 


  },
  language: {
    "sProcessing": "جاري معالجة البيانات",
    "sLengthMenu": "عرض _MENU_ من العناصر",
    "sZeroRecords": "لايوجد نتائج للبحث",
    "sEmptyTable": "لايوجد بيانات لعرضها",
    "sInfo": "عرض من _START_ إلى _END_ من اجمالي _TOTAL_ من العناصر",
    "sInfoEmpty": "عرض من  0 إلى  0 من اجمالي  0 من العناصر",
    "sInfoFiltered": " ",
    "sInfoPostFix": "",
    "sSearch": "البحث: ",
    "sUrl": "",
    "sInfoThousands": ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
      "sFirst": "Primero",
      "sLast": "Último",
      "sNext": "التالي",
      "sPrevious": "السابق"
    },
    "oAria": {
      "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
      "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
  },
  lengthMenu:[
    [ 5, 10, 25, -1 ],
    [ '5', '10', '25', 'عرض الكل' ]
  ]
});

  //create record
  $('#create_record').click(function(){
    $('.modal-title').text("اضف مورد جديدة");
    $('#action_button').val("أضف");
    $('#action').val("Add");
    $('#formModal').modal('show');
  });

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
       $('#sample').DataTable().ajax.reload();
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
  if($('#action').val() == "Edit")
  {
   $.ajax({
    url:"{{ route('dashboard.vendors.update') }}",
    method:"POST",
    data:new FormData(this),
    contentType: false,
    cache: false,
    processData: false,
    dataType:"json",
    beforeSend:function(){
    $('.loading').removeClass('hidden');
    },
    success:function(data)
    {
     setTimeout(function(){
        $('#formModal').modal('hide');
        $('.loading').addClass('hidden');
          toastr.success(data.success, data.title);
        $('#sample').DataTable().ajax.reload();
       }, 2000);
    },
    error(response){
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
   });
  }
});

$(document).on('click', '.edit', function(){
  var id = $(this).attr('id');
  $('#form_result').html('');
  $.ajax({
   url:"/dashboard/vendors/"+id+"/edit",
   dataType:"json",
   success:function(html){
    $('#name').val(html.data.name);
    $('#phone0').val(html.data.phone[0]);
    $('#phone1').val(html.data.phone[1]);
    $('#address').val(html.data.address);
    $('#email').val(html.data.email);
    $('#hidden_id').val(html.data.id);
    $('#store_image').html("<img src={{ URL::to('/') }}/storage/vendors_images/" + html.data.image + " width='200' class='img-thumbnail' />");
    $('#store_image').append("<input type='hidden' name='hidden_image' value='"+html.data.image+"' />");
    $('.modal-title').text("تعديل القسم");
    $('#action_button').val("تعديل");
    $('#action').val("Edit");
    $('#formModal').modal('show');
   }
  })
 });

$(document).on('click', '#bulk_delete', function(){
      var id = [];
      $('.student_checkbox:checked').each(function(){
          id.push($(this).val());
      });
      swal({
      title: 'هل انت متأكد ؟',
      text: "هل انت متأكد من حذف  " +id.length +"؟ ",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'نعم!',
      cancelButtonText: 'تراجع !',
      confirmButtonClass: 'btn btn-success',
      cancelButtonClass: 'btn btn-danger',
      buttonsStyling: false,
      reverseButtons: true
  }).then((result) => {
      if (result.value) {
          event.preventDefault();
          if(id.length > 0)
            {
                $.ajax({
                    url:"{{ route('dashboard.vendors.destroy.all')}}",
                    method:"get",
                    data:{id:id},
                    beforeSend:function(){
                      $('.loading').removeClass('hidden');
                     },success:function(data)
                      {
                        setTimeout(function(){
                         $('.loading').addClass('hidden');
                            toastr.success(data.success, data.title);
                         $('#sample').DataTable().ajax.reload();
                        }, 2000);
                      }
                });
            }
            else
            {
                swal("لايوجد شيئ لحذفه");
            }
      } else if (
          // Read more about handling dismissals
          result.dismiss === swal.DismissReason.cancel
      ) {
          swal(
              'تراجع',
              'البيانت مؤمنة :)',
              'error'
          )
      }
  })
      
}); 

//delete
 $(document).on('click', '.delete', function(){
  swal({
      title: 'هل انت متأكد ؟',
      text: "هل انت متأكد من حذف  " + name +"؟ ",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'نعم!',
      cancelButtonText: 'تراجع !',
      confirmButtonClass: 'btn btn-success',
      cancelButtonClass: 'btn btn-danger',
      buttonsStyling: false,
      reverseButtons: true
  }).then((result) => {
      if (result.value) {
          event.preventDefault();
          $.ajax({
             url:"vendors/destroy/"+user_id,
             beforeSend:function(){
              $('.loading').removeClass('hidden');
             },
             success:function(data)
             {
              setTimeout(function(){
               $('.loading').addClass('hidden');
                  toastr.success(data.success, data.title);
               $('#sample').DataTable().ajax.reload();
              }, 2000);
             }
            })
      } else if (
          // Read more about handling dismissals
          result.dismiss === swal.DismissReason.cancel
      ) {
          swal(
              'تراجع',
              'البيانت مؤمنة :)',
              'error'
          )
      }
  })
  user_id = $(this).attr('id');
  name = $(this).attr('num');
  $('.modal-title').text('حذف');
  $('.content').text("هل انت متأكد من حذف  " + name +"؟ ");
 });


// active
$(document).on('click', '.bootstrap-switch-warning', function(){
  user_id = $(this).attr('id');
  $(".bootstrap-switch-container"+user_id).css({"width": "123px", "margin-left": "0px"});
  $.ajax({
   url:"vendors/active/1/"+user_id,
   beforeSend:function(){
    $('.loading').removeClass('hidden');
   },
   success:function(data)
   {
    setTimeout(function(){
       $('.loading').addClass('hidden');
          toastr.success(data.success, data.title);
       $('#sample').DataTable().ajax.reload();
      }, 2000);
   }
  })
});
//inactive
$(document).on('click', '.bootstrap-switch-success', function(){
  user_id = $(this).attr('id');
  $(".bootstrap-switch-container"+user_id).css({"width": "123px", "margin-left": "-41px"});
  $.ajax({
   url:"vendors/active/0/"+user_id,
   beforeSend:function(){
    $('.loading').removeClass('hidden');
   },
   success:function(data)
   {
    setTimeout(function(){
       $('.loading').addClass('hidden');
          toastr.success(data.success, data.title);
       $('#sample').DataTable().ajax.reload();
      }, 2000);
   }
  })
});


});
</script>
<script>
// Firefox 64 - 20190102
// If you see wobbly dots spinning very slowly move your mouse around over the overlay to see the real behavior
// Seems to be a quirk/bug specific to codepen...
</script>

@endpush