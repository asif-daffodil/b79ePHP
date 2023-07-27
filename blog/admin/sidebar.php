<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-start" href="index.html">
        <div class="sidebar-brand-icon">
            B-79e
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="./dashboard">
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">


    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link <?= $pageName == "blog-all-post" || $pageName == "blog-add-new" ?  null : "collapsed" ?>" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="<?= $pageName == "blog-all-post" || $pageName == "blog-add-new" ?  "true" : "false" ?>" aria-controls="collapseTwo">
            <span>Blogs</span>
        </a>
        <div id="collapseTwo" class="collapse <?= $pageName == "blog-all-post" || $pageName == "blog-add-new" ?  "show" : null ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item <?= $pageName == "blog-all-post" ? "active" : null ?>" href="./blog-all-post">All</a>
                <a class="collapse-item <?= $pageName == "blog-add-new" ? "active" : null ?>" href="./blog-add-new">Add New</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link <?= $pageName == "category-all" || $pageName == "category-add-new" ?  null : "collapsed" ?>" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="<?= $pageName == "category-all" || $pageName == "category-add-new" ?  "true" : "false" ?>" aria-controls="collapseUtilities">
            <span>Categories</span>
        </a>
        <div id="collapseUtilities" class="collapse <?= $pageName == "category-all" || $pageName == "category-add-new" ?  "show" : null ?>" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item <?= $pageName == "category-all" ? "active" : null ?>" href="./category-all">All</a>
                <a class="collapse-item <?= $pageName == "category-add-new" ? "active" : null ?>" href="./category-add-new">Add New</a>
            </div>
        </div>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>