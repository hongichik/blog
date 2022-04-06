<template>
<div class="card">
    <h5 class="card-header">Sửa danh mục sản phẩm</h5>
    <div class="card-body">
        <form>
            <div class="form-group">
                <label class="col-form-label">Tên danh mục</label>
                <input type="text" v-model="CategoryName" class="form-control col-4">
            </div>
            <div class="col-lg-12 mt-1 mb-1 ">
                <span  style="color:red;font-size: 1em">{{errors.name}}</span>
            </div>
            <div v-if="parent" class="form-group col-4 pl-0 pr-0">
                <label class="col-form-label">Cấp độ</label>
                <div class="dropdown">
                    <input class="form-control" v-model="parentName" readonly  type="text" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                    <div class="dropdown-menu w-100 dropdown-category"  aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" @click="addParentId(0)" href="#">Chọn làm danh mục cha</a>
                        <p class="pt-2 m-0 border-top text-center">Chọn làm danh mục con của</p>
                        <a v-for="(data)  in parentCategories" :key="data.value" v-show="!(data.name === 'Blog')" class="dropdown-item" @click="addParentId(data.id,data.name)">{{data.name}}</a>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button @click="Update()" type="button" class="btn btn-primary">Lưu</button>
                <button type="button" @click="Calcel()" class="btn btn-danger">Hủy</button>
            </div>
        </form>
    </div>
</div>
</template>

<script>
export default {
    data(){
        return {
            id: "",
            parentCategories: "",
            parentName:"Chưa chọn",
            parentId:null,
            parent: true,
            CategoryName:"", 
            errors:{
                    name:""
                },
        }
    },
    created () {
        this.CheckPermissin()
        if(this.$route.params.id == "")
            this.$router.push({path: '/'});
        else
            this.id = this.$route.params.id;
        this.getParentCategory();
        this.getCategories();
    },
    methods: {
      async CheckPermissin()
      {
        axios.defaults.headers.post['Accept'] = 'application/json'
        await axios.get('/api/CheckPermission?Permission='+'Manage-Category',{
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
      async getParentCategory()
      {
        axios.defaults.headers.post['Accept'] = 'application/json'
        await axios.get('/api/listCategory',{
                headers: {
                Accept: 'application/json'
            }
        })
        .then(data => {
            
            this.parentCategories = data.data;
        })
        .catch(error=>{
            console.log(error);
        })
      },

    async getCategories()
      {
        axios.defaults.headers.post['Accept'] = 'application/json'
        await axios.get('/api/Category?id='+this.id,{
                headers: {
                Accept: 'application/json'
            }
        })
        .then(data => {
            if(data.data == "")
                this.$router.push({path: '/'});
            this.CategoryName = data.data.name;
            this.parentId = data.data.ParentId
            if(this.parentId == null)
                this.parent = false
            this.parentCategories.forEach(data => {
                if(data.id == this.parentId)
                    this.parentName = data.name
            });
        })
        .catch(error=>{
            console.log(error);
        })
      },

    addParentId($id,$name){
        if($id == 0)
        {
            this.parentName = "Danh mục cha"
            this.parentId = null
        }
        else
        {
            this.parentName = $name
            this.parentId = $id
        }
        
    },
    Calcel(){
        this.getCategories();
        this.deleteError();
    },
    async Update () { 
        let fromData = new FormData();
        fromData.append('name',this.CategoryName);
        fromData.append('id',this.id);
        if(this.parentId != null)
            fromData.append('ParentId',this.parentId);
        else
            fromData.append('ParentId',"");
        axios.defaults.headers.post['Accept'] = 'application/json'
        await axios.post('/api/UpdateCategory', fromData,{
                headers: {
                Accept: 'application/json'
            }
        })
        .then(data => {
            this.$router.push({path: '/ListCategory'});

        })
        .catch(error=>{
            this.showError(error);
        })
    },

      showError($error){
          this.deleteError()
          if($error.response.data.errors.name)
          {
              this.errors.name = $error.response.data.errors.name[0]
          }
      },

      deleteError(){
          this.errors.name = ""
      },    

    

    }
    
}
</script>