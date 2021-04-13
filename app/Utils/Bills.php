<?php
namespace App\Utils;

use App\Models\Bill;
use App\Models\BillEntry;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class Bills {

    protected $api_pjbank, $bill_entries;

    public function __construct(BillEntry $billEntry)
    {
        $this->bill_entries = $billEntry;

        $this->api_pjbank = 'https://api.pjbank.com.br/recebimentos/51a945d2a667875e552a7ec334f6917006e44d47/transacoes';
    }

    public function create_billet(array $arguments, $updated = false)
    {


        $response = Http::post($this->api_pjbank, [
            "vencimento"        => $arguments['due'],
            "valor"             => $arguments['amount'],
            "juros"             => "0",
            "juros_fixo"        => "0",
            "multa"             => "0",
            "multa_fixo"        => "0",
            "nome_cliente"      => $this->bill_entries->contract->client->name,
            "email_cliente"     => $this->bill_entries->contract->client->email,
            "telefone_cliente"  => $this->bill_entries->contract->client->phone,
            "cpf_cliente"       => $this->bill_entries->contract->client->document,
            "endereco_cliente"  => $this->bill_entries->contract->client->address,
            "numero_cliente"    => "",
            "bairro_cliente"    => "Centro",
            "cidade_cliente"    => "Cachoeira do Sul",
            "estado_cliente"    => "RS",
            "cep_cliente"       => $this->bill_entries->contract->client->cep,
            "logo_url"          => "https://www.hojeemcachoeira.com.br/images/logo-hojeemcachoeira.png",
            "texto"             => 'publicidade web - Hoje em Cachoeira - www.hojeemcachoeira.com.br |'.$this->bill_entries->description,
            "instrucoes"        => "Publicidade mensal",
            "instrucao_adicional"=> "Site Hoje em Cachoeira",
            "grupo"             => "Boletos001",
            "webhook"           => "https://www.hojeemcachoeira.com.br",
            "pedido_numero"     =>  Str::random(15)
        ]);

        $billDetails = $response->json();

        $billDetails['bill_entry_id'] = $this->bill_entries->id;

        if ($updated){
            $createBill = (new \App\Models\Bill)->update($billDetails);
        } else {
            $createBill = Bill::create($billDetails);
        }


        return $billDetails;


    }

}
