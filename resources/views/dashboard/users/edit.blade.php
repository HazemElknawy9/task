@extends('layouts.dashboard.app')
@section('title','تعديل مستخدم')
@push('css')
<link href="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/icheck/skins/all.css" rel="stylesheet" type="text/css" />
<link href="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
<link href="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/bootstrap-select/css/bootstrap-select-rtl.min.css" rel="stylesheet" type="text/css" />
<link href="{{asset('dashboard_files/theme_rtl')}}/spinner.css" rel="stylesheet" type="text/css" />
<link href="{{asset('dashboard_files/theme_rtl')}}/style.css" rel="stylesheet" type="text/css" />

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
                              <span>تعديل</span>
                          </li>
                        </ul>
                    </div>
                    <!-- END PAGE BAR -->
                      <h3 class="page-title"> 
                          
                      </h3>
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <form action="{{ url(App::getLocale().'/dashboard/users/'.$user->id)  }}" method="post" enctype="multipart/form-data" id="product_form" class="form-horizontal"  data-toggle="validator">
                        {{ csrf_field() }}
                         {{ method_field('put') }}
                        <div class="col-md-12">
                            <div class="loading hidden">Loading&#8230;</div>
                            <div class="alert alert-danger error_message hidden">
                               <ul class="validate_message">
                                 
                               </ul>
                             </div>
                             <div class="alert alert-success success_message hidden"></div>
                            <div class="portlet light bordered">
                                
                                <div class="portlet-body">
                                    <ul class="nav nav-pills">
                                        <li class="active">
                                            <a href="#tab_2_1" data-toggle="tab"> بيانات المستخدمين </a>
                                        </li>
                                        <li>
                                            <a href="#tab_2_2" data-toggle="tab"> الصلاحيات </a>
                                        </li>
                                        <li>
                                            <a href="#tab_2_3" data-toggle="tab">Role</a>
                                        </li>
                                    </ul>
                                    <hr>
                                    <div class="tab-content">
                                        <div class="tab-pane fade active in" id="tab_2_1">
                                          <div class="row">
                                            <div class="col-md-12">
                                              <div class="portlet light portlet-fit portlet-form">
                                                  <div class="portlet-body">
                                                      <!-- BEGIN FORM-->
                                                          
                                                          <div class="form-body">
                                                              
                                                              <div class="form-group">
                                                                  <label class="control-label col-md-3">اسم المستخدم
                                                                      <span class="required"> * </span>
                                                                  </label>
                                                                  <div class="col-md-4">
                                                                      <div class="input-group">
                                                                          <span class="input-group-addon">
                                                                              <i class="fa fa-user"></i>
                                                                          </span>
                                                                          <input type="text" id="name" value="{{ $user->name }}" name="name" required="" placeholder="اسم المستخدم"  data-error="الرجاء ادخال اسم المستخدم" class="form-control" /> 
                                                                      </div>
                                                                      <div class="help-block with-errors"></div>
                                                                  </div>
                                                              </div>
                                                              <div class="form-group">
                                                                  <label class="col-md-3 control-label">الايميل
                                                                      <span class="required"> * </span>
                                                                  </label>
                                                                  <div class="col-md-4">
                                                                      <div class="input-group">
                                                                          <span class="input-group-addon">
                                                                              <i class="fa fa-envelope"></i>
                                                                          </span>
                                                                          <input type="email" class="form-control" value="{{ $user->email }}"  required placeholder="الايميل"  data-error="الرجاء ادخال الايميل"  id="email" name="email" class="form-control"> 
                                                                      </div>
                                                                      <div class="help-block with-errors"></div>
                                                                  </div>
                                                              </div>
                                                              
                                                              <div class="form-group">
                                                                  <label class="control-label col-md-3">صورة المستخدم
                                                                      <span class="required"> * </span>
                                                                  </label>
                                                                  <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                      <div class="fileinput-new thumbnail" style="max-width: 100%; height: 150px;">
                                                                          <img src="{{ $user->image_path }}" alt="" /> </div>
                                                                      <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                                      <div>
                                                                          <span class="btn default btn-file">
                                                                              <span class="fileinput-new"> اختر الصورة </span>
                                                                              <span class="fileinput-exists"> تغير </span>
                                                                              <input type="file" name="image"> </span>
                                                                          <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> حذف </a>
                                                                      </div>
                                                                  </div>
                                                              </div>

                                                          </div>
                                                          <div class="form-actions">
                                                              <div class="row">
                                                                  <div class="col-md-offset-3 col-md-9">
                                                                      <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> @lang('site.edit')</button>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                      </form>
                                                      <!-- END FORM-->
                                                  </div>
                                                  <!-- END VALIDATION STATES-->
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab_2_2">
                                            <div class="row">
                                            
                                              @foreach ($rolesites as $index=>$model)
                                              <div class="col-md-4" style="margin-bottom: 15px">
                                                  <div style="border: 1px solid #E7ECF1;border-radius: 11px !important;" class="table-wrapper-scroll-y my-custom-scrollbar">

                                                    <div style="margin-right: 0; margin-left: 0" class="form-group">
                                                          <h3 style="text-align: center; background: #BD0102;padding: 5px; margin-top: 0px; color: white">{{$model->ar_name}}</h3>
                                                          <div class="col-md-6" style="float: initial">
                                                              <div class="input-group">
                                                                  <div class="icheck-list">
                                                                      <label></label>
                                                                      <label></label>
                                                                      @foreach ($cruds as $map)
                                                                          <label>
                                                                              <a style="display: inline-block;"  class="btn btn-xs green"><i class="fa fa-users"></i></a>
                                                                              <input type="checkbox"  id="permissions" name="permissions[]" {{ $user->hasPermission($map->en_name . '_' . $model->name) ? 'checked' : '' }} value="{{ $map->en_name . '_' . $model->name }}" class="icheck" data-checkbox="icheckbox_square-grey"> {{$map->ar_name}} 
                                                                          </label>
                                                                      @endforeach
                                                                  </div>
                                                              </div>
                                                          </div>
                                                      </div>

                                                  </div>
                                              </div>
                                              @endforeach
                                          </div>     
                                        </div>
                                        <div class="tab-pane fade" id="tab_2_3">
                                          <div class="row">
                                                <div class="form-group">
                                                <div class="col-md-8">
                                                    <select name="roles" class="bs-select form-control" data-live-search="true" data-size="8">
                                                        <option value="">اختار الوظيفة</option>
                                                        @foreach($roles as $role)
                                                          <option value="{{$role->name}}" {{ implode(', ', $user->roles->pluck('name')->toArray()) == $role->name ? 'selected' : '' }}>{{$role->name}}</option>
                                                        @endforeach  
                                                    </select>
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
                <!-- END CONTENT BODY -->
            </div>
