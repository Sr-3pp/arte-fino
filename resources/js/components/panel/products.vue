<template>
    <div class="product-panel">
        <article v-if="newProduct">
            <div class="form-group">
                <label>Titulo</label>
                <input type="text" class="input" v-model="nproduct.title">
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea type="text" class="input" v-model="nproduct.description" />
            </div>
            <upload-picture></upload-picture>
            <div class="form-group">
                    <label>Autor</label>
                    <input type="text" class="input" v-model="nproduct.autor">
            </div>
            <div class="row">
                <div class="col-3 form-group">
                    <label>Peso</label>
                    <input type="text" class="input" v-model="nproduct.peso">
                </div>
                <div class="col-3 form-group">
                    <label>Tamaño</label>
                    <input type="text" class="input" v-model="nproduct.size">
                </div>
                <div class="col-3 form-group">
                    <label>Técnica</label>
                    <input type="text" class="input" v-model="nproduct.tecnica">
                </div>
            </div>
            <div class="row">
                <div class="col-3 form-group">
                    <label>Laminado</label>
                    <input type="text" class="input" v-model="nproduct.laminado">
                </div>
                <div class="col-3 form-group">
                    <label>Material</label>
                    <input type="text" class="input" v-model="nproduct.material">
                </div>
                <div class="col-3 form-group">
                    <label>Elaboración</label>
                    <textarea type="text" class="input" v-model="nproduct.elaboracion" />
                </div>
                <div class="col-3 form-group">
                    <label>Precio</label>
                    <input type="number" class="input" v-model="nproduct.precio" />
                </div>
            </div>
            <div class="row">
                <p class="subtitle">Attributes</p>
                <button class="btn" @click="addAttribute('new')">Agregar attributo</button>
            </div>
            <div class="row">
                <div v-if="newAttribute == 'att_new'" class="col-10 form-group">
                    <input type="text" class="input" v-model="nattribute.name" placeholder="Nombre del atributo">
                    <input type="text" class="input" v-model="nattribute.value" placeholder="Valor del atributo">
                    <button class="btn" @click="pushAttribute('new')">Agregar</button>
                </div>
                <div v-for="(a, index) in nproduct.attributes" class="col-3 form-group">
                    <label>{{a.name}}</label>
                    <input type="text" class="input" v-model="a.value">
                    <button class="btn" @click="removeAttribute('new', ind)">Quitar</button>
                </div>
            </div>
            <button class="btn" @click="saveProduct()">Guardar</button>
            <button class="btn" @click="newProduct = false">Cancelar</button>
        </article>
        <div class="row">
            <figure v-for="(p, index) in products" class="product">
                <img v-if="editProduct != 'product_'+index" :src="'/storage/'+p.archivo" alt="">
                <figcaption class="product-info" v-if="editProduct != 'product_'+index">
                    <p class="text">{{p.title}}</p>
                    <p class="text">Autor: {{p.autor}}</p>
                    <p class="text">Técnica: {{p.tecnica}}</p>
                    <p class="text">Precio: $ {{p.precio}}</p>
                    <div class="buttons">
                        <button class="btn" @click="editProd(index)">Editar</button>
                        <button class="btn" @click="deleteProduct(p, index)">Eliminar</button>
                    </div>
                </figcaption>
                <figcaption v-if="editProduct == 'product_'+index">
                    <div class="form-group">
                        <label>Titulo</label>
                        <input type="text" class="input" v-model="p.title">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea type="text" class="input" v-model="p.description" />
                    </div>
                    <upload-picture></upload-picture>
                    <div class="form-group">
                            <label>Autor</label>
                            <input type="text" class="input" v-model="p.autor">
                    </div>
                    <div class="row">
                        <div class="col-2 form-group">
                            <label>Peso</label>
                            <input type="text" class="input" v-model="p.peso">
                        </div>
                        <div class="col-2 form-group">
                            <label>Tamaño</label>
                            <input type="text" class="input" v-model="p.size">
                        </div>
                        <div class="col-10 form-group">
                            <label>Técnica</label>
                            <input type="text" class="input" v-model="p.tecnica">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-10 form-group">
                            <label>Laminado</label>
                            <input type="text" class="input" v-model="p.laminado">
                        </div>
                        <div class="col-10 form-group">
                            <label>Material</label>
                            <input type="text" class="input" v-model="p.material">
                        </div>
                        <div class="col-10 form-group">
                            <label>Elaboración</label>
                            <textarea type="text" class="input" v-model="p.elaboracion" />
                        </div>
                        <div class="col-10 form-group">
                            <label>Precio</label>
                            <input type="number" class="input" v-model="p.precio" />
                        </div>
                    </div>
                    <div class="row">
                        <p class="subtitle">Attributes</p>
                        <button class="btn" @click="addAttribute(index)">Agregar attributo</button>
                    </div>
                    <div class="row">
                        <div v-if="newAttribute == 'att_'+index" class="col-10 form-group">
                            <input type="text" class="input" v-model="nattribute.name" placeholder="Nombre del atributo">
                            <input type="text" class="input" v-model="nattribute.value" placeholder="Valor del atributo">
                            <button class="btn" @click="pushAttribute(index)">Agregar</button>
                        </div>
                        <div v-for="(a, ind) in p.attributes" class="col-2 form-group" style="flex-grow: 0">
                            <input type="text" class="input" v-model="a.name">
                            <input type="text" class="input" v-model="a.value">
                            <button class="btn" @click="removeAttribute(index, ind)">Quitar</button>
                        </div>
                    </div>
                    <button class="btn" @click="updateProduct(p, index)">Guardar</button>
                    <button class="btn" @click="editProduct = false">Cancelar</button>
                </figcaption>
            </figure>
        </div>
    </div>
