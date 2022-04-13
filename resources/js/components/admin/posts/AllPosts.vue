<template>
  <div class="card">
    <h5 class="card-header">bài viết</h5>
    <div class="card-body">
      <div class="m-2">
        <nav class="navbar-light col-12 border">
          <ul class="navbar-nav flex-column">
            <li v-for="(Post,index) in Posts " :key="Post.value" class="nav-item m-2 p-2 border" >
              <a class="nav-link active" data-toggle="collapse" style="cursor: pointer;"
                aria-expanded="false"
                :data-target="'#'+index+Post.id"
                aria-controls="Posts"
              >
                {{ Post.name }}
                <span v-if="Post.Post != null" class="badge badge-success">{{ Post.Post.length}}</span>
                <span v-if="Post.Post == null" class="badge badge-success">0</span>
                <span class="form-group">
                    <button @click="btnNewPost(Post.name,Post.id)" class="m-0 ml-2 btn btn-outline-danger btn-sm rounded-circle p-2 	fa fa-plus-square"></button>
                </span>
              </a>
              <div v-if="Post.Post != null" :id="index+''+Post.id" class="collapse submenu col-12 p-2">
                <ul class="nav flex-column border pl-3 pr-3">
                  <li v-for="(PostPather,index) in Post.Post" :key="PostPather.value" class="nav-item" style="cursor: auto;">
                    <a
                      class="nav-link active d-flex mb-2 border-bottom" style="cursor: pointer;"
                      data-toggle="collapse"
                      aria-expanded="false"
                      :data-target="'#1'+PostPather.id+index"
                      aria-controls="Post"
                    >
                      <div class="d-flex flex-grow-1">
                        <div class="col-3 border-right">
                          <label>Tiêu đề</label>
                          <h4 class="border-top pt-1">(Được viết bởi : {{PostPather.WriterName }})<br/>{{PostPather.name}}</h4>
                        </div>
                        <div class="col-3 border-right">
                          <label>Ảnh</label>
                          <img
                            class="col-12 border-top pt-1"
                            :src="PostPather.image"
                            
                          />
                        </div>
                        <div class="col-4 border-right">
                          <label>Tóm tắt</label>
                          <p class="border-top pt-1">
                              {{PostPather.summary}}
                          </p>
                        </div>
                        <div class="col-2 pr-0 d-flex flex-column" style="cursor: auto;">
                          <label class="w-100 text-center">Chức năng</label>
                          <div class="form-group border-top pt-1 d-flex flex-grow-1">
                            <div class="d-flex m-auto">
                              <button @click="btnEditPost(PostPather.id)" class="ml-1 btn btn-outline-primary btn-sm rounded-circle fa fas fa-edit p-2"></button>
                              <button @click="btnDelete(PostPather.id)" class="m-0 ml-2 btn btn-outline-danger btn-sm rounded-circle p-2 fas fa-trash-alt"></button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <span v-if="PostPather.PostChilds != null" class="badge badge-success ml-2 mt-0 mb-auto">{{PostPather.PostChilds.length}}</span>
                      <span v-if="PostPather.PostChilds == null" class="badge badge-success ml-2 mt-0 mb-auto">0</span>  
                        <span class="form-group">
                            <button @click="btnNewChildPost(PostPather.id)" v-if="!(Post.name === 'Blog')" class="m-0 ml-2 btn btn-outline-danger btn-sm rounded-circle p-2 fa fa-plus-square"></button>
                        </span>
                    </a>
                    <div v-if="PostPather.PostChilds != null" :id="'1'+PostPather.id+index" class="collapse submenu col-11 p-2" style="margin-left: 7%;cursor: auto;">
                      <ul class="nav flex-column border pl-3 pr-3">
                        <li v-for="(PostChilds) in PostPather.PostChilds" :key="PostChilds.value" style="cursor: auto;" class="nav-item border-bottom d-flex mb-4 border-top">
                          <div class="col-3 border-right">
                            <label>Tiêu đề</label>
                            <h4 class="border-top pt-1">(Được viết bởi : {{PostChilds.WriterName }})<br/>{{PostChilds.name}}</h4>
                          </div>
                          <div class="col-3 border-right">
                            <label>Ảnh</label>
                            <img
                              class="col-12 border-top pt-1"
                              :src="PostChilds.image"
                            />
                          </div>
                          <div class="col-4 border-right">
                            <label>Tóm tắt</label>
                            <p class="border-top pt-1">
                                {{PostChilds.summary}}
                            </p>
                          </div>
                          <div class="col-2 pr-0 d-flex flex-column" style="cursor: auto;">
                            <label class="w-100 text-center">Chức năng</label>
                            <div class="form-group border-top pt-1 d-flex flex-grow-1">
                              <div class="d-flex m-auto">
                                <button @click="btnEditPost(PostChilds.id)" class="ml-1 btn btn-outline-primary btn-sm rounded-circle fa fas fa-edit p-2"></button>
                                <button @click="btnDelete(PostChilds.id)" class="m-0 ml-2 btn btn-outline-danger btn-sm rounded-circle p-2 fas fa-trash-alt"></button>
                              </div>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</template>
<script>
export default {
data() {
return {
    Posts: "",
};
},
created() {
    this.CheckPermissin();
    this.getPosts();

},
methods: {
      btnEditPost($id){
        this.$router.push({path: '/editPost/'+$id+'/1'});
      },
      async btnDelete($id){
        let text = "Bạn có chắc chắn muốn xóa bài viết và các bài viết liên quan chứ ?";
        if (confirm(text) == true) {
          axios.defaults.headers.post['Accept'] = 'application/json'
          await axios.get('/api/deletePost?id='+$id,{
              headers: {
              Accept: 'application/json'
              },
          })
          .then(data => {
              console.log(data.data);
              alert("xóa thành công");
              this.getPosts();
          })
          .catch(error=>{
              console.log(error);
          })
        }
      },
      btnNewChildPost($idFatherPost){
        this.$router.push({path: '/addChildPost/'+$idFatherPost+'/1'});
      },
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
    btnNewPost($categoryName, $categoryId){
        if($categoryName)
            this.$router.push({path: '/addPosts/'+$categoryName+'/'+$categoryId+'/1'});
        else
            this.$router.push({path: '/addPosts/Chưa chọn/0/1'});
    },
    async getPosts()
    {
    axios.defaults.headers.post['Accept'] = 'application/json'
    await axios.get('/api/ListAllPosts',{
            headers: {
            Accept: 'application/json'
        }
    })
    .then(data => {
        this.Posts = data.data;
        // alert(this.Posts.length);
    })
    .catch(error=>{
        console.log(error.response.data);
    })
    },
},
};
</script>
