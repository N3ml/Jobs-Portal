

<!--
      data-bs-theme="dark"

-->

      <!--begin::Sidebar-->
      <aside class="app-sidebar bg-body-secondary shadow" >
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
          <!--begin::Brand Link-->
          <a href="./index.html" class="brand-link">
            <!--begin::Brand Image-->
            <img
              src= "{{asset('admin/assets/img/admin/logo2.png')}}"
              alt="AdminLTE Logo"
              class="brand-image opacity-75 shadow"
            />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light"> Jobs Portal</span>
            <!--end::Brand Text-->
          </a>
          <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
          <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul
              class="nav sidebar-menu flex-column"
              data-lte-toggle="treeview"
              role="menu"
              data-accordion="false"
            >
              <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                  <i class="nav-icon bi bi-speedometer"></i>
                  <p>
                      Dashboard
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">

                  <li class="nav-item">

                    <a href="{{url('admin/admins')}}" class="nav-link active">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Admins</p>
                    </a>

                      <a href="{{url('admin/applicants')}}" class="nav-link active">
                          <i class="nav-icon bi bi-circle"></i>
                          <p>Applicants</p>
                      </a>

                    <a href="{{url('admin/positions')}}" class="nav-link active">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Positions </p>
                    </a>

                    <a href="{{url('admin/jobs')}}" class="nav-link active">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Jobs</p>
                    </a>

                    <a href="{{url('admin/applications')}}" class="nav-link active">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Applications </p>
                    </a>


                  </li>


                </ul>
              </li>


            </ul>
            <!--end::Sidebar Menu-->
          </nav>
        </div>
        <!--end::Sidebar Wrapper-->
      </aside>
      <!--end::Sidebar-->
