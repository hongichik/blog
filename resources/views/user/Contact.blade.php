@extends('user.temp.Main')

@section('Content')
<main style="min-height: 600px;">
    <div class="trending-area fix pt-25 gray-bg">
        <div class="container">
            <div class="trending-main">
                <div class="row">
                    <!-- ================ contact section start ================= -->
                    <section class="contact-section">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <h2 class="contact-title">Liên hệ</h2>
                                </div>
                                <div class="col-lg-8">
                                <user-contact/>
                                </div>
                                <div class="col-lg-3 offset-lg-1">
                                    <div class="media contact-info">
                                        <span class="contact-info__icon"><i class="ti-home"></i></span>
                                        <div class="media-body">
                                            <h3>Trường Đại Học Hạ Long</h3>
                                            <p>Cơ sở 2 Uông Bí, Quảng Ninh</p>
                                        </div>
                                    </div>
                                    <div class="media contact-info">
                                        <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                                        <div class="media-body">
                                            <h3>{{ $numberFooter }}</h3>
                                        </div>
                                    </div>
                                    <div class="media contact-info">
                                        <span class="contact-info__icon"><i class="ti-email"></i></span>
                                        <div class="media-body">
                                            <h3>Gmail: {{ $Gmail }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                        <!-- ================ contact section end ================= -->
                </div>
            </div>
        </div>
    </div> 
</main> 

@endsection