<template>
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                <img :src="logo_load_page" alt="">
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {

props: ['logo_load_page'],

}
</script>