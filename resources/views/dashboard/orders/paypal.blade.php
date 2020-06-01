@extends('layouts.dashboard.app')
@section('title','اضافة مستخدم')
@push('css')

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
                        <div class="col-md-12">
                            <div class="loading hidden">Loading&#8230;</div>
                            <div class="portlet light bordered">
                                <div class="portlet-body">
                                    fffffffff
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
@endsection
@push('js')
 

@endpush
