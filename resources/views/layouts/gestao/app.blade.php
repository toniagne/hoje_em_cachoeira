@include('layouts.gestao.header')

    @include("layouts.gestao.menus")
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <section class="content-header">
            <h1>
               @yield('content-header')
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Tables</a></li>
                <li class="active">Data tables</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
                @yield('content')
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->



<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.13
    </div>
    <strong>Copyright &copy; {{ date('Y') }} <a href="http://www.hojecachoeira.com.br">Hoje!Cachoeira</a>.</strong>
    Todos os direitos reservados.
</footer>

@include('layouts.admin.footer')
