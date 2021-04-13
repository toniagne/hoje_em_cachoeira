@extends('layouts.admin.app')
@section('title', 'Cadastro')
@section('content-header')
    Visualizando cliente {{ $client->name }}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="img-bordered-sm img-fluid "
                                 src="{{ asset('storage/'.$client->file)}}"
                                 width="100%"
                                 alt="User profile picture">
                        </div>
                        <h3 class="profile-username text-center">{{ $client->name }}</h3>

                        <p class="text-muted text-center">{{ $client->situation() }}</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>CNPJ</b> <a class="float-right">{{ $client->document }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Fone/Comercial</b> <a class="float-right">{{ $client->phone_comercial }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Fone/WhatsApp</b> <a class="float-right">{{ $client->phone }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>E-mail</b> <a class="float-right">{{ $client->email }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Endereço</b> <a class="float-right">{{ $client->address }}</a>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="panel with-nav-tabs panel-primary">
                    <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1primary" data-toggle="tab">CONTRATOS</a></li>
                            <li><a href="#tab2primary" data-toggle="tab">RELEASE / QUEM SOMOS</a></li>
                            <li><a href="#tab3primary" data-toggle="tab">CATÁLOGO</a></li>
                        </ul>
                    </div>
                    <div class="panel-body">
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="tab1primary">


                            </div>
                            <div class="tab-pane fade" id="tab2primary">
                                 {!! $client->release !!}
                            </div>
                            <div class="tab-pane fade" id="tab3primary">Primary 3</div>
                        </div>
                    </div>
                </div>
            </div>
            </div>

        </div>

    </div>
@endsection

