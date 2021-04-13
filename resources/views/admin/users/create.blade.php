@extends('layouts.admin.app')
@section('title', 'Cadastro')
@section('content-header')
    Cadastrar novo usuário do sistema
@endsection

@section('content')

    <!-- Main content -->
    <div class="row">
        <div class="col-xs-12">

            <div class="box box-primary">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" action="{{ route('users.store') }}">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">Nome / apelido</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Nome para identificação do plano">
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="E-mail">
                        </div>
                        <div class="form-group">
                            <label for="name">Senha</label>
                            <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}" placeholder="Senha">
                        </div>


                        <div class="form-group">
                            <input type="submit" value="Salvar" class="btn btn-info btn-block">

                        </div>

                    </div>
                </form>


        </div>
        <!-- /.col -->
    </div>

@endsection
