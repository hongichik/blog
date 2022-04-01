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
                            <li class="nav-item ">
                                <!-- Thuộc tính aria-expanded="true" bằng true là hiển thị mũi tên sổ xuống -->
                                <a class="nav-link active btn" data-toggle="collapse" aria-expanded="true" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Danh mục sản phẩm <span class="badge badge-success">6</span></a>
                                <div id="submenu-1" class="collapse submenu show">
                                     <ul class="nav flex-column"> <!--thêm class show có nghĩa là đang xổ xuống menu -->

                                        <li class="nav-item">
                                            <router-link to=/ListCategory class=nav-link>Danh sách danh mục</router-link>
                                        </li>
                                        <li class="nav-item">
                                            <router-link to=/NewCategory class=nav-link>Thêm danh mục</router-link>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fa-fw fa-rocket"></i>Quản lý môn học</a>
                                <div id="submenu-2" class="collapse submenu" >
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/general.html">Thêm môn học</a>                                           
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/general.html">Danh sách môn học</a>
                                        </li>

                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fa-thin fa fa-address-card"></i>Thông tin chung</a>
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

                            <li class="nav-item">
                                <a class="nav-link" href="pages/general-table.html">Đến trang người dùng</a>
                            </li>

                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
</template>