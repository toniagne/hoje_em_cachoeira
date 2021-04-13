<div class="sidenav-content">
    <div id="mySidenav" class="sidenav" >
        <h2 id="web-name"></h2>

        <div id="main-menu">
            <div class="closebtn">
                <button class="btn btn-default" id="closebtn">&times;</button>
            </div><!-- end close-btn -->

            <div class="list-group panel">


                <a href="{{ route('home.index') }}" class="list-group-item"><span><i class="fa fa-home link-icon"></i></span>Início<span></span></a>

                <a href="{{ route('home.category', 'telefones-uteis') }}" class="list-group-item"><span><i class="fa fa-home link-icon"></i></span>Telefones úteis<span></span></a>

                <a href="{{ route('home.about') }}" class="list-group-item"><span><i class="fa fa-home link-icon"></i></span>Quem Somos<span></span></a>

                <a href="{{ route('home.projects') }}" class="list-group-item"><span><i class="fa fa-home link-icon"></i></span>Projetos<span></span></a>

                <a href="#flights-links" class="list-group-item" data-toggle="collapse" data-parent="#main-menu"><span><i class="fa fa-plane link-icon"></i></span>Por Categorias<span><i class="fa fa-chevron-down arrow"></i></span></a>
                <div class="collapse sub-menu" id="flights-links">
                    @foreach ($categories as $category)

                        <a href="{{ route('home.category', $category->slug) }}" class="list-group-item">{{ $category->name }}</a>
                    @endforeach
                </div><!-- end sub-menu -->


            </div><!-- end list-group -->
        </div><!-- end main-menu -->
    </div><!-- end mySidenav -->
</div><!-- end sidenav-content -->
