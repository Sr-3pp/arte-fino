<template>
    <div class="pdv-panel">
        <article v-if="newPdv">
            <div class="form">
                <div class="row">
                    <div class="form-group">
                    <label>Estado</label>
                    <input type="text" class="input" v-model="npdv.estado">
                </div>
                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" class="input" v-model="npdv.name" />
                </div>
                <div class="form-group">
                        <label>Direccion</label>
                        <input type="text" class="input" v-model="npdv.direccion">
                </div>
                </div>
                <div class="col-3 form-group">
                        <label>Detalles</label>
                        <textarea type="text" class="input" v-model="npdv.details" />
                </div>
            </div>
           <div class="buttons">
                <button class="btn" @click="savePdv()">Guardar</button>
            <button class="btn" @click="newPdv = false">Cancelar</button>
           </div>
        </article>
        <div class="row">
            <article v-for="(p, index) in pdvs" class="pdv">
                <div class="pdv-info" v-if="editPdv != 'pdv_'+index">
                    <icon name="store"></icon>
                    <p class="text">Estado: {{p.estado}}</p>
                    <p class="text">Nombre: {{p.name}}</p>
                    <p class="text">Dirección: {{p.direccion}}</p>
                    <p class="text">Detalles: $ {{p.details}}</p>
                    <div class="buttons">
                        <button class="btn" @click="editProd(index)">Editar</button>
                        <button class="btn" @click="deletePdv(p, index)">Eliminar</button>
                    </div>
                </div>
                <div v-if="editPdv == 'pdv_'+index">
                    <div class="row">
                        <div class="form-group">
                            <label>Estado</label>
                            <input type="text" class="input" v-model="p.estado">
                        </div>
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" class="input" v-model="p.name" />
                        </div>
                        <div class="form-group">
                                <label>Direccion</label>
                                <input type="text" class="input" v-model="p.direccion">
                        </div>
                        <div class="col-3 form-group">
                                <label>Detalles</label>
                                <textarea type="text" class="input" v-model="p.details" />
                        </div>
                    </div>
                    <button class="btn" @click="updatePdv(p, index)">Guardar</button>
                    <button class="btn" @click="editPdv = false">Cancelar</button>
                </div>
            </article>
        </div>
    </div>
</template>
<script>
export default {
    mounted(){
        var este = this;

        axios.get('/panel/get-all-pdvs').then((pdvs) => {
            este.pdvs = pdvs.data
        });

        this.$bus.$on('add', ($event) => {            
            if($event.section == 3){
                this.newPdv ? this.newPdv = false : this.newPdv = true;
            }
        });
    },
    data(){
        return {
            upImg: false,
            editPdv: false,
            newPdv: false,
            pdvs: false,
            npdv: {
                estado: null,
                name: null,
                direccion: null,
                details: null

            }
        }
    },
    methods: {
        editProd(i){
            this.editPdv = 'pdv_'+i;
        },
        updatePdv(p, i){
            var este = this,
                formData = new FormData();

                formData.append('estado', p.estado);
                formData.append('name', p.name);
                formData.append('direccion', p.direccion);
                formData.append('details', p.details);

                axios.post('/panel/update-pdv/'+p.id, formData).then((pdv) => {
                    este.editPdv = false
                    este.pdvs[i] = pdv.data
                });
        },
        savePdv(){
            var este = this,
                formData = new FormData();

                formData.append('estado', this.npdv.estado);
                formData.append('name', this.npdv.name);
                formData.append('direccion', this.npdv.direccion);
                formData.append('details', this.npdv.details);

                axios.post('/panel/add-pdv', formData).then((pdv) => {
                    este.pdvs.push(pdv.data);
                    este.newPdv = false;
                });
        },
        deletePdv(p, i){
            var este = this;
            if (confirm('¿Eliminar pdvo?')) {
                axios.get('/panel/delete-pdv/'+p.id).then((response) => {
                    este.pdvs.splice(i, 1);
                });
            }
        }
    },
    watch: {
        newPdv: {
            handler(val, old){
                if (!val) {
                    this.npdv = {
                        estado: null,
                        name: null,
                        direccion: null,
                        details: null
                    }
                }
            }
        }
    }
}
</script>