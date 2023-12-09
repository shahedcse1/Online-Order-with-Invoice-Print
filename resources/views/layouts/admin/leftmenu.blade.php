@can('view-order')

    <li class="nav-item has-treeview">

        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-layer-group"></i>
            <p>
                Orders
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>

        <ul class="nav nav-treeview ml-3">

            @can('view-order')
                <li class="nav-item">
                    <a href="{{ url('') }}/en/admin/all/orders" class="nav-link">
                        <i class="nav-icon fa fa-check"></i>
                        <p>All Orders</p>
                    </a>
                </li>
            @endcan


            @can('view-excel-file')
                <li class="nav-item">
                    <a href="{{ url('') }}/en/admin/excel-file" class="nav-link">
                        <i class="nav-icon fa fa-file"></i>
                        <p>Excel File</p>
                    </a>
                </li>
            @endcan


            @can('view-search-order')
                <li class="nav-item">
                    <a href="{{ url('') }}/en/admin/search-order" class="nav-link">
                        <i class="nav-icon fa fa-search"></i>
                        <p>Search Order</p>
                    </a>
                </li>
            @endcan

        </ul>

    </li>

@endcan


<li class="nav-header text-white">SETTINGS</li>

@can('view-user')
    <li class="nav-item has-treeview">

        <a href="#" class="nav-link">
            <i class='nav-icon fas fa-user-friends'></i>
            <p>
                User Management
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>

        <ul class="nav nav-treeview ml-3">

            @can('create-user')
                <li class="nav-item">
                    <a href="{{ url('') }}/en/admin/user/create" class="nav-link">
                        <i class="nav-icon fa fa-check"></i>
                        <p>Create</p>
                    </a>
                </li>
            @endcan


            <li class="nav-item">
                <a href="{{ url('') }}/en/admin/user/" class="nav-link">
                    <i class="nav-icon fa fa-th-list"></i>
                    <p>All Users</p>
                </a>
            </li>

        </ul>

    </li>
@endcan

@can('view-role-module')
    <li class="nav-item has-treeview">

        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-dice-d6"></i>
            <p>
                Role Module
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>

        <ul class="nav nav-treeview ml-3">

            <li class="nav-item">
                <a href="{{ url('') }}/en/admin/role_module/" class="nav-link">
                    <i class="nav-icon fa fa-th-list"></i>
                    <p>View Role Module</p>
                </a>
            </li>

        </ul>

    </li>
@endcan

@can('view-role')

    <li class="nav-item has-treeview">

        <a href="#" class="nav-link">
            <i class='nav-icon fas fa-users-cog'></i>
            <p>
                Role Management
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>

        <ul class="nav nav-treeview ml-3">

            @can('create-role')
                <li class="nav-item">
                    <a href="{{ url('') }}/en/admin/role/create" class="nav-link">
                        <i class="nav-icon fa fa-check"></i>
                        <p>Create</p>
                    </a>
                </li>
            @endcan

            <li class="nav-item">
                <a href="{{ url('') }}/en/admin/role/" class="nav-link">
                    <i class="nav-icon fa fa-th-list"></i>
                    <p>View Roles</p>
                </a>
            </li>

        </ul>

    </li>

@endcan

<li class="nav-item">
    <a href="{{ url('') }}/en/admin/profile/edit" class="nav-link">
        <i class="nav-icon fas fa-user-edit"></i>
        <p class="text">Edit Profile</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ url('') }}/en/admin/profile/password" class="nav-link">
        <i class="nav-icon fas fa-unlock-alt"></i>
        <p>Change Password</p>
    </a>
</li>
