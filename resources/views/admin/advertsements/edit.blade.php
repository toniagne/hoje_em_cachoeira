@extends('layouts.admin.app')
@section('title', 'Cadastro')
@section('content-header')
    Editar o plano &rarr; {{ $advertsement->name }}
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
                <form role="form" method="POST" action="{{ route('advertisements.update', $advertsement->id) }}">
                    @method('PUT')
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">Nome / apelido</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $advertsement->name }}" placeholder="Nome para identificação do plano">
                        </div>
                        <div class="form-group">
                            <label for="name">Detalhes</label>
                            <textarea class="form-control" rows="3" name="details" placeholder="Descrição do plano de negócios">{{ $advertsement->details }}</textarea>
                        </div>

                        <div class="form-check">
                            <label for="name">Serviços</label><br>
                            @foreach ($applications as $application)
                                <input type="checkbox" class="form-check-input" value="{{ $application->id }}" {{ $advertsement->isAttached($application->id) ? 'checked' : '' }} name="application[]" id="{{ $application->id }}">
                                <label class="form-check-label" for="{{ $application->id }}">{{ $application->name }}</label><Br>
                            @endforeach
                        </div>

                        <div class="form-group">
                            <label for="name">Valor</label>
                            <input type="text" class="form-control money" id="amount" value="{{ $advertsement->monetary() }}" name="amount" placeholder="Valor ">
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
