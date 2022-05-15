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
                                    <li class="title colorb"><span class="flaticon-energy"></span>{{InfoWeb.slogan}}</li>
                                </ul>
                            </div>
                            <div class="header-info-right">
                                <ul class="header-date">
                                    <li><span class="flaticon-calendar"></span>{{InfoWeb.numberHeader}}</li>
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
                            <a href="/" target="_self"><img style="padding: 9px 0px;" src="/api/ShowImg/logo.png" alt=""></a>
                        </div>
                        <div class="col-xl-8 col-lg-9 col-md-9 header-flex">
                            <div class="main-menu d-none d-md-block">
                                <nav>
                                    <ul id="navigation">
                                        <li> <a href="/about">Giới thiệu</a></li>
                                        <li v-for="Categoriy in Categories" :key="Categoriy.value">
                                            <a :href="'/'+Categoriy.name+'/1'">{{Categoriy.name}}</a>
                                            
                                            <ul v-if="Categoriy.Chill[0] != null" class="submenu">
                                                <li v-for="CategoriyChild in Categoriy.Chill" :key="CategoriyChild.value">
                                                    <a :href="'/'+Categoriy.name+'/'+CategoriyChild.name+'/1'">{{CategoriyChild.name}}</a>
                                                </li>
                                            </ul>
                                        </li>
                                        
                                        <li><a href="/contact">Liên hệ</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>  

                        <div class="col-xl-2 col-lg-2 col-md-2">
                            <div class="header-right f-right d-none d-xl-block">
                                <div class="nav-search search-switch">
                                    <i @click="btn()" class="fa fa-search"></i>
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
data () {
    return {
        Categories:"Đã nhận",
        InfoWeb:"",
    }
},

created () {
    this.showInfo();
    this.getCategories();
},

methods: {
    btn(){
        document.getElementById('search-model-box').style.display  =  "block";
    },
    async getCategories()
    {
        axios.defaults.headers.post['Accept'] = 'application/json'
        await axios.get('/api/listCategory',{
                headers: {
                Accept: 'application/json'
            }
        })
        .then(data => {
            this.Categories = data.data;
        })
        .catch(error=>{
            console.log(error);
        })
    },
    
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
},
}
</script>