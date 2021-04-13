@extends('layouts.gestao.app')
@section('title', 'Cadastro')
@push('styles')
    <link rel="stylesheet" href="{{asset("plugins/summernote/summernote-bs4.css")}}">

    <link href="{{ asset('upload/dist/font/font-fileuploader.css') }}" rel="stylesheet">
    <!-- styles -->
    <link href="{{ asset('upload/dist/jquery.fileuploader.min.css') }}" media="all" rel="stylesheet">
    <link href="{{ asset('css/script.css') }}" media="all" rel="stylesheet">

@endpush
@section('content-header')
    Cadastrar um novo catálogo
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
                <form method="post" action="{{ route('gestao.catalogs.update', $catalog->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">Nome da galeria / Título</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $catalog->name }}" placeholder="Título da galeria">
                        </div>
                        <div class="form-group">
                            <label for="name">Descrição</label>
                            <textarea class="textarea" name="description" placeholder="Descrição da galeria"  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $catalog->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="value">Valor</label>
                            <input type="text" class="form-control" id="value" name="value" value="{{ $catalog->value }}" placeholder="Valor">
                        </div>
                        <div class="form-group">
                            <label for="file">Imagens</label>
                            <input id="file" type="file" name="attachments" data-fileuploader-files='{{ $catalog->getPreloadFiles() }}'>
                        </div>

                        <input type="hidden" name="client_id">
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
                                item.html.find('.fileuploader-action-remove').before('<button type="button" class="fileuploader-action fileuploader-action-popup fileuploader-action-edit" title="Edit"><i class="fileuploader-icon-edit"></i></button>')
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
                                return options.length + ' ' + (options.length > 1 ? 'arquivo foram' : 'arquivo foi') + ' chosen';
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
                                remoteFile: 'Este arquivo não é aceito.',
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

