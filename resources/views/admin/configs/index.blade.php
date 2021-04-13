@extends('layouts.admin.app')
@section('title', 'Cadastro')
    @push('styles')
        <link rel="stylesheet" href="{{ asset("css/dataTables.bootstrap.min.css") }}">
    @endpush
@section('content-header')
    Configurações do site
@endsection

@section('content')

    <!-- Main content -->
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <a href="{{ route('configs.create') }}" class="btn btn-block btn-info">  <i class="fa fa-edit"></i> CRIAR UMA CONFIGURAÇÃO</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Titulo do Site</th>
                                <th>Slide</th>
                                <th>Logo</th>
                                <th>Release</th>
                                <th>Meta-tags</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($configs as $config)
                            <tr>
                                <td>{{ $config->title }}</td>
                                <td><img class="img-bordered-sm img-fluid "
                                         src="{{ asset('storage/public/'.$config->slides)}}"
                                         height="100px"
                                         alt="User profile picture"></td>
                                <td><img class="img-bordered-sm img-fluid "
                                         src="{{ asset('storage/public/'.$config->logo)}}"
                                         height="100px"
                                         alt="User profile picture"></td>
                                <td>{!! $config->release !!}</td>
                                <td>{!! $config->metatags !!}</td>
                                <td>

                                    <a class="btn btn-sm" href="{{ route('configs.edit', $config->id) }}"> <i class="fa fa-edit"></i>  </a>
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
