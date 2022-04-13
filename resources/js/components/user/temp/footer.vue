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
                                    <a href=""><img src="/api/ShowImg/logo2_footer.png" alt=""></a>
                                </div>
                                <div class="footer-tittle">
                                    <div class="footer-pera">
                                        <p class="info1">{{InfoWeb.target}}</p>
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
                                    <p class="info2">{{InfoWeb.memberOne}}</p>
                                    <p class="info2">{{InfoWeb.menberTow}}</p>
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
                                    <p class="info2">Gmail: {{InfoWeb.GmailFooter}}</p>
                                    <p class="info2">Số điện thoại: {{InfoWeb.numberFooter}}</p>
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
  Được phát triển vào năm  &copy;2022 Với mục đính giao lưu và cùng nhau học tập | Trưởng nhóm <a :href="InfoWeb.LinkFBFooter" target="_blank">{{InfoWeb.memberOne}}</a>
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
data () {
    return {
        InfoWeb:"",
    }
},
created () {
    this.showInfo();
},
methods: {
    async showInfo()
    {
        axios.defaults.headers.post['Accept'] = 'application/json'
        await axios.get('/api/InfoShow',{
                headers: {
                Accept: 'application/json'
            }
        })
        .then(data => {
            this.InfoWeb = data.data;
        })
        .catch(error=>{
            console.log(error);
        })
    },
}
}
</script>