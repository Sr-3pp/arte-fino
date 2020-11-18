@extends('layouts.app')

@section('content')
    <carousel :slides="{{json_encode($slides)}}"></carousel>
    <section class="section" s-sec="empresa">
        <figure>
            <img src="{{asset('img/logo.jpg')}}" alt="Arte Méxicano logotipo">
            <figcaption class="title">
                "Por qué ir a verlo,<br>si lo puedes  tener en casa"
            </figcaption>
        </figure>
        <p class="text text-justify">
                En Arte Fino Mexicano, apreciamos el arte en su forma y expresión, nuestra pasión es poner el arte al alcance de tu mano siendo nuestro objetivo llevar a tu hogar un cuadro, un articulo decorativo o un adorno que marque la diferencia en el ambiente de tus espacios preferidos ya sea en el interior o en el exterior.
        </p>
        <article class="row">
            <div class="col-2">
                <p class="category">Misión</p>
                <p class="text text-justify">
                    En Arte Fino Mexicano apreciamos el arte en su forma y expresión nuestra pasión es poner el arte al alcance de tu mano siendo nuestro objetivo llevar a tu hogar un cuadro un articulo decorativo o un adorno que marque la diferencia en el ambiente de tus espacios preferidos ya sea en el interior o en el exterior.
                </p>
            </div>
            <div class="col-2">
                <p class="category">Visión</p>
                <p class="text text-justify">
                    Posicionarnos como un referente importante de Arte y Cultura en México y el mundo así como dar a conocer la cultura mexicana mediante la difusión del Arte.
                </p>
            </div>
        </article>
        <article class="col">
            <p class="category">
                Valores
            </p>
            <p class="text">
                <ul class="valores">
                    <li>Honestidad</li>
                    <li>Confianza</li>
                    <li>Responsabilidad</li>
                    <li>Calidad de servicio</li>
                    <li>Disponibilidad</li>
                    <li>Eficacia</li>
                    <li>Eficiencia</li>
                </ul>
            </p>
            <modal-button></modal-button>
        </article>
    </section>
    <section class="section" s-sec="puntos">
        <h3 class="subtitle">
            <span>
                <icon name="marker"></icon>
            </span>
            Contamos con diferentes puntos de venta para su comodidad
        </h3>
        <location-list></location-list>
    </section>
    <section class="section" s-sec="pre-footer">
        <article class="row">
            <a class="col-3" href="https://listado.mercadolibre.com.mx/_CustId_439718824" target="_blank">
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
@endsection
