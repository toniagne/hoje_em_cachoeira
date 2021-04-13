@extends('layouts.admin.app')
@section('title', 'Cadastro')
@push('styles')
    <link rel="stylesheet" href="{{ asset("css/select2.min.css") }}">
    <link rel="stylesheet" href="{{asset("plugins/daterangepicker/daterangepicker.css")}}">
    <link rel="stylesheet" href="{{asset("plugins/icheck-bootstrap/icheck-bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css")}}">
    <link rel="stylesheet" href="{{asset("plugins/select2/css/select2.min.css")}}">
    <link rel="stylesheet" href="{{asset("plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css")}}">
@endpush
@section('content-header')
    Cadastrar úteis
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
                <form method="POST" action="{{ route('usefuls.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        <input type="hidden" value="{{ rand(1,8) }}" name="contract_number">
                        <input type="hidden" value="7" name="advertsement_id">
                        <input type="hidden" value="10" name="category_id">
                        <input type="hidden" value="{{ now()->format('d/m/Y') }}" name="date_start">
                        <input type="hidden" value="{{ now()->format('d/m/3000') }}" name="date_end">
                        <input type="hidden" value="4" name="payment_id">
                        <input type="hidden" value="0,00" name="amount">
                        <input type="hidden" value="0,00" name="discount">
                        <input type="hidden" value="0,00" name="total">

                        <div class="form-group">
                            <label for="tags">Tags de pesquisa</label>
                            <input type="text" name="tags" class="form-control" value="{{old('tags')}}" id="tags" placeholder="TAGs de pesquisa">
                            <p class="help-block">Palavras chave para pesqsuisa no site, (separadas por vírgula)</p>
                        </div>

                        <div class="form-group">
                            <label for="name">Nome do cliente</label>
                            <select name="client_id" class="form-control select2" style="width: 100%;">
                                <option selected="selected">Selecione</option>
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->name }} ({{$client->document}})</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Imagem Principal / Logo</label>
                            <input type="file" name="logo" id="exampleInputFile">

                            <p class="help-block">Arquivos PNG - JPG. (400px x 400px)</p>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-block btn-success" value="CADASTRAR">
                </form>


        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@push('scripts')

            <!-- Bootstrap 4 -->
            <script src="{{asset("plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
            <!-- Select2 -->
            <script src="{{asset("plugins/select2/js/select2.full.min.js")}}"></script>
            <!-- Bootstrap4 Duallistbox -->
            <script src="{{asset("plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js")}}"></script>
            <!-- InputMask -->
            <script src="{{asset("plugins/moment/moment.min.js")}}"></script>
            <script src="{{asset("plugins/inputmask/min/jquery.inputmask.bundle.min.js")}}"></script>
            <!-- date-range-picker -->
            <script src="{{asset("plugins/daterangepicker/daterangepicker.js")}}"></script>
            <!-- bootstrap color picker -->
            <script src="{{asset("plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js")}}"></script>
            <!-- Tempusdominus Bootstrap 4 -->
            <script src="{{asset("plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js")}}"></script>
            <!-- Bootstrap Switch -->
            <script src="{{asset("plugins/bootstrap-switch/js/bootstrap-switch.min.js")}}"></script>


            <script>


                $(function () {
                    Number.prototype.toBrl = function () {
                        return this.toFixed(2).replace('.', ',');
                    };

                    $('#advertsement').on('change', function () {

                        var SelectedValue = $(this).find(':selected').data('amount');

                         $('#amount').val(SelectedValue);
                         $('#total').val(SelectedValue);
                    });
                    $('#discount').on("input", function() {
                        var discount = this.value;
                        var amount   = $('#amount').val();
                        var number   = Number(amount.replace(/[^0-9.-]+/g,"."));
                        var calc1    = discount * number;
                        var calc2    = calc1 / 100;
                        var result   = number - calc2;

                        $('#total').val(parseFloat(result).toBrl());
                    });
                    //Initialize Select2 Elements
                    $('.select2').select2()

                    //Initialize Select2 Elements
                    $('.select2bs4').select2({
                        theme: 'bootstrap4'
                    })

                    //Datemask dd/mm/yyyy
                    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
                    //Datemask2 mm/dd/yyyy
                    $('#datemask2').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
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
                            ranges   : {
                                'Today'       : [moment(), moment()],
                                'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                                'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                                'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                                'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                            },
                            startDate: moment().subtract(29, 'days'),
                            endDate  : moment()
                        },
                        function (start, end) {
                            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
                        }
                    )

                    //Timepicker
                    $('#timepicker').datetimepicker({
                        format: 'LT'
                    })

                    //Bootstrap Duallistbox
                    $('.duallistbox').bootstrapDualListbox()

                    //Colorpicker
                    $('.my-colorpicker1').colorpicker()
                    //color picker with addon
                    $('.my-colorpicker2').colorpicker()

                    $('.my-colorpicker2').on('colorpickerChange', function(event) {
                        $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
                    });

                    $("input[data-bootstrap-switch]").each(function(){
                        $(this).bootstrapSwitch('state', $(this).prop('checked'));
                    });

                })
            </script>
        @if ($errors->any())
            {!! toastr()->error('Houve um erro no cadastro', 'Atenção')->render() !!}
        @endif

@endpush
@endsection
