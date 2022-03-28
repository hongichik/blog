<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{env('APP_NAME')}}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon"href="{{$icon}}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('themeUser/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('themeUser/assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('themeUser/assets/css/ticker-style.css')}}">
    <link rel="stylesheet" href="{{asset('themeUser/assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('themeUser/assets/css/slicknav.css')}}">
    <link rel="stylesheet" href="{{asset('themeUser/assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('themeUser/assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('themeUser/assets/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('themeUser/assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('themeUser/assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('themeUser/assets/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('themeUser/assets/css/style.css')}}">
</head>

<body>

	<div id="app">
        <user-preloader logo_load_page="{{$logoLoadPage}}"></user-preloader>
		<user-header logo_header="{{$logoHeader}}" slogan="{{$slogan}}" number_header={{$numberHeader}}></user-header>
        <main style="min-height: 600px;">
            <div class="trending-area fix pt-25 gray-bg">
                <div class="container">
                    <div class="trending-main">
                        <div class="row">
                            <router-view/>  
                        </div>
                    </div>
                </div>
            </div> 
                  
        </main> 
        <user-footer target="{{$target}}" 
                    member_one="{{$memberOne}}" 
                    menber_tow="{{$menberTow}}" 
                    logo_footer="{{$logoFooter}}" 
                    Gmail_footer="{{$GmailFooter}}" 
                    number_footer="{{$numberFooter}}" 
                    Link_fb_footer="{{$LinkFBFooter}}">
        </user-footer>
        <user-search></user-search>
	</div>

	<script src="{{asset('js/app.js')}}"></script> 




<!-- JS here -->

    <script src="{{asset('themeUser/assets/js/vendor/modernizr-3.5.0.min.js')}}"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{asset('themeUser/assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('themeUser/assets/js/popper.min.js')}}"></script>
    <script src="{{asset('themeUser/assets/js/bootstrap.min.js')}}"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{asset('themeUser/assets/js/jquery.slicknav.min.js')}}"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{asset('themeUser/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('themeUser/assets/js/slick.min.js')}}"></script>
    <!-- Date Picker -->
    <script src="{{asset('themeUser/assets/js/gijgo.min.js')}}"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="{{asset('themeUser/assets/js/wow.min.js')}}"></script>
    <script src="{{asset('themeUser/assets/js/animated.headline.js')}}"></script>
    <script src="{{asset('themeUser/assets/js/jquery.magnific-popup.js')}}"></script>

    <!-- Scrollup, nice-select, sticky -->
    <script src="{{asset('themeUser/assets/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('themeUser/assets/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('themeUser/assets/js/jquery.sticky.js')}}"></script>
    
    <!-- contact js -->
    <script src="{{asset('themeUser/assets/js/contact.js')}}"></script>
    <script src="{{asset('themeUser/assets/js/jquery.form.js')}}"></script>
    <script src="{{asset('themeUser/assets/js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('themeUser/assets/js/mail-script.js')}}"></script>
    <script src="{{asset('themeUser/assets/js/jquery.ajaxchimp.min.js')}}"></script>
    
    <!-- Jquery Plugins, main Jquery -->	
    <script src="{{asset('themeUser/assets/js/plugins.js')}}"></script>
    <script src="{{asset('themeUser/assets/js/main.js')}}"></script>
    
</body>
</html>