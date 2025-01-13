<template>
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12 col-md-6 offset-md-3">
                <div class="card shadow sm">
                    <div class="card-body">
                        <h1 class="text-center">Register</h1>
                        <hr/>
                        <form @submit.prevent="onSubmit">
                            <div class="col-12" v-if="Object.keys(validationErrors).length > 0">
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        <li v-for="(value, key) in validationErrors" :key="key">{{ value[0] }}</li>
                                    </ul>
                                </div>
                            </div>

                         
                            <div class="form-group col-12">
                                <label for="nome" class="font-weight-bold">Nome</label>
                                <input type="text" name="nome" v-model="cliente.nome" id="nome" placeholder="Nome" class="form-control">
                            </div>
                            <div class="form-group col-12 my-2">
                                <label for="documento" class="font-weight-bold">Documento</label>
                                <input type="text" name="documento" v-model="cliente.documento" id="documento" placeholder="Documento" class="form-control">
                            </div>
                            <div class="form-group col-12 my-2">
                                <label for="endereco" class="font-weight-bold">Endereço</label>
                                <input type="text" name="endereco" v-model="cliente.endereco" id="endereco" placeholder="Endereço" class="form-control">
                            </div>
                            <div class="form-group col-12 my-2">
                                <label for="contato" class="font-weight-bold">Contato</label>
                                <input type="text" name="contato" v-model="cliente.contato" id="contato" placeholder="Contato" class="form-control">
                            </div>
                            <div class="form-group col-12 my-2">
                                <label for="contrato_id" class="font-weight-bold">Contrato (ID)</label>
                                <input type="text" name="contrato_id" v-model="cliente.contrato_id" id="contrato_id" placeholder="Contrato" class="form-control">
                            </div>                            
                            <div class="form-group col-12 my-2">
                                <label for="estrangeiro" class="font-weight-bold">Estrangeiro</label>
                                <input type="text" name="estrangeiro" v-model="cliente.estrangeiro" id="estrangeiro" placeholder="Estrangeiro" class="form-control">
                            </div>
                            <div class="form-group col-12 my-2">
                                <label for="status" class="font-weight-bold">Status</label>
                                <input type="text" name="status" v-model="cliente.status" id="status" placeholder="Status" class="form-control">
                            </div>                                                                                    
                            <div class="col-12 mb-2">
                                <button type="submit" :disabled="processing" class="btn btn-primary btn-block">
                                    {{ processing ? "Aguarde" : "Salvar" }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { mapActions } from 'vuex'
export default {
    name:'cliente',
    data(){
        return {
            cliente:{
            },
            validationErrors:{},
            processing:false
        }
    },
    mounted(){
        //this.showCliente()
    },    
    methods:{
        async showCliente(){
            await this.axios.get(`/api/cliente/${this.$route.params.id}`).then(response=>{
                const { title, description } = response.data
                this.cliente.title = title
                this.cliente.description = description
            }).catch(error=>{
                console.log(error)
            })
        },
        async onSubmit() {
            this.create();
        },     
        async create(){
            await this.axios.post('/api/cliente',this.cliente).then(response=>{
                this.$router.push({name:"cliente"})
            }).catch(error=>{
                console.log(error)
            })
        },
        async update(){
            await this.axios.post(`/api/cliente/${this.$route.params.id}`,this.cliente).then(response=>{
                this.$router.push({name:"clienteList"})
            }).catch(error=>{
                console.log(error)
            })
        }        
    }
}
</script>