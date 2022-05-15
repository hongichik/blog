<template>
    <div >
        <div class="form-group">
        <div class="input-group mb-3">
            <input v-model="search" @keyup.enter="onSearch()" type="text" class="form-control" placeholder='Tìm kiếm từ khoá'
                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Tìm kiếm từ khóa'">
            <div class="input-group-append">
                <button @click="onSearch()" class="btns" type="button"><i class="ti-search"></i></button>
            </div>
        </div>
        </div>
    
    </div>
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