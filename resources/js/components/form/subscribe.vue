<template>
    <article class="subscribe">
        <h2 class="category">Subscribe to our newsletter</h2>
        <div v-if="!done" class="form-group">
            <label>Email</label>
            <input type="email" v-model="email" placeholder="Your Email">
            <button class="btn" @click="subscribe()">Subscribe</button>
        </div>
    </article>
</template>
<script>
export default {
    mounted(){

    },
    data(){
        return {
            email: null,
            done: false,
            re: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        }
    },
    methods: {
        subscribe(){
            var este = this;
            if(this.re.test(this.email)){
                axios.get('/subscribe', {email: this.email}).then(response => {
                    este.done = true
                })
            }else{
                alert('invalid');
            }
        }
    }
}
</script>

