<template>
    <div @click="closeOverlay()" id="overlay" :class="{'active': active}"></div>
</template>
<script>
export default {
    mounted(){
        this.$bus.$on('overlay', ($event) => {
            this.active ? this.active = false : this.active = true;
            if(this.active){
                $('#app').addClass('overlay')
            }else{
                 $('#app').removeClass('overlay')
            }
        });
    },
    data(){
        return {
            active: false,
        }
    },
    methods: {
        closeOverlay(){
            this.active = false;
            this.$bus.$emit('overlayClick');
             $('#app').removeClass('overlay')
        }
    }
}
</script>