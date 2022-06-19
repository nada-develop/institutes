 <!-- Topbar Start -->
 <div class="navbar-custom">
     <div class="container-fluid">
         <ul class="list-unstyled topnav-menu float-end mb-0">


             <li class="dropdown d-none d-lg-inline-block topbar-dropdown notify">
                 <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-bs-toggle="dropdown"
                     href="#" role="button" aria-haspopup="false" aria-expanded="false">
                     @if (app()->getLocale() == 'en')
                         <img src="{{ asset('assets/images/flags/us.jpg') }}" alt="user-image" height="16">
                     @else
                         <img src="{{ asset('assets/images/flags/egypt.png') }}" alt="user-image" height="16">
                     @endif
                 </a>
                 <div class="dropdown-menu dropdown-menu-end">
                     @foreach (config('panel.available_languages') as $langLocale => $langName)
                         <a class="dropdown-item"
                             href="{{ url()->current() }}?change_language={{ $langLocale }}">{{ strtoupper($langLocale) }}
                             ({{ $langName }})</a>
                     @endforeach

                 </div>
             </li>



             <li class="dropdown notification-list topbar-dropdown">
                 <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown"
                     href="#" role="button" aria-haspopup="false" aria-expanded="false">
                     <img src="{{ asset('assets/images/profile.png') }}" alt="user-image" class="rounded-circle">
                     <span class="pro-user-name ms-1">
                         <i class="mdi mdi-chevron-down"></i>
                     </span>
                 </a>
                 <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                     <!-- item-->
                     <div class="dropdown-header noti-title">
                         <h6 class="text-overflow m-0">{{ auth()->user()->name ?? '' }}</h6>
                     </div>
                     <div class="dropdown-divider"></div>
                     <a class="dropdown-item notify-item">
                         @foreach (auth()->user()->roles as $role)
                             <span class="badge bg-primary">{{ $role->title }}</span>
                         @endforeach
                     </a>

                     <div class="dropdown-divider"></div>

                     <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                         <i class="fe-log-out"></i> {{ __('Logout') }}
                     </a>

                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                         @csrf
                     </form>

                 </div>
             </li>



         </ul>

         <!-- LOGO -->
         <div class="logo-box">
             <a href="index.html" class="logo logo-dark text-center">
                 <span class="logo-sm">
                     <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">
                     <!-- <span class="logo-lg-text-light">UBold</span> -->
                 </span>
                 <span class="logo-lg">
                     <img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="20">
                     <!-- <span class="logo-lg-text-light">U</span> -->
                 </span>
             </a>

             <a href="{{ route('admin.home') }}" class="logo logo-light text-center">
                 <span class="logo-sm">
                     <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">
                 </span>
                 <span class="logo-lg">
                     {{-- <img src="{{ asset('assets/images/logo-light.png') }}" alt="" height="20"> --}}
                     <h2
                         style="color: #FFF;
                     margin-top: -2px;
                     font-size: 23px;">
                         Institute </h2>
                 </span>
             </a>
         </div>

         <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
             <li>
                 <button class="button-menu-mobile waves-effect waves-light">
                     <i class="fe-menu"></i>
                 </button>
             </li>

             <li>
                 <!-- Mobile menu toggle (Horizontal Layout)-->
                 <a class="navbar-toggle nav-link" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                     <div class="lines">
                         <span></span>
                         <span></span>
                         <span></span>
                     </div>
                 </a>
                 <!-- End mobile menu toggle-->
             </li>

         </ul>
         <div class="clearfix"></div>
     </div>
 </div>
 <!-- end Topbar -->
