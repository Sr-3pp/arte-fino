<template>
    <section s-sec="sidebar">
        <ul>
            <li :class="{'active': section == 0}" @click="goSec(0)">
                <span>Slides</span><i class="fas fa-images"></i>
            </li>
            <li :class="{'active': section == 1}" @click="goSec(1)">
                <span>Arte</span><i class="fas fa-palette"></i>
            </li>
            <li :class="{'active': section == 2}" @click="goSec(2)">
                <span>Galería</span> <i class="fas fa-camera"></i>
            </li>
            <li :class="{'active': section == 3}" @click="goSec(3)">
                <span>PDV</span> <i class="fas fa-store-alt"></i>
            </li>
        </ul>
    </section>
</template>
<script>
export default{
    mounted(){

    },
    data(){
        return{
            section: 0
        }
    },
    methods: {
        goSec(sec){
            this.section = sec;
            this.$bus.$emit('setSec', {section: sec});
        }
    }
}
</script>