@extends('user.temp.Main')

@section('Content')
    
<main>
    <!-- Trending Area Start -->
    <div class="trending-area fix pt-25 gray-bg">
        <div class="container">
            <div class="trending-main">
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Trending Top -->
                        <div class="slider-active">
                            <!-- Single -->
                            <div class="single-slider">
                                <div class="trending-top mb-30">
                                    <div class="trend-top-img">
                                        <img src="https://media-cdn-v2.laodong.vn/Storage/NewsPortal/2021/5/26/913299/Ngan-Ha25.jpg" alt="">
                                        <div class="trend-top-cap">
                                            <h2><a href="latest_news.html" data-animation="fadeInUp" data-delay=".4s" data-duration="1000ms">Anna Lora Stuns In White At Her Australian Premiere</a></h2>
                                            <p data-animation="fadeInUp" data-delay=".6s" data-duration="1000ms">by Alice cloe   -   Jun 19, 2020</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Right content -->
                    <div class="col-lg-4">
                            <!-- Trending Top -->
                        <div class="row">
                            <div class="col-lg-12 col-md-6 col-sm-6" style="max-width: 80%;">
                                <div class="trending-top mb-30">
                                    <div class="trend-top-img">
                                        <img src="assets/img/trending/trending_top3.jpg" alt="">
                                        <div class="trend-top-cap trend-top-cap2">
                                            <h2><a href="latest_news.html">Secretart for Economic Air
                                                plane that looks like</a></h2>
                                            <p>by Alice cloe   -   Jun 19, 2020</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-6 col-sm-6">
                                <div class="trending-top mb-30">
                                    <div class="trend-top-img">
                                        <img src="assets/img/trending/trending_top4.jpg" alt="">
                                        <div class="trend-top-cap trend-top-cap2">
                                            <h2><a href="latest_news.html">Secretart for Economic Air plane that looks like</a></h2>
                                            <p>by Alice cloe   -   Jun 19, 2020</p>
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
    <!-- Trending Area End -->
    <!-- Whats New Start -->
    <section class="whats-news-area pt-50 pb-20 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                <div class="whats-news-wrapper">
                    <!-- Heading & Nav Button -->
                    <div class="row justify-content-between align-items-end mb-15">
                        <div class="col-xl-6">
                            <div class="section-tittle mb-30">
                                <h3>Bài viết mới nhất</h3>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-9">
                            <div class="properties__button">
                                <!--Nav Button  -->                                            
                                <nav>                                                 
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Lifestyle</a>
                                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Travel</a>
                                        <a class="nav-item nav-link" id="nav-last-tab" data-toggle="tab" href="#nav-last" role="tab" aria-controls="nav-contact" aria-selected="false">Sports</a>
                                        <a class="nav-item nav-link" id="nav-Sports" data-toggle="tab" href="#nav-nav-Sport" role="tab" aria-controls="nav-contact" aria-selected="false">Technology</a>
                                    </div>
                                </nav>
                                <!--End Nav Button  -->
                            </div>
                        </div>
                    </div>
                    <!-- Tab content -->
                    <div class="row">
                        <div class="col-12">
                            <!-- Nav Card -->
                            <div class="tab-content" id="nav-tabContent">
                                <!-- card one -->
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">       
                                    <div class="row">
                                        <!-- Left Details Caption -->
                                        <div class="col-xl-6 col-lg-12">
                                            <div class="whats-news-single mb-40 mb-40">
                                                <div class="whates-img">
                                                    <img src="assets/img/gallery/whats_news_details1.png" alt="">
                                                </div>
                                                <div class="whates-caption">
                                                    <h4><a href="latest_news.html">Secretart for Economic Air plane that looks like</a></h4>
                                                    <span>by Alice cloe   -   Jun 19, 2020</span>
                                                    <p>Struggling to sell one multi-million dollar home currently on the market won’t stop actress and singer Jennifer Lopez.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Right single caption -->
                                        <div class="col-xl-6 col-lg-12">
                                            <div class="row">
                                                <!-- single -->
                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                    <div class="whats-right-single mb-20">
                                                        <div class="whats-right-img">
                                                            <img src="assets/img/gallery/whats_right_img1.png" alt="">
                                                        </div>
                                                        <div class="whats-right-cap">
                                                            <span class="colorb">FASHION</span>
                                                            <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                            <p>Jun 19, 2020</p> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                    <div class="whats-right-single mb-20">
                                                        <div class="whats-right-img">
                                                            <img src="assets/img/gallery/whats_right_img2.png" alt="">
                                                        </div>
                                                        <div class="whats-right-cap">
                                                            <span class="colorb">FASHION</span>
                                                            <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                            <p>Jun 19, 2020</p> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                    <div class="whats-right-single mb-20">
                                                        <div class="whats-right-img">
                                                            <img src="assets/img/gallery/whats_right_img3.png" alt="">
                                                        </div>
                                                        <div class="whats-right-cap">
                                                            <span class="colorg">FASHION</span>
                                                            <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                            <p>Jun 19, 2020</p> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                    <div class="whats-right-single mb-20">
                                                        <div class="whats-right-img">
                                                            <img src="assets/img/gallery/whats_right_img4.png" alt="">
                                                        </div>
                                                        <div class="whats-right-cap">
                                                            <span class="colorr">FASHION</span>
                                                            <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                            <p>Jun 19, 2020</p> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card two -->
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <div class="row">
                                        <!-- Left Details Caption -->
                                        <div class="col-xl-6">
                                            <div class="whats-news-single mb-40">
                                                <div class="whates-img">
                                                    <img src="assets/img/gallery/whats_right_img2.png" alt="">
                                                </div>
                                                <div class="whates-caption">
                                                    <h4><a href="#">Secretart for Economic Air
                                                        plane that looks like</a></h4>
                                                    <span>by Alice cloe   -   Jun 19, 2020</span>
                                                    <p>Struggling to sell one multi-million dollar home currently on the market won’t stop actress and singer Jennifer Lopez.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Right single caption -->
                                        <div class="col-xl-6 col-lg-12">
                                            <div class="row">
                                                <!-- single -->
                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                    <div class="whats-right-single mb-20">
                                                        <div class="whats-right-img">
                                                            <img src="assets/img/gallery/whats_right_img1.png" alt="">
                                                        </div>
                                                        <div class="whats-right-cap">
                                                            <span class="colorb">FASHION</span>
                                                            <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                            <p>Jun 19, 2020</p> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                    <div class="whats-right-single mb-20">
                                                        <div class="whats-right-img">
                                                            <img src="assets/img/gallery/whats_right_img2.png" alt="">
                                                        </div>
                                                        <div class="whats-right-cap">
                                                            <span class="colorb">FASHION</span>
                                                            <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                            <p>Jun 19, 2020</p> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                    <div class="whats-right-single mb-20">
                                                        <div class="whats-right-img">
                                                            <img src="assets/img/gallery/whats_right_img3.png" alt="">
                                                        </div>
                                                        <div class="whats-right-cap">
                                                            <span class="colorg">FASHION</span>
                                                            <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                            <p>Jun 19, 2020</p> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                    <div class="whats-right-single mb-20">
                                                        <div class="whats-right-img">
                                                            <img src="assets/img/gallery/whats_right_img4.png" alt="">
                                                        </div>
                                                        <div class="whats-right-cap">
                                                            <span class="colorr">FASHION</span>
                                                            <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                            <p>Jun 19, 2020</p> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card three -->
                                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                    <div class="row">
                                        <!-- Left Details Caption -->
                                        <div class="col-xl-6">
                                            <div class="whats-news-single mb-40">
                                                <div class="whates-img">
                                                    <img src="assets/img/gallery/whats_right_img4.png" alt="">
                                                </div>
                                                <div class="whates-caption">
                                                    <h4><a href="#">Secretart for Economic Air
                                                        plane that looks like</a></h4>
                                                    <span>by Alice cloe   -   Jun 19, 2020</span>
                                                    <p>Struggling to sell one multi-million dollar home currently on the market won’t stop actress and singer Jennifer Lopez.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Right single caption -->
                                        <div class="col-xl-6 col-lg-12">
                                            <div class="row">
                                                <!-- single -->
                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                    <div class="whats-right-single mb-20">
                                                        <div class="whats-right-img">
                                                            <img src="assets/img/gallery/whats_right_img1.png" alt="">
                                                        </div>
                                                        <div class="whats-right-cap">
                                                            <span class="colorb">FASHION</span>
                                                            <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                            <p>Jun 19, 2020</p> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                    <div class="whats-right-single mb-20">
                                                        <div class="whats-right-img">
                                                            <img src="assets/img/gallery/whats_right_img2.png" alt="">
                                                        </div>
                                                        <div class="whats-right-cap">
                                                            <span class="colorb">FASHION</span>
                                                            <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                            <p>Jun 19, 2020</p> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                    <div class="whats-right-single mb-20">
                                                        <div class="whats-right-img">
                                                            <img src="assets/img/gallery/whats_right_img3.png" alt="">
                                                        </div>
                                                        <div class="whats-right-cap">
                                                            <span class="colorg">FASHION</span>
                                                            <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                            <p>Jun 19, 2020</p> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                    <div class="whats-right-single mb-20">
                                                        <div class="whats-right-img">
                                                            <img src="assets/img/gallery/whats_right_img4.png" alt="">
                                                        </div>
                                                        <div class="whats-right-cap">
                                                            <span class="colorr">FASHION</span>
                                                            <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                            <p>Jun 19, 2020</p> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- card fure -->
                                <div class="tab-pane fade" id="nav-last" role="tabpanel" aria-labelledby="nav-last-tab">
                                    <div class="row">
                                        <!-- Left Details Caption -->
                                        <div class="col-xl-6">
                                            <div class="whats-news-single mb-40">
                                                <div class="whates-img">
                                                    <img src="assets/img/gallery/whats_right_img2.png" alt="">
                                                </div>
                                                <div class="whates-caption">
                                                    <h4><a href="#">Secretart for Economic Air
                                                        plane that looks like</a></h4>
                                                    <span>by Alice cloe   -   Jun 19, 2020</span>
                                                    <p>Struggling to sell one multi-million dollar home currently on the market won’t stop actress and singer Jennifer Lopez.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Right single caption -->
                                        <div class="col-xl-6 col-lg-12">
                                            <div class="row">
                                                <!-- single -->
                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                    <div class="whats-right-single mb-20">
                                                        <div class="whats-right-img">
                                                            <img src="assets/img/gallery/whats_right_img1.png" alt="">
                                                        </div>
                                                        <div class="whats-right-cap">
                                                            <span class="colorb">FASHION</span>
                                                            <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                            <p>Jun 19, 2020</p> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                    <div class="whats-right-single mb-20">
                                                        <div class="whats-right-img">
                                                            <img src="assets/img/gallery/whats_right_img2.png" alt="">
                                                        </div>
                                                        <div class="whats-right-cap">
                                                            <span class="colorb">FASHION</span>
                                                            <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                            <p>Jun 19, 2020</p> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                    <div class="whats-right-single mb-20">
                                                        <div class="whats-right-img">
                                                            <img src="assets/img/gallery/whats_right_img3.png" alt="">
                                                        </div>
                                                        <div class="whats-right-cap">
                                                            <span class="colorg">FASHION</span>
                                                            <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                            <p>Jun 19, 2020</p> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                    <div class="whats-right-single mb-20">
                                                        <div class="whats-right-img">
                                                            <img src="assets/img/gallery/whats_right_img4.png" alt="">
                                                        </div>
                                                        <div class="whats-right-cap">
                                                            <span class="colorr">FASHION</span>
                                                            <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                            <p>Jun 19, 2020</p> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- card Five -->
                                <div class="tab-pane fade" id="nav-nav-Sport" role="tabpanel" aria-labelledby="nav-Sports">
                                    <div class="row">
                                        <!-- Left Details Caption -->
                                        <div class="col-xl-6">
                                            <div class="whats-news-single mb-40">
                                                <div class="whates-img">
                                                    <img src="assets/img/gallery/whats_news_details1.png" alt="">
                                                </div>
                                                <div class="whates-caption">
                                                    <h4><a href="#">Secretart for Economic Air
                                                        plane that looks like</a></h4>
                                                    <span>by Alice cloe   -   Jun 19, 2020</span>
                                                    <p>Struggling to sell one multi-million dollar home currently on the market won’t stop actress and singer Jennifer Lopez.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Right single caption -->
                                        <div class="col-xl-6 col-lg-12">
                                            <div class="row">
                                                <!-- single -->
                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                    <div class="whats-right-single mb-20">
                                                        <div class="whats-right-img">
                                                            <img src="assets/img/gallery/whats_right_img1.png" alt="">
                                                        </div>
                                                        <div class="whats-right-cap">
                                                            <span class="colorb">FASHION</span>
                                                            <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                            <p>Jun 19, 2020</p> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                    <div class="whats-right-single mb-20">
                                                        <div class="whats-right-img">
                                                            <img src="assets/img/gallery/whats_right_img2.png" alt="">
                                                        </div>
                                                        <div class="whats-right-cap">
                                                            <span class="colorb">FASHION</span>
                                                            <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                            <p>Jun 19, 2020</p> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                    <div class="whats-right-single mb-20">
                                                        <div class="whats-right-img">
                                                            <img src="assets/img/gallery/whats_right_img3.png" alt="">
                                                        </div>
                                                        <div class="whats-right-cap">
                                                            <span class="colorg">FASHION</span>
                                                            <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                            <p>Jun 19, 2020</p> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                    <div class="whats-right-single mb-20">
                                                        <div class="whats-right-img">
                                                            <img src="assets/img/gallery/whats_right_img4.png" alt="">
                                                        </div>
                                                        <div class="whats-right-cap">
                                                            <span class="colorr">FASHION</span>
                                                            <h4><a href="latest_news.html">Portrait of group of friends ting eat. market in.</a></h4>
                                                            <p>Jun 19, 2020</p> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- End Nav Card -->
                        </div>
                    </div>
                </div>
                <!-- Banner -->

                </div>
                <div class="col-lg-4">
                    <!-- Flow Socail -->

                    <!-- Most Recent Area -->
                    <div class="most-recent-area">
                        <!-- Section Tittle -->
                        <div class="small-tittle mb-20">
                            <h4>Mẹo vặt</h4>
                        </div>
                        <!-- Details -->
                        <div class="most-recent mb-40">
                            <div class="most-recent-img">
                                <img src="assets/img/gallery/most_recent.png" alt="">
                                <div class="most-recent-cap">
                                    <h4><a href="latest_news.html">What to Wear: 9+ Cute Work <br>
                                        Outfits to Wear This.</a></h4>
                                    <p>Jhon  |  2 hours ago</p>
                                </div>
                            </div>
                        </div>
                        <!-- Single -->
                        <div class="most-recent-single">
                            <div class="most-recent-images">
                                <img src="assets/img/gallery/most_recent1.png" alt="">
                            </div>
                            <div class="most-recent-capt">
                                <h4><a href="latest_news.html">Scarlett’s disappointment at latest accolade</a></h4>
                                <p>Jhon  |  2 hours ago</p>
                            </div>
                        </div>                       
                        <!-- Single -->
                        <div class="most-recent-single">
                            <div class="most-recent-images">
                                <img src="assets/img/gallery/most_recent2.png" alt="">
                            </div>
                            <div class="most-recent-capt">
                                <h4><a href="latest_news.html">Most Beautiful Things to Do in Sidney with Your BF</a></h4>
                                <p>Jhon  |  3 hours ago</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Whats New End -->
    <div class="weekly2-news-area gray-bg">
        <div class="container border-bottom "></div>
    </div>
    <!--   Weekly2-News start -->
    <div class="weekly2-news-area pt-50 pb-30 gray-bg">
        <div class="container">
            <div class="weekly2-wrapper">
                <div class="row">

                    <div class="col-lg-12">
                        <div class="slider-wrapper">
                            <!-- section Tittle -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="small-tittle mb-30">
                                        <h4>Bài học nổi bật</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- Slider -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="weekly2-news-active d-flex">
                                        <!-- Single -->
                                        <div class="weekly2-single">
                                            <div class="weekly2-img">
                                                <img src="assets/img/gallery/weeklyNews1.png" alt="">
                                            </div>
                                            <div class="weekly2-caption">
                                                <h4><a href="#">Scarlett’s disappointment at latest accolade</a></h4>
                                                <p>Jhon  |  2 hours ago</p>
                                            </div>
                                        </div>  
                                        <!-- Single -->
                                        <div class="weekly2-single">
                                            <div class="weekly2-img">
                                                <img src="assets/img/gallery/weeklyNews2.png" alt="">
                                            </div>
                                            <div class="weekly2-caption">
                                                <h4><a href="#">Scarlett’s disappointment at latest accolade</a></h4>
                                                <p>Jhon  |  2 hours ago</p>
                                            </div>
                                        </div> 
                                        <!-- Single -->
                                        <div class="weekly2-single">
                                            <div class="weekly2-img">
                                                <img src="assets/img/gallery/weeklyNews3.png" alt="">
                                            </div>
                                            <div class="weekly2-caption">
                                                <h4><a href="#">Scarlett’s disappointment at latest accolade</a></h4>
                                                <p>Jhon  |  2 hours ago</p>
                                            </div>
                                        </div> 
                                        <!-- Single -->
                                        <div class="weekly2-single">
                                            <div class="weekly2-img">
                                                <img src="assets/img/gallery/weeklyNews2.png" alt="">
                                            </div>
                                            <div class="weekly2-caption">
                                                <h4><a href="#">Scarlett’s disappointment at latest accolade</a></h4>
                                                <p>Jhon  |  2 hours ago</p>
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
    </div>           
    <!-- End Weekly-News -->


    <!--   Weekly3-News start -->
    <div class="weekly3-news-area pt-80 pb-130">
        <div class="container">
            <div class="weekly3-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="slider-wrapper">
                            <!-- Slider -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="weekly3-news-active dot-style d-flex">
                                        <div class="weekly3-single">
                                            <div class="weekly3-img">
                                                <img src="assets/img/gallery/weekly2News1.png" alt="">
                                            </div>
                                            <div class="weekly3-caption">
                                                <h4><a href="latest_news.html">What to Expect From the 2020 Oscar Nomin ations</a></h4>
                                                <p>19 Jan 2020</p>
                                            </div>
                                        </div> 
                                        <div class="weekly3-single">
                                            <div class="weekly3-img">
                                                <img src="assets/img/gallery/weekly2News2.png" alt="">
                                            </div>
                                            <div class="weekly3-caption">
                                                <h4><a href="latest_news.html">What to Expect From the 2020 Oscar Nomin ations</a></h4>
                                                <p>19 Jan 2020</p>
                                            </div>
                                        </div> 
                                        <div class="weekly3-single">
                                            <div class="weekly3-img">
                                                <img src="assets/img/gallery/weekly2News3.png" alt="">
                                            </div>
                                            <div class="weekly3-caption">
                                                <h4><a href="latest_news.html">What to Expect From the 2020 Oscar Nomin ations</a></h4>
                                                <p>19 Jan 2020</p>
                                            </div>
                                        </div>
                                        <div class="weekly3-single">
                                            <div class="weekly3-img">
                                                <img src="assets/img/gallery/weekly2News4.png" alt="">
                                            </div>
                                            <div class="weekly3-caption">
                                                <h4><a href="latest_news.html">What to Expect From the 2020 Oscar Nomin ations</a></h4>
                                                <p>19 Jan 2020</p>
                                            </div>
                                        </div> 
                                        <div class="weekly3-single">
                                            <div class="weekly3-img">
                                                <img src="assets/img/gallery/weekly2News2.png" alt="">
                                            </div>
                                            <div class="weekly3-caption">
                                                <h4><a href="latest_news.html">What to Expect From the 2020 Oscar Nomin ations</a></h4>
                                                <p>19 Jan 2020</p>
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
    </div>           
    <!-- End Weekly-News -->

</main>
@endsection