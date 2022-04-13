<template>
    <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li v-if="ManageCategory" class="nav-item">
                                <!-- Thuộc tính aria-expanded="true" bằng true là hiển thị mũi tên sổ xuống -->
                                <!-- <a class="nav-link active" active có nghĩa là đang chọn vô -->
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1">
                                    Danh mục bài viết
                                </a>
                                <div id="submenu-1" class="collapse submenu "><!--thêm class show có nghĩa là đang xổ xuống menu -->
                                     <ul class="nav flex-column"> 
                                        <li class="nav-item">
                                            <router-link to=/ListCategory class=nav-link>Danh sách danh mục</router-link>
                                        </li>
                                        <li class="nav-item">
                                            <router-link to=/NewCategory class=nav-link>Thêm danh mục</router-link>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            
                            <li v-if="ManagePersonalPosts" class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-0" aria-controls="submenu-0">
                                    Quản lý bài viết của bạn
                                </a>
                                <div id="submenu-0" class="collapse submenu" >
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <router-link to=/posts class=nav-link>Danh sách bài viết</router-link>                                            
                                        </li>
                                        <li class="nav-item">
                                            <router-link to='/addPosts/Chưa chọn/0/0' class=nav-link>Thêm mới bài viết</router-link>
                                        </li>

                                    </ul>
                                </div>
                            </li> 
                            <li v-if="ManagePostsAll" class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2">
                                    Quản lý tất cả bài viết
                                </a>
                                <div id="submenu-2" class="collapse submenu" >
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <router-link to=/AllPosts class=nav-link>Danh sách bài viết</router-link>                                            
                                        </li>
                                        <li class="nav-item">
                                            <router-link to='/addPosts/Chưa chọn/0/1' class=nav-link>Thêm mới bài viết</router-link>
                                        </li>

                                    </ul>
                                </div>
                            </li>  
                            <li v-if="ManageInfoWeb" class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3">
                                    Thông tin chung
                                </a>
                                <div id="submenu-3" class="collapse submenu" >
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <router-link to=/editContact class=nav-link>Giới thiệu</router-link>                                            
                                        </li>
                                        <li class="nav-item">
                                            <router-link to=/editInfo class=nav-link>Thông tin chung</router-link>
                                        </li>

                                    </ul>
                                </div>
                            </li>                            
                            <li v-if="ManageAccount" class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4">
                                    Quản lý tài khoản
                                </a>
                                <div id="submenu-4" class="collapse submenu" >
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <router-link to=/editContact class=nav-link>Danh sách tài khoản</router-link>                                            
                                        </li>
                                        <li class="nav-item">
                                            <router-link to=/editInfo class=nav-link>Tạo tài khoản</router-link>
                                        </li>

                                    </ul>
                                </div>
                            </li>  
                            <!-- <li v-if="ManageLayoutHome" class="nav-item">
                                <router-link to=/editContact class="nav-link">
                                    Bố cục trang chủ
                                </router-link>
                            </li>    -->
                            <li class="nav-item pb-5">
                                <a class="nav-link" href="/" target="_blank">Đến trang người dùng</a>
                            </li>

                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
</template>
<script>
export default {
  data () {
    return {
        Permission:"",
        ManageCategory:false,
        ManagePersonalPosts: false,
        ManagePostsAll:false,
        ManageInfoWeb:false,
        ManageAccount: false,
        ManageLayoutHome: false,
        
    }
  },
  created () {
      this.getPermission();


  },
  methods: {
      async getPermission()
      {
        axios.defaults.headers.post['Accept'] = 'application/json'
        await axios.get('/api/ShowPermissionAll',{
                headers: {
                Accept: 'application/json'
            }
        })
        .then(data => {

            this.Permission = data.data;
            for (let index = 0; index < this.Permission.length; index++) {
                
                if(this.Permission[index].slug == 'Manage-Category')
                {
                    this.ManageCategory = true;
                }
                else if(this.Permission[index].slug =='Manage-Personal-Posts')
                    this.ManagePersonalPosts = true;
                else if(this.Permission[index].slug =='Manage-Posts-All')
                    this.ManagePostsAll = true;
                else if(this.Permission[index].slug =='Manage-Info-Web')
                    this.ManageInfoWeb = true;
                else if(this.Permission[index].slug =='Manage-Account')
                    this.ManageAccount = true;   
                else if(this.Permission[index].slug =='Manage-Layout-Home')
                    this.ManageLayoutHome = true;           
            }
        })
        .catch(error=>{
            console.log(error.response.data);
        })
      }
  },

}
</script>