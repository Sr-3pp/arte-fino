<template>
        <transition-group tag="div" name="v-fade" class="row">
            <form :key="0" v-if="!sent" class="form">
             <img class="form-deco left" src="img/plane.png" alt="">
                <article class="group">
                    <label>Nombre</label>
                    <span class="must" v-if="alerts.name">Este campo es obligatorio</span>
                    <input type="text" class="input" placeholder="Nombre*" v-model="name">
                </article>
                <article class="group">
                    <label>Asunto</label>
                    <span class="must" v-if="alerts.afair">Este campo es obligatorio</span>
                    <input type="text" class="input" placeholder="Asunto" v-model="afair">
                </article>
                <article class="group">
                    <label>Email</label>
                    <span class="must" v-if="alerts.email.status">{{alerts.email.text}}</span>
                    <input type="email" class="input" placeholder="Email*" v-model="email">
                </article>
                <article class="group">
                    <label>Mensaje</label>
                    <span class="must" v-if="alerts.content">Este campo es obligatorio</span>
                    <textarea name="name" rows="8" class="input" placeholder="Escribe tu mensaje aqui.*" v-model="content"></textarea>
                </article>
                <article class="group">
                    <button type="button" class="btn" @click="validate()">Enviar</button>
                </article>
                 <img class="form-deco right" src="img/envelope.png" alt="">
            </form>
            <article :key="1" class="section" v-else>
                 <h2>Gracias por escribirnos. <br> <small>Te responderemos lo mas pronto posible</small></h2>
                 <i class="fas fa-check-circle"></i>
            </article>
        </transition-group>
</template>

<script>
export default {
  mounted(){

  },
  data(){
    return {
      name: null,
      email: null,
      afair: null,
      content: null,
      sent: false,
      alerts: {
        name: false,
        email: {
            status: false,
            text: 'Este campo es obligatorio'
        },
        afair: false,
        content: false
      }
    }
  },
  methods: {
    validate(){
        this.alerts.name = false
        this.alerts.email.status = false
        this.alerts.email.text = 'Este campo es obligatorio'
         this.alerts.afair = false
        this.alerts.content = false
        if (this.name && this.afair &&  this.email && this.content) {
          var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
          if (re.test(String(this.email).toLowerCase())) {
            this.create()
          }else{
            this.alerts.email.status = true
            this.alerts.email.text = 'Introduce a correct email'
          }
        }else{
          if (!this.name) {
            this.alerts.name = true
          }else if(!this.afair){
            this.alerts.afair = true
            }else if (!this.email) {
            this.alerts.email.status = true
          }else if(!this.content){
            this.alerts.content = true
          }
        }
      
    },
    create(){
      var este = this,
          formData= new FormData();
          formData.append('name', this.name);
          formData.append('email', this.email);
          formData.append('afair', this.afair);
          formData.append('content', this.content);

          axios.post('/send-contact', formData).then(function(response){
            este.sent = true
          });
    }
  }
}
</script>
