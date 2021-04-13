@extends('layouts.admin.app')
@section('title', 'Cadastro')
@push('styles')
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
    <!-- Ekko Lightbox -->
    <link rel="stylesheet" href="{{asset("plugins/ekko-lightbox/ekko-lightbox.css")}}">
    <link rel="stylesheet" href="{{asset("plugins/summernote/summernote-bs4.css")}}">
@endpush
@section('content-header')
   Editando o catalogo {{$catalog->name }} do cliente {{ $catalog->client->name }}
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
                <form method="post" action="{{ route('catalogs.update', [$catalog->id, $client->id]) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">Nome da galeria / Título</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $catalog->name }}" placeholder="Título da galeria">
                        </div>
                        <div class="form-group">
                            <label for="name">Descrição</label>
                            <textarea class="textarea" name="description" placeholder="Descrição da galeria"  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $catalog->description }}</textarea>
                        </div>

                        <!-- Main content -->
                        <section class="content">
                            <div class="container-fluid">

                                <div class="card-body">

                                            @foreach ($catalog->attachments()->get() as $photo)
                                                <div class="row">
                                                    <div class="col-sm-2">
                                                        <img src="{{ asset('storage/public/'.$photo->path) }}" class="img-fluid mb-2" alt="white sample" width="150px">
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <textarea  class="form-control" name="file_description[{{$photo->id}}]"> {{ $photo->file_description }}</textarea>
                                                    </div>
                                                </div>
                                                <div><Br><Br></div>
                                            @endforeach
                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.container-fluid -->
                        </section>
                        <!-- /.content -->


                        <br><br>
                  <input type="submit" class="btn btn-block btn-success" value="CADASTRAR">
                </form>


            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    @push('scripts')

            <!-- optionally if you need translation for your language then include  locale file as mentioned below -->
        <!-- Ekko Lightbox -->
            <script src="{{asset("plugins/ekko-lightbox/ekko-lightbox.min.js")}}"></script>
                <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
                <!-- piexif.min.js is needed for auto orienting image files OR when restoring exif data in resized images and when you
                    wish to resize images before upload. This must be loaded before fileinput.min.js -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/js/plugins/piexif.min.js" type="text/javascript"></script>
                <!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview.
                    This must be loaded before fileinput.min.js -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/js/plugins/sortable.min.js" type="text/javascript"></script>
                <!-- purify.min.js is only needed if you wish to purify HTML content in your preview for
                    HTML files. This must be loaded before fileinput.min.js -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/js/plugins/purify.min.js" type="text/javascript"></script>
                <!-- popper.min.js below is needed if you use bootstrap 4.x. You can also use the bootstrap js
                   3.3.x versions without popper.min.js. -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
                <!-- bootstrap.min.js below is needed if you wish to zoom and preview file content in a detail modal
                    dialog. bootstrap 4.x is supported. You can also use the bootstrap js 3.3.x versions. -->
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" type="text/javascript"></script>
                <!-- the main fileinput plugin file -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/js/fileinput.min.js"></script>

                <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/js/locales/pt-BR.js"></script>

            <script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
            <script type="text/javascript">
                $(function () {
                    // Summernote
                    $('.textarea').summernote()
                })
            </script>

                <script>

                $(function () {

                    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                        event.preventDefault();
                        $(this).ekkoLightbox({
                            alwaysShowClose: true
                        });
                    });

                    $('.filter-container').filterizr({gutterPixels: 3});
                    $('.btn[data-filter]').on('click', function() {
                        $('.btn[data-filter]').removeClass('active');
                        $(this).addClass('active');
                    });
                })
            </script>
        @if ($errors->any())
            {!! toastr()->error('Houve um erro no cadastro', 'Atenção')->render() !!}
        @endif
    @endpush
@endsection

