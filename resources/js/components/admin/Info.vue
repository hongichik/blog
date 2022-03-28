<template>
    <div class="card">
        <h5 class="card-header">Thông tin chung</h5>
        <div class="card-body">
            <form action="#">
                <div class="form-group col-5">
                    <label>Phương châm</label>
                    <input v-model="info.slogan" class="form-control" type="text"  autocomplete="off" >
                </div>
                <div class="form-group col-5">
                    <label>Mục tiêu</label>
                    <textarea v-model="info.target" class="form-control" rows="4" cols="50" type="text" autocomplete="off" ></textarea>
                </div>
                <div class="form-group col-5">
                    <label>Số điện thoại đầu trang</label>
                    <input v-model="info.numberHeader" class="form-control" type="text" autocomplete="off" >
                </div>
                <div class="form-group col-5">
                    <label>Số điện thoại cuối trang</label>
                    <input v-model="info.numberFooter" class="form-control" type="text"  autocomplete="off" >
                </div>
                <div class="form-group col-5">
                    <label>Gmail</label>
                    <input v-model="info.GmailFooter" class="form-control" type="text"  autocomplete="off" >
                </div>
                <div class="form-group col-5">
                    <label>Tên người tạo web 1</label>
                    <input v-model="info.memberOne" class="form-control" type="text"  autocomplete="off" >
                </div>
                <div class="form-group col-5">
                    <label>Link FB người tạo web 1</label>
                    <input v-model="info.LinkFBFooter" class="form-control" type="text"  autocomplete="off" >
                </div>
                <div class="form-group col-5">
                    <label>Tên người tạo web 2</label>
                    <input v-model="info.menberTow" class="form-control" type="text"  autocomplete="off" >
                </div>
                <div class="form-group col-5">
                    <label>Logo Chính</label>
                    <div class="image-box text-center" style="margin-top: 1em;height: 10em;width: 20em;background: #d24d57;cursor: pointer;overflow: hidden;">
                        <p style="position: relative;top: 45%;color: #fff;">Sửa ảnh</p>
                        <img src="" alt="" style="height: 100%;display: none;">
                    </div>
                    <div class="controls" style="display: none;">
                        <input type="file" name="contact_image_1"/>
                    </div>
                </div>
                <div class="form-group col-5">
                    <label>Logo cuối trang</label>
                    <div class="image-box text-center" style="margin-top: 1em;height: 10em;width: 20em;background: #d24d57;cursor: pointer;overflow: hidden;">
                        <p style="position: relative;top: 45%;color: #fff;">Sửa ảnh</p>
                        <img src="" alt="" style="height: 100%;display: none;">
                    </div>
                    <div class="controls" style="display: none;">
                        <input type="file" name="contact_image_1"/>
                    </div>
                </div>
                <div class="form-group col-5">
                    <label>Logo tải trang</label>
                    <div class="image-box text-center" style="margin-top: 1em;height: 10em;width: 20em;background: #d24d57;cursor: pointer;overflow: hidden;">
                        <p style="position: relative;top: 45%;color: #fff;">Sửa ảnh</p>
                        <img src="" alt="" style="height: 100%;display: none;">
                    </div>
                    <div class="controls" style="display: none;">
                        <input type="file" name="contact_image_1"/>
                    </div>
                </div>
                <div class="form-group col-5">
                    <label>Icon</label>
                    <div class="image-box text-center" style="margin-top: 1em;height: 4em;width: 4em;background: #d24d57;cursor: pointer;overflow: hidden;">
                        <p style="position: relative;top: 45%;color: #fff;">Sửa ảnh</p>
                        <img src="" alt="" style="height: 100%;display: none;">
                    </div>
                    <div class="controls" style="display: none;">
                        <input type="file" name="contact_image_1"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 pl-0">
                        <p class="text-right">
                            <button class="btn btn-space btn-primary">Lưu</button>
                            <button class="btn btn-space btn-secondary">Hủy</button>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>
<script>
export default {

  data () {
    return {
        info:"",
    }
  },
  created () {
      this.showInfo();
  },
  methods: {
    async showInfo()
    {
        axios.defaults.headers.post['Accept'] = 'application/json'
        await axios.get('/api/InfoShow',{
                headers: {
                Accept: 'application/json'
            }
        })
        .then(data => {
            this.info = data.data;
        })
        .catch(error=>{
            console.log(error);
        })
    },
  },
    
}
</script>