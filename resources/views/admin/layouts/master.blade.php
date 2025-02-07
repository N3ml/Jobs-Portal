<!doctype html>
<html lang="en">



@include('admin.layouts.partials.header')


<!--begin::Body-->
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">


@include('admin.layouts.partials.navbar')


@include('admin.layouts.partials.sidebar')


      <!--begin::App Main-->
      <main class="app-main">

        <!--begin::App Content Header-->
        <div class="app-content-header">

          <!--begin::Container-->
          <div class="container-fluid">

            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0"> @yield('page_title') </h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">  @yield('page_title')</li>
                </ol>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->

          @yield('content')

        <!--begin::App Content-->




        <!--end::App Content-->
      </main>
      <!--end::App Main-->


@include('admin.layouts.partials.footer')



</body>
<!--end::Body-->
</html>
