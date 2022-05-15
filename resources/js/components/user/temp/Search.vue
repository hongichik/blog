<template>
<!-- Search model Begin -->
<div class="search-model-box" id="search-model-box">
    <div class="d-flex align-items-center h-100 justify-content-center">
        <button  class="search-close-btn">+</button>
        <form class="search-model-form" >
            <input @keyup.enter="onSearch()" v-model="search" type="text" id="search-input" placeholder="Bạn muốn tìm kiếm gì?" autocomplete="off">
        </form>
    </div>
</div>
<!-- Search model end -->
</template>

<script>

export default {
data () {
    return {
        search:"",
    }
},
methods: {
    onSearch(){
        window.location.href = window.location.protocol+'//'+window.location.host+"/Search/"+this.search+'/1';
    },
}
}
</script>