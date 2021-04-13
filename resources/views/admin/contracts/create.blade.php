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
    Cadastrar novo contrato
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
                <form method="POST" action="{{ route('contracts.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="numeber">Número do contrato</label>
                            <input type="number" name="contract_number" class="form-control" value="{{old('contract_number')}}" id="numeber" placeholder="Número do contrato">
                        </div>

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

                        <div class="row">
                            <div class="col-sm-3">
                                <label for="exampleInputEmail1">Tipo de publicidade</label>

                                <select name="advertsement_id" id="advertsement" class="form-control select2" style="width: 100%;">
                                    <option selected="selected">Selecione</option>
                                    @foreach ($advertsements as $advertsement)
                                        <option data-amount="{{$advertsement->monetary()}}" value="{{ $advertsement->id }}" >{{ $advertsement->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <label for="exampleInputEmail1">Categoria</label>

                                <select name="category_id" class="form-control select2" style="width: 100%;">
                                    <option selected="selected">Selecione</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" >{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <label for="exampleInputEmail1">Carrosel</label>

                                <select name="banner_id" class="form-control select2" style="width: 100%;">
                                    <option value="">NÃO INCLUIR</option>
                                    @foreach ($carrosels as $carrosel)
                                        <option value="{{ $carrosel->id }}" >{{ $carrosel->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <label for="exampleInputEmail1"> Destaque no site </label>
                                <Br>
                                <input type="radio" name="spot" value="1"> Sim
                                <input type="radio" name="spot" value="0" > Não
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 ">
                                <label>Data Início:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <div class="input-group date" id="date_start" data-target-input="nearest" style="width:100%">
                                        <input type="text" name="date_start" value="{{old('date_start')}}" class="form-control datetimepicker-input input-group-append" data-target="#date_start" data-toggle="datetimepicker"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label>Data Fim:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <div class="input-group date" id="date_end" data-target-input="nearest" style="width:100%">
                                        <input type="text" name="date_end" value="{{old('date_end')}}" class="form-control datetimepicker-input input-group-append" data-target="#date_end" data-toggle="datetimepicker"/>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Pagamento</h3>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="phone">Forma de pagamento</label>
                                            <select name="payment_id" class="form-control select2" style="width: 100%;">
                                                <option selected="selected">Selecione</option>
                                                @foreach ($payments as $payment)
                                                    <option value="{{ $payment->id }}">{{ $payment->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Valor Mensal</label>
                                        <input type="text" name="amount" value="{{old('amount')}}" class="form-control money" id="amount" readonly  placeholder="Valor mensal">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Desconto (%)</label>
                                        <input type="number" value="0,00" class="form-control"   id="discount" placeholder="Desconto" name="discount">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Total</label>
                                        <input type="text" value="0,00" class="form-control money"   id="total" placeholder="Valor Total" name="total">
                                    </div>
                                </div>
                            </div>


                        </div>



                        <div class="form-group">
                            <label for="exampleInputFile">Imagem Principal / Destaque</label>
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
