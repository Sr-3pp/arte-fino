<template>
    <section class="carousel" s-autoplay="true">
        <button @click="prev()" class="control prev">  <i class="fas fa-chevron-circle-left"></i> </button>
        <transition-group tag="div" class="slides" :class="{'reverse': transition === 'prev'}" :name="transition">
            <article :class="{'active': content === index, 'art': slide.attributes.isArt}" :s-style="slide.attributes.align" :key="slide.id" class="slide" v-for="(slide, index) in slides" v-show="active === index">
                <img v-if="!slide.attributes.isArt && slide.product == null" :s-action="slide.attributes.action" :src="'/storage/'+slide.archivo" :alt="slide.content">
                <img v-else :s-action="slide.attributes.action" :src="'/storage/'+slide.product.archivo" :alt="slide.content">
                <div v-if="slide.title != null && slide.content != null" class="content" :style="'color:'+slide.attributes.color+'; background-color: '+slide.attributes.bg">
                    <p class="title" v-if="slide.title != 'null' && !slide.attributes.isArt">{{slide.title}}</p>
                    <p class="title" v-if="slide.attributes.isArt">{{slide.product.title}}</p>
                    <div class="subtitle" v-if="slide.attributes.isArt">
                        <p>{{slide.product.autor}}</p>
                        <p>{{slide.product.peso}}</p>
                        <p>{{slide.product.size}}</p>
                        <p>$ {{slide.product.precio}}</p>
                    </div>
                    <p class="text" v-if="!slide.attributes.isArt" v-html="slide.content"></p>
                    <p class="text" v-else v-html="slide.product.description"></p>
                </div>
            </article>
        </transition-group>
        <button @click="next()" class="control next">  <i class="fas fa-chevron-circle-right"></i> </button>
        <ul class="dots">
            <li v-for="(slide, index) in slides" @click="goTo(index)"></li>
        </ul>
    </section>
</template>
<script>
    export default {
        mounted(){            
            var este = this;
            this.autoplay = JSON.parse($('.carousel').attr('s-autoplay'));
            if(this.autoplay){
                setInterval(() => {
                    if (this.active !== (this.slides.length -1)) {
                        this.content = false
                        this.transition = 'next'
                        this.active += 1;
                        setTimeout(function(){ 
                            este.content = este.active;
                        }, 1000);
                    }else{
                        this.content = false
                        this.transition = 'next'
                        this.active = 0;
                        setTimeout(function(){ 
                            este.content = este.active;
                        }, 1000);
                    }
                    
                }, 6000);
            }
        },
        props: [
            'slides'
        ],
        data(){
            return {
                active: 0,
                transition: 'v-slide-left',
                content: 0,
                autoplay: false
            }
        },
        methods: {
            next(){
                if(this.active < this.slides.length-1){
                this.content = false
                    this.transition = 'v-slide-left'
                    this.active += 1;
                    var este = this;
                    setTimeout(function(){ 
                        este.content = este.active;
                    }, 1000);
                }
            },
            prev(){
                if(this.active > 0){
                this.content = false;
                    this.transition = 'v-slide-right'
                    this.active -= 1;
                    var este = this;
                    setTimeout(function(){ 
                        este.content = este.active;
                    }, 1000);
                }
            },
            goTo(i){
                if (i > this.active) {
                    this.transition = 'v-slide-left'
                }else{
                    this.transition = 'v-slide-right'
                }
                this.active = i
            }
        }
    }
</script>