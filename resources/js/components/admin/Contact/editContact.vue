<template>
    <div class="card">
        <h5 class="card-header">Sửa trang giới thiệu</h5>
        <div class="card-body">
            <form>
                <div class="form-group">
                    <label for="inputUserName">Chỉnh sửa trang giới thiệu</label>
                    <ckeditor v-model="editorData" :config="editorConfig" :editor-url="editorUrl" ></ckeditor>
                    
        
                </div>
                <div class="col-lg-12 mt-1 mb-1 ">
                    <span  style="color:#4dc532;font-size: 1em">{{Success}}</span>
                </div>    
                <div class="col-lg-12 mt-1 mb-1 ">
                    <span  style="color:red;font-size: 1em">{{Fail}}</span>
                </div>                               
                <div class="row">

                    <div class="col-sm-6 pl-0">
                        <p class="text-right">
                            <button type="button"  @click="EditContact()" class="btn btn-space btn-primary">Lưu</button>
                            <button type="button" @click="Cancel()" class="btn btn-space btn-secondary">Hủy</button>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>


<script>
export default {
    data() {
        return {
            editorUrl: "https://cdn.ckeditor.com/4.14.1/full-all/ckeditor.js",
            editorData: '',
            Success: "",
            Fail: "",
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
        };
    },
    created () {
      this.CheckPermissin()
      this.showContact();
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
        async showContact()
        {
            axios.defaults.headers.post['Accept'] = 'application/json'
            await axios.get('/api/ContactShow',{
                    headers: {
                    Accept: 'application/json'
                }
            })
            .then(data => {
                this.editorData = data.data;
            })
            .catch(error=>{
                console.log(error);
            })
        },

        async EditContact()
        {
            let fromData = new FormData();
            fromData.append('editorData',this.editorData);
            axios.defaults.headers.post['Accept'] = 'application/json'
            await axios.post('/api/ContactEdit',fromData,{
                    headers: {
                    Accept: 'application/json'
                }
            })
            .then(data => {
                this.Success = "Sửa thành công"
                this.Fail = ""
                this.editorData = data.data;
            })
            .catch(error=>{
                this.Success = ""
                this.Fail = "Sửa thất bại"
            })
        },

        Cancel(){
            this.showContact();
            this.Success = ""
            this.Fail = ""            
        }
    },

    
}
</script>