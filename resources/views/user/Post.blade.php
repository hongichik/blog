@extends('user.temp.Main')

@section('Content')
<main>
    <!-- About US Start -->
    <div class="about-area2 gray-bg pt-60 pb-60">
        <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Trending Tittle -->
                        <div class="about-right mb-0 white-bg p-5 shadow p-3 mb-5 bg-body rounded">
                           
                            <div class="heading-news mb-30 pt-30" >
                                <h4>
                                    <a href="/" target="_self">Home</a>
                                    @for($i = 0; $i<count($paths);$i++)
                                        /<a href="../{{ $paths[$i]['path']}}/1">{{ $paths[$i]['name']}}</a>
                                    @endfor
                                </h4>
                                <h3>{{ $name }}</h3>
                            </div>
                            {!! $container !!}
                        
                        </div>
                        <!-- From -->
                        <div class="social-share pt-0 mt-4">
                            <div class="section-tittle">
                                <h4 class="mr-20">Đóng góp ý kiến :</h4>
                            </div>
                        </div>
                        <user-feedback/>
                    </div>
                    <div class="col-lg-4 p-3 mb-5 bg-body rounded">
                        <div class="blog_right_sidebar">
                           <aside class="single_sidebar_widget search_widget">
                            <user-searchPost/>
                           </aside>
                           @if(isset($arraypostChild))
                                <aside class="single_sidebar_widget post_category_widget shadow-sm p-3 mb-5 bg-body rounded">
                                    <h4 class="widget_title">Các bài trong {{ $posts }}</h4>
                                    <ul class="list cat-list">
                                        @foreach($arraypostChild as $postChild)
                                            <li class="pb-0">
                                                <a href="../{{ $postChild['name'] }}/1" class="d-flex">
                                                    {{ $postChild['name'] }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </aside>
                            @endif
                           <aside class="single_sidebar_widget popular_post_widget shadow-sm p-3 mb-5 bg-body rounded">
                              <h3 class="widget_title">Bài viết đề xuất</h3>
                                @foreach($arrayPosts as $arrayPost)
                                    <div class="media post_item">
                                        <img style="height: 80px;width: 80px;object-fit: fill;" src="{{ $arrayPost['image'] }}" alt="post">
                                        <div class="media-body">
                                            <a href="../../../../../../bai-viet/{{ $arrayPost['name'] }}">
                                                <h3>{{ $arrayPost['name'] }}</h3>
                                                <p style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 2;line-clamp: 2;-webkit-box-orient: vertical;" class="about-pera1">
                                                    {{ $arrayPost['summary'] }}
                                                </p>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                              
                           </aside>
                           
                           
                          
                        </div>
                     </div>
                </div>
        </div>
    </div>
    <!-- About US End -->
</main>
    
@endsection