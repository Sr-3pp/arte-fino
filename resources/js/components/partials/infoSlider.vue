<template>
    <article class="how">
        <p class="category">¿Cómo adquirir una obra?</p>
        <slick ref="slick" :options="slickOptions" class="content">
            <div class="item">
                <img src="img/svg/info_1.svg" alt="">
                <ul class="step-list">
                    <li class="text">
                        Identifique su código de producto
                    </li>
                    <li class="text">
                        Envíenos su pedido a contacto@artefinomexicano.com
                    </li>
                    <li class="text">
                        Le enviaremos un formato de pago por Paypal o transferencia electrónica
                    </li>
                    <li class="text">
                        Tiempo de entrega de 3 a 5 dias
                    </li>
                    <li class="text">
                        El costo del envío:
                        <p>Zona metropolitana $150.00 </p>
                        <p>Estado de México $170.00</p>
                    </li>
                </ul>
            </div>
            <div class="item">
                <img src="img/svg/info_4.svg" alt="">
                <strong class="text pink">Monitoree su envío o espere su pedido.</strong>
                <ul>
                    <li class="text">
                        Contamos con entregas personales en CDMX.
                    </li>
                    <li class="text">
                        En el interior de la República Mexicana y en el extranjero, las piezas se empaquetan perfectamente y se envían por servicio de mensajería express Fedex y DHL.
                    </li>
                </ul>
            </div>
            <div class="item">
                <img src="img/svg/info_2.svg" alt="">
                <p class="text">
                    <strong class="pink">Contáctenos</strong> por diferentes plataformas y medios: teléfono, celular, WhatsApp, Facebook, Twitter, Instagram, email, formulario.
                </p>
                <ul>
                    <small>
                        <a href="tel:5568778328" class="btn">55 6877 8328</a>
                    </small>
                    <small>
                        <a href="mailto:contacto@artefinomexicano.com" class="btn">contacto@artefinomexicano.com</a>
                    </small>
                </ul>
            </div>
            <div class="item">
                <img src="img/svg/info_3.svg" alt="">
                <p class="text">
                    <strong class="pink">Solicite información complementaria: </strong> tiempo de entrega, proceso de pago, formas de envío, recibos, facturas, planes de pago personalizados, etc.
                </p>
            </div>
            <div class="item">
                <img src="img/svg/info_4.svg" alt="">
                <strong class="text pink">Elija forma de pago.</strong>
                <ul>
                    <li class="text">
                        Depósito Bancario.
                    </li>
                    <li class="text">
                        Transferencia Bancaria
                    </li>
                    <li class="text">
                        Pago por tarjeta de Crédito o Débito (Terminal y CLIP).
                    </li>
                    <li class="text">
                        Plan de Pagos personalizados.
                    </li>
                    <li class="text">
                        Pago por Paypal Internet.
                    </li>
                </ul>
            </div>
        </slick>
    </article>
</template>
<style lang="scss">
    .how{
        .content{
            .slick-list{
                .slick-track{
                    .slick-slide{
                        margin-right: .5vw;
                        margin-left: .5vw;
                        .step-list{
                            text-align: left;
                            list-style-type: decimal;
                            font-size: .8rem;
                            padding-left: 1vw;
                            margin-bottom: auto;
                        }
                    }
                }
            }
        }
    }
</style>
<script>
import Slick from 'vue-slick';
import '../../../../node_modules/slick-carousel/slick/slick.css';
export default {
    components: { Slick },
    mounted(){

    },
    data(){
        return {
            slickOptions: {
                slidesToScroll: 1,
                slidesToShow: 1,
                arrows: false,
                dots: true,
                rows: 0,
                centerMode: true,
                centerPadding: '20px',
                autoplay: true
            }
        }
    },
    methods: {
    }
}
</script>