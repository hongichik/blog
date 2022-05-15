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
                                        <img src="{{ $Hot['image'] }}" alt="">
                                        <div class="trend-top-cap">
                                            <h2><a href="../../../../../../bai-viet/{{ $Hot['name'] }}">{{ $Hot['name'] }}</a></h2>
                                            <p>Được viết lúc {{ date("jS m Y",strtotime($Hot['time'])) }}</p>
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
                            @foreach($Hot['arrayNewChilds'] as $arrayNewChild)
                                <div class="col-lg-12 col-md-6 col-sm-6" style="max-width: 80%;">
                                    <div class="trending-top mb-30">
                                        <div class="trend-top-img">
                                            <img src="{{ $arrayNewChild['image'] }}">
                                            <div class="trend-top-cap trend-top-cap2">
                                                <h2><a href="../../../../../../bai-viet/{{ $arrayNewChild['name'] }}">{{ $arrayNewChild['name'] }}</a></h2>
                                                <p>Được viết lúc {{ date("jS m Y",strtotime($arrayNewChild['time'])) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>                            
                            @endforeach
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
                                        @for($i = 0; $i<count($arrayPosts);$i++)
                                            <a class="nav-item nav-link <?php if($i == 0){echo "active";} else {echo "";};?>" id="nav-{{ $arrayPosts[$i]['category'] }}-tab" 
                                            data-toggle="tab" href="#nav-{{$i}}" 
                                            role="tab" aria-controls="nav-{{ $arrayPosts[$i]['category'] }}" 
                                            aria-selected="<?php if($i == 0){echo "true";} else {echo "false";};?>">
                                            {{ $arrayPosts[$i]['category'] }}
                                        </a>
                                        @endfor
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
                                @for($i = 0; $i<count($arrayPosts);$i++)
                                <div class="tab-pane fade <?php if($i == 0){echo "show active";} else {echo "";};?>" id="nav-{{ $i }}" role="tabpanel" aria-labelledby="nav-{{ $arrayPosts[$i]['category'] }}-tab">       
                                    <div class="row">
                                        <!-- Left Details Caption -->
                                        <div class="col-xl-6 col-lg-12">
                                            <div class="whats-news-single mb-40 mb-40">
                                                <div class="whates-img boder">
                                                    <img src="{{ $arrayPosts[$i]['image'] }}" alt="">
                                                </div>
                                                <div class="whates-caption">
                                                    <h4><a href="../../../../../../bai-viet/{{ $arrayPosts[$i]['name'] }}">{{ $arrayPosts[$i]['name'] }}</a></h4>
                                                    <span>Được viết lúc {{ date("jS m Y",strtotime($arrayPosts[$i]['time'])) }}</span>
                                                    <p>{{$arrayPosts[$i]['summary']}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Right single caption -->
                                        <div class="col-xl-6 col-lg-12">
                                            <div class="row">
                                                <!-- single -->
                                                @for($y = 0; $y<count($arrayPosts[$i]['arrayNewChild']);$y++)
                                                    <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                        <div class="whats-right-single mb-20 d-flex">
                                                            <div class="whats-right-img col-6">
                                                                <img class="w-100" src="{{$arrayPosts[$i]['arrayNewChild'][$y]['image']}}" alt="">
                                                            </div>
                                                            <div class="whats-right-cap flex-grow-1">
                                                                <h4><a href="../../../../../../bai-viet/{{$arrayPosts[$i]['arrayNewChild'][$y]['name']}}">{{$arrayPosts[$i]['arrayNewChild'][$y]['name']}}</a></h4>
                                                                <p>Được viết lúc {{ date("jS m Y",strtotime($arrayPosts[$i]['arrayNewChild'][$y]['time'])) }}</p> 
                                                            </div>
                                                        </div>
                                                    </div>

                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endfor
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
                            <h4>Bài viết hay</h4>
                        </div>
                        <!-- Details -->
                        <div class="most-recent mb-40">
                            <div class="most-recent-img">
                                <img src="{{$arrayBlog[0]['image']}}" alt="">
                                <div class="most-recent-cap">
                                    <h4><a href="../../../../../../bai-viet/{{$arrayBlog[0]['name']}}">{{$arrayBlog[0]['name']}}</a></h4>
                                    <p>Được viết lúc {{ date("jS m Y",strtotime($arrayBlog[0]['time'])) }}</p>
                                </div>
                            </div>
                        </div>
                        <!-- Single -->
                        @for($i = 1; $i<count($arrayBlog);$i++)
                            <div class="most-recent-single d-flex">
                                <div class="most-recent-images col-6">
                                    <img src="{{$arrayBlog[$i]['image']}}" alt="" class="w-100">
                                </div>
                                <div class="most-recent-capt flex-grow-1">
                                    <h4><a href="../../../../../../bai-viet/{{$arrayBlog[$i]['name']}}">{{$arrayBlog[$i]['name']}}</a></h4>
                                    <p>Được viết lúc {{ date("jS m Y",strtotime($arrayBlog[$i]['time'])) }}</p>
                                </div>
                            </div>  
                        @endfor                     
                    </div>
                </div>
            </div>
        </div>
    </section>


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

                                        @foreach($RamdomPosts as $RamdomPost)
                                        <div class="weekly3-single">
                                            <div class="weekly3-img">
                                                <img src="{{$RamdomPost['image']}}" alt="">
                                            </div>
                                            <div class="weekly3-caption">
                                                <h4><a href="../../../../../../bai-viet/{{$RamdomPost['name']}}">{{$RamdomPost['name']}}</a></h4>
                                                <p>Được viết lúc {{ date("jS m Y",strtotime($RamdomPost['time'])) }}</p>
                                            </div>
                                        </div> 
                                        @endforeach
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