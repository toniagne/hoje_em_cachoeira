@extends('layouts.admin.app')
@section('title', 'Cadastro')
@push('styles')
    <link rel="stylesheet" href="{{ asset("css/dataTables.bootstrap.min.css") }}">
@endpush
@section('content-header')
    Catálogos / Escola um cliente
@endsection

@section('content')

    <!-- Main content -->
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Telefone</th>
                            <th>Endereço</th>
                            <th>Situação</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($clients as $client)
                            <tr>
                                <td>{{ $client->name }}</td>
                                <td>{{ $client->email }}</td>
                                <td>{{ $client->phone }} {{ $client->phone_comercial }}</td>
                                <td>{{ $client->address }}</td>
                                <td>{{ $client->situation() }}</td>
                                <td>
                                    <a href="{{ route('catalogs.list-catalogs', $client->id) }}" class="btn btn-block btn-info">  <i class="fa fa-edit"></i> VER CATÁLOGO</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    @push('scripts')
        @if (session('message'))
            {!! toastr()->info(session('message'), 'Atenção')->render() !!}
        @endif
    @endpush
@endsection
