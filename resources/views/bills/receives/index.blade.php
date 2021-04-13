@extends('layouts.admin.app')
@section('title', 'Cadastro')
@section('content-header')
    Contas à receber
@endsection
@push('style')
    <link href="{{ asset('css/sweetalert2.min.css') }}" media="all" rel="stylesheet" type="text/css" />

@endpush
@section('content')
    @include('modals.create-bills')
    @include('modals.pay-bill')
    <!-- Main content -->
    <div class="row">
        <div class="col-xs-12">

            <div class="box">

                <div class="box-body">
                    <table id="bills" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Cliente</th>
                            <th>Vencimento</th>
                            <th>Status</th>
                            <th>Valor</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($entries->sortByDesc('due') as $entry)
                            <tr>
                                <td>{{ $entry->contract->client->name }}</td>
                                <td>{{ $entry->due->format('d/m/Y') }}</td>
                                <td>{{ $entry->getStatus() }}</td>
                                <td>{{ $entry->amount }}</td>
                                <td>

                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                            <i class="fa fa-bars"></i> <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#"
                                                   class="js-pay-bill"
                                                   data-entry="{{ $entry->id }}"
                                                   data-price="{{ $entry->amount }}"
                                                   data-contract="{{ $entry->contract->contract_number }}"
                                                   data-due="{{ $entry->due->format('d/m/Y')  }}"
                                                   data-client="{{ $entry->contract->client->name  }}">
                                                    Baixar</a></li>
                                            <li>
                                                <a href="#"
                                                   class="js-create-bill"
                                                   data-entry="{{ $entry->id }}"
                                                   data-price="{{ $entry->amount }}"
                                                   data-contract="{{ $entry->contract->contract_number }}"
                                                   data-due="{{ $entry->due->format('d/m/Y')  }}"
                                                   data-client="{{ $entry->contract->client->name  }}">
                                                    Gerar Boleto</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#">Cancelar</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th colspan="3" style="text-align:right">Total:</th>
                            <th></th>
                        </tr>
                        </tfoot>
                    </table>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    @push('scripts')
        <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>

        <script>
            $(function () {

                var Bills = {
                    init: function () {
                        this.improve()
                        this.pay()
                    },

                    improve: function () {
                        var element = $('.js-create-bill')

                        if (element.length > 0) {
                            element.click(function () {
                                var entry   = $(this).data('entry'),
                                    price  = $(this).data('price'),
                                    due = $(this).data('due'),
                                    contract = $(this).data('contract'),
                                    client  = $(this).data('client'),
                                    proces = $('.js-api-process')

                                $('#bills-modal')
                                    .on('show.bs.modal', function (event) {
                                        var modal = $(this)

                                        proces.attr('data-entry', entry)

                                        modal.find('.js-due').val(due)
                                       $('.js-price').val(price)
                                        modal.find('.js-client').text(client)
                                        modal.find('.js-contract').text(contract)
                                    })
                                    .modal('show')
                            })
                        }

                    },
                    pay: function () {
                        var element = $('.js-pay-bill')

                        if (element.length > 0) {
                            element.click(function () {
                                var entry   = $(this).data('entry'),
                                    price  = $(this).data('price'),
                                    due = $(this).data('due'),
                                    contract = $(this).data('contract'),
                                    client  = $(this).data('client'),
                                    proces = $('.js-api-process')

                                $('#pay-modal')
                                    .on('show.bs.modal', function (event) {
                                        var modal = $(this)

                                        proces.attr('data-entry', entry)

                                        modal.find('.js-due').text(due)
                                        modal.find('.js-price').text(price)
                                        modal.find('.js-client').text(client)
                                        modal.find('.js-contract').text(contract)
                                    })
                                    .modal('show')
                            })
                        }

                    },
                }

                Bills.init()

                $('.js-api-process').click(function (event) {
                    var entry = $(this).data('entry')
                    var due = $('.js-due').val();
                    var amount = $('.js-price').val();

                    let timerInterval
                    Swal.fire({
                        icon: 'success',
                        title: 'Pronto!',
                        html: 'O caso está <strong>sendo enriquecido</strong>. <br>Aguarde <b>alguns</b> segundos.',
                        timer: 4000,
                        timerProgressBar: true,
                        willOpen: () => {
                            Swal.showLoading()
                            timerInterval = setInterval(() => {
                                const content = Swal.getContent()
                                if (content) {
                                    const b = content.querySelector('b')
                                    if (b) {
                                        b.textContent = (Swal.getTimerLeft() / 1000).toFixed(2)
                                    }
                                }
                            }, 100)
                        },
                        didOpen: () => {
                            clearInterval(timerInterval)

                            $.ajax({
                                url: '../api/v1/bill/' + entry,
                                type: "POST",
                                data: {
                                    due: due,
                                    value: amount
                                },
                                success: function (data) {
                                    // location.reload()
                                    window.open(data.linkBoleto);
                                },
                                error: function () {
                                    //location.reload();
                                }
                            })
                        },
                        onClose: () => {
                           // location.reload()
                        }
                    }).then((result) => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {
                            console.log('I was closed by the timer')
                        }
                    })
                })

                $('#bills').DataTable( {
                    "pageLength": 100,
                    "footerCallback": function ( row, data, start, end, display ) {
                        var api = this.api(), data;

                        // Remove the formatting to get integer data for summation
                        var intVal = function ( i ) {
                            return typeof i === 'string' ?
                                i.replace(/[\$,]/g, '')*1 :
                                typeof i === 'number' ?
                                    i : 0;
                        };

                        // Total over all pages
                        total = api
                            .column( 3)
                            .data()
                            .reduce( function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0 );

                        // Total over this page
                        pageTotal = api
                            .column( 1, { page: 'current'} )
                            .data()
                            .reduce( function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0 );

                        // Update footer
                        $( api.column( 3).footer() ).html(
                           total
                        );
                    }
                } );
            } );


        </script>

        @if (session('message'))
            {!! toastr()->info(session('message'), 'Atenção')->render() !!}
        @endif
    @endpush
@endsection
