<template>
    <div class="slides-panel">
        <article v-if="newSlide">
            <form class="form">
                <div class="form-group">
                    <label>¿Es una obra?</label>
                    <input type="checkbox" class="input" v-model="nslide.attributes.isArt">
                </div>
                <div class="form-group" v-if="nslide.attributes.isArt">
                    <label>Obra:</label>
                    <select class="input" v-model="nslide.product_id">
                        <option :value="0">Selecciona un aobra</option>
                        <option v-for="(a, ind) in products" :value="a.id">{{a.title}}</option>
                    </select>
                </div>
                <div v-if="!nslide.attributes.isArt" class="form-group">
                    <label>Titulo</label>
                    <input type="text" class="input" v-model="nslide.title">
                </div>
                <div v-if="!nslide.attributes.isArt" class="form-group">
                    <label>Contenido</label>
                    <textarea type="text" class="input" v-model="nslide.content" />
                </div>
                <upload-picture v-if="!nslide.attributes.isArt"></upload-picture>
                <div class="row">
                    <div class="form-group">
                        <label>Fondo</label>
                        <input type="color" v-model="nslide.attributes.bg">
                    </div>
                    <div class="form-group">
                        <label>Color</label>
                        <input type="color" v-model="nslide.attributes.color">
                    </div>
                </div>
                <div class="row">
                    <p class="col-12">Alineación</p>
                    <p>
                        <label>Left</label>
                        <input type="radio" name="align" value="left" v-model="nslide.attributes.align">
                    </p>
                    <p>
                        <label>Center</label>
                        <input type="radio" name="align" value="center" v-model="nslide.attributes.align">
                    </p>
                    <p>
                        <label>Right</label>
                        <input type="radio" name="align" value="right" v-model="nslide.attributes.align">
                    </p>
                </div>
                 <div class=" row">
                    <p class="col-12">Accion</p>
                    <p>
                        <label>No</label>
                        <input type="radio" name="action" :value="false" v-model="nslide.attributes.action">
                    </p>
                    <p>
                        <label>Move Up</label>
                        <input type="radio" name="action" value="move-up" v-model="nslide.attributes.action">
                    </p>
                </div>
                <button type="button" class="btn" @click="addSlide()">Guardar</button>
            </form>
        </article>
        <article class="slide" v-for="(slide, index) in slides">   
            <article class="preview">
                <figure>
                    <img v-if="!slide.attributes.isArt" :id="'imgSlide_'+index" :src="'/storage/'+slide.archivo" alt="">
                    <img v-if="slide.attributes.isArt && slide.product != ''" :src="'/storage/'+slide.product.archivo" alt="">
                </figure>
                <figcaption v-if="!slide.attributes.isArt" :s-align="slide.attributes.align" :s-bg="slide.attributes.bg">
                    <p class="title">{{slide.title}}</p>
                    <p class="text">{{slide.content}}</p>
                </figcaption>
                <figcaption v-if="slide.attributes.isArt && slide.product != ''" :s-align="slide.attributes.align" :s-bg="slide.attributes.bg">
                    <p class="title">{{slide.product.title}}</p>
                    <p class="text">{{slide.product.description}}</p>
                </figcaption>
                <div class="buttons">
                    <button class="btn" @click="editSlide ? editSlide = false : editSlide = 'slide_'+index">Editar</button>
                    <button class="btn" @click="deleteSlide(slide, index)">Eliminar</button>
                </div>
            </article>
            <form class="form" v-if="editSlide == 'slide_'+index">
                <div class="form-group">
                    <label>¿Es una obra?</label>
                    <input type="checkbox" class="input" v-model="slide.attributes.isArt">
                </div>
                <div class="form-group" v-if="slide.attributes.isArt">
                    <label>Obra:</label>
                    <select class="input" v-model="slide.product_id">
                        <option :value="0">Selecciona una obra</option>
                        <option v-for="(a, ind) in products" :value="a.id">{{a.title}}</option>
                    </select>
                </div>
                <div v-if="!slide.attributes.isArt" class="form-group">
                    <label>Tile</label>
                    <input type="text" class="input" v-model="slide.title">
                </div>
                <div v-if="!slide.attributes.isArt" class="form-group">
                    <label>Content</label>
                    <textarea type="text" class="input" v-model="slide.content" />
                </div>
                <upload-picture v-if="!slide.attributes.isArt"></upload-picture>
                <div class="row">
                    <div class="form-group">
                        <label>Fondo</label>
                        <input type="color" v-model="slide.attributes.bg">
                    </div>
                    <div class="form-group">
                        <label>Color</label>
                        <input type="color" v-model="slide.attributes.color">
                    </div>
                </div>
                <div class="form-group">
                    <p>Alineacion</p>
                    <p>
                        <label>Left</label>
                        <input type="radio" name="align" value="left" v-model="slide.attributes.align">
                    </p>
                    <p>
                        <label>Center</label>
                        <input type="radio" name="align" value="center" v-model="slide.attributes.align">
                    </p>
                    <p>
                        <label>Right</label>
                        <input type="radio" name="align" value="right" v-model="slide.attributes.align">
                    </p>
                </div>
               <div class=" row">
                    <p class="col-12">Accion</p>
                    <p>
                        <label>No</label>
                        <input type="radio" name="action" :value="false" v-model="slide.attributes.action">
                    </p>
                    <p>
                        <label>Move Up</label>
                        <input type="radio" name="action" value="move-up" v-model="slide.attributes.action">
                    </p>
                </div>
                <button type="button" class="btn" @click="updateSlide(slide, index)">Actualizar</button>
            </form>
        </article>
    </div>
