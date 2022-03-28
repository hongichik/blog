<template>
    	<div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="/admin">Admin</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        
                        <li class="d-flex">
                            <h4 class="m-auto">{{name}}</h4>
                        </li>
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img pl-1" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img :src="img" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <a class="btn dropdown-item" @click="logout()"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <admin-sidebar/>
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <div  class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <router-view/>
                    </div>
                </div>
                
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- ============================================================== -->
    </div>
</template>

<script>
export default {

props: ['name','img'],

  methods: {
      logout (){
          console.log("đăng xuất");
           window.location="/admin/logout";
      }
  },
    
}
</script>