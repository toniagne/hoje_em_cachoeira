

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">

            <li>
                <a href="{{ route('admin.dash') }}">
                    <i class="fa fa-dashboard"></i> <span>Painel</span>
                    <span class="pull-right-container">   </span>
                </a>
            </li>
            <li class="header">OPERACIONAL</li>
            <li class="active">
                <a href="{{ route('contracts.index') }}">
                    <i class="fa fa-bullhorn"></i> <span>Contratos</span>
                    <span class="pull-right-container">    </span>
                </a>
            </li>
            <li>
                <a href="{{ route('usefuls.index') }}">
                    <i class="fa fa-book"></i> <span>Úteis</span>
                    <span class="pull-right-container">    </span>
                </a>
            </li>
            <li>
                <a href="{{ route('clients.index') }}">
                    <i class="fa fa-users"></i> <span>Clientes</span>
                    <span class="pull-right-container">    </span>
                </a>
            </li>
            <li>
                <a href="{{ route('catalogs.list') }}">
                    <i class="fa fa-shopping-cart"></i> <span>Catálogo</span>
                    <span class="pull-right-container">    </span>
                </a>
            </li>
            <li>
                <a href="{{ route('users.index') }}">
                    <i class="fa fa-users"></i> <span>Usuários do sistema</span>
                    <span class="pull-right-container">   </span>
                </a>
            </li>
            <li>
                <a href="{{ route('projects.index') }}">
                    <i class="fa fa-certificate"></i> <span>Projetos</span>
                    <span class="pull-right-container">   </span>
                </a>
            </li>
            <li>
                <a href="{{ route('banners.index') }}">
                    <i class="fa fa-star"></i> <span>Carrosel</span>
                    <span class="pull-right-container">   </span>
                </a>
            </li>
            <li>
                <a href="{{ route('promotions.list') }}">
                    <i class="fa fa-shopping-bag"></i> <span>Promoções</span>
                    <span class="pull-right-container">   </span>
                </a>
            </li>

            <li>
                <a href="{{ route('news.index') }}">
                    <i class="fa fa-shopping-bag"></i> <span>Notícias</span>
                    <span class="pull-right-container">   </span>
                </a>
            </li>

            <li>
                <a href="{{ route('newscategory.index') }}">
                    <i class="fa fa-shopping-bag"></i> <span>Categorias de Notícias</span>
                    <span class="pull-right-container">   </span>
                </a>
            </li>

            <li>
                <a href="{{ route('raffles.list') }}">
                    <i class="fa fa-gift"></i> <span>Sorteios</span>
                    <span class="pull-right-container">   </span>
                </a>
            </li>

            <li>
                <a href="{{ route('adverts.index') }}">
                    <i class="fa fa-shopping-bag"></i> <span>Banner</span>
                    <span class="pull-right-container">   </span>
                </a>
            </li>

            <li class="header">CONFIGURAÇÕES</li>
            <li>
                <a href="{{ route('advertisements.index') }}">
                    <i class="fa fa-credit-card"></i> <span>Plano de negócios</span>
                    <span class="pull-right-container">   </span>
                </a>
            </li>
            <li>
                <a href="{{ route('payments.index') }}">
                    <i class="fa fa-barcode"></i> <span>Formas de pagamentos</span>
                    <span class="pull-right-container">    </span>
                </a>
            </li>
            <li>
                <a href="{{ route('categories.index') }}">
                    <i class="fa fa-cube"></i> <span>Categorias do site</span>
                    <span class="pull-right-container">   </span>
                </a>
            </li>
            <li class="header">FINANCEIRO</li>
            <li>
                <a href="{{ route('receive.index') }}">
                    <i class="fa fa-cube"></i> <span>Contas à receber</span>
                    <span class="pull-right-container">   </span>
                </a>
            </li>
            <li class="header">E-COMMERCE</li>
            <li>
                <a href="{{ route('ecommerce.list') }}">
                    <i class="fa fa-shopping-bag"></i> <span>Produtos</span>
                    <span class="pull-right-container">   </span>
                </a>
            </li>
            <li>
                <a href="{{ route('orders.index') }}">
                    <i class="fa fa-paper-plane"></i> <span>Pedidos</span>
                    <span class="pull-right-container">   </span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
