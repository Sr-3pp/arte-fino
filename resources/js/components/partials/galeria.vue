<template>
    <section s-sec="galeria" class="full-section">
        <article class="picture-detail" :class="{'active': active}">
            <figure class="picture-img">
                <img :src="'/storage/'+picture.archivo" alt="">
                <div class="actions">
                    <button class="btn" @click="activePicture()"><i class="far fa-times-circle"></i></button>
                </div>
            </figure>
        </article>
        <div class="buttons" v-show="pictures">
            <button class="btn link" @click="setPictures()"><i class="fas fa-chevron-left"></i> Regresar a albumes</button>
        </div>
        <transition-group tag="div" :name="transition">
            <div :key="2" class="cards" v-show="!pictures">
                <article class="card" v-if="a.pictures.length" v-for="(a, index) in galeria" @click="setPictures(a.pictures)">
                    <figure class="card-image">
                        <img :src="'/storage/'+a.pictures[0].archivo" alt="">
                    </figure>
                    <div class="card-content">
                        <p class="category">{{a.title}}</p>
                    </div>
                </article>
            </div>
            <div :key="3" class="pictures" v-show="pictures">
                    <figure class="picture" v-for="(p, ind) in pictures" @click="activePicture(p)">
                        <img :src="'/storage/'+p.archivo" alt="">
                    </figure>
            </div>
        </transition-group>
    </section>
</template>
<script>
export default {
    mounted(){
        this.$bus.$on('overlayClick', ($event) => {
            this.active = false
        });
    },
    props: [
        'galeria'
    ],
    data(){
        return {
            pictures: false,
            picture: false,
            active: false,
            transition: 'v-slide-left'
        }
    },
    methods: {
        setPictures(p){
            if(this.pictures){
                this.transition = 'v-slide-right'
                this.pictures = false
            }else{
                this.transition = 'v-slide-left'
                this.pictures = p
            }
        },
        activePicture(p){
            if(this.active){
                this.active = false;
                this.picture = false;
            }else{
                this.active = true;
                this.picture = p
            }
                this.$bus.$emit('overlay');
        }
    }
}
</script>