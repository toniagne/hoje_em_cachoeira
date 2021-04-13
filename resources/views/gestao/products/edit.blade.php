@extends('layouts.gestao.app')
@section('title', 'Cadastro')
@push('styles')
    <link rel="stylesheet" href="{{ asset("css/select2.min.css") }}">
    <link rel="stylesheet" href="{{asset("plugins/daterangepicker/daterangepicker.css")}}">
    <link rel="stylesheet" href="{{asset("plugins/icheck-bootstrap/icheck-bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css")}}">
    <link rel="stylesheet" href="{{asset("plugins/select2/css/select2.min.css")}}">
    <link rel="stylesheet" href="{{asset("plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css")}}">


    <link href="{{ asset('upload/dist/font/font-fileuploader.css') }}" rel="stylesheet">
    <!-- styles -->
    <link href="{{ asset('upload/dist/jquery.fileuploader.min.css') }}" media="all" rel="stylesheet">
    <link href="{{ asset('css/script.css') }}" media="all" rel="stylesheet">



@endpush
@section('content-header')
    Cadastrar um novo produto
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
                <form method="post" action="{{ route('gestao.products.update', $product->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" placeholder="Nome do cliente">
                        </div>

                        <div class="form-group">
                            <label for="value">Valor</label>
                            <input id="value" type="text" name="value" value="{{ $product->value }}" class="form-control money" id="amount"   placeholder="Valor do produto">
                        </div>


                        <div class="form-group">
                            <label for="description">Descrição</label>
                            <textarea class="textarea" id ="description" name="description" placeholder="Descrição"  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $product->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="stock">Quantidade em estoque</label>
                            <input type="number" name="stock" value="{{ $product->stock->next_number }}" class="form-control" id="stock"  placeholder="Quantidade">
                        </div>

                        <div class="form-group">
                            <label for="category">Categoria</label>

                            <select id="category" name="ecommerce_category_id" class="form-control select2" style="width: 100%;">
                                <option selected="selected">Selecione</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $product->ecommerce_category_id == $category->id ? 'selected' : ''  }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="file">Imagens</label>
                            <input id="file" type="file" name="attachments" data-fileuploader-files='{{ $product->getPreloadFiles() }}'>
                        </div>

                        <input type="hidden" name="client_id">
                        <input type="hidden" name="discount" value="0">
                        <input type="submit" class="btn btn-block btn-success" value="CADASTRAR">
                </form>


            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    @push('scripts')
        <!-- InputMask -->
            <script src="{{asset("plugins/moment/moment.min.js")}}"></script>
            <script src="{{asset("plugins/inputmask/min/jquery.inputmask.bundle.min.js")}}"></script>

            <script src="{{ asset('upload/dist/jquery.fileuploader.min.js') }}" type="text/javascript"></script>

            <script>


                $(document).ready(function() {

                    // enable fileuploader plugin
                    $('input[name="attachments"]').fileuploader({
                        limit: 20,
                        maxSize: 50,

                        extensions: ['jpg', 'jpeg'],
                        addMore: true,
                        thumbnails: {
                            onImageLoaded: function(item) {
                                if (!item.html.find('.fileuploader-action-edit').length)
                                    item.html.find('.fileuploader-action-remove').before('<button type="button" class="fileuploader-action fileuploader-action-popup fileuploader-action-edit" title="Edit"><i class="fileuploader-icon-edit"></i></button>');
                            }
                        },
                        editor: {
                            // editor cropper
                            cropper: {
                                // cropper ratio
                                // example: null
                                // example: '1:1'
                                // example: '16:9'
                                // you can also write your own
                                ratio: null,

                                // cropper minWidth in pixels
                                // size is adjusted with the image natural width
                                minWidth: null,

                                // cropper minHeight in pixels
                                // size is adjusted with the image natural height
                                minHeight: null,

                                // show cropper grid
                                showGrid: true
                            },

                            // editor on save quality (0 - 100)
                            // only for client-side resizing
                            quality: null,

                            // editor on save maxWidth in pixels
                            // only for client-side resizing
                            maxWidth: null,

                            // editor on save maxHeight in pixels
                            // only for client-size resizing
                            maxHeight: null,

                            // Callback fired after saving the image in editor
                            onSave: function(blobOrDataUrl, item, listEl, parentEl, newInputEl, inputEl) {
                                // callback will go here
                            }
                        },
                        captions: {
                            button: function(options) {
                                return 'Escolha ' + (options.limit == 1 ? 'file' : 'arquivos');
                            },
                            feedback: function(options) {
                                return 'Escolha ' + (options.limit == 1 ? 'file' : 'arquivos') + ' do produto';
                            },
                            feedback2: function(options) {
                                return options.length + ' ' + (options.length > 1 ? 'files were' : 'file was') + ' chosen';
                            },
                            confirm: 'Confirmar',
                            cancel: 'Cancelar',
                            name: 'Name',
                            type: 'Type',
                            size: 'Size',
                            dimensions: 'Dimensões',
                            duration: 'Duration',
                            crop: 'Cortar',
                            rotate: 'Rotacionar',
                            sort: 'Sort',
                            download: 'Download',
                            remove: 'Delete',
                            drop: 'Drop the files here to Upload',
                            paste: '<div class="fileuploader-pending-loader"></div> Pasting a file, click here to cancel.',
                            removeConfirmation: 'Are you sure you want to remove this file?',
                            errors: {
                                filesLimit: function(options) {
                                    return 'Only ${limit} ' + (options.limit == 1 ? 'file' : 'files') + ' can be uploaded.'
                                },
                                filesType: 'Only ${extensions} files are allowed to be uploaded.',
                                fileSize: '${name} is too large! Please choose a file up to ${fileMaxSize}MB.',
                                filesSizeAll: 'The chosen files are too large! Please select files up to ${maxSize} MB.',
                                fileName: 'A file with the same name ${name} is already selected.',
                                remoteFile: 'Remote files are not allowed.',
                                folderUpload: 'Folders are not allowed.'
                            }
                        }
                    });

                });


            </script>

    @if ($errors->any())
        {!! toastr()->error('Houve um erro no cadastro', 'Atenção')->render() !!}
    @endif
    @endpush
@endsection

