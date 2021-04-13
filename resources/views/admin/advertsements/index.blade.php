@extends('layouts.admin.app')
@section('title', 'Cadastro')
@section('content-header')
    Plano de negócios
@endsection

@section('content')

    <!-- Main content -->
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <a href="{{ route('advertisements.create') }}" class="btn btn-block btn-info">  <i class="fa fa-edit"></i> ADICIONAR UM NOVO PLANO DE NEGÓCIO</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Detalhes</th>
                                <th>Valor</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($advertsements as $advertsement)
                            <tr>
                                <td>{{ $advertsement->name }}</td>
                                <td>{{ $advertsement->details }}</td>
                                <td>{{ $advertsement->amount }}</td>
                                <td>
                                    <a class="btn btn-sm" href="{{ route('advertisements.edit', $advertsement->id) }}"> <i class="fa fa-edit"></i>  </a>
                                    <a class="btn btn-sm"  data-toggle="modal" data-target="#iconModal-{{ $advertsement->id }}"> <i class="fa fa-trash"></i>  </a>
                                    <a class="btn btn-sm" href="{{ route('advertisements.show', $advertsement->id) }}"> <i class="fa fa-eye"></i>  </a>
                                    <div class="modal fade text-xs-left" id="iconModal-{{ $advertsement->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h4 class="modal-title" id="myModalLabel2"><i class="icon-warning2"></i> Confirma operação</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Você tem certeza que quer <strong>apagar</strong> esta regra ?</p>

                                                </div>
                                                <div class="modal-footer">
                                                    <form method="POST" action="{{ route('advertisements.destroy', $advertsement->id) }}">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Fechar</button>
                                                        <button type="submit" class="btn btn-outline-primary">Deletar</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
