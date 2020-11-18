@extends('layouts.app')

@section('content')
    <section s-sec="contact">
        <article>
            <div class="header">
                <h1 class="title">Contáctenos</h1>
                <p class="text">
                    Réplicas de Arte
<br><br>
Una hermosa y clásica presentación para las obras de los autores más entrañables y admirados en el arte universal.
Son reproducciones de pintores montadas sobre tela (canvas) que adquieren una presencia y textura similar a la de los lienzos originales de sus autores.
Las réplicas de arte montadas en lienzo son ideales para decorar ambientes donde, se recrea la belleza y se admira la creación artística. Son particularmente idóneos para dar el toque de elegancia en Oficinas, Hoteles, Restaurantes, Salas de Espera, Hogares,  Instituciones Educativas, Escuelas, Universidades, así como Centros Culturales para promover el gusto por el arte.
                </p>
            </div>
        </article>
        <div class="section contact">
            <contact-form></contact-form>
            <p class="subtitle">
                Contamos con diferentes puntos de venta para su comodidad.
            </p>
            <location-list></location-list>
        </div>
        <section class="section" s-sec="pre-footer">
            <article class="row">
                <a href="https://www.mercadolibre.com.mx/perfil/EL5266120" target="_blank" class="col-3">
                    <figure class="img">
                    <img src="{{asset('img/Mercado-Libre-Logo-Horizontal.png')}}" alt="">
                    </figure>
                    Puede encontrar nuestras obras en mercado libre.
                    Contamos con envíos a toda la república.
                </a>
                <div class="col-3">
                    <figure class="img">
                        <img src="{{asset('img/comprasegurapaypal.png')}}" alt="">
                    </figure>
                </div>
                <div class="col-3">
                    <icon name="truk"></icon>
                    <br>
                    Envio gratis a partir de 2 cuadros. <br>
                    Cobertura por transportes Villareal.
                </div>
            </article>
        </section>
    </section>
@endsection