<template>

        <div class="container-fluid">
            <div class="row">

                <div class="col-12">

                    <div class="card">
                        <div class="card-header">

                            <div class="card-tools">

                                <button type="button" class="btn btn-sm btn-primary" @click="newModal">
                                    <i class="fa fa-plus-square"></i>
                                    Nova venda
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Cliente</th>
                                    <th>Edifício</th>
                                    <th>Produto</th>
                                    <th>Quantidade</th>
                                    <th>Valor</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="trade in trades.data">

                                    <td>{{trade.id}}</td>
                                    <td class="text-capitalize">{{trade.client}}</td>
                                    <td class="text-capitalize">{{trade.building}}</td>
                                    <td class="text-capitalize">{{trade.product}}</td>
                                    <td class="text-capitalize">{{trade.quantity}}</td>
                                    <td class="text-capitalize">{{trade.amount_convert}}</td>
                                    <td>

                                        <a href="#" @click="editModal(trade)">
                                            <i class="fa fa-edit blue"></i>
                                        </a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <pagination :data="trades" @pagination-change-page="getResults"></pagination>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>


            <div>

            </div>

            <!-- Modal -->
            <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNew" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" v-show="!editmode">Nova Venda</h5>
                            <h5 class="modal-title" v-show="editmode">Atualizar Venda</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <!-- <form @submit.prevent="createUser"> -->

                        <form @submit.prevent="editmode ? updateTrade() : createTrade()">
                            <div class="modal-body">

                                <div class="row">
                                    <div class="col-5">

                                        <div class="form-group">
                                            <label>Clientes</label>
                                            <select class="form-control" v-model="form.owner_id">
                                                <option
                                                    v-for="(client, index) in clients.data" :key="index"
                                                    :value="client.id"
                                                    :selected="index == form.owner_id">{{ client.name }}</option>
                                            </select>
                                            <has-error :form="form" field="owner_id"></has-error>
                                        </div>

                                    </div>
                                    <div class="col-1 align-content-xs-center"> OU </div>
                                    <div class="col-5">

                                        <div class="form-group">
                                            <label>Cliente Yogha</label>
                                            <select class="form-control" v-model="form.customer_id">
                                                <option
                                                    v-for="(customer, index) in customers.data" :key="index"
                                                    :value="customer.id"
                                                    :selected="index == form.customer_id">{{ customer.name }}</option>
                                            </select>
                                            <has-error :form="form" field="customer_id"></has-error>
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Edifício</label>
                                    <select class="form-control" v-model="form.building_id" @change="onChange" >
                                        <option
                                            v-for="(building, index) in buildings.data" :key="index"
                                            :value="building.id"
                                            :selected="index == form.building_id">{{ building.name }}</option>
                                    </select>
                                    <has-error :form="form" field="building_id"></has-error>
                                </div>

                                <div class="row" v-show="showProducts">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Produto</label>
                                            <select class="form-control" v-model="form.product_id" @change="setAmount">
                                                <option
                                                    v-for="(product, index) in products.data" :key="index"
                                                    :value="product.id+'|'+product.price"
                                                    :selected="index == form.product_id">{{ product.name }} | </option>
                                            </select>
                                            <has-error :form="form" field="product_id"></has-error>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" v-show="showDetailsProducts">

                                    <div class="col-4">
                                        <div class="form-group" >
                                            <label for="unitary">Valor Unitário</label>
                                            <input v-model="form.unitary" id="unitary"  type="text" min="1" name="unitary" readonly
                                                   class="form-control" :class="{ 'is-invalid': form.errors.has('unitary') }">
                                            <has-error :form="form" field="unitary"></has-error>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group" >
                                            <label>Quantidade</label>
                                            <input
                                                v-model="form.quantity"
                                                type="number"
                                                min="1"
                                                name="quantity"
                                                @input="changeAmount"
                                                   class="form-control" :class="{ 'is-invalid': form.errors.has('quantity') }">
                                            <has-error :form="form" field="quantity"></has-error>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group" >
                                            <label for="amount">Valor</label>
                                            <input v-model="form.total" id="total"  type="text" min="1" name="total" readonly
                                                   class="form-control" :class="{ 'is-invalid': form.errors.has('total') }">
                                            <has-error :form="form" field="total"></has-error>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Tipo de pagamento</label>
                                            <select class="form-control" v-model="form.payment">
                                                <option value="0">Boleto</option>
                                                <option value="1">Cartão</option>
                                            </select>
                                            <has-error :form="form" field="building_id"></has-error>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                <button v-show="editmode" type="submit" class="btn btn-success">Atualizar</button>
                                <button v-show="!editmode" type="submit" class="btn btn-primary">Cadastrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

