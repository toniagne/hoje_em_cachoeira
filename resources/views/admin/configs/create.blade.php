@extends('layouts.admin.app')
@section('title', 'Cadastro')
@push('styles')
    <link rel="stylesheet" href="{{ asset("css/dataTables.bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{asset("plugins/summernote/summernote-bs4.css")}}">
@endpush
@section('content-header')
    Cadastrar uma configuração
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
                <form method="post" action="{{ route('configs.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="title">Titulo do Site</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="Nome do cliente">
                        </div>

                        <div class="form-group">
                            <label for="metatags">Meta-Tags</label>
                            <input type="text" class="form-control" id="metatags" name="metatags" value="{{ old('metatags') }}" placeholder="Nome do cliente">
                            <p class="help-block">Palavras chave para pesquisa no google (palavras deve ser separadas por vírgula)</p>
                        </div>

                        <div class="form-group">
                            <label for="address">Release</label>
                            <textarea class="textarea" name="release" placeholder="Place some text here"  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{old('release')}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="address">Quem Somos</label>
                            <textarea class="textarea" name="about" placeholder="Place some text here"  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{old('release')}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="address">Política de privacidade</label>
                            <textarea class="textarea" name="policies" placeholder="Política de privacidae"  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{old('policies')}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="address">Termos de uso</label>
                            <textarea class="textarea" name="terms" placeholder="Termos de uso"  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{old('terms')}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Slide</label>
                            <input type="file" name="file_slide" id="exampleInputFile">
                            <p class="help-block">Arquivos PNG - JPG. | Tam. (1920x1280)</p>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Logotipo</label>
                            <input type="file" name="file_logo" id="exampleInputFile">

                            <p class="help-block">Arquivos PNG - JPG. | Tam. (265x50)</p>
                        </div>
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

