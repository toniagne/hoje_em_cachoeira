@extends('layouts.admin.app')
@section('title', 'Cadastro')
@section('content-header')
    Cadastrar novo plano de negócios
@endsection

@section('content')

    <!-- Main content -->
    <div class="row">
        <div class="col-xs-12">

            <div class="box box-primary">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" action="{{ route('advertisements.store') }}">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">Nome / apelido</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Nome para identificação do plano">
                        </div>
                        <div class="form-group">
                            <label for="name">Detalhes</label>
                            <textarea class="form-control" rows="3" name="details" value="{{ old('details') }}" placeholder="Descrição do plano de negócios"></textarea>
                        </div>

                        <div class="form-check">
                            <label for="name">Serviços</label><br>
                            @foreach ($applications as $application)
                                <input type="checkbox" class="form-check-input" value="{{ $application->id }}" name="application[]" id="{{ $application->id }}">
                                <label class="form-check-label" for="{{ $application->id }}">{{ $application->name }}</label><Br>
                            @endforeach
                        </div>

                        <div class="form-group">
                            <label for="name">Valor</label>
                            <input type="text" class="form-control money" id="amount" value="{{ old('amount') }}" name="amount" placeholder="Valor ">
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Salvar" class="btn btn-info btn-block">

                        </div>

                    </div>
                </form>


        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@push('scripts')
            <script src="{{ asset("js/jquery.inputmask.js") }}"></script>
            <script src="{{ asset("js/jquery.inputmask.date.extensions.js") }}"></script>
            <script src="{{ asset("js/jquery.inputmask.extensions.js") }}"></script>

            <script>
                $(function () {
                    //Datemask dd/mm/yyyy
                    $('#money').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
                    //Datemask2 mm/dd/yyyy
                    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
                    //Money Euro
                    $('[data-mask]').inputmask()


                })
            </script>
@endpush
@endsection
