<!-- jQuery -->
<script src="{{ asset('UI/Admin/Panel/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('UI/Admin/Panel/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('UI/Admin/Panel/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('UI/Admin/Panel/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('UI/Admin/Panel/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
{{-- <script src="{{ asset('UI/Admin/Panel/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('UI/Admin/Panel/plugins/jqvmap/maps/jquery.vmap.world.js') }}"></script> --}}
<!-- jQuery Knob Chart -->
<script src="{{ asset('UI/Admin/Panel/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('UI/Admin/Panel/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('UI/Admin/Panel/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('UI/Admin/Panel/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
</script>
<!-- Summernote -->
<script src="{{ asset('UI/Admin/Panel/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('UI/Admin/Panel/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('UI/Admin/Panel/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('UI/Admin/Panel/dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('UI/Admin/Panel/dist/js/demo.js') }}"></script>

<!-- Froala Editor -->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js">
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js">
</script>
<script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.0//js/froala_editor.pkgd.min.js"></script>

<script src="https://adminlte.io/themes/v3/plugins/select2/js/select2.full.min.js"></script>

{{-- Bootstrap Table --}}
<script src="{{ asset('js/bootstrap-table.js') }}"></script>
{{-- Custom Table Call --}}
<script src="{{ asset('js/table.js') }}"></script>

@yield('extraJS')
