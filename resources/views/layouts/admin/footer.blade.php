<!-- jQuery 3 -->
<script src="{{ asset("plugins/jquery/jquery.min.js") }}"></script>


<!-- Bootstrap 3.3.7 -->
<script src="{{ asset("js/bootstrap.min.js") }}"></script>
<!-- DataTables -->
<script src="{{ asset("js/jquery.dataTables.min.js") }}"></script>
<script src="{{ asset("js/dataTables.bootstrap.min.js") }}"></script>
<!-- SlimScroll -->
<script src="{{ asset("js/jquery.slimscroll.min.js") }}"></script>
<!-- FastClick -->
<script src="{{ asset("js/fastclick.js") }}"></script>
<script src="{{asset("plugins/toastr/toastr.min.js")}}"></script>

<!-- AdminLTE App -->
<script src="{{ asset("js/adminlte.min.js") }}"></script>
<script src="{{ asset("js/jquery.mask.min.js") }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset("js/demo.js") }}"></script>

@stack('scripts')
<!-- page script -->
<script>
    $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    })

    $(document).ready(function(){
        $('.cep').mask('00000-000');
        $('.phone').mask('(00)00000-0000');
        $('.phone_comercial').mask('(00)0000-0000');
    });
</script>


</body>
</html>
