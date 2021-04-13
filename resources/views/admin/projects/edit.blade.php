@extends('layouts.admin.app')
@section('title', 'Cadastro')
@push('styles')
    <link rel="stylesheet" href="{{ asset("css/dataTables.bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{asset("plugins/summernote/summernote-bs4.css")}}">
@endpush
@section('content-header')
    Cadastrar um novo projeto
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
                <form method="post" action="{{ route('projects.update', $project->id) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $project->name }}" placeholder="Nome do cliente">
                        </div>
                        <div class="form-group">
                            <label for="services">Descrição</label>
                            <textarea class="textarea" name="description" placeholder="Descrição "  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{  $project->name }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Imagem</label><br>
                            <img src="{{ asset('storage/public/'.$project->file) }}" class="img-bordered img-responsive" height="50"><Br>
                                <Br>
                            <input type="file" name="logo" id="exampleInputFile">

                            <p class="help-block">Arquivos PNG - JPG.</p>
                        </div>
                        <input type="submit" class="btn btn-block btn-success" value="CADASTRAR">
                </form>


            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        @push('scripts')
            <script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
            <script type="text/javascript">
                $(function () {
                    // Summernote
                    $('.textarea').summernote()
                })
            </script>
    @if ($errors->any())
        {!! toastr()->error('Houve um erro no cadastro', 'Atenção')->render() !!}
    @endif
    @endpush
@endsection

