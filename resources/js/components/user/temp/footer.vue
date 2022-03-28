<template>
<footer>
    <!-- Footer Start-->
    <div class="footer-main footer-bg">
        <div class="footer-area pt-5">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-3 col-lg-3 col-md-5 col-sm-8">
                        <div class="single-footer-caption mb-50">
                            <div class="single-footer-caption mb-30">
                                <!-- logo -->
                                <div class="footer-logo">
                                    <router-link to="/"><img :src="logo_footer" alt=""></router-link>
                                </div>
                                <div class="footer-tittle">
                                    <div class="footer-pera">
                                        <p class="info1">{{target}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-5 col-sm-7">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Được viết bởi</h4>
                            </div>
                            <div class="footer-tittle">
                                <div class="footer-pera">
                                    <p class="info2">{{member_one}}</p>
                                    <p class="info2">{{menber_tow}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-5 col-sm-7">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Thông tin chung</h4>
                            </div>
                            <div class="footer-tittle">
                                <div class="footer-pera">
                                    <p class="info2">Gmail: {{Gmail_footer}}</p>
                                    <p class="info2">Số điện thoại: {{number_footer}}</p>
                                </div>
                            </div>                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer-bottom aera -->
        <div class="footer-bottom-area footer-bg">
            <div class="container">
                <div class="footer-border">
                    <div class="row d-flex align-items-center">
                        <div class="col-xl-12 ">
                            <div class="footer-copy-right text-center">
                                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Được phát triển vào năm  &copy;2022 Với mục đính giao lưu và cùng nhau học tập | Trưởng nhóm <a :href="Link_fb_footer" target="_blank">{{member_one}}</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
</footer>
</template>

<script>
export default {

props: ['target','member_one','menber_tow','logo_footer','Gmail_footer','number_footer','Link_fb_footer'],

}
</script>