<template>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Tạo tài khoản</h5>
            <div class="card-body">
                <div>
                    <div>
                        <div class="form-group">
                            <label for="inputText3" class="col-form-label">Họ tên cộng tác viên</label>
                            <input id="inputText3" v-model="Fullname" placeholder="vd: Phạm Văn B" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputEmail">Email</label>
                            <input type="email" required v-model="Gmail"  placeholder="vd :vidu@gmail.com" class="form-control">
                            <label>{{this.error.Gmail}}</label>
                        </div>
                        <div class="form-group">
                            <label >Mật khẩu</label>
                            <input type="password" v-model="Pass" placeholder="Mật khẩu" class="form-control">
                        </div>
                        <div class="form-group">
                            <label >Nhập lại mật khẩu</label>
                            <input type="password" v-model="PassCheck" placeholder="Mật khẩu" class="form-control">
                        </div>
                    </div>
                    <label for="">{{error.All}}</label>
                    <h4>Quyền</h4>
                    <label v-for="(data) in Permission" :key="data.id" class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" :id="data.id" :value="data.id" v-model="selected" class="custom-control-input"><span class="custom-control-label">{{data.name}}</span>
                    </label>
                </div>
            </div>
            <div class="form-group ml-3">
                <button @click="NewAcount()" type="button" class="btn btn-primary">Tạo tài khoản</button>
                <button type="button" @click="Calcel()" class="btn btn-danger">Hủy</button>
            </div>
        </div>
    </div>
</template>

<script>

export default ({
  data () {
    return {
        Fullname: "",
        Gmail: "",
        Pass: "",
        PassCheck: "",
        Permission: "",
        selected: [],
        error:{
            Gmail: "",
            All:"",
        },
    }
  },
  created () {
      this.getPermission();
  },
  methods: {

       async getPermission(){
        await axios.get('/api/GetPermisson',{
                headers: {
                Accept: 'application/json'
            }
        })
        .then(data => {
            this.Permission = data.data;
        })
        .catch(error=>{
            console.log("lỗi");
        })
      },
      async NewAcount(){
          if(this.validateAll())
          {
            let fromData = new FormData();
            fromData.append('Fullname',this.Fullname);
            fromData.append('Gmail',this.Gmail);
            fromData.append('Pass',this.Pass);
            fromData.append('Permission',this.selected);

            axios.defaults.headers.post['Accept'] = 'application/json'
            await axios.post('/api/NewAccount', fromData,{
                    headers: {
                    Accept: 'application/json'
                }
            })
            .then(data => {
                this.$router.push({path: '/ListPermission'});
                this.Calcel();
            })
            .catch(error=>{
                this.error.All = "Gamil bị trùng"
            })
          }
      },
      validateAll() {
            if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.Gmail)) {
                
            } else {
                this.error.Gmail = "Gmail không đúng định giạng"
                return false;
            }
            if(this.Fullname == "" || this.Pass == "" || this.PassCheck == "")
            {
                this.error.All = "Không được phép bỏ trống thông tin"
                return false;
            }
            if(this.Pass != this.PassCheck)
            {
                this.error.All = "Mật khẩu nhập lại bị sai"
                return false;
            }
            this.error.Gmail = ""
            this.error.All = ""
            return true;
      },
      Calcel(){
        this.Fullname= ""
        this.Gmail= ""
        this.Pass= ""
        this.PassCheck= ""
        this.error.Gmail = ""
        this.error.All = ""

      }
  },

})
</script>
