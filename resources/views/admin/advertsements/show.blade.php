@extends('layouts.admin.app')
@section('title', 'Cadastro')
@section('content-header')
    Visualizando o plano &rarr; {{ $advertsement->name }}
@endsection

@section('content')

    <!-- Main content -->
    <div class="row">
        <div class="col-xs-12">

            <div class="box box-primary">


            <!-- /.box-header -->
                    <div class="box-body">

                        <div class="post">
                            <div class="user-block">
                                <span class="username">
                                    <h2>{{ $advertsement->name }} </h2>
                                </span>
                                <span class="description">{{ $advertsement->details }}</span>
                                <span class="description text-bold">R$ {{ $advertsement->monetary() }}</span>
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            Serviços
                                        </h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <ol>
                                            @foreach ($advertsement->getApplications()->get() as $applications)
                                            <li>{{ $applications->application->name }}</li>
                                             @endforeach
                                        </ol>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->

                            </div>

                    </div>


            </div>
            <!-- /.col -->
        </div>
@endsection
