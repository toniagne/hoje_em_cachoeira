<div id="bills-modal" class="modal fade" tabindex="-1" style="z-index: 99999!important;">
    <div class="modal-dialog modal-improve modal-dialog-centered" role="document">
        <div class="modal-content">
            <button class="close close-case" type="button" data-dismiss="modal">
               FECHAR
            </button>
            <div class="modal-header">
                <h5 class="modal-title">
                    <strong>Gerar boleto:</strong>
                    <span class="js-improve-name"></span>
                </h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-md-5">
                        <p><strong>Cliente:</strong> <span class="js-client"></span></p>
                        <p><strong>Data de vencimento:</strong> <input type="text" class="form-control date js-due"></p>
                        <p><strong>Valor:</strong> R$ <input type="text" class="form-control money js-price"> </p>
                    </div>
                    <div class="col-12 col-md-7 mt-3 mt-md-0">
                        <div class="box-number background-gradient">
                            <strong>Número do contrato</strong><br>
                            <span class="js-contract"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-primary js-api-process"  data-entry="">Gerar Boleto</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
