<!-- Right bar overlay-->
{{-- <div class="rightbar-overlay"></div> --}}

<!-- Vendor js -->

<script src="{{asset('assets/js/vendor.min.js')}}"></script>
<script src="{{ asset('assets/libs/select2/js/select2.min.js')}}"></script>

<script src="{{asset('assets/js/pages/dashboard-2.init.js')}}"></script>

<script src="{{ asset('assets/libs/toastr/toastr.min.js') }}"></script>

{!! Toastr::message() !!}
<script src="{{asset('assets/js/app.min.js')}}"></script>

<form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
<!-- third party js -->
<script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>

<!-- third party js ends -->
<!-- Datatables init -->

<script>
    $(window).on('load', function () {
    $('.dashboard-loader').fadeOut(500);
});

</script>
@yield('custom-script')

<!-- App js -->





</body>
</html>
