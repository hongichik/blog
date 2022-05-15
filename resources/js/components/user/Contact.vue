<template>
    <div class="form-contact contact_form">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <textarea style="font-size: 1.2em;" v-model="Content" class="form-control w-100 border-dark" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nội dung'" placeholder=" Nội dung"></textarea>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <input style="font-size: 1.2em;" v-model="name" class="form-control valid border-dark" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Họ và tên'" placeholder="Họ và tên">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <input style="font-size: 1.2em;" v-model="Gamil" class="form-control valid border-dark" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Gmail'" placeholder="Gmail">
                </div>
            </div>
        </div>
        <label for="">{{error}}</label>
        <div class="button-group-area mt-40">
            <button @click="submit()" class="genric-btn primary circle">Gửi</button>
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