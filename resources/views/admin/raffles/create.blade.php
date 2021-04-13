@extends('layouts.admin.app')
@section('title', 'Cadastro')
@push('styles')
    <link rel="stylesheet" href="{{asset("plugins/summernote/summernote-bs4.css")}}">
    <link rel="stylesheet" href="{{asset("plugins/daterangepicker/daterangepicker.css")}}">

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
    <i class="fa fa-gift"></i> Cadastrar um novo sorteio / Cliente: <b>{{ $client->name }}</b>
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
                <form method="post" action="{{ route('raffles.store', $client->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">Título do sorteio</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Título da galeria">
                        </div>
                        <div class="form-group">
                            <label for="name">Descrição</label>
                            <textarea class="textarea" name="description" placeholder="Descrição da galeria"  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{old('description')}}</textarea>
                        </div>

                        <div class="form-group ">
                            <label>Data Início:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <div class="input-group date" id="date_start" data-target-input="nearest" style="width:100%">
                                    <input type="text" name="end" value="{{old('end')}}" class="form-control datetimepicker-input input-group-append" data-target="#date_start" data-toggle="datetimepicker"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <input id="input-b1" name="attachments[]" type="file" class="file" multiple data-browse-on-zone-click="true">
                        </div>

                        <br><br>
                    </div>
                    <input type="submit" class="btn btn-block btn-success" value="CADASTRAR">
                </form>
            <!-- /.col -->
        </div>

        </div>
    </div>
        <!-- /.row -->
    @push('scripts')
        <!-- date-range-picker -->
            <script src="{{asset("plugins/daterangepicker/daterangepicker.js")}}"></script>

            <script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
            <script type="text/javascript">
                $(function () {
                    Number.prototype.toBrl = function () {
                        return this.toFixed(2).replace('.', ',');
                    };

                    $('#advertsement').on('change', function () {

                        var SelectedValue = $(this).find(':selected').data('amount');

                        $('#amount').val(SelectedValue);
                        $('#total').val(SelectedValue);
                    });
                    $('#discount').on("input", function () {
                        var discount = this.value;
                        var amount = $('#amount').val();
                        var number = Number(amount.replace(/[^0-9.-]+/g, "."));
                        var calc1 = discount * number;
                        var calc2 = calc1 / 100;
                        var result = number - calc2;

                        $('#total').val(parseFloat(result).toBrl());
                    });
                    //Initialize Select2 Elements
                    $('.select2').select2()

                    //Initialize Select2 Elements
                    $('.select2bs4').select2({
                        theme: 'bootstrap4'
                    })

                    //Datemask dd/mm/yyyy
                    $('#datemask').inputmask('dd/mm/yyyy', {'placeholder': 'dd/mm/yyyy'})
                    //Datemask2 mm/dd/yyyy
                    $('#datemask2').inputmask('dd/mm/yyyy', {'placeholder': 'dd/mm/yyyy'})
                    //Money Euro
                    $('[data-mask]').inputmask()

                    //Date range picker
                    $('#date_start').datetimepicker({
                        format: 'DD/MM/YYYY'
                    });
                    $('#date_end').datetimepicker({
                        format: 'DD/MM/YYYY'
                    });
                    //Date range picker
                    $('#reservation').daterangepicker()
                    //Date range picker with time picker
                    $('#reservationtime').daterangepicker({
                        timePicker: true,
                        timePickerIncrement: 30,
                        locale: {
                            format: 'DD/MM/YYYY hh:mm A'
                        }
                    })
                    //Date range as a button
                    $('#daterange-btn').daterangepicker(
                        {
                            ranges: {
                                'Today': [moment(), moment()],
                                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                                'This Month': [moment().startOf('month'), moment().endOf('month')],
                                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                            },
                            startDate: moment().subtract(29, 'days'),
                            endDate: moment()
                        },
                        function (start, end) {
                            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
                        }
                    )

                    //Timepicker
                    $('#timepicker').datetimepicker({
                        format: 'LT'
                    })
                })

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

