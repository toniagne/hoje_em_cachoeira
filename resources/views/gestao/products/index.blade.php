@extends('layouts.gestao.app')
@section('title', 'Cadastro')
    @push('styles')
        <link rel="stylesheet" href="{{ asset("css/dataTables.bootstrap.min.css") }}">
    @endpush
@section('content-header')
    Produtos
@endsection

@section('content')

    <!-- Main content -->
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <a href="{{ route('gestao.products.create') }}" class="btn btn-block btn-info">  <i class="fa fa-edit"></i> ADICIONAR UM NOVO PRODUTO</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>

                                <th>Nome</th>
                                <th>Categoria</th>
                                <th>Valor</th>
                                <th>Estoque</th>
                                <th>Fotos</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($products as $product)
                            <tr>


                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->value }}</td>
                                <td>{{ $product->stock->next_number }}</td>
                                <td>{{ $product->attachments->count() }}</td>
                                <td>
                                    <a class="btn btn-sm" href="{{ route('gestao.products.edit', $product->id) }}"> <i class="fa fa-edit"></i>  </a>
                                    <a class="btn btn-sm"  data-toggle="modal" data-target="#iconModal-{{ $product->id }}"> <i class="fa fa-trash"></i>  </a>


                                    <div class="modal fade text-xs-left" id="iconModal-{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h4 class="modal-title" id="myModalLabel2"><i class="icon-warning2"></i> Confirma operação</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Você tem certeza que quer <strong>apagar</strong> esta categoria ?</p>

                                                    <h5>Lembre-se que os clientes atrelados à ela serão ocultados no site.</h5>

                                                </div>
                                                <div class="modal-footer">
                                                    <form method="POST" action="{{ route('gestao.products.destroy', $product->id) }}">
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
