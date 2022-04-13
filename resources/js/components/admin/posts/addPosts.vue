<template>
    <div class="card">
        <h5 class="card-header">Thêm bài viết mới</h5>
        <div class="card-body">
            <div>
                <div class="form-group col-5">
                    <label>Tên bài viết (Nhỏ hơn 60 ký tự)</label>
                    <input v-model="namePosts" class="form-control" type="text"  autocomplete="off" maxlength="60" >
                </div>
                <div class="col-lg-12 mt-1 mb-1 ">
                    <span  style="color:red;font-size: 1em">{{errors.namePosts}}</span>
                </div>    
                <div class="form-group col-4">
                    <label class="col-form-label">Danh mục</label>
                    <div class="dropdown">
                        <input class="form-control" v-model="parentName" readonly  type="text" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                        <div class="dropdown-menu w-100 dropdown-category"  aria-labelledby="dropdownMenuButton">
                            <a v-for="(data)  in Categories" :key="data.value" class="dropdown-item" @click="addCategoryId(data.id,data.name)">{{data.name}}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 mt-1 mb-1 ">
                    <span  style="color:red;font-size: 1em">{{errors.Category_id}}</span>
                </div>    
                <div class="form-group col-2">
                    <label>Ảnh</label>
                    <button class="d-block  btn btn-outline-primary " style="position: relative;min-width: 100%;padding-bottom: 32%; padding-top: 32%; ">            
                        <div class="h-100 w-100 d-flex" style="position: absolute; top: 0; right: 0;">
                            <img src="data:image/gif;base64,R0lGODlhAQABAAAAACwAAAAAAQABAAA=" id="img" class="m-auto w-100 h-100" style="object-fit: contain;">
                        </div>
                        <div class="h-100 w-100 d-flex" style="position: absolute; top: 0; right: 0;">
                            <i class="fa fa-2x fa-solid fa-plus m-auto" ></i>
                        </div>
                        <input @change="addImg()" type="file" ref="FileImg" class="h-100 w-100" style="position: absolute; top: 0; right: 0; opacity: 0;" accept="image/*">
                    </button>
                </div>
                <div class="col-lg-12 mt-1 mb-1 ">
                    <span  style="color:red;font-size: 1em">{{errors.img}}</span>
                </div> 
                <div class="form-group col-12">
                    <label>Tóm tắt</label>
                    <textarea v-model="summary" class="form-control col-6" rows="4" cols="50" type="text" autocomplete="off"></textarea>
                </div>
                <div class="col-lg-12 mt-1 mb-1 ">
                    <span  style="color:red;font-size: 1em">{{errors.summary}}</span>
                </div> 
                <div v-if="(parentName === 'Blog')" class="form-group col-12">
                    <label>Nội dung</label>
                    <ckeditor v-model="Content" :config="editorConfig" :editor-url="editorUrl" ></ckeditor>

                </div>
                <div v-if="(parentName === 'Blog')" class="col-lg-12 mt-1 mb-1 ">
                    <span  style="color:red;font-size: 1em">{{errors.Content}}</span>
                </div> 


                <div class="col-lg-12 mt-1 mb-1 ">
                    <span  style="color:#4dc532;font-size: 1em">{{Success}}</span>
                </div>
                <div class="row">
                    <div class="col-sm-6 pl-0">
                        <p class="text-right">
                            <button v-if="!(parentName === 'Blog')" @click="addPost()" class="btn btn-space btn-primary">Lưu</button>
                            <button v-if="(parentName === 'Blog')" @click="addPostBlog()" class="btn btn-space btn-primary">Lưu</button>
                            <button class="btn btn-space btn-secondary" @click="Calcel(1)">Làm lại</button>
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
        namePosts: "",
        summary:"",
        Categories: "",
        parentName:"Chưa chọn",
        Category_id:null,
        CategoryName:"", 
        Content: '',
        errors:{
                namePosts:"",
                summary:"",
                Category_id:"",
                img:"",
                Content:"",
            },
        Success: "",


        //ckediter config
        editorUrl: "https://cdn.ckeditor.com/4.14.1/full-all/ckeditor.js",
        editorConfig: {
            toolbarGroups : [
                { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
                { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                { name: 'forms', groups: [ 'forms' ] },
                { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                { name: 'links', groups: [ 'links' ] },
                { name: 'insert', groups: [ 'insert' ] },
                { name: 'styles', groups: [ 'styles' ] },
                { name: 'colors', groups: [ 'colors' ] },
                { name: 'tools', groups: [ 'tools' ] },
                { name: 'others', groups: [ 'others' ] },
                { name: 'about', groups: [ 'about' ] }
            ],
            removeButtons:'Blockquote,HorizontalRule,NumberedList,BulletedList,Save,NewPage,ExportPdf,Print,Templates,Replace,Find,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,CopyFormatting,RemoveFormat,CreateDiv,Language,PageBreak,About,Iframe,ShowBlocks,Anchor,Flash,Paste,PasteText,PasteFromWord,BidiRtl,BidiLtr',
            filebrowserUploadUrl : '/api/UploadImg',
        }
    }
  },
  created () {
      this.CheckPermissin()
      this.getCategory()
      if(this.$route.params.id == 0)
      {
        this.Category_id = null          
      }
      else 
        this.Category_id = this.$route.params.id
      this.parentName = this.$route.params.name;
  },
  methods: {
      async CheckPermissin()
      {
        axios.defaults.headers.post['Accept'] = 'application/json'
        await axios.get('/api/CheckPermission?Permission='+'Manage-Personal-Posts',{
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
      async addPostBlog(){
        if(this.showError() == 0)
        {
            const [file] = this.$refs.FileImg.files
            let fromData = new FormData();
            fromData.append('name',this.namePosts);
            fromData.append('category_id',this.Category_id);
            fromData.append('image',file);
            fromData.append('summary',this.summary);
            fromData.append('content',this.Content);
            axios.defaults.headers.post['Accept'] = 'application/json'
            await axios.post('/api/AddBlog',fromData,{
                    headers: {
                    Accept: 'application/json'
                }
            })
            .then(data => {

                if(this.$route.params.type == 0)
                {
                    this.$router.push({path: '/posts'});   
                }
                else
                    this.$router.push({path: '/AllPosts'});  
                this.Success = "Đã thêm thành công bài Blog mới"
                this.Calcel(1);
            })
            .catch(error=>{
                console.log(error);
            })
        }
      },
      async addPost(){

        if(this.showError() == 2)
        {
            const [file] = this.$refs.FileImg.files
            let fromData = new FormData();
            fromData.append('name',this.namePosts);
            fromData.append('category_id',this.Category_id);
            fromData.append('image',file);
            fromData.append('parent_id',"");
            fromData.append('summary',this.summary);
            axios.defaults.headers.post['Accept'] = 'application/json'
            await axios.post('/api/AddPost',fromData,{
                    headers: {
                    Accept: 'application/json'
                }
            })
            .then(data => {
                // console.log(data.data);
                this.$router.push({path: '/posts'});
                this.Success = "Đã thêm thành công bài viết mới"
                this.Calcel(1);
            })
            .catch(error=>{
                console.log(error.response.data);
            })
        }
      },
      addImg(){
          const [file] = this.$refs.FileImg.files
          document.getElementById('img').src = URL.createObjectURL(file);
      },
      async getCategory()
      {
        axios.defaults.headers.post['Accept'] = 'application/json'
        await axios.get('/api/CategoryShowChild',{
                headers: {
                Accept: 'application/json'
            }
        })
        .then(data => {
            this.Categories = data.data;
        })
        .catch(error=>{
            console.log(error.response.data);
        })
      },


      addCategoryId($id,$name){
          if($id == 0)
          {
              this.parentName = "Danh mục cha"
              this.Category_id = null
          }
          else
          {
              this.parentName = $name
              this.Category_id = $id
          }
      },
      showError(){
        this.deleteError()
        if(this.namePosts == "")
        {
            this.errors.namePosts = "Tên bài viết không được bỏ trống"
            return 1;
        }
        if(this.summary == "")
        {
            this.errors.summary = "Tóm tắt không được bỏ trống"
            return 1;
        }
        if(this.Category_id == null)
        {
            this.errors.Category_id = "Bạn cần chọn danh mục"
            return 1;
        }
        if(document.getElementById('img').src == "data:image/gif;base64,R0lGODlhAQABAAAAACwAAAAAAQABAAA=")
        {
            this.errors.img = "Bạn cần chọn ảnh cho bài viết"
            return 1;
        }
        if(this.Content == "")
        {
            this.errors.Content = "Nội dung bài viết không được bỏ trống"
            return 2;
        }
        return 0;
      },

      deleteError(){
        this.errors.namePosts = ""
        this.errors.summary = ""
        this.errors.Category_id = ""
        this.errors.img = ""
        this.errors.Content = ""
        this.Success = ""
      },
      Calcel($index){
        this.namePosts= "";
        this.summary="";
        this.parentName="Chưa chọn";
        this.Category_id=null;
        this.CategoryName=""; 
        this.Content= '';
        document.getElementById('img').src = "data:image/gif;base64,R0lGODlhAQABAAAAACwAAAAAAQABAAA="
        if($index == 1)
        {
            this.deleteError();
        }
      }
  },


    
}
</script>