<template>
    <div class="row">
    <div class="col-lg-8">
        <div class="form-contact contact_form mb-80">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <textarea class="form-control w-100 error" v-model="Content" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nhập tin nhắn'" placeholder="Nhập tin nhắn"></textarea>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input class="form-control error"  v-model="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nhập tên của bạn'" placeholder="Nhập tên của bạn">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input class="form-control error" v-model="Gamil" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" placeholder="Email">
                    </div>
                </div>
            </div>
            <label for="">{{error}}</label>
            <div class="form-group mt-3">
                <button @click="submit()"  class="button button-contactForm boxed-btn boxed-btn2">Gửi đóng góp</button>
            </div>
        </div>
        
    </div>
</div>
</template>

<script>

export default {
data () {
    return {
        Content:"",
        name:"",
        Gamil:"",
        error: "",
    }
},
methods: {
    async submit(){
        if(this.Content == "" || this.name == "" || this.Gamil == "")
        {
            this.error = "Bạn không được bỏ trống thông tin.";
        }
        else
        {
            let fromData = new FormData();
            fromData.append('fullname',this.name);
            fromData.append('Gmail',this.Gamil);
            fromData.append('Comment',this.Content);
            fromData.append('LinkPost',window.location.pathname);


            axios.defaults.headers.post['Accept'] = 'application/json'
            await axios.post('/Feedback', fromData,{
                    headers: {
                    Accept: 'application/json'
                }
            })
            .then(data => {
                if(data.data)
                {
                   this.error = "Gửi đóng góp thành công. Cảm ơn bạn đã đóng góp ý kiến.";
                }
                else{
                    this.error = "Đã có lỗi xảy ra trong quá trình gửi đóng góp ý kiến.";
                }
            })
            .catch(error=>{
                this.error = "Đã có lỗi xảy ra trong quá trình gửi đóng góp ý kiến.";
            })
        }
        
    }
}
}
</script>