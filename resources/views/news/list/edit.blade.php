@extends('layouts.admin.app')
@section('title', 'Cadastro de notícias')
@push('styles')
    <link rel="stylesheet" href="{{asset("plugins/summernote/summernote-bs4.css")}}">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/js/plugins/piexif.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/js/plugins/sortable.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/js/plugins/purify.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/js/fileinput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/themes/fa/theme.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/js/locales/pt_BR.js"></script>
@endpush
@section('content-header')
    Editar notícia - {{ $news->title }}
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
                <form method="post" action="{{ route('news.update', $news->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Categoria</label>

                            <select name="news_categtory_id" class="form-control select2" style="width: 100%;">
                                <option selected="selected">Selecione</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $news->news_categtory_id == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="name">Título</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $news->title }}" placeholder="Nome">
                        </div>
                        <div class="form-group">
                            <label for="description">Descrição</label>
                            <input type="text" class="form-control" id="description" name="description" value="{{ $news->description }}" placeholder="Descrição">
                        </div>


                        <div class="form-group">
                            <label for="body">Notícia</label>
                            <textarea id="body" class="textarea" name="body" placeholder="Corpo da notícia"  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $news->body }}</textarea>
                        </div>


                        <div class="form-group">
                            <label for="link">Link do banner</label>
                            <input type="text" class="form-control" id="link" name="link" value="{{ $news->link }}" placeholder="Descrição">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Banner</label>
                            <input type="file" name="logo" id="exampleInputFile">

                            <p class="help-block">Arquivos PNG - JPG.</p>
                        </div>

                    </div>
                    <div class="form-group">
                        <input id="input-b1" name="attachments[]" type="file" class="file" multiple data-browse-on-zone-click="true">
                    </div>

                    <br><Br>
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

    @endif
    @endpush
@endsection

