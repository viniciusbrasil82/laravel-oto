<template>
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12 col-md-6 offset-md-3">
                <div class="card shadow sm">
                    <div class="card-body">
                        <h1 class="text-center">Cobranca</h1>
                        <hr/>
                        <div class="col-12 mb-2">
                            <button class="btn btn-primary btn-block" 
                    onclick="location.href='/cobranca/novo'"
                    >
                                    Nova Cobranca
                                </button>   
                        </div>   
                    </div>
                 
                </div>
                <div>
                    
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Cobranca</th>
                            <th scope="col">Status</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Multa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr  v-for="cobranca in cobrancas" :key="cobranca.id">
                            <th scope="row"></th>
                            <td>{{ cobranca.id }}</td>
                            <td>{{ cobranca.status }}</td>
                            <td>{{ cobranca.valor }}</td>
                            <td>{{ cobranca.multa }}</td>
                            </tr>

                        </tbody>
                    </table>                    
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
            cobrancas:[],
            validationErrors:{},
            processing:false
        }
    },
    methods:{
        listaCobrancas()
        {
            axios
            .get('api/cobrancas/listar')
            .then(response => {
                this.cobrancas = response.data
            })
            .catch(function (error) {
                console.log(error);
            })            
           
        }

    }, mounted(){
        this.listaCobrancas()
    }
}
</script>