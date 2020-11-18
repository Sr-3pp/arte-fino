<template>
  <article @click="setInput()" class="upload-multiple-picture">
    <div v-if="!pics.length">
      <span class="icon"><i class="fas fa-image"></i></span>
      <p>
        Click to select Pictures.
      </p>
    </div>
    <div class="thumbs" v-else>
      <figure v-for="(p, index) in pics" class="thumb">
        <img :id="'thumb_'+index" src="/img/default.jpg" alt="">
      </figure>
    </div>
    <input id="setPics" @change="setPic($event)" type="file" accept="image/*" class="hidden" multiple>
  </article>
</template>

<script>
  export default {
    mounted(){

    },
    data(){
      return {
        pics: []
      }
    },
    methods: {
      setPic($event){
        if($event.target){
          this.pics = $event.target.files
        }
        var este = this;
          for (let i = 0; i < this.pics.length; i++) {
            const element = this.pics[i];

              var  image = new Image(),
              reader = new FileReader();
              reader.onload = function (e) {
                $('#thumb_'+i).attr('src', e.target.result)
            };
            reader.readAsDataURL(this.pics[i]);
            
          }
        this.$bus.$emit('setPictures', {pictures: this.pics})
      },
      setInput(){
        $('#setPics').click()
      }
    }
  }
</script>
