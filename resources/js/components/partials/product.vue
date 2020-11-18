<template>
    <article class="product">
        <article class="product-detail" :class="{'active': active}">
            <figure class="product-img">
                <img :src="'/storage/'+data.archivo" alt="">
                <div class="buttons">
                    <a class="btn" :href="'/art/'+data.id">Ver detalles</a>
                    <button class="btn" @click="activeProduct()"><i class="far fa-times-circle"></i></button>
                </div>
            </figure>
        </article>
        <figure class="product-img">
            <img :src="'/storage/'+data.archivo" alt="">
            <figcaption class="actions">
                <button class="btn" @click="activeProduct()"><i class="fas fa-expand"></i></button>
                <a :href="'/art/'+data.id" class="btn"><i class="fas fa-plus"></i></a>
            </figcaption>
        </figure>
        <div class="product-info">
                <p class="text pink">{{data.title}}</p>
                <p class="text">
                    <b>Autor: </b> {{data.autor}}
                </p>
                <a :href="'/art/'+data.id" class="btn">Conocer la obra <i class="fas fa-caret-right"></i></a>
        </div>
    </article>
</template>
<script>
export default {
    mounted(){
        this.$bus.$on('overlayClick', ($event) => {
            this.active = false
        });        
    },
    props: ['data'],
    data(){
        return {
            active: false,
            overlay:  $('#overlay')
        }
    },
    methods: {
        activeProduct(){
            if(this.active){
                this.active = false;
            }else{
                this.active = true;
            }
                this.$bus.$emit('overlay');
        }
    }
}
</script>