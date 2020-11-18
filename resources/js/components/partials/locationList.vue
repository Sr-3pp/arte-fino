<template>
    <section class="location-list">
        <article class="section modal" :class="{'active': pdv}">
            <div class="modal-header">
                <p class="subtitle">{{pdv.name}}</p>
                <button @click="pdvDetail()" class="btn"><i class="far fa-times-circle"></i></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-2">
                        <icon name="store"></icon>
                        <article>
                            <p class="category">{{pdv.estado}}</p>
                            <p class="text">{{pdv.direccion}}</p>
                            <p class="text">{{pdv.details}}</p>
                        </article>
                    </div>
                    <div class="col-2">
                        <p class="subtitle">¿Tienes dudas? <br><br> <small>Contacta a la sucursal</small></p>
                        <br><br>
                        <ventas-form :pdv="pdv"></ventas-form>
                    </div>
                </div>
            </div>
        </article>
           <slick class="location-slick" ref="slick" :options="slickOptions">
                <article :key="index+1" v-for="(l, index) in pdvs">
                    <icon name="store"></icon>
                    <p class="category">{{l.estado}}</p>
                    <p class="subtitle">{{l.name}}</p>
                    <p class="text">{{l.direccion}}</p>
                    <button type="button" class="btn link" @click="pdvDetail(l)">Ver detalles</button>
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
        axios.get('/get-pdvs').then((locations) => {            
            este.pdvs = locations.data 
            este.reInit();      
        });

        this.$bus.$on('overlayClick', ($event) => {
                this.pdv = false
        }).$on('closeModal', () => {
            this.pdv = false
        });
    },
    data(){
        return{
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
            pdvs: [],
            locations: false,
            pdv: false,
            nform: {
                name: null,
                email: null,
                affair: null,
                content: null,
                pdv_id: 0
            },
            sent: false
        }
    },
    methods:{
        reInit() {
            this.$nextTick(() => {
                this.$refs.slick.reSlick();
            });
        },
        pdvDetail(l){
            if(this.pdv){
                this.pdv = false
                this.sent = false
                this.nform.name = null;
                this.nform.email = null;
                this.nform.affair = null;
                this.nform.content = null;
            }else{
                this.pdv = l
            }
            this.$bus.$emit('overlay');
        }
    }
}
</script>