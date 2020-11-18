<template>
    <section class="navigation">
        <div class="section">
            <nav class="content">
            <a href="/" class="brand">
                <img src="/img/logo.jpg" alt="Site Brand">
            </a>
            <ul class="item-list" :class="{'active': active}">
                <li class="item mobile" s-action="close" @click="openNav()">
                    <icon name="close"></icon>
                </li>
                <li class="item" :class="{'active': current == 0}">
                    <icon name="home" class="mobile"></icon>
                    <a class="link" href="/">Inicio</a>
                </li>
                <li class="item" :class="{'active': current == 1}">
                    <icon name="galeria" class="mobile"></icon>
                    <a class="link" href="/galeria">Galería</a>
                </li>
                <li class="item" :class="{'active': current == 2}">
                    <icon name="card" class="mobile"></icon>
                    <a class="link" href="/catalogo">Catálogo</a>
                </li>
                <li class="item" :class="{'active': current == 3}">
                    <icon name="envelope_2" class="mobile"></icon>
                    <a class="link" href="/contacto">Contacto</a>
                </li>
                <!-- <li class="item">
                    <a class="link" href="/login">Iniciar sesión</a>
                </li> -->
            </ul>
            <button @click="openNav()" class="show-menu"><i class="fas fa-bars"></i></button>
        </nav>
        </div>
    </section>
</template>

<script>
    export default {
        mounted() {
            var este = this,
                url = window.location.href;
            

                if(url.includes('/galeria')){
                    this.current = 1;
                }else if(url.includes('/catalogo') || url.includes('/art')){
                    this.current = 2
                }else if(url.includes('/contacto')){
                    this.current = 3
                }else{
                    this.current = 0
                }


            this.$bus.$on('overlayClick', ($event) => {
                this.active = false
                $('[s-sec=top-bar]').removeClass('active');
            });
            
        },
        data(){
            return {
                active: false,
                current: 0
            }
        },
        methods: {
            openNav(){
                if(this.active){
                    this.active = false;
                    $('[s-sec=top-bar]').removeClass('active');
                }else{
                    this.active = true;
                    $('[s-sec=top-bar]').addClass('active');
                }
                    this.$bus.$emit('overlay');
            }
        }
    }
</script>
