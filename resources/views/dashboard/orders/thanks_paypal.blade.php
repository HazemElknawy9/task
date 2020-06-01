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
                                @if (Session::has('grand_total') && Session::has('order_id'))
                                    <div class="container">
										<div class="heading" align="center">
											<h3>YOUR ORDER HAS BEEN PLACED</h3>
											<p>Your order number is {{ Session::get('order_id') }} and total payable about is INR {{ Session::get('grand_total') }}</p>
											<p>Please make payment by clicking on below Payment Button</p>
											<?php
											$order = App\Models\Order::findOrFail(Session::get('order_id'));
											$order = json_decode(json_encode($order));
											$client = App\Models\Client::findOrFail($order->client_id);
											$nameArr =  explode(' ',$client->name);
											?>
											<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
												<input type="hidden" name="cmd" value="_xclick">
												<input type="hidden" name="business" value="amitphpprogrammer-facilitator@gmail.com">
												<input type="hidden" name="item_name" value="{{ Session::get('order_id') }}">
												<input type="hidden" name="currency_code" value="USD">
												<input type="hidden" name="amount" value="{{ Session::get('grand_total') }}">
												<input type="hidden" name="first_name" value="{{ $nameArr[0] }}">
												<input type="hidden" name="last_name" value="{{ $nameArr[1] }}">
												<input type="hidden" name="address1" value="{{ $client->address }}">
												<input type="hidden" name="address2" value="">
												<input type="hidden" name="return" value="{{ url('paypal/thanks') }}">
												<input type="hidden" name="cancel_return" value="{{ url('dashboard/paypal/cancel') }}">
												<input type="hidden" name="notify_url" value="{{ url('/paypal/ipn') }}">
												<input type="image"
												    src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/btn_paynow_107x26.png" alt="Pay Now">
												  <img alt="" src="https://paypalobjects.com/en_US/i/scr/pixel.gif"
												    width="1" height="1">
											</form>
										</div>
									</div>
								@else
								<p style="text-align: center;" >خطأ انتهت المدة المسموح بها لإنهاء مدة الدفع حاول مرة اخرى </p>
								@endif	
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
@endsection
<?php
Session::forget('grand_total');
Session::forget('order_id');
?>
@push('js')
 

@endpush
