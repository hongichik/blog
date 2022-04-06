<template>
    <div class="card">
        <h5 class="card-header">Thông tin chung</h5>
        <div class="card-body">
            <div>
                <div class="form-group col-5">
                    <label>Phương châm</label>
                    <input v-model="info.slogan" class="form-control" type="text"  autocomplete="off" >
                </div>
                <div class="form-group col-5">
                    <label>Mục tiêu</label>
                    <textarea v-model="info.target" class="form-control" rows="4" cols="50" type="text" autocomplete="off" ></textarea>
                </div>
                <div class="form-group col-5">
                    <label>Số điện thoại đầu trang</label>
                    <input v-model="info.numberHeader" class="form-control" type="text" autocomplete="off" >
                </div>
                <div class="form-group col-5">
                    <label>Số điện thoại cuối trang</label>
                    <input v-model="info.numberFooter" class="form-control" type="text"  autocomplete="off" >
                </div>
                <div class="form-group col-5">
                    <label>Gmail</label>
                    <input v-model="info.GmailFooter" class="form-control" type="text"  autocomplete="off" >
                </div>
                <div class="form-group col-5">
                    <label>Tên người tạo web 1</label>
                    <input v-model="info.memberOne" class="form-control" type="text"  autocomplete="off" >
                </div>
                <div class="form-group col-5">
                    <label>Link FB người tạo web 1</label>
                    <input v-model="info.LinkFBFooter" class="form-control" type="text"  autocomplete="off" >
                </div>
                <div class="form-group col-5">
                    <label>Tên người tạo web 2</label>
                    <input v-model="info.menberTow" class="form-control" type="text"  autocomplete="off" >
                </div>
                <div class="form-group col-5">
                    <label>Logo Chính</label>
                    <div class="image-box text-center border d-flex" style="margin-top: 1em;height: 10em;width: 20em;cursor: pointer;overflow: hidden;">
                        <p style="position: relative;top: 45%;color:rgb(255 255 255 / 0%);"></p>
                        <img :src="info.logoHeader" alt="" style="width: 100%;" class="m-auto">
                    </div>
                    <button class="file-upload">            
                        <input type="file" class="file-input" accept="image/*">
                        <h3 class="p-0 m-0">Đổi ảnh</h3>
                    </button>
                </div>
                <div class="form-group col-5">
                    <label>Logo cuối trang</label>
                    <div class="image-box text-center border d-flex" style="margin-top: 1em;height: 10em;width: 20em;cursor: pointer;overflow: hidden;">
                        <img :src="info.logoFooter" alt="" style="width: 100%;" class="m-auto">
                    </div>
                    <button class="file-upload">            
                        <input type="file" class="file-input" accept="image/*" >
                        <h3 class="p-0 m-0">Đổi ảnh</h3>
                    </button>
                </div>
                <div class="form-group col-5">
                    <label>Logo tải trang</label>
                    <div class="image-box text-center border d-flex" style="margin-top: 1em;height: 10em;width: 20em;cursor: pointer;overflow: hidden;">
                        <img :src="info.logoLoadPage" alt="" style="width: 100%;" class="m-auto">
                    </div>
                    <button class="file-upload">            
                        <input type="file" class="file-input" accept="image/*">
                        <h3 class="p-0 m-0">Đổi ảnh</h3>
                    </button>
                </div>
                <div class="form-group col-5">
                    <label>Icon</label>
                    <div class="image-box text-center border" style="margin-top: 1em;height: 2em;width: 2em;cursor: pointer;overflow: hidden;">
                        <img :src="info.icon" alt="" style="height: 100%;">
                    </div>
                    <button class="file-upload">            
                        <input type="file" class="file-input" accept=".ico">
                        <h3 class="p-0 m-0">Đổi ảnh</h3>
                    </button>
                </div>
                <div class="row">
                    <div class="col-sm-6 pl-0">
                        <p class="text-right">
                            <button @click="Save()" class="btn btn-space btn-primary">Lưu chỉnh sửa</button>
                            <button @click="Cancel()" class="btn btn-space btn-secondary">Hủy</button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {

  data () {
    return {
        info:"",
    }
  },
  created () {
      this.CheckPermissin()
      this.showInfo();
  },
  methods: {
      async CheckPermissin()
      {
        axios.defaults.headers.post['Accept'] = 'application/json'
        await axios.get('/api/CheckPermission?Permission='+'Manage-Info-Web',{
            headers: {
            Accept: 'application/json'
            },
        })
        .then(data => {
            if(!data.data)
                this.$router.push({name: 'home'});
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
            this.info = data.data;
        })
        .catch(error=>{
            console.log(error);
        })
    },
    Cancel(){
        this.showInfo();
    },
    Save(){
        alert("chức năng đang phát triển");
    }
  },
    
}
</script>