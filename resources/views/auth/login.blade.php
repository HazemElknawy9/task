<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.5
Version: 4.5.2
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" dir="rtl">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title> تسجيل الدخول |  لوحة التحكم</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/bootstrap/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{asset('dashboard_files/theme_rtl')}}/assets/global/css/components-rtl.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{asset('dashboard_files/theme_rtl')}}/assets/global/css/plugins-rtl.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="{{asset('dashboard_files/theme_rtl')}}/assets/pages/css/login-3-rtl.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
        <link rel="shortcut icon" href="favicon.ico" /> 
        <style>
            .login .content{
                margin: 34px auto;
            }
            .login .content .create-account{
                padding-top :0px;
            }
            hr, p{
               margin: 2px 0; 
            }
            .login .content .form-actions .checkbox {
                margin-right: 18px;
            }

            .login .logo {
                margin: 0px auto -9px;
                padding: 11px;
                text-align: center;
            }
            .login {
                background-color: #6ba3c8!important;
            }
            strong{
                color: red;
            }
        </style>
        
    </head>
    <!-- END HEAD -->

    <body class=" login">
        
        <!-- BEGIN LOGIN -->
        <div class="content" style="border-radius: 13px !important;">
            <!-- BEGIN LOGO -->
        <div class="logo">
                <h1 style="margin-top: 0px;margin-bottom: 0px;"> لوحة التحكم</h1>
                <!-- <img src="{{asset('dashboard_files/theme_rtl')}}/admin-logo.png" style=" margin-top: 0px; height: 160px;border-bottom: 1px solid #eee;" alt="" />  -->
                <img src="{{asset('dashboard_files/theme_rtl')}}/admin-logo.png" style=" margin-top: 0px; height: 160px;border-bottom: 1px solid #eee;margin-right: -34px;" alt="" /> 
        </div>
        <!-- END LOGO -->
            <!-- BEGIN LOGIN FORM -->
            <form class="login-form"  method="POST" action="{{ route('login') }}">
                 @csrf
                <h3 style="text-align: center;" class="form-title">تسجيل الدخول إلى  حسابك</h3>
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span> ادخل اسم المستخدم أو الإيميل و كلمة المرور. </span>
                </div>
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <div class="input-icon">
                        <i class="fa fa-envelope"></i>
                        <input id="email" type="text" class="form-control placeholder-no-fix @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="اسم المستخدم أو البريد الإلكتروني" autofocus /> 
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-icon">
                        <i class="fa fa-lock"></i>
                        <input id="password" type="password" class="form-control placeholder-no-fix @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="كلمة المرور" /> 
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                 <div class="form-actions">
                    <label class="checkbox">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} /> {{ __('تذكرني') }} </label>
                    <button type="submit" class="btn green pull-right"> {{ __('دخول') }} </button>
                </div>
                <div class="login-options">
                    <h4></h4>
                    <ul class="social-icons">
                        <li>
                            <a class="facebook" data-original-title="facebook" href="javascript:;"> </a>
                        </li>
                        <li>
                            <a class="twitter" data-original-title="Twitter" href="javascript:;"> </a>
                        </li>
                        <li>
                            <a class="googleplus" data-original-title="Goole Plus" href="javascript:;"> </a>
                        </li>
                        <li>
                            <a class="linkedin" data-original-title="Linkedin" href="javascript:;"> </a>
                        </li>
                    </ul>
                </div>
                <div class="forget-password">
                    <p>
                        @if (Route::has('password.request'))
                        هل نسيت كلمة المرور <a style="margin-left: 69px;" href="{{ route('password.request') }}"> هنا </a> 
                        @endif

                        لتسجيل حساب جديد
                        <a href="javascript:;" id="register-btn"> هنا </a>
                    </p>
                </div>
                <h3></h3>
                <h3></h3>
                <h3></h3>
            </form>
            <!-- END LOGIN FORM -->
            <!-- BEGIN REGISTRATION FORM -->
            <form class="register-form" method="POST" action="{{ route('register') }}">
                @csrf
                <h3>تسجيل حساب جديد</h3>
                <div class="form-group">
                    <div class="input-icon">
                        <i class="fa fa-font"></i>
                        <input placeholder="الإسم" id="name" type="text" class="form-control placeholder-no-fix{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus/> 
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <div class="input-icon">
                        <i class="fa fa-envelope"></i>
                        <input placeholder="البريد الإلكتروني" id="email" type="email" class="form-control placeholder-no-fix{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required /> 
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-icon">
                        <i class="fa fa-font"></i>
                        <input placeholder="التليفون" id="phone" type="text" class="form-control placeholder-no-fix{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required autofocus/> 
                        @if ($errors->has('phone'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
               <div class="form-group">
                    <select name="governrate" class="form-control" required autofocus>
                        <option value="">اختر المحافظة</option>
                        <option value="الدقهلية">الدقهلية</option>
                        <option value="الشرقية">الشرقية</option>
                        <option value="القاهرة">القاهرة</option>
                        <option value="الغربية">الغربية</option>
                        <option value="دمياط">دمياط</option>
                    </select>
                </div>
                <div class="form-group">
                    <select name="city" class="form-control" required autofocus>
                        <option value="">اختر المدينة</option>
                        <option value="طنطا">طنطا</option>
                        <option value="اجا">اجا</option>
                        <option value="ميتغمر">ميتغمر</option>
                        <option value="المحلة">المحلة</option>
                        <option value="سمنود">سمنود</option>
                    </select>
                </div>
                <div class="form-group">
                    <div class="input-icon">
                        <i class="fa fa-font"></i>
                        <input placeholder="العنوان" id="address" type="text" class="form-control placeholder-no-fix{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required autofocus/> 
                        @if ($errors->has('address'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-icon">
                        <i class="fa fa-font"></i>
                        <input autocomplete="off" placeholder="تاريخ الميلاد" id="date_birth" type="text" class="form-control datepicker placeholder-no-fix{{ $errors->has('date_birth') ? ' is-invalid' : '' }}" name="date_birth" value="{{ old('date_birth') }}" required autofocus/> 
                        @if ($errors->has('date_birth'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('date_birth') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-icon">
                        <i class="fa fa-lock"></i>
                        <input placeholder="كلمة المرور" id="password" type="password" class="form-control placeholder-no-fix{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required /> 
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Re-type Your Password</label>
                    <div class="controls">
                        <div class="input-icon">
                            <i class="fa fa-check"></i>
                            <input placeholder="تأكيد كلمة المرور" id="password-confirm" type="password" class="form-control placeholder-no-fix" name="password_confirmation" required /> </div>
                    </div>
                </div>
                 <div class="form-group">
                    <select name="channel_promote" class="form-control">
                        <option value="">اختر قناة التسويق</option>
                        <option value="فيس بوك">فيس بوك</option>
                        <option value="تويتر">تويتر</option>
                        <option value="انستجرام">انستجرام</option>
                    </select>
                </div>
                
                <div class="form-actions">
                    <button id="register-back-btn" type="button" class="btn grey-salsa btn-outline"> عودة </button>
                    <button type="submit" id="register-submit-btn" class="btn green pull-right"> تسجيل</button>
                </div>
                <h3></h3>
                <h3></h3>
                <h3></h3>
            </form>
            <!-- END REGISTRATION FORM -->
        </div>
        <!-- END LOGIN -->
        <!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="{{asset('dashboard_files/theme_rtl')}}/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="{{asset('dashboard_files/theme_rtl')}}/assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="{{asset('dashboard_files/theme_rtl')}}/assets/pages/scripts/login.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.ar.min.js"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
        <script>
            $(document).ready(function() {
               // alert('dddddddd');
              $('.checker').removeClass('checker');
            });
        </script>
        <script type="text/javascript">
         $('.datepicker').datepicker({
            rtl:true,
            language:'{{ app()->getLocale() }}',
            format:'yyyy-mm-dd',
            todayBtn:true,
            clearBtn:true,
        });
        </script>
    </body>

</html>