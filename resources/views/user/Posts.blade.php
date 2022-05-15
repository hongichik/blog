@extends('user.temp.Main')

@section('Content')
<div class="about-area2 gray-bg pt-60 pb-60 col-12">
    <div class="container ">
            <div class="row col-12">
            <div class="col-lg-8">
                <div class="whats-news-wrapper">
                    @if(isset($error))
                        
                        <div class="row justify-content-between align-items-end mb-15">
                            <div class="col-xl-12">
                                <div class="section-tittle mb-30">
                                    <h4>{{ $error }}</h4>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="row justify-content-between align-items-end mb-15">
                            <div class="col-xl-12">
                                <div class="section-tittle mb-30">
                                    <h4>
                                        <a href="/" target="_self">Home</a>
                                        @for($i = 0; $i<count($paths);$i++)
                                            /<a href="../{{ $paths[$i]['path']}}/1">{{ $paths[$i]['name']}}</a>
                                        @endfor
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <!-- Tab content -->
                        <div class="row">
                            <div class="col-12">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">       
                                    <div class="row">
                                        
                                        @foreach ($arrayPosts as $arrayPost)
                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                            <div class="whats-news-single mb-40 mb-40">
                                                <div class="whates-img">
                                                    <img src="{{ $arrayPost['image'] }}" alt="">
                                                </div>
                                                <div class="whates-caption whates-caption2">
                                                    <h4><a href="{{ $arrayPost['name'] }}/1">{{ $arrayPost['name'] }}</a></h4>
                                                    <p style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 2;line-clamp: 2;-webkit-box-orient: vertical;">{{ $arrayPost['summary'] }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    @endif

                </div>
                </div>
                <div class="col-lg-4 p-3 mb-5 bg-body rounded">
                    <div class="blog_right_sidebar">
                       <aside class="single_sidebar_widget search_widget">
                        <user-searchpost/>
                       </aside>
                       <aside class="single_sidebar_widget popular_post_widget shadow-sm p-3 mb-5 bg-body rounded">
                        <h3 class="widget_title">Bài viết đề xuất</h3>
                          @foreach($RamdomPosts as $RamdomPost)
                              <div class="media post_item">
                                  <img style="height: 80px;width: 80px;object-fit: fill;" src="{{ $RamdomPost['image'] }}" alt="post">
                                  <div class="media-body">
                                    <a href="../../../../../../bai-viet/{{ $RamdomPost['name']}}">
                                        <h3>{{ $RamdomPost['name'] }}</h3>
                                        <p style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 2;line-clamp: 2;-webkit-box-orient: vertical;" class="about-pera1">
                                            {{ $RamdomPost['summary'] }}
                                        </p>
                                    </a>
                                  </div>
                              </div>
                          @endforeach
                        
                     </aside>
                    </div>
                 </div>
            </div>
            @if(!isset($error))
                @if($countPage != 1)
                <!--Start pagination (chuyển trang)--> 
                <div class="pagination-area  gray-bg pb-45 mt-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="single-wrap">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination justify-content-start">
                                            @if($page == 1)
                                                <li class="page-item"><a class="page-link">
                                                    <!-- SVG icon -->
                                                    <svg  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="15px">
                                                        <path fill-rule="evenodd"  fill="rgb(221, 221, 221)" d="M8.142,13.118 L6.973,14.135 L0.127,7.646 L0.127,6.623 L6.973,0.132 L8.087,1.153 L2.683,6.413 L23.309,6.413 L23.309,7.856 L2.683,7.856 L8.142,13.118 Z"/>
                                                        </svg>
                                                </span></a>
                                                </li>
                                            @else
                                                <li class="page-item"><a class="page-link" href="{{ $page-1 }}">
                                                    <!-- SVG icon -->
                                                    <svg  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="15px">
                                                        <path fill-rule="evenodd"  fill="rgb(255, 11, 11)" d="M8.142,13.118 L6.973,14.135 L0.127,7.646 L0.127,6.623 L6.973,0.132 L8.087,1.153 L2.683,6.413 L23.309,6.413 L23.309,7.856 L2.683,7.856 L8.142,13.118 Z"/>
                                                        </svg>
                                                </span></a>
                                                </li>
                                            @endif
                                            @if($countPage < 10)
                                                @for ($i = 1; $i <= $countPage; $i++)
                                                    <li class="page-item">
                                                        <a class="page-link" href="./{{ $i }}" <?php if($i == $page){ echo "style='color: red'";}?>>{{ $i }}</a>
                                                    </li>
                                                @endfor
                                            @else
                                                @for ($i = 1; $i <= 3; $i++)
                                                    <li class="page-item">
                                                        <a class="page-link" href="./{{ $i }}" <?php if($i == $page){ echo "style='color: red'";}?>>{{ $i }}</a>
                                                    </li>
                                                @endfor
                                                <li class="page-item">
                                                    <a class="page-link" >...</a>
                                                </li>
                                                @if($page > 3 and $page < $countPage-3)
                                                    <li class="page-item">
                                                        <a class="page-link" href="./{{ $page }}" style='color: red'>{{ $page }}</a>
                                                    </li>
                                                @endif
                                                <li class="page-item">
                                                    <a class="page-link" >...</a>
                                                </li>
                                                @for ($i = $countPage-3; $i <= $countPage; $i++)
                                                <li class="page-item">
                                                    <a class="page-link" href="./{{ $i }}" <?php if($i == $page){ echo "style='color: red'";}?>>{{ $i }}</a>
                                                </li>
                                            @endfor
                                            @endif
                                            @if($page == $countPage)
                                                <li class="page-item"><a class="page-link" href="">
                                                    <!-- SVG iocn -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="40px" height="15px">
                                                    <path fill-rule="evenodd"  fill="rgb(221, 221, 221)" d="M31.112,13.118 L32.281,14.136 L39.127,7.646 L39.127,6.624 L32.281,0.132 L31.167,1.154 L36.571,6.413 L0.491,6.413 L0.491,7.857 L36.571,7.857 L31.112,13.118 Z"/>
                                                    </svg>
                                                </span></a></li>
                                            @else
                                                <li class="page-item"><a class="page-link" href="{{ $page+1 }}">
                                                    <!-- SVG iocn -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="40px" height="15px">
                                                    <path fill-rule="evenodd"  fill="rgb(255, 11, 11)" d="M31.112,13.118 L32.281,14.136 L39.127,7.646 L39.127,6.624 L32.281,0.132 L31.167,1.154 L36.571,6.413 L0.491,6.413 L0.491,7.857 L36.571,7.857 L31.112,13.118 Z"/>
                                                    </svg>
                                                </span></a></li>
                                            @endif
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End pagination  -->
                @endif

            @endif









    </div>
</div>
@endsection