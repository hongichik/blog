<template>
  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">
      <h5 class="card-header">Đóng góp từ người dùng</h5>
      <div class="card-body">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">STT</th>
              <th scope="col">Họ tên</th>
              <th scope="col">Gmail</th>
              <th scope="col">Nội dung</th>
              <th scope="col">Tới từ</th>
              <th scope="col">Chức năng</th>
            </tr>
          </thead>
          <tbody>
            <tr  v-for="(data,index)  in Feedback" :key="data.value">
              <th scope="row">{{ index +1}}</th>
              <td>{{data.fullname}}</td>
              <td>{{data.Gmail}}</td>
              <td>{{data.Comment}}</td>
              <td v-if="data.LinkPost">
                <a :href="data.LinkPost">Đến trang bài viết</a>
              </td>
              <td v-if="!(data.LinkPost) ">
                <a >Đóng góp chung</a>
              </td>
              <td>
                <button type="button" @click=" DeleteFeedback(data.id)" class="btn btn-danger">Xóa</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
        Feedback:"",
    };
  },
  created() {
      this.getFeedback();
  },
  methods: {
      async DeleteFeedback(id){
        await axios.get('/api/DeleteFeedback?id='+id,{
                headers: {
                Accept: 'application/json'
            }
        })
        .then(data => {
            this.getFeedback();
        })
        .catch(error=>{
            console.log("lõi");
        })
      },
      async getFeedback(){
        await axios.get('/api/GetFeedback',{
                headers: {
                Accept: 'application/json'
            }
        })
        .then(data => {
            this.Feedback = data.data;
        })
        .catch(error=>{
            console.log("lõi");
        })
      }
  },
};
</script>