</template>

<script>
    import VueTagsInput from '@johmun/vue-tags-input';

    export default {
        data () {
            return {
                editmode: false,
                showProducts: false,
                showDetailsProducts:false,
                unitaryAmount: 0.00,
                total: 0.00,
                trades: {},
                clients: [],
                customers: [],
                buildings: [],
                products: [],
                form: new Form({
                    id : '',
                    product_id: '',
                    quantity: '',
                    customer_id: '',
                    building_id: '',
                    owner_id: '',
                    payment: '',
                    unitary: ''

                }),
                autocompleteItems: [],
            }
        },
        methods: {

            getResults(page = 1) {

                this.$Progress.start();

                axios.get('../api/v1/trades?page=' + page).then(( data ) => (this.trades = data.data));

                this.$Progress.finish();
            },
            loadTrades(){
                axios.get("../api/v1/trades").then(( data ) => (this.trades = data.data));
            },
            loadClients(){
                axios.get("../api/v1/trades/clients").then(( data ) => (this.clients = data.data));
            },
            loadBuildings(){
                axios.get("../api/v1/trades/buildings").then(( data ) => (this.buildings = data.data));
            },
            loadCustomers(){
                axios.get("../api/v1/trades/customers").then(( data ) => (this.customers = data.data));
            },
            editModal(client){
                this.editmode = true;
                this.form.reset();
                $('#addNew').modal('show');
                this.form.fill(client);
            },
            newModal(){
                this.editmode = false;
                this.form.reset();
                $('#addNew').modal('show');
            },
            createTrade(){
                this.$Progress.start();

                this.form.post('../api/v1/trades')
                    .then((data)=>{
                        if(data.data.success){
                            $('#addNew').modal('hide');

                            Toast.fire({
                                icon: 'success',
                                title: data['data'].data.message
                            });
                            this.$Progress.finish();
                            this.loadTrades();

                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: 'Erro no caastro de vendas, tente novamente mais tarde.'
                            });

                            this.$Progress.failed();
                        }
                    })
                    .catch(()=>{

                        Toast.fire({
                            icon: 'error',
                            title: 'Some error occured! Please try again'
                        });
                    })
            },
            updateTrade(){
                this.$Progress.start();
                this.form.put('../api/v1/trades/'+this.form.id)
                    .then((response) => {
                        // success
                        $('#addNew').modal('hide');
                        Toast.fire({
                            icon: 'success',
                            title: response.data.message
                        });
                        this.$Progress.finish();
                        //  Fire.$emit('AfterCreate');

                        this.loadTrades();
                    })
                    .catch(() => {
                        this.$Progress.fail();
                    });

            },
            deleteTrade(id){
                Swal.fire({
                    title: 'Você tem certeza?',
                    text: "Esta ação não poderá ser revertida!",
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Sim!'
                }).then((result) => {

                    // Send request to the server
                    if (result.value) {
                        this.form.delete('../api/v1/trades/'+id).then(()=>{
                            Swal.fire(
                                'Apagado!',
                                'Cliente foi deletado com sucesso!.',
                                'success'
                            );
                            // Fire.$emit('AfterCreate');
                            this.loadTrades();
                        }).catch((data)=> {
                            Swal.fire("Failed!", data.message, "warning");
                        });
                    }
                })
            },
            onChange:function(event){


                axios.get('../api/v1/products/' + event.target.value).then(( data ) => (this.products = data.data));
                this.showProducts = true;
            },
            setAmount:function(event){
                var value = event.target.value.split("|");
                this.showDetailsProducts = true;
                this.form.unitary = value[1];
            },
            changeAmount:function(event){
                var calc = this.form.unitary * event.target.value;
                this.total = calc;
                this.form.total = calc;
                this.$forceUpdate()
            }

        },
        mounted() {
        },
        watch: { 'product': function() { console.log('teste')} },
        created() {
            this.$Progress.start();

            this.loadTrades();
            this.loadCustomers();
            this.loadClients();
            this.loadBuildings();

            this.$Progress.finish();
        },
        filters: {
            truncate: function (text, length, suffix) {
                return text.substring(0, length) + suffix;
            },
        },
        computed: {
            filteredItems() {
                return this.autocompleteItems.filter(i => {
                    return i.text.toLowerCase().indexOf(this.tag.toLowerCase()) !== -1;
                });
            },
        },
    }
</script>
