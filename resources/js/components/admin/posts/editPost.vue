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
                <div v-if="notContent" class="form-group col-12">
                    <label>Nội dung</label>
                    <ckeditor v-model="Content" :config="editorConfig" :editor-url="editorUrl" ></ckeditor>

                </div>
                <div v-if="notContent" class="col-lg-12 mt-1 mb-1 ">
                    <span  style="color:red;font-size: 1em">{{errors.Content}}</span>
                </div> 
                <div class="row">
                    <div class="col-sm-6 pl-0">
                        <p class="text-right">
                            <button @click="UpdatePost()" class="btn btn-space btn-primary">Lưu</button>
                            <button class="btn btn-space btn-secondary" @click="Calcel()">Làm lại</button>
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
        Content: '',
        notContent: false,
        image:'',
        errors:{
                namePosts:"",
                summary:"",
                img:"",
                Content:"",
            },


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
      this.getPost();
    //   this.$route.params.type
    //   alert(this.$route.params.id);
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
      async getPost(){
            axios.defaults.headers.post['Accept'] = 'application/json'
            await axios.get('/api/getPost?id='+this.$route.params.id,{
                    headers: {
                    Accept: 'application/json'
                }
            })
            .then(data => {
                console.log(data.data);
                this.namePosts = data.data.name;
                this.image = "/api/ShowImg/"+data.data.image;
                document.getElementById('img').src = this.image;
                if(data.data.content)
                {
                    this.Content = data.data.content;
                    this.notContent = true;
                }
                this.summary = data.data.summary;
            })
            .catch(error=>{
                console.log(error.response.data);
            })
      },
      async UpdatePost(){
        if(this.showError() == 0)
        {
            const [file] = this.$refs.FileImg.files
            let fromData = new FormData();
            fromData.append('id',this.$route.params.id);
            fromData.append('name',this.namePosts);
            let checkUploadImgae = document.getElementById('img').src.indexOf(this.image);
            if(checkUploadImgae >= 0 )
            {
                fromData.append('image',"0");
            }
            else
            {
                fromData.append('image',file);
            }
            fromData.append('summary',this.summary);
            if(this.notContent){
                fromData.append('content',this.Content);
            }
            axios.defaults.headers.post['Accept'] = 'application/json'
            await axios.post('/api/UpdatePost',fromData,{
                    headers: {
                    Accept: 'application/json'
                }
            })
            .then(data => {
                if(data.data == "1" && this.$route.params.type == 0)
                {
                    this.$router.push({path: '/posts'});
                }
                if(data.data == "1" && this.$route.params.type == 1)
                {
                    this.$router.push({path: '/AllPosts'});
                }
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
        if(document.getElementById('img').src == "data:image/gif;base64,R0lGODlhAQABAAAAACwAAAAAAQABAAA=")
        {
            this.errors.img = "Bạn cần chọn ảnh cho bài viết"
            return 1;
        }
        if(this.notContent)
        {
            if(this.Content == "")
            {
                this.errors.Content = "Nội dung bài viết không được bỏ trống"
                return 1;
            }
        }

        return 0;
      },

      deleteError(){
        this.errors.namePosts = ""
        this.errors.summary = ""
        this.errors.img = ""
        this.errors.Content = ""
      },
      Calcel(){
        this.getPost();
        this.deleteError();
      }
  },


    
}
</script>