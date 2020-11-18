<template>
    <transition-group tag="section" name="v-fade" class="section">
        <article :key="0" class="buttons">
            <button class="btn" @click="add()">
                <span v-if="!active"><i class="fas fa-plus-circle"></i></span>
                <span v-else><i class="fas fa-minus-circle"></i></span>

                <span v-if="section == 0">Slide</span>
                <span v-if="section == 1">Arte</span>
                <span v-if="section == 2">Foto</span>
                <span v-if="section == 3">Sucursal</span>
            </button>
        </article>
        <slides-panel :key="1" v-if="section == 0"></slides-panel>
        <products-panel :key="2" v-if="section == 1"></products-panel>
        <galeria-panel :key="3" v-if="section == 2"></galeria-panel>
        <pdv-panel :key="4" v-if="section == 3"></pdv-panel>
    </transition-group>
</template>
<script>
    export default{
        mounted(){
            this.$bus.$on('setSec', ($event) => {
            this.section = $event.section
        });
        },
        data(){
            return {
                section: 0,
                active: false
            }
        },
        methods: {
            add(){
                this.$bus.$emit('add', {section: this.section});
                this.active ? this.active = false : this.active = true;
            }
        }
    }
</script>