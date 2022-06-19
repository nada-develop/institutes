    <!-- ========== Left Sidebar Start ========== -->
    <div class="left-side-menu">

        <div class="h-100" data-simplebar>

            <!-- User box -->
            <div class="user-box text-center">
                <img src="{{ asset('assets/images/users/user-1.jpg') }}" alt="user-img" title="Mat Helme"
                    class="rounded-circle avatar-md">
                <div class="dropdown">
                    <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                        data-bs-toggle="dropdown">Geneva Kennedy</a>
                    <div class="dropdown-menu user-pro-dropdown">

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-user me-1"></i>
                            <span>My Account</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-settings me-1"></i>
                            <span>Settings</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-lock me-1"></i>
                            <span>Lock Screen</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-log-out me-1"></i>
                            <span>Logout</span>
                        </a>

                    </div>
                </div>
                <p class="text-muted">Admin Head</p>
            </div>

            <!--- Sidemenu -->
            <div id="sidebar-menu">

                <ul id="side-menu">

                    @can('user_management_access')
                        <li>
                            <a href="#sidebarEcommerce" data-bs-toggle="collapse">
                                <i data-feather="users"></i>
                                <span> {{ trans('cruds.userManagement.title') }} </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarEcommerce">
                                <ul class="nav-second-level">

                                    <li>
                                        <a href="{{ route("admin.permissions.index") }}"> {{ trans('cruds.permission.title') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route("admin.roles.index") }}"> {{ trans('cruds.role.title') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route("admin.users.index") }}">  {{ trans('cruds.user.title') }}</a>
                                    </li>
                                    @can('audit_log_access')
                                    <li>
                                        <a href="{{ route("admin.audit-logs.index") }}">   {{ trans('cruds.auditLog.title') }}</a>
                                    </li>
                                    @endcan
                                </ul>
                            </div>
                        </li>
                    @endcan
                    @can('summary_management_access')

                    <li>
                        <a href="{{ route('admin.summary') }}" >
                            <i data-feather="bar-chart"></i>
                            <span>  تحليل المعاهد</span>
                        </a>
                    </li>
                @endcan
                @can('teacher_access')
                <li>
                    <a href="{{ route('admin.teachers.index') }}" >
                        <i data-feather="user"></i>
                        <span> ادراة المعلمين</span>
                    </a>
                </li>
            @endcan
                    @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')

                        <li>
                            <a href="{{ route('profile.password.edit') }}" >
                                <i data-feather="edit-2"></i>
                                <span>  {{ trans('global.change_password') }}</span>
                            </a>
                        </li>
                    @endcan
                @endif

                <li>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <i data-feather="log-out"></i>
                        <span> {{ trans('global.logout') }} </span>
                    </a>
                </li>

                </ul>

            </div>
            <!-- End Sidebar -->

            <div class="clearfix"></div>

        </div>
        <!-- Sidebar -left -->

    </div>
    <!-- Left Sidebar End -->