</template>
<script>
    export default{
        mounted(){
            var este = this;
            axios.get('/get-slides').then((slides) => {
                este.slides = slides.data
            });
            axios.get('/panel/get-all-products').then((products) => {
                este.products = products.data
            });



            this.$bus.$on('add', ($event) => {
                if($event.section == 0){
                    this.newSlide ? this.newSlide = false : this.newSlide = true;
                }
            }).$on('setPicture', ($event) => {
                if(this.editSlide){
                     this.upImage = $event.picture                     
                }else{
                    this.nslide.archivo = $event.picture
                }
            });
        },
        data(){
            return {
                products: false,
                slides: false,
                editSlide: false,
                newSlide: false,
                upImage: false,
                nslide: {
                    title: '',
                    content: '',
                    product_id: 0,
                    archivo: false,
                    attributes: {
                        bg: '#000000',
                        align: 'center',
                        color: '#FFFFFF',
                        isArt: false,
                        action: false
                    }
                }
            }
        },
        methods: {
            updateSlide(s, i){
                var este = this,
                    formData = new FormData();



                    formData.append('title', s.title);
                    formData.append('content', s.content);
                    formData.append('picture', this.upImage);
                    formData.append('product_id', s.product_id);
                    formData.append('attributes', JSON.stringify(s.attributes));
                    
                    axios.post('/panel/update-slide/'+s.id, formData).then((response) => {
                        este.slides[i] = response.data
                        este.editSlide = false
                        este.upImage = false
                    });
            },
            addSlide(){
                var este = this,
                formData = new FormData();
                if(this.nslide.archivo){
                    formData.append('archivo', this.nslide.archivo);
                }


                    formData.append('title', this.nslide.title);
                    formData.append('content', this.nslide.content);
                    formData.append('product_id', this.nslide.product_id);
                    formData.append('attributes', JSON.stringify(this.nslide.attributes));

                    axios.post('/panel/add-slide', formData).then((slide) => {
                        este.slides.push(slide.data);
                        este.newSlide = false;
                        este.nslide.title = '';
                        este.nslide.content = '';
                        este.nslide.archivo = false;
                        este.nslide.attributes.bg = '#000000';
                        este.nslide.attributes.align = '';
                        este.nslide.attributes.color = '#FFFFFF';
                        este.nslide.attributes.isArt = false;
                        este.nslide.attributes.action = false;                        
                    });
            },
            deleteSlide(s, i){
                var este = this;
                if(confirm('¿Eliminar slide?')){
                    axios.get('/panel/delete-slide/'+s.id).then((response) => {
                        este.slides.splice(i, 1);
                    });
                }
            }
        }
    }
</script>