<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Jafrin Home Made Food</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- Fevicon --}}
    <link type="image/png" rel="icon" href="{{ asset('images/favicon.ico')}}">
    <link type="image/png" rel="shortcut icon" href="{{ asset('images/favicon.ico')}}">

    @yield('style')
    @include('layouts.admin.header')
    @include('layouts.admin.angularInclude')
  </head>

  <body class="hold-transition sidebar-mini layout-fixed" ng-app="noMac">

    <script type="text/javascript">

    </script>

    <div class="wrapper">

      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('all.orders', ['locale' => app()->getLocale()]) }}" class="nav-link">Home</a>
          </li>

        </ul>
        <ul class="navbar-nav ml-auto">
          <!-- Authentication Links -->
          @guest
          @if (Route::has('login'))
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
          @endif

          @if (Route::has('register'))
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
          </li>
          @endif
          @else
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </div>
          </li>
          @endguest
        </ul>
      </nav>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-bg elevation-4">
        <div class="sidebar__rgba">
          <!-- Brand Logo -->
          <a href="#" class="brand-link">

            {{-- <img src="{{ asset('UI/Admin/Panel/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
              class="brand-image img-circle elevation-3" style="opacity: .8"> --}}

            <img src="https://source.unsplash.com/random/200x200?sig=1" alt="AdminLTE Logo"
              class="brand-image img-circle elevation-3" style="opacity: .8">


            <span class="brand-text font-weight-light">Jafrin Food</span>
          </a>

          <!-- Sidebar -->
          <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">

                {{-- <img src="{{ url('UI/Admin/Panel/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                  alt="User Image"> --}}

                <img src="https://source.unsplash.com/random/200x200?sig=2" class="img-circle elevation-2"
                  alt="User Image">

              </div>

              <div class="info">
                <a href="#"
                  class="d-block">{{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}</a>
              </div>

            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                            with font-awesome or any other icon font library -->


                @include('layouts.admin.leftmenu')

                <li class="nav-item">
                  <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt nav-icon"></i>
                    <p>{{ __('Logout') }} {{Auth::user()->name}}</p>
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                </li>

              </ul>
            </nav>
            <!-- /.sidebar-menu -->
          </div>
          <!-- /.sidebar -->
        </div>
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper p-2">

        <div class="p-4">
          @yield('body')
        </div>

      </div>
      <!-- /.content-wrapper -->
      <footer class="main-footer">
        <strong>Developed By - <a href="#">Noman</a></strong>
        <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 1.0.0
        </div>
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    @include('layouts.admin.footer')
    @yield('script')
    <script>
      $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()
        });

        var url = window.location;
        const allLinks = document.querySelectorAll('.nav-item a');
        const currentLink = [...allLinks].filter(e => {
            return e.href == url;
        });

        currentLink[0].classList.add("active");
        currentLink[0].closest(".nav-treeview").style.display = "block ";
        currentLink[0].closest(".has-treeview").classList.add("menu-open");
        $('.menu-open').find('a').each(function() {
            if (!$(this).parents().hasClass('active')) {
                $(this).parents().addClass("active");
                $(this).addClass("active");
            }
        });
    </script>
  </body>

</html>
