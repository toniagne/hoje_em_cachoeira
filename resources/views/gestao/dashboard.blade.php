@extends('layouts.gestao.app')
@section('title', 'Cliente')

@section('content-header')
    Painel do cliente
@endsection

@section('content')

    <!-- Info boxes -->
    <div class="row">

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Categorias</span>
                    <span class="info-box-number">15</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Estoque</span>
                    <span class="info-box-number">5 Produtos</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Novos Produtos</span>
                    <span class="info-box-number">123</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">te@gmail.com | 5135301060 | Conj. 502
        <div class="col-sm-12 ">
            <div class="box box-primary">

                <form method="post" action="{{ route('gestao.client.upload_banner') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="file">Imagem principal (1920px X 475px) </label><Br>
                            <Br>
                        <img src="{{asset('storage/public/'.$client->ecommerce_image)}}" height="200px"/>
<Br><Br>
                        <input id="file" type="file" name="attachments">
                    </div>
                    <input type="submit" class="btn btn-block btn-success" value="ALTERAR">
                </form>

            </div>
        </div>
    </div>




@endsection
