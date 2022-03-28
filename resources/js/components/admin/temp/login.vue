<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-2"></div>
            <div class="col-lg-6 col-md-8 login-box">

                <div class="col-lg-12 login-title">
                    ADMIN PANEL
                </div>
                <div class="col-lg-12 login-form">
                    <div class="col-lg-12 login-form">
                        <div>
                            <div class="form-group">
                                <label class="form-control-label">GMAIL</label>
                                <input type="text" v-model="email" class="form-control">
                            </div>
                            <div class="col-lg-12  ">
                                <span  style="color:red;font-size: 0.95em">{{error.email}}</span>
                            </div>
                            <div class="form-group" style="border-bottom: 2px solid #0DB8DE;">
                                <label class="form-control-label">MẬT KHẨU</label>
                                <div class=" d-flex">
                                <input @keyup.enter="login()" :type="passwordFieldType" v-model="password" class="form-control border-bottom-0 mb-0" i>
                                <i @click="hideShowPass()" class="fa fa-solid "
                                v-bind:class="{ 'fa-eye': !eyePass, 'fa-eye-slash': eyePass }"
                                 style="font-size: 1.7em;color: white;"></i>
                                </div>

                            </div>
                            <div class="col-lg-12  ">
                                <span  style="color:red;font-size: 0.95em">{{error.password}}</span>
                            </div>
                            <div class="col-lg-12 mt-4 mb-4 ">
                                <span  style="color:red;font-size: 0.95em">{{error.errorAll}}</span>
                            </div>
                            <div class="col-lg-12 loginbttm">
                                <div class="col-lg-6 login-btm login-button">
                                    <button @click="login()" class="btn btn-outline-primary">LOGIN</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-2"></div>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    data(){
        return {
            error: {
                email: "",
                password:"",
                errorAll:"",
            },
            passwordFieldType: "password",
            eyePass: true,

            email:"",
            password:"",
        }
    },
    methods: {
    hideShowPass () { 
            this.passwordFieldType = this.passwordFieldType === "password" ? "text" : "password";
            this.eyePass = this.eyePass == true ? false :true;
    },
    
    async login () { 
        let fromData = new FormData();
        fromData.append('email',this.email);
        fromData.append('password',this.password);

        axios.defaults.headers.post['Accept'] = 'application/json'
        await axios.post('/admin/login', fromData,{
                headers: {
                Accept: 'application/json'
            }
        })
        .then(r => {
            this.deleteError();
            console.log(r);
            if(r.data.error)
            {
                this.error.errorAll = r.data.error;
            }
            if(r.data == true)
            {
                window.location="/admin";
            }

        })
        .catch(e=>{
            this.deleteError();
            if(e.response.data.errors.email)
            {
                this.error.email = e.response.data.errors.email[0];
            }
            if(e.response.data.errors.password)
            {
                this.error.password = e.response.data.errors.password[0];
            }
        })
    },
    deleteError (){
        this.error.email = "";
        this.error.password = "";
        this.error.errorAll = "";
    }
    },
}
</script>