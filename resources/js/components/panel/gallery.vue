<template>
    <transition-group name="v-fade" tag="div" class="gallery-panel">
        <article v-if="newPic" :key="0">
            <div class="form-group">
                <label>Crear album</label>
                <input type="checkbox" class="input" v-model="newAlbum">
            </div>
            <div v-if="newAlbum" class="row">
                <div class="form-group col-2">
                    <label>Nombre</label>
                    <input type="text" class="input" v-model="nalbum.title">
                </div>
                <div class="form-group col-2">
                    <label>Descripción</label>
                    <textarea type="text" class="input" v-model="nalbum.description" />
                </div>
            </div>
            <div class="form-group" v-if="!newAlbum">
                <label>Album</label>
                <select class="input" v-model="npic.gallery_id">
                    <option :value="0">Selecciona un album</option>
                    <option v-for="g in gallery" :value="g.id">{{g.title}}</option>
                </select>
            </div>
            <upload-pictures></upload-pictures>
            <button class="btn" @click="validate()">Guardar</button>
            <button class="btn" @click="newPic = false">Cancelar</button>
        </article>
        <article class="cards" v-if="!pictures" :key="1">
            <div class="card" v-for="(g, index) in gallery">
                <figure class="card-image">
                    <img v-if="g.pictures != undefined && g.pictures.length" :src="'/storage/'+g.pictures[0].archivo" alt="">
                    <img v-else src="/img/default.jpg" alt="">
                </figure>
                <div class="card-content">
                    <p class="category">
                        <span v-if="editAlbum != 'change_'+index">{{g.title}}</span>
                        <input v-if="editAlbum == 'change_'+index" type="text" class="input" v-model="g.title">
                        <button v-if="editAlbum == 'change_'+index" class="btn" @click="updateAlbum(g)">Guardar</button>
                    </p>
                    <p class="text">{{g.description}}</p>
                    <div class="buttons">
                        <button class="btn" @click="openAlbum(g, index)">Ver album</button>
                        <button class="btn" @click="changeName(index)">Cambiar nombre</button>
                        <button class="btn" @click="deleteAlbum(g, index)">Eliminar album</button>
                    </div>
                </div>
            </div>
        </article>
        <article :key="2" v-else>
            <button class="btn" @click="pictures = false">Volver</button>
            <article>

            </article>
            <div class="card" v-for="(p, index) in pictures">
                <figure class="card-image">
                    <button class="btn close-btn" @click="deletePic(p, index)"><i class="fas fa-times-circle"></i></button>
                    <img :src="'/storage/'+p.archivo" alt="">
                </figure>
            </div>
        </article>
    </transition-group>
</template>
<script>
export default {
    mounted(){
        this.$bus.$on('add', ($event) => {
            if ($event.section == 2) {
                this.newPic ? this.newPic = false : this.newPic = true;
            }
        }).$on('setPictures', ($event) => {
            this.npic.pictures = $event.pictures               
        });

        var este = this;
        axios.get('/get-gallery').then((gallery) => {
            este.gallery = gallery.data                        
        });
    },
    data(){
        return {
            gallery: false,
            pictures: false,
            newPic: false,
            newAlbum: false,
            npic: {
                gallery_id: 0,
                pictures: false
            },
            nalbum: {
                title:null,
                description: null
            },
            editAlbum: false
        }
    },
    methods: {
        validate(){
            if(this.newAlbum){
                if(!this.nalbum.title && !this.npic.pictures){
                    return false;
                }else{
                    var este = this,
                        formData = new FormData();

                        formData.append('title', this.nalbum.title);
                        formData.append('description', this.nalbum.description);

                    axios.post('/panel/create-album', formData).then((album) => {
                        if (!este.gallery) {
                            este.gallery.push(album.data);
                        }else{                            
                            este.gallery = album.data
                        }
                        este.npic.gallery_id = album.data.id

                        este.savePictures();
                    });
                }
            }else{
                if(!this.npic.pictures && !this.npic.gallery_id){
                    return false;
                }else{
                    this.savePictures();
                }
            }
        },
        savePictures(){                
                var este = this,
                    formData = new FormData();

                    formData.append('gallery_id', this.npic.gallery_id);
        
                    for( let i = 0; i < this.npic.pictures.length; i++ ){
                            let file = this.npic.pictures[i];
                            formData.append('pictures[' + i + ']', file);
                    }

                    axios.post('/panel/upload-pictures', formData).then((pictures) => {
                        este.gallery = pictures.data;
                        este.newPic = false;
                        este.newAlbum = false;
                    });

        },
        deletePic(p, i){
            if(confirm('¿Eliminar foto?')){
                var este = this;
                axios.get('/panel/delete-pic/'+p.id).then((response) => {
                    este.pictures.splice(i, 1);
                });
            }
        },
        deleteAlbum(g, i){
            if(confirm('Se borraran todas las fotos de este album, ¿Continuar?')){
                var este = this;
                axios.get('/panel/delete-album/'+g.id).then((response) => {
                    este.gallery.splice(i, 1);
                });
            }
        },
        openAlbum(g, i){
            this.pictures = g.pictures            
        },
        changeName(i){
            this.editAlbum ? this.editAlbum = false : this.editAlbum = 'change_'+i
        },
        updateAlbum(g){
            var este = this;
            axios.post('/panel/update-album', g).then((response) => {
                este.editAlbum = false;
                
            });
        }

    },
    watch: {
        newPic: {
            handler(val, old) {
                if(!val){
                    this.npic = {
                        gallery_id: 0,
                        pictures: false
                    }
                }
            }
        },
        newAlbum: {
            handler(val, old) {
                if(!val){
                    this.nalbum = {
                        title: null,
                        description: null
                    }
                }
            }
        }
    }
}
</script>