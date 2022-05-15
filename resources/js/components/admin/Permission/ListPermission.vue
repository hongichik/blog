<template>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Danh sách tài khoản</h5>
            <div class="card-body">
                <div class="form-group ">
                    <button @click="btnAddAcount()" type="button" class="btn btn-primary">Thêm mới tài khoản</button>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-1">STT</th>
                            <th class="col-4">Họ tên</th>
                            <th class="col-5">Gamil</th>
                            <th class="col-2">Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(data,index) in Admin" :key="data.value">
                            <th class="col-1">{{index+1}}</th>
                            <td>{{data.name}}</td>
                            <td>{{data.email}}</td>
                            <td>
                                <div class="form-group ml-3">
                                    <button @click="btnEditAcount(data.id)" type="button" class="btn btn-primary">Sửa</button>
                                    <button @click="btnDeleteAcount(data.id)" type="button"  class="btn btn-danger">Xóa</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
export default {
  data () {
    return {
        Admin:"",
    }
  },
  created () {
      this.getAllAdmin()
  },
  methods: {
    btnEditAcount(id){
        this.$router.push({path: '/EditPermission/'+id});
    },
    async btnDeleteAcount(id){
        await axios.get('/api/DeleteAcount?id='+id,{
                headers: {
                Accept: 'application/json'
            }
        })
        .then(data => {
            this.getAllAdmin();
        })
        .catch(error=>{
            console.log("lỗi");
        })
    },
    btnAddAcount(){
        this.$router.push({path: '/newPermission'});
    },
    async getAllAdmin(){
        await axios.get('/api/GetAllAdmin',{
                headers: {
                Accept: 'application/json'
            }
        })
        .then(data => {
            this.Admin = data.data;
            console.log(this.Admin);
        })
        .catch(error=>{
            console.log("lỗi");
        })
    },
  },

}
</script>