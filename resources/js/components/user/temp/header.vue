<template>
<header>
    <!-- Header Start -->
    <div class="header-area">
        <div class="main-header ">
            <div class="header-top white-bg d-none d-sm-block">
                <div class="container">
                    <div class="col-xl-12">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="header-info-left">
                                <ul>     
                                    <li class="title colorb"><span class="flaticon-energy"></span>{{slogan}}</li>
                                </ul>
                            </div>
                            <div class="header-info-right">
                                <ul class="header-date">
                                    <li><span class="flaticon-calendar"></span>{{number_header}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="header-bottom header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-2 col-lg-3 col-md-3">
                            <router-link to="/home"><img style="padding: 9px 0px;" :src="logo_header" alt=""></router-link>
                        </div>
                        <div class="col-xl-8 col-lg-9 col-md-9 header-flex">
                            <div class="main-menu d-none d-md-block">
                                <nav>                  
                                    <ul id="navigation">
                                        <li><router-link to="/home">Trang chủ</router-link></li>
                                        <li> <router-link to="/contact">Giới thiệu</router-link></li>
                                        <li><a href="#">Lập trình</a>
                                            <ul class="submenu">
                                                <li><a href="categori.html">C++</a></li>
                                                <li><a href="blog_details.html">C#</a></li>
                                                <li><a href="elements.html">Java</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Đồ họa</a>
                                            <ul class="submenu">
                                                <li><a href="blog.html">Blog</a></li>
                                                <li><a href="blog_details.html">Blog Details</a></li>
                                                <li><a href="elements.html">Element</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="categori.html">Mẹo vặt</a></li>
                                        
                                        <li><a href="contact.html">Liên hệ</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>  

                        <div class="col-xl-2 col-lg-2 col-md-2">
                            <div class="header-right f-right d-none d-xl-block">
                                <div class="nav-search search-switch">
                                    <i class="fa fa-search"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-md-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>
</template>

<script>
export default {

props: ['logo_header','slogan','number_header'],

}
</script>