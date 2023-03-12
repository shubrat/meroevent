<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="#" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="#" alt="" height="24">
                    </span>
                    <span class="logo-lg">
                        <img src="#" alt="" height="24"> <span class="logo-txt">Mero Event</span>
                    </span>
                </a>

                <a href="#" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="#" alt="" height="24">
                    </span>
                    <span class="logo-lg">
                        <img src="#" alt="" height="24"> <span class="logo-txt">Mero Event</span>
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            <!-- App Search-->
            <form class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input type="text" class="form-control" placeholder="Search...">
                    <button class="btn btn-primary" type="button"><i class="bx bx-search-alt align-middle"></i></button>
                </div>
            </form>
        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block d-lg-none ms-2">
                <button
                    type="button" class="btn header-item" id="page-header-search-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                >
                    <i data-feather="search" class="icon-lg"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                     aria-labelledby="page-header-search-dropdown">

                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ..." aria-label="Search Result">

                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <div class="dropdown d-inline-block">
              &nbsp;
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item bg-soft-light border-start border-end" id="page-header-user-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 
                    <!-- Avtar Image is here -->
                        <img class="rounded-circle header-profile-user" src=""
                         alt="Header Avatar">
                 

                    
                         <!-- Admin-->
                   <span class="d-none d-xl-inline-block ms-1 fw-medium">Mero Admin</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                
                <div class="dropdown-menu dropdown-menu-end">
                    <div class="block px-9 py-1 text-xs text-gray-400">
                        {{ __('Manage Account') }}
                    </div>

                    <!-- item-->
                    <a class="dropdown-item" href="#"><i class="mdi mdi-face-man-profile font-size-16 align-middle me-1"></i> Profile</a>
                    <a class="dropdown-item" href="auth-lock-screen.html"><i class="mdi mdi-lock font-size-16 align-middle me-1"></i> Lock Screen</a>
                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item"  href="#"  @click.prevent="$root.submit();">
                        {{ __('Log Out') }}</a>
                </div>
            </div>

        </div>
    </div>
</header>
