

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">

            <li>
                <a href="{{ route('gestao.home') }}">
                    <i class="fa fa-dashboard"></i> <span>Painel</span>
                    <span class="pull-right-container">   </span>
                </a>
            </li>
            <li class="header">OPERACIONAL</li>

            <li>
                <a href="{{ route('gestao.catalogs.index') }}">
                    <i class="fa fa-shopping-cart"></i> <span>Catálogo</span>
                    <span class="pull-right-container">    </span>
                </a>
            </li>

            <li class="header">E-COMMERCE</li>

            <li>
                <a href="{{ route('gestao.products.index') }}">
                    <i class="fa fa-shopping-bag"></i> <span>Produtos</span>
                    <span class="pull-right-container">   </span>
                </a>
            </li>
            <li>
                <a href="{{ route('gestao.categories.index') }}">
                    <i class="fa fa-cube"></i> <span>Categorias</span>
                    <span class="pull-right-container">   </span>
                </a>
            </li>
            <li class="header">FINANCEIRO</li>
            <li>
                <a href="{{ route('gestao.orders.index') }}">
                    <i class="fa fa-paper-plane"></i> <span>Pedidos</span>
                    <span class="pull-right-container">   </span>
                </a>
            </li>



        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
