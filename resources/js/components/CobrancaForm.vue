<template>
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12 col-md-6 offset-md-3">
                <div class="card shadow sm">
                    <div class="card-body">
                        <h1 class="text-center">Cobrança</h1>
                        <hr/>
                        <form @submit.prevent="onSubmit">
                            <div class="col-12" v-if="Object.keys(validationErrors).length > 0">
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        <li v-for="(value, key) in validationErrors" :key="key">{{ value[0] }}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="form-group col-12 my-2">
                                <label for="contrato_id" class="font-weight-bold">Contrato ID</label>
                                <input type="text" name="contrato_id" v-model="cobranca.contrato_id" id="contrato_id" placeholder="Contrato ID" class="form-control">
                            </div>
                            <div class="form-group col-12 my-2">
                                <label for="valor" class="font-weight-bold">Valor</label>
                                <input type="text" name="valor" v-model="cobranca.valor" id="valor" placeholder="Valor" class="form-control">
                            </div>
                            <div class="form-group col-12 my-2">
                                <label for="multa" class="font-weight-bold">Multa</label>
                                <input type="text" name="multa" v-model="cobranca.multa" id="multa" placeholder="Multa" class="form-control">
                            </div>
                            <div class="form-group col-12 my-2">
                                <label for="status" class="font-weight-bold">Tipo</label>
                                <input type="text" name="tipo" v-model="cobranca.tipo" id="tipo" placeholder="Tipo" class="form-control">
                            </div>                                 
                            <div class="form-group col-12 my-2">
                                <label for="status" class="font-weight-bold">Status</label>
                                <input type="text" name="status" v-model="cobranca.status" id="status" placeholder="Status" class="form-control">
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
    name:'cobranca',
    data(){
        return {
            cobranca:{
            },
            validationErrors:{},
            processing:false
        }
    },
    mounted(){
        //this.showCobranca()
    },    
    methods:{
        async showCobranca(){
            await this.axios.get(`/api/cobranca/${this.$route.params.id}`).then(response=>{
                const { title, description } = response.data
                this.cobranca.title = title
                this.cobranca.description = description
            }).catch(error=>{
                console.log(error)
            })
        },
        async onSubmit() {
            this.create();
        },     
        async create(){
            await this.axios.post('/api/cobranca',this.cobranca).then(response=>{
                this.$router.push({name:"cobranca"})
            }).catch(error=>{
                console.log(error)
            })
        },
        async update(){
            await this.axios.post(`/api/cobranca/${this.$route.params.id}`,this.cobranca).then(response=>{
                this.$router.push({name:"cobrancaList"})
            }).catch(error=>{
                console.log(error)
            })
        }        
    }
}
</script>