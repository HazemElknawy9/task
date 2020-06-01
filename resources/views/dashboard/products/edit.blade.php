@extends('layouts.dashboard.app')
@section('title','تعديل المنتجات')
@push('css')
<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS -->
@endpush
@section('content')
<style>
    
</style>    
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
       
        <!-- BEGIN PAGE BAR -->
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
                    <span>تعديل</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title">
        </h3>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12 ">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-red-sunglo">
                            <i class="icon-plus"></i>
                            <span class="caption-subject bold uppercase"> تعديل المنتج</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        @include('partials._errors')
                    <form action="{{ route('dashboard.products.update', $product->id) }}" method="post" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        {{ method_field('put') }}

                            <div class="form-body">
                                <div class="form-group">
                                    <label>@lang('site.categories')</label>
                                    <select name="category_id" class="form-control">
                                        <option value="">@lang('site.all_categories')</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>@lang('site.name')</label>
                                    <input type="text" name="name" class="form-control" value="{{ $product->name }}">
                                </div>
                                <div class="form-group">
                                    <label>@lang('site.purchase_price')</label>
                                    <input type="number" name="purchase_price" class="form-control" value="{{ $product->purchase_price }}">
                                </div>

                                <div class="form-group">
                                    <label>@lang('site.sale_price')</label>
                                    <input type="number" name="sale_price" class="form-control" value="{{ $product->sale_price }}">
                                </div>

                                <div class="form-group">
                                    <label>@lang('site.stock')</label>
                                    <input type="number" name="stock" class="form-control" value="{{ $product->stock}}">
                                </div>
                                <div class="form-group">
                                    <label>الوصف</label>
                                    <textarea name="description" class="form-control">{{ $product->description }}</textarea>
                                </div>
                                <div class="form-group">
                                  <div class="fileinput fileinput-new" data-provides="fileinput">
                                      <div class="fileinput-new thumbnail" style="max-width: 100%; height: 150px;">
                                          <img src="{{ URL::to('/') }}/storage/products_images/{{$product->image}}" alt="" /> </div>
                                      <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                      <div>
                                          <span class="btn default btn-file">
                                              <span class="fileinput-new"> لوجو الموقع </span>
                                              <span class="fileinput-exists"> تغير </span>
                                              <input type="file" name="image"> </span>
                                          <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> حذف </a>
                                      </div>
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
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>

@endsection
@push('js')
<script src="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<script src="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
@endpush

