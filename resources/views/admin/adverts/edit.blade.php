@extends('layouts.admin.app')
@section('title', 'Cadastro')
@push('styles')
    <link rel="stylesheet" href="{{ asset("css/dataTables.bootstrap.min.css") }}">
@endpush
@section('content-header')
    Editando Banner Carrossel &rarr; {{ $advert->name }}
@endsection

@section('content')

    <!-- Main content -->
    <div class="row">
        <div class="col-xs-12">

            <div class="box box-primary">

                @if ($errors->any())
                    <div class="card-body">
                        <div class="callout callout-danger">
                            <h5>Preencha corretamente os campos.</h5>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
            @endif

            <!-- /.box-header -->
                <!-- form start -->
                <form method="post" action="{{ route('adverts.update', $advert->id) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $advert->name }}" placeholder="Nome do cliente">
                        </div>

                        <div class="form-group">
                            <label for="name">Link</label>
                            <input type="text" class="form-control" id="link" name="link" value="{{ $advert->link }}" placeholder="Nome do cliente">
                        </div>

                        <div class="form-group">
                            <label for="name">Nome do cliente</label>
                            <select name="client_id" class="form-control select2" style="width: 100%;">
                                <option selected="selected">Selecione</option>
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}" {{ $advert->client_id  == $client->id ? 'selected' : '' }}>{{ $client->name }} ({{$client->document}})</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="name">Carrossel</label>
                            <select name="carrossel_id" class="form-control select2" style="width: 100%;">
                                <option selected="selected">Selecione</option>
                                @foreach ($carrossels as $carrossel)
                                    <option value="{{ $carrossel->id }}" {{ $advert->carrossel_id  == $carrossel->id ? 'selected' : '' }}>{{ $carrossel->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <input id="input-b1" name="attachments[]" type="file" class="file" multiple data-browse-on-zone-click="true">
                        </div>

                        <input type="submit" class="btn btn-block btn-success" value="ALTERAR">
                </form>


            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    @push('scripts')
        @if ($errors->any())
            {!! toastr()->error('Houve um erro no cadastro', 'Atenção')->render() !!}
        @endif
    @endpush
@endsection

