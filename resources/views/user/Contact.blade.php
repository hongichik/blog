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
                                    <form class="form-contact contact_form">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <textarea style="font-size: 1.2em;" class="form-control w-100 border-dark" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nội dung'" placeholder=" Nội dung"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input style="font-size: 1.2em;" class="form-control valid border-dark" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Họ và tên'" placeholder="Họ và tên">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input style="font-size: 1.2em;" class="form-control valid border-dark" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Gmail'" placeholder="Gmail">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="button-group-area mt-40">
                                            <button  class="genric-btn primary circle">Gửi</button>
                                        </div>
                                    </form>
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