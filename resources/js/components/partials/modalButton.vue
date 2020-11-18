<template>
    <section s-sec="modal-button">
        <article class="section modal" :class="{'active': active}">
            <div class="modal-header">
                <p class="subtitle">{{modal.title}}</p>
                <button @click="activeModal()" class="btn"><i class="far fa-times-circle"></i></button>
            </div>
            <div class="modal-body">
                <p class="text">
                    Una hermosa y clásica presentación para las obras de los autores más entrañables y admirados en el arte universal. <br><br>
                    Son reproducciones de pintores montadas sobre tela (canvas) que adquieren una presencia y textura similar a la de los lienzos originales de sus autores. <br>
                    Las réplicas de arte montadas en lienzo son ideales para decorar ambientes donde, se recrea la belleza y se admira la creación artística. Son particularmente idóneos para dar el toque de elegancia en Oficinas, Hoteles, Restaurantes, Salas de Espera, Hogares,  Instituciones Educativas, Escuelas, Universidades, así como Centros Culturales para promover el gusto por el arte.

                </p>
                <br><br>
                <p class="text">
                    En Arte Fino Mexicano, apreciamos el arte en su forma y expresión. <br><br>
                    Nuestra pasión es poner el arte al alcance de tu mano. <br><br>
                    Nuestro objetivo es  llevar a tu hogar, Empresa  o Institución  un cuadro,  o  artÍculo  decorativo, o adorno,  que marque la diferencia en el ambiente de tus espacios preferidos, ya sea en el interior o exterior. <br>
                    Nuestro lema en Arte Fino Mexicano es “Por qué ir a verlo, si lo puedes tener en casa”, tenemos arte clásico mexicano e internacional, obras reconocidas para disfrutar de ellas toda la vida en arte canvas, que significa “lienzo”, esté es un material de calidad para profesionales exigentes. <br><br>
                    El lienzo se monta en una estructura de madera para dar la impresión de que se trata de una pintura. <br><br>
                    El canvas es muy flexible, por tanto, resulta  manejable y constituye  un soporte especialmente resistente que no se estropeará a la hora de montarlo en una estructura, el canvas es conocido y reconocido por su excelente calidad y también ofrece un excelente acabado de colores y una magnífica profundidad, en este tipo de arte se plasma toda la intensidad y las emociones de la imagen, logrando una gran  similitud  al de una pintura realizada sobre un cuadro. <br><br>
                    En Arte Mexicano el lienzo y canvas es fabricado en base a poliéster o algodón, se utilizan laminados ingleses en tono brillante y mate, su elaboración es 50% a mano, para conseguir acabados a detalle con un resultado espectacular, tiene características muy resistentes a la acción de la luz solar, los colores permanecen inalterados durante 99 años, manteniendo todo su colorido inicial. <br><br>
                    Gracias por promover el Arte Mexicano.

                </p> <br>
                <a class="btn link" href="docs/privacy.pdf" target="_blank">Visita nuestro aviso de privacidad</a>
            </div>
        </article>
        <button @click="activeModal()" class="btn cta">
                Conozca más de nosotros
        </button>
    </section>
</template>
<script>
    export default{
        mounted(){
            this.$bus.$on('overlayClick', ($event) => {
                this.active = false
            });
        },
        data(){
            return {
                modal: {
                    title: 'Réplicas de Arte'
                },
                active: false
            }
        },
        methods: {
            activeModal(){
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