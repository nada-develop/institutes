<html lang="en">
<head>
    @include('partials.header')
</head>

<body class="loading"  data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": false}, "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": true}'>
  <div class="dashboard-loader">
        <div  class="la-ball-clip-rotate-multiple la-2x loader-spinner">
          <div></div>
          <div></div>
      </div>
    </div>
    <div id="wrapper" style="overflow:auto; overflow-x: hidden ">
        @include('partials.navbar')

        @include('partials.left-sidebar')

        <div class="content-page">
            @yield('content')
            @include('partials.footer')
        </div>
    </div>

    @include('partials.scripts')
</body>
</html>
