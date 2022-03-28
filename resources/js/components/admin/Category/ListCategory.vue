<template>
    <div class="card">
        <h3 class="card-header">Danh sách danh mục</h3>
        <div class="card-body">
            <table class="table table-striped">
                <h4 class="p-0 m-0">Danh mục cha</h4>
                <div v-for="(data)  in Categories" :key="data.value" class=" ml-4 form-group p-0 border border-success p-3">
                    
                    <div class="d-flex ml-4">
                        <label class="col-form-label">Tên : {{data.name,}}</label>

                        <div class="form-group col-5">
                            <button @click="edit(data.id)" class="ml-1 btn btn-outline-primary btn-sm rounded-circle fa  fas fa-edit p-2"></button>
                            <button @click="Delete(data.id,data.name)" class="m-0 ml-2 btn btn-outline-danger btn-sm rounded-circle p-2 fas fa-trash-alt"></button>
                        </div>
                    </div>
                     <h5 v-if="data.Chill > []" class="ml-5">Danh mục con</h5>
                    <div v-for="(data)  in data.Chill" :key="data.value" class=" ml-5 form-group  border border-success p-3">
                        <div class="d-flex ml-3">
                            <label class="col-form-label">Tên : {{data.name}}</label>

                            <div class="form-group col-5">
                                <button @click="edit(data.id)" class="ml-1 btn btn-outline-primary btn-sm rounded-circle fa  fas fa-edit p-2"></button>
                                <button  @click="Delete(data.id,data.name)" class="m-0 ml-2 btn btn-outline-danger btn-sm rounded-circle p-2 fas fa-trash-alt"></button>
                            </div>
                        </div>

                    </div>
                </div>
            </table>
        </div>
        
    </div>
</template>


<script>
export default {
  data () {
    return {
        Categories: "",
    }
  },
  created () {
      this.getCategories()
  },
  methods: {
      async getCategories()
      {
        axios.defaults.headers.post['Accept'] = 'application/json'
        await axios.get('/api/listCategory',{
                headers: {
                Accept: 'application/json'
            }
        })
        .then(data => {
            console.log(data.data)
            this.Categories = data.data;
        })
        .catch(error=>{
            console.log(error);
        })
      },

      async Delete($id,$name)
      {
        let text = "Bạn có chắc chắn muốn xóa danh mục : "+$name;
        if (confirm(text) == true) {
            let fromData = new FormData();
            fromData.append('id',$id);
            axios.defaults.headers.post['Accept'] = 'application/json'
            await axios.post('/api/DeleteCategory',fromData,{
                    headers: {
                    Accept: 'application/json'
                }
            })
            .then(data => {
                this.getCategories()
            })
            .catch(error=>{
                console.log(error);
            })   
        }
      },

      edit($id){
        this.$router.push({path: '/EditCategory/edit-'+$id});
      }

      
  },


    
}
</script>