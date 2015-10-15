<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href="{{ url('admin') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="{{ url('admin/user') }}"><i class="fa fa-user fa-fw"></i> User</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-folder-open-o fa-fw"></i> Category <span class="fa arrow"></span></a>
                <ul class="nav nav-third-level">
                    <li>
                        <a href="{{ url('admin/category') }}">Category</a>
                    </li>
                    <li>
                        <a href="{{ url('admin/category/create') }}">Add Category</a>
                    </li>
                </ul>
                <!-- /.nav-third-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-th-list fa-fw"></i> Article <span class="fa arrow"></span></a>
                <ul class="nav nav-third-level">
                    <li>
                        <a href="{{ url('admin/article') }}">Article</a>
                    </li>
                    <li>
                        <a href="{{ url('admin/article/create') }}">Add Category</a>
                    </li>
                </ul>
                <!-- /.nav-third-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-tag fa-fw"></i> Tag <span class="fa arrow"></span></a>
                <ul class="nav nav-third-level">
                    <li>
                        <a href="{{ url('admin/tag') }}">Tag</a>
                    </li>
                    <li>
                        <a href="{{ url('admin/tag/create') }}">Add Tag</a>
                    </li>
                </ul>
                <!-- /.nav-third-level -->
            </li>
            <li>
                <a href="{{ url('admin/comment') }}"><i class="fa fa-comments  fa-fw"></i> Comment</a>
            </li>
            <li>
                <a href="{{ url('admin/setup') }}"><i class="fa fa-gear fa-fw"></i> Setup</a>
            </li>
        
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side --