@endsection
@push('js')
 
<script src="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<script src="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/icheck/icheck.min.js" type="text/javascript"></script>
<script src="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
<script src="{{asset('dashboard_files/theme_rtl')}}/assets/pages/scripts/components-bootstrap-select.min.js" type="text/javascript"></script>
<script type="text/javascript">
  $(document).ready(function() {

    $(document).on('click','.save_and_continue',function() {
        //var form_data = $('#product_form').serialize();
        var form_data = new FormData($("#product_form")[0]);
      $.ajax({
        type: 'POST',
        url: '{{ route('dashboard.users.store') }}',
        data: form_data,
        contentType: false,
        processData: false,
        beforeSend: function() {
          $('.loading').removeClass('hidden');
        },success:function(data) {
          if (data.status == true) {
                $('.loading').addClass('hidden');
                toastr.success(data.message, data.title);
            location.href = "{{asset('dashboard/users')}}";    
           }
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
        },
        complete: function(){
            document.getElementById("product_form").reset();
        }
      });
      return false;
    });
  });
</script>
<script>
    // Firefox 64 - 20190102
// If you see wobbly dots spinning very slowly move your mouse around over the overlay to see the real behavior
// Seems to be a quirk/bug specific to codepen...
</script>
@endpush
@push('js_en')

@endpush