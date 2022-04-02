<template>
    <div class="card">
    <h3 class="card-header">Thêm danh mục</h3>
    <div class="card-body">
        <form>

            <div class="form-group">
                <label class="col-form-label">Tên danh mục</label>
                <input type="text" v-model="CategoryName" class="form-control col-4">
            </div>
            <div class="col-lg-12 mt-1 mb-1 ">
                <span  style="color:red;font-size: 1em">{{errors.name}}</span>
            </div>
            <div class="form-group col-4 pl-0 pr-0">
                <label class="col-form-label">Cấp độ</label>
                <div class="dropdown">
                    <input class="form-control" v-model="parentName" readonly  type="text" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                    <div class="dropdown-menu w-100 dropdown-category"  aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" @click="addParentId(0)" href="#">Chọn làm danh mục cha</a>
                        <p class="pt-2 m-0 border-top text-center">Chọn làm danh mục con của</p>
                        <a v-for="(data)  in parentCategories" :key="data.value" v-show="!(data.name === Blog)" class="dropdown-item" @click="addParentId(data.id,data.name)">{{data.name}}</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 mt-1 mb-1 ">
                <span  style="color:#4dc532;font-size: 1em">{{Success}}</span>
            </div>
            <div class="form-group">
                <button type="button" @click="PostCategory()" class="btn btn-primary">Lưu</button>
                <button type="button" @click="Calcel()" class="btn btn-danger">Hủy</button>
            </div>
        </form>
    </div>
</div>
</template>

<script>
export default {
  data () {
    return {
        Blog: "Blog",
        parentCategories: "",
        parentName:"Chưa chọn",
        parentId:null,
        CategoryName:"", 
        
        errors:{
                name:""
            },
        Success: ""
    }
  },
  created () {
      this.getParentCategory()
  },
  methods: {
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

      async PostCategory()
      {
        let fromData = new FormData();
        fromData.append('name',this.CategoryName);
        if(this.parentId != null)
            fromData.append('ParentId',this.parentId);

        axios.defaults.headers.post['Accept'] = 'application/json'
        await axios.post('/api/newCategory', fromData,{
                headers: {
                Accept: 'application/json'
            }
        })
        .then(data => {
            this.deleteError()
            this.getParentCategory()
            this.parentId = null
            this.parentName = "Chưa chọn"
            this.CategoryName = ""
            this.Success = "Đã thêm thành công " + this.CategoryName
        })
        .catch(error=>{
            this.showError(error);
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
      showError($error){
          this.deleteError()
          if($error.response.data.errors.name)
          {
              this.errors.name = $error.response.data.errors.name[0]
          }
      },

      deleteError(){
          this.Success = ""
          this.errors.name = ""
      },
      Calcel(){
            this.parentId = null
            this.parentName = "Chưa chọn"
            this.CategoryName = ""
            this.Success = ""
      }
  },


    
}
</script>