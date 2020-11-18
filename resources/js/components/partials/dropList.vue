<template>
    <ul class="drop-list">
        <li v-for="(item, index) in list">
            <article>
                <span>{{item.name}}</span>
                <p v-if="content == index">{{item.content}}</p>
            </article>
            <button @click="showContent(index)">v</button>            
        </li>
    </ul>
</template>
<script>
export default{
    mounted(){

    },
    props: [
        'list'
    ],
    data(){
        return {
            content: null
        }
    },
    methods: {
        showContent(index){
            this.content == index ? this.content = null : this.content = index
        }
    }
}
</script>