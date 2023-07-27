<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a id="b29e" class="sidebar-brand d-flex align-items-center justify-content-start ">
                
                <div class="sidebar-brand-text">b29e</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link custom-cursor" href="./dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span >Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link <?=$pagename == "blogallpost" || $pagename == "blogaddnewpost"? null : "collapsed" ?>" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="<?=$pagename == "blogallpost" || $pagename == "blogaddnewpost" ? "true" : "false" ?>" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Blogs</span>
                </a>
                <div id="collapseTwo" class="collapse <?=$pagename == "blogallpost" || $pagename == "blogaddnewpost"? "show" : null ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item <?php $pagename == "blogallpost" ? "active" : null ?>" href="./blogallpost">All</a>
                        <a class="collapse-item" href="./blogaddnewpost">Add All</a>
                    </div>
                </div>
            </li>

     <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Catagories</span>
                </a>
                <div id="collapseUtilities" class="collapse <?=$pagename == "catall" || $pagename == "cataddnew"? "show" : null ?>" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                      <a class="collapse-item" href="./catall">All</a>
                        <a class="collapse-item" href="./cataddnew">Add All</a>
                        
                    </div>
                </div>
            </li>

           
            <hr class="sidebar-divider">

        
            

            
         
           

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline ">
                <button class="rounded-circle border-0 bg-dark" id="sidebarToggle"></button>
            </div>

        
        </ul>