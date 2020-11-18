<template>
    <div class="searchbar">
        <input type="text" class="input" placeholder="Buscar" v-model="search" @keyup="searchFor()">
        <button class="btn"><i class="fas fa-search"></i></button>
        <ul class="result-list" :class="{'active': results}">
            <li class="item" v-for="(r, index) in results" @click="goTo(r.id)">{{r.title}}</li>
        </ul>
    </div>
</template>
<script>
export default {
    mounted(){

    },
    data(){
        return{
            results: false,
            search: null
        }
    },
    methods: {
        searchFor(){
            var este= this;
            if(this.search.length > 3){
                axios.post('/search', {search: this.search}).then((results) => {
                    if(results.data.length){
                        este.results = results.data;
                    }else{
                        este.results = false
                    }
                });
            }else{
                this.results = false;
            }
        },
        goTo(id){
            window.location.href = '/art/'+id
        }
    }
}
</script>