</template>
<script>
export default {
    mounted(){
        var este = this;

        axios.get('/panel/get-all-products').then((products) => {
            este.products = products.data
        });

        this.$bus.$on('add', ($event) => {            
            if($event.section == 1){
                this.newProduct ? this.newProduct = false : this.newProduct = true;
            }
        }).$on('setPicture', ($event) => {
            if (this.editProduct) {
                this.upImg = $event.picture
            }else{
                this.nproduct.archivo = $event.picture 
            }
        });
    },
    data(){
        return {
            upImg: false,
            editProduct: false,
            newProduct: false,
            newAttribute: false,
            products: false,
            nattribute: {
                name: null,
                value: null
            },
            nproduct: {
                title: null,
                description: null,
                archivo: false,
                autor: null,
                size: null,
                peso: null,
                material: null,
                laminado: null,
                elaboracion: null,
                tecnica: null,
                attributes: [{
                    name: 'Mercado Libre',
                    value: null
                }],
                precio: false
            }
        }
    },
    methods: {
        editProd(i){
            this.editProduct = 'product_'+i;
        },
        updateProduct(p, i){
            var este = this,
                formData = new FormData();

                formData.append('picture', this.upImg);
                formData.append('title', p.title);
                formData.append('description', p.description);
                formData.append('autor', p.autor);
                formData.append('size', p.size);
                formData.append('peso', p.peso);
                formData.append('material', p.material);
                formData.append('laminado', p.laminado);
                formData.append('elaboracion', p.elaboracion);
                formData.append('tecnica', p.tecnica);
                formData.append('precio', p.precio);
                if(p.attributes){
                    formData.append('attributes', JSON.stringify(p.attributes));
                }

                axios.post('/panel/update-product/'+p.id, formData).then((product) => {
                    este.editProduct = false
                    este.products[i] = product.data
                    este.upImg = false
                });
        },
        saveProduct(){
            var este = this,
                formData = new FormData();

                formData.append('archivo', this.nproduct.archivo);
                formData.append('title', this.nproduct.title);
                formData.append('description', this.nproduct.description);
                formData.append('autor', this.nproduct.autor);
                formData.append('size', this.nproduct.size);
                formData.append('peso', this.nproduct.peso);
                formData.append('material', this.nproduct.material);
                formData.append('laminado', this.nproduct.laminado);
                formData.append('elaboracion', this.nproduct.elaboracion);
                formData.append('tecnica', this.nproduct.tecnica);
                formData.append('precio', this.nproduct.precio);
                if(this.nproduct.attributes){
                    formData.append('attributes', JSON.stringify(this.nproduct.attributes));
                }

                axios.post('/panel/add-product', formData).then((products) => {
                    este.products = products.data
                    este.newProduct = false;
                });
        },
        deleteProduct(p, i){
            var este = this;
            if (confirm('¿Eliminar producto?')) {
                axios.get('/panel/delete-product/'+p.id).then((response) => {
                    este.products.splice(i, 1);
                });
            }
        },
        addAttribute(i){
            this.newAttribute ? this.newAttribute = false : this.newAttribute = 'att_'+i;
        },
        pushAttribute(index){            
            if (index == 'new') {
                this.nproduct.attributes.push(this.nattribute);
            }else{
                if(this.products[index].attributes != null  && (this.nattribute.value != null && this.nattribute.name != null)){
                console.log(this.nattribute);
                    this.products[index].attributes.push(this.nattribute);
                }else if(this.products[index].attributes == null && (this.nattribute.value != null && this.nattribute.name != null)){
                    this.products[index].attributes = [this.nattribute];
                }else{
                    alert('atributo inválido')
                }
            }
            this.newAttribute = false            
        },
        removeAttribute(index, ind){
            if(index == 'new'){
                this.nproduct.attributes.splice(ind, 1);
            }else{
                this.products[index].attributes.splice(ind, 1);
            }
        }
    },
    watch: {
        newProduct: {
            handler(val, old){
                if (!val) {
                    this.nproduct = {
                        title: null,
                        description: null,
                        archivo: false,
                        autor: null,
                        tamaño: null,
                        peso: null,
                        material: null,
                        laminado: null,
                        elaboracion: null,
                        tecnica: null,
                        attributes: [{
                            name: 'Mercado Libre',
                            value: null
                        }],
                    }
                }
            }
        }
    }
}
</script>