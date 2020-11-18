<template>
    <section s-sec="related" class="section">
        <p class="subtitle">Más obras</p>
        <slick ref="slick" :options="slickOptions" class="products">
            <article :key="index+1" class="product" v-for="(data, index) in products">
                <figure class="product-img">
                    <img :src="'/storage/'+data.archivo" alt="">
                </figure>
                <div class="product-info">
                        <p class="text pink">{{data.title}}</p>
                        <p class="text">
                            <b>Autor: </b> {{data.autor}}
                        </p>
                        <p class="text">
                            <b>Técnica: </b> {{data.tecnica}}
                        </p>
                        <a :href="'/art/'+data.id" class="btn">Conocer la obra <i class="fas fa-caret-right"></i></a>
                </div>
            </article>
        </slick>
    </section>
</template>
<script>
import Slick from 'vue-slick';
import '../../../../node_modules/slick-carousel/slick/slick.css';
export default {
    components: { Slick },
    mounted(){
        var este = this;
        axios.get('/get-related-products').then((products) => {
            este.products = products.data.data         
               este.reInit();               
        });
    },
    data(){
        return {
            products: false,
            slickOptions: {
                slidesToScroll: 1,
                slidesToShow: 3,
                arrows: true,
                dots: false,
                rows: 0,
                nextArrow: '<button class="btn right"><i class="fas fa-chevron-circle-right"></i></button>',
                prevArrow: '<button class="btn right"><i class="fas fa-chevron-circle-left"></i></button>',
                responsive: [
                    {
                        breakpoint: 1023,
                        settings: {
                            slidesToShow: 3,
                            arrows: false,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 1,
                            arrows: false,
                            dots: true,
                        }
                    }
                ]
            },
        }
    },
    methods: {
      reInit() {
            this.$nextTick(() => {
                this.$refs.slick.reSlick();
            });
        },
    }
}
</script>