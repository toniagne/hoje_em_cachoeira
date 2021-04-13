@extends('layouts.admin.app')
@section('title', 'Cadastro')
@push('styles')
    <link rel="stylesheet" href="{{ asset("css/dataTables.bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{asset("plugins/summernote/summernote-bs4.css")}}">
@endpush
@section('content-header')
    Cadastrar um carrosel
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
                <form method="post" action="{{ route('banners.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="title">Titulo</label>
                            <input type="text" class="form-control" id="title" name="name" value="{{ old('name') }}" placeholder="Nome do cliente">
                        </div>

                        <input type="hidden" name="category_id" value="1">
                        <input type="hidden" name="link" value="1">

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

