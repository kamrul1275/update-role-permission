<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="backend/assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Rukada</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li class="menu-label">UI Dashboard</li>
        <li>
            <a href="{{ route('admin.dashboard')}}">
                <div class="parent-icon"><i class='bx bx-cookie'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>




        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
                </div>
                <div class="menu-title">Role </div>
            </a>
            <ul>
               <li> <a href="{{route('role.create') }}"><i class="bx bx-right-arrow-alt"></i>Create Role </a>
                </li>
                <li> <a href="{{route('role.index.all') }}"><i class="bx bx-right-arrow-alt"></i> All Role</a>
                </li>


            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-repeat"></i>
                </div>
                <div class="menu-title">Permission</div>
            </a>
            <ul>
                <li> <a href="{{route('create.permission.role') }}"><i class="bx bx-right-arrow-alt"></i>Create Permission</a>
                </li>
                <li> <a href="{{route('permission.index') }}"><i class="bx bx-right-arrow-alt"></i>All Permission</a>
                </li>

            </ul>
        </li>



        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Role Accept</div>
            </a>
            <ul>
                <li> <a href="{{ route('role.Pending') }}"><i class="bx bx-right-arrow-alt"></i>Pedding Role</a>
                </li>
                <li> <a href="{{ route('role.Approval') }}"><i class="bx bx-right-arrow-alt"></i>Approval Role</a>
                </li>

            </ul>
        </li>


        {{-- User Manage --}}
        
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">User Manage</div>
            </a>
            <ul>
                <li> <a href="{{ route('create.user.manage') }}"><i class="bx bx-right-arrow-alt"></i>Create User</a>
                </li>
                <li> <a href="{{ route('all.user.manage') }}"><i class="bx bx-right-arrow-alt"></i>All User</a>
                </li>

            </ul>
        </li>



    </ul>
    <!--end navigation-->
</div>
