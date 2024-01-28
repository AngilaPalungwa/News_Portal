<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

    <div>

        <a href="/admindashboard" class="brand-link">
            <img src="{{ asset("/images/company/$company->logo") }}" alt="AdminLTE Logo" class="brand-image  " style="opacity: .8">

            <span class=" font-weight "> {{ $company->name }}</span>
        </a>
    </div>

    <!-- Sidebar -->
    @php
        $admin = Auth::guard('admin')->user();
        $adminDetail = $admin->userDetail;
    @endphp
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset("/images/$adminDetail->image") }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#"
                    class="d-block">{{ Auth::guard('admin')->check() ? Auth::guard('admin')->user()->name : 'Welcome Guest' }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
                <li class="nav-item  ">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>

                        <p>Dashboard</p>
                    </a>

                </li>
                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link">
                        <i class="nav-icon fas fa-solid fa-globe"></i>
                        <p>Website</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('company.index') }}" class="nav-link">
                        <i class="nav-icon fas  fa-solid fa-wrench"></i>
                        <p>Company Setting</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.index') }}" class="nav-link">
                        <i class="nav-icon fas fas fa-user"></i>
                        <p>Users</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('category.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-solid fa-list "></i>
                        <p>Category</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('post.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-regular fa-newspaper"></i>
                        <p>Posts</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('ads.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-solid fa-audio-description"></i>
                        <p>ADs</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('subscribe') }}" class="nav-link">
                        <i class="nav-icon fas fa-solid fa-user-plus"></i>
                        <p>Subscriber</p>
                    </a>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
